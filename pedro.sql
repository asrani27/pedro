/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : pedro

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 10/05/2024 17:11:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bobot
-- ----------------------------
DROP TABLE IF EXISTS `bobot`;
CREATE TABLE `bobot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `selisih` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bobot
-- ----------------------------
BEGIN;
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (1, '0\r', '5\r', 'Tidak Ada Selisih (kompetensi sesuai dengna yang dibutuhkan)\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (2, '1\r', '4,5\r', 'Kompetensi individu kelebihan 1 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (3, '-1\r', '4\r', 'Kompetensi individu kekurangan 1 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (4, '2\r', '3,5\r', 'Kompetensi individu kelebihan 2 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (5, '-2\r', '3\r', 'Kompetensi individu kekurangan 2 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (6, '3\r', '2,5\r', 'Kompetensi individu kelebihan 3 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (7, '-3\r', '2\r', 'Kompetensi individu kekurangan 3 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (8, '4\r', '1,5\r', 'Kompetensi individu kelebihan 4 tingkat/level\r');
INSERT INTO `bobot` (`id`, `selisih`, `nilai`, `keterangan`) VALUES (9, '-4', '1', 'Kompetensi individu kekurangan 4 tingkat/level');
COMMIT;

-- ----------------------------
-- Table structure for factor
-- ----------------------------
DROP TABLE IF EXISTS `factor`;
CREATE TABLE `factor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `persen` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of factor
-- ----------------------------
BEGIN;
INSERT INTO `factor` (`id`, `nama`, `persen`) VALUES (1, 'Core Factor', 60);
INSERT INTO `factor` (`id`, `nama`, `persen`) VALUES (2, 'Secondary Factor', 40);
COMMIT;

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `factor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
BEGIN;
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (2, 'IPA', 1);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (3, 'IPS', 1);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (4, 'Bahasa', 2);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (5, 'Matematika', 2);
COMMIT;

-- ----------------------------
-- Table structure for perhitungan
-- ----------------------------
DROP TABLE IF EXISTS `perhitungan`;
CREATE TABLE `perhitungan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `subkriteria_id` int(11) DEFAULT NULL,
  `nilai_profil` varchar(255) DEFAULT NULL,
  `nilai_dicari` varchar(255) DEFAULT NULL,
  `gap` varchar(255) DEFAULT NULL,
  `nilai_gap` varchar(255) DEFAULT NULL,
  `factor_id` int(11) DEFAULT NULL,
  `tampil_rata` varchar(255) DEFAULT NULL,
  `tampil_total` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perhitungan
-- ----------------------------
BEGIN;
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (214, 1, 2, 3, '3', '2', '1', '4,5\r', 1, 'Y', 'Y');
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (215, 1, 3, 5, '1', '1', '0', '5\r', 1, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (216, 1, 4, 11, '3', '2', '1', '4,5\r', 2, 'Y', NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (217, 1, 5, 14, '2', '4', '-2', '3\r', 2, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (218, 2, 2, 3, '3', '2', '1', '4,5\r', 1, 'Y', 'Y');
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (219, 2, 3, 6, '2', '1', '1', '4,5\r', 1, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (220, 2, 4, 10, '2', '2', '0', '5\r', 2, 'Y', NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (221, 2, 5, 15, '3', '4', '-1', '4\r', 2, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (222, 3, 2, 3, '3', '2', '1', '4,5\r', 1, 'Y', 'Y');
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (223, 3, 3, 6, '2', '1', '1', '4,5\r', 1, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (224, 3, 4, 9, '1', '2', '-1', '4\r', 2, 'Y', NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (225, 3, 5, 14, '2', '4', '-2', '3\r', 2, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (226, 4, 2, 1, '1', '2', '-1', '4\r', 1, 'Y', 'Y');
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (227, 4, 3, 5, '1', '1', '0', '5\r', 1, NULL, NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (228, 4, 4, 9, '1', '2', '-1', '4\r', 2, 'Y', NULL);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`) VALUES (229, 4, 5, 15, '3', '4', '-1', '4\r', 2, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (5, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
COMMIT;

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of siswa
-- ----------------------------
BEGIN;
INSERT INTO `siswa` (`id`, `nis`, `nama`) VALUES (1, '23123', 'udin');
INSERT INTO `siswa` (`id`, `nis`, `nama`) VALUES (2, '32431', 'Budi');
INSERT INTO `siswa` (`id`, `nis`, `nama`) VALUES (3, '43523', 'Shinta');
INSERT INTO `siswa` (`id`, `nis`, `nama`) VALUES (4, '45432', 'Rinii');
COMMIT;

-- ----------------------------
-- Table structure for standart
-- ----------------------------
DROP TABLE IF EXISTS `standart`;
CREATE TABLE `standart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(11) unsigned DEFAULT NULL,
  `subkriteria_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of standart
-- ----------------------------
BEGIN;
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (1, 2, 2);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (2, 3, 5);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (3, 4, 10);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (4, 5, 16);
COMMIT;

-- ----------------------------
-- Table structure for subkriteria
-- ----------------------------
DROP TABLE IF EXISTS `subkriteria`;
CREATE TABLE `subkriteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(10) unsigned DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subkriteria
-- ----------------------------
BEGIN;
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (1, 2, 'Nilai lebih 60', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (2, 2, 'Nilai lebih 70', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (3, 2, 'Nilai lebih 80', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (4, 2, 'Nilai lebih 90', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (5, 3, 'Nilai lebih 60', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (6, 3, 'Nilai lebih 70', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (7, 3, 'Nilai lebih 80', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (8, 3, 'Nilai lebih 90', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (9, 4, 'Nilai lebih 60', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (10, 4, 'Nilai lebih 70', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (11, 4, 'Nilai lebih 80', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (12, 4, 'Nilai lebih 90', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (13, 5, 'Nilai lebih 60', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (14, 5, 'Nilai lebih 70', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (15, 5, 'Nilai lebih 80', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (16, 5, 'Nilai lebih 90', '4');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'pedro', NULL, 'pedro', '2024-05-10 17:09:38', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, 'vZnOCzZCh9gIYXSIa8ZWUrEiNrKVppQjjH7oHlkRGqcWzoeV0vnAiR6rhBIN', '2024-05-10 17:09:38', '2024-05-10 17:09:38', NULL, NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (5, 'adi', NULL, 'adi', '2024-04-20 11:07:17', '$2y$10$sxXBzHYpymU8.AMoywsDh.EzC5P9fHnIr2POgiTkFWp11kQQBJQaG', NULL, NULL, '2024-04-20 03:07:17', '2024-04-20 03:07:17', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
