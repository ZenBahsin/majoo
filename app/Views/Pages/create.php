<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-8 mt-5">
                <h2 class="my-3">Form Tambah Data</h2>
                <form action="/Pages/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="namaproduk" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control 
                        <?= ($validation->hasError('namaproduk')) ?
                            'is-invalid' : ''; ?>" id="namaproduk" name="namaproduk" autofocus value="<?= old('namaproduk'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('namaproduk'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">

                            <textarea type="text" id="editor" style="height:100%;" class="form-control
                            <?= ($validation->hasError('deskripsi')) ?
                                'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" autofocus value="<?= old('deskripsi'); ?>"></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control
                            <?= ($validation->hasError('harga')) ?
                                'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-3 col-form-label">Kategori Produk</label>
                        <div class="col-sm-9">
                            <select class="form-control
                            <?= ($validation->hasError('kategori')) ?
                                'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= old('kategori'); ?>">
                                <!-- <option value='0'>-- Pilih Kategori --</option> -->

                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kategori'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-sm-2">
                            <img src="/img/default.png" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  
                            <?= ($validation->hasError('gambar')) ?
                                'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImage()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar">Pilih Gambar Produk..</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //  $(document).ready(function() {

    $('#kategori').select2({
        placeholder: '-- Pilih Kategori --',
        ajax: {
            url: "<?php echo site_url('Pages/ajaxSearch'); ?>",
            type: "post",
            delay: 250,
            dataType: 'json',
            data: function(params) {
                return {
                    query: params.term, // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response.data
                };
            },
            cache: true
        }
    });


    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });



    // });
</script>

<?= $this->endSection(); ?>