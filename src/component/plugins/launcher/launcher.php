<?php

namespace Ofey\Logan22\component\plugins\launcher;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\user;
use Ofey\Logan22\template\tpl;

class launcher {

    public function show() {
        if (!server::get_server_info()) {
            tpl::display("error/not_server.html");
        }

        tpl::displayPlugin("/launcher/tpl/show.html");
    }

    public function add() {
        if (!server::get_server_info()) {
            tpl::display("error/not_server.html");
        }

        tpl::displayPlugin("/launcher/tpl/add.html");
    }




}