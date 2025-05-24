<?php
class config extends Controller
{
    public $model;
    public function __construct()
    {


        $this->model =  $this->model('Mmenu');
    }

    public function index()
    {


        $this->view('tenant/config', [], 'header', 'footer');
    }
}
