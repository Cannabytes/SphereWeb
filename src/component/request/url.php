<?php

namespace Ofey\Logan22\component\request;

class url {

    //Возвращает HTTPS или HTTP сайта
    public static function scheme(): string{
        $scheme = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'? 'https' : 'http';
        if($_SERVER["SERVER_PORT"] == 443)
            $scheme = 'https';
        elseif (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1')))
            $scheme = 'https';
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
            $scheme = 'https';
        return $scheme;
    }

    //Адрес сайта
    public static function host($addToHost = null): string {
        $host = self::scheme() . "://" . $_SERVER['SERVER_NAME'];
        if($addToHost){
            $addToHost = str_replace("\\", "/", $addToHost);
            return preg_replace("#/+#", "/", $host . "/" . $addToHost);
        }
        return $host;
    }

}