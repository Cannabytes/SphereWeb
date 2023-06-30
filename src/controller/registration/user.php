<?php

namespace Ofey\Logan22\controller\registration;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\captcha\google;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;
use Ofey\Logan22\template\tpl;
use SimpleCaptcha\Builder;

class user {

    public static function show($ref_name = null): void {
        validation::user_protection("guest");
        tpl::addVar([
            'referral_name' => $ref_name,
        ]);
        tpl::display("/user/auth/new_user_registration.html");
    }


    public static function add(): void {
        $email = request::setting('email', new request_config(isEmail: true));
        $password = request::setting('password', new request_config(max: 32));

        if (config::get_captcha_version("google")) {
            $g_captcha = google::check($_POST['captcha']??null);
            if (isset($g_captcha['success'])){
                if(!$g_captcha['success']) {
                    board::notice(false, $g_captcha['error-codes'][0]);
                }
            }else{
                board::notice(false, "Google recaptcha не вернула ответ");
            }
        } elseif (config::get_captcha_version("default")) {
            $builder = new Builder();
            $captcha = $_POST['captcha'] ?? false;
            if (!$builder->compare(trim($captcha), $_SESSION['captcha'])) {
                board::alert(['ok' => false, "message" => lang::get_phrase(295), "code" => 1]);
            }
        }

        if (auth::is_user($email)) {
            board::notice(false, lang::get_phrase(201, $email));
        }
        registration::add($email, $password, false);
    }

}