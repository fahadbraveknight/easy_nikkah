/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : easy_nikah

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-05 23:47:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `age_groups`
-- ----------------------------
DROP TABLE IF EXISTS `age_groups`;
CREATE TABLE `age_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age_group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of age_groups
-- ----------------------------
INSERT INTO `age_groups` VALUES ('1', '(16-20)');
INSERT INTO `age_groups` VALUES ('2', '(20-24)');

-- ----------------------------
-- Table structure for `beard_types`
-- ----------------------------
DROP TABLE IF EXISTS `beard_types`;
CREATE TABLE `beard_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beard_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of beard_types
-- ----------------------------
INSERT INTO `beard_types` VALUES ('1', 'Yes Sunnah Beard');
INSERT INTO `beard_types` VALUES ('2', 'Yes but not as per Sunnah');
INSERT INTO `beard_types` VALUES ('3', 'No Beard');

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', '1', 'Mumbai');
INSERT INTO `cities` VALUES ('2', '1', 'Pune');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'india');

-- ----------------------------
-- Table structure for `fasting_types`
-- ----------------------------
DROP TABLE IF EXISTS `fasting_types`;
CREATE TABLE `fasting_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fasting_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fasting_types
-- ----------------------------
INSERT INTO `fasting_types` VALUES ('1', 'Only in Ramzan');
INSERT INTO `fasting_types` VALUES ('2', 'Ramzan & some Sunnah fasts');
INSERT INTO `fasting_types` VALUES ('3', 'Ramzan, some Sunnah & some Nawafil fasts');

-- ----------------------------
-- Table structure for `hijab_types`
-- ----------------------------
DROP TABLE IF EXISTS `hijab_types`;
CREATE TABLE `hijab_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hijab_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hijab_types
-- ----------------------------

-- ----------------------------
-- Table structure for `marital_status`
-- ----------------------------
DROP TABLE IF EXISTS `marital_status`;
CREATE TABLE `marital_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marital_status_name` varchar(255) NOT NULL,
  `marital_status_has_children` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marital_status
-- ----------------------------
INSERT INTO `marital_status` VALUES ('1', 'Unmarried', '0');
INSERT INTO `marital_status` VALUES ('2', 'Divorced', '1');
INSERT INTO `marital_status` VALUES ('3', 'Widowed', '0');

-- ----------------------------
-- Table structure for `namaz_types`
-- ----------------------------
DROP TABLE IF EXISTS `namaz_types`;
CREATE TABLE `namaz_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaz_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of namaz_types
-- ----------------------------
INSERT INTO `namaz_types` VALUES ('1', 'Regular 5 times a day');
INSERT INTO `namaz_types` VALUES ('2', 'Sometimes but not all 5 times');
INSERT INTO `namaz_types` VALUES ('3', 'Only Jumuah (Friday) prayer');

-- ----------------------------
-- Table structure for `professions`
-- ----------------------------
DROP TABLE IF EXISTS `professions`;
CREATE TABLE `professions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profession_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of professions
-- ----------------------------
INSERT INTO `professions` VALUES ('1', 'Doctor');
INSERT INTO `professions` VALUES ('2', 'Engineer');

-- ----------------------------
-- Table structure for `qualifications`
-- ----------------------------
DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of qualifications
-- ----------------------------
INSERT INTO `qualifications` VALUES ('1', 'S.S.C');
INSERT INTO `qualifications` VALUES ('2', 'H.S.C');

-- ----------------------------
-- Table structure for `states`
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES ('1', 'Maharashtra', '1');
INSERT INTO `states` VALUES ('2', 'Goa', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` bigint(20) NOT NULL,
  `user_personal_description` text NOT NULL,
  `user_height` varchar(255) NOT NULL,
  `user_namaz_type` int(11) NOT NULL,
  `user_fasting_type` int(11) NOT NULL,
  `user_beard_type` int(11) NOT NULL,
  `user_marital_status` int(11) NOT NULL,
  `user_children_status` enum('0','1','2') NOT NULL,
  `user_location_city` int(255) NOT NULL,
  `user_location_state` int(11) NOT NULL,
  `user_location_country` int(11) NOT NULL,
  `user_native_location` varchar(255) NOT NULL,
  `user_work_location` varchar(255) NOT NULL,
  `user_partner_age_group` int(11) NOT NULL,
  `user_partner_current_location` varchar(255) NOT NULL,
  `user_partner_native_location` varchar(255) NOT NULL,
  `user_qualification` int(11) NOT NULL,
  `user_profession` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', '0', 'fahad1', 'fahad.braveknight@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '1440280800', 'sdjasoidjasjdoasdoiasiodjasodjoasjdojasjdasojdasjdasoidjasoijdoasjdoa', '4\'12\"', '2', '1', '2', '2', '1', '1', '1', '1', 'Pune Maharashtra india', 'Mumbai Maharashtra india', '1', 'Pune Maharashtra india', 'Mumbai Maharashtra india', '1', '2');
INSERT INTO `users` VALUES ('4', '0', 'adasd', 'fahad.braveknight+1@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '374454000', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('5', '0', 'asdasd', 'fahad.braveknight+2@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '343004400', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('6', '1', 'fahaad', 'fahad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('7', '2000', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+21@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '845416800', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('8', '2001', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+22@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '1161036000', 'I am awesome', '4\'2\"', '2', '3', '1', '1', '0', '1', '1', '1', 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', '1', 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', '2', '2');
INSERT INTO `users` VALUES ('9', '2002', 'fahad Kheratkar', 'fahad.braveknight+121@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '782175600', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '0');

-- ----------------------------
-- Table structure for `user_has_contact_person`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_contact_person`;
CREATE TABLE `user_has_contact_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `contact_person_phone_no` int(11) NOT NULL,
  `contact_person_relation` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_has_contact_person
-- ----------------------------
INSERT INTO `user_has_contact_person` VALUES ('17', 'fahad', 'fahad/cpmasda', '2147483647', 'son', '3');
INSERT INTO `user_has_contact_person` VALUES ('18', 'tasneem', 'fahad/cpmasdaasdasd', '2147483647', 'mother', '3');
INSERT INTO `user_has_contact_person` VALUES ('19', 'Sajid', 'sajidark@ymail.com', '2147483647', 'father', '8');

-- ----------------------------
-- Table structure for `user_has_family`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_family`;
CREATE TABLE `user_has_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_member_name` varchar(255) NOT NULL,
  `family_member_relation` varchar(255) NOT NULL,
  `family_member_marital_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_has_family
-- ----------------------------
INSERT INTO `user_has_family` VALUES ('7', 'tasneem', 'mother', '2', '3');
INSERT INTO `user_has_family` VALUES ('8', 'tasneem', 'mother', '1', '8');

-- ----------------------------
-- Table structure for `user_has_partner_marital_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_partner_marital_statuses`;
CREATE TABLE `user_has_partner_marital_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_partner_marital_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_has_partner_marital_statuses
-- ----------------------------
INSERT INTO `user_has_partner_marital_statuses` VALUES ('17', '3', '2');
INSERT INTO `user_has_partner_marital_statuses` VALUES ('18', '3', '3');
INSERT INTO `user_has_partner_marital_statuses` VALUES ('21', '8', '3');
