<?php
class pendaftaran extends Controller
{
    public function index()
    {

        $data['judul'] = 'Pendaftaran';
        $this->view('tenant/pendaftaran', $data, 'header', 'footer');
    }
}
