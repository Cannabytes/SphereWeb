<?php

namespace Ofey\Logan22\component\plugins\online_statistic;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\country\country;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\user;
use Ofey\Logan22\template\tpl;

class statistic {

    public function show($type = "month") {
        validation::user_protection("admin");
        $settings = include __DIR__ . "/settings.php";

        if (!$settings["PLUGIN_ENABLE"]) {
            error::error404("Плагин отключен");
        }
        if($type == "month"){
            $players = \Ofey\Logan22\model\statistic\statistic::get_statistic_online_month(isMul: false);
        }elseif ($type == "week"){
            $players = \Ofey\Logan22\model\statistic\statistic::get_online_last_week(isMul: false);
        }else {
            $players = \Ofey\Logan22\model\statistic\statistic::get_statistic_online_all();
        }

        tpl::addVar("players", $players);
        tpl::displayPlugin("/online_statistic/tpl/show.html");
    }

}