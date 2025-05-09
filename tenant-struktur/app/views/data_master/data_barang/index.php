<style>

</style>


<link rel="stylesheet" href="<?= BASEURL ?>/css/style/data_barang.css">

<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    DATA BARANG
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <button class="btn btn-bg btn-sm" type="button" id="add" data-add="">+ Tambah Barang</button>
    </div>
    <div class="card-body" id="data">
    </div>
</div>
<!-- tutup table  -->

<!-- buka form tambah data -->
<?php include "modal.php" ?>

<!-- tutup form tambah data -->

<script>
    $(document).ready(function() {
        data_barang();
        // jenis_barang();
    });

    // fade tooggle
    $('#add').on('click', function() {

        $('#tambah').delay().fadeIn(500);
        setTimeout(function() {
            $('#tambah').modal("show");
        });



        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang/kode',
            dataType: 'json',
            success: function(a) {
                $("#id_co").val(a.tampilkan);
            }
        });
    });
    // Tampilkan data
    function data_barang() {

        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang/get_data',
            dataType: 'html',
            success: function(res) {
                $("#data").html(res);
            }
        });

    }
</script>