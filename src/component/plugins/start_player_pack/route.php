<?php
use Ofey\Logan22\component\plugins\start_player_pack;
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/startpack",
            "file"    => "start_player_pack.php",
            "call"    => function() {
                (new start_player_pack\start_player_pack())->show();
            },
       ],
        [
            "method"  => "POST",
            "pattern" => "/startpack/buy",
            "file"    => "start_player_pack.php",
            "call"    => function() {
                (new start_player_pack\start_player_pack())->buy();
            },
        ],
];
