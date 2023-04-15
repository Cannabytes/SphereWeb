<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 03.12.2022 / 7:46:05
 */

namespace Ofey\Logan22\component\time;

class microtime {

    //Время загрузки страницы на момент вызова метода
    static function pointTime(): string {
        return sprintf("%01.2f", microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']);
    }
}