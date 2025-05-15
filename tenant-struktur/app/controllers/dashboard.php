<?php

class dashboard extends Controller
{
    private $model;

    public function __construct()
    {


        $this->model =  $this->model('model_Dashboard');
    }

    public function index()
    {
        $data['judul'] = 'dashboard';
        $data['page'] = '<i class="fas fa-tachometer-alt me-2"></i> Dashboard';
        $data['menu'] = $this->model->getAllMenu();
        // if (!isset($_SESSION["login"])) {
        //     echo "anda Belum Login";
        // } else {
        // echo $_SESSION['login'];
        $this->view('templates/header', $data);
        // $this->view('dashboard/index', $data);
        $this->view('templates/footer');
        // }
    }
    public function getTableDas()
    {
        $data['data'] = $this->model('model_stok')->showData();
        $data['cek'] = $this->model('model_stok');
        $this->view('dashboard/data_table', $data);
    }
}
