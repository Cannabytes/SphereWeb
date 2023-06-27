<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 31.08.2022 / 16:56:36
 */

namespace Ofey\Logan22\controller\statistic;

use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\statistic\statistic as statistic_model;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class statistic {

    public static function pvp_ajax() {
        echo json_encode(statistic_model::get_pvp());
    }

    public static function pk_ajax() {
        echo json_encode(statistic_model::get_pk());
    }

    public static function other_ajax() {
        echo json_encode(statistic_model::top_counter());
    }

    public static function clan_ajax() {
        echo json_encode(statistic_model::get_clan());
    }

    public static function player_ajax() {
        echo json_encode(statistic_model::get_players_online_time());
    }

    public static function block_ajax() {
        echo json_encode(statistic_model::get_players_block());
    }

    public static function heroes_ajax() {
        echo json_encode(statistic_model::get_heroes());
    }

    public static function castle_ajax() {
        echo json_encode(statistic_model::get_castle());
    }

    public static function block(): void {
        tpl::display("statistic/block.html");
    }

    public static function heroes(): void {
        tpl::display("statistic/heroes.html");
    }

    public static function pvp(): void {
        tpl::display("statistic/pvp.html");
    }

    public static function pk(): void {
        tpl::display("statistic/pk.html");
    }

    public static function online_time(): void {
        tpl::display("statistic/online_time.html");
    }

    public static function clan(): void {
        tpl::display("statistic/clan.html");
    }

    public static function clan_info($clan_name): void {
        $clan = statistic_model::get_clan_all_info($clan_name);
        tpl::addVar("clan_info", $clan['clan_info']);
        tpl::addVar("clan_players", $clan['clan_players']);
        tpl::addVar("clan_skills", $clan['clan_skills']);
        tpl::display("/statistic/clan_data.html");
    }

    public static function castle(): void {
        tpl::display("statistic/castle.html");
    }

    public static function char_info($char_name = null): void {
        $get_player_info = statistic_model::get_player_info($char_name);
        if (!$get_player_info) {
            //todo: если нет персонажа, выведем страницу ошибки, что отсутствует такой персонаж
            redirect::location("/main");
        }
        $infoForbidden = self::getForbiddenViewPlayer($char_name);
        //Просмотр запрещен другими пользователями, но админу и пользователю можно
        if ($infoForbidden['forbidden']) {
            if ( auth::get_email() != $infoForbidden['email'] and auth::get_access_level() != "admin") {
                tpl::addVar("player", $get_player_info);
                tpl::display("statistic/char_denied_access.html");
            }
        }

        $inventory = statistic_model::get_player_inventory_info($char_name, $get_player_info['player_id']);
        $sub_class = statistic_model::get_player_info_sub_class($char_name, $get_player_info['player_id']);
        tpl::addVar("player", $get_player_info);
        tpl::addVar("inventory", $inventory);
        tpl::addVar("sub_class", $sub_class);
        tpl::display("statistic/char.html");
    }

    public static function getForbiddenViewPlayer($player) {
        $data = sql::getRow("SELECT `email`, `forbidden` FROM `player_forbidden` WHERE server_id = ? AND player = ?", [
            auth::get_default_server(),
            $player,
        ]);
        if (isset($data['forbidden'])) {
            return [
                'email' => $data['email'],
                'forbidden' => $data['forbidden'],
            ];
        }
        return ['forbidden' => true, 'email' => ''];
    }

    /**
     * TODO: Необходимо добавить проверку класса по хроникам.
     * В данный момент можно прописать класс из "выше хроник" и поиск пройдет.
     */
    public static function class($class_name): void {
        $class_id = race_class::get_id_class($class_name);
        if ($class_id === null)
            error::error404("Игровой класс не найден");
        $class_name = race_class::get_class($class_id);
        tpl::addVar("class_name", $class_name);
        tpl::addVar("player_classes", statistic_model::statistic_class($class_name, [$class_id]));
        tpl::display("statistic/class.html");
    }
}