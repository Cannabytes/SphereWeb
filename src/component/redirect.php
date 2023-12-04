<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 21.09.2022 / 18:46:34
 */

namespace Ofey\Logan22\component;

use Ofey\Logan22\component\fileSys\fileSys;

class redirect {

    public static function location($url, $self = true){
        if($self){
            $url = fileSys::getSubDir() . $url;
        }
        header("Location: ". ($url));
        die();
    }

}