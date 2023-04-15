<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 23.11.2022 / 4:27:06
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;

class forum {

    static public function save() {
        $enabled = isset($_POST['forum_enable']);
        sql::run('UPDATE `config` SET `forum_enable` = ? LIMIT 1', [(int)$enabled]);

        $engine = $_POST['forum_engine'];
        $url = $_POST['forum_url'];
        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            board::notice(false, lang::get_phrase(138));
        }

        $forum_db_host = $_POST['forum_db_host'];
        $forum_db_user = $_POST['forum_db_user'];
        $forum_db_password = $_POST['forum_db_password'];
        $forum_db_name = $_POST['forum_db_name'];

        $ok = self::saveToFile($forum_db_host, $forum_db_user, $forum_db_password, $forum_db_name, $engine, $url);
        if($ok){
            board::notice(true, lang::get_phrase(139));
        }
    }

    static private function saveToFile($host, $user, $password, $name, $engine, $url) {
        $txt = "<?php
const FORUM_HOST = '{$host}';
const FORUM_USER = '{$user}';
const FORUM_PASSWORD = '{$password}';
const FORUM_NAME = '{$name}';
const FORUM_CHARSET = 'utf8';
const FORUM_ENGINE = '{$engine}';
const FORUM_URL = '{$url}';";
        return file_put_contents('src/config/forum.php', $txt);
    }
}