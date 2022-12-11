<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 17:59:44
 */

namespace Ofey\Logan22\component\time;

class time {

    //Время формата datetime
    static public function mysql(): string {
        return date('Y-m-d H:i:s');
    }


    static public function time_diff($unixtime){
       $seconds = $unixtime-time();
       $minutes = $seconds/60;
       
    }

}