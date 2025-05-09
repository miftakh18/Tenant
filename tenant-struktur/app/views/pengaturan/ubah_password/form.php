<div class="card shadow pass">

    <div class="card-body">
        <form method="POST" id="frm_ubah_ps">
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="<?= $_SESSION['id'] ?>" required>
                <label class="form-label">Password lama </label>
                <input class="form-control form-control-sm" type="password" id="passs_lama" name="passs_lama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password baru </label>
                <input class="form-control form-control-sm" type="password" id="pass_baru" name="pass_baru" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password baru </label>
                <input class="form-control form-control-sm" type="password" id="co_pass_baru" name="co_pass_baru" required>
            </div>
            <div class="mb3">
                <button type="submit" class="btn rounded-2 text-white form-control" style="  background-color: #29c7ca;"> Ubah Password</button>
            </div>
        </form>

    </div>
</div>



<script>
    $(document).ready(function() {
        kunci = new Encryption();
        noValue = 'meubelindah12345';
        $("#frm_ubah_ps")[0].reset();
    });
    $("#frm_ubah_ps").submit(function(e) {
        e.preventDefault();
        id = $("#id").val();
        pass = kunci.encrypt($("#passs_lama").val(), noValue);
        pass1 = kunci.encrypt($("#pass_baru").val(), noValue);
        pass2 = kunci.encrypt($("#co_pass_baru").val(), noValue);

        $.ajax({
            url: '<?= BASEURL ?>/ubah_password/UbahSandi',
            type: 'POST',
            data: {
                id: id,
                pass: pass,
                pass2: pass2,
                pass1: pass1
            },
            dataType: 'json',
            success: function(res) {
                if (res.logo == "success") {

                    Swal.fire({
                        icon: res.logo,
                        title: res.pesan,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#frm_ubah_ps")[0].reset();
                            ubahsandi();
                        }
                    })


                } else {

                    Swal.fire({
                        icon: res.logo,
                        title: res.pesan
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#frm_ubah_ps")[0].reset();
                            ubahsandi();
                        }
                    })

                }
            }
        })
    });
</script>