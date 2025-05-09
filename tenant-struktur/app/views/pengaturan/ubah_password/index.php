<link rel="stylesheet" href="<?= BASEURL ?>/css/style/pass.css">
<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    UBAH PASSWORD
</div>
<div class="container" id="ubahpassnya">

</div>


<script>
    $(document).ready(function() {
        ubahsandi();
    });

    function ubahsandi() {
        $.ajax({
            url: '<?= BASEURL ?>/ubah_password/getForm',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#ubahpassnya").html(res);
            }
        })
    }
</script>