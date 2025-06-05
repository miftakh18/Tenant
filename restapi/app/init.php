<?php
// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
// require_once 'config/config.php';
spl_autoload_register(
    function ($class) {
        $class = explode('\\', $class);
        $class = end($class);
        require_once __DIR__ . '/core/' . $class . '.php';
    }
);
require_once 'config/config.php';
