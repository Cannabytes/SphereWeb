<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 17:13:17
 */

namespace Ofey\Logan22\model\user\player;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;
use Ofey\Logan22\model\server\server;

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
            userlog::add("game_account_change_password", 534, [$login]);
            board::response("notice", ["message"=>lang::get_phrase(181), "redirect"=>"/accounts"]);
        }
    }

    static public function change_password_server($server_id, $login, $password): void {
        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $password = $server_info['rest_api_enable'] ? $password : encrypt::server_password($password, $server_info);

        $change = player_account::extracted("account_change_password", $server_info, [$password, $login]);

        if($server_info['rest_api_enable']){
            board::notice($change['ok'], lang::get_phrase($change['ok'] ? 181 : 180));
        } else {
            if($change->rowCount() == 0) {
                //TODO: добавление в логирование ошибок
                board::notice(false, lang::get_phrase(180));
            } else {
                userlog::add("game_account_change_password", 534, [$login]);
                board::response("notice", ["message"=>lang::get_phrase(181), "redirect"=>"/accounts"]);
            }
        }
    }

}