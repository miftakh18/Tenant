<?php

class manajemen_user extends Controller
{
    private $kunci, $nonValue;

    public function __construct()
    {
        $this->nonValue  = 'meubelindah12345';
        $this->kunci = new Encryption;
    }
    public function index()
    {
        $data['judul'] = 'Manajemen User';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-cogs me-2"></i> Pengaturan / <i class="fas fa-user-cog me-2"></i>Manajemen User';

        $this->view('templates/header', $data);
        $this->view('pengaturan/manajemen_user/index');
        $this->view('templates/footer');
    }


    public function  get_manage()
    {
        $data = $this->model('model_user')->show_user();
        $this->view('pengaturan/manajemen_user/table', $data);
    }

    public function  get_user_manage()
    {
        $id  = $_POST['id'];
        $data = $this->model('model_user')->show_userById($id);
        echo json_encode($data);
    }


    public function  InsertUser()
    {

        $nama       = $this->kunci->decrypt($_POST['nama'], $this->nonValue);
        $jabatan    = $this->kunci->decrypt($_POST['jabatan'], $this->nonValue);
        $username   = $this->kunci->decrypt($_POST['username_reg'], $this->nonValue);
        $jk         = $this->kunci->decrypt($_POST['jenis_kelamin'], $this->nonValue);
        $alamat     = $this->kunci->decrypt($_POST['alamat'], $this->nonValue);
        $pw1        = $this->kunci->decrypt($_POST['password_reg'], $this->nonValue);
        $pw2        = $this->kunci->decrypt($_POST['confirm_password_reg'], $this->nonValue);
        $level      = $this->kunci->decrypt($_POST['level'], $this->nonValue);
        $status     = $this->kunci->decrypt($_POST['status'], $this->nonValue);
        $cek        = $this->model('model_user')->cek_registrasi($username);

        if ($cek) {
            $pesan  = [
                "type" => "error",
                "pesan" => "username sudah terdaftar"
            ];
            echo json_encode($pesan);
            // var_dump($sql1);
            exit;
        }
        if ($pw1 !== $pw2) {

            $pesan  = [
                "type" => "error",
                "pesan" => "Konfirmasi Password Tidak Sesuai"
            ];
            echo json_encode($pesan);
            exit;
        }

        $password = password_hash($pw1, PASSWORD_DEFAULT);
        $sql2 = $this->model('model_user')->insert_regis($username, $password, $level, $nama, $jabatan, $jk, $status, $alamat);
        if ($sql2 == true) {
            $pesan  = [
                "type" => "success",
                "pesan" => "Data berhasil di Tambah"
            ];
            echo json_encode($pesan);
            exit;
        } else {
            $pesan  = [
                "type" => "error",
                "pesan" => "Data Gagal di Tambah"
            ];
            echo json_encode($pesan);
            exit;
        }
    }

    public function UbahAkses()
    {
        $id  = $_POST['id_akses'];
        $akses = $_POST['status_akses'];
        $user = $_SESSION['nama'];
        $sql = $this->model('model_user')->updateAksesById($id, $akses, $user);
        if ($sql == true) {
            $output = [
                "ubah_akses" => "success",
                "pesan_akses" => "Akses Berhasil Di Update"
            ];
        } else {
            $output = [
                "ubah_akses" => "error",
                "pesan_akses" => "Akses Gagal Di Update"
            ];
        }
        echo json_encode($output);
    }
    public function Ubahpass()
    {

        // var_dump($_POST);
        // die();
        $id  = $_POST['id'];

        $password1 = $this->kunci->decrypt($_POST['pass1'], $this->nonValue);
        $password2 = $this->kunci->decrypt($_POST['pass2'], $this->nonValue);
        $cek = $this->model('model_user')->show_userById($id);
        $user = $_SESSION['nama'];

        if ($cek) {
            if (password_verify($password1, $cek["password"])) {
                $output = [
                    "ubah_pass" => "error",
                    "pesan_pass" => "Password Yang Anda Masukkan Sudah pernah di Buat"
                ];
                echo json_encode($output);
                exit;
            } elseif (password_verify($password2, $cek["password"])) {
                $output = [
                    "ubah_pass" => "error",
                    "pesan_pass" => "Password Yang Anda Masukkan Sudah pernah di Buat"
                ];
                echo json_encode($output);
                exit;
            }
        }

        if ($password1 !== $password2) {
            $output  = [
                "ubah_pass" => "error",
                "pesan_pass" => "Konfirmasi Password Tidak Sesuai"
            ];
            echo json_encode($output);
            exit;
        }

        $password = password_hash($password1, PASSWORD_DEFAULT);

        $sql = $this->model('model_user')->updatePassById($id, $password, $user);
        if ($sql == true) {
            $output = [
                "ubah_pass" => "success",
                "pesan_pass" => "Password Berhasil Di Ubah"
            ];
        } else {
            $output = [
                "ubah_pass" => "error",
                "pesan_pass" => "Password Gagal Di Ubah"
            ];
        }
        echo json_encode($output);
    }

    public function UbahLevel()
    {
        $id = $_POST['id_level'];
        $level = $_POST['ubah_level'];
        $user = $_SESSION['nama'];
        $jabatan = $_POST['ubah_jabatan'];


        $sql = $this->model('model_user')->updateLevel($id, $level, $user, $jabatan, $user);
        if ($sql == true) {
            $output = [
                "ubah_level" => "success",
                "pesan_level" => "Password Berhasil Di Ubah"
            ];
        } else {
            $output = [
                "ubah_level" => "error",
                "pesan_level" => "Password Gagal Di Ubah"
            ];
        }
        echo json_encode($output);
    }
}
