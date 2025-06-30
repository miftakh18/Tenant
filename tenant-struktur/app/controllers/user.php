<?php

class user extends Controller
{
    private $kunci, $nonValue, $muser;
    public function __construct()
    {
        $this->nonValue  = 'hoohTenant123';
        $this->kunci     = new Encryption();
        $this->muser     = $this->model('Muser');
    }

    public function index()
    {
        $this->view('user/login');
    }
    public function registrasi()
    {
        $this->view('user/sign_up');
    }
    public function proses_regis()
    {
        $nama = $this->kunci->decrypt($_POST['nama'], $this->nonValue);
        $jabatan = $this->kunci->decrypt($_POST['jabatan'], $this->nonValue);
        $username =  $this->kunci->decrypt($_POST['username_reg'], $this->nonValue);
        $password1 = $this->kunci->decrypt($_POST['password_reg'], $this->nonValue);
        $password2 = $this->kunci->decrypt($_POST['confirm_password_reg'], $this->nonValue);
        $level  = $this->kunci->decrypt($_POST['level'], $this->nonValue);
        $jk = $this->kunci->decrypt($_POST['jenis_kelamin'], $this->nonValue);
        $alamat = $this->kunci->decrypt($_POST['alamat'], $this->nonValue);
        $sql1 = $this->model('model_user')->cek_registrasi($username);
        if ($sql1) {
            $pesan  = [
                "type" => "error",
                "pesan" => "username sudah terdaftar"
            ];
            echo json_encode($pesan);
            // var_dump($sql1);
            exit;
        }

        if ($password1 !== $password2) {
            $pesan  = [
                "type" => "error",
                "pesan" => "Konfirmasi Password Tidak Sesuai"
            ];
            echo json_encode($pesan);
            exit;
        }
        $password = password_hash($password1, PASSWORD_DEFAULT);
        $status  = 0;
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


    public function proses_login()
    {
        // session_start();
        $username = $this->kunci->decrypt($_POST['username'], $this->nonValue);
        $password = $this->kunci->decrypt($_POST['password'], $this->nonValue);
        // var_dump($_POST);

        $sql = $this->muser->cek_login($username, $password);

        if ($sql['status'] == true) {
            $output['tipe'] = 'success';
            $_SESSION['login'] = $sql['data'];
            $this->return_json($output);
        } else {
            $this->return_json($sql);
        }
    }

    public function logout()
    {
        // session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location:' . BASEURL . '/');
    }
}
