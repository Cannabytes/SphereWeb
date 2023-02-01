<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 31.08.2022 / 17:09:15
 */

namespace Ofey\Logan22\model\statistic;

use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\cache\timeout;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\image\crest;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;

class statistic {

    /**
     * @throws \Exception
     */
    static private function get_data_statistic(dir $dir, string $collection_sql_name, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60): ?array {
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
        if($data) {
            if($crest_convert) {
                crest::conversion($data);
            }
            cache::save($dir->show_dynamic($server_info['id']), $data);
        }else{
            return null;
        }
        return $data;
    }

    static private function get_data_statistic_clan(dir $dir, string $collection_sql_name, string $clan_name = null, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = [], $second = 60): ?array {
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
        if($data) {
            if($crest_convert) {
                crest::conversion($data);
            }
            cache::save($dir->show_dynamic($server_info['id'], $clan_name), $data);
        }else{
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
        if($data===false){
            return null;
        }
        if($data) {
            if($crest_convert) {
                crest::conversion($data);
            }
            cache::save($dir->show_dynamic($server_info['id'], $player_name), $data);
        }
        return $data;
    }

    static private ?array $pvp = null;

    static public function get_pvp($server_id = 0) {
        if(self::$pvp) {
            return self::$pvp;
        }
        return self::$pvp = self::get_data_statistic(dir::statistic_pvp, 'statistic_top_pvp', $server_id, second: timeout::statistic_pvp->time());
    }

    static private ?array $pk = null;

    static public function get_pk($server_id = 0) {
        if(self::$pk) {
            return self::$pk;
        }
        return self::$pk = self::get_data_statistic(dir::statistic_pk, 'statistic_top_pk', $server_id, second: timeout::statistic_pk->time());
    }

    static private ?array $players_online_time = null;

    static public function get_players_online_time($server_id = 0) {
        if(self::$players_online_time) {
            return self::$players_online_time;
        }
        return self::$players_online_time = self::get_data_statistic(dir::statistic_online, 'statistic_top_onlinetime', $server_id, second: timeout::statistic_online->time());
    }

    static private ?array $clan = null;

    static public function get_clan($server_id = 0) {
        if(self::$clan) {
            return self::$clan;
        }
        return self::$clan = self::get_data_statistic(dir::statistic_clan, 'statistic_top_clan', $server_id, second: timeout::statistic_clan->time());
    }

    static private ?array $heroes = null;

    public static function get_heroes($server_id = 0) {
        if(self::$heroes) {
            return self::$heroes;
        }
        return self::$heroes = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
    }

    static private ?array $castle = null;

    public static function get_castle($server_id = 0) {
        if(self::$castle) {
            return self::$castle;
        }
        return self::$castle = self::get_data_statistic(dir::statistic_castle, 'statistic_top_castle', $server_id, second: timeout::statistic_castle->time());
    }

    static private ?array $players_block = null;

    public static function get_players_block($server_id = 0) {
        if(self::$players_block) {
            return self::$players_block;
        }
        return self::$players_block = self::get_data_statistic(dir::statistic_block, 'statistic_top_block', $server_id, second: timeout::statistic_block->time());
    }

    static private ?array $players_heroes = null;

    public static function get_players_heroes($server_id = 0) {
        if(self::$players_heroes) {
            return self::$players_heroes;
        }
        return self::$players_heroes = self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes', $server_id, second: timeout::statistic_heroes->time());
    }

    static private ?array $get_player_info = null;

    //Возращает всех персонажей
    public static function get_player_info($player_name, $server_id = 0) {
        if(self::$get_player_info) {
            return self::$get_player_info;
        }
        return self::$get_player_info = self::get_data_statistic_player(dir::statistic_player_info, 'statistic_player_info', player_name: $player_name, server_id: $server_id, acrossAll: false, prepare: [$player_name], second: timeout::statistic_player_info->time());
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

    static private ?array $top_counter = null;

    public static function top_counter($server_id = 0) {
        if(self::$top_counter) {
            return self::$top_counter;
        }
        return self::$top_counter = self::get_data_statistic(dir::statistic_counter, 'statistic_top_counter', $server_id, false, false, second: timeout::statistic_counter->time());
    }

    public static function timeHasPassed($second): string {
        if(lang::lang_user_default() == "ru") {
            $times_values = [
                'сек.',
                'мин.',
                'час.',
                'д.',
                'лет',
            ];
        } else {
            $times_values = [
                'sec.',
                'min.',
                'h.',
                'd.',
                'y.',
            ];
        }

        $times = self::seconds2times($second);
        $line = '';
        for($i = count($times) - 1; $i >= 0; $i--) {
            $line .= $times[$i] . ' ' . $times_values[$i] . ' ';
        }
        return $line;
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
                $times[$i + 1] = $period;
                $seconds -= $period * $periods[$i];

                $count_zero = true;
            }
        }

        $times[0] = $seconds;
        return $times;
    }

    static public function get_clan_all_info($clan_name, $server_id = 0) {
        $clan_info = self::get_data_statistic_clan(dir::statistic_clan_data, 'statistic_clan_data', clan_name: $clan_name, server_id: $server_id, acrossAll: false, prepare: [$clan_name], second: timeout::statistic_clan_data->time());
        if(!$clan_info){
            redirect::location("/statistic/clan");
        }
        $clan_players = self::get_data_statistic_clan(dir::statistic_clan_players, 'statistic_clan_players', clan_name: $clan_name, server_id: $server_id, acrossAll: true, prepare: [$clan_info["clan_id"]], second: timeout::statistic_clan_players->time());
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
        return self::$class = self::get_data_statistic_player(dir: dir::statistic_class, collection_sql_name: 'statistic_top_class', player_name: $class_id, server_id: $server_id, acrossAll: true, crest_convert: true, prepare: $prepare, second: timeout::statistic_counter->time());
    }
}