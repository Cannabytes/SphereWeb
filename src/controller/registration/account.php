<?php

namespace Ofey\Logan22\controller\registration;

use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class account {

    public static function newAccount($server_id = null) {
        if(!server::get_server_info())
            tpl::display("error/not_server.html");

        tpl::addVar([
            'title'              => 'Регистрация пользователя',
            'server_list'        => server::get_server_info(),
            'server_id'          => $server_id,
            'generation_account' => generation::word(),
        ]);
        tpl::display("/user/auth/new_account_registration.html");
    }

    public static function requestNewAccount() {
        $server_id = $_POST['server']; // сервер с ID 0 означает что нужно произвести регистрацию на всех серверах
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password_hide = isset($_POST['password_hide']);
        if(auth::get_is_auth()) {
            player_account::add($server_id, $login, $password, $password_hide);
        } else {
            $email = $_POST['email'];
            player_account::add_account_not_user($server_id, $login, $password, $password_hide, $email);
        }
    }
}