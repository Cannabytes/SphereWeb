SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE `server_description`;
CREATE TABLE `server_description`  (
  `server_id` int NOT NULL,
  `lang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `page_id` int NULL DEFAULT NULL,
  `default` int NULL DEFAULT 0,
  `date_create` timestamp NULL DEFAULT current_timestamp,
  `date_update` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
