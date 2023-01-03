<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 03.01.2023 / 5:36:35
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;

class update_cache {

    static public function save(){
        request::setting('forum', new request_config(minValue: 30, isNumber: true));
        request::setting('server_online_status', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_pvp', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_pk', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_online', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_clan', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_clan_data', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_clan_skills', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_clan_players', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_heroes', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_player_info', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_player_info_sub_class', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_player_inventory_info', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_castle', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_block', new request_config(minValue: 30, isNumber: true));
        request::setting('statistic_counter', new request_config(minValue: 30, isNumber: true));

        $file = "<?php\n\n\$cache_timeout = " . var_export($_POST, true) . ';';
        file_put_contents('src/config/cache.php', $file);
        board::notice(true,  lang::get_phrase(217));
    }

}