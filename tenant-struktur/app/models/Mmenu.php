<?php
class Mmenu
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
        return $this->db->resaultSet();
    }

    public function getSubmenu($uuid_menu)
    {

        $query = "SELECT uuid,uuid_menu,submenu,link,is_active FROM submenu WHERE  is_active=1 AND uuid_menu=? ORDER BY id DESC ";

        $this->db->query($query);
        $this->db->bind(1, $uuid_menu);
        return $this->db->resaultSet();
    }
    public function getSubsubmenu($uuid_menu)
    {

        $query = "SELECT uuid,uuid_submenu,subsubmenu,link,is_active FROM subsubmenu WHERE  is_active=1 AND uuid_menu=? ORDER BY id DESC ";

        $this->db->query($query);
        $this->db->bind(1, $uuid_menu);
        return $this->db->resaultSet();
    }
}
