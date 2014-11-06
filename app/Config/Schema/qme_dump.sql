/*
 Navicat MySQL Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : qme

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 11/06/2014 18:15:13 PM
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
--  Table structure for `banner_types`
-- ----------------------------
DROP TABLE IF EXISTS `banner_types`;
CREATE TABLE `banner_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `banner_types`
-- ----------------------------
BEGIN;
INSERT INTO `banner_types` VALUES ('1', 'week gift', '', '2'), ('2', 'day voucher', '', '1');
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
  `banner_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banners_regions1_idx` (`region_id`),
  KEY `fk_banners_banner_types1_idx` (`banner_type_id`),
  CONSTRAINT `fk_banners_banner_types1` FOREIGN KEY (`banner_type_id`) REFERENCES `banner_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_banners_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `banners`
-- ----------------------------
BEGIN;
INSERT INTO `banners` VALUES ('8', '2014-11-01 01:00:00', '2014-11-03 01:00:00', '/img/banners/ipad-mini-2-1.jpg', 'Cette semaine un Ipad Mini offert par EF', 'OUATE AILES ?', '1', '0'), ('9', '2014-11-04 01:00:00', '2014-11-07 01:00:00', '/img/banners/beats_by_dr_dre_red_vildane_zeneli-2-1.jpg', 'Cette semaine un casque Dr DRE offert par ta maman', 'MILF', '1', '0'), ('10', '2014-11-08 01:00:00', '2014-11-10 01:00:00', '/img/banners/nobodys-mad-nicky-romero-ld-1-2-1.jpg', 'Cette semaine une carte de membre MAD !', 'Et on fait tourner les serviettes', '1', '0'), ('11', '2014-11-01 01:00:00', '2014-11-02 01:00:00', '/img/banners/10866817-1-1.jpg', 'Aujourd\'hui des entrÃ©es Ã  Aquaparc Ã  gagner', 'Plouf !!!', '1', '0'), ('12', '2014-11-02 01:00:00', '2014-11-03 01:00:00', '/img/banners/img-mykki-blanco-video_114000166774site-1230x695-1.png', 'Aujourd\'hui une bouteille au Punk Ã  gagner', 'Aglou Aglou', '1', '0'), ('13', '2014-11-03 01:00:00', '2014-11-04 01:00:00', '/img/banners/05495767-photo-tuning-porsche-911-par-caractere-exclusive-1-1.jpg', 'Aujourd\'hui une voiture offerte par AMAG', 'Vroum Vroum', '1', '0'), ('14', '2014-11-04 01:00:00', '2014-11-05 01:00:00', '/img/banners/pole-dance-1-1.jpg', 'Aujourd\'hui la rue de Geneve t\'offre une soirÃ©e', 'Chat-Bite', '1', '0'), ('15', '2014-11-05 01:00:00', '2014-11-06 01:00:00', '/img/banners/les_forfaits_de_ski-1-1.jpg', 'Aujourd\'hui des forfaits de ski Ã  gagner', 'Etoile des neiiiiiiges', '1', '0'), ('16', '2014-11-06 01:00:00', '2014-11-07 01:00:00', '/img/banners/5150574z1224416-1-1.jpg', 'Aujourdhui un Tancarville Ã  gagner', 'WTF', '1', '0'), ('17', '2014-11-07 00:00:00', '2014-11-08 00:00:00', '/img/banners/LaisBazaar2-1-1.jpg', 'Aujourd\'hui des baptemes de plongÃ©e', 'sf dnsgn jgn sg ', '1', '0'), ('18', '2014-11-08 00:00:00', '2014-11-09 00:00:00', '/img/banners/5473-thickbox_default-1-1.jpg', 'Aujourd\'hui un sac pour ranger ton Speedo', '- Antoine -', '1', '0'), ('19', '2014-11-09 00:00:00', '2014-11-10 00:00:00', '/img/banners/05420233-photo-iphone-boite-1-1-1.jpg', 'Aujourd\'hui une boite d\'Iphone Ã  gagner !', 'Et ouais mon gars', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `big_gifts`
-- ----------------------------
DROP TABLE IF EXISTS `big_gifts`;
CREATE TABLE `big_gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `media` varchar(255) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `qweek_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_big_gifts_qweeks1_idx` (`qweek_id`),
  CONSTRAINT `fk_big_gifts_qweeks1` FOREIGN KEY (`qweek_id`) REFERENCES `qweeks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `big_gifts`
-- ----------------------------
BEGIN;
INSERT INTO `big_gifts` VALUES ('2', '2014-11-05 10:06:01', 'Apple TV', 'Lâ€™Apple TV est un minuscule appareil qui vous donne accÃ¨s Ã  une multitude de contenus HD de grande qualitÃ©. Directement sur votre tÃ©lÃ©viseur haute dÃ©finition, profitez de films Ã  succÃ¨s, Ã©vÃ©nements sportifs et actualitÃ©s en direct, mais aussi de votre musique et de vos photos, entre autres. Vous pouvez mÃªme diffuser les contenus de vos appareils iOS ou Mac sur votre tÃ©lÃ©viseur grÃ¢ce Ã  AirPlay. Autre bonne nouvelle : lâ€™Apple TV ne coÃ»te que CHF 99.-.', '/img/gifts/Apple-TV-teaser-001-1-1.jpg', null, '2');
COMMIT;

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
--  Table structure for `choices`
-- ----------------------------
DROP TABLE IF EXISTS `choices`;
CREATE TABLE `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` varchar(255) DEFAULT NULL,
  `is_right` tinyint(1) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `media_type` varchar(45) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_possibilities_questions1_idx` (`question_id`),
  CONSTRAINT `fk_possibilities_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `choices`
-- ----------------------------
BEGIN;
INSERT INTO `choices` VALUES ('104', 'Suisse', '0', 'RADIO', null, null, '48'), ('105', 'Chine', '0', 'RADIO', null, null, '48'), ('106', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '0', 'RADIO', null, null, '49'), ('107', 'USA', '0', 'RADIO', null, null, '48'), ('108', 'Oui, mais je nâ€™y suis jamais allÃ©', '0', 'RADIO', null, null, '49'), ('109', 'Congo ', '1', 'RADIO', null, null, '48'), ('110', 'Non', '0', 'RADIO', null, null, '49'), ('111', '30', '1', 'FREE', null, null, '52'), ('112', 'Booster Loop', '0', 'CHECKBOX', '/questions/medias/Unknown-1-1.jpg', null, '53'), ('113', 'Chute Cascade', '0', 'CHECKBOX', '/questions/medias/maxresdefault-1-1.jpg', null, '53'), ('114', 'Chute 2G', '0', 'CHECKBOX', '/questions/medias/100-adrenaline-dia2-2-1.jpg', null, '53'), ('115', 'Tobbogan noir ', '0', 'CHECKBOX', '/questions/medias/maxresdefault-1-2.jpg', null, '53'), ('116', 'Chute orange', '0', 'CHECKBOX', '/questions/medias/Unknown-1-2.jpg', null, '53'), ('117', 'Chute rouge', '0', 'CHECKBOX', '/questions/medias/100-adrenaline-dia2-2-2.jpg', null, '53'), ('118', 'Câ€™est raisonnable', '0', 'RADIO', null, null, '54'), ('119', 'Vu les sensations, Ã§a nâ€™a pas de prix', '0', 'RADIO', null, null, '54'), ('120', 'Autriche', '0', 'CHECKBOX', null, null, '55'), ('121', 'Un peu cher', '0', 'RADIO', null, null, '54'), ('122', 'Si câ€™Ã©tait moins cher, jâ€™y retournerais plus souvent', '0', 'RADIO', null, null, '54'), ('123', 'SlovÃ©nie', '1', 'RADIO', null, null, '55'), ('124', 'Pologne', '1', 'CHECKBOX', null, null, '55'), ('125', 'Monaco', '1', 'CHECKBOX', null, null, '55'), ('126', 'Non. IntÃ©ressantâ€¦', '0', 'RADIO', null, null, '56'), ('127', 'Oui, câ€™est un parc couvert', '0', 'RADIO', null, null, '56'), ('128', 'Non, Ã§a me fait peur', '0', 'RADIO', null, null, '57'), ('129', 'Non, Ã§a nâ€™existait pas encore', '0', 'RADIO', null, null, '57'), ('130', 'Oui, câ€™est dingue !', '0', 'RADIO', null, null, '57'), ('131', '', '0', 'FREE', null, null, '58'), ('132', 'Bangkok', '1', 'CHECKBOX', null, null, '59'), ('133', 'Bang kok', '1', 'FREE', null, null, '59'), ('134', 'Par Facebook', '0', 'CHECKBOX', null, null, '60'), ('135', 'Par des amis', '0', 'CHECKBOX', null, null, '60'), ('136', 'Par la Radio/TV', '0', 'CHECKBOX', null, null, '60'), ('137', 'Par un Ã©vÃ©nement', '0', 'CHECKBOX', null, null, '60'), ('138', 'Autres', '0', 'FREE', null, null, '60'), ('139', 'Pour les gamins', '0', 'CHECKBOX', null, null, '61'), ('140', 'Pour moi', '0', 'CHECKBOX', null, null, '61'), ('141', 'Un bon moyen de sâ€™amuser entre amis', '0', 'CHECKBOX', null, null, '61'), ('142', 'Trop loin', '0', 'CHECKBOX', null, null, '61'), ('143', 'Autres', '0', 'FREE', null, null, '61'), ('144', 'Non, mais Ã§a Ã  lâ€™air trop cool', '0', 'RADIO', null, null, '62'), ('145', 'Non, mais câ€™est pas trop mon truc', '0', 'RADIO', null, null, '62'), ('146', 'Oui, jâ€™aimerai trop le faire', '0', 'RADIO', null, null, '62'), ('147', 'Booster Loop', '0', 'CHECKBOX', '/questions/medias/100-adrenaline-dia2-4-1.jpg', null, '63'), ('148', 'Chute Cascade', '0', 'CHECKBOX', '/questions/medias/Unknown-1-3.jpg', null, '63'), ('149', 'Chute 2G', '0', 'CHECKBOX', '/questions/medias/maxresdefault-1-3.jpg', null, '63'), ('150', 'Tobbogan noir ', '0', 'CHECKBOX', '/questions/medias/100-adrenaline-dia2-4-2.jpg', null, '63'), ('151', 'Chute orange', '0', 'CHECKBOX', '/questions/medias/Unknown-1-4.jpg', null, '63'), ('152', 'Bien sÃ»r ! ', '0', 'RADIO', null, null, '64'), ('153', 'Chute rouge', '0', 'CHECKBOX', '/questions/medias/maxresdefault-1-4.jpg', null, '63'), ('154', 'NEIN NEIN NEIN', '0', 'RADIO', '/questions/medias/nein_sager-1-1.jpg', null, '64'), ('155', 'Câ€™est raisonnable', '0', 'RADIO', null, null, '65'), ('156', 'Parfois ', '0', 'RADIO', '/questions/medias/550_test-1-1.jpg', null, '64'), ('157', 'Je ne le connais pas', '0', 'RADIO', null, null, '65'), ('158', 'Un peu cher', '0', 'RADIO', null, null, '65'), ('159', 'Si câ€™est moins cher, je pense y aller', '0', 'RADIO', null, null, '65'), ('160', 'Mer', '0', 'CHECKBOX', null, null, '69'), ('161', 'Montagne', '0', 'CHECKBOX', null, null, '69'), ('162', '', '0', 'FREE', null, null, '70'), ('163', '33', '1', 'RADIO', null, null, '71'), ('164', '10', '0', 'RADIO', null, null, '71'), ('165', '60', '0', 'RADIO', null, null, '71'), ('166', '2', '1', 'RADIO', null, null, '72'), ('167', '3', '0', 'RADIO', null, null, '72'), ('168', '4', '0', 'RADIO', null, null, '72'), ('169', '5', '0', 'RADIO', null, null, '72'), ('170', '10', '0', 'RADIO', null, null, '73'), ('171', '30', '0', 'RADIO', null, null, '73'), ('172', '50', '0', 'RADIO', null, null, '73'), ('173', '75', '0', 'RADIO', null, null, '73'), ('174', '99', '1', 'RADIO', null, null, '73'), ('175', 'Matin', '0', 'RADIO', null, null, '74'), ('176', 'Soir', '0', 'RADIO', null, null, '74'), ('177', '50', '0', 'RADIO', null, null, '75'), ('178', '60', '1', 'RADIO', null, null, '75'), ('179', '70', '0', 'RADIO', null, null, '75'), ('180', '80', '0', 'RADIO', null, null, '75'), ('181', 'Parce que c\'est classe', '0', 'RADIO', null, null, '76'), ('182', 'A cause de leurs mÃ¨res', '0', 'RADIO', null, null, '76'), ('183', 'Parce que ca reflete le monde parrallele dans lequel ils vivent', '0', 'RADIO', null, null, '76'), ('184', '2', '0', 'SCALE', null, null, '77'), ('185', '7', '0', 'SCALE', null, null, '77'), ('186', 'Le Cervin', '0', 'RADIO', null, null, '78'), ('187', 'La Pointe Dufour', '0', 'RADIO', null, null, '78'), ('188', 'La colline de Papa', '0', 'RADIO', null, null, '78'), ('189', 'Suisse', '0', 'RADIO', null, null, '79'), ('190', 'Monaco', '0', 'RADIO', null, null, '79'), ('191', 'Vatican', '1', 'RADIO', null, null, '79'), ('192', 'Singapour', '0', 'RADIO', null, null, '79'), ('193', 'Logitech', '0', 'RADIO', null, null, '80'), ('194', 'Credit Suisse', '0', 'RADIO', null, null, '80'), ('195', 'Vaudoise Assurance', '0', 'RADIO', null, null, '80'), ('196', 'Ikea', '1', 'RADIO', null, null, '80'), ('197', 'Lotus', '0', 'RADIO', null, null, '81'), ('198', 'Apple', '0', 'RADIO', null, null, '81'), ('199', 'Samsung', '0', 'RADIO', null, null, '81'), ('200', 'Losinger Marazzi', '0', 'RADIO', null, null, '81'), ('201', 'Nike ', '0', 'RADIO', null, null, '82'), ('202', 'Adidas', '1', 'RADIO', null, null, '82'), ('203', 'Jacques SÃ©guÃ©la', '1', 'FREE', null, null, '83'), ('204', 'Microsoft', '0', 'RADIO', null, null, '84'), ('205', 'Beats by Dr Dre', '0', 'RADIO', null, null, '84'), ('206', 'Spotify', '0', 'RADIO', null, null, '84'), ('207', 'Apple', '0', 'RADIO', null, null, '84'), ('208', '', '0', 'FREE', null, null, '86'), ('209', 'Oui', '0', 'RADIO', null, null, '87'), ('210', 'Non', '0', 'RADIO', null, null, '87'), ('211', 'Cyril Hirschi', '0', null, null, null, '83');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `contacts`
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES ('1', '2014-09-26 12:27:53', 'werfwerfwe', 'cyril@hirschi.me', 'erf werfew rgfwerf'), ('2', '2014-09-26 12:28:10', 'werfwerfwe', 'cyril@hirschi.me', 'erf werfew rgfwerf'), ('3', '2014-11-02 11:40:42', 'Vincent', 'privetvincent@aol.com', 'YO');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `customers`
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES ('1', 'Cyril Hirschi', '', 'Av. des Mousquines 40', '1005', 'Lausanne', 'Suisse', '33213432020', 'cyril@hirschi.me', '', '2'), ('2', 'Question Me', 'poil', 'Av. de Mon-Repos 3', '1005', 'Lausanne', 'Suisse', '33213432020', 'cyril@3xw.ch', '', '2'), ('3', 'Svet Attitude', '3388', 'Rue de Bourg', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('4', 'Beauty Bar', '3279', 'Chauderon', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('5', 'Le Lido', '0911', 'Rue de Bourg', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('6', 'AquaParc', '74', 'Bla', '1', 'Le Bouveret', 'Suisse', '', '', '', '2'), ('7', 'Anatis Fitness Club', '8000', 'Q', '1', 'Cugy', 'Suisse', '', '', '', '2'), ('8', 'Bleu LÃ©zard', '666', 'Martherey', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('9', 'Delicieux', '5', 'Flon', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('10', 'Docteur Gab\'s', '21', 'De', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('11', 'EF', '900', 'Centrale', '3', 'Lausanne', 'Suisse', '', '', '', '2'), ('12', 'Amigo Taco', '13', 'Marterey', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('13', 'Badminton Malley', '111', 'a', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('14', 'Lostobject.ch', '312', 's', '1', 'Geneve', 'Suisse', '', '', '', '2'), ('15', 'Chris Diving Facial', '69', 'S', '2', 'Attalens', 'Suisse', '', '', '', '2'), ('16', 'Soho', '0000', '3', '1', 'Lausanne', 'Suisse', '', '', '', '2'), ('17', 'Fly Riviera', '810', 's', '3', 'Villeneuve', 'Suisse', '', '', '', '2'), ('18', 'HGuitare', '44', 'Tiv', '8', 'Lausanne', 'Suisse', '', '', '', '2'), ('19', 'The Great Escape', '2121', 'Rip', '2', 'Lausanne', 'Suisse', '', '', '', '1');
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
  `created` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `orders`
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES ('2', '2014-10-29 14:55:52', 'QuestionMe-29/10/14', '1', '25000', '25000', null, '2', '1'), ('5', '2014-10-30 16:47:49', 'AquaParc-30/10/14', '0', '10', '12', null, '6', '1'), ('6', '2014-11-01 17:22:47', 'Amigo Taco-01/11/14', '0', '6', '5', null, '12', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `profiles`
-- ----------------------------
BEGIN;
INSERT INTO `profiles` VALUES ('205', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '5'), ('206', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '5'), ('207', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '5'), ('208', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '5'), ('209', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '5'), ('210', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '5'), ('211', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '5');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `qdays`
-- ----------------------------
BEGIN;
INSERT INTO `qdays` VALUES ('14', '2014-10-30 01:00:00', '2014-10-31 12:00:00', '4', '4', '2', '1'), ('15', '2014-10-31 00:00:00', '2014-10-31 23:59:00', '5', '10', '3', '1'), ('16', '2014-11-01 00:00:00', '2014-11-02 00:00:00', '4', '4', '2', '1'), ('17', '2014-11-02 00:00:00', '2014-11-03 00:00:00', '4', '3', '1', '1'), ('18', '2014-11-03 00:00:00', '2014-11-04 00:00:00', '3', '3', '0', '1'), ('19', '2014-11-04 00:00:00', '2014-11-05 00:00:00', '2', '3', '0', '1'), ('20', '2014-11-05 00:00:00', '2014-11-06 00:00:00', '2', '2', '2', '1'), ('21', '2014-11-06 00:00:00', '2014-11-07 00:00:00', '4', '4', '2', '1'), ('22', '2014-11-08 00:00:00', '2014-11-09 00:00:00', '4', '4', '2', '1'), ('23', '2014-11-09 00:00:00', '2014-11-10 00:00:00', '4', '4', '2', '1'), ('24', '2014-11-07 00:00:00', '2014-11-08 00:00:00', '4', '4', '2', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `queries`
-- ----------------------------
BEGIN;
INSERT INTO `queries` VALUES ('7', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '=', '53'), ('8', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '=', '54'), ('11', 'Connais-tu AquaParc ?', 'Non', '=', '56'), ('12', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '=', '57'), ('13', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '=', '58'), ('15', 'Connais-tu AquaParc ?', 'Oui, jâ€™y suis dÃ©jÃ  allÃ©', '=', '60'), ('16', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '=', '60'), ('19', 'Connais-tu AquaParc ?', 'Non', '=', '61'), ('20', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '=', '62'), ('22', 'Connais-tu AquaParc ?', 'Non', '=', '63'), ('23', 'Connais-tu AquaParc ?', 'Oui, mais je nâ€™y suis jamais allÃ©', '=', '65');
COMMIT;

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
INSERT INTO `question_types` VALUES ('2', 'Fixe'), ('3', 'Mobile');
COMMIT;

-- ----------------------------
--  Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `profile` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `media_type` varchar(45) DEFAULT NULL,
  `dependance_choice_id` int(11) DEFAULT NULL,
  `response_type` varchar(255) NOT NULL DEFAULT 'RADIO',
  `priority` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `to_age_start` date DEFAULT NULL,
  `to_age_end` date DEFAULT NULL,
  `to_gender` varchar(255) DEFAULT NULL,
  `question_type_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questions_question_types1_idx` (`question_type_id`),
  KEY `fk_questions_orders1_idx` (`order_id`),
  CONSTRAINT `fk_questions_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_question_types1` FOREIGN KEY (`question_type_id`) REFERENCES `question_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questions`
-- ----------------------------
BEGIN;
INSERT INTO `questions` VALUES ('48', 'Quel pays est le mieux membrÃ© ? ', null, '2014-10-30', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('49', 'Connais-tu AquaParc ?', '1', '2014-10-30', '/questions/medias/100-adrenaline-dia2-1.jpg', null, null, 'RADIO', null, '1', null, null, 'male', '3', '5'), ('52', 'Quel % de femmes utilisent des Sex Toy ? ', null, '2014-10-30', null, null, null, 'FREE', null, '1', null, null, null, '2', '2'), ('53', 'Quelles sont les meilleures attractions 100% adrÃ©naline ?', null, '2014-10-30', null, null, null, 'CHECKBOX', null, '1', null, null, null, '3', '5'), ('54', 'Concernant le tarif dâ€™AquaParc', null, '2014-10-30', null, null, null, 'RADIO', null, '1', null, null, null, '3', '5'), ('55', 'Avec quel pays la Suisse ne partage-t-elle pas de frontiÃ¨res ? ', null, '2014-10-30', null, null, null, 'CHECKBOX', null, '1', null, null, null, '2', '2'), ('56', 'Savais-tu que Aquaparc est ouvert toute lâ€™annÃ©e ?', null, '2014-10-30', null, null, null, 'RADIO', null, '1', null, null, null, '3', '5'), ('57', 'As-tu dÃ©jÃ  fait le nouveau toboggan Booster Loop ?', null, '2014-10-30', '/questions/medias/100-adrenaline-dia2-2.jpg', null, null, 'RADIO', null, '1', null, null, null, '3', '5'), ('58', 'Donnes-nous ton avis sur Aquaparc', null, '2014-10-30', null, null, null, 'FREE', null, '1', null, null, null, '3', '5'), ('59', 'Quelle est la capitale de la thaÃ¯lande ? ', null, '2014-10-30', '/questions/medias/photo-thailande-1.jpg', null, null, 'FREE', null, '1', null, null, null, '2', '2'), ('60', 'Comment-connais tu AquaParc ?', null, '2014-10-30', null, null, null, 'CHECKBOX', null, '1', null, null, null, '3', '5'), ('61', 'Selon toi AquaParc câ€™est', null, '2014-10-30', null, null, null, 'CHECKBOX', null, '1', null, null, null, '3', '5'), ('62', 'As-tu dÃ©jÃ  entendu parler du nouveau toboggan Booster Loop ?', null, '2014-10-30', '/questions/medias/100-adrenaline-dia2-3.jpg', null, null, 'RADIO', null, '1', null, null, null, '3', '5'), ('63', 'Quelles sont les attractions qui te font envie ?', null, '2014-10-30', null, null, null, 'CHECKBOX', null, '1', null, null, null, '3', '5'), ('64', 'Est-ce que tu comprends toutes nos questions ? ', null, '2014-10-30', '/questions/medias/2011-05-11-1.jpg', null, null, 'RADIO', null, '1', null, null, null, '3', '2'), ('65', 'Concernant le tarif dâ€™AquaParc', null, '2014-10-30', null, null, null, 'RADIO', null, '1', null, null, null, '3', '5'), ('69', 'L\'Ã©tÃ© tu es plutÃ´t:', null, '2014-11-01', null, null, null, 'CHECKBOX', null, '1', null, null, null, '2', '2'), ('70', 'Quelle est la taille moyenne du penis des Suisses ?', null, '2014-11-01', null, null, null, 'FREE', null, '1', null, null, null, '2', '2'), ('71', 'Quel pourcentage de femmes connaissent l\'orgasme par le point G', null, '2014-11-01', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('72', 'Un homme sur â€¦ est un Ã©jaculateur prÃ©coce', null, '2014-11-01', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('73', 'Quel pourcentage d\'hommes se masturbent au moins une fois par mois ?', null, '2014-11-01', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('74', 'Question SEX : Le matin ou le soir ?', null, '2014-11-02', null, null, null, 'CHECKBOX', null, '1', null, null, null, '2', '2'), ('75', 'Depuis quand la mini-jupe existe-t-elle ?', null, '2014-11-02', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('76', 'Pourquoi les gangsters portent-ils une cravate blanche ?', null, '2014-11-02', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('77', 'Combien de pays partagent une frontiÃ¨re avec la Suisse ?', null, '2014-11-03', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('78', 'Quel est la montagne la plus haute de Suisse ?', null, '2014-11-03', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('79', 'Quel est le plus petit pays du monde ?', null, '2014-11-03', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('80', 'Qui a rÃ©cemment lancÃ© la pub \"Book Book\" ', null, '2014-11-04', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('81', 'Pour quel pub un pÃ¨re de famille ne fait que rÃ©pÃ©ter \"Emma...\"', null, '2014-11-04', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('82', 'Le slogan \"Impossible is nothing\", c\'est de qui ? ', null, '2014-11-04', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('83', 'Comment s\'appelle le fondateur du groupe Havas ? ', null, '2014-11-05', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('84', 'Pour quelle PUB l\'animateur Jimmy Fallon et le chanteur Justin Timberlake ont-ils prÃªtÃ©s leur voix ? ', null, '2014-11-05', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('86', 'I\'m Lovin it, Ã§a te fait penser Ã ...', null, '2014-11-06', null, null, null, 'FREE', null, '1', null, null, null, '2', '2'), ('87', 'Manges-tu du lapin ?', '1', '2014-11-05', null, null, null, 'RADIO', null, '1', null, null, null, '2', '2'), ('88', 'Test user value', '0', '2014-11-06', null, null, null, 'RADIO', null, '1', '1975-01-01', '1996-09-01', '', '2', '6');
COMMIT;

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
--  Records of `questions_regions`
-- ----------------------------
BEGIN;
INSERT INTO `questions_regions` VALUES ('52', '1'), ('87', '1');
COMMIT;

-- ----------------------------
--  Table structure for `qweeks`
-- ----------------------------
DROP TABLE IF EXISTS `qweeks`;
CREATE TABLE `qweeks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_qweeks_regions1_idx` (`region_id`),
  CONSTRAINT `fk_qweeks_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `qweeks`
-- ----------------------------
BEGIN;
INSERT INTO `qweeks` VALUES ('2', '2014-11-03', '2014-11-07', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_vouchers`
-- ----------------------------
BEGIN;
INSERT INTO `user_vouchers` VALUES ('79', '2014-11-05 10:49:32', '2014-11-05 10:50:29', '11', '5'), ('80', '2014-11-06 10:54:35', null, '12', '5'), ('81', '2014-11-05 12:06:28', null, '11', '5'), ('82', '2014-11-05 13:14:54', null, '11', '5'), ('83', '2014-11-05 16:06:00', null, '11', '5'), ('84', '2014-11-05 16:07:52', null, '11', '5'), ('85', '2014-11-05 16:39:21', null, '11', '5'), ('86', '2014-11-05 18:09:11', null, '11', '5'), ('87', '2014-11-05 18:18:33', null, '11', '5'), ('88', '2014-11-05 18:20:23', null, '11', '5'), ('89', '2014-11-09 15:33:55', null, '16', '5');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(255) NOT NULL DEFAULT 'male',
  `email` varchar(255) NOT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_groups1_idx` (`group_id`),
  KEY `fk_users_regions1_idx` (`region_id`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_regions1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', null, 'admin', '$2a$10$ikSV938S.AY9s.yZZSpKgum6QfNEBT1gRGhiJ5RNgH8BHMSOxcrRK', '2014-09-29', 'male', 'admin@questionme.ch', null, null, '1', '1'), ('3', null, 'antoine', '$2a$10$2kdXU0zFSS4/ZBtgDpxAiOh.2Ahd/.AP0Tn.NKc6MINBl69qbfrqi', '1988-05-02', 'male', 'antoine@3xw.ch', null, null, '2', '1'), ('5', null, 'cyril', '$2a$10$vtAUqNHe6Xp6lDEI0xzS6OzjPu7Z9bowUpQJAyD5FEnS2RhpJCwOm', '1991-02-01', 'male', 'cyril@3xw.ch', null, null, '2', '1'), ('6', null, 'lapin', '$2a$10$jQ15/9XUb.fdmspya2dMPe3k/Pr2mBrQzRnCgqQjtpXlWO/AYMqt6', '1991-05-04', 'male', 'cyril@hirschi.me', null, null, '2', '1'), ('7', null, 'eniotna', '$2a$10$Za8Wi6fFYCcC/bxhux/caef7W96gcMt4Mw13VegKykM8EkZp2e1Ra', '1994-03-30', 'male', 'antoine@questionme.ch', null, null, '2', '1'), ('9', null, 'sales', '$2a$10$Hk1ZH7zn1q5vkHQuDonphOTGyMEUvrKSxxZaPAn.nx81nbfBDXVDK', '1996-01-01', 'male', 'cyril.hirschi@bluewin.ch', null, null, '2', '1'), ('11', null, 'vincent', '$2a$10$VplwY4Bf3156SQZkcTiFYuBNGhk.t4htGE3glfPtfnDsCKoGOr0QC', '1993-01-22', 'male', 'vincent@questionme.ch', null, null, '2', '1'), ('12', null, 'dadada', '$2a$10$hDw8Y4uwRoM7FivEDGU/Kuv.bUkPUipxvpSfC4JvbZvIbTlWJi3F.', '1996-01-21', 'male', 'damien@3xw.ch', null, null, '2', '1'), ('13', null, 'benjamin', '$2a$10$zCnGWO0q6Ff3pfIP7/FgFunmtWsjh1Iwv2zxRf9cGxDVwO893TjSW', '1991-11-05', 'male', 'benjamin@questionme.ch', null, null, '2', '1'), ('14', null, 'lamentin', '$2a$10$zO0e.Dxaz9ng.FdTZxImg.Qzh1ek/MTbh.njBk7LSdBF.7fhnAh8C', '1980-04-09', 'male', 'peros.joseph@gmail.com', null, null, '2', '1'), ('15', null, 'JenCH', '$2a$10$ZwNrJLDvRsanjB06K7kp.ubgkprBFVwcNMCCFQqFtUAq0.5K6sJo.', '1987-08-12', 'male', 'aye.captainjimbob@gmail.com', null, null, '2', '1'), ('16', null, 'hug2o', '$2a$10$rs7vrKnnRfDxHwroqmCohuV4NvU/yj6kGfO9BdEqYjgSbqQNGIoLK', '1990-02-01', 'male', 'hugo_denogent@hotmail.com', null, null, '2', '1'), ('17', null, 'Laura', '$2a$10$yulj0yI/d9kpeCifU4ZGZ.Lg2SPZFhLnj/HqeTf2SXLaryy5LtA4W', '1992-04-18', 'male', 'laaurinette@hotmail.fr', null, null, '2', '1'), ('18', null, 'YOYOYO', '$2a$10$SLEA2WCFLIpz2Tody6T5PuTSVbXHdbpHGICGBq5GDo57699k69bzi', '1996-02-02', 'male', 'fdsafsda@fdsafsd.com', null, null, '2', '1'), ('19', null, 'hello', '$2a$10$mTl2o7nx2v.kdyiPkq8dLuQMdOTjV6zuJSwBMjYoJXUcyGZx7F4BG', '1996-02-02', 'male', 'a@aol.com', null, null, '2', '1'), ('20', null, 'Fakemail', '$2a$10$Hyo15JePxiFhGpAwJhJ7.egFoIm5RLiwWa9WFgu1DpLNFNDhUFTru', '1996-01-01', 'male', 'fakemail@fake.ch', null, null, '2', '1'), ('21', null, 'kiddepaddle', '$2a$10$pPaU3vqO7s.nXAem6s9KSebQMCT.dpRDElHXgllJkkqVIMM0gM/U6', '1991-12-02', 'male', 'bham.tur@gmail.com', null, null, '2', '1');
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
  `question_id` int(11) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`choice_id`,`user_id`),
  KEY `fk_users_choices_choices1_idx` (`choice_id`),
  KEY `fk_users_choices_users1_idx` (`user_id`),
  KEY `fk_users_choices_questions1_idx` (`question_id`),
  KEY `fk_users_choices_question_types1_idx` (`question_type_id`),
  CONSTRAINT `fk_users_choices_choices1` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_choices_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_choices_question_types1` FOREIGN KEY (`question_type_id`) REFERENCES `question_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_choices_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1037 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users_choices`
-- ----------------------------
BEGIN;
INSERT INTO `users_choices` VALUES ('1031', '2014-11-06 18:12:57', null, '154', '5', '64', '3'), ('1032', '2014-11-06 18:13:01', null, '158', '5', '65', '3'), ('1033', '2014-11-06 18:13:05', null, '146', '5', '62', '3'), ('1034', '2014-11-06 18:13:08', 'we', '208', '5', '86', '2'), ('1035', '2014-11-06 18:13:13', null, '135', '5', '60', '3'), ('1036', '2014-11-06 18:13:13', null, '136', '5', '60', '3');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `vouchers`
-- ----------------------------
BEGIN;
INSERT INTO `vouchers` VALUES ('7', '2014-11-01', '/img/vouchers/LaisBazaar2-1-1.jpg', '50% sur un bapteme de plongÃ©e', 'BlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablablaBlablabla.\r\nBlablablaBlablablaBlablablaBlablabla.\r\nBlablablaBlablabla.', '2015-05-31', '- Avoir un certificat mÃ©dical\r\n- Minimum 10 ans\r\n- Reservation au 021 784 84 75', '15'), ('8', '2014-11-02', '/img/vouchers/new-logo-bla-1.jpg', 'Une heure de Badminton Ã  10.-', '', '2014-11-02', '- Utilisation du lundi au vendredi\r\n- 8h - 11h30 et 13h - 17h\r\n- Reservation 083 758 82 91\r\n- Bisous <3', '13'), ('9', '2014-11-03', '/img/vouchers/svetlana_small-480x360-1-1.jpg', 'Un cours Qi Gong pour 10.-', 'Be ready, be proud', '2014-11-02', '', '3'), ('10', '2014-11-04', '/img/vouchers/HP_Stage_1CD-1-1.jpg', 'Aujourd\'hui gagne 15% sur les sÃ©jours linguistiques', '', '2014-11-30', 'A utiliser sur les destinations suivante : iran, irak, syrie, ouzbekistan\r\n', '11'), ('11', '2014-11-05', '/img/vouchers/lostandfound1-1-1.png', 'Un Hello Pack Ã  35.-', 'au lieu de 55.-', '2014-11-08', 'Dans la limite des stocks disponibles\r\nNon-cumulable\r\n', '14'), ('12', '2014-11-06', '/img/vouchers/pole-dance-1-1.jpg', 'Une prestation spechiale Ã  50.-', 'DÃ©tends-toi !', '2014-11-10', '', '3'), ('13', '2014-11-07', '/img/vouchers/7645750-82c16227bf97e20c15a88069e07027f0-1-1.jpg', 'Une entrÃ©e AquaParc Ã  29.-', 'Valeur de 49.-', '2014-11-09', '', '6'), ('14', '2014-11-08', '/img/vouchers/5473-thickbox_default-1-1.jpg', '50% Chez DÃ©licieux Street Store', 'Bon cumulable avec les soldes actuels', '2014-11-18', '', '9'), ('16', '2014-11-09', '/img/vouchers/img-mykki-blanco-video_114000166774site-1230x695-1.png', 'Une journÃ©e offerte pour une visite rue de Geneve', '', '2014-11-13', '', '4');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
