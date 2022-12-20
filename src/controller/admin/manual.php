<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 06.11.2022 / 19:13:14
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\template\tpl;

class manual {

    static public function index(){
        validation::user_protection("admin");
        tpl::addVar([
            'title' => lang::get_phrase(220),
        ]);
        tpl::display("/manual/manual.html");
    }

    static public function get($name){
        validation::user_protection("admin");
        $t = sql::run("SELECT * FROM `manual` WHERE name = ?" , [$name])->fetch();
        if(!$t)redirect::location("/admin/manual");
        tpl::display($t['template']);
    }


}