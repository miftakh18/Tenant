<?php

class stok_barang extends Controller
{

    public function index()
    {
        $data['judul'] = 'stok barang';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/  <i class="fas fa-clipboard-list me-2"></i> Laporan / <i class="fas fa-box-open me-2"></i>Stok Barang';
        $data['cek'] = $this->model('model_stok');
        $this->view('templates/header', $data);
        $this->view('laporan/stok_barang/index', $data);
        $this->view('templates/footer');
    }



    public function getStok()
    {
        $data['data'] = $this->model('model_stok')->showData();
        $data['cek'] = $this->model('model_stok');
        $this->view('laporan/stok_barang/data_table', $data);
    }
}
