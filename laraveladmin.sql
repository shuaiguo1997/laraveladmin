/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : laraveladmin

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 13/08/2021 16:03:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for managers
-- ----------------------------
DROP TABLE IF EXISTS `managers`;
CREATE TABLE `managers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id主键',
  `username` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名称',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '状态',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `createtime` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of managers
-- ----------------------------
INSERT INTO `managers` VALUES (1, 'admin', '$2y$10$RhxNmxmriI/rsyoGMyYQ/.MQWeAf2.un/4OnIR0tnH9hwpjhMAmGm', 1, 1, '1623916903');

-- ----------------------------
-- Table structure for menulist
-- ----------------------------
DROP TABLE IF EXISTS `menulist`;
CREATE TABLE `menulist`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '菜单名称',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '父级ID,为0时是第一级',
  `url` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接地址',
  `icon` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签',
  `create_time` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menulist
-- ----------------------------
INSERT INTO `menulist` VALUES (1, '管理员管理', 0, 'Manager', 'layui-icon-username', '1626335930');
INSERT INTO `menulist` VALUES (2, '管理员列表', 1, 'Manager/index', 'layui-icon-spread-left', '1626335989');
INSERT INTO `menulist` VALUES (3, '菜单管理', 1, 'Menulist/index', 'layui-icon-login-qq', '1626336162');
INSERT INTO `menulist` VALUES (4, '角色管理', 1, 'Role/index', 'layui-icon-login-wechat', '1626336222');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (6, '2021_06_16_022611_create_managers_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_06_21_031913_create_menulist_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_07_15_090000_create_role_table', 2);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `menu_id` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '权限菜单ID',
  `createtime` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, '超级管理员', '1,2,3,4', '0');
INSERT INTO `role` VALUES (2, '测试角色', '1,2,3,4', '0');
INSERT INTO `role` VALUES (3, '测试2', '1,2,3,4', '0');
INSERT INTO `role` VALUES (4, '测试3', '1,2,3,4', '0');
INSERT INTO `role` VALUES (5, '测试4', '1,2,3,4', '0');
INSERT INTO `role` VALUES (6, 'ces6', '1,2,3,4', '0');
INSERT INTO `role` VALUES (7, 'ces7', '1,2,3,4', '0');
INSERT INTO `role` VALUES (8, 'ces81', '1,2,4', '0');

SET FOREIGN_KEY_CHECKS = 1;
