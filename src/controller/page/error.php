<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 02.12.2022 / 21:48:58
 */

namespace Ofey\Logan22\controller\page;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\template\tpl;

class error {

    static public function request_off() {
        board::notice(false, "Все запросы отключены. Сайт только для чтения, ознакомления.");
    }

    static public function show($e) {
        tpl::addVar('message', $e->getMessage());
        tpl::display("/error/404.html");
    }

    static public function error404($message = null) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            board::notice(false, "POST REQUEST NOT FOUND");
        }
        if($message == null) {
            $message = lang::get_phrase(239);
        }
        tpl::addVar("title", "Проблема...");
        tpl::addVar('message', $message);
        tpl::display("/error/404.html");
    }
}