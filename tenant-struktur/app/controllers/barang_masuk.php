<?php

class barang_masuk extends Controller
{

    public function index()
    {
        $data['judul'] = 'Barang masuk';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/  <i class="fas fa-clipboard-list me-2"></i> Laporan / <i class="fas fa-dolly me-2"></i> Barang Masuk';
        $data['coba'] = $this->model('model_data_masuk')->getTglAkhir();
        $this->view('templates/header', $data);
        $this->view('laporan/barang_masuk/index', $data);
        $this->view('templates/footer');
    }

    public function dataKeCetak()
    {
        $data['url'] = BASEURL . '/barang_masuk/cetak/';
        $data['dari'] = $_POST['dari'];
        $data['sampai'] = $_POST['sampai'];
        echo json_encode($data);
    }
    public function cetak($tipe = null, $dari_atau_bulan = null, $sampai_atau_tahun = null)
    {
        $this->pdf();
        $type  = $tipe;

        $bulan = '';
        $tahun = '';
        $dari = '';
        $sampai  = '';
        if ($type == 'bulan') {
            $bulan .= $dari_atau_bulan;
            $tahun .= $sampai_atau_tahun;
        } elseif ($type == 'tanggal') {
            $dari .= $dari_atau_bulan;
            $sampai .= $sampai_atau_tahun;
        }

        $data['sql'] =  $this->model('model_data_masuk')->getTable($dari, $sampai, $bulan, $tahun);
        $data['tipe'] = $type;
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['bulan'] = $bulan;
        $data['jenis'] = $this->model('model_jenis_barang');

        $this->view('laporan/barang_masuk/cetak', $data);
    }

    public function getdata()
    {
        $bulan  = $_POST['bulan'];
        $dari  = $_POST['dari_tangkep'];
        $sampai = $_POST['sampai_tangkep'];
        $tahun  = $_POST['tahun'];
        $data = $this->model('model_data_masuk')->getTable($dari, $sampai, $bulan, $tahun);
        // var_dump($data);
        // die();
        $this->view('laporan/barang_masuk/data_table', $data);
    }

    public function showBM()
    {
        $data['judul'] = 'Barang masuk';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/  <i class="fas fa-clipboard-list me-2"></i> Laporan / <a class="bg-page" href="' . BASEURL . '/barang_masuk/index"><i class="fas fa-dolly me-2"></i>Barang Masuk </a>/ <i class="fas fa-eye me-2"></i>Lihat Laporan';
        $data['coba'] = $this->model('model_data_masuk')->getTglAkhir();
        $data['dari'] = $_POST['dar'];
        $data['sampai'] = $_POST['samp'];
        $data['jenis'] = $this->model('model_jenis_barang');
        $data['bulan'] = $_POST['bul'];
        $data['tahun'] = $_POST['tah'];
        $data['data_masuk'] = $this->model('model_data_masuk');
        $data['supplier'] = $this->model('model_supplier');
        $this->view('templates/header', $data);
        $this->view('laporan/barang_masuk/aprove', $data);
        $this->view('templates/footer');
    }
}
