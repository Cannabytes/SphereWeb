<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 17.04.2023 / 16:19:06
 */

namespace Ofey\Logan22\controller\ticket;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\ticket\ticket_model;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class ticket {

    public static function all(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        tpl::addVar("tickets", ticket_model::all());
        tpl::addVar("category", "all");
        tpl::display("ticket/all.html");
    }

    public static function getOpenTickets(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        tpl::addVar("tickets", ticket_model::all("open"));
        tpl::addVar("category", "open");
        tpl::display("ticket/all.html");
    }

    public static function getCloseTickets(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        tpl::addVar("tickets", ticket_model::all("close"));
        tpl::addVar("category", "close");
        tpl::display("ticket/all.html");
    }

    public static function get($id) {
        if(!config::getEnableReferral()) error::error404("Disabled");
        $ticket = ticket_model::get_info($id);
        if(!$ticket){
            error::error404();
        }
        if($ticket['private'] and auth::get_id() != $ticket['user_id'] and auth::get_access_level() != "admin"){
            error::error404("Тикет скрыт настройками приватности");
        }
        if($ticket === false) {
            error::error404();
        }
        tpl::addVar("ticket", $ticket);
        tpl::display("ticket/read.html");
    }

    public static function search($word = ""): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        $error = "";
        if(empty($word)) {
            $error = lang::get_phrase(343);
        } elseif(mb_strlen($word) < 3) {
            $error = lang::get_phrase(344);
        } elseif(mb_strlen($word) > 50) {
            $error = lang::get_phrase(345);
        }
        $founds = sql::getRows("SELECT `id`, `user_id`, SUBSTR(`content`, LEAST(50, GREATEST(LOCATE(?, `content`) - 50, 1)), 100) AS `content`, `date`, `close` FROM `tickets` WHERE MATCH (`content`) AGAINST (? IN BOOLEAN MODE);", [
            $word,
            $word,
        ]);
        tpl::addVar("error", $error);
        tpl::addVar("founds", $founds);
        tpl::addVar("word", $word);
        tpl::display("ticket/found.html");
    }

    public static function create(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        tpl::display("ticket/create.html");
    }

    public static function edit($ticket_id, $comment_id = null): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        $ticket = ticket_model::get_ticket($ticket_id);
        if($ticket == null) {
            redirect::location("/ticket");
        }
        if($ticket['user_id'] != auth::get_id()) {
            error::error404("Страница Вам недоступна.");
        }
        tpl::addVar("ticket", ticket_model::get_info($ticket_id, false));
        if($comment_id != null) {
            tpl::addVar("comment", ticket_model::get_comment($ticket_id, $comment_id));
            tpl::display("ticket/editcomment.html");
        }
        tpl::display("ticket/editticket.html");
    }

    public static function removeImage() {
        if(!config::getEnableReferral()) error::error404("Disabled");
        validation::user_protection();
        ticket_model::removeImage();
    }

    public static function add(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        ticket_model::add();
    }

    public static function addComment(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        ticket_model::addComment();
    }

    public static function close(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        $ticket_id = $_POST['ticketID'] ?? null;
        if($ticket_id === null) {
            board::notice(false, lang::get_phrase(347));
        }
        $ticket = sql::getRow("SELECT `user_id`, `close` FROM `tickets` WHERE id=? LIMIT 1", [$ticket_id]);
        if($ticket['user_id'] == auth::get_id() or auth::get_access_level() == "admin") {
            sql::run("UPDATE `tickets` SET `close` = 1 WHERE `id` = ?", [$ticket_id]);
            board::notice(true);
        } else {
            board::notice(false, lang::get_phrase(346));
        }
    }

    public static function open(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        validation::user_protection();
        $ticket_id = $_POST['ticketID'] ?? null;
        if($ticket_id === null) {
            board::notice(false, lang::get_phrase(347));
        }
        $ticket = sql::getRow("SELECT `user_id`, `close` FROM `tickets` WHERE id=? LIMIT 1", [$ticket_id]);
        if($ticket['user_id'] == auth::get_id() or auth::get_access_level() == "admin") {
            sql::run("UPDATE `tickets` SET `close` = 0 WHERE `id` = ?", [$ticket_id]);
            board::notice(true);
        } else {
            board::notice(false, lang::get_phrase(348));
        }
    }

    public static function editComment(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        ticket_model::editComment();
    }

    public static function editTicket(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection();
        ticket_model::editTicket();
    }


    public static function remove(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection("admin");
        $ticketID = $_POST['ticketID'] ?? null;
        if(is_numeric($ticketID)){
           if(ticket_model::remove($ticketID)){
               board::alert([
                   "ok" => true,
                   "message"=> lang::get_phrase(146),
               ]);
           }
        }
    }

    public static function removeComment(): void {
        if(!config::getEnableReferral()) error::error404("Disabled");
        if(auth::get_ban_ticket()) board::notice(false, "You are not allowed to do this");
        validation::user_protection("admin");
        $ticketID = $_POST['commentID'] ?? null;
        if(is_numeric($ticketID)){
          if (ticket_model::removeComment($ticketID) ){
              board::alert([
                  "ok" => true,
                  "message"=> lang::get_phrase(146),
              ]);
          }
        }
    }
}