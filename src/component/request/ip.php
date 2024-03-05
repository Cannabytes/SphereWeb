<?php

namespace Ofey\Logan22\component\request;

class ip {

    private static array $allowIP = [];
    private static string $ip;

    public static function allowIP($allowIP = [], $ip = null, $isDue = true): null|bool {
        if($ip == null){
            self::$ip = $_SERVER['REMOTE_ADDR'];
        }else{
            self::$ip = $ip;
        }
        if($allowIP==[]){
            return true;
        }
        self::$allowIP = $allowIP;
        $isAllow = self::isIPAllowed();
        if(!$isAllow){
            if($isDue){
                die("Forbidden: Your IP is not in the list of allowed");
            }
            return false;
        }
        return true;
    }

    private static function isIPAllowed(): bool {
        foreach (self::$allowIP as $allowed) {
            if (self::ipMatches(self::$ip, $allowed)) {
                return true;
            }
        }
        return false;
    }

    private static function ipMatches(string $ip, string $allowed): bool {
        if($allowed=="*"){
            return true;
        }
        // Проверка для IPv4
        if (filter_var($allowed, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return self::checkIPv4($ip, $allowed);
        }
        // Проверка для IPv6
        elseif (filter_var($allowed, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return self::checkIPv6($ip, $allowed);
        }
        // Проверка для CIDR
        elseif (strpos($allowed, '/')) {
            return self::checkCIDR($ip, $allowed);
        }
        return false;
    }


    private static function checkIPv4(string $ip, string $allowed): bool {
        return $ip === $allowed;
    }

    private static function checkIPv6(string $ip, string $allowed): bool {
        return $ip === $allowed;
    }

    private  static  function checkCIDR(string $ip, string $cidr): bool {
        list($subnet, $maskBits) = explode('/', $cidr);

        $subnetLong = ip2long($subnet);
        $ipLong = ip2long($ip);

        // Вычисляем маску по числу бит
        $mask = -1 << (32 - $maskBits);

        // Проверяем соответствие по маске
        return ($ipLong & $mask) === ($subnetLong & $mask);
    }

    public static function getIp() {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


}