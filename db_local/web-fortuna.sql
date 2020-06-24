/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : web-fortuna

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 24/06/2020 19:37:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `price` int(50) NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES (1, 'Standar', 'Standar', 300000, 'DQoOCdgFqIyFSLCTphvauBcctBHTfTANSRrJKe9W.jpeg');
INSERT INTO `classes` VALUES (2, 'Superior', 'Superior', 350000, '4egiHfvGyYYVHDFTiEwhzC6KcaqC1EIJsnIWzArA.jpeg');
INSERT INTO `classes` VALUES (3, 'Deluxe', 'Deluxe', 400000, 'qLzWUUFlTH3GMX288NvXl9fjKbx5vEJlfcmjcG5D.jpeg');
INSERT INTO `classes` VALUES (4, 'Sweet', 'Sweet', 500000, 'superior-king1-standard.jpg');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `title` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `birthday` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `profesion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 13, 'mr', 'Nazmudin', '1996-05-31', 'alkhamilnaz@gmail.com', '08568029330', 'Jalan raya cibeber km 17 no 27', 'Programmer');
INSERT INTO `customers` VALUES (2, 14, 'miss', 'Anngi', '2000-10-20', 'anggi@gmail.com', '08989787', 'Jalan raya cibatok', 'Koki');
INSERT INTO `customers` VALUES (3, 15, 'mr', 'chandra', '1998-10-20', 'chan@email.com', '08989897979', 'Jalan raya nangka ', 'Programmer');

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` int(1) NULL DEFAULT NULL COMMENT '1: Available\r\n0: Not Available',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for reservations
-- ----------------------------
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NULL DEFAULT NULL,
  `room_id` int(11) NULL DEFAULT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  `checkin_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `checkout_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservations
-- ----------------------------
INSERT INTO `reservations` VALUES (12, 1, 10, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'chan@email.com', '08989897979', 0, '2020-06-24');
INSERT INTO `reservations` VALUES (13, 3, 9, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'chan@email.com', '08989897979', 0, '2020-06-24');

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NULL DEFAULT NULL,
  `number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL COMMENT '1: Available\r\n0: Not Available',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (9, 3, '302', 'Mawar', 1);
INSERT INTO `rooms` VALUES (10, 1, '304', 'Power', 1);
INSERT INTO `rooms` VALUES (11, 2, '009', 'Bangke', 1);
INSERT INTO `rooms` VALUES (12, 4, '167', 'Sweet Room', 1);
INSERT INTO `rooms` VALUES (13, 3, '009', 'Ketika', 1);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NULL DEFAULT NULL,
  `code` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bukti_transfer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `amount` double(50, 0) NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (12, 12, 'TRX/2020-06-2412', 'mandiri', '0', 'Kuesioner4.png', 300000, '2020-06-24');
INSERT INTO `transactions` VALUES (13, 13, 'TRX/2020-06-2413', 'mandiri', '0', 'Laporan_Gap_per_Dimensi1.png', 400000, '2020-06-24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'admin\r\npengguna',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (13, 'alkhamil', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer');
INSERT INTO `users` VALUES (14, 'anggi', 'anggi@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer');
INSERT INTO `users` VALUES (15, 'chan', 'chan@email.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer');
INSERT INTO `users` VALUES (17, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
