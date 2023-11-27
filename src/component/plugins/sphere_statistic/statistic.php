<?php

namespace Ofey\Logan22\component\plugins\sphere_statistic;

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

    public function show() {
        validation::user_protection("admin");
        $settings = include __DIR__ . "/settings.php";

        if (!$settings["PLUGIN_ENABLE"]) {
            error::error404("Плагин отключен");
        }

        $registrations_count = sql::getRows("SELECT DATE(`date_create`) AS registration_date, COUNT(*) AS registrations_count 
                                    FROM `users` 
                                    WHERE `date_create` > 0 
                                    GROUP BY DATE(`date_create`) 
                                    ORDER BY registration_date DESC");

        tpl::addVar("registrations_count", $registrations_count);
        tpl::displayPlugin("/sphere_statistic/tpl/show.html");
    }

    public function world(){
        validation::user_protection("admin");
        $countries = sql::getRows("SELECT `country` as `country_code`, COUNT(*) AS `count` FROM `users` WHERE `country` != '' GROUP BY `country` ORDER BY `count` DESC");
        foreach ($countries as &$country_item){
            $country_item["country_name"] = country::get_countries($country_item["country_code"]);
        }
        tpl::addVar("countries", $countries);
        tpl::displayPlugin("/sphere_statistic/tpl/world.html");
    }

    public function donate() {
        validation::user_protection("admin");
        $points = sql::getRows("SELECT `point`, DATE(`date`) AS `date` FROM `donate_history_pay` WHERE `sphere` = 0 GROUP BY DATE(`date`), `point`;");
        $total = 0;
        foreach ($points as $point) {
            $total += $point["point"];
        }
        $country_donate = sql::getRows("SELECT
	IFNULL(u.country, 'none') AS country,
	COUNT(DISTINCT u.id) AS users_count,
	COUNT(DISTINCT d.user_id) AS donating_users_count,
	SUM(d.point) AS total_donations
FROM
	users AS u
	LEFT JOIN
	donate_history_pay AS d ON u.id = d.user_id
GROUP BY
	IFNULL(u.country, 'none')
HAVING
	donating_users_count > 0
ORDER BY
	total_donations DESC;");

        foreach ($country_donate as &$country_item){
            $country_item["country"] = country::get_countries($country_item["country"]);
        }

        tpl::addVar("country_donate", $country_donate);
        tpl::addVar("total", $total);
        tpl::addVar("points", $points);
        tpl::displayPlugin("/sphere_statistic/tpl/donate.html");
    }


}