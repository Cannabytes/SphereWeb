<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 11.02.2023 / 6:55:44
 */

namespace Ofey\Logan22\controller\referral;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class referral {

    static public function show() {
        validation::user_protection();
        require_once 'src/config/referral.php';
        tpl::addVar([
            "GAME_TIME" => GAME_TIME,
            "LEVEL"     => LEVEL,
            "PVP"       => PVP,
            "PK"        => PK,
            "referrals" => \Ofey\Logan22\model\referral\referral::player_list(),
        ]);
        tpl::display('/referral/referral.html');
    }

    static public function my_bonus() {
        validation::user_protection();
        \Ofey\Logan22\model\referral\referral::add_new_bonus();
    }
}