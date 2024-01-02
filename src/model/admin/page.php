<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.11.2022 / 9:29:45
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\page\page as page_model;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\template\tpl;
use Verot\Upload\Upload;

class page {

    public static function create(): void {
        //Получение данных запроса
        $title = $_POST['title'];
        $is_news = (int)filter_var(isset($_POST['is_news']), FILTER_VALIDATE_BOOLEAN);
        $enable_comment = (int)filter_var(isset($_POST['comment']), FILTER_VALIDATE_BOOLEAN);
        $content = $_POST['content'];
        $lang = $_POST['lang'];
        $link = $_POST['link'] ?? null;

        //Проверка данных
        self::check_data($title, $content);
        $poster = "";

        if (!is_dir(dirname("uploads/images/news"))) {
            mkdir("uploads/images/news", 0777, true);
        }
        $files = $_FILES['files'] ?? null;
        if ($files) {
            $file = array_map(function ($file) {
                return $file[0];
            }, $files);

            $handle = new Upload($file['tmp_name']);
            if ($handle->uploaded) {
                $handle->allowed = ['image/*'];
                $handle->mime_check = true;
                $handle->file_max_size = 5 * 1024 * 1024; // Разрешенная максимальная загрузка 4mb

                $filename = md5(mt_rand(1, 100000) + time());

                $handle->file_new_name_body = $filename;
                $handle->image_resize = true;
                $handle->image_x = 450;
                $handle->image_ratio_y = true;
                $handle->file_name_body_pre = 'thumb_';
                $handle->image_convert = 'webp';
                $handle->webp_quality = 95;
                $handle->process('uploads/images/news');
                if (!$handle->processed) {
                    board::notice(false, $handle->error);
                }

                $handle->file_new_name_body = $filename;
                $handle->image_resize = true;
                $handle->image_x = 1200;
                $handle->image_ratio_y = true;
                $handle->image_convert = 'webp';
                $handle->webp_quality = 95;
                $handle->process('uploads/images/news');
                if ($handle->processed) {
                    $handle->clean();
                    $poster = $filename . ".webp";
                }
                if ($handle->error) {
                    $fileName = $files['name'];
                    $msg = lang::get_phrase(455) . " '" . $fileName . "'\n" . lang::get_phrase(456) . " : " . $handle->error;
                    board::notice(false, $msg);
                }
            } else {
                board::notice(false, $handle->error);
            }
        }


        //Запись в базу
        $request = sql::run('INSERT INTO `pages` (`is_news`, `name`, `description`, `comment`, `date_create`, `lang`, `poster`, `link`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [
            $is_news,
            $title,
            $content,
            $enable_comment,
            time::mysql(),
            $lang,
            $poster,
            $link,
        ]);
        //Проверка результата вставки
        if ($request) {
            $id = sql::lastInsertId();
            tpl::addVar([
                'page' => page_model::get_news($id),
                'comments' => page_model::get_comments($id),
            ]);

            $async = new async("page/read.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->send();
        }

        board::notice(false, 'Произошла ошибка');
    }

    private static function check_data($title, $content) {
        //Предельные символы
        $mix_title_len = 4;
        $max_title_len = 140; // Максимум 600 символов. Рекомендую оставить 140.
        $min_content_len = 20;
        $max_content_len = pow(2, 24) - 1; //До 16 мб текста...

        //Проверка данных
        if (!validation::min_len($title, $mix_title_len)) {
            board::notice(false, lang::get_phrase(140, $mix_title_len));
        }
        if (!validation::max_len($title, $max_title_len)) {
            board::notice(false, lang::get_phrase(141, $max_title_len));
        }
        if (!validation::min_len($content, $min_content_len)) {
            board::notice(false, lang::get_phrase(142, $min_content_len));
        }
        if (!validation::max_len($content, $max_content_len)) {
            board::notice(false, lang::get_phrase(143, $max_content_len));
        }
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

        //Если есть files тогда загружаем, если нет, пропускаем.
        if (isset($_FILES['files'])) {
            if (!is_dir(dirname("uploads/images/news"))) {
                mkdir("uploads/images/news", 0777, true);
            }

            $files = $_FILES['files'] ?? null;

            //Из массива $files оставляем только первый массив
            $file = array_map(function ($file) {
                return $file[0];
            }, $files);

            $handle = new Upload($file['tmp_name']);
            if ($handle->uploaded) {
                $handle->allowed = ['image/*'];
                $handle->mime_check = true;
                $handle->file_max_size = 5 * 1024 * 1024; // Разрешенная максимальная загрузка 4mb

                $filename = md5(mt_rand(1, 100000) + time());
                $handle->file_new_name_body = $filename;
                $handle->image_resize = true;
                $handle->image_x = 1200;
                $handle->image_ratio_y = true;
                $handle->image_convert = 'webp';
                $handle->webp_quality = 95;
                $handle->process('./uploads/images/news');



                if ($handle->processed) {
                    $poster = $filename . ".webp";
                    $request = sql::run('UPDATE `pages` SET `is_news` = ?, `name` = ?, `description` = ?, `comment` = ?, `lang` = ? , `poster` = ?  WHERE `id` = ?', [
                        $is_news,
                        $title,
                        $content,
                        $enable_comment,
                        $lang,
                        $poster,
                        $id,
                    ]);

                    if ($request) {
                        $handle->image_convert = 'webp';
                        $handle->image_resize = true;
                        $handle->image_x = 450;
                        $handle->image_ratio_y = true;
                        $handle->file_new_name_body = 'thumb_' . $filename;
                        $handle->process('./uploads/images/news');

                        if ($handle->processed) {
                            $handle->clean();
                        }

                        board::alert([
                            'type' => 'notice',
                            'ok' => true,
                            "message" => "Успешно обновлено",
                            'redirect' => fileSys::localdir("/page/" . $id),
                        ]);
                    }
                }

                if ($handle->error) {
                    $fileName = $files['name'];
                    $msg = lang::get_phrase(455) . " '" . $fileName . "'\n" . lang::get_phrase(456) . " : " . $handle->error;
                    board::notice(false, $msg);
                }
            } else {
                board::notice(false, $handle->error);
            }
        }


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
        if ($request) {
            board::alert([
                'type' => 'notice',
                'ok' => true,
                'redirect' => fileSys::localdir("/page/" . $id),
            ]);
        }
        board::notice(false, self::get_page(145));
    }

    //Отправить в корзину новость

    public static function get_page($id) {
        return sql::run("SELECT * FROM `pages` WHERE id=?", [$id])->fetch();
    }

    public static function trash_send($id) {
        sql::run('DELETE FROM `pages` WHERE `id` = ?', [$id]);
        redirect::location("/admin/pages");
        die();
    }

    public static function show_page() {
        return sql::run("SELECT * FROM `pages` ORDER by id DESC")->fetchAll();
    }

    public static function show_pages_short($max_desc_len = 300, $trash = false) {
        if ($trash == true) {
            return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages` WHERE trash = 1;")->fetchAll();
        }
        return sql::run("SELECT `id`, `name`, LEFT(content, $max_desc_len) AS `content`, `trash`, `date_create` FROM `pages`;")->fetchAll();
    }
}