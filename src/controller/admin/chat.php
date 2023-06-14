<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 28.12.2022 / 0:23:31
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class chat {
    public static function show(): void {
        validation::user_protection("admin");
        tpl::addVar([
            "title" => "Server Chat Game",
        ]);
        tpl::display("/admin/chat/chat.html");
    }

    public static function find_message(): void {
        validation::user_protection("admin");
        $message = trim($_POST['message']);
        $server_id = $_POST['server_id'];
        $result = \Ofey\Logan22\model\admin\chat::find_message($message, $server_id);
        echo json_encode($result);
    }

    public static function find_player(): void {
        validation::user_protection("admin");
        $player = trim($_POST['player']);
        $server_id = $_POST['server_id'];
        $result = \Ofey\Logan22\model\admin\chat::find_player($player, $server_id);
        echo json_encode($result);
    }
}