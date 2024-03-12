<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 20:33:18
 */

namespace Ofey\Logan22\model\user\player;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\image\crest;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\restapi\restapi;
use Ofey\Logan22\controller\statistic\statistic;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;

class character {

    private static array $is_forbidden_array = [];
    private static array $is_not_find = [];

    public static function is_forbidden(&$charnames, $char_name_table) {
        $player = $charnames[$char_name_table];
        $row = sql::getRow("SELECT `forbidden` FROM `player_forbidden` WHERE `player` = ?", [$player]);
        $charnames['player_forbidden'] = $row['forbidden'];
    }


    //возвращает всех персонажей пользователя
    public static function get_account_players($full_info = false): ?array {
        $get_server_info = server::get_server_info();
        if (!$get_server_info) {
            return null;
        }
        $player_accounts = player_account::show_all_account_player();
        if (!$player_accounts) {
            return null;
        }
        $accounts = [];
        foreach ($player_accounts as &$account) {
            $login = $account['login'];
            $password = $account['password'];
            $players = character::all_characters($login);
            if (!$players) {
                continue;
            }
            if (sdb::is_error()){
                return null;
            }
            foreach ($players as $player) {
                if($full_info){
					$player['password'] = $password;
                    $accounts[$login][$player["player_name"]] = $player;
                }else{
                    $accounts[$login][] = $player["player_name"];
                }
            }
        }
        if (empty($accounts)) {
            return null;
        }
        return $accounts;
    }

    public static function all_characters($login, $server_id = 0) {
        if ($server_id == 0) {
            $server_id = auth::get_default_server();
        }
        $cache = cache::read(dir::characters->show_dynamic($server_id, $login), second: 60);
        if ($cache)
            return $cache;
        if (server::get_server_info($server_id)['rest_api_enable']) {
            $data = restapi::Send(
                server::get_server_info($server_id),
                "account_players",
                $login,
            );
            if ($data == "false") {
                return false;
            }
            $players = json_decode($data, true);
        } else {
            $players = player_account::extracted("account_players", server::get_server_info($server_id), [$login], false);
            if (sdb::is_error()){
                return [];
            }
            if ($players != null) {
                $players = $players->fetchAll();
            } else {
                $players = [];
            }
        }
        if ($players != null) {
            crest::conversion($players, rest_api_enable: server::get_server_info($server_id)['rest_api_enable'] ?? false);
        } else {
            $players = [];
        }
        cache::save(dir::characters->show_dynamic($server_id, $login), $players);
        return $players;
    }

    public static function get_characters($login, $server_id) {
        $info = server::get_server_info($server_id);
        if (!$info) {
            return false;
        }
        $players = player_account::extracted("account_players", $info, [$login]);
        $players = $players->fetchAll();
        crest::conversion($players, rest_api_enable: $info['rest_api_enable']);
        return $players;
    }

    public static function get_player($char_name, $server_id) {
        $server_info = server::get_server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $reQuest = server::db_info_id($server_info['db_id']);
        $my_chars = self::player($reQuest, [$char_name]);
        $user_characters = $my_chars->fetch();
        crest::conversion($user_characters, rest_api_enable: $server_info['rest_api_enable']);
        return $user_characters;
    }

    private static function player($info, $prepare) {
        return player_account::extracted("is_characters_name", $info, $prepare);
    }

    public static function get_items($login, $server_id) {
        $server_info = server::get_server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $reQuest = server::db_info_id($server_info['db_id']);
        $items = self::items($reQuest, [$login]);
        return $items->fetchAll();
    }

    private static function items($info, $prepare) {
        return player_account::extracted("all_player_items", $info, $prepare);
    }

    public static function get_subclasses($char_id, $server_id) {
        $server_info = server::get_server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $reQuest = server::db_info_id($server_info['db_id']);
        $subclasses = self::subclasses($reQuest, [$char_id]);
        return $subclasses->fetchAll();
    }

    private static function subclasses($info, $prepare) {
        return player_account::extracted("player_subclasses", $info, $prepare);
    }
}