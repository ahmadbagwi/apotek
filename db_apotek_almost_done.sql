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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembatalan`
--

LOCK TABLES `pembatalan` WRITE;
/*!40000 ALTER TABLE `pembatalan` DISABLE KEYS */;
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
  `tanggal` datetime(3) DEFAULT NULL,
  `jumlahModal` int(10) DEFAULT NULL,
  `jumlahJual` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL,
  `profit` int(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'sukses',
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,'trx_20190124111748',007,'2019-01-24 11:17:48.000',37500,40500,42000,1500,3000,'sukses'),(2,'trx_20190225023716',004,'2019-02-25 02:37:16.000',62000,80000,100000,20000,18000,'sukses'),(3,'trx_20190125031817',007,'2019-01-25 03:18:17.000',86500,110000,200000,90000,23500,'sukses'),(4,'trx_20190127144130',007,'2019-01-27 14:41:30.000',54600,162000,170000,8000,107400,'sukses');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (000001,'trx_20190124111748','2019-01-24 11:17:48','umum',007,'umum',100011,12500,13500,3,40500,'sukses'),(000002,'trx_20190225023716','2019-02-25 02:37:16','umum',004,'umum',100004,23500,30000,2,60000,'sukses'),(000003,'trx_20190225023716','2019-02-25 02:37:16','umum',004,'umum',100002,15000,20000,1,20000,'sukses'),(000004,'trx_20190125031817','2019-01-25 03:18:17','umum',007,'umum',100001,8000,10000,2,20000,'sukses'),(000005,'trx_20190125031817','2019-01-25 03:18:17','umum',007,'umum',100004,23500,30000,3,90000,'sukses'),(000006,'trx_20190127144130','2019-01-27 14:41:30','umum',007,'umum',100011,4550,13500,12,162000,'sukses');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retur`
--

LOCK TABLES `retur` WRITE;
/*!40000 ALTER TABLE `retur` DISABLE KEYS */;
INSERT INTO `retur` VALUES (001,007,000001,'Komix',100011,'2019-01-27 14:19:35',15,3000),(002,007,000003,'Komix',100011,'2019-01-27 14:32:19',15,3000),(003,007,000001,'Komix',100011,'2019-01-27 14:38:54',15,4250);
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
  `dibuat` timestamp(3) NULL DEFAULT CURRENT_TIMESTAMP(3),
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100012 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES (100001,'Vitamin C','vitamin','untuk sariawan ',2,8000,10000,'2019-01-08 19:10:09.134',''),(100002,'Dancow','susu anak','susu untuk dibawah 1 tahun',2,15000,20000,'2019-01-08 19:07:05.173',''),(100003,'Betadin','obat luar','untuk luka berdarah',3,8000,10000,'2019-01-08 19:06:06.149',''),(100004,'Perban','Obat luar','untuk menutup luka',12,23500,30000,'2019-01-09 17:00:00.000',''),(100005,'Minyak Kayu Putih','Obat luar','obat masuk angin',7,5500,7500,'2019-01-16 19:04:17.000',''),(100006,'Vitamin A','obat','vitamin',1,14500,20000,'2019-01-18 07:59:18.000',''),(100007,'Minyak Telon','minyak','minyak',0,10000,15000,'2019-01-18 07:59:18.000',''),(100008,'Paracetamol','obat','obat',0,8000,10000,'2019-01-18 09:03:18.000',''),(100009,'Kapas','obat luar','kapas',10,1000,7500,'2019-01-20 09:57:20.000',''),(100010,'Tolak Angin','obat dalam','obat masuk angin',20,4000,10000,'2019-01-20 09:57:20.000',''),(100011,'Komix','obat dalam','obat untuk batuk berdahak',28,4550,13500,'2019-01-23 09:08:23.000','');
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
  `tanggal` timestamp(3) NULL DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL COMMENT 'price buy from supplier',
  PRIMARY KEY (`id`),
  KEY `idProduk` (`idProduk`),
  KEY `idUser` (`idUser`),
  KEY `idSuplier` (`idSuplier`),
  CONSTRAINT `idsupplier` FOREIGN KEY (`idSuplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `stokMasuk_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `stokMasuk_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokMasuk`
--

LOCK TABLES `stokMasuk` WRITE;
/*!40000 ALTER TABLE `stokMasuk` DISABLE KEYS */;
INSERT INTO `stokMasuk` VALUES (000001,0007,000001,'Tolak Angin',100010,'2019-01-24 20:23:05.000',20,4000),(000002,0007,000002,'Kapas',100009,'2019-01-24 20:23:55.000',10,1000),(000003,0007,000001,'Komix',100011,'2019-01-27 07:11:39.000',5,3000),(000004,0007,000001,'Komix',100011,'2019-01-27 07:39:38.000',35,4550);
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
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (004,'ahmadbagwi','ahmadbagwi.id@gmail.com','$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK','','2019-01-01 12:00:28',NULL,0,0,0,NULL,NULL,NULL,NULL,'2019-01-25 10:28:06'),(007,'admin1','admin1@gmail.com','$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y','','2019-01-18 14:01:00',NULL,0,0,0,'Admin 1','085719191852','Bogor',NULL,'2019-01-27 13:03:31');
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

-- Dump completed on 2019-01-27 18:21:42
