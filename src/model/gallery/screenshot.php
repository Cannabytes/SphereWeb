<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 03.09.2022 / 17:39:18
 */

namespace Ofey\Logan22\model\gallery;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\config\config;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\gallery\screenshot as screenshot_model;
use Ofey\Logan22\model\user\auth\auth;
use Verot\Upload\Upload;

class screenshot {

    //Кол-во изображений загруженых пользователем
    static public function count_user_screenshots($user_id): int {
        return sql::run("SELECT
                    COUNT(*) as `count`
                FROM
                    gallery_screenshot
                WHERE
                    gallery_screenshot.user_id = ?
                LIMIT 1", [$user_id])->fetch()['count'];
    }

    //Кол-во изображений загруженных пользователями
    static public function count_screenshots(): int {
        return sql::run("SELECT COUNT(*) as `count` FROM `gallery_screenshot` ")->fetch()['count'];
    }

    static public function load($limit = 30) {
        return sql::run("SELECT * FROM `gallery_screenshot` WHERE enable = 1 ORDER BY id DESC LIMIT ?;", [$limit])->fetchAll();
    }

    static public function admin_load_all() {
        return sql::run("SELECT * FROM `gallery_screenshot` ORDER BY id, enable DESC ")->fetchAll();
    }

    //Удовлетворение заявки размещения скриншота
    static public function admin_screen_enable($screen_id) {
        return sql::run(" UPDATE `gallery_screenshot` SET `enable` = 1 WHERE `id` = ?", [$screen_id]);
    }

    public static function load_my_screen() {
        return sql::run("SELECT * FROM `gallery_screenshot` WHERE user_id = ?", [auth::get_id()])->fetchAll();
    }

    static public function save_screen() {
        $handle = new Upload($_FILES['file']);
        if($handle->uploaded) {
            if(screenshot_model::count_user_screenshots(auth::get_id()) >= config::get_max_user_count_screenshots() or screenshot_model::count_screenshots() >= config::get_max_count_all_screenshots()) {
                board::notice(false, 'Вы достигли лимита загрузок изображений');
            }

            $handle->allowed = 'image/*';
            $handle->mime_check = true;
            $handle->file_max_size = (1024 * 1024) * 4; // Разрешенная максимальная загрузка 4mb

            $filename = md5(mt_rand(1, 100000) + time());
            $handle->file_new_name_body = $filename;
            $handle->image_resize = true;
            $handle->image_x = 250;
            $handle->image_ratio_y = true;
            $handle->file_name_body_pre = 'thumb_';
            $handle->image_convert = 'webp';
            $handle->webp_quality = 95;
            $handle->process('./uploads/screenshots');
            if(!$handle->processed) {
                board::notice(false, $handle->error);
            }

            $handle->file_new_name_body = $filename;
            $handle->image_resize = true;
            $handle->image_x = 1200;
            $handle->image_ratio_y = true;
            $handle->image_convert = 'webp';
            $handle->webp_quality = 85;
            $handle->process('./uploads/screenshots');
            if($handle->processed) {
                $handle->clean();
            } else {
                board::notice(false, $handle->error);
            }
            if(auth::get_access_level() == "admin" or auth::get_access_level() == "moderator") {
                sql::run("INSERT INTO `gallery_screenshot` (`user_id`, `image`, `enable`) VALUES (?, ?, ?)", [
                    auth::get_id(),
                    $filename . ".webp",
                    true,
                ]);
            } else {
                sql::run("INSERT INTO `gallery_screenshot` (`user_id`, `image`) VALUES (?, ?)", [
                    auth::get_id(),
                    $filename . ".webp",
                ]);
            }
        } else {
            board::notice(false, $handle->error);
        }
    }

    public static function save_description() {
        $id = $_POST['id'];
        $desc = $_POST['desc'];
        $upd = sql::run("UPDATE `gallery_screenshot` SET `desciption` = ? WHERE `id` = ? and user_id=?", [
            $desc,
            $id,
            auth::get_id(),
        ]);
        if($upd->rowCount() == 0) {
            exit(json_encode([
                'ok'      => false,
                'message' => 'Not change',
            ]));
        }
        exit(json_encode([
            'ok'      => true,
            'message' => 'Данные обновлены',
        ]));
    }

    public static function screen_remove($screen_id, $image_name) {
        $status = unlink("uploads/screenshots/" . $image_name);
        if(!$status) {
            board::notice(false, "Not find file: " . $image_name);
        }
        $status = unlink("uploads/screenshots/thumb_" . $image_name);
        if(!$status) {
            board::notice(false, "Not find file: " . $image_name);
        }
        sql::run("DELETE FROM `gallery_screenshot` WHERE `id` = ?", [$screen_id]);
        board::notice(true, "Удалено");
    }

    public static function get_hash_name_gallery_image($id) {
        return sql::run("SELECT * FROM gallery_screenshot WHERE id = ?", [$id])->fetch();
    }

    public static function options_save(bool $screen_enable = true, int $max_user_count_screenshots = 30, int $max_count_all_screenshots = 500) {
        return sql::run("UPDATE `config` SET `screen_enable` = ?, `max_user_count_screenshots` = ?, `max_count_all_screenshots` = ? LIMIT 1", [
            (int)$screen_enable,
            $max_user_count_screenshots,
            $max_count_all_screenshots,
        ]);
    }
}