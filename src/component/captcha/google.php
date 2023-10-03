<?php

namespace Ofey\Logan22\component\captcha;

use Ofey\Logan22\component\alert\board;

// Google reCAPTCHA V3

class google {

    public static function check($token = null){
        if($token===null){
            board::notice(false, "Нет токета Google капчи");
        }
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $params = [
            'secret' => GOOGLE_SERVER_KEY,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return json_decode($response, true);
    }

    public static function get_client_key(): string {
        return GOOGLE_CLIENT_KEY;
    }

}
