/*
Navicat MySQL Data Transfer

Source Server         : books
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hems

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-01-13 20:56:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `country_office`
-- ----------------------------
DROP TABLE IF EXISTS `country_office`;
CREATE TABLE `country_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country_office
-- ----------------------------
INSERT INTO `country_office` VALUES ('2', 'Accra Ghana', 'The Accra Ghana country office', '9', '2018-01-13 16:53:22', 'Active');

-- ----------------------------
-- Table structure for `implementing_partners`
-- ----------------------------
DROP TABLE IF EXISTS `implementing_partners`;
CREATE TABLE `implementing_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of implementing_partners
-- ----------------------------
INSERT INTO `implementing_partners` VALUES ('2', 'Ghana Health Service', 'kafjer@gmail.com', '261238927', 'Mrs Lucy Amegah', 'Osu Oxford street', 'Active', '9', '2018-01-13 18:53:55');

-- ----------------------------
-- Table structure for `programmes`
-- ----------------------------
DROP TABLE IF EXISTS `programmes`;
CREATE TABLE `programmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of programmes
-- ----------------------------
INSERT INTO `programmes` VALUES ('1', 'Building child-friendly schools', 'To ensure that the schools that a build are more child-friendly.', 'Active', '9', '2018-01-13 17:39:06');

-- ----------------------------
-- Table structure for `programmes_partners`
-- ----------------------------
DROP TABLE IF EXISTS `programmes_partners`;
CREATE TABLE `programmes_partners` (
  `programme_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of programmes_partners
-- ----------------------------
INSERT INTO `programmes_partners` VALUES ('1', '2');
