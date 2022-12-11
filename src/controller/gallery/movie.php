<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 04.09.2022 / 10:41:28
 */

namespace Ofey\Logan22\controller\gallery;

use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class movie {

    static public function show_page() {
        $movies = \Ofey\Logan22\model\gallery\movie::get_movies();
        tpl::addVar("movies", $movies);
        tpl::addVar('server_list',  server::get_server_info());
        tpl::addVar("title", "Видео игроков");

        tpl::display("/gallery/movies.html");
    }


}