<?php

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class userlog {

    public static function add($type, $phrase, $variable = []){
        $user_id = auth::get_id() ?? 0;
        $server_id = auth::get_default_server();
        $time = time::mysql();
        $variable = json_encode($variable);
        $query = "INSERT INTO `logs_all` (`user_id`, `time`, `type`, `phrase`, `variables`, `server_id`) VALUES (?, ?, ?, ?, ?, ?)";
        sql::run($query, [
            $user_id,
            $time,
            $type,
            $phrase,
            $variable,
            $server_id
        ]);
    }

}