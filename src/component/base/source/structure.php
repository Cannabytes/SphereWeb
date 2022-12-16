<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.12.2022 / 9:20:25
 */

namespace Ofey\Logan22\component\base\source;

interface structure {

    static public function hash();

    static public function chronicle();

    static public function need_logout_player_for_item_add();

    static public function account_is_exist();

    static public function account_registration();

    static public function account_change_password();

    static public function accounts_email();

    static public function account_characters();

    static public function is_characters_name();

    static public function statistic_top_pvp();

    static public function statistic_top_pvp_TRANC();

    static public function statistic_top_pk_TRANC();

    static public function statistic_top_clan_TRANC();

    static public function statistic_clan_data();

    static public function statistic_clan_skills();

    static public function statistic_clan_players();

    static public function statistic_top_player_TRANC();

    static public function statistic_top_heroes_TRANC();

    static public function statistic_top_castle_TRANC();

    static public function statistic_top_block_TRANC();

    static public function statistic_top_onlinetime_TRANC();

    static public function statistic_player_info();

    static public function statistic_player_info_sub_class();
    static public function statistic_player_inventory_info();

    static public function statistic_top_counter_TRANC();

    static public function statistic_top_online_count_TRANC();

    static public function is_player();

    static public function max_value_item_object();

    static public function check_item_player();

    static public function update_item_count_player();

    static public function add_item();

    static public function all_player_items();

    static public function player_subclasses();

    static public function count_online_player();
}