<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.12.2022 / 9:01:58
 */

/**
 * Мануал использования
 *
 *
 * ========
 * Чтоб установить указать для логина или геймсервера запрос необходимо установи аннотацию #[db('game')] или #[db('game')]
 * если не указать, запросы по-умолчанию будут для геймсервера.
 * ========
 *
 */


namespace Ofey\Logan22\component\base\source;

use Ofey\Logan22\component\base\structure;

class L2JOpen_HighFive implements structure {

    /**
     * @return string
     */
    static public function hash() {
        return 'sha1';
    }

    /**
     * @return mixed
     */
    static public function chronicle() {
        return [267, 268, 271, 273];
    }

    /**
     * @return mixed
     */
    static public function need_logout_player_for_item_add() {
        return true;
    }

    /**
     * @return mixed
     *
     */
    #[db("login")]
    static public function account_is_exist() {
        return 'SELECT `login`, `password` FROM `accounts` WHERE login=?;';
    }

    /**
     * @return mixed
     */
    #[db("login")]
    static public function account_registration() {
        return 'INSERT INTO `accounts` (`login`, `password`, `email` ) VALUES (?, ?, ?);';
    }

    /**
     * @return mixed
     */
    #[db("login")]
    static public function account_change_password() {
        return 'UPDATE `accounts` SET `password` = ? WHERE `login` = ?;';
    }

    /**
     * @return mixed
     */
    #[db("login")]
    static public function accounts_email() {
        return 'SELECT login, password FROM accounts WHERE email = ?';
    }

    /**
     * @return mixed
     */
    static public function account_characters() {
        return 'SELECT
                        characters.account_name as login,
                        characters.obj_Id as player_id,
                        characters.char_name as player_name,
                        characters.sex,
                        characters.x,
                        characters.y,
                        characters.z,
                        characters.pvpkills as pvp,
                        characters.pkkills as pk,
                        characters.clanid as clan_id,
                        characters.`online`,
                        characters.onlinetime AS time_in_game,
                        clan_data.clan_name,
                        clan_data.crest AS clan_crest,
                        character_subclasses.class_id as player_class_id,
                        character_subclasses.`level`,
                        ally_data.crest AS alliance_crest 
                    FROM
                        characters
                        LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
                        LEFT JOIN character_subclasses ON characters.obj_Id = character_subclasses.char_obj_id
                        LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id 
                    WHERE
                        character_subclasses.active = 1 
                        AND characters.account_name = ?';
    }

    /**
     * @return mixed
     */
    static public function is_characters_name() {
        return 'SELECT
                     characters.account_name as login,
                     characters.obj_Id as player_id,
                     characters.char_name as player_name,
                     characters.sex,
                     characters.x,
                     characters.y,
                     characters.z,
                     characters.pvpkills as pvp,
                     characters.pkkills as pk,
                     characters.clanid as clan_id,
                     characters.`online`,
                     characters.onlinetime AS time_in_game,
                     clan_data.clan_name,
                     clan_data.crest AS clan_crest,
                     character_subclasses.class_id as player_class_id,
                     character_subclasses.`level`,
                     ally_data.crest AS alliance_crest 
                   FROM
                     characters
                     LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
                     LEFT JOIN character_subclasses ON characters.obj_Id = character_subclasses.char_obj_id
                     LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id 
                   WHERE
                       characters.char_name = ?';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_pvp() {
        return 'SELECT
                        char_name as player_name,
                        pvpkills as pvp,
                        pkkills as pk,
                        clanid as clan_id,
                        onlinetime  AS time_in_game
                    FROM
                        characters 
                    ORDER BY
                        pvpkills DESC,
                        onlinetime ASC 
                        LIMIT 100';
    }

    /**
     * @return mixed
     */
    #[db('game')]
    static public function statistic_top_pvp_TRANC() {
        return 'SELECT
                        characters.obj_Id AS player_id, 
                        characters.char_name AS player_name, 
                        characters.sex, 
                        characters.x, 
                        characters.y, 
                        characters.z, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.clanid AS clan_id, 
                        characters.`online`, 
                        characters.onlinetime AS time_in_game, 
                        clan_data.clan_name, 
                        clan_data.crest AS clan_crest, 
                        character_subclasses.class_id AS player_class_id, 
                        character_subclasses.`level`, 
                        ally_data.crest AS alliance_crest
                    FROM
                        characters
                        LEFT JOIN
                        clan_data
                        ON 
                            characters.clanid = clan_data.clan_id
                        LEFT JOIN
                        character_subclasses
                        ON 
                            characters.obj_Id = character_subclasses.char_obj_id
                        LEFT JOIN
                        ally_data
                        ON 
                            clan_data.ally_id = ally_data.ally_id
                    WHERE
                        character_subclasses.active = 1
                    ORDER BY
                        pvpkills DESC
                    LIMIT 100';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_pk_TRANC() {
        return 'SELECT
                        characters.obj_Id AS player_id, 
                        characters.char_name AS player_name, 
                        characters.sex, 
                        characters.x, 
                        characters.y, 
                        characters.z, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.clanid AS clan_id, 
                        characters.`online`, 
                        characters.onlinetime AS time_in_game, 
                        clan_data.clan_name, 
                        clan_data.crest AS clan_crest, 
                        character_subclasses.class_id AS player_class_id, 
                        character_subclasses.`level`, 
                        ally_data.crest AS alliance_crest
                    FROM
                        characters
                        LEFT JOIN
                        clan_data
                        ON 
                            characters.clanid = clan_data.clan_id
                        LEFT JOIN
                        character_subclasses
                        ON 
                            characters.obj_Id = character_subclasses.char_obj_id
                        LEFT JOIN
                        ally_data
                        ON 
                            clan_data.ally_id = ally_data.ally_id
                    WHERE
                        character_subclasses.active = 1
                    ORDER BY
                        pkkills DESC
                    LIMIT 100';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_clan_TRANC() {
        return 'SELECT
                        clan_data.clan_id,
                        clan_data.hasCastle AS castle_id,
                        clan_data.reputation_score,
                        clan_data.leader_id,
                        characters.char_name AS player_name,
                        characters.pvpkills AS pvp,
                        characters.pkkills AS pk,
                        characters.`online`,
                        characters.onlinetime AS time_in_game,
                        characters.`sex`,
                        clan_data.clan_name,
                        clan_data.clan_level,
                        clan_data.crest AS clan_crest,
                        ally_data.crest AS alliance_crest,
                        ( SELECT COUNT(*) FROM characters WHERE clanid = clan_data.clan_id ) AS clan_count_members 
                    FROM
                        clan_data
                        LEFT JOIN characters ON clan_data.leader_id = characters.obj_Id
                        LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id 
                    ORDER BY
                        clan_count_members DESC,
                        clan_data.reputation_score DESC 
                        LIMIT 100';
    }

    /**
     * @return mixed
     */
    static public function statistic_clan_data() {
        return 'SELECT
                    clan_data.clan_id, 
                    clan_data.clan_name, 
                    clan_data.clan_level, 
                    clan_data.hasCastle AS castle_id, 
                    clan_data.hasFortress AS fortress_id, 
                    clan_data.hasHideout AS hideout_id, 
                    clan_data.ally_id, 
                    clan_data.leader_id, 
                    clan_data.crest as `clan_crest`, 
                    clan_data.reputation_score, 
                    characters.char_name AS `player_name_leader_clan`,
                    clanhall.id AS clanhall_id
                    FROM
                        clan_data
                        LEFT JOIN
                        characters
                        ON 
                            clan_data.leader_id = characters.obj_Id
                        LEFT JOIN
                        clanhall
                        ON 
                            clan_data.clan_id = clanhall.ownerId
                WHERE
                    clan_data.clan_name = ?';
    }

    /**
     * @return mixed
     */
    static public function statistic_clan_skills() {
        return 'SELECT
                        clan_skills.skill_id, 
                        clan_skills.skill_level
                    FROM
                        clan_skills
                    WHERE
                        clan_skills.clan_id = ?';
    }

    /**
     * @return mixed
     */
    static public function statistic_clan_players() {
        return 'SELECT
                        characters.char_name AS player_name, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.title AS player_title, 
                        characters.`online`, 
                        characters.onlinetime AS time_in_game
                    FROM
                        characters
                    WHERE
                        characters.clanid = ?';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_player_TRANC() {
        return 'SELECT characters.*, clan_data.* FROM characters LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id ORDER BY onlinetime DESC LIMIT 100';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_heroes_TRANC() {
        return 'SELECT
                        characters.char_name AS player_name, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.`online`, 
                        characters.onlinetime AS time_in_game, 
                        clan_data.clan_name, 
                        clan_data.crest AS clan_crest, 
                        ally_data.crest AS alliance_crest, 
                        character_subclasses.class_id, 
                        character_subclasses.`level`
                    FROM
                        heroes
                        LEFT JOIN
                        characters
                        ON 
                            heroes.char_id = characters.obj_Id
                        LEFT JOIN
                        clan_data
                        ON 
                            characters.clanid = clan_data.clan_id
                        LEFT JOIN
                        ally_data
                        ON 
                            clan_data.ally_id = ally_data.ally_id
                        INNER JOIN
                        character_subclasses
                        ON 
                            heroes.char_id = character_subclasses.char_obj_id
                    WHERE
                        character_subclasses.isBase = 1
                    ORDER BY
	                    characters.onlinetime DESC';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_castle_TRANC() {
        return 'SELECT
                        castle.id AS castle_id,
                        castle.`name`,
                        castle.taxPercent as tax,
                        castle.treasury,
                        castle.siegeDate as dataSiege,
                        clan_data.clan_name,
                        clan_data.clan_level,
                        clan_data.ally_id,
                        clan_data.leader_id,
                        clan_data.crest AS clan_crest,
                        clan_data.reputation_score,
                        characters.char_name AS player_name,
                        characters.pvpkills AS pvp,
                        characters.pkkills AS pk,
                        clan_data.clan_id,
                        characters.`online`,
                        characters.onlinetime AS time_in_game,
                        ally_data.crest AS alliance_crest 
                    FROM
                        castle
                        LEFT JOIN clan_data ON castle.id = clan_data.hasCastle
                        LEFT JOIN characters ON clan_data.leader_id = characters.obj_Id
                        LEFT JOIN character_subclasses ON clan_data.leader_id = character_subclasses.char_obj_id
                        LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_block_TRANC() {
        return 'SELECT
                        characters.char_name AS player_name, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.onlinetime AS time_in_game, 
                        characters.accesslevel, 
                        clan_data.clan_name, 
                        clan_data.crest, 
                        ally_data.crest
                    FROM
                        characters
                        LEFT JOIN
                        clan_data
                        ON 
                            characters.clanid = clan_data.clan_id
                        INNER JOIN
                        ally_data
                        ON 
                            clan_data.ally_id = ally_data.ally_id
                    WHERE
                        characters.accesslevel < 0;';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_onlinetime_TRANC() {
        return 'SELECT
                        characters.obj_Id AS player_id, 
                        characters.char_name AS player_name, 
                        characters.pvpkills AS pvp, 
                        characters.pkkills AS pk, 
                        characters.clanid, 
                        characters.`online`, 
                        characters.onlinetime AS time_in_game, 
                        clan_data.clan_name, 
                        clan_data.clan_level, 
                        clan_data.hasCastle AS castle_id, 
                        clan_data.crest AS clan_crest, 
                        clan_data.reputation_score AS clan_reputation_score, 
                        ally_data.crest AS alliance_crest, 
                        character_subclasses.class_id, 
                        character_subclasses.`level`
                    FROM
                        characters
                        LEFT JOIN
                        clan_data
                        ON 
                            characters.clanid = clan_data.clan_id
                        LEFT JOIN
                        ally_data
                        ON 
                            clan_data.ally_id = ally_data.ally_id
                        LEFT JOIN
                        character_subclasses
                        ON 
                            characters.obj_Id = character_subclasses.char_obj_id
                    WHERE
                        character_subclasses.isBase = 1
                    ORDER BY
                        characters.onlinetime DESC
                    LIMIT 100;';
    }

    /**
     * @return mixed
     */
    static public function statistic_player_info() {
        return 'SELECT
                    characters.obj_id AS player_id,
                    characters.char_name AS player_name,
                    characters.karma,
                    characters.pvpkills AS pvp,
                    characters.pkkills AS pk,
                    characters.createtime,
                    characters.title,
                    characters.`online`,
                    characters.onlinetime AS time_in_game,
                    character_subclasses.class_id,
                    character_subclasses.`level`,
                    character_subclasses.isBase,
                    clan_data.clan_name,
                    clan_data.crest AS clan_crest,
                    ally_data.crest AS alliance_crest 
                FROM
                    characters
                    LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
                    LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN character_subclasses ON characters.obj_Id = character_subclasses.char_obj_id 
                WHERE
                    characters.char_name = ? AND character_subclasses.isBase = 1';
    }

    static public function statistic_player_info_sub_class() {
        return 'SELECT
                        character_subclasses.class_id, 
                        character_subclasses.`level`
                    FROM
                        character_subclasses
                    WHERE
                        character_subclasses.char_obj_id = ? AND character_subclasses.isBase = 0';
    }

    static public function statistic_player_inventory_info() {
        return 'SELECT
                        items.item_id,
                        items.count,
                        items.loc,
                        items.enchant_level 
                    FROM
                        items 
                    WHERE
                        ( items.loc = "PAPERDOLL" OR items.loc = "INVENTORY" ) 
                        AND items.owner_id = ?';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_counter_TRANC() {
        return 'SELECT
                        SUM( characters.onlinetime ) AS `count_onlinetime`,
                        SUM( characters.pvpkills ) AS `count_pvpkills`,
                        SUM( characters.pkkills ) AS `count_pkkills`,
                        ( SELECT count(*) FROM `clan_data` ) AS `count_clans`,
                        ( SELECT count(*) FROM `clan_data` WHERE hasCastle != 0 ) AS `count_clan_has_castle`,
                        ( SELECT count(*) FROM `castle` ) AS `count_castle`,
                        ( SELECT count(*) FROM `characters` WHERE characters.ONLINE = 1 ) AS `player_online`,
                        ( SELECT count(*) FROM `characters` ) AS `player_all` 
                    FROM
                        characters;';
    }

    /**
     * @return mixed
     */
    static public function statistic_top_online_count_TRANC() {
        return 'SELECT * FROM characters;';
    }

    /**
     * @return mixed
     */
    static public function is_player() {
        return 'SELECT charId as player_id, online FROM characters WHERE char_name = ? LIMIT 1';
    }

    /**
     * @return mixed
     */
    static public function max_value_item_object() {
        return 'SELECT MAX(object_id) + 1 AS `max_object_id` FROM `items`';
    }

    /**
     * @return mixed
     */
    static public function check_item_player() {
        return 'SELECT count, object_id, owner_id, item_id FROM items WHERE item_id = ? AND owner_id = ? LIMIT 1';
    }

    /**
     * @return mixed
     */
    static public function update_item_count_player() {
        return 'UPDATE `items` SET `count` = ? WHERE `object_id` = ?';
    }

    /**
     * @return mixed
     */
    static public function add_item() {
        return 'INSERT INTO `items` (`owner_id`, `object_id`, `item_id`, `count`, `enchant_level`, `loc`) VALUES (?, ?, ?, ?, ?, ?)';
    }

    /**
     * @return mixed
     */
    static public function all_player_items() {
        return 'SELECT
                        items.item_id,
                        items.count,
                        items.enchant_level,
                        items.loc 
                    FROM
                        items
                        LEFT JOIN characters ON items.owner_id = characters.charId 
                    WHERE
                        characters.charId = ?';
    }

    /**
     * @return mixed
     */
    static public function player_subclasses() {
        return 'SELECT class_id, `level` FROM character_subclasses WHERE character_subclasses.charId = ?';
    }

    /**
     * @return mixed
     */
    static public function count_online_player() {
        return 'SELECT COUNT(1) AS `count_online_player` FROM characters WHERE characters.`online` = 0';
    }
}