<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 31.08.2022 / 16:55:34
 */

namespace Ofey\Logan22\model\user\profile;

use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class other {

    /**
     * Добавляет в переменные шаблона список актуальных серверов
     * и добавляет информацию о выбранном сервере
     *
     * @throws \Exception
     */
    static public function current_server(): void {
        $server_list_menu = server::get_server_info();
        $server_info = null;
        foreach($server_list_menu as $server) {
            if(auth::get_default_server() == $server['id']) {
                $server_info = $server;
            }
        }
        if($server_info == null) {
            if(count($server_list_menu) >= 1) {
                $server_info = $server_list_menu[0];
            }
        }
        tpl::addVar('server_list', $server_list_menu);
        tpl::addVar('server_info', $server_info);
    }

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