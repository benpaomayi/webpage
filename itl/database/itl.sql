/*
Navicat MySQL Data Transfer

Source Server         : localhost_mysql
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : wss

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-07-24 10:49:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tk_announcement`
-- ----------------------------
DROP TABLE IF EXISTS `tk_announcement`;
CREATE TABLE `tk_announcement` (
  `AID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_anc_title` varchar(80) NOT NULL,
  `tk_anc_text` text NOT NULL,
  `tk_anc_type` smallint(4) NOT NULL DEFAULT '0',
  `tk_anc_create` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_anc_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_announcement
-- ----------------------------
INSERT INTO `tk_announcement` VALUES ('1', '1245', '请联系我们', '1', '1', '2015-05-19 08:45:25');

-- ----------------------------
-- Table structure for `tk_bug`
-- ----------------------------
DROP TABLE IF EXISTS `tk_bug`;
CREATE TABLE `tk_bug` (
  `bugid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_bug_title` text,
  `tk_bug_description` text,
  `tk_bug_type` text,
  `tk_bug_priority` text,
  `tk_bug_project` text,
  `tk_bug_project_sub` text,
  `tk_bug_attachment` text,
  `tk_bug_log` text,
  `tk_bug_comment` text,
  `tk_bug_status` text,
  `tk_bug_from_team` text,
  `tk_bug_from` text,
  `tk_bug_to_team` text,
  `tk_bug_to` text,
  `tk_bug_url` text,
  `tk_bug_createtime` text,
  `tk_bug_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_bug_backup1` text,
  `tk_bug_backup2` text,
  `tk_bug_backup3` text,
  `tk_bug_backup4` text,
  `tk_bug_backup5` text,
  `tk_bug_backup6` text,
  PRIMARY KEY (`bugid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_bug
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_comment`
-- ----------------------------
DROP TABLE IF EXISTS `tk_comment`;
CREATE TABLE `tk_comment` (
  `coid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_comm_title` text NOT NULL,
  `tk_comm_text` varchar(60) NOT NULL,
  `tk_comm_type` tinyint(2) NOT NULL DEFAULT '0',
  `tk_comm_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_comm_pid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_comm_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_comment
-- ----------------------------
INSERT INTO `tk_comment` VALUES ('27', '123456', '', '1', '4', '71', '2015-07-24 20:02:10');
INSERT INTO `tk_comment` VALUES ('28', '<a href=\"/wss/wss/editor/attached/file/20150724/20150724140300_80960.pdf\" target=\"_blank\">The Deployment of Routing Protocols in Distributed Control Plane of SDN</a>', '', '2', '2', '35', '2015-07-24 20:03:09');
INSERT INTO `tk_comment` VALUES ('29', '<a href=\"/wss/wss/editor/attached/file/20150728/20150728104913_57433.pdf\" target=\"_blank\">一种基于 ForCES 的网络虚拟化平台的研究与实现</a>', '', '2', '2', '42', '2015-07-28 16:49:37');
INSERT INTO `tk_comment` VALUES ('30', '<a href=\"/wss/wss/editor/attached/file/20150729/20150729134106_32917.pdf\" target=\"_blank\">The Implementation of Virtualization in Data Plane of ForCES</a>', '', '2', '2', '44', '2015-07-29 19:41:12');
INSERT INTO `tk_comment` VALUES ('31', '12536536', '', '1', '4', '81', '2015-07-29 19:59:54');
INSERT INTO `tk_comment` VALUES ('32', '123', '', '1', '2', '99', '2015-09-09 21:28:14');
INSERT INTO `tk_comment` VALUES ('33', '<a href=\"/wss/wss/editor/attached/file/20150914/20150914102805_38363.txt\" target=\"_blank\">一种转发和控制分离系统中拥塞控制的实现方法</a>', '', '2', '2', '53', '2015-09-14 16:28:23');
INSERT INTO `tk_comment` VALUES ('34', '<a href=\"/wss/wss/editor/attached/file/20150914/20150914132716_76983.pdf\" target=\"_blank\">一种从UML软件模型到排队网络模型的转换方法</a>', '', '2', '2', '54', '2015-09-14 19:27:22');
INSERT INTO `tk_comment` VALUES ('36', '123', '', '1', '2', '173', '2015-09-16 22:02:24');
INSERT INTO `tk_comment` VALUES ('37', '<p>\r\n	123456789\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', '1', '2', '173', '2015-09-16 22:02:34');
INSERT INTO `tk_comment` VALUES ('38', '<p>\r\n	123456\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', '1', '2', '173', '2015-09-17 10:00:34');
INSERT INTO `tk_comment` VALUES ('39', '<a href=\"/wss/wss/editor/attached/file/20150917/20150917083243_66362.txt\" target=\"_blank\">一种基于转发与控制分离协议的虚拟节点的创建方法</a>', '', '2', '2', '56', '2015-09-17 14:32:49');
INSERT INTO `tk_comment` VALUES ('43', '123', '', '1', '2', '178', '2015-09-19 11:26:01');
INSERT INTO `tk_comment` VALUES ('44', '<a href=\"/wss/wss/editor/attached/file/20150921/20150921085146_51393.docx\" target=\"_blank\">转发与控制分离网络设备内信息组播传输的方法</a>', '', '2', '5', '57', '2015-09-21 14:51:52');
INSERT INTO `tk_comment` VALUES ('45', '<a href=\"/wss/wss/editor/attached/file/20151029/20151029122848_75036.txt\" target=\"_blank\">1545144</a>', '', '2', '5', '75', '2015-10-29 19:28:58');
INSERT INTO `tk_comment` VALUES ('46', '<p>\r\n	123\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', '', '1', '3', '192', '2015-11-08 21:24:09');
INSERT INTO `tk_comment` VALUES ('47', '<a href=\"/wss/wss/editor/attached/file/20151230/20151230134434_26603.docx\" target=\"_blank\">胜多负少</a>', '', '2', '2', '76', '2015-12-30 20:44:45');
INSERT INTO `tk_comment` VALUES ('48', '是否真实', '', '1', '3', '205', '2016-01-03 17:29:46');
INSERT INTO `tk_comment` VALUES ('49', '打发法啊', '', '1', '13', '211', '2016-01-09 15:25:48');
INSERT INTO `tk_comment` VALUES ('50', '发放阿道夫打发啊', '', '1', '13', '214', '2016-01-09 15:29:29');
INSERT INTO `tk_comment` VALUES ('51', '不错', '', '1', '13', '213', '2016-01-09 15:39:12');

-- ----------------------------
-- Table structure for `tk_comment2`
-- ----------------------------
DROP TABLE IF EXISTS `tk_comment2`;
CREATE TABLE `tk_comment2` (
  `coid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_comm_title` text NOT NULL,
  `tk_comm_text` varchar(60) NOT NULL,
  `tk_comm_type` tinyint(2) NOT NULL DEFAULT '0',
  `tk_comm_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_comm_pid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_comm_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_comment2
-- ----------------------------
INSERT INTO `tk_comment2` VALUES ('71', '123', '', '1', '2', '178', '2015-09-19 15:50:37');
INSERT INTO `tk_comment2` VALUES ('72', '', '', '1', '2', '178', '2015-09-19 16:05:22');
INSERT INTO `tk_comment2` VALUES ('73', '', '', '1', '2', '56', '2015-09-19 16:34:53');
INSERT INTO `tk_comment2` VALUES ('74', '', '', '1', '2', '56', '2015-09-19 16:35:17');
INSERT INTO `tk_comment2` VALUES ('75', '', '', '1', '2', '178', '2015-09-19 16:41:24');
INSERT INTO `tk_comment2` VALUES ('76', '123', '', '1', '2', '178', '2015-09-19 16:41:34');

-- ----------------------------
-- Table structure for `tk_document`
-- ----------------------------
DROP TABLE IF EXISTS `tk_document`;
CREATE TABLE `tk_document` (
  `docid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_doc_title` varchar(80) NOT NULL,
  `tk_doc_description` longtext NOT NULL,
  `tk_doc_attachment` varchar(255) NOT NULL DEFAULT '',
  `tk_doc_class1` bigint(20) NOT NULL DEFAULT '0',
  `tk_doc_class2` bigint(20) NOT NULL DEFAULT '0',
  `tk_doc_type` varchar(20) NOT NULL,
  `tk_doc_create` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_doc_createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tk_doc_edit` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_doc_edittime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_doc_backup1` tinyint(2) NOT NULL DEFAULT '0',
  `tk_doc_backup2` varchar(60) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_document
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item`;
CREATE TABLE `tk_item` (
  `item_id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `tk_item_key` varchar(60) CHARACTER SET utf8 NOT NULL,
  `tk_item_value` varchar(60) CHARACTER SET utf8 NOT NULL,
  `tk_item_title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `tk_item_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tk_item_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tk_item_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tk_item
-- ----------------------------
INSERT INTO `tk_item` VALUES ('3', 'outofdate', 'on', '是否显示过期任务提醒', '”on“为开启，”off“为关闭', 'setting', '2012-06-10 14:03:36');
INSERT INTO `tk_item` VALUES ('7', 'mail_create', 'on', '新任务提醒', '当有新任务到达时提醒任务执行人 \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-08 16:36:36');
INSERT INTO `tk_item` VALUES ('8', 'mail_update', 'on', '任务更新提醒', '当任务状态更新时提醒任务负责人(来自谁) \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-09 15:20:31');
INSERT INTO `tk_item` VALUES ('9', 'mail_comment', 'on', '新备注提醒', '当任务有新备注时提醒任务执行人 \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-09 15:20:49');
INSERT INTO `tk_item` VALUES ('10', 'mail_host', 'smtp.sina.com', 'SMTP邮件服务器', 'SMTP邮件服务器地址,如:smtp.sina.com', 'setting_mail', '2012-06-16 22:42:15');
INSERT INTO `tk_item` VALUES ('11', 'mail_port', '25', 'SMTP邮件服务器端口', 'SMTP邮件服务器的端口号,默认为25，无需修改', 'setting_mail', '2012-06-16 23:00:04');
INSERT INTO `tk_item` VALUES ('12', 'mail_username', 'itlsystem@sina.com', '用户名', '用户名:邮件帐号的用户名,如使用新浪邮箱，请填写完整的邮件地址,如: yourname@sina.com', 'setting_mail', '2016-01-08 16:36:55');
INSERT INTO `tk_item` VALUES ('13', 'mail_password', 'itl123456', '密码', '密码:邮件帐号的密码', 'setting_mail', '2016-01-08 16:37:05');
INSERT INTO `tk_item` VALUES ('14', 'mail_from', 'itlsystem@sina.com', '发送邮件的邮箱', '发送邮件的邮箱,如: yourname@sina.com', 'setting_mail', '2016-01-08 16:37:58');
INSERT INTO `tk_item` VALUES ('15', 'mail_fromname', 'ITLSystem公共邮箱', '显示名称', '邮件发送人的显示名称', 'setting_mail', '2016-01-08 16:38:22');
INSERT INTO `tk_item` VALUES ('16', 'mail_charset', 'UTF-8', '编码格式', '邮件编码格式设置，默认为UTF-8，无需修改', 'setting_mail', '2012-06-16 23:00:11');
INSERT INTO `tk_item` VALUES ('17', 'mail_auth', 'true', 'SMTP验证', '启用SMTP验证功能，默认为true，无需修改', 'setting_mail', '2012-06-16 23:02:12');
INSERT INTO `tk_item` VALUES ('18', 'maxrows_task', '20', '每页任务数', '任务列表页，每页显示的任务数量，只支持正整数', 'setting', '2012-06-17 14:57:57');
INSERT INTO `tk_item` VALUES ('19', 'maxrows_timeout', '5', '每页过期任务数', '任务列表页，每页显示的过期任务数量，只支持正整数', 'setting', '2012-06-17 14:58:04');
INSERT INTO `tk_item` VALUES ('20', 'maxrows_project', '20', '每页项目数', '项目列表页，每页显示的项目数量，只支持正整数', 'setting', '2012-06-17 15:00:32');
INSERT INTO `tk_item` VALUES ('21', 'maxrows_user', '20', '每页用户数', '用户列表页，每页显示的用户数量，只支持正整数', 'setting', '2012-06-17 15:09:37');
INSERT INTO `tk_item` VALUES ('22', 'maxrows_announcement', '20', '每页公告数', '公告列表页，每页显示的公告数量，只支持正整数', 'setting', '2012-06-17 15:25:23');

-- ----------------------------
-- Table structure for `tk_item01`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item01`;
CREATE TABLE `tk_item01` (
  `im01id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im01_field01` text,
  `tk_im01_field02` text,
  `tk_im01_field03` text,
  `tk_im01_field04` text,
  `tk_im01_field05` text,
  `tk_im01_field06` text,
  `tk_im01_field07` text,
  `tk_im01_field08` text,
  `tk_im01_field09` text,
  `tk_im01_field10` text,
  `tk_im01_field11` text,
  `tk_im01_field12` text,
  `tk_im01_field13` text,
  `tk_im01_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im01id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item01
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item02`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item02`;
CREATE TABLE `tk_item02` (
  `im02id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im02_field01` text,
  `tk_im02_field02` text,
  `tk_im02_field03` text,
  `tk_im02_field04` text,
  `tk_im02_field05` text,
  `tk_im02_field06` text,
  `tk_im02_field07` text,
  `tk_im02_field08` text,
  `tk_im02_field09` text,
  `tk_im02_field10` text,
  `tk_im02_field11` text,
  `tk_im02_field12` text,
  `tk_im02_field13` text,
  `tk_im02_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im02id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item02
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item03`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item03`;
CREATE TABLE `tk_item03` (
  `im03id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im03_field01` text,
  `tk_im03_field02` text,
  `tk_im03_field03` text,
  `tk_im03_field04` text,
  `tk_im03_field05` text,
  `tk_im03_field06` text,
  `tk_im03_field07` text,
  `tk_im03_field08` text,
  `tk_im03_field09` text,
  `tk_im03_field10` text,
  `tk_im03_field11` text,
  `tk_im03_field12` text,
  `tk_im03_field13` text,
  `tk_im03_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im03id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item03
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item04`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item04`;
CREATE TABLE `tk_item04` (
  `im04id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im04_field01` text,
  `tk_im04_field02` text,
  `tk_im04_field03` text,
  `tk_im04_field04` text,
  `tk_im04_field05` text,
  `tk_im04_field06` text,
  `tk_im04_field07` text,
  `tk_im04_field08` text,
  `tk_im04_field09` text,
  `tk_im04_field10` text,
  `tk_im04_field11` text,
  `tk_im04_field12` text,
  `tk_im04_field13` text,
  `tk_im04_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im04id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item04
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item05`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item05`;
CREATE TABLE `tk_item05` (
  `im05id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im05_field01` text,
  `tk_im05_field02` text,
  `tk_im05_field03` text,
  `tk_im05_field04` text,
  `tk_im05_field05` text,
  `tk_im05_field06` text,
  `tk_im05_field07` text,
  `tk_im05_field08` text,
  `tk_im05_field09` text,
  `tk_im05_field10` text,
  `tk_im05_field11` text,
  `tk_im05_field12` text,
  `tk_im05_field13` text,
  `tk_im05_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im05id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item05
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_item06`
-- ----------------------------
DROP TABLE IF EXISTS `tk_item06`;
CREATE TABLE `tk_item06` (
  `im06id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_im06_field01` text,
  `tk_im06_field02` text,
  `tk_im06_field03` text,
  `tk_im06_field04` text,
  `tk_im06_field05` text,
  `tk_im06_field06` text,
  `tk_im06_field07` text,
  `tk_im06_field08` text,
  `tk_im06_field09` text,
  `tk_im06_field10` text,
  `tk_im06_field11` text,
  `tk_im06_field12` text,
  `tk_im06_field13` text,
  `tk_im06_field14` text,
  `tk_im06_field15` text,
  `tk_im06_field16` text,
  `tk_im06_field17` text,
  `tk_im06_field18` text,
  `tk_im06_field19` text,
  `tk_im06_field20` text,
  `tk_im06_field21` text,
  `tk_im06_field22` text,
  `tk_im06_field23` text,
  `tk_im06_field24` text,
  `tk_im06_field25` text,
  `tk_im06_field26` text,
  `tk_im06_field27` text,
  `tk_im06_field28` text,
  `tk_im06_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`im06id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_item06
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_jiekuanxiaoxi`
-- ----------------------------
DROP TABLE IF EXISTS `tk_jiekuanxiaoxi`;
CREATE TABLE `tk_jiekuanxiaoxi` (
  `jid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_hk_zt` varchar(60) NOT NULL,
  `tk_jk_ly` varchar(60) NOT NULL,
  `tk_jkr` varchar(60) NOT NULL,
  `tk_jk_jinban` varchar(60) NOT NULL,
  `tk_hk_ren` varchar(60) NOT NULL,
  `tk_jk_rq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_hk_rq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_jk_projectid` bigint(20) NOT NULL,
  `tk_jk_taskid` bigint(20) NOT NULL,
  `tk_comm_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_jiekuanxiaoxi
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_jiekuanzt`
-- ----------------------------
DROP TABLE IF EXISTS `tk_jiekuanzt`;
CREATE TABLE `tk_jiekuanzt` (
  `jid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_hk_pd` varchar(60) NOT NULL,
  `tk_bx_qr` varchar(60) NOT NULL,
  `tk_bx_rq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_hk_qr` varchar(60) NOT NULL,
  `tk_hk_rq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_jk_projectid` bigint(20) NOT NULL,
  `tk_jk_taskid` bigint(20) NOT NULL,
  `tk_comm_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_jiekuanzt
-- ----------------------------
INSERT INTO `tk_jiekuanzt` VALUES ('4', '是', '已报销', '2015-10-25 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '63', '2015-10-23 20:43:51');
INSERT INTO `tk_jiekuanzt` VALUES ('5', '是', '已报销', '2015-10-31 00:00:00', '已还款', '2015-10-28 00:00:00', '-1', '64', '2015-10-23 21:32:58');
INSERT INTO `tk_jiekuanzt` VALUES ('6', '是', '已报销', '2015-10-28 00:00:00', '已还款', '2015-10-28 00:00:00', '-1', '64', '2015-10-23 21:33:44');
INSERT INTO `tk_jiekuanzt` VALUES ('7', '是', '已报销', '2015-10-24 00:00:00', '已还款', '2015-10-26 00:00:00', '-1', '64', '2015-10-23 21:43:50');
INSERT INTO `tk_jiekuanzt` VALUES ('8', '是', '已报销', '2015-10-23 00:00:00', '已还款', '2015-10-27 00:00:00', '-1', '64', '2015-10-23 21:44:26');
INSERT INTO `tk_jiekuanzt` VALUES ('9', '是', '已报销', '2015-10-30 00:00:00', '已还款', '2015-10-31 00:00:00', '-1', '64', '2015-10-23 21:47:22');
INSERT INTO `tk_jiekuanzt` VALUES ('10', '是', '已报销', '2015-10-27 00:00:00', '已还款', '2015-10-31 00:00:00', '-1', '64', '2015-10-23 21:49:01');
INSERT INTO `tk_jiekuanzt` VALUES ('11', '是', '已报销', '2015-10-25 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '64', '2015-10-23 21:57:59');
INSERT INTO `tk_jiekuanzt` VALUES ('12', '是', '已报销', '2015-10-20 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '64', '2015-10-23 21:59:35');
INSERT INTO `tk_jiekuanzt` VALUES ('13', '是', '已报销', '2015-10-14 00:00:00', '已还款', '2015-10-22 00:00:00', '-1', '69', '2015-10-23 22:36:06');
INSERT INTO `tk_jiekuanzt` VALUES ('14', '是', '已报销', '2015-10-21 00:00:00', '已还款', '2015-10-29 00:00:00', '-1', '69', '2015-10-23 22:50:19');
INSERT INTO `tk_jiekuanzt` VALUES ('15', '是', '已报销', '2015-10-21 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '69', '2015-10-23 22:52:52');
INSERT INTO `tk_jiekuanzt` VALUES ('16', '是', '已报销', '2015-10-20 00:00:00', '已还款', '2015-10-29 00:00:00', '-1', '69', '2015-10-23 22:53:40');
INSERT INTO `tk_jiekuanzt` VALUES ('17', '是', '已报销', '2015-10-27 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '69', '2015-10-23 22:56:51');
INSERT INTO `tk_jiekuanzt` VALUES ('18', '是', '已报销', '2015-10-20 00:00:00', '已还款', '2015-10-29 00:00:00', '-1', '69', '2015-10-23 22:57:41');
INSERT INTO `tk_jiekuanzt` VALUES ('19', '是', '已报销', '2015-10-13 00:00:00', '未还款', '2015-10-29 00:00:00', '-1', '69', '2015-10-23 22:59:39');
INSERT INTO `tk_jiekuanzt` VALUES ('20', '是', '已报销', '2015-10-21 00:00:00', '已还款', '2015-10-29 00:00:00', '-1', '69', '2015-10-23 23:04:37');
INSERT INTO `tk_jiekuanzt` VALUES ('21', '是', '已报销', '2015-10-20 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '63', '2015-10-23 23:06:26');
INSERT INTO `tk_jiekuanzt` VALUES ('22', '是', '已报销', '2015-10-21 00:00:00', '已还款', '2015-10-30 00:00:00', '-1', '63', '2015-10-23 23:07:44');
INSERT INTO `tk_jiekuanzt` VALUES ('23', '是', '已报销', '2015-10-28 00:00:00', '已还款', '2015-10-31 00:00:00', '-1', '66', '2015-10-23 23:09:03');

-- ----------------------------
-- Table structure for `tk_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `tk_kpi`;
CREATE TABLE `tk_kpi` (
  `kpid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_kpi_user` text,
  `tk_kpi_type` text,
  `tk_kpi_kpi1` text,
  `tk_kpi_kpi2` text,
  `tk_kpi_kpi3` text,
  `tk_kpi_kpi4` text,
  `tk_kpi_kpi5` int(11) DEFAULT NULL,
  `tk_kpi_kpi6` int(11) DEFAULT NULL,
  `tk_kpi_create` text,
  `tk_kpi_lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_kpi_year` text,
  `tk_kpi_month` text,
  `tk_kpi_backup1` text,
  `tk_kpi_backup2` text,
  PRIMARY KEY (`kpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_kpi
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_log`
-- ----------------------------
DROP TABLE IF EXISTS `tk_log`;
CREATE TABLE `tk_log` (
  `logid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_log_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_log_action` text NOT NULL,
  `tk_log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_log_type` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_log_class` tinyint(2) NOT NULL DEFAULT '0',
  `tk_log_description` varchar(60) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=385 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_log
-- ----------------------------
INSERT INTO `tk_log` VALUES ('139', '2', '提交了审核', '2015-07-24 19:59:30', '69', '1', '');
INSERT INTO `tk_log` VALUES ('140', '3', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-07-24 20:00:05', '69', '1', '');
INSERT INTO `tk_log` VALUES ('141', '3', '提交了审核', '2015-07-24 20:00:33', '70', '1', '');
INSERT INTO `tk_log` VALUES ('142', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-07-24 20:00:55', '70', '1', '');
INSERT INTO `tk_log` VALUES ('143', '6', '提交了审核', '2015-07-24 20:01:22', '71', '1', '');
INSERT INTO `tk_log` VALUES ('144', '4', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-07-24 20:01:59', '71', '1', '');
INSERT INTO `tk_log` VALUES ('145', '2', '提交了审核', '2015-07-24 20:11:40', '72', '1', '');
INSERT INTO `tk_log` VALUES ('146', '2', '提交了审核', '2015-07-25 20:32:42', '73', '1', '');
INSERT INTO `tk_log` VALUES ('147', '2', '提交了审核', '2015-07-27 11:43:27', '74', '1', '');
INSERT INTO `tk_log` VALUES ('148', '2', '提交了审核', '2015-07-27 17:29:43', '75', '1', '');
INSERT INTO `tk_log` VALUES ('149', '2', '提交了审核', '2015-07-27 17:35:17', '76', '1', '');
INSERT INTO `tk_log` VALUES ('150', '2', '提交了审核', '2015-07-27 19:01:08', '77', '1', '');
INSERT INTO `tk_log` VALUES ('151', '2', '提交了审核', '2015-07-28 20:44:58', '78', '1', '');
INSERT INTO `tk_log` VALUES ('152', '2', '提交了审核', '2015-07-29 09:04:20', '79', '1', '');
INSERT INTO `tk_log` VALUES ('153', '2', '提交了审核', '2015-07-29 19:46:55', '80', '1', '');
INSERT INTO `tk_log` VALUES ('154', '3', '审核了该成果，审核结果为：&nbsp;审批成功同意\r\n', '2015-07-29 19:47:26', '80', '1', '');
INSERT INTO `tk_log` VALUES ('155', '3', '将任务转让给&nbsp;高老师', '2015-07-29 19:50:49', '80', '1', '');
INSERT INTO `tk_log` VALUES ('156', '6', '提交了审核', '2015-07-29 19:52:14', '81', '1', '');
INSERT INTO `tk_log` VALUES ('157', '3', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-07-29 19:53:13', '81', '1', '');
INSERT INTO `tk_log` VALUES ('158', '3', '将任务转让给&nbsp;王老师', '2015-07-29 19:55:08', '81', '1', '');
INSERT INTO `tk_log` VALUES ('159', '4', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-07-29 19:59:26', '81', '1', '');
INSERT INTO `tk_log` VALUES ('160', '4', '提交了审核', '2015-07-29 20:01:27', '82', '1', '');
INSERT INTO `tk_log` VALUES ('161', '2', '提交了审核', '2015-09-09 10:23:53', '83', '1', '');
INSERT INTO `tk_log` VALUES ('162', '2', '提交了审核', '2015-09-09 12:27:38', '84', '1', '');
INSERT INTO `tk_log` VALUES ('163', '2', '提交了审核', '2015-09-09 14:19:44', '85', '1', '');
INSERT INTO `tk_log` VALUES ('164', '2', '提交了审核', '2015-09-09 15:36:31', '86', '1', '');
INSERT INTO `tk_log` VALUES ('165', '2', '提交了审核', '2015-09-09 15:48:11', '87', '1', '');
INSERT INTO `tk_log` VALUES ('166', '2', '提交了审核', '2015-09-09 15:50:18', '88', '1', '');
INSERT INTO `tk_log` VALUES ('167', '2', '提交了审核', '2015-09-09 15:52:22', '89', '1', '');
INSERT INTO `tk_log` VALUES ('168', '2', '提交了审核', '2015-09-09 18:42:37', '90', '1', '');
INSERT INTO `tk_log` VALUES ('169', '2', '提交了审核', '2015-09-09 19:11:29', '91', '1', '');
INSERT INTO `tk_log` VALUES ('170', '2', '提交了审核', '2015-09-09 20:00:03', '92', '1', '');
INSERT INTO `tk_log` VALUES ('171', '2', '提交了审核', '2015-09-09 21:04:12', '93', '1', '');
INSERT INTO `tk_log` VALUES ('172', '2', '提交了审核', '2015-09-09 21:06:29', '94', '1', '');
INSERT INTO `tk_log` VALUES ('173', '2', '提交了审核', '2015-09-09 21:07:33', '95', '1', '');
INSERT INTO `tk_log` VALUES ('174', '2', '提交了审核', '2015-09-09 21:10:18', '96', '1', '');
INSERT INTO `tk_log` VALUES ('175', '2', '提交了审核', '2015-09-09 21:12:04', '97', '1', '');
INSERT INTO `tk_log` VALUES ('176', '2', '提交了审核', '2015-09-09 21:17:58', '98', '1', '');
INSERT INTO `tk_log` VALUES ('177', '2', '提交了审核', '2015-09-09 21:22:08', '99', '1', '');
INSERT INTO `tk_log` VALUES ('178', '2', '提交了审核', '2015-09-10 10:54:59', '100', '1', '');
INSERT INTO `tk_log` VALUES ('179', '2', '提交了审核', '2015-09-10 10:57:42', '101', '1', '');
INSERT INTO `tk_log` VALUES ('180', '2', '提交了审核', '2015-09-10 11:05:17', '102', '1', '');
INSERT INTO `tk_log` VALUES ('181', '2', '提交了审核', '2015-09-10 11:08:18', '103', '1', '');
INSERT INTO `tk_log` VALUES ('182', '2', '提交了审核', '2015-09-10 11:09:00', '104', '1', '');
INSERT INTO `tk_log` VALUES ('183', '2', '提交了审核', '2015-09-10 11:14:04', '105', '1', '');
INSERT INTO `tk_log` VALUES ('184', '2', '提交了审核', '2015-09-10 11:16:30', '106', '1', '');
INSERT INTO `tk_log` VALUES ('185', '2', '提交了审核', '2015-09-10 11:18:13', '107', '1', '');
INSERT INTO `tk_log` VALUES ('186', '2', '提交了审核', '2015-09-10 11:21:05', '108', '1', '');
INSERT INTO `tk_log` VALUES ('187', '2', '提交了审核', '2015-09-10 12:05:01', '109', '1', '');
INSERT INTO `tk_log` VALUES ('188', '2', '提交了审核', '2015-09-10 19:19:48', '110', '1', '');
INSERT INTO `tk_log` VALUES ('189', '2', '提交了审核', '2015-09-10 20:27:35', '111', '1', '');
INSERT INTO `tk_log` VALUES ('190', '2', '提交了审核', '2015-09-10 20:29:14', '112', '1', '');
INSERT INTO `tk_log` VALUES ('191', '2', '提交了审核', '2015-09-10 20:35:46', '113', '1', '');
INSERT INTO `tk_log` VALUES ('192', '2', '提交了审核', '2015-09-10 20:38:23', '114', '1', '');
INSERT INTO `tk_log` VALUES ('193', '2', '提交了审核', '2015-09-10 20:43:58', '115', '1', '');
INSERT INTO `tk_log` VALUES ('194', '2', '提交了审核', '2015-09-10 21:25:20', '116', '1', '');
INSERT INTO `tk_log` VALUES ('195', '2', '提交了审核', '2015-09-10 21:31:31', '117', '1', '');
INSERT INTO `tk_log` VALUES ('196', '2', '提交了审核', '2015-09-10 21:33:09', '118', '1', '');
INSERT INTO `tk_log` VALUES ('197', '2', '提交了审核', '2015-09-11 19:08:31', '119', '1', '');
INSERT INTO `tk_log` VALUES ('198', '2', '提交了审核', '2015-09-11 19:43:06', '120', '1', '');
INSERT INTO `tk_log` VALUES ('199', '2', '提交了审核', '2015-09-11 19:44:29', '121', '1', '');
INSERT INTO `tk_log` VALUES ('200', '2', '提交了审核', '2015-09-11 19:45:39', '122', '1', '');
INSERT INTO `tk_log` VALUES ('201', '2', '提交了审核', '2015-09-11 19:47:38', '123', '1', '');
INSERT INTO `tk_log` VALUES ('202', '2', '提交了审核', '2015-09-11 19:50:01', '124', '1', '');
INSERT INTO `tk_log` VALUES ('203', '2', '提交了审核', '2015-09-11 19:52:14', '125', '1', '');
INSERT INTO `tk_log` VALUES ('204', '2', '提交了审核', '2015-09-11 19:56:34', '126', '1', '');
INSERT INTO `tk_log` VALUES ('205', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-09-11 19:57:30', '126', '1', '');
INSERT INTO `tk_log` VALUES ('206', '2', '提交了审核', '2015-09-12 09:42:40', '127', '1', '');
INSERT INTO `tk_log` VALUES ('207', '2', '创建了文档', '2015-09-12 09:46:51', '1', '2', '');
INSERT INTO `tk_log` VALUES ('208', '6', '提交了审核', '2015-09-12 15:31:47', '128', '1', '');
INSERT INTO `tk_log` VALUES ('209', '2', '提交了审核', '2015-09-13 09:35:53', '129', '1', '');
INSERT INTO `tk_log` VALUES ('210', '2', '提交了审核', '2015-09-13 09:52:56', '130', '1', '');
INSERT INTO `tk_log` VALUES ('211', '2', '提交了审核', '2015-09-13 10:02:31', '131', '1', '');
INSERT INTO `tk_log` VALUES ('212', '2', '提交了审核', '2015-09-13 10:07:46', '132', '1', '');
INSERT INTO `tk_log` VALUES ('213', '6', '提交了审核', '2015-09-13 16:06:24', '133', '1', '');
INSERT INTO `tk_log` VALUES ('214', '6', '提交了审核', '2015-09-13 16:13:23', '134', '1', '');
INSERT INTO `tk_log` VALUES ('215', '6', '提交了审核', '2015-09-13 16:21:33', '135', '1', '');
INSERT INTO `tk_log` VALUES ('216', '2', '提交了审核', '2015-09-14 09:52:34', '136', '1', '');
INSERT INTO `tk_log` VALUES ('217', '2', '提交了审核', '2015-09-14 10:19:34', '137', '1', '');
INSERT INTO `tk_log` VALUES ('218', '2', '提交了审核', '2015-09-14 11:18:21', '138', '1', '');
INSERT INTO `tk_log` VALUES ('219', '2', '提交了审核', '2015-09-14 11:22:11', '139', '1', '');
INSERT INTO `tk_log` VALUES ('220', '2', '提交了审核', '2015-09-14 14:23:36', '140', '1', '');
INSERT INTO `tk_log` VALUES ('221', '2', '提交了审核', '2015-09-14 14:29:42', '141', '1', '');
INSERT INTO `tk_log` VALUES ('222', '2', '提交了审核', '2015-09-14 14:41:01', '142', '1', '');
INSERT INTO `tk_log` VALUES ('223', '2', '提交了审核', '2015-09-14 14:46:15', '143', '1', '');
INSERT INTO `tk_log` VALUES ('224', '2', '提交了审核', '2015-09-14 14:46:22', '144', '1', '');
INSERT INTO `tk_log` VALUES ('225', '2', '提交了审核', '2015-09-14 14:50:57', '145', '1', '');
INSERT INTO `tk_log` VALUES ('226', '2', '提交了审核', '2015-09-14 14:51:53', '146', '1', '');
INSERT INTO `tk_log` VALUES ('227', '2', '提交了审核', '2015-09-14 14:56:41', '147', '1', '');
INSERT INTO `tk_log` VALUES ('228', '2', '提交了审核', '2015-09-14 15:08:13', '148', '1', '');
INSERT INTO `tk_log` VALUES ('229', '2', '提交了审核', '2015-09-14 15:28:04', '149', '1', '');
INSERT INTO `tk_log` VALUES ('230', '2', '提交了审核', '2015-09-14 15:28:40', '150', '1', '');
INSERT INTO `tk_log` VALUES ('231', '2', '提交了审核', '2015-09-14 15:33:48', '151', '1', '');
INSERT INTO `tk_log` VALUES ('232', '2', '提交了审核', '2015-09-14 15:34:05', '152', '1', '');
INSERT INTO `tk_log` VALUES ('233', '2', '提交了审核', '2015-09-14 15:43:51', '153', '1', '');
INSERT INTO `tk_log` VALUES ('234', '2', '提交了审核', '2015-09-14 15:51:51', '154', '1', '');
INSERT INTO `tk_log` VALUES ('235', '2', '提交了审核', '2015-09-14 15:51:54', '155', '1', '');
INSERT INTO `tk_log` VALUES ('236', '2', '提交了审核', '2015-09-14 15:53:40', '156', '1', '');
INSERT INTO `tk_log` VALUES ('237', '2', '提交了审核', '2015-09-14 15:54:55', '157', '1', '');
INSERT INTO `tk_log` VALUES ('238', '2', '提交了审核', '2015-09-14 15:54:58', '158', '1', '');
INSERT INTO `tk_log` VALUES ('239', '2', '提交了审核', '2015-09-14 15:56:28', '159', '1', '');
INSERT INTO `tk_log` VALUES ('240', '2', '提交了审核', '2015-09-14 15:57:47', '160', '1', '');
INSERT INTO `tk_log` VALUES ('241', '2', '提交了审核', '2015-09-14 15:59:48', '161', '1', '');
INSERT INTO `tk_log` VALUES ('242', '2', '提交了审核', '2015-09-14 16:00:05', '162', '1', '');
INSERT INTO `tk_log` VALUES ('243', '2', '提交了审核', '2015-09-14 16:03:46', '163', '1', '');
INSERT INTO `tk_log` VALUES ('244', '2', '提交了审核', '2015-09-14 16:07:19', '164', '1', '');
INSERT INTO `tk_log` VALUES ('245', '2', '提交了审核', '2015-09-14 16:14:51', '165', '1', '');
INSERT INTO `tk_log` VALUES ('246', '2', '提交了审核', '2015-09-14 16:16:30', '166', '1', '');
INSERT INTO `tk_log` VALUES ('247', '2', '提交了审核', '2015-09-14 16:17:36', '167', '1', '');
INSERT INTO `tk_log` VALUES ('248', '2', '提交了审核', '2015-09-14 16:24:49', '168', '1', '');
INSERT INTO `tk_log` VALUES ('249', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意发表', '2015-09-14 19:15:06', '168', '1', '');
INSERT INTO `tk_log` VALUES ('250', '2', '提交了审核', '2015-09-14 19:48:13', '169', '1', '');
INSERT INTO `tk_log` VALUES ('251', '2', '提交了审核', '2015-09-15 10:13:10', '170', '1', '');
INSERT INTO `tk_log` VALUES ('252', '2', '提交了审核', '2015-09-15 10:51:43', '171', '1', '');
INSERT INTO `tk_log` VALUES ('253', '2', '提交了审核', '2015-09-15 10:54:51', '172', '1', '');
INSERT INTO `tk_log` VALUES ('254', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-09-15 11:28:49', '172', '1', '');
INSERT INTO `tk_log` VALUES ('255', '2', '提交了审核', '2015-09-15 18:55:09', '173', '1', '');
INSERT INTO `tk_log` VALUES ('256', '2', '审核了该成果，审核结果为：&nbsp;审批成功toyi ', '2015-09-16 15:30:22', '173', '1', '');
INSERT INTO `tk_log` VALUES ('257', '2', '提交了审核', '2015-09-17 11:46:39', '174', '1', '');
INSERT INTO `tk_log` VALUES ('258', '2', '提交了审核', '2015-09-17 12:49:01', '175', '1', '');
INSERT INTO `tk_log` VALUES ('259', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意', '2015-09-17 12:51:41', '174', '1', '');
INSERT INTO `tk_log` VALUES ('260', '6', '提交了审核', '2015-09-17 12:52:55', '176', '1', '');
INSERT INTO `tk_log` VALUES ('261', '2', '提交了审核', '2015-09-17 14:34:36', '177', '1', '');
INSERT INTO `tk_log` VALUES ('262', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意发表', '2015-09-17 14:36:53', '177', '1', '');
INSERT INTO `tk_log` VALUES ('263', '6', '提交了审核', '2015-09-17 14:38:19', '178', '1', '');
INSERT INTO `tk_log` VALUES ('264', '2', '创建了文档', '2015-09-21 14:46:34', '2', '2', '');
INSERT INTO `tk_log` VALUES ('265', '5', '提交了审核', '2015-09-21 14:52:27', '179', '1', '');
INSERT INTO `tk_log` VALUES ('266', '5', '创建了文档', '2015-09-21 15:08:25', '3', '2', '');
INSERT INTO `tk_log` VALUES ('267', '5', '创建了文档', '2015-09-21 15:11:02', '4', '2', '');
INSERT INTO `tk_log` VALUES ('268', '5', '创建了文档', '2015-09-21 15:22:04', '5', '2', '');
INSERT INTO `tk_log` VALUES ('269', '6', '创建了文档', '2015-09-21 15:34:52', '6', '2', '');
INSERT INTO `tk_log` VALUES ('270', '2', '提交了审核', '2015-09-22 15:53:15', '180', '1', '');
INSERT INTO `tk_log` VALUES ('271', '3', '审核了该成果，审核结果为：&nbsp;审批成功同意发表', '2015-09-22 15:54:31', '180', '1', '');
INSERT INTO `tk_log` VALUES ('272', '3', '提交了审核', '2015-09-22 15:55:24', '181', '1', '');
INSERT INTO `tk_log` VALUES ('273', '6', '审核了该成果，审核结果为：&nbsp;审批成功同意发表\r\n', '2015-09-22 15:55:56', '181', '1', '');
INSERT INTO `tk_log` VALUES ('274', '5', '提交了审核', '2015-09-25 17:33:03', '182', '1', '');
INSERT INTO `tk_log` VALUES ('275', '2', '提交了审核', '2015-09-25 17:59:14', '183', '1', '');
INSERT INTO `tk_log` VALUES ('276', '2', '提交了审核', '2015-09-25 17:59:30', '184', '1', '');
INSERT INTO `tk_log` VALUES ('277', '2', '提交了审核', '2015-09-25 17:59:48', '185', '1', '');
INSERT INTO `tk_log` VALUES ('278', '2', '提交了审核', '2015-09-25 18:01:27', '186', '1', '');
INSERT INTO `tk_log` VALUES ('279', '9', '提交了审核', '2015-09-25 18:04:32', '187', '1', '');
INSERT INTO `tk_log` VALUES ('280', '2', '提交了审核', '2015-10-04 11:19:14', '188', '1', '');
INSERT INTO `tk_log` VALUES ('281', '2', '提交了审核', '2015-10-05 10:53:42', '189', '1', '');
INSERT INTO `tk_log` VALUES ('282', '2', '提交了审核', '2015-10-23 10:16:29', '190', '1', '');
INSERT INTO `tk_log` VALUES ('283', '2', '提交了审核', '2015-10-23 11:29:39', '191', '1', '');
INSERT INTO `tk_log` VALUES ('284', '2', '审核了该成果，审核结果为：&nbsp;审批完成', '2015-10-23 11:32:04', '189', '1', '');
INSERT INTO `tk_log` VALUES ('285', '2', '审核了该成果，审核结果为：&nbsp;审批完成', '2015-10-23 11:34:12', '190', '1', '');
INSERT INTO `tk_log` VALUES ('286', '5', '提交了审核', '2015-10-29 19:32:33', '192', '1', '');
INSERT INTO `tk_log` VALUES ('287', '6', '审核了该成果，审核结果为：&nbsp;审批完成同意', '2015-10-29 19:33:05', '192', '1', '');
INSERT INTO `tk_log` VALUES ('288', '6', '提交了审核', '2015-10-29 19:33:31', '193', '1', '');
INSERT INTO `tk_log` VALUES ('289', '2', '提交了审核', '2015-12-30 20:45:46', '194', '1', '');
INSERT INTO `tk_log` VALUES ('290', '2', '提交了审核', '2016-01-01 12:43:26', '195', '1', '');
INSERT INTO `tk_log` VALUES ('291', '2', '提交了审核', '2016-01-01 13:11:01', '196', '1', '');
INSERT INTO `tk_log` VALUES ('292', '15', '提交了审核', '2016-01-01 15:19:48', '197', '1', '');
INSERT INTO `tk_log` VALUES ('293', '15', '提交了审核', '2016-01-01 15:26:16', '198', '1', '');
INSERT INTO `tk_log` VALUES ('294', '21', '提交了审核', '2016-01-01 15:42:55', '199', '1', '');
INSERT INTO `tk_log` VALUES ('295', '2', '提交了审核', '2016-01-01 15:52:12', '200', '1', '');
INSERT INTO `tk_log` VALUES ('296', '10', '提交了审核', '2016-01-01 15:55:16', '201', '1', '');
INSERT INTO `tk_log` VALUES ('297', '15', '提交了审核', '2016-01-01 16:02:40', '202', '1', '');
INSERT INTO `tk_log` VALUES ('298', '2', '提交了审核', '2016-01-01 16:10:00', '203', '1', '');
INSERT INTO `tk_log` VALUES ('299', '2', '提交了审核', '2016-01-01 16:13:53', '204', '1', '');
INSERT INTO `tk_log` VALUES ('300', '2', '提交了审核', '2016-01-01 16:18:40', '205', '1', '');
INSERT INTO `tk_log` VALUES ('301', '2', '创建了文档', '2016-01-01 18:55:42', '17', '2', '');
INSERT INTO `tk_log` VALUES ('302', '2', '创建了文档', '2016-01-01 18:59:17', '18', '2', '');
INSERT INTO `tk_log` VALUES ('303', '2', '编辑了文档', '2016-01-01 19:22:37', '18', '2', '');
INSERT INTO `tk_log` VALUES ('304', '2', '编辑了文档', '2016-01-01 19:22:40', '18', '2', '');
INSERT INTO `tk_log` VALUES ('305', '2', '编辑了文档', '2016-01-01 19:22:43', '18', '2', '');
INSERT INTO `tk_log` VALUES ('306', '3', '创建了文档', '2016-01-01 19:29:08', '19', '2', '');
INSERT INTO `tk_log` VALUES ('307', '3', '创建了文档', '2016-01-01 19:33:29', '20', '2', '');
INSERT INTO `tk_log` VALUES ('308', '3', '创建了文档', '2016-01-01 19:34:32', '21', '2', '');
INSERT INTO `tk_log` VALUES ('309', '3', '创建了文档', '2016-01-01 19:43:14', '22', '2', '');
INSERT INTO `tk_log` VALUES ('310', '3', '创建了文档', '2016-01-01 20:03:03', '23', '2', '');
INSERT INTO `tk_log` VALUES ('311', '3', '创建了文档', '2016-01-03 12:07:53', '24', '2', '');
INSERT INTO `tk_log` VALUES ('312', '2', '创建了文档', '2016-01-03 12:58:12', '25', '2', '');
INSERT INTO `tk_log` VALUES ('313', '2', '创建了文档', '2016-01-03 13:01:24', '26', '2', '');
INSERT INTO `tk_log` VALUES ('314', '2', '创建了文档', '2016-01-03 13:54:54', '27', '2', '');
INSERT INTO `tk_log` VALUES ('315', '3', '创建了文档', '2016-01-03 14:49:23', '28', '2', '');
INSERT INTO `tk_log` VALUES ('316', '2', '创建了文档', '2016-01-03 14:56:26', '29', '2', '');
INSERT INTO `tk_log` VALUES ('317', '2', '创建了文档', '2016-01-03 14:59:26', '30', '2', '');
INSERT INTO `tk_log` VALUES ('318', '3', '创建了文档', '2016-01-03 15:08:21', '31', '2', '');
INSERT INTO `tk_log` VALUES ('319', '3', '创建了文档', '2016-01-03 15:14:44', '32', '2', '');
INSERT INTO `tk_log` VALUES ('320', '3', '创建了文档', '2016-01-03 15:24:06', '33', '2', '');
INSERT INTO `tk_log` VALUES ('321', '3', '创建了文档', '2016-01-03 15:27:00', '34', '2', '');
INSERT INTO `tk_log` VALUES ('322', '3', '创建了文档', '2016-01-03 15:40:57', '35', '2', '');
INSERT INTO `tk_log` VALUES ('323', '3', '创建了文档', '2016-01-03 15:42:59', '36', '2', '');
INSERT INTO `tk_log` VALUES ('324', '3', '创建了文档', '2016-01-03 15:46:35', '37', '2', '');
INSERT INTO `tk_log` VALUES ('325', '3', '创建了文档', '2016-01-03 15:50:06', '38', '2', '');
INSERT INTO `tk_log` VALUES ('326', '3', '创建了文档', '2016-01-03 15:53:52', '39', '2', '');
INSERT INTO `tk_log` VALUES ('327', '3', '创建了文档', '2016-01-03 16:12:11', '40', '2', '');
INSERT INTO `tk_log` VALUES ('328', '3', '创建了文档', '2016-01-03 16:26:14', '41', '2', '');
INSERT INTO `tk_log` VALUES ('329', '3', '创建了文档', '2016-01-03 16:28:48', '42', '2', '');
INSERT INTO `tk_log` VALUES ('330', '3', '创建了文档', '2016-01-03 16:33:29', '43', '2', '');
INSERT INTO `tk_log` VALUES ('331', '3', '创建了文档', '2016-01-03 16:40:48', '44', '2', '');
INSERT INTO `tk_log` VALUES ('332', '3', '创建了文档', '2016-01-03 17:25:39', '45', '2', '');
INSERT INTO `tk_log` VALUES ('333', '3', '创建了文档', '2016-01-03 18:59:29', '46', '2', '');
INSERT INTO `tk_log` VALUES ('334', '3', '创建了文档', '2016-01-03 19:07:39', '47', '2', '');
INSERT INTO `tk_log` VALUES ('335', '2', '提交了审核', '2016-01-08 16:38:51', '206', '1', '');
INSERT INTO `tk_log` VALUES ('336', '2', '提交了审核', '2016-01-08 16:42:22', '207', '1', '');
INSERT INTO `tk_log` VALUES ('337', '1', '提交了审核', '2016-01-08 16:45:15', '208', '1', '');
INSERT INTO `tk_log` VALUES ('338', '8', '提交了审核', '2016-01-08 17:29:45', '209', '1', '');
INSERT INTO `tk_log` VALUES ('339', '8', '提交了审核', '2016-01-08 17:49:16', '210', '1', '');
INSERT INTO `tk_log` VALUES ('340', '8', '提交了审核', '2016-01-08 17:51:44', '211', '1', '');
INSERT INTO `tk_log` VALUES ('341', '8', '提交了审核', '2016-01-08 18:21:12', '212', '1', '');
INSERT INTO `tk_log` VALUES ('342', '8', '提交了审核', '2016-01-08 18:26:31', '213', '1', '');
INSERT INTO `tk_log` VALUES ('343', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意发表', '2016-01-09 15:19:34', '213', '1', '');
INSERT INTO `tk_log` VALUES ('344', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意发表\r\n', '2016-01-09 15:21:27', '212', '1', '');
INSERT INTO `tk_log` VALUES ('345', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意发表', '2016-01-09 15:24:49', '211', '1', '');
INSERT INTO `tk_log` VALUES ('346', '2', '提交了审核', '2016-01-09 15:27:22', '214', '1', '');
INSERT INTO `tk_log` VALUES ('347', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意发表', '2016-01-09 15:28:21', '214', '1', '');
INSERT INTO `tk_log` VALUES ('348', '8', '提交了审核', '2016-01-09 15:54:14', '215', '1', '');
INSERT INTO `tk_log` VALUES ('349', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意', '2016-01-09 15:54:54', '215', '1', '');
INSERT INTO `tk_log` VALUES ('350', '13', '审核了该成果，审核结果为：&nbsp;审批完成', '2016-01-09 15:59:23', '215', '1', '');
INSERT INTO `tk_log` VALUES ('351', '13', '审核了该成果，审核结果为：&nbsp;审批完成', '2016-01-09 16:01:53', '215', '1', '');
INSERT INTO `tk_log` VALUES ('352', '13', '审核了该成果，审核结果为：&nbsp;审批完成', '2016-01-09 16:05:05', '215', '1', '');
INSERT INTO `tk_log` VALUES ('353', '13', '提交了审核', '2016-01-09 16:08:24', '216', '1', '');
INSERT INTO `tk_log` VALUES ('354', '14', '审核了该成果，审核结果为：&nbsp;审批完成', '2016-01-09 16:11:32', '216', '1', '');
INSERT INTO `tk_log` VALUES ('355', '14', '审核了该成果，审核结果为：&nbsp;审批完成', '2016-01-09 18:11:01', '216', '1', '');
INSERT INTO `tk_log` VALUES ('356', '8', '提交了审核', '2016-01-11 16:23:17', '217', '1', '');
INSERT INTO `tk_log` VALUES ('357', '8', '提交了审核', '2016-01-11 16:27:09', '218', '1', '');
INSERT INTO `tk_log` VALUES ('358', '8', '提交了审核', '2016-01-12 16:21:55', '219', '1', '');
INSERT INTO `tk_log` VALUES ('359', '8', '提交了审核', '2016-01-14 15:48:39', '220', '1', '');
INSERT INTO `tk_log` VALUES ('360', '8', '提交了审核', '2016-01-14 15:55:12', '221', '1', '');
INSERT INTO `tk_log` VALUES ('361', '13', '提交了审核', '2016-01-14 16:41:03', '222', '1', '');
INSERT INTO `tk_log` VALUES ('362', '14', '提交了审核', '2016-01-14 16:41:51', '223', '1', '');
INSERT INTO `tk_log` VALUES ('363', '16', '提交了审核', '2016-01-14 18:03:02', '224', '1', '');
INSERT INTO `tk_log` VALUES ('364', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意', '2016-01-14 18:03:30', '224', '1', '');
INSERT INTO `tk_log` VALUES ('365', '13', '提交了审核', '2016-01-14 18:03:35', '225', '1', '');
INSERT INTO `tk_log` VALUES ('366', '14', '审核了该成果，审核结果为：&nbsp;审批完成同意发表', '2016-01-14 18:04:57', '225', '1', '');
INSERT INTO `tk_log` VALUES ('367', '14', '提交了审核', '2016-01-14 18:05:05', '226', '1', '');
INSERT INTO `tk_log` VALUES ('368', '16', '提交了审核', '2016-01-14 18:14:23', '227', '1', '');
INSERT INTO `tk_log` VALUES ('369', '13', '提交了审核', '2016-01-14 18:14:59', '228', '1', '');
INSERT INTO `tk_log` VALUES ('370', '13', '将任务转让给&nbsp;王伟明', '2016-01-14 18:15:52', '227', '1', '');
INSERT INTO `tk_log` VALUES ('371', '15', '将审批转让给&nbsp;高明', '2016-01-14 18:47:00', '227', '1', '');
INSERT INTO `tk_log` VALUES ('372', '2', '提交了审核', '2016-02-28 10:41:04', '229', '1', '');
INSERT INTO `tk_log` VALUES ('373', '13', '审核了该成果，审核结果为：&nbsp;审批完成发我本人vqab', '2016-02-28 10:44:31', '229', '1', '');
INSERT INTO `tk_log` VALUES ('374', '13', '提交了审核', '2016-02-28 10:45:40', '230', '1', '');
INSERT INTO `tk_log` VALUES ('375', '14', '审核了该成果，审核结果为：&nbsp;审批完成f a', '2016-02-28 10:46:21', '230', '1', '');
INSERT INTO `tk_log` VALUES ('376', '2', '提交了审核', '2016-03-09 10:45:12', '231', '1', '');
INSERT INTO `tk_log` VALUES ('377', '1', '提交了审核', '2016-03-09 10:49:38', '232', '1', '');
INSERT INTO `tk_log` VALUES ('378', '8', '提交了审核', '2016-03-09 10:52:26', '233', '1', '');
INSERT INTO `tk_log` VALUES ('379', '13', '提交了审核', '2016-03-09 10:54:07', '234', '1', '');
INSERT INTO `tk_log` VALUES ('380', '13', '提交了审核', '2016-04-18 11:53:03', '235', '1', '');
INSERT INTO `tk_log` VALUES ('381', '8', '提交了审核', '2016-04-25 15:08:08', '236', '1', '');
INSERT INTO `tk_log` VALUES ('382', '13', '审核了该成果，审核结果为：&nbsp;审批完成同意发表', '2016-04-25 15:08:46', '236', '1', '');
INSERT INTO `tk_log` VALUES ('383', '17', '提交了审核', '2016-07-24 10:46:39', '237', '1', '');
INSERT INTO `tk_log` VALUES ('384', '13', '提交了审核', '2016-07-24 10:48:20', '238', '1', '');

-- ----------------------------
-- Table structure for `tk_manhour`
-- ----------------------------
DROP TABLE IF EXISTS `tk_manhour`;
CREATE TABLE `tk_manhour` (
  `MHID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `manhour` text,
  `mh_year` text,
  `mh_mouth` text,
  `mh_backup1` text,
  `mh_backup2` text,
  PRIMARY KEY (`MHID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_manhour
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tk_menu`;
CREATE TABLE `tk_menu` (
  `meid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_menu_title_cn` text,
  `tk_menu_title_en` text,
  `tk_menu_text_cn` text,
  `tk_menu_text_en` text,
  `tk_menu_sort` text,
  `tk_menu_status` text,
  `tk_menu_backup1` text,
  `tk_menu_backup2` text,
  PRIMARY KEY (`meid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_message`
-- ----------------------------
DROP TABLE IF EXISTS `tk_message`;
CREATE TABLE `tk_message` (
  `meid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_mess_touser` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_mess_fromuser` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_mess_title` text CHARACTER SET utf8 NOT NULL,
  `tk_mess_text` text CHARACTER SET utf8,
  `tk_mess_status` tinyint(2) NOT NULL DEFAULT '1',
  `tk_mess_type` tinyint(2) NOT NULL DEFAULT '0',
  `tk_mess_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`meid`),
  KEY `tk_mess_touser` (`tk_mess_touser`),
  KEY `tk_mess_fromuser` (`tk_mess_fromuser`)
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tk_message
-- ----------------------------
INSERT INTO `tk_message` VALUES ('330', '13', '17', ' <a href=\'project_view.php?recordID=106&pagetab=mtask\'>阿凡达</a>', null, '1', '0', '2016-07-24 10:46:39');
INSERT INTO `tk_message` VALUES ('331', '14', '13', ' <a href=\'project_view.php?recordID=106&pagetab=mtask\'>阿凡达</a>', null, '1', '0', '2016-07-24 10:48:20');

-- ----------------------------
-- Table structure for `tk_mul`
-- ----------------------------
DROP TABLE IF EXISTS `tk_mul`;
CREATE TABLE `tk_mul` (
  `muid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_mul_title` text,
  `tk_mul_zh_cn` text,
  `tk_mul_en_us` text,
  `tk_mul_other` text,
  `tk_mul_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_mul_backup1` text,
  `tk_mul_backup2` text,
  PRIMARY KEY (`muid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_mul
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_project`
-- ----------------------------
DROP TABLE IF EXISTS `tk_project`;
CREATE TABLE `tk_project` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(80) NOT NULL,
  `project_code` varchar(60) NOT NULL,
  `project_text` text NOT NULL,
  `project_type` tinyint(2) NOT NULL DEFAULT '0',
  `project_from` varchar(60) NOT NULL,
  `project_from_user` varchar(60) NOT NULL,
  `project_from_contact` text NOT NULL,
  `project_start` date NOT NULL DEFAULT '0000-00-00',
  `project_end` date NOT NULL DEFAULT '0000-00-00',
  `project_to_dept` varchar(60) NOT NULL,
  `project_to_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `project_status` smallint(4) NOT NULL DEFAULT '0',
  `project_remark` varchar(60) NOT NULL,
  `project_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_hk_pd` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_project
-- ----------------------------
INSERT INTO `tk_project` VALUES ('71', '', '', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '2015-10-23 20:43:23', '');
INSERT INTO `tk_project` VALUES ('72', '', '', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '2015-10-23 23:05:36', '');
INSERT INTO `tk_project` VALUES ('73', '', '', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '2015-10-23 23:05:37', '');
INSERT INTO `tk_project` VALUES ('74', '', '', '', '0', '', '', '', '0000-00-00', '0000-00-00', '', '0', '0', '', '2015-10-23 23:05:40', '');
INSERT INTO `tk_project` VALUES ('81', 'adf ddfafadf', '邹喜', '', '0', '', '', '', '2016-01-01', '2016-01-31', '', '21', '2', '', '2016-01-01 15:42:37', null);

-- ----------------------------
-- Table structure for `tk_project_sub`
-- ----------------------------
DROP TABLE IF EXISTS `tk_project_sub`;
CREATE TABLE `tk_project_sub` (
  `id` bigint(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `project_pid` text,
  `project_name` text,
  `project_code` text,
  `project_text` text,
  `project_type` text,
  `project_from` text,
  `project_from_user` text,
  `project_from_contact` text,
  `project_start` text,
  `project_end` text,
  `project_to_dept` text,
  `project_to_user` text,
  `project_status` longtext,
  `project_remark` text,
  `project_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_sub_backup1` text,
  `project_sub_backup2` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_project_sub
-- ----------------------------
INSERT INTO `tk_project_sub` VALUES ('000045', '00033', '其他', null, null, '', null, null, null, null, null, '', '', '', null, '2010-02-28 20:15:36', null, null);

-- ----------------------------
-- Table structure for `tk_status`
-- ----------------------------
DROP TABLE IF EXISTS `tk_status`;
CREATE TABLE `tk_status` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `task_status` varchar(60) NOT NULL,
  `task_status_display` varchar(255) NOT NULL,
  `task_status_backup1` bigint(20) NOT NULL DEFAULT '0',
  `task_status_backup2` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_status
-- ----------------------------
INSERT INTO `tk_status` VALUES ('2', '已提交老师审批', '<div style=\'background-color: #996699; width:100%; text-align:center;\'>已提交老师审批</div>', '1', '0');
INSERT INTO `tk_status` VALUES ('4', '指导老师已审批', '<div style=\'background-color:#9F0; width:100%; text-align:center;\'>指导老师已审批</div>', '2', '0');
INSERT INTO `tk_status` VALUES ('6', '李传煌老师已审批', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>李传煌老师已审批</div>', '4', '0');
INSERT INTO `tk_status` VALUES ('7', '高明老师已审批', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>高明老师已审批</div>', '5', '0');
INSERT INTO `tk_status` VALUES ('22', '王伟明老师已审批', '<div style=\'background-color:#9F0; width:100%; text-align:center;\'>王伟明老师已审批</div>', '9', '0');
INSERT INTO `tk_status` VALUES ('25', '审批完成', '<div style=\'background-color: #F0F0F0; width:100%;text-align:center;\'><font color=\"#000000\">审批成功</font></div>', '12', '1');
INSERT INTO `tk_status` VALUES ('26', '驳回', '<div style=\'background-color: red; width:100%; text-align:center;\'>驳回</div>\r\n', '13', '1');

-- ----------------------------
-- Table structure for `tk_status_project`
-- ----------------------------
DROP TABLE IF EXISTS `tk_status_project`;
CREATE TABLE `tk_status_project` (
  `psid` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `task_status` varchar(60) NOT NULL,
  `task_status_display` varchar(255) NOT NULL,
  `task_status_pbackup1` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`psid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_status_project
-- ----------------------------
INSERT INTO `tk_status_project` VALUES ('2', '论文事务', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>论文事务</div>', '1');
INSERT INTO `tk_status_project` VALUES ('4', '专利事务', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>专利事务</div>', '2');
INSERT INTO `tk_status_project` VALUES ('5', '软著事务', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>软著事务</div>', '3');

-- ----------------------------
-- Table structure for `tk_task`
-- ----------------------------
DROP TABLE IF EXISTS `tk_task`;
CREATE TABLE `tk_task` (
  `TID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `csa_from_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_from_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_to_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_to_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_year` smallint(5) NOT NULL DEFAULT '0',
  `csa_month` tinyint(3) NOT NULL DEFAULT '0',
  `csa_project` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_project_sub` mediumint(7) NOT NULL,
  `csa_type` smallint(4) NOT NULL DEFAULT '0',
  `csa_text` varchar(80) NOT NULL,
  `csa_priority` tinyint(3) NOT NULL,
  `csa_temp` tinyint(3) NOT NULL,
  `csa_plan_st` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_et` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_hour` bigint(20) NOT NULL DEFAULT '0',
  `csa_zixun_fei` bigint(20) DEFAULT NULL,
  `csa_yongtu_fei` varchar(80) DEFAULT NULL,
  `csa_remark1` text NOT NULL,
  `csa_remark2` smallint(4) NOT NULL DEFAULT '0',
  `csa_remark3` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `csa_remark4` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark5` varchar(300) NOT NULL DEFAULT '>>-1',
  `csa_remark6` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark7` varchar(60) NOT NULL,
  `csa_remark8` text,
  `test01` varchar(60) NOT NULL,
  `test02` varchar(100) NOT NULL,
  `test03` varchar(60) NOT NULL,
  `test04` varchar(60) NOT NULL,
  `csa_create_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TID`),
  KEY `touser_st_et` (`csa_to_user`,`csa_plan_st`,`csa_plan_et`),
  KEY `fruser` (`csa_from_user`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task
-- ----------------------------
INSERT INTO `tk_task` VALUES ('237', '1', '17', '1', '13', '0', '0', '106', '0', '2', '阿凡达', '4', '5', '2016-07-24', '2016-07-24', '1000', null, null, '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', '打发', '', '', '17', '17', '2016-07-24 10:46:38');
INSERT INTO `tk_task` VALUES ('238', '1', '13', '1', '14', '0', '0', '106', '0', '2', '阿凡达', '3', '5', '2016-07-24', '2016-07-27', '1564', null, null, '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', 'af ', '', '', '13', '13', '2016-07-24 10:48:20');

-- ----------------------------
-- Table structure for `tk_task3`
-- ----------------------------
DROP TABLE IF EXISTS `tk_task3`;
CREATE TABLE `tk_task3` (
  `TID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `csa_from_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_from_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_to_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_to_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_year` smallint(5) NOT NULL DEFAULT '0',
  `csa_month` tinyint(3) NOT NULL DEFAULT '0',
  `csa_project` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_project_sub` mediumint(7) NOT NULL,
  `csa_type` smallint(4) NOT NULL DEFAULT '0',
  `csa_text` varchar(80) NOT NULL,
  `csa_priority` tinyint(3) NOT NULL,
  `csa_temp` tinyint(3) NOT NULL,
  `csa_plan_st` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_et` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_hour` float(20,1) NOT NULL DEFAULT '0.0',
  `csa_remark1` text NOT NULL,
  `csa_remark2` smallint(4) NOT NULL DEFAULT '0',
  `csa_remark3` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `csa_remark4` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark5` varchar(300) NOT NULL DEFAULT '>>-1',
  `csa_remark6` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark7` varchar(60) NOT NULL,
  `csa_remark8` text,
  `test01` varchar(60) NOT NULL,
  `test02` varchar(100) NOT NULL,
  `test03` varchar(60) NOT NULL,
  `test04` varchar(60) NOT NULL,
  `csa_create_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TID`),
  KEY `touser_st_et` (`csa_to_user`,`csa_plan_st`,`csa_plan_et`),
  KEY `fruser` (`csa_from_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task3
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_task_byday`
-- ----------------------------
DROP TABLE IF EXISTS `tk_task_byday`;
CREATE TABLE `tk_task_byday` (
  `tbid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `csa_tb_year` varchar(20) NOT NULL,
  `csa_tb_status` smallint(4) NOT NULL DEFAULT '0',
  `csa_tb_manhour` float(20,1) NOT NULL DEFAULT '0.0',
  `csa_tb_text` text NOT NULL,
  `csa_tb_comment` smallint(5) NOT NULL DEFAULT '0',
  `csa_tb_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `csa_tb_backup1` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_tb_backup2` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_tb_backup3` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_tb_backup4` smallint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task_byday
-- ----------------------------
INSERT INTO `tk_task_byday` VALUES ('1', '20150519', '2', '0.0', '今天审批了岑利杰的论文', '0', '2015-05-19 20:01:53', '4', '3', '5', '20');

-- ----------------------------
-- Table structure for `tk_task_copy`
-- ----------------------------
DROP TABLE IF EXISTS `tk_task_copy`;
CREATE TABLE `tk_task_copy` (
  `TID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `csa_from_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_from_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_to_dept` mediumint(6) NOT NULL DEFAULT '0',
  `csa_to_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_year` smallint(5) NOT NULL DEFAULT '0',
  `csa_month` tinyint(3) NOT NULL DEFAULT '0',
  `csa_project` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_project_sub` mediumint(7) NOT NULL,
  `csa_type` smallint(4) NOT NULL DEFAULT '0',
  `csa_text` varchar(80) NOT NULL,
  `csa_priority` tinyint(3) NOT NULL,
  `csa_temp` tinyint(3) NOT NULL,
  `csa_plan_st` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_et` date NOT NULL DEFAULT '0000-00-00',
  `csa_plan_hour` float(20,1) NOT NULL DEFAULT '0.0',
  `csa_remark1` text NOT NULL,
  `csa_remark2` smallint(4) NOT NULL DEFAULT '0',
  `csa_remark3` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `csa_remark4` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark5` varchar(300) NOT NULL DEFAULT '>>-1',
  `csa_remark6` bigint(20) NOT NULL DEFAULT '-1',
  `csa_remark7` varchar(60) NOT NULL,
  `csa_remark8` text,
  `test01` varchar(60) NOT NULL,
  `test02` varchar(100) NOT NULL,
  `test03` varchar(60) NOT NULL,
  `test04` varchar(60) NOT NULL,
  `csa_create_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `csa_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TID`),
  KEY `touser_st_et` (`csa_to_user`,`csa_plan_st`,`csa_plan_et`),
  KEY `fruser` (`csa_from_user`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task_copy
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_task_tpye`
-- ----------------------------
DROP TABLE IF EXISTS `tk_task_tpye`;
CREATE TABLE `tk_task_tpye` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `task_tpye` varchar(60) NOT NULL,
  `tk_task_typerank` varchar(60) NOT NULL,
  `task_tpye_backup1` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task_tpye
-- ----------------------------
INSERT INTO `tk_task_tpye` VALUES ('2', '论文', '', '2');
INSERT INTO `tk_task_tpye` VALUES ('3', '专利', '', '3');
INSERT INTO `tk_task_tpye` VALUES ('7', '软著', '', '4');

-- ----------------------------
-- Table structure for `tk_team`
-- ----------------------------
DROP TABLE IF EXISTS `tk_team`;
CREATE TABLE `tk_team` (
  `pid` bigint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tk_team_title` text,
  `tk_team_title_en` varchar(200) DEFAULT NULL,
  `tk_team_backup1` text,
  `tk_team_backup2` text,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_team
-- ----------------------------

-- ----------------------------
-- Table structure for `tk_user`
-- ----------------------------
DROP TABLE IF EXISTS `tk_user`;
CREATE TABLE `tk_user` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tk_user_login` varchar(60) NOT NULL DEFAULT '',
  `tk_user_pass` varchar(64) NOT NULL DEFAULT '',
  `tk_user_token` varchar(60) NOT NULL DEFAULT '0',
  `tk_display_name` varchar(50) NOT NULL DEFAULT '',
  `pid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tk_user_status` varchar(60) NOT NULL DEFAULT '',
  `tk_user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tk_user_remark` text NOT NULL,
  `tk_user_rank` tinyint(2) NOT NULL DEFAULT '0',
  `tk_user_contact` varchar(50) NOT NULL DEFAULT '',
  `tk_user_email` varchar(100) NOT NULL DEFAULT '',
  `tk_user_message` bigint(20) NOT NULL DEFAULT '0',
  `tk_user_backup1` varchar(60) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_user
-- ----------------------------
INSERT INTO `tk_user` VALUES ('1', 'admin', 'a6ec5a7b854d204b74cd90a8306a957e', '0', 'Admin', '1', '管理员', '2015-05-19 19:48:36', '', '5', '', '', '2', '');
INSERT INTO `tk_user` VALUES ('10', 'lichuanhuang', 'e10adc3949ba59abbe56e057f20f883e', '0', '李传煌', '0', '', '2016-01-01 16:19:26', '', '5', '', '', '0', '');
INSERT INTO `tk_user` VALUES ('13', 'lilaoshi', 'e10adc3949ba59abbe56e057f20f883e', '0', '李传煌', '0', '', '2016-07-24 10:47:48', '', '5', '', '', '330', '');
INSERT INTO `tk_user` VALUES ('14', 'gaolaoshi', 'e10adc3949ba59abbe56e057f20f883e', '0', '高明', '0', '', '2016-07-21 09:26:15', '', '4', '', '', '328', '');
INSERT INTO `tk_user` VALUES ('15', 'wanglaoshi', 'e10adc3949ba59abbe56e057f20f883e', '0', '王伟明', '0', '', '2016-01-14 18:17:38', '', '4', '', '', '321', '');
INSERT INTO `tk_user` VALUES ('17', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0', '小红', '0', '', '2016-07-24 10:40:35', '', '3', '', '', '0', '');
