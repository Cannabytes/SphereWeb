<?php
return [
  13300 => 
  [
    'id' => 13300,
    'type' => 'etcitem',
    'name' => 'Feather of Blessing (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. You can resurrect right away at the spot where you get killed if you have the Feather of Blessing. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. Can be shared between characters within the account through Dimensional Merchant.',
    'icon' => 'blessed_feather_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'allow_self_resurrection' => 'true',
  ],
  13301 => 
  [
    'id' => 13301,
    'type' => 'etcitem',
    'name' => 'My Teleport Spellbook (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Increases by 3 slots the free teleport list, which can remember designated locations. Can expand up to 9 slots. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. Can be shared between characters within an account through the Dimensional Merchant.',
    'icon' => 'bookmark_book_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2610,
        'level' => 1,
      ],
    ],
  ],
  13302 => 
  [
    'id' => 13302,
    'type' => 'etcitem',
    'name' => 'My Teleport Scroll (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that is consumed when moving to the remembered location. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. Can be shared between characters within the account through Dimensional Merchant.',
    'icon' => 'bookmark_scroll_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  13303 => 
  [
    'id' => 13303,
    'type' => 'etcitem',
    'name' => 'White Weasel Hunting Helper Necklace (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that allows you to summon a hunting helper who temporarily casts warrior-type battle support magic. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. ',
    'icon' => 'pet_controler_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'handler' => 'summonitems',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2046,
        'level' => 1,
      ],
    ],
  ],
  13304 => 
  [
    'id' => 13304,
    'type' => 'etcitem',
    'name' => 'Fairy Princess Hunting Helper Necklace (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that allows you to summon a hunting helper who temporarily casts magician-type battle support magic. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. ',
    'icon' => 'pet_controler_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'handler' => 'summonitems',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2046,
        'level' => 1,
      ],
    ],
  ],
  13305 => 
  [
    'id' => 13305,
    'type' => 'etcitem',
    'name' => 'Wild Beast Fighter Hunting Helper Necklace (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that allows you to summon a warrior-type battle hunting helper. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. ',
    'icon' => 'pet_controler_i01',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'handler' => 'summonitems',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2046,
        'level' => 1,
      ],
    ],
  ],
  13306 => 
  [
    'id' => 13306,
    'type' => 'etcitem',
    'name' => 'Fox Shaman Hunting Helper Necklace (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that allows you to summon a magician-type battle hunting helper. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. ',
    'icon' => 'pet_controler_i01',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'handler' => 'summonitems',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2046,
        'level' => 1,
      ],
    ],
  ],
  13307 => 
  [
    'id' => 13307,
    'type' => 'etcitem',
    'name' => 'Color Name (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. Item that allows you to change a character\'s name color. You can change back to the original name color by using the "/resetname" command after changing the name color. If there is no original name, the name will disappear. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. Can be shared between characters within the account through Dimensional Merchant.',
    'icon' => 'color_name_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'nicknamecolor',
  ],
  13308 => 
  [
    'id' => 13308,
    'type' => 'armor',
    'name' => 'Light Purple-Maned Horse Mount Bracelet (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Can ride a purple maned horse when equipped. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
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
  13309 => 
  [
    'id' => 13309,
    'type' => 'armor',
    'name' => 'Agathion of Love (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Can summon an Agathion of Love when equipped. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 5763,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 8245,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
    'time' => 43200,
  ],
  13310 => 
  [
    'id' => 13310,
    'type' => 'armor',
    'name' => 'Kat the Cat Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Kat the Cat. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_cat_the_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13311 => 
  [
    'id' => 13311,
    'type' => 'armor',
    'name' => 'Feline Queen Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Feline Queen. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_queen_of_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13312 => 
  [
    'id' => 13312,
    'type' => 'armor',
    'name' => 'Monster Eye Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Monster Eye. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_monstereye_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13313 => 
  [
    'id' => 13313,
    'type' => 'armor',
    'name' => 'Brown Bear Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Brown Bear. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_brown_bear_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13314 => 
  [
    'id' => 13314,
    'type' => 'armor',
    'name' => 'Fungus Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Fungus. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_fungus_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13315 => 
  [
    'id' => 13315,
    'type' => 'armor',
    'name' => 'Skull Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Skull. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_skeleton_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13316 => 
  [
    'id' => 13316,
    'type' => 'armor',
    'name' => 'Ornithomimus Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Ornithomimus. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ornithomimus_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13317 => 
  [
    'id' => 13317,
    'type' => 'armor',
    'name' => 'Feline King Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Feline King. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_king_of_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13318 => 
  [
    'id' => 13318,
    'type' => 'armor',
    'name' => 'Kai the Cat Hat (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Hat that looks like Kai the Cat. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_chi_the_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
  ],
  13319 => 
  [
    'id' => 13319,
    'type' => 'weapon',
    'name' => 'O Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. O-type stick. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_o_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13320 => 
  [
    'id' => 13320,
    'type' => 'weapon',
    'name' => 'X Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. X Stick. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_x_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13321 => 
  [
    'id' => 13321,
    'type' => 'weapon',
    'name' => 'Scissors Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Scissor stick. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_scissors_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13322 => 
  [
    'id' => 13322,
    'type' => 'weapon',
    'name' => 'Rock-type Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Rock stick. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_rock_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13323 => 
  [
    'id' => 13323,
    'type' => 'weapon',
    'name' => 'Paper-type Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Paper stick. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_diver_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13324 => 
  [
    'id' => 13324,
    'type' => 'weapon',
    'name' => 'Pumpkin Transformation Stick (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional item. Transformation stick that turns you into a pumpkin. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_pumpkin_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'unequip_skill' => '839-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8246,
        'level' => 1,
      ],
    ],
    'time' => 43200,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13325 => 
  [
    'id' => 13325,
    'type' => 'armor',
    'name' => 'Kat the Cat Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Kat the Cat. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_cat_the_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13326 => 
  [
    'id' => 13326,
    'type' => 'armor',
    'name' => 'Feline Queen Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Feline Queen. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_queen_of_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13327 => 
  [
    'id' => 13327,
    'type' => 'armor',
    'name' => 'Monster Eye Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Monster Eye. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_monstereye_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13328 => 
  [
    'id' => 13328,
    'type' => 'armor',
    'name' => 'Brown Bear Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Brown Bear. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_brown_bear_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13329 => 
  [
    'id' => 13329,
    'type' => 'armor',
    'name' => 'Fungus Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Fungus. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_fungus_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13330 => 
  [
    'id' => 13330,
    'type' => 'armor',
    'name' => 'Skull Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Skull. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_skeleton_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13331 => 
  [
    'id' => 13331,
    'type' => 'armor',
    'name' => 'Ornithomimus Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like a Ornithomimus. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ornithomimus_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13332 => 
  [
    'id' => 13332,
    'type' => 'armor',
    'name' => 'Feline King Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Feline King. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_king_of_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13333 => 
  [
    'id' => 13333,
    'type' => 'armor',
    'name' => 'Kai the Cat Hat (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Hat that looks like Kai the Cat. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_chi_the_cat_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
  ],
  13334 => 
  [
    'id' => 13334,
    'type' => 'weapon',
    'name' => 'O Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. O-type stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_o_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13335 => 
  [
    'id' => 13335,
    'type' => 'weapon',
    'name' => 'X Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. X Stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_x_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13336 => 
  [
    'id' => 13336,
    'type' => 'weapon',
    'name' => 'Scissors Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Scissor stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_scissors_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13337 => 
  [
    'id' => 13337,
    'type' => 'weapon',
    'name' => 'Rock-type Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Rock stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_rock_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13338 => 
  [
    'id' => 13338,
    'type' => 'weapon',
    'name' => 'Paper-type Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Paper stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_diver_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13339 => 
  [
    'id' => 13339,
    'type' => 'weapon',
    'name' => 'Pumpkin Transformation Stick (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Pumpkin transformation stick. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'weapon_pumpkin_stick_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'unequip_skill' => '839-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8246,
        'level' => 1,
      ],
    ],
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  13340 => 
  [
    'id' => 13340,
    'type' => 'armor',
    'name' => 'Agathion of Love (Event] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Dimensional item. Seal bracelet that can summon an Agathion of Love. Can be used for 7 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 5763,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 8245,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  13341 => 
  [
    'id' => 13341,
    'type' => 'etcitem',
    'name' => 'My Teleport Spellbook 1-Book Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 1 sheet of the Free Teleporter\'s Scroll. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13301,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13342 => 
  [
    'id' => 13342,
    'type' => 'etcitem',
    'name' => 'My Teleport Scroll 30-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 30 sheets of Free Teleporter\'s Spellbooks. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13302,
        'min' => 30,
        'max' => 30,
        'chance' => 100,
      ],
    ],
  ],
  13343 => 
  [
    'id' => 13343,
    'type' => 'etcitem',
    'name' => 'Feather of Blessing 3-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 3 sheets of the Feather of Blessing. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13300,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  13344 => 
  [
    'id' => 13344,
    'type' => 'etcitem',
    'name' => 'Agathion of Love 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing an Agathion of Love Seal Bracelet (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13309,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13345 => 
  [
    'id' => 13345,
    'type' => 'etcitem',
    'name' => 'Halloween Gift Box',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing Pumpkin Transformation Stick (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13324,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13346 => 
  [
    'id' => 13346,
    'type' => 'etcitem',
    'name' => 'Kamaloka Entrance Pass 3-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 5 Sheets of Extra Entrances Passes each to Kamaloka (Hall of the Abyss], Near Kamaloka, and Kamaloka (Labyrinth of the Abyss]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13297,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13298,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 13299,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  13347 => 
  [
    'id' => 13347,
    'type' => 'etcitem',
    'name' => 'Kat the Cat Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Kat the Cat Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13310,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13348 => 
  [
    'id' => 13348,
    'type' => 'etcitem',
    'name' => 'Feline Queen Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Feline Queen Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13311,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13349 => 
  [
    'id' => 13349,
    'type' => 'etcitem',
    'name' => 'Monster Eye Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Monster Eye Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13312,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13350 => 
  [
    'id' => 13350,
    'type' => 'etcitem',
    'name' => 'Brown Bear Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Brown Bear Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13313,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13351 => 
  [
    'id' => 13351,
    'type' => 'etcitem',
    'name' => 'Fungus Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Fungus Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13314,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13352 => 
  [
    'id' => 13352,
    'type' => 'etcitem',
    'name' => 'Skull Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Skull Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13315,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13353 => 
  [
    'id' => 13353,
    'type' => 'etcitem',
    'name' => 'Ornithomimus Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Ornithomimus Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13316,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13354 => 
  [
    'id' => 13354,
    'type' => 'etcitem',
    'name' => 'Feline King Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Feline King Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13317,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13355 => 
  [
    'id' => 13355,
    'type' => 'etcitem',
    'name' => 'Kai the Cat Hat 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Kai the Cat Hat (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13318,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13356 => 
  [
    'id' => 13356,
    'type' => 'etcitem',
    'name' => 'OX Stick 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing an OX Stick (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13319,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13320,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13357 => 
  [
    'id' => 13357,
    'type' => 'etcitem',
    'name' => 'Rock-Paper-Scissors Stick 30-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Rock-Paper-Scissors Stick (30 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13321,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13322,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 13323,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13358 => 
  [
    'id' => 13358,
    'type' => 'etcitem',
    'name' => 'Purple Maned Horse 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a bracelet that summons a Purple Maned Horse (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13308,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13359 => 
  [
    'id' => 13359,
    'type' => 'etcitem',
    'name' => 'Color Name 3-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 3 sheets of Color Names. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13307,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  13360 => 
  [
    'id' => 13360,
    'type' => 'etcitem',
    'name' => 'Color Name 1-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 1 sheets of Color Names. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13307,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13361 => 
  [
    'id' => 13361,
    'type' => 'etcitem',
    'name' => 'My Teleport Scroll 10-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 10 sheets of Free Teleporter\'s Spellbooks. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13016,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  13362 => 
  [
    'id' => 13362,
    'type' => 'etcitem',
    'name' => 'Kamaloka (Hall of the Abyss] 15-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 15 Sheets of Extra Entrance Passes to Kamaloka (Hall of the Abyss]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13297,
        'min' => 15,
        'max' => 15,
        'chance' => 100,
      ],
    ],
  ],
  13363 => 
  [
    'id' => 13363,
    'type' => 'etcitem',
    'name' => 'Near Kamaloka 15-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 15 Sheets of Extra Entrance Passes to Near Kamaloka. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13298,
        'min' => 15,
        'max' => 15,
        'chance' => 100,
      ],
    ],
  ],
  13364 => 
  [
    'id' => 13364,
    'type' => 'etcitem',
    'name' => 'Kamaloka (Labyrinth of the Abyss] 15-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 15 Sheets of Extra Entrance Passes to Kamaloka (Labyrinth of the Abyss]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13299,
        'min' => 15,
        'max' => 15,
        'chance' => 100,
      ],
    ],
  ],
  13365 => 
  [
    'id' => 13365,
    'type' => 'etcitem',
    'name' => 'Kamaloka (Hall of the Abyss] 5-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 5 Sheets of Extra Entrance Passes to Kamaloka (Hall of the Abyss]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13297,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  13366 => 
  [
    'id' => 13366,
    'type' => 'etcitem',
    'name' => 'Near Kamaloka 5-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 5 Sheets of Extra Entrance Passes to Near Kamaloka. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13298,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  13367 => 
  [
    'id' => 13367,
    'type' => 'etcitem',
    'name' => 'Kamaloka (Labyrinth of the Abyss] 5-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 5 Sheets of Extra Entrance Passes to Kamaloka (Labyrinth of the Abyss]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13299,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  13368 => 
  [
    'id' => 13368,
    'type' => 'etcitem',
    'name' => 'Feather of Blessing 1-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing 1 sheets of the Feather of Blessing. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13300,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13369 => 
  [
    'id' => 13369,
    'type' => 'etcitem',
    'name' => 'Agathion of Love 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing an Agathion of Love Seal Bracelet (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13340,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13370 => 
  [
    'id' => 13370,
    'type' => 'etcitem',
    'name' => 'Pumpkin Transformation Stick 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing Pumpkin Transformation Stick (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13339,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13371 => 
  [
    'id' => 13371,
    'type' => 'etcitem',
    'name' => 'Kat the Cat Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Kat the Cat Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13325,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13372 => 
  [
    'id' => 13372,
    'type' => 'etcitem',
    'name' => 'Feline Queen Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Feline Queen Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13326,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13373 => 
  [
    'id' => 13373,
    'type' => 'etcitem',
    'name' => 'Monster Eye Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Monster Eye Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13327,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13374 => 
  [
    'id' => 13374,
    'type' => 'etcitem',
    'name' => 'Brown Bear Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Brown Bear Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13328,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13375 => 
  [
    'id' => 13375,
    'type' => 'etcitem',
    'name' => 'Fungus Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Fungus Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13329,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13376 => 
  [
    'id' => 13376,
    'type' => 'etcitem',
    'name' => 'Skull Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Skull Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13330,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13377 => 
  [
    'id' => 13377,
    'type' => 'etcitem',
    'name' => 'Ornithomimus Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Ornithomimus Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13331,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13378 => 
  [
    'id' => 13378,
    'type' => 'etcitem',
    'name' => 'Feline King Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Feline King Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13332,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13379 => 
  [
    'id' => 13379,
    'type' => 'etcitem',
    'name' => 'Kai the Cat Hat 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Kai the Cat Hat (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13333,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13380 => 
  [
    'id' => 13380,
    'type' => 'etcitem',
    'name' => 'OX Stick 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing an OX Stick (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13334,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13335,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13381 => 
  [
    'id' => 13381,
    'type' => 'etcitem',
    'name' => 'Rock-Paper-Scissors Stick 7-Day Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Rock-Paper-Scissors Stick (7 days]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13336,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13337,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 13338,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13382 => 
  [
    'id' => 13382,
    'type' => 'etcitem',
    'name' => 'Gran Kain\'s Gift Box (Event] - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Gift Box provides you with a free item once a day. Can be used for up to 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'special_cube_i00',
    'etcitem_type' => 'elixir',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2606,
        'level' => 1,
      ],
    ],
    'time' => 43200,
  ],
  13383 => 
  [
    'id' => 13383,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon - 5 hours (Event]',
    'add_name' => '',
    'description' => 'Dimensional item. An exchange coupon that can be exchanged for a necklace that allows you to summon a Hunting Helper (5 hours]. Can be exchanged through the Dimensional Merchant. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse. Can be shared between characters within the account through Dimensional Merchant.',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  13384 => 
  [
    'id' => 13384,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon 3-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item box. A wrapped box containing a ticket that can be exchanged for a necklace that allows you to summon a Hunting Helper (5 hours]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13383,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  13385 => 
  [
    'id' => 13385,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon 1-Sheet Pack (Event]',
    'add_name' => '',
    'description' => 'Dimensional item box. A wrapped box containing 1 ticket sheet that can be exchanged for a necklace that allows you to summon a Hunting Helper (5 hours]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i02',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13383,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  13386 => 
  [
    'id' => 13386,
    'type' => 'etcitem',
    'name' => 'Blue Crystal of Fantasy',
    'add_name' => '',
    'description' => 'Increases SP by 50000 when used. Can be used above level 76. Cannot be exchanged or dropped.',
    'icon' => 'etc_sp_crystal_i00',
    'etcitem_type' => 'scroll',
    'crystal_type' => 's',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2608,
        'level' => 1,
      ],
    ],
  ],
  13387 => 
  [
    'id' => 13387,
    'type' => 'etcitem',
    'name' => 'Green Crystal of Fantasy',
    'add_name' => '',
    'description' => 'Increases SP by 100000 when used. Can be used above level 76. Cannot be exchanged or dropped.',
    'icon' => 'etc_sp_crystal_i02',
    'etcitem_type' => 'scroll',
    'crystal_type' => 's',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2608,
        'level' => 2,
      ],
    ],
  ],
  13388 => 
  [
    'id' => 13388,
    'type' => 'etcitem',
    'name' => 'Red Crystal of Fantasy',
    'add_name' => '',
    'description' => 'Increases SP by 200000 when used. Can be used above level 76. Cannot be exchanged or dropped.',
    'icon' => 'etc_sp_crystal_i01',
    'etcitem_type' => 'scroll',
    'crystal_type' => 's',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2608,
        'level' => 3,
      ],
    ],
  ],
  13389 => 
  [
    'id' => 13389,
    'type' => 'armor',
    'name' => 'Kratei Barbed Shirt',
    'add_name' => 'CP',
    'description' => 'Increases Max CP by 516 when over-enchanted to 4 or more. Cannot be exchanged or dropped.',
    'icon' => 'etc_shirts_a_i04',
    'bodypart' => 'underwear',
    'crystal_type' => 'a',
    'weight' => 130,
    'enchant_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'stats' => 
    [
    ],
  ],
  13390 => 
  [
    'id' => 13390,
    'type' => 'armor',
    'name' => 'Kratei Mithril Shirt',
    'add_name' => 'CP',
    'description' => 'Increases Max CP by 672 when over-enchanted to 4 or more. Cannot be exchanged or dropped.',
    'icon' => 'etc_shirts_s_i05',
    'bodypart' => 'underwear',
    'crystal_type' => 's',
    'weight' => 130,
    'enchant_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'stats' => 
    [
    ],
  ],
  13391 => 
  [
    'id' => 13391,
    'type' => 'armor',
    'name' => 'Kratei Striped Barbed Shirt',
    'add_name' => 'CP',
    'description' => 'Increases Max CP by 564 when over-enchanted to 4 or more. Cannot be exchanged or dropped.',
    'icon' => 'etc_stripe_shirts_a_i04',
    'bodypart' => 'underwear',
    'crystal_type' => 'a',
    'weight' => 130,
    'enchant_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'stats' => 
    [
    ],
  ],
  13392 => 
  [
    'id' => 13392,
    'type' => 'armor',
    'name' => 'Kratei Striped Mithril Shirt',
    'add_name' => 'CP',
    'description' => 'Increases Max CP by 744 when over-enchanted to 4 or more. Cannot be exchanged or dropped.',
    'icon' => 'etc_stripe_shirts_s_i05',
    'bodypart' => 'underwear',
    'crystal_type' => 's',
    'weight' => 130,
    'enchant_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'stats' => 
    [
    ],
  ],
  13393 => 
  [
    'id' => 13393,
    'type' => 'armor',
    'name' => 'Shadow Item - Monkey Hat',
    'add_name' => '',
    'description' => 'A cute Monkey Hat. Uses 2 hair accessory slots. Cannot be exchanged or dropped.',
    'icon' => 'monkey_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
  ],
  13394 => 
  [
    'id' => 13394,
    'type' => 'armor',
    'name' => 'Shadow Item - Pig Hat',
    'add_name' => '',
    'description' => 'A cute Pig Hat. Uses 2 hair accessory slots. Cannot be exchanged or dropped.',
    'icon' => 'event_pig_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
  ],
  13395 => 
  [
    'id' => 13395,
    'type' => 'etcitem',
    'name' => 'Scroll of Escape: Talking Island Village',
    'add_name' => '',
    'description' => 'Teleports you to Talking Island Village. Cannot be sold, exchanged or dropped.',
    'icon' => 'etc_scroll_of_return_i00',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2609,
        'level' => 1,
      ],
    ],
  ],
  13396 => 
  [
    'id' => 13396,
    'type' => 'etcitem',
    'name' => 'Scroll of Escape: Elven Village',
    'add_name' => '',
    'description' => 'Teleports you to the Elven Village. Cannot be sold, exchanged or dropped.',
    'icon' => 'etc_scroll_of_return_i00',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2609,
        'level' => 2,
      ],
    ],
  ],
  13397 => 
  [
    'id' => 13397,
    'type' => 'etcitem',
    'name' => 'Scroll of Escape: Dark Elven Village',
    'add_name' => '',
    'description' => 'Teleports you to the Dark Elven Village. Cannot be sold, exchanged or dropped.',
    'icon' => 'etc_scroll_of_return_i00',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2609,
        'level' => 3,
      ],
    ],
  ],
  13398 => 
  [
    'id' => 13398,
    'type' => 'etcitem',
    'name' => 'Scroll of Escape: Orc Village',
    'add_name' => '',
    'description' => 'Teleports you to the Orc Village. Cannot be sold, exchanged or dropped.',
    'icon' => 'etc_scroll_of_return_i00',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2609,
        'level' => 4,
      ],
    ],
  ],
  13399 => 
  [
    'id' => 13399,
    'type' => 'etcitem',
    'name' => 'Scroll of Escape: Dwarven Village',
    'add_name' => '',
    'description' => 'Magic scroll that moves you to Dwarven Village. No selling to stores, exchange, or drop available for this item.',
    'icon' => 'etc_scroll_of_return_i00',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2609,
        'level' => 5,
      ],
    ],
  ],
];