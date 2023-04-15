<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 17:13:17
 */

namespace Ofey\Logan22\model\user\player;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;

class change_password {

    static public function change($login, $password, $password_hide, $server_id) {
        player_account::valid_password($password);
        if(player_account::exist_account_inside($login, $server_id)) {
            $update = sql::run("UPDATE `player_accounts` SET `password` = ?, `password_hide` = ?, `date_update` = ? WHERE `login` = ? AND `server_id` = ?", [
                $password,
                (int)$password_hide,
                time::mysql(),
                $login,
                $server_id,
            ]);
            if($update->rowCount() == 0) {
                //Произошла ошибка запроса
                board::notice(false, lang::get_phrase(179));
            } else {
                self::change_password_server($server_id, $login, $password);
            }
        } else {
            header('Location: /main');
            die();
        }
    }

    static public function change_password_server($server_id, $login, $password) {
        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $base = base::get_sql_source($server_info['collection_sql_base_name'], "account_change_password");
        $change = player_account::extracted($base, $server_info, [
            encrypt::server_password($password, $server_info),
            $login,
        ], gameServer: false);
        if($change->rowCount() == 0) {
            //TODO: добавление в логирование ошибок
            //Возникла ошибка смены пароля
            board::notice(false, lang::get_phrase(180));
        } else {
            board::notice(true, lang::get_phrase(181));
        }
    }
}