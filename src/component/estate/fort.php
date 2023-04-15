<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.12.2022 / 3:51:50
 */

namespace Ofey\Logan22\component\estate;

class fort {

    static private array $fort = [
        '101' => 'Shanty Fortress',
        '102' => 'Southern Fortress',
        '103' => 'Hive Fortress',
        '104' => 'Valley Fortress',
        '105' => 'Ivory Fortress',
        '106' => 'Narsell Fortress',
        '107' => 'Bayou Fortress',
        '108' => 'White Sands Fortress',
        '109' => 'Borderland Fortress',
        '110' => 'Swamp Fortress',
        '111' => 'Archaic Fortress',
        '112' => 'Floran Fortress',
        '113' => 'Cloud Mountain Fortress',
        '114' => 'Tanor Fortress',
        '115' => 'Dragonspine Fortress',
        '116' => 'Antharas Fortress',
        '117' => 'Western Fortress',
        '118' => 'Hunters Fortress',
        '119' => 'Aaru Fortress',
        '120' => 'Demon Fortress',
        '121' => 'Monastic Fortress',
    ];

    static public function get($id){
        return self::$fort[$id] ?? '-';
    }

}