<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 29.08.2022 / 17:22:18
 */

namespace Ofey\Logan22\model\user\profile;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\controller\promo\promo;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class change {

    static private array $error = [];

    /**
     * Сохранение всех новых данных пользователя
     */
    static public function set() {
        $table = [];
        $varSQL = [];
        if(!empty($_POST['name'])) {
            if(self::valid_name($_POST['name'])) {
                array_push($table, "`name` = ?");
                $varSQL[] = $_POST['name'];
            }
        }
        if(!empty($_POST['new_password'])) {
            if(self::password_comparison($_POST['new_password'], $_POST['two_password'])) {
                array_push($table, "`password` = ?");
                $varSQL[] = $_POST['new_password'];
            }
        }

        if(!empty($_POST['signature'])) {
            if($_POST['signature'] != auth::get_signature()){
                self::valid_signature($_POST['signature']);
                array_push($table, "`signature` = ?");
                $varSQL[] = $_POST['signature'];
            }
        }

        if(!empty(self::$error)) {
            board::notice(false, self::$error);
        }

        $gen = "";
        foreach($table as $key => $word) {
            $gen .= $word;
            if(count($table) != $key + 1) {
                $gen .= ", ";
            }
        }
        $varSQL[] = auth::get_email();
        if(sql::run("UPDATE `users` SET {$gen} WHERE `email` = ?", $varSQL)->rowCount() == 0) {
            board::notice(false, 'Данные не были обновлены');
        }

        if(!empty($_POST['new_password'])){
            auth::set_password($_POST['new_password']);
            auth::apply_password();
        }

        board::notice(true, 'Данные обновлены');
    }

    /**
     * Проверка подписи профиля
     */
    static private function valid_signature($sign): bool {
        if(400 < mb_strlen($sign)) {
            self::$error[] = ["Подпись ограничена 400 символами"];
            return false;
        }
        return true;
    }

    /**
     * Сравнение паролей и валидация пароля
     */
    static private function password_comparison($new_password, $two_password): bool {
        $ok = true;
        if($new_password != $two_password) {
            self::$error[] = ["Пароли не совпали"];
            $ok = false;
        }
        if(4 > mb_strlen($new_password)) {
            self::$error[] = ["Пароль должно быть от 4 символов"];
            $ok = false;
        }
        if(32 < mb_strlen($new_password)) {
            self::$error[] = ["Пароль должен быть до 32 символов"];
            $ok = false;
        }
        return $ok;
    }

    /*
     * Валидация ника пользователя
     */
    static private function valid_name($name): bool {
        $ok = true;
        if(2 > mb_strlen($name)) {
            self::$error[] = ["Имя должно быть от 2 символов"];
            $ok = false;
        }
        if(16 < mb_strlen($name)) {
            self::$error[] = ["Имя до 16 символов"];
            $ok = false;
        }
        if(!preg_match("/^[а-яА-ЯёЁa-zA-Z0-9]+$/", $name) == 1) {
            self::$error[] = ["Имя должен быть формата а-яА-ЯёЁa-zA-Z0-9"];
            $ok = false;
        }
        return $ok;
    }

    /**
     * Записываем аватар пользователя
     */
    static public function set_avatar($avatar){
       return sql::run('UPDATE `users` SET `avatar` = ? WHERE `id` = ?', [$avatar, auth::get_id()]);
    }
    static public function set_avatar_background($avatar){
       return sql::run('UPDATE `users` SET `avatar_background` = ? WHERE `id` = ?', [$avatar, auth::get_id()]);
    }

}