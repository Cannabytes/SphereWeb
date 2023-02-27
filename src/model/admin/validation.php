<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 16.08.2022 / 16:36:36
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\user\auth\auth;

class validation {

    /**
     * Список категорий, которым разрешен доступ
     * user, admin
     * default: all
     */
    public static function user_protection($var = ["user", "admin"]) {
        $user_privilege = auth::get_access_level();
        if(in_array($user_privilege, (array)$var)) {
            return true;
        }
        redirect::location("/main");
    }


    //Проверка, является ли пользователь админом
    public static function is_admin(): bool {
        return auth::get_access_level() == "admin";
    }

    public static function min_len($string, $n = 4): bool {
        return (mb_strlen($string) >= $n);
    }

    public static function max_len($string, $n = 140): bool {
        return (mb_strlen($string) <= $n);
    }

}