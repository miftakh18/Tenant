<?php

class ubah_password extends Controller
{
    private $kunci, $nonValue;
    public function __construct()
    {
        $this->nonValue  = 'meubelindah12345';
        $this->kunci = new Encryption;
    }


    public function index()
    {
        $data['judul'] = 'Ubah password';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= '/ <i class="fas fa-cogs me-2"></i> Pengaturan / <i class="fas fa-key me-2"></i>Ubah Password';
        $this->view('templates/header', $data);
        $this->view('pengaturan/ubah_password/index');
        $this->view('templates/footer');
    }


    public function getForm()
    {
        $this->view('pengaturan/ubah_password/form');
    }
    public function UbahSandi()
    {
        $id = $_POST['id'];
        $pass = $this->kunci->decrypt($_POST['pass'], $this->nonValue);
        $pass1 = $this->kunci->decrypt($_POST['pass1'], $this->nonValue);
        $pass2 = $this->kunci->decrypt($_POST['pass2'], $this->nonValue);
        $user  = $_SESSION['nama'];

        $cek = $this->model('model_user')->cek_byId($id);
        if (password_verify($pass, $cek["password"])) {
            if ($pass1 != $pass2) {
                $output =
                    [
                        'logo' => 'error',
                        'pesan' => 'Password yang Konfirmasi Password Baru tidak sama persis'
                    ];
            } else {
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $sql = $this->model('model_user')->updatePassById($id, $password, $user);
                if ($sql == true) {
                    $output =
                        [
                            'logo' => 'success',
                            'pesan' => 'Password Berhasil Di ubah'
                        ];
                } else {
                    $output =
                        [
                            'logo' => 'success',
                            'pesan' => 'Password Gagal Di ubah'
                        ];
                }
            }
        } else {
            $output =
                [
                    'logo' => 'error',
                    'pesan' => 'Password Lama Tidak Sesuai'
                ];
        }

        echo json_encode($output);
    }
}
