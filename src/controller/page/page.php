<?php

namespace Ofey\Logan22\controller\page;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\page\page AS page_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class page {

    /**
     * Добавление комментария
     * Комментарий ограничен БД до 3 тыс. символов
     * Комментарий добавляется только в разрешенные страницы
     */
    public static function add_comment(){
        //TODO: Проверочка не заблокирована ли возможность юзеру писать сообщения
        $page_id = $_POST['id'];
        $comment = $_POST['comment'];
        $page = page_model::get_news($page_id);
        if(!$page) board::notice(false, 'Ошибка');
        if(!$page['comment']) board::notice(false, 'Запрещено публиковать комментарии');
        if(1 > mb_strlen($comment)) board::notice(false, "Введите от 1 символа");
        if(3000 < mb_strlen($comment)) board::notice(false, "Максимальная длина 3000 тыс. У Вас ".mb_strlen($comment)." символов.");
        page_model::add_comment($page_id, $comment);
        board::notice(true, 'Добавлено');
    }

    public static function show($id) {
         tpl::addVar([
            'page' => page_model::get_news($id),
            'comments' => page_model::get_comments($id),
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("page.html");
    }

    public static function get_news_ajax(){
        $id = $_POST['news_id'];
        $content = page_model::get_news($id);
        if($content==false){
            board::notice(false, "Not news");
        }
        board::alert(array_merge($content, ['ok'=>true]) );
    }

    public static function all_news() {
        tpl::addVar([
            'title'    => 'Мой титул',
            'all_news' => page_model::show_news(),
            'server_list' => server::get_server_info(),
        ]);
        tpl::display("all_news.html");
    }

}