<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 20:07:32
 */

namespace Ofey\Logan22\controller\account\info;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class info {

    public static function player_list($account, $server_id = null) {
        validation::user_protection();
        if($server_id == null) {
            $server_id = auth::get_default_server();
        }
        $data = sql::run("SELECT `email` FROM `player_accounts` WHERE login = ?", [$account])->fetch();
        if($data['email']!=auth::get_email()){
            redirect::location("/main");
        }
        $players = character::all_characters($account, $server_id);
        $players = player_account::get_forbidden_players($players, $server_id);
        tpl::addVar([
            'account'              => $account,
            'server_id'            => $server_id,
            'players'              => $players,
        ]);
        tpl::display("/account/players_list.html");
    }
}