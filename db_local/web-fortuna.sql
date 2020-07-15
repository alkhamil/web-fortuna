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

 Date: 15/07/2020 13:29:12
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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 13, 'mr', 'Nazmudin', '1996-05-31', 'alkhamilnaz@gmail.com', '08568029330', 'Jalan raya cibeber km 17 no 27', 'Programmer');
INSERT INTO `customers` VALUES (2, 14, 'miss', 'Anngi', '2000-10-20', 'anggi@gmail.com', '08989787', 'Jalan raya cibatok', 'Koki');
INSERT INTO `customers` VALUES (3, 15, 'mr', 'chandra', '1998-10-20', 'chan@email.com', '08989897979', 'Jalan raya nangka ', 'Programmer');
INSERT INTO `customers` VALUES (4, 19, 'mr', 'hui', '14 Jul 202', 'hui@email.cim', '090898', 'ajsjak', 'hui');
INSERT INTO `customers` VALUES (5, 20, 'mr', 'Nazmudin', '31-05-1996', 'nazmudin@imaniprima.com', '0899898', 'jalan', 'Programmer');
INSERT INTO `customers` VALUES (6, 22, 'mr', 'Rian', '31 Dec 199', 'rian@email.com', '09899898', 'jalan', 'Java');
INSERT INTO `customers` VALUES (7, 24, 'mr', 'Halim', '31 Dec 199', 'halim@email.com', '089888878787', 'Halam', 'Design');
INSERT INTO `customers` VALUES (8, 25, 'mr', 'Ramdan', '30-05-1997', 'alkhamilnaz@gmail.com', '08568029330', 'jalan', 'Programmer');
INSERT INTO `customers` VALUES (9, 26, 'miss', 'Nadia', '20-07-1997', 'vuser129@gmail.com', '089888782782', 'Jalan raya ', 'Designer');

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservations
-- ----------------------------
INSERT INTO `reservations` VALUES (12, 1, 10, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'chan@email.com', '08989897979', 2, '2020-06-24');
INSERT INTO `reservations` VALUES (13, 3, 9, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'chan@email.com', '08989897979', 2, '2020-06-24');
INSERT INTO `reservations` VALUES (14, 1, 10, 4, '14 Jul 2020', '15 Jul 2020', 'mr', 'hui', 'hui@email.cim', '090898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (15, 2, 11, 5, '14 Jul 2020', '15 Jul 2020', 'mr', 'Nazmudin', 'nazmudin@imaniprima.com', '0899898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (16, 3, 9, 5, '17 Jul 2020', '18 Jul 2020', 'mr', 'Nazmudin', 'nazmudin@imaniprima.com', '0899898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (17, 4, 12, 8, '15 Jul 2020', '17 Jul 2020', 'mr', 'Ramdan', 'alkhamilnaz@gmail.com', '08568029330', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (18, 4, 12, 8, '15 Jul 2020', '16 Jul 2020', 'mr', 'Ramdan', 'alkhamilnaz@gmail.com', '08568029330', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (19, 3, 13, 9, '15 Jul 2020', '30 Jul 2020', 'miss', 'Nadia', 'vuser129@gmail.com', '089888782782', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (20, 1, 10, 9, '15 Jul 2020', '23 Jul 2020', 'miss', 'Nadia', 'vuser129@gmail.com', '089888782782', 2, '2020-07-15');

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (12, 12, 'TRX/2020-06-2412', 'mandiri', '1', 'Kuesioner4.png', 300000, '2020-06-24');
INSERT INTO `transactions` VALUES (13, 13, 'TRX/2020-06-2413', 'mandiri', '1', 'Laporan_Gap_per_Dimensi1.png', 400000, '2020-06-24');
INSERT INTO `transactions` VALUES (14, 14, 'TRX/2020-07-1414', 'bca', '1', 'b.png', 300000, '2020-07-14');
INSERT INTO `transactions` VALUES (15, 15, 'TRX/2020-07-1415', 'mandiri', '1', 'b1.png', 350000, '2020-07-14');
INSERT INTO `transactions` VALUES (16, 16, 'TRX/2020-07-1416', 'bca', '1', 'b2.png', 400000, '2020-07-14');
INSERT INTO `transactions` VALUES (17, 17, 'TRX/2020-07-1517', 'bca', '1', 'airline.png', 1000000, '2020-07-15');
INSERT INTO `transactions` VALUES (18, 18, 'TRX/2020-07-1518', 'bca', '1', 'car.png', 500000, '2020-07-15');
INSERT INTO `transactions` VALUES (19, 19, 'TRX/2020-07-1519', 'bca', '1', 'car1.png', 6000000, '2020-07-15');
INSERT INTO `transactions` VALUES (20, 20, 'TRX/2020-07-1520', 'mandiri', '1', 'movie.png', 2400000, '2020-07-15');

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
  `status` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (13, 'alkhamil', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (14, 'anggi', 'anggi@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (15, 'chan', 'chan@email.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (17, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1);
INSERT INTO `users` VALUES (19, 'huiiii', 'hui@email.cim', 'cd5b6e2d80317ed21f50e87a0874ee5788b2dc60', 'customer', 1);
INSERT INTO `users` VALUES (20, 'nazmudin', 'nazmudin@imaniprima.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (22, 'rian', 'rian@email.com', '4116e0e25dcad2dd4b202b3eaf2b4f1ae6497e25', 'customer', 1);
INSERT INTO `users` VALUES (23, 'naz', 'naz@email.com', '4c9ddc4cc97b59d3bfcfaea0414e5604b733cc57', 'admin', 0);
INSERT INTO `users` VALUES (24, 'halim', 'halim@email.com', '4bdefa821642ad89e92e09cbc9a01e6fa559dff5', 'customer', 1);
INSERT INTO `users` VALUES (25, 'ramdan', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (26, 'nadia', 'vuser129@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);

SET FOREIGN_KEY_CHECKS = 1;
