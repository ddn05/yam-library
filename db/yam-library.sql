/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 10.4.13-MariaDB : Database - yam-library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yam-library` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `yam-library`;

/*Table structure for table `tb_anggota` */

DROP TABLE IF EXISTS `tb_anggota`;

CREATE TABLE `tb_anggota` (
  `nim` int(12) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_anggota` */

insert  into `tb_anggota`(`nim`,`nama`,`jk`,`alamat`) values 
(1177050026,'Dadan','Laki-Laki','Bandung'),
(1177050028,'Deden furqon','Laki-Laki','Sumedang');

/*Table structure for table `tb_buku` */

DROP TABLE IF EXISTS `tb_buku`;

CREATE TABLE `tb_buku` (
  `kode` varchar(10) NOT NULL,
  `judul` varchar(40) DEFAULT NULL,
  `penulis` varchar(40) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `penerbit` varchar(40) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_buku` */

insert  into `tb_buku`(`kode`,`judul`,`penulis`,`tahun`,`penerbit`,`kategori`,`stok`) values 
('112','Sebuah Seni Untuk Bersikap Bodo Amat','Mark Manson',2020,'Jembar.id','Umum',5),
('113','La Tahzan Innalloha Ma\'ana','Saeful',2002,'Jembar.id','Agama',7);

/*Table structure for table `tb_petugas` */

DROP TABLE IF EXISTS `tb_petugas`;

CREATE TABLE `tb_petugas` (
  `id` int(30) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_petugas` */

insert  into `tb_petugas`(`id`,`nama`,`username`,`password`) values 
(0,'Dadan','admin','0192023a7bbd73250516f069df18b500'),
(1,'Dadan','admin','0192023a7bbd73250516f069df18b500');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(30) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(30) DEFAULT NULL,
  `nim_anggota` int(12) DEFAULT NULL,
  `kode_buku` varchar(15) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` int(20) DEFAULT NULL,
  `total_denda` int(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `nim_anggota` (`nim_anggota`),
  KEY `kode_buku` (`kode_buku`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id`),
  CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`nim_anggota`) REFERENCES `tb_anggota` (`nim`),
  CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`id_petugas`,`nim_anggota`,`kode_buku`,`tgl_pinjam`,`tgl_kembali`,`denda`,`total_denda`,`status`,`tgl_dikembalikan`) values 
(20,0,1177050026,'113','2020-12-13','2020-12-20',100,NULL,'Dikembalikan','2020-12-13'),
(21,0,1177050026,'113','2020-12-13','2020-12-20',100,NULL,'Dikembalikan','2020-12-13'),
(22,0,1177050026,'112','2020-12-13','2020-12-20',100,NULL,'Belum Dikembalikan',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
