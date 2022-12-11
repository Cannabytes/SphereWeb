<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 16.08.2022 / 16:36:36
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\user\auth\auth;

class validation {

    /**
     * Список категорий, которым разрешен доступ
     * user, admin
     * default: all
     */
    public static function user_protection($var = [
        "user",
        "admin",
    ]) {
        $user_privilege = auth::get_access_level();
        if(is_array($var)) {
            foreach($var as $group) {
                if($group == $user_privilege) {
                    return true;
                }
            }
        } else {
            if($var == $user_privilege) {
                return true;
            }
        }
        header("Location: /main");
        die();
    }

    //Проверка, является ли пользователь админом
    public static function is_admin(): bool {
        if(auth::get_access_level() == "admin") {
            return true;
        }
        return false;
    }

    // Запрет на посещения от НЕ админов.
    public static function tamper_protection() {
        if(self::is_admin() == false) {
            header("Location: /main2");
            die();
        }
    }

    //Проверка пустого запроса
    public static function request_post(): bool {
        if(empty($_POST)) {
            board::notice( false, 'Нельзя передавать пустой запрос' );
        }
        return true;
    }

    public static function min_len($string, $n = 4): bool {
        if(mb_strlen($string) >= $n) {
            return true;
        }
        return false;
    }

    public static function max_len($string, $n = 140): bool {
        if(mb_strlen($string) <= $n) {
            return true;
        }
        return false;
    }
}