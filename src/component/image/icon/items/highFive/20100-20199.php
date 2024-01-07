<?php
return [
  20100 => 
  [
    'id' => 20100,
    'type' => 'armor',
    'name' => 'Saving Santa Hat - 24-hour limited period',
    'add_name' => '24-hour limited period',
    'description' => 'This festive holiday hat allows you to participate in a "Rock-Paper-Scissors" contest with Thomas D. Turkey. Requires 2 hair accessory slots. It cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_xmas_gawibawibo_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21014,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21015,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 21016,
          'level' => 1,
        ],
      ],
    ],
    'time' => 1440,
  ],
  20101 => 
  [
    'id' => 20101,
    'type' => 'etcitem',
    'name' => 'Santa Claus\' Gift Set',
    'add_name' => '',
    'description' => 'A gift set given by Santa Claus to show his appreciation.',
    'icon' => 'BranchSys.br_xmas_present_i00',
    'weight' => 100,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20075,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 20076,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 20077,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20102 => 
  [
    'id' => 20102,
    'type' => 'etcitem',
    'name' => 'Santa Claus\' Gift Set',
    'add_name' => '',
    'description' => 'A gift set given by Santa Claus to show his appreciation.',
    'icon' => 'BranchSys.br_xmas_present_i00',
    'weight' => 100,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20075,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 20076,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 20078,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20103 => 
  [
    'id' => 20103,
    'type' => 'etcitem',
    'name' => 'Holiday Scroll: Heavy Armor Fighter - 8-hour limited period',
    'add_name' => '8-hour limited period',
    'description' => 'This magical scroll contains buffs for Fighters wearing heavy armor. It can be used once every hour. It cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_xmas_scroll_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22013,
        'level' => 1,
      ],
    ],
    'time' => 480,
  ],
  20104 => 
  [
    'id' => 20104,
    'type' => 'etcitem',
    'name' => 'Holiday Scroll: Light Armor Fighter - 8-hour limited period',
    'add_name' => '8-hour limited period',
    'description' => 'This magical scroll contains buffs for Fighters wearing light armor. It can be used once every hour. It cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_xmas_scroll_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22014,
        'level' => 1,
      ],
    ],
    'time' => 480,
  ],
  20105 => 
  [
    'id' => 20105,
    'type' => 'etcitem',
    'name' => 'Holiday Scroll: Healer - 8-hour limited period',
    'add_name' => '8-hour limited period',
    'description' => 'This magical scroll contains buffs for Healers. It can be used once every hour. It cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_xmas_scroll_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22015,
        'level' => 1,
      ],
    ],
    'time' => 480,
  ],
  20106 => 
  [
    'id' => 20106,
    'type' => 'etcitem',
    'name' => 'Holiday Scroll: Mage - 8-hour limited period',
    'add_name' => '8-hour limited period',
    'description' => 'This magical scroll contains buffs for Mages. It can be used once every hour. It cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_xmas_scroll_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22016,
        'level' => 1,
      ],
    ],
    'time' => 480,
  ],
  20107 => 
  [
    'id' => 20107,
    'type' => 'etcitem',
    'name' => 'Santa Claus\' Weapon Exchange Ticket - 12-hour limited period',
    'add_name' => '12-hour limited period',
    'description' => 'Allows you to potentially receive a powerful item from one of Santa\'s Helpers in the village. It cannot be exchanged, dropped or stored in a warehouse.',
    'icon' => 'etc_lottery_card_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 720,
  ],
  20108 => 
  [
    'id' => 20108,
    'type' => 'etcitem',
    'name' => 'Santa Claus\' Weapon Exchange Ticket - 12-hour limited period',
    'add_name' => '12-hour limited period',
    'description' => 'Allows you to potentially receive a powerful item from one of Santa\'s Helpers in the village. It cannot be exchanged, dropped or stored in a warehouse.',
    'icon' => 'etc_lottery_card_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'time' => 720,
  ],
  20109 => 
  [
    'id' => 20109,
    'type' => 'weapon',
    'name' => 'Sword of Revolution (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Sword of Revolution for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_sword_of_revolution_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 483,
    'soulshots' => 3,
    'spiritshots' => 3,
    'equip_reuse_delay' => '80',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21017,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20110 => 
  [
    'id' => 20110,
    'type' => 'weapon',
    'name' => 'Titan Sword (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Titan Sword for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_giants_sword_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 673,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21018,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20111 => 
  [
    'id' => 20111,
    'type' => 'weapon',
    'name' => 'Maingauche (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Maingauche for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_maingauche_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 357,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21019,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 69,
      'mAtk' => 47,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  20112 => 
  [
    'id' => 20112,
    'type' => 'weapon',
    'name' => 'Tarbar (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Tarbar for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_tarbar_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 577,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21020,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20113 => 
  [
    'id' => 20113,
    'type' => 'weapon',
    'name' => 'Titan Hammer (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Titan Hammer for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_giants_hammer_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 700,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21021,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20114 => 
  [
    'id' => 20114,
    'type' => 'weapon',
    'name' => 'Priest Mace (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Priest Mace for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_mace_of_priest_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 573,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21022,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 63,
      'mAtk' => 63,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20115 => 
  [
    'id' => 20115,
    'type' => 'weapon',
    'name' => 'Goat Head Staff (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Goat Head Staff for events. No exchange/drop/sale/warehouse available. No enchantment/storing souls/smelting possible.',
    'icon' => 'weapon_goathead_staff_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 333,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21023,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 77,
      'mAtk' => 63,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20116 => 
  [
    'id' => 20116,
    'type' => 'weapon',
    'name' => 'Bich\'Hwa (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Bich\'Hwa for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_bichhwa_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 503,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21024,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20117 => 
  [
    'id' => 20117,
    'type' => 'weapon',
    'name' => 'Strengthened Long Bow (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Strengthened Long Bow for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_strengthening_long_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 607,
    'soulshots' => 10,
    'spiritshots' => 3,
    'mp_consume' => 2,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21025,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 179,
      'mAtk' => 51,
      'critRate' => 12,
      'pAtkSpd' => 227,
    ],
  ],
  20118 => 
  [
    'id' => 20118,
    'type' => 'weapon',
    'name' => 'Winged Spear (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Winged Spear for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_winged_spear_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 687,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21026,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3599,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20119 => 
  [
    'id' => 20119,
    'type' => 'weapon',
    'name' => 'Artisan\'s Sword*Artisan\'s Sword (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Artisan\'s Sword*Artisan\'s Sword for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 827,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21027,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20120 => 
  [
    'id' => 20120,
    'type' => 'weapon',
    'name' => 'Epee (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Epee for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_rapier_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 483,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21028,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 72,
      'mAtk' => 47,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  20121 => 
  [
    'id' => 20121,
    'type' => 'weapon',
    'name' => 'Katzbalger (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Katzbalger for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_tulwar_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 673,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21029,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 86,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  20122 => 
  [
    'id' => 20122,
    'type' => 'weapon',
    'name' => 'Arm Breaker (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Arm Breaker for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_hunting_gun_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 607,
    'soulshots' => 6,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21030,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 100,
      'mAtk' => 47,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  20123 => 
  [
    'id' => 20123,
    'type' => 'weapon',
    'name' => 'Samurai Longsword (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Samurai Longsword for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_samurai_longsword_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 460,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21017,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20124 => 
  [
    'id' => 20124,
    'type' => 'weapon',
    'name' => 'Berserker Blade (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Berserker Blade for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_berserker_blade_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 460,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21018,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 190,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20125 => 
  [
    'id' => 20125,
    'type' => 'weapon',
    'name' => 'Crystal Dagger (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Crystal Dagger for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_crystal_dagger_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 333,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21019,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 136,
      'mAtk' => 83,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  20126 => 
  [
    'id' => 20126,
    'type' => 'weapon',
    'name' => 'Yaksa Mace (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Yaksa Mace for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_yaksa_mace_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 547,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21020,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20127 => 
  [
    'id' => 20127,
    'type' => 'weapon',
    'name' => 'Dwarven Hammer (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dwarven Hammer for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dwarven_hammer_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 670,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21021,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 190,
      'mAtk' => 83,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20128 => 
  [
    'id' => 20128,
    'type' => 'weapon',
    'name' => 'Ecliptic Axe (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Ecliptic Axe for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_eclipse_axe_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 547,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21022,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 125,
      'mAtk' => 111,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20129 => 
  [
    'id' => 20129,
    'type' => 'weapon',
    'name' => 'Demon\'s Staff (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Demon\'s Staff for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_demons_staff_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 330,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21023,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 152,
      'mAtk' => 111,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20130 => 
  [
    'id' => 20130,
    'type' => 'weapon',
    'name' => 'Great Pata (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Great Pata for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_great_pata_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 487,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21024,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 190,
      'mAtk' => 83,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20131 => 
  [
    'id' => 20131,
    'type' => 'weapon',
    'name' => 'Eminence Bow (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Eminence Bow for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_eminence_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 573,
    'soulshots' => 10,
    'spiritshots' => 3,
    'mp_consume' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21025,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 323,
      'mAtk' => 83,
      'critRate' => 12,
      'pAtkSpd' => 293,
    ],
  ],
  20132 => 
  [
    'id' => 20132,
    'type' => 'weapon',
    'name' => 'Orcish Poleaxe (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Orcish Poleaxe for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_orcish_poleaxe_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 650,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21026,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3599,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20133 => 
  [
    'id' => 20133,
    'type' => 'weapon',
    'name' => 'Katana*Katana (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Katana*Katana for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 757,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21027,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 190,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20134 => 
  [
    'id' => 20134,
    'type' => 'weapon',
    'name' => 'Admiral\'s Estoc (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Admiral\'s Estoc for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_blink_slasher_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 460,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21028,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 141,
      'mAtk' => 83,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  20135 => 
  [
    'id' => 20135,
    'type' => 'weapon',
    'name' => 'Saber Tooth (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Saber Tooth for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_invincible_blade_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 650,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21029,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 169,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  20136 => 
  [
    'id' => 20136,
    'type' => 'weapon',
    'name' => 'Sharpshooter (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Sharpshooter for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_taslam_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'c',
    'weight' => 580,
    'soulshots' => 6,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21030,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 198,
      'mAtk' => 83,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  20137 => 
  [
    'id' => 20137,
    'type' => 'weapon',
    'name' => 'Sword of Damascus (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Sword of Damascus for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_sword_of_damascus_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'b',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21017,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 194,
      'mAtk' => 99,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20138 => 
  [
    'id' => 20138,
    'type' => 'weapon',
    'name' => 'Guardian Sword (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Guardian Sword for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_guardians_sword_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 643,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21018,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 236,
      'mAtk' => 99,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20139 => 
  [
    'id' => 20139,
    'type' => 'weapon',
    'name' => 'Demon\'s Dagger (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Demon\'s Dagger for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_demons_sword_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 'b',
    'weight' => 323,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21019,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 170,
      'mAtk' => 99,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  20140 => 
  [
    'id' => 20140,
    'type' => 'weapon',
    'name' => 'Art of Battle Axe (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Art of Battle Axe for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_art_of_battle_axe_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'b',
    'weight' => 523,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21020,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 194,
      'mAtk' => 99,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20141 => 
  [
    'id' => 20141,
    'type' => 'weapon',
    'name' => 'Star Buster (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Star Buster for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_star_buster_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 643,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21021,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 236,
      'mAtk' => 99,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20142 => 
  [
    'id' => 20142,
    'type' => 'weapon',
    'name' => 'Kaim Vanul\'s Bones (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Kaim Vanul\'s Bones for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_bone_of_kaim_vanul_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'b',
    'weight' => 523,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21022,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 155,
      'mAtk' => 132,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20143 => 
  [
    'id' => 20143,
    'type' => 'weapon',
    'name' => 'Staff of Evil Spirits (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Staff of Evil Spirits for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_staff_of_evil_sprit_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 310,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21023,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 189,
      'mAtk' => 132,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20144 => 
  [
    'id' => 20144,
    'type' => 'weapon',
    'name' => 'Bellion Cestus (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Bellion Cestus for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_bellion_cestus_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 463,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21024,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 236,
      'mAtk' => 99,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20145 => 
  [
    'id' => 20145,
    'type' => 'weapon',
    'name' => 'Bow of Peril (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Bow of Peril for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_hazard_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 567,
    'soulshots' => 3,
    'spiritshots' => 1,
    'mp_consume' => 4,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21025,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 400,
      'mAtk' => 99,
      'critRate' => 12,
      'pAtkSpd' => 293,
    ],
  ],
  20146 => 
  [
    'id' => 20146,
    'type' => 'weapon',
    'name' => 'Lance (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Lance for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_lancia_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 640,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21026,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3599,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 194,
      'mAtk' => 99,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20147 => 
  [
    'id' => 20147,
    'type' => 'weapon',
    'name' => 'Samurai Long Sword*Samurai Long Sword (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Samurai Longsword*Samurai Long Sword for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 693,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21027,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 236,
      'mAtk' => 99,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20148 => 
  [
    'id' => 20148,
    'type' => 'weapon',
    'name' => 'Colichemarde (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Colichemarde for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_colichemarde_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 'b',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21028,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 176,
      'mAtk' => 99,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  20149 => 
  [
    'id' => 20149,
    'type' => 'weapon',
    'name' => 'Dismantler (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dismantler for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dismantler_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 643,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21029,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 210,
      'mAtk' => 99,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  20150 => 
  [
    'id' => 20150,
    'type' => 'weapon',
    'name' => 'Hell Hound (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Hell Hound for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_hell_hound_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'b',
    'weight' => 567,
    'soulshots' => 2,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21030,
        'level' => 1,
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 245,
      'mAtk' => 99,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  20151 => 
  [
    'id' => 20151,
    'type' => 'weapon',
    'name' => 'Dark Legion\'s Edge (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dark Legion\'s Edge for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dark_legions_edge_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'a',
    'weight' => 440,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21017,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 232,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20152 => 
  [
    'id' => 20152,
    'type' => 'weapon',
    'name' => 'Dragon Slayer (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dragon Slayer for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dragon_slayer_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 613,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21018,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 282,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20153 => 
  [
    'id' => 20153,
    'type' => 'weapon',
    'name' => 'Soul Separator (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Soul Separator for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_soul_separator_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 'a',
    'weight' => 317,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21019,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 203,
      'mAtk' => 114,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  20154 => 
  [
    'id' => 20154,
    'type' => 'weapon',
    'name' => 'Elysian (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Elysian for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_elysian_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'a',
    'weight' => 527,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21020,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 232,
      'mAtk' => 114,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20155 => 
  [
    'id' => 20155,
    'type' => 'weapon',
    'name' => 'Doom Crusher (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Doom Crusher for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_doom_crusher_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 633,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21021,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 282,
      'mAtk' => 114,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20156 => 
  [
    'id' => 20156,
    'type' => 'weapon',
    'name' => 'Flaming Dragon Skull (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Flaming Dragon Skull for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dragon_flame_head_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'a',
    'weight' => 510,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21022,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 186,
      'mAtk' => 152,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20157 => 
  [
    'id' => 20157,
    'type' => 'weapon',
    'name' => 'Branch of the Mother Tree (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Branch of the Mother Tree for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_worldtrees_branch_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 300,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21023,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 226,
      'mAtk' => 152,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20158 => 
  [
    'id' => 20158,
    'type' => 'weapon',
    'name' => 'Dragon Grinder (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dragon Grinder for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dragon_grinder_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21024,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 282,
      'mAtk' => 114,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20159 => 
  [
    'id' => 20159,
    'type' => 'weapon',
    'name' => 'Soul Bow (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Soul Bow for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_soul_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 553,
    'soulshots' => 2,
    'spiritshots' => 1,
    'mp_consume' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21025,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 528,
      'mAtk' => 125,
      'critRate' => 12,
      'pAtkSpd' => 227,
    ],
  ],
  20160 => 
  [
    'id' => 20160,
    'type' => 'weapon',
    'name' => 'Tallum Glaive (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Tallum Glaive for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_tallum_glaive_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 613,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21026,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 3599,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 232,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20161 => 
  [
    'id' => 20161,
    'type' => 'weapon',
    'name' => 'Damascus*Damascus (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Damascus*Damascus for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 693,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21027,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 282,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20162 => 
  [
    'id' => 20162,
    'type' => 'weapon',
    'name' => 'Lacerator (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Lacerator for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_greed_stinger_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 'a',
    'weight' => 440,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21028,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 210,
      'mAtk' => 114,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  20163 => 
  [
    'id' => 20163,
    'type' => 'weapon',
    'name' => 'Undertaker (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Undertaker for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_death_bringer_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 613,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21029,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 251,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  20164 => 
  [
    'id' => 20164,
    'type' => 'weapon',
    'name' => 'Reaper (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Reaper for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_soul_shooter_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'a',
    'weight' => 553,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21030,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 294,
      'mAtk' => 114,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  20165 => 
  [
    'id' => 20165,
    'type' => 'weapon',
    'name' => 'Forgotten Blade (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Forgotten Blade for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_forgotten_blade_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 's',
    'weight' => 433,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21017,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 281,
      'mAtk' => 132,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20166 => 
  [
    'id' => 20166,
    'type' => 'weapon',
    'name' => 'Heaven\'s Divider (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Heaven\'s Divider for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_heavens_divider_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 460,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21018,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 342,
      'mAtk' => 132,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20167 => 
  [
    'id' => 20167,
    'type' => 'weapon',
    'name' => 'Angel Slayer (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Angel Slayer for events No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_angel_slayer_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 's',
    'weight' => 317,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21019,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 246,
      'mAtk' => 132,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  20168 => 
  [
    'id' => 20168,
    'type' => 'weapon',
    'name' => 'Basalt Battlehammer (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Basalt Battlehammer for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_basalt_battlehammer_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 's',
    'weight' => 523,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21020,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 281,
      'mAtk' => 132,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20169 => 
  [
    'id' => 20169,
    'type' => 'weapon',
    'name' => 'Dragon Hunter Axe (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Dragon Hunter Axe for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dragon_hunter_axe_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 607,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21021,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 342,
      'mAtk' => 132,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20170 => 
  [
    'id' => 20170,
    'type' => 'weapon',
    'name' => 'Arcana Mace (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Arcana Mace for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_arcana_mace_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 's',
    'weight' => 433,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21022,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 225,
      'mAtk' => 175,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  20171 => 
  [
    'id' => 20171,
    'type' => 'weapon',
    'name' => 'Imperial Staff (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Imperial Staff for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_imperial_staff_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 303,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21023,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 274,
      'mAtk' => 175,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20172 => 
  [
    'id' => 20172,
    'type' => 'weapon',
    'name' => 'Demon Splinter (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Demon Splinter for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_demon_splinter_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 450,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21024,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 342,
      'mAtk' => 132,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20173 => 
  [
    'id' => 20173,
    'type' => 'weapon',
    'name' => 'Draconic Bow (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Draconic Bow for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_draconic_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 550,
    'soulshots' => 1,
    'spiritshots' => 1,
    'mp_consume' => 6,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21025,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 581,
      'mAtk' => 132,
      'critRate' => 12,
      'pAtkSpd' => 293,
    ],
  ],
  20174 => 
  [
    'id' => 20174,
    'type' => 'weapon',
    'name' => 'Saint Spear (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Saint Spear for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_saint_spear_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 600,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21026,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 3599,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 281,
      'mAtk' => 132,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20175 => 
  [
    'id' => 20175,
    'type' => 'weapon',
    'name' => 'Tallum Blade*Dark Legion\'s Edge (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Tallum Blade*Dark Legion\'s Edge for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 693,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21027,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 342,
      'mAtk' => 132,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20176 => 
  [
    'id' => 20176,
    'type' => 'weapon',
    'name' => 'Laevateinn (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Laevateinn for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_leavatein_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 's',
    'weight' => 433,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21028,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 255,
      'mAtk' => 132,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  20177 => 
  [
    'id' => 20177,
    'type' => 'weapon',
    'name' => 'Gram (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Gram for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_gram_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 600,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21029,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 304,
      'mAtk' => 132,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  20178 => 
  [
    'id' => 20178,
    'type' => 'weapon',
    'name' => 'Sarunga (Event] - 4-hour limited period',
    'add_name' => '4-hour limited period',
    'description' => 'Sarunga for events. No exchange/drop/sale/storage available. No enchantment/SA/augmentation possible.',
    'icon' => 'weapon_sarnga_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 's',
    'weight' => 533,
    'soulshots' => 1,
    'spiritshots' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21030,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 3552,
          'level' => 1,
        ],
      ],
    ],
    'time' => 240,
    'stats' => 
    [
      'pAtk' => 356,
      'mAtk' => 132,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  20179 => 
  [
    'id' => 20179,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Near Kamaloka 5 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Near Kamaloka.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20027,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  20180 => 
  [
    'id' => 20180,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Near Kamaloka 10 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Near Kamaloka.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20027,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  20181 => 
  [
    'id' => 20181,
    'type' => 'etcitem',
    'name' => 'My Teleport Spellbook 5 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a My Teleport Spellbook.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20025,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  20182 => 
  [
    'id' => 20182,
    'type' => 'etcitem',
    'name' => 'My Teleport Spellbook 10 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a My Teleport Spellbook.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20025,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  20183 => 
  [
    'id' => 20183,
    'type' => 'etcitem',
    'name' => 'My Teleport Flag 5 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a My Teleport Flag.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20033,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  20184 => 
  [
    'id' => 20184,
    'type' => 'etcitem',
    'name' => 'My Teleport Flag 10 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a My Teleport Flag.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20033,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  20185 => 
  [
    'id' => 20185,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Hall of the Abyss] 5 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Kamaloka (Hall of the Abyss].',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20026,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  20186 => 
  [
    'id' => 20186,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Labyrinth of the Abyss] 5 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Kamaloka (Labyrinth of the Abyss].',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20028,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  20187 => 
  [
    'id' => 20187,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Hall of the Abyss] 10 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Kamaloka (Hall of the Abyss].',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20026,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  20188 => 
  [
    'id' => 20188,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Labyrinth of the Abyss] 10 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing an extra entrance pass that lets you enter Kamaloka (Labyrinth of the Abyss].',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_stackable' => true,
    'is_premium' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20028,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  20189 => 
  [
    'id' => 20189,
    'type' => 'etcitem',
    'name' => 'Premium Valentine Decoration Pack',
    'add_name' => '',
    'description' => 'Wrapped pack contains a Premium Valentine Decoration. Cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20190,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20190 => 
  [
    'id' => 20190,
    'type' => 'etcitem',
    'name' => 'Premium Valentine Decoration - 15-day limited period',
    'add_name' => '15-day limited period',
    'description' => 'Take this along with a Decadent Valentine Cake to Valentine Messenger Queen of Hearts, and she will create a Heavenly Valentine Cake just for you. Cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_valentine_deco_i00',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'time' => 21600,
  ],
  20191 => 
  [
    'id' => 20191,
    'type' => 'etcitem',
    'name' => 'Valentine Cake Recipe',
    'add_name' => '',
    'description' => 'Recipe for making a Simple Valentine Cake. Cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_valentine_recipe_i00',
    'etcitem_type' => 'recipe',
    'weight' => 10,
    'recipe_id' => 3000,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'recipes',
  ],
  20192 => 
  [
    'id' => 20192,
    'type' => 'etcitem',
    'name' => 'Valentine Dark Chocolate',
    'add_name' => '',
    'description' => 'Ingredient for making a Valentine Cake.',
    'icon' => 'BranchSys.br_valentine_darkchoco_i00',
    'is_stackable' => true,
  ],
  20193 => 
  [
    'id' => 20193,
    'type' => 'etcitem',
    'name' => 'Valentine White Chocolate',
    'add_name' => '',
    'description' => 'Ingredient for making a Valentine Cake.',
    'icon' => 'BranchSys.br_valentine_whitechoco_i00',
    'is_stackable' => true,
  ],
  20194 => 
  [
    'id' => 20194,
    'type' => 'etcitem',
    'name' => 'Valentine Fresh Cream',
    'add_name' => '',
    'description' => 'Ingredient for making a Valentine Cake.',
    'icon' => 'BranchSys.br_valentine_cream_i00',
    'is_stackable' => true,
  ],
  20195 => 
  [
    'id' => 20195,
    'type' => 'etcitem',
    'name' => 'Simple Valentine Cake',
    'add_name' => '',
    'description' => 'A basic Valentine Cake. With a little more care, you might be able to make a Velvety Valentine Cake. Double-click to see what happens.',
    'icon' => 'BranchSys.br_valentine_cake_1_i00',
    'weight' => 100,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22023,
        'level' => 1,
      ],
    ],
  ],
  20196 => 
  [
    'id' => 20196,
    'type' => 'etcitem',
    'name' => 'Velvety Valentine Cake',
    'add_name' => '',
    'description' => 'A creamy Valentine Cake. With a little more care, you may be able to make a Velvety Valentine Cake. Double-click to see what happens.',
    'icon' => 'BranchSys.br_valentine_cake_2_i00',
    'weight' => 100,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22024,
        'level' => 1,
      ],
    ],
  ],
  20197 => 
  [
    'id' => 20197,
    'type' => 'etcitem',
    'name' => 'Delectable Valentine Cake',
    'add_name' => '',
    'description' => 'A yummy and inviting Valentine Cake. With a little more care, you might be able to make a Decadent Valentine Cake. Double-click to see what happens.',
    'icon' => 'BranchSys.br_valentine_cake_3_i00',
    'weight' => 100,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22025,
        'level' => 1,
      ],
    ],
  ],
  20198 => 
  [
    'id' => 20198,
    'type' => 'etcitem',
    'name' => 'Decadent Valentine Cake',
    'add_name' => '',
    'description' => 'This is a perfect Valentine delicacy. Double-clicking this item will yield a special Valentine treat.',
    'icon' => 'BranchSys.br_valentine_cake_4_i00',
    'weight' => 100,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22026,
        'level' => 1,
      ],
    ],
  ],
  20199 => 
  [
    'id' => 20199,
    'type' => 'etcitem',
    'name' => 'Heavenly Valentine Cake - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'A divine confection made with love and care. Double-click to transform into a fabulous reward. Cannot be exchanged, dropped or sold.',
    'icon' => 'BranchSys.br_valentine_cake_5_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22027,
        'level' => 1,
      ],
    ],
    'time' => 43200,
  ],
];