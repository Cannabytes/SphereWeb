<?php
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/coin/game",
            "file"    => "coinToGame.php",
            "call"    => function() {
                (new coinToGame\coinToGame())->show();
            },
       ],
        [
            "method"  => "POST",
            "pattern" => "/coin/game",
            "file"    => "coinToGame.php",
            "call"    => function() {
                (new coinToGame\coinToGame())->buy();
            },
        ],
];
