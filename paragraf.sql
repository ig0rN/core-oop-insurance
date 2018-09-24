/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100132
Source Host           : localhost:3306
Source Database       : paragraf

Target Server Type    : MYSQL
Target Server Version : 100132
File Encoding         : 65001

Date: 2018-09-24 07:52:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for insurance_carrier
-- ----------------------------
DROP TABLE IF EXISTS `insurance_carrier`;
CREATE TABLE `insurance_carrier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for insured
-- ----------------------------
DROP TABLE IF EXISTS `insured`;
CREATE TABLE `insured` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `fk_ic` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ic_i` (`fk_ic`),
  CONSTRAINT `fk_ic_i` FOREIGN KEY (`fk_ic`) REFERENCES `insurance_carrier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
