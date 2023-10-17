<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 16:47:23
 */

namespace Ofey\Logan22\controller\account\password;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\redirect;
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
            redirect::location("/main");
            die();
        }
        tpl::addVar([
            'login'         => $login,
            'server_id'     => $server_id,
            'password_hide' => $exist_account_inside['password_hide'],
        ]);
        tpl::display("account/change_password.html");
    }

    public static function password(): void {
        validation::user_protection();
        $login = $_POST['login'] ?? board::notice(false, "Не получен login");
        $server_id = $_POST['server_id'];
        $password = $_POST['password'];
        $password_hide = isset($_POST['password_hide']) ? 1 : 0;
        change_password::change($login, $password, $password_hide, $server_id);
    }
}