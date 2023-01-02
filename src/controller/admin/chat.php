<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 28.12.2022 / 0:23:31
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class chat {
    static public function show(): void {
        validation::user_protection("admin");
        tpl::addVar([
            "title" => "Server Chat Game",
            'server_list'     => server::get_server_info(),
        ]);

        tpl::display("/admin/chat/chat.html");
    }
}