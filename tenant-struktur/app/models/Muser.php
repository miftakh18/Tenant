<?php
class Muser extends ApiClient
{

    private  $api;
    public function __construct() {}

    public function cek_login($username, $password)
    {

        return $this->request_api('localhost/Tenant/restapi/public/Api/login', ['username' => $username, 'password' => $password]);
    }
}
