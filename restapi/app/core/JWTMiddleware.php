<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTMiddleware
{
    public static function validateToken()
    {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(["message" => "Authorization header missing"]);
            exit;
        }

        $authHeader = $headers['Authorization'];
        $token = str_replace('Bearer ', '', $authHeader);

        try {
            $secret_key = "rahasia";
            $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
            return $decoded->sub;
        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(["message" => "Invalid token"]);
            exit;
        }
    }
}
