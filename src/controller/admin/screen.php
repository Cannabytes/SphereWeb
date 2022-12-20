<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 04.09.2022 / 16:58:58
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\config\config;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\gallery\screenshot as screenshot_model;
use Ofey\Logan22\model\user\profile\other;
use Ofey\Logan22\template\tpl;

class screen {

    static public function all() {
        validation::user_protection("admin");
        $screens = screenshot::admin_load_all();
        $users_id = [];
        foreach($screens as $screen) {
            $users_id[] = $screen['user_id'];
        }
        other::get_users_scan($users_id);
        tpl::addVar("title", lang::get_phrase(224));
        tpl::addVar("screens", $screens);
        if(screenshot_model::count_screenshots() >= config::get_max_count_all_screenshots()) {
            redirect::location('/gallery');
        }
        tpl::display("admin/gallery/screens.html");
    }

    public static function add_enable() {
        validation::user_protection("admin");
        $screen_id = $_POST['id'];
        screenshot::admin_screen_enable($screen_id);
        board::notice(true, lang::get_phrase(225));
    }

    public static function remove() {
        validation::user_protection("admin");
        $screen_id = $_POST['id'];
        $image = screenshot_model::get_hash_name_gallery_image($screen_id);
        screenshot::screen_remove($screen_id, $image['image']);
        board::notice(true, lang::get_phrase(226));
    }

    public static function show_options() {
        tpl::addVar("title", lang::get_phrase(227));
        tpl::display("admin/gallery/options.html");
    }

    public static function options_save() {
        $screen_enable = (bool)filter_var($_POST['screen_enable'], FILTER_VALIDATE_BOOLEAN);
        $max_user_count_screenshots = (int)$_POST['max_user_count_screenshots'];
        $max_count_all_screenshots = (int)$_POST['max_count_all_screenshots'];
        if(screenshot::options_save($screen_enable, $max_user_count_screenshots, $max_count_all_screenshots)) {
            board::notice(true, lang::get_phrase(228));
        }
        board::notice(false, lang::get_phrase(229));
    }
}