<?php

namespace Ofey\Logan22\component\plugins\launcher;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class launcher {

    public function show() {
        if (!server::get_server_info()) {
            tpl::display("error/not_server.html");
        }
        $config = include __DIR__ . "/config.php";
        tpl::addVar('userLang', lang::lang_user_default());
        tpl::addVar("code", base64_encode(json_encode($config['server'][1])));

        tpl::displayPlugin("/launcher/tpl/show.html");
    }

    public function admin() {
        validation::user_protection("admin");
        tpl::addVar('userLang', lang::lang_user_default());
        tpl::displayPlugin("/launcher/tpl/patch_create.html");

    }


}