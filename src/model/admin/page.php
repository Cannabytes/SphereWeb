<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 13.11.2022 / 9:29:45
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\db\sql;

class page {


    static private function check_data($title, $content) {
        //Предельные символы
        $mix_title_len = 4;
        $max_title_len = 140; // Максимум 600 символов. Рекомендую оставить 140.
        $min_content_len = 20;
        $max_content_len = pow(2, 24) - 1; //До 16 мб текста...

        //Проверка данных
        if(!validation::min_len($title, $mix_title_len)) {
            board::notice(false, "Титул новости должен быть от {$mix_title_len} символов");
        }
        if(!validation::max_len($title, $max_title_len)) {
            board::notice(false, "Титул новости должен быть до {$max_title_len} символов");
        }
        if(!validation::min_len($content, $min_content_len)) {
            board::notice(false, "Содержание новости должен быть от {$min_content_len} символов");
        }
        if(!validation::max_len($content, $max_content_len)) {
            board::notice(false, "Содержание новости должен быть до {$max_content_len} символов");
        }
    }

    static public function create() {
        //Получение данных запроса
        $title = $_POST['title'];
        $enable_comment = isset($_POST['comment']) == 'on';
        $is_news = isset($_POST['is_news']) == 'on';
        $content = $_POST['content'];
        $date_creat = date('Y-m-d H:i:s');
        $lang = $_POST['lang'];

        //Проверка данных
        self::check_data($title, $content);

        //Запись в базу
        $request = sql::run('INSERT INTO `pages` (`is_news`, `name`, `description`, `comment`, `date_create`, `lang`) VALUES (?, ?, ?, ?, ?, ?)', [
            $is_news,
            $title,
            $content,
            $enable_comment,
            $date_creat,
            $lang,
        ]);
        //Проверка результата вставки
        if($request) {
            board::alert([
                'ok'       => true,
                'message'  => 'Новость успешно создана',
                'redirect' => "/page/" . sql::lastInsertId(),
            ]);
        }
        board::notice(false, 'Произошла ошибка');
    }

    //Обновление данных
    public static function update() {
        $is_news = isset($_POST['is_news']) == 'on';
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $enable_comment = isset($_POST['comment']) == 'on';
        $id = $_POST['id'];
        $lang = $_POST['lang'];
        //Проверка данных
        self::check_data($title, $content);
        //Запись в базу
        $request = sql::run('UPDATE `pages` SET `is_news` = ?, `name` = ?, `description` = ?, `comment` = ?, `lang` = ?  WHERE `id` = ?', [
            (int)$is_news,
            $title,
            $content,
            (int)$enable_comment,
            $lang,
            $id,
        ]);
        //Проверка результата вставки
        if($request) {
            board::alert([
                'ok'       => true,
                'message'  => 'Новость успешно обновлена',
                'redirect' => "/page/" . sql::lastInsertId(),
            ]);
        }
        board::notice(false, 'Произошла ошибка');
    }

    //Отправить в корзину новость
    public static function trash_send($id) {
        sql::run('UPDATE `pages` SET `trash` = 1  WHERE `id` = ?', [$id]);
        header("Location: /admin/news");
        die();
    }

    //Отправить восстановить из корзины
    public static function trash_reestablish($id) {
        sql::run('UPDATE `pages` SET `trash` = 0  WHERE `id` = ?', [$id]);
    }

    public static function remove($id) {
        sql::run('DELETE FROM `pages` WHERE `id` = ?', [$id]);
        $data = sql::run('SELECT Count(trash) as `count` from pages WHERE trash = 1;')->fetch();
        if($data['count'] == 0) {
            header("Location: /admin/news");
            die();
        }
        header("Location: /admin/news/trash");
        die();
    }

    public static function remove_all() {
        sql::run('DELETE FROM `news` WHERE `trash` = 1');
        header("Location: /admin/news");
        die();
    }


    public static function get_page($id){
        return sql::run("SELECT * FROM `pages` WHERE id=?", [$id])->fetch();
    }

    public static function show_page(){
        return sql::run("SELECT * FROM `pages` ORDER by id DESC")->fetchAll();
    }

    public static function show_pages_short($max_desc_len = 300, $trash = false){
        if ($trash==true){
            return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages` WHERE trash = 1;")->fetchAll();
        }
        return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages`;")->fetchAll();
    }

}