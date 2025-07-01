<?php

class Controller
{
    private $requestMethod;
    public    $requestData;
    private $allowedMethods = ['GET', 'POST'];
    protected $key     = 'HoohTenant.123';
    public function __construct()
    {
        header('Content-Type: application/json');
        $this->requestMethod  = $_SERVER['REQUEST_METHOD'];
        $this->handleRequest();


        $this->api_JWT();
    }

    private function handleRequest()
    {
        if (!in_array($this->requestMethod, $this->allowedMethods)) {
            // Jika tidak diizinkan, kirim respons error dan hentikan eksekusi.
            $this->sendErrorResponse(
                405,
                'Metode ' . $this->requestMethod . ' tidak diizinkan untuk endpoint ini.'
            );
        } else {

            $methodMap = [
                'GET'    => $_GET,
                'POST'   => $_POST,
                'PUT'    => json_decode(file_get_contents("php://input"), true),
                'DELETE' => json_decode(file_get_contents("php://input"), true),
            ];

            $this->requestData = $methodMap[$this->requestMethod] ?? [];
            // echo json_encode($this->requestData);
        }
    }

    public function requestes()
    {
        return $this->requestData;
    }

    private function getData()
    {
        // Logika untuk mengambil data dari database...
        $response = ['message' => 'Ini adalah respons dari method GET'];
        $this->sendSuccessResponse($response);
    }

    private function createData()
    {
        // Logika untuk menyimpan data baru ke database...
        $response = ['message' => 'Data baru berhasil dibuat (respons dari method POST)'];
        $this->sendSuccessResponse($response, 201); // 201 Created
    }

    private function sendSuccessResponse($data, $statusCode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }

    /**
     * Helper untuk mengirim respons error.
     */
    private function sendErrorResponse($statusCode, $message)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode(['error' => $message]);
        exit; // Hentikan eksekusi skrip
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
        exit;
    }

    public function api_JWT()
    {
        require_once '../public/vendor/autoload.php';
    }
}
