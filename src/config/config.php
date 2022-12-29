<?php

namespace Ofey\Logan22\config;

use Ofey\Logan22\model\db\sql;
use PDO;

class config {

    private static        $config                     = null;
    private static string $template                   = "";
    private static int    $timeout_statistic          = 10;
    private static string $language_default           = 'ru';
    static public string  $key_user_pass_encrypt      = "@!@*jwnsaNsZZ";
    static private bool   $screen_enable              = false;
    static private int    $max_user_count_screenshots = 0;
    static private int    $max_count_all_screenshots  = 0;
    static private bool   $forum_enable               = false;

    static public function open() {
        self::$config = sql::run('SELECT * FROM `config`')->fetch(PDO::FETCH_OBJ);
        if(self::$config == false | null) {
            //Дефолтная конфигурация будет после регистрации админа
            header("Location: /install/admin");
            exit;
        }

        self::$template = self::$config->template;
        self::$timeout_statistic = self::$config->timeout_statistic;
        self::$language_default = self::$config->language_default;

        self::$screen_enable = self::$config->screen_enable;
        self::$max_user_count_screenshots = self::$config->max_user_count_screenshots;
        self::$max_count_all_screenshots = self::$config->max_count_all_screenshots;
        self::$forum_enable = self::$config->forum_enable;
    }

    static private function check_open_config(): void {
        if(self::$config == null) {
            self::open();
        }
    }

    static public function get_screen_enable(): bool {
        if(self::$config == null) {
            self::open();
        }
        return self::$screen_enable;
    }

    static public function get_max_user_count_screenshots(): int {
        if(self::$config == null) {
            self::open();
        }
        return self::$max_user_count_screenshots;
    }

    static public function get_max_count_all_screenshots() {
        if(self::$config == null) {
            self::open();
        }
        return self::$config->max_count_all_screenshots;
    }

    static public function get_template(): string {
        if(self::$template == "") {
            self::check_open_config();
        }
        return self::$template;
    }

    static public function get_language_default(): string {
        if(self::$language_default == "") {
            self::check_open_config();
        }
        return self::$language_default;
    }

    static public function get_forum_enable(): bool {
        if(self::$forum_enable == "") {
            self::check_open_config();
        }
        return self::$forum_enable;
    }

    static public function set_template($template_name) {
        self::$template = $template_name;
    }

    static public function save_template() {
        sql::run("UPDATE `config` SET `template` = ? LIMIT 1", [self::get_template()]);
    }
}