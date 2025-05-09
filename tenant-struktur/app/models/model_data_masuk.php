<?php

class model_data_masuk
{
    private $table = 't_masuk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTglAkhir()
    {
        $query = 'SELECT MIN(tanggal) as tanggal FROM t_masuk LIMIT 1';
        $this->db->query($query);
        return $this->db->single();
    }

    public function getTable($dari = null, $sampai = null, $bulan = null, $tahun = null)
    {

        if (!empty($dari && $sampai)) {
            $query = 'SELECT * FROM view_data_masuk WHERE tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '"';
        } elseif (!empty($bulan && $tahun) && $bulan && $tahun) {
            $query = 'SELECT * FROM view_data_masuk WHERE MONTH(tanggal) ="' . $bulan . '" AND YEAR(tanggal) = "' . $tahun . '"';
        } else {
            $query = 'SELECT * FROM view_data_masuk';
        }

        $this->db->query($query);
        return $this->db->resaultSet();
    }


    public function getMasuk()
    {
        $this->db->query('SELECT id_trans_masuk FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');

        return $this->db->resaultSet();
    }

    public function InsertDataMasuk($tanggal, $nama_barang, $jumlah_masuk, $supplier, $id)
    {
        $user = $_SESSION["nama"];
        $this->db->query('INSERT INTO ' . $this->table . '(tanggal,id_barang,jumlah_masuk,insert_user,id_supplier,id_trans_masuk)  
        VALUES(?,?,?,?,?,?)');
        $this->db->bind(1, $tanggal);
        $this->db->bind(2, $nama_barang);
        $this->db->bind(3, $jumlah_masuk);
        $this->db->bind(4, $user);
        $this->db->bind(5, $supplier);
        $this->db->bind(6, $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function get($id)
    {

        $this->db->query('SELECT * FROM view_data_masuk WHERE id=?');
        $this->db->bind(1, $id);
        return $this->db->single();
    }


    public function UpdateData_masuk($nama_barang, $jumlah_masuk, $id, $sup)
    {
        $query = ' UPDATE ' . $this->table;
        $query .= ' SET 
     
        id_barang=?,
        jumlah_masuk=?,
        update_user=?,
        id_supplier =?
        WHERE id=?';
        $user = $_SESSION["nama"];
        $this->db->query($query);
        $this->db->bind(1, $nama_barang);
        $this->db->bind(2, $jumlah_masuk);
        $this->db->bind(3, $user);
        $this->db->bind(4, $sup);
        $this->db->bind(5, $id);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function DeleteData($id)
    {

        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind(1, $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
}
