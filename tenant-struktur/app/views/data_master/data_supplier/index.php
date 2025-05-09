<link rel="stylesheet" href="<?= BASEURL ?>/css/style/data_barang.css">

<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    DATA SUPPLIER
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <button class="btn btn-bg btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add_modal_supp" id="add_supli">+ Tambah Supplier</button>
    </div>
    <div class="card-body" id="data_supl">
    </div>
</div>
<!-- tutup table  -->

<!-- buka form tambah data -->
<?php
include "modal.php";
?>


<script>
    $(document).ready(function() {
        Supplier();
    });


    function Supplier() {
        $.ajax({
            url: '<?= BASEURL ?>/supplier/get_masterSup',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#data_supl").html(res);
            }
        })
    }


    $("#add_supli").click(function() {

        $.ajax({
            url: '<?= BASEURL ?>/supplier/kode',
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                $("#id_sups").val(res.tampilkan);
            }
        })

    })
</script>