<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.09.2022 / 0:09:15
 */

namespace Ofey\Logan22\model\user\auth;

use DateTime;
use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\mail\mail;
use Ofey\Logan22\model\db\sql;
use SimpleCaptcha\Builder;

class forget {

    static public function generate_string($count = 12): string {
        $input = '0123456789abcdefghijklmnopqrstuvwxyz';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $count; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    /**
     * @throws \Exception
     */
    static public function password() {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            board::notice(false, lang::get_phrase(281));
        }
        $builder = new Builder;
        $captcha = $_POST['captcha'] ?? false;
        if (!$builder->compare(trim($captcha), $_SESSION['captcha'])) {
            board::alert(['ok' => false, "message" => lang::get_phrase(295), "code" => 1]);
        }

        $userValid = self::userValid($email);
        if(!$userValid) {
            board::notice(false, lang::get_phrase(282));
        }
        if($userValid['access_level'] == "admin") {
            board::notice(false, lang::get_phrase(283));
        }
        $code = self::generate_string();
        $date = new DateTime();
        sql::run("INSERT INTO `users_password_forget` (`code`, `email`, `date`, `ip`, `active`) VALUES (?, ?, ?, ?, ?)", [
            $code,
            $email,
            $date->format('Y-m-d H:i:s'),
            $_SERVER['REMOTE_ADDR'],
            true,
        ], true);

        $link = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/auth/forget/code/" . $code;
        $forgetFilename = "src/template/cabinet/email/" . lang::lang_user_default() . "/forget_link.html";
        if(!file_exists($forgetFilename)) {
            board::notice(true, lang::get_phrase(145));
        }
        $content = file_get_contents($forgetFilename);
        $content = str_replace([
            '%code%',
            '%link%',
        ], [
            $code,
            $link,
        ], $content);
        $isMail = mail::send($email, $content, lang::get_phrase(169));
        if($isMail['ok']) {
            board::notice(true, lang::get_phrase(168));
        }
        board::notice(false, $isMail['message']);
    }

    public static function verification() {
        $email = $_POST['email'];
        $code = $_POST['code'];
        $ok = sql::run("SELECT `id`, `active`, `date` FROM `users_password_forget` WHERE code=? AND email=?", [
            $code,
            $email,
        ])->fetch();
        if(!$ok) {
            board::notice(false, lang::get_phrase(170));
        }
        if(!$ok['active']) {
            board::notice(false, lang::get_phrase(171));
        }
        $nowTime = new DateTime();
        $requestTime = new DateTime($ok['date']);

        if(($requestTime->getTimestamp() - $nowTime->getTimestamp()) > 10 * 60) {
            board::notice(false, lang::get_phrase(172));
        }

        $password = generation::password();
        if(auth::change_user_password($email, $password)) {
            sql::run("UPDATE `users_password_forget` SET `active` = ? WHERE `id` = ?", [
                0,
                $ok['id'],
            ]);
            self::send_new_password($email, $password);
        }
        board::notice(false, lang::get_phrase(173));
    }

    public static function send_new_password($email, $password) {
        $link = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/auth";
        $lang = lang::lang_user_default();
        $forgetFilename = "src/template/cabinet/email/{$lang}/new_password.html";
        if(!file_exists($forgetFilename)) {
            board::notice(false, lang::get_phrase(280, $forgetFilename));
        }
        $content = file_get_contents($forgetFilename);
        $content = str_replace([
            '%password%',
            '%link%',
        ], [
            $password,
            $link,
        ], $content);
        $isMail = mail::send($email, $content, lang::get_phrase(176));
        if($isMail['ok']) {
            board::notice(true, lang::get_phrase(175));
        }
        board::notice(false, $isMail['message']);
    }

    /**
     * @throws \Exception
     */
    public static function reset_password(): void {
        $email = $_POST['email'];
        $code = $_POST['code'];
        $userValid = self::userValid($email);
        if(!$userValid) {
            board::notice(false, lang::get_phrase(282));
        }
        if($userValid['access_level'] == "admin") {
            board::notice(false, lang::get_phrase(283));
        }
        $data = sql::run("SELECT `id`, `active`, `date` FROM `users_password_forget` WHERE code=? AND email=?", [
            $code,
            $email,
        ])->fetch();
        if(!$data) {
            board::notice(false, lang::get_phrase(180));
        }
        if($data['active'] == 0) {
            board::notice(false, lang::get_phrase(171));
        }
        $nowTime = new DateTime();
        $requestTime = new DateTime($data['date']);
        $second_b = $nowTime->getTimestamp() - $requestTime->getTimestamp();
        if($second_b >= 60 * 10) {
            board::notice(false, lang::get_phrase(172));
        }
        $password = generation::password();
        if(auth::change_user_password($email, password_hash($password, PASSWORD_ARGON2I))) {
            sql::run("UPDATE `users_password_forget` SET `active` = ? WHERE `id` = ?", [
                0,
                $data['id'],
            ]);
            self::send_new_password($email, $password);
        }
        board::notice(false, lang::get_phrase(173));
    }

    //Проверка существования юзера
    public static function userValid($email) {
        return sql::getRow("SELECT `access_level` FROM `users` WHERE email=? LIMIT 1", [
            $email,
        ]);
    }

    //
    public static function dataForgetInfo($code) {
        return sql::getRow("SELECT * FROM `users_password_forget` WHERE code=?", [
            $code,
        ]);
    }
}