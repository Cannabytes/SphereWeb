<?php
return [
  21100 => 
  [
    'id' => 21100,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Armor - S',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a S Grade Blessed Armor Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_a_piece_i04',
    'is_stackable' => true,
  ],
  21101 => 
  [
    'id' => 21101,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Weapon - D',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a D Grade Blessed Weapon Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_w_piece_i00',
    'is_stackable' => true,
  ],
  21102 => 
  [
    'id' => 21102,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Weapon - C',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a C Grade Blessed Weapon Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_w_piece_i01',
    'is_stackable' => true,
  ],
  21103 => 
  [
    'id' => 21103,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Weapon - B',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a B Grade Blessed Weapon Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_w_piece_i02',
    'is_stackable' => true,
  ],
  21104 => 
  [
    'id' => 21104,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Weapon - A',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a A Grade Blessed Weapon Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_w_piece_i03',
    'is_stackable' => true,
  ],
  21105 => 
  [
    'id' => 21105,
    'type' => 'etcitem',
    'name' => 'Shiny Cube Fragment Weapon - S',
    'add_name' => '',
    'description' => 'Speak with a warehouse keeper to exchange this for a S Grade Blessed Weapon Enchant Scroll.',
    'icon' => 'Branchsys2.shine_cubic_w_piece_i04',
    'is_stackable' => true,
  ],
  21106 => 
  [
    'id' => 21106,
    'type' => 'etcitem',
    'name' => 'Wondrous Cubic - 1 time use',
    'add_name' => '',
    'description' => 'Double click to create a cube fragment that can be exchanged for a weapon/armor enchant scroll. Cannot be exchanged or dropped. (Disappears after 1 time use.]',
    'icon' => 'Branchsys2.cube_event_i02',
    'etcitem_type' => 'elixir',
    'is_tradable' => false,
    'is_depositable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22180,
        'level' => 1,
      ],
    ],
  ],
  21107 => 
  [
    'id' => 21107,
    'type' => 'etcitem',
    'name' => 'Refined Cube - 1 time use',
    'add_name' => '',
    'description' => 'Double click to create augmenting stones according to type. Cannot be exchanged or dropped. (Disappears after 1 time use.]',
    'icon' => 'Branchsys2.cube_event_i03',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
  ],
  21108 => 
  [
    'id' => 21108,
    'type' => 'armor',
    'name' => 'Warm Bear Hat',
    'add_name' => '',
    'description' => 'Polar bear hat that makes you feel cozy just by looking at it. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_polar_bear_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21109 => 
  [
    'id' => 21109,
    'type' => 'armor',
    'name' => 'Warm Bear Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Polar bear hat that makes you feel cozy just by looking at it. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_polar_bear_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21110 => 
  [
    'id' => 21110,
    'type' => 'weapon',
    'name' => 'Warm Bear Paws',
    'add_name' => '',
    'description' => 'Hand-to-hand combat weapon that looks like cozy bear paws. It has a very low P. Atk.',
    'icon' => 'BranchSys2.br_polar_bear_wp_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'stats' => 
    [
      'pAtk' => 5,
      'mAtk' => 5,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  21111 => 
  [
    'id' => 21111,
    'type' => 'weapon',
    'name' => 'Warm Bear Paws - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Hand-to-hand combat weapon that looks like cozy bear paws. P. Atk. is very low. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_polar_bear_wp_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
    'stats' => 
    [
      'pAtk' => 5,
      'mAtk' => 5,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  21112 => 
  [
    'id' => 21112,
    'type' => 'armor',
    'name' => 'Stag Beetle Hat',
    'add_name' => '',
    'description' => 'Hat shaped like a stag beetle with 2 tough jaws. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_stagbeetle_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21113 => 
  [
    'id' => 21113,
    'type' => 'armor',
    'name' => 'Stag Beetle Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Hat shaped like a stag beetle with 2 tough jaws. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_stagbeetle_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21114 => 
  [
    'id' => 21114,
    'type' => 'armor',
    'name' => 'Beetle Hat',
    'add_name' => '',
    'description' => 'Hat shaped like a beetle with a great horn. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_hornbeetle_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21115 => 
  [
    'id' => 21115,
    'type' => 'armor',
    'name' => 'Beetle Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Hat shaped like a beetle with a great horn. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_hornbeetle_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21116 => 
  [
    'id' => 21116,
    'type' => 'armor',
    'name' => 'Ladybug Hat',
    'add_name' => '',
    'description' => 'Hat shaped like a ladybug with its black and red pattern. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_ladybug_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21117 => 
  [
    'id' => 21117,
    'type' => 'armor',
    'name' => 'Ladybug Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Shaped shaped like a ladybug with its black and red pattern. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_ladybug_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21118 => 
  [
    'id' => 21118,
    'type' => 'armor',
    'name' => 'Preying Mantis Hat',
    'add_name' => '',
    'description' => 'Hat shaped like a preying mantis with sharp claws. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_mantis_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21119 => 
  [
    'id' => 21119,
    'type' => 'armor',
    'name' => 'Preying Mantis Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Hat shaped like a preying mantis with sharp claws. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_mantis_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21120 => 
  [
    'id' => 21120,
    'type' => 'armor',
    'name' => 'Grasshopper Hat',
    'add_name' => '',
    'description' => 'Hat shaped like a grasshopper with large eyes. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_locust_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21121 => 
  [
    'id' => 21121,
    'type' => 'armor',
    'name' => 'Grasshopper Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Hat shaped like a grasshopper with large eyes. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_locust_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21122 => 
  [
    'id' => 21122,
    'type' => 'armor',
    'name' => 'Gold-rimmed Glasses',
    'add_name' => '',
    'description' => 'Expensive-looking gold-rimmed glasses. Uses 1 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_gold_eyeglass_i00',
    'bodypart' => 'hair',
    'weight' => 10,
  ],
  21123 => 
  [
    'id' => 21123,
    'type' => 'armor',
    'name' => 'Gold-rimmed Glasses - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Expensive-looking gold-rimmed glasses. Uses 1 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_gold_eyeglass_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21124 => 
  [
    'id' => 21124,
    'type' => 'armor',
    'name' => 'White Uniform Hat',
    'add_name' => '',
    'description' => 'White uniform hat that makes you feel the energy of a man of the sea. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_navy_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21125 => 
  [
    'id' => 21125,
    'type' => 'armor',
    'name' => 'White Uniform Hat - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'White uniform hat that makes you feel the energy of a man of the sea. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_navy_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21126 => 
  [
    'id' => 21126,
    'type' => 'armor',
    'name' => 'Warrior\'s Helmet',
    'add_name' => '',
    'description' => 'Helmet of a brave ancient warrior. Uses 2 hair accessory slot(s].',
    'icon' => 'BranchSys2.br_close_helmet_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
  ],
  21127 => 
  [
    'id' => 21127,
    'type' => 'armor',
    'name' => 'Warrior\'s Helmet - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Helmet of a brave ancient warrior. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_close_helmet_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21128 => 
  [
    'id' => 21128,
    'type' => 'etcitem',
    'name' => 'Warm Bear Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a warm bear hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21129 => 
  [
    'id' => 21129,
    'type' => 'etcitem',
    'name' => 'Warm Bear Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a warm beat hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21130 => 
  [
    'id' => 21130,
    'type' => 'etcitem',
    'name' => 'Warm Bear Paws Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing warm bear paws. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21131 => 
  [
    'id' => 21131,
    'type' => 'etcitem',
    'name' => 'Warm Bear Paws 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing warm beat paws (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21132 => 
  [
    'id' => 21132,
    'type' => 'etcitem',
    'name' => 'Stag Beetle Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a stag beetle hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21133 => 
  [
    'id' => 21133,
    'type' => 'etcitem',
    'name' => 'Stag Beetle Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a stag beetle hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21134 => 
  [
    'id' => 21134,
    'type' => 'etcitem',
    'name' => 'Beetle Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a beetle hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21135 => 
  [
    'id' => 21135,
    'type' => 'etcitem',
    'name' => 'Beetle Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a beetle hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21136 => 
  [
    'id' => 21136,
    'type' => 'etcitem',
    'name' => 'Ladybug Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a ladybug hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21137 => 
  [
    'id' => 21137,
    'type' => 'etcitem',
    'name' => 'Ladybug Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a ladybug hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21138 => 
  [
    'id' => 21138,
    'type' => 'etcitem',
    'name' => 'Preying Mantis Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a preying mantis hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21139 => 
  [
    'id' => 21139,
    'type' => 'etcitem',
    'name' => 'Preying Mantis Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a preying mantis hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21140 => 
  [
    'id' => 21140,
    'type' => 'etcitem',
    'name' => 'Grasshopper Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a grasshopper hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21141 => 
  [
    'id' => 21141,
    'type' => 'etcitem',
    'name' => 'Grasshopper Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a grasshopper hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21142 => 
  [
    'id' => 21142,
    'type' => 'etcitem',
    'name' => 'Gold-rimmed Glasses Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing gold-rimmed glasses. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21143 => 
  [
    'id' => 21143,
    'type' => 'etcitem',
    'name' => 'Gold-rimmed Glasses 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing gold-rimmed glasses (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21144 => 
  [
    'id' => 21144,
    'type' => 'etcitem',
    'name' => 'White Uniform Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a white uniform hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21145 => 
  [
    'id' => 21145,
    'type' => 'etcitem',
    'name' => 'White Uniform Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a white uniform hat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21146 => 
  [
    'id' => 21146,
    'type' => 'etcitem',
    'name' => 'Warrior\'s Helmet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a warrior\'s helmet. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21147 => 
  [
    'id' => 21147,
    'type' => 'etcitem',
    'name' => 'Warrior\'s Helmet 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a warrior\'s helmet (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21148 => 
  [
    'id' => 21148,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Dragon Master Lee',
    'add_name' => '',
    'description' => 'Scroll for transforming into Dragon Master Lee. The effect lasts for 1 hour(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_scroll_white_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22183,
        'level' => 1,
      ],
    ],
  ],
  21149 => 
  [
    'id' => 21149,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Dragon Master Karin',
    'add_name' => '',
    'description' => 'Scroll for transforming into Dragon Master Karin. The effect lasts for 1 hour(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_scroll_white_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22184,
        'level' => 1,
      ],
    ],
  ],
  21150 => 
  [
    'id' => 21150,
    'type' => 'armor',
    'name' => 'Shiny Lit Platform Summon Bracelet',
    'add_name' => '',
    'description' => 'Can stand upon the shiny platform with brilliant lighting when equipped. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.Icon.br_shiny_platform_i00',
    'bodypart' => 'underwear',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
  ],
  21151 => 
  [
    'id' => 21151,
    'type' => 'etcitem',
    'name' => 'Shiny Lighting',
    'add_name' => '',
    'description' => 'Scroll that summons brilliant, shiny lighting. Can strike a cool pose with lighting from below. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_aga_singer_dancer_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21152 => 
  [
    'id' => 21152,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Singer and Dancer',
    'add_name' => '',
    'description' => 'Bracelet that summons a Singer & Dancer Agathion that gleefully sings and dances. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_aga_singer_dancer_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21233,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23234,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23235,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
  ],
  21153 => 
  [
    'id' => 21153,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Singer and Dancer - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Bracelet that summons a Singer & Dancer Agathion that gleefully sings and dances. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_aga_singer_dancer_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21233,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23234,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23235,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  21154 => 
  [
    'id' => 21154,
    'type' => 'etcitem',
    'name' => 'Singer and Dancer Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Singer & Dancer Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21155 => 
  [
    'id' => 21155,
    'type' => 'etcitem',
    'name' => 'Singer and Dancer Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Singer & Dancer Agathion (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21156 => 
  [
    'id' => 21156,
    'type' => 'etcitem',
    'name' => 'Big Wedding Cake',
    'add_name' => '',
    'description' => 'Scroll that summons a large 3-layer wedding cake, a must-have at any wedding. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.Icon.br_big_wedding_cake_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21157 => 
  [
    'id' => 21157,
    'type' => 'etcitem',
    'name' => 'Flower Shower',
    'add_name' => '',
    'description' => 'A flower shower sprinkled on the bride and groom.',
    'icon' => 'BranchSys2.Icon.br_flower_shower_i00',
    'weight' => 100,
    'is_stackable' => true,
  ],
  21158 => 
  [
    'id' => 21158,
    'type' => 'etcitem',
    'name' => 'Echo Crystal',
    'add_name' => '',
    'description' => 'Crystal that emits a fantasy-like sound when used.',
    'icon' => 'BranchSys2.Icon.br_eco_crystal_i00',
    'weight' => 10,
    'is_stackable' => true,
  ],
  21159 => 
  [
    'id' => 21159,
    'type' => 'armor',
    'name' => 'Wedding Ring - Male',
    'add_name' => '',
    'description' => 'Wedding ring exchanged by an engaged couple. Male use.',
    'icon' => 'BranchSys2.Icon.br_wedding_ring_m_i00',
    'bodypart' => 'rfinger;lfinger',
    'weight' => 150,
    'stats' => 
    [
    ],
  ],
  21160 => 
  [
    'id' => 21160,
    'type' => 'armor',
    'name' => 'Wedding Ring - Female',
    'add_name' => '',
    'description' => 'Wedding ring exchanged by an engaged couple. Female use.',
    'icon' => 'BranchSys2.Icon.br_wedding_ring_f_i00',
    'bodypart' => 'rfinger;lfinger',
    'weight' => 150,
    'stats' => 
    [
    ],
  ],
  21161 => 
  [
    'id' => 21161,
    'type' => 'etcitem',
    'name' => 'Wedding Pack',
    'add_name' => '',
    'description' => 'Wrapped wedding pack containing a honeymoon ticket and a big wedding cake.',
    'icon' => 'BranchSys2.Icon.br_wedding_box_i00',
    'weight' => 100,
    'is_stackable' => true,
  ],
  21162 => 
  [
    'id' => 21162,
    'type' => 'armor',
    'name' => 'Wedding Veil',
    'add_name' => '',
    'description' => 'Pure white and shiny wedding veil. Female exclusive item. Uses 2 hair accessory slot(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_wedding_vail_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
  ],
  21163 => 
  [
    'id' => 21163,
    'type' => 'weapon',
    'name' => 'Wedding Bouquet',
    'add_name' => '',
    'description' => 'A wedding bouquet of beautiful flowers. Female exclusive item. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_wedding_bouquet_i00',
    'weapon_type' => 'etc',
    'bodypart' => 'rhand',
    'weight' => 1600,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 1,
      'pAtkSpd' => 379,
    ],
  ],
  21164 => 
  [
    'id' => 21164,
    'type' => 'etcitem',
    'name' => 'Honeymoon Ticket - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Honeymoon ticket given to the bride and groom as a gift. When used, energy is maintained for 1 hour(s]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.Icon.br_weddin_ticket_i00',
    'weight' => 20,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 10080,
  ],
  21165 => 
  [
    'id' => 21165,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Zaken Spirit Sword',
    'add_name' => '',
    'description' => 'Bracelet that summons Zaken\'s Spirit Sword, which is made up of Zaken\'s 5 swords. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.Icon.br_aga_zaken_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21234,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23236,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23237,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
  ],
  21166 => 
  [
    'id' => 21166,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Zaken\'s Spirit Swords - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Bracelet that summons Zaken\'s Spirit Swords. Can be used for 7 days. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.Icon.br_aga_zaken_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21234,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23236,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23237,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  21167 => 
  [
    'id' => 21167,
    'type' => 'etcitem',
    'name' => 'Zaken Spirit Sword Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Zaken\'s Spirit Sword. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21168 => 
  [
    'id' => 21168,
    'type' => 'etcitem',
    'name' => 'Zaken Spirit Sword Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing Zaken\'s spirit sword (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
  ],
  21169 => 
  [
    'id' => 21169,
    'type' => 'etcitem',
    'name' => 'Birthday Present Pack',
    'add_name' => '',
    'description' => 'Birthday present given to you by Alegria on your birthday. When used, you will obtain (1] Cake Topper hat, (1] Birthday Vitality Potion and (1] Birthday Cake. Cannot be exchanged or dropped. Can be stored in private warehouse.',
    'icon' => 'event_hero_treasure_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21170,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 21595,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 21594,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21170 => 
  [
    'id' => 21170,
    'type' => 'etcitem',
    'name' => 'Birthday Vitality Potion',
    'add_name' => '',
    'description' => 'Upon use, for 12 hours, when Exp. is acquired through hunting, vitality is recovered. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_potion_blue_i00',
    'etcitem_type' => 'potion',
    'weight' => 80,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22182,
        'level' => 1,
      ],
    ],
  ],
  21171 => 
  [
    'id' => 21171,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Treasure Hunter',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Treasure Hunter for 10 minutes. If used on Fantasy Isle, you can find Event Treasure Chests. No effect if used while already transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'weight' => 120,
    'is_stackable' => true,
  ],
  21172 => 
  [
    'id' => 21172,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Onyx Beast',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into an Onyx Beast for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22191,
        'level' => 1,
      ],
    ],
  ],
  21173 => 
  [
    'id' => 21173,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Death Blader',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Death Blader for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22192,
        'level' => 1,
      ],
    ],
  ],
  21174 => 
  [
    'id' => 21174,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Grail Apostle',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Grail Apostle for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22193,
        'level' => 1,
      ],
    ],
  ],
  21175 => 
  [
    'id' => 21175,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Unicorn',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Unicorn for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22194,
        'level' => 1,
      ],
    ],
  ],
  21176 => 
  [
    'id' => 21176,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Lilim Knight',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Lilim Knight for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22195,
        'level' => 1,
      ],
    ],
  ],
  21177 => 
  [
    'id' => 21177,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Golem Guardian',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Golem Guardian for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22196,
        'level' => 1,
      ],
    ],
  ],
  21178 => 
  [
    'id' => 21178,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Inferno Drake',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into an Inferno Drake for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22197,
        'level' => 1,
      ],
    ],
  ],
  21179 => 
  [
    'id' => 21179,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Dragon Bomber',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Dragon Bomber for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22198,
        'level' => 1,
      ],
    ],
  ],
  21180 => 
  [
    'id' => 21180,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Heretic',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Heretic for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22199,
        'level' => 1,
      ],
    ],
  ],
  21181 => 
  [
    'id' => 21181,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Veil Master',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Veil Master for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22200,
        'level' => 1,
      ],
    ],
  ],
  21182 => 
  [
    'id' => 21182,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Saber Tooth Tiger',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Saber Tooth Tiger for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22201,
        'level' => 1,
      ],
    ],
  ],
  21183 => 
  [
    'id' => 21183,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Ol Mahum',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into an Ol Mahum for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22202,
        'level' => 1,
      ],
    ],
  ],
  21184 => 
  [
    'id' => 21184,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Doll Blader',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into a Doll Blader for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22203,
        'level' => 1,
      ],
    ],
  ],
  21185 => 
  [
    'id' => 21185,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Zaken',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Zaken for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22204,
        'level' => 1,
      ],
    ],
  ],
  21186 => 
  [
    'id' => 21186,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Anakim',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Anakim for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22205,
        'level' => 1,
      ],
    ],
  ],
  21187 => 
  [
    'id' => 21187,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Venom',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Venom for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22206,
        'level' => 1,
      ],
    ],
  ],
  21188 => 
  [
    'id' => 21188,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Gordon',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Gordon for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22207,
        'level' => 1,
      ],
    ],
  ],
  21189 => 
  [
    'id' => 21189,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Ranku',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Ranku for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22208,
        'level' => 1,
      ],
    ],
  ],
  21190 => 
  [
    'id' => 21190,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Kechi',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Kechi for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22209,
        'level' => 1,
      ],
    ],
  ],
  21191 => 
  [
    'id' => 21191,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Demon Prince',
    'add_name' => 'Event',
    'description' => 'Transformation scroll that transforms you into Demon Prince for 30 minute(s]. No effect if used while transformed.',
    'icon' => 'etc_trans_4f_s_b_01',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22210,
        'level' => 1,
      ],
    ],
  ],
  21192 => 
  [
    'id' => 21192,
    'type' => 'etcitem',
    'name' => 'Dimension Diamond Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 50 dimension diamonds. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21193 => 
  [
    'id' => 21193,
    'type' => 'etcitem',
    'name' => 'Dimension Diamond',
    'add_name' => '',
    'description' => 'Dimensional item. Magic crystal needed when casting instant moving magic. If you collect them and bring them to the Gatekeeper, you can exchange them for various types of escape scrolls. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_gem_clear_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21194 => 
  [
    'id' => 21194,
    'type' => 'etcitem',
    'name' => 'Blessed Scroll of Escape Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 blessed scroll of escape. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21195 => 
  [
    'id' => 21195,
    'type' => 'etcitem',
    'name' => 'Blessed Scroll of Escape',
    'add_name' => '',
    'description' => 'Dimensional item. Magic scroll that moves you to the nearest village. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_scroll_of_return_i01',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21196 => 
  [
    'id' => 21196,
    'type' => 'etcitem',
    'name' => 'Highest Power Temporary Healing Potion Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 5 highest power temporary healing potion(s]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21197 => 
  [
    'id' => 21197,
    'type' => 'etcitem',
    'name' => 'Highest Power Temporary Healing Potion',
    'add_name' => '',
    'description' => 'Dimensional item. Magic potion that temporarily and greatly recovers stamina. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_potion_gold_i00',
    'weight' => 180,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21198 => 
  [
    'id' => 21198,
    'type' => 'etcitem',
    'name' => 'Mysterious Scroll Pack - 2 Prophecies of Wind',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 2 mysterious scrolls - prophecy of wind. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21200,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
    ],
  ],
  21199 => 
  [
    'id' => 21199,
    'type' => 'etcitem',
    'name' => 'Mysterious Scroll Pack - 8 Prophecies of Wind',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 8 mysterious scrolls - prophecy of wind. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21200,
        'min' => 8,
        'max' => 8,
        'chance' => 100,
      ],
    ],
  ],
];