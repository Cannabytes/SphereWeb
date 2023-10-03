<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 15.09.2022 / 22:29:39
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class donate {

    /**
     * Регистрация нового предмета
     */
    static function add_item() {
        $itemid = $_POST['itemid'];
        $count = $_POST['count'];
        $cost = $_POST['cost'];
        $server_id = $_POST['server_id'] ?? auth::get_default_server();
        if($count<=0){
            board::notice(false, "Не может быть меньше чем 0");
        }
        if(sql::run("INSERT INTO `donate` (`item_id`, `count`, `cost`, `server_id`) VALUES (?, ?, ?, ?)",[
            $itemid,
            $count,
            $cost,
            $server_id
        ])){
            tpl::addVar("products", \Ofey\Logan22\model\donate\donate::products());
            $async = new async("admin/donate/donate.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->send();
        }else{
            board::notice(false, lang::get_phrase(137));
        }
    }

    static function edit_item(){
        $id = $_POST['id'];
        $count = $_POST['count'];
        $cost = $_POST['cost'];
        if($count<0){
            board::notice(false, "Кол-во должно быть больше чем 0");
        }
        if(sql::run("UPDATE `donate` SET `count` = ?, `cost` = ? WHERE `id` = ?",[
            $count,
            $cost,
            $id,
        ])){
            tpl::addVar("products", \Ofey\Logan22\model\donate\donate::products());
            $async = new async("admin/donate/donate.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->send();
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