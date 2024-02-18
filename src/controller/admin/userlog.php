<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\template\tpl;

class userlog {

    public static function all() {
        validation::user_protection("admin");
        $allLog = sql::getRows("SELECT
    logs_all.*,
    COALESCE(users.avatar, 'none.jpeg') AS `avatar`,
    COALESCE(users.name, '-') AS `name`,
    COALESCE(users.email, '-') AS `email` 
FROM logs_all
LEFT JOIN users ON logs_all.user_id = users.id
ORDER BY logs_all.id DESC");
        foreach($allLog AS &$log){
            $s = json_decode($log['variables']);
            $values = is_array($s) ? array_values($s) : [$s];
            $log['message'] = lang::get_phrase($log['phrase'], ...$values);
        }
        tpl::addVar("logs_all", $allLog);

        tpl::display("admin/logs/all.html");
    }

}