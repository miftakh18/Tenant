<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    JENIS BARANG
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <a href="#" class="btn btn-bg btn-sm" id="tambah_jenis">+ Tambah Jenis Barang</a>
    </div>
    <div class="card-body " id="data">
    </div>
</div>
<?php include "modal.php"; ?>



<script>
    $(document).ready(function() {
        data();

    });

    // fade tooggle
    $('#tambah_jenis').on('click', function() {

        $('#tambah_modal_jenis').delay().fadeIn(500);
        setTimeout(function() {
            $('#tambah_modal_jenis').modal("show");
        });


        $.ajax({
            url: '<?= BASEURL ?>/jenis_barang/kode',
            dataType: 'json',
            success: function(a) {
                $("#id_jen").val(a.tampilkan);
            }
        })

    });
    // Tampilkan data
    function data() {

        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/jenis_barang/getTable',
            dataType: 'html',
            success: function(res) {
                $("#data").html(res);
            }
        });

    }
</script>