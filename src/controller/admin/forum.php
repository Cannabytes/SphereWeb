<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 22.11.2022 / 19:36:43
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\forum\internal;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\template\tpl;

class forum {

    public static function index(): void {
        validation::user_protection("admin");
        tpl::addVar("getCategoryInfo", internal::getCategoryInfo());
        tpl::addVar("getSectionInfo", internal::getSectionInfo());
        tpl::display("admin/forum/forum.html");
    }

    /**
     * Сохранение настроек форума
     */
    public static function save() {
        validation::user_protection("admin");
        \Ofey\Logan22\model\admin\forum::save();
        var_dump($_POST);
        exit;
    }

    private static function forumAdminMainLoader(): void {
        validation::user_protection("admin");
        tpl::addVar("getCategoryInfo", internal::getCategoryInfo());
        tpl::addVar("getSectionInfo", internal::getSectionInfo());
        $async = new async("admin/forum/forum.html");
        $async->block("forum_category", "forum_category", "update", true);
        $async->block("title", "title");
        $async->send();
    }

    public static function addCategory(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::addCategory()) {
            self::forumAdminMainLoader();
        }
    }

    public static function editCategory(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::editCategory()) {
            self::forumAdminMainLoader();

        }
    }

    public static function removeCategory(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::removeCategory()) {
            self::forumAdminMainLoader();

        }
    }

    public static function addSection(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::addSection()) {
            self::forumAdminMainLoader();
        }
    }

    public static function editSection(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::editSection()) {
            self::forumAdminMainLoader();
        }
    }

    public static function removeSection(): void {
        validation::user_protection("admin");
        if ($ok = \Ofey\Logan22\model\admin\forum::removeSection()) {
            self::forumAdminMainLoader();
        }
    }

    public static function closeSection() {
        validation::user_protection("admin");
        $id = $_POST['id'] ?? board::error("Не указана секция");
        $close = !filter_var($_POST['is_close'], FILTER_VALIDATE_BOOLEAN);
        $ok = \Ofey\Logan22\model\admin\forum::closeSection((int)$close, $id);
        if ($ok) {
            self::forumAdminMainLoader();
        }
    }



    public static function closeTopic() {
        validation::user_protection(["admin", "moderator"]);
        $topic_id = $_POST['topic_id'] ?? board::error("Не указана тема");
        $close = (int)filter_var($_POST['is_close'], FILTER_VALIDATE_BOOLEAN);
        $ok = \Ofey\Logan22\model\admin\forum::closeTopic($close, $topic_id);
        if ($ok) {
            if($close){
                board::success("Тема закрыта");
            }else{
                board::success("Тема открыта");
            }
        }
    }

    public static function pinTopic() {
        validation::user_protection(["admin", "moderator"]);
        $topic_id = $_POST['topic_id'] ?? board::error("Не указана тема");
        $is_pin = (int)filter_var($_POST['is_pin'], FILTER_VALIDATE_BOOLEAN);
        $ok = \Ofey\Logan22\model\admin\forum::pinTopic($is_pin, $topic_id);
        if ($ok) {
            if($is_pin){
                board::success("Тема закреплена");
            }else{
                board::success("Тема откреплена");
            }
        }
    }

    public static function topicMove(){
        validation::user_protection(["admin", "moderator"]);
        $topic_move = $_POST['topic_move'] ?? board::error("Не указано местоперемещение");
        $topic_id = $_POST['topic_id'] ?? board::error("Не указана тема");
        \Ofey\Logan22\model\admin\forum::topicMove($topic_move, $topic_id);

        $async = new async("/forum/posts.html");
        $async->JSCode("location.reload();");
        $async->send();
    }


}