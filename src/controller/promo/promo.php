<?php

namespace Ofey\Logan22\controller\promo;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class promo {

    public static function index(): void {
        tpl::addVar([
            'title'       => lang::get_phrase(238),
        ]);
        tpl::display("index.html", true);
    }
}