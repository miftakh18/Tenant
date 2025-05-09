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
    LAPORAN BARANG KELUAR
</div>
<?php if ($_SESSION["level"] == "admin" || $_SESSION['jabatan'] == 'owner') : ?>

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
                            <div class="col"> <input type="date" name="dari_keluar" id="dari_keluar" class="form-control"></div>
                            <div class="col"></div>

                            <div class="col pt-3 d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="row row-cols-4 d-flex justify-content-start">
                            <div class="col pt-3">Sampai</div>
                            <div class="col pt-3">:</div>
                            <div class="col pt-3"><input type="date" name="sampai_keluar" id="sampai_keluar" class="form-control">

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
                                    <select name="per_bulan_keluar" id="per_bulan_keluar" class="form-select">
                                        <option value="">--> Pilih Bulan <--- </option>
                                                <?php
                                                $bulan = [
                                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                                ];
                                                foreach ($bulan as $no => $bul) : ?>
                                        <option value="<?= $no + 1; ?>"><?= $bul; ?></option>

                                    <?php endforeach ?>
                                    </select>
                                    <select name="tahun_keluar" id="tahun_keluar" class="form-select">
                                        <option value="">--> Pilih Bulan <--- </option>
                                                <?php
                                                $a = date('Y');
                                                for ($i = $a; $i >= 1; $i--) : ?>

                                        <option value="<?= $i ?>"> <?= $i; ?></option>
                                    <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col pt-3">
                        <div class="btn-group">
                            <div id="aprove">
                                <form action="<?= BASEURL ?>/barang_keluar/ShowBK" method="POST">
                                    <input type="hidden" id="dari_k" name="dari_k">
                                    <input type="hidden" id="samp_k" name="samp_k">
                                    <input type="text" id="bul_k" name="bul_k">
                                    <input type="text" id="tahun_k" name="tahun_k">
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
        <input type="hidden" id="dari_k" name="dari_k">
        <input type="hidden" id="samp_k" name="samp_k">
        <input type="hidden" id="bul_k" name="bul_k">
        <input type="hidden" id="dari_keluar" name="dari_keluar">
        <input type="hidden" id="sampai_keluar" name="sampai_keluar">
        <input type="hidden" id="per_bulan_keluar" name="per_bulan_keluar">
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

        table_keluar();



        $("#aprove").hide();
        $("#wadah1").hide();
        $("#wadah2").hide();
        $("#cari").hide();

        dar = $("#dari_keluar").val();
        sam = $("#sampai_keluar").val();
        bulan = $("#per_bulan_keluar").val();
        $("#dari_k").val(dar);
        $("#samp_k").val(sam);
        $("#pdf_masuk").attr('href', <?php echo json_encode(BASEURL . '/barang_keluar/cetak/') ?>) + dar + '/' + sam;

        $("#dari_keluar, #sampai_keluar").on("change", function() {
            dari_tangkep = $("#dari_keluar").val();
            sampai_tangkep = $("#sampai_keluar").val();
            $("#dari_k").val(dari_tangkep);
            $("#samp_k").val(sampai_tangkep);
            $("#tahun_k").val('');
            $("#bul_k").val('');
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

        $("#per_bulan_keluar ,#tahun_keluar").change(function() {
            bulan_tangkep = $("#per_bulan_keluar").val();
            tahun_keluar = $("#tahun_keluar").val();
            $("#bul_k").val(bulan_tangkep);
            $("#tahun_k").val(tahun_keluar);
            $("#dari_k").val('');
            $("#samp_k").val('');
            $("#aprove").show();
        });
    });


    $("#pilih_per").change(function() {
        nilai = $(this).val();

        if (nilai == "1") {
            $("#wadah1").show();
            $("#cari").show();
            $("#wadah2").hide();
            $("#bul_k").val('');
            $("#tahun_k").val('');

        } else if (nilai == "2") {
            $("#wadah2").show();
            $("#wadah1").hide();
            $("#cari").show();

            $("#dari_k").val('');
            $("#samp_k").val('');

        } else {
            $("#wadah1").hide();
            $("#wadah2").hide();
            $("#cari").hide();

        }
    });


    function table_keluar() {

        dari = $("#dari_keluar").val();
        sampai = $("#sampai_keluar").val();
        bulan = $("#per_bulan_keluar").val();
        tahun = $("#tahun_keluar").val();
        $.ajax({
            url: '<?= BASEURL ?>/barang_keluar/getData',
            type: 'POST',
            data: {
                bulan: bulan,
                dari: dari,
                sampai: sampai,
                tahun: tahun
            },
            dataType: 'html',
            success: function(table) {
                $("#table_data").html(table);


            }
        });


    }
    $("#cari").click(function() {
        table_keluar();

    });
</script>