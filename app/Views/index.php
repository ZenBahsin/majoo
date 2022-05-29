<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron mt-5">
            <h1 class="display-4">Aplikasi Login Sederhana Codeigniter 4</h1>
            <hr class="my-4">
            <p>Selamat Datang <b><?= $username ?></b></p>
            <p class="lead">
                <a class="btn btn-danger btn-lg" href="<?= base_url('login/logout') ?>" role="button">Logout</a>
            </p>
        </div>
    </div>
</body>

</html>