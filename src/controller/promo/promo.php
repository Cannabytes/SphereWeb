<?php

namespace Ofey\Logan22\controller\promo;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class promo {

    static public function index(): void {
        tpl::addVar([
            'title'       => lang::get_phrase(238),
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("index.html", true);
    }
}