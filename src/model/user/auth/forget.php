<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 13.09.2022 / 0:09:15
 */

namespace Ofey\Logan22\model\user\auth;

use DateTime;
use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\mail\mail;
use Ofey\Logan22\model\db\sql;

class forget {

    static public function password() {
        $email = $_POST['email'];
        $code = mt_rand(111, 999999);
        sql::run("INSERT INTO `users_password_forget` (`code`, `email`, `ip`, `active`) VALUES (?, ?, ?, ?)", [
            $code,
            $email,
            $_SERVER['REMOTE_ADDR'],
            true,
        ]);
        $link = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/auth/forget/code/" . $code;
        $content = file_get_contents("template/cabinet/email_request/forget.html");
        if(!$content) {
            return [
                'ok'      => false,
                'message' => lang::get_phrase(145),
            ];
        }
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
        $content = file_get_contents("template/cabinet/email_request/new_password.html");
        if(!$content) {
            return [
                'ok'      => false,
                'message' => lang::get_phrase(174),
            ];
        }
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

    public static function reset_verification($code): void {
        $data = sql::run("SELECT `id`, `active`, `date` FROM `users_password_forget` WHERE code=?", [
            $code,
        ])->fetch();
        if(!$data) {
            board::notice(false, lang::get_phrase(170));
        }
        if($data['active']==0) {
            board::notice(false, lang::get_phrase(171));
        }
        $nowTime = new DateTime();
        $requestTime = new DateTime($data['date']);

        if(($requestTime->getTimestamp() - $nowTime->getTimestamp()) > 10 * 60) {
            board::notice(false, lang::get_phrase(172));
        }

        $password = generation::password();
        if(auth::change_user_password($data['email'], $password)) {
            sql::run("UPDATE `users_password_forget` SET `active` = ? WHERE `id` = ?", [
                0,
                $data['id'],
            ]);
            self::send_new_password($data['email'], $password);
        }
        board::notice(false, lang::get_phrase(173));
    }

}