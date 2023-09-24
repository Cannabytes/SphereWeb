<?php

namespace Ofey\Logan22\component\captcha;

use Ofey\Logan22\component\alert\board;

// Google reCAPTCHA V3

class google {

    private static string $client_key = "";
    private static string $server_key = "";

    public static function check($token = null){
        if($token===null){
            board::notice(false, "Нет токета Google капчи");
        }
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $params = [
            'secret' => self::$server_key,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ];

        // Делаем запрос
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Отправляем запрос
        $response = curl_exec($ch);
        return json_decode($response, true);
    }

    public static function get_client_key(){
        return self::$client_key;
    }

}
