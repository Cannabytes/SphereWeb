<?php

namespace Ofey\Logan22\controller\promo;

use Ofey\Logan22\model\page\page AS page_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class promo {

    static public function index(): void {
        tpl::addVar([
            'title'       => 'Главная страница',
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("index.html", true);
    }

}