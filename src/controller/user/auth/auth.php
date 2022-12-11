<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 14.08.2022 / 23:10:17
 */

namespace Ofey\Logan22\controller\user\auth;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\forget;
use Ofey\Logan22\template\tpl;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class auth {

    public static function index() {
        validation::user_protection("guest");
        tpl::display("user/auth/auth.html");
    }

    public static function auth_request() {
        validation::user_protection("guest");
        \Ofey\Logan22\model\user\auth\auth::user_enter();
    }

    public static function logout() {
        if(\Ofey\Logan22\model\user\auth\auth::get_is_auth()) {
            \Ofey\Logan22\model\user\auth\auth::logout();
            header("Refresh: 0;");
            die();
        }
        header('Location: /main');
        die();
    }

    /**
     * Восстановление пароля
     */
    public static function forget() {
        validation::user_protection("guest");
        tpl::display("user/auth/forget.html");
    }

    public static function send_email_forget() {
        validation::user_protection("guest");
        forget::password();
    }

    public static function send_email_verification_forget() {
        validation::user_protection("guest");
        forget::verification();
    }
}