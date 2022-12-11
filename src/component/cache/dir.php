<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 16.09.2022 / 22:32:05
 */

namespace Ofey\Logan22\component\cache;

enum dir {

    case forum;
    case server_online_status;
    case statistic_pvp;
    case statistic_pk;
    case statistic_online;
    case statistic_clan;
    case statistic_clan_data;
    case statistic_clan_skills;
    case statistic_clan_players;
    case statistic_heroes;
    case statistic_castle;
    case statistic_block;
    case statistic_counter;

    /**
     * Для статических адресов
     * @return string
     */
    public function show(): string {
        return match ($this) {
            dir::forum => 'uploads/cache/forum/',
            dir::server_online_status => 'uploads/cache/status',
        };
    }

    /**
     * Для динамических адресов
     * @param int $server_id
     *
     * @return string
     */
    public function show_dynamic(int $server_id, string $name = null): string {
        return match ($this) {
            dir::statistic_pvp => "uploads/cache/statistic/{$server_id}/pvp",
            dir::statistic_pk => "uploads/cache/statistic/{$server_id}/pk",
            dir::statistic_online => "uploads/cache/statistic/{$server_id}/online",
            dir::statistic_clan => "uploads/cache/statistic/{$server_id}/clan",
            dir::statistic_heroes => "uploads/cache/statistic/{$server_id}/heroes",
            dir::statistic_castle => "uploads/cache/statistic/{$server_id}/castle",
            dir::statistic_block => "uploads/cache/statistic/{$server_id}/block",
            dir::statistic_counter => "uploads/cache/statistic/{$server_id}/counter",
            dir::statistic_clan_data => "uploads/cache/statistic/{$server_id}/clan_data/{$name}",
            dir::statistic_clan_skills => "uploads/cache/statistic/{$server_id}/clan_skills/{$name}",
            dir::statistic_clan_players => "uploads/cache/statistic/{$server_id}/clan_players/{$name}",
        };
    }
}