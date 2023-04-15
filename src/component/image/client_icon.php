<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
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
        $consume_type = sql::run("SELECT `consume_type` FROM items_data WHERE item_id = ? LIMIT 1", [$item_id], true)->fetchColumn();
        if ($consume_type === "consume_type_asset" || $consume_type === "consume_type_stackable") {
            return true;
        }
        return false;
    }

}