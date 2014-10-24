/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50534
 Source Host           : localhost
 Source Database       : qme

 Target Server Type    : MySQL
 Target Server Version : 50534
 File Encoding         : utf-8

 Date: 10/16/2014 10:43:50 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `actions`
-- ----------------------------
BEGIN;
INSERT INTO `actions` VALUES ('1', 'play', 'questions', 'play', ''), ('2', 'logout', 'users', 'logout', ''), ('3', 'my vouchers', 'vouchers', 'my_vouchers', ''), ('4', 'my profile', 'users', 'my_profile', ''), ('5', 'view voucher detail', 'vouchers', 'view', ''), ('6', 'use voucher', 'vouchers', 'use_it', ''), ('7', 'edit my profile', 'users', 'edit_my_profile', ''), ('8', 'change password', 'users', 'change_password', ''), ('9', 'play 2', 'questions', 'play2', '');
COMMIT;

-- ----------------------------
--  Table structure for `banners`
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `background` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banners_regions1_idx` (`region_id`),
  CONSTRAINT `fk_banners_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `banners`
-- ----------------------------
BEGIN;
INSERT INTO `banners` VALUES ('8', '2014-09-30 12:42:00', '2014-09-30 12:42:00', '/img/banners/ipad-mini-2-1.jpg', 'iPad mini c\'est vraiment sympa ! ', 'bonne chance ! 10 chances de gagnÃ©', '1'), ('9', '2014-09-30 12:43:00', '2014-09-30 12:43:00', '/img/banners/beats_by_dr_dre_red_vildane_zeneli-2-1.jpg', 'Cette semaine gagne un casque Dr Dre !', 'un son toujours inÃ©galÃ© ', '1'), ('10', '2014-09-30 12:43:00', '2014-09-30 12:43:00', '/img/banners/nobodys-mad-nicky-romero-ld-1-2-1.jpg', 'Carte de membre Ã  vie', 'imagine un peu le truc de ouf !', '1');
COMMIT;

-- ----------------------------
--  Table structure for `big_gifts`
-- ----------------------------
DROP TABLE IF EXISTS `big_gifts`;
CREATE TABLE `big_gifts` (
  `id` int(11) NOT NULL,
  `created` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `qweek_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_big_gifts_qweeks1_idx` (`qweek_id`),
  CONSTRAINT `fk_big_gifts_qweeks1` FOREIGN KEY (`qweek_id`) REFERENCES `qweeks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `choice_options`
-- ----------------------------
DROP TABLE IF EXISTS `choice_options`;
CREATE TABLE `choice_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL,
  `choices_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_possibility_options_choices1_idx` (`choices_id`),
  CONSTRAINT `fk_possibility_options_choices1` FOREIGN KEY (`choices_id`) REFERENCES `choices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `choice_types`
-- ----------------------------
DROP TABLE IF EXISTS `choice_types`;
CREATE TABLE `choice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `choice_types`
-- ----------------------------
BEGIN;
INSERT INTO `choice_types` VALUES ('1', 'text', ''), ('2', 'image', '');
COMMIT;

-- ----------------------------
--  Table structure for `choices`
-- ----------------------------
DROP TABLE IF EXISTS `choices`;
CREATE TABLE `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` varchar(45) DEFAULT NULL,
  `is_right` tinyint(1) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `media` varchar(45) DEFAULT NULL,
  `media_type` varchar(45) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `choice_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_possibilities_questions1_idx` (`question_id`),
  KEY `fk_choices_choice_types1_idx` (`choice_type_id`),
  CONSTRAINT `fk_choices_choice_types1` FOREIGN KEY (`choice_type_id`) REFERENCES `choice_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_possibilities_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `contacts`
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES ('1', '2014-09-26 12:27:53', 'werfwerfwe', 'cyril@hirschi.me', 'erf werfew rgfwerf'), ('2', '2014-09-26 12:28:10', 'werfwerfwe', 'cyril@hirschi.me', 'erf werfew rgfwerf');
COMMIT;

-- ----------------------------
--  Table structure for `customer_types`
-- ----------------------------
DROP TABLE IF EXISTS `customer_types`;
CREATE TABLE `customer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `customer_types`
-- ----------------------------
BEGIN;
INSERT INTO `customer_types` VALUES ('1', 'Prospect', ''), ('2', 'Client', '');
COMMIT;

-- ----------------------------
--  Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text,
  `customer_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customers_customer_types1_idx` (`customer_type_id`),
  CONSTRAINT `fk_customers_customer_types1` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `customers`
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES ('1', 'Cyril Hirschi', '', 'Av. des Mousquines 40', '1005', 'Lausanne', 'Suisse', '33213432020', 'cyril@hirschi.me', '', '2'), ('2', 'Question Me', 'poil', 'Av. de Mon-Repos 3', '1005', 'Lausanne', 'Suisse', '33213432020', 'cyril@3xw.ch', '', '2');
COMMIT;

-- ----------------------------
--  Table structure for `gifts`
-- ----------------------------
DROP TABLE IF EXISTS `gifts`;
CREATE TABLE `gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `used` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `winner_id` varchar(255) DEFAULT NULL,
  `qday_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gifts_customers1_idx` (`customer_id`),
  KEY `fk_gifts_qdays1_idx` (`qday_id`),
  CONSTRAINT `fk_gifts_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gifts_qdays1` FOREIGN KEY (`qday_id`) REFERENCES `qdays` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'admin', ''), ('2', 'gamer', '');
COMMIT;

-- ----------------------------
--  Table structure for `groups_actions`
-- ----------------------------
DROP TABLE IF EXISTS `groups_actions`;
CREATE TABLE `groups_actions` (
  `group_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`action_id`),
  KEY `fk_groups_actions_actions1_idx` (`action_id`),
  KEY `fk_groups_actions_groups1_idx` (`group_id`),
  CONSTRAINT `fk_groups_actions_actions1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups_actions_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups_actions`
-- ----------------------------
BEGIN;
INSERT INTO `groups_actions` VALUES ('2', '1'), ('2', '2'), ('2', '3'), ('2', '4'), ('2', '5'), ('2', '6'), ('2', '7'), ('2', '8'), ('2', '9');
COMMIT;

-- ----------------------------
--  Table structure for `order_types`
-- ----------------------------
DROP TABLE IF EXISTS `order_types`;
CREATE TABLE `order_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `order_types`
-- ----------------------------
BEGIN;
INSERT INTO `order_types` VALUES ('1', 'Test', '');
COMMIT;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `repondants` int(11) NOT NULL,
  `nb_questions` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `order_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customers1_idx` (`customer_id`),
  KEY `fk_orders_order_types1_idx` (`order_type_id`),
  CONSTRAINT `fk_orders_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_order_types1` FOREIGN KEY (`order_type_id`) REFERENCES `order_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `orders`
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES ('1', '2014-10-09 15:19:06', '1', '100', '5', null, '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `profiles`
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profiles_users2_idx` (`user_id`),
  CONSTRAINT `fk_profiles_users2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `qdays`
-- ----------------------------
DROP TABLE IF EXISTS `qdays`;
CREATE TABLE `qdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `nb_qmobile` varchar(45) DEFAULT NULL,
  `nb_qfixe` varchar(45) DEFAULT NULL,
  `nb_qprofile` varchar(255) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_qdays_regions1_idx` (`region_id`),
  CONSTRAINT `fk_qdays_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `qdays`
-- ----------------------------
BEGIN;
INSERT INTO `qdays` VALUES ('1', '2014-10-03 13:26:00', '2014-10-03 23:26:00', '3', '1', null, '1'), ('2', '2014-10-06 01:00:00', '2014-10-07 01:00:00', '5', '5', null, '1'), ('3', '2014-10-07 01:00:00', '2014-10-08 12:00:00', '3', '3', null, '1'), ('4', '2014-10-08 00:00:00', '2014-10-08 23:59:00', '3', '3', null, '1'), ('5', '2014-10-09 00:00:00', '2014-10-09 23:59:00', '2', '2', null, '1'), ('6', '2014-10-13 00:00:00', '2014-10-13 23:59:00', '4', '4', null, '1'), ('7', '2014-10-15 00:00:00', '2014-10-15 23:59:00', '3', '3', null, '1');
COMMIT;

-- ----------------------------
--  Table structure for `queries`
-- ----------------------------
DROP TABLE IF EXISTS `queries`;
CREATE TABLE `queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `sign` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_queries_questions1_idx` (`question_id`),
  CONSTRAINT `fk_queries_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `question_types`
-- ----------------------------
DROP TABLE IF EXISTS `question_types`;
CREATE TABLE `question_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `question_types`
-- ----------------------------
BEGIN;
INSERT INTO `question_types` VALUES ('1', 'Profile'), ('2', 'Fixe'), ('3', 'Mobile');
COMMIT;

-- ----------------------------
--  Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `media_type` varchar(45) DEFAULT NULL,
  `dependance_choice_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `question_type_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questions_question_types1_idx` (`question_type_id`),
  KEY `fk_questions_orders1_idx` (`order_id`),
  CONSTRAINT `fk_questions_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_question_types1` FOREIGN KEY (`question_type_id`) REFERENCES `question_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `questions_regions`
-- ----------------------------
DROP TABLE IF EXISTS `questions_regions`;
CREATE TABLE `questions_regions` (
  `question_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`,`region_id`),
  KEY `fk_questions_regions_regions1_idx` (`region_id`),
  KEY `fk_questions_regions_questions1_idx` (`question_id`),
  CONSTRAINT `fk_questions_regions_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_regions_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `qweeks`
-- ----------------------------
DROP TABLE IF EXISTS `qweeks`;
CREATE TABLE `qweeks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` varchar(45) NOT NULL,
  `end` varchar(45) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_qweeks_regions1_idx` (`region_id`),
  CONSTRAINT `fk_qweeks_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `regions`
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `regions`
-- ----------------------------
BEGIN;
INSERT INTO `regions` VALUES ('1', 'Lausanne');
COMMIT;

-- ----------------------------
--  Table structure for `user_vouchers`
-- ----------------------------
DROP TABLE IF EXISTS `user_vouchers`;
CREATE TABLE `user_vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `used` datetime DEFAULT NULL,
  `voucher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_vouchers_vouchers1_idx` (`voucher_id`),
  KEY `fk_user_vouchers_users1_idx` (`user_id`),
  CONSTRAINT `fk_user_vouchers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_vouchers_vouchers1` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_vouchers`
-- ----------------------------
BEGIN;
INSERT INTO `user_vouchers` VALUES ('36', '2014-10-15 16:56:10', '2014-10-15 16:58:00', '1', '5'), ('37', '2014-10-15 17:02:31', null, '1', '5');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(255) NOT NULL DEFAULT 'male',
  `email` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_groups1_idx` (`group_id`),
  KEY `fk_users_regions1_idx` (`region_id`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', '$2a$10$2y63lYczQHYBNGHaIPJot.6r62WJiRniLlow0l4NkwqSVQtzbEJCK', '2014-09-29', 'male', 'admin@questionme.ch', '1', '1'), ('3', 'antoine', '$2a$10$2kdXU0zFSS4/ZBtgDpxAiOh.2Ahd/.AP0Tn.NKc6MINBl69qbfrqi', '1988-05-02', 'male', 'antoine@3xw.ch', '2', '1'), ('5', 'cyril', '$2a$10$PgZNdmgyOC1cOnND6oiZr.RNMhu/37Dz.UJz7PBRRYlt1XWOlP9Re', '1991-02-01', 'male', 'cyril@3xw.ch', '2', '1'), ('6', 'lapin', '$2a$10$jQ15/9XUb.fdmspya2dMPe3k/Pr2mBrQzRnCgqQjtpXlWO/AYMqt6', '1991-05-04', 'male', 'cyril@hirschi.me', '2', '1'), ('7', 'eniotna', '$2a$10$Za8Wi6fFYCcC/bxhux/caef7W96gcMt4Mw13VegKykM8EkZp2e1Ra', '1994-03-30', 'male', 'antoine@questionme.ch', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `users_choices`
-- ----------------------------
DROP TABLE IF EXISTS `users_choices`;
CREATE TABLE `users_choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `free` text,
  `choice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`choice_id`,`user_id`),
  KEY `fk_users_choices_choices1_idx` (`choice_id`),
  KEY `fk_users_choices_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_choices_choices1` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_choices_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users_gifts`
-- ----------------------------
DROP TABLE IF EXISTS `users_gifts`;
CREATE TABLE `users_gifts` (
  `user_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`gift_id`),
  KEY `fk_users_gifts_gifts1_idx` (`gift_id`),
  KEY `fk_users_gifts_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_gifts_gifts1` FOREIGN KEY (`gift_id`) REFERENCES `gifts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_gifts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `vouchers`
-- ----------------------------
DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `validity` date DEFAULT NULL,
  `conditions` text,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vouchers_customers2_idx` (`customer_id`),
  CONSTRAINT `fk_vouchers_customers2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `vouchers`
-- ----------------------------
BEGIN;
INSERT INTO `vouchers` VALUES ('1', '2014-10-15', '/img/banners/topelement-2-1.jpg', '10% sur ton menu du jour', '<iframe src=\"/pan/aGEGraphicalElementPreview.action?programId=\r\n        250764\r\n        &amp;graphicalElementId=\r\n        21973472\r\n        \" width=\"\r\n        120\r\n        \" height=\"\r\n        600\r\n        \" frameborder=\"0\" border=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"auto\"></iframe>', '2014-10-09', 'Vestibulum nec velit vel leo gravida molestie ut in mi. Etiam efficitur odio sit amet elit hendrerit faucibus. Ut vitae vulputate leo, sed aliquet elit. Nunc ut odio eget nulla volutpat tempus. Sed dapibus neque consequat gravida ullamcorper. Etiam dictum pretium bibendum. Quisque non ex eget ipsum pretium lacinia sit amet eget quam. Nullam fringilla tellus lorem, ut dapibus enim porttitor quis. Nam ullamcorper odio euismod justo iaculis, eu iaculis lacus dapibus. Nam scelerisque eros ut justo gravida, nec euismod elit bibendum. Maecenas nec libero ultricies, interdum turpis non, hendrerit dolor.\r\n', '1'), ('2', '2014-10-06', '/img/banners/nobodys-mad-nicky-romero-ld-1-3-1.jpg', '50% sur l\'entrÃ©e du Mad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus, metus vitae porttitor iaculis, augue est ornare massa, pharetra blandit mi tellus et velit. Donec vitae dictum purus. Aliquam erat volutpat. Maecenas eget feugiat nunc. Etiam ac interdum leo. Nullam lacinia sapien consectetur dolor pellentesque, et mollis ante scelerisque. Nunc arcu nisi, venenatis eget tellus a, tristique imperdiet neque. Vivamus a sagittis risus. Etiam sit amet felis eu nunc lacinia bibendum. Proin luctus orci eu dolor vestibulum mattis. Pellentesque scelerisque facilisis mauris at interdum. Aenean ac ipsum a lectus rhoncus aliquam ac non lorem. Integer risus est, tempor vel quam sit amet, tempor tincidunt sem.', '2014-10-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus, metus vitae porttitor iaculis, augue est ornare massa, pharetra blandit mi tellus et velit. Donec vitae dictum purus. Aliquam erat volutpat. Maecenas eget feugiat nunc. Etiam ac interdum leo. Nullam lacinia sapien consectetur dolor pellentesque, et mollis ante scelerisque. Nunc arcu nisi, venenatis eget tellus a, tristique imperdiet neque. Vivamus a sagittis risus. Etiam sit amet felis eu nunc lacinia bibendum. Proin luctus orci eu dolor vestibulum mattis. Pellentesque scelerisque facilisis mauris at interdum. Aenean ac ipsum a lectus rhoncus aliquam ac non lorem. Integer risus est, tempor vel quam sit amet, tempor tincidunt sem.', '1'), ('3', '2014-10-07', '/img/vouchers/beats_by_dr_dre_red_vildane_zeneli-1-1.jpg', '20% de reduc. sur le casque', 'Nam ac tincidunt quam. Aenean auctor dui at magna dignissim rhoncus. Nullam odio eros, pretium quis aliquet sed, pretium eu magna. Donec elementum imperdiet pulvinar. Praesent elementum ipsum sit amet sapien tristique, ac aliquam ipsum interdum. Sed et euismod est, in maximus turpis. Morbi vel interdum justo. Integer venenatis dolor magna, eget mollis ex aliquam ac. Quisque hendrerit nibh id urna tincidunt, non sagittis eros pulvinar. Nam a rutrum nibh. Fusce mi velit, consectetur a tincidunt at, blandit et libero. Integer nisi nisl, condimentum non tellus nec, dapibus dignissim massa. Duis lobortis mauris ac euismod maximus.\r\n', '2014-10-20', 'Mauris a ultrices odio. Ut a elit in augue commodo tempor et ut lectus. In eget lectus odio. Sed non ex id turpis consectetur tincidunt. Proin vitae lobortis eros. Etiam sit amet ante eros. Maecenas posuere quam non arcu mollis condimentum. Vestibulum commodo justo venenatis, aliquam tellus sit amet, semper sapien.\r\n', '2'), ('4', '2014-10-13', '/img/vouchers/home_test-1-1.jpg', '50% sur une curiositÃ© Eclair', 'Nulla facilisi. In vel sem. Morbi id urna in diam dignissim feugiat. Proin molestie tortor eu velit. Aliquam erat volutpat. Nullam ultrices, diam tempus vulputate egestas, eros pede varius leo, sed imperdiet lectus est ornare odio. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin consectetuer velit in dui. Phasellus wisi purus, interdum vitae, rutrum accumsan, viverra in, velit. Sed enim risus, congue non, tristique in, commodo eu, metus. Aenean tortor mi, imperdiet id, gravida eu, posuere eu, felis. Mauris sollicitudin, turpis in hendrerit sodales, lectus ipsum pellentesque ligula, sit amet scelerisque urna nibh ut arcu. Aliquam in lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla placerat aliquam wisi. Mauris viverra odio. Quisque fermentum pulvinar odio. Proin posuere est vitae ligula. Etiam euismod. Cras a eros.', '2014-10-31', 'Cras sed ante. Phasellus in massa. Curabitur dolor eros, gravida et, hendrerit ac, cursus non, massa. Aliquam lorem. In hac habitasse platea dictumst. Cras eu mauris. Quisque lacus. Donec ipsum. Nullam vitae sem at nunc pharetra ultricies. Vivamus elit eros, ullamcorper a, adipiscing sit amet, porttitor ut, nibh. Maecenas adipiscing mollis massa. Nunc ut dui eget nulla venenatis aliquet. Sed luctus posuere justo. Cras vehicula varius turpis. Vivamus eros metus, tristique sit amet, molestie dignissim, malesuada et, urna.', '2'), ('5', '2014-10-14', '/img/vouchers/view-2-1-1.jpg', '40% de rabais sur la superette 2014', '', '2014-10-14', '', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
