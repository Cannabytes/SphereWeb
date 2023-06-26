<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 02.12.2022 / 21:18:05
 */

namespace Ofey\Logan22\controller\account\bonus;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\template\tpl;

class bonus {

    //Бонус код
    public static function code() {
        tpl::display("/bonus/bonus.html");
    }

    public static function receiving(): void {
        $object_id = $_POST['object_id'];
        $player_name = trim($_POST['player_name']);
        if (mb_strlen($player_name) < 1 || mb_strlen($player_name) > 21) {
            board::notice(false, "Недопустимая длина имени игрока. Имя должно содержать от 1 до 21 символа.");
        }
        \Ofey\Logan22\model\bonus\bonus::addBonusPlayer($object_id, $player_name);
    }

}