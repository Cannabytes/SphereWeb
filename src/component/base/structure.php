<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 15.12.2022 / 9:20:25
 */

namespace Ofey\Logan22\component\base;

interface structure {

    /**
     * Алгоритм хэширования паролей игровых аккаунтов
     *
     * @return string
     */
    public static function hash(): string;

    /**
     * TODO: Пока не используется, возможно будет удалено
     * Возращает массив с протоколами версий игры
     *
     * @return mixed
     */
    public static function chronicle(): mixed;

    /**
     * На некоторых сборка есть таблица items_delayed, используется для выдачи игрокам предмета, которые в онлайне.
     * Если в функции add_item() используется выдача в таблицу items_delayed тогда выставляйте true
     * Если необходимо для выдачи предмета пользователю чтоб он был в оффлайне, выставите false
     *
     * @return mixed
     */
    public static function need_logout_player_for_item_add(): bool;

    /**
     * Проверка существования игрового аккаунта
     *
     * @return mixed
     *
     */
    public static function account_is_exist(): string;

    /**
     * Добавление в БД сервера нового аккаунта
     *
     * @return mixed
     */
    public static function account_registration(): string;

    /**
     * Смена пароля аккаунта
     *
     * @return mixed
     */
    public static function account_change_password(): string;

    //TODO:Deprecated
    /**
     * Найти аккаунт по почте
     * Используется для синхронизации внутреннего реестра зарегистрированных аккаунтов и с реестром аккаунтов сервера.
     *
     * @return mixed
     */
    public static function accounts_email(): string|bool;

    /**
     * Статистика PvP
     *
     * @return mixed
     */
    public static function statistic_top_pvp(): string;

    /**
     * Статистика PK
     *
     * @return mixed
     */
    public static function statistic_top_pk(): string;

    /**
     * Статистика Кланов
     *
     * @return mixed
     */
    public static function statistic_top_clan(): string;

    /**
     * Информация о клане
     *
     * @return mixed
     */
    public static function statistic_clan_data(): string;

    /**
     * Скиллы клана
     *
     * @return mixed
     */
    public static function statistic_clan_skills(): string;

    /**
     * Игроки клана
     *
     * @return mixed
     */
    public static function statistic_clan_players(): string;

    /**
     * ТОП игроков
     *
     * @return mixed
     */
    public static function statistic_top_player(): string;

    /**
     * ТОП героев
     *
     * @return mixed
     */
    public static function statistic_top_heroes(): string;

    /**
     * Данные о замках
     *
     * @return mixed
     */
    public static function statistic_top_castle(): string;

    /**
     * Данные о заблокированных пользователях
     *
     * @return mixed
     */
    public static function statistic_top_block(): string;

    /**
     * Статистика топ онлайна игроков
     *
     * @return mixed
     */
    public static function statistic_top_onlinetime(): string;

    /**
     * Данные о персонаже
     *
     * @return mixed
     */
    public static function statistic_player_info(): string;

    /**
     * Саб классы игрока
     *
     * @return string
     */
    public static function statistic_player_info_sub_class(): string;

    /**
     * Инвентарь игрока
     *
     * @return string
     */
    public static function statistic_player_inventory_info(): string;

    /**
     * Числовые данные статистики
     *
     * @return mixed
     */
    public static function statistic_top_counter(): string;

    /**
     * ТОП персонажей N класса
     *
     * @return string
     */
    public static function statistic_top_class(): string;

    /**
     * Получение ID персонажа
     *
     * @return mixed
     */
    public static function is_player(): string;

    /**
     * Возращает последний ID объекта таблицы items
     *
     * @return mixed
     */
    public static function max_value_item_object(): string;

    /**
     * Проверка существования у игрока предмета
     * Используется при выдачи, добавить игроку предмет (записью в БД) или если предмет имеется
     * тогда увеличить count предмета
     *
     * @return mixed
     */
    public static function check_item_player(): string;

    /**
     * Изменение кол-во предмета по ID объекту
     *
     * @return mixed
     */
    public static function update_item_count_player(): string;

    /**
     * Добавление предмета
     *
     * @return mixed
     */
    public static function add_item(): string;

    /**
     * @return mixed
     */
    public static function count_online_player(): string;

    public static function account_players(): string;
}