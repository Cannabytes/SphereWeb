<?php

namespace Ofey\Logan22\config;

class config
{

    private static $config = null;
    private static ?string $template = null;
    private static int $timeout_statistic = 10;
    private static string $language_default = 'ru';
    static public string $key_user_pass_encrypt = "@!@*jwnsaNsZZ";
    static private bool $screen_enable = false;
    static private int $max_user_count_screenshots = 0;
    static private int $max_count_all_screenshots = 0;
    static private bool $forum_enable = false;
    /*
     * Бонусная выплата доната
     * Процент от суммы пополнения доната, который будет зачислен игроку
     */
    static private float $donation_bonus_payout = 10;

    static public function open()
    {
        include "src/config/configuration.php";
        self::$template = template;
        self::$timeout_statistic = timeout_statistic ?? self::$timeout_statistic;
        self::$language_default = language_default ?? self::$language_default;

        self::$screen_enable = screen_enable ?? self::$screen_enable;
        self::$max_user_count_screenshots = max_user_count_screenshots ?? self::$max_user_count_screenshots;
        self::$max_count_all_screenshots = max_count_all_screenshots ?? self::$max_count_all_screenshots;
        self::$forum_enable = forum_enable ?? self::$forum_enable;
    }

    private static function check_open_config(): void
    {
        if (self::$config == null) {
            self::open();
        }
    }

    public static function get_screen_enable(): bool
    {
        if (self::$config == null) {
            self::open();
        }
        return self::$screen_enable;
    }

    public static function get_max_user_count_screenshots(): int
    {
        if (self::$config == null) {
            self::open();
        }
        return self::$max_user_count_screenshots;
    }

    public static function get_max_count_all_screenshots()
    {
        if (self::$config == null) {
            self::open();
        }
        return self::$config->max_count_all_screenshots;
    }

    public static function get_template(): string
    {
        if (self::$template === null) {
            self::check_open_config();
        }
        return self::$template;
    }

    public static function get_language_default(): string
    {
        if (self::$language_default == "") {
            self::check_open_config();
        }
        return mb_strtolower(self::$language_default);
    }

    public static function get_forum_enable(): bool
    {
        if (self::$forum_enable == "") {
            self::check_open_config();
        }
        return self::$forum_enable;
    }

    public static function set_template($template_name)
    {
        self::$template = $template_name;
    }

    public static function save_template(): bool
    {
        $file = 'src/config/configuration.php';
        $search = "/const template = '([^']+)';/";
        $replacement = self::get_template();
        $file_contents = file_get_contents($file);

        $result = preg_replace($search, "const template = '{$replacement}';", $file_contents);
        return (bool) file_put_contents($file, $result);
    }


    /**
     * @return float
     */
    public static function getDonationBonusPayout(): float
    {
        return self::$donation_bonus_payout;
    }

    /**
     * @param float $donation_bonus_payout
     */
    public static function setDonationBonusPayout(float $donation_bonus_payout): void
    {
        self::$donation_bonus_payout = $donation_bonus_payout;
    }
}