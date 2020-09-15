/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : gis-PDAM Tirta Kepri

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 04/02/2020 17:47:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `id_dma` int(11) NULL DEFAULT NULL,
  `ket_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_gallery`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 151 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES (12, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (11, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (4, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (5, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (6, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (10, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (9, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (13, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (14, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (15, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (16, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (17, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (18, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (19, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (20, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (21, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (22, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (23, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (24, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (25, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (26, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (27, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (28, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (29, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (30, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (31, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (32, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (33, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (34, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (35, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (36, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (37, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (38, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (39, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (40, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (41, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (42, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (43, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (44, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (45, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (46, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (47, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (48, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (49, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (50, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (51, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (52, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (53, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (54, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (55, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (56, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (57, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (58, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (59, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (60, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (61, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (62, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (63, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (64, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (65, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (66, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (67, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (68, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (69, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (70, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (71, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (72, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (73, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (74, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (75, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (76, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (77, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (78, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (79, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (80, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (81, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (82, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (83, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (84, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (85, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (86, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (87, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (88, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (89, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (90, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (91, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (92, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (93, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (94, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (95, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (96, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (97, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (98, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (99, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (100, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (101, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (102, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (103, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (104, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (105, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (106, 7, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (107, 1, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (108, 2, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (109, 3, 'Kamar Tidur', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (110, 4, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (111, 5, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (112, 6, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (113, 8, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (114, 9, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (115, 10, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (116, 11, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (117, 12, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (118, 13, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (119, 14, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (120, 15, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (121, 17, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (122, 17, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (123, 18, 'Judul Foto', 'kegiatan1.jpg');
INSERT INTO `gallery` VALUES (124, 19, 'Judul Foto', 'kegiatan3.jpg');
INSERT INTO `gallery` VALUES (125, 20, 'Judul Foto', 'kegiatan2.jpg');
INSERT INTO `gallery` VALUES (126, 26, '0%', '0.jpeg');
INSERT INTO `gallery` VALUES (127, 26, '0%', '0a.jpeg');
INSERT INTO `gallery` VALUES (128, 26, '0%', '0b.jpeg');
INSERT INTO `gallery` VALUES (129, 26, '0%', '0c.jpeg');
INSERT INTO `gallery` VALUES (130, 26, '50%', '50.jpeg');
INSERT INTO `gallery` VALUES (131, 26, '50%', '50a.jpeg');
INSERT INTO `gallery` VALUES (132, 26, '50%', '50d.jpeg');
INSERT INTO `gallery` VALUES (133, 26, '100%', '100.jpeg');
INSERT INTO `gallery` VALUES (134, 26, '100%', '100a.jpeg');
INSERT INTO `gallery` VALUES (135, 26, '100%', '100b.jpeg');
INSERT INTO `gallery` VALUES (136, 27, 'Foto 0%', '01.jpeg');
INSERT INTO `gallery` VALUES (137, 27, 'Foto 0%', '0a1.jpeg');
INSERT INTO `gallery` VALUES (138, 27, 'Foto 0%', '0b1.jpeg');
INSERT INTO `gallery` VALUES (139, 27, 'Foto 50%', '501.jpeg');
INSERT INTO `gallery` VALUES (140, 27, 'Foto 50%', '50b.jpeg');
INSERT INTO `gallery` VALUES (141, 27, 'Foto 100%', '1001.jpeg');
INSERT INTO `gallery` VALUES (142, 27, 'Foto 100%', '100b1.jpeg');
INSERT INTO `gallery` VALUES (143, 28, 'Foto 0%', '0a2.jpeg');
INSERT INTO `gallery` VALUES (144, 28, 'Foto 0%', '0c1.jpeg');
INSERT INTO `gallery` VALUES (145, 28, 'Foto 0%', '0d.jpeg');
INSERT INTO `gallery` VALUES (146, 28, 'Foto 100%', '1002.jpeg');
INSERT INTO `gallery` VALUES (147, 28, 'Foto 100%', '100b2.jpeg');
INSERT INTO `gallery` VALUES (148, 28, 'Foto 100%', '100h.jpeg');
INSERT INTO `gallery` VALUES (149, 28, 'Foto 100%', '100g.jpeg');
INSERT INTO `gallery` VALUES (150, 43, 'Buka', '0a57ba334d33b288be879e833d1fe16b.jpg');

-- ----------------------------
-- Table structure for tbl_jenis
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jenis`;
CREATE TABLE `tbl_jenis`  (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kegiatan` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_jenis
-- ----------------------------
INSERT INTO `tbl_jenis` VALUES (1, 'Lapen');
INSERT INTO `tbl_jenis` VALUES (2, 'Jembatan');
INSERT INTO `tbl_jenis` VALUES (3, 'Hotmix');
INSERT INTO `tbl_jenis` VALUES (4, 'Gedung');
INSERT INTO `tbl_jenis` VALUES (5, 'Gapura');
INSERT INTO `tbl_jenis` VALUES (6, 'Drainase');
INSERT INTO `tbl_jenis` VALUES (7, 'MCK');
INSERT INTO `tbl_jenis` VALUES (8, 'Paving');
INSERT INTO `tbl_jenis` VALUES (9, 'PJU');
INSERT INTO `tbl_jenis` VALUES (10, 'Rabat Beton');
INSERT INTO `tbl_jenis` VALUES (11, 'RTLH');
INSERT INTO `tbl_jenis` VALUES (12, 'Taman');
INSERT INTO `tbl_jenis` VALUES (13, 'TPT-TPJ');
INSERT INTO `tbl_jenis` VALUES (18, 'Jombang Berkadang');

-- ----------------------------
-- Table structure for tbl_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kegiatan`;
CREATE TABLE `tbl_kegiatan`  (
  `id_dma` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dma` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jenis` int(11) NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sumberdana` int(11) NULL DEFAULT NULL,
  `anggaran` int(11) NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelaksana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `latitude` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sampul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'sampul.jpg',
  PRIMARY KEY (`id_dma`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kegiatan
-- ----------------------------
INSERT INTO `tbl_kegiatan` VALUES (26, 'PDAM Tirta Kepri Paving', 8, 'Dsn Ngemplak Selatan', 5, 65320000, '2014', '446 m2', 'TPK Desa', 'Sudah selesai dikerjakan', '-7.571330423401372', '112.3497431654877', '100d.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (27, 'Rehab drainase', 6, 'Dsn. Sanan Timur', 10, 100000000, '2015', '169 m\'', 'TPK Desa', 'sudah selesai dikerjakan', '-7.571750517456411', '112.35552497176985', '100b1.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (28, 'Rehab Balai RW', 4, 'RW 01, 02, 03, 04, 05, 07', 5, 33600000, '2015', '6 unit', 'TPK Desa', 'sudah selesai dikerjakan', '-7.572367363681335', '112.35382483529337', '100g.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (29, 'Rehab drainase', 6, 'Dsn. Subontoro Timur', 4, 53980000, '2015', '156 m\'', 'TPK Desa', 'sudah selesai dikerjakan', '-7.570681669752549', '112.35687715056466', '1003.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (30, 'Rehab drainase', 6, 'Dsn Ngemplak Selatan', 4, 72240000, '2015', '172 m\'', 'TPK Desa', 'sudah selesai dikerjakan', '-7.571091129136348', '112.35039740214897', '100a.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (31, 'Pemeliharaan Jalan Lingkungan', 8, 'Dsn. Subontoro Santren', 4, 28681000, '2015', '230,25 m2', 'TPK Desa', 'sudah selesai dikerjakan', '-7.5742444851241535', '112.36472621914332', '501.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (32, 'Rehab drainase', 6, 'Perum Griyo Trisno Asri', 4, 60000000, '2015', '267 m\'', 'TPK Desa', 'sudah selesai dikerjakan', '-7.582151702931139', '112.34877151308416', '50a1.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (33, 'Pemeliharaan Jalan Lingkungan', 8, 'Dsn. Sanan Timur', 4, 56404000, '2015', '440,76 m2', 'TPK Desa', 'sudah selesai dikerjakan', '-7.5724737163895055', '112.35501050949098', '1004.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (34, 'PDAM Tirta Kepri Paving', 8, 'Dsn. Ngemplak Utara', 8, 50000000, '2015', '467,5 m2', 'TPK Desa', 'sudah selesai dikerjakan', '-7.5696394077479985', '112.3490881919861', '100b2.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (35, 'Pemeliharaan Jalan Lingkungan', 8, 'Dsn. Sanan Timur', 8, 50000000, '2015', '454 m2', 'TPK Desa', 'sudah selesai dikerjakan', '-7.573000161908494', '112.35634610074233', '1005.jpeg');
INSERT INTO `tbl_kegiatan` VALUES (36, 'Fasilitasi Penanganan Tuberkolosis', 18, 'PDAM Tirta Kepri', 13, 1250000, '2020', '5 orang', 'Kader TB', 'Jombang Berkadang 2020', '-7.569990373806418', '112.35371232032777', '8.jpg');
INSERT INTO `tbl_kegiatan` VALUES (37, 'Fasilitasi Kenduri/Tasyakuran/PHBN/PHBA', 18, 'PDAM Tirta Kepri', 13, 20000000, '2020', '1 Kegiatan', 'PDAM Tirta Kepri', 'Jombang Berkadang 2020', '-7.569713855117594', '112.35347618854004', 'images_(4).jpg');
INSERT INTO `tbl_kegiatan` VALUES (38, 'Fasilitasi Penanganan Tuberkolosis', 18, 'PDAM Tirta Kepri', 13, 1000000, '2020', '1 Kegiatan', 'PKK Desa', 'Jombang Berkadang 2020', '-7.569953150147096', '112.35378194725696', '81.jpg');
INSERT INTO `tbl_kegiatan` VALUES (39, 'Pengadaan Sarana/Alat Kesenian Lokal', 18, 'PDAM Tirta Kepri', 13, 20000000, '2020', '1 Kelompok', 'Panjilaras', 'Jombang Berkadang 2020', '-7.569947832481226', '112.35359420058606', 'images_(2).jpg');
INSERT INTO `tbl_kegiatan` VALUES (40, 'PDAM Tirta Kepri Jaringan Irigasi Desa', 18, 'PDAM Tirta Kepri', 13, 98750000, '2020', '109 m2', 'Gapoktan PDAM Tirta Kepri', 'Jombang Berkadang 2020', '-7.572585386704845', '112.35950607675566', 'images_(3).jpg');
INSERT INTO `tbl_kegiatan` VALUES (41, 'RTLH', 18, 'Masudah, Dsn. Sanan Timur RT. 01 RW. 04', 13, 15000000, '2020', '1 unit', 'TPK Desa', 'Jombang Berkadang 2020', '-7.568714132224581', '112.35335281254426', 'images_(1).jpg');
INSERT INTO `tbl_kegiatan` VALUES (42, 'RTLH', 18, 'Sofyan, Dsn. Ngemplak Utara RT 01 RW 01', 13, 15000000, '2020', '1 unit', 'TPK Desa', 'Jombang Berkadang 2020', '-7.569410747889567', '112.3496998033025', 'images_(1)1.jpg');
INSERT INTO `tbl_kegiatan` VALUES (43, 'RTLH', 18, 'Siti Maryam, Dsn. Ngemplak Utara RT 02 RW 01', 13, 10000000, '2020', '1 unit', 'TPK Desa', 'Jombang Berkadang 2020', '-7.569171452559031', '112.35000019760142', 'Apa-Itu-Landing-Page-Pengertian-Fungsi-dan-Contohnya.png');

-- ----------------------------
-- Table structure for tbl_sumberdana
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sumberdana`;
CREATE TABLE `tbl_sumberdana`  (
  `id_sumberdana` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_dana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sumberdana`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sumberdana
-- ----------------------------
INSERT INTO `tbl_sumberdana` VALUES (1, 'Pemerintahan Pusat', 'RTLH.png');
INSERT INTO `tbl_sumberdana` VALUES (2, 'Sumbangan Masyarakat', 'TPT-TPJ.png');
INSERT INTO `tbl_sumberdana` VALUES (4, 'DD', 'taman.png');
INSERT INTO `tbl_sumberdana` VALUES (5, 'ADD', 'rabat_beton.png');
INSERT INTO `tbl_sumberdana` VALUES (6, 'PAD', 'paving.png');
INSERT INTO `tbl_sumberdana` VALUES (7, 'PDRD', 'mck.png');
INSERT INTO `tbl_sumberdana` VALUES (8, 'PID', 'lapen.png');
INSERT INTO `tbl_sumberdana` VALUES (9, 'BK Provinsi', 'jembatan.png');
INSERT INTO `tbl_sumberdana` VALUES (10, 'Jasmas', 'hotmix.png');
INSERT INTO `tbl_sumberdana` VALUES (11, 'Kotaku', 'gedung.png');
INSERT INTO `tbl_sumberdana` VALUES (12, 'BK Kabupaten', 'gapura.png');
INSERT INTO `tbl_sumberdana` VALUES (13, 'Jombang Berkadang', 'drainase.png');

-- ----------------------------
-- Table structure for tbl_tahun
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tahun`;
CREATE TABLE `tbl_tahun`  (
  `id_tahun` int(2) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tahun`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_tahun
-- ----------------------------
INSERT INTO `tbl_tahun` VALUES (9, '2014');
INSERT INTO `tbl_tahun` VALUES (2, '2015');
INSERT INTO `tbl_tahun` VALUES (3, '2016');
INSERT INTO `tbl_tahun` VALUES (4, '2017');
INSERT INTO `tbl_tahun` VALUES (5, '2018');
INSERT INTO `tbl_tahun` VALUES (6, '2019');
INSERT INTO `tbl_tahun` VALUES (7, '2020');
INSERT INTO `tbl_tahun` VALUES (8, '2021');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Sekdes Mojotrisno', 'admin', 'Putramojotrisno2020');
INSERT INTO `tbl_user` VALUES (4, 'Mardalius', 'lius', 'lius');

SET FOREIGN_KEY_CHECKS = 1;
