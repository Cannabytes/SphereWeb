<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 02.12.2022 / 21:48:58
 */

namespace Ofey\Logan22\controller\page;

use Ofey\Logan22\template\tpl;

class error {

    static public function show($e){
        tpl::addVar('message', $e->getMessage());
        tpl::display("/error/404.html");
    }

    static public function error404(){
        tpl::addVar('message', 'Страница не найдена');
        tpl::display("/error/404.html");
    }

}