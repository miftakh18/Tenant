<?php

class ApiClient
{


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
            //     'Authorization: Bearer ',
            // ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
    protected function cek_and_getData($link, $data, $token)
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
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
