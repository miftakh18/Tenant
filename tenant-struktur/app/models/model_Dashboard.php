<?php
class model_Dashboard
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }




    public function getAllMenu()
    {
        $query = "SELECT uuid,icon,menu,link,is_active FROM menu WHERE  is_active=1 ORDER BY id DESC ";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resaultSet();
    }
}
