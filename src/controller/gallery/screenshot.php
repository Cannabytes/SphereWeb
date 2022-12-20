<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 03.09.2022 / 16:57:39
 */

namespace Ofey\Logan22\controller\gallery;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\config\config;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\gallery\screenshot as screenshot_model;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class screenshot {

    static public function show_page() {
        $screens = screenshot_model::load();
        tpl::addVar("screens", $screens);
        tpl::addVar("title", lang::get_phrase(236));
        tpl::addVar('server_list', server::get_server_info());
        $allow_load_screenshot = true;

        if(screenshot_model::count_user_screenshots(auth::get_id()) >= config::get_max_user_count_screenshots() or screenshot_model::count_screenshots() >= config::get_max_count_all_screenshots()) {
            $allow_load_screenshot = false;
        }
        tpl::addVar("allow_load_screenshot", $allow_load_screenshot);

        tpl::display("/gallery/screenshots.html");
    }

    static public function show_add_page() {
        validation::user_protection();

        if(!config::get_screen_enable()) {
            redirect::location('/gallery');
        }

        //'Достигнут предел разрешенных загрузок'
        if(screenshot_model::count_user_screenshots(auth::get_id()) >= config::get_max_user_count_screenshots()) {
            redirect::location('/gallery');
        }
        if(screenshot_model::count_screenshots() >= config::get_max_count_all_screenshots()) {
            redirect::location('/gallery');
        }
        //Кол-во скриншотов, которые можно (осталось) загрузить пользователю
        $allow_count_user_screenshot =  config::get_max_user_count_screenshots()-screenshot_model::count_user_screenshots(auth::get_id());
        tpl::addVar("allow_count_user_screenshot", $allow_count_user_screenshot);

        tpl::addVar("title", lang::get_phrase(237));
        tpl::addVar('server_list', server::get_server_info());

        tpl::display("/gallery/add.html");
    }

    static public function load_screen() {
        validation::user_protection();
        if(!config::get_screen_enable()) {
            redirect::location('/gallery');
        }
        screenshot_model::save_screen();
    }

    public static function my_page() {
        validation::user_protection();
        $screens = screenshot_model::load_my_screen();
        tpl::addVar("screens", $screens);
        tpl::addVar("title", "Галерея моих скриншотов");
        tpl::addVar('server_list', server::get_server_info());

        tpl::display("/gallery/my.html");
    }

    public static function save_description() {
        validation::user_protection();
        screenshot_model::save_description();
    }

    public static function my_remove() {
        validation::user_protection();
        $screen_id = $_POST['id'];
        $image = screenshot_model::get_hash_name_gallery_image($screen_id);
        if($image['user_id'] == auth::get_id()){
            screenshot_model::screen_remove($screen_id, $image['image']);
        }
        board::notice(false, 'Maybe ban?');
    }
}