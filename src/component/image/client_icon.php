<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 20.09.2022 / 11:01:02
 */

namespace Ofey\Logan22\component\image;

use Ofey\Logan22\model\db\sql;

class client_icon {

    static public function get_image_item_id($item_id){
        $image = sql::run("SELECT image FROM items_name WHERE id = ? LIMIT 1", [$item_id])->fetch();
        if($image == false){
            return ['name'=>"NULL", 'image' => 'notFind'];
        }
        return $image;
    }

}