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
-- Table structure for table `barangMasuk`
--

DROP TABLE IF EXISTS `barangMasuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangMasuk` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idUser` int(4) DEFAULT NULL COMMENT 'fk from user',
  `namaSuplier` varchar(25) DEFAULT NULL COMMENT 'fk from supplier',
  `idProduk` int(6) unsigned zerofill DEFAULT NULL,
  `tanggal` timestamp(3) NULL DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL COMMENT 'price buy from supplier',
  PRIMARY KEY (`id`),
  KEY `idProduk` (`idProduk`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `barangMasuk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `barangMasuk_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangMasuk`
--

LOCK TABLES `barangMasuk` WRITE;
/*!40000 ALTER TABLE `barangMasuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `barangMasuk` ENABLE KEYS */;
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
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `idUser` int(6) unsigned zerofill DEFAULT NULL,
  `tanggal` datetime(3) DEFAULT NULL,
  `jumlahModal` int(10) DEFAULT NULL,
  `jumlahJual` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL,
  `profit` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,'trx_20190118160529',NULL,'2019-01-18 16:05:29.000',31000,40000,50000,10000,9000),(2,'trx_20190118161150',NULL,'2019-01-18 16:11:50.000',100000,130000,130000,0,30000),(3,'trx_20190118161507',NULL,'2019-01-18 16:15:07.000',43000,60000,65000,5000,17000);
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
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
  `idUser` int(4) unsigned DEFAULT NULL,
  `pelanggan` varchar(15) DEFAULT 'umum',
  `idProduk` int(6) unsigned zerofill DEFAULT NULL,
  `modal` int(10) DEFAULT NULL,
  `jual` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `idProduk` (`idProduk`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (000001,'trx_20190118160529','2019-01-18 16:05:29','umum',NULL,'umum',100008,8000,10000,2,20000),(000002,'trx_20190118160529','2019-01-18 16:05:29','umum',NULL,'umum',100006,15000,20000,1,20000),(000003,'trx_20190118161150','2019-01-18 16:11:50','umum',4,'umum',100004,20000,30000,1,30000),(000004,'trx_20190118161150','2019-01-18 16:11:50','umum',4,'umum',100001,8000,10000,10,100000),(000005,'trx_20190118161507','2019-01-18 16:15:07','umum',4,'umum',100002,15000,20000,1,20000),(000006,'trx_20190118161507','2019-01-18 16:15:07','umum',4,'umum',100004,20000,30000,1,30000),(000007,'trx_20190118161507','2019-01-18 16:15:07','umum',4,'umum',100001,8000,10000,1,10000);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
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
  `dibuat` timestamp(3) NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100009 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES (100001,'Vitamin C','vitamin','untuk sariawan ',5,8000,10000,'2019-01-08 19:10:09.134'),(100002,'Dancow','susu anak','susu untuk dibawah 1 tahun',5,15000,20000,'2019-01-08 19:07:05.173'),(100003,'Betadin','obat luar','untuk luka berdarah',5,8000,10000,'2019-01-08 19:06:06.149'),(100004,'Perban','Obat luar','untuk menutup luka',5,20000,30000,'2019-01-09 17:00:00.000'),(100005,'Minyak Kayu Putih','Obat luar','obat masuk angin',8,5500,7500,'2019-01-16 19:04:17.000'),(100006,'Vitamin A','obat','vitamin',20,15000,20000,'2019-01-18 07:59:18.000'),(100007,'Minyak Telon','minyak','minyak',20,10000,15000,'2019-01-18 07:59:18.000'),(100008,'Paracetamol','obat','obat',10,8000,10000,'2019-01-18 09:03:18.000');
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
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
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (004,'ahmadbagwi','ahmadbagwi.id@gmail.com','$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK','','2019-01-01 12:00:28',NULL,0,0,0,NULL,NULL,NULL,NULL),(007,'admin1','admin1@gmail.com','$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y','','2019-01-18 14:01:00',NULL,0,0,0,'Admin 1','085719191852','Bogor',NULL);
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

-- Dump completed on 2019-01-18 16:29:35
