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



</head>

<body>
    <div class="vh-100">
        <div class="container-fluid d-flex justify-content-center align-items-center h-100 p-auto">
            <div class="w-50 col-md-6">
                <div class="card text-center shadow-lg">
                    <div class="card-header">
                        <div class=" avatar-xl me-3 ">
                            <img src="<?= BASEURL ?>/img/logo-mmc.png" style="width: 100px;">
                        </div>

                    </div>
                    <div class="card-body ">
                        <div class="row mx-5">
                            <div class="col-lg-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">First Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="username" id="username" name="username">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
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

    $("#login").on("submit", function(e) {
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