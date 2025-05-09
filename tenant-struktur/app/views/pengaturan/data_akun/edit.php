<div class="d-flex justify-content-end">
    <button id="submit_akun" class="btn btn-close" type="button"></button>

</div>
<form id="frm_akun_a" method="POST">
    <table class=" table  mt-3">
        <tr>
            <th class="text-center" colspan="3">Data Akun </th>
        </tr>
        <tr>
            <td width="30%"> <b> Nama</b></td>
            <td width="2%">:</td>
            <td><input type="hidden" id="id" name="id" value="<?= $_SESSION['id'] ?>">
                <input type="text" id="nama_akun" name="nama_akun" value="<?= $data['nama']; ?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td width="30%"> <b> Jabatan</b></td>
            <td width="2%">:</td>
            <td>
                <select name="jabatan" id="jabatan" class="form-select">
                    <?php
                    $x = ['admin', 'karyawan', 'owner'];
                    foreach ($x as $no => $r) : ?>

                        <option value="<?= $r ?>" <?php if ($r == $data['jabatan']) {
                                                        echo 'selected';
                                                    } ?>><?= $r; ?></option>
                    <?php endforeach ?>

                </select>
            </td>
        </tr>
        <tr>
            <td width="30%"> <b> Jenis Kelamin</b></td>
            <td width="2%" class="my-3">:</td>
            <td>
                <div class="col my-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" <?php
                                                                                                                            if ($data['jk'] == "Laki-Laki") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> required>
                        <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php
                                                                                                                            if ($data['jk'] == "Perempuan") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
            </td>
        </tr>
        <tr>
            <td width="30%"> <b> Username</b></td>
            <td width="2%">:</td>
            <td> <input type="text" id="username" name="username" value="<?= $data['username']; ?>" class="form-control" required></td>
        </tr>
        <tr>
            <td width="30%"> <b> Alamat</b></td>
            <td width="2%">:</td>
            <td><textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= $data['alamat']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="d-grid gap-2">
                    <!-- <button type="submit" class="btn btn-sm btn-outline-primary">Update</button> -->
                    <button type="submit" class="btn text-white" style="  background-color: #29c7ca;">Update Data</button>

                </div>
            </td>
        </tr>
    </table>
</form>

<script>
    $("#frm_akun_a").submit(function(e) {
        e.preventDefault();
        data = $(this).serialize();

        $.ajax({
            url: '<?= BASEURL ?>/data_akun/Update_akun',
            type: 'POST',
            data: data,
            chace: false,
            dataType: 'json',
            success: function(res) {
                if (res.username.status == "stay") {

                    Swal.fire({
                            icon: res.username.logo,
                            title: res.username.pesan
                        })
                        .then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {

                                Swal.fire({
                                    icon: res.tanpa_username.logo,
                                    title: res.tanpa_username.pesan
                                });
                                $("#frm_akun_a")[0].reset();
                                showAkun();
                                UbahAkun();

                                $("#ubahAkun").hide();
                                $("#showAkun").show();

                            }
                        });

                } else {
                    if (res.tanpa_username.logo == "success") {

                        Swal.fire({
                            icon: res.tanpa_username.logo,
                            title: res.tanpa_username.pesan
                        });
                        $("#frm_akun_a")[0].reset();
                        showAkun();
                        UbahAkun();

                        $("#ubahAkun").hide();
                        $("#showAkun").show();
                    } else {
                        Swal.fire({
                            icon: res.tanpa_username.logo,
                            title: res.tanpa_username.pesan
                        });
                    }
                }
            }
        });
    });
</script>