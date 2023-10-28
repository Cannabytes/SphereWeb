<?php

namespace Ofey\Logan22\model\forum;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use PDOStatement;
use Verot\Upload\Upload;

class internal {

    public static function forum() {
        $forum = sql::getRows("SELECT id, name FROM forum_category");
        foreach ($forum as &$item) {
            $item['section'] = sql::getRows("SELECT
	forum_section.*, 
	topic_name.`name` AS topic_name
FROM
	forum_section
	LEFT JOIN
	forum_topics AS topic_name
	ON 
		forum_section.topic_id = topic_name.id
WHERE
	category_id = ?", [$item['id']]);
        }
        return $forum;
    }

    public static function getTopicsPin($sectionID) {
        return sql::getRows("SELECT * FROM forum_topics WHERE section_id = ? AND pin = 1 ORDER BY date_update DESC", [$sectionID]);
    }

    public static function getSectionInfo($id = null) {
        if ($id == null) {
            return sql::getRows("SELECT * FROM forum_section");
        }
        return sql::getRow("SELECT * FROM forum_section WHERE id = ?", [$id]);
    }

    public static function getCategoryInfo($id = null) {
        if ($id == null) {
            return sql::getRows("SELECT * FROM forum_category");
        }
        return sql::getRow("SELECT * FROM forum_category WHERE id = ?", [$id]);
    }

    //Возвращает всю инфомрацию о топике
    public static function getTopic($topicID): ?array {
        $topicName = sql::getRow("SELECT * FROM forum_topics WHERE id = ? LIMIT 1", [$topicID]);
        if (!$topicName) {
            return null;
        }
        return $topicName;
    }



    public static function getSection($id) {
        $section = sql::getRow("SELECT * FROM forum_section WHERE id = ?", [$id]);
        if (!$section) {
            header("Location: /forum");
            exit;
        }
        return $section;
    }

    public static function getTopics($sectionID) {
        return sql::getRows("SELECT * FROM forum_topics WHERE section_id = ? AND pin = 0 ORDER BY date_update DESC", [$sectionID]);
    }

    //Возвращает массив сообщений от N поста до последнего
    public static function getLastPostFromN(int $lastID, int $topicID) {
        return sql::getRows("SELECT
        forum_posts.*,
        users.`email`,
        users.`name`,
        users.signature,
        users.avatar,
        users.country,
        users.access_level
    FROM
        forum_posts
    LEFT JOIN
        users
    ON
        forum_posts.user_id = users.id
    WHERE
        forum_posts.id > ? AND forum_posts.topic_id = ?
    ORDER BY
        forum_posts.id ASC", [$lastID, $topicID]);
    }

    public static function getPosts(int $topic_id, $perPage, $currentPage = 1, $isGroupSkills = true): array {

        $offset = ($currentPage - 1) * $perPage;

        $posts = sql::getRows("SELECT
        forum_posts.*, 
        users.`email`, 
        users.`name`, 
        users.signature, 
        users.avatar, 
        users.country, 
        users.access_level
    FROM
        forum_posts
        LEFT JOIN
        users
        ON 
            forum_posts.user_id = users.id
    WHERE
        topic_id = ? LIMIT ? OFFSET ?", [$topic_id, $perPage, $offset]);
        $infoBuffData = include_once "src/config/forum/buff.php";
        foreach ($posts as &$currentPost) {
            if ($currentPost['is_attached']) {
                $currentPost['attached'] = self::getAttachedPost($currentPost['id']);
            }
            $currentPost['buffs'] = self::getPostBuffs($currentPost['id'], $isGroupSkills);
            foreach ($currentPost['buffs'] as &$currentBuff) {
                $type = ($currentBuff['type'] === 0) ? "buff" : "debuff";
                foreach ($infoBuffData[$type] as $buffData) {
                    if ($buffData['id'] == $currentBuff['skill_id']) {
                        $currentBuff['name'] = $buffData['name'];
                        $currentBuff['icon'] = $buffData['icon'];
                        break;
                    }
                }
            }
        }
        return $posts;
    }

    public static function getAttachedPost($post_id): array {
        return sql::getRows("SELECT * FROM forum_images WHERE post_id = ?", [$post_id]);
    }


    //Информация о конкретном посте

    public static function getPostBuffs(int $post_id, bool $isGroupSkills = true): array {
        $query = "SELECT `id`, `post_id`, `skill_id`, `type`, `comment`, `user_id`, `date_create` FROM `forum_buffs` WHERE `post_id` = ? ORDER BY `id` DESC";
        $rows = sql::getRows($query, [$post_id]);
        if ($isGroupSkills && !empty($rows)) {
            $uniqueSkillIds = [];
            $uniqueBuffs = [];
            foreach ($rows as $row) {
                $skillId = $row['skill_id'];
                if (!in_array($skillId, $uniqueSkillIds)) {
                    $uniqueSkillIds[] = $skillId;
                    $uniqueBuffs[] = $row;
                }
            }
            return $uniqueBuffs;
        }
        return $rows;
    }


    public static function getPost(int $postID): array {
        return sql::getRow("SELECT
        forum_posts.*, 
        users.`name`, 
        users.signature, 
        users.avatar, 
        users.country, 
        users.access_level
    FROM
        forum_posts
        LEFT JOIN
        users
        ON 
            forum_posts.user_id = users.id
    WHERE
        forum_posts.id = ?", [$postID]);
    }

    // Если $isGroupSkills true тогда вернет без дубликатов, с уникальными skill_id
    // Иначе вернет весь массив бафов
    public static function getBuffPost(int $post_id, $isGroupSkills = true): array {
        $infoBuffData = include_once "src/config/forum/buff.php";
        $currentPost['buffs'] = self::getPostBuffs($post_id, $isGroupSkills);
        foreach ($currentPost['buffs'] as &$currentBuff) {
            $type = ($currentBuff['type'] === 0) ? "buff" : "debuff";
            foreach ($infoBuffData[$type] as $buffData) {
                if ($buffData['id'] == $currentBuff['skill_id']) {
                    $currentBuff['name'] = $buffData['name'];
                    $currentBuff['icon'] = $buffData['icon'];
                    break;
                }
            }
        }
        return $currentPost;
    }

    public static function addPost($topicID, $message, $isAttached) {
        sql::run("INSERT INTO `forum_posts` (`topic_id`, `user_id`, `post`, `is_attached`) VALUES (?, ?, ?, ?)", [$topicID, auth::get_id(), $message, $isAttached]);
        return sql::lastInsertId();
    }

    public static function addImage($images, $post_id) {
        foreach ($images as $image) {
            sql::run("INSERT INTO `forum_images` (`post_id`, `image`, `user_id`) VALUES (?, ?, ?)", [$post_id, $image, auth::get_id()]);
        }
    }

    public static function addTopic(mixed $section, mixed $topicName, mixed $message, $link = null) {
        $sql = sql::sql("INSERT INTO `forum_topics` (`section_id`, `name`, `last_post_user_id`, `last_post_user_name`, `author_id`, `author_user_name`, `link`) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $section,
                $topicName,
                auth::get_id(),
                auth::get_name(),
                auth::get_id(),
                auth::get_name(),
                $link
            ]);
        $lastIDTopic = sql::lastInsertId();

        sql::run("INSERT INTO `forum_posts` (`topic_id`, `user_id`, `post`) VALUES (?, ?, ?)", [$lastIDTopic, auth::get_id(), $message]);
        $postID = sql::lastInsertId();

        sql::sql("UPDATE `forum_topics` SET `post_id` = ?, `last_post_id` = ? WHERE `id` = ?", [
            $postID,
            $postID,
            $lastIDTopic
        ]);

        return ['lastIdTopic' => $lastIDTopic, 'postID' => $postID];
    }

    public static function addLikePost($post_id, $type, $skill_id, $comment): void {
        sql::run("DELETE FROM `forum_buffs` WHERE `post_id` = ? AND `user_id` = ?", [$post_id, auth::get_id()]);
        $ok = sql::run("INSERT INTO `forum_buffs` (`post_id`, `user_id`, `type`, `skill_id`, `comment`) VALUES (?, ?, ?, ?, ?)",
            [$post_id, auth::get_id(), $type, $skill_id, $comment]);
        if (!$ok) {
            board::notice(false, lang::get_phrase(506));
        }
    }

    // Увеличиваем счетчик постов в секции
    public static function incrSectionTopicAndPost($section_id, $last_post_id, $topicID, $incr_topic_count_posts = false): false|PDOStatement|null {
        $add_topic_count = ($incr_topic_count_posts) ? 1 : 0;
        return sql::run("UPDATE forum_section SET posts_count = posts_count+1, topics_count = topics_count+?, `last_post_id` = ?, `topic_id` = ?, `user_id` = ?, `user_name` = ? WHERE id = ?;", [
            $add_topic_count,
            $last_post_id,
            $topicID,
            auth::get_id(),
            auth::get_name(),
            $section_id,
        ]);
    }

    //Увеличение счетчиков постов в разделе
    public static function incrTopicCounter($last_post_id, $topicID): void {
        sql::sql("UPDATE forum_topics SET replies = replies+1, `last_post_id` = ?, `last_post_user_id` = ?, `last_post_user_name` = ? WHERE id = ?;", [
            $last_post_id,
            auth::get_id(),
            auth::get_name(),
            $topicID,
        ]);
    }

    public static function postUpdate($post_id, $message): false|PDOStatement|null {
        return sql::run("UPDATE `forum_posts` SET `post` = ? WHERE `id` = ?", [$message, $post_id]);
    }

    //Удаление поста, если пост является главным в теме - удаление всей темы.
    public static function postDelete(mixed $post_id): true {
        //Проверка кто автор поста
        $post = sql::getRow("SELECT * FROM `forum_posts` WHERE `id` = ?", [$post_id]);
        if (!$post) {
            board::notice(false, lang::get_phrase(508));
        }
        if (!auth::get_access_level() == "admin" && !auth::get_access_level() == "moderator") {
            if ($post['user_id'] != auth::get_id()) {
                board::notice(false, lang::get_phrase(507));
            }
        }

        $stmt = sql::run("DELETE FROM `forum_posts` WHERE `id` = ?", [$post_id]);
        if (!$stmt) {
            board::notice(false, lang::get_phrase(507));
        }
        // Если $stmt->rowCount() вернул больше нуля значит пост был удален
        if ($stmt->rowCount() > 0) {
            //Удаление изображений из таблицы forum_images
            sql::run("DELETE FROM `forum_images` WHERE `post_id` = ?", [$post_id]);

            sql::run("DELETE FROM `forum_buffs` WHERE `post_id` = ?", [$post_id]);
            //Проверка существования темы в таблицы forum_topics по post_id
            $topic_stmt = sql::getRow("SELECT * FROM `forum_topics` WHERE `post_id` = ?", [$post_id]);
            //Если найдено, то удаляем тему
            if ($topic_stmt) {
                sql::run("DELETE FROM `forum_topics` WHERE `post_id` = ?", [$post_id]);
                //Так же удаляем все сообщения из таблицы forum_posts, которые имеют section_id = $section_id
                $post_stmt = sql::run("DELETE FROM `forum_posts` WHERE `topic_id` = ?", [$topic_stmt['id']]);
                board::alert([
                    'type' => 'notice',
                    'ok' => true,
                    'message' => lang::get_phrase(509),
                    "redirect" => fileSys::localdir("/forum"),
                ]);
            }
        }
        return true;
    }

    public static function changeAllUserName($newName, $changeName): void {
        sql::run("UPDATE `forum_section` SET `user_name` = ? WHERE `user_name` = ?", [$newName, $changeName]);
        sql::run("UPDATE `forum_topics` SET `author_user_name` = ? WHERE `author_user_name` = ?", [$newName, $changeName]);
        sql::run("UPDATE `forum_topics` SET `last_post_user_name` = ? WHERE `last_post_user_name` = ?", [$newName, $changeName]);
    }

    public static function imageToGallery($message) {


    }

    public static function base64ImgToSrcImg(&$message) {
        $arrImg = [];
        $pattern = '/<img[^>]*src\s*=\s*["\'](data:image\/[^"\']*)["\'][^>]*>/i';
        preg_match_all($pattern, $message, $matches);

        foreach ($matches[0] as $imgTag) {
            preg_match('/data:image\/[^;]+;base64,(?<base64>[^\'"]+)/', $imgTag, $base64Match);
            if (isset($base64Match['base64'])) {
                $base64Image = $base64Match['base64'];
                $imageData = base64_decode($base64Image);
                if ($imageData === false) {
                    board::notice(false, lang::get_phrase(510));
                }
                $directoryPath = "uploads/images/forum/"; // Путь к директории, в которой должен быть сохранен файл
                $filePathTemp = $directoryPath . 'file_tmp.png';
                if (!file_exists($directoryPath) && !is_dir($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }
                if (!is_dir(dirname($filePathTemp))) {
                    mkdir($filePathTemp, 0777, true);
                }

                if (file_put_contents($filePathTemp, $imageData) !== false) {

                }

                $handle = new Upload($filePathTemp);
                if ($handle->uploaded) {
                    $handle->allowed = 'image/*';
                    $handle->mime_check = true;
                    $handle->file_max_size = (1024 * 1024) * 4; // Разрешенная максимальная загрузка 4mb
                    $filename = md5(mt_rand(1, 100000) + time());
                    $arrImg[] = $filename . ".webp";
                    $handle->file_new_name_body = $filename;
                    $handle->image_resize = true;
                    $handle->image_x = 250;
                    $handle->image_ratio_y = true;
                    $handle->file_name_body_pre = 'thumb_';
                    $handle->image_convert = 'webp';
                    $handle->webp_quality = 95;
                    $handle->process($directoryPath);
                    if (!$handle->processed) {
                        board::notice(false, $handle->error);
                    }
                    $handle->file_new_name_body = $filename;
                    $handle->image_resize = true;
                    $handle->image_x = 1200;
                    $handle->image_ratio_y = true;
                    $handle->image_convert = 'webp';
                    $handle->webp_quality = 85;
                    $handle->process($directoryPath);
                    if ($handle->processed) {
                        $handle->clean();
                    } else {
                        board::notice(false, $handle->error);
                    }
                }
//                $imgData = "<img class='img-fluid' src='/uploads/images/forum/thumb_{$filename}.webp' alt=''>";
//                $message = str_replace($imgTag, $imgData, $message);
                $message = str_replace($imgTag, "", $message);
            }
        }
        return $arrImg;
    }

    public static function postImageDelete($post_id, $file_id) {
        $image = sql::getRow("SELECT * FROM `forum_images` WHERE `id` = ? AND `post_id` = ?", [$file_id, $post_id]);
        if (!$image) {
            board::notice(false, lang::get_phrase(511));
        }
        if (!auth::get_access_level() == "admin" && !auth::get_access_level() == "moderator") {
            if ($image['user_id'] != auth::get_id()) {
                board::notice(false, lang::get_phrase(512));
            }
        }
        $directoryPath = "uploads/images/forum/";
        $filePath = $directoryPath . $image['image'];
        $filePathThumb = $directoryPath . "thumb_" . $image['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        if (file_exists($filePathThumb)) {
            unlink($filePathThumb);
        }
        sql::run("DELETE FROM `forum_images` WHERE `id` = ? AND `post_id` = ?", [$file_id, $post_id]);
    }

    //На вход ID поста, возвращает ссылку на пост
    public static function postIdToLink($id): ?string {
        $post = sql::getRow("SELECT * FROM `forum_posts` WHERE `id` = ?", [$id]);
        if(!$post){
            return null;
        }
        $topic = sql::getRow("SELECT * FROM `forum_topics` WHERE `id` = ?", [$post['topic_id']]);
        if(!$topic){
            return null;
        }
        $section = sql::getRow("SELECT * FROM `forum_section` WHERE `id` = ?", [$topic['section_id']]);
        if(!$section){
            return null;
        }
        return "/forum/threads/{$section['id']}/{$topic['id']}#{$post['id']}";
    }

}