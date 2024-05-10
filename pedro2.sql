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

 Date: 11/05/2024 07:45:27
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
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
BEGIN;
INSERT INTO `jurusan` (`id`, `nama`) VALUES (1, 'IPA');
INSERT INTO `jurusan` (`id`, `nama`) VALUES (2, 'IPS');
INSERT INTO `jurusan` (`id`, `nama`) VALUES (3, 'B. Indo');
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
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (2, 'Minat & Bakat', 1);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (3, 'Kemampuan Akademik', 1);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (4, 'Keterampilan', 2);
INSERT INTO `kriteria` (`id`, `nama`, `factor_id`) VALUES (5, 'Tujuan Karir', 2);
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
  `jurusan_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perhitungan
-- ----------------------------
BEGIN;
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (290, 6, 2, 1, '1', '4', '-3', '2\r', 1, 'Y', 'Y', 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (291, 6, 3, 5, '1', '3', '-2', '3\r', 1, NULL, NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (292, 6, 4, 9, '1', '2', '-1', '4\r', 2, 'Y', NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (293, 6, 5, 13, '1', '3', '-2', '3\r', 2, NULL, NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (294, 6, 2, 2, '2', '4', '-2', '3\r', 1, 'Y', 'Y', 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (295, 6, 3, 8, '4', '3', '1', '4,5\r', 1, NULL, NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (296, 6, 4, 11, '3', '2', '1', '4,5\r', 2, 'Y', NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (297, 6, 5, 14, '2', '3', '-1', '4\r', 2, NULL, NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (298, 6, 2, 4, '4', '4', '0', '5\r', 1, 'Y', 'Y', 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (299, 6, 3, 6, '2', '3', '-1', '4\r', 1, NULL, NULL, 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (300, 6, 4, 10, '2', '2', '0', '5\r', 2, 'Y', NULL, 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (301, 6, 5, 15, '3', '3', '0', '5\r', 2, NULL, NULL, 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (326, 3, 2, 1, '1', '4', '-3', '2\r', 1, 'Y', 'Y', 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (327, 3, 3, 6, '2', '3', '-1', '4\r', 1, NULL, NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (328, 3, 4, NULL, NULL, '2', NULL, NULL, 2, 'Y', NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (329, 3, 5, NULL, NULL, '3', NULL, NULL, 2, NULL, NULL, 1);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (330, 3, 2, 1, '1', '4', '-3', '2\r', 1, 'Y', 'Y', 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (331, 3, 3, 8, '4', '3', '1', '4,5\r', 1, NULL, NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (332, 3, 4, NULL, NULL, '2', NULL, NULL, 2, 'Y', NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (333, 3, 5, NULL, NULL, '3', NULL, NULL, 2, NULL, NULL, 2);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (334, 3, 2, NULL, NULL, '4', NULL, NULL, 1, 'Y', 'Y', 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (335, 3, 3, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (336, 3, 4, NULL, NULL, '2', NULL, NULL, 2, 'Y', NULL, 3);
INSERT INTO `perhitungan` (`id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_profil`, `nilai_dicari`, `gap`, `nilai_gap`, `factor_id`, `tampil_rata`, `tampil_total`, `jurusan_id`) VALUES (337, 3, 5, NULL, NULL, '3', NULL, NULL, 2, NULL, NULL, 3);
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
  `jurusan` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of siswa
-- ----------------------------
BEGIN;
INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `nilai`) VALUES (3, '43529', 'Shintai', 'IPS', '1.95');
INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `nilai`) VALUES (6, '34212', 'budi', 'B. Indo', '4.7');
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
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (1, 2, 4);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (2, 3, 7);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (3, 4, 10);
INSERT INTO `standart` (`id`, `kriteria_id`, `subkriteria_id`) VALUES (4, 5, 15);
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
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (1, 2, 'Minat Dalam Mata Pelajaran', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (2, 2, 'Partisipasi dalam kegiatan ekskul', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (3, 2, 'Belajar Di luar Kelas', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (4, 2, 'Percaya Diri', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (5, 3, 'Nilai Rata-Rata di semua mata pelajaran', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (6, 3, 'Memiliki Karya Ilmiah', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (7, 3, 'Partisipasi lomba akademik', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (8, 3, 'Penghargaan Dalam bidang akademik', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (9, 4, 'Analisis', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (10, 4, 'Komunikasi', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (11, 4, 'Pemecahan Masalah', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (12, 4, 'Flexibilitas dan Dapat beradaptasi', '4');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (13, 5, 'Ilmuwan', '1');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (14, 5, 'Insinyur', '2');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (15, 5, 'Guru', '3');
INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama`, `nilai`) VALUES (16, 5, 'Penghasilan Tinggi', '4');
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
