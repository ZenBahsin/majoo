<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-8 mt-5">
                <h2 class="my-3">Form Tambah kategori Baru</h2>
                <form action="/Pages/save_kategori" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="kategori_product" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control 
                        <?= ($validation->hasError('kategori_product')) ?
                            'is-invalid' : ''; ?>" id="kategori_product" name="kategori_product" autofocus value="<?= old('kategori_product'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kategori_product'); ?>
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

    $('.kategori').select2({

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


    // });
</script>

<?= $this->endSection(); ?>