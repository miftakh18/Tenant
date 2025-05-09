<?php

class data_barang_keluar extends Controller
{

    public function index()
    {
        $data['judul'] = 'Data Barang keluar';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-dolly-flatbed me-2"></i> Data Transaksi  / <i class="fas fa-dolly me-2"></i>Data Barang Keluar';
        $data['data_barang'] = $this->model('model_data_barang')->getDataBarang();
        $this->view('templates/header', $data);
        $this->view('data_transaksi/data_barang_keluar/index', $data);
        $this->view('templates/footer');
    }


    public function getDataKeluar()
    {

        $data['data_keluar'] = $this->model('model_data_keluar')->getTableAll();
        $data['data_keluar_notaccept'] = $this->model('model_data_keluar')->getTableNoaccept();
        $data['data_stok'] = $this->model('model_stok');

        // var_dump($data);
        // exit;
        $this->view('data_transaksi/data_barang_keluar/data_table', $data);
    }

    public function insertData()
    {
        $tanggal = $_POST['tanggal'];
        $nama_barang = $_POST['nama_barang'];
        $jumlah_keluar = $_POST['jumlah_keluar'];
        $id             = $_POST['id_kel'];
        $sql = $this->model('model_data_keluar')->InsertDataMasuk($tanggal, $nama_barang, $jumlah_keluar, $id);
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

        $sql = $this->model('model_data_keluar')->get($id);
        echo json_encode($sql);
    }


    public function UpdateData()
    {

        $id = $_POST['id_keluar'];

        $nama_barang = $_POST['nama_barang_edit_keluar'];
        $jumlah_keluar = $_POST['jumlah_keluar_edit'];
        $sql = $this->model('model_data_keluar')->UpdateData_keluar($nama_barang, $jumlah_keluar, $id);
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
        $sql = $this->model('model_data_keluar')->DeleteData($id);
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


    public function acceptData()
    {

        $id = $_POST['acccept'];
        $status = 'accept';
        $sql = $this->model('model_data_keluar')->AcceptData($id, $status);

        if ($sql == true) {
            $output = [
                'respon_accept' => 'success',
                'messages_accept' => 'Data berhasil Di Accept'
            ];
        } else {
            $output =  [
                'respon_accept' => 'error',
                'messages_accept' => 'Data Gagal di Accept'
            ];
        }
        echo json_encode($output);
    }
    public function nama_barang_keluar()
    {
        $html = '<select class="form-select" id="nama_barang" name="nama_barang" required>
        <option selected disabled value="">pilih </option>';
        $data =  $this->model('model_data_barang')->getDataBarangByActive();
        foreach ($data as $no => $row) {

            $html .=  ' <option value="' . $row['id_barang'] . '">' . $row['nama_barang'] . '</option>';
        }
        $html .=  '</select>';
        echo $html;
    }
    public function getJumlah_barang()
    {
        $data = $_POST['data'];
        $sql = $this->model('model_stok')->cekKetersediaan($data);
        echo json_encode($sql);
    }


    public function kode()
    {
        $data_query = $this->model('model_data_keluar')->getKeluar();
        if ($data_query) {
            foreach ($data_query as $row) {
                $id = substr($row['id_trans_keluar'], 5, 1);
            }
            $kode  = $id + 1;
            $kod_ot['tampilkan']  =  "TRK00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kod_ot['tampilkan'] =  "TRK001";
        }

        echo json_encode($kod_ot);
    }
}
