<style>
    @media only screen and (min-width: 768px) {
        .cari {
            margin: 0px 200px auto;
        }
    }
</style>
<?php
$tanggal_akhir =  $data['coba']['tanggal'];
?>

<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    LAPORAN SUPPLIER MASUK
</div>
<div class=" text-center rounded " style="margin: 0px 10% auto;">
    <div class="border-1">
        <div class="card-body shadow border ">
            <!-- <form method="post" action="#" id="idcari"> -->
            <div class="container">

                <div class="row row-cols-4 d-flex justify-content-start">
                    <div class="col">Dari</div>
                    <div class="col">:</div>
                    <div class="col"> <input type="date" name="dari_supplier" id="dari_supplier" class="form-control" value="<?= $tanggal_akhir
                                                                                                                                ?>"></div>
                    <div class="col"></div>

                    <div class="col pt-3 d-flex justify-content-end">
                    </div>
                </div>
                <div class="row row-cols-4 d-flex justify-content-start">
                    <div class="col pt-3">Sampai</div>
                    <div class="col pt-3">:</div>
                    <div class="col pt-3"><input type="date" name="sampai_supplier" id="sampai_supplier" class="form-control" value="<?= date('Y-m-d')  ?>">

                    </div>
                    <div class="col pt-3">
                        <button type="button" class="btn btn-sm text-white" id="cari_sup" style="  background-color: #08acafe1;">Cari</button>

                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>

</div>
<div class=" card shadow" style="margin: 10px 20px auto;">
    <div class="card-header text-white" style="background-color: #4e5669; ">
        <div style="width: 250px;float:left">
        </div>
        <div style="float:right">
            <div>
                <form id="frm_cetak" action="<?= BASEURL ?>/supplier/AproveLap" method="POST">
                    <input type="text" id="dar_sp" name="dar_sp">
                    <input type="text" id="sam_sp" name="sam_sp">
                    <button type="submit">Ap</button>
                </form>
                <a id="pdf_supplier" target="_blank" class="btn btn-sm btn-outline-light">PDF</a>

            </div>


        </div>
    </div>

    <div class="card-body" id="table_data">
    </div>
</div>



<script>
    $(document).ready(function() {
        table_lap_supplier();
        dar = $("#dari_supplier").val();
        sam = $("#sampai_supplier").val();

        $("#dar_sp").val(dar);
        $("#sam_sp").val(sam);

        $("#pdf_supplier").attr('href', <?php echo json_encode(BASEURL . '/supplier/cetakLaporanSup/') ?>) + dar + '/' + sam;

        $("#dari_supplier, #sampai_supplier").on("change", function() {

            dari_tangkep = $("#dari_supplier").val();
            sampai_tangkep = $("#sampai_supplier").val();
            $("#dar_sp").val(dari_tangkep);
            $("#sam_sp").val(sampai_tangkep);
            $.ajax({
                url: '<?= BASEURL ?>/supplier/dataKeCetakSup',
                type: 'POST',
                data: {
                    dari: dari_tangkep,
                    sampai: sampai_tangkep
                },
                dataType: 'json',
                success: function(res) {
                    $("#pdf_supplier").attr('href', res.url + res.dari + '/' + res.sampai);
                }
            });



        });

    });

    function table_lap_supplier() {
        dari = $("#dari_supplier").val();
        sampai = $("#sampai_supplier").val();

        $.ajax({
            url: '<?= BASEURL ?>/supplier/get_laporan',
            type: 'POST',
            data: {
                dari_tangkep: dari,
                sampai_tangkep: sampai
            },
            dataType: 'html',
            success: function(table) {
                $("#table_data").html(table);

            }
        });


    }
    $("#cari_sup").click(function() {
        table_lap_supplier();

    });
</script>