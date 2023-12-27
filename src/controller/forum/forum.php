<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 16.09.2022 / 16:42:19
 */

namespace Ofey\Logan22\controller\forum;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\forum\internal;
use Ofey\Logan22\model\notification\notification;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\user;
use Ofey\Logan22\template\tpl;

class forum {

    public static int $perPage = 10;


    public static function getUserName(): void {
        validation::user_protection();
        $name = $_POST['name'];
        $users = user::getUsersByName($name);
        $list = [];
        foreach ($users as $k => $v) {
            $list[] = $v['name'];
        }
        echo json_encode($list, JSON_UNESCAPED_UNICODE);
    }

    public static function deleteComment(): void {
        validation::user_protection();
        $post_id = $_POST['post_id'] ?? board::notice(false, lang::get_phrase(491));
        internal::postDelete($post_id);
    }

    public static function deleteCommentImage(): void {
        validation::user_protection();
        $post_id = $_POST['post_id'] ?? board::notice(false, lang::get_phrase(491));
        $file_id = $_POST['file_id'] ?? board::notice(false, lang::get_phrase(491));
        internal::postImageDelete($post_id, $file_id);
    }

    public static function editComment(): void {
        validation::user_protection();
        $post_id = $_POST['post_id'] ?? board::notice(false, lang::get_phrase(491));
        $message = $_POST['message'] ?? board::notice(false, lang::get_phrase(492));

        //todo: проверка новых изображений из ctr+v
        $images = internal::base64ImgToSrcImg($message);

        $post_info = internal::getPost($post_id);
        if ($post_info['user_id'] != auth::get_id() && (!auth::get_access_level() == "admin" && !auth::get_access_level() == "moderator")) {
            board::notice(false, lang::get_phrase(493));
        }
        if (!auth::get_access_level() == "admin" && !auth::get_access_level() == "moderator") {
            if (auth::get_id() == $post_info['user_id']) {
                if (time() - strtotime($post_info['date_create']) > 3600 * 24) {
                    board::notice(false, lang::get_phrase(494));
                }
            } else {
                board::notice(false, lang::get_phrase(495));
            }
        }
        $ok = internal::postUpdate($post_id, $message);
        if (!$ok) {
            board::notice(false, lang::get_phrase(496));
        }
    }

    public static function likePost(): void {
        validation::user_protection();
        $post_id = $_POST['post_id'] ?? board::notice(false, lang::get_phrase(491));
        $type = $_POST['type'] ?? board::notice(false, lang::get_phrase(497));
        $skill_id = $_POST['skill_id'] ?? board::notice(false, lang::get_phrase(498));
        $comment = $_POST['comment'] ?? "";

        if (auth::get_access_level() != "admin" && auth::get_access_level() != "moderator") {
            if( (time() - ((int)auth::get_user_variables("last_time_like")['val'] ?? 0) )  < 10){
                board::error("Вы слишком часто ставите лайк");
            }
            \Ofey\Logan22\model\user\auth\user::set_variable("last_time_like", time());
        }

        $post_info = internal::getPost($post_id);
        if ($post_info['user_id'] == auth::get_id()) {
            board::notice(false, lang::get_phrase(499));
        }

        if ($type == "buff") {
            $type = 0;
        } else {
            $type = 1;
        }
        internal::addLikePost($post_id, $type, $skill_id, $comment);

        $post = internal::getBuffPost($post_id);
        $post['id'] = $post_id;
        tpl::addVar("post", $post);
        $async = new async("/forum/posts.html");
        $async->block("post_like_" . $post_id, "like", "replace", true);
        $async->block("post_delike_" . $post_id, "delike", "replace", true);
        $async->send();

    }

    public static function getLikePost(): void {
        validation::user_protection();
        $post_id = $_POST['post_id'] ?? board::notice(false, lang::get_phrase(491));
        $buffs = internal::getPostBuffs($post_id);
        $infoBuffData = include_once "src/config/forum/buff.php";
        $userIDs = array_unique(array_column($buffs, 'user_id'));
        $users = user::getUsers($userIDs);
        $users = array_column($users, null, 'id');
        foreach ($buffs as &$buff) {
            $type = ($buff['type'] === 0) ? "buff" : "debuff";
            foreach ($infoBuffData[$type] as $buffData) {
                if ($buffData['id'] == $buff['skill_id']) {
                    $buff['name'] = $buffData['name'];
                    $buff['icon'] = $buffData['icon'];
                    $buff['user_name'] = $users[$buff['user_id']]['name'] ?? lang::get_phrase(500);
                    break;
                }
            }
        }
        echo json_encode($buffs, JSON_UNESCAPED_UNICODE);
    }

    public static function addTopicRequest(): void {
        validation::user_protection();
        $section_id = $_POST['sectionID'] ?? board::notice(false, lang::get_phrase(501));
        $topicName = $_POST['topicName'] ?? "";
        $message = $_POST['message'] ?? "";
        $link = null;
        if (auth::get_access_level() != "admin" && auth::get_access_level() != "moderator") {
            if( (time() - ((int)auth::get_user_variables("last_time_forum_topic_add")['val'] ?? 0) )  < 60){
                board::error("Вы слишком часто создаете темы");
            }
            \Ofey\Logan22\model\user\auth\user::set_variable("last_time_forum_topic_add", time());
        }else{
            $link = $_POST['link'] ?? null;
        }
        $msgTrims = trim(htmlspecialchars_decode(strip_tags($message)), " &nbsp;\t\n\r\0\x0B\xC2\xA0");
        if (empty($msgTrims) and $link == null) {
            board::notice(false, lang::get_phrase(502));
        }

        if($link>=255){
            board::notice(false, "Максимальная длина ссылки: 255 символов.");
        }

        $message = str_replace(['<p><br></p>', '<div><br></div>', "<p>&nbsp;</p>"], "", $message);
        if ($topicName == "") {
            $topicName = mb_substr($msgTrims, 0, 80);
            if (mb_strlen($msgTrims) > 80) {
                $topicName .= "...";
            }
        }

        $topicIDs = internal::addTopic($section_id, $topicName, $message, $link);
        $section = internal::getSectionInfo($section_id);
        if (auth::get_access_level() == "user") {
            if ($section['is_close']) {
                board::notice(false, lang::get_phrase(503));
            }
        }
        $topic = internal::getTopic($topicIDs['lastIdTopic']);
        $posts = internal::getPosts($topic['id'], self::$perPage, 1);

        internal::incrSectionTopicAndPost($section_id, $topicIDs['postID'], $topicIDs['lastIdTopic'], true);

        if($link != ""){
            $section = internal::getSection($section_id);
            $topicsPin = internal::getTopicsPin($section_id);
            $topics = internal::getTopics($section_id);
            tpl::addVar("section", $section);
            tpl::addVar("topicsPin", $topicsPin);
            tpl::addVar("topics", $topics);
            $async = new async("forum/topics.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->SetURL("/forum/threads/" . $section['id']);
            $async->send();
            return;
        }

        $lastMessageID = max(array_column($posts, 'id'));
        tpl::addVar("lastMessageID", $lastMessageID);
        tpl::addVar("posts", $posts);
        tpl::addVar("topicID", $topicIDs['lastIdTopic']);
        tpl::addVar("topic", $topic);
        tpl::addVar("section", $section);
        tpl::addVar("topicName", $topicName);

        $async = new async("forum/posts.html");
        $async->block("main-container", "content", "update", true);
        $async->block("title", "title");
        $async->SetURL("/forum/threads/" . $section['id'] . "/" . $topicIDs['lastIdTopic']);
        $async->send();

    }

    public static function checkCloseTopic($is_close): void {
        //Если пользователь админ или модератор
        if (auth::get_access_level() == "admin" || auth::get_access_level() == "moderator") {
            return;
        }
        if ($is_close) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                board::notice(false, lang::get_phrase(503));
            } else {
                redirect::location("/forum");
            }
        }
    }

    public static function addTopic($sectionID): void {
        validation::user_protection();
        $section = internal::getSectionInfo($sectionID);
        self::checkCloseTopic($section['is_close']);
        tpl::addVar("section", $section);
        tpl::addVar("sectionID", $sectionID);
        tpl::display("/forum/addTopic.html");
    }

    public static function getTopic($sectionID, $topicID): void {
        self::getPosts($sectionID, $topicID, 0);
    }

    public static function getPosts($sectionID, $topicID, $currentPage): void {
        $topicInfo = internal::getTopic($topicID);
        if (!$topicInfo) {
            redirect::location("/forum");
        }
        if($topicInfo['link']!=null AND (auth::get_access_level()!="admin" AND auth::get_access_level()!="moderator")){
            redirect::location($topicInfo['link']);
        }
        $topicInfo['link'] = urldecode($topicInfo['link']);

        $section = $topicInfo['section_id'];
        $section = internal::getSectionInfo($section);

        $totalPosts = sql::getRow("SELECT COUNT(*) AS `count` FROM forum_posts WHERE topic_id = ?", [$topicID])['count'];
        if ($currentPage == 0) {
            $totalPages = ceil($totalPosts / self::$perPage);
            $currentPage = $totalPages;
        }
        $posts = internal::getPosts($topicID, self::$perPage, $currentPage);

        if (!$posts) {
            redirect::location("/forum");
        }
        $countPages = ceil($totalPosts / self::$perPage);
        $lastMessageID = max(array_column($posts, 'id'));

        //Если пользователь админ или модератор
        if (auth::get_access_level() == "admin" || auth::get_access_level() == "moderator") {
            $sectionData = internal::getCategoryInfo();
            foreach($sectionData as &$v){
                $v['sections'] = sql::getRows("SELECT * FROM forum_section WHERE category_id = ?", [$v['id']]);
            }
            tpl::addVar("all_sections_data", $sectionData);
        }
        tpl::addVar("lastMessageID", $lastMessageID);
        tpl::addVar("section", $section);
        tpl::addVar("currentPage", $currentPage);
        tpl::addVar("countPages", $countPages);
        tpl::addVar("totalPosts", $totalPosts);
        tpl::addVar("topic", $topicInfo);
        tpl::addVar("posts", $posts);
        tpl::display("/forum/posts.html");
    }

    public static function addPost(): void {
        validation::user_protection();
        //TODO: Сделать проверки на топик и сообщение

        $topicID = $_POST['topicID'] ?? 0;
        $lastMessageID = $_POST['lastMessageID'] ?? 0;
        $message = $_POST['message'] ?? "";
        if (auth::get_access_level() != "admin" && auth::get_access_level() != "moderator") {
            if( (time() - ((int)auth::get_user_variables("last_time_forum_post_add")['val'] ?? 0) )  < 20){
                board::error("Вы слишком часто отправляете сообщения");
            }
            \Ofey\Logan22\model\user\auth\user::set_variable("last_time_forum_post_add", time());
        }

        $images = internal::base64ImgToSrcImg($message);
        //Если $images массив пуст
        if (empty($images)) {
            if (empty(trim(htmlspecialchars_decode(strip_tags($message)), " &nbsp;\t\n\r\0\x0B\xC2\xA0"))) {
                board::notice(false, lang::get_phrase(504));
            }
        }

        $message = str_replace(['<p><br></p>', '<div><br></div>', "<p>&nbsp;</p>"], "", $message);

        $pattern = '/<blockquote>(.*?)<\/blockquote>/s';

        $message = preg_replace_callback($pattern, function ($matches) {
            $replacement = '<div class="alert alert-secondary" role="alert">$1</div>';
            $html = $matches[1];
            return preg_replace('/\$1/', $html, $replacement, 1);
        }, $message);

        $topic = internal::getTopic($topicID);
        if(!$topic){
            board::notice(false, "Тема не найдена");
        }
        if (auth::get_access_level() != "admin" && auth::get_access_level() != "moderator") {
            if ($topic['is_close'] == 1) {
                board::error("Тема закрыта");
            }
        }
        $section_id = $topic['section_id'];
        $section = internal::getSectionInfo($section_id);
        if (auth::get_access_level() == "user") {
            if ($section['is_close']) {
                board::notice(false, lang::get_phrase(503));
            }
        }
        $postID = internal::addPost($topicID, $message, (int)($images));
        if (!$postID) {
            board::notice(false, "Не удалось добавить сообщение");
        }

        //Отправим пользователю сообщение о том что его сообщение процитировали
        $patternPostID = '/<strong class="author" data-post-id="(\d+)">.*?<\/strong>/';
        if (preg_match($patternPostID, $message, $matches)) {
            $data_post_id = $matches[1];
            $post_info = internal::getPost($data_post_id);
            notification::add($post_info['user_id'], lang::get_phrase(505),  internal::postIdToLink($postID));
        }

        internal::addImage($images, $postID);
        internal::incrSectionTopicAndPost($section_id, $postID, $topicID);
        internal::incrTopicCounter($postID, $topicID);

        $posts = internal::getLastPostFromN($lastMessageID, $topicID);
        foreach ($posts as &$post) {
            if ($post['is_attached']) {
                $post['attached'] = internal::getAttachedPost($post['id']);
            }
        }
        tpl::addVar("posts", $posts);
        tpl::addVar("topicID", $topicID);
        $async = new async("/forum/posts.html");
        $async->block("postMessage", "postMessage", "append", true);
        $async->changeVal("lastMessageID", max(array_column($posts, 'id')), true);
        $async->JSCode("CKEDITOR.instances['js-ckeditor'].setData('')");
        $async->JSCode("lastMessageIDForum = {$postID};");
        $async->send();
    }

    public static function forum(): void {
        tpl::display("forum/forum.html");
    }

    public static function getTopics($sectionID): void {
        $section = internal::getSection($sectionID);
        $topicsPin = internal::getTopicsPin($sectionID);
        $topics = internal::getTopics($sectionID);
        tpl::addVar("section", $section);
        tpl::addVar("topicsPin", $topicsPin);
        tpl::addVar("topics", $topics);
        tpl::display("/forum/topics.html");
    }


}