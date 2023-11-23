<?php

use Ofey\Logan22\component\plugins\requestManager\requestManager;

$routes = [
       [
            "method"  => "GET",
            "pattern" => "/admin/request/manager",
            "file"    => "requestManager.php",
            "call"    => function() {
                (new requestManager())->show();
            },
       ],
       [
            "method"  => "GET",
            "pattern" => "/admin/request/manager/server/{server}",
            "file"    => "requestManager.php",
            "call"    => function($server) {
                (new requestManager())->show($server);
            },
       ],
        [
            "method"  => "POST",
            "pattern" => "/admin/request/manager/query",
            "file"    => "requestManager.php",
            "call"    => function() {
                (new requestManager())->query();
            },
        ]

];
