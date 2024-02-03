<?php

namespace Ofey\Logan22\component\plugins\launcher;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
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

        if ($server_id == null) {
            $server_id = auth::get_default_server();
        }

        if (file_exists(__DIR__ . "/config_launcher_{$server_id}.php")) {
            $config = include __DIR__ . "/config_launcher_{$server_id}.php";
        }

        if (!isset($config)) {
            error::error404("Not launcher for server");
        }

        tpl::addVar('tokenApi', $config['tokenApi']);
        $show_accounts = $config['show_accounts'] ?? false;
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
        tpl::addVar("code", base64_encode(json_encode($config)));

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

    public function saveConfig() {
        validation::user_protection("admin");
        $server_id = $_POST['server'] ?? board::error("Не выбран сервер");
        if (isset($_POST['autoload'])) {
            if($_POST['autoload']=='on'){
                $autoload = 'true';
            }else{
                $autoload = 'false';
            }
        } else {
            $autoload = 'false';
        };
        $tokenApi = $_POST['tokenApi'] ?? "";

        $l2exe_1 = $_POST['l2exe_1'] ?? "/system/l2.exe";
        $arg_1 = $_POST['arg_1'] ?? "";
        $background_1 = $_POST['background_1'] ?? "src/component/plugins/launcher/tpl/img/l2_button.jpg";
        $button_start_ru_1 = $_POST['button_start_ru_1'] ?? "Запустить игру";
        $button_start_en_1 = $_POST['button_start_en_1'] ?? "Start Play";

        $l2exe_2 = $_POST['l2exe_2'] ?? false;
        $arg_2 = $_POST['arg_2'] ?? "";
        $background_2 = $_POST['background_2'] ?? "src/component/plugins/launcher/tpl/img/l2_button.jpg";
        $button_start_ru_2 = $_POST['button_start_ru_2'] ?? "Запустить игру";
        $button_start_en_2 = $_POST['button_start_en_2'] ?? "Start Play";

        if ($server = server::get_server_info($server_id)) {
            $chronicle = $server['chronicle'];
        }

        $application = "[
        'l2exe' => '{$l2exe_1}',
        'args' => '{$arg_1}',
        'background' => '{$background_1}',
        'name' => [
            'ru' => '{$button_start_ru_1}',
            'en' => '{$button_start_en_1}',
        ],
],";
        if ($l2exe_2) {
            $application .= "[
        'l2exe' => '{$l2exe_2}',
        'args' => '{$arg_2}',
        'background' => '{$background_2}',
        'name' => [
            'ru' => '{$button_start_ru_2}',
            'en' => '{$button_start_en_2}',
        ],
],";
        }

        $txt = "<?php return [
    'chronicle' => '{$chronicle}',
    'application' => [
        {$application}
    ],
    'show_accounts' => {$autoload},
    'tokenApi' => '{$tokenApi}'
];";

        file_put_contents(__DIR__ . "/config_launcher_{$server_id}.php", $txt);
    }


}