<?php

namespace Ofey\Logan22\model\page;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class page {


    //Добавляем новый комментарий
    public static function add_comment($page_id, $comment){
        $user_id = auth::get_id();
        return sql::run("INSERT INTO `page_comments` (`page_id`, `user_id`, `message`) VALUES (?, ?, ?)", [$page_id, $user_id, $comment]);
    }

    public static function get_comments($page_id): bool|array {
        return sql::run("SELECT
                            page_comments.*, 
                            users.`name`,
                            users.`avatar`,
                            users.`avatar_background`
                        FROM
                            page_comments
                            INNER JOIN
                            users
                            ON 
                                page_comments.user_id = users.id
                        WHERE
                            page_comments.page_id = ? AND
                            page_comments.trash = 0
                        ORDER BY
                            page_comments.id ASC
                        LIMIT 50;", [$page_id])->fetchAll();
    }

    public static function get_news($id) {
        return sql::run("SELECT * FROM `pages` WHERE id=?", [$id])->fetch();
    }

    public static function show_news() {
        return sql::run("SELECT * FROM `pages` WHERE is_news=1 ORDER by id DESC")->fetchAll();
    }

    public static function show_news_short($max_desc_len = 300, $limit = 10, $trash = false) {
        $lang = lang::lang_user_default();
        if($trash) {
            return sql::run("SELECT `id`, `name`, LEFT(description, $max_desc_len) AS `description`, `trash`, `date_create` FROM `pages` WHERE trash = 1 LIMIT ?;", [$limit])->fetchAll();
        }
        return sql::run("SELECT `id`, `name`, LEFT(description, $max_desc_len) AS `description`, `trash`, `date_create` FROM `pages` WHERE lang=? LIMIT ?;", [$lang, $limit])->fetchAll();
    }
}