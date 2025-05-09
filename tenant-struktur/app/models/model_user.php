<?php
class model_user
{
    private $table = 'user',
        $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function show_user()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE level='user'";
        // $query .= " WHERE level='user'";
        $this->db->query($query);
        return $this->db->resaultSet();
    }

    public function show_userById($id)
    {
        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE id=?";
        $this->db->query($query);
        $this->db->bind(1, $id);
        return $this->db->single();
    }

    public function cek_registrasi($username)
    {

        $query = 'SELECT username FROM ' . $this->table . ' WHERE username=?';
        $this->db->query($query);
        $this->db->bind(1, $username);
        return $this->db->single();
    }
    public function cek_byId($id)
    {

        $query = 'SELECT password FROM ' . $this->table . ' WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $id);
        return $this->db->single();
    }

    public function insert_regis($username, $password, $level, $nama, $jabatan, $jk, $status, $alamat)
    {

        $query = 'INSERT INTO user(username,password,level,nama,jabatan,jk,status,input_by,alamat) VALUES(?,?,?,?,?,?,?,?,?)';
        $this->db->query($query);
        $this->db->bind(1, $username);
        $this->db->bind(2, $password);
        $this->db->bind(3, $level);
        $this->db->bind(4, $nama);
        $this->db->bind(5, $jabatan);
        $this->db->bind(6, $jk);
        $this->db->bind(7, $status);
        $this->db->bind(8, $nama);
        $this->db->bind(9, $alamat);



        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function cek_login($username)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username =?';
        $this->db->query($query);
        $this->db->bind(1, $username);
        try {
            return  $this->db->single();
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    public function updateAksesById($id, $akses, $user)
    {

        $query = 'UPDATE ' . $this->table . '  SET status=?,update_by=?  WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $akses);
        $this->db->bind(2, $user);
        $this->db->bind(3, $id);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }
    public function updatePassById($id, $pass, $user)
    {
        $query = 'UPDATE ' . $this->table . ' SET password=?,update_by=? WHERE id=?';
        $this->db->query($query);
        $this->db->bind(1, $pass);
        $this->db->bind(2, $user);
        $this->db->bind(3, $id);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }
    public function updateLevel($id, $level, $user, $jabatan = null)
    {
        $query = 'UPDATE ' . $this->table . ' SET level=?';
        if (!empty($jabatan) && $jabatan) {
            $query .= ',jabatan=?,update_by=? WHERE id=? ';
            $this->db->query($query);
            $this->db->bind(1, $level);
            $this->db->bind(2, $jabatan);
            $this->db->bind(3, $user);
            $this->db->bind(4, $id);
        } else {
            $query .= ',update_by=? WHERE id=?';
            $this->db->query($query);
            $this->db->bind(1, $level);
            $this->db->bind(2, $user);
            $this->db->bind(3, $id);
        }
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }


    public function  UpdatAkunDiri($id, $nama, $jk, $jabatan, $username, $alamat, $user)
    {
        $query  = "UPDATE " . $this->table . " SET nama=?, jk=?,username=?,jabatan=?,alamat=?,update_by=? WHERE id=?";
        $this->db->query($query);
        $this->db->bind(1, $nama);
        $this->db->bind(2, $jk);
        $this->db->bind(3, $username);
        $this->db->bind(4, $jabatan);
        $this->db->bind(5, $alamat);
        $this->db->bind(6, $user);
        $this->db->bind(7, $id);
        try {
            $this->db->execute();
            return true;
        } catch (PDOException $th) {
            die($th->getMessage());
            return false;
        }
    }
}
