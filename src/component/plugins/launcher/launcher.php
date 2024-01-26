<?php

namespace Ofey\Logan22\component\plugins\launcher;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class launcher {

    public function show($server_id = null) {
        if (!server::get_server_info()) {
            tpl::display("page/error.html");
        }

        $config = include __DIR__ . "/config.php";
        if($server_id==null){
            $server_id = auth::get_default_server();
            if(!isset($config['server'][$server_id])){
                error::error404("Not launcher for server");
            }
        }
        tpl::addVar('tokenApi', $config['server'][$server_id]['tokenApi']);
        $show_accounts = $config['server'][$server_id]['show_accounts'] ?? false;
        tpl::addVar('show_accounts', $show_accounts);

        $setting = include_once __DIR__ . "/settings.php";
        tpl::addVar('PLUGIN', $setting);

        if ($show_accounts) {
            $player_accounts = player_account::show_all_account_player();
            $accounts = [];

            if (!empty($player_accounts)) {
                foreach ($player_accounts as &$account) {
                    $login = $account['login'];
                    $password = $account['password'];
                    $players = character::all_characters($login);

                    if (!$players) {
                        continue;
                    }

                    if (sdb::is_error()) {
                        return null;
                    }

                    foreach ($players as $player) {
                        $accounts[$login]["players"][] = $player["player_name"];
                        $accounts[$login]['password'] = $password;
                    }
                }
            }

            tpl::addVar('accounts_list', $accounts);
        }

        tpl::addVar('userLang', lang::lang_user_default());
        tpl::addVar("code", base64_encode(json_encode($config['server'][$server_id])));

        tpl::displayPlugin("/launcher/tpl/show.html");
    }

    public function admin() {
        validation::user_protection("admin");
        tpl::addVar('userLang', lang::lang_user_default());
        $setting = include_once __DIR__ . "/settings.php";
        tpl::addVar('PLUGIN', $setting);

        tpl::displayPlugin("/launcher/tpl/patch_create.html");

    }

    public function add() {
        validation::user_protection("admin");
        $setting = include_once __DIR__ . "/settings.php";
        tpl::addVar('PLUGIN', $setting);

        tpl::displayPlugin("/launcher/tpl/add.html");
    }


}