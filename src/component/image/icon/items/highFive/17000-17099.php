<?php
return [
  17000 => 
  [
    'id' => 17000,
    'type' => 'etcitem',
    'name' => 'Black Ore Set of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire a Black Ore Set of Fortune. Expires after 90 days if not used. Cannot be exchanged or dropped.',
    'icon' => 'etc_jewel_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'time' => 129600,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 16858,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 16857,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 16859,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
    ],
  ],
  17001 => 
  [
    'id' => 17001,
    'type' => 'etcitem',
    'name' => 'Sealed Set of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire a Sealed Set of Fortune. Expires after 90 days if not used. Cannot be exchanged or dropped.',
    'icon' => 'etc_jewel_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'time' => 129600,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 16861,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 16860,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 16862,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
    ],
  ],
  17002 => 
  [
    'id' => 17002,
    'type' => 'etcitem',
    'name' => 'Elven Set of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire an Elven Set of Fortune. Expires after 90 days if not used. Cannot be exchanged or dropped.',
    'icon' => 'etc_jewel_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'time' => 129600,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 16864,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 16863,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 16865,
        'min' => 2,
        'max' => 2,
        'chance' => 100,
      ],
    ],
  ],
  17003 => 
  [
    'id' => 17003,
    'type' => 'etcitem',
    'name' => 'Santa Claus\'s Gift',
    'add_name' => 'Event',
    'description' => 'Santa Claus\'s Gift. One can receive the gift when double clicked.',
    'icon' => 'lucky_bag_box_i00',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9085,
        'level' => 1,
      ],
    ],
  ],
  17004 => 
  [
    'id' => 17004,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Kid Rudolph - Event',
    'add_name' => 'Event',
    'description' => 'Bracelet that summons a cute Kid Rudolph Agathion that gives you a Santa Claus\'s Gift. The Kid Rudolph gives you Santa Claus\'s gift every 30 minutes after being summoned. No exchange/drop available',
    'icon' => 'etc_rbracelet_aga_agit_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 8464,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
  ],
  17005 => 
  [
    'id' => 17005,
    'type' => 'etcitem',
    'name' => 'Santa - Potion of Will - Event',
    'add_name' => 'Event',
    'description' => 'It recovers CP by 300.',
    'icon' => 'etc_cp_potion_i01',
    'etcitem_type' => 'potion',
    'weight' => 20,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9086,
        'level' => 2,
      ],
    ],
  ],
  17006 => 
  [
    'id' => 17006,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Breastplate',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Breastplate Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t94_u_i02',
    'armor_type' => 'heavy',
    'bodypart' => 'chest',
    'crystal_count' => 2240,
    'crystal_type' => 's84',
    'weight' => 7520,
    'price' => 46668000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17007 => 
  [
    'id' => 17007,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Leather Breastplate',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Leather Breastplate. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t95_u_i02',
    'armor_type' => 'light',
    'bodypart' => 'chest',
    'crystal_count' => 1680,
    'crystal_type' => 's84',
    'weight' => 4140,
    'price' => 35000000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17008 => 
  [
    'id' => 17008,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Tunic',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Tunic. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t96_u_i02',
    'armor_type' => 'magic',
    'bodypart' => 'chest',
    'crystal_count' => 1680,
    'crystal_type' => 's84',
    'weight' => 1750,
    'price' => 35000000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17009 => 
  [
    'id' => 17009,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Gaiters',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Gaiter. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t94_l_i02',
    'armor_type' => 'heavy',
    'bodypart' => 'legs',
    'crystal_count' => 1400,
    'crystal_type' => 's84',
    'weight' => 3170,
    'price' => 29168000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17010 => 
  [
    'id' => 17010,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Gauntlet',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Gauntlet. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t94_g_i02',
    'bodypart' => 'gloves',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 510,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17011 => 
  [
    'id' => 17011,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Boots',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Boots. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t94_b_i02',
    'bodypart' => 'feet',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 1070,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17012 => 
  [
    'id' => 17012,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Leather Leggings',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Leather Legging. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t95_l_i02',
    'armor_type' => 'light',
    'bodypart' => 'legs',
    'crystal_count' => 1050,
    'crystal_type' => 's84',
    'weight' => 1320,
    'price' => 21876000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17013 => 
  [
    'id' => 17013,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Leather Gloves',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Leather Gloves. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t95_g_i02',
    'bodypart' => 'gloves',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 510,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17014 => 
  [
    'id' => 17014,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Leather Boots',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Leather Boots. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t95_b_i02',
    'bodypart' => 'feet',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 1070,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17015 => 
  [
    'id' => 17015,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Stockings',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Stockings. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t96_l_i02',
    'armor_type' => 'magic',
    'bodypart' => 'legs',
    'crystal_count' => 1050,
    'crystal_type' => 's84',
    'weight' => 850,
    'price' => 21876000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17016 => 
  [
    'id' => 17016,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Gloves',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Gloves. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t96_g_i02',
    'bodypart' => 'gloves',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 510,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17017 => 
  [
    'id' => 17017,
    'type' => 'armor',
    'name' => 'Sealed Vesper Noble Shoes',
    'add_name' => '',
    'description' => 'Sealed Vesper Noble Shoes. Seal can be removed by the Blacksmith of Mammon or Maestro Ishuma.',
    'icon' => 'armor_t96_b_i02',
    'bodypart' => 'feet',
    'crystal_count' => 560,
    'crystal_type' => 's84',
    'weight' => 1070,
    'price' => 11667000,
    'element_enabled' => true,
    'enchant_enabled' => true,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  17018 => 
  [
    'id' => 17018,
    'type' => 'etcitem',
    'name' => 'Hot Springs Potion',
    'add_name' => '',
    'description' => 'Bottle containing hot springs water. It might have healing effects against maladies.',
    'icon' => 'etc_cp_potion_i01',
    'etcitem_type' => 'potion',
    'weight' => 20,
    'price' => 2500,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9078,
        'level' => 1,
      ],
    ],
  ],
  17019 => 
  [
    'id' => 17019,
    'type' => 'etcitem',
    'name' => 'Mounting Item 3 Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Wrapped pack containing a Gold Maned Lion Mount Bracelet (7 day], a Darkmane Pacer Mount Bracelet (7 day], and a Steam Beatle Mount Bracelet (7 day]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13121,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 14231,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 14232,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17020 => 
  [
    'id' => 17020,
    'type' => 'etcitem',
    'name' => 'Fresh Milk Pack - For Events',
    'add_name' => '',
    'description' => 'Dimensional item pack. Event - Wrapped pack containing fresh milk. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 14739,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17021 => 
  [
    'id' => 17021,
    'type' => 'etcitem',
    'name' => 'Dimensional Experience Pack 30 - For Events',
    'add_name' => '',
    'description' => 'Dimensional item pack. Event - Wrapped pack containing a High-Grade Hunting Helper Exchange Coupon 2-Sheet Pack, a Feather of Blessing 3-Sheet Pack, and a Kamaloka Entrance Pass 3-Sheet Pack. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i01',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 14239,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 13082,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 13085,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17022 => 
  [
    'id' => 17022,
    'type' => 'etcitem',
    'name' => 'Varka Karm Pack - For Events',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Varka Karm (used by Varka Silenos]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i01',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13234,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17023 => 
  [
    'id' => 17023,
    'type' => 'etcitem',
    'name' => 'Ketra Karm Pack - For Events',
    'add_name' => '',
    'description' => 'Dimensional item pack. A wrapped pack containing a Ketra Karm (used by Ketra Orcs]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i01',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 13235,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17024 => 
  [
    'id' => 17024,
    'type' => 'etcitem',
    'name' => 'Vitality Maintaining Potion Pack - For Events',
    'add_name' => '',
    'description' => 'Dimensional item pack. Event - Wrapped pack containing 5 Potions of Energy (30min]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i01',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 15440,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  17025 => 
  [
    'id' => 17025,
    'type' => 'etcitem',
    'name' => 'PC Points (7000 Points] Pack - Event',
    'add_name' => '',
    'description' => 'Dimensional item pack. Event - Wrapped pack containing 7000 PC cafe points. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i01',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 14559,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17026 => 
  [
    'id' => 17026,
    'type' => 'etcitem',
    'name' => 'Admiral\'s Cap Pack - For Events',
    'add_name' => '',
    'description' => 'Admiral\'s Cap - Wrapped pack for event. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 8919,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17027 => 
  [
    'id' => 17027,
    'type' => 'etcitem',
    'name' => 'Straw Hat - For Events',
    'add_name' => '',
    'description' => 'Straw Hat - Wrapped pack for event. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 10616,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17028 => 
  [
    'id' => 17028,
    'type' => 'etcitem',
    'name' => 'Phantom Mask Pack - For Events',
    'add_name' => '',
    'description' => 'Phantom Mask - Wrapped pack for event. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 9208,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17029 => 
  [
    'id' => 17029,
    'type' => 'etcitem',
    'name' => 'Black Phantom Mask Pack - For Events',
    'add_name' => '',
    'description' => 'Black Phantom Mask - Wrapped pack for event. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 9409,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17030 => 
  [
    'id' => 17030,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Create Item Lv 10',
    'add_name' => '',
    'description' => 'Forgotten Scroll for learning Create Item Lv 10. Only Maestro can use it. Can be acquired by level 82.',
    'icon' => 'BranchSys2.Icon.br_spell_books_sword_i01',
    'weight' => 120,
    'price' => 120000,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9087,
        'level' => 1,
      ],
    ],
  ],
  17031 => 
  [
    'id' => 17031,
    'type' => 'etcitem',
    'name' => 'Freya White Pack',
    'add_name' => '',
    'description' => '3 Vitality Replenishing Beverages. Fire, Water, Wind, Earth, Holy, and Dark Crystals. Circlet of Freezing - Wrapped pack for event. Cannot be exchanged or dropped. Can be stored in private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17033,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 9552,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 9553,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 9554,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      4 => 
      [
        'item_id' => 9555,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      5 => 
      [
        'item_id' => 9556,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      6 => 
      [
        'item_id' => 9557,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      7 => 
      [
        'item_id' => 14055,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  17032 => 
  [
    'id' => 17032,
    'type' => 'etcitem',
    'name' => 'Hero\'s Treasure Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Hero\'s Treasure Chest. Cannot be exchanged or dropped.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 16852,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17033 => 
  [
    'id' => 17033,
    'type' => 'armor',
    'name' => 'Circlet of Freeze - For Events - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Circlet that has the power of Freeze. Resistance to Water increases by 30. Uses 2 hair accessory slots. 30-day limited period item.',
    'icon' => 'accessory_ice_circlet_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8497,
        'level' => 1,
      ],
    ],
    'time' => 43200,
  ],
  17034 => 
  [
    'id' => 17034,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Fighter\'s Will - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll to learn the Fighter\'s Will. Fighters use it. Can be acquired at level 81. Cannot be exchanged or dropped. Event item.',
    'icon' => 'BranchSys2.Icon.br_spell_books_sword_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9090,
        'level' => 1,
      ],
    ],
  ],
  17035 => 
  [
    'id' => 17035,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Archer\'s Will - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll to learn the Archer\'s Will. Fighters use it. Can be acquired at level 81. Cannot be exchanged or dropped. Event item.',
    'icon' => 'BranchSys2.Icon.br_spell_books_sword_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9091,
        'level' => 1,
      ],
    ],
  ],
  17036 => 
  [
    'id' => 17036,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Magician\'s Will - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll to learn Magician\'s Will. Used by the Mage types. Can be acquired at level 81. Cannot be exchanged or dropped. Event item.',
    'icon' => 'BranchSys2.Icon.br_spell_books_magic_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9092,
        'level' => 1,
      ],
    ],
  ],
  17037 => 
  [
    'id' => 17037,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Protection of Rune - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll for learning Protection of Rune. Can be acquired at level 82. Cannot be exchanged or dropped. Event item.',
    'icon' => 'etc_spell_books_element_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9093,
        'level' => 1,
      ],
    ],
  ],
  17038 => 
  [
    'id' => 17038,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Protection of Elemental - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll for learning Protection of Elemental. Can be acquired at level 82. Cannot be exchanged or dropped. Event item.',
    'icon' => 'etc_spell_books_element_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9094,
        'level' => 1,
      ],
    ],
  ],
  17039 => 
  [
    'id' => 17039,
    'type' => 'etcitem',
    'name' => 'Forgotten Scroll - Protection of Alignment - For Events',
    'add_name' => '',
    'description' => 'Forgotten Scroll for learning Protection of Alignment. Can be acquired at level 82. Cannot be exchanged or dropped. Event item.',
    'icon' => 'etc_spell_books_element_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9095,
        'level' => 1,
      ],
    ],
  ],
  17040 => 
  [
    'id' => 17040,
    'type' => 'etcitem',
    'name' => 'Love Box Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Love Box. Cannot be exchanged or dropped. Can be stored in a private warehouse. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_pi_box_love_pack',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17044,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17041 => 
  [
    'id' => 17041,
    'type' => 'etcitem',
    'name' => 'Sentiment Box Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Sentiment Box. Cannot be exchanged or dropped. Can be stored in a private warehouse. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_pi_box_belief_pack',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17045,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17042 => 
  [
    'id' => 17042,
    'type' => 'etcitem',
    'name' => 'Confession Box Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Confession Box. Cannot be exchanged or dropped. Can be stored in a private warehouse. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_pi_box_wish_pack',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17046,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17043 => 
  [
    'id' => 17043,
    'type' => 'etcitem',
    'name' => 'Joy Box Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Joy Box. Cannot be exchanged or dropped. Can be stored in a private warehouse. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_pi_box_joy_pack',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17047,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17044 => 
  [
    'id' => 17044,
    'type' => 'etcitem',
    'name' => 'Love Box',
    'add_name' => '',
    'description' => 'Contains a Talisman - STR, DEX, CON. Cannot be dropped or destroyed. Can be stored in a private warehouse. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'etc_pi_box_love_pack',
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17051,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 17052,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 17053,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17045 => 
  [
    'id' => 17045,
    'type' => 'etcitem',
    'name' => 'Sentiment Box',
    'add_name' => '',
    'description' => 'Contains a Talisman - WIT, MEN, INT. Cannot be dropped or destroyed. Can be stored in a private warehouse. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'etc_pi_box_belief_pack',
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17054,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 17055,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 17056,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17046 => 
  [
    'id' => 17046,
    'type' => 'etcitem',
    'name' => 'Confession Box',
    'add_name' => '',
    'description' => 'Contains a Talisman - Resistance to Stun/Sleep/Hold/Paralysis. Cannot be dropped or destroyed. Can be stored in a private warehouse. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'etc_pi_box_wish_pack',
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17057,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 17058,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 17059,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 17060,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17047 => 
  [
    'id' => 17047,
    'type' => 'etcitem',
    'name' => 'Joy Box',
    'add_name' => '',
    'description' => 'Contains a Love, Sentiment, and Confession Box. Cannot be dropped or destroyed. Can be stored in a private warehouse. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'etc_pi_box_joy_pack',
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17044,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 17045,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 17046,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 17050,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      4 => 
      [
        'item_id' => 17061,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17048 => 
  [
    'id' => 17048,
    'type' => 'etcitem',
    'name' => 'Shiny Bracelet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Shiny Bracelet. Cannot be traded, dropped, or destroyed. Can be stored in a private warehouse. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_pi_gift_box_i04',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17049,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17049 => 
  [
    'id' => 17049,
    'type' => 'armor',
    'name' => 'Shiny Bracelet',
    'add_name' => '',
    'description' => 'Activates three talisman slots when equipped. Cannot be equipped in the Olympiad Arena. Cannot be exchanged or dropped. Can be stored in a private warehouse. . This item will be deleted after the July 7th maintenance time.',
    'icon' => 'accessory_shiny_bracelet',
    'bodypart' => 'rbracelet',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3324,
        'level' => 1,
      ],
    ],
  ],
  17050 => 
  [
    'id' => 17050,
    'type' => 'armor',
    'name' => 'Shiny Couple Ring',
    'add_name' => '',
    'description' => 'Summons another player. Both the summoner and the one being summoned must have it equipped. Reuse waiting time is 1 hour. Cannot be traded or dropped. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'accessory_shiny_couple_ring',
    'bodypart' => 'rfinger;lfinger',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8510,
        'level' => 1,
      ],
    ],
  ],
  17051 => 
  [
    'id' => 17051,
    'type' => 'armor',
    'name' => 'Talisman - STR',
    'add_name' => '',
    'description' => 'Event item. STR +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8498,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17052 => 
  [
    'id' => 17052,
    'type' => 'armor',
    'name' => 'Talisman - DEX',
    'add_name' => '',
    'description' => 'Event item. DEX +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8499,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17053 => 
  [
    'id' => 17053,
    'type' => 'armor',
    'name' => 'Talisman - CON',
    'add_name' => '',
    'description' => 'Event item. CON +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8500,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17054 => 
  [
    'id' => 17054,
    'type' => 'armor',
    'name' => 'Talisman - WIT',
    'add_name' => '',
    'description' => 'Event item. WIT +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8502,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17055 => 
  [
    'id' => 17055,
    'type' => 'armor',
    'name' => 'Talisman - INT',
    'add_name' => '',
    'description' => 'Event item. INT +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8501,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17056 => 
  [
    'id' => 17056,
    'type' => 'armor',
    'name' => 'Talisman - MEN',
    'add_name' => '',
    'description' => 'Event item. MEN +2 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i00',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8503,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17057 => 
  [
    'id' => 17057,
    'type' => 'armor',
    'name' => 'Talisman - Resistance to Stun',
    'add_name' => '',
    'description' => 'Event item. Resistance to Stun +15 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i01',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8504,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17058 => 
  [
    'id' => 17058,
    'type' => 'armor',
    'name' => 'Talisman - Resistance to Sleep',
    'add_name' => '',
    'description' => 'Event item. Resistance to Sleep +15 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i01',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8505,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17059 => 
  [
    'id' => 17059,
    'type' => 'armor',
    'name' => 'Talisman - Resistance to Hold',
    'add_name' => '',
    'description' => 'Event item. Resistance to Hold +15 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i01',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8506,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17060 => 
  [
    'id' => 17060,
    'type' => 'armor',
    'name' => 'Talisman - Paralyze Resistance',
    'add_name' => '',
    'description' => 'Event item. Paralysis resistance +15 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted in bulk after the regular maintenance time on Jul. 7.',
    'icon' => 'etc_talisman_event_i01',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8507,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17061 => 
  [
    'id' => 17061,
    'type' => 'armor',
    'name' => 'Talisman - ALL STAT',
    'add_name' => '',
    'description' => 'Event item. All stats increase by 1 when equipped. Cannot be traded, dropped, destroyed, or used in the Olympiad. . This item will be deleted after the regular maintenance on July 7th.',
    'icon' => 'etc_talisman_event_i02',
    'bodypart' => 'deco1',
    'equip_reuse_delay' => '30',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 8508,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  17062 => 
  [
    'id' => 17062,
    'type' => 'etcitem',
    'name' => 'Event - Scroll of Summon Baby White Tiger',
    'add_name' => '',
    'description' => 'Scroll that summons a baby White Tiger. If you relieve the Baby White Tiger\'s fatigue, you can acquire Apiga. (Recovery is only possible through Cupid\'s Fatigue Recovery Potion or Cupid\'s Powerful Fatigue Recovery Potion.] Exchange possible.',
    'icon' => 'etc_scroll_of_tiger_a',
    'etcitem_type' => 'scroll',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9096,
        'level' => 1,
      ],
    ],
  ],
  17063 => 
  [
    'id' => 17063,
    'type' => 'etcitem',
    'name' => 'Event - Scroll of Summon Gloomy Baby White Tiger',
    'add_name' => '',
    'description' => 'Scroll that summons a Gloomy Baby White Tiger. Can sometimes transform into a White Tiger while trying to recover the Baby White Tiger. (Recovery is only possible through Cupid\'s Fatigue Recovery Potion or Cupid\'s Powerful Fatigue Recovery Potion.] Exchange possible.',
    'icon' => 'etc_scroll_of_tiger_a',
    'etcitem_type' => 'scroll',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9098,
        'level' => 1,
      ],
    ],
  ],
  17064 => 
  [
    'id' => 17064,
    'type' => 'etcitem',
    'name' => 'Event - Scroll of Summon Baby White Tiger Captain',
    'add_name' => '',
    'description' => 'Scroll that summons a baby White Tiger Captain. If you relieve the Baby White Tiger Captain\'s fatigue, you can acquire Apiga. (Recovery is only possible through Cupid\'s Fatigue Recovery Potion or Cupid\'s Powerful Fatigue Recovery Potion.] Exchange possible.',
    'icon' => 'etc_scroll_of_tiger_b',
    'etcitem_type' => 'scroll',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9097,
        'level' => 1,
      ],
    ],
  ],
  17065 => 
  [
    'id' => 17065,
    'type' => 'etcitem',
    'name' => 'Event - Scroll of Summon Gloomy Baby White Tiger Captain',
    'add_name' => '',
    'description' => 'Scroll that summons a Gloomy Baby White Tiger Captain. Can sometimes transform into a White Tiger Captain while trying to recover the Baby White Tiger. (Recovery is only possible through Cupid\'s Fatigue Recovery Potion or Cupid\'s Powerful Fatigue Recovery Potion.] Exchange possible.',
    'icon' => 'etc_scroll_of_tiger_b',
    'etcitem_type' => 'scroll',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9099,
        'level' => 1,
      ],
    ],
  ],
  17066 => 
  [
    'id' => 17066,
    'type' => 'etcitem',
    'name' => 'Event - Save the White Tiger Event Pack',
    'add_name' => '',
    'description' => 'An event pack that can be obtained 1 time per account every 12 hours. By double clicking, you can obtain the Baby White Tiger Summon Scroll and "Cupid\'s Fatigue Recovery Potion" that are needed for the event. No exchange available.',
    'icon' => 'etc_jewel_box_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 17067,
        'min' => 60,
        'max' => 60,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 17068,
        'min' => 15,
        'max' => 15,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 17062,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 17064,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17067 => 
  [
    'id' => 17067,
    'type' => 'etcitem',
    'name' => 'Event - Cupid\'s Fatigue Relief Potion',
    'add_name' => '',
    'description' => 'Decreases fatigue when used on a White Tiger.',
    'icon' => 'etc_faitgue_relief_of_cupid_i00',
    'etcitem_type' => 'elixir',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9088,
        'level' => 1,
      ],
    ],
  ],
  17068 => 
  [
    'id' => 17068,
    'type' => 'etcitem',
    'name' => 'Event - Cupid\'s Powerful Fatigue Relief Potion',
    'add_name' => '',
    'description' => 'Decreases fatigue when used on a White Tiger. It has a better effect than Cupid\'s Fatigue Recovery Potion.',
    'icon' => 'etc_nutrients_of_cupid_i00',
    'etcitem_type' => 'elixir',
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9089,
        'level' => 1,
      ],
    ],
  ],
  17069 => 
  [
    'id' => 17069,
    'type' => 'etcitem',
    'name' => 'Vesper Weapon Box',
    'add_name' => 'Event',
    'description' => 'Box containing a Vesper weapon. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9100,
        'level' => 1,
      ],
    ],
  ],
  17070 => 
  [
    'id' => 17070,
    'type' => 'etcitem',
    'name' => 'Icarus Weapon Box',
    'add_name' => 'Event',
    'description' => 'Box containing an Icarus weapon. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9101,
        'level' => 1,
      ],
    ],
  ],
  17071 => 
  [
    'id' => 17071,
    'type' => 'etcitem',
    'name' => 'Dynasty Weapon Box',
    'add_name' => 'Event',
    'description' => 'Box containing a Dynasty weapon. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9102,
        'level' => 1,
      ],
    ],
  ],
  17072 => 
  [
    'id' => 17072,
    'type' => 'etcitem',
    'name' => 'Vesper Armor Box',
    'add_name' => 'Event',
    'description' => 'Box containing a Vesper armor. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9103,
        'level' => 1,
      ],
    ],
  ],
  17073 => 
  [
    'id' => 17073,
    'type' => 'etcitem',
    'name' => 'Moirai Armor Box',
    'add_name' => 'Event',
    'description' => 'Box containing a Moirai armor. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9104,
        'level' => 1,
      ],
    ],
  ],
  17074 => 
  [
    'id' => 17074,
    'type' => 'etcitem',
    'name' => 'Dynasty Armor Box',
    'add_name' => 'Event',
    'description' => 'Box containing a Dynasty armor. Which one could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9105,
        'level' => 1,
      ],
    ],
  ],
  17075 => 
  [
    'id' => 17075,
    'type' => 'etcitem',
    'name' => 'Soul Crystal - Stage 14 Box - Event',
    'add_name' => 'Event',
    'description' => 'Box containing a Soul Crystal - Stage 14. What color could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9106,
        'level' => 1,
      ],
    ],
  ],
  17076 => 
  [
    'id' => 17076,
    'type' => 'etcitem',
    'name' => 'Soul Crystal - Stage 15 Box - Event',
    'add_name' => 'Event',
    'description' => 'Box containing a Soul Crystal -Stage 15. What color could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9107,
        'level' => 1,
      ],
    ],
  ],
  17077 => 
  [
    'id' => 17077,
    'type' => 'etcitem',
    'name' => 'Soul Crystal - Stage 16 Box - Event',
    'add_name' => 'Event',
    'description' => 'Box containing a Soul Crystal - Stage 16. What color could it be?',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9108,
        'level' => 1,
      ],
    ],
  ],
  17078 => 
  [
    'id' => 17078,
    'type' => 'etcitem',
    'name' => 'Potion Box of Mask Type',
    'add_name' => '',
    'description' => 'Box containing a Facelifting Potion. Sometimes, Fresh Milk also comes out.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9109,
        'level' => 1,
      ],
    ],
  ],
  17079 => 
  [
    'id' => 17079,
    'type' => 'etcitem',
    'name' => 'Potion Box of Hair Color',
    'add_name' => '',
    'description' => 'Box containing a Dye Potion. Sometimes, Fresh Milk also comes out.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9110,
        'level' => 1,
      ],
    ],
  ],
  17080 => 
  [
    'id' => 17080,
    'type' => 'etcitem',
    'name' => 'Potion Box of Hair Style',
    'add_name' => '',
    'description' => 'Box containing a Hair Style Change Potion. Sometimes, Fresh Milk also comes out.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9111,
        'level' => 1,
      ],
    ],
  ],
  17081 => 
  [
    'id' => 17081,
    'type' => 'etcitem',
    'name' => 'Golden Apigas Box',
    'add_name' => '',
    'description' => 'Box containing an S-grade Gemstone and an Attribute Ore.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9112,
        'level' => 1,
      ],
    ],
  ],
  17082 => 
  [
    'id' => 17082,
    'type' => 'etcitem',
    'name' => 'Transformation Sealbook: Anakim Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Transformation Sealbook: Anakim. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 10296,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17083 => 
  [
    'id' => 17083,
    'type' => 'etcitem',
    'name' => 'Bird Nest - For Events',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Bird Nest (event]. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 10613,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17084 => 
  [
    'id' => 17084,
    'type' => 'etcitem',
    'name' => 'Shadow Item - Magician Cap Pack - Blessed Escape',
    'add_name' => 'Escape',
    'description' => 'Wrapped pack containing a Shadow Item - Magician Cap. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 9187,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17085 => 
  [
    'id' => 17085,
    'type' => 'etcitem',
    'name' => 'Shadow Item - Magician Cap Pack - Big Head',
    'add_name' => 'Big Head',
    'description' => 'Wrapped pack containing a Shadow Item - Magician Cap. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 9194,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17086 => 
  [
    'id' => 17086,
    'type' => 'etcitem',
    'name' => 'Shadow Item - Magician Cap Pack - Firework',
    'add_name' => 'Firework',
    'description' => 'Wrapped pack containing a Shadow Item - Magician Cap. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 9201,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  17087 => 
  [
    'id' => 17087,
    'type' => 'etcitem',
    'name' => 'Twin Coba Seed',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Oren region, twin Coba will grow. The success rate is high when a level 77~87 character uses it on a level 77~87 monster.',
    'icon' => 'etc_twin_coba_seed_i00',
    'etcitem_type' => 'seed',
    'weight' => 1,
    'price' => 1000,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17088 => 
  [
    'id' => 17088,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Twin Coba',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Oren region, Improved Twin Coba will grow. The success rate is high when a level 77~87 character uses it on a level 77~87 monster.',
    'icon' => 'etc_twin_coba_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 1000,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17089 => 
  [
    'id' => 17089,
    'type' => 'etcitem',
    'name' => 'Red Coba Seed',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Schuttgart region, Red Coba will grow. The success rate is high when a level 65~75 character uses it on a level 65~75 monster.',
    'icon' => 'etc_red_coba_seed_i00',
    'etcitem_type' => 'seed',
    'weight' => 1,
    'price' => 500,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17090 => 
  [
    'id' => 17090,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Red Coba',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Schuttgart region, Improved Red Coba will grow. The success rate is high when a level 65~75 character uses it on a level 65~75 monster.',
    'icon' => 'etc_red_coba_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 500,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17091 => 
  [
    'id' => 17091,
    'type' => 'etcitem',
    'name' => 'Golden Coba Seed',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Schuttgart region, Golden Coba will grow. The success rate is high when a level 68~78 character uses it on a level 68~78 monster.',
    'icon' => 'etc_golden_coba_seed_i00',
    'etcitem_type' => 'seed',
    'weight' => 1,
    'price' => 650,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17092 => 
  [
    'id' => 17092,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Golden Coba',
    'add_name' => '',
    'description' => 'If you plant it in a monster in the Schuttgart region, Improved Golden Coba will grow. The success rate is high when a level 68~78 character uses it on a level 68~78 monster.',
    'icon' => 'etc_golden_coba_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 650,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 3,
      ],
    ],
  ],
  17093 => 
  [
    'id' => 17093,
    'type' => 'etcitem',
    'name' => 'Vitality Maintaining Potion (10 mintues] (Event]',
    'add_name' => '',
    'description' => 'Energy is maintained for 10 minutes. Re-use time is 30 minutes. Cannot be exchanged, dropped, or destroyed.',
    'icon' => 'etc_lesser_potion_blue_i00',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9113,
        'level' => 1,
      ],
    ],
  ],
  17094 => 
  [
    'id' => 17094,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Voice',
    'add_name' => '',
    'description' => 'Seashell that contains the Voice of Nevit. Increases the amount of Evaluations you can give out by 10. Cannot be exchanged or dropped.',
    'icon' => 'etc_fish_scale_i01',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9114,
        'level' => 1,
      ],
    ],
  ],
  17095 => 
  [
    'id' => 17095,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Hourglass - 1 hour - 1~19',
    'add_name' => '1~19',
    'description' => 'Hourglass that increases Nevit\'s blessing time by 1 hour. Can only be used at levels 1~19. Cannot be exchanged or dropped.',
    'icon' => 'etc_dragons_blood_i03',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9115,
        'level' => 1,
      ],
    ],
  ],
  17096 => 
  [
    'id' => 17096,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Hourglass - 1.5 hour - 1~19',
    'add_name' => '1~19',
    'description' => 'Hourglass that increases Nevit\'s blessing time by 1.5 hour. Can only be used at levels 1~19. Cannot be exchanged or dropped.',
    'icon' => 'etc_dragons_blood_i03',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9116,
        'level' => 1,
      ],
    ],
  ],
  17097 => 
  [
    'id' => 17097,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Hourglass - 2 hour - 1~19',
    'add_name' => '1~19',
    'description' => 'Hourglass that increases Nevit\'s blessing time by 2 hour. Can only be used at levels 1~19. Cannot be exchanged or dropped.',
    'icon' => 'etc_dragons_blood_i03',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9117,
        'level' => 1,
      ],
    ],
  ],
  17098 => 
  [
    'id' => 17098,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Hourglass - 2.5 hour - 1~19',
    'add_name' => '1~19',
    'description' => 'Hourglass that increases Nevit\'s blessing time by 2.5 hour. Can only be used at levels 1~19. Cannot be exchanged or dropped.',
    'icon' => 'etc_dragons_blood_i03',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9118,
        'level' => 1,
      ],
    ],
  ],
  17099 => 
  [
    'id' => 17099,
    'type' => 'etcitem',
    'name' => 'Nevit\'s Hourglass - 3 hour - 1~19',
    'add_name' => '1~19',
    'description' => 'Hourglass that increases Nevit\'s blessing time by 3 hour. Can only be used at levels 1~19. Cannot be exchanged or dropped.',
    'icon' => 'etc_dragons_blood_i03',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 9119,
        'level' => 1,
      ],
    ],
  ],
];