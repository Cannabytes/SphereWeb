<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 01.09.2022 / 18:35:12
 */

namespace Ofey\Logan22\component\chronicle;

class race_class {

    private static array $class = [
        0   => 'Human Fighter',
        1   => 'Warrior',
        2   => 'Gladiator',
        3   => 'Warlord',
        4   => 'Human Knight',
        5   => 'Paladin',
        6   => 'Dark Avenger',
        7   => 'Rogue',
        8   => 'Treasure Hunter',
        9   => 'Hawkeye',
        10  => 'Human Mystic',
        11  => 'Human Wizard',
        12  => 'Sorcerer',
        13  => 'Necromancer',
        14  => 'Warlock',
        15  => 'Cleric',
        16  => 'Bishop',
        17  => 'Prophet',
        18  => 'Elven Fighter',
        19  => 'Elven Knight',
        20  => 'Temple Knight',
        21  => 'Sword Singer',
        22  => 'Elven Scout',
        23  => 'Plains Walker',
        24  => 'Silver Ranger',
        25  => 'Elven Mystic',
        26  => 'Elven Wizard',
        27  => 'Spellsinger',
        28  => 'Elemental Summoner',
        29  => 'Elven Oracle',
        30  => 'Elven Elder',
        31  => 'Dark Fighter',
        32  => 'Palus Knight',
        33  => 'Shillien Knight',
        34  => 'Bladedancer',
        35  => 'Assassin',
        36  => 'Abyss Walker',
        37  => 'Phantom Ranger',
        38  => 'Dark Mystic',
        39  => 'Dark Wizard',
        40  => 'Spellhowler',
        41  => 'Phantom Summoner',
        42  => 'Shillien Oracle',
        43  => 'Shillien Elder',
        44  => 'Orc Fighter',
        45  => 'Orc Raider',
        46  => 'Destroyer',
        47  => 'Monk',
        48  => 'Tyrant',
        49  => 'Orc Mystic',
        50  => 'Orc Shaman',
        51  => 'Overlord',
        52  => 'Warcryer',
        53  => 'Dwarf Fighter',
        54  => 'Scavenger',
        55  => 'Bounty Hunter',
        56  => 'Artisan',
        57  => 'Warsmith',
        88  => 'Duelist',
        89  => 'Dreadnought',
        90  => 'Phoenix Knight',
        91  => 'Hell Knight',
        92  => 'Sagittarius',
        93  => 'Adventurer',
        94  => 'Archmage',
        95  => 'Soultaker',
        96  => 'Arcana Lord',
        97  => 'Cardinal',
        98  => 'Hierophant',
        99  => 'Eva\'s Templar',
        100 => 'Sword Muse',
        101 => 'Wind Rider',
        102 => 'Moonlight Sentinel',
        103 => 'Mystic Muse',
        104 => 'Elemental Master',
        105 => 'Eva\'s Saint',
        106 => 'Shillien Templar',
        107 => 'Spectral Dancer',
        108 => 'Ghost Hunter',
        109 => 'Ghost Sentinel',
        110 => 'Storm Screamer',
        111 => 'Spectral Master',
        112 => 'Shillien Saint',
        113 => 'Titan',
        114 => 'Grand Khavatari',
        115 => 'Dominator',
        116 => 'Doom Cryer',
        117 => 'Fortune Seeker',
        118 => 'Maestro',
        123 => 'Male Kamael Soldier',
        124 => 'Female Kamael Soldier',
        125 => 'Trooper',
        126 => 'Warder',
        127 => 'Berserker',
        128 => 'Male Soul Breaker',
        129 => 'Female Soul Breaker',
        130 => 'Arbalester',
        131 => 'Doombringer',
        132 => 'Male Soul Hound',
        133 => 'Female Soul Hound',
        134 => 'Trickster',
        135 => 'Inspector',
        136 => 'Judicator',
        139 => 'Sigel Knight',
        140 => 'Tyrr Warrior',
        141 => 'Othell Rogue',
        142 => 'Yul Archer',
        143 => 'Feoh Wizard',
        144 => 'Iss Enchanter',
        145 => 'Wynn Summoner',
        146 => 'Aeore Healer',
        148 => 'Sigel Phoenix Knight',
        149 => 'Sigel Hell Knight',
        150 => 'Sigel Eva\'s Templar',
        151 => 'Sigel Shillien Templar',
        152 => 'Tyrr Duelist',
        153 => 'Tyrr Dreadnought',
        154 => 'Tyrr Titan',
        155 => 'Tyrr Grand Khavatari',
        156 => 'Tyrr Maestro',
        157 => 'Tyrr Doombringer',
        158 => 'Othell Adventurer',
        159 => 'Othell Wind Rider',
        160 => 'Othell Ghost Hunter',
        161 => 'Othell Fortune Seeker',
        162 => 'Yul Sagittarius',
        163 => 'Yul Moonlight Sentinel',
        164 => 'Yul Ghost Sentinel',
        165 => 'Yul Trickster',
        166 => 'Feoh Archmage',
        167 => 'Feoh Soultaker',
        168 => 'Feoh Mystic Muse',
        169 => 'Feoh Storm Screamer',
        170 => 'Feoh Soulhounds',
        171 => 'Iss Hierophant',
        172 => 'Iss Sword Muse',
        173 => 'Iss Spectral Dancer',
        174 => 'Iss Dominator',
        175 => 'Iss Doomcryer',
        176 => 'Wynn Arcana Lord',
        177 => 'Wynn Elemental Master',
        178 => 'Wynn Spectral Master',
        179 => 'Aeore Cardinal',
        180 => 'Aeore Eva\'s Saint',
        181 => 'Aeore Shillien Saint',
        182 => 'Ertheia Fighter',
        183 => 'Ertheia Wizard',
        184 => 'Marauder',
        185 => 'Cloud Breaker',
        186 => 'Ripper',
        187 => 'Stratomancer',
        188 => 'Eviscerator',
        189 => 'Sayha\'s Seer',

        212 => 'Death Soldier',
        213 => 'Death Warrior',
        214 => 'Death Berserker',
        215 => 'Death Knight',
        216 => 'Sigel Death Knight',

    ];

    static public function get_class($class_id) {
        if(isset(self::$class[$class_id])) {
            return self::$class[$class_id];
        }
        return null;
        //        "Неизвестный класс: {$class_id}";
    }

    /**
     * @param $class_name
     *
     * @return int|null
     *
     * Возвращаем ID класса
     */
    static public function get_id_class($class_name): ?int {
        foreach(self::$class as $class_id => $_class_name) {
            if(mb_strtolower($_class_name) == mb_strtolower($class_name)) {
                return $class_id;
            }
        }
        return null;
    }

    static private array $human_id      = [
        1   => 'Warrior',
        2   => 'Gladiator',
        3   => 'Warlord',
        4   => 'Human Knight',
        5   => 'Paladin',
        6   => 'Dark Avenger',
        7   => 'Rogue',
        8   => 'Treasure Hunter',
        9   => 'Hawkeye',
        10  => 'Human Mystic',
        11  => 'Human Wizard',
        12  => 'Sorcerer',
        13  => 'Necromancer',
        14  => 'Warlock',
        15  => 'Cleric',
        16  => 'Bishop',
        17  => 'Prophet',
        88  => 'Duelist',
        89  => 'Dreadnought',
        90  => 'Phoenix Knight',
        91  => 'Hell Knight',
        92  => 'Sagittarius',
        93  => 'Adventurer',
        94  => 'Archmage',
        95  => 'Soultaker',
        96  => 'Arcana Lord',
        97  => 'Cardinal',
        98  => 'Hierophant',
        139 => 'Sigel Knight',
        152 => 'Tyrr Duelist',
        148 => 'Sigel Phoenix Knight',
        158 => 'Othell Adventurer',
        153 => 'Tyrr Dreadnought',
        149 => 'Sigel Hell Knight',
        141 => 'Othell Rogue',
        162 => 'Yul Sagittarius',
        166 => 'Feoh Archmage',
        176 => 'Wynn Arcana Lord',
        143 => 'Feoh Wizard',
        179 => 'Aeore Cardinal',
        167 => 'Feoh Soultaker',
        171 => 'Iss Hierophant',

        212 => 'Death Soldier',
        213 => 'Death Warrior',
        214 => 'Death Berserker',
        215 => 'Death Knight',
        216 => 'Sigel Death Knight',
    ];
    static private array $elven_id      = [
        18  => 'Elven Fighter',
        19  => 'Elven Knight',
        20  => 'Temple Knight',
        21  => 'Sword Singer',
        22  => 'Elven Scout',
        23  => 'Plains Walker',
        24  => 'Silver Ranger',
        25  => 'Elven Mystic',
        26  => 'Elven Wizard',
        27  => 'Spellsinger',
        28  => 'Elemental Summoner',
        29  => 'Elven Oracle',
        30  => 'Elven Elder',
        99  => 'Eva\'s Templar',
        100 => 'Sword Muse',
        101 => 'Wind Rider',
        102 => 'Moonlight Sentinel',
        103 => 'Mystic Muse',
        104 => 'Elemental Master',
        105 => 'Eva\'s Saint',
        150 => 'Sigel Eva\'s Templar',
        172 => 'Iss Sword Muse',
        159 => 'Othell Wind Rider',
        163 => 'Yul Moonlight Sentinel',
        168 => 'Feoh Mystic Muse',
        177 => 'Wynn Elemental Master',
        180 => 'Aeore Eva\'s Saint',
        146 => 'Aeore Healer',
    ];
    static private array $dark_elven_id = [
        31  => 'Dark Fighter',
        32  => 'Palus Knight',
        33  => 'Shillien Knight',
        34  => 'Bladedancer',
        35  => 'Assassin',
        36  => 'Abyss Walker',
        37  => 'Phantom Ranger',
        38  => 'Dark Mystic',
        39  => 'Dark Wizard',
        40  => 'Spellhowler',
        41  => 'Phantom Summoner',
        42  => 'Shillien Oracle',
        43  => 'Shillien Elder',
        106 => 'Shillien Templar',
        107 => 'Spectral Dancer',
        108 => 'Ghost Hunter',
        109 => 'Ghost Sentinel',
        110 => 'Storm Screamer',
        111 => 'Spectral Master',
        112 => 'Shillien Saint',
        141 => 'Othell Rogue',
        142 => 'Yul Archer',
        151 => 'Sigel Shillien Templar',
        160 => 'Othell Ghost Hunter',
        173 => 'Iss Spectral Dancer',
        164 => 'Yul Ghost Sentinel',
        169 => 'Feoh Storm Screamer',
        178 => 'Wynn Spectral Master',
        181 => 'Aeore Shillien Saint',
        145 => 'Wynn Summoner',
    ];
    static private array $orc_id        = [
        44  => 'Orc Fighter',
        45  => 'Orc Raider',
        46  => 'Destroyer',
        47  => 'Monk',
        48  => 'Tyrant',
        49  => 'Orc Mystic',
        50  => 'Orc Shaman',
        51  => 'Overlord',
        52  => 'Warcryer',
        113 => 'Titan',
        114 => 'Grand Khavatari',
        115 => 'Dominator',
        116 => 'Doom Cryer',
        140 => 'Tyrr Warrior',
        154 => 'Tyrr Titan',
        155 => 'Tyrr Grand Khavatari',
        174 => 'Iss Dominator',
        175 => 'Iss Doomcryer',
        144 => 'Iss Enchanter',
    ];
    static private array $dwarf_id      = [
        53  => 'Dwarf Fighter',
        54  => 'Scavenger',
        55  => 'Bounty Hunter',
        56  => 'Artisan',
        57  => 'Warsmith',
        117 => 'Fortune Seeker',
        118 => 'Maestro',
        161 => 'Othell Fortune Seeker',
        156 => 'Tyrr Maestro',
    ];
    static private array $kamael_id     = [
        123 => 'Male Kamael Soldier',
        124 => 'Female Kamael Soldier',
        125 => 'Trooper',
        126 => 'Warder',
        127 => 'Berserker',
        128 => 'Male Soul Breaker',
        129 => 'Female Soul Breaker',
        130 => 'Arbalester',
        131 => 'Doombringer',
        132 => 'Male Soul Hound',
        133 => 'Female Soul Hound',
        134 => 'Trickster',
        135 => 'Inspector',
        136 => 'Judicator',
        157 => 'Tyrr Doombringer',
        165 => 'Yul Trickster',
        170 => 'Feoh Soulhounds',
    ];
    static private array $ertheia_id    = [
        182 => 'Ertheia Fighter',
        183 => 'Ertheia Wizard',
        184 => 'Marauder',
        185 => 'Cloud Breaker',
        186 => 'Ripper',
        187 => 'Stratomancer',
        188 => 'Eviscerator',
        189 => 'Sayha\'s Seer',
    ];

    //Раса по классу
    static public function get_class_race($class_id): string {
        if(array_key_exists($class_id, self::$human_id)) {
            return 'human';
        }
        if(array_key_exists($class_id, self::$elven_id)) {
            return 'elf';
        }
        if(array_key_exists($class_id, self::$dark_elven_id)) {
            return 'darkelf';
        }
        if(array_key_exists($class_id, self::$orc_id)) {
            return 'orc';
        }
        if(array_key_exists($class_id, self::$dwarf_id)) {
            return 'dwarf';
        }
        if(array_key_exists($class_id, self::$kamael_id)) {
            return 'kamael';
        }
        if(array_key_exists($class_id, self::$ertheia_id)) {
            return 'ertheia';
        }
        return 'none';
    }
}