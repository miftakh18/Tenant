<style>
    @media only screen and (min-width: 768px) {
        .cari {
            margin: 0px 200px auto;
        }
    }
</style>
<?php
$tanggal_akhir =  $data['coba']['tanggal']; ?>

<div class="alert text-center rounded-0 text-white judul-data-barang" role="alert">
    LAPORAN BARANG MASUK
</div>
<?php if ($_SESSION['level']  == 'admin' || $_SESSION['jabatan'] == 'owner') : ?>
    <div class=" text-center rounded mb-3" style="margin: 0px 10% auto;">
        <div class="border-1">
            <div class="card-body shadow border ">
                <!-- <form method="post" action="#" id="idcari"> -->
                <div class="container">
                    <div class="col judul-data-barang text-white mb-3">
                        PILIH PERIODE
                    </div>

                    <div class="row row-cols-4 d-flex justify-content-start">
                        <div class="col pt-3">Periode</div>
                        <div class="col pt-3">:</div>
                        <div class="col pt-3">
                            <select name="pilih_per" id="pilih_per" class="form-select" required>
                                <option value=""> --- > Pilih Periode < --- </option>
                                <option value="1">Per Tanggal</option>
                                <option value="2">Per Bulan</option>
                            </select>
                        </div>
                        <div class="col pt-3">
                        </div>

                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>

    </div>

    <div class=" text-center rounded mb-3" style="margin: 0px 10% auto;">
        <div class="border-1">
            <div class="card-body shadow border">
                <!-- <form method="post" action="#" id="idcari"> -->
                <div class="container">
                    <div id="wadah1">
                        <div class="col judul-data-barang text-white mb-3">
                            PERIODE PER TANGGAL
                        </div>
                        <div class="row row-cols-4 d-flex justify-content-start">
                            <div class="col">Dari</div>
                            <div class="col">:</div>
                            <div class="col"> <input type="date" name="dari_masuk" id="dari_masuk" class="form-control"></div>
                            <div class="col"></div>

                            <div class="col pt-3 d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="row row-cols-4 d-flex justify-content-start">
                            <div class="col pt-3">Sampai</div>
                            <div class="col pt-3">:</div>
                            <div class="col pt-3"><input type="date" name="sampai_masuk" id="sampai_masuk" class="form-control">

                            </div>


                        </div>
                    </div>
                    <!-- </form> -->




                    <div id="wadah2">
                        <div class="col judul-data-barang text-white mb-3">
                            PERIODE PER BULAN
                        </div>
                        <div class="row row-cols-4 d-flex justify-content-start">
                            <div class="col pt-3">Bulan</div>
                            <div class="col pt-3">:</div>
                            <div class="col pt-3">
                                <div class="input-group mb-3">
                                    <select name="per_bulan" id="per_bulan" class="form-select">
                                        <option value="">--> Pilih Bulan <--- </option>
                                                <?php
                                                $bulan = [
                                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                                ];
                                                foreach ($bulan as $no => $bul) : ?>
                                        <option value="<?= $no + 1; ?>"><?= $bul; ?></option>

                                    <?php endforeach ?>
                                    </select>
                                    <select name="tahun" id="tahun" class="form-select">
                                        <option value=""> --> Pilih Tahun <-- </option>
                                                <?php
                                                $a = date('Y');
                                                for ($i = $a; $i >= 1; $i--) : ?>
                                        <option value="<?= $i ?>"><?= $i; ?></option>

                                    <?php endfor ?>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col pt-3">
                        <div class="btn-group">
                            <div id="aprove">
                                <form action="<?= BASEURL ?>/barang_masuk/showBM" method="POST">
                                    <input type="hidden" id="dar" name="dar">
                                    <input type="hidden" id="samp" name="samp">
                                    <input type="hidden" id="bul" name="bul">
                                    <input type="hidden" id="tah" name="tah">
                                    <button type="submit" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-eye me-2"></i>Show Laporan </button>
                                </form>

                            </div>
                            <button type="button" class="btn btn-sm text-white mb-3" id="cari" style="  background-color: #08acafe1;">Cari</button>

                        </div>
                    </div>
                    <!-- </form> -->
                </div>

            </div>

        </div>

    </div>

    <?php
else :
    if ($_SESSION['level'] == 'user' && $_SESSION['jabatan'] == 'karyawan') :
    ?>
        <input type="hidden" id="dar" name="dar">
        <input type="hidden" id="samp" name="samp">
        <input type="hidden" id="bul" name="bul">
        <input type="hidden" id="dari_masuk" name="dari_masuk">
        <input type="hidden" id="sampai_masuk" name="sampai_masuk">
        <input type="hidden" id="per_bulan" name="per_bulan">
<?php
    endif;
endif ?>
<div class=" card shadow" style="margin: 10px 20px auto;">
    <div class="card-header text-white" style="background-color: #4e5669; ">
        <div style="width: 250px;float:left">
        </div>
        <div style="float:right">



        </div>
    </div>

    <div class="card-body" id="table_data">
    </div>
</div>




<script>
    $(document).ready(function() {

        table_masuk();



        $("#aprove").hide();
        $("#wadah1").hide();
        $("#wadah2").hide();
        $("#cari").hide();

        dar = $("#dari_masuk").val();
        sam = $("#sampai_masuk").val();
        bulan = $("#per_bulan").val();
        $("#dar").val(dar);
        $("#samp").val(sam);
        $("#pdf_masuk").attr('href', <?php echo json_encode(BASEURL . '/barang_masuk/cetak/') ?> + dar + '/' + sam);

        $("#dari_masuk, #sampai_masuk").on("change", function() {
            dari_tangkep = $("#dari_masuk").val();
            sampai_tangkep = $("#sampai_masuk").val();
            $("#dar").val(dari_tangkep);
            $("#samp").val(sampai_tangkep);
            $("#bul").val('');
            $("#tah").val('');

            $("#aprove").show();
            $.ajax({
                url: '<?= BASEURL ?>/barang_masuk/dataKeCetak',
                type: 'POST',
                data: {
                    dari: dari_tangkep,
                    sampai: sampai_tangkep
                },
                dataType: 'json',
                success: function(res) {
                    $("#pdf_masuk").attr('href', res.url + res.dari + '/' + res.sampai);
                }
            });



        });

        $("#per_bulan, #tahun").change(function() {
            bulan_tangkep = $("#per_bulan").val();
            tahun_tangkep = $("#tahun").val();
            $("#bul").val(bulan_tangkep);
            $("#dar").val('');
            $("#tah").val(tahun_tangkep);
            $("#samp").val('');
            $("#aprove").show();
        });
    });


    $("#pilih_per").change(function() {
        nilai = $(this).val();

        if (nilai == "1") {
            $("#wadah1").show();
            $("#cari").show();
            $("#wadah2").hide();
            $("#bul").val('');
            $("#tah").val('');

        } else if (nilai == "2") {
            $("#wadah2").show();
            $("#wadah1").hide();
            $("#cari").show();

            $("#dar").val('');
            $("#samp").val('');

        } else {
            $("#wadah1").hide();
            $("#wadah2").hide();
            $("#cari").hide();

        }
    });


    function table_masuk() {

        dari = $("#dari_masuk").val();
        sampai = $("#sampai_masuk").val();
        bulan = $("#per_bulan").val();
        tahun = $("#tahun").val();
        $.ajax({
            url: '<?= BASEURL ?>/barang_masuk/getdata',
            type: 'POST',
            data: {
                bulan: bulan,
                tahun: tahun,
                dari_tangkep: dari,
                sampai_tangkep: sampai
            },
            dataType: 'html',
            success: function(table) {
                $("#table_data").html(table);


            }
        });


    }
    $("#cari").click(function() {
        table_masuk();

    });
</script>