<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 31.08.2022 / 16:55:34
 */

namespace Ofey\Logan22\model\user\profile;

use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class other {

    static private array $users_info   = [];
    static private bool  $attempt_user = false;

    /**
     * Функция, которая принимает массив ID юзеров и возвращает массив информации о нужных пользователях
     * Второй необязательный параметр ID пользователя, о котором нужна информация.
     */
    static public function get_users_scan($users_id = [], $user_id = null) {
        if(self::$attempt_user) {
            if($user_id != null) {
                return self::get_user_in_list($user_id);
            }
            return self::$users_info;
        }
        if(!$users_id){
            return null;
        }
        self::$attempt_user = true;
        $users_id = array_unique($users_id);
        self::$users_info = sql::run("SELECT id, email, `name` FROM users WHERE id IN (" . implode(',', $users_id) . ")")->fetchAll();
        if($user_id != null) {
            return self::get_user_in_list($user_id);
        }
        return self::$users_info;
    }

    static public function get_user_in_list($user_id) {
        if(!self::$attempt_user) {
            return 'You must specify a list of users';
        }
        foreach(self::$users_info as $user) {
            if($user_id == $user['id']) {
                return $user;
            }
        }
        return false;
    }
}