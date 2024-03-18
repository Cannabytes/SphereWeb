<?php

namespace Ofey\Logan22\component\plugins\inventory;

use DateTime;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class inventory {

    public function show() {
        validation::user_protection();
        tpl::displayPlugin("/inventory/tpl/index.html");
    }

    public function send() {
        validation::user_protection();
        $player_name = $_POST['player_name'] ?? board::error("No Player Name");
        $objects = $_POST['object_items'] ?? board::error("No Select Items");
        $isSend = false;
        if(!is_array($objects)){
            board::error("Администрация уведомлена о попытках найти уязвимости");
        }

        $placeholders = rtrim(str_repeat('?, ', count($objects)), ', ');

        $sql = "SELECT * FROM `bonus` WHERE id IN ($placeholders) ";
        $bonus_items = sql::getRows($sql, $objects);
        if(empty($bonus_items)){
            board::error("No items");
        }
        foreach($bonus_items AS $item){
            if($item['user_id'] == auth::get_id()){
                userlog::add("inventory_to_game",542, [$item['enchant'], $item['item_id'], $item['count'], $player_name] );
                player_account::addItem($item['server_id'], $item['item_id'], $item['count'], $item['enchant'], $player_name);
                sql::run("DELETE FROM `bonus` WHERE `id` = ?", [$item['id']]);
                $isSend = true;
            }
        }
        if($isSend){
            auth::setBonus();
            $async = new async("inventory/tpl/index.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->send();
        }else{
            board::error("No send");
        }

    }


}