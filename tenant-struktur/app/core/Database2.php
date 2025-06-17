<?php
class Database2
{

    protected $driver;
    protected $host;
    protected $user;
    protected $pass;
    protected $db_name;
    protected $port;
    protected $dbh;
    protected $stmt;
    protected $connections = [];

    public function __construct() {}

    protected function connect()
    {


        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
        if ($this->port) {
            $dsn .= ";port={$this->port}";
        }
    }

    public function __get($name)
    {


        $config['local']['driver'] = 'mysql';
        $config['local']['host']   = 'localhost';
        $config['local']['user']   = 'root';
        $config['local']['pass']   = '';
        $config['local']['dbname'] = 'tenant_mmc';
    }
}
