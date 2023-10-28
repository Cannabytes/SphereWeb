<?php

namespace Ofey\Logan22\model\page;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class page {

    //Добавляем новый комментарий
    public static function add_comment($page_id, $comment) {
        $user_id = auth::get_id();
        return sql::run("INSERT INTO `page_comments` (`page_id`, `user_id`, `message`) VALUES (?, ?, ?)", [
            $page_id,
            $user_id,
            $comment,
        ]);
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

    public static function get_comment_id($id) {
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
                            page_comments.id = ?
                        LIMIT 50;", [$id])->fetch();
    }

    public static function get_news($id) {
        return sql::run("SELECT * FROM `pages` WHERE id=?", [$id])->fetch();
    }

    public static function show_all_pages_short($max_desc_len = 300, $limit = 300) {
        return sql::run("SELECT `id`, `name`, LEFT(description, $max_desc_len) AS `description`, `comment`, `trash`, `date_create` FROM `pages` ORDER BY `id` DESC LIMIT $limit;")->fetchAll();
    }

    /**
     * Возращаем только названия страниц и язык
     *
     * @return array|false
     * @throws \Exception
     */
    public static function all_page_name() {
        return sql::run("SELECT `id`, `name`, `lang` FROM `pages` WHERE trash=0 ORDER by lang ASC")->fetchAll();
    }

    public static function desc_server_list_short($server_id): array {
        return sql::getRows("SELECT
                                        server_description.server_id, 
                                        server_description.lang, 
                                        server_description.page_id,                                      
                                        server_description.`default`,                                                 
                                        server_description.date_create, 
                                        server_description.date_update,
                                        pages.`name`
                                    FROM
                                        server_description
                                        LEFT JOIN
                                        pages
                                        ON 
                                            server_description.page_id = pages.id
                                    WHERE server_id=?", [$server_id]);
    }

    public static function show_news_short($max_desc_len = 300, $limit = 10, $trash = false) {
        $lang = lang::lang_user_default();
        if($trash) {
            return sql::run("SELECT `id`, `name`, LEFT(description, $max_desc_len) AS `description`, `trash`, `date_create`, `poster` FROM `pages` WHERE trash = 1 AND is_news = 1 ORDER BY `id` DESC LIMIT ?;", [$limit])->fetchAll();
        }
        return sql::run("SELECT `id`, `name`, LEFT(description, $max_desc_len) AS `description`, `trash`, `date_create`, `poster` FROM `pages` WHERE lang=? AND is_news = 1 ORDER BY `id` DESC LIMIT ?;", [
            $lang,
            $limit,
        ])->fetchAll();
    }

    //Удаление комментария
    public static function delete($comment_id) {
        return sql::sql("DELETE FROM `page_comments` WHERE `id` = ?", [$comment_id]);
    }

    public static function edit($comment_message, $comment_id) {
        return sql::sql("UPDATE `page_comments` SET `message` = ? WHERE `id` = ?", [$comment_message, $comment_id]);
    }
}