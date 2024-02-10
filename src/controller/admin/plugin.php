<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\template\tpl;

class plugin {

    public static function show(){
        tpl::display("admin/plugin/plugin.html");
    }

}