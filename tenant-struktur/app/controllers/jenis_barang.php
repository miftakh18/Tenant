<?php

class jenis_barang extends Controller
{

    public function index()
    {
        $data['judul'] = 'Jenis Barang';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';

        $data['page'] .= '/ <i class="fas fa-archive me-2"></i> Data Master / <i class="far fa-bookmark me-2"></i>Jenis Barang';

        $this->view('templates/header', $data);
        $this->view('data_master/jenis_barang/index');
        $this->view('templates/footer');
    }

    public function getTable()
    {
        $data['jenis_barang'] = $this->model('model_jenis_barang')->TampilDataJenisBarang();
        $this->view('data_master/jenis_barang/data_table', $data);
    }

    public function kode()
    {
        $data_query = $this->model('model_jenis_barang')->getJensi_Barang();
        if ($data_query) {
            foreach ($data_query as $row) {
                $id = substr($row['id_jenis'], 4, 1);
            }
            $kode  = $id + 1;
            $kod_ot['tampilkan']  =  "JB00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kod_ot['tampilkan'] =  "JB001";
        }

        echo json_encode($kod_ot);
    }
    public function insertJenis()
    {
        $id    = $_POST['id_jen'];
        $nama = $_POST['nama_jenis'];
        $active = 'ya';
        $user  = $_SESSION['nama'];
        $sql  =  $this->model('model_jenis_barang')->InsertJenis($nama, $id, $user, $active);
        if ($sql == true) {
            $output = [
                "responJenis" => "success",
                "messageJenis" => "Data Berhasil Di Simpan"
            ];
        } else {
            $output = [
                "responJenis" => "error",
                "messageJenis" => "Data Berhasil Gagal Di Simpan"
            ];
        }
        echo json_encode($output);
    }

    public function GetEditJenis()
    {
        $id = $_POST['edit_data'];
        $sql =  $this->model('model_jenis_barang')->getEditJenis($id);
        echo json_encode($sql);
    }
    public function UpdateJenis()
    {
        $id = $_POST['id_jenis_edit'];
        $nama  = $_POST['nama_jenis_edit'];
        $active = $_POST['active_jen'];
        $user = $_SESSION['nama'];
        $sql =  $this->model('model_jenis_barang')->UpdateJenis($id, $nama, $user, $active);
        if ($sql == true) {
            $output = [
                "responJenisEdit" => "success",
                "messageJenisEdit" => "Data Berhasil Di Update"
            ];
        } else {
            $output = [
                "responJenisEdit" => "error",
                "messageJenisEdit" => "Data Berhasil Gagal Di Update"
            ];
        }
        echo json_encode($output);
    }

    public function DeleteJenis()
    {
        $id = $_POST['hapus_jenis'];
        $sql = $this->model('model_jenis_barang')->deleteJenis($id);
        if ($sql == true) {
            $output = [
                "responJenisDelete" => "success",
                "messageJenisDelete" => "Data Berhasil Di Delete"
            ];
        } else {
            $output = [
                "responJenisDelete" => "error",
                "messageJenisDelete" => "Data Berhasil Gagal Di Delete"
            ];
        }
        echo json_encode($output);
    }
}
