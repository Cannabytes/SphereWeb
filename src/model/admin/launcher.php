<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.03.2023 / 8:57:07
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\model\db\sql;
use PDOStatement;

class launcher {

    //Возращает инфу о лаунчере
    static function get_launcher_info($server_id = null): false|array
    {
        if($server_id == null){
            return false;
        }else{
            return sql::getRows("SELECT id, l2app, args, phrase, server_id FROM launcher WHERE server_id = ?", [
                $server_id
            ]);
        }
    }

    static function add_new_launcher(string $code, string $application, string $phrasebutton, int $server_id): PDOStatement|null|bool {
        sql::sql("UPDATE `server_list` SET `launcher_accreditation_code` = ? WHERE `id` = ?", [$code, $server_id]);

        return sql::sql("INSERT INTO `launcher` (`l2app`, `phrase`, `server_id`) VALUES (?, ?, ?)", [
            $application,
            $phrasebutton,
            $server_id,
        ]);
    }
}