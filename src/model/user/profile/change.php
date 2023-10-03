<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 29.08.2022 / 17:22:18
 */

namespace Ofey\Logan22\model\user\profile;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\forum\internal;
use Ofey\Logan22\model\user\auth\auth;

class change {

    private static array $error = [];

    public static function transfer_money($money, $toUserID): void {
        sql::run("UPDATE `users` SET `donate_point` = `donate_point` + ? WHERE `id` = ?", [
            $money,
            $toUserID,
        ]);
        sql::run("UPDATE `users` SET `donate_point` = `donate_point` - ? WHERE `id` = ?", [
            $money,
            auth::get_id(),
        ]);
    }

    /**
     * Сохранение всех новых данных пользователя
     */
    public static function set() {
        $table = [];
        $varSQL = [];
        $isChangeName = false;

        if (auth::get_name() != $_POST['name']) {
            if (self::valid_name($_POST['name'])) {
                //Если имя начинается с user- то не даем его менять
                if (mb_substr($_POST['name'], 0, 4) == "user") {
                    self::$error[] = "Имя не может начинаться с user";
                }else{
                    $isChangeName = true;
                    $table[] = "`name` = ?";
                    $varSQL[] = trim($_POST['name']);
                }
            }
        }


        if (!empty($_POST['new_password'])) {
            if (self::password_comparison($_POST['new_password'], $_POST['two_password'])) {
                $table[] = "`password` = ?";
                $varSQL[] = password_hash($_POST['new_password'], config::algorithm_hashing_user_password());
            }
        }

        if (!empty($_POST['signature'])) {
            if ($_POST['signature'] != auth::get_signature()) {
                self::valid_signature($_POST['signature']);
                $table[] = "`signature` = ?";
                $varSQL[] = $_POST['signature'];
            }
        }

        if (auth::get_timezone() != $_POST['timezone']) {
            $ok = in_array(timezone::replace_old_timezone($_POST['timezone']), timezone::all());
            if ($ok) {
                $table[] = "`timezone` = ?";
                $varSQL[] = $_POST['timezone'];
            }
        }

        if (!empty(self::$error)) {
            $errs = "";
            foreach (self::$error as $err) {
                $errs .= $err . "<br>";
            }
            board::notice(false, $errs);
        }


        $gen = "";
        foreach ($table as $key => $word) {
            $gen .= $word;
            if (count($table) != $key + 1) {
                $gen .= ", ";
            }
        }

        if (empty($gen)) {
            board::notice(false, "Вы не изменили ни одного поля");
        }
        $varSQL[] = auth::get_email();
        if (sql::run("UPDATE `users` SET {$gen} WHERE `email` = ?", $varSQL)->rowCount() == 0) {
            board::notice(false, lang::get_phrase(182));
        }

        if (!empty($_POST['new_password'])) {
            auth::set_password($_POST['new_password']);
            auth::apply_password();
        }
        if($isChangeName){
           internal::changeAllUserName(trim($_POST['name']), auth::get_name());
        }
        board::notice(true, lang::get_phrase(183));
    }

    private static function valid_name($name): bool {
        $ok = true;
        if (2 > mb_strlen($name)) {
            self::$error[] = lang::get_phrase(188);
            $ok = false;
        }
        if (16 < mb_strlen($name)) {
            self::$error[] = lang::get_phrase(189);
            $ok = false;
        }
        if (!preg_match("/^[a-zA-Z0-9_\-]+$/u", $name)) {
            self::$error[] = lang::get_phrase(190);
            $ok = false;
        }
        if ($ok) {
            if (!ctype_alpha($name[0])) {
                self::$error[] = "Имя должно начинаться с буквы";
                $ok = false;
            }
        }

        //Проверка существования пользователя с таким ником
        if(sql::run("SELECT `id` FROM `users` WHERE `name` = ?", [$name])->rowCount() > 0){
            self::$error[] = "Пользователь с таким ником уже существует";
            $ok = false;
        }
        return $ok;
    }

    /**
     * Сравнение паролей и валидация пароля
     */
    private static function password_comparison($new_password, $two_password): bool {
        $ok = true;
        if ($new_password != $two_password) {
            self::$error[] = lang::get_phrase(185);
            $ok = false;
        }
        if (4 > mb_strlen($new_password)) {
            self::$error[] = lang::get_phrase(186);
            $ok = false;
        }
        if (32 < mb_strlen($new_password)) {
            self::$error[] = lang::get_phrase(187);
            $ok = false;
        }
        return $ok;
    }

    /*
     * Валидация ника пользователя
     */

    /**
     * Проверка подписи профиля
     */
    private static function valid_signature($sign): bool {
        if (400 < mb_strlen($sign)) {
            self::$error[] = lang::get_phrase(184);
            return false;
        }
        return true;
    }

    /**
     * Записываем аватар пользователя
     */
    public static function set_avatar($avatar) {
        return sql::run('UPDATE `users` SET `avatar` = ? WHERE `id` = ?', [
            $avatar,
            auth::get_id(),
        ]);
    }

    public static function set_avatar_background($avatar) {
        return sql::run('UPDATE `users` SET `avatar_background` = ? WHERE `id` = ?', [
            $avatar,
            auth::get_id(),
        ]);
    }

    public static function set_theme($theme) {
        //Необходимо удалить все другие темы
        sql::run('DELETE FROM `user_variables` WHERE `user_id` = ? AND `var` = ?', [
            auth::get_id(),
            "theme",
        ]);
        return sql::run('INSERT INTO `user_variables` (`user_id`, `var`, `val`) VALUES (?, ?, ?)', [
            auth::get_id(),
            "theme",
            $theme,
        ]);
    }
}