/*
Navicat MySQL Data Transfer

Source Server         : books
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hems

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-03-21 18:47:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `pmv_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `pmv_sheet`;
CREATE TABLE `pmv_sheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(255) DEFAULT NULL,
  `risk_rating` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `outcome_area` varchar(255) DEFAULT NULL,
  `pmv` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pmv_sheet
-- ----------------------------
INSERT INTO `pmv_sheet` VALUES ('141', ' 2500215710', 'High', '7405.78', '06', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('142', ' 2500228493', 'High', '13734.65', '03', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('143', ' 2500211919', 'Low', '39501.07', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('144', ' 2500214414', 'Moderate', '3144.08', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('145', ' 2500234742', 'High', '16918.08', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('146', ' 2500234677', 'High', '20569.13', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('147', ' 2500235120', 'High', '19710.32', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('148', ' 2500214405', 'Moderate', '10276.67', '03', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('149', ' 2500214405', 'Moderate', '23452.78', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('150', ' 2500234741', 'High', '19819.34', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('151', ' 2500214411', 'Moderate', '18444.06', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('152', ' 2500214411', 'Moderate', '40177.72', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('153', ' 2500229708', 'Moderate', '141.77', '23', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('154', ' 2500238211', 'High', '9955.5', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('155', ' 2500235413', 'Significant', '13606.63', '03', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('156', ' 2500214477', 'Significant', '11092.7', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('157', ' 2500218648', 'Low', '19691.93', '01', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('158', ' 2500238193', 'High', '16682.51', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('159', ' 2500233470', 'Moderate', '9000.76', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('160', ' 2500225540', 'Significant', '14237.79', '22', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('161', ' 2500234935', 'High', '24409.94', '22', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('162', ' 2500211899', 'Moderate', '7955.1', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('163', ' 2500214422', 'Moderate', '2301.04', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('164', ' 2500211891', 'Significant', '5579.28', '21', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('165', ' 2500232257', 'Low', '6116.08', '03', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('166', ' 2500214471', 'Moderate', '7634.34', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('167', ' 2500234043', 'Moderate', '3967.44', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('168', ' 2500227450', 'Moderate', '21126.27', '07', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('169', ' 2500227450', 'Moderate', '121401.37', '25', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('170', ' 2500214459', 'Moderate', '10535.75', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('171', ' 2500234405', 'High', '55569.22', '21', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('172', ' 2500214445', 'High', '28823.42', '04', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('173', ' 2500214442', 'High', '1552.97', '04', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('174', ' 2500214400', 'Moderate', '18442.43', '04', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('175', ' 2500214399', 'Moderate', '50337.16', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('176', ' 2500214416', 'Moderate', '40355.63', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('177', ' 2500234574', 'High', '4285.43', '24', '1', 'Mar-2018', '2');
INSERT INTO `pmv_sheet` VALUES ('178', ' 2500233277', 'Moderate', '14694.87', '24', '1', 'Mar-2018', '2');

-- ----------------------------
-- Table structure for `pmv_sheet_trans`
-- ----------------------------
DROP TABLE IF EXISTS `pmv_sheet_trans`;
CREATE TABLE `pmv_sheet_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(255) DEFAULT NULL,
  `risk_rating` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `outcome_area` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `pmv` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pmv_sheet_trans
-- ----------------------------
INSERT INTO `pmv_sheet_trans` VALUES ('1', ' 2500215710', 'High', '7405.78', '06', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('2', ' 2500228493', 'High', '13734.65', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('3', ' 2500211919', 'Low', '39501.07', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('4', ' 2500214414', 'Moderate', '3144.08', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('5', ' 2500234742', 'High', '16918.08', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('6', ' 2500234677', 'High', '20569.13', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('7', ' 2500235120', 'High', '19710.32', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('8', ' 2500214405', 'Moderate', '10276.67', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('9', ' 2500214405', 'Moderate', '23452.78', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('10', ' 2500234741', 'High', '19819.34', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('11', ' 2500214411', 'Moderate', '18444.06', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('12', ' 2500214411', 'Moderate', '40177.72', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('13', ' 2500229708', 'Moderate', '141.77', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('14', ' 2500238211', 'High', '9955.5', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('15', ' 2500235413', 'Significant', '13606.63', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('16', ' 2500214477', 'Significant', '11092.7', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('17', ' 2500218648', 'Low', '19691.93', '01', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('18', ' 2500238193', 'High', '16682.51', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('19', ' 2500233470', 'Moderate', '9000.76', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('20', ' 2500225540', 'Significant', '14237.79', '22', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('21', ' 2500234935', 'High', '24409.94', '22', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('22', ' 2500211899', 'Moderate', '7955.1', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('23', ' 2500214422', 'Moderate', '2301.04', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('24', ' 2500211891', 'Significant', '5579.28', '21', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('25', ' 2500232257', 'Low', '6116.08', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('26', ' 2500214471', 'Moderate', '7634.34', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('27', ' 2500234043', 'Moderate', '3967.44', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('28', ' 2500227450', 'Moderate', '21126.27', '07', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('29', ' 2500227450', 'Moderate', '121401.37', '25', 'Jan-2018', '0', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('30', ' 2500214459', 'Moderate', '10535.75', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('31', ' 2500234405', 'High', '55569.22', '21', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('32', ' 2500214445', 'High', '28823.42', '04', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('33', ' 2500215710', 'High', '7405.78', '06', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('34', ' 2500228493', 'High', '13734.65', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('35', ' 2500211919', 'Low', '39501.07', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('36', ' 2500214414', 'Moderate', '3144.08', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('37', ' 2500234742', 'High', '16918.08', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('38', ' 2500234677', 'High', '20569.13', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('39', ' 2500235120', 'High', '19710.32', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('40', ' 2500214405', 'Moderate', '10276.67', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('41', ' 2500214405', 'Moderate', '23452.78', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('42', ' 2500234741', 'High', '19819.34', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('43', ' 2500214411', 'Moderate', '18444.06', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('44', ' 2500214411', 'Moderate', '40177.72', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('45', ' 2500229708', 'Moderate', '141.77', '23', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('46', ' 2500238211', 'High', '9955.5', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('47', ' 2500235413', 'Significant', '13606.63', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('48', ' 2500214477', 'Significant', '11092.7', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('49', ' 2500218648', 'Low', '19691.93', '01', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('50', ' 2500238193', 'High', '16682.51', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('51', ' 2500233470', 'Moderate', '9000.76', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('52', ' 2500225540', 'Significant', '14237.79', '22', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('53', ' 2500234935', 'High', '24409.94', '22', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('54', ' 2500211899', 'Moderate', '7955.1', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('55', ' 2500214422', 'Moderate', '2301.04', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('56', ' 2500211891', 'Significant', '5579.28', '21', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('57', ' 2500232257', 'Low', '6116.08', '03', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('58', ' 2500214471', 'Moderate', '7634.34', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('59', ' 2500234043', 'Moderate', '3967.44', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('60', ' 2500227450', 'Moderate', '21126.27', '07', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('61', ' 2500227450', 'Moderate', '121401.37', '25', 'Jan-2018', '0', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('62', ' 2500214459', 'Moderate', '10535.75', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('63', ' 2500234405', 'High', '55569.22', '21', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('64', ' 2500214445', 'High', '28823.42', '04', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('65', ' 2500214442', 'High', '1552.97', '04', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('66', ' 2500214400', 'Moderate', '18442.43', '04', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('67', ' 2500214399', 'Moderate', '50337.16', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('68', ' 2500214416', 'Moderate', '40355.63', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('69', ' 2500234574', 'High', '4285.43', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('70', ' 2500233277', 'Moderate', '14694.87', '24', 'Jan-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('71', ' 2500215710', 'High', '7405.78', '06', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('72', ' 2500228493', 'High', '13734.65', '03', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('73', ' 2500211919', 'Low', '39501.07', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('74', ' 2500214414', 'Moderate', '3144.08', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('75', ' 2500234742', 'High', '16918.08', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('76', ' 2500234677', 'High', '20569.13', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('77', ' 2500235120', 'High', '19710.32', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('78', ' 2500214405', 'Moderate', '10276.67', '03', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('79', ' 2500214405', 'Moderate', '23452.78', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('80', ' 2500234741', 'High', '19819.34', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('81', ' 2500214411', 'Moderate', '18444.06', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('82', ' 2500214411', 'Moderate', '40177.72', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('83', ' 2500229708', 'Moderate', '141.77', '23', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('84', ' 2500238211', 'High', '9955.5', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('85', ' 2500235413', 'Significant', '13606.63', '03', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('86', ' 2500214477', 'Significant', '11092.7', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('87', ' 2500218648', 'Low', '19691.93', '01', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('88', ' 2500238193', 'High', '16682.51', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('89', ' 2500233470', 'Moderate', '9000.76', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('90', ' 2500225540', 'Significant', '14237.79', '22', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('91', ' 2500234935', 'High', '24409.94', '22', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('92', ' 2500211899', 'Moderate', '7955.1', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('93', ' 2500214422', 'Moderate', '2301.04', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('94', ' 2500211891', 'Significant', '5579.28', '21', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('95', ' 2500232257', 'Low', '6116.08', '03', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('96', ' 2500214471', 'Moderate', '7634.34', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('97', ' 2500234043', 'Moderate', '3967.44', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('98', ' 2500227450', 'Moderate', '21126.27', '07', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('99', ' 2500227450', 'Moderate', '121401.37', '25', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('100', ' 2500214459', 'Moderate', '10535.75', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('101', ' 2500234405', 'High', '55569.22', '21', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('102', ' 2500214445', 'High', '28823.42', '04', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('103', ' 2500214442', 'High', '1552.97', '04', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('104', ' 2500214400', 'Moderate', '18442.43', '04', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('105', ' 2500214399', 'Moderate', '50337.16', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('106', ' 2500214416', 'Moderate', '40355.63', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('107', ' 2500234574', 'High', '4285.43', '24', 'Feb-2018', '1', '2');
INSERT INTO `pmv_sheet_trans` VALUES ('108', ' 2500233277', 'Moderate', '14694.87', '24', 'Feb-2018', '1', '2');

-- ----------------------------
-- Table structure for `spot_checks`
-- ----------------------------
DROP TABLE IF EXISTS `spot_checks`;
CREATE TABLE `spot_checks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(255) DEFAULT NULL,
  `risk_rating` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `spot_checks` int(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spot_checks
-- ----------------------------
INSERT INTO `spot_checks` VALUES ('463', ' 2500211909', 'Low', '31487.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('464', ' 2500214481', 'High', '4837.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('465', ' 2500234399', 'Low', '8373.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('466', ' 2500233550', 'Moderate', '1533.8', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('467', ' 2500234092', 'High', '3303.87', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('468', ' 2500236242', 'High', '5990.54', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('469', ' 2500234225', 'High', '7707.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('470', ' 2500233004', 'High', '5151.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('471', ' 2500236551', 'High', '31531.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('472', ' 2500234019', 'Moderate', '4751.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('473', ' 2500233998', 'High', '5887.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('474', ' 2500231250', 'Significant', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('475', ' 2500233580', 'High', '21011.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('476', ' 2500230476', 'High', '76248.15', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('477', ' 2500235477', 'High', '19899.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('478', ' 2500215708', 'High', '9205.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('479', ' 2500234473', 'Low', '37818.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('480', ' 2500215710', 'High', '22521.55', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('481', ' 2500234018', 'High', '6798.38', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('482', ' 2500217901', 'Low', '12195.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('483', ' 2500228493', 'High', '13734.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('484', ' 2500230993', 'Moderate', '39480.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('485', ' 2500223178', 'Significant', '44506.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('486', ' 2500214469', 'Moderate', '164112.59', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('487', ' 2500223744', 'Moderate', '140154.1', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('488', ' 2500214472', 'Significant', '40058.92', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('489', ' 2500224169', 'Moderate', '39595.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('490', ' 2500233572', 'Moderate', '27034.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('491', ' 2500211919', 'Low', '59353.26', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('492', ' 2500234017', 'High', '18200.91', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('493', ' 2500214414', 'Moderate', '14162.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('494', ' 2500221846', 'Moderate', '46361.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('495', ' 2500234798', 'High', '23254.46', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('496', ' 2500234742', 'High', '33571', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('497', ' 2500228753', 'Moderate', '67389.43', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('498', ' 2500234677', 'High', '60641.85', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('499', ' 2500214395', 'Moderate', '67294.33', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('500', ' 2500235120', 'High', '46734.77', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('501', ' 2500214405', 'Moderate', '179747.4', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('502', ' 2500214476', 'Moderate', '29016.79', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('503', ' 2500228754', 'Moderate', '56598.37', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('504', ' 2500234741', 'High', '19819.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('505', ' 2500214402', 'Significant', '36524.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('506', ' 2500214411', 'Moderate', '103830.78', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('507', ' 2500229708', 'Moderate', '27103.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('508', ' 2500238211', 'High', '9955.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('509', ' 2500234468', 'High', '13817.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('510', ' 2500235926', 'High', '23918.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('511', ' 2500231091', 'Moderate', '107798.38', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('512', ' 2500235413', 'Significant', '40546.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('513', ' 2500214477', 'Significant', '11092.7', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('514', ' 2500218648', 'Low', '34032.63', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('515', ' 2500238193', 'High', '16682.51', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('516', ' 2500233470', 'Moderate', '16957.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('517', ' 2500235543', 'High', '9902.9', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('518', ' 2500235601', 'High', '6791.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('519', ' 2500225268', 'Moderate', '8219', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('520', ' 2500226272', 'Moderate', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('521', ' 2500225540', 'Significant', '25015.05', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('522', ' 2500230636', 'High', '22009.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('523', ' 2500225275', 'Moderate', '5308.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('524', ' 2500234929', 'High', '9259.81', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('525', ' 2500234935', 'High', '29092.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('526', ' 2500234928', 'High', '7964.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('527', ' 2500211912', 'High', '43170.18', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('528', ' 2500225541', 'Significant', '8800.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('529', ' 2500226151', 'Moderate', '22345.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('530', ' 2500214412', 'Moderate', '37001.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('531', ' 2500214417', 'High', '35547.78', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('532', ' 2500211899', 'Moderate', '243276.3', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('533', ' 2500214422', 'Moderate', '99816.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('534', ' 2500234205', 'High', '8172.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('535', ' 2500214424', 'High', '32365.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('536', ' 2500214423', 'High', '25709.89', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('537', ' 2500211891', 'Significant', '161286.61', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks` VALUES ('538', ' 2500214475', 'Low', '27876.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('539', ' 2500214404', 'Low', '212669.11', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('540', ' 2500226152', 'Moderate', '23729.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('541', ' 2500214485', 'High', '3374.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('542', ' 2500235441', 'High', '11981.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('543', ' 2500214455', 'High', '17510.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('544', ' 2500234395', 'Moderate', '12843.12', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('545', ' 2500236023', 'High', '5345.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('546', ' 2500235422', 'Moderate', '29464.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('547', ' 2500237636', 'Significant', '32000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('548', ' 2500227876', 'Moderate', '90968.67', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('549', ' 2500234825', 'Moderate', '41826.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('550', ' 2500232257', 'Low', '39131.37', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('551', ' 2500235381', 'High', '14419.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('552', ' 2500228930', 'High', '5446.16', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('553', ' 2500235782', 'High', '5887.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('554', ' 2500214452', 'Moderate', '11035.24', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('555', ' 2500234000', 'High', '6315.75', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('556', ' 2500214471', 'Moderate', '39268.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('557', ' 2500233562', 'Moderate', '8750.48', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('558', ' 2500233459', 'High', '4620.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('559', ' 2500234043', 'Moderate', '8879.27', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('560', ' 2500227556', 'Moderate', '69122.13', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('561', ' 2500230855', 'Low', '37244.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('562', ' 2500234851', 'High', '9846.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('563', ' 2500237795', 'High', '11645.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('564', ' 2500214439', 'High', '18115.93', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('565', ' 2500214483', 'High', '24854.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('566', ' 2500227450', 'Moderate', '426380.88', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks` VALUES ('567', ' 2500226848', 'High', '24426.6', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('568', ' 2500230469', 'High', '852.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('569', ' 2500237987', 'High', '34708.02', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('570', ' 2500214459', 'Moderate', '101778.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('571', ' 2500233468', 'Moderate', '16088.11', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('572', ' 2500233999', 'High', '7702.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('573', ' 2500214454', 'Moderate', '29656.62', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('574', ' 2500234471', 'High', '14379.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('575', ' 2500235608', 'High', '3908.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('576', ' 2500237066', 'High', '24075.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('577', ' 2500214448', 'Moderate', '2800.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('578', ' 2500234405', 'High', '55569.22', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('579', ' 2500230365', 'High', '50770.92', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('580', ' 2500237946', 'High', '2199.49', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('581', ' 2500214473', 'High', '29302.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('582', ' 2500233549', 'Moderate', '2409.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('583', ' 2500230770', 'Low', '2811.88', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('584', ' 2500235544', 'Moderate', '39442.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('585', ' 2500237074', 'High', '81124.31', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('586', ' 2500237634', 'Low', '5000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('587', ' 2500234937', 'Moderate', '28294.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('588', ' 2500233996', 'High', '7251.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('589', ' 2500230992', 'High', '3494.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('590', ' 2500214444', 'Moderate', '10785.67', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('591', ' 2500221165', 'Moderate', '44120.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('592', ' 2500214445', 'High', '75710.7', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('593', ' 2500214442', 'High', '18262.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('594', ' 2500214400', 'Moderate', '50643.53', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('595', ' 2500214433', 'Low', '69862.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('596', ' 2500214431', 'High', '9063.25', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('597', ' 2500214482', 'Moderate', '3747.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('598', ' 2500214399', 'Moderate', '50337.16', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('599', ' 2500214416', 'Moderate', '73557.9', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('600', ' 2500214456', 'High', '51849.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('601', ' 2500227877', 'Low', '95155.95', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('602', ' 2500236267', 'Low', '54822.88', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks` VALUES ('603', ' 2500235435', 'High', '37893.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('604', ' 2500234574', 'High', '10699.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('605', ' 2500233583', 'Moderate', '3622.21', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('606', ' 2500222257', 'Moderate', '12006.64', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('607', ' 2500234091', 'Moderate', '13267.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('608', ' 2500234396', 'High', '11327.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('609', ' 2500233277', 'Moderate', '28534.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('610', ' 2500232639', 'Moderate', '32432.22', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('611', ' 2500236036', 'High', '10646.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('612', ' 2500234042', 'High', '2934.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('613', ' 2500234052', 'Moderate', '1139.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('614', ' 2500235835', 'High', '37612.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('615', ' 2500211901', 'High', '6991.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks` VALUES ('616', ' 2500214381', 'Moderate', '7500.96', 'Jan-2018', '0', '2');

-- ----------------------------
-- Table structure for `spot_checks_trans`
-- ----------------------------
DROP TABLE IF EXISTS `spot_checks_trans`;
CREATE TABLE `spot_checks_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(255) DEFAULT NULL,
  `risk_rating` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `spot_checks` int(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spot_checks_trans
-- ----------------------------
INSERT INTO `spot_checks_trans` VALUES ('1', ' 2500211909', 'Low', '31487.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('2', ' 2500214481', 'High', '4837.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('3', ' 2500234399', 'Low', '8373.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('4', ' 2500233550', 'Moderate', '1533.8', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('5', ' 2500234092', 'High', '3303.87', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('6', ' 2500236242', 'High', '5990.54', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('7', ' 2500234225', 'High', '7707.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('8', ' 2500233004', 'High', '5151.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('9', ' 2500236551', 'High', '31531.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('10', ' 2500234019', 'Moderate', '4751.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('11', ' 2500233998', 'High', '5887.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('12', ' 2500231250', 'Significant', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('13', ' 2500233580', 'High', '21011.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('14', ' 2500230476', 'High', '76248.15', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('15', ' 2500235477', 'High', '19899.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('16', ' 2500215708', 'High', '9205.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('17', ' 2500234473', 'Low', '37818.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('18', ' 2500215710', 'High', '22521.55', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('19', ' 2500234018', 'High', '6798.38', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('20', ' 2500217901', 'Low', '12195.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('21', ' 2500228493', 'High', '13734.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('22', ' 2500230993', 'Moderate', '39480.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('23', ' 2500223178', 'Significant', '44506.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('24', ' 2500214469', 'Moderate', '164112.59', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('25', ' 2500223744', 'Moderate', '140154.1', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('26', ' 2500214472', 'Significant', '40058.92', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('27', ' 2500224169', 'Moderate', '39595.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('28', ' 2500233572', 'Moderate', '27034.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('29', ' 2500211919', 'Low', '59353.26', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('30', ' 2500234017', 'High', '18200.91', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('31', ' 2500214414', 'Moderate', '14162.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('32', ' 2500221846', 'Moderate', '46361.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('33', ' 2500234798', 'High', '23254.46', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('34', ' 2500234742', 'High', '33571', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('35', ' 2500228753', 'Moderate', '67389.43', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('36', ' 2500234677', 'High', '60641.85', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('37', ' 2500214395', 'Moderate', '67294.33', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('38', ' 2500235120', 'High', '46734.77', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('39', ' 2500214405', 'Moderate', '179747.4', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('40', ' 2500214476', 'Moderate', '29016.79', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('41', ' 2500228754', 'Moderate', '56598.37', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('42', ' 2500234741', 'High', '19819.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('43', ' 2500214402', 'Significant', '36524.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('44', ' 2500214411', 'Moderate', '103830.78', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('45', ' 2500229708', 'Moderate', '27103.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('46', ' 2500238211', 'High', '9955.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('47', ' 2500234468', 'High', '13817.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('48', ' 2500235926', 'High', '23918.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('49', ' 2500231091', 'Moderate', '107798.38', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('50', ' 2500235413', 'Significant', '40546.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('51', ' 2500214477', 'Significant', '11092.7', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('52', ' 2500218648', 'Low', '34032.63', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('53', ' 2500238193', 'High', '16682.51', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('54', ' 2500233470', 'Moderate', '16957.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('55', ' 2500235543', 'High', '9902.9', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('56', ' 2500235601', 'High', '6791.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('57', ' 2500225268', 'Moderate', '8219', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('58', ' 2500226272', 'Moderate', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('59', ' 2500225540', 'Significant', '25015.05', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('60', ' 2500230636', 'High', '22009.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('61', ' 2500225275', 'Moderate', '5308.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('62', ' 2500234929', 'High', '9259.81', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('63', ' 2500234935', 'High', '29092.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('64', ' 2500234928', 'High', '7964.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('65', ' 2500211912', 'High', '43170.18', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('66', ' 2500225541', 'Significant', '8800.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('67', ' 2500226151', 'Moderate', '22345.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('68', ' 2500214412', 'Moderate', '37001.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('69', ' 2500214417', 'High', '35547.78', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('70', ' 2500211899', 'Moderate', '243276.3', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('71', ' 2500214422', 'Moderate', '99816.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('72', ' 2500234205', 'High', '8172.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('73', ' 2500214424', 'High', '32365.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('74', ' 2500214423', 'High', '25709.89', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('75', ' 2500211891', 'Significant', '161286.61', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('76', ' 2500214475', 'Low', '27876.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('77', ' 2500214404', 'Low', '212669.11', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('78', ' 2500226152', 'Moderate', '23729.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('79', ' 2500214485', 'High', '3374.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('80', ' 2500235441', 'High', '11981.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('81', ' 2500214455', 'High', '17510.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('82', ' 2500234395', 'Moderate', '12843.12', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('83', ' 2500236023', 'High', '5345.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('84', ' 2500235422', 'Moderate', '29464.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('85', ' 2500237636', 'Significant', '32000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('86', ' 2500227876', 'Moderate', '90968.67', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('87', ' 2500234825', 'Moderate', '41826.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('88', ' 2500232257', 'Low', '39131.37', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('89', ' 2500235381', 'High', '14419.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('90', ' 2500228930', 'High', '5446.16', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('91', ' 2500235782', 'High', '5887.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('92', ' 2500214452', 'Moderate', '11035.24', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('93', ' 2500234000', 'High', '6315.75', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('94', ' 2500214471', 'Moderate', '39268.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('95', ' 2500233562', 'Moderate', '8750.48', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('96', ' 2500233459', 'High', '4620.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('97', ' 2500234043', 'Moderate', '8879.27', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('98', ' 2500227556', 'Moderate', '69122.13', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('99', ' 2500230855', 'Low', '37244.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('100', ' 2500234851', 'High', '9846.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('101', ' 2500237795', 'High', '11645.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('102', ' 2500214439', 'High', '18115.93', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('103', ' 2500214483', 'High', '24854.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('104', ' 2500227450', 'Moderate', '426380.88', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('105', ' 2500226848', 'High', '24426.6', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('106', ' 2500230469', 'High', '852.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('107', ' 2500237987', 'High', '34708.02', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('108', ' 2500214459', 'Moderate', '101778.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('109', ' 2500233468', 'Moderate', '16088.11', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('110', ' 2500233999', 'High', '7702.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('111', ' 2500214454', 'Moderate', '29656.62', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('112', ' 2500234471', 'High', '14379.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('113', ' 2500235608', 'High', '3908.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('114', ' 2500237066', 'High', '24075.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('115', ' 2500214448', 'Moderate', '2800.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('116', ' 2500234405', 'High', '55569.22', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('117', ' 2500230365', 'High', '50770.92', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('118', ' 2500237946', 'High', '2199.49', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('119', ' 2500214473', 'High', '29302.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('120', ' 2500233549', 'Moderate', '2409.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('121', ' 2500230770', 'Low', '2811.88', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('122', ' 2500235544', 'Moderate', '39442.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('123', ' 2500237074', 'High', '81124.31', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('124', ' 2500237634', 'Low', '5000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('125', ' 2500234937', 'Moderate', '28294.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('126', ' 2500233996', 'High', '7251.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('127', ' 2500230992', 'High', '3494.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('128', ' 2500214444', 'Moderate', '10785.67', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('129', ' 2500221165', 'Moderate', '44120.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('130', ' 2500214445', 'High', '75710.7', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('131', ' 2500214442', 'High', '18262.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('132', ' 2500214400', 'Moderate', '50643.53', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('133', ' 2500214433', 'Low', '69862.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('134', ' 2500214431', 'High', '9063.25', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('135', ' 2500214482', 'Moderate', '3747.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('136', ' 2500214399', 'Moderate', '50337.16', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('137', ' 2500214416', 'Moderate', '73557.9', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('138', ' 2500214456', 'High', '51849.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('139', ' 2500227877', 'Low', '95155.95', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('140', ' 2500236267', 'Low', '54822.88', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('141', ' 2500235435', 'High', '37893.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('142', ' 2500234574', 'High', '10699.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('143', ' 2500233583', 'Moderate', '3622.21', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('144', ' 2500222257', 'Moderate', '12006.64', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('145', ' 2500234091', 'Moderate', '13267.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('146', ' 2500234396', 'High', '11327.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('147', ' 2500233277', 'Moderate', '28534.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('148', ' 2500232639', 'Moderate', '32432.22', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('149', ' 2500236036', 'High', '10646.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('150', ' 2500234042', 'High', '2934.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('151', ' 2500234052', 'Moderate', '1139.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('152', ' 2500235835', 'High', '37612.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('153', ' 2500211901', 'High', '6991.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('154', ' 2500214381', 'Moderate', '7500.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('155', ' 2500211909', 'Low', '31487.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('156', ' 2500214481', 'High', '4837.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('157', ' 2500234399', 'Low', '8373.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('158', ' 2500233550', 'Moderate', '1533.8', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('159', ' 2500234092', 'High', '3303.87', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('160', ' 2500236242', 'High', '5990.54', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('161', ' 2500234225', 'High', '7707.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('162', ' 2500233004', 'High', '5151.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('163', ' 2500236551', 'High', '31531.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('164', ' 2500234019', 'Moderate', '4751.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('165', ' 2500233998', 'High', '5887.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('166', ' 2500231250', 'Significant', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('167', ' 2500233580', 'High', '21011.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('168', ' 2500230476', 'High', '76248.15', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('169', ' 2500235477', 'High', '19899.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('170', ' 2500215708', 'High', '9205.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('171', ' 2500234473', 'Low', '37818.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('172', ' 2500215710', 'High', '22521.55', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('173', ' 2500234018', 'High', '6798.38', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('174', ' 2500217901', 'Low', '12195.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('175', ' 2500228493', 'High', '13734.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('176', ' 2500230993', 'Moderate', '39480.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('177', ' 2500223178', 'Significant', '44506.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('178', ' 2500214469', 'Moderate', '164112.59', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('179', ' 2500223744', 'Moderate', '140154.1', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('180', ' 2500214472', 'Significant', '40058.92', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('181', ' 2500224169', 'Moderate', '39595.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('182', ' 2500233572', 'Moderate', '27034.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('183', ' 2500211919', 'Low', '59353.26', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('184', ' 2500234017', 'High', '18200.91', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('185', ' 2500214414', 'Moderate', '14162.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('186', ' 2500221846', 'Moderate', '46361.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('187', ' 2500234798', 'High', '23254.46', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('188', ' 2500234742', 'High', '33571', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('189', ' 2500228753', 'Moderate', '67389.43', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('190', ' 2500234677', 'High', '60641.85', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('191', ' 2500214395', 'Moderate', '67294.33', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('192', ' 2500235120', 'High', '46734.77', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('193', ' 2500214405', 'Moderate', '179747.4', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('194', ' 2500214476', 'Moderate', '29016.79', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('195', ' 2500228754', 'Moderate', '56598.37', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('196', ' 2500234741', 'High', '19819.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('197', ' 2500214402', 'Significant', '36524.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('198', ' 2500214411', 'Moderate', '103830.78', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('199', ' 2500229708', 'Moderate', '27103.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('200', ' 2500238211', 'High', '9955.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('201', ' 2500234468', 'High', '13817.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('202', ' 2500235926', 'High', '23918.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('203', ' 2500231091', 'Moderate', '107798.38', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('204', ' 2500235413', 'Significant', '40546.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('205', ' 2500214477', 'Significant', '11092.7', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('206', ' 2500218648', 'Low', '34032.63', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('207', ' 2500238193', 'High', '16682.51', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('208', ' 2500233470', 'Moderate', '16957.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('209', ' 2500235543', 'High', '9902.9', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('210', ' 2500235601', 'High', '6791.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('211', ' 2500225268', 'Moderate', '8219', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('212', ' 2500226272', 'Moderate', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('213', ' 2500225540', 'Significant', '25015.05', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('214', ' 2500230636', 'High', '22009.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('215', ' 2500225275', 'Moderate', '5308.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('216', ' 2500234929', 'High', '9259.81', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('217', ' 2500234935', 'High', '29092.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('218', ' 2500234928', 'High', '7964.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('219', ' 2500211912', 'High', '43170.18', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('220', ' 2500225541', 'Significant', '8800.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('221', ' 2500226151', 'Moderate', '22345.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('222', ' 2500214412', 'Moderate', '37001.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('223', ' 2500214417', 'High', '35547.78', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('224', ' 2500211899', 'Moderate', '243276.3', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('225', ' 2500214422', 'Moderate', '99816.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('226', ' 2500234205', 'High', '8172.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('227', ' 2500214424', 'High', '32365.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('228', ' 2500214423', 'High', '25709.89', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('229', ' 2500211891', 'Significant', '161286.61', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('230', ' 2500214475', 'Low', '27876.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('231', ' 2500214404', 'Low', '212669.11', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('232', ' 2500226152', 'Moderate', '23729.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('233', ' 2500214485', 'High', '3374.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('234', ' 2500235441', 'High', '11981.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('235', ' 2500214455', 'High', '17510.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('236', ' 2500234395', 'Moderate', '12843.12', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('237', ' 2500236023', 'High', '5345.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('238', ' 2500235422', 'Moderate', '29464.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('239', ' 2500237636', 'Significant', '32000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('240', ' 2500227876', 'Moderate', '90968.67', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('241', ' 2500234825', 'Moderate', '41826.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('242', ' 2500232257', 'Low', '39131.37', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('243', ' 2500235381', 'High', '14419.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('244', ' 2500228930', 'High', '5446.16', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('245', ' 2500235782', 'High', '5887.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('246', ' 2500214452', 'Moderate', '11035.24', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('247', ' 2500234000', 'High', '6315.75', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('248', ' 2500214471', 'Moderate', '39268.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('249', ' 2500233562', 'Moderate', '8750.48', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('250', ' 2500233459', 'High', '4620.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('251', ' 2500234043', 'Moderate', '8879.27', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('252', ' 2500227556', 'Moderate', '69122.13', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('253', ' 2500230855', 'Low', '37244.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('254', ' 2500234851', 'High', '9846.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('255', ' 2500237795', 'High', '11645.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('256', ' 2500214439', 'High', '18115.93', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('257', ' 2500214483', 'High', '24854.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('258', ' 2500227450', 'Moderate', '426380.88', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('259', ' 2500226848', 'High', '24426.6', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('260', ' 2500230469', 'High', '852.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('261', ' 2500237987', 'High', '34708.02', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('262', ' 2500214459', 'Moderate', '101778.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('263', ' 2500233468', 'Moderate', '16088.11', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('264', ' 2500233999', 'High', '7702.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('265', ' 2500214454', 'Moderate', '29656.62', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('266', ' 2500234471', 'High', '14379.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('267', ' 2500235608', 'High', '3908.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('268', ' 2500237066', 'High', '24075.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('269', ' 2500214448', 'Moderate', '2800.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('270', ' 2500234405', 'High', '55569.22', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('271', ' 2500230365', 'High', '50770.92', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('272', ' 2500237946', 'High', '2199.49', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('273', ' 2500214473', 'High', '29302.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('274', ' 2500233549', 'Moderate', '2409.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('275', ' 2500230770', 'Low', '2811.88', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('276', ' 2500235544', 'Moderate', '39442.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('277', ' 2500237074', 'High', '81124.31', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('278', ' 2500237634', 'Low', '5000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('279', ' 2500234937', 'Moderate', '28294.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('280', ' 2500233996', 'High', '7251.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('281', ' 2500230992', 'High', '3494.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('282', ' 2500214444', 'Moderate', '10785.67', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('283', ' 2500221165', 'Moderate', '44120.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('284', ' 2500214445', 'High', '75710.7', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('285', ' 2500214442', 'High', '18262.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('286', ' 2500214400', 'Moderate', '50643.53', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('287', ' 2500214433', 'Low', '69862.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('288', ' 2500214431', 'High', '9063.25', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('289', ' 2500214482', 'Moderate', '3747.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('290', ' 2500214399', 'Moderate', '50337.16', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('291', ' 2500214416', 'Moderate', '73557.9', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('292', ' 2500214456', 'High', '51849.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('293', ' 2500227877', 'Low', '95155.95', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('294', ' 2500236267', 'Low', '54822.88', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('295', ' 2500235435', 'High', '37893.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('296', ' 2500234574', 'High', '10699.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('297', ' 2500233583', 'Moderate', '3622.21', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('298', ' 2500222257', 'Moderate', '12006.64', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('299', ' 2500234091', 'Moderate', '13267.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('300', ' 2500234396', 'High', '11327.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('301', ' 2500233277', 'Moderate', '28534.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('302', ' 2500232639', 'Moderate', '32432.22', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('303', ' 2500236036', 'High', '10646.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('304', ' 2500234042', 'High', '2934.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('305', ' 2500234052', 'Moderate', '1139.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('306', ' 2500235835', 'High', '37612.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('307', ' 2500211901', 'High', '6991.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('308', ' 2500214381', 'Moderate', '7500.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('309', ' 2500211909', 'Low', '31487.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('310', ' 2500214481', 'High', '4837.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('311', ' 2500234399', 'Low', '8373.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('312', ' 2500233550', 'Moderate', '1533.8', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('313', ' 2500234092', 'High', '3303.87', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('314', ' 2500236242', 'High', '5990.54', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('315', ' 2500234225', 'High', '7707.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('316', ' 2500233004', 'High', '5151.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('317', ' 2500236551', 'High', '31531.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('318', ' 2500234019', 'Moderate', '4751.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('319', ' 2500233998', 'High', '5887.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('320', ' 2500231250', 'Significant', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('321', ' 2500233580', 'High', '21011.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('322', ' 2500230476', 'High', '76248.15', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('323', ' 2500235477', 'High', '19899.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('324', ' 2500215708', 'High', '9205.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('325', ' 2500234473', 'Low', '37818.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('326', ' 2500215710', 'High', '22521.55', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('327', ' 2500234018', 'High', '6798.38', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('328', ' 2500217901', 'Low', '12195.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('329', ' 2500228493', 'High', '13734.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('330', ' 2500230993', 'Moderate', '39480.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('331', ' 2500223178', 'Significant', '44506.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('332', ' 2500214469', 'Moderate', '164112.59', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('333', ' 2500223744', 'Moderate', '140154.1', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('334', ' 2500214472', 'Significant', '40058.92', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('335', ' 2500224169', 'Moderate', '39595.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('336', ' 2500233572', 'Moderate', '27034.31', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('337', ' 2500211919', 'Low', '59353.26', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('338', ' 2500234017', 'High', '18200.91', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('339', ' 2500214414', 'Moderate', '14162.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('340', ' 2500221846', 'Moderate', '46361.57', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('341', ' 2500234798', 'High', '23254.46', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('342', ' 2500234742', 'High', '33571', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('343', ' 2500228753', 'Moderate', '67389.43', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('344', ' 2500234677', 'High', '60641.85', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('345', ' 2500214395', 'Moderate', '67294.33', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('346', ' 2500235120', 'High', '46734.77', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('347', ' 2500214405', 'Moderate', '179747.4', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('348', ' 2500214476', 'Moderate', '29016.79', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('349', ' 2500228754', 'Moderate', '56598.37', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('350', ' 2500234741', 'High', '19819.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('351', ' 2500214402', 'Significant', '36524.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('352', ' 2500214411', 'Moderate', '103830.78', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('353', ' 2500229708', 'Moderate', '27103.03', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('354', ' 2500238211', 'High', '9955.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('355', ' 2500234468', 'High', '13817.39', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('356', ' 2500235926', 'High', '23918.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('357', ' 2500231091', 'Moderate', '107798.38', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('358', ' 2500235413', 'Significant', '40546.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('359', ' 2500214477', 'Significant', '11092.7', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('360', ' 2500218648', 'Low', '34032.63', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('361', ' 2500238193', 'High', '16682.51', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('362', ' 2500233470', 'Moderate', '16957.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('363', ' 2500235543', 'High', '9902.9', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('364', ' 2500235601', 'High', '6791.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('365', ' 2500225268', 'Moderate', '8219', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('366', ' 2500226272', 'Moderate', '1139.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('367', ' 2500225540', 'Significant', '25015.05', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('368', ' 2500230636', 'High', '22009.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('369', ' 2500225275', 'Moderate', '5308.97', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('370', ' 2500234929', 'High', '9259.81', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('371', ' 2500234935', 'High', '29092.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('372', ' 2500234928', 'High', '7964.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('373', ' 2500211912', 'High', '43170.18', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('374', ' 2500225541', 'Significant', '8800.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('375', ' 2500226151', 'Moderate', '22345.43', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('376', ' 2500214412', 'Moderate', '37001.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('377', ' 2500214417', 'High', '35547.78', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('378', ' 2500211899', 'Moderate', '243276.3', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('379', ' 2500214422', 'Moderate', '99816.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('380', ' 2500234205', 'High', '8172.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('381', ' 2500214424', 'High', '32365.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('382', ' 2500214423', 'High', '25709.89', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('383', ' 2500211891', 'Significant', '161286.61', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('384', ' 2500214475', 'Low', '27876.36', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('385', ' 2500214404', 'Low', '212669.11', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('386', ' 2500226152', 'Moderate', '23729.85', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('387', ' 2500214485', 'High', '3374.08', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('388', ' 2500235441', 'High', '11981.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('389', ' 2500214455', 'High', '17510.06', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('390', ' 2500234395', 'Moderate', '12843.12', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('391', ' 2500236023', 'High', '5345.5', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('392', ' 2500235422', 'Moderate', '29464.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('393', ' 2500237636', 'Significant', '32000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('394', ' 2500227876', 'Moderate', '90968.67', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('395', ' 2500234825', 'Moderate', '41826.72', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('396', ' 2500232257', 'Low', '39131.37', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('397', ' 2500235381', 'High', '14419.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('398', ' 2500228930', 'High', '5446.16', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('399', ' 2500235782', 'High', '5887.66', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('400', ' 2500214452', 'Moderate', '11035.24', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('401', ' 2500234000', 'High', '6315.75', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('402', ' 2500214471', 'Moderate', '39268.1', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('403', ' 2500233562', 'Moderate', '8750.48', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('404', ' 2500233459', 'High', '4620.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('405', ' 2500234043', 'Moderate', '8879.27', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('406', ' 2500227556', 'Moderate', '69122.13', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('407', ' 2500230855', 'Low', '37244.3', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('408', ' 2500234851', 'High', '9846.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('409', ' 2500237795', 'High', '11645.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('410', ' 2500214439', 'High', '18115.93', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('411', ' 2500214483', 'High', '24854.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('412', ' 2500227450', 'Moderate', '426380.88', 'Jan-2018', '2', '2');
INSERT INTO `spot_checks_trans` VALUES ('413', ' 2500226848', 'High', '24426.6', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('414', ' 2500230469', 'High', '852.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('415', ' 2500237987', 'High', '34708.02', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('416', ' 2500214459', 'Moderate', '101778.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('417', ' 2500233468', 'Moderate', '16088.11', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('418', ' 2500233999', 'High', '7702.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('419', ' 2500214454', 'Moderate', '29656.62', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('420', ' 2500234471', 'High', '14379.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('421', ' 2500235608', 'High', '3908.29', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('422', ' 2500237066', 'High', '24075.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('423', ' 2500214448', 'Moderate', '2800.34', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('424', ' 2500234405', 'High', '55569.22', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('425', ' 2500230365', 'High', '50770.92', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('426', ' 2500237946', 'High', '2199.49', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('427', ' 2500214473', 'High', '29302.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('428', ' 2500233549', 'Moderate', '2409.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('429', ' 2500230770', 'Low', '2811.88', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('430', ' 2500235544', 'Moderate', '39442.65', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('431', ' 2500237074', 'High', '81124.31', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('432', ' 2500237634', 'Low', '5000', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('433', ' 2500234937', 'Moderate', '28294.96', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('434', ' 2500233996', 'High', '7251.98', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('435', ' 2500230992', 'High', '3494.74', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('436', ' 2500214444', 'Moderate', '10785.67', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('437', ' 2500221165', 'Moderate', '44120.2', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('438', ' 2500214445', 'High', '75710.7', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('439', ' 2500214442', 'High', '18262.53', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('440', ' 2500214400', 'Moderate', '50643.53', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('441', ' 2500214433', 'Low', '69862.82', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('442', ' 2500214431', 'High', '9063.25', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('443', ' 2500214482', 'Moderate', '3747.19', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('444', ' 2500214399', 'Moderate', '50337.16', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('445', ' 2500214416', 'Moderate', '73557.9', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('446', ' 2500214456', 'High', '51849.99', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('447', ' 2500227877', 'Low', '95155.95', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('448', ' 2500236267', 'Low', '54822.88', 'Jan-2018', '1', '2');
INSERT INTO `spot_checks_trans` VALUES ('449', ' 2500235435', 'High', '37893.13', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('450', ' 2500234574', 'High', '10699.07', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('451', ' 2500233583', 'Moderate', '3622.21', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('452', ' 2500222257', 'Moderate', '12006.64', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('453', ' 2500234091', 'Moderate', '13267.35', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('454', ' 2500234396', 'High', '11327.45', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('455', ' 2500233277', 'Moderate', '28534.76', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('456', ' 2500232639', 'Moderate', '32432.22', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('457', ' 2500236036', 'High', '10646.28', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('458', ' 2500234042', 'High', '2934.17', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('459', ' 2500234052', 'Moderate', '1139.86', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('460', ' 2500235835', 'High', '37612.73', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('461', ' 2500211901', 'High', '6991.52', 'Jan-2018', '0', '2');
INSERT INTO `spot_checks_trans` VALUES ('462', ' 2500214381', 'Moderate', '7500.96', 'Jan-2018', '0', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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
INSERT INTO `usr_links` VALUES ('12', '#', 'Activity Manager', 'fa fa-briefcase', '0', 'Active', null, 'project', '2');
INSERT INTO `usr_links` VALUES ('13', '../../views/projects/projects.php', 'Activity', 'fa fa-plus', '12', 'Active', 'project', 'project', '0');
INSERT INTO `usr_links` VALUES ('14', '../../views/settings/outcomes.php', 'Outcome', 'fa fa-plus', '7', 'Active', 'outcome', 'settings', '0');
INSERT INTO `usr_links` VALUES ('15', '../../views/settings/output.php', 'Output', 'fa fa-plus', '7', 'Active', 'output', 'settings', '0');
INSERT INTO `usr_links` VALUES ('16', '../../views/projects/add_pmv_excel.php', 'Import PMV', 'fa fa-plus', '18', 'Active', 'excel', 'pmv', '0');
INSERT INTO `usr_links` VALUES ('17', '../../views/projects/find_project.php', 'Find Activity', 'fa fa-plus', '12', 'Active', 'find_activity', 'project', '0');
INSERT INTO `usr_links` VALUES ('18', '#', 'PMV', 'fa fa-file-pdf-o', '0', 'Active', 'pmv', 'pmv', '0');
INSERT INTO `usr_links` VALUES ('19', '../../views/projects/approve_pmv.php', 'Approve PMV', 'fa fa-plus', '18', 'Active', 'pmv', 'appr_pmv', '0');
INSERT INTO `usr_links` VALUES ('20', '../../views/projects/validate_pmv.php', 'Validate PMV', 'fa fa-plus', '18', 'Active', 'pmv', 'val_pmv', '0');
INSERT INTO `usr_links` VALUES ('21', '#', 'Reports', 'fa fa-building', '0', 'Active', 'reports', 'reports', '0');
INSERT INTO `usr_links` VALUES ('22', '../../views/reports/total_pmvs.php', 'Total Reports', 'fa fa-plus', '21', 'Active', 'total_reports', 'reports', '0');
INSERT INTO `usr_links` VALUES ('23', '../../views/projects/view_pmv_excel.php', 'View PMV Import', 'fa fa-plus', '18', 'Active', 'pmv', 'view_import', '0');
INSERT INTO `usr_links` VALUES ('24', '#', 'SPOT CHECK', 'fa fa-file-excel-o', '0', 'Active', 'spot', 'spot', '0');
INSERT INTO `usr_links` VALUES ('25', '../../views/projects/view_spot_check_excel.php', 'View Spot Check Import', 'fa fa-plus', '24', 'Active', 'spot', 'view_import', '0');
INSERT INTO `usr_links` VALUES ('26', '../../views/projects/add_spot_check_excel.php', 'Import Spot Check', 'fa fa-plus', '24', 'Active', 'spot', 'spot_check', '0');
