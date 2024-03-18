<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\template\tpl;

class userlog {

    public static function all($sort = null) {
        validation::user_protection("admin");
        if($sort == null OR strtolower($sort) == 'all'){
            $allLog = sql::getRows("SELECT
			logs_all.*,
			COALESCE(users.avatar, 'none.jpeg') AS `avatar`,
			COALESCE(users.name, '-') AS `name`,
			COALESCE(users.email, '-') AS `email` 
		FROM logs_all
		LEFT JOIN users ON logs_all.user_id = users.id
		ORDER BY logs_all.id DESC LIMIT 50");
        }else{
            $allLog = sql::getRows("SELECT
			logs_all.*,
			COALESCE(users.avatar, 'none.jpeg') AS `avatar`,
			COALESCE(users.name, '-') AS `name`,
			COALESCE(users.email, '-') AS `email` 
		FROM logs_all
		LEFT JOIN users ON logs_all.user_id = users.id
		WHERE type=?
		ORDER BY logs_all.id DESC LIMIT 50", [strtolower($sort)]);
        }

        foreach($allLog AS &$log){
            $s = json_decode($log['variables']);
            $values = is_array($s) ? array_values($s) : [$s];
            $log['message'] = lang::get_phrase($log['phrase'], ...$values);
        }
        $logs_type = sql::getRows('SELECT DISTINCT type FROM logs_all;');
        tpl::addVar('sort_type', $sort);
        tpl::addVar('logs_type', $logs_type);
        tpl::addVar("logs_all", $allLog);
        tpl::display("admin/logs/all.html");
    }

}