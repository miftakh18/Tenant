<?php

class Muser
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getByUsername($username)
    {
        $this->db->query("SELECT * FROM user_tenant WHERE username = :username");
        $this->db->bind(":username", $username);
        return $this->db->single();
    }

    public function getById($id)
    {
        $this->db->query("SELECT uuid, username, email FROM user_tenant WHERE uuid = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
}
