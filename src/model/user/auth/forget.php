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
use Ofey\Logan22\component\mail\mail;
use Ofey\Logan22\model\db\sql;
use PHPMailer\PHPMailer\PHPMailer;

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
        if($content == false) {
            return [
                'ok'      => false,
                'message' => 'Ошибка',
            ];
        }
        $content = str_replace([
            '%code%',
            '%link%',
        ], [
            $code,
            $link,
        ], $content);
        $isMail = mail::send($email, $content, 'Запрос на сброс пароля');
        if($isMail['ok']){
            board::notice(true, 'Сообщение отправлено на почту');
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
        if($ok == false) {
            board::notice(false, 'Код активации к почте не подошел');
        }
        if($ok['active'] == false) {
            board::notice(false, 'Код ранее был активирован');
        }
        if(date_diff(new DateTime(), new DateTime($ok['date']))->i > 10) {
            board::notice(false, 'Прошло 10 минут, код не актуален.<br>Вам необходимо снова отправить запрос на сброс пароля.');
        }

        $password = generation::password();
        if(auth::change_user_password($email, $password)) {
            sql::run("UPDATE `users_password_forget` SET `active` = ? WHERE `id` = ?", [
                (int)false,
                $ok['id'],
            ]);
            self::send_new_password($email, $password);
        }
        board::notice(false, 'Пароль не был сброшен');
    }

    public static function send_new_password($email, $password) {
        $link = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/auth";
        $content = file_get_contents("template/cabinet/email_request/new_password.html");
        if($content == false) {
            return [
                'ok'      => false,
                'message' => 'Ошибка',
            ];
        }
        $content = str_replace([
            '%password%',
            '%link%',
        ], [
            $password,
            $link,
        ], $content);

        $isMail = mail::send($email, $content, 'Ваш новый пароль');
        if($isMail['ok']){
            board::notice(true, 'Новый пароль отправлен на почту');
        }
        board::notice(false, $isMail['message']);
    }
}