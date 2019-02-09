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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aset`
--

LOCK TABLES `aset` WRITE;
/*!40000 ALTER TABLE `aset` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retur`
--

LOCK TABLES `retur` WRITE;
/*!40000 ALTER TABLE `retur` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stokMasuk`
--

LOCK TABLES `stokMasuk` WRITE;
/*!40000 ALTER TABLE `stokMasuk` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
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
INSERT INTO `users` VALUES (004,'ahmadbagwi','ahmadbagwi.id@gmail.com','$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK','','2019-01-01 12:00:28',NULL,0,0,0,NULL,NULL,NULL,NULL,'2019-02-08 13:09:11'),(007,'admin1','admin1@gmail.com','$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y','','2019-01-18 14:01:00',NULL,0,0,0,'Admin 1','085719191852','Bogor',NULL,'2019-02-09 07:20:19'),(008,'nismara123','nismara123@gmail.com','$2y$10$K.75Eah3FFO.hLIskdEJJ.NggylGgB6a7L4rsBZi7UbamMw/B7ZrK',NULL,'2019-02-09 13:08:00',NULL,0,0,0,'Arumi Nismara Rifanti','6285719191852','Cibaneng',NULL,'2019-02-09 13:08:00'),(009,'dinda','dinda123@gmail.com','$2y$10$4CgFXSnNOBlhCA48LCsAAuK/5Q0xzoDWQZphwPfuuE6MZZ1H6bFxO',NULL,'2019-02-09 13:08:47',NULL,0,0,0,'Dinda yourista','9999','TDP',NULL,'2019-02-09 14:08:59');
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

-- Dump completed on 2019-02-09 14:09:22
