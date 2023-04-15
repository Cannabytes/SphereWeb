<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 29.08.2022 / 17:22:18
 */

namespace Ofey\Logan22\model\user\profile;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\timezone;
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
                $table[] = "`name` = ?";
                $varSQL[] = $_POST['name'];
            }
        }
        if(!empty($_POST['new_password'])) {
            if(self::password_comparison($_POST['new_password'], $_POST['two_password'])) {
                $table[] = "`password` = ?";
                $varSQL[] = $_POST['new_password'];
            }
        }

        if(!empty($_POST['signature'])) {
            if($_POST['signature'] != auth::get_signature()) {
                self::valid_signature($_POST['signature']);
                $table[] = "`signature` = ?";
                $varSQL[] = $_POST['signature'];
            }
        }

        if(!empty($_POST['timezone'])) {
            $ok = array_search(timezone::replace_old_timezone($_POST['timezone']), timezone::all());
            if($ok) {
                $table[] = "`timezone` = ?";
                $varSQL[] = $_POST['timezone'];
            } else {
                self::$error[] = [lang::get_phrase(326)];
            }
        }

        if(!empty(self::$error)) {
            board::alert([
                'ok'      => false,
                'message' => self::$error,
            ]);
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
            board::notice(false, lang::get_phrase(182));
        }

        if(!empty($_POST['new_password'])) {
            auth::set_password($_POST['new_password']);
            auth::apply_password();
        }

        board::notice(true, lang::get_phrase(183));
    }

    /**
     * Проверка подписи профиля
     */
    static private function valid_signature($sign): bool {
        if(400 < mb_strlen($sign)) {
            self::$error[] = [lang::get_phrase(184)];
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
            self::$error[] = [lang::get_phrase(185)];
            $ok = false;
        }
        if(4 > mb_strlen($new_password)) {
            self::$error[] = [lang::get_phrase(186)];
            $ok = false;
        }
        if(32 < mb_strlen($new_password)) {
            self::$error[] = [lang::get_phrase(187)];
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
            self::$error[] = [lang::get_phrase(188)];
            $ok = false;
        }
        if(16 < mb_strlen($name)) {
            self::$error[] = [lang::get_phrase(189)];
            $ok = false;
        }
        if(!preg_match("/^[а-яА-ЯёЁa-zA-Z0-9]+$/", $name) == 1) {
            self::$error[] = [lang::get_phrase(190)];
            $ok = false;
        }
        return $ok;
    }

    /**
     * Записываем аватар пользователя
     */
    static public function set_avatar($avatar) {
        return sql::run('UPDATE `users` SET `avatar` = ? WHERE `id` = ?', [
            $avatar,
            auth::get_id(),
        ]);
    }

    static public function set_avatar_background($avatar) {
        return sql::run('UPDATE `users` SET `avatar_background` = ? WHERE `id` = ?', [
            $avatar,
            auth::get_id(),
        ]);
    }
}