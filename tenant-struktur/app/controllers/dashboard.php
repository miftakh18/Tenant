<?php

class dashboard extends Controller
{
    private $model;

    public function __construct()
    {


        $this->model =  $this->model('Mmenu');
    }

    public function index()
    {

        $data['judul'] = 'dashboard';
        $data['page'] = '<i class="fas fa-tachometer-alt me-2"></i> Dashboard';
        // $this->view('templates/header', $data);
        $this->view('index', $data, 'header', 'footer');
        // $this->view('templates/footer');
        // }
    }
    public function getTableDas()
    {
        $data['data'] = $this->model('model_stok')->showData();
        $data['cek'] = $this->model('model_stok');
        $this->view('dashboard/data_table', $data);
    }
}
