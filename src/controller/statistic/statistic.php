<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 31.08.2022 / 16:56:36
 */

namespace Ofey\Logan22\controller\statistic;

use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
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
        tpl::addVar("title", lang::get_phrase(245));
        tpl::display("statistic/block.html");
    }

    static public function heroes(): void {
        other::current_server();
        tpl::addVar("heroes", statistic_model::get_players_heroes());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(246));
        tpl::display("statistic/heroes.html");
    }

    static public function pvp(): void {
        other::current_server();
        tpl::addVar("pvp", statistic_model::get_pvp());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(247));
        tpl::display("statistic/pvp.html");
    }

    static public function pk(): void {
        other::current_server();
        tpl::addVar("pk", statistic_model::get_pk());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(248));
        tpl::display("statistic/pk.html");
    }

    static public function online_time(): void {
        other::current_server();
        tpl::addVar("online_times", statistic_model::get_players_online_time());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(249));
        tpl::display("statistic/online_time.html");
    }

    static public function clan(): void {
        other::current_server();
        tpl::addVar("clans", statistic_model::get_clan());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(250));
        tpl::display("statistic/clan.html");
    }

    static public function clan_info($clan_name): void {
        other::current_server();
        $clan = statistic_model::get_clan_all_info($clan_name);
        tpl::addVar("title", lang::get_phrase(252, $clan['clan_info']['clan_name']));
        tpl::addVar("clan_info", $clan['clan_info']);
        tpl::addVar("clan_players", $clan['clan_players']);
        tpl::addVar("clan_skills", $clan['clan_skills']);
        tpl::display("/statistic/clan_data.html");
    }

    static public function castle(): void {
        other::current_server();
        tpl::addVar("castles", statistic_model::get_castle());
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", lang::get_phrase(251));
        tpl::display("statistic/castle.html");
    }

    static public function char_info($char_name = null): void {
        other::current_server();
        $get_player_info = statistic_model::get_player_info($char_name);
        $inventory = statistic_model::get_player_inventory_info($char_name, $get_player_info['player_id']);
        $sub_class = statistic_model::get_player_info_sub_class($char_name, $get_player_info['player_id']);
        tpl::addVar("title", lang::get_phrase(205, $char_name));
        tpl::addVar("player", $get_player_info);
        tpl::addVar("inventory", $inventory);
        tpl::addVar("sub_class", $sub_class);
        tpl::display("statistic/char.html");
    }

    /**
     * TODO: Необходимо добавить проверку класса по хроникам.
     * В данный момент можно прописать класс из "выше хроник" и поиск пройдет.
     */
    static public function class($class_name): void {
        $class_id = race_class::get_id_class($class_name);
        if($class_id==null) error::error404("Игровой класс не найден");
        $class_name = race_class::get_class($class_id);
        other::current_server();
        tpl::addVar("other_statistic", statistic_model::top_counter());
        tpl::addVar("title", "Статистика персонажей класса $class_name" );
        tpl::addVar("class_name", $class_name);
        tpl::addVar("player_classes", statistic_model::statistic_class($class_name, [$class_id]));
        tpl::display("statistic/class.html");
    }

}