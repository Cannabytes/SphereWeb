<?php
return [
  20900 => 
  [
    'id' => 20900,
    'type' => 'armor',
    'name' => 'Santa Hat - 14-day limited period',
    'add_name' => '14-day limited period',
    'description' => 'The Santa Hat made for celebrating Christmas. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_xmas_gawibawibo_cap_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'time' => 20160,
  ],
  20901 => 
  [
    'id' => 20901,
    'type' => 'etcitem',
    'name' => 'Santa Hat Set',
    'add_name' => '',
    'description' => 'The Santa Hat and Rudolph\'s Nose are packaged together. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 20900,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 14611,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20902 => 
  [
    'id' => 20902,
    'type' => 'etcitem',
    'name' => 'Ring of Queen Ant 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing the Ring of Queen Ant (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20205,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20903 => 
  [
    'id' => 20903,
    'type' => 'etcitem',
    'name' => 'Rose Petal',
    'add_name' => '',
    'description' => 'Increases HP/MP Regeneration by 20% through rose aroma for 5 minutes.',
    'icon' => 'BranchSys.br_herb_of_baguette_i00',
    'ex_immediate_effect' => 'true',
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22158,
        'level' => 1,
      ],
    ],
  ],
  20904 => 
  [
    'id' => 20904,
    'type' => 'etcitem',
    'name' => 'Rose Essense',
    'add_name' => '',
    'description' => 'Rose energy extract is necessary to use the Rose Spirit\'s special skill.',
    'icon' => 'BranchSys2.br_essence_rose_i00',
    'weight' => 2,
    'is_depositable' => false,
    'is_stackable' => true,
  ],
  20905 => 
  [
    'id' => 20905,
    'type' => 'etcitem',
    'name' => 'One Red Rose Bud',
    'add_name' => '',
    'description' => 'One fragrant red rose bud.',
    'icon' => 'BranchSys2.br_rosalia_rose_red_i00',
    'weight' => 2,
    'price' => 500,
    'is_depositable' => false,
    'is_stackable' => true,
  ],
  20906 => 
  [
    'id' => 20906,
    'type' => 'etcitem',
    'name' => 'One Blue Rose Bud',
    'add_name' => '',
    'description' => 'One fragrant blue rose bud.',
    'icon' => 'BranchSys2.br_rosalia_rose_blue_i00',
    'weight' => 2,
    'price' => 500,
    'is_depositable' => false,
    'is_stackable' => true,
  ],
  20907 => 
  [
    'id' => 20907,
    'type' => 'etcitem',
    'name' => 'One White Rose Bud',
    'add_name' => '',
    'description' => 'One fragrant white rose bud.',
    'icon' => 'BranchSys2.br_rosalia_rose_white_i00',
    'weight' => 2,
    'price' => 500,
    'is_depositable' => false,
    'is_stackable' => true,
  ],
  20908 => 
  [
    'id' => 20908,
    'type' => 'etcitem',
    'name' => 'Deseloph Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Deseloph. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20909 => 
  [
    'id' => 20909,
    'type' => 'etcitem',
    'name' => 'Hyum Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Hyum. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20910 => 
  [
    'id' => 20910,
    'type' => 'etcitem',
    'name' => 'Rekang Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Rekang. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20911 => 
  [
    'id' => 20911,
    'type' => 'etcitem',
    'name' => 'Lilias Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Lilias. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20912 => 
  [
    'id' => 20912,
    'type' => 'etcitem',
    'name' => 'Lapham Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Lapham. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20913 => 
  [
    'id' => 20913,
    'type' => 'etcitem',
    'name' => 'Mafum Rose Necklace (Event] - Summon duration - 3 hours',
    'add_name' => 'Summon duration - 3 hours',
    'description' => 'Summons the Rose Spirit Mafum. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_event',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
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
  20914 => 
  [
    'id' => 20914,
    'type' => 'etcitem',
    'name' => 'Improved Rose Spirit Exchange Ticket - 5 hours',
    'add_name' => '',
    'description' => 'Coupon that can be exchanged for a necklace (5 hour] that summons an Improved Rose Spirit. Can be exchanged through the Dimensional Merchant. Cannot be exchanged or dropped. Can be stored in a private warehouse. ',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
  ],
  20915 => 
  [
    'id' => 20915,
    'type' => 'etcitem',
    'name' => 'Improved Deseloph Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Deseloph. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20916 => 
  [
    'id' => 20916,
    'type' => 'etcitem',
    'name' => 'Improved Hyum Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Hyum. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20917 => 
  [
    'id' => 20917,
    'type' => 'etcitem',
    'name' => 'Improved Rekang Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Rekang. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20918 => 
  [
    'id' => 20918,
    'type' => 'etcitem',
    'name' => 'Improved Lilias Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Lilias. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20919 => 
  [
    'id' => 20919,
    'type' => 'etcitem',
    'name' => 'Improved Lapham Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Lapham. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20920 => 
  [
    'id' => 20920,
    'type' => 'etcitem',
    'name' => 'Improved Mafum Rose Necklace (Event] - Summon duration - 5 hours',
    'add_name' => 'Summon duration - 5 hours',
    'description' => 'Summons the Improved Rose Spirit Mafum. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_necklace_of_rose_i00',
    'etcitem_type' => 'pet_collar',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
  20921 => 
  [
    'id' => 20921,
    'type' => 'etcitem',
    'name' => 'Rose Spirit Test Report - 24-hour limited period',
    'add_name' => '24-hour limited period',
    'description' => 'Report in which you can record your findings while testing the Rose Spirit. You can only return it 24 hours after receiving it. It cannot be destroyed.',
    'icon' => 'etc_royal_membership_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_questitem' => true,
    'is_oly_restricted' => true,
    'time' => 1440,
  ],
  20922 => 
  [
    'id' => 20922,
    'type' => 'armor',
    'name' => 'Adventurer Hat',
    'add_name' => '',
    'description' => 'Adventurer Hat. Uses 2 hair accessory slots.',
    'icon' => 'accessory_explorer_hat_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_sellable' => false,
    'is_depositable' => false,
  ],
  20923 => 
  [
    'id' => 20923,
    'type' => 'etcitem',
    'name' => 'Vesper Slasher',
    'add_name' => '',
    'description' => '2010 April Fools\' Day Vesper Super Power Herb  ',
    'icon' => 'BranchSys2.br_royal_crown_of_vesper_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22159,
        'level' => 1,
      ],
    ],
  ],
  20924 => 
  [
    'id' => 20924,
    'type' => 'etcitem',
    'name' => 'Vesper Caster',
    'add_name' => '',
    'description' => '2010 April Fools\' Day Vesper Critical Power Herb  ',
    'icon' => 'BranchSys2.br_royal_circlet_of_vesper_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22160,
        'level' => 1,
      ],
    ],
  ],
  20925 => 
  [
    'id' => 20925,
    'type' => 'etcitem',
    'name' => 'Vesper Dual Sword',
    'add_name' => '',
    'description' => '2010 April Fools\' Day Invincible Vesper Herb  ',
    'icon' => 'BranchSys2.br_noblesse_oblige_of_vesper_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22161,
        'level' => 1,
      ],
    ],
  ],
  20926 => 
  [
    'id' => 20926,
    'type' => 'etcitem',
    'name' => 'Mt. Fuji Herb',
    'add_name' => '',
    'description' => 'Mt. Fuji Herb',
    'icon' => 'BranchSys2.br_fuji_herb_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22162,
        'level' => 1,
      ],
    ],
  ],
  20927 => 
  [
    'id' => 20927,
    'type' => 'etcitem',
    'name' => 'Hawk Herb',
    'add_name' => '',
    'description' => 'Hawk Herb',
    'icon' => 'BranchSys2.br_hawk_herb_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22163,
        'level' => 1,
      ],
    ],
  ],
  20928 => 
  [
    'id' => 20928,
    'type' => 'etcitem',
    'name' => 'Eggplant Herb',
    'add_name' => '',
    'description' => 'Eggplant Herb',
    'icon' => 'BranchSys2.br_eggplant_herb_i00',
    'ex_immediate_effect' => 'true',
    'is_tradable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22164,
        'level' => 1,
      ],
    ],
  ],
  20929 => 
  [
    'id' => 20929,
    'type' => 'armor',
    'name' => 'Royal Crown of Vesper',
    'add_name' => '',
    'description' => 'Crown with Versper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_royal_crown_of_vesper_i00',
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
  20930 => 
  [
    'id' => 20930,
    'type' => 'armor',
    'name' => 'Royal Circlet of Vesper',
    'add_name' => '',
    'description' => 'Circlet with Versper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_royal_circlet_of_vesper_i00',
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
  20931 => 
  [
    'id' => 20931,
    'type' => 'armor',
    'name' => 'Noblesse Oblige',
    'add_name' => '',
    'description' => 'Unique hair accessory with Noble Vesper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_noblesse_oblige_of_vesper_i00',
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
  20932 => 
  [
    'id' => 20932,
    'type' => 'armor',
    'name' => 'Royal Crown of Vesper - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Crown with Versper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_royal_crown_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'time' => 43200,
  ],
  20933 => 
  [
    'id' => 20933,
    'type' => 'armor',
    'name' => 'Royal Circlet of Vesper - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Circlet with Versper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_royal_circlet_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'time' => 43200,
  ],
  20934 => 
  [
    'id' => 20934,
    'type' => 'armor',
    'name' => 'Noblesse Oblige - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Unique hair accessory with Noble Vesper\'s grace. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_noblesse_oblige_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'time' => 43200,
  ],
  20935 => 
  [
    'id' => 20935,
    'type' => 'armor',
    'name' => 'Royal Crown of Vesper',
    'add_name' => '',
    'description' => 'Crown with Versper\'s grace. Uses 2 hair accessory slots.',
    'icon' => 'BranchSys2.br_royal_crown_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
  ],
  20936 => 
  [
    'id' => 20936,
    'type' => 'armor',
    'name' => 'Royal Circlet of Vesper',
    'add_name' => '',
    'description' => 'Circlet with Versper\'s grace. Uses 2 hair accessory slots.',
    'icon' => 'BranchSys2.br_royal_circlet_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
  ],
  20937 => 
  [
    'id' => 20937,
    'type' => 'armor',
    'name' => 'Noblesse Oblige',
    'add_name' => '',
    'description' => 'Unique hair accessory with Noble Vesper\'s grace. Uses 2 hair accessory slots.',
    'icon' => 'BranchSys2.br_noblesse_oblige_of_vesper_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
  ],
  20938 => 
  [
    'id' => 20938,
    'type' => 'armor',
    'name' => 'Jet Bike Mount Bracelet - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'This item allows you to ride Jet Bike which is the core of Dwarven technology Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_z_bike_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '619-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21171,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20939 => 
  [
    'id' => 20939,
    'type' => 'armor',
    'name' => 'Jet Bike Mount Bracelet - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'This item allows you to ride Jet Bike which is the core of Dwarven technology Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_z_bike_i00',
    'bodypart' => 'lbracelet',
    'weight' => 30,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'unequip_skill' => '619-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21171,
        'level' => 1,
      ],
    ],
    'time' => 43200,
  ],
  20940 => 
  [
    'id' => 20940,
    'type' => 'armor',
    'name' => 'Phoenix Agthion Seal Bracelet - Nirvana Rebirth - 7-day limited period',
    'add_name' => 'Nirvana Rebirth - 7-day limited period',
    'description' => 'Bracelet that summons Phoenix Agathion. When Nirvana Rebirth is used, all HP, MP, CP are recovered, and becomes invincible for 5 seconds with the power of Phoenix. Possible to use under HP 30% only. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 12 hours.',
    'icon' => 'BranchSys2.br_aga_china_phoenix_i00',
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
          'skill_id' => 21191,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23171,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23172,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20941 => 
  [
    'id' => 20941,
    'type' => 'armor',
    'name' => 'Phoenix Agthion Seal Bracelet - Oriental Phoenix - 7-day limited period',
    'add_name' => 'Oriental Phoenix - 7-day limited period',
    'description' => 'Bracelet that summons Phoenix Agathion. When Oriental Phoenix is used, all Debuff is canceled with the power of Phoenix. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 4 hours.',
    'icon' => 'BranchSys2.br_aga_china_phoenix_i00',
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
          'skill_id' => 21191,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23171,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23173,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20942 => 
  [
    'id' => 20942,
    'type' => 'armor',
    'name' => 'Fox Mask',
    'add_name' => '',
    'description' => 'Fox Mask This mask automatically covers your face during battle. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_fox_japan_cap_i00',
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
  20943 => 
  [
    'id' => 20943,
    'type' => 'armor',
    'name' => 'Fox Mask - Silent Move - 7-day limited period',
    'add_name' => 'Silent Move - 7-day limited period',
    'description' => 'Fox Mask This mask automatically covers your face during battle. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 4 hours.',
    'icon' => 'BranchSys2.br_fox_japan_cap_i00',
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
        'skill_id' => 21192,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20944 => 
  [
    'id' => 20944,
    'type' => 'armor',
    'name' => 'Paiwan Hat',
    'add_name' => '',
    'description' => 'Traditional Paiwan Hat. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_paiwan_cap_i00',
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
  20945 => 
  [
    'id' => 20945,
    'type' => 'armor',
    'name' => 'Paiwan Hat - Power of Guardian Deity - 7-day limited period',
    'add_name' => 'Power of Guardian Deity - 7-day limited period',
    'description' => 'Traditional Paiwan Hat. When the Power of Guardian Deity, Critical attack power is increased by 35% for 10 minutes. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_paiwan_cap_i00',
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
        'skill_id' => 21193,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20946 => 
  [
    'id' => 20946,
    'type' => 'etcitem',
    'name' => 'Jet Bike 7-Day Pack',
    'add_name' => '',
    'description' => 'A Pack that has Jet Bike (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
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
        'item_id' => 20938,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20947 => 
  [
    'id' => 20947,
    'type' => 'etcitem',
    'name' => 'Jet Bike 30-Day Pack',
    'add_name' => '',
    'description' => 'A Pack that has Jet Bike (30 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_four_leaf_clover_box_i00',
    'weight' => 100,
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
        'item_id' => 20939,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20948 => 
  [
    'id' => 20948,
    'type' => 'etcitem',
    'name' => 'Phoenix Agathion 7-Day Pack - Nirvana Rebirth',
    'add_name' => 'Nirvana Rebirth',
    'description' => 'A Pack that has Phoenix Agathion (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20940,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20949 => 
  [
    'id' => 20949,
    'type' => 'etcitem',
    'name' => 'Phoenix Agathion 7-Day Pack - Oriental Phoenix',
    'add_name' => 'Oriental Phoenix',
    'description' => 'A Pack that has Phoenix Agathion (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20941,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20950 => 
  [
    'id' => 20950,
    'type' => 'etcitem',
    'name' => 'Fox Mask Pack',
    'add_name' => '',
    'description' => 'A Pack that has Fox Mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20942,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20951 => 
  [
    'id' => 20951,
    'type' => 'etcitem',
    'name' => 'Fox Mask 7-Day Pack - Silent Move',
    'add_name' => 'Silent Move',
    'description' => 'A Pack that has Fox Mask (30 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20943,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20952 => 
  [
    'id' => 20952,
    'type' => 'etcitem',
    'name' => 'Paiwan Hat Pack',
    'add_name' => '',
    'description' => 'A Pack that has Paiwan Hat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20944,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20953 => 
  [
    'id' => 20953,
    'type' => 'etcitem',
    'name' => 'Paiwan Hat 7-Day Pack - Power of Guardian Deity',
    'add_name' => 'Power of Guardian Deity',
    'description' => 'A Pack that has Paiwan Hat (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20945,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20954 => 
  [
    'id' => 20954,
    'type' => 'etcitem',
    'name' => 'Small Placid',
    'add_name' => '',
    'description' => 'When used, 5000 Soul Avatar Energy is recovered. Can be replenished only when Soul Avatar is on and when the consumed energy is 5000 or more. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_shield_bread_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22165,
        'level' => 1,
      ],
    ],
  ],
  20955 => 
  [
    'id' => 20955,
    'type' => 'etcitem',
    'name' => 'Medium Placid',
    'add_name' => '',
    'description' => 'When used, 10000 Soul Avatar Energy is recovered. Can be replenished only when Soul Avatar is on and the consumed energy is 10000 or more. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_shield_bread_i01',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22166,
        'level' => 1,
      ],
    ],
  ],
  20956 => 
  [
    'id' => 20956,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Frozen Corpse - Soul Stealth - 7-day limited period',
    'add_name' => 'Soul Stealth - 7-day limited period',
    'description' => 'Bracelet that summons Zombie Agathion. Invisible effect for 5 seconds after resurrection, and will not receive preemptive attack from the monsters for 2 minutes. Moving speed is decreased by 50% while the skill effect is operative. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 12 hours.',
    'icon' => 'BranchSys.br_aga_gangsi_i00',
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
          'skill_id' => 21133,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23117,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23175,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20957 => 
  [
    'id' => 20957,
    'type' => 'etcitem',
    'name' => 'Zombie Agathion 7-Day Pack - Soul Stealth',
    'add_name' => 'Soul Stealth',
    'description' => 'A Pack that has Zombie Agathion (7 days]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20956,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20958 => 
  [
    'id' => 20958,
    'type' => 'etcitem',
    'name' => 'April Fools\' Day Special Gift - For Event',
    'add_name' => '',
    'description' => 'The luckiest person will be given a special fortune box on April Fool\'s Day. What will be inside?',
    'icon' => 'lucky_bag_box_i00',
    'weight' => 1,
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22167,
        'level' => 1,
      ],
    ],
  ],
  20959 => 
  [
    'id' => 20959,
    'type' => 'etcitem',
    'name' => 'Royal Crown of Vesper Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Crown of Vesper. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20929,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20960 => 
  [
    'id' => 20960,
    'type' => 'etcitem',
    'name' => 'Royal Circlet of Vesper Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Circlet of Vesper. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20930,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20961 => 
  [
    'id' => 20961,
    'type' => 'etcitem',
    'name' => 'Noblesse Oblige Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Noblesse Oblige. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20931,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20962 => 
  [
    'id' => 20962,
    'type' => 'etcitem',
    'name' => 'Royal Crown of Vesper 30-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Crown of Vesper (30 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20932,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20963 => 
  [
    'id' => 20963,
    'type' => 'etcitem',
    'name' => 'Royal Circlet of Vesper 30-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Circlet of Vesper (30 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20933,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20964 => 
  [
    'id' => 20964,
    'type' => 'etcitem',
    'name' => 'Noblesse Oblige 30-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Noblesse Oblige (30 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20934,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20965 => 
  [
    'id' => 20965,
    'type' => 'etcitem',
    'name' => 'Royal Crown of Vesper Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Crown of Vesper. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20935,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20966 => 
  [
    'id' => 20966,
    'type' => 'etcitem',
    'name' => 'Royal Circlet of Vesper Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Royal Circlet of Vesper. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20936,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20967 => 
  [
    'id' => 20967,
    'type' => 'etcitem',
    'name' => 'Noblesse Oblige Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Noblesse Oblige. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20937,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20968 => 
  [
    'id' => 20968,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Guangong',
    'add_name' => '',
    'description' => 'Bracelet that summons the Guangong Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys.br_aga_warriorgod_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
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
          'skill_id' => 21142,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23123,
          'level' => 1,
        ],
      ],
    ],
  ],
  20969 => 
  [
    'id' => 20969,
    'type' => 'etcitem',
    'name' => 'Guangong Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Guangong Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20968,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20970 => 
  [
    'id' => 20970,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Three-headed Dragon - Wind Walk',
    'add_name' => 'Wind Walk',
    'description' => 'Bracelet that summons a cute three-headed dragon. Cannot be exchanged, dropped, or sold. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_threehead_i00',
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
          'skill_id' => 21194,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23181,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23182,
          'level' => 1,
        ],
      ],
    ],
  ],
  20971 => 
  [
    'id' => 20971,
    'type' => 'weapon',
    'name' => 'Trejuo Transformation Stick',
    'add_name' => 'Blessed Child Transformation',
    'description' => 'Stick that transforms you into the Blessed Child Trejuo. The transformation ends when you de-equip the item. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 4 hour.',
    'icon' => 'BranchSys2.br_blessed_taiboy_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'unequip_skill' => '839-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21195,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20972 => 
  [
    'id' => 20972,
    'type' => 'weapon',
    'name' => 'Sujin Transformation Stick',
    'add_name' => 'Blessed Child Transformation',
    'description' => 'Stick that transforms you into the Blessed Child Sujin. The transformation ends when you de-equip the item. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 4 hour.',
    'icon' => 'BranchSys2.br_blessed_taigirl_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'unequip_skill' => '839-1',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21196,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20973 => 
  [
    'id' => 20973,
    'type' => 'armor',
    'name' => 'Opera Mask - Liu Bei - Buff of Virtue, Age of the Three Kingdoms',
    'add_name' => 'Buff of Virtue, Age of the Three Kingdoms',
    'description' => 'Mask worn by the actor playing the Liu Bei role in the opera. Can use the Buff of Virtue and the Age of the Three Kingdoms. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_pekingopera_mask_a_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21197,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21200,
          'level' => 1,
        ],
      ],
    ],
  ],
  20974 => 
  [
    'id' => 20974,
    'type' => 'armor',
    'name' => 'Opera Mask - Guan Yu - Silence of Fidelity, Age of the Three Kingdoms',
    'add_name' => 'Silence of Fidelity, Age of the Three Kingdoms',
    'description' => 'Mask worn by the actor playing the Guan Yu role in the opera. Can use the Silence of Fidelity and the Age of the Three Kingdoms. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_pekingopera_mask_b_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21198,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21200,
          'level' => 1,
        ],
      ],
    ],
  ],
  20975 => 
  [
    'id' => 20975,
    'type' => 'armor',
    'name' => 'Opera Mask - Zhang Fei - Vitality of Courage, Age of the Three Kingdoms',
    'add_name' => 'Vitality of Courage, Age of the Three Kingdoms',
    'description' => 'Mask worn by the actor playing the Zhang Fei role in the opera. Can use the Vitality of Courage and the Age of the Three Kingdoms. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_pekingopera_mask_c_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21199,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21200,
          'level' => 1,
        ],
      ],
    ],
  ],
  20976 => 
  [
    'id' => 20976,
    'type' => 'etcitem',
    'name' => 'Proof of a Warrior - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Noble proof representing bravery. Needed to use the Buff of Virtue, Silence of Fidelity, and Vitality of Courage with the opera mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_pekingopera_symbol_a_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'time' => 43200,
  ],
  20977 => 
  [
    'id' => 20977,
    'type' => 'etcitem',
    'name' => 'Proof of Friendship',
    'add_name' => '',
    'description' => 'Noble proof representing friendship. Needed to use the Age of the Three Kingdoms with the opera mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_pekingopera_symbol_b_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
  ],
  20978 => 
  [
    'id' => 20978,
    'type' => 'etcitem',
    'name' => 'Zhongzi (B-Grade]',
    'add_name' => '',
    'description' => 'Taiwanese specialty food. Item that raises a B-Grade weapon\'s enchant rate by 15%. Can only be used on items with 3~9 enchants. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_taiwan_riceball_a_i00',
    'etcitem_type' => 'scrl_inc_enchant_prop_wp',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2517,
        'level' => 1,
      ],
    ],
  ],
  20979 => 
  [
    'id' => 20979,
    'type' => 'etcitem',
    'name' => 'Zhongzi (A-Grade]',
    'add_name' => '',
    'description' => 'Taiwanese specialty food. Item that raises an A-Grade weapon\'s enchant rate by 12%. Can only be used on items with 3~9 enchants. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_taiwan_riceball_b_i00',
    'etcitem_type' => 'scrl_inc_enchant_prop_wp',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2518,
        'level' => 1,
      ],
    ],
  ],
  20980 => 
  [
    'id' => 20980,
    'type' => 'etcitem',
    'name' => 'Zhongzi (S-Grade]',
    'add_name' => '',
    'description' => 'Taiwanese specialty food. Item that raises a S-Grade weapon\'s enchant rate by 10%. Can only be used on items with 3~9 enchants. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_taiwan_riceball_c_i00',
    'etcitem_type' => 'scrl_inc_enchant_prop_wp',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2519,
        'level' => 1,
      ],
    ],
  ],
  20981 => 
  [
    'id' => 20981,
    'type' => 'armor',
    'name' => 'Dragon Boat',
    'add_name' => '',
    'description' => 'Hat shaped like a dragon boat. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_dragonboat_cap_i00',
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
  20982 => 
  [
    'id' => 20982,
    'type' => 'armor',
    'name' => 'Dragon Boat - Haste - 7-day limited period',
    'add_name' => 'Haste - 7-day limited period',
    'description' => 'Hat shaped like a dragon boat. Cannot be exchanged, dropped, or sold. Uses 2 hair accessory slots. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_dragonboat_cap_i00',
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
        'skill_id' => 21201,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20983 => 
  [
    'id' => 20983,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Gnosian - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Gnosian. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_ball_male_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21202,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23201,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23183,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23184,
          'level' => 1,
        ],
      ],
    ],
  ],
  20984 => 
  [
    'id' => 20984,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Orodriel - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Orodriel. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_ball_female_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21203,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23202,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23185,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23186,
          'level' => 1,
        ],
      ],
    ],
  ],
  20985 => 
  [
    'id' => 20985,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Penalty Kick - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons Gnosian and Orodriel who are practicing penalty kicks. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_ball_kick_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21204,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23203,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23187,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23188,
          'level' => 1,
        ],
      ],
    ],
  ],
  20986 => 
  [
    'id' => 20986,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Gnosian - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Gnosian. Wearing a blue uniform. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_jball_male_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21205,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23204,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23189,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23190,
          'level' => 1,
        ],
      ],
    ],
  ],
  20987 => 
  [
    'id' => 20987,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Orodriel - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Orodriel. Wearing a blue uniform. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_jball_female_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21206,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23205,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23191,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23192,
          'level' => 1,
        ],
      ],
    ],
  ],
  20988 => 
  [
    'id' => 20988,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Penalty Kick - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons Gnosian and Orodriel who are practicing penalty kicks. All are wearing blue uniforms. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_jball_kick_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21207,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23206,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23193,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23194,
          'level' => 1,
        ],
      ],
    ],
  ],
  20989 => 
  [
    'id' => 20989,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Gnosian - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Gnosian. Wearing a red uniform. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_kball_male_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21208,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23207,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23195,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23196,
          'level' => 1,
        ],
      ],
    ],
  ],
  20990 => 
  [
    'id' => 20990,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Ball Trapping Orodriel - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons a ball-trapping Orodriel. Wearing a red uniform. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_kball_female_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21209,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23208,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23197,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23198,
          'level' => 1,
        ],
      ],
    ],
  ],
  20991 => 
  [
    'id' => 20991,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Penalty Kick - Soccer Ball of Cheers, Buff of Cheers',
    'add_name' => 'Soccer Ball of Cheers, Buff of Cheers',
    'description' => 'Bracelet that summons Gnosian and Orodriel who are practicing penalty kicks. All are wearing red uniforms. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse. Special skill reuse delay is 1 hour.',
    'icon' => 'BranchSys2.br_aga_kball_kick_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
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
          'skill_id' => 21210,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23209,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 23199,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 23200,
          'level' => 1,
        ],
      ],
    ],
  ],
  20992 => 
  [
    'id' => 20992,
    'type' => 'etcitem',
    'name' => 'Thirst of Victory Quenching Drink',
    'add_name' => '',
    'description' => 'Refreshing sports drink that immediately quenches thirst. Restores 1000 energy when used while a Ball Trapping Agathion or Penalty Kick Agathion are equipped. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_victory_potion_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22168,
        'level' => 1,
      ],
    ],
  ],
  20993 => 
  [
    'id' => 20993,
    'type' => 'etcitem',
    'name' => 'Soccer Ball of Cheers',
    'add_name' => '',
    'description' => 'Soccer ball given as a gift for cheering. When the soccer ball is used, you may obtain a Blessed Weapon Scroll of Enchantment (D~S Grades] with a fixed rate of chance. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_soccer_ball_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22169,
        'level' => 1,
      ],
    ],
  ],
  20994 => 
  [
    'id' => 20994,
    'type' => 'etcitem',
    'name' => 'Three-headed Dragon Agathion Pack - Wind Walk',
    'add_name' => 'Wind Walk',
    'description' => 'Wrapped pack containing a Three-headed Dragon Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20970,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20995 => 
  [
    'id' => 20995,
    'type' => 'etcitem',
    'name' => 'Liu Bei Opera Mask Pack',
    'add_name' => 'Buff of Virtue, Age of the Three Kingdoms',
    'description' => 'Wrapped pack containing a Liu Bei Opera Mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20973,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20996 => 
  [
    'id' => 20996,
    'type' => 'etcitem',
    'name' => 'Guan Yu Opera Mask Pack',
    'add_name' => 'Silence of Fidelity, Age of the Three Kingdoms',
    'description' => 'Wrapped pack containing a Guan Yu Opera Mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20974,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20997 => 
  [
    'id' => 20997,
    'type' => 'etcitem',
    'name' => 'Zhang Fei Opera Mask Pack',
    'add_name' => 'Vitality of Courage, Age of the Three Kingdoms',
    'description' => 'Wrapped pack containing a Zhang Fei Opera Mask. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20975,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20998 => 
  [
    'id' => 20998,
    'type' => 'etcitem',
    'name' => 'Dragon Boat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Dragon Boat. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20981,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20999 => 
  [
    'id' => 20999,
    'type' => 'etcitem',
    'name' => 'Dragon Boat 7-Day Pack - Haste',
    'add_name' => 'Haste',
    'description' => 'Wrapped pack containing a Dragon Boat (7 day]. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20982,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
];