<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMS extends Controller
{
    public function sendSMS($data){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mrlenga.com/api/v1/sms/sendsms/single",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"senderid\"\r\n\r\nInfo\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"to\"\r\n\r\n". $data['to'] ."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sms\"\r\n\r\n". $data['sms'] ."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"api_key\"\r\n\r\n654321\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"api_secret\"\r\n\r\n654321\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 8fbf5add-c408-52e3-b5da-03f206270478"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        return $response;

    }

}
