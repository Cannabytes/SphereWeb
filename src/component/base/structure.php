<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 15.12.2022 / 9:20:25
 */

namespace Ofey\Logan22\component\base;

interface structure {

    /**
     * Алгоритм хэширования паролей игровых аккаунтов
     *
     * @return string
     */
    static public function hash(): string;

    /**
     * TODO: Пока не используется, возможно будет удалено
     * Протоколы версий игры
     *
     * @return mixed
     */
    static public function chronicle(): mixed;

    /**
     * На некоторых сборка есть таблица items_delayed, используется для выдачи игрокам предмета, которые в онлайне.
     * Если в функции add_item() используется выдача в таблицу items_delayed тогда выставляйте true
     * Если необходимо для выдачи предмета пользователю чтоб он был в оффлайне, выставите false
     *
     * @return mixed
     */
    static public function need_logout_player_for_item_add(): bool;

    /**
     * Проверка существования игрового аккаунта
     *
     * @return mixed
     *
     */
    static public function account_is_exist(): string;

    /**
     * Добавление в БД сервера нового аккаунта
     *
     * @return mixed
     */
    static public function account_registration(): string;

    /**
     * Смена пароля аккаунта
     *
     * @return mixed
     */
    static public function account_change_password(): string;

    /**
     * Найти аккаунт по почте
     * Используется для синхронизации внутреннего реестра зарегистрированных аккаунтов и с реестром аккаунтов сервера.
     *
     * @return mixed
     */
    static public function accounts_email(): string;

    /**
     * Статистика PvP
     *
     * @return mixed
     */
    static public function statistic_top_pvp(): string;

    /**
     * Статистика PK
     *
     * @return mixed
     */
    static public function statistic_top_pk(): string;

    /**
     * Статистика Кланов
     *
     * @return mixed
     */
    static public function statistic_top_clan(): string;

    /**
     * Информация о клане
     *
     * @return mixed
     */
    static public function statistic_clan_data(): string;

    /**
     * Скиллы клана
     *
     * @return mixed
     */
    static public function statistic_clan_skills(): string;

    /**
     * Игроки клана
     *
     * @return mixed
     */
    static public function statistic_clan_players(): string;

    /**
     * ТОП игроков
     *
     * @return mixed
     */
    static public function statistic_top_player(): string;

    /**
     * ТОП героев
     *
     * @return mixed
     */
    static public function statistic_top_heroes(): string;

    /**
     * Данные о замках
     *
     * @return mixed
     */
    static public function statistic_top_castle(): string;

    /**
     * Данные о заблокированных пользователях
     *
     * @return mixed
     */
    static public function statistic_top_block(): string;

    /**
     * Статистика топ онлайна игроков
     *
     * @return mixed
     */
    static public function statistic_top_onlinetime(): string;

    /**
     * Данные о персонаже
     *
     * @return mixed
     */
    static public function statistic_player_info(): string;

    /**
     * Саб классы игрока
     *
     * @return string
     */
    static public function statistic_player_info_sub_class(): string;

    /**
     * Инвентарь игрока
     *
     * @return string
     */
    static public function statistic_player_inventory_info(): string;

    /**
     * Числовые данные статистики
     *
     * @return mixed
     */
    static public function statistic_top_counter(): string;

    /**
     * ТОП персонажей N класса
     *
     * @return string
     */
    static public function statistic_top_class(): string;

    /**
     * Получение ID персонажа
     *
     * @return mixed
     */
    static public function is_player(): string;

    /**
     * Возращает последний ID объекта таблицы items
     *
     * @return mixed
     */
    static public function max_value_item_object(): string;

    /**
     * Проверка существования у игрока предмета
     * Используется при выдачи, добавить игроку предмет (записью в БД) или если предмет имеется
     * тогда увеличить count предмета
     *
     * @return mixed
     */
    static public function check_item_player(): string;

    /**
     * Изменение кол-во предмета по ID объекту
     *
     * @return mixed
     */
    static public function update_item_count_player(): string;

    /**
     * Добавление предмета
     *
     * @return mixed
     */
    static public function add_item(): string;

    /**
     * @return mixed
     */
    static public function count_online_player(): string;
}