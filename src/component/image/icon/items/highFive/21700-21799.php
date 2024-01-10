<?php
return [
  21700 => 
  [
    'id' => 21700,
    'type' => 'etcitem',
    'name' => 'Olf\'s T-shirt Pack',
    'add_name' => '',
    'description' => 'Dimensional  Gift box containing 1 Olf\'s T-shirt. Can be exchanged while in a pack. Cannot be dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21580,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21701 => 
  [
    'id' => 21701,
    'type' => 'etcitem',
    'name' => 'Olf\'s T-shirt Pack - Event',
    'add_name' => 'Event',
    'description' => 'Gift box containing 1 Olf\'s T-shirt. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'weight' => 100,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'is_premium' => true,
    'is_oly_restricted' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21706,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21702 => 
  [
    'id' => 21702,
    'type' => 'etcitem',
    'name' => 'Olf\'s Thanksgiving Pack',
    'add_name' => '',
    'description' => 'Dimensional  Blessed Olf\'s T-shirt Enchant Scroll. Gift box containig 1 each of the Large Firework and Honey Rice Cakes. Can be exchanged while in a pack. Cannot be dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'is_sellable' => false,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21707,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21703 => 
  [
    'id' => 21703,
    'type' => 'etcitem',
    'name' => 'Olf\'s Thanksgiving XL Pack',
    'add_name' => '',
    'description' => 'Dimensional  Blessed Olf\'s T-shirt Enchant Scroll. Gift box containig 6 each of the Large Firework and Honey Rice Cakes. Can be exchanged while in a pack. Cannot be dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'is_sellable' => false,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21707,
        'min' => 6,
        'max' => 6,
        'chance' => 100,
      ],
    ],
  ],
  21704 => 
  [
    'id' => 21704,
    'type' => 'etcitem',
    'name' => 'Honey Rice Cakes',
    'add_name' => '',
    'description' => 'Delicious honey rice cakes. When used, instantly recovers Max MP by 50%. Reuse time is 5 minutes. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'br_taiwan_newyear_food_c_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
  ],
  21705 => 
  [
    'id' => 21705,
    'type' => 'etcitem',
    'name' => 'Honey Rice Cakes Pack',
    'add_name' => '',
    'description' => 'Gift box containing 3 delicious honey rice cakes. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_pi_gift_box_i04',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
  ],
  21706 => 
  [
    'id' => 21706,
    'type' => 'armor',
    'name' => 'Olf\'s T-shirt - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional  Olf\'s T-shirt Enchant Scroll. Can enhance up to +10 using a Blessed Olf\'s T-shirt Enchant Scroll. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.7anni_shirt_i00',
    'bodypart' => 'underwear',
    'weight' => 130,
    'enchant_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'stats' => 
    [
    ],
  ],
  21707 => 
  [
    'id' => 21707,
    'type' => 'etcitem',
    'name' => 'Blessed Olf\'s T-shirt Enchant Scroll - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional  Enchant scroll exclusive to Olf\'s T-shirt.. Increases the T-shirt\'s P. Def. and M. Def. by 1. Starting from +4, increases P. Def. by 3. Can safely enchant to +3 and up to a max +10. From +4, "basic abilities (CON, MEN, STR, INT, DEX, WIT]" are raised in stages. Special skills are added at +5, +7, +8 and +9. If the enchant fails, the existing enchant value becomes 0. Cannot be dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.etc_scroll_of_enchant_shirt_i00',
    'etcitem_type' => 'scrl_enchant_am',
    'weight' => 120,
    'is_dropable' => false,
    'is_stackable' => true,
    'handler' => 'enchantscrolls',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22248,
        'level' => 1,
      ],
    ],
  ],
  21708 => 
  [
    'id' => 21708,
    'type' => 'etcitem',
    'name' => 'Honey Rice Cakes',
    'add_name' => 'Event',
    'description' => 'Delicious honey rice cakes. When used, instantly recovers Max MP by 50%. Reuse time is 5 minutes. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse.',
    'icon' => 'br_taiwan_newyear_food_c_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
  ],
  21709 => 
  [
    'id' => 21709,
    'type' => 'armor',
    'name' => 'Agathion Seal Bracelet - Rudolph - Event',
    'add_name' => 'Event',
    'description' => 'Bracelet that can summon a cute Rudolph Agathion. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.event_lbracelet_rudolph',
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
          'skill_id' => 3267,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 21245,
          'level' => 1,
        ],
      ],
    ],
  ],
  21710 => 
  [
    'id' => 21710,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Beverage',
    'add_name' => 'Event',
    'description' => 'When used, replenishes energy to 100%. Reuse time is 60 minutes. Cannot be destroyed. Can be stored in a private warehouse.',
    'icon' => 'etc_hot_spring_mineral_i00',
    'weight' => 5,
    'is_destroyable' => false,
    'is_stackable' => true,
  ],
  21711 => 
  [
    'id' => 21711,
    'type' => 'etcitem',
    'name' => 'Santa Claus\'s Blessing',
    'add_name' => 'Event',
    'description' => 'When used, HP Recovery Bonus, Max MP, and Critical Atk. Rate +20%, and you can feel the effects of Prophecy of Water, Might, Haste, Empower, Acumen, Wind Walk, Vampiric Rage, Berserker Spirit, Shield, Focus, Death Whisper, Guidance, Clarity, Wild Magic, and Concentration for 1 hour. Cannot be destroyed. Can be stored in a private warehouse.',
    'icon' => 'br_xmas_miracle_i00',
    'weight' => 5,
    'is_destroyable' => false,
    'is_stackable' => true,
  ],
  21712 => 
  [
    'id' => 21712,
    'type' => 'armor',
    'name' => 'Blessed Earring of Zaken',
    'add_name' => '',
    'description' => 'MP+37, Resistance to Bleed +30%, Bleed attack rate +30%, heal amount +15%, vampiric rage effect, Resistance to Shock/Mental attacks +30%, Shock/Mental attack rate +30%, and Resistance to Dark +15. Only one effect is applied even when the same two earrings are worn. If it is equipped together with a standard Earring of Zaken, only the effect of Blessed Earring of Zaken will be applied.',
    'icon' => 'accessory_earring_of_zaken_i00',
    'bodypart' => 'rear;lear',
    'crystal_count' => 547,
    'crystal_type' => 's84',
    'weight' => 150,
    'enchant_enabled' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3559,
        'level' => 2,
      ],
    ],
    'price' => 11394000,
    'stats' => 
    [
    ],
  ],
  21713 => 
  [
    'id' => 21713,
    'type' => 'etcitem',
    'name' => 'Sealed Cloak of Zaken',
    'add_name' => '',
    'description' => 'When the seal is released, P. Def. and attribute resistance increase, and special skills can be used. It can be equipped only after releasing the seal through the weavers Olf Kanore in Aden or Olf Adams in Rune. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'sealed_vesper_cloack_i01',
    'price' => 29674485,
    'weight' => 220,
  ],
  21714 => 
  [
    'id' => 21714,
    'type' => 'etcitem',
    'name' => 'Sealed Cloak of Freya',
    'add_name' => '',
    'description' => 'When the seal is released, P. Def. and attribute resistance increase, and special skills can be used. It can be equipped only after releasing the seal through the weavers Olf Kanore in Aden or Olf Adams in Rune. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'sealed_vesper_cloack_i01',
    'price' => 32971650,
    'weight' => 220,
  ],
  21715 => 
  [
    'id' => 21715,
    'type' => 'etcitem',
    'name' => 'Sealed Cloak of Frintezza',
    'add_name' => '',
    'description' => 'When the seal is released, P. Def. and attribute resistance increase, and special skills can be used. It can be equipped only after releasing the seal through the weavers Olf Kanore in Aden or Olf Adams in Rune. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'sealed_vesper_cloack_i01',
    'price' => 29674485,
    'weight' => 220,
  ],
  21716 => 
  [
    'id' => 21716,
    'type' => 'armor',
    'name' => 'Cloak of Zaken',
    'add_name' => '',
    'description' => 'Cloak that makes you feel Zaken\'s sorrow. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'BranchSys2.Icon.br_zaken_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's80',
    'price' => 29674485,
    'weight' => 220,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21242,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21717 => 
  [
    'id' => 21717,
    'type' => 'armor',
    'name' => 'Cloak of Freya',
    'add_name' => '',
    'description' => 'Cloak that makes you feel Freya\'s chill. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'BranchSys2.Icon.br_freya_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's84',
    'price' => 32971650,
    'weight' => 220,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21243,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21718 => 
  [
    'id' => 21718,
    'type' => 'armor',
    'name' => 'Cloak of Frintezza',
    'add_name' => '',
    'description' => 'Cloak that plays Frintezza\'s melody over and over in your head. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, and refining are impossible. Can be exchanged or dropped.',
    'icon' => 'BranchSys2.Icon.br_frintessa_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's80',
    'price' => 29674485,
    'weight' => 220,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21244,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21719 => 
  [
    'id' => 21719,
    'type' => 'armor',
    'name' => 'Soul Cloak of Zaken',
    'add_name' => '',
    'description' => 'Cloak embroidered with Zaken\'s soul. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, refining, exchange, and drop are impossible.',
    'icon' => 'BranchSys2.Icon.br_zaken_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's80',
    'weight' => 110,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21242,
        'level' => 1,
      ],
    ],
    'is_tradable' => false,
    'is_dropable' => false,
    'stats' => 
    [
    ],
  ],
  21720 => 
  [
    'id' => 21720,
    'type' => 'armor',
    'name' => 'Soul Cloak of Freya',
    'add_name' => '',
    'description' => 'Cloak embroidered with Freya\'s soul. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, refining, exchange, and drop are impossible.',
    'icon' => 'BranchSys2.Icon.br_freya_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's84',
    'weight' => 110,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21243,
        'level' => 1,
      ],
    ],
    'is_tradable' => false,
    'is_dropable' => false,
    'stats' => 
    [
    ],
  ],
  21721 => 
  [
    'id' => 21721,
    'type' => 'armor',
    'name' => 'Soul Cloak of Frintezza',
    'add_name' => '',
    'description' => 'Cloak embroidered with Frintezza\'s soul. Increases P. Def. and attribute resistance. Unlocks a skill to move to the boss area. Can only be equipped when the cloak slot is open. Enchantment, attribute, refining, exchange, and drop are impossible.',
    'icon' => 'BranchSys2.Icon.br_frintessa_cloak_i00',
    'bodypart' => 'back',
    'crystal_type' => 's80',
    'weight' => 110,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21244,
        'level' => 1,
      ],
    ],
    'is_tradable' => false,
    'is_dropable' => false,
    'stats' => 
    [
    ],
  ],
  21722 => 
  [
    'id' => 21722,
    'type' => 'etcitem',
    'name' => 'Zaken\'s Soul Fragment',
    'add_name' => '',
    'description' => 'Small fragment that contains a part of Zaken\'s soul. See weaver Olf Adams to find out what use it has.',
    'icon' => 'etc_jewel_gold_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  21723 => 
  [
    'id' => 21723,
    'type' => 'etcitem',
    'name' => 'Freya\'s Soul Fragment',
    'add_name' => '',
    'description' => 'Small fragment that contains a part of Freya\'s soul. See weaver Olf Adams to find out what use it has.',
    'icon' => 'etc_jewel_gold_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  21724 => 
  [
    'id' => 21724,
    'type' => 'etcitem',
    'name' => 'Frintezza\'s Soul Fragment',
    'add_name' => '',
    'description' => 'Small fragment that contains a part of Frintezza\'s soul. See weaver Olf Adams to find out what use it has.',
    'icon' => 'etc_jewel_gold_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  21725 => 
  [
    'id' => 21725,
    'type' => 'etcitem',
    'name' => 'Staff of Goddess: Rain Song Fragment',
    'add_name' => '',
    'description' => 'A severaly damaged staff piece. A mysterious light shines faintly.',
    'icon' => 'etc_i.etc_vesper_caster_piece_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_depositable' => false,
    'is_stackable' => true,
    'is_questitem' => true,
  ],
  21726 => 
  [
    'id' => 21726,
    'type' => 'etcitem',
    'name' => 'Angel Cat\'s Blessing',
    'add_name' => 'Event',
    'description' => 'When used, HP Recovery Bonus, Max MP, and Critical Atk. Rate +20%, and you can feel the effects of Prophecy of Water, Might, Haste, Empower, Acumen, Wind Walk, Vampiric Rage, Berserker Spirit, Shield, Focus, Death Whisper, Guidance, Clarity, Wild Magic, and Concentration for 1 hour. Cannot be exchanged, dropped, or destroyed. Can be stored in a private warehouse.',
    'icon' => 'br_xmas_miracle_i00',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
  ],
  21727 => 
  [
    'id' => 21727,
    'type' => 'armor',
    'name' => 'Zinenze Agathion Bracelet (3 day] - 3-day limited period',
    'add_name' => '3-day limited period',
    'description' => 'Bracelet skill that let\'s you summon Zinenze for 3 days.. Upon using the skill name, instantly recovers Exp, HP, MP, and CP, and makes you invincible for 5 seconds. (But can only be used when HP is below 30%.]. Cool time is 12 hour(s].. Can be stored in a private warehouse. But cannot be exchange, dropped, or sold in shops.',
    'icon' => 'BranchSys2.Icon.br_aga_jinjiayan_i00',
    'bodypart' => 'lbracelet',
    'weight' => 120,
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
          'skill_id' => 21248,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23305,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23306,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
    'time' => 4320,
  ],
  21728 => 
  [
    'id' => 21728,
    'type' => 'armor',
    'name' => 'Zinenze Agathion Bracelet (7 day] - 7-day limited period',
    'add_name' => '7-day limited period',
    'description' => 'Bracelet skill that let\'s you summon Zinenze for 3 days.. Upon using the skill name, instantly recovers Exp, HP, MP, and CP, and makes you invincible for 5 seconds. (But can only be used when HP is below 31%.]. Cool time is 12 hour(s].. Can be stored in a private warehouse. But cannot be exchange, dropped, or sold in shops.',
    'icon' => 'BranchSys2.Icon.br_aga_jinjiayan_i00',
    'bodypart' => 'lbracelet',
    'weight' => 120,
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
          'skill_id' => 21248,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23305,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 23306,
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
  21729 => 
  [
    'id' => 21729,
    'type' => 'armor',
    'name' => 'Enze Agathion Bracelet',
    'add_name' => 'Permanent',
    'description' => 'Enze Agathion. Upon skill use, transforms into an Enze fairy. Can stay as an Enze fairy for 10 minutes. Cool time is 5 hours.. Can be traded, sold at a private store, and stored in a private warehouse. But cannot be dropped or sold at a shop.',
    'icon' => 'BranchSys2.Icon.br_aga_jiayan_i00',
    'bodypart' => 'lbracelet',
    'weight' => 120,
    'is_dropable' => false,
    'is_sellable' => false,
    'unequip_skill' => '3267-1',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 21249,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 23307,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 3267,
          'level' => 1,
        ],
      ],
    ],
  ],
  21730 => 
  [
    'id' => 21730,
    'type' => 'etcitem',
    'name' => 'Letter Collector\'s Gift',
    'add_name' => 'Event',
    'description' => '7th Anniversary. Letter Collector\'s Gift. Upon use, for 2 hours, increases Atk. Spd. +15%, Casting Spd. +15%, Speed +20, and changes the appearance of the equipped weapon and armor to look like items from the past. Reuse time is 60 minutes.',
    'icon' => 'br_shield_bread_i01',
    'weight' => 5,
    'is_stackable' => true,
  ],
  21731 => 
  [
    'id' => 21731,
    'type' => 'weapon',
    'name' => 'Maingauche',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Maingauche of Memory',
    'icon' => 'weapon_maingauche_i00',
    'weapon_type' => 'dagger',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1070,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 69,
      'mAtk' => 47,
      'critRate' => 12,
      'pAtkSpd' => 433,
    ],
  ],
  21732 => 
  [
    'id' => 21732,
    'type' => 'weapon',
    'name' => 'Sword of Revolution',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Sword of Revolution of Memory',
    'icon' => 'weapon_sword_of_revolution_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1450,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  21733 => 
  [
    'id' => 21733,
    'type' => 'weapon',
    'name' => 'Titan Sword',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Titan Sword of Memory',
    'icon' => 'weapon_giants_sword_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2020,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  21734 => 
  [
    'id' => 21734,
    'type' => 'weapon',
    'name' => 'Priest Mace',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Priest Mace of Memory',
    'icon' => 'weapon_mace_of_priest_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1720,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 63,
      'mAtk' => 63,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  21735 => 
  [
    'id' => 21735,
    'type' => 'weapon',
    'name' => 'Tarbar',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Tarbar of Memory',
    'icon' => 'weapon_tarbar_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1730,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 379,
    ],
  ],
  21736 => 
  [
    'id' => 21736,
    'type' => 'weapon',
    'name' => 'Goat Head Staff',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Goat Head Staff of Memory',
    'icon' => 'weapon_goathead_staff_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 1000,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 77,
      'mAtk' => 69,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  21737 => 
  [
    'id' => 21737,
    'type' => 'weapon',
    'name' => 'Titan Hammer',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Titan Hammer of Memory',
    'icon' => 'weapon_giants_hammer_i00',
    'weapon_type' => 'blunt',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2100,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  21738 => 
  [
    'id' => 21738,
    'type' => 'weapon',
    'name' => 'Winged Spear',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Winged Spear of Memory',
    'icon' => 'weapon_winged_spear_i00',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2060,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 79,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  21739 => 
  [
    'id' => 21739,
    'type' => 'weapon',
    'name' => 'Reinforced Long Bow',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Strengthened Low Bow of Memory',
    'icon' => 'weapon_strengthening_long_bow_i00',
    'weapon_type' => 'bow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 1820,
    'soulshots' => 10,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 179,
      'mAtk' => 51,
      'critRate' => 12,
      'pAtkSpd' => 227,
    ],
  ],
  21740 => 
  [
    'id' => 21740,
    'type' => 'weapon',
    'name' => 'Epee',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Epee of Memory',
    'icon' => 'weapon_rapier_i00',
    'weapon_type' => 'rapier',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1450,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 72,
      'mAtk' => 47,
      'critRate' => 10,
      'pAtkSpd' => 406,
    ],
  ],
  21741 => 
  [
    'id' => 21741,
    'type' => 'weapon',
    'name' => 'Sword of Magic Fog',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Sword of Magic Fog of Memory',
    'icon' => 'weapon_sword_of_magic_fog_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'd',
    'weight' => 1450,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 63,
      'mAtk' => 63,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  21742 => 
  [
    'id' => 21742,
    'type' => 'weapon',
    'name' => 'Bastard Sword*Bastard Sword',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Bastars*Bastard of Memory',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2470,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  21743 => 
  [
    'id' => 21743,
    'type' => 'weapon',
    'name' => 'Bich\'Hwa',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Bich\'Hwa of Memory',
    'icon' => 'weapon_bichhwa_i00',
    'weapon_type' => 'dualfist',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 1510,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 96,
      'mAtk' => 47,
      'critRate' => 4,
      'pAtkSpd' => 325,
    ],
  ],
  21744 => 
  [
    'id' => 21744,
    'type' => 'weapon',
    'name' => 'Katzbalger',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Katzbalger of Memory',
    'icon' => 'weapon_tulwar_i00',
    'weapon_type' => 'ancientsword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2020,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 86,
      'mAtk' => 47,
      'critRate' => 8,
      'pAtkSpd' => 350,
    ],
  ],
  21745 => 
  [
    'id' => 21745,
    'type' => 'weapon',
    'name' => 'Arm Breaker',
    'add_name' => 'Event',
    'description' => 'Letter Collector\'s Arm Breaker of Memory',
    'icon' => 'weapon_hunting_gun_i00',
    'weapon_type' => 'crossbow',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 1820,
    'soulshots' => 6,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 100,
      'mAtk' => 47,
      'critRate' => 10,
      'pAtkSpd' => 303,
    ],
  ],
  21746 => 
  [
    'id' => 21746,
    'type' => 'etcitem',
    'name' => 'Maestro\'s Key',
    'add_name' => '',
    'description' => 'Can open Treasure Chests between level 21-85 with 100% chance. When a character below level 77 uses it on a treasure chest that is more than 6 levels above, or when a character above level 78 uses it on a treasure chest that is more than 5 levels above, the key disappears but the reward cannot be obtained.',
    'icon' => 'etc_old_key_i00',
    'weight' => 10,
    'price' => 1800,
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22271,
        'level' => 1,
      ],
    ],
  ],
  21747 => 
  [
    'id' => 21747,
    'type' => 'etcitem',
    'name' => 'Beginner Adventurer\'s Treasure Sack',
    'add_name' => '',
    'description' => 'Treasure sack containing the treasure of beginner adventurers. Open it to obtain one random C or D-Grade Weapon.',
    'icon' => 'BranchSys2.etc_ancient_treasure_sack_i00',
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22272,
        'level' => 1,
      ],
    ],
  ],
  21748 => 
  [
    'id' => 21748,
    'type' => 'etcitem',
    'name' => 'Experienced Adventurer\'s Treasure Sack',
    'add_name' => '',
    'description' => 'Treasure sack containing the treasure of experienced adventurers. Open it to obtain one random B, A or S-Grade Weapon (Dynasty excluded].',
    'icon' => 'BranchSys2.etc_ancient_treasure_sack_i00',
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22273,
        'level' => 1,
      ],
    ],
  ],
  21749 => 
  [
    'id' => 21749,
    'type' => 'etcitem',
    'name' => 'Great Adventurer\'s Treasure Sack',
    'add_name' => '',
    'description' => 'Treasure sack containing the treasure of great adventurers. Open it to obtain one random Dynasty, Icarus or Vesper Weapon.',
    'icon' => 'BranchSys2.etc_ancient_treasure_sack_i00',
    'is_stackable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22274,
        'level' => 1,
      ],
    ],
  ],
  21750 => 
  [
    'id' => 21750,
    'type' => 'etcitem',
    'name' => 'Blue Elmore Coin',
    'add_name' => '',
    'description' => 'Token received by adventurers for their service to the Elmore king. If you bring it to Captain Mathias in Rune, you will receive a reward. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_coins_blue_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
  ],
  21751 => 
  [
    'id' => 21751,
    'type' => 'etcitem',
    'name' => 'Rune Jewelry Box - Crystal',
    'add_name' => '',
    'description' => 'Jewelry box containing the precious treasure of Rune. When used, you can obtain 15 Crystals of Life with a certain rate of chance.',
    'icon' => 'etc_treasure_box_i07',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_sellable' => false,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22275,
        'level' => 1,
      ],
    ],
  ],
  21752 => 
  [
    'id' => 21752,
    'type' => 'etcitem',
    'name' => 'Rune Jewelry Box - Talisman',
    'add_name' => '',
    'description' => 'Jewelry box containing the precious treasure of Rune. When used, you can obtain a Talisman with a certain rate of chance.',
    'icon' => 'etc_treasure_box_i06',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_sellable' => false,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22276,
        'level' => 1,
      ],
    ],
  ],
  21753 => 
  [
    'id' => 21753,
    'type' => 'etcitem',
    'name' => 'Pablo\'s Box',
    'add_name' => '',
    'description' => 'Box containing the precious treasure of Elmore\'s renowned scholar Pablo. When used, you can obtain a hat with a certain rate of chance.',
    'icon' => 'etc_treasure_box_i01',
    'is_stackable' => true,
  ],
  21754 => 
  [
    'id' => 21754,
    'type' => 'weapon',
    'name' => 'Server Ziggi\'s Magic Pencil',
    'add_name' => '',
    'description' => 'Magic pencil with a sharp tip. Item that can be used only on the server Ziggi. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.g_pencil_of_servermaster',
    'weapon_type' => 'pole',
    'bodypart' => 'lrhand',
    'weight' => 100,
    'soulshots' => 2,
    'spiritshots' => 2,
    'is_tradable' => false,
    'is_dropable' => false,
    'stats' => 
    [
      'pAtk' => 1,
      'mAtk' => 1,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  21755 => 
  [
    'id' => 21755,
    'type' => 'armor',
    'name' => 'Manor Scholar\'s Hat',
    'add_name' => '',
    'description' => 'Scholar\'s hat showing knowledge. A gold tassle is attached. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.g_graduation_cap_gold',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
  ],
  21756 => 
  [
    'id' => 21756,
    'type' => 'armor',
    'name' => 'Rank 1 Scholar\'s Hat',
    'add_name' => '',
    'description' => 'Scholar\'s hat showing knowledge. A silver tassle is attached. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.g_graduation_cap_white',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
  ],
  21757 => 
  [
    'id' => 21757,
    'type' => 'armor',
    'name' => 'Rank 2 Scholar\'s Hat',
    'add_name' => '',
    'description' => 'Scholar\'s hat showing knowledge. A red tassle is attached. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.g_graduation_cap_red',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
  ],
  21758 => 
  [
    'id' => 21758,
    'type' => 'armor',
    'name' => 'Rank 3 Scholar\'s Hat',
    'add_name' => '',
    'description' => 'Scholar\'s hat showing knowledge. A blue tassle is attached. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.g_graduation_cap_blue',
    'bodypart' => 'hairall',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
  ],
  21759 => 
  [
    'id' => 21759,
    'type' => 'etcitem',
    'name' => 'Illumination - Red',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_red',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21760 => 
  [
    'id' => 21760,
    'type' => 'etcitem',
    'name' => 'Illumination - Pink',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_pink',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21761 => 
  [
    'id' => 21761,
    'type' => 'etcitem',
    'name' => 'Illumination - Rose Pink',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_rosepink',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21762 => 
  [
    'id' => 21762,
    'type' => 'etcitem',
    'name' => 'Illumination - Orange',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_orange',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21763 => 
  [
    'id' => 21763,
    'type' => 'etcitem',
    'name' => 'Illumination - Mint Green',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_mintgreen',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21764 => 
  [
    'id' => 21764,
    'type' => 'etcitem',
    'name' => 'Illumination - Green',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_green',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21765 => 
  [
    'id' => 21765,
    'type' => 'etcitem',
    'name' => 'Illumination - Sky Blue',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_skyblue',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21766 => 
  [
    'id' => 21766,
    'type' => 'etcitem',
    'name' => 'Illumination - Blue',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_blue',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21767 => 
  [
    'id' => 21767,
    'type' => 'etcitem',
    'name' => 'Illumination - Purple',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_purple',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21768 => 
  [
    'id' => 21768,
    'type' => 'etcitem',
    'name' => 'Illumination - White',
    'add_name' => '',
    'description' => 'Brightly burning illumination. ',
    'icon' => 'BranchSys2.g_illumination_white',
    'weight' => 2,
    'is_stackable' => true,
  ],
  21769 => 
  [
    'id' => 21769,
    'type' => 'etcitem',
    'name' => 'Unrefined Ore',
    'add_name' => '',
    'description' => 'Ore before refining. Absolutely necessary for the craftsman to make a jewel. It should still fetch a certain price at the shop.',
    'icon' => 'etc_stone_piece_i00',
    'is_stackable' => true,
  ],
  21770 => 
  [
    'id' => 21770,
    'type' => 'etcitem',
    'name' => 'Unrefined Jewel',
    'add_name' => '',
    'description' => 'Jewel before refining. Absolutely necessary for the craftsman to make a jewel. It should still fetch a certain price at the shop.',
    'icon' => 'etc_vacualite_noglow_blue_i00',
    'is_stackable' => true,
  ],
  21771 => 
  [
    'id' => 21771,
    'type' => 'etcitem',
    'name' => 'Jewel of Dusk',
    'add_name' => '',
    'description' => 'Jewel carged with ancient skills. It shines brightly. It should still fetch a certain price at the shop.',
    'icon' => 'BranchSys2.g_twilight_gem',
    'is_stackable' => true,
  ],
  21772 => 
  [
    'id' => 21772,
    'type' => 'etcitem',
    'name' => 'Jewel of Dawn',
    'add_name' => '',
    'description' => 'The jewel of dawn that was created by the craftsman using ancient skills. It shines brightly. It should still fetch a considerable price at the shop.',
    'icon' => 'BranchSys2.g_dawn_gem',
    'is_stackable' => true,
  ],
  21773 => 
  [
    'id' => 21773,
    'type' => 'etcitem',
    'name' => 'Jewel of Splendor',
    'add_name' => '',
    'description' => 'The jewel of dawn that was created by the craftsman using ancient skills. It shines brightly. It should still fetch a considerable price at the shop.',
    'icon' => 'BranchSys2.g_brilliance_gem',
    'is_stackable' => true,
  ],
  21774 => 
  [
    'id' => 21774,
    'type' => 'etcitem',
    'name' => 'Giant\'s Jewel',
    'add_name' => '',
    'description' => 'The giant\'s jewel that was created by the craftsman using ancient skills. It shines brightly. It should still fetch a considerable price at the shop.',
    'icon' => 'BranchSys2.g_giant_gem',
    'is_stackable' => true,
  ],
  21775 => 
  [
    'id' => 21775,
    'type' => 'armor',
    'name' => 'Imperial Crusader Breastplate of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t88_u_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'chest',
    'crystal_type' => 's',
    'weight' => 7620,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21776 => 
  [
    'id' => 21776,
    'type' => 'armor',
    'name' => 'Imperial Crusader Gaiters of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t88_l_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'legs',
    'crystal_type' => 's',
    'weight' => 3260,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21777 => 
  [
    'id' => 21777,
    'type' => 'armor',
    'name' => 'Imperial Crusader Gauntlet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t88_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 's',
    'weight' => 540,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21778 => 
  [
    'id' => 21778,
    'type' => 'armor',
    'name' => 'Imperial Crusader Boots of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t88_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 's',
    'weight' => 1110,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21779 => 
  [
    'id' => 21779,
    'type' => 'armor',
    'name' => 'Imperial Crusader Helmet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_helmet_i00',
    'bodypart' => 'head',
    'crystal_type' => 's',
    'weight' => 550,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21780 => 
  [
    'id' => 21780,
    'type' => 'armor',
    'name' => 'Imperial Crusader Shield of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'shield_imperial_crusader_shield_i00',
    'bodypart' => 'lhand',
    'crystal_type' => 's',
    'weight' => 1170,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
      'rShld' => 20,
      'sDef' => 290,
    ],
  ],
  21781 => 
  [
    'id' => 21781,
    'type' => 'etcitem',
    'name' => 'Imperial Crusader of Fortune Set Pack (S-Grade] - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire an Imperial Crusader of Fortune armor set. Expires after 90 days if not used. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_equip_item_box_i02',
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
  ],
  21782 => 
  [
    'id' => 21782,
    'type' => 'armor',
    'name' => 'Draconic Leather Armor of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'One-piece Body Armor. Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t89_ul_i00',
    'armor_type' => 'light',
    'bodypart' => 'onepiece',
    'crystal_type' => 's',
    'weight' => 4950,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21783 => 
  [
    'id' => 21783,
    'type' => 'armor',
    'name' => 'Draconic Leather Gloves of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t89_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 's',
    'weight' => 540,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21784 => 
  [
    'id' => 21784,
    'type' => 'armor',
    'name' => 'Draconic Leather Boots of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t89_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 's',
    'weight' => 1110,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21785 => 
  [
    'id' => 21785,
    'type' => 'armor',
    'name' => 'Draconic Leather Helmet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_leather_helmet_i00',
    'bodypart' => 'head',
    'crystal_type' => 's',
    'weight' => 550,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21786 => 
  [
    'id' => 21786,
    'type' => 'etcitem',
    'name' => 'Draconic Leather of Fortune Set Pack (S-Grade] - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire a Draconic Leather of Fortune Armor Set. Expires after 90 days if not used. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_equip_item_box_i02',
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
  ],
  21787 => 
  [
    'id' => 21787,
    'type' => 'armor',
    'name' => 'Major Arcana Robe of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'One-piece Body Armor. Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t90_ul_i00',
    'armor_type' => 'magic',
    'bodypart' => 'onepiece',
    'crystal_type' => 's',
    'weight' => 2300,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21788 => 
  [
    'id' => 21788,
    'type' => 'armor',
    'name' => 'Major Arcana Gloves of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t90_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 's',
    'weight' => 540,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21789 => 
  [
    'id' => 21789,
    'type' => 'armor',
    'name' => 'Major Arcana Boots of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t90_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 's',
    'weight' => 1110,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21790 => 
  [
    'id' => 21790,
    'type' => 'armor',
    'name' => 'Major Arcana Circlet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_circlet_i00',
    'bodypart' => 'head',
    'crystal_type' => 's',
    'weight' => 550,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21791 => 
  [
    'id' => 21791,
    'type' => 'armor',
    'name' => 'Arcana Sickle of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'arcana_sigil_i00',
    'bodypart' => 'lhand',
    'crystal_type' => 's',
    'weight' => 940,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21792 => 
  [
    'id' => 21792,
    'type' => 'etcitem',
    'name' => 'Major Arcana Robe of Fortune Set Pack (S-Grade] - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire an Arcana Robe of Fortune Set. Expires after 90 days if not used. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_equip_item_box_i02',
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
  ],
  21793 => 
  [
    'id' => 21793,
    'type' => 'armor',
    'name' => 'Dynasty Breastplate of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t91_u_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'chest',
    'crystal_type' => 's',
    'weight' => 7570,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21794 => 
  [
    'id' => 21794,
    'type' => 'armor',
    'name' => 'Dynasty Gaiters of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t91_l_i00',
    'armor_type' => 'heavy',
    'bodypart' => 'legs',
    'crystal_type' => 's',
    'weight' => 3210,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21795 => 
  [
    'id' => 21795,
    'type' => 'armor',
    'name' => 'Dynasty Gauntlet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t91_g_i00',
    'bodypart' => 'gloves',
    'crystal_type' => 's',
    'weight' => 520,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21796 => 
  [
    'id' => 21796,
    'type' => 'armor',
    'name' => 'Dynasty Boots of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_t91_b_i00',
    'bodypart' => 'feet',
    'crystal_type' => 's',
    'weight' => 1090,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21797 => 
  [
    'id' => 21797,
    'type' => 'armor',
    'name' => 'Dynasty Helmet of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse. Can be assigned an attribute.',
    'icon' => 'armor_helmet_i00',
    'bodypart' => 'head',
    'crystal_type' => 's',
    'weight' => 530,
    'element_enabled' => true,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
    ],
  ],
  21798 => 
  [
    'id' => 21798,
    'type' => 'armor',
    'name' => 'Dynasty Shield of Fortune - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'shield_dynasty_shield_i00',
    'bodypart' => 'lhand',
    'crystal_type' => 's',
    'weight' => 1150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
    'stats' => 
    [
      'rShld' => 20,
      'sDef' => 321,
    ],
  ],
  21799 => 
  [
    'id' => 21799,
    'type' => 'etcitem',
    'name' => 'Dynasty Breastplate of Fortune Set Pack (S-Grade] - 90-day limited period',
    'add_name' => '90-day limited period',
    'description' => 'When used, you acquire a Dynasty Breastplate Armor of Fortune Set. Expires after 90 days if not used. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'etc_equip_item_box_i02',
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 129600,
  ],
];