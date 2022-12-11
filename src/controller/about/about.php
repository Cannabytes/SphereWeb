<?php

namespace Ofey\Logan22\controller\about;

use Ofey\Logan22\model\about\about as aboutModel;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class about {

    static public function show($id) {
        tpl::addVar([
            "about_id" => $id,
            "title" => "Описание сервера",
            "desc"  => aboutModel::get_about_server($id),
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("about.html");
    }
}