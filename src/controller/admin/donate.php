<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.09.2022 / 16:49:48
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class donate {

    static public function show() {
        validation::user_protection("admin");
        tpl::addVar([
            'title'       => lang::get_phrase(215),
            'server_list' => server::get_server_info(),
        ]);
        tpl::addVar("products", \Ofey\Logan22\model\donate\donate::products());
        tpl::display("/admin/donate/donate.html");
    }

    public static function add() {
        validation::user_protection("admin");
        tpl::addVar([
            'title'       => lang::get_phrase(216),
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("/admin/donate/add_item.html");
    }

    public static function add_item() {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\donate::add_item();
    }

    public static function remove_item($id) {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\donate::remove_item($id);
        header("Location: /admin/donate");
        die();
    }
}