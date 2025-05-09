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
    <title>Sign Up</title>


    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style/header.css">
    <link href="<?= BASEURL; ?>/css/sidebar/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/font/css/solid.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/table/datatables.min.css">
</head>

<body>
    <div class="container-fluid row  pt-5">
        <div class="col-xl-5 col-md-4 mb-4 position-absolute top-50 start-50 translate-middle">

            <div class="card  shadow h-100 py-2">
                <div class="card-header">
                    Registrasi Admin
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="registrasi">
                        <!-- <div class="row"> -->
                        <div class="col mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control form-control-sm d-block" required>
                        </div>
                        <div class="col mb-3" hidden>
                            <label for="" class="form-label">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control form-control-sm d-block" value="admin gudang" required>
                            <!-- <select name="jabatan" id="jabatan"></select> -->
                        </div>
                        <div class="col mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" id="username_reg" name="username_reg" class="form-control form-control-sm d-block" required>
                        </div>
                        <div class="col mb-3">
                            <label for="" class="d-block mb-2">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" required>
                                <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="" class="form-label">Alamat </label>
                            <textarea name="alamat" id="alamat" class="form-control form-control-sm d-block" required>

                            </textarea>
                        </div>
                        <div class="col mb-3">
                            <label for="" class="form-label">password</label>
                            <input type="password" id="password_reg" name="password_reg" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label for="" class="form-label">confirmasi Password</label>
                            <input type="password" id="confirm_password_reg" name="confirm_password_reg" class="form-control form-control-sm d-block" required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="">Level</label>

                            <input type="text" name="level" id="level" value="admin">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" id="regis" name="regis" class="btn btn-success">Sign Up</button>
                        </div>


                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="<?= BASEURL; ?>/js/jquery/jquery-3.6.0.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/font/js/all.min.js"></script>
<script src="<?= BASEURL; ?>/assets/table/datatables.min.js"></script>
<script src="<?= BASEURL; ?>/assets/alert/dist/sweetalert2.all.min.js"></script>
<script src="<?= BASEURL; ?>/assets/encryption/crypto-js.min.js"></script>
<script src="<?= BASEURL; ?>/assets/encryption/Encryption.js"></script>
<script>
    $(document).ready(function() {
        kunci = new Encryption();
        noValue = 'meubelindah12345';
    });
    $("#registrasi").on("submit", function(e) {

        e.preventDefault();
        // data = $(this).serialize();
        var nama = kunci.encrypt($("#nama").val(), noValue);
        var jabatan = kunci.encrypt($("#jabatan").val(), noValue);
        var username = kunci.encrypt($("#username_reg").val(), noValue);
        jenis_kelamin = kunci.encrypt($("input[name='jenis_kelamin']:checked").val(), noValue);
        var alamat = kunci.encrypt($("#alamat").val(), noValue);
        var password_reg = kunci.encrypt($("#password_reg").val(), noValue);
        var confirm_password_reg = kunci.encrypt($("#confirm_password_reg").val(), noValue);
        var level = kunci.encrypt($("#level").val(), noValue);

        $.ajax({
            url: '<?= BASEURL ?>/user/proses_regis',
            type: 'POST',
            data: {
                nama: nama,
                jabatan: jabatan,
                username_reg: username,
                jenis_kelamin: jenis_kelamin,
                alamat: alamat,
                password_reg: password_reg,
                confirm_password_reg: confirm_password_reg,
                level: level
            },
            dataType: 'json',
            success: function(res) {
                if (res.type == "success") {


                    Swal.fire({
                        icon: res.type,
                        title: res.pesan
                    });

                    $('#registrasi')[0].reset();

                } else if (res.type == "error") {
                    Swal.fire({
                        icon: res.type,
                        title: res.pesan
                    });
                }

            }
        })
    });
</script>