SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `item_id` int(11) NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL,
  `enchant` int(11) NULL DEFAULT 0,
  `phrase` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `issued` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

DROP TABLE IF EXISTS `logs_all`;
CREATE TABLE `logs_all`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `time` datetime NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phrase` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `variables` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  `request` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for bonus_code
-- ----------------------------
DROP TABLE IF EXISTS bonus_code;
CREATE TABLE bonus_code  (
  id int(11) NOT NULL AUTO_INCREMENT,
  code varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  server_id int(11) NULL DEFAULT NULL,
  item_id int(11) NULL DEFAULT NULL,
  count int(11) NULL DEFAULT 1,
  enchant int(11) NULL DEFAULT 0,
  phrase varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  start_date_code datetime NULL DEFAULT NULL,
  end_date_code datetime NULL DEFAULT NULL,
  PRIMARY KEY (id) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `message` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `player` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `server` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `server_data`;
CREATE TABLE `server_data`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `val` varchar(6000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `key`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for donate
-- ----------------------------
DROP TABLE IF EXISTS `donate`;
CREATE TABLE `donate`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL,
  `cost` float NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  `is_pack` int(11) NULL DEFAULT NULL,
  `pack_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

DROP TABLE IF EXISTS `statistic_online`;
CREATE TABLE `statistic_online`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NULL DEFAULT NULL,
  `loginserver` int(11) NULL DEFAULT NULL,
  `gameserver` int(11) NULL DEFAULT NULL,
  `count_online_player` int(11) NULL DEFAULT NULL,
  `time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for donate_history
-- ----------------------------
DROP TABLE IF EXISTS `donate_history`;
CREATE TABLE `donate_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `item_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `cost` int(11) NULL DEFAULT NULL,
  `char_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

DROP TABLE IF EXISTS `donate_pack`;
CREATE TABLE `donate_pack`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_id` int(11) NULL DEFAULT NULL,
  `item_id` int(11) NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for donate_history_pay
-- ----------------------------
DROP TABLE IF EXISTS `donate_history_pay`;
CREATE TABLE `donate_history_pay`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `point` int(11) NULL DEFAULT NULL,
  `pay_system` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  `sphere` int(11) NULL DEFAULT 0 COMMENT '1 если деньги зачислила сфера (к примеру это просто бонус)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_buffs
-- ----------------------------
DROP TABLE IF EXISTS `forum_buffs`;
CREATE TABLE `forum_buffs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NULL DEFAULT NULL,
  `skill_id` int(11) NULL DEFAULT NULL,
  `type` int(11) NULL DEFAULT NULL COMMENT '0 - buff / 1 debuff',
  `comment` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `date_create` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_category
-- ----------------------------
DROP TABLE IF EXISTS `forum_category`;
CREATE TABLE `forum_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_images
-- ----------------------------
DROP TABLE IF EXISTS `forum_images`;
CREATE TABLE `forum_images`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_posts
-- ----------------------------
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE `forum_posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `post` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_attached` int(11) NULL DEFAULT 0,
  `date_create` datetime NULL DEFAULT current_timestamp(),
  `date_update` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_section
-- ----------------------------
DROP TABLE IF EXISTS `forum_section`;
CREATE TABLE `forum_section`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `topics_count` int(11) NULL DEFAULT 0,
  `posts_count` int(11) NULL DEFAULT 0,
  `topic_id` int(11) NULL DEFAULT NULL,
  `last_post_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `is_close` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for forum_topics
-- ----------------------------
DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE `forum_topics`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_id` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `data_create` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `replies` int(11) NULL DEFAULT 1,
  `last_post_id` int(11) NULL DEFAULT NULL,
  `last_post_user_id` int(11) NULL DEFAULT NULL,
  `last_post_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_update` datetime NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pin` int(11) NULL DEFAULT 0,
  `author_id` int(11) NULL DEFAULT NULL,
  `author_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_close` int(11) NULL DEFAULT 0,
  `link` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_movies
-- ----------------------------
DROP TABLE IF EXISTS `gallery_movies`;
CREATE TABLE `gallery_movies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `link` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_screenshot
-- ----------------------------
DROP TABLE IF EXISTS `gallery_screenshot`;
CREATE TABLE `gallery_screenshot`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `enable` int(11) NULL DEFAULT 0,
  `desciption` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for items_data
-- ----------------------------
DROP TABLE IF EXISTS `items_data`;
CREATE TABLE `items_data`  (
  `item_id` int(11) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `additionalname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_trade` int(11) NULL DEFAULT NULL,
  `is_drop` int(11) NULL DEFAULT NULL,
  `is_destruct` int(11) NULL DEFAULT NULL,
  `crystal_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `consume_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'consume_type_normal',
  PRIMARY KEY (`item_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for launcher
-- ----------------------------
DROP TABLE IF EXISTS `launcher`;
CREATE TABLE `launcher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `l2app` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `args` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phrase` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for log_transfer_spherecoin
-- ----------------------------
DROP TABLE IF EXISTS `log_transfer_spherecoin`;
CREATE TABLE `log_transfer_spherecoin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sender` int(11) NULL DEFAULT NULL,
  `user_receiving` int(11) NULL DEFAULT NULL,
  `point` int(11) NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for manual
-- ----------------------------
DROP TABLE IF EXISTS `manual`;
CREATE TABLE `manual`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `message` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  `read` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for page_comments
-- ----------------------------
DROP TABLE IF EXISTS `page_comments`;
CREATE TABLE `page_comments`  (
                                  `id`          int(11)                                                        NOT NULL AUTO_INCREMENT,
                                  `page_id`     int(11)                                                        NULL     DEFAULT NULL,
                                  `user_id`     int(11)                                                        NULL     DEFAULT NULL,
                                  `message`     varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL     DEFAULT NULL,
                                  `trash`       int(11)                                                        NOT NULL DEFAULT 0,
                                  `date_create` timestamp                                                      NOT NULL DEFAULT current_timestamp(),
                                  `date_update` timestamp                                                      NULL     DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
                                  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_unicode_ci
  ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`
(
    `id`          int(11)   NOT NULL AUTO_INCREMENT,
    `is_news`     int(11)                                 DEFAULT '0',
    `name`        varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description` mediumtext COLLATE utf8mb4_unicode_ci,
    `comment`     int(11)   NOT NULL                      DEFAULT '0',
    `date_create` timestamp NOT NULL                      DEFAULT CURRENT_TIMESTAMP,
    `date_update` timestamp NULL                          DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `trash`       int(11)   NOT NULL                      DEFAULT '0',
    `lang`        varchar(10) COLLATE utf8mb4_unicode_ci  DEFAULT 'ru',
    `poster`      varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `link`        varchar(1200)                           DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;



-- ----------------------------
-- Table structure for player_accounts
-- ----------------------------
DROP TABLE IF EXISTS `player_accounts`;
CREATE TABLE `player_accounts`
(
    `id`          int(11)                                                       NOT NULL AUTO_INCREMENT,
    `login`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `password`    varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `email`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `server_id` int(11) NULL DEFAULT NULL,
  `password_hide` int(11) NULL DEFAULT NULL,
  `date_create` datetime NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for player_forbidden
-- ----------------------------
DROP TABLE IF EXISTS `player_forbidden`;
CREATE TABLE `player_forbidden`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `player` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `forbidden` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for referrals
-- ----------------------------
DROP TABLE IF EXISTS `referrals`;
CREATE TABLE `referrals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `leader_id` int(11) NULL DEFAULT NULL,
  `done` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for server_description
-- ----------------------------
DROP TABLE IF EXISTS `server_description`;
CREATE TABLE `server_description`  (
  `server_id` int(11) NOT NULL,
  `lang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `page_id` int(11) NULL DEFAULT NULL,
  `default` int(11) NULL DEFAULT 0,
  `date_create` timestamp NULL DEFAULT current_timestamp(),
  `date_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for server_list
-- ----------------------------
DROP TABLE IF EXISTS `server_list`;
CREATE TABLE `server_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rate_exp` int(11) NULL DEFAULT NULL,
  `rate_sp` int(11) NULL DEFAULT NULL,
  `rate_adena` int(11) NULL DEFAULT NULL,
  `rate_drop_item` int(11) NULL DEFAULT NULL,
  `rate_spoil` int(11) NULL DEFAULT NULL,
  `date_start_server` datetime NULL DEFAULT NULL,
  `chronicle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_port` int(11) NULL DEFAULT 3306,
  `login_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `game_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `game_port` int(11) NULL DEFAULT 3306,
  `game_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `game_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `game_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `collection_sql_base_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `check_server_online` int(11) NULL DEFAULT 0,
  `check_loginserver_online_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `check_loginserver_online_port` int(11) NULL DEFAULT 2106,
  `check_gameserver_online_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `check_gameserver_online_port` int(11) NULL DEFAULT 7777,
  `chat_game_enabled` int(11) NULL DEFAULT 0,
  `launcher_enabled` int(11) NULL DEFAULT 0,
  `timezone` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rest_api_enable` int(11) NOT NULL DEFAULT 0,
  `rest_api_hostname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rest_api_port` int(11) NULL DEFAULT NULL,
  `rest_api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `content` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `close` int(11) NULL DEFAULT 0,
  `private` int(11) NULL DEFAULT NULL,
  `hide` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  FULLTEXT INDEX `content_index`(`content`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tickets_comment
-- ----------------------------
DROP TABLE IF EXISTS `tickets_comment`;
CREATE TABLE `tickets_comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `content` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tickets_comment_image
-- ----------------------------
DROP TABLE IF EXISTS `tickets_comment_image`;
CREATE TABLE `tickets_comment_image`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `comment_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tickets_image
-- ----------------------------
DROP TABLE IF EXISTS `tickets_image`;
CREATE TABLE `tickets_image`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ticket_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_variables
-- ----------------------------
DROP TABLE IF EXISTS `user_variables`;
CREATE TABLE `user_variables`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `var` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `val` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_create` datetime NULL DEFAULT current_timestamp(),
  `date_update` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `signature` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
    `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
    `access_level` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'user',
    `donate_point` float NULL DEFAULT 0,
    `avatar` varchar(62) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'none.jpeg',
    `avatar_background` varchar(62) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'none.jpeg',
    `timezone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `country` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    `city` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users_password_forget
-- ----------------------------
DROP TABLE IF EXISTS `users_password_forget`;
CREATE TABLE `users_password_forget`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT current_timestamp(),
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users_permission
-- ----------------------------
DROP TABLE IF EXISTS `users_permission`;
CREATE TABLE `users_permission`  (
  `user_id` int(11) NOT NULL,
  `ban_page` int(11) NULL DEFAULT 0,
  `ban_ticket` int(11) NULL DEFAULT 0,
  `ban_gallery` int(11) NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
