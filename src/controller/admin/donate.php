<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 15.09.2022 / 16:49:48
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class donate {

    static public function config() {
        validation::user_protection("admin");
        include_once ('src/config/donate.php');
        tpl::addVar([
            'title'       => lang::get_phrase(215),
            'server_list' => server::get_server_info(),
            ''
        ]);
        tpl::addVar("products", \Ofey\Logan22\model\donate\donate::products());
        tpl::display("/admin/donate/config.html");
    }

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

    public static function edit_item() {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\donate::edit_item();
    }

    public static function remove_item() {
        validation::user_protection("admin");
        $id = request::setting("productId", new request_config(isNumber: true));
        if(\Ofey\Logan22\model\admin\donate::remove_item($id)){
            board::notice(true);
        }
        board::notice(false, "error");
    }
}