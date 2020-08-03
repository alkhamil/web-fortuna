/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : rakacia

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 03/08/2020 20:42:52
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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `customers` VALUES (10, 27, 'mr', 'adit', '02 Mar 198', 'wahdanifakhri@gmail.com', '081288887773333', 'jalan', 'pns');
INSERT INTO `customers` VALUES (11, 29, 'mr', 'agus', '10 Feb 200', 'agus1233@gmail.com', '086666777121', 'jalan jalan', 'Mahasiswa');
INSERT INTO `customers` VALUES (12, 30, 'mr', 'ahmad', '09 Nov 200', 'ahmad123@gmail.com', '087775651221', 'jalan maroko', 'Mahasiswa');
INSERT INTO `customers` VALUES (13, 32, 'miss', 'angel', '08 Feb 200', 'angel123@gmail.com', '08777666121', 'jalan selat sunda', 'Mahasiswa');
INSERT INTO `customers` VALUES (14, 33, 'mr', 'fakhri', '27 Dec 199', 'wahdanifakhri7@gmail.com', '08777777772121', 'jalan melati', 'Mahasiswa');
INSERT INTO `customers` VALUES (15, 34, 'mr', 'Dizan', '21 Aug 199', 'dizanp@gmail.com', '087823123112', 'jln kalimalang 21\r\n', 'Mahasiswa');
INSERT INTO `customers` VALUES (16, 35, 'mr', 'sidang', '07 Jan 200', 'wahdanifakhri7@gmail.com', '087777776655', 'jalan semangka', 'Mahasiswa');

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
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservations
-- ----------------------------
INSERT INTO `reservations` VALUES (12, 1, 10, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'alkhamilnaz@gmail.com', '08989897979', 2, '2020-06-24');
INSERT INTO `reservations` VALUES (13, 3, 9, 3, '24 Jun 2020', '25 Jun 2020', 'mr', 'chandra', 'alkhamilnaz@gmail.com', '08989897979', 2, '2020-06-24');
INSERT INTO `reservations` VALUES (14, 1, 10, 4, '14 Jul 2020', '15 Jul 2020', 'mr', 'hui', 'hui@email.cim', '090898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (15, 2, 11, 5, '14 Jul 2020', '15 Jul 2020', 'mr', 'Nazmudin', 'nazmudin@imaniprima.com', '0899898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (16, 3, 9, 5, '17 Jul 2020', '18 Jul 2020', 'mr', 'Nazmudin', 'nazmudin@imaniprima.com', '0899898', 2, '2020-07-14');
INSERT INTO `reservations` VALUES (17, 4, 12, 8, '15 Jul 2020', '17 Jul 2020', 'mr', 'Ramdan', 'alkhamilnaz@gmail.com', '08568029330', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (18, 4, 12, 8, '15 Jul 2020', '16 Jul 2020', 'mr', 'Ramdan', 'alkhamilnaz@gmail.com', '08568029330', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (19, 3, 13, 9, '15 Jul 2020', '30 Jul 2020', 'miss', 'Nadia', 'vuser129@gmail.com', '089888782782', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (20, 1, 10, 9, '15 Jul 2020', '23 Jul 2020', 'miss', 'Nadia', 'vuser129@gmail.com', '089888782782', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (21, 3, 9, 10, '16 Jul 2020', '17 Jul 2020', 'mr', 'adit', 'wahdanifakhri@gmail.com', '081288887773333', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (22, 1, 10, 10, '18 Jul 2020', '19 Jul 2020', 'mr', 'adit', 'wahdanifakhri@gmail.com', '081288887773333', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (23, 1, 10, 10, '18 Jul 2020', '19 Jul 2020', 'mr', 'adit', 'wahdanifakhri@gmail.com', '081288887773333', 2, '2020-07-15');
INSERT INTO `reservations` VALUES (24, 1, 10, 10, '19 Jul 2020', '20 Jul 2020', 'mr', 'adit', 'wahdanifakhri@gmail.com', '081288887773333', 2, '2020-07-18');
INSERT INTO `reservations` VALUES (25, 1, 26, 11, '19 Jul 2020', '20 Jul 2020', 'mr', 'agus', 'agus1233@gmail.com', '086666777121', 2, '2020-07-18');
INSERT INTO `reservations` VALUES (26, 4, 12, 11, '19 Jul 2020', '20 Jul 2020', 'mr', 'agus', 'agus1233@gmail.com', '086666777121', 2, '2020-07-18');
INSERT INTO `reservations` VALUES (27, 2, 11, 12, '19 Jul 2020', '20 Jul 2020', 'mr', 'ahmad', 'ahmad123@gmail.com', '087775651221', 2, '2020-07-18');
INSERT INTO `reservations` VALUES (28, 3, 9, 13, '19 Jul 2020', '20 Jul 2020', 'miss', 'angel', 'angel123@gmail.com', '08777666121', 2, '2020-07-19');
INSERT INTO `reservations` VALUES (29, 4, 93, 11, '21 Jul 2020', '22 Jul 2020', 'mr', 'agus', 'agus1233@gmail.com', '086666777121', 2, '2020-07-20');
INSERT INTO `reservations` VALUES (30, 2, 64, 13, '21 Jul 2020', '22 Jul 2020', 'miss', 'angel', 'angel123@gmail.com', '08777666121', 2, '2020-07-20');
INSERT INTO `reservations` VALUES (31, 4, 93, 13, '22 Jul 2020', '23 Jul 2020', 'miss', 'angel', 'angel123@gmail.com', '08777666121', 2, '2020-07-20');
INSERT INTO `reservations` VALUES (32, 4, 94, 13, '21 Jul 2020', '22 Jul 2020', 'miss', 'angel', 'angel123@gmail.com', '08777666121', 2, '2020-07-20');
INSERT INTO `reservations` VALUES (33, 4, 12, 13, '21 Jul 2020', '22 Jul 2020', 'miss', 'angel', 'angel123@gmail.com', '08777666121', 2, '2020-07-21');
INSERT INTO `reservations` VALUES (34, 4, 97, 14, '22 Jul 2020', '23 Jul 2020', 'mr', 'fakhri', 'wahdanifakhri7@gmail.com', '08777777772121', 2, '2020-07-21');
INSERT INTO `reservations` VALUES (35, 1, 10, 15, '23 Jul 2020', '31 Jul 2020', 'mr', 'Dizan', 'dizanp@gmail.com', '087823123112', 2, '2020-07-22');
INSERT INTO `reservations` VALUES (36, 1, 15, 14, '26 Jul 2020', '28 Jul 2020', 'mr', 'fakhri', 'wahdanifakhri7@gmail.com', '08777777772121', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (37, 1, 18, 14, '26 Jul 2020', '27 Jul 2020', 'mr', 'fakhri', 'wahdanifakhri7@gmail.com', '08777777772121', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (38, 3, 13, 16, '26 Jul 2020', '27 Jul 2020', 'mr', 'sidang', 'wahdanifakhri7@gmail.com', '087777776655', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (39, 3, 13, 16, '17 Aug 2020', '20 Aug 2020', 'mr', 'sidang', 'wahdanifakhri7@gmail.com', '087777776655', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (40, 1, 15, 16, '26 Jul 2020', '27 Jul 2020', 'mr', 'sidang', 'wahdanifakhri7@gmail.com', '087777776655', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (41, 1, 15, 16, '26 Jul 2020', '27 Jul 2020', 'mr', 'sidang', 'wahdanifakhri7@gmail.com', '087777776655', 2, '2020-07-26');
INSERT INTO `reservations` VALUES (42, 1, 38, 16, '02 Aug 2020', '3 Aug 2020', 'mr', 'sidang', 'wahdanifakhri7@gmail.com', '087777776655', 2, '2020-08-01');
INSERT INTO `reservations` VALUES (43, 1, 16, 14, '02 Aug 2020', '3 Aug 2020', 'mr', 'fakhri', 'wahdanifakhri7@gmail.com', '08777777772121', 1, '2020-08-02');
INSERT INTO `reservations` VALUES (44, 3, 9, 3, '03 Aug 2020', '13 Aug 2020', 'mr', 'chandra', 'alkhamilnaz@gmail.com', '08989897979', 1, '2020-08-03');

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
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (9, 3, 'D.02', 'Daluxe_02', 0);
INSERT INTO `rooms` VALUES (10, 1, 'S.01', 'Standard_01', 1);
INSERT INTO `rooms` VALUES (11, 2, 'SP.01', 'Superior_01', 1);
INSERT INTO `rooms` VALUES (12, 4, 'SW.01', 'Sweet_01', 1);
INSERT INTO `rooms` VALUES (13, 3, 'D.01', 'Daluxe_01', 1);
INSERT INTO `rooms` VALUES (15, 1, 'S.02', 'Standard_02', 1);
INSERT INTO `rooms` VALUES (16, 1, 'S.03', 'Standard_03', 0);
INSERT INTO `rooms` VALUES (17, 1, 'S.04', 'Standard_04', 1);
INSERT INTO `rooms` VALUES (18, 1, 'S.05', 'Standard_05', 1);
INSERT INTO `rooms` VALUES (19, 1, 'S.06', 'Standard_06', 1);
INSERT INTO `rooms` VALUES (20, 1, 'S.07', 'Standard_07', 1);
INSERT INTO `rooms` VALUES (21, 1, 'S.08', 'Standard_08', 1);
INSERT INTO `rooms` VALUES (22, 1, 'S.09', 'Standard_09', 1);
INSERT INTO `rooms` VALUES (23, 1, 'S.10', 'Standard_10', 1);
INSERT INTO `rooms` VALUES (24, 1, 'S.11', 'Standard_11', 1);
INSERT INTO `rooms` VALUES (25, 1, 'S.12', 'Standard_12', 1);
INSERT INTO `rooms` VALUES (26, 1, 'S.13', 'Standard_13', 1);
INSERT INTO `rooms` VALUES (27, 1, 'S.14', 'Standard_14', 1);
INSERT INTO `rooms` VALUES (28, 1, 'S.15', 'Standard_15', 1);
INSERT INTO `rooms` VALUES (29, 1, 'S.16', 'Standard_16', 1);
INSERT INTO `rooms` VALUES (30, 1, 'S.17', 'Standard_17', 1);
INSERT INTO `rooms` VALUES (31, 1, 'S.18', 'Standard_18', 1);
INSERT INTO `rooms` VALUES (32, 1, 'S.19', 'Standard_19', 1);
INSERT INTO `rooms` VALUES (33, 1, 'S.20', 'Standard_20', 1);
INSERT INTO `rooms` VALUES (34, 1, 'S.21', 'Standard_21', 1);
INSERT INTO `rooms` VALUES (35, 1, 'S.22', 'Standard_22', 1);
INSERT INTO `rooms` VALUES (36, 1, 'S.23', 'Standard_23', 1);
INSERT INTO `rooms` VALUES (37, 1, 'S.24', 'Standard_24', 1);
INSERT INTO `rooms` VALUES (38, 1, 'S.25', 'Standard_25', 1);
INSERT INTO `rooms` VALUES (39, 1, 'S.26', 'Standard_26', 1);
INSERT INTO `rooms` VALUES (40, 1, 'S.27', 'Standard_27', 1);
INSERT INTO `rooms` VALUES (41, 1, 'S.28', 'Standard_28', 1);
INSERT INTO `rooms` VALUES (42, 1, 'S.29', 'Standard_29', 1);
INSERT INTO `rooms` VALUES (43, 1, 'S.30', 'Standard_30', 1);
INSERT INTO `rooms` VALUES (44, 1, 'S.31', 'Standard_31', 1);
INSERT INTO `rooms` VALUES (45, 1, 'S.32', 'Standard_32', 1);
INSERT INTO `rooms` VALUES (46, 1, 'S.33', 'Standard_33', 1);
INSERT INTO `rooms` VALUES (47, 1, 'S.34', 'Standard_34', 1);
INSERT INTO `rooms` VALUES (48, 1, 'S.35', 'Standard_35', 1);
INSERT INTO `rooms` VALUES (49, 1, 'S.36', 'Standard_36', 1);
INSERT INTO `rooms` VALUES (50, 1, 'S.37', 'Standard_37', 1);
INSERT INTO `rooms` VALUES (51, 1, 'S.38', 'Standard_38', 1);
INSERT INTO `rooms` VALUES (52, 1, 'S.39', 'Standard_39', 1);
INSERT INTO `rooms` VALUES (53, 1, 'S.40', 'Standard_40', 1);
INSERT INTO `rooms` VALUES (54, 1, 'S.41', 'Standard_41', 1);
INSERT INTO `rooms` VALUES (55, 1, 'S.42', 'Standard_42', 1);
INSERT INTO `rooms` VALUES (56, 1, 'S.43', 'Standard_43', 1);
INSERT INTO `rooms` VALUES (57, 1, 'S.44', 'Standard_44', 1);
INSERT INTO `rooms` VALUES (58, 1, 'S.45', 'Standard_45', 1);
INSERT INTO `rooms` VALUES (59, 1, 'S.46', 'Standard_46', 1);
INSERT INTO `rooms` VALUES (60, 1, 'S.47', 'Standard_47', 1);
INSERT INTO `rooms` VALUES (61, 1, 'S.48', 'Standard_48', 1);
INSERT INTO `rooms` VALUES (62, 1, 'S.49', 'Standard_49', 1);
INSERT INTO `rooms` VALUES (63, 1, 'S.50', 'Standard_50', 1);
INSERT INTO `rooms` VALUES (64, 2, 'SP.02', 'Superior_02', 1);
INSERT INTO `rooms` VALUES (65, 2, 'SP.03', 'Superior_03', 1);
INSERT INTO `rooms` VALUES (66, 2, 'SP.04', 'Superior_04', 1);
INSERT INTO `rooms` VALUES (67, 2, 'SP.05', 'Superior_05', 1);
INSERT INTO `rooms` VALUES (68, 2, 'SP.06', 'Superior_06', 1);
INSERT INTO `rooms` VALUES (69, 2, 'SP.07', 'Superior_07', 1);
INSERT INTO `rooms` VALUES (70, 2, 'SP.08', 'Superior_08', 1);
INSERT INTO `rooms` VALUES (71, 2, 'SP.09', 'Superior_09', 1);
INSERT INTO `rooms` VALUES (72, 2, 'SP.10', 'Superior_10', 1);
INSERT INTO `rooms` VALUES (73, 2, 'SP.11', 'Superior_11', 1);
INSERT INTO `rooms` VALUES (74, 2, 'SP.12', 'Superior_12', 1);
INSERT INTO `rooms` VALUES (75, 2, 'SP.13', 'Superior_13', 1);
INSERT INTO `rooms` VALUES (76, 2, 'SP.14', 'Superior_14', 1);
INSERT INTO `rooms` VALUES (77, 2, 'SP.15', 'Superior_15', 1);
INSERT INTO `rooms` VALUES (78, 2, 'SP.16', 'Superior_16', 1);
INSERT INTO `rooms` VALUES (79, 2, 'SP.17', 'Superior_17', 1);
INSERT INTO `rooms` VALUES (80, 2, 'SP.18', 'Superior_18', 1);
INSERT INTO `rooms` VALUES (81, 2, 'SP.19', 'Superior_19', 1);
INSERT INTO `rooms` VALUES (82, 2, 'SP.20', 'Superior_20', 1);
INSERT INTO `rooms` VALUES (83, 2, 'SP.21', 'Superior_21', 1);
INSERT INTO `rooms` VALUES (84, 2, 'SP.22', 'Superior_22', 1);
INSERT INTO `rooms` VALUES (85, 3, 'D.03', 'Daluxe_03', 1);
INSERT INTO `rooms` VALUES (86, 3, 'D.04', 'Daluxe_04', 1);
INSERT INTO `rooms` VALUES (87, 3, 'D.05', 'Daluxe_05', 1);
INSERT INTO `rooms` VALUES (88, 3, 'D.06', 'Daluxe_06', 1);
INSERT INTO `rooms` VALUES (89, 3, 'D.07', 'Daluxe_07', 1);
INSERT INTO `rooms` VALUES (90, 3, 'D.08', 'Daluxe_08', 1);
INSERT INTO `rooms` VALUES (91, 3, 'D.09', 'Daluxe_09', 1);
INSERT INTO `rooms` VALUES (92, 3, 'D.10', 'Daluxe_10', 1);
INSERT INTO `rooms` VALUES (93, 4, 'SW.02', 'Sweet_02', 1);
INSERT INTO `rooms` VALUES (94, 4, 'SW.03', 'Sweet_03', 1);
INSERT INTO `rooms` VALUES (95, 4, 'SW.04', 'Sweet_04', 1);
INSERT INTO `rooms` VALUES (96, 4, 'SW.05', 'Sweet_05', 1);
INSERT INTO `rooms` VALUES (97, 4, 'SW.06', 'Sweet_06', 1);
INSERT INTO `rooms` VALUES (98, 4, 'SW.07', 'Sweet_07', 1);
INSERT INTO `rooms` VALUES (99, 4, 'SW.08', 'Sweet_08', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `transactions` VALUES (21, 21, 'TRX/2020-07-1521', 'mandiri', '1', 'hotel1.jpg', 400000, '2020-07-15');
INSERT INTO `transactions` VALUES (22, 22, 'TRX/2020-07-1522', 'mandiri', '1', NULL, 300000, '2020-07-15');
INSERT INTO `transactions` VALUES (23, 23, 'TRX/2020-07-1523', 'mandiri', '1', 'hotel.jpg', 300000, '2020-07-15');
INSERT INTO `transactions` VALUES (24, 24, 'TRX/2020-07-1824', 'mandiri', '1', 'hotel2.jpg', 300000, '2020-07-18');
INSERT INTO `transactions` VALUES (25, 25, 'TRX/2020-07-1825', 'mandiri', '1', 'hotel3.jpg', 300000, '2020-07-18');
INSERT INTO `transactions` VALUES (26, 26, 'TRX/2020-07-1826', 'mandiri', '1', 'hotel4.jpg', 500000, '2020-07-18');
INSERT INTO `transactions` VALUES (27, 27, 'TRX/2020-07-1827', 'mandiri', '1', 'hotel11.jpg', 350000, '2020-07-18');
INSERT INTO `transactions` VALUES (28, 28, 'TRX/2020-07-1928', 'mandiri', '1', 'hotel12.jpg', 400000, '2020-07-19');
INSERT INTO `transactions` VALUES (29, 29, 'TRX/2020-07-2029', 'mandiri', '1', 'hotel21.jpg', 500000, '2020-07-20');
INSERT INTO `transactions` VALUES (30, 30, 'TRX/2020-07-2030', 'mandiri', '1', 'hotel13.jpg', 350000, '2020-07-20');
INSERT INTO `transactions` VALUES (31, 31, 'TRX/2020-07-2031', 'mandiri', '1', 'hotel22.jpg', 500000, '2020-07-20');
INSERT INTO `transactions` VALUES (32, 32, 'TRX/2020-07-2032', 'mandiri', '1', 'hotel23.jpg', 500000, '2020-07-20');
INSERT INTO `transactions` VALUES (33, 33, 'TRX/2020-07-2133', 'mandiri', '1', 'hotel5.jpg', 500000, '2020-07-21');
INSERT INTO `transactions` VALUES (34, 34, 'TRX/2020-07-2134', 'mandiri', '1', 'hotel14.jpg', 500000, '2020-07-21');
INSERT INTO `transactions` VALUES (35, 35, 'TRX/2020-07-2235', 'bca', '1', 'hotel24.jpg', 2400000, '2020-07-22');
INSERT INTO `transactions` VALUES (36, 36, 'TRX/2020-07-2636', 'mandiri', '1', 'hotel6.jpg', 600000, '2020-07-26');
INSERT INTO `transactions` VALUES (37, 37, 'TRX/2020-07-2637', 'mandiri', '1', 'saa.jpg', 300000, '2020-07-26');
INSERT INTO `transactions` VALUES (38, 38, 'TRX/2020-07-2638', 'mandiri', '1', 'download_(1).jpg', 400000, '2020-07-26');
INSERT INTO `transactions` VALUES (39, 39, 'TRX/2020-07-2639', 'mandiri', '1', 'download.jpg', 1200000, '2020-07-26');
INSERT INTO `transactions` VALUES (40, 40, 'TRX/2020-07-2640', 'mandiri', '1', NULL, 300000, '2020-07-26');
INSERT INTO `transactions` VALUES (41, 41, 'TRX/2020-07-2641', 'mandiri', '1', 'KARTUPESERTA_UTBKSBMPTN_120323260735(2).jpg', 300000, '2020-07-26');
INSERT INTO `transactions` VALUES (42, 42, 'TRX/2020-08-0142', 'mandiri', '1', 'download1.jpg', 300000, '2020-08-01');
INSERT INTO `transactions` VALUES (43, 43, 'TRX/2020-08-0243', 'mandiri', '1', 'hotel_rakacia.jpg', 300000, '2020-08-02');
INSERT INTO `transactions` VALUES (44, 44, 'TRX/2020-08-0344', 'mandiri', '1', 'WIN_20200511_17_01_28_Pro1.jpg', 4000000, '2020-08-03');

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
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (13, 'alkhamil', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (14, 'anggi', 'anggi@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (15, 'chan', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (17, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1);
INSERT INTO `users` VALUES (19, 'huiiii', 'hui@email.cim', 'cd5b6e2d80317ed21f50e87a0874ee5788b2dc60', 'customer', 1);
INSERT INTO `users` VALUES (20, 'nazmudin', 'nazmudin@imaniprima.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (22, 'rian', 'rian@email.com', '4116e0e25dcad2dd4b202b3eaf2b4f1ae6497e25', 'customer', 1);
INSERT INTO `users` VALUES (24, 'halim', 'halim@email.com', '4bdefa821642ad89e92e09cbc9a01e6fa559dff5', 'customer', 1);
INSERT INTO `users` VALUES (25, 'ramdan', 'alkhamilnaz@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (26, 'nadia', 'vuser129@gmail.com', '2b6ef69a29a1cd2a4402813bbb8c4b033a970279', 'customer', 1);
INSERT INTO `users` VALUES (27, 'adit', 'wahdanifakhri@gmail.com', '2e445949d370543ad32c166c38b1278d67316509', 'customer', 1);
INSERT INTO `users` VALUES (28, 'adminfakhri', 'ahmad123@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1);
INSERT INTO `users` VALUES (29, 'agus', 'agus1233@gmail.com', '0525885565bb6a150db63f19bf42f11bd2db4702', 'customer', 1);
INSERT INTO `users` VALUES (30, 'ahmad', 'ahmad123@gmail.com', 'a53a33601b8dd9d06ae9e50f1f30fbe957aba866', 'customer', 1);
INSERT INTO `users` VALUES (31, 'resepsionis', 'resepsionis1233@gmail.com', 'edea92fd7846af30cf519058c591b02e6531c9c9', 'admin', 1);
INSERT INTO `users` VALUES (32, 'angel', 'angel123@gmail.com', 'c8a50f632c3c4baf27fc05facb1883104e1d16ef', 'customer', 1);
INSERT INTO `users` VALUES (33, 'fakhri', 'wahdanifakhri7@gmail.com', '479468da8c0ac360e3348966f0cb1522b59522bc', 'customer', 1);
INSERT INTO `users` VALUES (34, 'dizan', 'dizanp@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', 1);
INSERT INTO `users` VALUES (35, 'sidang', 'wahdanifakhri7@gmail.com', '24538157990344fdb877b3f4c391e968dac6c33a', 'customer', 1);

SET FOREIGN_KEY_CHECKS = 1;
