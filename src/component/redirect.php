<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 21.09.2022 / 18:46:34
 */

namespace Ofey\Logan22\component;

class redirect {

    static public function location($url){
        header("Location: $url");
        die();
    }

}