<div class="modal fade" tabindex="-1" id="add" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="registrasi_user">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                    <div class="col mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control form-control-sm d-block" required>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select">
                            <option selected>Pilih Jabatan</option>
                            <option value="owner">Owner</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" id="username_reg" name="username_reg" class="form-control form-control-sm d-block" required>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control form-control-sm d-block" required></textarea>
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
                        <label for="" class="form-label">password</label>
                        <input type="password" id="password_reg" name="password_reg" class="form-control form-control-sm d-block" required>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">confirmasi Password</label>
                        <input type="password" id="confirm_password_reg" name="confirm_password_reg" class="form-control form-control-sm d-block" required>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="">Level</label>
                        <input type="text" name="level" id="level" value="user" required>
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option selected>Pilih status</option>
                            <option value="0">Akses</option>
                            <option value="1">Blokir</option>
                        </select>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- akses -->
<div class="modal fade" id="akses_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="frm_akses">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_akses" name="id_akses">
                    <label for="" class="form-label">status</label>
                    <select name="status_akses" id="status_akses" class="form-select">
                        <option selected>Pilih status</option>
                        <option value="0">Akses</option>
                        <option value="1">Blokir</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm Status</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- password -->

<div class="modal fade" id="pass_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="frm_pass">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_pass" name="id_pass">
                    <div class="col mb-3">
                        <label for="" class="form-label">password Baru </label>
                        <input type="password" id="ubah_password_user" name="ubah_password_user" class="form-control form-control-sm d-block">
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">confirmasi Password Baru</label>
                        <input type="password" id="ubah_confirm_password_user" name="ubah_confirm_password_user" class="form-control form-control-sm d-block">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm Password</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- level -->
<div class="modal fade" id="level_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="frm_level">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_level" name="id_level">
                    <div class="col mb-3">
                        <label for="" class="form-label">Level</label>
                        <select name="ubah_level" id="ubah_level" class="form-select">
                            <option selected>Pilih status</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="col mb-3" id="user_jabatan">
                        <label for="" class="form-label">Jabatan</label>
                        <select name="ubah_jabatan" id="ubah_jabatan" class="form-select">
                            <option selected>Pilih Jabatan</option>
                            <option value="owner">Owner</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm Level</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        kunci = new Encryption();
        noValue = 'meubelindah12345';

        $("#user_jabatan").hide();
    })

    $("#ubah_level").on("change", function() {
        data = $(this).val();
        if (data === "user") {
            $("#user_jabatan").hide();
            $("#user_jabatan").show();
        } else {
            $("#user_jabatan").show();
            $("#user_jabatan").hide();
        }
    })
    // insert
    $(document).on("click", "#tambahkan", function() {
        $("#table_user")[0].reset();
    })

    $("#registrasi_user").submit(function(e) {
        e.preventDefault();
        // data = $(this).serialize();
        nama = kunci.encrypt($("#nama").val(), noValue);
        jabatan = kunci.encrypt($("#jabatan").val(), noValue);
        alamat = kunci.encrypt($("#alamat").val(), noValue);
        username = kunci.encrypt($("#username_reg").val(), noValue);
        jenis_kelamin = kunci.encrypt($("input[name='jenis_kelamin']:checked").val(), noValue);
        pass1 = kunci.encrypt($("#password_reg").val(), noValue);
        pass2 = kunci.encrypt($("#confirm_password_reg").val(), noValue);
        level = kunci.encrypt($("#level").val(), noValue);
        akses = kunci.encrypt($("#status").val(), noValue);
        // alert(data);
        // exit();
        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/InsertUser',
            type: 'POST',
            data: {
                nama: nama,
                jabatan: jabatan,
                username_reg: username,
                jenis_kelamin: jenis_kelamin,
                password_reg: pass1,
                alamat: alamat,
                confirm_password_reg: pass2,
                level: level,
                status: akses
            },
            dataType: 'json',
            chace: false,
            success: function(res) {
                if (res.type == "success") {

                    Swal.fire({
                        icon: res.type,
                        title: res.pesan
                    });
                    $("#registrasi_user")[0].reset();
                    $("#add").modal('hide');
                    data_user();

                } else {

                    Swal.fire({
                        icon: res.type,
                        title: res.pesan
                    });

                }
            }

        })

    });

    // akses
    $(document).on("click", "#btn_akses", function() {
        data = $(this).data('akses');
        $("#id_akses").val(data);
        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/get_user_manage',
            type: 'POST',
            data: {
                id: data
            },
            dataType: 'json',
            success: function(res) {
                $("#status_akses").val(res.status);
            }
        })
    });

    $("#frm_akses").submit(function(e) {
        e.preventDefault();
        data = $(this).serialize();

        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/UbahAkses',
            type: 'POST',
            data: data,
            dataType: 'json',
            chace: false,
            success: function(res) {

                if (res.ubah_akses == "success") {

                    Swal.fire({
                        icon: res.ubah_akses,
                        title: res.pesan_akses
                    });
                    $("#frm_akses")[0].reset();
                    $("#akses_user").modal('hide');
                    data_user();

                } else {

                    Swal.fire({
                        icon: res.ubah_akses,
                        title: res.pesan_akses
                    });

                }
            }
        })
    })


    // password
    $(document).on("click", "#btn_pass", function() {
        data = $(this).data('password');
        $("#frm_pass")[0].reset();
        $("#id_pass").val(data);




    });

    $("#frm_pass").submit(function(e) {

        e.preventDefault();
        id = $("#id_pass").val();
        pass1 = $("#ubah_password_user").val();
        pass2 = $("#ubah_confirm_password_user").val();
        kunciPass1 = kunci.encrypt(pass1, noValue);

        kuncipass2 = kunci.encrypt(pass2, noValue);

        data = $(this).serialize();
        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/Ubahpass',
            type: 'POST',
            data: {
                id: id,
                pass1: kunciPass1,
                pass2: kuncipass2
            },
            dataType: 'json',
            chace: false,
            success: function(res) {

                if (res.ubah_pass == "success") {

                    Swal.fire({
                        icon: res.ubah_pass,
                        title: res.pesan_pass
                    });
                    $("#frm_pass")[0].reset();
                    $("#pass_user").modal('hide');
                    data_user();

                } else {

                    Swal.fire({
                        icon: res.ubah_pass,
                        title: res.pesan_pass
                    });

                }
            }
        })
    })

    // level
    $(document).on("click", "#btn_level", function() {
        data = $(this).data('level');
        $("#id_level").val(data);
        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/get_user_manage',
            type: 'POST',
            data: {
                id: data
            },
            dataType: 'json',
            success: function(res) {
                if (res.level == "user") {
                    $("#ubah_level").val(res.level);
                    $("#user_jabatan").hide();
                    $("#user_jabatan").show();
                    $("#ubah_jabatan").val(res.jabatan);
                } else {
                    $("#ubah_level").val(res.level);
                    $("#user_jabatan").show();
                    $("#user_jabatan").hide();
                    $("#ubah_jabatan").val('');

                }
            }
        })
    });



    $("#frm_level").submit(function(e) {
        e.preventDefault();
        data = $(this).serialize();

        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/UbahLevel',
            type: 'POST',
            data: data,
            dataType: 'json',
            chace: false,
            success: function(res) {
                if (res.ubah_level == "success") {

                    Swal.fire({
                        icon: res.ubah_level,
                        title: res.pesan_level
                    });
                    $("#frm_level")[0].reset();
                    $("#level_user").modal('hide');
                    data_user();

                } else {

                    Swal.fire({
                        icon: res.ubah_level,
                        title: res.pesan_level
                    });

                }
            }
        })

    })
</script>