<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\template\tpl;

class plugin {

    public static function show(){
        //Получить список папок в папке src/component/plugins
        $plugins = fileSys::dir_list("src/component/plugins");
        foreach ($plugins as $key => $value) {
            if(!file_exists("src/component/plugins/$value/settings.php")){
                unset($plugins[$key]);
            }
        }
        foreach ($plugins as $key => $value) {
            $setting = include "src/component/plugins/$value/settings.php";
            $plugins[$key] = $setting;
        }
        tpl::addVar("plugins", $plugins);
        tpl::display("admin/plugin/plugin.html");
    }

}