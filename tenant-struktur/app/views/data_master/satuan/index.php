<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    SATUAN BARANG
</div>
<div class=" card shadow">

    <div class="card-header text-white" style="background-color: #4e5669;">
        <a href="#" class="btn btn-bg btn-sm" data-bs-target="#tambah" id="satuan">+ Tambah Satuan</a>
    </div>
    <div class="card-body " id="data">

    </div>
    <?php include "modal.php"; ?>


    <script>
        $(document).ready(function() {
            satuan();
        });


        function satuan() {
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL ?>/satuan/getdata',
                dataType: 'html',
                chace: false,
                success: function(data) {
                    $("#data").html(data);
                }
            });
        }

        $('#satuan').on('click', function() {

            $('#tambah').delay().fadeIn(500);
            setTimeout(function() {
                $('#tambah').modal("show");
            }, );

            $.ajax({
                url: '<?= BASEURL ?>/satuan/kode',
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    $("#id_sat").val(res.tampilkan);
                }
            })

        });
    </script>