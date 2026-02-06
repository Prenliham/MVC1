<div class="container">
    <section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- GAMBAR -->
            <div class="col-md-6 mb-4">
                <img src="<?= BASEURL; ?>/img/<?= $data['produk']['img_produk']; ?>" 
                    class="img-fluid rounded shadow" 
                    alt="<?= $data['produk']['nama_produk']; ?>">
            </div>

            <!-- INFO -->
            <div class="col-md-6">
                <h1 class="fw-bold"><?= $data['produk']['nama_produk']; ?></h1>

                <h4 class="text-warning fw-bold my-3">
                    Rp <?= number_format($data['produk']['harga_produk'], 0, ',', '.'); ?> / pcs
                </h4>

                <p class="text-muted">
                    <?= $data['produk']['deskripsi_produk']; ?>
                </p>

                <a 
                    href="https://wa.me/628xxxxxxxxxx?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($data['produk']['nama_produk']); ?>" 
                    class="btn btn-success btn-lg mt-3"
                    target="_blank">
                    Pesan via WhatsApp
                </a>
            </div>

        </div>
    </div>
</section>

</div>