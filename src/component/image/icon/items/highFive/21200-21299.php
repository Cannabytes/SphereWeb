<?php
return [
  21200 => 
  [
    'id' => 21200,
    'type' => 'etcitem',
    'name' => 'Mysterious Scroll - Prophecy of Wind',
    'add_name' => '',
    'description' => 'Dimensional  For 60 minutes, receives help from a great spirit to increase Max HP by 20%, rate of critical attack by 20%, power of Prominent Damage through magic damage by 20%, P. Atk. by 10%, P. Def. by 20%, Atk. Spd. by 20%, M. Atk. by 20%, M. Def. by 20%, Casting Spd. by 20%, and Resistance to de-buff by 10%. Decreases moving speed by 20%. Bestows the ability to recover as HP 5% of the standard short-range physical damage inflicted on the enemy. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_xmas_scroll_i00',
    'etcitem_type' => 'scroll',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22213,
        'level' => 1,
      ],
    ],
  ],
  21201 => 
  [
    'id' => 21201,
    'type' => 'etcitem',
    'name' => 'Magic Glasses 30-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 magic glasses (30 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21202,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21202 => 
  [
    'id' => 21202,
    'type' => 'armor',
    'name' => 'Magic Glasses - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional  Magic glasses that has MP +10 and M. Def. +70 effect. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'br_Eye_Glasses_i00',
    'bodypart' => 'hair',
    'weight' => 10,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_oly_restricted' => true,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 21241,
        'level' => 1,
      ],
    ],
    'time' => 43200,
    'stats' => 
    [
    ],
  ],
  21203 => 
  [
    'id' => 21203,
    'type' => 'etcitem',
    'name' => 'Queen Ant\'s Ring 30-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 queen ant\'s ring (30 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21206,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21204 => 
  [
    'id' => 21204,
    'type' => 'etcitem',
    'name' => 'Baium\'s Ring 30-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Baium\'s ring (30 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21207,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21205 => 
  [
    'id' => 21205,
    'type' => 'etcitem',
    'name' => 'Earring of Zaken 30-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Earring of Zaken (30 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21208,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21206 => 
  [
    'id' => 21206,
    'type' => 'armor',
    'name' => 'Queen Ant\'s Ring - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional  MP +21, Resistance to Poison +30%, poison attack rate +30%, accuracy increase, critical damage increase, hold tolerance 20% increase, and hold attack rate 20% increase. Only one effect is applied even when two identical rings are worn. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ring_of_queen_ant_i00',
    'bodypart' => 'rfinger;lfinger',
    'crystal_type' => 'b',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 43200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3562,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21207 => 
  [
    'id' => 21207,
    'type' => 'armor',
    'name' => 'Baium\'s Ring - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional  MP +21, Resistance to Poison +40%, poison attack rate +40%, accuracy increase, critical damage increase, hold tolerance +30%, hold attack rate +30%, attack increase, and Casting Spd. increase. Only one effect is applied even when two identical rings are worn. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ring_of_baium_i00',
    'bodypart' => 'rfinger;lfinger',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 43200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3561,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21208 => 
  [
    'id' => 21208,
    'type' => 'armor',
    'name' => 'Earring of Zaken - 30-day limited period',
    'add_name' => '30-day limited period',
    'description' => 'Dimensional  MP +31, Resistance to Bleed +30%, Bleed attack rate +30%, heal amount increase, vampiric rage effect, Resistance to Shock/Mental attacks 20% increase, and Shock/Mental attack rate 20% increase. When equipped with two identical earrings, the effect of only one earring will be applied. Can be used for 30 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_earring_of_zaken_i00',
    'bodypart' => 'rear;lear',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 43200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3559,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21209 => 
  [
    'id' => 21209,
    'type' => 'etcitem',
    'name' => 'MP Recovery Potion Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 MP recovery (+50%] potions. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21210,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21210 => 
  [
    'id' => 21210,
    'type' => 'etcitem',
    'name' => 'MP Recovery Potion',
    'add_name' => '',
    'description' => 'Dimensional  Magic potion that quickly recovers MP by 50% when used. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_vitality_potion_i00',
    'etcitem_type' => 'potion',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22214,
        'level' => 1,
      ],
    ],
  ],
  21211 => 
  [
    'id' => 21211,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Herb Tea Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 10 Vitality Replenishing Herb Teas. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21212,
        'min' => 10,
        'max' => 10,
        'chance' => 100,
      ],
    ],
  ],
  21212 => 
  [
    'id' => 21212,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Herb Tea',
    'add_name' => '',
    'description' => 'Dimensional  For 30 minutes, energy is replenished when Exp. is acquired through hunting. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_hot_spring_mineral_i00',
    'etcitem_type' => 'potion',
    'weight' => 80,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22215,
        'level' => 1,
      ],
    ],
  ],
  21213 => 
  [
    'id' => 21213,
    'type' => 'etcitem',
    'name' => 'Queen Ant\'s Ring 180-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 queen ant\'s ring (180 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21218,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21214 => 
  [
    'id' => 21214,
    'type' => 'etcitem',
    'name' => 'Baium\'s Ring 180-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Baium\'s ring (180 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21219,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21215 => 
  [
    'id' => 21215,
    'type' => 'etcitem',
    'name' => 'Earring of Zaken 180-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Earring of Zaken (180 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21220,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21216 => 
  [
    'id' => 21216,
    'type' => 'etcitem',
    'name' => 'Valakas\'s Necklace 180-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Valakas\'s necklace (180 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21221,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21217 => 
  [
    'id' => 21217,
    'type' => 'etcitem',
    'name' => 'Antharas\'s Earring 180-Day Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Antharas\'s earring (180 day]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21222,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21218 => 
  [
    'id' => 21218,
    'type' => 'armor',
    'name' => 'Queen Ant\'s Ring - 180-day limited period',
    'add_name' => '180-day limited period',
    'description' => 'Dimensional  MP +21, Resistance to Poison +30%, poison attack rate +30%, accuracy increase, critical damage increase, hold tolerance 20% increase, and hold attack rate 20% increase. Only one effect is applied even when two identical rings are worn. Can be used for 180 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ring_of_queen_ant_i00',
    'bodypart' => 'rfinger;lfinger',
    'crystal_type' => 'b',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 259200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3562,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21219 => 
  [
    'id' => 21219,
    'type' => 'armor',
    'name' => 'Baium\'s Ring - 180-day limited period',
    'add_name' => '180-day limited period',
    'description' => 'Dimensional  MP +21, Resistance to Poison +40%, poison attack rate +40%, accuracy increase, critical damage increase, hold tolerance +30%, hold attack rate +30%, attack increase, and Casting Spd. increase. Only one effect is applied even when two identical rings are worn. Can be used for 180 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_ring_of_baium_i00',
    'bodypart' => 'rfinger;lfinger',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 259200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3561,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21220 => 
  [
    'id' => 21220,
    'type' => 'armor',
    'name' => 'Earring of Zaken - 180-day limited period',
    'add_name' => '180-day limited period',
    'description' => 'Dimensional  MP +31, Resistance to Bleed +30%, Bleed attack rate +30%, heal amount increase, vampiric rage effect, Resistance to Shock/Mental attacks 20% increase, and Shock/Mental attack rate 20% increase. When equipped with two identical earrings, the effect of only one earring will be applied. Can be used for 180 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_earring_of_zaken_i00',
    'bodypart' => 'rear;lear',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 259200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3559,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21221 => 
  [
    'id' => 21221,
    'type' => 'armor',
    'name' => 'Valakas\'s Necklace - 180-day limited period',
    'add_name' => '180-day limited period',
    'description' => 'Dimensional  MP +50, Resistance to Sleep +40%, sleep attack rate +40%, HP +445, reuse delay decrease, P. Atk. and M. Atk. increase, wild magic effect, damage shield effect, and Resistance to Fire increase. Only one effect is applied even when the two identical necklaces are worn. Can be used for 180 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_necklace_of_valakas_i00',
    'bodypart' => 'neck',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 259200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3557,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21222 => 
  [
    'id' => 21222,
    'type' => 'armor',
    'name' => 'Antharas\'s Earring - 180-day limited period',
    'add_name' => '180-day limited period',
    'description' => 'Dimensional  MP +37, Resistance to Bleed +40%, Bleed attack rate +40%, heal amount increase, vampiric rage effect, Resistance to Stun/Mental attacks 30%, Stun/Mental attack rate +30%, MP consumption decrease, and Resistance to Earth increase. Only one effect is applied even when the two identical earrings are worn. Can be used for 180 days. Cannot be exchanged or dropped. Can be stored in a private warehouse.',
    'icon' => 'accessory_earring_of_antaras_i00',
    'bodypart' => 'rear;lear',
    'crystal_type' => 's',
    'weight' => 150,
    'is_tradable' => false,
    'is_dropable' => false,
    'time' => 259200,
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 3558,
        'level' => 1,
      ],
    ],
    'stats' => 
    [
    ],
  ],
  21223 => 
  [
    'id' => 21223,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Anakim Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 5 Anakim Transformation Scrolls. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21224,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  21224 => 
  [
    'id' => 21224,
    'type' => 'etcitem',
    'name' => 'Transformation Scroll: Anakim',
    'add_name' => '',
    'description' => 'Dimensional  Transformation scroll that transforms you into Anakim for 30 minute(s]. No effect if used while transformed. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_trans_4f_s_b_01',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22216,
        'level' => 1,
      ],
    ],
  ],
  21225 => 
  [
    'id' => 21225,
    'type' => 'etcitem',
    'name' => 'Sweet Fruit Cocktail Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 sweet fruit cocktails. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21227,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21226 => 
  [
    'id' => 21226,
    'type' => 'etcitem',
    'name' => 'Sweet Fruit Cocktail Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 sweet fruit cocktails. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21228,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21227 => 
  [
    'id' => 21227,
    'type' => 'etcitem',
    'name' => 'Sweet Fruit Cocktail',
    'add_name' => '',
    'description' => 'Dimensional  Cocktail drink that\'s flavored with many rare types of fruit. When consumed, one can feel Might, Shield, Wind Walk, Focus, Death Whisper, Guidance, Bless Shield, Blessed Body, Haste, Vampiric Rage, and Berserker Spirit effects for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_fruit_cocktail_i00',
    'etcitem_type' => 'potion',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 9011,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 9012,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 9013,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 9014,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 9015,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 9016,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 9017,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 9018,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 9019,
          'level' => 1,
        ],
        9 => 
        [
          'skill_id' => 9020,
          'level' => 1,
        ],
      ],
    ],
  ],
  21228 => 
  [
    'id' => 21228,
    'type' => 'etcitem',
    'name' => 'Sweet Fruit Cocktail',
    'add_name' => 'Event',
    'description' => 'Dimensional  Cocktail drink that\'s flavored with many rare types of fruit. When consumed, one can feel Might, Shield, Wind Walk, Focus, Death Whisper, Guidance, Bless Shield, Blessed Body, Haste, Vampiric Rage, and Berserker Spirit  effects for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_fruit_cocktail_i00',
    'etcitem_type' => 'potion',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 9011,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 9012,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 9013,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 9014,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 9015,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 9016,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 9017,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 9018,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 9019,
          'level' => 1,
        ],
        9 => 
        [
          'skill_id' => 9020,
          'level' => 1,
        ],
        10 => 
        [
          'skill_id' => 9021,
          'level' => 1,
        ],
      ],
    ],
  ],
  21229 => 
  [
    'id' => 21229,
    'type' => 'etcitem',
    'name' => 'Fresh Fruit Cocktail Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 fresh fruit cocktails. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21231,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21230 => 
  [
    'id' => 21230,
    'type' => 'etcitem',
    'name' => 'Fresh Fruit Cocktail Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 fresh fruit cocktails. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21232,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21231 => 
  [
    'id' => 21231,
    'type' => 'etcitem',
    'name' => 'Fresh Fruit Cocktail',
    'add_name' => '',
    'description' => 'Dimensional  Cocktail drink that\'s flavored with many rare types of fruit. When consumed, one can feel Berserker Spirit, Blessed Body, Magic Barrier, Shield, Wind Walk, Blessed Soul, Empower, Acumen, and Clarity effects for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_fruit_cocktail_i01',
    'etcitem_type' => 'potion',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 9021,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 9018,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 9022,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 9012,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 9013,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 9023,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 9024,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 9025,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 9026,
          'level' => 1,
        ],
      ],
    ],
  ],
  21232 => 
  [
    'id' => 21232,
    'type' => 'etcitem',
    'name' => 'Fresh Fruit Cocktail',
    'add_name' => 'Event',
    'description' => 'Dimensional  Cocktail drink that\'s flavored with many rare types of fruit. When consumed, one can feel Berserker Spirit, Blessed Body, Magic Barrier, Shield, Wind Walk, Blessed Soul, Empower, Acumen, and Clarity effects for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_fruit_cocktail_i01',
    'etcitem_type' => 'potion',
    'weight' => 5,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 9021,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 9018,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 9022,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 9012,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 9013,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 9023,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 9024,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 9025,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 9026,
          'level' => 1,
        ],
      ],
    ],
  ],
  21233 => 
  [
    'id' => 21233,
    'type' => 'etcitem',
    'name' => 'Fresh Milk Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 fresh milks. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21235,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21234 => 
  [
    'id' => 21234,
    'type' => 'etcitem',
    'name' => 'Fresh Milk Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 fresh milks. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21236,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21235 => 
  [
    'id' => 21235,
    'type' => 'etcitem',
    'name' => 'Fresh Milk',
    'add_name' => '',
    'description' => 'Dimensional  Freshly collected milk. When used, you can feel the effects of Might, Haste, Empower, Acumen, Wind Walk, Vampiric Rage, Berserker Spirit, Shield, Focus, Death Whisper, Guidance, Clarity, Wild Magic and Concentration for 1 hour. Cannot be exchanged, dropped or destroyed. Can be shared between characters on the same account through the Dimensional Merchant.',
    'icon' => 'etc_fresh_milk_i00',
    'etcitem_type' => 'potion',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 2873,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 2875,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 2879,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 2878,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 2874,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 2876,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 2877,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 2885,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 2886,
          'level' => 1,
        ],
        9 => 
        [
          'skill_id' => 2887,
          'level' => 1,
        ],
        10 => 
        [
          'skill_id' => 2888,
          'level' => 1,
        ],
        11 => 
        [
          'skill_id' => 2889,
          'level' => 1,
        ],
        12 => 
        [
          'skill_id' => 2890,
          'level' => 1,
        ],
        13 => 
        [
          'skill_id' => 2891,
          'level' => 6,
        ],
      ],
    ],
  ],
  21236 => 
  [
    'id' => 21236,
    'type' => 'etcitem',
    'name' => 'Fresh Milk',
    'add_name' => 'Event',
    'description' => 'Dimensional  Freshly drawn milk. When used, you can feel the effects of Might, Haste, Empower, Acumen, Wind Walk, Vampiric Rage, Berserker Spirit, Shield, Focus, Death Whisper, Guidance, Clarity, Wild Magic and Concentration for 1 hour. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_fresh_milk_i00',
    'etcitem_type' => 'potion',
    'weight' => 1,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        0 => 
        [
          'skill_id' => 2873,
          'level' => 1,
        ],
        1 => 
        [
          'skill_id' => 2875,
          'level' => 1,
        ],
        2 => 
        [
          'skill_id' => 2879,
          'level' => 1,
        ],
        3 => 
        [
          'skill_id' => 2878,
          'level' => 1,
        ],
        4 => 
        [
          'skill_id' => 2874,
          'level' => 1,
        ],
        5 => 
        [
          'skill_id' => 2876,
          'level' => 1,
        ],
        6 => 
        [
          'skill_id' => 2877,
          'level' => 1,
        ],
        7 => 
        [
          'skill_id' => 2885,
          'level' => 1,
        ],
        8 => 
        [
          'skill_id' => 2886,
          'level' => 1,
        ],
        9 => 
        [
          'skill_id' => 2887,
          'level' => 1,
        ],
        10 => 
        [
          'skill_id' => 2888,
          'level' => 1,
        ],
        11 => 
        [
          'skill_id' => 2889,
          'level' => 1,
        ],
        12 => 
        [
          'skill_id' => 2890,
          'level' => 1,
        ],
        13 => 
        [
          'skill_id' => 2891,
          'level' => 6,
        ],
      ],
    ],
  ],
  21237 => 
  [
    'id' => 21237,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (HP] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 super healthy juices (HP]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21239,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21238 => 
  [
    'id' => 21238,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (HP] Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 super healthy juices (HP]. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21240,
        'min' => 3,
        'max' => 3,
        'chance' => 100,
      ],
    ],
  ],
  21239 => 
  [
    'id' => 21239,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (HP]',
    'add_name' => '',
    'description' => 'Dimensional  Magic juice that instantly fully recovers HP. Cannot be exchanged, dropped or destroyed. Can be shared between characters on the same account through the Dimensional Merchant.',
    'icon' => 'BranchSys2.etc_health_juice_i00',
    'etcitem_type' => 'potion',
    'weight' => 180,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22217,
        'level' => 1,
      ],
    ],
  ],
  21240 => 
  [
    'id' => 21240,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (HP]',
    'add_name' => 'Event',
    'description' => 'Dimensional  Magic juice that temporarily recovers stamina in full. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.etc_health_juice_i00',
    'etcitem_type' => 'potion',
    'weight' => 180,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22218,
        'level' => 1,
      ],
    ],
  ],
  21241 => 
  [
    'id' => 21241,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (CP] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 5 super healthy juices (CP]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21243,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  21242 => 
  [
    'id' => 21242,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (CP] Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 5 super healthy juices (CP]. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21244,
        'min' => 5,
        'max' => 5,
        'chance' => 100,
      ],
    ],
  ],
  21243 => 
  [
    'id' => 21243,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (CP]',
    'add_name' => '',
    'description' => 'Dimensional  Magic juice that temporarily recovers CP in full. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.etc_health_juice_i01',
    'etcitem_type' => 'potion',
    'weight' => 180,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22219,
        'level' => 1,
      ],
    ],
  ],
  21244 => 
  [
    'id' => 21244,
    'type' => 'etcitem',
    'name' => 'Super Healthy Juice (CP]',
    'add_name' => 'Event',
    'description' => 'Dimensional  Magic juice that temporarily recovers CP in full. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.etc_health_juice_i01',
    'etcitem_type' => 'potion',
    'weight' => 180,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22220,
        'level' => 1,
      ],
    ],
  ],
  21245 => 
  [
    'id' => 21245,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Beverage Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Vitality Replenishing Beverage. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21247,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21246 => 
  [
    'id' => 21246,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Beverage Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 Vitality Replenishing Beverage. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21248,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21247 => 
  [
    'id' => 21247,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Beverage',
    'add_name' => '',
    'description' => 'Dimensional  Vitality is replenished to 100% upon use. Re-use time is 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant.',
    'icon' => 'etc_potion_of_energy_i00',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22221,
        'level' => 1,
      ],
    ],
  ],
  21248 => 
  [
    'id' => 21248,
    'type' => 'etcitem',
    'name' => 'Vitality Replenishing Beverage',
    'add_name' => 'Event',
    'description' => 'Dimensional  Vitality is replenished to 100% upon use. Re-use time is 60 minutes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant.',
    'icon' => 'etc_potion_of_energy_i00',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22222,
        'level' => 1,
      ],
    ],
  ],
  21249 => 
  [
    'id' => 21249,
    'type' => 'etcitem',
    'name' => 'Vitality Maintainig Potion (30 Minutes] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 Vitality Maintainig Potion. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21251,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21250 => 
  [
    'id' => 21250,
    'type' => 'etcitem',
    'name' => 'Vitality Maintainig Potion (30 Minutes] Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 Vitality Maintainig Potion. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'extractableitems',
    'capsuled_items' => 
    [
      0 => 
      [
        'item_id' => 21252,
        'min' => 1,
        'max' => 1,
        'chance' => 100,
      ],
    ],
  ],
  21251 => 
  [
    'id' => 21251,
    'type' => 'etcitem',
    'name' => 'Vitality Maintainig Potion (30 Minutes]',
    'add_name' => '',
    'description' => 'Dimensional  Maintains energy for 30 minutes when used. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_essence_rose_i00',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22223,
        'level' => 1,
      ],
    ],
  ],
  21252 => 
  [
    'id' => 21252,
    'type' => 'etcitem',
    'name' => 'Vitality Maintainig Potion (30 Minutes]',
    'add_name' => 'Event',
    'description' => 'Dimensional  Maintains energy for 30 minutes when used. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'BranchSys2.br_essence_rose_i00',
    'etcitem_type' => 'potion',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
    'handler' => 'itemskills',
    'item_skill' => 
    [
      0 => 
      [
        'skill_id' => 22224,
        'level' => 1,
      ],
    ],
  ],
  21253 => 
  [
    'id' => 21253,
    'type' => 'etcitem',
    'name' => 'Gludio Homemade Cookie Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 5 Gludio Homemade Cookies. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21254 => 
  [
    'id' => 21254,
    'type' => 'etcitem',
    'name' => 'Gludio Homemade Cookie Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 5 Gludio Homemade Cookies. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21255 => 
  [
    'id' => 21255,
    'type' => 'etcitem',
    'name' => 'Gludio Homemade Cookie',
    'add_name' => '',
    'description' => 'Dimensional  Increases P. Atk. by 10% for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21256 => 
  [
    'id' => 21256,
    'type' => 'etcitem',
    'name' => 'Gludio Homemade Cookie',
    'add_name' => 'Event',
    'description' => 'Dimensional  Increases P. Atk. by 10% for 60 minutes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21257 => 
  [
    'id' => 21257,
    'type' => 'etcitem',
    'name' => 'Dion Homemade Cookie Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 5 Dion Homemade Cookies. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21258 => 
  [
    'id' => 21258,
    'type' => 'etcitem',
    'name' => 'Dion Homemade Cookie Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 5 Dion Homemade Cookies. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21259 => 
  [
    'id' => 21259,
    'type' => 'etcitem',
    'name' => 'Dion Homemade Cookie',
    'add_name' => '',
    'description' => 'Dimensional  Increases P. Def. by 15% for 60 minutes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21260 => 
  [
    'id' => 21260,
    'type' => 'etcitem',
    'name' => 'Dion Homemade Cookie',
    'add_name' => 'Event',
    'description' => 'Dimensional  Increases P. Def. by 15% for 60 minutes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21261 => 
  [
    'id' => 21261,
    'type' => 'etcitem',
    'name' => 'Aden Designer Cookie Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 Aden Designer Cookies. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21262 => 
  [
    'id' => 21262,
    'type' => 'etcitem',
    'name' => 'Aden Designer Cookie Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 Aden Designer Cookies. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21263 => 
  [
    'id' => 21263,
    'type' => 'etcitem',
    'name' => 'Aden Designer Cookie',
    'add_name' => '',
    'description' => 'Dimensional  For 60 minutes, receives help from a great spirit to recover HP by 20%, increases Max HP by 20%, the rate of Prominent Damage occurring through magic damage by 2, the rate of critical attack by 20%, P. Atk. by 10%, P. Def. by 20%, Atk. Spd. by 20%, M. Atk. by 20%, M. Def. by 20%, Casting Spd. by 20%, Resistance to de-buffs by 10%, and accuracy by 4. Decreases moving speed by 20%. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21264 => 
  [
    'id' => 21264,
    'type' => 'etcitem',
    'name' => 'Aden Designer Cookie',
    'add_name' => 'Event',
    'description' => 'Dimensional  For 60 minutes, receives help from a great spirit to recover HP by 20%, increases Max HP by 20%, the rate of Prominent Damage occurring through magic damage by 2, the rate of critical attack by 20%, P. Atk. by 10%, P. Def. by 20%, Atk. Spd. by 20%, M. Atk. by 20%, M. Def. by 20%, Casting Spd. by 20%, Resistance to de-buffs by 10%, and accuracy by 4. Decreases moving speed by 20%. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21265 => 
  [
    'id' => 21265,
    'type' => 'etcitem',
    'name' => 'Giran Designer Cookie Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 Giran Designer Cookies. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21266 => 
  [
    'id' => 21266,
    'type' => 'etcitem',
    'name' => 'Giran Designer Cookie Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 Giran Designer Cookies. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21267 => 
  [
    'id' => 21267,
    'type' => 'etcitem',
    'name' => 'Giran Designer Cookie',
    'add_name' => '',
    'description' => 'Dimensional  For 60 minutes, increases P. Def. against Critical by 30%. When the target receives an attack above a certain amount of damage, the critical damage for general short-range physical attack is increased for 8 seconds. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21268 => 
  [
    'id' => 21268,
    'type' => 'etcitem',
    'name' => 'Giran Designer Cookie',
    'add_name' => 'Event',
    'description' => 'Dimensional  For 60 minutes, increases P. Def. against Critical by 30%. When the target receives an attack above a certain amount of damage, the critical damage for general short-range physical attack is increased for 8 seconds. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21269 => 
  [
    'id' => 21269,
    'type' => 'etcitem',
    'name' => 'Rune Designer Cookie Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 Rune Designer Cookies. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21270 => 
  [
    'id' => 21270,
    'type' => 'etcitem',
    'name' => 'Rune Designer Cookie Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 Rune Designer Cookies. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21271 => 
  [
    'id' => 21271,
    'type' => 'etcitem',
    'name' => 'Rune Designer Cookie',
    'add_name' => '',
    'description' => 'Dimensional  Greatly increases received recharge power for 60 minutes. The amount of recovered MP may vary according to the level. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21272 => 
  [
    'id' => 21272,
    'type' => 'etcitem',
    'name' => 'Rune Designer Cookie',
    'add_name' => 'Event',
    'description' => 'Dimensional  Greatly increases received recharge power for 60 minutes. The amount of recovered MP may vary according to the level. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant.',
    'icon' => 'br_valentine_cookie_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21273 => 
  [
    'id' => 21273,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 3 hunting helper exchange coupons. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21274 => 
  [
    'id' => 21274,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 3 hunting helper exchange coupons. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21275 => 
  [
    'id' => 21275,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon',
    'add_name' => '',
    'description' => 'Dimensional  An exchange coupon that can be exchanged for a necklace that allows you to summon a Hunting Helper (5 hours]. Can be exchanged through the Dimensional Merchant. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21276 => 
  [
    'id' => 21276,
    'type' => 'etcitem',
    'name' => 'Hunting Helper Exchange Coupon',
    'add_name' => 'Event',
    'description' => 'Dimensional  An exchange coupon that can be exchanged for a necklace that allows you to summon a Hunting Helper (5 hours]. Can be exchanged through the Dimensional Merchant. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21277 => 
  [
    'id' => 21277,
    'type' => 'etcitem',
    'name' => 'High-Grade Hunting Helper Exchange Coupon Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 2 high quality hunting helper exchange coupons. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21278 => 
  [
    'id' => 21278,
    'type' => 'etcitem',
    'name' => 'High-Grade Hunting Helper Exchange Coupon Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 2 high quality hunting helper exchange coupons. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21279 => 
  [
    'id' => 21279,
    'type' => 'etcitem',
    'name' => 'High-Grade Hunting Helper Exchange Coupon',
    'add_name' => '',
    'description' => 'Dimensional  An exchange coupon that can be exchanged for a necklace that allows you to summon a High Quality Hunting Helper (5 hours]. Can be exchanged through the Dimensional Merchant. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21280 => 
  [
    'id' => 21280,
    'type' => 'etcitem',
    'name' => 'High-Grade Hunting Helper Exchange Coupon - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional  An exchange coupon that can be exchanged for a necklace that allows you to summon a High Quality Hunting Helper (5 hours]. Can be exchanged through the Dimensional Merchant. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'etc_ticket_red_i00',
    'weight' => 120,
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21281 => 
  [
    'id' => 21281,
    'type' => 'etcitem',
    'name' => 'Feather of Blessing Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 feather of blessing. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21282 => 
  [
    'id' => 21282,
    'type' => 'etcitem',
    'name' => 'Feather of Blessing Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 feather of blessing. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21283 => 
  [
    'id' => 21283,
    'type' => 'etcitem',
    'name' => 'Free Teleport Scroll Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 sheet of the Free Teleport Scroll. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21284 => 
  [
    'id' => 21284,
    'type' => 'etcitem',
    'name' => 'Free Teleport Scroll Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 sheet of the Free Teleport Scroll. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21285 => 
  [
    'id' => 21285,
    'type' => 'etcitem',
    'name' => 'Free Teleport Scroll Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 30 sheets of the Free Teleport Scroll. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21286 => 
  [
    'id' => 21286,
    'type' => 'etcitem',
    'name' => 'Free Teleport Scroll Pack',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 30 sheets of the Free Teleport Scroll. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21287 => 
  [
    'id' => 21287,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Near Kamaloka Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 15 Near Kamaloka entrance passes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21288 => 
  [
    'id' => 21288,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Near Kamaloka Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 15 Near Kamaloka entrance passes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21289 => 
  [
    'id' => 21289,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Hall of the Abyss] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 15 Kamaloka (Hall of the Abyss] entrance passes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21290 => 
  [
    'id' => 21290,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Hall of the Abyss] Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 15 Kamaloka (Hall of the Abyss] entrance passes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21291 => 
  [
    'id' => 21291,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Labyrinth of the Abyss] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 15 Kamaloka (Labyrinth of the Abyss] entrance passes. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21292 => 
  [
    'id' => 21292,
    'type' => 'etcitem',
    'name' => 'Extra Entrance Pass - Kamaloka (Labyrinth of the Abyss] Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 15 Kamaloka (Labyrinth of the Abyss] entrance passes. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21293 => 
  [
    'id' => 21293,
    'type' => 'etcitem',
    'name' => 'Weapon-type Enhance Backup Stone (A-Grade] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 weapon-type enhance backup stone (A-Grade]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21294 => 
  [
    'id' => 21294,
    'type' => 'etcitem',
    'name' => 'Weapon-type Enhance Backup Stone (A-Grade] Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 weapon-type enhance backup stone (A-Grade]. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21295 => 
  [
    'id' => 21295,
    'type' => 'etcitem',
    'name' => 'Weapon-type Enhance Backup Stone (S-Grade] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 weapon-type enhance backup stone (S-Grade]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21296 => 
  [
    'id' => 21296,
    'type' => 'etcitem',
    'name' => 'Weapon-type Enhance Backup Stone (S-Grade] Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 weapon-type enhance backup stone (S-Grade]. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21297 => 
  [
    'id' => 21297,
    'type' => 'etcitem',
    'name' => 'Armor-type Enhance Backup Stone (A-Grade] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 armor-type enhance backup stone (A-Grade]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21298 => 
  [
    'id' => 21298,
    'type' => 'etcitem',
    'name' => 'Armor-type Enhance Backup Stone (A-Grade] Pack - Event',
    'add_name' => 'Event',
    'description' => 'Dimensional item pack. Gift box containing 1 armor-type enhance backup stone (A-Grade]. Cannot be exchanged, dropped, or destroyed. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_destroyable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
  21299 => 
  [
    'id' => 21299,
    'type' => 'etcitem',
    'name' => 'Armor-type Enhance Backup Stone (S-Grade] Pack',
    'add_name' => '',
    'description' => 'Dimensional item pack. Gift box containing 1 armor-type enhance backup stone (S-Grade]. Cannot be exchanged or dropped. Can be shared between characters within an account through the Dimensional Merchant. Can be stored in a private warehouse.',
    'icon' => 'br_four_leaf_clover_box_i00',
    'is_tradable' => false,
    'is_dropable' => false,
    'is_stackable' => true,
    'is_freightable' => true,
  ],
];