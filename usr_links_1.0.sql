/*
Navicat MySQL Data Transfer

Source Server         : books
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hems

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-01-15 09:01:31
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_links
-- ----------------------------
INSERT INTO `usr_links` VALUES ('2', '#', 'User Management', 'fa fa-users', '0', 'Active', null, 'user', '0');
INSERT INTO `usr_links` VALUES ('3', '../../views/users/add_user.php', 'Add User', 'fa fa-plus', '2', 'Active', 'add_user', 'user', '0');
INSERT INTO `usr_links` VALUES ('4', '../../views/users/list_users.php', 'List Users', 'fa fa-plus', '2', 'Active', 'list_users', 'user', '0');
INSERT INTO `usr_links` VALUES ('5', '../../views/users/user_category.php', 'User Category', 'fa fa-plus', '2', 'Active', 'usr_category', 'user', '0');
INSERT INTO `usr_links` VALUES ('6', '../../views/users/assign_privilege.php', 'Assign Privilege', 'fa fa-plus', '2', 'Active', 'assign_privilege', 'user', '0');
INSERT INTO `usr_links` VALUES ('7', '#', 'Settings ', 'fa fa-cog', '0', 'Active', null, 'settings', '1');
INSERT INTO `usr_links` VALUES ('8', '../../views/settings/country_office.php', 'Country Office', 'fa fa-plus', '7', 'Active', 'country_office', 'settings', '0');
INSERT INTO `usr_links` VALUES ('9', '../../views/settings/implementing_partners.php', 'Implementing Partners', 'fa fa-plus', '7', 'Active', 'implementing_partners', 'settings', '0');
INSERT INTO `usr_links` VALUES ('10', '../../views/settings/programmes.php', 'Programmes', 'fa fa-plus', '7', 'Active', 'programmes', 'settings', '0');
INSERT INTO `usr_links` VALUES ('11', '../../views/settings/assign_programmes_partners.php', 'Assign Programmes', 'fa fa-plus', '7', 'Active', 'assign_programme', 'settings', '0');
INSERT INTO `usr_links` VALUES ('12', '#', 'Projects Manager', 'fa fa-briefcase', '0', 'Active', null, 'project', '2');
INSERT INTO `usr_links` VALUES ('13', '../../views/projects/projects.php', 'Projects', 'fa fa-plus', '12', 'Active', 'project', 'project', '0');
