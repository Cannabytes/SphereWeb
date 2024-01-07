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
        $itemid = $_POST['itemid'] ?? board::error("Not ID");
        $count = $_POST['count'] ?? 1;
        $cost = $_POST['cost'] ?? board::error("Not cost");
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

    static function edit_item_pack(){
        $id = $_POST['id'];
        $name = $_POST['name'] ?? board::error("No name");
        $cost = $_POST['cost'] ?? board::error("No cost");
        if($cost<0){
            board::error("Кол-во должно быть больше чем 0");
        }
        if(sql::run("UPDATE `donate` SET `pack_name` = ?, `cost` = ? WHERE `id` = ?",[
            $name,
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
         if(sql::run("DELETE FROM `donate` WHERE `id` = ?", [$id])){
            return sql::run("DELETE FROM `donate_pack` WHERE `pack_id` = ?", [$id]);
         }
         return false;
    }

    public static function add_item_pack() {
        $name = $_POST['name'] ?? board::error("No name");
        $cost = $_POST['cost']?? board::error("No cost");
        $server_id = $_POST['server_id'] ?? auth::get_default_server();
        $items = $_POST['items'] ?? board::error("Not items");
        if(empty($name)){
            board::error("No name");
        }
        if(empty($cost)){
            board::error("No cost");
        }
        if(count($items)<=0){
            board::notice(false, "Не может быть меньше чем 0");
        }

        $request = sql::run("INSERT INTO `donate` (`item_id`, `count`, `cost`, `server_id`, `is_pack`, `pack_name`) VALUES (?, ?, ?, ?, ?, ?)",[
            null,
            1,
            $cost,
            $server_id,
            true,
            $name
        ]);
        $pack_id = sql::lastInsertId();
        foreach($items AS $item){
            sql::run("INSERT INTO `donate_pack` (`pack_id`, `item_id`, `count`) VALUES (?, ?, ?)",[
                $pack_id,
                $item['item_id'],
                $item['item_count'],
            ]);
        }

        tpl::addVar("products", \Ofey\Logan22\model\donate\donate::products());
        $async = new async("admin/donate/donate.html");
        $async->block("main-container", "content", "update", true);
        $async->block("title", "title");
        $async->send();
    }
}