<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 17:59:44
 */

namespace Ofey\Logan22\component\time;

class time {

    //Время формата datetime
    static public function mysql(): string {
        return date('Y-m-d H:i:s');
    }

    private static ?array $timeoutCache = null;

    /**
     * @return int[]|null
     * Время по умолчанию
     */
    public static function cache_timeout($value = null): array|int {
        if(self::$timeoutCache == null) {
            if(file_exists('src/config/cache.php')) {
                require_once('src/config/cache.php');
                self::$timeoutCache = $cache_timeout ?? self::defaultTimeout();
            } else {
                self::$timeoutCache = self::defaultTimeout();
            }
        }
        return $value === null ? self::$timeoutCache : (self::$timeoutCache[$value] ?? 60 * 10);
    }


    private static function defaultTimeout(): array {
        return [
            'forum'                           => 60,
            'server_online_status'            => 120,
            'statistic_pvp'                   => 60,
            'statistic_pk'                    => 60,
            'statistic_online'                => 60,
            'statistic_clan'                  => 60,
            'statistic_clan_data'             => 60,
            'statistic_clan_skills'           => 60,
            'statistic_clan_players'          => 60,
            'statistic_heroes'                => 60,
            'statistic_player_info'           => 60,
            'statistic_player_info_sub_class' => 60,
            'statistic_player_inventory_info' => 60,
            'statistic_castle'                => 60,
            'statistic_block'                 => 60,
            'statistic_counter'               => 60,
            'referral'                        => 60,
        ];
    }


    public static function secToHum($timeString) {
        $parts = explode(':', $timeString);
        $hours = (int)$parts[0];
        $minutes = (int)$parts[1];
        $seconds = (int)$parts[2];
        $result = '';
        if ($hours > 0) {
            $result .= $hours . ' ч.';
            $result .= ' ';
        }
        if ($minutes > 0) {
            $result .= $minutes . ' м. ';
        }
        if ($seconds > 0) {
            $result .= $seconds . ' сек.';
        }
        return trim($result == '' ? 'только что' : $result . ' назад');
    }
}