<?php

namespace Ofey\Logan22\controller\page;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\page\page as page_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class page {

    /**
     * Добавление комментария
     * Комментарий ограничен БД до 3 тыс. символов
     * Комментарий добавляется только в разрешенные страницы
     */
    public static function addComment() {
        if(!config::getEnableNews()) error::error404("Отключено");
        if(!auth::get_is_auth()) {
            board::notice(false, "Only auth user");
        }
        if(auth::get_ban_page()){
            board::notice(false, "You are not allowed to do this");
        }
        $page_id = $_POST['id'] ?? 0;
        $comment = htmlentities($_POST['comment']);
        $page = page_model::get_news($page_id);
        if(!$page)
            board::notice(false, lang::get_phrase(174));
        if (auth::get_access_level() !== "admin" && !$page['comment']) {
                board::notice(false, lang::get_phrase(240));
        }
        if(1 > mb_strlen($comment))
            board::notice(false, lang::get_phrase(241));
        if(3000 < mb_strlen($comment))
            board::notice(false, lang::get_phrase(242, mb_strlen($comment)));
        page_model::add_comment($page_id, $comment);

        userlog::add("add_comment_page", 535, [auth::get_email(), "/page/" . $page_id]);

        tpl::addVar([
           "comment" =>  page_model::get_comment_id(sql::lastInsertId()),
        ]);

        $async = new async("page/read.html");
        $async->block("page_new_comment", "page_new_comment", "append", true);
        $async->block("title", "title");
        $async->send();
    }

    public static function show($id) {
        if(!config::getEnableNews()) error::error404("Отключено");
        if($page = page_model::get_news($id)) {
            tpl::addVar([
                'page'        => $page,
                'comments'    => page_model::get_comments($id),
                'server_list' => server::get_server_info(),
            ]);
            tpl::display("page/read.html");
        }
        redirect::location("/main");
    }

    public static function get_news_ajax() {
        $id = $_POST['news_id'];
        $content = page_model::get_news($id);
        if(!$content) {
            board::notice(false, "Not news");
        }
        board::alert(array_merge($content, ['ok' => true]));
    }

    public static function lastNews(){
        if(!config::getEnableNews()) error::error404("Отключено");
        $shorts = \Ofey\Logan22\model\page\page::show_all_pages_short();
        tpl::addVar([
            "shorts" => $shorts,
        ]);
        tpl::display("page/page.html");
    }
}