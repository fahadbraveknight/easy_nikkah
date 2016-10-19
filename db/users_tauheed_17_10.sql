/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : easy_nikah

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-17 23:30:16
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `user_namaz_type` enum('regular','sometime','friday') NOT NULL DEFAULT 'regular',
  `user_fasting_type` enum('ramzan','ramzan_sunnah','ramzan_sunnah_nawafil') NOT NULL,
  `user_beard_type` enum('yes_sunnah','no_sunnah','no_beard') NOT NULL,
  `user_marital_status` enum('unmarried','divorced','widowed') NOT NULL,
  `user_children_status` enum('not_applicable','yes','no') NOT NULL,
  `user_no_of_children` varchar(11) DEFAULT NULL,
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
INSERT INTO `users` VALUES ('3', '0', 'fahad1', 'fahad.braveknight@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '1440280800', 'sdjasoidjasjdoasdoiasiodjasodjoasjdojasjdasojdasjdasoidjasoijdoasjdoa', '4\'12\"', 'sometime', 'ramzan', 'no_sunnah', 'divorced', 'not_applicable', null, '1', '1', '1', 'Pune Maharashtra india', 'Mumbai Maharashtra india', '1', 'Pune Maharashtra india', 'Mumbai Maharashtra india', '1', '2');
INSERT INTO `users` VALUES ('4', '0', 'adasd', 'fahad.braveknight+1@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '374454000', '', '', '', '', '', '', '', null, '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('5', '0', 'asdasd', 'fahad.braveknight+2@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '343004400', '', '', '', '', '', '', '', null, '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('6', '1', 'fahaad', 'fahad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '0', '', '', '', '', '', '', '', null, '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('7', '2000', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+21@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '845416800', '', '', '', '', '', '', '', null, '0', '0', '0', '', '', '0', '', '', '0', '0');
INSERT INTO `users` VALUES ('8', '2001', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+22@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '1161036000', 'I am awesome', '4\'2\"', 'sometime', 'ramzan_sunnah_nawafil', 'yes_sunnah', 'unmarried', '', null, '1', '1', '1', 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', '1', 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', '2', '2');
INSERT INTO `users` VALUES ('9', '2002', 'fahad Kheratkar', 'fahad.braveknight+121@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', '782175600', '', '', '', '', '', '', '', null, '0', '0', '0', '', '', '0', '', '', '0', '0');
