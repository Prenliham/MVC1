<style>
    body {
        scroll-behavior: smooth;
    }
    .hero {
        background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
            url('<?= BASEURL; ?>/img/risoles.png') center/cover;
        height: 90vh;
        color: white;
    }
    .badge-food {
        background-color: #ffb703;
        color: #000;
    }
</style>

<div class="container">
    <!-- HERO -->
    <section class="hero d-flex align-items-center text-center">
        <div class="container">
            <span class="badge bg-primary mb-3">Risol Premium</span>
            <h1 class="display-4 fw-bold mt-3">BiteMesoll</h1>
            <p class="lead">Risol Renyah di Luar, Lumer di Dalam 🤤</p>
            <a href="#produk" class="btn btn-primary btn-lg mt-3">Lihat Produk</a>
        </div>
    </section>

    <!-- PRODUK -->
    <section id="produk" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Produk Kami</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Risol Mayo</h5>
                            <p class="card-text">Isi smoked beef, telur, dan mayo creamy.</p>
                            <span class="badge bg-success">Best Seller</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Risol Ayam Pedas</h5>
                            <p class="card-text">Ayam suwir pedas dengan bumbu khas.</p>
                            <span class="badge bg-danger">Pedas</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Risol Keju</h5>
                            <p class="card-text">Keju mozzarella lumer saat digoreng.</p>
                            <span class="badge bg-warning text-dark">Favorit Anak</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Tentang BiteMesoll</h2>
            <p class="text-center col-md-8 mx-auto">
                BiteMesoll adalah brand risol rumahan yang mengutamakan kualitas,
                rasa, dan kebersihan. Diproduksi dari bahan segar tanpa pengawet,
                cocok untuk camilan maupun stok frozen food.
            </p>
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Pesan Sekarang</h2>
            <p>Hubungi kami via WhatsApp untuk pemesanan</p>
            <a href="https://wa.me/628xxxxxxxxxx" class="btn btn-success btn-lg">
                WhatsApp Order
            </a>
        </div>
    </section>

</div>