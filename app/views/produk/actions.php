<div class="container mt-4">
    <h3>Daftar Produk</h3>

    <a href="<?= BASEURL; ?>/produk/tambah" class="btn btn-primary mb-3">
        Tambah Produk
    </a>

    <div>
        <?php Flasher::flasher() ?>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php $no = 1; ?>
        <?php foreach($data['produk'] as $prd) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $prd['nama_produk']; ?></td>
                <td>Rp <?= number_format($prd['harga_produk']); ?></td>
                <td><?= $prd['stok_produk']; ?></td>
                <td>
                    <img src="<?= BASEURL; ?>/img/<?= $prd['img_produk']; ?>" 
                        width="80">
                </td>
                <td>

                    <!-- Button Edit -->
                    <a href="<?= BASEURL; ?>/produk/edit/<?= $prd['id_produk']; ?>" 
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- Button Hapus -->
                    <a href="<?= BASEURL; ?>/produk/delete/<?= $prd['id_produk']; ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin hapus data?');">
                        Hapus
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
