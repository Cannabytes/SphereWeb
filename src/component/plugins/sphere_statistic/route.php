<?php
use Ofey\Logan22\component\plugins\sphere_statistic;
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/admin/statistic/registration",
            "file"    => "statistic.php",
            "call"    => function() {
                (new sphere_statistic\statistic())->show();
            },
       ],
       [
            "method"  => "GET",
            "pattern" => "/admin/statistic/world",
            "file"    => "statistic.php",
            "call"    => function() {
                (new sphere_statistic\statistic())->world();
            },
       ],
       [
            "method"  => "GET",
            "pattern" => "/admin/statistic/donate",
            "file"    => "statistic.php",
            "call"    => function() {
                (new sphere_statistic\statistic())->donate();
            },
       ],
];
