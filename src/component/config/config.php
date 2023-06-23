<?php

namespace Ofey\Logan22\component\config;

class config
{

    private static $config = null;
    private static ?string $template = null;
    private static int $timeout_statistic = 10;
    private static string $language_default = 'ru';
    public static string $key_user_pass_encrypt = "@!@*jwnsaNsZZ";
    private static bool $screen_enable = false;
    private static int $max_user_count_screenshots = 0;
    private static int $max_count_all_screenshots = 0;
    private static bool $forum_enable = false;
    /*
     * Бонусная выплата доната
     * Процент от суммы пополнения доната, который будет зачислен игроку
     */
    private static float $donation_bonus_payout = 10;
    private static bool $enable_referral = true;
    private static bool $enable_ticket = true;
    private static bool $enable_gallery = true;
    private static bool $enable_donate = true;

    public static function open(): void
    {
        require_once "src/config/configuration.php";
        self::$template = template;
        self::$timeout_statistic = timeout_statistic ?? self::$timeout_statistic;
        self::$language_default = language_default ?? self::$language_default;
        self::$screen_enable = screen_enable ?? self::$screen_enable;
        self::$max_user_count_screenshots = max_user_count_screenshots ?? self::$max_user_count_screenshots;
        self::$max_count_all_screenshots = max_count_all_screenshots ?? self::$max_count_all_screenshots;
        self::$forum_enable = forum_enable ?? self::$forum_enable;

        self::loadEnable();
    }

    //Загрузка включенных и выключенных функций
    private static function loadEnable(): void {
        require_once 'src/config/enable.php';
        self::$enable_referral = ENABLE_REFERRAL;
        self::$enable_ticket = ENABLE_TICKET;
        self::$enable_gallery = ENABLE_GALLERY;
        self::$enable_donate = ENABLE_DONATE;
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

    public static function get_max_count_all_screenshots(): int
    {
        if (self::$config == null) {
            self::open();
        }
        return self::$max_count_all_screenshots;
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

    public static function getEnableReferral(): bool
    {
        return self::$enable_referral;
    }

    public static function getEnableTicket(): bool
    {
        return self::$enable_ticket;
    }

    /**
     * @return bool
     */
    public static function getEnableGallery(): bool
    {
        return self::$enable_gallery;
    }

    /**
     * @return bool
     */
    public static function getEnableDonate(): bool
    {
        return self::$enable_donate;
    }

}