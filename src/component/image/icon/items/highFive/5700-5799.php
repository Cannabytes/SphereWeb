<?php
return [
  5700 => 
  [
    'id' => 5700,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Great Cobol',
    'add_name' => '',
    'description' => 'Plant this seed onto a monster in the Innadril area and it will bear the fruit of the Alternative Great Cobol. For best results, a level 41-51 character must plant it on a level 41-51 monster.',
    'icon' => 'etc_cobol_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 50,
    'is_stackable' => true,
    'handler' => 'seed',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2097,
        'level' => 2,
      ],
    ],
  ],
  5701 => 
  [
    'id' => 5701,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Red Codran',
    'add_name' => '',
    'description' => 'Plant this seed onto a monster in the Innadril area and it will bear the fruit of the Alternative Red Codran. For best results, a level 44-54 character must plant it on a level 44-54 monster.',
    'icon' => 'etc_codran_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 40,
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
  5702 => 
  [
    'id' => 5702,
    'type' => 'etcitem',
    'name' => 'Seed: Alternative Sea Codran',
    'add_name' => '',
    'description' => 'Plant this seed onto a monster in the Innadril area and it will bear the fruit of the Alternative Sea Codran. For best results, a level 44-54 character must plant it on a level 44-54 monster.',
    'icon' => 'etc_codran_seed_i00',
    'etcitem_type' => 'seed2',
    'weight' => 1,
    'price' => 50,
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
  5703 => 
  [
    'id' => 5703,
    'type' => 'etcitem',
    'name' => 'Lucky Charm',
    'add_name' => '',
    'description' => 'Bestows blessing on its owner such that when the owner dies during a boss/raid war, his/her abilities will not be diminished. This item can only be used on self by a character whose level is 19 or below.',
    'icon' => 'etc_charm_of_luck_i00',
    'etcitem_type' => 'scroll',
    'weight' => 10,
    'price' => 100,
    'is_stackable' => true,
    'is_oly_restricted' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2168,
        'level' => 1,
      ],
    ],
  ],
  5704 => 
  [
    'id' => 5704,
    'type' => 'weapon',
    'name' => 'Keshanberk*Keshanberk',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_count' => 1464,
    'crystal_type' => 'a',
    'weight' => 2080,
    'price' => 18300000,
    'soulshots' => 1,
    'spiritshots' => 1,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 259,
      'mAtk' => 107,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5705 => 
  [
    'id' => 5705,
    'type' => 'weapon',
    'name' => 'Keshanberk*Damascus',
    'add_name' => '',
    'description' => 'When enchanted, P. Atk. of a dualsword will increase more significantly than that of one-handed or fist weapon. When enchanted to 4 or more, Max HP will increase by 25% as well. Enhances damage to target during PvP.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_count' => 1485,
    'crystal_type' => 'a',
    'weight' => 2080,
    'price' => 18567400,
    'soulshots' => 1,
    'spiritshots' => 1,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 275,
      'mAtk' => 112,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5706 => 
  [
    'id' => 5706,
    'type' => 'weapon',
    'name' => 'Damascus*Damascus',
    'add_name' => '',
    'description' => 'When enchanted, P. Atk. of a dualsword will increase more significantly than that of one-handed or fist weapon. When enchanted to 4 or more, Accuracy will increase by 6. Enhances damage to target during PvP.',
    'icon' => 'weapon_dual_sword_i00',
    'weapon_type' => 'dual',
    'bodypart' => 'lrhand',
    'crystal_count' => 1659,
    'crystal_type' => 'a',
    'weight' => 2080,
    'price' => 20741000,
    'soulshots' => 1,
    'spiritshots' => 1,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 282,
      'mAtk' => 114,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5707 => 
  [
    'id' => 5707,
    'type' => 'etcitem',
    'name' => 'Record of Seven Signs',
    'add_name' => '',
    'description' => 'An item used for studying the current situation of the Seven Signs system.',
    'icon' => 'etc_ssq_scroll_i00',
    'price' => 500,
    'handler' => 'sevensignsrecord',
  ],
  5708 => 
  [
    'id' => 5708,
    'type' => 'etcitem',
    'name' => 'Lord of the Manor\'s Certificate of Approval',
    'add_name' => '',
    'description' => 'When one possesses this item, although one does not belong to a castle owning clan, one can join the Lords of Dawn.',
    'icon' => 'etc_permit_card_i00',
    'etcitem_type' => 'ticket_of_lord',
  ],
  5709 => 
  [
    'id' => 5709,
    'type' => 'armor',
    'name' => 'Sealed Zubei\'s Gauntlets',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t64_g_i02',
    'bodypart' => 'gloves',
    'crystal_count' => 69,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5710 => 
  [
    'id' => 5710,
    'type' => 'armor',
    'name' => 'Zubei\'s Gauntlets',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy Zubei\'s set.',
    'icon' => 'armor_t64_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5711 => 
  [
    'id' => 5711,
    'type' => 'armor',
    'name' => 'Zubei\'s Gauntlets',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light Zubei\'s set.',
    'icon' => 'armor_t65_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5712 => 
  [
    'id' => 5712,
    'type' => 'armor',
    'name' => 'Zubei\'s Gauntlets',
    'add_name' => 'Robe',
    'description' => 'Part of the Zubei\'s robe set.',
    'icon' => 'armor_t56_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5713 => 
  [
    'id' => 5713,
    'type' => 'armor',
    'name' => 'Sealed Avadon Gloves',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t66_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 69,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5714 => 
  [
    'id' => 5714,
    'type' => 'armor',
    'name' => 'Avadon Gloves',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy avadon set.',
    'icon' => 'armor_t66_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5715 => 
  [
    'id' => 5715,
    'type' => 'armor',
    'name' => 'Avadon Gloves',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light avadon set.',
    'icon' => 'armor_t67_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5716 => 
  [
    'id' => 5716,
    'type' => 'armor',
    'name' => 'Avadon Gloves',
    'add_name' => 'Robe',
    'description' => 'Part of the Avadon Robe set.',
    'icon' => 'armor_t59_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5717 => 
  [
    'id' => 5717,
    'type' => 'armor',
    'name' => 'Sealed Blue Wolf Gloves',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t68_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 107,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5718 => 
  [
    'id' => 5718,
    'type' => 'armor',
    'name' => 'Blue Wolf Gloves',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy blue wolf set.',
    'icon' => 'armor_t68_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5719 => 
  [
    'id' => 5719,
    'type' => 'armor',
    'name' => 'Blue Wolf Gloves',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light blue wolf set.',
    'icon' => 'armor_t69_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5720 => 
  [
    'id' => 5720,
    'type' => 'armor',
    'name' => 'Blue Wolf Gloves',
    'add_name' => 'Robe',
    'description' => 'Part of the blue wolf robe set.',
    'icon' => 'armor_t70_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 590,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5721 => 
  [
    'id' => 5721,
    'type' => 'armor',
    'name' => 'Sealed Doom Gloves',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t71_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 107,
    'crystal_type' => 'b',
    'weight' => 580,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5722 => 
  [
    'id' => 5722,
    'type' => 'armor',
    'name' => 'Doom Gloves',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy doom set.',
    'icon' => 'armor_t71_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 580,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5723 => 
  [
    'id' => 5723,
    'type' => 'armor',
    'name' => 'Doom Gloves',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light doom set.',
    'icon' => 'armor_t72_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 580,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5724 => 
  [
    'id' => 5724,
    'type' => 'armor',
    'name' => 'Doom Gloves',
    'add_name' => 'Robe',
    'description' => 'Part of the doom robe set.',
    'icon' => 'armor_t73_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 580,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5725 => 
  [
    'id' => 5725,
    'type' => 'armor',
    'name' => 'Sealed Zubei\'s Boots',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t64_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 69,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5726 => 
  [
    'id' => 5726,
    'type' => 'armor',
    'name' => 'Zubei\'s Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy Zubei\'s set.',
    'icon' => 'armor_t64_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5727 => 
  [
    'id' => 5727,
    'type' => 'armor',
    'name' => 'Zubei\'s Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light Zubei\'s set.',
    'icon' => 'armor_t65_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5728 => 
  [
    'id' => 5728,
    'type' => 'armor',
    'name' => 'Zubei\'s Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the Zubei\'s robe set.',
    'icon' => 'armor_t56_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5729 => 
  [
    'id' => 5729,
    'type' => 'armor',
    'name' => 'Sealed Avadon Boots',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t66_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 69,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5730 => 
  [
    'id' => 5730,
    'type' => 'armor',
    'name' => 'Avadon Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy avadon set.',
    'icon' => 'armor_t66_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5731 => 
  [
    'id' => 5731,
    'type' => 'armor',
    'name' => 'Avadon Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light avadon set.',
    'icon' => 'armor_t67_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5732 => 
  [
    'id' => 5732,
    'type' => 'armor',
    'name' => 'Avadon Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the Avadon Robe set.',
    'icon' => 'armor_t59_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 53,
    'crystal_type' => 'b',
    'weight' => 1180,
    'price' => 399100,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5733 => 
  [
    'id' => 5733,
    'type' => 'armor',
    'name' => 'Sealed Blue Wolf Boots',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t68_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 107,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5734 => 
  [
    'id' => 5734,
    'type' => 'armor',
    'name' => 'Blue Wolf Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy blue wolf set.',
    'icon' => 'armor_t68_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5735 => 
  [
    'id' => 5735,
    'type' => 'armor',
    'name' => 'Blue Wolf Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light blue wolf set.',
    'icon' => 'armor_t69_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5736 => 
  [
    'id' => 5736,
    'type' => 'armor',
    'name' => 'Blue Wolf Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the blue wolf robe set.',
    'icon' => 'armor_t70_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5737 => 
  [
    'id' => 5737,
    'type' => 'armor',
    'name' => 'Sealed Doom Boots',
    'add_name' => '',
    'description' => 'The set effect will appear only after the seal is broken.',
    'icon' => 'armor_t71_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 107,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5738 => 
  [
    'id' => 5738,
    'type' => 'armor',
    'name' => 'Doom Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy doom set.',
    'icon' => 'armor_t71_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5739 => 
  [
    'id' => 5739,
    'type' => 'armor',
    'name' => 'Doom Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light doom set.',
    'icon' => 'armor_t72_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5740 => 
  [
    'id' => 5740,
    'type' => 'armor',
    'name' => 'Doom Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the doom robe set.',
    'icon' => 'armor_t73_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 83,
    'crystal_type' => 'b',
    'weight' => 1130,
    'price' => 618800,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5741 => 
  [
    'id' => 5741,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Zubei\'s Gauntlets (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Zubei\'s gauntlet. Requires Create Item - Skill Level 6. The success rate is 100%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5742 => 
  [
    'id' => 5742,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Zubei\'s Gauntlets (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Zubei\'s gauntlet. Requires Create Item - Skill Level 6. The success rate is 60%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5743 => 
  [
    'id' => 5743,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Avadon Gloves (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Avadon Gloves. Requires Create Item - Skill Level 6. The success rate is 100%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5744 => 
  [
    'id' => 5744,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Avadon Gloves (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Avadon Gloves. Requires Create Item - Skill Level 6. The success rate is 60%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5745 => 
  [
    'id' => 5745,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Blue Wolf Gloves (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Blue Wolf gloves. Requires Create Item - Skill Level 7. The success rate is 100%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5746 => 
  [
    'id' => 5746,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Blue Wolf Gloves (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Blue Wolf gloves. Requires Create Item - Skill Level 7. The success rate is 60%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5747 => 
  [
    'id' => 5747,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Doom Gloves (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Doom Gloves. Requires Create Item - Skill Level 7. The success rate is 100%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5748 => 
  [
    'id' => 5748,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Doom Gloves (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Doom Gloves. Requires Create Item - Skill Level 7. The success rate is 60%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5749 => 
  [
    'id' => 5749,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Zubei\'s Boots (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Zubei\'s Boots. Requires Create Item - Skill Level 6. The success rate is 100%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5750 => 
  [
    'id' => 5750,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Zubei\'s Boots (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Zubei\'s Boots. Requires Create Item - Skill Level 6. The success rate is 60%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5751 => 
  [
    'id' => 5751,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Avadon Boots (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Avadon Boots. Requires Create Item - Skill Level 6. The success rate is 100%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5752 => 
  [
    'id' => 5752,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Avadon Boots (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the Sealed Avadon Boots. Requires Create Item - Skill Level 6. The success rate is 60%.',
    'icon' => 'etc_recipe_red_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5753 => 
  [
    'id' => 5753,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Blue Wolf Boots (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Blue Wolf Boots. Requires Create Item - Skill Level 7. The success rate is 100%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5754 => 
  [
    'id' => 5754,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Blue Wolf Boots (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Blue Wolf Boots. Requires Create Item - Skill Level 7. The success rate is 60%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5755 => 
  [
    'id' => 5755,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Doom Boots (100%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Doom Boots. Requires Create Item - Skill Level 7. The success rate is 100%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5756 => 
  [
    'id' => 5756,
    'type' => 'etcitem',
    'name' => 'Recipe: Sealed Doom Boots (60%]',
    'add_name' => '',
    'description' => 'For Dwarves only. The recipe for the sealed Doom Boots. Requires Create Item - Skill Level 7. The success rate is 60%.',
    'icon' => 'etc_recipe_violet_i00',
    'etcitem_type' => 'recipe',
    'weight' => 30,
    'price' => 17700,
    'is_stackable' => true,
  ],
  5757 => 
  [
    'id' => 5757,
    'type' => 'etcitem',
    'name' => 'Sealed Zubei\'s Gauntlet Part',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Zubei\'s Gauntlets. It can also be sold to a regular store.',
    'icon' => 'etc_plate_silver_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 3843,
    'is_stackable' => true,
  ],
  5758 => 
  [
    'id' => 5758,
    'type' => 'etcitem',
    'name' => 'Sealed Avadon Gloves Part',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Avadon Gloves. It can also be sold to a regular store.',
    'icon' => 'etc_plate_silver_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 3843,
    'is_stackable' => true,
  ],
  5759 => 
  [
    'id' => 5759,
    'type' => 'etcitem',
    'name' => 'Sealed Blue Wolf Gloves Fabric',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Blue Wolf Gloves. It can also be sold to a regular store.',
    'icon' => 'etc_leather_gray_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 4455,
    'is_stackable' => true,
  ],
  5760 => 
  [
    'id' => 5760,
    'type' => 'etcitem',
    'name' => 'Sealed Doom Gloves Part',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Doom Gloves. It can also be sold to a regular store.',
    'icon' => 'etc_plate_silver_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 4455,
    'is_stackable' => true,
  ],
  5761 => 
  [
    'id' => 5761,
    'type' => 'etcitem',
    'name' => 'Sealed Zubei\'s Boots Design',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Zubei\'s Boots. It can also be sold to a regular store.',
    'icon' => 'etc_pouch_brown_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 3843,
    'is_stackable' => true,
  ],
  5762 => 
  [
    'id' => 5762,
    'type' => 'etcitem',
    'name' => 'Sealed Avadon Boots Design',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Avadon Boots. It can also be sold to a regular store.',
    'icon' => 'etc_codran_seed_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 3843,
    'is_stackable' => true,
  ],
  5763 => 
  [
    'id' => 5763,
    'type' => 'etcitem',
    'name' => 'Sealed Blue Wolf Boots Design',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Blue Wolf Boots. It can also be sold to a regular store.',
    'icon' => 'etc_codran_seed_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 4455,
    'is_stackable' => true,
  ],
  5764 => 
  [
    'id' => 5764,
    'type' => 'etcitem',
    'name' => 'Sealed Doom Boots Part',
    'add_name' => '',
    'description' => 'An essential ingredient needed by a Dwarf to make a pair of Sealed Doom Boots. It can also be sold to a regular store.',
    'icon' => 'etc_codran_seed_i00',
    'etcitem_type' => 'material',
    'weight' => 60,
    'price' => 4455,
    'is_stackable' => true,
  ],
  5765 => 
  [
    'id' => 5765,
    'type' => 'armor',
    'name' => 'Dark Crystal Gloves',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy dark crystal set.',
    'icon' => 'armor_t74_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5766 => 
  [
    'id' => 5766,
    'type' => 'armor',
    'name' => 'Dark Crystal Gloves',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light dark crystal set.',
    'icon' => 'armor_t75_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5767 => 
  [
    'id' => 5767,
    'type' => 'armor',
    'name' => 'Dark Crystal Gloves',
    'add_name' => 'Robe',
    'description' => 'Part of the dark crystal robe set.',
    'icon' => 'armor_t76_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5768 => 
  [
    'id' => 5768,
    'type' => 'armor',
    'name' => 'Tallum Gloves',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy tallum set.',
    'icon' => 'armor_t77_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5769 => 
  [
    'id' => 5769,
    'type' => 'armor',
    'name' => 'Tallum Gloves',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light tallum set.',
    'icon' => 'armor_t78_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5770 => 
  [
    'id' => 5770,
    'type' => 'armor',
    'name' => 'Tallum Gloves',
    'add_name' => 'Robe',
    'description' => 'Part of the robe tallum set.',
    'icon' => 'armor_t79_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 580,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5771 => 
  [
    'id' => 5771,
    'type' => 'armor',
    'name' => 'Gauntlets of Nightmare',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy nightmare set.',
    'icon' => 'armor_t80_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 550,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5772 => 
  [
    'id' => 5772,
    'type' => 'armor',
    'name' => 'Gauntlets of Nightmare',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light nightmare set.',
    'icon' => 'armor_t81_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 550,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5773 => 
  [
    'id' => 5773,
    'type' => 'armor',
    'name' => 'Gauntlets of Nightmare',
    'add_name' => 'Robe',
    'description' => 'Part of the nightmare robe set.',
    'icon' => 'armor_t82_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 550,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5774 => 
  [
    'id' => 5774,
    'type' => 'armor',
    'name' => 'Majestic Gauntlets',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy majestic set.',
    'icon' => 'armor_t83_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 540,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5775 => 
  [
    'id' => 5775,
    'type' => 'armor',
    'name' => 'Majestic Gauntlets',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light majestic set.',
    'icon' => 'armor_t84_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 540,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5776 => 
  [
    'id' => 5776,
    'type' => 'armor',
    'name' => 'Majestic Gauntlets',
    'add_name' => 'Robe',
    'description' => 'Part of the majestic robe set.',
    'icon' => 'armor_t85_g_i00',
    'bodypart' => 'gloves',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 540,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5777 => 
  [
    'id' => 5777,
    'type' => 'armor',
    'name' => 'Dark Crystal Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy dark crystal set.',
    'icon' => 'armor_t74_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5778 => 
  [
    'id' => 5778,
    'type' => 'armor',
    'name' => 'Dark Crystal Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light dark crystal set.',
    'icon' => 'armor_t75_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5779 => 
  [
    'id' => 5779,
    'type' => 'armor',
    'name' => 'Dark Crystal Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the dark crystal robe set.',
    'icon' => 'armor_t76_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5780 => 
  [
    'id' => 5780,
    'type' => 'armor',
    'name' => 'Tallum Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy tallum set.',
    'icon' => 'armor_t77_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1130,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5781 => 
  [
    'id' => 5781,
    'type' => 'armor',
    'name' => 'Tallum Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light tallum set.',
    'icon' => 'armor_t78_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1130,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5782 => 
  [
    'id' => 5782,
    'type' => 'armor',
    'name' => 'Tallum Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the robe tallum set.',
    'icon' => 'armor_t79_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 71,
    'crystal_type' => 'a',
    'weight' => 1130,
    'price' => 890000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5783 => 
  [
    'id' => 5783,
    'type' => 'armor',
    'name' => 'Boots of Nightmare',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy nightmare set.',
    'icon' => 'armor_t80_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5784 => 
  [
    'id' => 5784,
    'type' => 'armor',
    'name' => 'Boots of Nightmare',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light nightmare set.',
    'icon' => 'armor_t81_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5785 => 
  [
    'id' => 5785,
    'type' => 'armor',
    'name' => 'Boots of Nightmare',
    'add_name' => 'Robe',
    'description' => 'Part of the nightmare robe set.',
    'icon' => 'armor_t82_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5786 => 
  [
    'id' => 5786,
    'type' => 'armor',
    'name' => 'Majestic Boots',
    'add_name' => 'Heavy Armor',
    'description' => 'Part of the heavy majestic set.',
    'icon' => 'armor_t83_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5787 => 
  [
    'id' => 5787,
    'type' => 'armor',
    'name' => 'Majestic Boots',
    'add_name' => 'Light Armor',
    'description' => 'Part of the light majestic set.',
    'icon' => 'armor_t84_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5788 => 
  [
    'id' => 5788,
    'type' => 'armor',
    'name' => 'Majestic Boots',
    'add_name' => 'Robe',
    'description' => 'Part of the majestic robe set.',
    'icon' => 'armor_t85_b_i00',
    'bodypart' => 'feet',
    'crystal_count' => 108,
    'crystal_type' => 'a',
    'weight' => 1110,
    'price' => 1355000,
    'enchant_enabled' => true,
    'stats' => 
    [
    ],
  ],
  5789 => 
  [
    'id' => 5789,
    'type' => 'etcitem',
    'name' => 'Soulshot: No Grade for Beginners',
    'add_name' => '',
    'description' => 'A Soulshot: No Grade for use by newbies.',
    'icon' => 'etc_soulshot_none_for_rookie_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'soulshots',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2039,
        'level' => 1,
      ],
    ],
  ],
  5790 => 
  [
    'id' => 5790,
    'type' => 'etcitem',
    'name' => 'Spiritshot: No Grade for Beginners',
    'add_name' => '',
    'description' => 'A Spiritshot: No Grade for use by newbies.',
    'icon' => 'etc_spiritshot_none_for_rookie_i00',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_sellable' => false,
    'is_stackable' => true,
    'handler' => 'spiritshot',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 2047,
        'level' => 1,
      ],
    ],
  ],
  5791 => 
  [
    'id' => 5791,
    'type' => 'weapon',
    'name' => 'Tomb Guard A',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2180,
    'price' => 967000,
    'soulshots' => 2,
    'spiritshots' => 2,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 78,
      'mAtk' => 39,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5792 => 
  [
    'id' => 5792,
    'type' => 'weapon',
    'name' => 'Tomb Guard B',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2180,
    'price' => 967000,
    'soulshots' => 2,
    'spiritshots' => 2,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 78,
      'mAtk' => 39,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5793 => 
  [
    'id' => 5793,
    'type' => 'weapon',
    'name' => 'Tomb Savant A',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 1380,
    'price' => 6130000,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  5794 => 
  [
    'id' => 5794,
    'type' => 'weapon',
    'name' => 'Tomb Savant B',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 1380,
    'price' => 6130000,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  5795 => 
  [
    'id' => 5795,
    'type' => 'weapon',
    'name' => 'Tomb Guard A',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2180,
    'price' => 967000,
    'soulshots' => 2,
    'spiritshots' => 2,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 78,
      'mAtk' => 39,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5796 => 
  [
    'id' => 5796,
    'type' => 'weapon',
    'name' => 'Tomb Guard B',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'lrhand',
    'crystal_type' => 'd',
    'weight' => 2180,
    'price' => 967000,
    'soulshots' => 2,
    'spiritshots' => 2,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 78,
      'mAtk' => 39,
      'critRate' => 8,
      'pAtkSpd' => 325,
    ],
  ],
  5797 => 
  [
    'id' => 5797,
    'type' => 'weapon',
    'name' => 'Tomb Savant A',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 1380,
    'price' => 6130000,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  5798 => 
  [
    'id' => 5798,
    'type' => 'weapon',
    'name' => 'Tomb Savant B',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'weapon_type' => 'sword',
    'bodypart' => 'rhand',
    'crystal_type' => 'c',
    'weight' => 1380,
    'price' => 6130000,
    'soulshots' => 3,
    'spiritshots' => 3,
    'enchant_enabled' => true,
    'stats' => 
    [
      'pAtk' => 156,
      'mAtk' => 83,
      'critRate' => 8,
      'pAtkSpd' => 379,
    ],
  ],
  5799 => 
  [
    'id' => 5799,
    'type' => 'armor',
    'name' => 'Nephilim Lord',
    'add_name' => '',
    'description' => '',
    'icon' => 'weapon_monster_i00',
    'bodypart' => 'lhand',
    'crystal_type' => 'd',
    'weight' => 1320,
    'price' => 78400,
    'enchant_enabled' => true,
    'stats' => 
    [
      'rShld' => 20,
      'sDef' => 142,
    ],
  ],
];