<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 31.08.2022 / 14:41:02
 */

namespace Ofey\Logan22\controller\user;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\server\server;

class default_server {

    /**
     * Установка сервера по умолчанию пользователю
     */
    static public function change() {
        $server_info = server::get_server_info($_POST['server_id']);
        if($server_info) {
            session::add("default_server", $_POST['server_id']);
            board::notice(true, lang::get_phrase(254, $server_info['name'], $server_info['rate_exp']));
        } else {
            board::notice(false, lang::get_phrase(253));
        }
    }
}