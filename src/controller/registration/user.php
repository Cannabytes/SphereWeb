<?php

namespace Ofey\Logan22\controller\registration;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class user {

    static public function show() {
        validation::user_protection("guest");
        tpl::addVar("title", lang::get_phrase(200));
        tpl::addVar('server_list',  server::get_server_info());
        tpl::display("/user/auth/new_user_registration.html");
    }

    static public function add(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(auth::exist_user($email, false)) {
            board::notice(false, lang::get_phrase(201, $email));
        }
        player_account::valid_password($password);
        registration::add($email, $password, false);
    }


}