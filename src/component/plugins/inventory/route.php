<?php
use Ofey\Logan22\component\plugins\inventory;
$routes = [
       [
            "method"  => "GET",
            "pattern" => "/inventory",
            "file"    => "inventory.php",
            "call"    => function() {
                (new inventory\inventory())->show();
            },
       ],
        [
            "method"  => "POST",
            "pattern" => "/inventory/send",
            "file"    => "inventory.php",
            "call"    => function() {
                (new inventory\inventory())->send();
            },
        ],
];
