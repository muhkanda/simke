/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.5.63-MariaDB : Database - bSghyCT7Rh
*********************************************************************
*/

/*!40101 SET NAMES UTF8MB4  */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bSghyCT7Rh` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bSghyCT7Rh`;

/*Table structure for table `tb_anggaran_data` */

DROP TABLE IF EXISTS `tb_anggaran_data`;

CREATE TABLE `tb_anggaran_data` (
  `id_anggaran_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_periode` int(11) NOT NULL,
  `id_jenis_anggaran` int(11) NOT NULL,
  `rencana_anggaran` bigint(20) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Waiting',
  PRIMARY KEY (`id_anggaran_data`),
  KEY `id_periode` (`id_periode`),
  KEY `id_jenis_anggaran` (`id_jenis_anggaran`),
  CONSTRAINT `tb_anggaran_data_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `tb_anggaran_periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_anggaran_data_ibfk_2` FOREIGN KEY (`id_jenis_anggaran`) REFERENCES `tb_jenis_anggaran` (`id_jenis_anggaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_anggaran_data` */

insert  into `tb_anggaran_data`(`id_anggaran_data`,`id_periode`,`id_jenis_anggaran`,`rencana_anggaran`,`realisasi_anggaran`,`status`) values 
(1,1,3,5000000000,5000000000,'Tidak Disetujui'),
(2,2,3,9000000000,9000000000,'Disetujui'),
(3,1,1,13000000000,13000000000,'Disetujui'),
(5,2,3,150000000,130000000,'Tidak Disetujui');

/*Table structure for table `tb_anggaran_periode` */

DROP TABLE IF EXISTS `tb_anggaran_periode`;

CREATE TABLE `tb_anggaran_periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `periode` date DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tgl_update` date DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_anggaran_periode` */

insert  into `tb_anggaran_periode`(`id_periode`,`periode`,`keterangan`,`tgl_update`) values 
(1,'2020-01-01','Periode Anggaran Januari 2020','2020-01-02'),
(2,'2020-02-01','Periode Anggaran Februari 2020','2020-01-02');

/*Table structure for table `tb_arus_kas_data` */

DROP TABLE IF EXISTS `tb_arus_kas_data`;

CREATE TABLE `tb_arus_kas_data` (
  `id_ak_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_periode` int(11) NOT NULL,
  `ket_biaya` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `saldo_awal` bigint(20) NOT NULL DEFAULT '0',
  `bulan_berjalan` bigint(20) NOT NULL DEFAULT '0',
  `saldo_akhir` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ak_data`),
  KEY `id_periode` (`id_periode`),
  CONSTRAINT `tb_arus_kas_data_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `tb_arus_kas_periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_arus_kas_data` */

insert  into `tb_arus_kas_data`(`id_ak_data`,`id_periode`,`ket_biaya`,`tgl_masuk`,`saldo_awal`,`bulan_berjalan`,`saldo_akhir`) values 
(1,1,'Biaya Produksi Bulanan','2019-12-02',115000000,5000000,120000000),
(2,1,'Biaya Produksi Bulanan 2','2019-12-15',7500000,2500000,10000000),
(10,3,'Percobaan Arus Kas','2020-01-01',3213213,21321321,24534534),
(11,3,'Percobaan Arus Kas 2','2020-01-04',543543543,422342342,965885885);

/*Table structure for table `tb_arus_kas_periode` */

DROP TABLE IF EXISTS `tb_arus_kas_periode`;

CREATE TABLE `tb_arus_kas_periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `periode` date NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_update` date NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_arus_kas_periode` */

insert  into `tb_arus_kas_periode`(`id_periode`,`periode`,`keterangan`,`tgl_update`) values 
(1,'2019-12-01','Desember Data Peiode','2019-12-17'),
(2,'2020-01-01','Data Periode Januari 2020 ','2019-12-31'),
(3,'2020-01-01','Periode Januari 2020','2020-01-02');

/*Table structure for table `tb_divisi` */

DROP TABLE IF EXISTS `tb_divisi`;

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_divisi` */

insert  into `tb_divisi`(`id_divisi`,`nama_divisi`,`keterangan`) values 
(3,'Toilet','Divisi Toilet');

/*Table structure for table `tb_gaji` */

DROP TABLE IF EXISTS `tb_gaji`;

CREATE TABLE `tb_gaji` (
  `nik` varchar(50) NOT NULL,
  `gaji` int(15) NOT NULL,
  PRIMARY KEY (`nik`),
  CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gaji` */

insert  into `tb_gaji`(`nik`,`gaji`) values 
('B123456789',4000000);

/*Table structure for table `tb_jabatan` */

DROP TABLE IF EXISTS `tb_jabatan`;

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(250) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jabatan` */

insert  into `tb_jabatan`(`id_jabatan`,`nama_jabatan`,`keterangan`) values 
(1,'ADM Staff','Manajer Keuangan'),
(2,'Legal','Manajer Keuangan'),
(3,'Accounting','Manajer Keuangan'),
(5,'DIREKTUR','DIREKTUR KEUANGAN');

/*Table structure for table `tb_jenis_anggaran` */

DROP TABLE IF EXISTS `tb_jenis_anggaran`;

CREATE TABLE `tb_jenis_anggaran` (
  `id_jenis_anggaran` int(11) NOT NULL AUTO_INCREMENT,
  `pos_anggaran` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_anggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenis_anggaran` */

insert  into `tb_jenis_anggaran`(`id_jenis_anggaran`,`pos_anggaran`) values 
(1,'BULANAN'),
(3,'TAHUNAN');

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` varchar(200) NOT NULL COMMENT 'pg teteap; pg lama;',
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `nik` (`nik`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`id_pegawai`,`nik`,`nama_lengkap`,`no_hp`,`alamat`,`status_pegawai`,`id_jabatan`) values 
(9,'B123456789','ASEP','081564543123','Jl. Alamat Naik 123','TETAP',2);

/*Table structure for table `tb_pendapatan_data` */

DROP TABLE IF EXISTS `tb_pendapatan_data`;

CREATE TABLE `tb_pendapatan_data` (
  `id_p_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_pendapatan_ket` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `pendapatan` int(25) NOT NULL,
  `biaya` int(25) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_p_data`),
  KEY `id_pendapatan_ket` (`id_pendapatan_ket`),
  CONSTRAINT `tb_pendapatan_data_ibfk_2` FOREIGN KEY (`id_pendapatan_ket`) REFERENCES `tb_pendapatan_ket` (`id_pendapatan_ket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendapatan_data` */

insert  into `tb_pendapatan_data`(`id_p_data`,`id_pendapatan_ket`,`keterangan`,`pendapatan`,`biaya`,`id_pengguna`) values 
(4,5,'Pendapatan Divisi Tolet',50000000,10000000,0),
(5,5,'Pendapatan Divisi Tolet',30000000,5000000,0);

/*Table structure for table `tb_pendapatan_ket` */

DROP TABLE IF EXISTS `tb_pendapatan_ket`;

CREATE TABLE `tb_pendapatan_ket` (
  `id_pendapatan_ket` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_pendapatan_ket`),
  KEY `id_divisi` (`id_divisi`),
  CONSTRAINT `tb_pendapatan_ket_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `tb_divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendapatan_ket` */

insert  into `tb_pendapatan_ket`(`id_pendapatan_ket`,`id_divisi`,`keterangan`,`bulan`,`tahun`) values 
(5,3,'Pendapatan Divisi Tolet',1,2020),
(6,3,'Pendapatan Divisi Tolet',2,2020);

/*Table structure for table `tb_potongan` */

DROP TABLE IF EXISTS `tb_potongan`;

CREATE TABLE `tb_potongan` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `potongan` int(15) NOT NULL,
  PRIMARY KEY (`id_potongan`),
  KEY `nik` (`nik`),
  CONSTRAINT `tb_potongan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_potongan` */

/*Table structure for table `tb_tunjangan` */

DROP TABLE IF EXISTS `tb_tunjangan`;

CREATE TABLE `tb_tunjangan` (
  `nik` varchar(50) NOT NULL,
  `tunjangan` int(15) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  CONSTRAINT `tb_tunjangan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tunjangan` */

insert  into `tb_tunjangan`(`nik`,`tunjangan`) values 
('B123456789',350000);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama`,`username`,`password`,`role`) values 
(1,'SIMKE Admin','admin','21232f297a57a5a743894a0e4a801fc3','1'),
(2,'SIMKE Keuangan','keuangan','a4151d4b2856ec63368a7c784b1f0a6e','2'),
(3,'SIMKE Barang','barang','177cbf2b2fda8daf8688bd68a5ea6e14','3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
