<?php
// session_start();
?>

<link rel="stylesheet" href="<?= BASEURL ?>/css/style/dashboard.css">
<div class="alert body-feature" role="alert">
    Selamat Datang <?= $_SESSION["nama"]; ?> di Aplikasi Inventori Gudang Meubel Indah

</div>
<div class="row d-flex justify-content-around my-2">

    <!-- <div class="card "> -->

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card kotak-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1 ">
                            <h6 class="fw-bolder" style="font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont, 'Segoe UI',
                            Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol',
                            'Noto Color Emoji';line-height:1.5"> Data Barang</h6>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $data['data_table']->getJumlah_dataBarang() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card kotak-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold text-success text-uppercase mb-1">
                            <h6 class="fw-bolder" style="font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont, 'Segoe UI',
                            Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol',
                            'Noto Color Emoji';line-height:1.5"> Transaksi MasuK</h6>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $data['data_table']->getJumlah_tMasuk() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card kotak-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold text-success text-uppercase mb-1">
                            <h6 class="fw-bolder" style="font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont, 'Segoe UI',
                            Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol',
                            'Noto Color Emoji';line-height:1.5"> Transaksi Keluar </h6>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['data_table']->getJumlah_tKeluar() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card kotak-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold text-warning text-uppercase mb-1">
                            <h6 class="fw-bolder" style="font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont, 'Segoe UI',
                            Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol',
                            'Noto Color Emoji';line-height:1.5"> User</h6>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['data_table']->getJumlahUser();
                                                                            ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- </div> -->

<div class=" card shadow" style="margin: 2px 0px auto;">

    <div class="card-header text-white">
        Stok Barang Sudah Mencapai Batas Minimum </div>

    <div class="my-3 ms-5">
        <label class="d-block">
            <div style=" width: 20px ;height:20px; float:left" class="bg-danger me-2"></div>
            <i>Habis</i>
        </label>
        <label class="">
            <div style="width: 20px ;height:20px; float:left" class="bg-warning me-2"></div>
            <i>Hampir Habis</i>
        </label>
    </div>
    <div class="card-body " id="dataDashboard">

    </div>
</div>

<script>
    $(document).ready(function() {
        data_Dashboard();
    });

    function data_Dashboard() {

        $.ajax({
            url: '<?= BASEURL ?>/dashboard/getTableDas',
            type: 'POST',
            dataType: 'html',
            success: function(e) {
                $("#dataDashboard").html(e);

            }

        });

    }
</script>