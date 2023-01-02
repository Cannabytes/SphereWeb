<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 20:07:32
 */

namespace Ofey\Logan22\controller\account\info;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\player\character;
use Ofey\Logan22\template\tpl;

class info {

    public static function account($account, $server_id) {
        validation::user_protection();
        tpl::addVar([
            'title'      => lang::get_phrase(203),
            'account'      => $account,
            'server_id'  => $server_id,
            'players' => character::all_characters($account, $server_id),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("/account/players_list.html");
    }

    public static function player($account, $player_name, $server_id) {
        validation::user_protection();
        $player = character::get_player($player_name, $server_id);
        if(!$player) {
            echo lang::get_phrase(204, $player_name);
            exit;
        }
        $subclasses = character::get_subclasses($player['charId'], $server_id);
        $items = character::get_items($player['charId'], $server_id);
        tpl::addVar([
            'characters' => character::all_characters($account, $server_id),
            'title'      => lang::get_phrase(205, $player['char_name']),
            'server_id'     => $server_id,
            'items'      => $items,
            'account'      => $account,
            'player'     => $player,
            'subclasses' => $subclasses,
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("/account/player/player.html");
    }

    //Список игровых персонажей
    public static function player_list($player_name){
        self::account($player_name, 1);
    }
}