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
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style/login.css">
    <link href="<?= BASEURL; ?>/css/sidebar/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/solid.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/table/datatables.min.css">


</head>

<body>
    <div class="container-fluid tinggi">

        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">


                <div class=" margin">
                    <div class="text-center">
                        <img src="<?= BASEURL; ?>/img/Logo.gif" width="200px">
                    </div>
                    <div class="garis"></div>
                    <div class="garis2"></div>

                    <form method="POST" id="login">
                        <div class=" mb-3">
                            <!-- <label for="" class="form-label">Username</label> -->
                            <input class="form-control d-block my-5" type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div class=" mb-3">
                            <!-- <label for="" class="form-label">Password</label> -->
                            <input class="form-control d-block mb-5" type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="mb-3 d-grid gap-2 mx-auto">
                            <button class="btn bg-btn text-white" type="submit">LogIn</button>
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/font/js/all.min.js"></script>
<script src="<?= BASEURL; ?>/js/jquery/jquery-3.6.0.min.js"></script>
<script src="<?= BASEURL; ?>/assets/table/datatables.min.js"></script>
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