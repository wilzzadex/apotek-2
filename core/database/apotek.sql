/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : apotek

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 06/03/2021 19:02:30
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
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_setup
-- ----------------------------
INSERT INTO `app_setup` VALUES (1, 1, 'Apotek Tes', NULL, 'apotek-tes1614864483.png', 'Jl.Kopo', '2021-03-04 20:28:04', '2021-03-04 13:28:04');

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
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pembelian_obat
-- ----------------------------
INSERT INTO `detail_pembelian_obat` VALUES (59, 'FTR00001', 'OBT0001', 'BTCH0001', 100, 0, 4, '2021-03-28', 1000, 2, 100, 1, '2021-02-28 06:00:12', '2021-02-28 06:00:12');
INSERT INTO `detail_pembelian_obat` VALUES (60, 'FTR00002', 'OBT0001', 'BTCH0002', 100, 0, 5, '2021-03-31', 10000, 5, 100, 1, '2021-02-28 06:01:39', '2021-02-28 06:01:39');
INSERT INTO `detail_pembelian_obat` VALUES (61, 'FTR00003', 'OBT0001', 'BTCH0003', 10, 0, 7, '2021-04-10', 100000, 10, 100, 1, '2021-02-28 06:02:48', '2021-02-28 06:02:48');
INSERT INTO `detail_pembelian_obat` VALUES (62, 'FTR00004', 'OBT0001', 'BTCH0006', 100, 0, 7, '2021-03-01', 100000, 5, 100, 1, '2021-02-28 06:10:18', '2021-02-28 06:10:18');
INSERT INTO `detail_pembelian_obat` VALUES (63, 'FTR00007', 'OBT0002', 'btch00012', 50, 0, 4, '2021-04-10', 500, 5, 100, 1, '2021-02-28 06:18:12', '2021-02-28 06:18:12');
INSERT INTO `detail_pembelian_obat` VALUES (64, 'FTR00008', 'OBT0002', 'btch00013', 50, 0, 5, '2021-04-10', 5000, 5, 100, 1, '2021-02-28 06:19:29', '2021-02-28 06:19:29');
INSERT INTO `detail_pembelian_obat` VALUES (65, 'FTR128265', 'OBTS001', 'H20002', 3, 0, 5, '2025-02-27', 8500, 5, 100, 1, '2021-03-03 06:52:08', '2021-03-03 06:52:08');
INSERT INTO `detail_pembelian_obat` VALUES (66, 'FTR128265', 'OBTS002', 'BTCH0003', 10, 0, 9, '2021-02-09', 30000, 10, 100, 1, '2021-03-03 06:52:08', '2021-03-03 06:52:08');
INSERT INTO `detail_pembelian_obat` VALUES (67, 'FTR3566', 'OBTS001', 'BTCH0010', 100, 0, 5, '2021-03-10', 30000, 10, 50, 1, '2021-03-03 07:05:11', '2021-03-03 07:05:11');
INSERT INTO `detail_pembelian_obat` VALUES (68, 'F73542374', 'OBT0001', 'BTCH0097', 1, 0, 7, '2025-07-10', 30000, 5, 10, 1, '2021-03-04 13:40:40', '2021-03-04 13:40:40');
INSERT INTO `detail_pembelian_obat` VALUES (69, 'F73542374', 'OBT0002', 'BTCH0097', 10, 0, 5, '2025-07-10', 15000, 5, 10, 1, '2021-03-04 13:40:40', '2021-03-04 13:40:40');
INSERT INTO `detail_pembelian_obat` VALUES (70, 'FTR12826545', 'OBT746673', 'BTCH0454', 4, 0, 7, '2030-01-30', 50000, 5, 10, 1, '2021-03-04 14:04:55', '2021-03-04 14:04:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_penjualan_obat
-- ----------------------------
INSERT INTO `detail_penjualan_obat` VALUES (75, 'OBT0001', 'TRN-28022145', 10, 4, 2000, 0, 20000, 2, '2021-02-28 09:56:50', '2021-02-28 09:56:50');
INSERT INTO `detail_penjualan_obat` VALUES (76, 'OBTS002', 'TRN-03032103', 1, 9, 60000, 0, 60000, 2, '2021-03-03 07:53:09', '2021-03-03 07:53:09');
INSERT INTO `detail_penjualan_obat` VALUES (77, 'OBT0001', 'TRN-03032103', 2, 4, 2000, 0, 4000, 2, '2021-03-03 07:53:09', '2021-03-03 07:53:09');
INSERT INTO `detail_penjualan_obat` VALUES (78, 'OBTS002', 'TRN-03032149', 2, 9, 60000, 0, 120000, 2, '2021-03-03 07:54:57', '2021-03-03 07:54:57');
INSERT INTO `detail_penjualan_obat` VALUES (79, 'OBT0002', 'TRN-04032130', 5, 4, 1000, 5, 4750, 2, '2021-03-04 13:48:58', '2021-03-04 13:48:58');
INSERT INTO `detail_penjualan_obat` VALUES (80, 'OBT0001', 'TRN-04032130', 5, 4, 2000, 0, 10000, 2, '2021-03-04 13:48:58', '2021-03-04 13:48:58');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES (11, 'OBT0001', 'Vitacimin', 100, 2, 2, 0, NULL, '2021-02-28 05:54:02', '2021-02-28 05:54:02');
INSERT INTO `obat` VALUES (12, 'OBT0002', 'Bodrexin', 100, 1, 2, 0, NULL, '2021-02-28 06:16:58', '2021-02-28 06:16:58');
INSERT INTO `obat` VALUES (13, 'OBTS001', 'AKURAT STP *1S', 100, 2, 2, 0, NULL, '2021-02-28 13:31:42', '2021-02-28 13:31:42');
INSERT INTO `obat` VALUES (14, 'OBTS002', 'CALADINE POWDER', 10, 1, 2, 0, NULL, '2021-02-28 13:33:02', '2021-02-28 13:33:02');
INSERT INTO `obat` VALUES (15, '0387665', 'Obat Tes', 100, 7, 2, 0, NULL, '2021-03-04 13:33:22', '2021-03-04 13:33:22');
INSERT INTO `obat` VALUES (16, 'OBT746673', 'Bodrexin', 10, 1, 1, 0, NULL, '2021-03-04 14:01:02', '2021-03-04 14:01:02');

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
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_obat
-- ----------------------------
INSERT INTO `pembelian_obat` VALUES (26, 'FTR00001', '2021-02-28', 1, 0, 0, 'Tunai', NULL, 98000, 'lunas', 1, '2021-02-28 06:00:12', '2021-02-28 06:00:12');
INSERT INTO `pembelian_obat` VALUES (27, 'FTR00002', '2021-02-28', 1, 10, 0, 'Tunai', NULL, 1045000, 'lunas', 1, '2021-02-28 06:01:39', '2021-02-28 06:01:39');
INSERT INTO `pembelian_obat` VALUES (28, 'FTR00003', '2021-02-28', 1, 10, 0, 'Tunai', NULL, 990000, 'lunas', 1, '2021-02-28 06:02:48', '2021-02-28 06:02:48');
INSERT INTO `pembelian_obat` VALUES (29, 'FTR00004', '2021-03-13', 1, 10, 0, 'Tunai', NULL, 10450000, 'lunas', 1, '2021-02-28 06:10:18', '2021-02-28 06:10:18');
INSERT INTO `pembelian_obat` VALUES (30, 'FTR00007', '2021-02-28', 1, 0, 0, 'Tunai', NULL, 23750, 'lunas', 1, '2021-02-28 06:18:12', '2021-02-28 06:18:12');
INSERT INTO `pembelian_obat` VALUES (31, 'FTR00008', '2021-02-28', 1, 0, 0, 'Kredit', '2021-03-31', 237500, 'belum_lunas', 1, '2021-02-28 06:19:29', '2021-02-28 06:19:29');
INSERT INTO `pembelian_obat` VALUES (32, 'FTR128265', '2021-02-24', 1, 0, 0, 'Tunai', NULL, 294225, 'lunas', 1, '2021-03-03 06:52:08', '2021-03-03 06:52:08');
INSERT INTO `pembelian_obat` VALUES (33, 'FTR3566', '2021-03-03', 1, 0, 0, 'Kredit', '2021-03-03', 2700000, 'lunas', 1, '2021-03-04 20:42:03', '2021-03-04 13:42:03');
INSERT INTO `pembelian_obat` VALUES (34, 'F73542374', '2021-03-04', 1, 10, 0, 'Kredit', '2021-03-07', 188100, 'belum_lunas', 1, '2021-03-04 13:40:40', '2021-03-04 13:40:40');
INSERT INTO `pembelian_obat` VALUES (35, 'FTR12826545', '2021-03-04', 1, 0, 0, 'Tunai', NULL, 190000, 'lunas', 1, '2021-03-04 14:04:55', '2021-03-04 14:04:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_obat
-- ----------------------------
INSERT INTO `penjualan_obat` VALUES (45, 'TRN-28022145', '2021-02-28', 0, 20000, 20000, 0, 2, '2021-03-03 20:16:06', '2021-03-03 20:16:06');
INSERT INTO `penjualan_obat` VALUES (46, 'TRN-03032103', '2021-03-03', 0, 64000, 70000, 6000, 2, '2021-03-03 20:16:06', '2021-03-03 20:16:06');
INSERT INTO `penjualan_obat` VALUES (47, 'TRN-03032149', '2021-03-03', 0, 120000, 120000, 0, 2, '2021-03-03 20:16:06', '2021-03-03 20:16:06');
INSERT INTO `penjualan_obat` VALUES (48, 'TRN-04032130', '2021-03-04', 0, 14750, 15000, 250, 2, '2021-03-04 13:48:58', '2021-03-04 13:48:58');

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
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga_Jual` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`, `stok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satuan_obat
-- ----------------------------
INSERT INTO `satuan_obat` VALUES (19, 'OBT0001', 4, '1', 4, 112, 2000, '2021-03-04 20:48:58', '2021-03-04 13:48:58');
INSERT INTO `satuan_obat` VALUES (20, 'OBT0001', 5, '10', 4, 100, 20000, '2021-02-28 13:01:39', '2021-02-28 06:01:39');
INSERT INTO `satuan_obat` VALUES (21, 'OBT0001', 7, '50', 5, 111, 33000, '2021-03-04 20:40:40', '2021-03-04 13:40:40');
INSERT INTO `satuan_obat` VALUES (22, 'OBT0002', 4, '1', 4, 52, 1000, '2021-03-04 20:48:58', '2021-03-04 13:48:58');
INSERT INTO `satuan_obat` VALUES (23, 'OBT0002', 5, '10', 4, 60, 16500, '2021-03-04 20:40:40', '2021-03-04 13:40:40');
INSERT INTO `satuan_obat` VALUES (24, 'OBTS001', 4, '1', 4, 0, 0, '2021-02-28 13:31:42', '2021-02-28 13:31:42');
INSERT INTO `satuan_obat` VALUES (25, 'OBTS001', 5, '10', 4, 103, 45000, '2021-03-03 14:05:11', '2021-03-03 07:05:11');
INSERT INTO `satuan_obat` VALUES (26, 'OBTS002', 8, '1', 8, 0, 0, '2021-02-28 13:33:02', '2021-02-28 13:33:02');
INSERT INTO `satuan_obat` VALUES (27, 'OBTS002', 9, '10', 8, 13, 60000, '2021-03-03 14:54:57', '2021-03-03 07:54:57');
INSERT INTO `satuan_obat` VALUES (28, '0387665', 4, '1', 4, 0, 0, '2021-03-04 13:33:22', '2021-03-04 13:33:22');
INSERT INTO `satuan_obat` VALUES (29, '0387665', 5, '10', 4, 0, 0, '2021-03-04 13:33:22', '2021-03-04 13:33:22');
INSERT INTO `satuan_obat` VALUES (30, '0387665', 7, '50', 5, 0, 0, '2021-03-04 13:33:22', '2021-03-04 13:33:22');
INSERT INTO `satuan_obat` VALUES (31, 'OBT746673', 4, '1', 4, 0, 0, '2021-03-04 14:01:02', '2021-03-04 14:01:02');
INSERT INTO `satuan_obat` VALUES (32, 'OBT746673', 5, '7', 4, 0, 0, '2021-03-04 14:01:02', '2021-03-04 14:01:02');
INSERT INTO `satuan_obat` VALUES (33, 'OBT746673', 7, '70', 5, 4, 55000, '2021-03-04 21:04:55', '2021-03-04 14:04:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (4, 'Pcs', 1, '2021-02-27 07:18:53', '2021-02-27 07:18:53');
INSERT INTO `unit` VALUES (5, 'Strip', 2, '2021-02-27 07:19:14', '2021-02-27 07:19:14');
INSERT INTO `unit` VALUES (6, 'Minidose', 3, '2021-02-27 07:19:24', '2021-02-27 07:19:24');
INSERT INTO `unit` VALUES (7, 'Box', 4, '2021-02-27 07:19:31', '2021-02-27 07:19:31');
INSERT INTO `unit` VALUES (8, 'Botol', 3, '2021-02-28 13:30:39', '2021-02-28 13:30:39');
INSERT INTO `unit` VALUES (9, 'Tube', 4, '2021-02-28 13:30:54', '2021-02-28 13:30:54');

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
