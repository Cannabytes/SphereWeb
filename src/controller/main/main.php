<?php
/**
 * Created by ofey
 * Date: 14.08.2022 / 17:55:03
 */

namespace Ofey\Logan22\controller\main;

use Ofey\Logan22\template\tpl;

class main {

    public static function index() {
        tpl::display("/main/main.html");
    }
}