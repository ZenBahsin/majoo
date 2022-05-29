<?= $this->extend('layout/header'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <h2 class="mt-4">Produk</h2>
    <div class="row row-cols-1 row-cols-md-3">
        <?php foreach ($showdata as $sd) : ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="/img/<?= $sd['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $sd['nama_product']; ?></h5>
                        <p class="card-text font-weight-bold">Rp. <?= number_format($sd['harga_product']); ?></p>
                        <p class="card-text"><?= $sd['deskripsi_product']; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted"><a href="" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Beli </a></small>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>


<?= $this->endSection(); ?>