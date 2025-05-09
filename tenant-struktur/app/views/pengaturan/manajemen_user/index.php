<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    DATA USER
</div>
<div class=" card shadow" style="margin: 10px 20px auto;">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <button type="button" id="tambahkan" class="btn btn-bg" data-bs-toggle="modal" data-bs-target="#add">+ Tambah User</button>
    </div>
    <div class="card-body" id="table_user">

    </div>
</div>
<?php include "modal.php"; ?>





<script>
    $(document).ready(function() {
        data_user();
    });


    function data_user() {

        $.ajax({
            url: '<?= BASEURL ?>/manajemen_user/get_manage',
            type: 'POST',
            dataType: 'html',
            success: function(res) {
                $("#table_user").html(res);
            }
        })

    }
</script>