<?php
class model_Dashboard
{
    private $db;
    private $query = 'SELECT * FROM ';

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getJumlah_dataBarang()
    {

        $this->db->query($this->query . 'data_barang');
        $this->db->execute();
        return $this->db->jumlahKolom();
    }
    public function getJumlah_tMasuk()
    {

        $this->db->query($this->query . 't_masuk');
        $this->db->execute();
        return $this->db->jumlahKolom();
    }

    public function getJumlah_tKeluar()
    {

        $this->db->query($this->query . 't_keluar');
        $this->db->execute();
        return $this->db->jumlahKolom();
    }

    public function getJumlahUser()
    {

        $this->db->query($this->query . 'user');
        $this->db->execute();
        return $this->db->jumlahKolom();
    }
}
