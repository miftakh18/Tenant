<?php
class model_data_barang
{
    private $table = 'data_barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getJenis()
    {
        $this->db->query(' SELECT id,nama_jenis FROM jenis_barang WHERE active ="ya"');
        return $this->db->resaultSet();
    }
    public function getSatuan()
    {
        $this->db->query(' SELECT id,nama_satuan FROM satuan WHERE active="ya"');
        return $this->db->resaultSet();
    }

    public function getData_barang()
    {

        $this->db->query('SELECT id_barang FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        return $this->db->resaultSet();
    }

    public function getDataBarang()
    {
        $query = 'SELECT * FROM view_databarang';

        $this->db->query($query);
        return $this->db->resaultSet();
    }
    public function getDataBarangByActive()
    {
        $query = 'SELECT * FROM view_databarang WHERE active="ya"';

        $this->db->query($query);
        return $this->db->resaultSet();
    }

    public function InsertDataBarang($nama_barang, $merk_barang, $jenis_barang, $satuan_barang, $id_barang, $gambar, $active)
    {
        $user = $_SESSION["nama"];

        // $stok_barang = "";
        // $tanggal = date('Y-m-d');
        $query = ' INSERT INTO ' . $this->table . '(`nama_barang`,`merk_barang`,`jenis_barang`,`satuan`,`id_barang`,`input_user`,`gambar`,`active`) 
        VALUES(?,?,?,?,?,?,?,?)';
        // $id = 'B001';
        $this->db->query($query);
        $this->db->bind(1, $nama_barang);
        $this->db->bind(2, $merk_barang);
        $this->db->bind(3, $jenis_barang);
        $this->db->bind(4, $satuan_barang);
        $this->db->bind(5, $id_barang);
        $this->db->bind(6, $user);
        $this->db->bind(7, $gambar);
        $this->db->bind(8, $active);





        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }

    public function editData($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);

        return $this->db->single();
    }

    public function update_data($id_ed, $nama_barang_edit, $merk_barang_edit, $jenis_barang_edit, $satuan_barang_edit, $gambar, $active)
    {

        $get = $this->editData($id_ed);
        $folder = '../public/upload/' . $get['gambar'];
        if ($gambar != $get['gambar']) {
            unlink($folder);
        }


        $user  =  $_SESSION['nama'];
        $query = 'UPDATE ' . $this->table . ' SET 
        nama_barang=?,
        merk_barang=?,
        jenis_barang=?,
        satuan=?,
        update_user=?,
        gambar=?,
        active=?
        WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $nama_barang_edit);
        $this->db->bind(2, $merk_barang_edit);
        $this->db->bind(3, $jenis_barang_edit);
        $this->db->bind(4, $satuan_barang_edit);
        $this->db->bind(5, $user);
        $this->db->bind(6, $gambar);
        $this->db->bind(7, $active);
        $this->db->bind(8, $id_ed);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function delete_data($id)
    {
        $get = $this->editData($id);
        $folder = '../public/upload/' . $get['gambar'];
        unlink($folder);
        $query = 'DELETE FROM ' . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);

        try {

            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
}
