<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class index {

    public static function index() {
        validation::user_protection("admin");
        tpl::addVar([
            "title" => lang::get_phrase("admin_panel"),
        ]);
        tpl::display("admin/index.html");
    }

    public static function support(){
        validation::user_protection("admin");
        tpl::addVar([
            "title" => lang::get_phrase("support"),
        ]);
        tpl::display("admin/support.html");
    }

}