<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 22.11.2022 / 19:36:43
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\config\config;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class forum {

    static public function index() {
        validation::user_protection("admin");
        include_once 'src/config/forum.php';
        tpl::addVar([
            'FORUM_ENABLE' => config::get_forum_enable(),
            'FORUM_HOST'     => FORUM_HOST,
            'FORUM_USER'     => FORUM_USER,
            'FORUM_PASSWORD' => FORUM_PASSWORD,
            'FORUM_NAME'     => FORUM_NAME,
            'FORUM_ENGINE'   => FORUM_ENGINE,
            'FORUM_URL'      => FORUM_URL,
        ]);
        tpl::display("admin/forum/forum.html");
    }

    /**
     * Сохранение настроек форума
     *
     */
    static public function save() {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\forum::save();
        var_dump($_POST);
        exit;
    }
}