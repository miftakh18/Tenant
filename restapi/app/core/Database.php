<?php
// 
// class Database
// {
//     private $driver  = 'mysql';
//     private $host    = 'localhost';
//     private $user    = 'root';
//     private $pass    = '180101';
//     private $db_name = 'tenant_mmc';
//     private $port    = 3306;
//     private $dbh;
//     private $stmt;
// 
//     private $connections = [];
// 
// 
//     public function __construct($config = [])
//     {
//         $this->driver  = $config['driver']  ?? 'mysql';
//         $this->host    = $config['host']    ?? $this->host;
//         $this->user    = $config['user']    ?? $this->user;
//         $this->pass    = $config['pass']    ?? $this->pass;
//         $this->db_name = $config['name']    ?? $this->db_name;
//         $this->port    = $config['port']     ?? $this->port;
//         $this->connect();
//     }
// 
//     private function connect()
//     {
// 
// 
//         switch ($this->driver) {
//             case 'mysql':
//                 $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
//                 if ($this->port) {
//                     $dsn .= ";port={$this->port}";
//                 }
//                 $dsn .= ";charset=utf8";
//                 break;
//             case 'pgsql':
//                 $dsn = "pgsql:host={$this->host};dbname={$this->db_name}";
//                 if ($this->port) {
//                     $dsn .= ";port={$this->port}";
//                 }
//                 break;
//             case 'sqlite':
//                 $dsn = "sqlite:{$this->db_name}";
//                 break;
//             default:
//                 throw new Exception("Unsupported driver: {$this->driver}");
//         }
// 
//         // $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
// 
//         $options = [
//             PDO::ATTR_PERSISTENT         => true,
//             PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
//         ];
// 
//         try {
//             $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
//         } catch (PDOException $e) {
//             die('Koneksi gagal: ' . $e->getMessage());
//             // echo phpinfo();
//         }
//     }
// 
// 
//     public function query($query)
//     {
// 
//         $this->stmt = $this->dbh->prepare($query);
//     }
//     // estimasi ada kondisi where 
//     public function bind($param, $value, $type = null)
//     {
//         // menentukan type itu int/bool/null
//         if (is_null($type)) {
//             switch (true) {
//                 case is_int($value):
//                     $type = PDO::PARAM_INT;
//                     break;
//                 case is_bool($value):
//                     $type = PDO::PARAM_BOOL;
//                     break;
//                 case is_null($value):
//                     $type = PDO::PARAM_NULL;
//                     break;
//                 default:
//                     $type = PDO::PARAM_STR;
// 
//                     break;
//             }
//         }
// 
//         $this->stmt->bindValue($param, $value, $type);
//     }
// 
//     // eksekusi 
//     public function execute()
//     {
//         $this->stmt->execute();
//     }
//     // ingin mengambil semua data
//     public function resaultSet()
//     {
//         $this->execute();
//         return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
//     }
// 
//     // ingin mengambil per satu data 
//     public function single()
//     {
//         $this->execute();
//         return $this->stmt->fetch(PDO::FETCH_ASSOC);
//     }
// 
// 
//     public function jumlahKolom()
//     {
// 
//         $this->execute();
//         return $this->stmt->rowCount();
//     }
// 
// 
//     // MAGIC METHOD untuk menangani akses properti seperti $this->hisys
//     public function __get($name)
//     {
//         if (!isset($this->connections[$name])) {
//             // Tambahkan konfigurasi DB lain di sini
//             $configMap = [
//                 'local' => [
//                     'driver' => 'mysql',
//                     'host' => '192.168.0.33',
//                     'user' => 'pendaftaran',
//                     'pass' => 'pendaftaran',
//                     'name' => 'tenant_mmc'
//                 ],
//                 'hisys' => [
//                     'driver'       => 'pgsql',
//                     'host'         => '192.168.0.6',
//                     'username'     => 'itmmc',
//                     'password'     => 'digantidulu',
//                     'dbname'       => 'rsmmc_live',
//                     'port'         => 5433
//                 ]
//             ];
// 
//             if (!isset($configMap[$name])) {
//                 throw new Exception("Database '$name' tidak dikonfigurasi.");
//             }
// 
//             $this->connections[$name] = new self($configMap[$name]);
//         }
// 
//         return $this->connections[$name];
//     }
// }