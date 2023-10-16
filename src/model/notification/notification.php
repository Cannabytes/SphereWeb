<?php

namespace Ofey\Logan22\model\notification;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\statistic\statistic;
use Ofey\Logan22\model\user\auth\auth;

class notification {

    public static function add($user_id, $message, $link): void {
        $sql = "INSERT INTO `notification` (`user_id`, `message`, `link`, `date`) VALUES (?, ?, ?, ?)";
        $params = [$user_id, $message, $link, date('Y-m-d H:i:s')];
        sql::run($sql, $params);
    }

    public static function get_self_notification($all = false): array {
        if ($all){
            $sql = "SELECT * FROM `notification` WHERE `user_id` = ? ORDER BY `date` DESC";
        }else{
            $sql = "SELECT * FROM `notification` WHERE `user_id` = ? AND `read` = 0 ORDER BY `date` DESC";
        }
        return sql::getRows($sql, [auth::get_id()]);
    }

    public static function notification_mark_read(): void {
        $sql = "UPDATE `notification` SET `read` = 1 WHERE `user_id` = ?";
        $i = sql::run($sql, [auth::get_id()]);
        if($i->rowCount()>0){
            board::success("Notification marked as read");
        }else{
            board::error("No notification to mark as read");
        }
    }

    public static function toAdmin($message, $link){
        $admins = sql::getRows("SELECT * FROM `users` WHERE `access_level` = 'admin' OR 'moderator';");
        foreach ($admins as $admin){
            self::add($admin['id'], $message, $link);
        }
    }

}