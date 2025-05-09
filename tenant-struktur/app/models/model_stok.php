<?php
class model_stok
{
    private $table = 'view_stok',
        $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function showData()
    {
        $query = 'SELECT 
        a.id_barang,
        a.merk_barang,
        a.jenis_barang,
        a.stok,
        b.nama_jenis as  jenis_barang,
        a.nama_satuan as satuan 
        FROM ' . $this->table .
            ' a JOIN jenis_barang b ON a.jenis_barang = b.id ORDER BY a.id_barang ASC';
        $this->db->query($query);
        return $this->db->resaultSet();
    }

    public function cekKetersediaan($nama)
    {
        $query  = 'SELECT * FROM ' . $this->table . ' WHERE id_barang=?';
        $this->db->query($query);
        $this->db->bind(1, $nama);
        return $this->db->single();
    }
}
