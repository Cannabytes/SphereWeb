<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 13.09.2022 / 12:15:07
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\config\config;

class template {

    static public function save(){
        $template = $_POST['template'];
        config::set_template($template);
        config::save_template();
        board::notice(true, lang::get_phrase(147, $template));
    }

}