<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Not Session</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style/header.css">
    <link href="<?= BASEURL; ?>/css/sidebar/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/solid.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/table/datatables.min.css">

</head>
<style>
    .body-error {
        background-color: #29c7ca;
    }

    .error_logo {
        width: 200px;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .kata-kata {
        font-size: 50px;
        font-weight: 2px bold;
        color: white;
        margin-bottom: 20px;

    }

    .not-fout {
        color: #212223;
        font-family: calibri;
        font-size: 150px;
        font-weight: bold;

    }
</style>

<body class="body-error">
    <div class="container-fluid">
        <center>
            <img src="<?= BASEURL ?>/img/error.png" alt="" class="error_logo">
            <br>
            <h1 class="not-fout">404</h1>
            <h2 class="kata-kata"> SESI TIDAK DI TEMUKAN

            </h2>
            <h5>HARAP ANDA LOGIN TERLEBIH DAHULU</h5>
            <br>
            <a href="<?= BASEURL ?>" class="btn btn-outline-dark btn-lg">Kembali Ke Halaman Login</a>

        </center>
    </div>
</body>

</html>