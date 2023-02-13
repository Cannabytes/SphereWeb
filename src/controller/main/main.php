<?php
/**
 * Created by ofey
 * Date: 14.08.2022 / 17:55:03
 */

namespace Ofey\Logan22\controller\main;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\page\page as page_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class main {

    static public function index() {
//        session::clear();
//        var_dump($_SESSION);
//        exit;
        tpl::display("main.html");
    }
}