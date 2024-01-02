<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 02.12.2022 / 21:18:05
 */

namespace Ofey\Logan22\controller\account\bonus;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class bonus {


    public static function update_inventory(){
        auth::setBonus();
        $async = new async("basic/base.html");
        $async->block("inventory", "inventory", "replace", true);
        $async->block("title", "title");
        $async->send();
    }

    //Бонус код
    public static function code() {
        tpl::display("/bonus/bonus.html");
    }

    public static function receiving(): void {
        validation::user_protection();
        $code = $_POST['code'] ?? board::notice(false, "Не передано значение объекта");
        \Ofey\Logan22\model\bonus\bonus::getCode($code);
    }

    public static function addBonusPlayer(): void {
        validation::user_protection();
        \Ofey\Logan22\model\bonus\bonus::addBonusPlayer($_POST['object_id'] ?? 0, $_POST['player_name'] ?? null);
    }

}