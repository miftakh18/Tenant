<?php

class data_barang extends Controller
{

    public function index()
    {

        $data['judul'] = 'Data Barang';
        $data['jenis'] = $this->model('model_data_barang')->getJenis();
        $data['jenis_ed'] = $this->model('model_jenis_barang')->getJensi_Barang();
        $data['satuan'] = $this->model('model_data_barang')->getSatuan();


        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= ' /  <i class="fas fa-archive me-2"></i> Data Master / <i class="fas fa-boxes me-2"></i>Data Barang';


        $this->view('templates/header', $data);
        $this->view('data_master/data_barang/index', $data);
        $this->view('templates/footer');
    }

    public function kode()
    {

        $data_query = $this->model('model_data_barang')->getData_barang();

        if ($data_query) {

            foreach ($data_query as $row) {
                $id = substr($row['id_barang'], 4, 1);
            }
            $kode  = $id + 1;
            $kod_ot['tampilkan']  =  "BR00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {

            $kod_ot['tampilkan'] =  "BR001";
        }

        echo json_encode($kod_ot);
    }


    public function get_data()
    {

        $data['data_barang'] = $this->model('model_data_barang')->getDataBarang();
        // var_dump($data);
        // exit;
        $this->view('data_master/data_barang/data_table', $data);
    }

    public function tambah_data()
    {
        $id_barang  = htmlspecialchars($_POST['id_co']);
        $nama_barang = htmlspecialchars($_POST['nama_barang']);
        $merk_barang = htmlspecialchars($_POST['merk_barang']);
        $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
        $satuan_barang = htmlspecialchars($_POST['satuan_barang']);
        $active = 'ya';

        $gambar = $this->upload();

        $sql = $this->model('model_data_barang')->InsertDataBarang($nama_barang, $merk_barang, $jenis_barang, $satuan_barang, $id_barang, $gambar, $active);
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


    public function edit_data()
    {


        $id  = $_POST['edit'];
        $sql = $this->model('model_data_barang')->editData($id);
        // var_dump($id);
        echo json_encode($sql);
    }

    public function upload()
    {

        // var_dump($_FILES);
        $nama_file = $_FILES['upload_file']['name'];
        $ukuran = $_FILES['upload_file']['size'];
        $kesalahan = $_FILES['upload_file']['error'];
        $tmpname = $_FILES['upload_file']['tmp_name'];


        if ($kesalahan == 4) {
            $output =  [
                'respon_tambah' => 'error',
                'messages' => 'Gambar ini Kosong'
            ];
            echo json_encode($output);
            exit;
        }

        $format_gambar  = ['jpg', 'jpeg', 'png'];
        $pecah_nama_gambar = explode('.', $nama_file);
        $pecah_nama_gambar = strtolower(end($pecah_nama_gambar));
        if (!in_array($pecah_nama_gambar, $format_gambar)) {
            $output =  [
                'respon_tambah' => 'error',
                'messages' => 'Ini bukan Gambar'
            ];
            echo json_encode($output);
            exit;
        }

        if ($ukuran > 8000000) {
            $output =  [
                'respon_tambah' => 'error',
                'messages' => 'Gambar Melebihi Kapasitas'
            ];
            echo json_encode($output);
            exit;
        }

        $nama_file_acak = uniqid();
        $nama_file_acak .= ".";
        $nama_file_acak .= $pecah_nama_gambar;
        $folder = '../public/upload';
        if (!is_dir($folder)) {

            mkdir($folder);
            move_uploaded_file($tmpname, $folder . '/' . $nama_file_acak);
        } else {
            move_uploaded_file($tmpname, $folder . '/' . $nama_file_acak);
        }
        return  $nama_file_acak;
    }
    // function proses_upload($nama = null)
    // {
    //     $nama;
    // }
    public function update_data()
    {

        $gambarlama = $_POST['gambar_lama'];
        if ($_FILES["upload_file"]["error"] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = $this->upload();
        }

        // var_dump($_POST);
        // var_dump($_FILES);
        // exit;
        $id_ed  = htmlspecialchars($_POST['id_ed']);
        $nama_barang_edit = htmlspecialchars($_POST['nama_barang_edit']);
        $merk_barang_edit  = htmlspecialchars($_POST['merk_barang_edit']);
        $jenis_barang_edit = htmlspecialchars($_POST['jenis_barang_edit']);
        $satuan_barang_edit = htmlspecialchars($_POST['satuan_barang_edit']);
        $active = htmlspecialchars($_POST['active']);

        $sql = $this->model('model_data_barang')->update_data($id_ed, $nama_barang_edit, $merk_barang_edit, $jenis_barang_edit, $satuan_barang_edit, $gambar, $active);
        if ($sql == true) {
            $output = [
                'respon_edit' => 'success',
                'messages_edit' => 'Data berhasil Di Update'
            ];
        } else {
            $output =  [
                'respon_edit' => 'error',
                'messages_edit' => 'Data Gagal di  Update'
            ];
        }
        echo json_encode($output);
    }


    public function delete_data()
    {
        $id = $_POST['hapus'];

        $sql = $this->model('model_data_barang')->delete_data($id);
        if ($sql == true) {



            $output = [
                'respon_hapus' => 'success',
                'messages_hapus' => 'Data berhasil Di Hapus'
            ];
        } else {
            $output =  [
                'respon_hapus' => 'error',
                'messages_hapus' => 'Data Gagal di  Hapus'
            ];
        }
        echo json_encode($output);
    }
}
