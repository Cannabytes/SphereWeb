<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 13.11.2022 / 9:29:45
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
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
            board::notice(false, lang::get_phrase(140, $mix_title_len));
        }
        if(!validation::max_len($title, $max_title_len)) {
            board::notice(false, lang::get_phrase(141, $max_title_len));
        }
        if(!validation::min_len($content, $min_content_len)) {
            board::notice(false, lang::get_phrase(142, $min_content_len));
        }
        if(!validation::max_len($content, $max_content_len)) {
            board::notice(false, lang::get_phrase(143, $max_content_len));
        }
    }

    static public function create() {
        //Получение данных запроса
        $title = $_POST['title'];
        $is_news = (int)filter_var(isset($_POST['is_news']), FILTER_VALIDATE_BOOLEAN);
        $enable_comment = (int)filter_var(isset($_POST['comment']), FILTER_VALIDATE_BOOLEAN);
        $content = $_POST['content'];
        $lang = $_POST['lang'];

        //Проверка данных
        self::check_data($title, $content);

        //Запись в базу
        $request = sql::run('INSERT INTO `pages` (`is_news`, `name`, `description`, `comment`, `date_create`, `lang`) VALUES (?, ?, ?, ?, ?, ?)', [
            $is_news,
            $title,
            $content,
            $enable_comment,
            time::mysql(),
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
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $is_news = (int)filter_var(isset($_POST['is_news']), FILTER_VALIDATE_BOOLEAN);
        $enable_comment = (int)filter_var(isset($_POST['comment']), FILTER_VALIDATE_BOOLEAN);
        $id = $_POST['id'];
        $lang = $_POST['lang'];
        //Проверка данных
        self::check_data($title, $content);
        //Запись в базу
        $request = sql::run('UPDATE `pages` SET `is_news` = ?, `name` = ?, `description` = ?, `comment` = ?, `lang` = ?  WHERE `id` = ?', [
            $is_news,
            $title,
            $content,
            $enable_comment,
            $lang,
            $id,
        ]);
        //Проверка результата вставки
        if($request) {
            board::alert([
                'ok'       => true,
                'message'  => self::get_page(144),
                'redirect' => "/page/" . sql::lastInsertId(),
            ]);
        }
        board::notice(false, self::get_page(145));
    }

    //Отправить в корзину новость
    public static function trash_send($id) {
        sql::run('DELETE FROM `pages` WHERE `id` = ?', [$id]);
        header("Location: /admin/pages");
        die();
    }

    public static function get_page($id) {
        return sql::run("SELECT * FROM `pages` WHERE id=?", [$id])->fetch();
    }

    public static function show_page() {
        return sql::run("SELECT * FROM `pages` ORDER by id DESC")->fetchAll();
    }

    public static function show_pages_short($max_desc_len = 300, $trash = false) {
        if($trash == true) {
            return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages` WHERE trash = 1;")->fetchAll();
        }
        return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages`;")->fetchAll();
    }
}