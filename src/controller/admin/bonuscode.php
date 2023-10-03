<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\template\tpl;

class bonuscode {

    public static function show() {
        validation::user_protection("admin");
        tpl::display('admin/bonuscode/bonus.html');
    }

    public static function genereate(){
        validation::user_protection("admin");
        bonus::genereateCode();
    }

}