<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    LAPORAN STOK BARANG</div>
<div class=" card shadow" style="margin: 10px 20px auto;">

    <div class="card-header text-white" style="background-color: #4e5669;">
        Stok Barang Sudah Mencapai Batas Minimum </div>
    <div class="card-body " id="data">
        <table class="table table-bordered table-light" id="tableData">
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        data_stok();
    });


    function data_stok() {

        $.ajax({
            url: '<?= BASEURL ?>/stok_barang/getStok',
            type: 'POST',
            dataType: 'html',
            success: function(e) {
                $("#tableData").html(e);

            }

        });

    }
</script>