/*
SQLyog Community v12.5.0 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_perpustakaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_perpustakaan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_perpustakaan`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `Kd.Anggota` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Prodi` varchar(250) NOT NULL,
  `Jenjang` varchar(250) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  PRIMARY KEY (`Kd.Anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`Kd.Anggota`,`Nama`,`Prodi`,`Jenjang`,`Alamat`) values 
(1,'Cok Abimanyu','Teknik Informatika','S1','Petak Kaja Gianyar');

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `KdRegister` int(11) NOT NULL,
  `Judul_Buku` varchar(250) NOT NULL,
  `Pengarang` varchar(250) NOT NULL,
  `Penerbit` varchar(250) NOT NULL,
  `Tahun_Terbit` int(11) NOT NULL,
  PRIMARY KEY (`KdRegister`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`KdRegister`,`Judul_Buku`,`Pengarang`,`Penerbit`,`Tahun_Terbit`) values 
(1,'Mari Belajar Coding','Carles C','Cokorda',2019);

/*Table structure for table `detil_pinjam` */

DROP TABLE IF EXISTS `detil_pinjam`;

CREATE TABLE `detil_pinjam` (
  `Kd.Register` int(11) NOT NULL,
  `Kd.Pinjam` int(11) NOT NULL,
  `tgl_Pinjam` date NOT NULL,
  `tgl_Kembali` date NOT NULL,
  KEY `Kd.Pinjam` (`Kd.Pinjam`),
  KEY `Kd.Register` (`Kd.Register`),
  CONSTRAINT `detil_pinjam_ibfk_1` FOREIGN KEY (`Kd.Register`) REFERENCES `buku` (`KdRegister`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detil_pinjam_ibfk_2` FOREIGN KEY (`Kd.Pinjam`) REFERENCES `peminjaman` (`Kd.Pinjam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_pinjam` */

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `Kd.Pinjam` int(11) NOT NULL,
  `Kd.Anggota` int(11) NOT NULL,
  `Kd.Petugas` int(11) NOT NULL,
  PRIMARY KEY (`Kd.Pinjam`),
  KEY `Kd.Anggota` (`Kd.Anggota`),
  KEY `Kd.Petugas` (`Kd.Petugas`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`Kd.Anggota`) REFERENCES `anggota` (`Kd.Anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`Kd.Petugas`) REFERENCES `petugas` (`Kd.Petugas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `Kd.Petugas` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  PRIMARY KEY (`Kd.Petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
