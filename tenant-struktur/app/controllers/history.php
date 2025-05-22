<?php
class history extends Controller
{
    public $model;
    public function __construct()
    {


        $this->model =  $this->model('Mmenu');
    }

    public function index()
    {
        $data['judul'] = 'History';
        $data['page'] = '<i class="fas fa-tachometer-alt me-2"></i> Dashboard';
        // $this->view('templates/header', $data);
        // // $this->view('dashboard/index', $data);
        // $this->view('templates/footer');
    }
}
