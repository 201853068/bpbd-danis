-- -------------------------------------------------------------
-- TablePlus 4.8.2(436)
--
-- https://tableplus.com/
--
-- Database: bpbd
-- Generation Time: 2022-08-22 15:39:16.4770
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `jenis_barang`;
CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(50) NOT NULL,
  `jenis_brg` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pemasukan`;
CREATE TABLE `pemasukan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(30) NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan` (
  `id_pengajuan` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `id_jenis` int NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `hargabarang` double NOT NULL,
  `total` double NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_pengajuan`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pengajuan_sementara`;
CREATE TABLE `pengajuan_sementara` (
  `id_pengajuan_sementara` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `id_jenis` int NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `hargabarang` double NOT NULL,
  `total` double NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_pengajuan_sementara`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `jumlah` int NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `permintaan`;
CREATE TABLE `permintaan` (
  `id_permintaan` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `id_jenis` int NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status` int NOT NULL,
  `jumlah_tersedia` int DEFAULT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sementara`;
CREATE TABLE `sementara` (
  `id_sementara` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `kode_brg` varchar(7) NOT NULL,
  `id_jenis` int NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `jumlah_tersedia` int DEFAULT NULL,
  PRIMARY KEY (`id_sementara`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `stokbarang`;
CREATE TABLE `stokbarang` (
  `id_kode_brg` int NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis` int NOT NULL,
  `nama_brg` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hargabarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int NOT NULL,
  `keluar` int NOT NULL,
  `sisa` int NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kode_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('instansi','bendahara','it') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_brg`) VALUES
('1', 'ATK'),
('2', 'ALAT KEBERSIHAN'),
('3', 'BELANJA CETAK'),
('4', 'PANTRY'),
('5', 'ALAT ELETRONIK & KELISTRIKAN');

INSERT INTO `pemasukan` (`id`, `unit`, `kode_brg`, `jumlah`, `tgl_masuk`) VALUES
(18, 'Siti Rusdah', '111.002', 100, '2020-11-12'),
(19, 'Siti Rusdah', '111.001', 12, '2020-11-13'),
(20, 'Siti Rusdah', '111.001', 10, '2020-11-13'),
(21, 'Siti Rusdah', '111.002', 10, '2020-11-13'),
(22, 'Siti Rusdah', '111.003', 10, '2020-11-13'),
(23, 'Siti Rusdah', '111.001', 10, '2020-11-19'),
(24, 'Siti Rusdah', '112.002', 10, '2020-11-19');

INSERT INTO `pengajuan` (`id_pengajuan`, `unit`, `kode_brg`, `id_jenis`, `jumlah`, `satuan`, `hargabarang`, `total`, `tgl_pengajuan`, `status`) VALUES
(1, 'Admin_gudang', '111.001', 1, 11, 'PACK', 25000, 275000, '2022-07-28', 0),
(2, 'Admin_gudang', '113.001', 3, 10, 'buah', 150000, 1500000, '2022-07-28', 0),
(3, 'Admin_gudang', '112.002', 2, 2, 'BUAH', 15000, 30000, '2022-07-28', 0),
(4, 'Admin_gudang', '112.001', 2, 8, 'BUAH', 15000, 120000, '2022-07-28', 0),
(5, 'Admin_gudang', '112.001', 2, 8, 'BUAH', 15000, 120000, '2022-07-28', 0),
(48, 'Siti Rusdah', '111.002', 1, 100, 'PACK', 15000, 1500000, '2020-11-12', 1),
(49, 'Siti Rusdah', '111.001', 1, 12, 'PACK', 25000, 300000, '2020-11-13', 1),
(50, 'Siti Rusdah', '111.001', 1, 10, 'PACK', 25000, 250000, '2020-11-13', 1),
(51, 'Siti Rusdah', '111.002', 1, 10, 'PACK', 15000, 150000, '2020-11-13', 1),
(52, 'Siti Rusdah', '111.003', 1, 10, 'RIM', 45000, 450000, '2020-11-13', 1),
(53, 'Siti Rusdah', '111.001', 1, 10, 'PACK', 25000, 250000, '2020-11-19', 1),
(54, 'Siti Rusdah', '112.002', 2, 10, 'BUAH', 15000, 150000, '2020-11-19', 1),
(55, 'Siti Rusdah', '113.003', 3, 100, 'PACK', 15000, 1500000, '2021-02-12', 0),
(56, 'Siti Rusdah', '112.004', 2, 100, 'SATUAN', 10000, 1000000, '2021-02-12', 0);

INSERT INTO `pengeluaran` (`id`, `unit`, `jumlah`, `kode_brg`, `tgl_keluar`) VALUES
(52, 'Desi Novita', 10, '111.001', '2020-11-12'),
(53, 'Desi Novita', 10, '111.003', '2020-11-13'),
(54, 'Desi Novita', 5, '111.001', '2020-11-19'),
(55, 'Desi Novita', 5, '112.001', '2020-11-19'),
(56, 'Ratna Fauziah', 1, '111.001', '2021-02-12'),
(57, 'Ratna Fauziah', 2, '112.001', '2021-02-12'),
(58, 'Desi Novita', 2, '112.001', '2021-02-12'),
(59, 'Ratna Fauziah', 1, '112.002', '2022-07-28'),
(60, 'Ratna Fauziah', 2, '111.004', '2022-07-28'),
(61, 'pegawai', 4, '111.001', '2022-07-28'),
(62, 'pegawai', 1, '113.001', '2022-07-28'),
(63, 'pegawai', 32, '111.001', '2022-07-28'),
(64, 'pegawai', 10, '112.001', '2022-07-28'),
(65, 'pegawai', 10, '112.004', '2022-07-28'),
(66, 'pegawai', 2, '111.003', '2022-07-28'),
(67, 'pegawai', 2, '111.003', '2022-07-28'),
(68, 'pegawai', 2, '111.003', '2022-07-28');

INSERT INTO `permintaan` (`id_permintaan`, `unit`, `instansi`, `kode_brg`, `id_jenis`, `jumlah`, `tgl_permintaan`, `status`, `jumlah_tersedia`) VALUES
(98, 'Desi Novita', 'RPTRA', '111.001', 1, 10, '2020-11-12', 0, NULL),
(99, 'Desi Novita', 'RPTRA', '111.003', 1, 10, '2020-11-13', 0, NULL),
(100, 'Desi Novita', 'RPTRA', '111.001', 1, 5, '2020-11-19', 0, NULL),
(101, 'Desi Novita', 'RPTRA', '112.001', 2, 5, '2020-11-19', 0, NULL),
(102, 'Desi Novita', 'RPTRA', '112.001', 2, 2, '2021-02-12', 0, NULL),
(103, 'Ratna Fauziah', 'PPSU', '111.001', 1, 1, '2021-02-12', 0, NULL),
(104, 'Ratna Fauziah', 'PPSU', '112.001', 2, 2, '2021-02-12', 0, NULL),
(105, 'Ratna Fauziah', 'PPSU', '112.002', 2, 1, '2021-02-12', 0, NULL),
(106, 'Ratna Fauziah', 'Bidang 1', '111.004', 1, 2, '2022-07-22', 0, NULL),
(107, 'pegawai', 'Bidang 1', '111.001', 1, 4, '2022-07-28', 3, NULL),
(108, 'pegawai', 'Bidang 1', '113.001', 3, 1, '2022-07-28', 0, NULL),
(109, 'pegawai', 'Bidang 1', '112.001', 2, 10, '2022-07-28', 2, NULL),
(110, 'pegawai', 'Bidang 1', '111.001', 1, 32, '2022-07-28', 1, NULL),
(111, 'pegawai', 'Bidang 1', '112.004', 2, 10, '2022-07-28', 0, NULL),
(112, 'Emelda Ana', 'Bidang 2', '112.001', 2, 8, '2022-07-28', 3, 5),
(113, 'pegawai', 'Bidang 1', '111.001', 1, 5, '2022-07-28', 1, NULL),
(114, 'pegawai', 'Bidang 1', '111.003', 1, 2, '2022-07-28', 3, NULL),
(116, 'pegawai', 'Bidang 1', '114.004', 4, 7, '2022-08-22', 3, 4);

INSERT INTO `stokbarang` (`id_kode_brg`, `kode_brg`, `id_jenis`, `nama_brg`, `hargabarang`, `satuan`, `stok`, `keluar`, `sisa`, `keterangan`) VALUES
(23, '111.001', 1, 'BALLPOINT', '25000', 'PACK', 132, 52, 80, ''),
(24, '111.002', 1, 'PENSIL', '15000', 'PACK', 110, 0, 120, ''),
(25, '111.003', 1, 'KERTAS F4', '45000', 'RIM', 110, 16, 94, ''),
(26, '111.004', 1, 'PENGHAPUS KARET', '5500', 'SET', 0, 2, -2, ''),
(27, '111.005', 1, 'PENGHAPUS CAIR', '14000', 'LUSIN', 0, 0, 0, ''),
(28, '111.006', 1, 'BUKU TULIS FOLIO', '15500', 'PACK', 0, 0, 0, ''),
(29, '111.007', 1, 'ODNER KARTON', '10000', 'BUAH', 0, 0, 0, 'STOK ABIS'),
(30, '111.008', 1, 'ISI CUTTOR', '5000', 'BUAH', 0, 0, 0, ''),
(31, '111.009', 1, 'LAKBAN BENING GOLD TAPE', '12000', 'BUAH', 0, 0, 0, ''),
(32, '111.010', 1, 'DOUBLE TAPE', '15000', 'PACK', 0, 0, 0, ''),
(33, '111.011', 1, 'SELOTIP', '8000', 'PACK', 0, 0, 0, ''),
(34, '111.012', 1, 'LEM KERTAS', '2500', 'SATUAN', 0, 0, 0, ''),
(35, '111.013', 1, 'REMOVER STAPLER', '9000', 'SATUAN', 0, 0, 0, ''),
(36, '112.001', 2, 'LAP PEL', '15000', 'BUAH', 100, 19, 81, ''),
(37, '112.002', 2, 'EMBER', '15000', 'BUAH', 10, 1, 9, ''),
(40, '112.004', 2, 'KANEBO', '10000', 'buah', 10, 10, 0, ''),
(41, '112.005', 2, 'PEMBERSIH KACA', '15000', 'SATUAN', 0, 0, 0, ''),
(42, '112.006', 2, 'SABUN CUCI TANGAN', '24000', 'SATUAN', 0, 0, 0, ''),
(43, '112.007', 2, 'PEWANGI LANTAI', '5000', 'SATUAN', 0, 0, 0, ''),
(44, '112.008', 2, 'TISSUE', '10000', 'SATUAN', 0, 0, 0, ''),
(46, '112.010', 2, 'SABUN CUCI PIRING', '10000', 'SATUAN', 0, 0, 0, ''),
(47, '112.011', 2, 'SAPU LIDI', '12500', 'UNIT', 0, 0, 0, ''),
(52, '113.001', 3, 'Banner', '150000', 'buah', 10, 1, 9, 'Banner 17an'),
(55, '111.014', 1, 'TES', '25000', 'DUS', 0, 0, 0, ''),
(56, '112.012', 2, 'Kain Lap', '8000', 'buah', 0, 0, 0, ''),
(57, 'PENSIL', 1, '', '', '', 0, 0, 0, ''),
(58, '114.004', 4, 'Kopi', '5000', 'pcs', 50, 0, 0, ''),
(60, '115.002', 5, 'Stop Kontak', '15000', 'pcs', 50, 0, 0, '');

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `jabatan`) VALUES
(1, 'Siti Rusdah', '21232f297a57a5a743894a0e4a801fc3', 'bendahara', 'Admin'),
(10, 'Emelda Ana', '21232f297a57a5a743894a0e4a801fc3', 'instansi', 'Bidang 2'),
(13, 'Desi Novita', '21232f297a57a5a743894a0e4a801fc3', 'instansi', 'Sekertariat'),
(14, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'instansi', 'Bidang 1'),
(15, 'Admin_gudang', '827ccb0eea8a706c4c34a16891f84e7b', 'bendahara', 'Admin'),
(16, 'Kepalabagian', '1a50ef14d0d75cd795860935ee0918af', 'it', 'Kepala Sub Bagian');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;