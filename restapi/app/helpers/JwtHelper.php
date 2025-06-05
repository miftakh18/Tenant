<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper
{
    private static $key = 'rahasia';
    private static $alg   =  'HS256';
    public static function encode($payload)
    {

        return JWT::encode($payload, self::$key, self::$alg);
    }

    public static function decode($jwt)
    {
        return  JWT::decode($jwt, new Key(self::$key, self::$alg));
    }
}
