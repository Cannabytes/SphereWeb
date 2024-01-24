<?php

return [
    'server' => [
        15 => [
            "chronicle" => "Interlude",
            "name" => "MyGame",
            "application" => [
                [
                    "l2exe" => "/system/l2.exe",
                    "args" => "AutoLoginEnable=1 Login=%login% Pass=%pass% Server=Infinity x20 CharName=%player% SecPass=",
                    "background" => "src/component/plugins/launcher/tpl/img/l2_button.jpg",
                    "name" => [
                        "ru" => "Запустить игру",
                        "en" => "Launch game",
                    ],
                    "description" => [
                        "ru" => "Нажмите для запуска игры",
                        "en" => "Click for start game",
                    ],
                ],
            ],
            "show_accounts" => false,
            "tokenApi" => 'SUd/heYV4KFXODPBzRACXWejXRlb1UCxPntuK5gKojuZKWXdzgQmTgf0F2es4RgRBB0jv+N0Batb9rTYkB71dYMIDHRF1zc+d2qIhC6MooeYxsZoUQGRzUnBmAwYRPcxADtE93E9dOiwZOO9XT3ZQbBj2/9NjKp8r2mMynZsT5E='
        ],
    ],
];