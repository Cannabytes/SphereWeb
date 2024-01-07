<?php
return [
  20400 => 
  [
    'id' => 20400,
    'type' => 'armor',
    'name' => 'Laborer Hat - Blessed Soul - 7-day limited period',
    'add_name' => 'Blessed Soul - 7-day limited period',
    'description' => 'Hat that was worn by Reipung. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_people_cap_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21053,
        'level' => 4,
      ],
    ],
    'time' => 10080,
  ],
  20401 => 
  [
    'id' => 20401,
    'type' => 'armor',
    'name' => 'Laborer Hat',
    'add_name' => '',
    'description' => 'Hat that was worn by Reipung. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_people_cap_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_freightable' => true,
  ],
  20402 => 
  [
    'id' => 20402,
    'type' => 'etcitem',
    'name' => 'Laborer Hat 7-Day Pack - Bless the Body',
    'add_name' => 'Bless the Body',
    'description' => 'Wrapped pack containing a Laborer Hat (7 day]. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20399,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20403 => 
  [
    'id' => 20403,
    'type' => 'etcitem',
    'name' => 'Laborer Hat 7-Day Pack - Bless the Soul',
    'add_name' => 'Bless the Soul',
    'description' => 'Wrapped pack containing a Laborer Hat (7 day]. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20400,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20404 => 
  [
    'id' => 20404,
    'type' => 'etcitem',
    'name' => 'Laborer Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Laborer Hat. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20401,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20405 => 
  [
    'id' => 20405,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Majo - Big Head - 7-day limited period',
    'add_name' => 'Big Head - 7-day limited period',
    'description' => 'Bracelet that summons the Majo Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_mazu_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21000,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23000,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23000,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23004,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20406 => 
  [
    'id' => 20406,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Gold Crown Majo - Resurrection - 7-Day Limited Period',
    'add_name' => 'Resurrection - 7-Day Limited Period',
    'description' => 'Bracelet that summons the Gold Crown Majo Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_mazu_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21001,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23001,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23001,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23005,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20407 => 
  [
    'id' => 20407,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Black Crown Majo - Escape - 7-Day Limited Period',
    'add_name' => 'Escape - 7-Day Limited Period',
    'description' => 'Bracelet that summons the Black Crown Majo Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_mazu_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21002,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23002,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23002,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23006,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20408 => 
  [
    'id' => 20408,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Plaipitak - Big Head - 7-day limited period',
    'add_name' => 'Big Head - 7-day limited period',
    'description' => 'Bracelet that summons the Plaipitak Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_pitak_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21003,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23003,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23007,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20409 => 
  [
    'id' => 20409,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Plaipitak - Resurrection - 7-Day Limited Period',
    'add_name' => 'Resurrection - 7-Day Limited Period',
    'description' => 'Bracelet that summons the Plaipitak Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_pitak_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21003,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23003,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23009,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20410 => 
  [
    'id' => 20410,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Plaipitak - Escape - 7-Day Limited Period',
    'add_name' => 'Escape - 7-Day Limited Period',
    'description' => 'Bracelet that summons the Plaipitak Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_bracelet_aga_pitak_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21003,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23003,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23008,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20411 => 
  [
    'id' => 20411,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Baby Panda - Big Head - 7-day limited period',
    'add_name' => 'Big Head - 7-day limited period',
    'description' => 'Bracelet that summons the Baby Panda. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_baby_panda_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21008,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23013,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20412 => 
  [
    'id' => 20412,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Bamboo Panda - Resurrection - 7-Day Limited Period',
    'add_name' => 'Resurrection - 7-Day Limited Period',
    'description' => 'Bracelet that summons a Bamboo Panda. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_kunfu_panda_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21009,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23014,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20413 => 
  [
    'id' => 20413,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Sexy Panda - Escape - 7-Day Limited Period',
    'add_name' => 'Escape - 7-Day Limited Period',
    'description' => 'Bracelet that summons the Sexy Panda. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_sexy_panda_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21010,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23015,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20414 => 
  [
    'id' => 20414,
    'type' => 'armor',
    'name' => 'Horn Rimmed Glasses - Agility - 7-day limited period',
    'add_name' => 'Agility - 7-day limited period',
    'description' => 'Magic horn-rimmed glasses with mysterious power. Cannot be exchanged, dropped, or sold.',
    'icon' => 'BranchSys.br_Eye_Glasses_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21005,
        'level' => 3,
      ],
    ],
    'time' => 10080,
  ],
  20415 => 
  [
    'id' => 20415,
    'type' => 'armor',
    'name' => 'Afro Hair - Big Head, Firework - 7-day limited period',
    'add_name' => 'Big Head, Firework - 7-day limited period',
    'description' => 'Afro style hair. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Afro_hair_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21006,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21007,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20416 => 
  [
    'id' => 20416,
    'type' => 'armor',
    'name' => 'Afro Hair - Wind Walk - 7-Day Limited Period',
    'add_name' => 'Wind Walk - 7-Day Limited Period',
    'description' => 'Afro style hair. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Afro_hair_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21004,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20417 => 
  [
    'id' => 20417,
    'type' => 'armor',
    'name' => 'Uniform Hat - Blessed Resurrection - 7-day limited period',
    'add_name' => 'Blessed Resurrection - 7-day limited period',
    'description' => 'A cool uniform hat. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Uniform_Hat_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21054,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20418 => 
  [
    'id' => 20418,
    'type' => 'armor',
    'name' => 'Assassin\'s Bamboo Hat - Wind Walk - 7-Day Limited Period',
    'add_name' => 'Wind Walk - 7-Day Limited Period',
    'description' => 'Wide brimmed hat made of bamboo. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Bamboo_Hat_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21055,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20419 => 
  [
    'id' => 20419,
    'type' => 'armor',
    'name' => 'Ruthless Tribe Mask - Agility - 7-day limited period',
    'add_name' => 'Agility - 7-day limited period',
    'description' => 'Mask worn by the reckless tribe. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_mask_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21056,
        'level' => 3,
      ],
    ],
    'time' => 10080,
  ],
  20420 => 
  [
    'id' => 20420,
    'type' => 'armor',
    'name' => 'Ribbon Hairband - Reflect Damage - 7-Day Limited Period',
    'add_name' => 'Reflect Damage - 7-Day Limited Period',
    'description' => 'A large ribbon hair accessory. Exclusive to females. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Ribbon_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21057,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20421 => 
  [
    'id' => 20421,
    'type' => 'armor',
    'name' => 'Visor - Mana Regeneration - 7-Day Limited Period',
    'add_name' => 'Mana Regeneration - 7-Day Limited Period',
    'description' => 'Accessory that stylishly covers the eye area. Exclusive to males. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Eye_Visor_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21058,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20422 => 
  [
    'id' => 20422,
    'type' => 'armor',
    'name' => 'Kat the Cat Hat - Greater Heal - 7-Day Limited Period',
    'add_name' => 'Greater Heal - 7-Day Limited Period',
    'description' => 'Hat that looks like Kat the Cat. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_cat_the_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21059,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20423 => 
  [
    'id' => 20423,
    'type' => 'armor',
    'name' => 'Skull Hat - Death Whisper - 7-Day Limited Period',
    'add_name' => 'Death Whisper - 7-Day Limited Period',
    'description' => 'Hat that looks like a skull. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_skeleton_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21060,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20424 => 
  [
    'id' => 20424,
    'type' => 'armor',
    'name' => 'Afro Hair - Gold - Agility - 7-day limited period',
    'add_name' => 'Agility - 7-day limited period',
    'description' => 'Afro style hair in gold. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Afro_hair_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21061,
        'level' => 3,
      ],
    ],
    'time' => 10080,
  ],
  20425 => 
  [
    'id' => 20425,
    'type' => 'armor',
    'name' => 'Afro Hair - Pink - Wild Magic - 7-Day Limited Period',
    'add_name' => 'Wild Magic - 7-Day Limited Period',
    'description' => 'Afro style hair in pink. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_Afro_hair_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21062,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20426 => 
  [
    'id' => 20426,
    'type' => 'armor',
    'name' => 'Goggles - Wind Walk - 7-Day Limited Period',
    'add_name' => 'Wind Walk - 7-Day Limited Period',
    'description' => 'A stylish goggle accessory with a fine silver decoration. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_goggles_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21063,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20427 => 
  [
    'id' => 20427,
    'type' => 'armor',
    'name' => 'Napoleon Hat - Mana Regeneration - 7-Day Limited Period',
    'add_name' => 'Mana Regeneration - 7-Day Limited Period',
    'description' => 'A Napoleon Hat accessory that has world conquering energy. Cannot be exchanged, dropped, or sold.',
    'icon' => 'BranchSys.br_napoleonic_cap_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21064,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20428 => 
  [
    'id' => 20428,
    'type' => 'armor',
    'name' => 'Horn Hairband - Reflect Damage - 7-Day Limited Period',
    'add_name' => 'Reflect Damage - 7-Day Limited Period',
    'description' => 'A pink hairband accessory with a cute horn dangling. Exclusive to females. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_horn_hairband_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21065,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20429 => 
  [
    'id' => 20429,
    'type' => 'armor',
    'name' => 'Black Gem Mask - Vitality - 7-Day Limited Period',
    'add_name' => 'Vitality - 7-Day Limited Period',
    'description' => 'A black gem mask accessory made of luxurious metal material. When equipped, grants a Vitality Maintaining skill that can be used every hour. Can be used for 7 days. Cannot be exchanged or dropped.',
    'icon' => 'BranchSys.br_black_gem_mask_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21066,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20430 => 
  [
    'id' => 20430,
    'type' => 'armor',
    'name' => 'Plastic Hair - Blessed Escape - 7-day limited period',
    'add_name' => 'Blessed Escape - 7-day limited period',
    'description' => 'Plastic Hair. It changes to an attractive pink wig for female/blue wig for male. Uses 2 accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_plastic_hair_f_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21067,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20431 => 
  [
    'id' => 20431,
    'type' => 'armor',
    'name' => 'Daisy Hairpin - Resist Unholy - 7-Day Limited Period',
    'add_name' => 'Resist Unholy - 7-Day Limited Period',
    'description' => 'Daisy shaped hairpin Hair accessory exclusive to female. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_daisy_hairpin_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21068,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20432 => 
  [
    'id' => 20432,
    'type' => 'armor',
    'name' => 'Forget-me-not Hairpin - Wind Walk - 7-Day Limited Period',
    'add_name' => 'Wind Walk - 7-Day Limited Period',
    'description' => 'Forget-me-not shaped hairpin Hair accessory exclusive to female. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_forget_me_not_hairpin_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21069,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20433 => 
  [
    'id' => 20433,
    'type' => 'armor',
    'name' => 'Outlaw\'s Eyepatch - Death Whisper - 7-Day Limited Period',
    'add_name' => 'Death Whisper - 7-Day Limited Period',
    'description' => 'Purple eyepatch accessory Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_outlaw_eyepatch_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21070,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20434 => 
  [
    'id' => 20434,
    'type' => 'armor',
    'name' => 'Pirate\'s Eyepatch - Agility - 7-day limited period',
    'add_name' => 'Agility - 7-day limited period',
    'description' => 'Eyepatch accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_eye_bandage_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21071,
        'level' => 3,
      ],
    ],
    'time' => 10080,
  ],
  20435 => 
  [
    'id' => 20435,
    'type' => 'armor',
    'name' => 'Monocle - Wild Magic - 7-Day Limited Period',
    'add_name' => 'Wild Magic - 7-Day Limited Period',
    'description' => 'Monocle accessory Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_glasses_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21072,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20436 => 
  [
    'id' => 20436,
    'type' => 'armor',
    'name' => 'Red Mask of Victory - Mana Regeneration - 7-Day Limited Period',
    'add_name' => 'Mana Regeneration - 7-Day Limited Period',
    'description' => 'Hair accessory for World Cup Events Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_worldcup_mask_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21073,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20437 => 
  [
    'id' => 20437,
    'type' => 'armor',
    'name' => 'Red Horn of Victory - Reflect Damage - 7-Day Limited Period',
    'add_name' => 'Reflect Damage - 7-Day Limited Period',
    'description' => 'Hair accessory for World Cup Events Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_hair_cornu_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21074,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20438 => 
  [
    'id' => 20438,
    'type' => 'armor',
    'name' => 'Party Mask - Greater Heal - 7-Day Limited Period',
    'add_name' => 'Greater Heal - 7-Day Limited Period',
    'description' => 'Fashion item which creates an unique taste. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_party_mask_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21075,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20439 => 
  [
    'id' => 20439,
    'type' => 'armor',
    'name' => 'Red Party Mask - Resist Unholy - 7-Day Limited Period',
    'add_name' => 'Resist Unholy - 7-Day Limited Period',
    'description' => 'Fashion item which creates an unique taste. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_party_mask_i01',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21076,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20440 => 
  [
    'id' => 20440,
    'type' => 'armor',
    'name' => 'Cat Ears - Wind Walk - 7-Day Limited Period',
    'add_name' => 'Wind Walk - 7-Day Limited Period',
    'description' => 'Cat ear shaped hair accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_cat_ear_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21077,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20441 => 
  [
    'id' => 20441,
    'type' => 'armor',
    'name' => 'Lady\'s Hair Pin - Death Whisper - 7-Day Limited Period',
    'add_name' => 'Death Whisper - 7-Day Limited Period',
    'description' => 'Hair accessory exclusive to female. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_hairpin_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21078,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20442 => 
  [
    'id' => 20442,
    'type' => 'armor',
    'name' => 'Raccoon Ears - Agility - 7-day limited period',
    'add_name' => 'Agility - 7-day limited period',
    'description' => 'Raccoon ear shaped hair accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_racoon_ear_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21079,
        'level' => 3,
      ],
    ],
    'time' => 10080,
  ],
  20443 => 
  [
    'id' => 20443,
    'type' => 'armor',
    'name' => 'Rabbit Ear - Wild Magic - 7-Day Limited Period',
    'add_name' => 'Wild Magic - 7-Day Limited Period',
    'description' => 'Bonny Girls Rabbit Ear shaped hair accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_rabbit_ear_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21080,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20444 => 
  [
    'id' => 20444,
    'type' => 'armor',
    'name' => 'Little Angel Wings - Mana Regeneration - 7-Day Limited Period',
    'add_name' => 'Mana Regeneration - 7-Day Limited Period',
    'description' => 'Wings shaped hair accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_hair_ring_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21081,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20445 => 
  [
    'id' => 20445,
    'type' => 'armor',
    'name' => 'Fairy\'s Tentacle - Reflect Damage - 7-Day Limited Period',
    'add_name' => 'Reflect Damage - 7-Day Limited Period',
    'description' => 'Stars attached cute tentacle hair accessory. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_hair_feeler_i00',
    'bodypart' => 'hair2',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21082,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20446 => 
  [
    'id' => 20446,
    'type' => 'armor',
    'name' => 'Dandy\'s Chapeau - Greater Heal - 7-Day Limited Period',
    'add_name' => 'Greater Heal - 7-Day Limited Period',
    'description' => 'Feather attached nice poke bonnet. Uses 2 accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_archer_hat_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21083,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20447 => 
  [
    'id' => 20447,
    'type' => 'armor',
    'name' => 'Artisan\'s Goggles - Energy - 7-Day Limited Period',
    'add_name' => 'Energy - 7-Day Limited Period',
    'description' => 'Large goggles which protect eyes. Uses 2 accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_dwarf_goggle_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21084,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20448 => 
  [
    'id' => 20448,
    'type' => 'armor',
    'name' => 'Darkmane Pacer Mount Bracelet - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Can ride a purple maned horse when equipped. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '619-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8247,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20449 => 
  [
    'id' => 20449,
    'type' => 'armor',
    'name' => 'Steam Beatle Mount Bracelet - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Can mount a steam beatle when equipped. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '839-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21051,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20450 => 
  [
    'id' => 20450,
    'type' => 'etcitem',
    'name' => 'Majo Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Majo Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20405,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20451 => 
  [
    'id' => 20451,
    'type' => 'etcitem',
    'name' => 'Gold Crown Majo Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Gold Crown Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20406,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20452 => 
  [
    'id' => 20452,
    'type' => 'etcitem',
    'name' => 'Black Crown Majo Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Black Crown Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20407,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20453 => 
  [
    'id' => 20453,
    'type' => 'etcitem',
    'name' => 'Plaipitak Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Plaipitak Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20408,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20454 => 
  [
    'id' => 20454,
    'type' => 'etcitem',
    'name' => 'Plaipitak Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Plaipitak Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20409,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20455 => 
  [
    'id' => 20455,
    'type' => 'etcitem',
    'name' => 'Plaipitak Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Plaipitak Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20410,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20456 => 
  [
    'id' => 20456,
    'type' => 'etcitem',
    'name' => 'Agathion of Baby Panda 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Baby Panda Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20411,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20457 => 
  [
    'id' => 20457,
    'type' => 'etcitem',
    'name' => 'Bamboo Panda Agathion 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Bamboo Panda Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20412,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20458 => 
  [
    'id' => 20458,
    'type' => 'etcitem',
    'name' => 'Agathion of Sexy Panda 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Sexy Panda Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20413,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20459 => 
  [
    'id' => 20459,
    'type' => 'etcitem',
    'name' => 'Horn Rimmed Glasses 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Horn Rimmed Glasses (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20414,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20460 => 
  [
    'id' => 20460,
    'type' => 'etcitem',
    'name' => 'Afro Hair 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Afro Hair (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20415,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20461 => 
  [
    'id' => 20461,
    'type' => 'etcitem',
    'name' => 'Afro Hair 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Afro Hair (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20416,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20462 => 
  [
    'id' => 20462,
    'type' => 'etcitem',
    'name' => 'Uniform Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Uniform Hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20417,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20463 => 
  [
    'id' => 20463,
    'type' => 'etcitem',
    'name' => 'Assassin\'s Bamboo Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an Assassin\'s Bamboo Hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20418,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20464 => 
  [
    'id' => 20464,
    'type' => 'etcitem',
    'name' => 'Ruthless Tribe Mask 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Ruthless Tribe Mask (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20419,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20465 => 
  [
    'id' => 20465,
    'type' => 'etcitem',
    'name' => 'Ribbon Hairband 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Ribbon Hairband (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20420,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20466 => 
  [
    'id' => 20466,
    'type' => 'etcitem',
    'name' => 'Visor 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Visor (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20421,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20467 => 
  [
    'id' => 20467,
    'type' => 'etcitem',
    'name' => 'Kat the Cat Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Kat the Cat Hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20422,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20468 => 
  [
    'id' => 20468,
    'type' => 'etcitem',
    'name' => 'Skull Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Skull Hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20423,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20469 => 
  [
    'id' => 20469,
    'type' => 'etcitem',
    'name' => 'Gold Afro Hair 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Gold Afro Hair (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20424,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20470 => 
  [
    'id' => 20470,
    'type' => 'etcitem',
    'name' => 'Pink Afro Hair 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Pink Afro Hair (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20425,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20471 => 
  [
    'id' => 20471,
    'type' => 'etcitem',
    'name' => 'Goggle 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Goggles (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20426,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20472 => 
  [
    'id' => 20472,
    'type' => 'etcitem',
    'name' => 'Napoleon Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Napoleon Hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20427,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20473 => 
  [
    'id' => 20473,
    'type' => 'etcitem',
    'name' => 'Horn Hairband 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Horn Hairband (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20428,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20474 => 
  [
    'id' => 20474,
    'type' => 'etcitem',
    'name' => 'Black Gem Mask 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Black Gem Mask (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20429,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20475 => 
  [
    'id' => 20475,
    'type' => 'etcitem',
    'name' => 'Plastic Hair 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Plastic Hair (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20430,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20476 => 
  [
    'id' => 20476,
    'type' => 'etcitem',
    'name' => 'Daisy Hairpin 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Daisy Hairpin (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20431,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20477 => 
  [
    'id' => 20477,
    'type' => 'etcitem',
    'name' => 'Forget-me-not Hairpin 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Forget-me-not Hairpin (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20432,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20478 => 
  [
    'id' => 20478,
    'type' => 'etcitem',
    'name' => 'Outlaw\'s Eyepatch 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an Outlaw\'s Eyepatch (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20433,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20479 => 
  [
    'id' => 20479,
    'type' => 'etcitem',
    'name' => 'Pirate\'s Eyepatch 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Pirate\'s Eyepatch (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20434,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20480 => 
  [
    'id' => 20480,
    'type' => 'etcitem',
    'name' => 'Monocle 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Monocle (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20435,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20481 => 
  [
    'id' => 20481,
    'type' => 'etcitem',
    'name' => 'Red Mask of Victory 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Red Mask of Victory (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20436,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20482 => 
  [
    'id' => 20482,
    'type' => 'etcitem',
    'name' => 'Red Horn of Victory 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Red Horn of Victory (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20437,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20483 => 
  [
    'id' => 20483,
    'type' => 'etcitem',
    'name' => 'Party Mask 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Party Mask (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20438,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20484 => 
  [
    'id' => 20484,
    'type' => 'etcitem',
    'name' => 'Red Party Mask 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Red Party Mask (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20439,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20485 => 
  [
    'id' => 20485,
    'type' => 'etcitem',
    'name' => 'Cat Ears 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Cat Ears (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20440,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20486 => 
  [
    'id' => 20486,
    'type' => 'etcitem',
    'name' => 'Lady\'s Hair Pin 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Lady\'s Hair Pin (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20441,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20487 => 
  [
    'id' => 20487,
    'type' => 'etcitem',
    'name' => 'Raccoon Ears 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Raccoon Ears (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20442,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20488 => 
  [
    'id' => 20488,
    'type' => 'etcitem',
    'name' => 'Rabbit Ears 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Rabbit Ears (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20443,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20489 => 
  [
    'id' => 20489,
    'type' => 'etcitem',
    'name' => 'Little Angel\'s Wings 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Little Angel\'s Wings (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20444,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20490 => 
  [
    'id' => 20490,
    'type' => 'etcitem',
    'name' => 'Fairy\'s Tentacle 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Fairy\'s Tentacle (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20445,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20491 => 
  [
    'id' => 20491,
    'type' => 'etcitem',
    'name' => 'Dandy\'s Chapeau 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Dandy\'s Chapeau (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20446,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20492 => 
  [
    'id' => 20492,
    'type' => 'etcitem',
    'name' => 'Artisan\'s Goggles 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an Artisan\'s Goggles (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20447,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20493 => 
  [
    'id' => 20493,
    'type' => 'etcitem',
    'name' => 'Darkmane Pacer Mount Bracelet 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Darkmane Pacer Mount Bracelet (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20448,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20494 => 
  [
    'id' => 20494,
    'type' => 'etcitem',
    'name' => 'Steam Beatle Mount Bracelet 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Steam Beatle Mount Bracelet (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20449,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20495 => 
  [
    'id' => 20495,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Live Event Souvenir',
    'add_name' => '',
    'description' => 'Dimensional Item. A special thanks for having attended a live Lineage II fan event. Summons the Live Event Souvenir agathion, which contains a surprise inside. Cannot be exchanged, dropped, or sold. Can be shared between characters on the same account through the Dimensional Merchant.',
    'icon' => 'BranchSys.br_aga_pomona_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21085,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23067,
          'level' => 1,
        ],
      ],
    ],
  ],
  20496 => 
  [
    'id' => 20496,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Pomona - Mental Shield - 7-day limited period',
    'add_name' => 'Mental Shield - 7-day limited period',
    'description' => 'Bracelet that summons the Pomona Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_aga_pomona_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21085,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23068,
          'level' => 4,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20497 => 
  [
    'id' => 20497,
    'type' => 'etcitem',
    'name' => 'Mother\'s Wreath (Event] - Blessing of Love - 24-hour limited period',
    'add_name' => 'Blessing of Love - 24-hour limited period',
    'description' => 'For events. Wreath containing a mother\'s love. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_garland_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21086,
        'level' => 1,
      ],
    ],
    'time' => 1440,
  ],
  20498 => 
  [
    'id' => 20498,
    'type' => 'etcitem',
    'name' => 'Mother\'s Wreath - Blessing of Love - 3-day limited period',
    'add_name' => 'Blessing of Love - 3-day limited period',
    'description' => 'Wreath containing a mother\'s love. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_garland_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21086,
        'level' => 1,
      ],
    ],
    'time' => 4320,
  ],
  20499 => 
  [
    'id' => 20499,
    'type' => 'armor',
    'name' => 'Feline Queen Hat',
    'add_name' => '',
    'description' => 'Hat that looks like the Feline Queen. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'accessory_queen_of_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
  ],
];