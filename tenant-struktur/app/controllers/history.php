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
        $this->view('tenant/history', [], 'header', 'footer');
    }
}
