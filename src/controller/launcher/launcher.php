<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 12.04.2023 / 18:32:12
 */

namespace Ofey\Logan22\controller\launcher;

use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class launcher {

    static function show($server_id){
        if(!server::get_server_info($server_id)){
            redirect::location("/main");
        }
        tpl::addVar([
            "serverID" => $server_id,
        ]);
        tpl::display("launcher/launcher.html");
    }

    static function create(){
            tpl::display("launcher/create.html");
    }

}