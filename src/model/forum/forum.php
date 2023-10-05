<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 16.09.2022 / 17:51:33
 */

namespace Ofey\Logan22\model\forum;

use Exception;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\cache\timeout;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\model\db\fdb;

class forum {

    static private string $engine = '';
    static private string $url    = '';

    static public function forum_enable(): bool {
        return config::get_forum_enable();
    }

    /**
     * Название движка форума
     *
     * @return string
     */
    static public function get_engine(): string {
        if(self::$engine == '') {
            include_once 'src/config/forum.php';
            self::$engine = FORUM_ENGINE;
        }
        return self::$engine;
    }

    static public function get_url($link = ''): string {
        if(self::$url == '') {
            include_once 'src/config/forum.php';
            self::$url = FORUM_URL;
        }
        return self::$url;
    }

    /**
     * Последние N сообщений с форума
     *
     * @param int $n
     *
     * @return array|bool|mixed|void
     * @throws Exception
     */
    static public function get_last_message(int $n = 10) {
        if(!self::forum_enable()) {
            return false;
        }
        $actualCache = cache::read(dir::forum->show(), second: timeout::forum->time());
        if($actualCache)
            return $actualCache;
        if(fdb::$error != null) {
            return fdb::$error;
        }
        $last_message = match (self::get_engine()) {
            "xenforo" => self::get_xenforo_last_message($n),
            "ipb" => self::get_ipb_last_message($n),
        };
        if(fdb::$error) {
            echo fdb::$messageError;
            return fdb::$error;
        }
        cache::save(dir::forum->show(), $last_message);
        return $last_message;
    }

    /**
     * @throws Exception
     */
    static private function get_xenforo_last_message(int $n = 10): bool|string|array {
        $query = fdb::run('SELECT
                                xf_post.username as username, 
                                xf_post.post_date as post_date, 
                                xf_post.message as message, 
                                xf_post.user_id as user_id, 
                                xf_post.thread_id as thread_id, 
                                xf_post.post_id as post_id, 
                                xf_thread.title as title, 
	                            xf_thread.last_post_user_id  as last_post_user_id
                            FROM xf_post LEFT JOIN xf_thread ON xf_post.thread_id = xf_thread.thread_id
                            ORDER BY xf_post.post_id DESC LIMIT ?;', [
            $n,
        ]);
        if(fdb::$error) {
            return fdb::$messageError;
        }
        return $query->fetchAll();
    }

    static private function get_ipb_last_message(int $n = 10): bool|string|array {
        $query = fdb::run("SELECT
                        tid AS thread_id, 
                        title as title, 
                        last_post, 
                        last_poster_name, 
                        last_poster_id as last_post_user_id, 
                        title_seo,
                        forum_id
                    FROM
                        forums_topics
                    ORDER BY
                        last_post DESC
                    LIMIT ?", [$n]);
        if(fdb::$error) {
            return fdb::$messageError;
        }
        return $query->fetchAll();
    }

    static public function get_last_thread(int $n = 10) {
        if(!self::forum_enable()) {
            return false;
        }
        $actualCache = cache::read(dir::forum->show(), second: timeout::forum->time());
        if($actualCache)
            return $actualCache;
        if(fdb::$error != null) {
            return fdb::$error;
        }
        $last_message = match (self::get_engine()) {
            "xenforo" => self::get_xenforo_last_thread($n),
            "ipb" => self::get_ipb_last_thread($n),
        };
        if(fdb::$error) {
            echo fdb::$messageError;
            return fdb::$error;
        }
        cache::save(dir::forum->show(), $last_message);
        return $last_message;
    }

    /**
     * @param int $n
     *
     * @return bool|array
     */
    static public function get_xenforo_last_thread(int $n = 10): bool|array {
        $query = fdb::run('SELECT
                                    xf_thread.thread_id, 
                                    xf_thread.reply_count, 
                                    xf_thread.last_post_username, 
                                    xf_post.message, 
                                    xf_post.post_date, 
                                    xf_post.username, 
                                    xf_post.post_id,
                                    xf_thread.title, 
                                    xf_thread.last_post_user_id
                                FROM
                                    xf_thread
                                    INNER JOIN
                                    xf_post
                                    ON 
                                        xf_thread.last_post_id = xf_post.post_id
                                ORDER BY
                                    xf_post.post_date DESC LIMIT ?', [$n]);
        if(fdb::$error) {
            return fdb::$messageError;
        }
        return $query->fetchAll();
    }

    static public function get_ipb_last_thread(int $n = 10): bool {
        return false;
    }

    /**
     * Создание ссылки на форум
     */
    static public function get_link($forum): string {
        return match (self::get_engine()) {
            'xenforo' => self::link_xenforo($forum),
            'ipb' => self::link_ipb($forum),
            default => 'No Link',
        };
    }

    static private function link_xenforo($forum): string {
        $thread_id = $forum['thread_id'];
        $post_id = $forum['post_id'];
        return sprintf("%s/index.php?threads/%s/#post-%s", self::get_url(), $thread_id, $post_id);
    }

    static private function link_ipb($forum): string {
        $id = $forum['id'];
        $title = $forum['title_seo'];
        return sprintf("%s/index.php?/topic/%s-%s/", self::get_url(), $id, $title);
    }

    static public function user_avatar($user_id): string {
        $image = match (self::get_engine()) {
            'xenforo' => sprintf("%s/data/avatars/m/0/%d.jpg", self::get_url(), $user_id),
            'ipb' => 'src/template/logan22/assets/images/navatar/none.jpeg',
            default => 'No Link',
        };
		if (!file_exists($image)) {
			return 'src/template/logan22/assets/images/navatar/none.jpeg';
		}
		return $image;
     }
}