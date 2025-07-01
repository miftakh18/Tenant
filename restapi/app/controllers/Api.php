<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;

class Api extends Controller
{


    public function Auth()
    {


        $input    = $this->requestes();
        // var_dump($input);
        // exit;
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


                    $payload = [
                        "iss" => "localhost",
                        "aud" => "localhost",
                        "iat" => time(),
                        // "exp" => time() + 3600,
                        "exp" => 1000,
                        "sub" => $user['uuid'],
                        "result" => $user
                    ];

                    $jwt = JWT::encode($payload, $this->key, 'HS256');


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

    public function getData()
    {
        // echo json_encode($_SERVER['HTTP_AUTHORIZATION']);
        // // exit;
        $authHeader  = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

        if (!$authHeader) {
            http_response_code(401); // Unauthorized
            echo json_encode(['message' => 'Token otentikasi tidak ditemukan.']);
            exit;
        }
        $token = str_replace('Bearer ', '', $authHeader);

        try {

            echo json_encode('benar');
        } catch (ExpiredException $e) {
            // Tangani error jika token sudah kedaluwarsa
            http_response_code(401); // Unauthorized
            echo json_encode(['message' => 'Token telah kedaluwarsa: ' . $e->getMessage()]);
        } catch (SignatureInvalidException $e) {
            // Tangani error jika tanda tangan tidak valid (token palsu/diubah)
            http_response_code(401); // Unauthorized
            echo json_encode(['message' => 'Tanda tangan token tidak valid: ' . $e->getMessage()]);
        } catch (Exception $e) {
            // Tangani error umum lainnya (misal: token formatnya salah)
            http_response_code(401); // Unauthorized
            echo json_encode(['message' => 'Token tidak valid: ' . $e->getMessage()]);
        }
    }
}
