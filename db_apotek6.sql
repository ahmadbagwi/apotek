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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembatalan`
--

LOCK TABLES `pembatalan` WRITE;
/*!40000 ALTER TABLE `pembatalan` DISABLE KEYS */;
INSERT INTO `pembatalan` VALUES (000001,'2019-01-23 13:50:20',007,'trx_1234567',100001,60,2),(000002,'2019-01-23 13:50:20',007,'trx_1234567',100001,60,2),(000003,'2019-01-23 13:50:20',007,'trx_1234567',100001,60,2),(000004,'2019-01-23 13:50:20',007,'trx_20190122143747',100011,100000,10),(000005,'2019-01-23 13:50:20',007,'trx_20190122091530',100006,20000,1),(000006,'2019-01-23 13:50:20',007,'trx_20190123092424',100011,50000,5),(000007,'2019-01-23 13:50:20',007,'trx_20190123092830',100011,20000,2),(000008,'2019-01-23 13:50:20',007,'trx_20190123092830',100011,20000,2),(000009,'2019-01-23 13:50:20',007,'trx_20190123093650',100011,23000,2),(000010,'2019-01-23 13:50:20',007,'trx_20190123093807',100011,23000,2),(000011,'2019-01-23 13:50:20',007,'trx_20190123094247',100010,100000,10),(000012,'2019-01-23 13:50:20',007,'trx_20190123094744',100010,30000,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,'trx_20190118160529',007,'2019-01-18 16:05:29.000',31000,40000,50000,10000,9000,'sukses'),(2,'trx_20190118161150',NULL,'2019-01-18 16:11:50.000',100000,130000,130000,0,30000,'sukses'),(3,'trx_20190118161507',NULL,'2019-01-18 16:15:07.000',43000,60000,65000,5000,17000,'sukses'),(4,'trx_20190118165933',NULL,'2019-01-18 16:59:33.000',94000,130000,130000,0,36000,'sukses'),(5,'trx_20190119093830',NULL,'2019-01-19 09:38:30.000',65000,90000,100000,10000,25000,'sukses'),(6,'trx_20190119112117',NULL,'2019-01-19 11:21:17.000',16000,20000,20000,0,4000,'sukses'),(7,'trx_20190119112309',NULL,'2018-11-01 00:00:00.000',16000,20000,20000,0,4000,'sukses'),(8,'trx_20190119112412',NULL,'2019-01-19 11:24:12.000',16000,20000,20000,0,4000,'sukses'),(9,'trx_20190119165031',NULL,'2019-01-19 16:50:31.000',115000,150000,200000,50000,35000,'sukses'),(10,'trx_20190119165308',NULL,'2019-01-19 16:53:08.000',107000,140000,150000,10000,33000,'sukses'),(11,'trx_20190119165606',NULL,'2019-01-19 16:56:06.000',102000,140000,150000,10000,38000,'sukses'),(12,'trx_20190120165228',NULL,'2019-01-20 16:52:28.000',112500,150000,200000,50000,37500,'sukses'),(13,'trx_20190120165924',NULL,'2019-01-20 16:59:24.000',45000,60000,70000,10000,15000,'sukses'),(14,'trx_20190121162907',NULL,'2019-02-01 00:00:00.000',4500,7500,10000,2500,3000,'sukses'),(15,'trx_20190122091530',NULL,'2019-01-22 09:15:30.000',14500,20000,20000,0,5500,'sukses'),(16,'trx_20190122143747',NULL,'2019-01-22 14:37:47.000',85000,100000,100000,0,15000,'sukses'),(17,'trx_20190122150822',NULL,'2019-01-22 15:08:22.000',23500,30000,35000,5000,6500,'sukses'),(18,'trx_20190123092424',NULL,'2019-01-23 09:24:24.000',42500,50000,50000,0,7500,'sukses'),(19,'trx_20190123092830',NULL,'2019-01-23 09:28:30.000',17000,20000,24000,4000,3000,'sukses'),(20,'trx_20190123093650',NULL,'2019-01-23 09:36:50.000',17000,23000,25000,2000,6000,'sukses'),(21,'trx_20190123093807',NULL,'2019-01-23 09:38:07.000',17000,23000,23000,0,6000,'sukses'),(22,'trx_20190123094247',NULL,'2019-01-23 09:42:47.000',80000,100000,150000,50000,20000,'sukses'),(23,'trx_20190123094744',NULL,'2019-01-23 09:47:44.000',24000,30000,30000,0,6000,'sukses'),(24,'trx_20190123104216',NULL,'2019-01-23 10:42:16.000',462500,665500,700000,34500,203000,'sukses'),(25,'trx_20190123151959',007,'2019-01-23 15:19:59.000',5500,7500,10000,2500,2000,'sukses'),(26,'trx_20190123160921',007,'2019-01-23 16:09:21.000',25000,27000,30000,3000,2000,'sukses');
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
) ENGINE=InnoDB AUTO_INCREMENT=100118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (000001,'trx_20190118160529','2019-01-18 16:05:29','umum',NULL,'umum',100008,8000,10000,2,20000,'sukses'),(000002,'trx_20190118160529','2019-01-18 16:05:29','umum',NULL,'umum',100006,15000,20000,1,20000,'sukses'),(000003,'trx_20190118161150','2019-01-18 16:11:50','umum',004,'umum',100004,20000,30000,1,30000,'sukses'),(000004,'trx_20190118161150','2019-01-18 16:11:50','umum',004,'umum',100001,8000,10000,10,100000,'sukses'),(000005,'trx_20190118161507','2019-01-18 16:15:07','umum',004,'umum',100002,15000,20000,1,20000,'sukses'),(000006,'trx_20190118161507','2019-01-18 16:15:07','umum',004,'umum',100004,20000,30000,1,30000,'sukses'),(000007,'trx_20190118161507','2019-01-18 16:15:07','umum',004,'umum',100001,8000,10000,1,10000,'sukses'),(000008,'trx_20190118165933','2019-01-18 16:59:33','umum',004,'umum',100004,20000,30000,2,60000,'sukses'),(000009,'trx_20190118165933','2019-01-18 16:59:33','umum',004,'umum',100006,15000,20000,2,40000,'sukses'),(000010,'trx_20190118165933','2019-01-18 16:59:33','umum',004,'umum',100001,8000,10000,3,30000,'sukses'),(000011,'trx_20190119093830','2019-01-19 09:38:30','umum',004,'umum',100004,20000,30000,1,30000,'sukses'),(000012,'trx_20190119093830','2019-01-19 09:38:30','umum',004,'umum',100002,15000,20000,3,60000,'sukses'),(000013,'trx_20190119112117','2019-01-19 11:21:17','umum',004,'umum',100008,8000,10000,2,20000,'sukses'),(000014,'trx_20190119112309','2018-11-01 11:23:09','umum',004,'umum',100008,8000,10000,2,20000,'sukses'),(000015,'trx_20190119112412','2019-01-19 11:24:12','umum',004,'umum',100008,8000,10000,2,20000,'sukses'),(000016,'trx_20190119165031','2019-01-19 16:50:31','umum',004,'umum',100008,8000,10000,5,50000,'sukses'),(000017,'trx_20190119165031','2019-01-19 16:50:31','umum',004,'umum',100006,15000,20000,5,100000,'sukses'),(000018,'trx_20190119165308','2019-01-19 16:53:08','umum',004,'umum',100006,15000,20000,5,100000,'sukses'),(000019,'trx_20190119165308','2019-01-19 16:53:08','umum',004,'umum',100008,8000,10000,4,40000,'sukses'),(000020,'trx_20190119165606','2019-01-19 16:56:06','umum',004,'umum',100004,20000,30000,2,60000,'sukses'),(000021,'trx_20190119165606','2019-01-19 16:56:06','umum',004,'umum',100003,8000,10000,2,20000,'sukses'),(000022,'trx_20190119165606','2019-01-19 16:56:06','umum',004,'umum',100002,15000,20000,2,40000,'sukses'),(000023,'trx_20190119165606','2019-01-19 16:56:06','umum',004,'umum',100001,8000,10000,2,20000,'sukses'),(000024,'trx_20190120165228','2019-01-20 16:52:28','umum',007,'umum',100004,22500,30000,5,150000,'sukses'),(000025,'trx_20190120165924','2019-01-20 16:59:24','umum',007,'umum',100004,22500,30000,2,60000,'sukses'),(000026,'trx_20190121162907','2019-02-01 16:29:07','umum',007,'umum',100009,4500,7500,1,7500,'sukses'),(100099,'trx_1234567','2019-01-22 00:00:00','umum',004,'umum',100001,20,30,2,60,'batal'),(100102,'trx_20190122091530','2019-01-22 09:15:30','umum',007,'umum',100006,14500,20000,1,20000,'batal'),(100103,'trx_20190122143747','2019-01-22 14:37:47','umum',007,'umum',100011,8500,10000,10,100000,'batal'),(100104,'trx_20190122150822','2019-01-22 15:08:22','umum',007,'umum',100004,23500,30000,1,30000,'sukses'),(100105,'trx_20190123092424','2019-01-23 09:24:24','umum',007,'umum',100011,8500,10000,5,50000,'batal'),(100106,'trx_20190123092830','2019-01-23 09:28:30','umum',007,'umum',100011,8500,10000,2,20000,'batal'),(100107,'trx_20190123093650','2019-01-23 09:36:50','umum',007,'umum',100011,8500,11500,2,23000,'batal'),(100108,'trx_20190123093807','2019-01-23 09:38:07','umum',007,'umum',100011,8500,11500,2,23000,'batal'),(100109,'trx_20190123094247','2019-01-23 09:42:47','umum',007,'umum',100010,8000,10000,10,100000,'batal'),(100110,'trx_20190123094744','2019-01-23 09:47:44','umum',007,'umum',100010,8000,10000,3,30000,'batal'),(100111,'trx_20190123104216','2019-01-23 10:42:16','umum',007,'umum',100011,8500,11500,2,23000,'sukses'),(100112,'trx_20190123104216','2019-01-23 10:42:16','umum',007,'umum',100010,8000,10000,10,100000,'sukses'),(100113,'trx_20190123104216','2019-01-23 10:42:16','umum',007,'umum',100009,4500,7500,19,142500,'sukses'),(100114,'trx_20190123104216','2019-01-23 10:42:16','umum',007,'umum',100008,8000,10000,10,100000,'sukses'),(100115,'trx_20190123104216','2019-01-23 10:42:16','umum',007,'umum',100007,10000,15000,20,300000,'sukses'),(100116,'trx_20190123151959','2019-01-23 15:19:59','umum',007,'umum',100005,5500,7500,1,7500,'sukses'),(100117,'trx_20190123160921','2019-01-23 16:09:21','umum',007,'umum',100011,12500,13500,2,27000,'sukses');
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
) ENGINE=InnoDB AUTO_INCREMENT=100012 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES (100001,'Vitamin C','vitamin','untuk sariawan ',4,8000,10000,'2019-01-08 19:10:09.134'),(100002,'Dancow','susu anak','susu untuk dibawah 1 tahun',3,15000,20000,'2019-01-08 19:07:05.173'),(100003,'Betadin','obat luar','untuk luka berdarah',3,8000,10000,'2019-01-08 19:06:06.149'),(100004,'Perban','Obat luar','untuk menutup luka',17,23500,30000,'2019-01-09 17:00:00.000'),(100005,'Minyak Kayu Putih','Obat luar','obat masuk angin',7,5500,7500,'2019-01-16 19:04:17.000'),(100006,'Vitamin A','obat','vitamin',1,14500,20000,'2019-01-18 07:59:18.000'),(100007,'Minyak Telon','minyak','minyak',0,10000,15000,'2019-01-18 07:59:18.000'),(100008,'Paracetamol','obat','obat',0,8000,10000,'2019-01-18 09:03:18.000'),(100009,'Kapas','obat luar','kapas',0,4500,7500,'2019-01-20 09:57:20.000'),(100010,'Tolak Angin','obat dalam','obat masuk angin',0,8000,10000,'2019-01-20 09:57:20.000'),(100011,'Komix','obat dalam','obat untuk batuk berdahak',18,12500,13500,'2019-01-23 09:08:23.000');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokMasuk`
--

LOCK TABLES `stokMasuk` WRITE;
/*!40000 ALTER TABLE `stokMasuk` DISABLE KEYS */;
INSERT INTO `stokMasuk` VALUES (000002,0007,000002,'0',100008,'2019-01-19 17:00:00.000',5,8500),(000003,0007,000002,'0',100008,'2019-01-19 17:00:00.000',5,8500),(000004,0007,000001,'0',100004,'2019-01-19 17:00:00.000',2,22500),(000005,0007,000001,'Vitamin A',100006,'2019-01-20 09:56:19.000',185,14500),(000006,0007,000001,'Perban',100004,'2019-01-20 10:05:52.000',20,23500),(000007,0007,000001,'Komix',100011,'2019-01-23 02:35:33.000',8,8500),(000008,0007,000001,'Komix',100011,'2019-01-23 09:06:12.000',20,12500);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (004,'ahmadbagwi','ahmadbagwi.id@gmail.com','$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK','','2019-01-01 12:00:28',NULL,0,0,0,NULL,NULL,NULL,NULL,'2019-01-24 09:35:16'),(007,'admin1','admin1@gmail.com','$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y','','2019-01-18 14:01:00',NULL,0,0,0,'Admin 1','085719191852','Bogor',NULL,'2019-01-24 09:35:16');
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

-- Dump completed on 2019-01-24 11:03:52
