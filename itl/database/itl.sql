/*
Navicat MySQL Data Transfer

Source Server         : localhost_mysql
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : itl

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-07-21 09:31:39
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_announcement
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_comment
-- ----------------------------
INSERT INTO `tk_comment` VALUES ('1', 'daf&nbsp;', '', '1', '1', '10', '2016-01-09 15:48:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
INSERT INTO `tk_item` VALUES ('7', 'mail_create', 'on', '新任务提醒', '当有新任务到达时提醒任务执行人 \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-08 15:48:43');
INSERT INTO `tk_item` VALUES ('8', 'mail_update', 'on', '任务更新提醒', '当任务状态更新时提醒任务负责人(来自谁) \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-09 15:43:36');
INSERT INTO `tk_item` VALUES ('9', 'mail_comment', 'on', '新备注提醒', '当任务有新备注时提醒任务执行人 \"on\" 为启用该功能, \"off\" 为禁用该功能', 'setting_mail', '2016-01-09 15:43:43');
INSERT INTO `tk_item` VALUES ('10', 'mail_host', 'smtp.sina.com', 'SMTP邮件服务器', 'SMTP邮件服务器地址,如:smtp.sina.com', 'setting_mail', '2016-01-08 16:17:03');
INSERT INTO `tk_item` VALUES ('11', 'mail_port', '25', 'SMTP邮件服务器端口', 'SMTP邮件服务器的端口号,默认为25，无需修改', 'setting_mail', '2012-06-16 23:00:04');
INSERT INTO `tk_item` VALUES ('12', 'mail_username', 'itlsystem@sina.com', '用户名', '用户名:邮件帐号的用户名,如使用新浪邮箱，请填写完整的邮件地址,如: yourname@sina.com', 'setting_mail', '2016-01-08 16:28:27');
INSERT INTO `tk_item` VALUES ('13', 'mail_password', 'itl123456', '密码', '密码:邮件帐号的密码', 'setting_mail', '2016-01-08 16:28:38');
INSERT INTO `tk_item` VALUES ('14', 'mail_from', 'itlsystem@sina.com', '发送邮件的邮箱', '发送邮件的邮箱,如: yourname@sina.com', 'setting_mail', '2016-01-08 16:29:03');
INSERT INTO `tk_item` VALUES ('15', 'mail_fromname', 'WSS', '显示名称', '邮件发送人的显示名称', 'setting_mail', '2012-06-16 22:57:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_log
-- ----------------------------
INSERT INTO `tk_log` VALUES ('1', '1', '创建了任务', '2016-01-08 15:49:24', '1', '1', '');
INSERT INTO `tk_log` VALUES ('2', '1', '创建了任务', '2016-01-08 15:51:35', '2', '1', '');
INSERT INTO `tk_log` VALUES ('3', '1', '创建了任务', '2016-01-08 15:57:19', '3', '1', '');
INSERT INTO `tk_log` VALUES ('4', '1', '创建了任务', '2016-01-08 16:04:55', '4', '1', '');
INSERT INTO `tk_log` VALUES ('5', '2', '创建了任务', '2016-01-08 16:07:17', '5', '1', '');
INSERT INTO `tk_log` VALUES ('6', '1', '创建了任务', '2016-01-08 16:16:20', '6', '1', '');
INSERT INTO `tk_log` VALUES ('7', '1', '创建了任务', '2016-01-08 16:30:12', '7', '1', '');
INSERT INTO `tk_log` VALUES ('8', '1', '创建了任务', '2016-01-08 16:32:18', '8', '1', '');
INSERT INTO `tk_log` VALUES ('9', '1', '创建了任务', '2016-01-08 16:33:23', '9', '1', '');
INSERT INTO `tk_log` VALUES ('10', '1', '审核了任务，审核结果为：&nbsp;完成验收', '2016-01-09 15:43:12', '1', '1', '');
INSERT INTO `tk_log` VALUES ('11', '1', '创建了任务', '2016-01-09 15:45:21', '10', '1', '');
INSERT INTO `tk_log` VALUES ('12', '1', '审核了任务，审核结果为：&nbsp;完成验收', '2016-01-09 15:47:28', '10', '1', '');
INSERT INTO `tk_log` VALUES ('13', '1', '创建了任务', '2016-01-09 15:50:06', '11', '1', '');
INSERT INTO `tk_log` VALUES ('14', '1', '审核了任务，审核结果为：&nbsp;完成验收', '2016-01-09 15:50:29', '11', '1', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tk_message
-- ----------------------------
INSERT INTO `tk_message` VALUES ('1', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=3&pagetab=mtask\'>afa </a>', null, '1', '0', '2016-01-08 15:57:19');
INSERT INTO `tk_message` VALUES ('2', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=4&pagetab=mtask\'>gsg</a>', null, '1', '0', '2016-01-08 16:04:56');
INSERT INTO `tk_message` VALUES ('3', '1', '2', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=5&pagetab=mtask\'>adfa </a>', null, '1', '0', '2016-01-08 16:07:17');
INSERT INTO `tk_message` VALUES ('4', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=6&pagetab=mtask\'>啊发的</a>', null, '1', '0', '2016-01-08 16:16:20');
INSERT INTO `tk_message` VALUES ('5', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=7&pagetab=mtask\'>saf </a>', null, '1', '0', '2016-01-08 16:30:12');
INSERT INTO `tk_message` VALUES ('6', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=8&pagetab=mtask\'>dsgf </a>', null, '1', '0', '2016-01-08 16:32:18');
INSERT INTO `tk_message` VALUES ('7', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=9&pagetab=mtask\'>adsf </a>', null, '1', '0', '2016-01-08 16:33:23');
INSERT INTO `tk_message` VALUES ('8', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=10&pagetab=mtask\'>daf </a>', null, '1', '0', '2016-01-09 15:45:21');
INSERT INTO `tk_message` VALUES ('9', '2', '1', '审核了您的任务: <a href=\'default_task_edit.php?editID=10&pagetab=mtask\'>daf </a>', null, '1', '0', '2016-01-09 15:47:28');
INSERT INTO `tk_message` VALUES ('10', '2', '1', '评论了您的任务: <a href=\'default_task_edit.php?editID=10&pagetab=mtask#comment\'>daf </a>', null, '1', '0', '2016-01-09 15:48:46');
INSERT INTO `tk_message` VALUES ('11', '2', '1', '指派给您一个新任务: <a href=\'default_task_edit.php?editID=11&pagetab=mtask\'>sg </a>', null, '1', '0', '2016-01-09 15:50:06');
INSERT INTO `tk_message` VALUES ('12', '2', '1', '审核了您的任务: <a href=\'default_task_edit.php?editID=11&pagetab=mtask\'>sg </a>', null, '1', '0', '2016-01-09 15:50:29');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_project
-- ----------------------------
INSERT INTO `tk_project` VALUES ('1', '非项目任务', 'Other', '非项目任务，如：公司总体会议、请假等。', '0', '', '', '', '0000-00-00', '0000-00-00', '0001', '1', '23', '', '2013-05-02 11:22:29');
INSERT INTO `tk_project` VALUES ('2', 'dsfa dfad asf ', 'df ', '', '0', '', '', '', '2016-01-09', '2016-01-19', '', '1', '2', '', '2016-01-09 15:45:02');

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
INSERT INTO `tk_status` VALUES ('2', '未开始', '<div style=\'background-color: #996699; width:100%; text-align:center;\'>未开始</div>', '1', '0');
INSERT INTO `tk_status` VALUES ('4', '计划', '<div style=\'background-color: #996699; width:100%; text-align:center;\'>计划</div>', '2', '0');
INSERT INTO `tk_status` VALUES ('5', '进行中', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>进行中</div>', '3', '0');
INSERT INTO `tk_status` VALUES ('6', '进行中20%', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>进行中20%</div>', '4', '0');
INSERT INTO `tk_status` VALUES ('7', '进行中40%', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>进行中40%</div>', '5', '0');
INSERT INTO `tk_status` VALUES ('8', '进行中60%', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>进行中60%</div>', '6', '0');
INSERT INTO `tk_status` VALUES ('9', '进行中80%', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>进行中80%</div>', '7', '0');
INSERT INTO `tk_status` VALUES ('14', '完成100%', '<div style=\'background-color: #090; width:100%; text-align:center;\'>完成100%</div>', '8', '0');
INSERT INTO `tk_status` VALUES ('22', '中断', '<div style=\'background-color: red; width:100%; text-align:center;\'>中断</div>', '9', '0');
INSERT INTO `tk_status` VALUES ('23', '推迟', '<div style=\'background-color: #FC0; width:100%; text-align:center;\'>推迟</div>', '10', '0');
INSERT INTO `tk_status` VALUES ('24', '请假', '<div style=\'background-color: #FFFF00; width:100%; text-align:center;\'>请假</div>', '11', '0');
INSERT INTO `tk_status` VALUES ('25', '完成验收', '<div style=\'background-color: #336699; width:100%; text-align:center;\'>完成验收</div>', '12', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_status_project
-- ----------------------------
INSERT INTO `tk_status_project` VALUES ('2', '项目争取中', '<div style=\'background-color: #996699; width:100%; text-align:center;\'>项目争取中</div>', '1');
INSERT INTO `tk_status_project` VALUES ('4', '需求调研阶段', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>需求调研阶段</div>', '2');
INSERT INTO `tk_status_project` VALUES ('5', '设计阶段', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>设计阶段</div>', '3');
INSERT INTO `tk_status_project` VALUES ('6', '开发阶段', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>开发阶段</div>', '4');
INSERT INTO `tk_status_project` VALUES ('7', '测试阶段', '<div style=\'background-color: #9F0; width:100%; text-align:center;\'>测试阶段</div>', '4');
INSERT INTO `tk_status_project` VALUES ('8', '部署阶段', '<div style=\'background-color: #090; width:100%; text-align:center;\'>部署阶段</div>', '5');
INSERT INTO `tk_status_project` VALUES ('9', '项目已结束', '<div style=\'background-color: #ccc; width:100%; text-align:center;\'>项目已结束</div>', '6');
INSERT INTO `tk_status_project` VALUES ('14', '项目中断', '<div style=\'background-color: red; width:100%; text-align:center;\'>项目中断</div>', '7');
INSERT INTO `tk_status_project` VALUES ('22', '推迟', '<div style=\'background-color: #FC0; width:100%; text-align:center;\'>推迟</div>', '8');
INSERT INTO `tk_status_project` VALUES ('23', '非项目', '<div style=\'background-color: #996699; width:100%; text-align:center;\'>非项目</div>', '9');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task
-- ----------------------------
INSERT INTO `tk_task` VALUES ('1', '1', '1', '1', '1', '0', '0', '1', '0', '20', 'asrfa ', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '25', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', null, '', '', '', '', '1', '1', '2016-01-09 15:43:12');
INSERT INTO `tk_task` VALUES ('2', '1', '1', '1', '1', '0', '0', '1', '0', '20', 'dfa ', '3', '3', '2016-01-08', '2016-01-09', '1000.0', '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', '', '', '', '1', '1', '2016-01-08 15:51:35');
INSERT INTO `tk_task` VALUES ('3', '1', '1', '1', '2', '0', '0', '1', '0', '19', 'afa ', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', '', '', '', '1', '1', '2016-01-08 15:57:18');
INSERT INTO `tk_task` VALUES ('4', '1', '1', '1', '2', '0', '0', '1', '0', '20', 'gsg', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', '', '', '', '1', '1', '2016-01-08 16:04:55');
INSERT INTO `tk_task` VALUES ('5', '1', '2', '1', '1', '0', '0', '1', '0', '20', 'adfa ', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '2', '0000-00-00 00:00:00', '3', '3>2', '2', '', '', '', '', '', '', '2', '2', '2016-01-08 16:07:17');
INSERT INTO `tk_task` VALUES ('6', '1', '1', '1', '2', '0', '0', '1', '0', '20', '啊发的', '3', '3', '2016-01-08', '2016-01-09', '12.0', '', '2', '0000-00-00 00:00:00', '5', '3>2>5>3', '3', '', '', '', '', '', '', '1', '1', '2016-01-08 16:16:20');
INSERT INTO `tk_task` VALUES ('7', '1', '1', '1', '2', '0', '0', '1', '0', '20', 'saf ', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '2', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', '', '', '', '', '', '1', '1', '2016-01-08 16:30:12');
INSERT INTO `tk_task` VALUES ('8', '1', '1', '1', '2', '0', '0', '1', '0', '20', 'dsgf ', '3', '3', '2016-01-08', '2016-01-09', '1.0', '', '6', '0000-00-00 00:00:00', '2', '2>2', '2', '', '', '', '', '', '', '1', '1', '2016-01-08 16:32:18');
INSERT INTO `tk_task` VALUES ('9', '1', '1', '1', '2', '0', '0', '1', '0', '20', 'adsf ', '3', '3', '2016-01-08', '2016-01-09', '12.0', '', '2', '0000-00-00 00:00:00', '8', '2>2>8>3', '3', '', '', '', '', '', '', '1', '1', '2016-01-08 16:33:23');
INSERT INTO `tk_task` VALUES ('10', '1', '1', '1', '2', '0', '0', '2', '0', '19', 'daf ', '3', '3', '2016-01-09', '2016-01-10', '554.0', '', '25', '0000-00-00 00:00:00', '-1', '>>-1', '-1', '', null, '', '', '', '', '1', '1', '2016-01-09 15:47:28');
INSERT INTO `tk_task` VALUES ('11', '1', '1', '1', '2', '0', '0', '2', '0', '7', 'sg ', '3', '3', '2016-01-09', '2016-01-10', '12.0', '', '25', '0000-00-00 00:00:00', '10', '10>2', '2', '', null, '', '', '', '', '1', '1', '2016-01-09 15:50:29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task_byday
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_task_tpye
-- ----------------------------
INSERT INTO `tk_task_tpye` VALUES ('1', '项目管理', '', '1');
INSERT INTO `tk_task_tpye` VALUES ('2', '产品设计', '', '2');
INSERT INTO `tk_task_tpye` VALUES ('3', '开发', '', '3');
INSERT INTO `tk_task_tpye` VALUES ('7', 'Bug', '', '4');
INSERT INTO `tk_task_tpye` VALUES ('8', '测试', '', '5');
INSERT INTO `tk_task_tpye` VALUES ('9', '撰写文档', '', '6');
INSERT INTO `tk_task_tpye` VALUES ('10', '需求调研', '', '7');
INSERT INTO `tk_task_tpye` VALUES ('12', '会议', '', '8');
INSERT INTO `tk_task_tpye` VALUES ('14', '请假', '', '9');
INSERT INTO `tk_task_tpye` VALUES ('15', '加班', '', '10');
INSERT INTO `tk_task_tpye` VALUES ('16', '其他', '', '11');
INSERT INTO `tk_task_tpye` VALUES ('19', '控制账户', '', '0');
INSERT INTO `tk_task_tpye` VALUES ('20', '子项目', '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tk_user
-- ----------------------------
INSERT INTO `tk_user` VALUES ('1', 'admin', 'a6ec5a7b854d204b74cd90a8306a957e', '0', 'Admin', '1', '管理员', '2015-05-19 19:48:36', '', '5', '', '', '2', '');
INSERT INTO `tk_user` VALUES ('2', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0', 'zouxi', '0', '', '2015-12-30 16:39:07', '', '5', '', '', '4', '');
INSERT INTO `tk_user` VALUES ('8', 'zouxi', 'e10adc3949ba59abbe56e057f20f883e', '0', '邹喜', '0', '', '2016-07-21 09:26:21', '', '5', '', '', '0', '');
INSERT INTO `tk_user` VALUES ('10', 'lichuanhuang', 'e10adc3949ba59abbe56e057f20f883e', '0', '李传煌', '0', '', '2016-01-01 16:19:26', '', '5', '', '', '0', '');
INSERT INTO `tk_user` VALUES ('13', '123', 'e10adc3949ba59abbe56e057f20f883e', '0', '李传煌', '0', '', '2016-07-21 09:26:12', '', '5', '', '', '329', '');
INSERT INTO `tk_user` VALUES ('14', 'gaolaoshi', 'e10adc3949ba59abbe56e057f20f883e', '0', '高明', '0', '', '2016-07-21 09:26:15', '', '4', '', '', '328', '');
INSERT INTO `tk_user` VALUES ('15', 'wanglaoshi', 'e10adc3949ba59abbe56e057f20f883e', '0', '王伟明', '0', '', '2016-01-14 18:17:38', '', '4', '', '', '321', '');
INSERT INTO `tk_user` VALUES ('16', 'cenlijie', 'e10adc3949ba59abbe56e057f20f883e', '0', '岑利杰', '0', '', '2016-01-14 17:30:15', '', '3', '', '', '0', '');

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', '123', '123');
INSERT INTO `userinfo` VALUES ('0', '', '');

-- ----------------------------
-- Table structure for `xwmi_admin`
-- ----------------------------
DROP TABLE IF EXISTS `xwmi_admin`;
CREATE TABLE `xwmi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(255) DEFAULT NULL,
  `adminpass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of xwmi_admin
-- ----------------------------
INSERT INTO `xwmi_admin` VALUES ('1', 'root', 'zouxi8352937');
INSERT INTO `xwmi_admin` VALUES ('2', 'root', '123456');
INSERT INTO `xwmi_admin` VALUES ('3', null, null);

-- ----------------------------
-- Table structure for `xwmi_news`
-- ----------------------------
DROP TABLE IF EXISTS `xwmi_news`;
CREATE TABLE `xwmi_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text` longtext,
  `jianjie` varchar(1000) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `editor` varchar(255) DEFAULT 'Admin',
  `laiyuan` varchar(255) DEFAULT '本站',
  `bianji` varchar(255) DEFAULT NULL,
  `images` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of xwmi_news
-- ----------------------------
INSERT INTO `xwmi_news` VALUES ('1', '10', '这是个新闻', null, null, '<p>\r\n	今天\r\n</p>', '\r\n	今天\r\n', '2015-05-08 11:11:21', 'Admin', '好八婆', null, '');
INSERT INTO `xwmi_news` VALUES ('2', '30', '五月二十四号', null, null, '五月二十四号，开会', '五月二十四号，开会', '2015-05-08 11:58:13', 'Admin', '邹喜', null, '');
INSERT INTO `xwmi_news` VALUES ('3', '29', '今天星期六', null, null, '<span style=\"color:#ff9900;\">nihao&nbsp; haode </span>', 'nihao&nbsp; haode ', '2015-05-09 09:31:02', 'Admin', '邹喜', null, '');
INSERT INTO `xwmi_news` VALUES ('4', '15', '今天开会', null, null, '你好', '你好', '2015-05-09 15:42:34', 'Admin', '高老师', null, '');
