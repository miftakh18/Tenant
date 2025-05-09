<?php
class data_akun extends Controller
{
    public function index()
    {
        $data['judul'] = 'Ubah Data Akun';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-cogs me-2"></i> Pengaturan / <i class="fas fa-key me-2"></i>Ubah Data Akun';
        $this->view('templates/header', $data);
        $this->view('pengaturan/data_akun/index', $data);
        $this->view('templates/footer');
    }


    public function showAkun()
    {
        $id  = $_SESSION['id'];
        $data = $this->model('model_user')->show_userById($id);
        $this->view('pengaturan/data_akun/show', $data);
    }
    public  function UbahAkun()
    {
        $id  = $_SESSION['id'];
        $data = $this->model('model_user')->show_userById($id);
        $this->view('pengaturan/data_akun/edit', $data);
    }

    public function  Update_akun()
    {
        $id         = $_POST['id'];
        $nama       = $_POST['nama_akun'];
        $jk         = $_POST['jenis_kelamin'];
        $jabatan    = $_POST['jabatan'];
        $username   = $_POST['username'];
        $alamat     = $_POST['alamat'];
        $user       = $_SESSION['nama'];
        $cek = $this->model('model_user')->cek_registrasi($username);
        if ($cek) {
            $output['username'] = [
                'status' => 'stay',
                'logo' => 'info',
                'pesan' => 'Masih menggunakan Username Yang Sama'
            ];


            $sql = $this->model('model_user')->UpdatAkunDiri($id, $nama, $jk, $jabatan, $username, $alamat, $user);
            if ($sql == true) {
                $output['tanpa_username'] = [
                    'logo' => 'success',
                    'pesan' => 'Data Berhasil Di Ubah'
                ];
            } else {
                $output = [
                    'logo' => 'error',
                    'pesan' => 'Data Gagal Di Ubah'
                ];
            }
        } else {
            $output['username'] = [
                'status' => 'change'
            ];


            $sql = $this->model('model_user')->UpdatAkunDiri($id, $nama, $jk, $jabatan, $username, $alamat, $user);
            if ($sql == true) {
                $output['tanpa_username'] = [
                    'logo' => 'success',
                    'pesan' => 'Data Berhasil Di Ubah'
                ];
            } else {
                $output = [
                    'logo' => 'error',
                    'pesan' => 'Data Gagal Di Ubah'
                ];
            }
        }
        echo json_encode($output);
    }
}
