<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 06.01.2023 / 10:10:44
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\model\db\sql;

class patchlist {

    static public function patch_list_server($id){
        return sql::getRows("SELECT * FROM `patch_link` WHERE server_id=?", [$id]);
    }

    static public function add() {
        $server_id = request::setting("server_id", new request_config(isNumber: true));
        $link = request::setting("link", new request_config(isURL: true));
        $type = request::compare("type", [
            "client",
            "patch",
        ]);
        $lang = request::compare("lang", lang::lang_list(onlyLang: true));

        sql::run("INSERT INTO `patch_link` (`server_id`, `link`, `type`, `lang`) VALUES (?, ?, ?, ?)", [
            $server_id,
            $link,
            $type,
            $lang,
        ], true);
        board::notice(true, "Добавлено");
    }
}