<?php 

class Produk_Model
{
    private $table = 'produk';
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllProduk()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getProdukById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id_produk=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahProduk($produk)
    {
        $query = "INSERT INTO $this->table VALUES(0, :name, :image, :harga, :stok, :deskripsi)";
        $this->db->query($query);

        $this->db->bind('name', $produk['nama']);
        $this->db->bind('image', $produk['image']);
        $this->db->bind('harga', $produk['harga']);
        $this->db->bind('stok', $produk['stok']);
        $this->db->bind('deskripsi', $produk['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id_produk=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editProduk($produk)
    {
        $query = "UPDATE $this->table SET
                    nama_produk =:nama,
                    img_produk = :image,
                    harga_produk = :harga,
                    stok_produk = :stok,
                    deskripsi_produk = :deskripsi
                    WHERE id_produk = :id";

        $this->db->query($query);
        $this->db->bind('id', $produk['id']);
        $this->db->bind('nama', $produk['nama']);
        $this->db->bind('image', $produk['image']);
        $this->db->bind('harga', $produk['harga']);
        $this->db->bind('stok', $produk['stok']);
        $this->db->bind('deskripsi', $produk['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}