<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.12.2022 / 3:59:24
 */

namespace Ofey\Logan22\component\estate;

class castle {

    static private array $castle = [
        '1' => 'Gludio',
        '2' => 'Dion',
        '3' => 'Giran',
        '4' => 'Oren',
        '5' => 'Aden',
        '6' => 'Innadril',
        '7' => 'Goddard',
        '8' => 'Rune',
        '9' => 'Schuttgart',
    ];

    static public function get($id) {
        return self::$castle[$id] ?? '-';
    }
}