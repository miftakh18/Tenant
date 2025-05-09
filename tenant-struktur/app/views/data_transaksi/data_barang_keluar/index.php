<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    DATA BARANG KELUAR
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">

        <?php if ($_SESSION['level'] == 'user' && $_SESSION['jabatan'] == 'karyawan') : ?>
            <button class="btn btn-bg btn-sm" id="add">+ Tambah Request Barang</button>
        <?php endif ?>
    </div>
    <div class="card-body " id="table">

    </div>
</div>

<?php include "modal.php"; ?>



<script>
    $(document).ready(function() {
        nama_barang();

        data_keluar();
    });

    $('#add').on('click', function() {

        $('#tambah').delay().fadeIn(500);
        setTimeout(function() {
            $('#tambah').modal("show");
        });



        $.ajax({
            url: '<?= BASEURL ?>/data_barang_keluar/kode',
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                $("#id_kel").val(res.tampilkan);
            }
        })
    });


    function data_keluar() {

        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_keluar/getDataKeluar',
            dataType: 'html',
            success: function(e) {
                $('#table').html(e);
            }

        });

    }

    function nama_barang() {
        $.ajax({
            url: '<?= BASEURL ?>/data_barang_keluar/nama_barang_keluar',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#nama_barang_keluar").html(res);
            }
        })

    }
</script>