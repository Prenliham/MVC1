<div class="container mt-5">
    <?php Flasher::flasher() ?>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form <?= (!empty($data)) ? "Edit" : "Tambah"; ?> Produk</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php if(!empty($data)): ?>
                            <input type="hidden" name="id" value="<?= $data['id_produk'] ?>" >
                            <input type="hidden" name="image_lama" value="<?= $data['img_produk'] ?>">
                        <?php endif; ?>
                        <!-- Image Preview -->
                        <div class="mb-3 text-center">
                            <img id="preview" src="<?=BASEURL?>/img/<?= (!empty($data)) ? $data['img_produk'] : ''?>"
                                class="img-thumbnail mb-2"
                                style="max-width: 200px;">
                            <input type="file" class="form-control" name="image">
                        </div>

                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" placeholder="masukkan nama produk" value="<?= (!empty($data) ? $data['nama_produk'] : '') ?>" >
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="masukkan harga produk" value="<?= (!empty($data) ? $data['harga_produk'] : '') ?>" >
                        </div>

                        <!-- Stok -->
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" placeholder="masukkan stok produk" value="<?= (!empty($data) ? $data['stok_produk'] : '') ?>" >
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4" placeholder="masukkan deskripsi produk"><?= (!empty($data) ? $data['deskripsi_produk'] : '') ?> </textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Simpan Produk
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const intImage = document.querySelector('input[name=image]');
    const imgPreview = document.querySelector('#preview');
    
    intImage.addEventListener('change', function(){
        const img = this.files[0];
        if (img) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }

            reader.readAsDataURL(img);
        }
        
    })
    
</script>