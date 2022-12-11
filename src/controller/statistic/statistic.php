<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 31.08.2022 / 16:56:36
 */

namespace Ofey\Logan22\controller\statistic;

use Ofey\Logan22\model\statistic\statistic as statistic_model;
use Ofey\Logan22\model\user\profile\other;
use Ofey\Logan22\template\tpl;

class statistic {

    static public function pvp_ajax() {
        echo json_encode(statistic_model::get_pvp());
    }

    static public function pk_ajax() {
        echo json_encode(statistic_model::get_pk());
    }

    static public function other_ajax() {
        echo json_encode(statistic_model::top_counter());
    }

    static public function clan_ajax() {
        echo json_encode(statistic_model::get_clan());
    }

    static public function player_ajax() {
        echo json_encode(statistic_model::get_players_online_time());
    }

    static public function block_ajax() {
        echo json_encode(statistic_model::get_players_block());
    }

    static public function heroes_ajax() {
        echo json_encode(statistic_model::get_heroes());
    }

    static public function castle_ajax() {
        echo json_encode(statistic_model::get_castle());
    }

    static public function block() {
        other::current_server();
        tpl::addVar("blocks", statistic_model::get_players_block());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Заблокированные");
        tpl::display("statistic/block.html");
    }

    static public function heroes() {
        other::current_server();
        tpl::addVar("heroes", statistic_model::get_players_heroes());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Герои");
        tpl::display("statistic/heroes.html");
    }

    static public function pvp() {
        other::current_server();
        tpl::addVar("pvp", statistic_model::get_pvp());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика PvP");
        tpl::display("statistic/pvp.html");
    }

    static public function pk() {
        other::current_server();
        tpl::addVar("pk", statistic_model::get_pk());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика PK");
        tpl::display("statistic/pk.html");
    }

    static public function online_time() {
        other::current_server();
        tpl::addVar("online_times", statistic_model::get_players_online_time());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика времени игры");
        tpl::display("statistic/online_time.html");
    }

    static public function clan() {
        other::current_server();
        tpl::addVar("clans", statistic_model::get_clan());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика кланов");
        tpl::display("statistic/clan.html");
    }

    static public function clan_info($clan_name) {
        other::current_server();
        $clan = statistic_model::get_clan_all_info($clan_name);
        tpl::addVar("clan_info", $clan['clan_info']);
        tpl::addVar("clan_players", $clan['clan_players']);
        tpl::addVar("clan_skills", $clan['clan_skills']);
        tpl::display("/statistic/clan_data.html");
    }

    static public function castle() {
        other::current_server();
        tpl::addVar("castles", statistic_model::get_castle());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика замков");
        tpl::display("statistic/castle.html");
    }
}