<?php
use Ofey\Logan22\component\plugins\roulette_draw;
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/fun/roulette",
            "file"    => "rouletteDraw.php",
            "call"    => function() {
                (new roulette_draw\rouletteDraw())->show_roulette_draw();
            },
       ],

       [
            "method"  => "POST",
            "pattern" => "/fun/roulette",
            "file"    => "rouletteDraw.php",
            "call"    => function() {
                (new roulette_draw\rouletteDraw())->start_roulette_draw();
            },
        ],


];
