<?php

$dari = $data['dari'];
$sampai =  $data['sampai'];
$bulan  = $data['bulan'];
$tahun = $data['tahun'];
function bulan($b)
{
    $bulan = [
        '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    return $bulan[$b];
}

?>
<style>
    .kepala {
        width: 100%;
        text-align: center;

    }

    /* .kepala-2 {} */

    .kepala-span {
        /* display: flex; */
        display: block;
        text-align: center;
        margin-left: 10px;
        margin-top: 10px;
        /* background-color: yellow; */
    }

    .kepala-gambar {
        /* background-color: blue; */
        /* margin-left: 50px; */
        width: 50%;
    }

    /* .kepala-m {
        /* text-align: left; */
    /* padding-left: 20%;
        padding-right: 30%; */

    /* } */

    .justi {
        display: flex;
        justify-content: space-between;
    }

    .data2 tr th {
        text-align: center;
        border: 1px solid black;
    }

    .data2 tr td {
        text-align: left;
        border: 1px solid black;
        padding-left: 10px;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    .text-1 {
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .hr {
        width: 100%;
    }

    .aprove tr td,
    .aprove tr th {
        text-align: center;
        border: 1px solid black;
    }
</style>
<div class="card shadow">

    <div class="card-body">

        <?php if (!empty($bulan)) : ?>
            <a id="pdf_masuk" href="<?= BASEURL ?>/barang_masuk/cetak/bulan/<?= $bulan . '/' . $tahun ?>" target="_blank" class="btn btn-sm btn-outline-danger"> <i class="fas fa-file-pdf me-2"></i>PDF</a>

        <?php else : ?>
            <a id="pdf_masuk" href="<?= BASEURL ?>/barang_masuk/cetak/tanggal/<?= $dari . '/' . $sampai ?>" target="_blank" class="btn btn-sm btn-outline-danger"> <i class="fas fa-file-pdf me-2"></i>PDF</a>
        <?php endif ?>
        <table class="kepala">
            <tr>
                <td class="kepala-m ">

                    <table width="100%" class="kepala-2">
                        <tr>

                            <td align="center">
                                <img src="<?= BASEURL . '/img/header.gif' ?>" alt="" class="kepala-gambar">


                            </td>

                        </tr>

                    </table>
                </td>

            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td align="center">
                                <hr class="hr">
                                <h3> <b> LAPORAN BARANG MASUK</b></h3>
                                <hr class="hr">
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="justi">
                        <table>

                            <tr>
                                <td>
                                    <?php if ($_SESSION['jabatan'] == 'owner') : ?>
                                        <b>&nbsp; penyetuju</b>
                                    <?php else : ?>
                                        <?php if ($_SESSION['jabatan'] == 'admin gudang') : ?>
                                            <b>&nbsp; pembawa</b>
                                        <?php endif  ?>
                                    <?php endif ?>
                                </td>
                                <td>:</td>
                                <td><?= $_SESSION['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>&nbsp; Jabatan</b></td>
                                <td>:</td>
                                <td><?= $_SESSION['jabatan']; ?></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <b>
                                        &nbsp; Tanggal Cetak
                                    </b>
                                </td>
                                <td>&nbsp; :&nbsp; </td>
                                <td><?= date('d-m-Y'); ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if (!empty($dari && $sampai)) : ?>
                                        <b>
                                            &nbsp; Periode Per Tanggal
                                        </b>
                                        <?php else :
                                        if (!empty($bulan)) : ?>
                                            <b>
                                                &nbsp; Periode Bulan
                                            </b>
                                    <?php endif;
                                    endif ?>
                                </td>
                                <td>&nbsp; :&nbsp; </td>
                                <td>
                                    <?php if (!empty($dari && $sampai)) {
                                        echo date('d-m-Y', strtotime($dari)) . '  s/d  ' . date('d-m-Y', strtotime($sampai));
                                    } elseif (!empty($bulan)) {
                                        echo bulan($bulan) . ' ' . $tahun;
                                    }
                                    ?>


                                </td>
                            </tr>

                        </table>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <br>
                    <br>
                    <table class="data2" width="100%" align="center">
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG </th>
                            <th>JENIS BARANG </th>
                            <th>SUPPLIER</th>
                            <th>JUMLAH MASUK</th>
                        </tr>
                        <?php
                        $no = 1;
                        $jumlah = 0;
                        $masuk = $data['data_masuk']->getTable($dari, $sampai, $bulan, $tahun);
                        foreach ($masuk as  $row) :
                            $jenis = $data['jenis']->getEditJenis($row['jenis_barang']);

                        ?>

                            <tr>
                                <td> <?= $no++ ?></td>
                                <td> <?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                                <td> <?= $row['nama_barang'] ?></td>
                                <td> <?= $jenis['nama_jenis'] ?></td>
                                <td><?= $row['nama_supplier']; ?></td>
                                <td><?= $row['jumlah_masuk']; ?></td>
                            </tr>

                        <?php
                            $jumlah  += $row['jumlah_masuk'];
                        endforeach ?>
                        <tr>
                            <th colspan="5">Total jumlah</th>
                            <td> <b><?= $jumlah; ?></b></td>
                        </tr>
                    </table>


                </td>
            </tr>
            <tr>

                <td>
                    <br>
                    <br>
                    <br>
                    <!-- <table width="100%" class="aprove" cellpadding="0" cellspacing="0" border="1">
                        <tr>
                            <th>Pembawa</th>
                            <th>Di Setujui</th>
                        </tr>
                        <tr>
                            <td height="100px"> <button> Pembawa</button></td>
                            <td><button> Aprove Owner</button></td>
                        </tr>
                    </table> -->
                </td>
            </tr>



        </table>


    </div>
</div>