<?php
// base
// if (isset) {
//     # code...
// }
session_start();
// $http = (isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_ADDR'] . "/" : 'http://localhost/');
$http = (isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER['HTTP_HOST']   : 'http://localhost');
define('BASEURL', $http . '/Tenant/tenant-struktur/public');
// define('BASEAPP', 'http://localhost/TA/app');




// database
define('DB_HOST', '192.168.0.33');
define('DB_USER', 'pendaftaran');
define('DB_PASS', 'pendaftaran');
define('DB_NAME', 'tenant_mmc');


// database
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'tenant_mmc');