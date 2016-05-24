/*
Navicat MySQL Data Transfer

Source Server         : fanyi
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : school

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-03-21 08:55:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `majors`
-- ----------------------------
DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of majors
-- ----------------------------
INSERT INTO `majors` VALUES ('1', 'JAVA');
INSERT INTO `majors` VALUES ('2', 'PHP');
INSERT INTO `majors` VALUES ('3', '前端');
INSERT INTO `majors` VALUES ('4', 'NET');
INSERT INTO `majors` VALUES ('5', 'iOS');
INSERT INTO `majors` VALUES ('6', 'UI');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(32) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `major` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', '张三', '1', '1995-10-28', '1');
INSERT INTO `students` VALUES ('7', '王五', '2', '1997-11-10', '3');
INSERT INTO `students` VALUES ('3', '111', '2', '1997-11-10', '2');
INSERT INTO `students` VALUES ('4', '111', '1', '1998-12-05', '2');
INSERT INTO `students` VALUES ('5', '111', '2', '1999-01-01', '4');
INSERT INTO `students` VALUES ('9', '王玖', '1', '1995-10-25', '2');
INSERT INTO `students` VALUES ('8', '王五', '2', '1995-10-25', '1');
INSERT INTO `students` VALUES ('10', '王五', '2', '1995-10-27', '6');
INSERT INTO `students` VALUES ('11', '王五', '2', '1995-10-27', '2');
INSERT INTO `students` VALUES ('12', '王五', '1', '1997-11-10', '3');
INSERT INTO `students` VALUES ('14', '李四', '2', '1999-09-09', '1');
