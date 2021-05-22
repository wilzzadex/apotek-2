/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : apotek

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 24/03/2021 15:52:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_setup
-- ----------------------------
DROP TABLE IF EXISTS `app_setup`;
CREATE TABLE `app_setup`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `apotek_id` bigint(20) NULL DEFAULT NULL,
  `nama_aplikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon_aplikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_aplikasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `alamat_aplikasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_setup
-- ----------------------------
INSERT INTO `app_setup` VALUES (1, 1, 'Apotek Dev Bandung', NULL, 'apotek-tes1616519018.jpg', 'Jl Kopo Sayati Margahayu', '022985544', '2021-03-24 14:38:52', '2021-03-24 07:38:52');

-- ----------------------------
-- Table structure for detail_pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian_obat`;
CREATE TABLE `detail_pembelian_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_batch` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `jumlah_satuan_terkecil` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `tgl_exp` date NULL DEFAULT NULL,
  `harga_beli` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `margin_jual` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian_obat
-- ----------------------------
INSERT INTO `detail_pembelian_obat` VALUES (1, 'FTR00003', 'OBT0001', 'BTCH0001', 5, 0, 14, '2021-03-23', 15000, 0, 100, 1, '2021-03-23 16:48:50', '2021-03-23 16:48:50');
INSERT INTO `detail_pembelian_obat` VALUES (2, 'FTR00003', 'OBT0003', 'BTCH0001', 5, 0, 14, '2021-03-24', 15000, 5, 50, 1, '2021-03-23 18:01:15', '2021-03-23 18:01:15');
INSERT INTO `detail_pembelian_obat` VALUES (3, 'FTR128265', 'OBT0003', 'BTCH0001', 5, 0, 14, '2021-03-24', 15000, 5, 50, 1, '2021-03-24 07:22:00', '2021-03-24 07:22:00');

-- ----------------------------
-- Table structure for detail_penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan_obat`;
CREATE TABLE `detail_penjualan_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_transaksi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan_obat
-- ----------------------------
INSERT INTO `detail_penjualan_obat` VALUES (1, 'OBT0001', 'TRN-23032138', 2, 4, 6000, 0, 12000, 2, '2021-03-23 17:02:45', '2021-03-23 17:02:45');
INSERT INTO `detail_penjualan_obat` VALUES (2, 'OBT0001', 'TRN-23032132', 3, 4, 6000, 0, 18000, 2, '2021-03-23 17:07:37', '2021-03-23 17:07:37');
INSERT INTO `detail_penjualan_obat` VALUES (3, 'OBT0001', 'TRN-23032132', 3, 4, 6000, 0, 18000, 2, '2021-03-23 17:08:32', '2021-03-23 17:08:32');
INSERT INTO `detail_penjualan_obat` VALUES (4, 'OBT0001', 'TRN-23032113', 1, 13, 6000, 0, 6000, 2, '2021-03-23 17:09:18', '2021-03-23 17:09:18');
INSERT INTO `detail_penjualan_obat` VALUES (5, 'OBT0001', 'TRN-23032134', 1, 13, 15000, 0, 15000, 2, '2021-03-23 17:10:40', '2021-03-23 17:10:40');
INSERT INTO `detail_penjualan_obat` VALUES (6, 'OBT0001', 'TRN-23032110', 1, 14, 30000, 0, 30000, 2, '2021-03-23 17:11:16', '2021-03-23 17:11:16');
INSERT INTO `detail_penjualan_obat` VALUES (7, 'OBT0001', 'TRN-24032105', 2, 4, 7500, 0, 15000, 2, '2021-03-24 08:12:59', '2021-03-24 08:12:59');
INSERT INTO `detail_penjualan_obat` VALUES (8, 'OBT0003', 'TRN-24032105', 3, 4, 4500, 0, 13500, 2, '2021-03-24 08:12:59', '2021-03-24 08:12:59');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for golongan
-- ----------------------------
DROP TABLE IF EXISTS `golongan`;
CREATE TABLE `golongan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of golongan
-- ----------------------------
INSERT INTO `golongan` VALUES (1, 'Obat Herbal (Jamu)', NULL, NULL);
INSERT INTO `golongan` VALUES (2, 'Obat Fitofarmaka', NULL, NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Obat Bebas Terbatas', NULL, NULL);
INSERT INTO `kategori` VALUES (2, 'Obat Bebas', NULL, NULL);
INSERT INTO `kategori` VALUES (3, 'Obat Keras', NULL, NULL);
INSERT INTO `kategori` VALUES (4, 'Obat Wajib Apotek (OWA)', NULL, NULL);
INSERT INTO `kategori` VALUES (5, 'Obat Golongan Narkotika\r\n', NULL, NULL);
INSERT INTO `kategori` VALUES (6, 'Obat Psikotropika', NULL, NULL);
INSERT INTO `kategori` VALUES (7, 'Obat Herbal', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_02_20_163157_create_golongan_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_02_20_163221_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_02_20_163230_create_obat_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_02_20_163237_create_suplier_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_02_20_164051_create_unit_table', 1);

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_minimum` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES (22, 'OBT0001', 'Vitacimin', 10, 1, 2, 0, NULL, '2021-03-22 17:28:16', '2021-03-22 17:28:16');
INSERT INTO `obat` VALUES (23, 'OBT0003', 'Amoxcilin', 100, 2, 2, 0, NULL, '2021-03-23 18:00:15', '2021-03-23 18:00:15');

-- ----------------------------
-- Table structure for pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_obat`;
CREATE TABLE `pembelian_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_faktur` date NULL DEFAULT NULL,
  `suplier_id` bigint(20) NOT NULL,
  `pajak` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jatuh_tempo` date NULL DEFAULT NULL,
  `jumlah_tagihan` int(11) NULL DEFAULT NULL,
  `status_tagihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `tanggal_pengeluaran` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_obat
-- ----------------------------
INSERT INTO `pembelian_obat` VALUES (1, 'FTR00003', '2021-03-23', 1, 0, 0, 'Tunai', NULL, 75000, 'lunas', 1, '2021-03-23', '2021-03-24 14:18:24', '2021-03-24 14:18:24');
INSERT INTO `pembelian_obat` VALUES (2, 'FTR00003', '2021-03-24', 1, 0, 0, 'Tunai', NULL, 71250, 'lunas', 1, '2021-03-23', '2021-03-24 14:18:28', '2021-03-24 14:18:28');
INSERT INTO `pembelian_obat` VALUES (3, 'FTR128265', '2021-03-24', 1, 0, 0, 'Tunai', NULL, 71250, 'lunas', 1, '2021-03-24', '2021-03-24 07:22:00', '2021-03-24 07:22:00');

-- ----------------------------
-- Table structure for penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_obat`;
CREATE TABLE `penjualan_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_transaksi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_transaksi` date NULL DEFAULT NULL,
  `pelanggan_id` bigint(20) NOT NULL,
  `jumlah_bayar` int(11) NULL DEFAULT NULL,
  `uang_bayar` int(11) NULL DEFAULT NULL,
  `uang_kembali` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_obat
-- ----------------------------
INSERT INTO `penjualan_obat` VALUES (1, 'TRN-23032138', '2021-03-23', 0, 12000, 12000, 0, 2, '2021-03-23 17:02:45', '2021-03-23 17:02:45');
INSERT INTO `penjualan_obat` VALUES (2, 'TRN-23032132', '2021-03-23', 0, 18000, 20000, 2000, 2, '2021-03-23 17:07:37', '2021-03-23 17:07:37');
INSERT INTO `penjualan_obat` VALUES (3, 'TRN-23032132', '2021-03-23', 0, 18000, 20000, 2000, 2, '2021-03-23 17:08:32', '2021-03-23 17:08:32');
INSERT INTO `penjualan_obat` VALUES (4, 'TRN-23032113', '2021-03-23', 0, 6000, 10000, 4000, 2, '2021-03-23 17:09:18', '2021-03-23 17:09:18');
INSERT INTO `penjualan_obat` VALUES (5, 'TRN-23032134', '2021-03-23', 0, 15000, 20000, 5000, 2, '2021-03-23 17:10:40', '2021-03-23 17:10:40');
INSERT INTO `penjualan_obat` VALUES (6, 'TRN-23032110', '2021-03-23', 0, 30000, 30000, 0, 2, '2021-03-23 17:11:16', '2021-03-23 17:11:16');
INSERT INTO `penjualan_obat` VALUES (7, 'TRN-24032105', '2021-03-24', 0, 28500, 30000, 1500, 2, '2021-03-24 08:12:59', '2021-03-24 08:12:59');

-- ----------------------------
-- Table structure for satuan_obat
-- ----------------------------
DROP TABLE IF EXISTS `satuan_obat`;
CREATE TABLE `satuan_obat`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_id` bigint(20) NULL DEFAULT NULL,
  `jumlah_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_id_sama_dengan` bigint(20) NULL DEFAULT NULL,
  `sama_dengan` bigint(20) NULL DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga_Jual` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`, `stok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satuan_obat
-- ----------------------------
INSERT INTO `satuan_obat` VALUES (46, 'OBT0001', 4, '1', 4, 47, 198, 7500, '2021-03-24 15:12:59', '2021-03-24 08:12:59');
INSERT INTO `satuan_obat` VALUES (47, 'OBT0001', 13, '10', 4, 48, 20, 15000, '2021-03-24 15:12:59', '2021-03-24 08:12:59');
INSERT INTO `satuan_obat` VALUES (48, 'OBT0001', 14, '5', 13, 49, 4, 30000, '2021-03-24 00:11:16', '2021-03-23 17:11:16');
INSERT INTO `satuan_obat` VALUES (49, 'OBT0003', 4, '1', 4, 50, 1497, 4500, '2021-03-24 15:12:59', '2021-03-24 08:12:59');
INSERT INTO `satuan_obat` VALUES (50, 'OBT0003', 13, '10', 4, 51, 20, 4500, '2021-03-24 15:12:59', '2021-03-24 08:12:59');
INSERT INTO `satuan_obat` VALUES (51, 'OBT0003', 14, '15', 13, 52, 1, 22500, '2021-03-24 15:12:59', '2021-03-24 08:12:59');

-- ----------------------------
-- Table structure for suplier
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suplier
-- ----------------------------
INSERT INTO `suplier` VALUES (1, 'PT Kabayan Consulting', 'Jl. Pasirkaliki Cimahi', 'Willy', '08525415532', '2021-02-20 16:45:21', '2021-02-20 16:45:21');

-- ----------------------------
-- Table structure for temp_pembelian_obat
-- ----------------------------
DROP TABLE IF EXISTS `temp_pembelian_obat`;
CREATE TABLE `temp_pembelian_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_batch` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `jumlah_satuan_terkecil` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `tgl_exp` date NULL DEFAULT NULL,
  `harga_beli` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `margin_jual` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for temp_penjualan_obat
-- ----------------------------
DROP TABLE IF EXISTS `temp_penjualan_obat`;
CREATE TABLE `temp_penjualan_obat`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kode_obat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` int(11) NULL DEFAULT NULL,
  `unit_id` int(20) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `diskon` int(11) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_satuan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (4, 'Pcs', 1, '2021-02-27 07:18:53', '2021-02-27 07:18:53');
INSERT INTO `unit` VALUES (10, 'Botol', 1, '2021-03-22 15:20:45', '2021-03-22 15:20:45');
INSERT INTO `unit` VALUES (11, 'Fls', 1, '2021-03-22 15:21:53', '2021-03-22 15:21:53');
INSERT INTO `unit` VALUES (12, 'Fbx', 1, '2021-03-22 15:22:00', '2021-03-22 15:22:00');
INSERT INTO `unit` VALUES (13, 'Strip', 2, '2021-03-22 15:22:20', '2021-03-22 15:22:20');
INSERT INTO `unit` VALUES (14, 'Box', 3, '2021-03-22 15:22:41', '2021-03-22 15:22:41');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin', NULL, '$2y$10$IaxscuwchfpNm/kaKV3wnebnQAnvmHfd.RO2HtJYjYvL8W64tq8Gy', 'admin', NULL, '2021-02-20 16:44:50', '2021-02-27 17:19:11');
INSERT INTO `users` VALUES (2, 'Willy', 'willy', NULL, '$2y$10$0E19YTvDZgOGNWmki3WJ6e5xLru3EjbZvW3r4DsuSTv7qzUxp85T.', 'kasir', NULL, '2021-02-27 04:29:44', '2021-02-27 04:29:44');
INSERT INTO `users` VALUES (3, 'Ahmad', 'ahmad', NULL, '$2y$10$UWr7ra5TZexnlXx1lMbt8.ZSRcPWZBawvxNtDJbn//gy5nSJPdAmC', 'kasir', NULL, '2021-03-03 08:37:58', '2021-03-03 08:37:58');

SET FOREIGN_KEY_CHECKS = 1;
