<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 31.08.2022 / 17:09:15
 */

namespace Ofey\Logan22\model\statistic;

use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\image\crest;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;

class statistic {

    static private function get_data_statistic(dir $dir, string $collection_sql_name, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = []): ?array {
        [
            $server_info,
            $json,
        ] = server::preAcross($dir, $server_id);
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
        }
        return $data;
    }

    static private function get_data_statistic_clan(dir $dir, string $collection_sql_name, string $clan_name = null, int $server_id = 0, bool $acrossAll = true, bool $crest_convert = true, $prepare = []): ?array {
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
        }
        //Если проблема с загрузкой, нет данных, перенаправляем на главную
        //        if(!$data){
        //            redirect::location("/statistic");
        //        }
        return $data;
    }

    static public function get_pvp($server_id = 0) {
        return self::get_data_statistic(dir::statistic_pvp, 'statistic_top_pvp_TRANC', $server_id,);
    }

    static public function get_pk($server_id = 0) {
        return self::get_data_statistic(dir::statistic_pk, 'statistic_top_pk_TRANC', $server_id,);
    }

    static public function get_players_online_time($server_id = 0) {
        return self::get_data_statistic(dir::statistic_online, 'statistic_top_onlinetime_TRANC', $server_id);
    }

    static public function get_clan($server_id = 0) {
        return self::get_data_statistic(dir::statistic_clan, 'statistic_top_clan_TRANC', $server_id);
    }

    public static function get_heroes($server_id = 0) {
        return self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes_TRANC', $server_id);
    }

    public static function get_castle($server_id = 0) {
        return self::get_data_statistic(dir::statistic_castle, 'statistic_top_castle_TRANC', $server_id);
    }

    public static function get_players_block($server_id = 0) {
        return self::get_data_statistic(dir::statistic_block, 'statistic_top_block_TRANC', $server_id);
    }

    public static function get_players_heroes($server_id = 0) {
        return self::get_data_statistic(dir::statistic_heroes, 'statistic_top_heroes_TRANC', $server_id);
    }

    public static function top_counter($server_id = 0) {
        return self::get_data_statistic(dir::statistic_counter, 'statistic_top_counter_TRANC', $server_id, false, false);
    }

    public static function timeHasPassed($second): string {
        $times_values = [
            'сек.',
            'мин.',
            'час.',
            'д.',
            'лет',
        ];

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
        $clan_info = self::get_data_statistic_clan(dir::statistic_clan_data, 'statistic_clan_data', clan_name: $clan_name, server_id: $server_id, acrossAll: false, prepare: [$clan_name]);
        $clan_players = self::get_data_statistic_clan(dir::statistic_clan_players, 'statistic_clan_players', clan_name: $clan_name, server_id: $server_id, acrossAll: true, prepare: [$clan_info["clan_id"]]);
        $clan_skills = self::get_data_statistic_clan(dir::statistic_clan_skills, 'statistic_clan_skills', clan_name: $clan_name, server_id: $server_id, crest_convert: false, prepare: [$clan_info["clan_id"]]);

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
}