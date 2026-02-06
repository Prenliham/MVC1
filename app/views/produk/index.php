
<style>
    .product-card:hover {
        transform: translateY(-5px);
        transition: .3s ease;
    }
</style>

<!-- HEADER -->
<section class="bg-primary text-light py-5 text-center">
    <div class="container">
        <h1 class="fw-bold">Produk BiteMesoll</h1>
        <p class="lead">Aneka risol lezat, fresh, dan tanpa pengawet</p>
    </div>
</section>

<?php Flasher::flasher() ?>

<!-- tambah produk  -->
<div class="position-fixed" style="bottom:2rem; right:3rem; z-index:999;">
    <a href="<?= BASEURL ?>/produk/tambah" class="btn btn-primary text-light fw-bold"> + Tambah Produk</a>
</div>

<!-- PRODUK -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
        
        <?php foreach($data['produk'] as $produk): ?>
            <!-- PRODUK 1 -->
            <div class="col-md-4">
                <div class="card product-card shadow h-100">
                    <img src="<?= BASEURL; ?>/img/<?= $produk['img_produk'] ?>" class="card-img-top" alt="Risol Mayo">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                        <h6 class="fw-bold mt-2">Rp. <?= $produk['harga_produk'] ?></h6>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="<?= BASEURL ?>/produk/detail/<?= $produk['id_produk'] ?>"  class="btn btn-primary w-100">Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
