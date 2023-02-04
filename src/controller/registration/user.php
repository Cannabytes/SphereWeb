<?php

namespace Ofey\Logan22\controller\registration;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;
use SimpleCaptcha\Builder;

class user {

    static public function show() {
        validation::user_protection("guest");
        tpl::display("/user/auth/new_user_registration.html");
    }


    static public function add(){
        $email = request::setting('email', new request_config(isEmail: true));
        $password = request::setting('password', new request_config(max: 32));
        $builder = new Builder;
        if (!$builder->compare(trim($_POST['captcha']) ?: "", $_SESSION['phrase'])) {
            board::alert(['ok' => false, "message" => lang::get_phrase(295), "code" => 1]);
        }
        if(auth::is_user($email)) {
            board::notice(false, lang::get_phrase(201, $email));
        }
        registration::add($email, $password, false);
    }

}