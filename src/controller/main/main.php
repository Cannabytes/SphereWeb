<?php
/**
 * Created by ofey
 * Date: 14.08.2022 / 17:55:03
 */

namespace Ofey\Logan22\controller\main;

use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\page\page as page_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class main {

    static public function index() {
        tpl::addVar([
            'title'           => 'Главная страница',
            'all_news'        => page_model::show_news_short(),
            'server_list'     => server::get_server_info(),
            'player_accounts' => player_account::show_all_account_player(),
            'screenshots'     => screenshot::load(8),
        ]);
        tpl::display("main.html");
    }
}