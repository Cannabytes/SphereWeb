SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `users_permission`;
CREATE TABLE `users_permission`  (
  `user_id` int(11) NOT NULL,
  `ban_page` int(11) NULL DEFAULT 0,
  `ban_ticket` int(11) NULL DEFAULT 0,
  `ban_gallery` int(11) NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;
SET FOREIGN_KEY_CHECKS = 1;
