<?php
use Ofey\Logan22\component\plugins\online_statistic;
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/admin/statistic/player/online",
            "file"    => "statistic.php",
            "call"    => function() {
                (new online_statistic\statistic())->show();
            },
       ],
       [
            "method"  => "GET",
            "pattern" => "/admin/statistic/player/online/{type}",
            "file"    => "statistic.php",
            "call"    => function($type) {
                (new online_statistic\statistic())->show($type);
            },
       ],
];
