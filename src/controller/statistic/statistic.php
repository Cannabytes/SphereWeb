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

    static public function block(): void {
        other::current_server();
        tpl::addVar("blocks", statistic_model::get_players_block());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Заблокированные");
        tpl::display("statistic/block.html");
    }

    static public function heroes(): void {
        other::current_server();
        tpl::addVar("heroes", statistic_model::get_players_heroes());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Герои");
        tpl::display("statistic/heroes.html");
    }

    static public function pvp(): void {
        other::current_server();
        tpl::addVar("pvp", statistic_model::get_pvp());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика PvP");
        tpl::display("statistic/pvp.html");
    }

    static public function pk(): void {
        other::current_server();
        tpl::addVar("pk", statistic_model::get_pk());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика PK");
        tpl::display("statistic/pk.html");
    }

    static public function online_time(): void {
        other::current_server();
        tpl::addVar("online_times", statistic_model::get_players_online_time());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика времени игры");
        tpl::display("statistic/online_time.html");
    }

    static public function clan(): void {
        other::current_server();
        tpl::addVar("clans", statistic_model::get_clan());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика кланов");
        tpl::display("statistic/clan.html");
    }

    static public function clan_info($clan_name): void {
        other::current_server();
        $clan = statistic_model::get_clan_all_info($clan_name);
        tpl::addVar("title", "Информация о клане {$clan['clan_info']['clan_name']}");
        tpl::addVar("clan_info", $clan['clan_info']);
        tpl::addVar("clan_players", $clan['clan_players']);
        tpl::addVar("clan_skills", $clan['clan_skills']);
        tpl::display("/statistic/clan_data.html");
    }

    static public function castle(): void {
        other::current_server();
        tpl::addVar("castles", statistic_model::get_castle());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика замков");
        tpl::display("statistic/castle.html");
    }

    static public function char_info($char_name = null): void {
        $get_player_info = statistic_model::get_player_info($char_name);
        $inventory = statistic_model::get_player_inventory_info($char_name, $get_player_info['player_id']);
        $sub_class = statistic_model::get_player_info_sub_class($char_name, $get_player_info['player_id']);
        tpl::addVar("title", "Информация о персонаже {$char_name}");
        tpl::addVar("player", $get_player_info);
        tpl::addVar("inventory", $inventory);
        tpl::addVar("sub_class", $sub_class);
        tpl::display("statistic/char.html");
    }
}