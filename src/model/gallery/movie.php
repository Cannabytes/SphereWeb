<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 04.09.2022 / 10:33:11
 */

namespace Ofey\Logan22\model\gallery;

use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\template\tpl;

class movie {

    static public function get_movies(){
        return sql::run("SELECT * FROM `gallery_movies`")->fetchAll();
    }

}