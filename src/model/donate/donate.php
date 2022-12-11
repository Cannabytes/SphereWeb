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
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class donate {

    /**
     * Список товаров для покупки за донат очки
     *
     * @return false|\PDOStatement|void
     * @throws Exception
     */
    static public function products() {
        $server_id = auth::get_default_server();
        if($server_id == false) {
            tpl::display("error/not_server.html");
        }
        return sql::run("SELECT * FROM `donate` WHERE server_id = ?", [
            $server_id,
        ]);
    }

    /*
     * Покупка предмета, передача предмета игровому персонажу
     */
    static public function transaction() {
        $id = $_POST['id'];
        $server_id = $_POST['server_id'];
        $user_value = $_POST['user_value'];
        $char_name = $_POST['char_name'];
        if($char_name == "") {
            board::notice(false, 'Имя пользователя не может быть пустым');
        }
        $donat_info = self::donate_item_info($id, $server_id);
        if($donat_info == false) {
            board::notice(false, 'Товар не найден');
        }
        //Стоимость товара * на количество
        $cost_product = $donat_info['cost'] * $user_value;
        if($cost_product > auth::get_donate_point()) {
            board::notice(false, "Не хватает Донат Бонусов для покупки. Стоимость покупки {$cost_product} ДБ, у Вас " . auth::get_donate_point());
        }

        $server_info = server::server_info($server_id);
        if($server_info == false) {
            board::notice(false, 'Сервер не найден');
        }

        $reQuest = server::db_info_id($server_info['db_id']);
        if($reQuest == false) {
            board::notice(false, 'Проблемы чтения данных из БД');
        }

        $player_info = player_account::is_player($reQuest, [$char_name]);
        $player_info = $player_info->fetch();
        if($player_info == false) {
            board::notice(false, "Персонаж «{$char_name}» не найден");
        }
        $owner_id = $player_info["obj_id"];
        if($player_info["online"]) {
            board::notice(false, "Персонаж «{$char_name}» не должен быть в игре");
        }
        $addToUserItems = $donat_info['count']*$user_value;

        /**
         * Проверим, есть ли на персонаже X предмет N
         * Если есть, добавим к числу N+N предметов
         */
        $checkPlayerItem = player_account::check_item($reQuest, [$donat_info['item_id'], $owner_id]);
        $checkPlayerItem = $checkPlayerItem->fetch();
        //Если предмет есть у игрока
        if($checkPlayerItem){
            player_account::update_item_count_player($reQuest, [$checkPlayerItem['count']+$addToUserItems, $checkPlayerItem['object_id']]);
        }else{
            //Предмета нет в инвентаре, добавим.
            $max_obj_id = player_account::max_value_item_object($reQuest)->fetch()['max_object_id'];
            player_account::add_item($reQuest, [
                $owner_id,
                time() - $max_obj_id - $owner_id,
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
            'message'      => "Вы купили " . itemgame::get_item($donat_info['item_id'])['name'] . " {$addToUserItems} шт. ",
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