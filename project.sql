/*
Navicat MySQL Data Transfer

Source Server         : books
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hems

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-01-15 09:24:10
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `partner_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `pmv` int(11) NOT NULL,
  `spot_check` int(11) NOT NULL,
  `audit` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', 'Goo Project', 'some description', '2', '1', '1', '1', '1', '2018-01-16', '12', '9', '2018-01-15 08:48:22', 'Active');
