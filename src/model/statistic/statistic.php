<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 31.08.2022 / 17:09:15
 */

namespace Ofey\Logan22\model\statistic;

use Error;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\cache\timeout;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\image\crest;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;

class statistic {


    //Добавляет массиву параметр t/f - разрешено ли просматривать профиль
    private static function charInfoPerm(&$statistic){
        if(empty($statistic)){
            return;
        }
        $playerNames = [];
        foreach ($statistic as $stat) {
            $playerNames[] = $stat["player_name"];
        }
        $playerSQLNicks = implode(", ", array_fill(0, count($playerNames), "?"));
        $playerNames[] = auth::get_default_server();
        $query = "SELECT * FROM player_forbidden WHERE player IN ($playerSQLNicks) AND server_id = ?;";
        $allForbiddenInfo = sql::getRows($query, $playerNames);
        foreach ($statistic AS &$stat){
            $stat['forbidden'] = 1;
            foreach ($allForbiddenInfo AS $forbidden){
                if($forbidden['player'] == $stat["player_name"]){
                    $stat['forbidden'] = $forbidden['forbidden'];
                }
            }
        }
    }


    /**
     * @throws \Exception
     */
    private static function get_data_statistic(dir $dir, string $collection_sql_name, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60, $playerForbidden = true): null|array|bool {
        [
            $server_info,
            $json,
        ] = server::preAcross($dir, $server_id, second: $second);
        if($server_info == null) {
            return null;
        }
        if($json)
            return $json;
        if($acrossAll) {
            $data = server::acrossAll($collection_sql_name, $server_info, $prepare);
        } else {
            $data = server::across($collection_sql_name, $server_info, $prepare);
        }
        if(isset($data['code']) AND $data['code'] != 0){
            return $data['message'];
        }
        if($playerForbidden){
            self::charInfoPerm($data);
        }
        if($data) {
            if($crest_convert) {
                crest::conversion($data, rest_api_enable: $server_info['rest_api_enable']);
            }
            cache::save($dir->show_dynamic($server_info['id']), $data);
        } else {
            return false;
        }
        return $data;
    }

    private static function get_data_statistic_clan(dir $dir, string $collection_sql_name, string $clan_name = null, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60, $playerForbidden = false): ?array {
        [
            $server_info,
            $json,
        ] = server::preAcross($dir, $server_id, $clan_name);
        if($server_info == null) {
            return null;
        }
        if($json)
            return $json;
        if($acrossAll) {
            $data = server::acrossAll($collection_sql_name, $server_info, $prepare);
        } else {
            $data = server::across($collection_sql_name, $server_info, $prepare);
        }
        if($playerForbidden){
            if($collection_sql_name == 'statistic_clan_data'){
                character::is_forbidden($data, "player_forbidden");
            }else{
                self::charInfoPerm($data);
            }
        }
        if($data) {
            if($crest_convert) {
                crest::conversion($data, rest_api_enable: $server_info['rest_api_enable']);
            }
            cache::save($dir->show_dynamic($server_info['id'], $clan_name), $data);
        } else {
            return null;
        }
        return $data;
    }

    static private function get_data_statistic_player(dir $dir, string $collection_sql_name, string $player_name = null, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60) {
        [
            $server_info,
            $json,
        ] = server::preAcross($dir, $server_id, $player_name);
        if($server_info == null) {
            return null;
        }
        if($json)
            return $json;
        if($acrossAll) {
            $data = server::acrossAll($collection_sql_name, $server_info, $prepare);
        } else {
            $data = server::across($collection_sql_name, $server_info, $prepare);
        }
        if($data === false) {
            return null;
        }
        if($data) {
            if($crest_convert) {
                crest::conversion($data, rest_api_enable: $server_info['rest_api_enable']);
            }
            cache::save($dir->show_dynamic($server_info['id'], $player_name), $data);
        }
        return $data;
    }

    private static null|array|false $pvp = null;

    public static function get_pvp($server_id = 0) {
        if(self::$pvp) {
             return self::$pvp;
        }
        try {
            return self::$pvp = self::get_data_statistic(dir::statistic_pvp, 'statistic_top_pvp', $server_id, second: timeout::statistic_pvp->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $pk = null;

    static public function get_pk($server_id = 0) {
        if(self::$pk) {
            return self::$pk;
        }
        try {
            return self::$pk = self::get_data_statistic(dir::statistic_pk, 'statistic_top_pk', $server_id, second: timeout::statistic_pk->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $players_online_time = null;

    static public function get_players_online_time($server_id = 0) {
        if(self::$players_online_time) {
            return self::$players_online_time;
        }
        try {
            return self::$players_online_time = self::get_data_statistic(dir::statistic_online, 'statistic_top_onlinetime', $server_id, second: timeout::statistic_online->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $clan = null;

    static public function get_clan($server_id = 0) {
        if(self::$clan) {
            return self::$clan;
        }
        try {
            return self::$clan = self::get_data_statistic(dir::statistic_clan, 'statistic_top_clan', $server_id, second: timeout::statistic_clan->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $heroes = null;

    public static function get_heroes($server_id = 0) {
        if(self::$heroes) {
            return self::$heroes;
        }
        try {
            return self::$heroes = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $castle = null;

    public static function get_castle($server_id = 0) {
        if(self::$castle) {
            return self::$castle;
        }
        try {
            return self::$castle = self::get_data_statistic(dir::statistic_castle, 'statistic_top_castle', $server_id, second: timeout::statistic_castle->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $players_block = null;

    public static function get_players_block($server_id = 0) {
        if(self::$players_block) {
            return self::$players_block;
        }
        try {
            return self::$players_block = self::get_data_statistic(dir::statistic_block, 'statistic_top_block', $server_id, second: timeout::statistic_block->time());
        } catch(Error $e) {
        }
    }

    static private null|array|false $players_heroes = null;

    public static function get_players_heroes($server_id = 0) {
        if(self::$players_heroes) {
            return self::$players_heroes;
        }
        try {
            return self::$players_heroes = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
        } catch(Error $e) {
        }
    }

    static private ?array $get_player_info = null;

    //Возращает всех персонажей
    public static function get_player_info($player_name, $server_id = 0) {
        if(self::$get_player_info) {
            return self::$get_player_info;
        }
        try {
            return self::$get_player_info = self::get_data_statistic_player(dir::statistic_player_info, 'statistic_player_info', player_name: $player_name, server_id: $server_id, acrossAll: false, prepare: [$player_name], second: timeout::statistic_player_info->time());
        } catch(Error $e) {
        }
    }

    //Возрат всех саб классов персонажа
    public static function get_player_info_sub_class($player_name, $char_object_id, $server_id = 0): ?array {
        return self::get_data_statistic_player(dir::statistic_player_info_sub_class, 'statistic_player_info_sub_class', player_name: $player_name, server_id: $server_id, prepare: [$char_object_id], second: timeout::statistic_player_info_sub_class->time());
    }

    public static function get_player_inventory_info($player_name, $char_object_id, $server_id = 0): ?array {
        $inventory = self::get_data_statistic_player(dir::statistic_player_inventory_info, 'statistic_player_inventory_info', player_name: $player_name, server_id: $server_id, prepare: [$char_object_id], second: timeout::statistic_player_inventory_info->time());
        if($inventory != null) {
            //Объединяем данные о скиллах клана и название, иконку клана
            $item_id_list = [];
            foreach($inventory as $item) {
                $item_id_list[] = $item['item_id'];
            }
            $list = implode(', ', $item_id_list);
            $lex = sql::getRows("SELECT * FROM items_data WHERE `item_id` IN ({$list});");

            foreach($inventory as &$item) {
                $item_id = $item['item_id'];
                foreach($lex as $row) {
                    if($item_id == $row['item_id']) {
                        $item = array_merge($item, $row);
                    }
                }
            }
        }
        return $inventory;
    }

    private static ?array $top_counter = null;

    public static function top_counter($server_id = 0) {
        if(self::$top_counter) {
            return self::$top_counter;
        }
        try {
            return self::$top_counter = self::get_data_statistic(dir::statistic_counter, 'statistic_top_counter', $server_id, false, false, second: timeout::statistic_counter->time(), playerForbidden: false);
        } catch(Error $e) {
        }
    }

    public static function timeHasPassed($seconds, $onlyHour = false): string {
        $days = floor($seconds / 86400);
        $seconds %= 86400;
        $hours = floor($seconds / 3600);
        $seconds %= 3600;
        $minutes = floor($seconds / 60);
        $seconds %= 60;

        $result = '';
        if ($days > 0) {
            $result .= $days . ' дней, ';
        }
        if ($hours > 0) {
            $result .= $hours . ' часов, ';
        }
        if ($minutes > 0) {
            $result .= $minutes . ' минут, ';
        }
        $result .= $seconds . ' секунд';

        return $result;
    }

    private static function seconds2times($seconds): array {
        $times = [];

        // считать нули в значениях
        $count_zero = false;

        // количество секунд в году не учитывает високосный год
        // поэтому функция считает что в году 365 дней
        // секунд в минуте|часе|сутках|году
        $periods = [
            60,
            3600,
            86400,
            31536000,
        ];

        for($i = 3; $i >= 0; $i--) {
            $period = floor($seconds / $periods[$i]);
            if(($period > 0) || ($period == 0 && $count_zero)) {
                $times[] = $period; // Добавляем элемент в массив
                $seconds -= $period * $periods[$i];
                $count_zero = true;
            }
        }

        $times[] = $seconds;
        return $times;
    }

    static public function get_clan_all_info($clan_name, $server_id = 0) {
        $clan_info = self::get_data_statistic_clan(dir::statistic_clan_data, 'statistic_clan_data', clan_name: $clan_name, server_id: $server_id, acrossAll: false, prepare: [$clan_name], second: timeout::statistic_clan_data->time());
        if(!$clan_info) {
            redirect::location("/statistic/clan");
        }
        $clan_players = self::get_data_statistic_clan(dir::statistic_clan_players, 'statistic_clan_players', clan_name: $clan_name, server_id: $server_id, acrossAll: true, prepare: [$clan_info["clan_id"]], second: timeout::statistic_clan_players->time(), playerForbidden: true);
        $clan_skills = self::get_data_statistic_clan(dir::statistic_clan_skills, 'statistic_clan_skills', clan_name: $clan_name, server_id: $server_id, crest_convert: false, prepare: [$clan_info["clan_id"]], second: timeout::statistic_clan_skills->time());

        if($clan_skills != null) {
            //Объединяем данные о скиллах клана и название, иконку клана
            $skill_id_list = [];
            foreach($clan_skills as $skill) {
                $skill_id_list[] = $skill['skill_id'];
            }
            $list = implode(', ', $skill_id_list);
            $lex = sql::getRows("SELECT * FROM skills_data WHERE `skill_id` IN ({$list});");

            foreach($clan_skills as &$skill) {
                $skill_id = $skill['skill_id'];
                foreach($lex as $row) {
                    if($skill_id == $row['skill_id']) {
                        $skill = array_merge($skill, $row);
                    }
                }
            }
        }
        return [
            'clan_info'    => $clan_info,
            'clan_players' => $clan_players,
            'clan_skills'  => $clan_skills,
        ];
    }

    static private ?array $class = null;

    static public function statistic_class($class_id, $prepare = [], $server_id = 0) {
        if(self::$class) {
            return self::$class;
        }
        try {
            return self::$class = self::get_data_statistic_player(dir: dir::statistic_class, collection_sql_name: 'statistic_top_class', player_name: $class_id, server_id: $server_id, acrossAll: true, crest_convert: true, prepare: $prepare, second: timeout::statistic_counter->time());
        } catch(Error $e) {
        }
    }
}