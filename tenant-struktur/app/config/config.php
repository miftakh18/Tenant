<?php

session_start();

$http = (isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER['HTTP_HOST']   : 'http://localhost');
define('BASEURL', $http . '/Tenant/tenant-struktur/public');




// database
// define('DB_HOST', '192.168.0.33');
// define('DB_USER', 'pendaftaran');
// define('DB_PASS', 'pendaftaran');
// define('DB_NAME', 'tenant_mmc');


// database
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'tenant_mmc');