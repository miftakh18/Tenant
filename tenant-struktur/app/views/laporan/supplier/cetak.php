<?php

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'P',
    'margin_top' => '20',
    'font_family' => 'Arial'
]);

$mpdf->SetTitle('Record Barang Masuk');
$html = '
<style>
    table {
        font-family:Times New Roman;
        text-align: center;
        font-size:12px;
  
    }
    body{
        font-family:arial;
    }
  
    .kotak{
    width:100px;
    border:1px solid grey;
    }
.judul{
display:block;
font-weight:bold;
font-size:40px;
font-family:cambria;
letter-spacing:5px ;
}
.data_barang{
    border : 1px solid black;
}
.border-kiri{
    border-left : 1px solid black;
    padding:6px auto;
}
th{
border-bottom: 1px solid black;
}
.alamat{
    font-family:arial;
    font-size:20px;
    word-spacing: 2px;
    letter-spacing:2px ;
}

.foot{
    font-weight:bold;
    border-top: 1px solid black;
    // border-right : 1px solid black;

}
.foot2{
    font-weight:bold;
    border-top: 1px solid black;
     border-left : 1px solid black;
}

.aprove{
    border : 1px solid black;
    margin-top:20px;
}
.aprove td{

height:100px;
font-size:15px;
}
.aprove td:nth-child(2){

border-left : 1px solid black;

}
.td_ap{
    border-left : 1px solid black;

}
</style>    
<body>
<table align="center" border="0">
    <tr valign="top">
        <td width="130px">
<img src="' . BASEURL . '/img/Logo.gif" alt="" width="130px">

        </td>
        <td><span class="judul">MEUBEL INDAH</span><br>
        <span class="alamat">Jl. Kramat Jaya No. 2 Jakarta Utara<br>
       Telp.081383857615</span>
        </td>
       
    </tr>
</table>


<hr> 
<h3 align="center">
    LAPORAN SUPPLIER MASUK
    </h3>
<hr>';
$html .= '

<b>Tanggal Cetak </b>:' . date('d-m-Y') . '
<br><br>
<table width="100%" class="data_barang" cellpadding="0" cellspacing="0">
<thead>
<tr class="">
    <th>No</th>
    <th class ="border-kiri">Nama Supplier</th>
    <th class ="border-kiri">Tanggal </th>
    <th class ="border-kiri">Jam</th>

</tr>    
</thead>

<tbody>';
$no = 1;
$jumlah = 0;
foreach ($data as $dt) {
    $html .= '
    <tr class ="border-kiri">
    <td>
    ' . $no++ . '
    </td>
    <td class ="border-kiri">
    ' . $dt['nama_supplier'] . '
    </td>
    <td class ="border-kiri">
    ' . date('d-m-Y', strtotime($dt['waktu'])) . '
    </td>
    <td class ="border-kiri">
    ' .  date('H:i', strtotime($dt['waktu'])) . '
    </td>
    </tr>
    ';
}


$html .=
    '
    </tbody>

</table>

<table width="100%" class="aprove" cellpadding="0" cellspacing="0">
<tr>
<th >Pembawa</th>
<th class="td_ap">Di Setujui</th>
</tr>
<tr>
<td></td>
<td></td>
</tr>
</table>

</body>';













$mpdf->WriteHTML($html);
$mpdf->Output();
