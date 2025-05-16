<?php
class menu extends Controller
{
    public $mmenu;
    public function __construct()
    {
        $this->mmenu = $this->model('Mmenu');
    }
    public function index() {}
    public function cekmenu($id_menu)
    {
        $this->return_json($this->mmenu->getSubmenu($id_menu));
    }
}
