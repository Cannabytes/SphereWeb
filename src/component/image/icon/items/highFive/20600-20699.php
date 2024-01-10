<?php
return [
  20600 => 
  [
    'id' => 20600,
    'type' => 'weapon',
    'name' => 'Twilight Staff - Dance of Shadow - 7-day limited period',
    'add_name' => 'Dance of Shadow - 7-day limited period',
    'description' => 'Staff that calls souls. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. Special skill reuse delay is 1 hours.',
    'icon' => 'br_invokespirit_stick_a_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
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
        'skill_id' => 21089,
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
  20601 => 
  [
    'id' => 20601,
    'type' => 'armor',
    'name' => 'Anniversary Hat - Soul of Phoenix - 7-day limited period',
    'add_name' => 'Soul of Phoenix - 7-day limited period',
    'description' => 'Hat that comforts souls. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. Special skill reuse delay is 24 hours.',
    'icon' => 'br_comfortspirit_hat_a_i00',
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
        'skill_id' => 21090,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20602 => 
  [
    'id' => 20602,
    'type' => 'etcitem',
    'name' => 'Soul Silver Foil (Event]',
    'add_name' => '',
    'description' => 'Silver Foil to comfort a spirit of monster.. When used on a corpse of monster, increases max HP by 60%, max MP by 60%, max CP by 60%, P. Def. by 30%, Magic Def. by 30%, Speed by 30, P. Atk. by 20%, and decreases skill MP consumption by 10% for 2 minutes. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_ghost_silverpaper_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22099,
        'level' => 1,
      ],
    ],
  ],
  20603 => 
  [
    'id' => 20603,
    'type' => 'etcitem',
    'name' => 'Soul Scent (Event]',
    'add_name' => '',
    'description' => 'Scent to comfort a spirit of monster.. When used on a corpse of monster, increases max HP by 40%, max CP by 40%, P. Def. by 30%, Magic Def. by 30%, Speed by 20, P. Atk. by 45%, and decreases skill MP consumption by 10% for 2 minutes. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_ghost_incense_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22100,
        'level' => 1,
      ],
    ],
  ],
  20604 => 
  [
    'id' => 20604,
    'type' => 'etcitem',
    'name' => 'Low-Class Certificate (Event]',
    'add_name' => '',
    'description' => 'A Certificate that shows you received the Event Small Scroll Chest.',
    'icon' => 'etc_royal_membership_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_questitem' => true,
  ],
  20605 => 
  [
    'id' => 20605,
    'type' => 'etcitem',
    'name' => 'Mid-Class Certificate (Event]',
    'add_name' => '',
    'description' => 'A Certificate that shows you received the Event Large Scroll Chest.',
    'icon' => 'etc_royal_membership_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_questitem' => true,
  ],
  20606 => 
  [
    'id' => 20606,
    'type' => 'etcitem',
    'name' => 'High-Class Certificate (Event] - 8-hour limited period',
    'add_name' => '8-hour limited period',
    'description' => 'A Certificate that shows you received the Event Chest of Experience.',
    'icon' => 'etc_royal_membership_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_questitem' => true,
    'time' => 480,
  ],
  20607 => 
  [
    'id' => 20607,
    'type' => 'etcitem',
    'name' => 'Headphone Pack',
    'add_name' => 'Town Theme',
    'description' => 'Wrapped pack containing a Headphone. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20613,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20608 => 
  [
    'id' => 20608,
    'type' => 'etcitem',
    'name' => 'Headphone Pack',
    'add_name' => 'Hero Theme',
    'description' => 'Wrapped pack containing a Headphone. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20614,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20609 => 
  [
    'id' => 20609,
    'type' => 'etcitem',
    'name' => 'Headphone Pack',
    'add_name' => 'Theme Park',
    'description' => 'Wrapped pack containing a Headphone. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20615,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20610 => 
  [
    'id' => 20610,
    'type' => 'etcitem',
    'name' => 'Headphone 7-Day Pack - Town Theme : Great Adventurer\'s Soul Power',
    'add_name' => 'Town Theme : Great Adventurer\'s Soul Power',
    'description' => 'Wrapped pack containing a Headphone (7 days]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20616,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20611 => 
  [
    'id' => 20611,
    'type' => 'etcitem',
    'name' => 'Headphone 7-Day Pack - Hero Theme : Great Warrior\'s Soul Power',
    'add_name' => 'Hero Theme : Great Warrior\'s Soul Power',
    'description' => 'Wrapped pack containing a Headphone (7 days]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20617,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20612 => 
  [
    'id' => 20612,
    'type' => 'etcitem',
    'name' => 'Headphone 7-Day Pack - Park theme : Great Wizard\'s Soul Power',
    'add_name' => 'Park theme : Great Wizard\'s Soul Power',
    'description' => 'Wrapped pack containing a Headphone (7 days]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20618,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20613 => 
  [
    'id' => 20613,
    'type' => 'armor',
    'name' => 'Headphone',
    'add_name' => 'Town Theme',
    'description' => 'Magic headphones that play town theme music. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21092,
        'level' => 1,
      ],
    ],
  ],
  20614 => 
  [
    'id' => 20614,
    'type' => 'armor',
    'name' => 'Headphone',
    'add_name' => 'Hero Theme',
    'description' => 'Magic headphones that play hero theme music. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21093,
        'level' => 1,
      ],
    ],
  ],
  20615 => 
  [
    'id' => 20615,
    'type' => 'armor',
    'name' => 'Headphone',
    'add_name' => 'Park Theme',
    'description' => 'Wrapped pack containing a Headphone, playing a magical Park theme. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'is_freightable' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21094,
        'level' => 1,
      ],
    ],
  ],
  20616 => 
  [
    'id' => 20616,
    'type' => 'armor',
    'name' => 'Headphone - Town Theme - 7-day limited period',
    'add_name' => 'Town Theme - 7-day limited period',
    'description' => 'Magic headphones that play town theme music. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21092,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21111,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20617 => 
  [
    'id' => 20617,
    'type' => 'armor',
    'name' => 'Headphone - Hero Theme - 7-day limited period',
    'add_name' => 'Hero Theme - 7-day limited period',
    'description' => 'Magic headphones that play hero theme music. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21093,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21112,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20618 => 
  [
    'id' => 20618,
    'type' => 'armor',
    'name' => 'Headphone - Park Theme - 7-day limited period',
    'add_name' => 'Park Theme - 7-day limited period',
    'description' => 'Wrapped pack containing a Headphone (7 days] playing a magical Park theme. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_headphone_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_premium' => true,
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21094,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21113,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20619 => 
  [
    'id' => 20619,
    'type' => 'etcitem',
    'name' => 'Female Weaver Agathion 24-Hour Pack - Flute Sound',
    'add_name' => 'Flute Sound',
    'description' => 'Wrapped pack containing a Female Weaver Agathion (24 hour]. No sale available. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'weight' => 100,
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
        'item_id' => 20621,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20620 => 
  [
    'id' => 20620,
    'type' => 'etcitem',
    'name' => 'Female Weaver Agathion 3-Day Pack - Flute Sound',
    'add_name' => 'Flute Sound',
    'description' => 'Wrapped pack containing a Female Weaver Agathion (3 day]. No sale available. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'weight' => 100,
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
        'item_id' => 20622,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20621 => 
  [
    'id' => 20621,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Female Weaver - Flute Sound - 24-hour limited period',
    'add_name' => 'Flute Sound - 24-hour limited period',
    'description' => 'Bracelet that summons the Female Weaver Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_aga_womanweaver_i00',
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
          'skill_id' => 21091,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23078,
          'level' => 1,
        ],
      ],
    ],
    'time' => 1440,
  ],
  20622 => 
  [
    'id' => 20622,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Female Weaver - Flute Sound - 3-day limited period',
    'add_name' => 'Flute Sound - 3-day limited period',
    'description' => 'Bracelet that summons the Female Weaver Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_aga_womanweaver_i00',
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
          'skill_id' => 21091,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23078,
          'level' => 1,
        ],
      ],
    ],
    'time' => 4320,
  ],
  20623 => 
  [
    'id' => 20623,
    'type' => 'etcitem',
    'name' => 'Soul Silver Foil - Scent Pack',
    'add_name' => '',
    'description' => 'Wrapped containing silver foil and scent that comfort the souls of monsters. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
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
        'item_id' => 20602,
        'min' => 100,
        'max' => 100,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 20603,
        'min' => 100,
        'max' => 100,
        'chance' => 100,
      ],
    ],
  ],
  20624 => 
  [
    'id' => 20624,
    'type' => 'etcitem',
    'name' => 'Soul Scent 100 Sheet Pack',
    'add_name' => '',
    'description' => 'Wrapped containing scent that comfort the souls of monsters. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
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
        'item_id' => 20603,
        'min' => 100,
        'max' => 100,
        'chance' => 100,
      ],
    ],
  ],
  20625 => 
  [
    'id' => 20625,
    'type' => 'etcitem',
    'name' => 'Anniversary Hat 7-Day Pack - Resurrection',
    'add_name' => 'Resurrection',
    'description' => 'Wrapped pack containing an Anniversary Hat (7 day]. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20626,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20626 => 
  [
    'id' => 20626,
    'type' => 'armor',
    'name' => 'Anniversary Hat - Resurrection - 7-Day Limited Period',
    'add_name' => 'Resurrection - 7-Day Limited Period',
    'description' => 'Hat that comforts souls. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. Special skill reuse delay is 12 hours.',
    'icon' => 'br_comfortspirit_hat_a_i00',
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
        'skill_id' => 21095,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20627 => 
  [
    'id' => 20627,
    'type' => 'etcitem',
    'name' => 'Summon of Love Bracelet 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Summon of Love Bracelet (7 day]. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20628,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20628 => 
  [
    'id' => 20628,
    'type' => 'armor',
    'name' => 'Summon of Love Bracelet - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Bracelet that can summon a friend. The summon is possible when the summoner and the one being summoned are all party members who are equipped with the Summon of Love Bracelet. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_ring_of_friendship_i00',
    'bodypart' => 'lbracelet',
    'weight' => 150,
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
        'skill_id' => 21097,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20629 => 
  [
    'id' => 20629,
    'type' => 'etcitem',
    'name' => 'Fortune of Love Box (event]',
    'add_name' => '',
    'description' => 'Can receive a Love Summon bracelet with a certain chance. Item to be stored in a private warehouse.',
    'icon' => 'etc_jewel_box_i00',
    'is_depositable' => false,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22101,
        'level' => 1,
      ],
    ],
  ],
  20630 => 
  [
    'id' => 20630,
    'type' => 'etcitem',
    'name' => 'Soul Magic Box',
    'add_name' => '',
    'description' => 'If you double click, Soul Silver Foil and Soul Scent items are created. No exchange/drop/sale/destroy available. (You can only use on every 24 hours.]',
    'icon' => 'br_ghost_magicalbox_i00',
    'etcitem_type' => 'elixir',
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
        'skill_id' => 22102,
        'level' => 1,
      ],
    ],
  ],
  20631 => 
  [
    'id' => 20631,
    'type' => 'etcitem',
    'name' => 'Laborer Hat 7-Day Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Laborer Hat (7 day]. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20633,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20632 => 
  [
    'id' => 20632,
    'type' => 'etcitem',
    'name' => 'Watermelon Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Watermelon Hat. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20634,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20633 => 
  [
    'id' => 20633,
    'type' => 'armor',
    'name' => 'Watermelon Hat - Ability of a Cool Watermelon - 7-day limited period',
    'add_name' => 'Ability of a Cool Watermelon - 7-day limited period',
    'description' => 'Hat that looks like a watermelon. It feels cool just by looking at it. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_watermelon_cap_a_i00',
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
        'skill_id' => 21096,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20634 => 
  [
    'id' => 20634,
    'type' => 'armor',
    'name' => 'Watermelon Hat',
    'add_name' => '',
    'description' => 'Hat that looks like a watermelon. It feels cool just by looking at it. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_watermelon_cap_a_i00',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_premium' => true,
    'is_oly_restricted' => true,
  ],
  20635 => 
  [
    'id' => 20635,
    'type' => 'etcitem',
    'name' => 'No Grade Beginner\'s Adventurer Support Pack',
    'add_name' => '',
    'description' => 'Pack provided for new adventurers in Aden World. Contains no grade items and cocktail drinks. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 8973,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 8977,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 9030,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 9031,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      4 => 
      [
        'item_id' => 9032,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      5 => 
      [
        'item_id' => 9033,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      6 => 
      [
        'item_id' => 9034,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      7 => 
      [
        'item_id' => 9035,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      8 => 
      [
        'item_id' => 21093,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
      9 => 
      [
        'item_id' => 21094,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  20636 => 
  [
    'id' => 20636,
    'type' => 'etcitem',
    'name' => 'D-Grade Fighter Support Pack',
    'add_name' => '',
    'description' => 'Pack provided for new adventurers in Aden World. Contains a D grade Fighter  Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20639,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 20640,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 20641,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 20642,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      4 => 
      [
        'item_id' => 20643,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      5 => 
      [
        'item_id' => 20644,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      6 => 
      [
        'item_id' => 20645,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      7 => 
      [
        'item_id' => 20646,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      8 => 
      [
        'item_id' => 20647,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      9 => 
      [
        'item_id' => 20648,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20637 => 
  [
    'id' => 20637,
    'type' => 'etcitem',
    'name' => 'D-Grade Mage Support Pack',
    'add_name' => '',
    'description' => 'Pack provided for new adventurers in Aden World. Contains a D grade Mage  Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
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
        'item_id' => 20649,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      1 => 
      [
        'item_id' => 20650,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 20651,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      3 => 
      [
        'item_id' => 20652,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      4 => 
      [
        'item_id' => 20653,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      5 => 
      [
        'item_id' => 20645,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20638 => 
  [
    'id' => 20638,
    'type' => 'etcitem',
    'name' => 'Beginner\'s Adventurer Reinforcement Pack',
    'add_name' => '',
    'description' => 'Pack provided for new adventurers in Aden World. Contains useful items. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i00',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_premium' => true,
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
      1 => 
      [
        'item_id' => 21091,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
      2 => 
      [
        'item_id' => 21092,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20639 => 
  [
    'id' => 20639,
    'type' => 'weapon',
    'name' => 'Common Item - Elven Long Sword',
    'add_name' => '',
    'description' => 'Elven Long Sword with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'weapon_elven_long_sword_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 100,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
      'pAtk' => 92,
      'mAtk' => 54,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  20640 => 
  [
    'id' => 20640,
    'type' => 'weapon',
    'name' => 'Common Item - Light Crossbow',
    'add_name' => '',
    'description' => 'Light Crossbow with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'weapon_cyclone_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 100,
    'soulshots' => 10,
    'spiritshots' => 3,
    'mp_consume' => 2,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
      'pAtk' => 191,
      'mAtk' => 54,
      'critRate' => 12,
      'pAtkSpd' => 293,
    ],
  ],
  20641 => 
  [
    'id' => 20641,
    'type' => 'weapon',
    'name' => 'Common Item - Knight\'s Sword*Elven Sword',
    'add_name' => '',
    'description' => 'Knight\'s Sword*Elven Sword with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 100,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
      'pAtk' => 107,
      'mAtk' => 51,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  20642 => 
  [
    'id' => 20642,
    'type' => 'armor',
    'name' => 'Common Item - Mithril Gloves',
    'add_name' => '',
    'description' => 'Mithril Gloves with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t46_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20643 => 
  [
    'id' => 20643,
    'type' => 'armor',
    'name' => 'Common Item - Plate Boots',
    'add_name' => '',
    'description' => 'Plate Boots with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t46_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20644 => 
  [
    'id' => 20644,
    'type' => 'armor',
    'name' => 'Common Item - Plate Shield',
    'add_name' => '',
    'description' => 'Plate Shield with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'shield_plate_shield_i00',
    'bodypart' => 'lhand',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
      'rShld' => 20,
      'sDef' => 154,
    ],
  ],
  20645 => 
  [
    'id' => 20645,
    'type' => 'armor',
    'name' => 'Common Item - Plate Helmet',
    'add_name' => '',
    'description' => 'Plate Helmet with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_leather_helmet_i00',
    'bodypart' => 'head',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20646 => 
  [
    'id' => 20646,
    'type' => 'armor',
    'name' => 'Common Item - Plate Gaiters',
    'add_name' => '',
    'description' => 'Plate Gaiters with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t46_l_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'legs',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20647 => 
  [
    'id' => 20647,
    'type' => 'armor',
    'name' => 'Common Item - Half Plate Armor',
    'add_name' => '',
    'description' => 'Half Plate Armor with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t46_u_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'chest',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20648 => 
  [
    'id' => 20648,
    'type' => 'armor',
    'name' => 'Common Item - Salamander Skin Mail',
    'add_name' => '',
    'description' => 'Salamander Skin Mail with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t45_ul_i00',
    'armor_type' => 'light',
    'bodypart' => 'onepiece',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20649 => 
  [
    'id' => 20649,
    'type' => 'weapon',
    'name' => 'Common Item - Ghost Staff',
    'add_name' => '',
    'description' => 'Ghost Staff of Mana with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'weapon_ghost_staff_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 100,
    'soulshots' => 3,
    'spiritshots' => 3,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_magic_weapon' => true,
    'stats' => 
    [
      'pAtk' => 90,
      'mAtk' => 79,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  20650 => 
  [
    'id' => 20650,
    'type' => 'armor',
    'name' => 'Common Item - Mithril Tunic',
    'add_name' => '',
    'description' => 'Mithril Tunic with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t51_u_i00',
    'armor_type' => 'magic',
    'bodypart' => 'chest',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20651 => 
  [
    'id' => 20651,
    'type' => 'armor',
    'name' => 'Common Item - Mithril Stockings',
    'add_name' => '',
    'description' => 'Mithril Stockings with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t51_l_i00',
    'armor_type' => 'magic',
    'bodypart' => 'legs',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20652 => 
  [
    'id' => 20652,
    'type' => 'armor',
    'name' => 'Common Item - Salamander Skin Boots',
    'add_name' => '',
    'description' => 'Salamander Skin Boots with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t45_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20653 => 
  [
    'id' => 20653,
    'type' => 'armor',
    'name' => 'Common Item - Ogre Power Gauntlet',
    'add_name' => '',
    'description' => 'Ogre Power Gauntlet with limited power enhancement. Enchantment, storing souls, and smelting are impossible. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'armor_t45_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 'd',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'stats' => 
    [
    ],
  ],
  20654 => 
  [
    'id' => 20654,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Chon-chon',
    'add_name' => '',
    'description' => 'Bracelet that summons the Chon-chon Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_luckygirl_i00',
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
          'skill_id' => 21105,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23079,
          'level' => 1,
        ],
      ],
    ],
  ],
  20655 => 
  [
    'id' => 20655,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Chon-chon - Great Warrior\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Warrior\'s Soul Power - 7-day limited period',
    'description' => 'Bracelet that summons the Chon-chon Agathion. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_luckygirl_i00',
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
          'skill_id' => 21105,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23080,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20656 => 
  [
    'id' => 20656,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Tang-tang',
    'add_name' => '',
    'description' => 'Bracelet that summons the Tang-tang Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_luckyboy_i00',
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
          'skill_id' => 21106,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23081,
          'level' => 1,
        ],
      ],
    ],
  ],
  20657 => 
  [
    'id' => 20657,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Tang-tang - Great Wizard\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Wizard\'s Soul Power - 7-day limited period',
    'description' => 'Bracelet that summons the Tang-tang Agathion. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_luckyboy_i00',
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
          'skill_id' => 21106,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23082,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20658 => 
  [
    'id' => 20658,
    'type' => 'armor',
    'name' => 'Agthion Seal Bracelet - Dancing Lucky Kid',
    'add_name' => '',
    'description' => 'The bracelet to summong the Dancing Lucky Kid Agathion Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_dancingchild_i00',
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
          'skill_id' => 21107,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23083,
          'level' => 1,
        ],
      ],
    ],
  ],
  20659 => 
  [
    'id' => 20659,
    'type' => 'armor',
    'name' => 'Agthion Seal Bracelet - Dancing Lucky Kid - Great Adventurer\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Adventurer\'s Soul Power - 7-day limited period',
    'description' => 'The bracelet to summong the Dancing Lucky Kid Agathion Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_dancingchild_i00',
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
          'skill_id' => 21107,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23084,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20660 => 
  [
    'id' => 20660,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Monkey King',
    'add_name' => '',
    'description' => 'Bracelet that summons Monkey King Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_sunwukong_i00',
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
          'skill_id' => 21108,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23085,
          'level' => 1,
        ],
      ],
    ],
  ],
  20661 => 
  [
    'id' => 20661,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Monkey King - Great Wizard\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Wizard\'s Soul Power - 7-day limited period',
    'description' => 'Bracelet that summons Monkey King Agathion. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_sunwukong_i00',
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
          'skill_id' => 21108,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23086,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20662 => 
  [
    'id' => 20662,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Utanka Agathion',
    'add_name' => '',
    'description' => 'Bracelet that summons the Utanka Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_uthanka_i00',
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
          'skill_id' => 21109,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23087,
          'level' => 1,
        ],
      ],
    ],
  ],
  20663 => 
  [
    'id' => 20663,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Utanka Agathion - Great Warrior\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Warrior\'s Soul Power - 7-day limited period',
    'description' => 'Bracelet that summons the Utanka Agathion. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_uthanka_i00',
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
          'skill_id' => 21109,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23088,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20664 => 
  [
    'id' => 20664,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Bonus B Agathion',
    'add_name' => '',
    'description' => 'Bracelet that summons Bonus B Agathion. Cannot be exchanged, dropped, or sold. Can be stored in a private warehouse.',
    'icon' => 'br_aga_bonus_i00',
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
          'skill_id' => 21110,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23089,
          'level' => 1,
        ],
      ],
    ],
  ],
  20665 => 
  [
    'id' => 20665,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Bonus B Agathion - Great Adventurer\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Adventurer\'s Soul Power - 7-day limited period',
    'description' => 'Bracelet that summons Bonus B Agathion. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_aga_bonus_i00',
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
          'skill_id' => 21110,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23090,
          'level' => 1,
        ],
      ],
    ],
    'time' => 10080,
  ],
  20666 => 
  [
    'id' => 20666,
    'type' => 'armor',
    'name' => 'Valkyrie Hat',
    'add_name' => '',
    'description' => 'The hat with Valkyrie\'s power in it. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_valkyrie_cap_i00',
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
  20667 => 
  [
    'id' => 20667,
    'type' => 'armor',
    'name' => 'Valkyrie Hat - Great Adventurer\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Adventurer\'s Soul Power - 7-day limited period',
    'description' => 'The hat with Valkyrie\'s power in it. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_valkyrie_cap_i00',
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
        'skill_id' => 21098,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20668 => 
  [
    'id' => 20668,
    'type' => 'armor',
    'name' => 'Tiger Hat',
    'add_name' => '',
    'description' => 'Tiger-shaped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_tiger_cap_i00',
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
  20669 => 
  [
    'id' => 20669,
    'type' => 'armor',
    'name' => 'Tiger Hat - Great Warrior\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Warrior\'s Soul Power - 7-day limited period',
    'description' => 'Tiger-shaped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_tiger_cap_i00',
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
        'skill_id' => 21099,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20670 => 
  [
    'id' => 20670,
    'type' => 'armor',
    'name' => 'Maid\'s Hairband',
    'add_name' => '',
    'description' => 'Cute Maid\'s Hairband Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_maid_hairband_i00',
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
  20671 => 
  [
    'id' => 20671,
    'type' => 'armor',
    'name' => 'Maid Hairband - Great Wizard\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Wizard\'s Soul Power - 7-day limited period',
    'description' => 'Cute Maid Hairband Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_maid_hairband_i00',
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
        'skill_id' => 21100,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20672 => 
  [
    'id' => 20672,
    'type' => 'armor',
    'name' => 'Baby Panda Hat',
    'add_name' => '',
    'description' => 'Baby-panda sahped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_babypanda_cap_i00',
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
  20673 => 
  [
    'id' => 20673,
    'type' => 'armor',
    'name' => 'Baby Panda Hat - Blessed Escape - 7-day limited period',
    'add_name' => 'Blessed Escape - 7-day limited period',
    'description' => 'Baby-panda sahped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_babypanda_cap_i00',
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
        'skill_id' => 21101,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20674 => 
  [
    'id' => 20674,
    'type' => 'armor',
    'name' => 'Bamboo Panda Hat',
    'add_name' => '',
    'description' => 'Bamboo-panda shaped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_kungfupanda_cap_i00',
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
  20675 => 
  [
    'id' => 20675,
    'type' => 'armor',
    'name' => 'Bamboo Panda Hat - Great Adventurer\'s Soul Power - 7-day limited period',
    'add_name' => 'Great Adventurer\'s Soul Power - 7-day limited period',
    'description' => 'Bamboo-panda shaped hat Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. ',
    'icon' => 'br_kungfupanda_cap_i00',
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
        'skill_id' => 21103,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20676 => 
  [
    'id' => 20676,
    'type' => 'armor',
    'name' => 'Sexy Panda Hat',
    'add_name' => '',
    'description' => 'Sexy-panda shaped hat. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_sexypanda_cap_i00',
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
  20677 => 
  [
    'id' => 20677,
    'type' => 'armor',
    'name' => 'Sexy Panda Hat - Blessed Resurrection - 7-day limited period',
    'add_name' => 'Blessed Resurrection - 7-day limited period',
    'description' => 'Sexy-panda shaped hat. Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_sexypanda_cap_i00',
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
        'skill_id' => 21102,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20678 => 
  [
    'id' => 20678,
    'type' => 'armor',
    'name' => 'Gatekeeper Hat',
    'add_name' => '',
    'description' => 'A hat that Gatekeeper wears Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_gatekeeper_of_hat_i00',
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
  20679 => 
  [
    'id' => 20679,
    'type' => 'armor',
    'name' => 'Gatekeeper Hat - Destroy Instinct - 7-day limited period',
    'add_name' => 'Destroy Instinct - 7-day limited period ',
    'description' => 'A hat that Gatekeeper wears Uses 2 hair accessory slots. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse. ',
    'icon' => 'br_gatekeeper_of_hat_i00',
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
        'skill_id' => 21104,
        'level' => 1,
      ],
    ],
    'time' => 10080,
  ],
  20680 => 
  [
    'id' => 20680,
    'type' => 'etcitem',
    'name' => 'Chon-chon Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Chon-chon Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20654,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20681 => 
  [
    'id' => 20681,
    'type' => 'etcitem',
    'name' => 'Chon-chon Agathion 7-Day Pack - Great Warrior\'s Soul Power',
    'add_name' => 'Great Warrior\'s Soul Power',
    'description' => 'Wrapped pack containing a Chon-chon Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20655,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20682 => 
  [
    'id' => 20682,
    'type' => 'etcitem',
    'name' => 'Tang-tang Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Tang-tang Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20656,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20683 => 
  [
    'id' => 20683,
    'type' => 'etcitem',
    'name' => 'Tang-tang Agathion 7-Day Pack - Great Wizard\'s Soul Power',
    'add_name' => 'Great Wizard\'s Soul Power',
    'description' => 'Wrapped pack containing a Tang-tang Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20657,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20684 => 
  [
    'id' => 20684,
    'type' => 'etcitem',
    'name' => 'Dancing Lucky Kid Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Dancing Lucky Kid Agathion  Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20658,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20685 => 
  [
    'id' => 20685,
    'type' => 'etcitem',
    'name' => 'Dancing Lucky Kid Agathion Pack (7 day]',
    'add_name' => 'Great Adventurer\'s Soul Power',
    'description' => 'Wrapped pack containing a Dancing Lucky Kid Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20659,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20686 => 
  [
    'id' => 20686,
    'type' => 'etcitem',
    'name' => 'Monkey King Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Monkey King Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20660,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20687 => 
  [
    'id' => 20687,
    'type' => 'etcitem',
    'name' => 'Monkey King Agathion 7-Day Pack - Great Wizard\'s Soul Power',
    'add_name' => 'Great Wizard\'s Soul Power',
    'description' => 'Wrapped pack containing a Monkey King Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20661,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20688 => 
  [
    'id' => 20688,
    'type' => 'etcitem',
    'name' => 'Utanka Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Utanka Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20662,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20689 => 
  [
    'id' => 20689,
    'type' => 'etcitem',
    'name' => 'Utanka Agathion 7-Day Pack - Great Warrior\'s Soul Power',
    'add_name' => 'Great Warrior\'s Soul Power',
    'description' => 'Wrapped pack containing a Utanka Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20663,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20690 => 
  [
    'id' => 20690,
    'type' => 'etcitem',
    'name' => 'Bonus B Agathion Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Bonus B Agathion. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20664,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20691 => 
  [
    'id' => 20691,
    'type' => 'etcitem',
    'name' => 'Bonus B Agathion 7-day Pack - Great Adventurer\'s Soul Power',
    'add_name' => 'Great Adventurer\'s Soul Power',
    'description' => 'Wrapped pack containing a Bonus B Agathion (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20665,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20692 => 
  [
    'id' => 20692,
    'type' => 'etcitem',
    'name' => 'Valkyrie Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Valkyrie Hat. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20666,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20693 => 
  [
    'id' => 20693,
    'type' => 'etcitem',
    'name' => 'Valkyrie Hat 7-Day Pack - Great Adventurer\'s Soul Power',
    'add_name' => 'Great Adventurer\'s Soul Power',
    'description' => 'Wrapped pack containing a Valkyrie Hat (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20667,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20694 => 
  [
    'id' => 20694,
    'type' => 'etcitem',
    'name' => 'Tiger Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Tiger Hat. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20668,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20695 => 
  [
    'id' => 20695,
    'type' => 'etcitem',
    'name' => 'Tiger Hat 7-Day Pack - Great Warrior\'s Soul Power',
    'add_name' => 'Great Warrior\'s Soul Power',
    'description' => 'Wrapped pack containing a Tiger Hat (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20669,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20696 => 
  [
    'id' => 20696,
    'type' => 'etcitem',
    'name' => 'Maid Hairband Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Maid Hairband. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20670,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20697 => 
  [
    'id' => 20697,
    'type' => 'etcitem',
    'name' => 'Maid Hairband 7-Day Pack - Great Wizard\'s Soul Power',
    'add_name' => 'Great Wizard\'s Soul Power',
    'description' => 'Wrapped pack containing a Maid Hairband (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20671,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20698 => 
  [
    'id' => 20698,
    'type' => 'etcitem',
    'name' => 'Baby Panda Hat Pack',
    'add_name' => '',
    'description' => 'Wrapped pack containing a Baby Panda Hat. Cannot be exchanged, dropped, or sold. Item to be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20672,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  20699 => 
  [
    'id' => 20699,
    'type' => 'etcitem',
    'name' => 'Agathion of Baby Panda 7-Day Pack - Blessing of Escape',
    'add_name' => 'Blessing of Escape ',
    'description' => 'Wrapped pack containing a Baby Panda Hat (7 day]. Cannot be exchanged, dropped, or sold.',
    'icon' => 'br_four_leaf_clover_box_i00',
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
        'item_id' => 20673,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
];