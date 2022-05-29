<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h2 class="mb-3 d-inline">Master Kategori Product</h2>
                <a href="/Pages/create_kategori" class="btn btn-primary mb-3 float-right"><i class="fas fa-plus"></i>Tambah Data</a>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">Id</th> -->
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataMasterkategori as $dmk) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>

                                <td><?= $dmk['kategori_product']; ?></td>
                                <td>
                                    <a href="/Pages/edit/<?= $dmk['id_kategori']; ?>" class="btn btn-warning"><i class="fas fa-edit" style="color:white"></i></a>

                                    <form action="/Pages/delete/<?= $dmk['id_kategori']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data yang dipilih?')"><i class="fas fa-trash" style="color:white"></i>
                                        </button>
                                    </form>
                                </td>
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
<!-- Copyright -->
</div>

<?= $this->endSection(); ?>