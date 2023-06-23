<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 11.02.2023 / 6:55:44
 */

namespace Ofey\Logan22\controller\referral;

use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class referral {

    public static function show() {
        validation::user_protection();
        require_once 'src/config/referral.php';
        require_once 'src/config/enable.php';
        if (!ENABLE_REFERRAL){
           error::error404("Реферальная система отключена");
        }
        tpl::addVar([
            "GAME_TIME" => GAME_TIME,
            "LEVEL"     => LEVEL,
            "PVP"       => PVP,
            "PK"        => PK,
            "referrals" => \Ofey\Logan22\model\referral\referral::player_list(),
        ]);
        tpl::display('/referral/referral.html');
    }

    public static function my_bonus() {
        validation::user_protection();
        require_once 'src/config/enable.php';
        if (!ENABLE_REFERRAL){
            error::error404("Реферальная система отключена");
        }
        \Ofey\Logan22\model\referral\referral::add_new_bonus();
    }
}