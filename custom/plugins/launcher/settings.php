<?php
return [
    "PLUGIN_HIDE" => false,
    "PLUGIN_ENABLE" => true,
    "PLUGIN_NAME" => "sphere-launcher",
    "PLUGIN_VERSION" => "2.0.2",
    "PLUGIN_AUTHOR" => "Logan22",
    "PLUGIN_GITHUB" => "",
    "PLUGIN_DESCRIPTION" => "Официальный лаунчер проекта Sphere",
    "PLUGIN_ADMIN_PAGE" => "/admin/launcher",
    "PLUGIN_ADMIN_PAGE_NAME" => "Лаунчер",
    "PLUGIN_ADMIN_PAGE_ICON" => "fa fa-users",

    "PLUGIN_USER_PAGE" => "/launcher",
    "PLUGIN_USER_PAGE_NAME" => "Sphere-Launcher",
    "PLUGIN_USER_PAGE_ICON" => "fa fa-download text-danger",
    "PLUGIN_USER_PAGE_ACCESS" => ["guest", "user", "moderator", "admin"],
    "PLUGIN_USER_PANEL_SHOW" => ["MAIN_MENU"],
];
