<?php
class order extends Controller
{
    public function index()
    {

        $data['judul'] = 'Pendaftaran';
        $this->view('tenant/order', $data, 'header', 'footer');
    }
}
