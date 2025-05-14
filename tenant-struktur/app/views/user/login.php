<?php
if (isset($_SESSION['login'])) {
?>
    <script>
        window.location.href = "<?= BASEURL ?>/dashboard";
    </script>
<?php

}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Login </title>
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style/login.css">


    <style>

    </style>
</head>

<body class="">
    <div class="vh-100  ">
        <div class="container-fluid d-flex justify-content-center align-items-center h-100 p-auto  ">
            <div class="col-12 col-sm-6 col-lg-3 ">
                <div class="card text-center shadow-lg h-50  " style="border-radius: 25px 25px  !important; height:450px !important">
                    <div class="card-header pt-5" style="border-radius: 25px 25px 0 0  !important;">
                        <div class=" pb-3  ">
                            <img src="<?= BASEURL ?>/img/logo-mmc.png" style="width:80px;">
                        </div>
                        <div class=" fs-5 pt-3 fw-bolder ">
                            <span class="border-bottom" style="color:rgba(48, 93, 145, 0.96) !important;border-bottom:2px solid rgb(34, 174, 95) !important ;letter-spacing: 10px !important;">TENANT MMC</span>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form id="frmlogin">
                            <div class="row">

                                <div class="col-lg-12 px-5 pt-3">
                                    <div class="form-group has-icon-left ">
                                        <label for="first-name-icon " style="width:100%;text-align:left">Username</label>
                                        <div class="position-relative border-default">
                                            <input type="text" class="form-control" style=" border: 1px solid var(--bs-default-text-color-gelap) !important;border-radius: 50px 50px  !important;" placeholder="username" id="username" name="username">
                                            <div class="form-control-icon mt-1">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 px-5 pb-2 ">
                                    <div class="form-group has-icon-left">
                                        <label for="password-id-icon" style="width:100%;text-align:left">password</label>
                                        <div class="position-relative ">
                                            <input type="password" class="form-control" style=" border: 1px solid var(--bs-default-text-color-gelap) !important;border-radius: 50px 50px  !important;" placeholder="password" id="password" name="password">
                                            <div class="form-control-icon  mt-1">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 px-5 pb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn bg-default btn-block shadow text-white " style="border-radius: 50px 50px  !important;">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!-- <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="<?= BASEURL; ?>/font/js/all.min.js"></script> -->
<script src="<?= BASEURL; ?>/js/jquery/jquery-3.6.0.min.js"></script>
<!-- <script src="<?= BASEURL; ?>/assets/table/datatables.min.js"></script> -->
<script src="assets/static/js/components/dark.js"></script>
<script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/compiled/js/app.js"></script>
<script src="<?= BASEURL; ?>/assets/alert/dist/sweetalert2.all.min.js"></script>
<script src="<?= BASEURL; ?>/assets/encryption/crypto-js.min.js"></script>
<script src="<?= BASEURL; ?>/assets/encryption/Encryption.js"></script>
<script>
    $(document).ready(function() {
        // $("#pesan").hide();
        kunci = new Encryption();
        noValue = 'meubelindah12345';
    });

    $("#frmlogin").on("submit", function(e) {
        e.preventDefault();

        username = kunci.encrypt($("#username").val(), noValue);
        password = kunci.encrypt($("#password").val(), noValue);
        $.ajax({
            url: '<?= BASEURL ?>/user/proses_login',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            dataType: 'json',
            success: function(res) {
                if (res.tipe == "success") {
                    window.location.href = "<?= BASEURL ?>/dashboard";
                } else {

                    Swal.fire({
                        icon: res.tipe,
                        title: res.pesan
                    });

                }

            }
        });
    })
</script>