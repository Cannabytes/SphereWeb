<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 20.09.2022 / 11:01:02
 */

namespace Ofey\Logan22\component\image;

use Ofey\Logan22\model\db\sql;

class client_icon {

    /**
     * Возращает true если предмет стыкуемый
     * @return bool
     * @throws \Exception
     */
    static public function is_stack($item_id): bool {
        $stack = sql::run("SELECT `consume_type` FROM items_data WHERE item_id = ? LIMIT 1", [$item_id], true)->fetch();
        if($stack) {
            switch($stack['consume_type']) {
                case "consume_type_asset":
                case "consume_type_stackable" :
                {
                    return true;
                }
                case "consume_type_normal": {
                    return false;
                }
            }
        }
        return false;
    }
}