<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.09.2022 / 22:29:39
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
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
            board::notice(true, lang::get_phrase(136));
        }else{
            board::notice(false, lang::get_phrase(137));
        }
    }

    /**
     * Удаление предмета из доната меню
     * @param $id
     */
    public static function remove_item($id) {
        return sql::run("DELETE FROM `donate` WHERE `id` = ?", [$id]);
    }
}