<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 16:47:23
 */

namespace Ofey\Logan22\controller\account\password;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\player\change_password;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class change {

    static public function show($login, $server_id) {
        validation::user_protection();
        $exist_account_inside = player_account::exist_account_inside($login, $server_id);
        if(!$exist_account_inside) {
            header('Location: /main');
            die();
        }
        tpl::addVar([
            'title' => 'Смена пароля',
            'login'         => $login,
            'server_id'     => $server_id,
            'password_hide' => $exist_account_inside['password_hide'],
        ]);
        tpl::addVar('server_list', server::get_server_info());

        tpl::display("account_password_change.html");
    }

    static public function password() {
        validation::user_protection();
        $login = $_POST['login'];
        $server_id = $_POST['server_id'];
        $password = $_POST['password'];
        $password_hide = isset($_POST['password_hide']) ? 1 : 0;
        change_password::change($login, $password, $password_hide, $server_id);
    }
}