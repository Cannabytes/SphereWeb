<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 23.11.2022 / 4:27:06
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use PDOStatement;

class forum {

    public static function addCategory(): false|PDOStatement|null {
       return sql::run("INSERT INTO `forum_category` (`name`) VALUES (?)", [trim($_POST["name"])], true, false);
    }

    public static function editCategory(): false|PDOStatement|null {
        return sql::run("UPDATE `forum_category` SET `name` = ? WHERE `id` = ?", [trim($_POST["name"]), $_POST["id"]], true, false);
    }

    public static function removeCategory(): false|PDOStatement|null {
        return sql::run("DELETE FROM `forum_category` WHERE `id` = ?", [$_POST["id"]], true, false);
    }

    public static function addSection(): false|PDOStatement|null {
       return sql::run("INSERT INTO `forum_section` (`name`, `category_id`) VALUES (?, ?)", [trim($_POST["name"]), $_POST["category_id"]], true, false);
    }

    public static function editSection(): false|PDOStatement|null {
        return sql::run("UPDATE `forum_section` SET `name` = ? WHERE `id` = ?", [trim($_POST["name"]), $_POST["id"]], true, false);
    }

    public static function removeSection(): false|PDOStatement|null {
        return sql::run("DELETE FROM `forum_section` WHERE `id` = ?", [$_POST["id"]], true, false);
    }

    public static function closeSection($close, $id): false|PDOStatement|null {
        return sql::run("UPDATE `forum_section` SET `is_close` = ? WHERE `id` = ?", [$close, $id], true, false);
    }

    public static function closeTopic(int $close, int $id): false|PDOStatement|null {
        return sql::run("UPDATE `forum_topics` SET `is_close` = ? WHERE `id` = ?", [$close, $id], true, false);
    }

    public static function pinTopic(int $pin, int $id): false|PDOStatement|null {
        return sql::run("UPDATE `forum_topics` SET `pin` = ? WHERE `id` = ?", [$pin, $id], true, false);
    }

    public static function topicMove(mixed $topic_move, mixed $topic_id) {
        return sql::run("UPDATE `forum_topics` SET `section_id` = ? WHERE `id` = ?", [$topic_move, $topic_id], true, false);
    }

}