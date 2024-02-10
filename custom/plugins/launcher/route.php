<?php

use Ofey\Logan22\component\plugins\launcher;

$routes = [
       [
            "method"  => "GET",
            "pattern" => "/launcher",
            "file"    => "launcher.php",
            "call"    => function() {
                (new \launcher\launcher())->show();
            },
       ],
    [
        "method" => "GET",
        "pattern" => "/launcher/{id}",
        "file" => "launcher.php",
        "call" => function ($id) {
            (new \launcher\launcher())->show($id);
        },
    ],
    [
        "method" => "GET",
        "pattern" => "/admin/launcher/add",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->add();
        }
    ],
    [
        "method" => "POST",
        "pattern" => "/admin/launcher/add",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->saveConfig();
        }
    ],
    [
        "method" => "GET",
        "pattern" => "/admin/launcher",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->desc();
        }
    ],
    [
        "method" => "GET",
        "pattern" => "/admin/launcher/edit/{id}",
        "file" => "launcher.php",
        "call" => function($id){
            (new \launcher\launcher())->edit($id);
        }
    ],
    [
        "method" => "POST",
        "pattern" => "/admin/launcher/edit",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->editSave();
        }
    ],
    [
        "method" => "POST",
        "pattern" => "/admin/launcher/set/server/default",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->setServerDefault();
        }
    ],
    [
        "method" => "POST",
        "pattern" => "/admin/launcher/remove",
        "file" => "launcher.php",
        "call" => function(){
            (new \launcher\launcher())->removeLauncher();
        }
    ],

    [
        "method" => "GET",
        "pattern" => "/admin/launcher/create/patch",
        "file" => "launcher.php",
        "call" => function () {
            (new \launcher\launcher())->admin();
        },
    ]

];
