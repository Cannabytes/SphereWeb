<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 17.08.2022 / 17:11:26
 */

namespace Ofey\Logan22\component\chronicle;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\model\admin\validation;

class client {

    static public function get_base_collection_class(): void {
        validation::user_protection("admin");
        $chronicle_name = trim($_POST['chronicle_name']);
        $protocols = self::get_protocol($chronicle_name);
        if(!$protocols)
            board::notice(false, "Not find client");
        $all_class_base_data = base::all_class_base_data();
        $collection = [];
        foreach($all_class_base_data as $class) {
            $chronicle_protocols = ($class)::chronicle();
            $diff = array_intersect($protocols, $chronicle_protocols);
            if($diff) {
                $collection[] = $class;
            }
        }
        board::alert([
            'ok'          => true,
            'collections' => $collection,
        ]);
        board::notice(false, "Not find class");
    }

    static public function get_protocol($chronicle_name) {
        $client = array_search($chronicle_name, array_column(self::all(), 'name'));
        return $client !== false ? self::all()[$client]['protocol'] : null;
    }


    static public function all() {
        return [
            [
                'protocol' => [377],
                'name'     => "Prelude",
            ],
            [
                'protocol' => [419],
                'name'     => "Harbingers of War",
            ],
            [
                'protocol' => [478],
                'name'     => "Age of Splendor",
            ],
            [
                'protocol' => [530],
                'name'     => "Rise of Darkness",
            ],
            [
                'protocol' => [656],
                'name'     => "Scions of Destiny",
            ],
            [
                'protocol' => [693],
                'name'     => "Oath of Blood",
            ],
            [
                'protocol' => [
                    737,
                    740,
                    744,
                    746,
                ],
                'name'     => "Interlude",
            ],
            [
                'protocol' => [828],
                'name'     => "The Kamael",
            ],
            [
                'protocol' => [831],
                'name'     => "The Kamael Hellbound",
            ],
            [
                'protocol' => [
                    851,
                    19,
                ],
                'name'     => "Gracia Part 1",
            ],
            [
                'protocol' => [
                    12,
                    17,
                    20,
                ],
                'name'     => "Gracia Part 2",
            ],
            [
                'protocol' => [
                    83,
                    87,
                    83,
                ],
                'name'     => "Gracia Final",
            ],
            [
                'protocol' => [
                    148,
                    152,
                    146,
                ],
                'name'     => "Gracia Plus (Epilogue)",
            ],
            [
                'protocol' => [216],
                'name'     => "Freya (High Five)",
            ],
            [
                'protocol' => [
                    267,
                    268,
                    271,
                    273,
                    253,
                    268,
                ],
                'name'     => "High Five",
            ],
            [
                'protocol' => [
                    404,
                    414,
                    415,
                ],
                'name'     => "Awakening",
            ],
            [
                'protocol' => [
                    410,
                    411,
                ],
                'name'     => "Harmony",
            ],
            [
                'protocol' => [
                    448,
                    449,
                ],
                'name'     => "Tauti",
            ],
            [
                'protocol' => [
                    479,
                    480,
                    488,
                ],
                'name'     => "Glory Days",
            ],
            [
                'protocol' => [
                    531,
                    532,
                    533,
                    557,
                    558,
                ],
                'name'     => "Lindvior",
            ],
            [
                'protocol' => [
                    575,
                    578,
                    580,
                    581,
                    583,
                ],
                'name'     => "Valliance",
            ],
            [
                'protocol' => [
                    603,
                    606,
                    607,
                    610,
                ],
                'name'     => "Ertheia",
            ],
            [
                'protocol' => [24],
                'name'     => "[EP2.0] Infinite Odyssey: Shadows of Light",
            ],
            [
                'protocol' => [28],
                'name'     => "[EP2.5] Infinite Odyssey: Underground",
            ],
            [
                'protocol' => [64],
                'name'     => "[EP3.0] Helios: Lord of Bifrost",
            ],
            [
                'protocol' => [83],
                'name'     => "Helios: Arena (MOBA)",
            ],
            [
                'protocol' => [
                    109,
                    110,
                ],
                'name'     => "Grand Crusade",
            ],
            [
                'protocol' => [140],
                'name'     => "Salvation: First Chapter",
            ],
            [
                'protocol' => [140],
                'name'     => "Salvation: Arena (MOBA)",
            ],
            [
                'protocol' => [152],
                'name'     => "Salvation: The Gathering / Orfen",
            ],
            [
                'protocol' => [
                    166,
                    196,
                ],
                'name'     => "Fafurion",
            ],
            [
                'protocol' => [228],
                'name'     => "Prelude Of War",
            ],
            [
                'protocol' => [
                    235,
                    236,
                ],
                'name'     => "Prelude Of War Ch. 2",
            ],
            [
                'protocol' => [245],
                'name'     => "Prelude Of War Ch. 3",
            ],
            [
                'protocol' => [272],
                'name'     => "Homunculus",
            ],
            [
                'protocol' => [286],
                'name'     => "Homunculus Ch. 2",
            ],
            [
                'protocol' => [306],
                'name'     => "Return Of The Queen Ant",
            ],
            [
                'protocol' => [311],
                'name'     => "Return Of The Queen Ant: Ch. 2",
            ],
            [
                'protocol' => [338],
                'name'     => "Master Class",
            ],
            [
                'protocol' => [362],
                'name'     => "Master Class Ch. 2",
            ],
            [
                'protocol' => [388],
                'name'     => "Master Class Ch. 3",
            ],
        ];
    }
}