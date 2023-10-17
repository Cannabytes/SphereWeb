<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 03.01.2023 / 5:36:35
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;

class update_cache {

    public static function save(){
        $cache = [];
        $cache['forum'] = (int)request::setting('forum', new request_config(minValue: 30, isNumber: true));
        $cache['server_online_status'] = (int)request::setting('server_online_status', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_pvp'] = (int)request::setting('statistic_pvp', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_pk'] = (int)request::setting('statistic_pk', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_online'] = (int)request::setting('statistic_online', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_clan'] = (int)request::setting('statistic_clan', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_clan_data'] = (int)request::setting('statistic_clan_data', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_clan_skills'] = (int)request::setting('statistic_clan_skills', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_clan_players'] = (int)request::setting('statistic_clan_players', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_heroes'] = (int)request::setting('statistic_heroes', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_player_info'] = (int)request::setting('statistic_player_info', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_player_info_sub_class'] = (int)request::setting('statistic_player_info_sub_class', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_player_inventory_info'] = (int)request::setting('statistic_player_inventory_info', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_castle'] = (int)request::setting('statistic_castle', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_block'] = (int)request::setting('statistic_block', new request_config(minValue: 30, isNumber: true));
        $cache['statistic_counter'] = (int)request::setting('statistic_counter', new request_config(minValue: 30, isNumber: true));
        $cache['referral'] = (int)request::setting('referral', new request_config(minValue: 30, isNumber: true));

        $file = "<?php\n\n\$cache_timeout = " . var_export($cache, true) . ';';
        file_put_contents(fileSys::get_dir('src/config/cache.php'), $file);
        board::notice(true,  lang::get_phrase(217));
    }

}