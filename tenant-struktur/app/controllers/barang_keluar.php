<?php

class barang_keluar extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['judul'] = 'Barang keluar';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-clipboard-list me-2"></i> Laporan / <i class="fas fa-truck-loading me-2"></i>Barang Keluar';
        $this->view('templates/header', $data);

        $data['coba'] = $this->model('model_data_keluar')->getTglAkhir();
        $this->view('laporan/barang_keluar/index', $data);
        $this->view('templates/footer');
    }



    public function Table()
    {
        $test = $this->model('model_data_keluar')->getTable();
        // $data['data'] = [];
        // foreach ($test as $row) {
        //     $data['data'] = $row;
        // }

         json_encode($test);
    }

    public function getData()
    {
        $bulan = $_POST['bulan'];
        $dari = $_POST['dari'];
        $sampai  = $_POST['sampai'];
        $tahun  = $_POST['tahun'];
        $data = $this->model('model_data_keluar')->getTable($dari, $sampai, $bulan, $tahun);
        $this->view('laporan/barang_keluar/data_table', $data);
    }


    public function getDataCetak()
    {
        $data['url'] = BASEURL . '/barang_keluar/cetak/';
        $data['dari'] = $_POST['dari'];
        $data['sampai'] = $_POST['sampai'];
        echo json_encode($data);
    }

    public function cetak($tipe = null, $dari_atau_bulan = null, $sampai_atau_tahun = null)
    {
        $this->pdf();
        $type  = $tipe;

        $bulan = '';
        $dari = '';
        $sampai  = '';
        $tahun = '';
        if ($type == 'bulan') {
            $bulan .= $dari_atau_bulan;
            $tahun .= $sampai_atau_tahun;
        } elseif ($type == 'tanggal') {
            $dari .= $dari_atau_bulan;
            $sampai .= $sampai_atau_tahun;
        }
        $data['sql'] =  $this->model('model_data_keluar')->getTable($dari, $sampai, $bulan, $tahun);
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['jenis'] = $this->model('model_jenis_barang');
        $data['tipe'] = $type;
        $this->view('laporan/barang_keluar/cetak', $data);
    }



    public function ShowBK()
    {
        $data['dari']   = $_POST['dari_k'];
        $data['sampai'] = $_POST['samp_k'];
        $data['bulan']  = $_POST['bul_k'];
        $data['tahun']  = $_POST['tahun_k'];
        $data['judul'] = 'Barang keluar';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-clipboard-list me-2"></i> Laporan / <a class="bg-page" href="' . BASEURL . '/barang_keluar/index"><i class="fas fa-truck-loading me-2"></i>Barang Keluar </a>/ <i class="fas fa-eye me-2"></i>Lihat Laporan';
        $data['data_keluar'] = $this->model('model_data_keluar');
        $data['jenis'] = $this->model('model_jenis_barang');
        $this->view('templates/header', $data);
        $this->view('laporan/barang_keluar/aprove', $data);
        $this->view('templates/footer');
    }
}
