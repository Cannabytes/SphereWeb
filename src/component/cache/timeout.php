<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 17.12.2022 / 16:09:10
 */

namespace Ofey\Logan22\component\cache;

enum timeout {

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
    case statistic_player_info;
    case statistic_player_info_sub_class;
    case statistic_player_inventory_info;
    case statistic_castle;
    case statistic_block;
    case statistic_counter;

    public function time(): int {
        return match ($this) {
            timeout::forum => 60,
            timeout::server_online_status => 120,
            timeout::statistic_pvp => 60,
            timeout::statistic_pk => 60,
            timeout::statistic_online => 60,
            timeout::statistic_clan => 60,
            timeout::statistic_clan_data => 60,
            timeout::statistic_clan_skills => 60,
            timeout::statistic_clan_players => 60,
            timeout::statistic_heroes => 60,
            timeout::statistic_player_info => 60,
            timeout::statistic_player_info_sub_class => 60,
            timeout::statistic_player_inventory_info => 60,
            timeout::statistic_castle => 60,
            timeout::statistic_block => 60,
            timeout::statistic_counter => 60,
         };
    }

}
