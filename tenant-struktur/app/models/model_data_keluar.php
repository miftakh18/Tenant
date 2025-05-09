<?php

class model_data_keluar
{
    private $table = 't_keluar';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTglAkhir()
    {
        $query = 'SELECT MIN(tanggal) as tanggal FROM t_keluar LIMIT 1';
        $this->db->query($query);
        return $this->db->single();
    }
    public function getTable($dari = null, $sampai = null, $bulan = null, $tahun = null)
    {

        if (!empty($dari && $sampai)) {
            $query = 'SELECT * FROM view_data_keluar WHERE tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '" AND status = "accept"';
        } elseif (!empty($bulan && $tahun) && $bulan && $tahun) {
            $query = 'SELECT * FROM view_data_keluar WHERE MONTH(tanggal) ="' . $bulan . '" AND YEAR(tanggal) ="' . $tahun . '" AND status = "accept"';
        } else {
            $query = 'SELECT * FROM view_data_keluar WHERE status= "accept"';
        }

        $this->db->query($query);
        return $this->db->resaultSet();
    }

    public function getTableAll()
    {
        $query = 'SELECT * FROM view_data_keluar';
        $this->db->query($query);
        return $this->db->resaultSet();
    }

    public function getTableNoaccept()
    {
        $query = 'SELECT * FROM view_data_keluar WHERE status IS NULL';
        $this->db->query($query);
        return $this->db->resaultSet();
    }
    public function getKeluar()
    {
        $this->db->query('SELECT id_trans_keluar FROM ' . $this->table . ' ORDER BY  id DESC LIMIT 1');

        return $this->db->resaultSet();
    }

    public function InsertDataMasuk($tanggal, $nama_barang, $jumlah_keluar, $id)
    {
        $user = $_SESSION["nama"];
        $this->db->query('INSERT INTO ' . $this->table . '(tanggal,id_barang,jumlah_keluar,insert_user,id_trans_keluar)  
        VALUES(?,?,?,?,?)');
        $this->db->bind(1, $tanggal);
        $this->db->bind(2, $nama_barang);
        $this->db->bind(3, $jumlah_keluar);
        $this->db->bind(4, $user);
        $this->db->bind(5, $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function get($id)
    {

        $this->db->query('SELECT * FROM view_data_keluar WHERE id=?');
        $this->db->bind(1, $id);
        return $this->db->single();
    }


    public function UpdateData_keluar($nama_barang, $jumlah_keluar, $id)
    {
        $query = ' UPDATE ' . $this->table;
        $query .= ' SET 

        id_barang=?,
        jumlah_keluar=?,
        update_user=?
        WHERE id=?';
        $user = $_SESSION["nama"];
        $this->db->query($query);
        $this->db->bind(1, $nama_barang);
        $this->db->bind(2, $jumlah_keluar);
        $this->db->bind(3, $user);
        $this->db->bind(4, $id);

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


    public function AcceptData($id, $status)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET status =? WHERE id=?');
        $this->db->bind(1, $status);
        $this->db->bind(2, $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
}
