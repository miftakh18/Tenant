<?php

use Firebase\JWT\JWT;

class Api extends Controller
{
    protected $request;
    public function __construct()
    {
        $this->handleRequest();
        if (empty($this->request)) {
            $this->return_json(['message' => 'Method Request tidak berlaku']);
        }
        $this->api_JWT();
    }
    private function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->request = $_GET;
                break;

            case 'POST':
                $this->request = $_POST;
                break;

            case 'PUT':
            case 'DELETE':
            case 'PATCH':
                parse_str(file_get_contents("php://input"), $input);
                $this->request = $input;
                break;

            default:
                $this->request = [];
        }
    }
    public function login()
    {


        $input    = $this->request;
        $username = $input['username'] ?? '';
        $password = $input['password'] ?? '';
        $output   = [];

        $user = $this->model('model_user')->cek_login($username);
        $output['status'] = false;
        // $this->return_json($user);
        if ($user) {
            if ($user['is_active'] == 0) {
                $output['tipe'] = 'error';
                $output['pesan'] =   'Akun Anda Di NonAktifkan';
                $output['is_active'] =   $user['is_active'];
            } else {
                if (empty($username)) {
                    $output = ['tipe' => 'error', 'pesan' => 'Username anda masih kosong'];
                } elseif (password_verify($password, $user["password"])) {

                    $key     = 'HoohTenant';
                    $payload = [
                        "iss" => "localhost",
                        "aud" => "localhost",
                        "iat" => time(),
                        "exp" => time() + 3600,
                        "sub" => $user['uuid'],
                        "result" => $user
                    ];

                    $jwt = JWT::encode($payload, $key, 'HS256');


                    // set session
                    $data["login"]   = $user["uuid"];
                    $data["nama"]    = $user["nama"];
                    $data["token"]   = $jwt;

                    // $_SESSION["level"] = $sql["level"];
                    // $_SESSION['id']  = $sql['id'];
                    // $_SESSION['jabatan'] = $sql['jabatan'];
                    $output['status'] = true;
                    $output['data']   = $jwt;
                } elseif (empty($password)) {
                    $output['tipe'] = 'error';
                    $output['pesan'] =   'Password anda masih kosong';
                } else {
                    $output['tipe'] = 'error';
                    $output['pesan'] =   'Password yang Anda Masukkan Salah';
                }
            }
        } else {
            $output = ['tipe' => 'error', 'pesan' => 'username yang Anda Masukkan Salah'];
        }
        $this->return_json($output);
    }

    public function profile()
    {
        $user_id = JWTMiddleware::validateToken();
        $user = $this->model('Muser')->getById($user_id);
        $this->return_json($user);
    }
}
