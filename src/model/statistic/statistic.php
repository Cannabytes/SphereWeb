<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 31.08.2022 / 17:09:15
 */

namespace Ofey\Logan22\model\statistic;

use Error;
use Exception;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\cache\timeout;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\image\client_icon;
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
     * @throws Exception
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

    private static function get_data_statistic_player(dir $dir, string $collection_sql_name, string $player_name = null, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60) {
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
        if (isset(self::$pvp[$server_id]) && self::$pvp[$server_id]) {
            return self::$pvp[$server_id];
        }
        try {
            return self::$pvp[$server_id] = self::get_data_statistic(dir::statistic_pvp, 'statistic_top_pvp', $server_id, second: timeout::statistic_pvp->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $pk = null;

    public static function get_pk($server_id = 0) {
        if (isset(self::$pk[$server_id]) && self::$pk[$server_id]) {
            return self::$pk[$server_id];
        }
        try {
            return self::$pk[$server_id] = self::get_data_statistic(dir::statistic_pk, 'statistic_top_pk', $server_id, second: timeout::statistic_pk->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $players_online_time = null;

    public static function get_players_online_time($server_id = 0) {
        if (isset(self::$players_online_time[$server_id]) && self::$players_online_time[$server_id]) {
            return self::$players_online_time[$server_id];
        }
        try {
            return self::$players_online_time[$server_id] = self::get_data_statistic(dir::statistic_online, 'statistic_top_onlinetime', $server_id, second: timeout::statistic_online->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $clan = null;

    public static function get_clan($server_id = 0) {
        if (isset(self::$clan[$server_id]) && self::$clan[$server_id]) {
            return self::$clan[$server_id];
        }
        try {
            return self::$clan[$server_id] = self::get_data_statistic(dir::statistic_clan, 'statistic_top_clan', $server_id, second: timeout::statistic_clan->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $heroes = null;

    public static function get_heroes($server_id = 0) {
        if (isset(self::$heroes[$server_id]) && self::$heroes[$server_id]) {
            return self::$heroes[$server_id];
        }
        try {
            return self::$heroes[$server_id] = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $castle = null;

    public static function get_castle($server_id = 0) {
        if (isset(self::$castle[$server_id]) && self::$castle[$server_id]) {
            return self::$castle[$server_id];
        }
        try {
            return self::$castle[$server_id] = self::get_data_statistic(dir::statistic_castle, 'statistic_top_castle', $server_id, second: timeout::statistic_castle->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $players_block = null;

    public static function get_players_block($server_id = 0) {
        if (isset(self::$players_block[$server_id]) && self::$players_block[$server_id]) {
            return self::$players_block[$server_id];
        }
        try {
            return self::$players_block[$server_id] = self::get_data_statistic(dir::statistic_block, 'statistic_top_block', $server_id, second: timeout::statistic_block->time());
        } catch (Error $e) {
        }
    }


    private static null|array|false $players_heroes = null;

    public static function get_players_heroes($server_id = 0) {
        if (isset(self::$players_heroes[$server_id]) && self::$players_heroes[$server_id]) {
            return self::$players_heroes[$server_id];
        }
        try {
            return self::$players_heroes[$server_id] = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
        } catch (Error $e) {
        }
    }

    private static ?array $get_player_info = null;

    //Возращает всех персонажей
    public static function get_player_info($player_name, $server_id = 0) {
        if (isset(self::$get_player_info[$server_id]) && self::$get_player_info[$server_id]) {
            return self::$get_player_info[$server_id];
        }
        try {
            return self::$get_player_info[$server_id] = self::get_data_statistic_player(dir::statistic_player_info, 'statistic_player_info', player_name: $player_name, server_id: $server_id, acrossAll: false, prepare: [$player_name], second: timeout::statistic_player_info->time());
        } catch (Error $e) {
        }
    }


    //Возрат всех саб классов персонажа
    public static function get_player_info_sub_class($player_name, $char_object_id, $server_id = 0): ?array {
        return self::get_data_statistic_player(dir::statistic_player_info_sub_class, 'statistic_player_info_sub_class', player_name: $player_name, server_id: $server_id, prepare: [$char_object_id], second: timeout::statistic_player_info_sub_class->time());
    }

    public static function get_player_inventory_info($player_name, $char_object_id, $server_id = 0): ?array {
        $inventory = self::get_data_statistic_player(dir::statistic_player_inventory_info, 'statistic_player_inventory_info', player_name: $player_name, server_id: $server_id, prepare: [$char_object_id], second: timeout::statistic_player_inventory_info->time());
        if($inventory != null) {
            $lex = [];
            foreach($inventory as $item) {
                $itemInfo = client_icon::get_item_info($item['item_id'], false, false);
                if(!$itemInfo){
                    $itemInfo = [
                        "item_id" => $item['item_id'],
                        "name" => "The item does not exist!",
                        "icon" => fileSys::localdir("/uploads/images/icon/NOIMAGE.webp"),
                    ];
                }else{
                    $itemInfo['item_id'] = $item['item_id'];
                }
                $lex[] = $itemInfo;
            }
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
        if (isset(self::$top_counter[$server_id]) && self::$top_counter[$server_id]) {
            return self::$top_counter[$server_id];
        }
        try {
            return self::$top_counter[$server_id] = self::get_data_statistic(dir::statistic_counter, 'statistic_top_counter', $server_id, false, false, second: timeout::statistic_counter->time(), playerForbidden: false);
        } catch (Error $e) {
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

    //Статистика онлайна с указанными датами
    public static function get_online_date(int $server_id = 0, string $start_date, string $end_date): array {
        if($server_id==0){
            $server_id = auth::get_default_server();
        }
        $query = 'SELECT 
                DATE(time) AS `date`,
                ROUND(AVG(count_online_player), 0) AS `online`
              FROM statistic_online 
              WHERE server_id = ? AND DATE(time) BETWEEN ? AND ?
              GROUP BY DATE(time)
              ORDER BY `date`;';
        return sql::getRows($query, [$server_id, $start_date, $end_date]);
    }

    //Статистика за последнюю неделю
    public static function get_online_last_week(int $server_id = 0): array {
        if($server_id==0){
            $server_id = auth::get_default_server();
        }
        $query = 'SELECT 
            DATE(time) AS `date`,
            ROUND(AVG(count_online_player) * ?, 0) AS `online`
        FROM statistic_online 
        WHERE server_id = ? AND time >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        GROUP BY DATE(time)
        ORDER BY date;';
        return sql::getRows($query, [ONLINE_MUL, $server_id]);
    }

    //Статистика онлайна за последний месяц
    public static function get_statistic_online_month(int $server_id = 0): array {
        if($server_id==0){
            $server_id = auth::get_default_server();
        }
        $query = 'SELECT DATE(time) AS `date`, ROUND(AVG(count_online_player) * ?, 0) AS `online`
        FROM statistic_online 
        WHERE server_id = ? AND time >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
        GROUP BY DATE(time) ORDER BY date;';
        return sql::getRows($query, [ONLINE_MUL, $server_id]);
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

    public static function get_clan_all_info($clan_name, $server_id = 0) {
        $clan_info = self::get_data_statistic_clan(dir::statistic_clan_data, 'statistic_clan_data', clan_name: $clan_name, server_id: $server_id, acrossAll: false, prepare: [$clan_name], second: timeout::statistic_clan_data->time());
        if(!$clan_info) {
            redirect::location("/statistic/clan");
        }
        $clan_players = self::get_data_statistic_clan(dir::statistic_clan_players, 'statistic_clan_players', clan_name: $clan_name, server_id: $server_id, acrossAll: true, prepare: [$clan_info["clan_id"]], second: timeout::statistic_clan_players->time(), playerForbidden: true);
        $clan_skills = self::get_data_statistic_clan(dir::statistic_clan_skills, 'statistic_clan_skills', clan_name: $clan_name, server_id: $server_id, crest_convert: false, prepare: [$clan_info["clan_id"]], second: timeout::statistic_clan_skills->time());

        if($clan_skills != null) {
            foreach($clan_skills as &$skill) {
                $skill_level = $skill['skill_level'];
                $skill = client_icon::get_skill_info($skill['skill_id']);
                $skill['skill_level'] = $skill_level;
            }
        }
        return [
            'clan_info'    => $clan_info,
            'clan_players' => $clan_players,
            'clan_skills'  => $clan_skills,
        ];
    }

    private static ?array $class = null;

    public static function statistic_class($class_id, $prepare = [], $server_id = 0) {
        if (isset(self::$class[$server_id]) && self::$class[$server_id]) {
            return self::$class[$server_id];
        }
        try {
            return self::$class[$server_id] = self::get_data_statistic_player(dir: dir::statistic_class, collection_sql_name: 'statistic_top_class', player_name: $class_id, server_id: $server_id, acrossAll: true, crest_convert: true, prepare: $prepare, second: timeout::statistic_counter->time());
        } catch (Error $e) {
        }
    }

}