<?php
class order extends Controller
{
    public function index()
    {

        $this->view('tenant/order', [], 'header', 'footer');
    }
}
