<?php
class model_jenis_barang
{

    private $table = 'jenis_barang',
        $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function TampilDataJenisBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resaultSet();
    }

    public function InsertJenis($nama, $id, $user, $active)
    {

        $tanggal = date('Y-m-d');
        $this->db->query('INSERT INTO ' . $this->table . '(nama_jenis,user_input,tanggal,id_jenis,active) VALUES(?,?,?,?,?)');
        $this->db->bind(1, $nama);
        $this->db->bind(2, $user);
        $this->db->bind(3, $tanggal);
        $this->db->bind(4, $id);
        $this->db->bind(5, $active);
        $this->db->execute();
        return true;
    }
    public function getEditJenis($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);

        return $this->db->single();
    }
    public function getJensi_Barang()
    {
        $this->db->query('SELECT id_jenis FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');

        return $this->db->resaultSet();
    }

    public function UpdateJenis($id, $nama, $user, $active)
    {

        $query = 'UPDATE ' . $this->table . ' SET 
        nama_jenis=?,
        user_update=?,active=? WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $nama);
        $this->db->bind(2, $user);
        $this->db->bind(3, $active);
        $this->db->bind(4, $id);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
    public function deleteJenis($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);
        $this->db->execute();
        return true;
    }
}
