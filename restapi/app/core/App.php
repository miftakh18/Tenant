<?php
class App
{
    protected $controller = 'user';
    protected $method     = 'index';
    protected $params     = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // seting controller  
        // cek $url[0] NULL
        if ($url == NULL) {
            $url = [$this->controller];
        }

        // posisi di index luar
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            // menghilangkan $array[index]
            unset($url[0]);
        } else {
            $this->controller = 'error_page';
            $this->method     = 'error_404';
        }



        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;


        //setting method 
        if (isset($url[1])) {
            //  method_exists(class,string method)
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // setting parameter

        if (!empty($url)) {

            // ambil data
            $this->params = array_values($url);
        }

        // jalankan controller & method dan serta kirimkan params jika ada

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        // membuat url lebih rapih 
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
