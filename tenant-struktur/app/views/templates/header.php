<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style/header.css">
    <link href="<?= BASEURL; ?>/css/sidebar/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/solid.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/table/datatables.min.css">
</head>


<div class="container-fluid " style="height: 100%;">
    <div class="row d-flex" id="wrapper">
        <div class="col-md-auto px-0 mx-0 side flex-column">
            <div class="logo-header">
                <a class=" text-white logo-1" href="<?= BASEURL ?>"><img src="<?= BASEURL ?>/img/Logo_name.gif" alt="MI" class="logo-1"></a>
            </div>
            <!-- <div class="logo-phone">asdsa</div> -->

            <div class="user-level">Login Sebagai :<?= $_SESSION["level"] ?></div>

            <div class=" nav-judul nav-side overflow-auto">

                <?php include 'menu.php' ?>

            </div>
        </div>
        <div class="col   p-0 d-flex flex-column bd-highlight mb-3  ">

            <nav class=" head navbar navbar-expand-lg navbar-light nav-judul shadow header-2">
                <div class="container-fluid ">

                    <span class="text-white  judul nama-pt">APLIKASI INVENTORI TOKO MEUBEL INDAH </span>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" style=" float:left;" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <div class="menu"> <?php include 'menu.php' ?>
                        </div>
                        <!-- <form class="d-flex ">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                    </div>
                </div>
            </nav>
            <div class="container-fluid my-2 bd-highlight content">
                <div class="alert bg-page my-2" role="alert">

                    <?= $data['page']; ?>


                </div>
                <hr>
                <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
                <script src="<?= BASEURL; ?>/font/js/all.min.js"></script>
                <script src="<?= BASEURL; ?>/js/jquery/jquery-3.6.0.min.js"></script>
                <script src="<?= BASEURL; ?>/assets/table/datatables.min.js"></script>
                <script src="<?= BASEURL; ?>/assets/alert/dist/sweetalert2.all.min.js"></script>
                <script src="<?= BASEURL; ?>/assets/encryption/crypto-js.min.js"></script>
                <script src="<?= BASEURL; ?>/assets/encryption/Encryption.js"></script>