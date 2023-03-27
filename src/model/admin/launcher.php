<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.03.2023 / 8:57:07
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\model\db\sql;
use PDOStatement;

class launcher {

    //Возращает инфу о лаунчере
    static function get_launcher_info($server_id = null) {
        if($server_id == null){
            return false;
        }else{
            return sql::getRow("SELECT id, clientdir, patchlist, l2app, phrasebutton, server_id FROM launcher WHERE server_id = ? LIMIT 1", [
                $server_id
            ]);
        }
    }

    static function add_new_launcher(string $clientDir, string $patchlist, string $application, string $phrasebutton, int $server_id): PDOStatement|null|bool {
        return sql::sql("INSERT INTO `launcher` (`clientdir`, `patchlist`, `l2app`, `phrasebutton`, `server_id`) VALUES (?, ?, ?, ?, ?)", [
            $clientDir,
            $patchlist,
            $application,
            $phrasebutton,
            $server_id,
        ]);
    }
}