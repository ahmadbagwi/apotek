-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: db_apotek
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aset`
--

DROP TABLE IF EXISTS `aset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aset` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `aset` int(10) DEFAULT NULL,
  `omset1` int(10) DEFAULT NULL,
  `omset2` int(10) DEFAULT NULL,
  `totalOmset` int(10) DEFAULT NULL,
  `nota1` int(10) DEFAULT NULL,
  `nota2` int(10) DEFAULT NULL,
  `totalNota` int(11) DEFAULT NULL,
  `avgNota` decimal(11,0) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `persenProfit` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aset`
--

LOCK TABLES `aset` WRITE;
/*!40000 ALTER TABLE `aset` DISABLE KEYS */;
INSERT INTO `aset` VALUES (0001,NULL,1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0002,'2019-02-09',1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0003,'2019-02-09',1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0004,'2019-02-09',1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0005,'2019-02-09',1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0006,'2019-02-09',1693500,240500,NULL,240500,2,0,2,120250,120700,1),(0007,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0008,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0009,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0010,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0011,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0012,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0013,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0014,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0015,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0016,'2019-02-09',1293500,640500,NULL,640500,3,0,3,213500,220700,0),(0017,'2019-02-09',1193500,740500,NULL,740500,4,0,4,185125,240700,0);
/*!40000 ALTER TABLE `aset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembatalan`
--

DROP TABLE IF EXISTS `pembatalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembatalan` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(3) unsigned zerofill NOT NULL,
  `kode` varchar(20) NOT NULL,
  `idProduk` int(6) unsigned zerofill NOT NULL,
  `nilai` int(10) NOT NULL,
  `jumlah` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idProduk` (`idProduk`),
  CONSTRAINT `idProduk` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembatalan`
--

LOCK TABLES `pembatalan` WRITE;
/*!40000 ALTER TABLE `pembatalan` DISABLE KEYS */;
INSERT INTO `pembatalan` VALUES (000001,'2019-01-28 14:27:52',007,'trx_20190128101722',100011,27000,2),(000002,'2019-02-08 16:26:39',007,'trx_20190208162450',100012,40000,2),(000003,'2019-02-08 16:26:52',007,'trx_20190208162450',100011,40500,3),(000004,'2019-02-08 16:32:38',007,'trx_20190208163128',100012,40000,2),(000005,'2019-02-08 16:32:44',007,'trx_20190208163128',100011,40500,3),(000006,'2019-02-08 20:11:03',007,'trx_20190208200925',100012,40000,2),(000007,'2019-02-08 20:21:50',007,'trx_20190208202002',100012,40000,2),(000008,'2019-02-08 20:21:57',007,'trx_20190208202002',100011,40500,3),(000009,'2019-02-08 20:22:02',007,'trx_20190208202002',100010,43750,5);
/*!40000 ALTER TABLE `pembatalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `idUser` int(3) unsigned zerofill DEFAULT '007',
  `tanggal` datetime DEFAULT NULL,
  `jumlahModal` int(10) DEFAULT NULL,
  `jumlahJual` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL,
  `profit` int(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'sukses',
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,'trx_20190124111748',007,'2019-01-24 11:17:48',37500,40500,42000,1500,3000,'sukses'),(2,'trx_20190225023716',004,'2019-02-25 02:37:16',62000,80000,100000,20000,18000,'sukses'),(3,'trx_20190125031817',007,'2019-01-25 03:18:17',86500,110000,200000,90000,23500,'sukses'),(4,'trx_20190127144130',007,'2019-01-27 14:41:30',54600,162000,170000,8000,107400,'sukses'),(5,'trx_20190128101722',007,'2019-01-28 10:17:22',9100,27000,30000,3000,17900,'sukses'),(6,'trx_20190128112113',004,'2019-01-28 11:21:13',150000,200000,500000,300000,50000,'sukses'),(7,'trx_20190128113931',004,'2019-01-28 11:39:31',17100,47000,50000,3000,29900,'sukses'),(8,'trx_20190130221505',007,'2019-01-30 22:15:05',100500,130000,150000,20000,29500,'sukses'),(9,'trx_20190204114407',007,'2019-02-04 11:44:07',30000,40000,50000,10000,10000,'sukses'),(10,'trx_20190204114431',007,'2019-02-04 11:44:31',24100,47000,50000,3000,22900,'sukses'),(11,'trx_20190205170649',004,'2019-02-05 17:06:49',53500,70000,100000,30000,16500,'sukses'),(12,'trx_20190205172014',004,'2019-02-05 17:20:14',9100,27000,30000,3000,17900,'sukses'),(13,'trx_20190206085304',004,'2019-02-06 08:53:04',54100,87000,90000,3000,32900,'sukses'),(14,'trx_20190206092049',004,'2019-02-06 09:20:49',31000,45000,50000,5000,14000,'sukses'),(15,'trx_20190206092142',004,'2019-02-06 19:21:42',1000,7500,10000,2500,6500,'sukses'),(16,'trx_20190206092822',004,'2019-02-06 21:28:22',13650,40500,41000,500,26850,'sukses'),(17,'trx_20190207090435',007,'2019-02-07 09:04:35',23800,49750,50000,250,25950,'sukses'),(18,'trx_20190207105031',007,'2019-02-07 10:50:31',30000,40000,50000,10000,10000,'sukses'),(19,'trx_20190208162450',007,'2019-02-08 16:24:50',43650,80500,85000,4500,36850,'batal'),(20,'trx_20190208163128',007,'2019-02-08 16:31:28',43650,80495,90000,9500,36850,'sukses'),(21,'trx_20190208200925',007,'2019-02-08 20:09:25',30000,39998,50000,10000,10000,'batal'),(22,'trx_20190208202002',007,'2019-02-08 20:20:02',59900,124240,125000,750,64350,'batal'),(23,'trx_20190208204933',007,'2019-02-08 20:49:33',52500,63750,65000,1250,11250,'sukses'),(24,'trx_20190208212402',007,'2019-02-08 21:24:02',39100,60300,65000,4700,21200,'sukses'),(25,'trx_20190209080250',007,'2019-02-09 08:02:50',97050,173000,180000,7000,75950,'sukses'),(26,'trx_20190209080613',007,'2019-02-09 08:06:13',22750,67500,70000,2500,44750,'sukses'),(27,'trx_20190209121229',007,'2019-02-09 12:12:29',300000,400000,400000,0,100000,'sukses'),(28,'trx_20190209133048',009,'2019-02-09 13:30:48',80000,100000,100000,0,20000,'sukses');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaturan` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan`
--

LOCK TABLES `pengaturan` WRITE;
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` VALUES (001,'Apotek Budi Farma','Tajur','08222222',''),(002,'Apotek Budi Farma','Tajur','081222222222',''),(003,'Apotek Budi Farma','sss','sss',''),(004,'aaa','aaa','aaa',''),(005,'Sistem Penjualan Apotek Budi Farma','Jl. Tajur No. 287A','0251 8392032',''),(006,'Eka Maryanti','esss','aaa',''),(007,'qqq','qqq','qqq','e3a111c3f3fbb90e18c2188a319a3f6c.png'),(008,'Sistem Penjualan Apotek Budi Farma','Jl. Raya Tajur No. 287A','0251 8392032','6cfa16cb13331e34aa6efbe2b5b48655.png');
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(15) DEFAULT 'umum',
  `idUser` int(3) unsigned zerofill DEFAULT NULL,
  `pelanggan` varchar(15) DEFAULT 'umum',
  `idProduk` int(6) unsigned zerofill DEFAULT NULL,
  `modal` int(10) DEFAULT NULL,
  `jual` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'sukses',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `idProduk` (`idProduk`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `fk_iduser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (000001,'trx_20190124111748','2019-01-24 11:17:48','umum',007,'umum',100011,12500,13500,3,40500,'sukses'),(000002,'trx_20190225023716','2019-02-25 02:37:16','umum',004,'umum',100004,23500,30000,2,60000,'sukses'),(000003,'trx_20190225023716','2019-02-25 02:37:16','umum',004,'umum',100002,15000,20000,1,20000,'sukses'),(000004,'trx_20190125031817','2019-01-25 03:18:17','umum',007,'umum',100001,8000,10000,2,20000,'sukses'),(000005,'trx_20190125031817','2019-01-25 03:18:17','umum',007,'umum',100004,23500,30000,3,90000,'sukses'),(000006,'trx_20190127144130','2019-01-27 14:41:30','umum',007,'umum',100011,4550,13500,12,162000,'sukses'),(000007,'trx_20190128101722','2019-01-28 10:17:22','umum',007,'umum',100011,4550,13500,2,27000,'batal'),(000008,'trx_20190128112113','2019-01-28 11:21:13','umum',004,'umum',100012,15000,20000,10,200000,'sukses'),(000009,'trx_20190128113931','2019-01-28 11:39:31','umum',004,'umum',100011,4550,13500,2,27000,'sukses'),(000010,'trx_20190128113931','2019-01-28 11:39:31','umum',004,'umum',100010,4000,10000,2,20000,'sukses'),(000011,'trx_20190130221505','2019-01-30 22:15:05','umum',007,'umum',100002,15000,20000,2,40000,'sukses'),(000012,'trx_20190130221505','2019-01-30 22:15:05','umum',007,'umum',100004,23500,30000,3,90000,'sukses'),(000013,'trx_20190204114407','2019-02-04 11:44:07','umum',007,'umum',100012,15000,20000,2,40000,'sukses'),(000014,'trx_20190204114431','2019-02-04 11:44:31','umum',007,'umum',100011,4550,13500,2,27000,'sukses'),(000015,'trx_20190204114431','2019-02-04 11:44:31','umum',007,'umum',100002,15000,20000,1,20000,'sukses'),(000016,'trx_20190205170649','2019-02-05 17:06:49','umum',004,'umum',100002,15000,20000,2,40000,'sukses'),(000017,'trx_20190205170649','2019-02-05 17:06:49','umum',004,'umum',100004,23500,30000,1,30000,'sukses'),(000018,'trx_20190205172014','2019-02-05 17:20:14','umum',004,'umum',100011,4550,13500,2,27000,'sukses'),(000019,'trx_20190206085304','2019-02-06 08:53:04','umum',004,'umum',100011,4550,13500,2,27000,'sukses'),(000020,'trx_20190206085304','2019-02-06 08:53:04','umum',004,'umum',100012,15000,20000,3,60000,'sukses'),(000021,'trx_20190206092049','2019-02-06 09:20:49','umum',004,'umum',100005,5500,7500,2,15000,'sukses'),(000022,'trx_20190206092049','2019-02-06 09:20:49','umum',004,'umum',100007,10000,15000,2,30000,'sukses'),(000023,'trx_20190206092142','2019-02-06 19:21:42','umum',004,'umum',100009,1000,7500,1,7500,'sukses'),(000024,'trx_20190206092822','2019-02-06 21:28:22','umum',004,'umum',100011,4550,13500,3,40500,'sukses'),(000025,'trx_20190207090435','2019-02-07 09:04:35','umum',007,'umum',100012,15000,20000,1,20000,'sukses'),(000026,'trx_20190207090435','2019-02-07 09:04:35','umum',007,'umum',100011,4550,13500,1,13500,'sukses'),(000027,'trx_20190207090435','2019-02-07 09:04:35','umum',007,'umum',100010,3250,8750,1,8750,'sukses'),(000028,'trx_20190207090435','2019-02-07 09:04:35','umum',007,'umum',100009,1000,7500,1,7500,'sukses'),(000029,'trx_20190207105031','2019-02-07 10:50:31','umum',007,'umum',100012,15000,20000,2,40000,'sukses'),(000030,'trx_20190208162450','2019-02-08 16:24:50','umum',007,'umum',100012,15000,20000,2,40000,'batal'),(000031,'trx_20190208162450','2019-02-08 16:24:50','umum',007,'umum',100011,4550,13500,3,40500,'batal'),(000032,'trx_20190208163128','2019-02-08 16:31:28','umum',007,'umum',100012,15000,20000,2,40000,'batal'),(000033,'trx_20190208163128','2019-02-08 16:31:28','umum',007,'umum',100011,4550,13500,3,40500,'batal'),(000034,'trx_20190208200925','2019-02-08 20:09:25','umum',007,'umum',100012,15000,20000,2,40000,'batal'),(000035,'trx_20190208202002','2019-02-08 20:20:02','umum',007,'umum',100012,15000,20000,2,40000,'batal'),(000036,'trx_20190208202002','2019-02-08 20:20:02','umum',007,'umum',100011,4550,13500,3,40500,'batal'),(000037,'trx_20190208202002','2019-02-08 20:20:02','umum',007,'umum',100010,3250,8750,5,43750,'batal'),(000038,'trx_20190208204933','2019-02-08 20:49:33','umum',007,'umum',100004,23500,30000,2,57000,'sukses'),(000039,'trx_20190208204933','2019-02-08 20:49:33','umum',007,'umum',100005,5500,7500,1,6750,'sukses'),(000040,'trx_20190208212402','2019-02-08 21:24:02','umum',007,'umum',100011,4550,13500,2,24300,'sukses'),(000041,'trx_20190208212402','2019-02-08 21:24:02','umum',007,'umum',100012,15000,20000,2,36000,'sukses'),(000042,'trx_20190209080250','2019-02-09 08:02:50','umum',007,'umum',100012,15000,20000,4,72000,'sukses'),(000043,'trx_20190209080250','2019-02-09 08:02:50','umum',007,'umum',100011,4550,13500,1,13500,'sukses'),(000044,'trx_20190209080250','2019-02-09 08:02:50','umum',007,'umum',100010,3250,8750,10,87500,'sukses'),(000045,'trx_20190209080613','2019-02-09 08:06:13','umum',007,'umum',100011,4550,13500,5,67500,'sukses'),(000046,'trx_20190209121229','2019-02-09 12:12:29','umum',007,'umum',100012,15000,20000,20,400000,'sukses'),(000047,'trx_20190209133048','2019-02-09 13:30:48','umum',009,'umum',100003,8000,10000,10,100000,'sukses');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retur`
--

DROP TABLE IF EXISTS `retur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retur` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idUser` int(3) unsigned zerofill NOT NULL,
  `idSuplier` int(6) unsigned zerofill NOT NULL,
  `namaProduk` varchar(40) NOT NULL,
  `idProduk` int(6) unsigned zerofill NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(4) NOT NULL,
  `modal` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idSuplier` (`idSuplier`),
  KEY `idProduk` (`idProduk`),
  CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `retur_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `retur_ibfk_3` FOREIGN KEY (`idSuplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retur`
--

LOCK TABLES `retur` WRITE;
/*!40000 ALTER TABLE `retur` DISABLE KEYS */;
INSERT INTO `retur` VALUES (001,007,000001,'Komix',100011,'2019-01-27 14:19:35',15,3000),(002,007,000003,'Komix',100011,'2019-01-27 14:32:19',15,3000),(003,007,000001,'Komix',100011,'2019-01-27 14:38:54',15,4250),(004,004,000001,'OBH',100012,'2019-01-28 15:12:03',50,15000),(005,004,000001,'Komix',100011,'2019-02-01 09:41:07',3,10000);
/*!40000 ALTER TABLE `retur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `kategori` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(45) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL,
  `jual` int(10) DEFAULT NULL,
  `dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100013 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES (100001,'Vitamin C','vitamin','untuk sariawan ',2,8000,10000,'2019-01-08 19:10:09',''),(100002,'Dancow','susu anak','susu untuk dibawah 1 tahun',12,18000,23000,'2019-01-08 19:07:05',''),(100003,'Betadin','obat luar','untuk luka berdarah',5,8000,10000,'2019-02-08 14:06:08','Konsinyasi'),(100004,'Perban','Obat luar','untuk menutup luka',6,23500,30000,'2019-01-09 17:00:00',''),(100005,'Minyak Kayu Putih','Obat luar','obat masuk angin',4,5500,7500,'2019-01-16 19:04:17',''),(100006,'Vitamin A','obat','vitamin',0,14500,20000,'2019-02-07 07:22:07','umum'),(100007,'Minyak Telon','minyak','minyak',2,10000,15000,'2019-02-07 07:21:07','Konsinyasi'),(100008,'Paracetamol','obat','obat',1,8000,10000,'2019-02-07 07:21:07','Konsinyasi'),(100009,'Kapas','obat luar','kapas',8,1000,7500,'2019-01-20 09:57:20',''),(100010,'Tolak Angin','obat dalam','obat masuk angin',40,3250,8750,'2019-01-20 09:57:20',''),(100011,'Komix','obat dalam','obat untuk batuk berdahak',5,4550,13500,'2019-01-28 04:19:28','Konsinyasi'),(100012,'OBH','obat sirup','Obat Batuk',6,15000,20000,'2019-01-28 04:20:28','Suplier');
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stokMasuk`
--

DROP TABLE IF EXISTS `stokMasuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stokMasuk` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idUser` int(4) unsigned zerofill DEFAULT NULL,
  `idSuplier` int(6) unsigned zerofill DEFAULT NULL,
  `namaProduk` varchar(40) NOT NULL,
  `idProduk` int(6) unsigned zerofill DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(4) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL COMMENT 'price buy from supplier',
  `jual` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduk` (`idProduk`),
  KEY `idUser` (`idUser`),
  KEY `idSuplier` (`idSuplier`),
  CONSTRAINT `idsupplier` FOREIGN KEY (`idSuplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `stokMasuk_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `stokMasuk_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokMasuk`
--

LOCK TABLES `stokMasuk` WRITE;
/*!40000 ALTER TABLE `stokMasuk` DISABLE KEYS */;
INSERT INTO `stokMasuk` VALUES (000001,0007,000001,'Tolak Angin',100010,'2019-01-24 20:23:05',20,4000,0),(000002,0007,000002,'Kapas',100009,'2019-01-24 20:23:55',10,1000,0),(000003,0007,000001,'Komix',100011,'2019-01-27 07:11:39',5,3000,0),(000004,0007,000001,'Komix',100011,'2019-01-27 07:39:38',35,4550,0),(000005,0004,000001,'Tolak Angin',100010,'2019-02-05 14:46:37',22,3500,9500),(000006,0004,000003,'Tolak Angin',100010,'2019-02-05 14:48:34',22,3750,9750),(000007,0004,000001,'Tolak Angin',100010,'2019-02-05 14:50:17',11,3250,8750),(000008,0004,000003,'Dancow',100002,'2019-02-05 14:51:37',15,18000,23000);
/*!40000 ALTER TABLE `stokMasuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (0001,'CV. Dinda','Dramaga','085612341234','supplier'),(0002,'CV. Ahmad','Cibanteng','085617898876','Konsinyasi'),(0003,'CV. Cimandiri','Dramaga','0822222222','Konsinyasi');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (004,'ahmadbagwi','ahmadbagwi.id@gmail.com','$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK','','2019-01-01 12:00:28',NULL,0,0,0,NULL,NULL,NULL,NULL,'2019-02-08 13:09:11'),(007,'admin1','admin1@gmail.com','$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y','','2019-01-18 14:01:00',NULL,0,0,0,'Admin 1','085719191852','Bogor',NULL,'2019-02-09 07:20:19'),(008,'nismara123','nismara123@gmail.com','$2y$10$K.75Eah3FFO.hLIskdEJJ.NggylGgB6a7L4rsBZi7UbamMw/B7ZrK',NULL,'2019-02-09 13:08:00',NULL,0,0,0,'Arumi Nismara Rifanti','6285719191852','Cibaneng',NULL,'2019-02-09 13:08:00'),(009,'dinda','dinda123@gmail.com','$2y$10$4CgFXSnNOBlhCA48LCsAAuK/5Q0xzoDWQZphwPfuuE6MZZ1H6bFxO',NULL,'2019-02-09 13:08:47',NULL,0,0,0,'Dinda yourista','9999','TDP',NULL,'2019-02-09 13:10:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-09 14:04:56
