<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 18:14:01
 */

namespace Ofey\Logan22\controller\account\comparison;

use Ofey\Logan22\model\admin\validation;

class comparison {

    public static function call($server_id){
        validation::user_protection();
        \Ofey\Logan22\model\user\player\comparison::start($server_id);
        header('Location: /main');
        die();
    }

}