<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 15.12.2022 / 9:01:58
 */

/**
 * Мануал использования
 *
 *
 * ========
 * Чтоб установить указать для логина или геймсервера запрос необходимо установи аннотацию #[db('game')] или
 * #[db('game')] если не указать, запросы по-умолчанию будут для геймсервера.
 * ========
 *
 */

namespace Ofey\Logan22\component\base\source;

use Ofey\Logan22\component\base\structure;

class L2jScripts implements structure {

    static public function hash(): string {
        return 'whirlpool';
    }

    static public function chronicle(): mixed {
        return [166, 196];
    }

    static public function need_logout_player_for_item_add(): bool {
        return false;
    }

    #[db("login")]
    static public function account_is_exist(): string {
        return 'SELECT `login`, `password` FROM `accounts` WHERE login=?;';
    }

    #[db("login")]
    static public function account_registration(): string {
        return 'INSERT INTO `accounts` (`login`, `password` ) VALUES (?, ?);';
    }

    #[db("login")]
    static public function account_change_password(): string {
        return 'UPDATE `accounts` SET `password` = ? WHERE `login` = ?;';
    }

    #[db("login")]
    public static function accounts_email(): string|bool {
        return false;
    }

    #[db('game')]
    static public function statistic_top_pvp(): string {
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
                    character_subclasses.class_id AS class_id, 
                    character_subclasses.`level`, 
                    clan_data.crest AS clan_crest, 
                    ally_data.crest AS alliance_crest
                FROM
                    characters
                    INNER JOIN
                    character_subclasses
                    ON 
                        characters.obj_Id = character_subclasses.char_obj_id
                    LEFT JOIN
                    clan_data
                    ON 
                        characters.clanid = clan_data.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                WHERE
                    characters.pvpkills > 0 AND
                    character_subclasses.type = 0
                ORDER BY
                    characters.pvpkills DESC
                LIMIT 100';
    }

    #[db('game')]
    static public function statistic_top_pk(): string {
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
                    character_subclasses.class_id AS class_id, 
                    character_subclasses.`level`, 
                    clan_data.crest AS clan_crest, 
                    ally_data.crest AS alliance_crest
                FROM
                    characters
                    INNER JOIN
                    character_subclasses
                    ON 
                        characters.obj_Id = character_subclasses.char_obj_id
                    LEFT JOIN
                    clan_data
                    ON 
                        characters.clanid = clan_data.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                WHERE
                    characters.pkkills > 0 AND
                    character_subclasses.type = 0
                ORDER BY
                    characters.pkkills DESC
                LIMIT 100';
    }

    static public function statistic_top_clan(): string {
        return 'SELECT
                    clan_data.clan_id, 
                    clan_data.clan_level, 
                    clan_data.crest AS clan_crest, 
                    clan_data.reputation_score, 
                    ally_data.ally_name, 
                    clan_subpledges.`name` AS `clan_name`, 
                    characters.char_name AS player_name, 
                    characters.sex, 
                    characters.pvpkills AS pvp, 
                    characters.pkkills AS pk, 
                    characters.`online`, 
                    characters.onlinetime AS time_in_game, 
                    ally_data.crest AS alliance_crest,
                    ( SELECT COUNT(*) FROM characters WHERE clanid = clan_data.clan_id ) AS clan_count_members 
                FROM
                    clan_data
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN
                    clan_subpledges
                    ON 
                        clan_data.clan_id = clan_subpledges.clan_id
                    LEFT JOIN
                    characters
                    ON 
                        clan_subpledges.leader_id = characters.obj_Id
                        ORDER BY
                clan_count_members DESC, 
                clan_data.reputation_score DESC
                LIMIT 100';
    }

    static public function statistic_clan_data(): string {
        return 'SELECT
                    clan_data.clan_id, 
                    clan_data.clan_level, 
                    clan_data.crest AS clan_crest, 
                    clan_data.reputation_score, 
                    ally_data.crest AS alliance_crest, 
                    clanhall.id AS clanhall_id, 
                    characters.char_name AS player_name_leader_clan, 
                    clan_subpledges.leader_id, 
                    clan_subpledges.`name` AS clan_name
                FROM
                    clan_subpledges
                    LEFT JOIN
                    clan_data
                    ON 
                        clan_subpledges.clan_id = clan_data.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN
                    clanhall
                    ON 
                        clan_data.clan_id = clanhall.owner_id
                    INNER JOIN
                    characters
                    ON 
                        clan_subpledges.leader_id = characters.obj_Id
                WHERE
                    clan_subpledges.`name` = ?';
    }

    static public function statistic_clan_skills(): string {
        return 'SELECT
                        clan_skills.skill_id, 
                        clan_skills.skill_level
                    FROM
                        clan_skills
                    WHERE
                        clan_skills.clan_id = ?';
    }

    static public function statistic_clan_players(): string {
        return 'SELECT
                        characters.account_name AS account_name,
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

    static public function statistic_top_player(): string {
        return 'SELECT characters.*, clan_data.* FROM characters LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id ORDER BY onlinetime DESC LIMIT 100';
    }

    static public function statistic_top_heroes(): string {
        return 'SELECT
                    characters.char_name AS player_name, 
                    characters.pvpkills AS pvp, 
                    characters.pkkills AS pk, 
                    characters.`online`, 
                    characters.onlinetime AS time_in_game, 
                    clan_data.crest AS clan_crest, 
                    clan_subpledges.`name` AS clan_name, 
                    ally_data.crest AS alliance_crest
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
                    clan_subpledges
                    ON 
                        characters.clanid = clan_subpledges.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                ORDER BY
                    time_in_game DESC LIMIT 100';
    }

    static public function statistic_top_castle(): string {
        return 'SELECT
                    castle.id AS castle_id,
                    castle.treasury,
                    castle.siege_date AS dataSiege,
                    clan_data.clan_level,
                    clan_data.reputation_score,
                    ally_data.crest AS alliance_crest,
                    clan_subpledges.`name`,
                    characters.char_name AS player_name,
                    characters.obj_Id AS player_id,
                    characters.pvpkills AS pvp,
                    characters.pkkills AS pk,
                    characters.`online`,
                    characters.onlinetime AS time_in_game,
                    ( SELECT COUNT(*) FROM characters WHERE clanid = clan_data.clan_id ) AS clan_count_members 
                FROM
                    castle
                    LEFT JOIN clan_data ON castle.owner_id = clan_data.clan_id
                    LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN clan_subpledges ON clan_data.clan_id = clan_subpledges.clan_id
                    INNER JOIN characters ON clan_subpledges.leader_id = characters.obj_Id 
                ORDER BY
                    clan_count_members DESC,
                    clan_data.reputation_score DESC 
                    LIMIT 100';
    }

    static public function statistic_top_block(): string {
        return 'SELECT
                    characters.char_name AS player_name, 
                    characters.pvpkills AS pvp, 
                    characters.pkkills AS pk, 
                    clan_subpledges.`name` AS clan_name, 
                    clan_data.crest AS clan_crest, 
                    ally_data.crest AS alliance_crest
                FROM
                    characters
                    LEFT JOIN
                    clan_subpledges
                    ON 
                        characters.clanid = clan_subpledges.clan_id
                    LEFT JOIN
                    clan_data
                    ON 
                        characters.clanid = clan_data.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                WHERE
                    characters.accesslevel < 0 ';
    }

    static public function statistic_top_onlinetime(): string {
        return 'SELECT
	characters.obj_Id AS player_id,
	characters.char_name AS player_name,
	characters.sex,
	characters.pvpkills AS pvp,
	characters.pkkills AS pk,
	characters.`online`,
	characters.onlinetime AS time_in_game,
	clan_data.clan_level,
	clan_data.crest AS clan_crest,
	ally_data.crest AS alliance_crest,
	clan_data.reputation_score,
	clan_subpledges.`name` AS clan_name,
	character_subclasses.class_id,
	character_subclasses.`level`,
	castle.id AS castle_id 
FROM
	characters
	LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
	LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id
	LEFT JOIN clan_subpledges ON clan_data.clan_id = clan_subpledges.clan_id
	LEFT JOIN character_subclasses ON characters.obj_Id = character_subclasses.char_obj_id
	LEFT JOIN castle ON clan_data.clan_id = castle.owner_id 
WHERE
	character_subclasses.type = 0 
ORDER BY
	characters.onlinetime DESC 
	LIMIT 100;';
    }

    static public function statistic_player_info(): string {
        return 'SELECT
                    characters.obj_Id AS player_id,
                    characters.char_name AS player_name,
                    characters.sex,
                    characters.pvpkills AS pvp,
                    characters.pkkills AS pk,
                    characters.`online`,
                    characters.onlinetime AS time_in_game,
                    clan_data.clan_level,
                    clan_data.crest AS clan_crest,
                    ally_data.crest AS alliance_crest,
                    clan_data.reputation_score,
                    clan_subpledges.`name` AS clan_name,
                    character_subclasses.class_id,
                    character_subclasses.`level` 
                FROM
                    characters
                    LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
                    LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN clan_subpledges ON clan_data.clan_id = clan_subpledges.clan_id
                    LEFT JOIN character_subclasses ON characters.obj_Id = character_subclasses.char_obj_id
                WHERE
                    character_subclasses.type = 0 AND
                    characters.char_name = ?;';
    }

    static public function statistic_player_info_sub_class(): string {
        return 'SELECT
character_subclasses.class_id,
character_subclasses.`level`
FROM
character_subclasses
WHERE
character_subclasses.char_obj_id = ?';
    }

    static public function statistic_player_inventory_info(): string {
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

    static public function statistic_top_counter(): string {
        return 'SELECT
                        SUM( characters.onlinetime ) AS `count_onlinetime`,
                        SUM( characters.pvpkills ) AS `count_pvpkills`,
                        SUM( characters.pkkills ) AS `count_pkkills`,
                        ( SELECT count(*) FROM `clan_data` ) AS `count_clans`,
                        ( SELECT count(*) FROM `castle` WHERE owner_id != 0 ) AS `count_clan_has_castle`,
                        ( SELECT count(*) FROM `castle` ) AS `count_castle`,
                        ( SELECT count(*) FROM `characters` WHERE characters.ONLINE = 1 ) AS `player_online`,
                        ( SELECT count(*) FROM `characters` ) AS `player_all` 
                    FROM
                        characters;';
    }

    public static function statistic_top_class(): string {
        return 'SELECT
                    characters.char_name AS player_name,
                    characters.pvpkills AS pvp,
                    characters.pkkills AS pk,
                    clan_data.clan_level,
                    characters.`online`,
                    characters.onlinetime AS time_in_game,
                    clan_data.clan_id,
                    ally_data.crest AS alliance_crest,
                    clan_data.crest AS clan_crest,
                    clan_data.reputation_score,
                    characters.sex,
                    characters.obj_Id AS player_id,
                    character_subclasses.class_id,
                    clan_subpledges.`name` AS clan_name 
                FROM
                    character_subclasses
                    LEFT JOIN characters ON character_subclasses.char_obj_id = characters.obj_Id
                    LEFT JOIN clan_data ON characters.clanid = clan_data.clan_id
                    LEFT JOIN ally_data ON clan_data.ally_id = ally_data.ally_id
                    INNER JOIN clan_subpledges ON clan_data.clan_id = clan_subpledges.clan_id 
                WHERE
                    character_subclasses.class_id = ? AND
                    character_subclasses.type = 0 AND
                    characters.pvpkills > 0
                GROUP BY
                    characters.pvpkills 
                ORDER BY
                    characters.pvpkills DESC 
                    LIMIT 100;';
    }

    static public function is_player(): string {
        return 'SELECT `account_name` AS `login`, obj_Id as player_id, online FROM characters WHERE char_name = ? LIMIT 1';
    }

    static public function max_value_item_object(): string {
        return 'SELECT MAX(object_id) + 1 AS `max_object_id` FROM `items`';
    }

    static public function check_item_player(): string {
        return 'SELECT count, object_id, owner_id, item_id FROM items WHERE item_id = ? AND owner_id = ? LIMIT 1';
    }

    static public function update_item_count_player(): string {
        return 'UPDATE `items` SET `count` = ? WHERE `object_id` = ?';
    }

    static public function add_item(): string {
        return "INSERT INTO `items_delayed` (`owner_id`, `item_id`, `count`, `enchant_level`, `payment_status`, `description`) VALUES (?, ?, ?, ?, 1, 'SphereWeb')";
    }

    static public function count_online_player(): string {
        return 'SELECT COUNT(1) AS `count_online_player` FROM characters WHERE characters.`online` = 1';
    }

    static public function account_players(): string {
        return 'SELECT
                    characters.account_name AS account_name, 
                    characters.char_name AS player_name, 
                    characters.pvpkills AS pvp, 
                    characters.pkkills AS pk, 
                    clan_data.clan_level, 
                    characters.`online`, 
                    characters.onlinetime AS time_in_game, 
                    clan_data.clan_id, 
                    ally_data.crest AS alliance_crest, 
                    clan_data.crest AS clan_crest, 
                    clan_data.reputation_score, 
                    characters.sex, 
                    characters.obj_Id AS player_id, 
                    character_subclasses.class_id, 
                    clan_subpledges.`name` AS clan_name
                FROM
                    character_subclasses
                    LEFT JOIN
                    characters
                    ON 
                        character_subclasses.char_obj_id = characters.obj_Id
                    LEFT JOIN
                    clan_data
                    ON 
                        characters.clanid = clan_data.clan_id
                    LEFT JOIN
                    ally_data
                    ON 
                        clan_data.ally_id = ally_data.ally_id
                    LEFT JOIN
                    clan_subpledges
                    ON 
                        clan_data.clan_id = clan_subpledges.clan_id
                WHERE
                    characters.account_name = ?;';
    }
}