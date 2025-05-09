<?php


$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'P',
    'margin_top' => '20',

]);

if ($data['tipe'] == 'bulan') {
    $judul = 'Periode Bulanan';
} elseif ($data['tipe'] == 'tanggal') {
    $judul = 'Periode Per Tanggal ';
}

$mpdf->SetTitle('Record Barang Keluar - ' . $judul);
function bulan($b)
{
    $bulan = [
        '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    return $bulan[$b];
}


function Indo($c)
{
    $b = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $pecah = explode('-', $c);
    return $pecah[2] . ' ' . $b[(int)$pecah[1]] . ' ' . $pecah[0];
}
$html = '
<style>
body{
    margin:0px;
font-family : arial;
}
.container{
// border:1px solid black;
align-content: center;
padding: 20px 20px auto;

}
.cover{
// border:1px solid black;
width:450px;
margin-left:60px;
// background-color:yellow;
}
.judul{
    text-align:center;
    font-wight:bold;
    font-size:16px;
    margin-bottom:5px;
}
table{
font-size:12px;

}
.kiri
{
// border:1px solid black; 
    float:left;
    font-size:12px;

    width:50%;
}
.data{
    width: 100%;
    margin:20px auto;
   
}
.data, .data td,.data th {
    border: 1px solid;
  }
  
  .aprove, .aprove td,.aprove th {
    border: 1px solid;
  }
  .data {
    width: 100%;
    border-collapse: collapse;
  }
  .aprove {
    width: 100%;
    border-collapse: collapse;
  }
.data td{
    
    padding:5px 10px 5px 10px;
}
.kanan
{
    font-size:12px;
    margin-left:200px;
// border:1px solid black; 


}
.size-font{
    // font-size:12px;
    font-family:arial;
}
</style>    
<body>
<div class="container">
    <div class = "cover">
            <img src="' . BASEURL . '/img/header.gif" alt="" class="kepala-gambar">
    </div>

    <div class="judul">
        <hr>
            <b>
                LAPORAN BARANG KELUAR
            </b>
        <hr>
    </div>
    <div>
        <div class="kiri">
        <div style="display:block"><table>
        <tr><td class="size-font"><b >Nama Pencetak</b></td><td>:</td>
        <td>' . $_SESSION['nama'] . '</td></tr>
        
        <tr><td class="size-font"><b class="size-font">Jabatan</b></td><td>:</td>
        <td>' . $_SESSION['jabatan'] . '</td></tr>
        
        </table>
        </div>
         </div>
        <div class="kanan"> 
        <div style="display:block">
        <table>
        <tr><td class="size-font"><b >Tanggal Cetak</b></td><td>:</td>
        <td>' . Indo(date('Y-m-d')) . '</td></tr>
        
        <tr>
        ';

if (!empty($data['bulan'])) {
    $html .= '
    <td class="size-font"><b class="size-font">Periode Bulan</b><td>:</td><td> ' .
        bulan($data['bulan']) . ' ' . $data['tahun'] . '</td>
    ';
} elseif (!empty($data['dari'] && $data['sampai'])) {
    $html .= '
        <td class="size-font"><b class="size-font">Periode Tanggal</b><td> :</td><td> ' .
        Indo($data['dari']) . '<b class="size-font"> s/d </b>' . Indo($data['sampai']) . '</td>

        ';
}
$html .= '
</tr>
        
        </table>
    </div>
</div>

<div style="display:block">

<table class="data">
<thead>
<tr>
<th>NO</th>
<th>TANGGAL</th>
<th>NAMA BARANG</th>
<th>JENIS BARANG</th>

<th width="70px">JUMLAH KELUAR</th>
</tr>
<tbody>';
$jumlah = 0;
$no = 1;
foreach ($data['sql'] as $row) {
    $jenis = $data['jenis']->getEditJenis($row['jenis_barang']);
    $html .= '<tr>

<td>' . $no++ . '</td>
<td>' . Indo($row['tanggal']) . '</td>
<td>' . $row['nama_barang'] . '</td>
<td>' . $jenis['nama_jenis'] . '</td>
<td>' . $row['jumlah_keluar'] . '</td>

</tr>';
    $jumlah  += $row['jumlah_keluar'];
}

$html .= '

</tbody>
<tr>
<th colspan="4"> Total Jumlah</th>
<td><b>' . $jumlah . '</b></td>
</tr>
</thead>
</table>
</div>
<div>
<table width="100%" class="aprove" >
<tr>
    <th>Pembawa</th>
    <th>Di Setujui</th>
</tr>
<tr>
    <td height="100px" width="50%" align="center" valign="bottom" ><b>' . $_SESSION['nama'] . '</b><br> ( ' . $_SESSION['jabatan'] . ' )</td>
    <td align="center" valign="bottom"><b> Regina</b> <br> (Owner) </td>
</tr>
</table>

</div>

</body>';












$mpdf->WriteHTML($html);
$mpdf->Output();
