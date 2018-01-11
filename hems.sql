/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : hems

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-11 14:20:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `usr_cat`
-- ----------------------------
DROP TABLE IF EXISTS `usr_cat`;
CREATE TABLE `usr_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_cat
-- ----------------------------
INSERT INTO `usr_cat` VALUES ('1', 'Super User', 'Active');
INSERT INTO `usr_cat` VALUES ('2', 'Administrator', 'Active');

-- ----------------------------
-- Table structure for `usr_cat_links`
-- ----------------------------
DROP TABLE IF EXISTS `usr_cat_links`;
CREATE TABLE `usr_cat_links` (
  `cat_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`,`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_cat_links
-- ----------------------------
INSERT INTO `usr_cat_links` VALUES ('1', '1');
INSERT INTO `usr_cat_links` VALUES ('1', '2');
INSERT INTO `usr_cat_links` VALUES ('1', '3');
INSERT INTO `usr_cat_links` VALUES ('1', '4');

-- ----------------------------
-- Table structure for `usr_links`
-- ----------------------------
DROP TABLE IF EXISTS `usr_links`;
CREATE TABLE `usr_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(250) DEFAULT NULL,
  `link_name` varchar(200) DEFAULT NULL,
  `link_image` varchar(200) DEFAULT NULL,
  `link_parent` int(11) DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `page_id_sub` varchar(50) DEFAULT NULL,
  `page_id` varchar(50) DEFAULT NULL,
  `disp_order` int(10) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_links
-- ----------------------------
INSERT INTO `usr_links` VALUES ('2', '#', 'User Management', 'fa fa-users', '0', 'Active', null, 'user', '0');
INSERT INTO `usr_links` VALUES ('3', '../../views/users/add_user.php', 'Add User', 'fa fa-plus', '2', 'Active', 'add_user', 'user', '0');
INSERT INTO `usr_links` VALUES ('4', '../../views/users/list_users.php', 'List Users', 'fa fa-plus', '2', 'Active', 'list_users', 'user', '0');

-- ----------------------------
-- Table structure for `usr_users`
-- ----------------------------
DROP TABLE IF EXISTS `usr_users`;
CREATE TABLE `usr_users` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_cat` int(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_by` int(200) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(200) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fastSearch` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usr_users
-- ----------------------------
INSERT INTO `usr_users` VALUES ('1', 'Jude', 'Gyimah', 'jude.gyimah87@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'jude.gyimah87@gmail.com', '0267707714', '1', 'active', null, '0', '2018-01-11 12:11:34', null, null);

-- ----------------------------
-- Table structure for `usr_user_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `usr_user_login_log`;
CREATE TABLE `usr_user_login_log` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `login_ip` varchar(100) NOT NULL,
  `usr_session_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usr_user_login_log
-- ----------------------------
