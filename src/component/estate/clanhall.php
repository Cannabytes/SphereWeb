<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.12.2022 / 3:39:08
 */

namespace Ofey\Logan22\component\estate;

class clanhall {

    static private array $clanhall = [
        21 => 'Fortress of Resistance',
        22 => 'Moonstone Hall',
        23 => 'Onyx Hall',
        24 => 'Topaz Hall',
        25 => 'Ruby Hall',
        26 => 'Crystal Hall',
        27 => 'Onyx Hall',
        28 => 'Sapphire Hall',
        29 => 'Moonstone Hall',
        30 => 'Emerald Hall',
        31 => 'The Atramental Barracks',
        32 => 'The Scarlet Barracks',
        33 => 'The Viridian Barracks',
        34 => 'Devastated Castle',
        35 => 'Bandit Stronghold',
        36 => 'The Golden Chamber',
        37 => 'The Silver Chamber',
        38 => 'The Mithril Chamber',
        39 => 'Silver Manor',
        40 => 'Gold Manor',
        41 => 'The Bronze Chamber',
        42 => 'The Golden Chamber',
        43 => 'The Silver Chamber',
        44 => 'The Mithril Chamber',
        45 => 'The Bronze Chamber',
        46 => 'Silver Manor',
        47 => 'Moonstone Hall',
        48 => 'Onyx Hall',
        49 => 'Emerald Hall',
        50 => 'Sapphire Hall',
        51 => 'Mont Chamber',
        52 => 'Astaire Chamber',
        53 => 'Aria Chamber',
        54 => 'Yiana Chamber',
        55 => 'Roien Chamber',
        56 => 'Luna Chamber',
        57 => 'Traban Chamber',
        58 => 'Eisen Hall',
        59 => 'Heavy Metal Hall',
        60 => 'Molten Ore Hall',
        61 => 'Titan Hall',
        62 => 'Rainbow Springs',
        63 => 'Beast Farm',
        64 => 'Fortress of the Dead',
    ];

    static public function get($id){
        return self::$clanhall[$id]??"-";
    }

}