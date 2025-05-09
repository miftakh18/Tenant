<?php
class supplier extends Controller
{
    // data master
    public function index()
    {
        $data['judul'] = 'Data Supplier';
        $data['page'] = '<a class="bg-page" href="' . BASEURL . '/dashboard/index"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>';
        $data['page'] .= ' /  <i class="fas fa-archive me-2"></i> Data Master / <i class="fas fa-boxes me-2"></i>Data Supplier';

        $this->view('templates/header', $data);
        $this->view('data_master/data_supplier/index');
        $this->view('templates/footer');
    }

    public function get_masterSup()
    {
        $data  = $this->model('model_supplier')->getData();
        $this->view('data_master/data_supplier/table', $data);
    }

    public function input_masSup()
    {
        $id      = $_POST['id_sups'];
        $nama    = $_POST['nama_supplier'];
        $alamat  = $_POST['alamat_supplier'];
        $telpon  = $_POST['telp_sup'];
        $user    = $_SESSION['nama'];
        $active  = 'ya';
        $sql     = $this->model('model_supplier')->InsertSup($nama, $alamat, $telpon, $user, $id, $active);

        if ($sql == true) {
            $output = [
                'logo_sp' => 'success',
                'pesan_sp' => 'Data Berhasil Di Tambah'
            ];
        } else {
            $output = [
                'logo_sp' => 'error',
                'pesan_sp' => 'Data Gagal Di Tambah'
            ];
        }

        echo json_encode($output);
    }

    public function getById()
    {
        $id  = $_POST['id_sp'];
        $sql = $this->model('model_supplier')->getDataByid($id);
        echo json_encode($sql);
    }
    public function UpdateMSup()
    {
        $id      = $_POST['id_sups_edit'];
        $nama    = $_POST['nama_supplier_ed'];
        $alamat  = $_POST['alamat_supplier_ed'];
        $telpon  = $_POST['telp_sup_ed'];
        $user    = $_SESSION['nama'];
        $active  = $_POST['active_sup'];
        $sql = $this->model('model_supplier')->UpdateIdSup($nama, $alamat, $telpon, $user, $id, $active);
        if ($sql == true) {
            $output = [
                'logo_sp_ed' => 'success',
                'pesan_sp_ed' => 'Data Berhasil Di Update'
            ];
        } else {
            $output = [
                'logo_sp_ed' => 'error',
                'pesan_sp_ed' => 'Data Gagal Di Update'
            ];
        }

        echo json_encode($output);
    }

    public function DeleteSup()
    {

        $id = $_POST['hapus_Supp'];

        $sql = $this->model('model_supplier')->DeleteSup($id);
        if ($sql == true) {
            $output = [
                'logo_sp_del' => 'success',
                'pesan_sp_del' => 'Data Berhasil Di Delete'
            ];
        } else {
            $output = [
                'logo_sp_del' => 'error',
                'pesan_sp_del' => 'Data Gagal Di Delete'
            ];
        }

        echo json_encode($output);
    }




    public function kode()
    {
        $data_query = $this->model('model_supplier')->getSupp();
        if ($data_query) {
            foreach ($data_query as $row) {
                $id = substr($row['id_supplier'], 4);
            }
            $kode  = $id + 1;
            $kod_ot['tampilkan']  =  "SP00" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kod_ot['tampilkan'] =  "SP001";
        }

        echo json_encode($kod_ot);
    }
}
