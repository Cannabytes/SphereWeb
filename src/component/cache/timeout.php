<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 17.12.2022 / 16:09:10
 */

namespace Ofey\Logan22\component\cache;

use Ofey\Logan22\component\time\time;
/*
 * При добавлении ещё кэшика, нужно не забыть добавить дефолтные значения Ofey\Logan22\component\time
 */
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
            timeout::forum => time::cache_timeout("forum"),
            timeout::server_online_status => time::cache_timeout("server_online_status"),
            timeout::statistic_pvp => time::cache_timeout("statistic_pvp"),
            timeout::statistic_pk => time::cache_timeout("statistic_pk"),
            timeout::statistic_online => time::cache_timeout("statistic_online"),
            timeout::statistic_clan => time::cache_timeout("statistic_clan"),
            timeout::statistic_clan_data => time::cache_timeout("statistic_clan_data"),
            timeout::statistic_clan_skills => time::cache_timeout("statistic_clan_skills"),
            timeout::statistic_clan_players => time::cache_timeout("statistic_clan_players"),
            timeout::statistic_heroes => time::cache_timeout("statistic_heroes"),
            timeout::statistic_player_info => time::cache_timeout("statistic_player_info"),
            timeout::statistic_player_info_sub_class => time::cache_timeout("statistic_player_info_sub_class"),
            timeout::statistic_player_inventory_info => time::cache_timeout("statistic_player_inventory_info"),
            timeout::statistic_castle => time::cache_timeout("statistic_castle"),
            timeout::statistic_block => time::cache_timeout("statistic_block"),
            timeout::statistic_counter => time::cache_timeout("statistic_counter"),
        };
    }

}
