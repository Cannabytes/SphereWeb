<?php

namespace Ofey\Logan22\controller\registration;

use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class account {

    public static function newAccount($server_id = null) {
        if(!server::get_server_info()){
            tpl::addVar("title", lang::get_phrase(131));
            tpl::display("error/not_server.html");
        }
        tpl::addVar([
            'server_id'          => $server_id,
        ]);
        tpl::display("/user/auth/new_account_registration.html");
    }

    public static function requestNewAccount() {
        $server_id = request::setting('server', new request_config(isNumber: true));
        $login = request::setting('login', new request_config(min: 4, max: 16, rules: "/^[a-zA-Z0-9]+$/"));
        $password = request::setting('password', new request_config(min: 4, max: 60));
        $password_hide = request::checkbox('password_hide');
        if(auth::get_is_auth()) {
            player_account::add($server_id, $login, $password, $password_hide);
        } else {
            $email = request::setting("email", new request_config(isEmail: true));
            player_account::add_account_not_user($server_id, $login, $password, $password_hide, $email);
        }
    }
}