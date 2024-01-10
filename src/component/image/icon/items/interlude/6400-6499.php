<?php
return [
  6400 => 
  [
    'id' => 6400,
    'type' => 'etcitem',
    'name' => 'Badge of Hyena',
    'add_name' => '',
    'description' => 'The badge that indicates that its bearer\'s event collector grade is "hyena."  Without this badge, one cannot prove one\'s grade.',
    'icon' => 'etc_paper_red_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  6401 => 
  [
    'id' => 6401,
    'type' => 'etcitem',
    'name' => 'Badge of Fox',
    'add_name' => '',
    'description' => 'The badge that indicates that its bearer\'s event collector grade is "fox."  Without this badge, one cannot prove one\'s grade.',
    'icon' => 'etc_paper_red_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  6402 => 
  [
    'id' => 6402,
    'type' => 'etcitem',
    'name' => 'Badge of Wolf',
    'add_name' => '',
    'description' => 'The badge that indicates that its bearer\'s event collector grade is "wolf."  Without this badge, one cannot prove one\'s grade.',
    'icon' => 'etc_paper_red_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  6403 => 
  [
    'id' => 6403,
    'type' => 'etcitem',
    'name' => 'Star Shard',
    'add_name' => '',
    'description' => 'L2 Fireworks Event - A playful device for elves. When it is thrown, it creates a small explosion. It is used as an ingredient for making other type of fireworks as well.',
    'icon' => 'etc_fairy_fire_i00',
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2023,
        'level' => 1,
      ],
    ],
  ],
  6404 => 
  [
    'id' => 6404,
    'type' => 'etcitem',
    'name' => 'Gunpowder',
    'add_name' => '',
    'description' => 'L2 Fireworks Event - Black powder. An ingredient used to make larger fireworks.',
    'icon' => 'etc_powder_black_i00',
    'is_stackable' => true,
  ],
  6405 => 
  [
    'id' => 6405,
    'type' => 'etcitem',
    'name' => 'Magnesium',
    'add_name' => '',
    'description' => 'L2 Fireworks Event - A chemical compound that generates a powerful flash when ignited. It is needed to make large fireworks.',
    'icon' => 'etc_broken_crystal_silver_i00',
    'is_stackable' => true,
  ],
  6406 => 
  [
    'id' => 6406,
    'type' => 'etcitem',
    'name' => 'Firework',
    'add_name' => '',
    'description' => 'L2 Fireworks Event - An explosive device that brilliantly lights up the sky.',
    'icon' => 'etc_small_ultra_bomb_i00',
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2024,
        'level' => 1,
      ],
    ],
  ],
  6407 => 
  [
    'id' => 6407,
    'type' => 'etcitem',
    'name' => 'Large Firework',
    'add_name' => '',
    'description' => 'L2 Fireworks Event - A large explosive device that explodes into brilliant colors, lighting the sky.',
    'icon' => 'etc_ultra_bomb_i00',
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2025,
        'level' => 1,
      ],
    ],
  ],
  6408 => 
  [
    'id' => 6408,
    'type' => 'armor',
    'name' => 'Formal Wear',
    'add_name' => '',
    'description' => 'Formal wear appears as a wedding dress for female characters and as a tuxedo for male characters.',
    'icon' => 'armor_t2000_ul_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'alldress',
    'weight' => 1000,
    'price' => 5000000,
  ],
  6409 => 
  [
    'id' => 6409,
    'type' => 'etcitem',
    'name' => '2006 Battle Tournament - CP Potion',
    'add_name' => '',
    'description' => 'Restores CP by 200.',
    'icon' => 'etc_cp_potion_i01',
    'etcitem_type' => 'potion',
    'weight' => 500,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2166,
        'level' => 2,
      ],
    ],
  ],
  6410 => 
  [
    'id' => 6410,
    'type' => 'etcitem',
    'name' => '2006 Battle Tournament - Quick Healing Potion',
    'add_name' => '',
    'description' => 'A magical potion that quickly restores HP. However, its effects do not last.',
    'icon' => 'etc_potion_gold_i00',
    'etcitem_type' => 'potion',
    'weight' => 180,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2038,
        'level' => 1,
      ],
    ],
  ],
  6411 => 
  [
    'id' => 6411,
    'type' => 'etcitem',
    'name' => 'Small Nimble Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i07',
    'weight' => 100,
    'price' => 138,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 1,
      ],
    ],
  ],
  6412 => 
  [
    'id' => 6412,
    'type' => 'etcitem',
    'name' => 'Small Ugly Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i07',
    'weight' => 100,
    'price' => 141,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 2,
      ],
    ],
  ],
  6413 => 
  [
    'id' => 6413,
    'type' => 'etcitem',
    'name' => 'Small Pudgy Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i07',
    'weight' => 100,
    'price' => 153,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 3,
      ],
    ],
  ],
  6414 => 
  [
    'id' => 6414,
    'type' => 'etcitem',
    'name' => 'Nimble Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i07',
    'weight' => 100,
    'price' => 167,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 4,
      ],
    ],
  ],
  6415 => 
  [
    'id' => 6415,
    'type' => 'etcitem',
    'name' => 'Ugly Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i07',
    'weight' => 100,
    'price' => 187,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 5,
      ],
    ],
  ],
  6416 => 
  [
    'id' => 6416,
    'type' => 'etcitem',
    'name' => 'Pudgy Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i07',
    'weight' => 100,
    'price' => 208,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 6,
      ],
    ],
  ],
  6417 => 
  [
    'id' => 6417,
    'type' => 'etcitem',
    'name' => 'Large Nimble Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i07',
    'weight' => 100,
    'price' => 225,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 7,
      ],
    ],
  ],
  6418 => 
  [
    'id' => 6418,
    'type' => 'etcitem',
    'name' => 'Large Ugly Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i07',
    'weight' => 100,
    'price' => 248,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 8,
      ],
    ],
  ],
  6419 => 
  [
    'id' => 6419,
    'type' => 'etcitem',
    'name' => 'Large Pudgy Green Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i07',
    'weight' => 100,
    'price' => 265,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2190,
        'level' => 9,
      ],
    ],
  ],
  6420 => 
  [
    'id' => 6420,
    'type' => 'etcitem',
    'name' => 'Small Jade Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i06',
    'weight' => 100,
    'price' => 285,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 1,
      ],
    ],
  ],
  6421 => 
  [
    'id' => 6421,
    'type' => 'etcitem',
    'name' => 'Small Jade Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i06',
    'weight' => 100,
    'price' => 295,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 2,
      ],
    ],
  ],
  6422 => 
  [
    'id' => 6422,
    'type' => 'etcitem',
    'name' => 'Small Jade Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i06',
    'weight' => 100,
    'price' => 310,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 3,
      ],
    ],
  ],
  6423 => 
  [
    'id' => 6423,
    'type' => 'etcitem',
    'name' => 'Jade Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i06',
    'weight' => 100,
    'price' => 325,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 4,
      ],
    ],
  ],
  6424 => 
  [
    'id' => 6424,
    'type' => 'etcitem',
    'name' => 'Jade Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i06',
    'weight' => 100,
    'price' => 340,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 5,
      ],
    ],
  ],
  6425 => 
  [
    'id' => 6425,
    'type' => 'etcitem',
    'name' => 'Jade Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i06',
    'weight' => 100,
    'price' => 355,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 6,
      ],
    ],
  ],
  6426 => 
  [
    'id' => 6426,
    'type' => 'etcitem',
    'name' => 'Big Jade Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i06',
    'weight' => 100,
    'price' => 365,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 7,
      ],
    ],
  ],
  6427 => 
  [
    'id' => 6427,
    'type' => 'etcitem',
    'name' => 'Big Jade Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i06',
    'weight' => 100,
    'price' => 375,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 8,
      ],
    ],
  ],
  6428 => 
  [
    'id' => 6428,
    'type' => 'etcitem',
    'name' => 'Big Jade Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i06',
    'weight' => 100,
    'price' => 385,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2191,
        'level' => 9,
      ],
    ],
  ],
  6429 => 
  [
    'id' => 6429,
    'type' => 'etcitem',
    'name' => 'Small Blue Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i01',
    'weight' => 100,
    'price' => 395,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 1,
      ],
    ],
  ],
  6430 => 
  [
    'id' => 6430,
    'type' => 'etcitem',
    'name' => 'Small Blue Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i01',
    'weight' => 100,
    'price' => 400,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 2,
      ],
    ],
  ],
  6431 => 
  [
    'id' => 6431,
    'type' => 'etcitem',
    'name' => 'Small Blue Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i01',
    'weight' => 100,
    'price' => 410,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 3,
      ],
    ],
  ],
  6432 => 
  [
    'id' => 6432,
    'type' => 'etcitem',
    'name' => 'Blue Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i01',
    'weight' => 100,
    'price' => 415,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 4,
      ],
    ],
  ],
  6433 => 
  [
    'id' => 6433,
    'type' => 'etcitem',
    'name' => 'Blue Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i01',
    'weight' => 100,
    'price' => 418,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 5,
      ],
    ],
  ],
  6434 => 
  [
    'id' => 6434,
    'type' => 'etcitem',
    'name' => 'Blue Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i01',
    'weight' => 100,
    'price' => 420,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 6,
      ],
    ],
  ],
  6435 => 
  [
    'id' => 6435,
    'type' => 'etcitem',
    'name' => 'Big Blue Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i01',
    'weight' => 100,
    'price' => 425,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 7,
      ],
    ],
  ],
  6436 => 
  [
    'id' => 6436,
    'type' => 'etcitem',
    'name' => 'Big Blue Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i01',
    'weight' => 100,
    'price' => 431,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 8,
      ],
    ],
  ],
  6437 => 
  [
    'id' => 6437,
    'type' => 'etcitem',
    'name' => 'Big Blue Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i01',
    'weight' => 100,
    'price' => 435,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2192,
        'level' => 9,
      ],
    ],
  ],
  6438 => 
  [
    'id' => 6438,
    'type' => 'etcitem',
    'name' => 'Small Yellow Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i02',
    'weight' => 100,
    'price' => 442,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 1,
      ],
    ],
  ],
  6439 => 
  [
    'id' => 6439,
    'type' => 'etcitem',
    'name' => 'Small Yellow Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i02',
    'weight' => 100,
    'price' => 447,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 2,
      ],
    ],
  ],
  6440 => 
  [
    'id' => 6440,
    'type' => 'etcitem',
    'name' => 'Small Yellow Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i02',
    'weight' => 100,
    'price' => 452,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 3,
      ],
    ],
  ],
  6441 => 
  [
    'id' => 6441,
    'type' => 'etcitem',
    'name' => 'Yellow Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i02',
    'weight' => 100,
    'price' => 540,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 4,
      ],
    ],
  ],
  6442 => 
  [
    'id' => 6442,
    'type' => 'etcitem',
    'name' => 'Yellow Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i02',
    'weight' => 100,
    'price' => 553,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 5,
      ],
    ],
  ],
  6443 => 
  [
    'id' => 6443,
    'type' => 'etcitem',
    'name' => 'Yellow Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i02',
    'weight' => 100,
    'price' => 568,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 6,
      ],
    ],
  ],
  6444 => 
  [
    'id' => 6444,
    'type' => 'etcitem',
    'name' => 'Big Yellow Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i02',
    'weight' => 100,
    'price' => 580,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 7,
      ],
    ],
  ],
  6445 => 
  [
    'id' => 6445,
    'type' => 'etcitem',
    'name' => 'Big Yellow Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i02',
    'weight' => 100,
    'price' => 594,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 8,
      ],
    ],
  ],
  6446 => 
  [
    'id' => 6446,
    'type' => 'etcitem',
    'name' => 'Big Yellow Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i02',
    'weight' => 100,
    'price' => 608,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2193,
        'level' => 9,
      ],
    ],
  ],
  6447 => 
  [
    'id' => 6447,
    'type' => 'etcitem',
    'name' => 'Small Orange Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i08',
    'weight' => 100,
    'price' => 622,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 1,
      ],
    ],
  ],
  6448 => 
  [
    'id' => 6448,
    'type' => 'etcitem',
    'name' => 'Small Orange Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i08',
    'weight' => 100,
    'price' => 635,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 2,
      ],
    ],
  ],
  6449 => 
  [
    'id' => 6449,
    'type' => 'etcitem',
    'name' => 'Small Orange Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i08',
    'weight' => 100,
    'price' => 649,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 3,
      ],
    ],
  ],
  6450 => 
  [
    'id' => 6450,
    'type' => 'etcitem',
    'name' => 'Orange Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i08',
    'weight' => 100,
    'price' => 663,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 4,
      ],
    ],
  ],
  6451 => 
  [
    'id' => 6451,
    'type' => 'etcitem',
    'name' => 'Orange Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i08',
    'weight' => 100,
    'price' => 776,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 5,
      ],
    ],
  ],
  6452 => 
  [
    'id' => 6452,
    'type' => 'etcitem',
    'name' => 'Orange Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i08',
    'weight' => 100,
    'price' => 792,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 6,
      ],
    ],
  ],
  6453 => 
  [
    'id' => 6453,
    'type' => 'etcitem',
    'name' => 'Big Orange Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i08',
    'weight' => 100,
    'price' => 816,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 7,
      ],
    ],
  ],
  6454 => 
  [
    'id' => 6454,
    'type' => 'etcitem',
    'name' => 'Big Orange Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i08',
    'weight' => 100,
    'price' => 840,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 8,
      ],
    ],
  ],
  6455 => 
  [
    'id' => 6455,
    'type' => 'etcitem',
    'name' => 'Big Orange Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i08',
    'weight' => 100,
    'price' => 858,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2194,
        'level' => 9,
      ],
    ],
  ],
  6456 => 
  [
    'id' => 6456,
    'type' => 'etcitem',
    'name' => 'Small Purple Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i04',
    'weight' => 100,
    'price' => 875,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 1,
      ],
    ],
  ],
  6457 => 
  [
    'id' => 6457,
    'type' => 'etcitem',
    'name' => 'Small Purple Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i04',
    'weight' => 100,
    'price' => 893,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 2,
      ],
    ],
  ],
  6458 => 
  [
    'id' => 6458,
    'type' => 'etcitem',
    'name' => 'Small Purple Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i04',
    'weight' => 100,
    'price' => 910,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 3,
      ],
    ],
  ],
  6459 => 
  [
    'id' => 6459,
    'type' => 'etcitem',
    'name' => 'Purple Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i04',
    'weight' => 100,
    'price' => 930,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 4,
      ],
    ],
  ],
  6460 => 
  [
    'id' => 6460,
    'type' => 'etcitem',
    'name' => 'Purple Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i04',
    'weight' => 100,
    'price' => 948,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 5,
      ],
    ],
  ],
  6461 => 
  [
    'id' => 6461,
    'type' => 'etcitem',
    'name' => 'Purple Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i04',
    'weight' => 100,
    'price' => 1090,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 6,
      ],
    ],
  ],
  6462 => 
  [
    'id' => 6462,
    'type' => 'etcitem',
    'name' => 'Big Purple Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i04',
    'weight' => 100,
    'price' => 1111,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 7,
      ],
    ],
  ],
  6463 => 
  [
    'id' => 6463,
    'type' => 'etcitem',
    'name' => 'Big Purple Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i04',
    'weight' => 100,
    'price' => 1133,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 8,
      ],
    ],
  ],
  6464 => 
  [
    'id' => 6464,
    'type' => 'etcitem',
    'name' => 'Big Purple Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i04',
    'weight' => 100,
    'price' => 1157,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2195,
        'level' => 9,
      ],
    ],
  ],
  6465 => 
  [
    'id' => 6465,
    'type' => 'etcitem',
    'name' => 'Small Red Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i03',
    'weight' => 100,
    'price' => 1277,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 1,
      ],
    ],
  ],
  6466 => 
  [
    'id' => 6466,
    'type' => 'etcitem',
    'name' => 'Small Red Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i03',
    'weight' => 100,
    'price' => 1301,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 2,
      ],
    ],
  ],
  6467 => 
  [
    'id' => 6467,
    'type' => 'etcitem',
    'name' => 'Small Red Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i03',
    'weight' => 100,
    'price' => 1326,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 3,
      ],
    ],
  ],
  6468 => 
  [
    'id' => 6468,
    'type' => 'etcitem',
    'name' => 'Red Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i03',
    'weight' => 100,
    'price' => 1351,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 4,
      ],
    ],
  ],
  6469 => 
  [
    'id' => 6469,
    'type' => 'etcitem',
    'name' => 'Red Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i03',
    'weight' => 100,
    'price' => 1376,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 5,
      ],
    ],
  ],
  6470 => 
  [
    'id' => 6470,
    'type' => 'etcitem',
    'name' => 'Red Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i03',
    'weight' => 100,
    'price' => 1402,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 6,
      ],
    ],
  ],
  6471 => 
  [
    'id' => 6471,
    'type' => 'etcitem',
    'name' => 'Big Red Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i03',
    'weight' => 100,
    'price' => 1577,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 7,
      ],
    ],
  ],
  6472 => 
  [
    'id' => 6472,
    'type' => 'etcitem',
    'name' => 'Big Red Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i03',
    'weight' => 100,
    'price' => 1608,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 8,
      ],
    ],
  ],
  6473 => 
  [
    'id' => 6473,
    'type' => 'etcitem',
    'name' => 'Big Red Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i03',
    'weight' => 100,
    'price' => 1715,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2196,
        'level' => 9,
      ],
    ],
  ],
  6474 => 
  [
    'id' => 6474,
    'type' => 'etcitem',
    'name' => 'Small White Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i00',
    'weight' => 100,
    'price' => 1747,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 1,
      ],
    ],
  ],
  6475 => 
  [
    'id' => 6475,
    'type' => 'etcitem',
    'name' => 'Small White Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i00',
    'weight' => 100,
    'price' => 1781,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 2,
      ],
    ],
  ],
  6476 => 
  [
    'id' => 6476,
    'type' => 'etcitem',
    'name' => 'Small White Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i00',
    'weight' => 100,
    'price' => 1814,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 3,
      ],
    ],
  ],
  6477 => 
  [
    'id' => 6477,
    'type' => 'etcitem',
    'name' => 'White Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i00',
    'weight' => 100,
    'price' => 1849,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 4,
      ],
    ],
  ],
  6478 => 
  [
    'id' => 6478,
    'type' => 'etcitem',
    'name' => 'White Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i00',
    'weight' => 100,
    'price' => 1887,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 5,
      ],
    ],
  ],
  6479 => 
  [
    'id' => 6479,
    'type' => 'etcitem',
    'name' => 'White Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i00',
    'weight' => 100,
    'price' => 1923,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 6,
      ],
    ],
  ],
  6480 => 
  [
    'id' => 6480,
    'type' => 'etcitem',
    'name' => 'Big White Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i00',
    'weight' => 100,
    'price' => 1961,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 7,
      ],
    ],
  ],
  6481 => 
  [
    'id' => 6481,
    'type' => 'etcitem',
    'name' => 'Big White Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i00',
    'weight' => 100,
    'price' => 2000,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 8,
      ],
    ],
  ],
  6482 => 
  [
    'id' => 6482,
    'type' => 'etcitem',
    'name' => 'Big White Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i00',
    'weight' => 100,
    'price' => 2039,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2197,
        'level' => 9,
      ],
    ],
  ],
  6483 => 
  [
    'id' => 6483,
    'type' => 'etcitem',
    'name' => 'Small Black Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i05',
    'weight' => 100,
    'price' => 2081,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 1,
      ],
    ],
  ],
  6484 => 
  [
    'id' => 6484,
    'type' => 'etcitem',
    'name' => 'Small Black Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i05',
    'weight' => 100,
    'price' => 2123,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 2,
      ],
    ],
  ],
  6485 => 
  [
    'id' => 6485,
    'type' => 'etcitem',
    'name' => 'Small Black Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i05',
    'weight' => 100,
    'price' => 2166,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 3,
      ],
    ],
  ],
  6486 => 
  [
    'id' => 6486,
    'type' => 'etcitem',
    'name' => 'Black Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i05',
    'weight' => 100,
    'price' => 2309,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 4,
      ],
    ],
  ],
  6487 => 
  [
    'id' => 6487,
    'type' => 'etcitem',
    'name' => 'Black Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i05',
    'weight' => 100,
    'price' => 2357,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 5,
      ],
    ],
  ],
  6488 => 
  [
    'id' => 6488,
    'type' => 'etcitem',
    'name' => 'Black Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i05',
    'weight' => 100,
    'price' => 2403,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 6,
      ],
    ],
  ],
  6489 => 
  [
    'id' => 6489,
    'type' => 'etcitem',
    'name' => 'Big Black Nimble Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_tuna_i05',
    'weight' => 100,
    'price' => 2452,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 7,
      ],
    ],
  ],
  6490 => 
  [
    'id' => 6490,
    'type' => 'etcitem',
    'name' => 'Big Black Ugly Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_angler_i05',
    'weight' => 100,
    'price' => 2502,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 8,
      ],
    ],
  ],
  6491 => 
  [
    'id' => 6491,
    'type' => 'etcitem',
    'name' => 'Big Black Fat Fish',
    'add_name' => '',
    'description' => 'Double-click to randomly change into another  The changed item can be used as an ingredient for general manufacture.',
    'icon' => 'etc_bream_i05',
    'weight' => 100,
    'price' => 2552,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2198,
        'level' => 9,
      ],
    ],
  ],
  6492 => 
  [
    'id' => 6492,
    'type' => 'etcitem',
    'name' => 'Small Green Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i07',
    'weight' => 100,
    'price' => 153,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2199,
        'level' => 1,
      ],
    ],
  ],
  6493 => 
  [
    'id' => 6493,
    'type' => 'etcitem',
    'name' => 'Green Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i07',
    'weight' => 100,
    'price' => 208,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2199,
        'level' => 2,
      ],
    ],
  ],
  6494 => 
  [
    'id' => 6494,
    'type' => 'etcitem',
    'name' => 'Big Green Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i07',
    'weight' => 100,
    'price' => 265,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2199,
        'level' => 3,
      ],
    ],
  ],
  6495 => 
  [
    'id' => 6495,
    'type' => 'etcitem',
    'name' => 'Small Jade Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i06',
    'weight' => 100,
    'price' => 285,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2200,
        'level' => 1,
      ],
    ],
  ],
  6496 => 
  [
    'id' => 6496,
    'type' => 'etcitem',
    'name' => 'Jade Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i06',
    'weight' => 100,
    'price' => 315,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2200,
        'level' => 2,
      ],
    ],
  ],
  6497 => 
  [
    'id' => 6497,
    'type' => 'etcitem',
    'name' => 'Big Jade Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i06',
    'weight' => 100,
    'price' => 345,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2200,
        'level' => 3,
      ],
    ],
  ],
  6498 => 
  [
    'id' => 6498,
    'type' => 'etcitem',
    'name' => 'Small Blue Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i01',
    'weight' => 100,
    'price' => 395,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2201,
        'level' => 1,
      ],
    ],
  ],
  6499 => 
  [
    'id' => 6499,
    'type' => 'etcitem',
    'name' => 'Blue Treasure Chest',
    'add_name' => '',
    'description' => 'Double-click to see the change.',
    'icon' => 'etc_treasure_box_i01',
    'weight' => 100,
    'price' => 419,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2201,
        'level' => 2,
      ],
    ],
  ],
];