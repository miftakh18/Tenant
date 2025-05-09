<link rel="stylesheet" href="<?= BASEURL ?>/css/style/pass.css">
<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    UBAH DATA AKUN
</div>
<div class="card shadow pass">

    <div class="card-body">
        <div class="container" id="showAkun">
        </div>
        <div class="container" id="ubahAkun">
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        showAkun();
        UbahAkun();
        // $("#showAkun").hide();
        $("#showAkun").show();
        // $("#ubahAkun").show();
        $("#ubahAkun").hide();
        $(document).on("click", "#edit_akun", function() {
            $("#showAkun").show();
            $("#showAkun").hide().delay().fadeOut(500);
            $("#ubahAkun").show().delay().fadeIn(500);

            // UbahAkun();
        });
        $(document).on("click", "#submit_akun", function() {
            $("#ubahAkun").show();
            $("#ubahAkun").hide();
            $("#showAkun").show();


        });
    });




    function showAkun() {
        $.ajax({
            url: '<?= BASEURL ?>/data_akun/showAkun',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#showAkun").html(res);
            }
        })
    }

    function UbahAkun() {
        $.ajax({
            url: '<?= BASEURL ?>/data_akun/ubahAkun',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#ubahAkun").html(res);
            }
        })
    }
</script>