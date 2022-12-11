<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 10.09.2022 / 17:57:14
 */

namespace Ofey\Logan22\controller\channel;

use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class channel {

    static public function all() {
        tpl::addVar('server_list', server::get_server_info());
        tpl::addVar('channel_list', \Ofey\Logan22\model\channel\channel::get_list());
        tpl::display('channel/channel.html');
    }

    public static function read($id) {
        tpl::addVar('channel', \Ofey\Logan22\model\channel\channel::get_channel_content($id));
        tpl::addVar('messages', \Ofey\Logan22\model\channel\channel::get_message($id));
        tpl::display('channel/read.html');
    }

    public static function create() {
        tpl::display('channel/create.html');
    }

    public static function writePost($channel_id = 0) {
        $content = $_POST['content'];
        $last_id_message = \Ofey\Logan22\model\channel\channel::writePost($channel_id, $content);
        header("Location: /channel/{$channel_id}");
    }
}