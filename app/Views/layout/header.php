<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title><?= $tittle; ?></title>
    <style>
        .bg-light majoo {
            background-color: #E1F0C7 !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light majoo" style="background-color: #E1F0C7 !important;">
        <div class="container">
            <a class="navbar-brand" href="#">Majoo Teknologi Indonesiaa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <div class="navbar-nav">
                    <a class="nav-link active" href="/">Data Product</a>
                    <!-- <a class="nav-link active" href="/Pages/about">Master Data</a>
                    <a class="nav-link" href="/Pages/kategori">Master Kategori</a> -->


                </div>

            </div>
            <a href="/Pages/data_produk" type="button" class="btn btn-success float-right">
                Login <i class="fas fa-sign-in-alt"></i></a>
        </div>

    </nav>

    <?= $this->renderSection('content'); ?>