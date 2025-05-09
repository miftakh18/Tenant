<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    DATA BARANG MASUK
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <button type="button" class="btn btn-bg btn-sm" id="add">+ Tambah Transaksi Barang Masuk </button>
    </div>
    <div class="card-body  " id="table">

    </div>
</div>
<?php include "modal.php"; ?>
</div>


<script>
    $(document).ready(function() {



        Data();

    });

    $('#add').on('click', function() {

        $('#tambah').delay().fadeIn(500);
        setTimeout(function() {
            $('#tambah').modal("show");
        });


        $.ajax({

            url: '<?= BASEURL ?>/data_barang_masuk/kode',
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                $("#id_tm").val(res.tampilkan);
            }
        })
    });

    function Data() {

        $.ajax({
            type: 'POST',
            url: '<?= BASEURL ?>/data_barang_masuk/getData',
            dataType: 'html',
            success: function(e) {
                $('#table').html(e);
            }

        });

    }
</script>