<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 02.12.2022 / 0:56:36
 */

/**
 * Проверка работоспособности ONLINE/OFFLINE сервер
 */

namespace Ofey\Logan22\model\server;

use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\cache\timeout;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\user\player\player_account;

class online {


    static private array $server_status = [];

    static public function server_online_status() {
        $actualCache = cache::read(dir::server_online_status->show(), second: timeout::server_online_status->time());
        if($actualCache)
            return $actualCache;
        $data_connect_info = \Ofey\Logan22\model\server\server::get_server_info();
        foreach($data_connect_info as $info) {
            $connect_login = false;
            $connect_game = false;
            $player_count_online = 0;

            if(@fsockopen($info['login_host'], 9014, $errno, $errstr, 1)) {
                $connect_login = true;
            }

            if(@fsockopen($info['game_host'], 7777, $errno, $errstr, 1)) {
                $connect_game = true;
                $base = base::get_sql_source($info['collection_sql_base_name'], "count_online_player");
                $player_count_online = player_account::extracted($base, $info)->fetch();
                $player_count_online = $player_count_online["count_online_player"];
            }

            self::$server_status[] = [
                'id'                  => $info['id'],
                'name'                => $info['name'],
                'rate_exp'            => $info['rate_exp'],
                'connect_login'       => $connect_login,
                'connect_game'        => $connect_game,
                'player_count_online' => $player_count_online,
            ];
        }
        cache::save(dir::server_online_status->show(), self::$server_status);
        return self::$server_status;
    }
}