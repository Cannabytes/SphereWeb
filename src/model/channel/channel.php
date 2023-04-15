<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 10.09.2022 / 17:59:07
 */

namespace Ofey\Logan22\model\channel;

use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class channel {

    static public function get_list() {
        return sql::run("SELECT
	channels.id, 
	channels.user_id AS author_id, 
	channels.`name`, 
	users.`name` as `author_name`,
	(SELECT channels_message.id FROM channels_message WHERE channels_message.channel_id = channels.id ORDER BY id DESC LIMIT 1) AS last_message_id, 
	(SELECT channels_message.content FROM channels_message WHERE channels_message.channel_id = channels.id ORDER BY id DESC LIMIT 1) AS last_message, 
	(SELECT channels_message.user_id FROM channels_message WHERE channels_message.channel_id = channels.id ORDER BY id DESC LIMIT 1) AS last_message_user_id, 
	(SELECT users.`name` FROM channels_message LEFT JOIN users ON last_message_user_id = users.id LIMIT 1) AS last_message_user_name 
FROM
	channels
	LEFT JOIN
	users
	ON 
		users.id = channels.user_id
ORDER BY
	channels.id DESC LIMIT 100")->fetchAll();
    }

    static public function get_channel_content($channel_id) {
        return sql::run('SELECT id,user_id,name,date_create,date_update FROM `channels` WHERE id=? LIMIT 1', [$channel_id])->fetch();
    }

    static public function get_message($channel_id): bool|array {
        return sql::run("SELECT
	channels_message.id, 
	channels_message.channel_id, 
	channels_message.user_id, 
	channels_message.content, 
	channels_message.date_create, 
	channels_message.date_update, 
	users.`name`, 
	users.access_level
FROM
	channels_message
	LEFT JOIN
	users
	ON 
		channels_message.user_id = users.id
WHERE
	channels_message.channel_id = ?
ORDER BY
	channels_message.id ASC;", [$channel_id])->fetchAll();
    }

    static public function writePost($channel_id, $content): string {
        sql::run("INSERT INTO `channels_message` (`channel_id`, `user_id`, `content`) VALUES (?, ?, ?)", [
                $channel_id,
                auth::get_id(),
                $content,
            ]);
        return sql::lastInsertId();
    }
}