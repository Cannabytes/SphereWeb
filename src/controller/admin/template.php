<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 13.09.2022 / 12:06:58
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class template {

    public static function show_design() {
        validation::user_protection("admin");
        tpl::addVar("title", lang::get_phrase(230));
        tpl::addVar('template_list', fileSys::dir_list("template/designs"));
        tpl::display("admin/template/design.html");
    }

    public static function email_forget() {
        validation::user_protection("admin");

        tpl::addVar('forget', file_get_contents('template/cabinet/email_request/forget.html'));
        tpl::display("admin/template/email/forget.html");
    }

    public static function new_password() {
        validation::user_protection("admin");
        tpl::addVar('new_password', file_get_contents('template/cabinet/email_request/new_password.html'));
        tpl::display("admin/template/email/new_password.html");
    }

    public static function save_template() {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\template::save();
    }

    public static function get_readme(){
        validation::user_protection("admin");
        $template = $_POST['template'];
        $readmeJson = "template/designs/{$template}/readme.json";
        if(!file_exists($readmeJson)) {
            $arr['ok'] = false;
            $arr['message'] = lang::get_phrase(231, "template/designs/{$template}/readme.json");
            die(json_encode($arr));
        }
        echo file_get_contents($readmeJson);
    }

}