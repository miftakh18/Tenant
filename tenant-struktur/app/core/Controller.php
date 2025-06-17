<?php

class Controller
{

    public function __construct() {}
    // public function header()
    // {
    // }
    public function view($view, $data = [], $header = null, $footer = null)

    {
        // if (!empty($view == 'user/login' || $view == 'user/sign_up')) {
        // menaruh logo
        require_once '../app/views/templates/logo.php';
        // }
        if ($view == 'user/login' || $view == "user/sign_up") {
            // tanpa session
            require_once '../app/views/' . $view . '.php';
        } else {
            if (!isset($_SESSION["login"])) {
                // erorr session
                require_once '../app/views/error/error_session.php';
            } else {
                if (!empty($header == 'header')) {

                    // $data['menu'] = $this->model('Mmenu')->getMenuUuid_user($_SESSION['login']);
                    // require_once '../app/views/templates/header.php';
                }
                if (!file_exists('../app/views/' . $view . '.php')) {
                    require_once '../app/views/error/404.php';
                } else {
                    require_once '../app/views/' . $view . '.php';
                }
                // if (!empty($footer == 'footer'))  require_once '../app/views/templates/footer.php';
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
    protected function request_api($link, $data)
    {



        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            // CURLOPT_HTTPHEADER => array(
            //     'Content-Type: application/json',
            // ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
