<?php

class Controller
{
    public $header;

    public function __construct() {}
    // public function header()
    // {
    // }
    public function view($view, $data = [])

    {
        if (!empty($view == 'user/login' || $view == 'user/sign_up' || $view == 'templates/header')) {
            // menaruh logo
            require_once '../app/views/templates/logo.php';
        }
        if ($view == 'user/login' || $view == "user/sign_up") {
            // tanpa session
            require_once '../app/views/' . $view . '.php';
        } else {
            if (!isset($_SESSION["login"])) {
                // erorr session
                require_once '../app/views/error/error_session.php';
            } else {
                require_once '../app/views/' . $view . '.php';
            }
        }
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function pdf()
    {
        require_once '../public/assets/vendor/autoload.php';
    }


    public function     return_json($param)
    {
        echo json_encode($param);
    }
}
