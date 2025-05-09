<?php
class model_supplier
{
    private $table = 'supplier', $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getTglAkhir()
    {
        $query = 'SELECT MIN(tanggal) as tanggal FROM ' . $this->table  . ' LIMIT 1';
        $this->db->query($query);
        return $this->db->single();
    }

    public function getData()
    {
        $query  = "SELECT * FROM   " . $this->table;
        $this->db->query($query);

        return $this->db->resaultSet();
    }
    public function getDataByActive()
    {
        $query  = "SELECT * FROM   " . $this->table . " WHERE active='ya'";
        $this->db->query($query);

        return $this->db->resaultSet();
    }
    public function InsertSup($nama, $alamat, $telpon, $user, $id, $active)
    {
        $query = "INSERT INTO " . $this->table . " (nama_supplier,alamat_supplier,kontak_supplier,input_by,id_supplier,active) VALUES(?,?,?,?,?,?)";
        $this->db->query($query);
        $this->db->bind(1, $nama);
        $this->db->bind(2, $alamat);
        $this->db->bind(3, $telpon);
        $this->db->bind(4, $user);
        $this->db->bind(5, $id);
        $this->db->bind(6, $active);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }



    public function getSupp()
    {
        $this->db->query('SELECT id_supplier FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');

        return $this->db->resaultSet();
    }
    public function getDataByid($id)
    {
        $query  = "SELECT * FROM   " . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);

        return $this->db->single();
    }

    public function UpdateIdSup($nama, $alamat, $telpon, $user, $id, $active)
    {

        $query = "UPDATE supplier SET 
        nama_supplier=?,alamat_supplier=?,
        kontak_supplier=?,
        update_by =?,
        active =?
        WHERE id=?";
        $sql =  $this->db->query($query);
        $this->db->bind(1, $nama);
        $this->db->bind(2, $alamat);
        $this->db->bind(3, $telpon);
        $this->db->bind(4, $user);
        $this->db->bind(5, $active);
        $this->db->bind(6, $id);

        echo $sql;

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }


    public function DeleteSup($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=?";
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
