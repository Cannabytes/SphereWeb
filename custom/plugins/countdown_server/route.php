<?php

use countdown_server\countdown_server;

$routes = [
       [
            "method"  => "GET",
            "pattern" => "/countdown",
            "file"    => "countdown_server.php",
            "call"    => function() {
                (new countdown_server())->show();
            },
       ],
];
