<?php

class Database
{
    private $host       = DB_HOST;
    private    $user    = DB_USER;
    private    $pass    = DB_PASS;
    private    $db_name = DB_NAME;

    // database Handle 
    private $dbh;
    //  statement 
    private $stmt;


    public function __construct()
    {
        $this->host    = $config['host']    ?? DB_HOST;
        $this->user    = $config['user']    ?? DB_USER;
        $this->pass    = $config['pass']    ?? DB_PASS;
        $this->db_name = $config['name']    ?? DB_NAME;

        $this->connect();
    }

    private function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $options = [
            PDO::ATTR_PERSISTENT         => true,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die('Koneksi gagal: ' . $e->getMessage());
        }
    }


    public function query($query)
    {

        $this->stmt = $this->dbh->prepare($query);
    }
    // estimasi ada kondisi where 
    public function bind($param, $value, $type = null)
    {
        // menentukan type itu int/bool/null
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;

                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // eksekusi 
    public function execute()
    {
        $this->stmt->execute();
    }
    // ingin mengambil semua data
    public function resaultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ingin mengambil per satu data 
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function jumlahKolom()
    {

        $this->execute();
        return $this->stmt->rowCount();
    }


    // MAGIC METHOD untuk menangani akses properti seperti $this->hisys
    public function __get($name)
    {
        if (!isset($this->connections[$name])) {
            // Tambahkan konfigurasi DB lain di sini
            $configMap = [
                'local' => [
                    'host' => '192.168.0.33',
                    'user' => 'pendaftaran',
                    'pass' => 'pendaftaran',
                    'name' => 'tenant_mmc'
                ]
            ];

            if (!isset($configMap[$name])) {
                throw new Exception("Database '$name' tidak dikonfigurasi.");
            }

            $this->connections[$name] = new self($configMap[$name]);
        }

        return $this->connections[$name];
    }
}
