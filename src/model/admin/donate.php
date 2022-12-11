<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.09.2022 / 22:29:39
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\db\sql;

class donate {

    /**
     * Регистрация нового предмета
     */
    static function add_item() {
        $itemid = $_POST['itemid'];
        $count = $_POST['count'];
        $cost = $_POST['cost'];
        $description = $_POST['description'];
        $server_id = $_POST['server_id'];
        if(sql::run("INSERT INTO `donate` (`item_id`, `count`, `cost`, `description`, `server_id`) VALUES (?, ?, ?, ?, ?)",[
            $itemid,
            $count,
            $cost,
            $description,
            $server_id
        ])){
            board::notice(true, "Предмет был добавлен в магазин");
        }else{
            board::notice(false, "Предмет не добавлен");
        }
    }

    /**
     * Удаление предмета из доната меню
     * @param $id
     */
    public static function remove_item($id) {
        sql::run("DELETE FROM `donate` WHERE `id` = ?", [$id]);
    }
}