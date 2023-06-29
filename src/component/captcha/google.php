<?php

namespace Ofey\Logan22\component\captcha;

class google {



    private static string $client_key = "6LeyGOAmAAAAABZoLda4l-D49qpFzpDGICszdvEH";
    private static string $server_key = "6LeyGOAmAAAAAGp5DSOLm2yYULYfBWYEJU7W4RRU";

    public static function check($token){
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // Параметры отправленных данных
        $params = [
            'secret' => self::$server_key, // Секретный ключ
            'response' => $token, // Токин
            'remoteip' => $_SERVER['REMOTE_ADDR'], // IP-адрес пользователя
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