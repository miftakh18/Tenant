<?php

class data_barang_masuk extends Controller
{

    public function index()
    {
        $data['judul'] = 'Data Barang Masuk';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-dolly-flatbed me-2"></i> Data Transaksi  / <i class="fas fa-dolly me-2"></i>Data Barang Masuk';
        $this->view('templates/header', $data);
        $data['data_barang'] = $this->model('model_data_barang')->getDataBarangByActive();
        $data['data_supplier'] = $this->model('model_supplier')->getDataByActive();
        $this->view('data_transaksi/data_barang_masuk/index', $data);
        $this->view('templates/footer');
    }


    public function getData()
    {
        $data['data_masuk'] = $this->model('model_data_masuk')->getTable();

        // var_dump($data);
        // exit;
        $this->view('data_transaksi/data_barang_masuk/data_table', $data);
    }

    public function insertData()
    {
        $tanggal = $_POST['tanggal'];
        $nama_barang = $_POST['nama_barang'];
        $supplier    = $_POST['nama_supplier'];
        $jumlah_masuk = $_POST['jumlah_masuk'];
        $id          = $_POST['id_tm'];
        $sql = $this->model('model_data_masuk')->InsertDataMasuk($tanggal, $nama_barang, $jumlah_masuk, $supplier, $id);
        if ($sql == true) {
            $output = [
                'respon_tambah' => 'success',
                'messages' => 'Data berhasil Disimpan'
            ];
        } else {
            $output =  [
                'respon_tambah' => 'error',
                'messages' => 'Data Gagal di simpan'
            ];
        }
        echo json_encode($output);
    }


    public function getEdit()
    {
        $id = $_POST['edit_data'];

        $sql = $this->model('model_data_masuk')->get($id);
        echo json_encode($sql);
    }


    public function UpdateData()
    {

        $id     = $_POST['id_masuk'];
        $sup        = $_POST['nama_supplier_ed'];
        $nama_barang = $_POST['nama_barang_edit_masuk'];
        $jumlah_masuk = $_POST['jumlah_masuk_edit'];
        $sql = $this->model('model_data_masuk')->UpdateData_masuk($nama_barang, $jumlah_masuk, $id, $sup);
        if ($sql == true) {
            $output = [
                'respon_update' => 'success',
                'messages_update' => 'Data berhasil Di Update'
            ];
        } else {
            $output =  [
                'respon_update' => 'error',
                'messages_update' => 'Data Gagal di Update'
            ];
        }
        echo json_encode($output);
    }


    public function deleteData()
    {
        $id = $_POST['hapus'];
        $sql = $this->model('model_data_masuk')->DeleteData($id);
        if ($sql == true) {
            $output = [
                'respon_hapus' => 'success',
                'messages_hapus' => 'Data berhasil Di Delete'
            ];
        } else {
            $output =  [
                'respon_hapus' => 'error',
                'messages_hapus' => 'Data Gagal di Delete'
            ];
        }
        echo json_encode($output);
    }

    public function kode()
    {
        $data_query = $this->model('model_data_masuk')->getMasuk();
        if ($data_query) {
            foreach ($data_query as $row) {
                $id = substr($row['id_trans_masuk'], 5);
                $kode  = $id + 1;
            }
            // $kod_ot['tampilkan'] =  "TRM001";

            $kod_ot['tampilkan']  =  "TRM00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kod_ot['tampilkan'] =  "TRM001";
        }

        echo json_encode($kod_ot);
    }
}
