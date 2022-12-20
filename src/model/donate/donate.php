<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 05.09.2022 / 17:41:12
 */

namespace Ofey\Logan22\model\donate;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\itemgame\itemgame;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class donate {

    /**
     * Список товаров для покупки за донат очки
     *
     * @return false|\PDOStatement
     * @throws Exception
     */
    static public function products() {
        $server_id = auth::get_default_server();
        if(!$server_id) {
            tpl::display("error/not_server.html");
        }
        $donate = sql::run("SELECT * FROM `donate` WHERE server_id = ?", [
            $server_id,
        ])->fetchAll();
        $item_id_list = [];
        foreach($donate as $item) {
            $item_id_list[] = $item['item_id'];
        }
        if(empty($item_id_list)) return $item_id_list;
        $list = implode(', ', $item_id_list);
        $lex = sql::getRows("SELECT * FROM items_data WHERE `item_id` IN ({$list});");

        $items = [];
        foreach($donate as $item) {
            $item_id = $item['item_id'];
            foreach($lex as $row) {
                if($item_id == $row['item_id']) {
                    $items[] = array_merge($item, $row);
                }
            }
        }
        return $items;
    }

    /*
     * Покупка предмета, передача предмета игровому персонажу
     */
    static public function transaction() {
        $id = $_POST['id'];
        $server_id = $_POST['server_id'];
        $user_value = $_POST['user_value'];
        $char_name = trim($_POST['char_name']);
        if($char_name == "") {
            board::notice(false, lang::get_phrase(148));
        }
        $donat_info = self::donate_item_info($id, $server_id);
        if(!$donat_info) {
            board::notice(false, lang::get_phrase(152));
        }
        //Стоимость товара * на количество
        $cost_product = $donat_info['cost'] * $user_value;
        if($cost_product > auth::get_donate_point()) {
            board::notice(false, lang::get_phrase(149, $cost_product, auth::get_donate_point()));
        }

        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();

        if(!$player_info) {
            board::notice(false, lang::get_phrase(151, $char_name));
        }
        $player_id = $player_info["player_id"];
        if($player_info["online"]) {
            board::notice(false, lang::get_phrase(153, $char_name));
        }
        $addToUserItems = $donat_info['count'] * $user_value;

        /**
         * Проверим, есть ли на персонаже X предмет N
         * Если есть, добавим к числу N+N предметов
         */
        $checkPlayerItem = player_account::check_item($server_info, [
            $donat_info['item_id'],
            $player_id,
        ]);
        $checkPlayerItem = $checkPlayerItem->fetch();
        //Если предмет есть у игрока
        if($checkPlayerItem) {
            player_account::update_item_count_player($server_info, [
                ($checkPlayerItem['count'] + $addToUserItems),
                $checkPlayerItem['object_id'],
            ]);
        } else {
            //Предмета нет в инвентаре, добавим.
            $max_obj_id = player_account::max_value_item_object($server_info)->fetch()['max_object_id'];
            player_account::add_item($server_info, [
                $player_id,
                time() - $max_obj_id - $player_id,
                $donat_info['item_id'],
                $addToUserItems,
                0,
                "INVENTORY",
            ]);
        }

        self::taking_money($cost_product, auth::get_id());
        auth::set_donate_point(auth::get_donate_point() - $cost_product);
        board::alert([
            'ok'           => true,
            'message'      => "Вы купили " . $donat_info['item_id'] . " {$addToUserItems} шт. ",
            'donate_bonus' => auth::get_donate_point(),
        ]);
    }

    /**
     * Получение информации о предмете из БД
     */
    static private function donate_item_info($item_id, $server_id) {
        return sql::run("SELECT id, item_id, count, cost FROM donate WHERE id = ? AND server_id = ?", [
            $item_id,
            $server_id,
        ])->fetch();
    }

    static private function taking_money($dp, $user_id) {
        sql::run("UPDATE `users` SET `donate_point` = `donate_point`-? WHERE `id` = ?", [
            $dp,
            $user_id,
        ]);
    }
}