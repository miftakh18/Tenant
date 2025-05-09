<?php

class satuan extends Controller
{

    public function index()
    {
        $data['judul'] = 'Satuan Barang';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-archive me-2"></i>Data Master / <i class="fab fa-cloudsmith me-2"></i>Satuan Barang';
        $this->view('templates/header', $data);
        $this->view('data_master/satuan/index');
        $this->view('templates/footer');
    }


    public function getdata()
    {
        $data = $this->model('model_satuan_barang')->showData();
        $this->view('data_master/satuan/data_table', $data);
    }


    public function kode()
    {
        $data_query = $this->model('model_satuan_barang')->getSat_Barang();
        if ($data_query) {
            foreach ($data_query as $row) {
                $id = substr($row['id_satuan'], 4, 1);
            }
            $kode  = $id + 1;
            $kod_ot['tampilkan']  =  "ST00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kod_ot['tampilkan'] =  "ST001";
        }

        echo json_encode($kod_ot);
    }



    public function InsertData()
    {
        $nama = $_POST['nama_satuan'];
        $id   = $_POST['id_sat'];
        $active  = 'ya';
        $user = $_SESSION['nama'];
        $sql = $this->model('model_satuan_barang')->InsertData($nama, $id, $active, $user);
        if ($sql == true) {
            $output = [
                'res' => 'success',
                'msg' => 'Data berhasil Di Tambah'
            ];
        } else {
            $output = [
                'res' => 'error',
                'msg' => 'Data Gagal Di Tambah'
            ];
        }
        echo json_encode($output);
    }
    public function editData()
    {
        $id = $_POST['data'];
        // var_dump($id);
        // exit;
        echo json_encode($this->model('model_satuan_barang')->editData($id));
    }

    public function UpdateData()
    {

        $id = $_POST['id_satuan'];
        $nama = $_POST['nama_edit_satuan'];
        $user = $_SESSION['nama'];
        $active = $_POST['active_satuan'];
        $sql = $this->model('model_satuan_barang')->updateData($nama, $id, $user, $active);
        if ($sql == true) {
            $output = [
                'res' => 'success',
                'msg' => 'Data berhasil Di Update'
            ];
        } else {
            $output = [
                'res' => 'error',
                'msg' => 'Data Gagal Di Update'
            ];
        }
        echo json_encode($output);
    }


    public function deleteData()
    {
        $id = $_POST['hapus'];
        $sql = $this->model('model_satuan_barang')->deleteData($id);
        if ($sql == true) {
            $output = [
                'resS' => 'success',
                'msgS' => 'Data berhasil Di Update'
            ];
        } else {
            $output = [
                'resS' => 'error',
                'msgS' => 'Data Gagal Di Update'
            ];
        }
        echo json_encode($output);
    }
}
