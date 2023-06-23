<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 30.08.2022 / 0:33:14
 */

namespace Ofey\Logan22\controller\donate;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class pay {

    public static function pay(): void {
        if(!config::getEnableDonate()) error::error404("Отключено");
        tpl::addVar("donate_history_pay_self", donate::donate_history_pay_self());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::display("/donate/pay.html");
    }

    public static function shop(): void {
        if(!config::getEnableDonate()) error::error404("Отключено");
        tpl::addVar("donate_history", donate::donate_history());
        tpl::addVar("products", donate::products());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::display("/donate/donate.html");
    }

    public static function transaction(): void {
        if(!config::getEnableDonate()) error::error404("Отключено");
        if(!auth::get_is_auth()) board::notice(false, lang::get_phrase(234));
        donate::transaction();
    }
}