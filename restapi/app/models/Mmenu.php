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
        $query = "SELECT uuid,icon,menu,link,is_active FROM menu WHERE  is_active=1 ";
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



    public function getMenuUuid_user($uuid_user)
    {
        $query = "SELECT DISTINCT
                    ru.id_user,
                    m.* FROM `role_tenant` rt LEFT JOIN  role_user  ru  ON ru.id_tenant = rt.uuid_tenant 
                    LEFT JOIN menu m ON rt.uuid_menu = m.uuid
                    WHERE ru.id_user = ? AND m.is_active=1;";
        $this->db->query($query);
        $this->db->bind(1, $uuid_user);
        return $this->db->resaultSet();
    }
    public function getSMenuUuid_user($uuid_user, $uuid_menu)
    {
        $query = "SELECT DISTINCT
                    ru.id_user,
                    sm.* FROM `role_tenant` rt LEFT JOIN  role_user  ru  ON ru.id_tenant = rt.uuid_tenant 
                    LEFT JOIN submenu sm ON rt.uuid_submenu = sm.uuid
                    WHERE ru.id_user = ? AND sm.uuid_menu =? AND sm.is_active=1;";
        $this->db->query($query);
        $this->db->bind(1, $uuid_user);
        $this->db->bind(2, $uuid_menu);
        return $this->db->resaultSet();
    }


    public function getSSMenuUuid_user($uuid_user, $uuid_menu)
    {
        $query = "SELECT DISTINCT
                    ru.id_user,
                    ssm.* FROM `role_tenant` rt LEFT JOIN  role_user  ru  ON ru.id_tenant = rt.uuid_tenant 
                    LEFT JOIN subsubmenu ssm  ON rt.uuid_subsubmenu = ssm.uuid
                    WHERE ru.id_user = ? AND  ssm.uuid_menu =?  AND ssm.is_active=1;";
        $this->db->query($query);
        $this->db->bind(1, $uuid_user);
        $this->db->bind(2, $uuid_menu);
        return $this->db->resaultSet();
    }
}
