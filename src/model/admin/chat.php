<?php

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\model\db\sql;

class chat
{

    public static function find_message($message, $server_id): array
    {
        $message = "%" . $message . "%";
        return sql::getRows("SELECT `id`, `type`, `message`, `player`, `date` FROM chat WHERE `message` LIKE ? AND `server` = ?", [
            $message,
            $server_id,
        ]);
    }

    public static function find_player($player, $server_id): array
    {
        return sql::getRows("SELECT `id`, `type`, `message`, `player`, `date` FROM chat WHERE `player` = ? AND `server` = ?", [
            $player,
            $server_id,
        ]);
    }
}