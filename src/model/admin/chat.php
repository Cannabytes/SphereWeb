<?php

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\model\db\sql;

class chat
{

    public static function find_message($message, $server_id): array
    {
        $message = "%" . $message . "%";
        return sql::getRows("SELECT *, TIMEDIFF(NOW(), date) AS time_difference FROM chat WHERE `message` LIKE ? AND `server` = ?", [
            $message,
            $server_id,
        ]);
    }

    public static function find_player($player, $server_id): array
    {
        return sql::getRows("SELECT *, TIMEDIFF(NOW(), date) AS time_difference FROM chat WHERE `player` = ? AND `server` = ?", [
            $player,
            $server_id,
        ]);
    }
}