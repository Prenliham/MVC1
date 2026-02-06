<?php

class ProdukController extends Controller{
    
    public function index()
    {
        $data['produk'] = $this->model('Produk_Model')->getAllProduk();

        $this->view('component/layout',[
            'content' => 'produk/index',
            'data' => $data 
        ]);
    }

    public function detail($id)
    {
        $data['produk'] = $this->model('Produk_Model')->getProdukById($id);
        $this->view('component/layout', [
            'content' => 'produk/detail',
            'data' => $data
        ]);
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data['nama'] =trim($_POST['nama']);
            $data['image'] = $this->upload();
            $data['harga'] = (int) $_POST['harga'];
            $data['stok'] = (int) $_POST['stok'];
            $data['deskripsi'] = trim($_POST['deskripsi']);

            if(empty($data['nama'])){ 
                Flasher::setFlash(false, "Nama tidak boleh kosong");
                header('Location:'. BASEURL .'/produk/tambah');
                exit; 
            };

            if ($data['image']['status'] == false) {
                Flasher::setFlash($data['image']['status'], $data['image']['message']);
                header('Location:'. BASEURL .'/produk/tambah');
                exit;
            }else{
                $data['image'] = $data['image']['content'];
            }

            if ($data['harga'] <= 0) {
                Flasher::setFlash(false, "Harga tidak boleh kurang dari 0");
                header('Location:'. BASEURL .'/produk/tambah');
                exit;
            }

            if ($data['stok'] <= 0) {
                Flasher::setFlash(false, "Stok tidak boleh kurang dari 0");
                header('Location:'. BASEURL .'/produk/tambah');
                exit;
            }

            if($this->model("Produk_Model")->tambahProduk($data) > 0 ){
                Flasher::setFlash(true, "Produk berhasil ditambahkan");
                header('Location:'. BASEURL .'/produk');
                exit;
            }
        }

        $this->view('component/layout',[
            'content' => 'produk/tambah'
        ]);
    }


    private function upload()
    {
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmp  = $_FILES['image']['tmp_name'];
        
        if ($error === 4) {
            $error = [
                'status' => false,
                'message' => "Image tidak boleh kosong"
            ];
            return $error;
        }

        $ekstensiValid = ['png', 'jpeg', 'jpg'];
        $ekstensiGambar = explode('.', $name);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            $error = [
                'status' => false,
                'message' => "File bukan image"
            ];
            return $error;
        }

        if ($size > 1000000) {
            $error = [
                'status' => false,
                'message' => "File lebih dari 1mb"
            ];
            return $error;
        }

        $name = uniqid();
        $name = $name . '.' . $ekstensiGambar;

        move_uploaded_file($tmp, 'img/'.$name);

        return [
            'status' => true,
            'content' => $name
        ];
    }

    public function actions()
    {
        $data['produk'] = $this->model('Produk_Model')->getAllProduk();
        $this->view('component/layout',[
            'content' => 'produk/actions',
            'data' => $data
        ]);
    }

    public function delete($id)
    {
        $produk = $this->model('Produk_Model')->getProdukById($id);

        if (empty($produk)) {
            Flasher::setFlash(false, "Produk Tidak Tersedia");
            header('Location:'. BASEURL . '/produk/actions' );
            exit;
        }

        if ($produk['img_produk'] != '') {

            $path = 'img/'.$produk['img_produk'];
            if (file_exists($path)) {
                unlink($path);
            }
            
        }

        if ($this->model('Produk_Model')->delete($produk['id_produk']) > 0 ) {
            Flasher::setFlash(true, "Produk Berhasil Dihapus");
            header('Location:'.BASEURL.'/produk/actions');
        }
    }

    public function edit($id){
        $produk = $this->model('Produk_Model')->getProdukById($id);
        
        if (empty($produk)) {
            Flasher::setFlash(false, "Produk Tidak Ditemukan");
            header('Location:'.BASEURL.'/produk/actions');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data['id'] = $_POST['id'];
            $data['nama'] = $_POST['nama'];
            $data['harga'] = $_POST['harga'];
            $data['stok'] = $_POST['stok'];
            $data['deskripsi'] = $_POST['deskripsi'];
            $imgLama = $_POST['image_lama'];


            if ($_FILES['image']['error'] === 4) {
                $data['image'] = $imgLama;
            }else{
                $data['image'] = $this->upload()['content'];
                unlink("img/$imgLama");
            }

            if ($this->model('Produk_Model')->editProduk($data) > 0) {
                Flasher::setFlash(true, "Produk Berhasil Diubah");
                header('Location:'.BASEURL.'/produk/actions');
                exit;
            }

        }




        $this->view('component/layout',[
            'content'=>'produk/tambah',
            'data'=>$produk
        ]);
    }


}