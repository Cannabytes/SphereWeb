<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 17.08.2022 / 17:40:06
 */

namespace Ofey\Logan22\component\time;

use DateTimeZone;

class timezone {

    /**
     * На старых версия РHP по старому называются города, их имена поменяли,
     * API, которые показывают город пользователя тоже могут написать старые названия
     */
    static public function all(): array {
        $listIdentifiers = DateTimeZone::listIdentifiers();
        return str_replace("Europe/Kiev", "Europe/Kyiv", $listIdentifiers);
    }

    /**
     * @param $ip
     *
     * @return array
     * Если нужно получить timezone пользователя по его IP
     *
     * Я нашел несколько бесплатных и без ключа/токена сервисов, которые дадут нам информацию,
     * однако, некоторые из этих сервисов имеют ограничение.
     * https://ip-api.com - ограничение до 45 обращений в минуту
     * https://ipwhois.io - ограничение до 10к в месяц
     * https://ip.sb/api/ -
     * https://www.geoplugin.com/
     */
    static public function get_timezone_ip($ip) {
        if(!filter_var($ip, FILTER_VALIDATE_IP) or $ip == '127.0.0.1') {
            return null;
        }
        $geo = self::get_ip_info_geoplugin($ip);
        if($geo) {
            return $geo;
        }

        $geo = self::get_ip_info_ipApi($ip);
        if($geo) {
            return $geo;
        }

        $geo = self::get_ip_info_ipwho($ip);
        if($geo) {
            return $geo;
        }

        $geo = self::get_ip_info_geoplugin($ip);
        if($geo) {
            return $geo;
        }

        $geo = self::get_ip_info_ipSb($ip);
        if($geo) {
            return $geo;
        }

        return null;
    }

    private static function get_ip_info_ipApi($ip): array|bool {
        $json = file_get_contents("http://ip-api.com/json/{$ip}?fields=status,message,countryCode,city,timezone");
        if(!$json) {
            return false;
        }
        $json = json_decode($json, true);
        if(!$json['success']) {
            return false;
        }
        return [
            'country'  => $json['countryCode'],
            'city'     => self::replace_old_timezone($json['city']),
            'timezone' => $json['timezone'],
        ];
    }

    private static function get_ip_info_ipwho($ip): array|bool {
        $ch = curl_init("https://ipwho.is/" . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $json = json_decode(curl_exec($ch), true);
        curl_close($ch);
        if(!$json['success']) {
            return false;
        }
        return [
            'country'  => $json['country_code'],
            'city'     => self::replace_old_timezone($json['city']),
            'timezone' => $json['timezone']['id'],
        ];
    }

    private static function get_ip_info_geoplugin($ip): array|bool {
        $json = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$ip}"));
        if($json['geoplugin_status'] != 200) {
            return false;
        }
        return [
            'country'  => $json['geoplugin_countryCode'],
            'city'     => self::replace_old_timezone($json['geoplugin_city']),
            'timezone' => $json['geoplugin_timezone'],
        ];
    }

    private static function get_ip_info_ipSb($ip): array {
        $ch = curl_init("https://api.ip.sb/geoip/" . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $json = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return [
            'country'  => $json['country_code'],
            'city'     => self::replace_old_timezone($json['city']),
            'timezone' => $json['timezone'],
        ];
    }

    /**
     * На старых версия РHP по старому называются города, их имена поменяли,
     * API, которые показывают город пользователя тоже могут написать старые названия
     */
    public static function replace_old_timezone($city) {
        return str_replace([
            "Europe/Kiev",
        ], [
            "Europe/Kyiv",
        ], $city);
    }

    /**
     * Есть старые timezone базы даже в PHP 8.1
     * нужно всё таки применять старые названия таймзон для таких случаев
     */
    public static function checkUserTimeZoneOld($userTimezone) {
        if($userTimezone == 'Europe/Kiev') {
            foreach(timezone_identifiers_list() as $row) {
                if('Europe/Kiev' == $row) {
                    return $row;
                }
            }
        }
        return $userTimezone;
    }



}