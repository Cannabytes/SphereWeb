<?php
use Ofey\Logan22\component\plugins\api_chat_receiver;

$routes = [
       [
            "method"  => "POST",
            "pattern" => "/api/chat/new/message",
            "file"    => "api_chat.php",
            "call"    => function() {
                (new api_chat_receiver\api_chat())->add_new_message();
            },
       ],
];
