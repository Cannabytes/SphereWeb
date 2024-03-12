<?php
//Минимальное время игры - 3 часа
const GAME_TIME = 3600*3;
//Минимальный уровень
const LEVEL = 80;
const PVP = 1;
const PK = 1;
//Сколько донат бонусов давать
const DONATE_BONUS_AMOUNT = 20;

// Если человек завлек игроков, которые зарегистрировались по его реферальной ссылке.
// Давать ли Sphere-Coin лидеру, если пришлашенный им пользователь пополняет себе баланс?
const REFERRAL_LEADER_BONUS_ENABLE = true;
// Какой процент с пополнения Sphere-Coin давать лидеру реферала
const REFERRAL_LEADER_BONUS_VALUE = 10;