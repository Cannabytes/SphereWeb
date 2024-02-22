<?php
return [
    "PLUGIN_HIDE" => false,
    "PLUGIN_ENABLE" => true,
    "PLUGIN_NAME" => "countdown",
    "PLUGIN_VERSION" => "1.0.0",
    "PLUGIN_AUTHOR" => "Logan22",
    "PLUGIN_GITHUB" => "",
    "PLUGIN_DESCRIPTION" => "Плагин обратного отсчета до старта сервера и отображение времени со старта",
    "PLUGIN_ADMIN_PAGE" => "/admin/plugin#",
    "PLUGIN_ADMIN_PAGE_NAME" => "countdown",
    "PLUGIN_ADMIN_PAGE_ICON" => "fa fa-users",

    "INCLUDES" => [
        "PLACE_IN_SPACE_HEADER_0" => "countdown_server/tpl/server_start.html",
    ],
];


