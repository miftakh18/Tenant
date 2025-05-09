<?php
class model_satuan_barang
{
    private $table = 'satuan',
        $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showData()
    {

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resaultSet();
    }

    public function InsertData($nama, $id, $active, $user)
    {


        $tanggal = date('Y-m-d');
        $this->db->query('INSERT INTO ' . $this->table . '(nama_satuan,tanggal,user_input,id_satuan,active) VALUES(?,?,?,?,?)');
        $this->db->bind(1, $nama);
        $this->db->bind(2, $tanggal);
        $this->db->bind(3, $user);
        $this->db->bind(4, $id);
        $this->db->bind(5, $active);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
    public function editData($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind(1, $id);
        return $this->db->single();
    }
    public function updateData($nama, $id, $user, $active)
    {

        $this->db->query('UPDATE ' . $this->table . ' SET nama_satuan=?, user_update=?,active=? WHERE id=?');
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
    public function getSat_Barang()
    {
        $this->db->query('SELECT id_satuan FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');

        return $this->db->resaultSet();
    }

    public function deleteData($id)
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
