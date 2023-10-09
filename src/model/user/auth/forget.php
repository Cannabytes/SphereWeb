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
use Ofey\Logan22\component\captcha\captcha;
use Ofey\Logan22\component\captcha\google;
use Ofey\Logan22\component\config\config;
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
        if (config::get_captcha_version("google")) {
            $g_captcha = google::check($_POST['captcha'] ?? null);
            if (isset($g_captcha['success']) and !$g_captcha['success']) {
                board::notice(false, $g_captcha['error-codes'][0]);
            }
        } elseif (config::get_captcha_version("default")) {
            $builder = new Builder();
            $captcha = $_POST['captcha'] ?? false;
            $userSessionCaptcha = $_SESSION['captcha'];
            captcha::generation();
            if (!$builder->compare(trim($captcha), $userSessionCaptcha)) {
                board::response("notice", ["message" => lang::get_phrase(295), "ok"=>false, "reloadCaptcha" => true]);
            }
        }
        //Делаем проверку на существования уже активного запроса
        $data = sql::run("SELECT `id`, `active`, `date` FROM `users_password_forget` WHERE email=? AND active=? ORDER BY id DESC", [
            $email,
            true,
        ])->fetch();
        if($data) {
            $nowTime = new DateTime();
            $requestTime = new DateTime($data['date']);
            $second_b = $nowTime->getTimestamp() - $requestTime->getTimestamp();

            if($second_b < 60 * 10) {
                board::notice(false, "Запрос уже был отправлен. Повторный запрос можно сделать через " . (10 - floor($second_b / 60)) . " минут");
            }
        }

        exit();
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
        $forgetFilename = "src/template/logan22/email/" . lang::lang_user_default() . "/forget_link.html";
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
        mail::send($email, $content, lang::get_phrase(169));
    }

    public static function verification() {

        if (config::get_captcha_version("google")) {
            $g_captcha = google::check($_POST['captcha'] ?? null);
            if (isset($g_captcha['success']) and !$g_captcha['success']) {
                board::notice(false, $g_captcha['error-codes'][0]);
            }
        } elseif (config::get_captcha_version("default")) {
            $builder = new Builder();
            $captcha = $_POST['captcha'] ?? false;
            $userSessionCaptcha = $_SESSION['captcha'];
            captcha::generation();
            if (!$builder->compare(trim($captcha), $userSessionCaptcha)) {
                board::response("notice", ["message" => lang::get_phrase(295), "ok"=>false, "reloadCaptcha" => true]);
            }
        }

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
        if(auth::change_user_password($email, password_hash($password, config::algorithm_hashing_user_password()))) {
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
        $forgetFilename = "src/template/logan22/email/{$lang}/new_password.html";
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

        if (config::get_captcha_version("google")) {
            $g_captcha = google::check($_POST['captcha'] ?? null);
            if (isset($g_captcha['success']) and !$g_captcha['success']) {
                board::notice(false, $g_captcha['error-codes'][0]);
            }
        } elseif (config::get_captcha_version("default")) {
            $builder = new Builder();
            $captcha = $_POST['captcha'] ?? false;
            $userSessionCaptcha = $_SESSION['captcha'];
            captcha::generation();
            if (!$builder->compare(trim($captcha), $userSessionCaptcha)) {
                board::response("notice", ["message" => lang::get_phrase(295), "ok"=>false, "reloadCaptcha" => true]);
            }
        }


        $code = $_POST['code'];
        $data = forget::dataForgetInfo($code);
        if(!$data){
            board::notice(false, "Код не найден");
        }
        $email = $data['email'];

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
        if(auth::change_user_password($email, password_hash($password, config::algorithm_hashing_user_password()))) {
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