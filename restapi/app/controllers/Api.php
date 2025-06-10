<?php

use Firebase\JWT\JWT;

class Api extends Controller
{
    public function __construct()
    {

        $this->api_JWT();
    }
    public function login()
    {
        // $input = json_decode(file_get_contents("php://input"), true);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $input    = $_POST;
            $username = $input['username'] ?? '';
            $password = $input['password'] ?? '';

            $user = $this->model('Muser')->getByUsername($username);


            if ($user && password_verify($password, $user['password'])) {
                $payload = [
                    "iss" => "localhost",
                    "aud" => "localhost",
                    "iat" => time(),
                    "exp" => time() + 3600,
                    "sub" => $user['uuid']
                ];

                $jwt = JWT::encode($payload, "rahasia", 'HS256');

                $this->return_json(["token" => $jwt, 'login' => ""]);
            } else {
                $this->return_json(["message" => "Login gagal"], 401);
            }
        }
    }

    public function profile()
    {
        $user_id = JWTMiddleware::validateToken();
        $user = $this->model('Muser')->getById($user_id);
        $this->return_json($user);
    }
}
