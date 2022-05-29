<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col mt-5">

                <h2 class="d-inline">Master Data Produk</h2>
                <a href="/pages/create" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data </a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered" style="margin-top: 10px !important;" id="tabel-produk">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataMaster as $dm) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $dm['nama_product']; ?></td>
                                <td><?= $dm['deskripsi_product']; ?></td>
                                <td>Rp <?= number_format($dm['harga_product']); ?></td>
                                <td><?= $dm['kategori']; ?></td>
                                <td><img src="/img/<?= $dm['gambar']; ?>" alt="" class="foto"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="bg-light text-center text-lg-start mt-5" style="position: relative; left: 0; bottom: 0; width: 100%; background-color: red; color: white; text-align: center;">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #E1F0C7 !important;">
        © 2022 Copyright:
        <a class="text-dark" href="https://www.linkedin.com/in/muhammad-zen/">Muhammad Zen</a>
    </div>
    <!-- Copyright -->
</div>
<?= $this->endSection(); ?>