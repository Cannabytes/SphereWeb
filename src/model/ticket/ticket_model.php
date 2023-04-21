<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 18.04.2023 / 5:52:26
 */

namespace Ofey\Logan22\model\ticket;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Verot\Upload\Upload;

class ticket_model {

    //Список последних тикетов
    static public function all($type = "all"): array {
        if($type == "open") {
            return sql::getRows("SELECT
            tickets.id, 
            tickets.user_id,
            SUBSTRING(tickets.content, 1, 100) as content, 
            tickets.date, 
            tickets.`close`
            FROM tickets WHERE
            `close` = 0 ORDER BY date DESC");
        }
        if($type == "close") {
            return sql::getRows("SELECT
            tickets.id, 
            tickets.user_id,
            SUBSTRING(tickets.content, 1, 100) as content, 
            tickets.date, 
            tickets.`close` 
            FROM tickets
            where close=1 ORDER BY `date` DESC");
        }
        return sql::getRows("SELECT
            tickets.id, 
            tickets.user_id,
            SUBSTRING(tickets.content, 1, 100) as content, 
            tickets.date, 
            tickets.`close`
            FROM tickets
            ORDER BY `date` DESC");
    }

    //
    static public function get_info($id) {
        $ticket = sql::getRow("SELECT tickets.*, users.`name`, users.avatar, users.avatar_background FROM tickets INNER JOIN users ON tickets.user_id = users.id WHERE tickets.id = ?", [$id]);
        if($ticket === false) {
            return false;
        }
        $ticket_img = sql::getRows("SELECT * FROM tickets_image WHERE ticket_id = ?", [$id]);
        $comments = sql::getRows("SELECT tickets_comment.*, users.`name`, users.avatar, users.avatar_background FROM tickets_comment INNER JOIN users ON tickets_comment.user_id = users.id WHERE ticket_id = ?", [$id]);
        foreach($comments as &$comment) {
            $comment['images'] = self::getCommentImage($comment['id']);
        }
        $ticket['images'] = $ticket_img;
        $ticket['comments'] = $comments;
        return $ticket;
    }

    static private function getCommentImage($comment_id): array {
        return sql::getRows("SELECT image FROM tickets_comment_image WHERE comment_id = ?", [$comment_id]);
    }

    static public function add() {
        $content = isset($_POST['content']) ? trim($_POST['content']) : null;
        $files = $_FILES['files'] ?? null;

        if($content === null && $files === null) {
            board::notice(false, lang::get_phrase(341));
            return;
        }

        sql::run("INSERT INTO `tickets` (`user_id`, `content`) VALUES (?, ?)", [
            auth::get_id(),
            $content,
        ]);
        $ticket_ID = sql::lastInsertId();

        if($files !== null) {
            self::processFiles($files, $ticket_ID, false);
        }

        board::alert([
            "ok"       => true,
            "redirect" => "/ticket/" . $ticket_ID,
        ]);
    }

    static public function addComment() {
        $content = isset($_POST['content']) ? trim($_POST['content']) : null;
        $files = $_FILES['files'] ?? null;
        $ticketID = $_POST['ticketID'] ?? null;

        if($content === null and $files === null) {
            board::notice(false, lang::get_phrase(341));
            return;
        }

        sql::run("INSERT INTO `tickets_comment` ( `ticket_id`, `user_id`, `content`) VALUES (?, ?, ?)", [
            $ticketID,
            auth::get_id(),
            $content,
        ]);
        $comment_ID = sql::lastInsertId();

        if($files !== null) {
            self::processFiles($files, $comment_ID, true);
        }

        board::alert([
            "ok" => true,
        ]);
    }

    static private function processFiles($files, $ticketID, $comment = true) {
        $count = count($files['name']);
        if($count > 5) {
            board::notice(false, lang::get_phrase(342));
            return;
        }
        for($i = 0; $i < $count; $i++) {
            $handle = new Upload($files['tmp_name'][$i]);
            if($handle->uploaded) {
                $handle->allowed = ['image/*'];
                $handle->mime_check = true;
                $handle->file_max_size = 4 * 1024 * 1024; // Разрешенная максимальная загрузка 4mb

                $filename = md5(mt_rand(1, 100000) + time());
                $handle->file_new_name_body = $filename;
                $handle->image_resize = true;
                $handle->image_x = 250;
                $handle->image_ratio_y = true;
                $handle->file_name_body_pre = 'thumb_';
                $handle->image_convert = 'webp';
                $handle->webp_quality = 95;
                $handle->process('./uploads/tickets');
                if(!$handle->processed) {
                    board::notice(false, $handle->error);
                }
                $handle->file_new_name_body = $filename;
                $handle->image_resize = true;
                $handle->image_x = 1200;
                $handle->image_ratio_y = true;
                $handle->image_convert = 'webp';
                $handle->webp_quality = 85;
                $handle->process('./uploads/tickets');
                if($handle->processed) {
                    $handle->clean();
                    if($comment){
                        sql::run("INSERT INTO `tickets_comment_image` (`comment_id`, `image`) VALUES (?, ?)", [
                            $ticketID,
                            $filename . ".webp",
                        ]);
                    }else{
                        sql::run("INSERT INTO `tickets_image` (`user_id`, `image`, `ticket_id`) VALUES (?, ?, ?)", [
                            auth::get_id(),
                            $filename . ".webp",
                            $ticketID,
                        ]);

                    }

                } else {
                    board::notice(false, $handle->error);
                }
            } else {
                board::notice(false, $handle->error);
            }
        }
    }
}