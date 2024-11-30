-- MySQL dump 10.13  Distrib 5.7.44, for Linux (x86_64)
--
-- Host: localhost    Database: demensWallet
-- ------------------------------------------------------
-- Server version	5.7.44

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('0000-0000-0000-0000-0000',NULL,'0000-0000-0000-0000-0000','Rent','OUT',NULL,NULL),('0000-0000-0000-0000-0001',NULL,'0000-0000-0000-0000-0000','Wage','IN',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimals` smallint(6) NOT NULL,
  `flag_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES ('USD','US Dollars','$',2,'USA'),('MXN','Mexico Pesos','$',2,'MEX'),('EUR','Euros','&euro;',2,'EU'),('BIT','BitCoins','&bitcoin;',6,'BIT');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboardcards`
--

DROP TABLE IF EXISTS `dashboardcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboardcards` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('PIE','BAR','MSG','PRG') COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(6) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_parameters` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboardcards`
--

LOCK TABLES `dashboardcards` WRITE;
/*!40000 ALTER TABLE `dashboardcards` DISABLE KEYS */;
INSERT INTO `dashboardcards` VALUES ('0000-0000-0000-0000-0001','0000-0000-0000-0000-0000','BAR','0000-0000-0000-0000-0000',0,'M','-6m',NULL,NULL);
/*!40000 ALTER TABLE `dashboardcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icons`
--

DROP TABLE IF EXISTS `icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icons` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('standard','custom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icons`
--

LOCK TABLES `icons` WRITE;
/*!40000 ALTER TABLE `icons` DISABLE KEYS */;
INSERT INTO `icons` VALUES ('0000-0000-0000-0001','002-wallet-1.png','standard',NULL,'wallet 1',NULL,NULL),('0000-0000-0000-0002','001-wallet-2.png','standard',NULL,'wallet 2 ',NULL,NULL),('0000-0000-0000-0003','003-wallet.png','standard',NULL,'wallet 3',NULL,NULL),('0000-0000-0000-0004','004-money-3.png','standard',NULL,'money',NULL,NULL),('0000-0000-0000-0005','005-money-2.png','standard',NULL,'default',NULL,NULL),('0000-0000-0000-0006','006-dollar-6.png','standard',NULL,'dollar',NULL,NULL),('0000-0000-0000-0007','007-pound-sterling-4.png','standard',NULL,'pound',NULL,NULL),('0000-0000-0000-0008','012-money-bag-1.png','standard',NULL,'money bag',NULL,NULL),('0000-0000-0000-0009','028-credit-card-2.png','standard',NULL,'credit card',NULL,NULL),('0000-0000-0000-0010','bbva.png','standard',NULL,'bbva',NULL,NULL),('0000-0000-0000-0011','santander.png','standard',NULL,'santander',NULL,NULL);
/*!40000 ALTER TABLE `icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label_transaction`
--

DROP TABLE IF EXISTS `label_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `label_transaction` (
  `label_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label_transaction`
--

LOCK TABLES `label_transaction` WRITE;
/*!40000 ALTER TABLE `label_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `label_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labelicons`
--

DROP TABLE IF EXISTS `labelicons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labelicons` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labelicons`
--

LOCK TABLES `labelicons` WRITE;
/*!40000 ALTER TABLE `labelicons` DISABLE KEYS */;
INSERT INTO `labelicons` VALUES ('fa-american-sign-language-interpreting','Accebility',NULL,NULL),('fa-assistive-listening-systems','Accebility',NULL,NULL),('fa-audio-description','Accebility',NULL,NULL),('fa-blind','Accebility',NULL,NULL),('fa-braille','Accebility',NULL,NULL),('fa-closed-captioning','Accebility',NULL,NULL),('fa-deaf','Accebility',NULL,NULL),('fa-low-vision','Accebility',NULL,NULL),('fa-phone-volume','Accebility',NULL,NULL),('fa-question-circle','Accebility',NULL,NULL),('fa-sign-language','Accebility',NULL,NULL),('fa-tty','Accebility',NULL,NULL),('fa-universal-access','Accebility',NULL,NULL),('fa-wheelchair','Accebility',NULL,NULL),('fa-bell','Alert',NULL,NULL),('fa-bell-slash','Alert',NULL,NULL),('fa-exclamation','Alert',NULL,NULL),('fa-exclamation-circle','Alert',NULL,NULL),('fa-exclamation-triangle','Alert',NULL,NULL),('fa-radiation','Alert',NULL,NULL),('fa-radiation-alt','Alert',NULL,NULL),('fa-skull-crossbones','Alert',NULL,NULL),('fa-cat','Animals',NULL,NULL),('fa-crow','Animals',NULL,NULL),('fa-dog','Animals',NULL,NULL),('fa-dove','Animals',NULL,NULL),('fa-dragon','Animals',NULL,NULL),('fa-feather','Animals',NULL,NULL),('fa-feather-alt','Animals',NULL,NULL),('fa-fish','Animals',NULL,NULL),('fa-frog','Animals',NULL,NULL),('fa-hippo','Animals',NULL,NULL),('fa-horse','Animals',NULL,NULL),('fa-horse-head','Animals',NULL,NULL),('fa-kiwi-bird','Animals',NULL,NULL),('fa-otter','Animals',NULL,NULL),('fa-paw','Animals',NULL,NULL),('fa-spider','Animals',NULL,NULL),('fa-angle-double-down','Arrows',NULL,NULL),('fa-angle-double-left','Arrows',NULL,NULL),('fa-angle-double-right','Arrows',NULL,NULL),('fa-angle-double-up','Arrows',NULL,NULL),('fa-angle-down','Arrows',NULL,NULL),('fa-angle-left','Arrows',NULL,NULL),('fa-angle-right','Arrows',NULL,NULL),('fa-angle-up','Arrows',NULL,NULL),('fa-arrow-alt-circle-down','Arrows',NULL,NULL),('fa-arrow-alt-circle-left','Arrows',NULL,NULL),('fa-arrow-alt-circle-right','Arrows',NULL,NULL),('fa-arrow-alt-circle-up','Arrows',NULL,NULL),('fa-arrow-circle-down','Arrows',NULL,NULL),('fa-arrow-circle-left','Arrows',NULL,NULL),('fa-arrow-circle-right','Arrows',NULL,NULL),('fa-arrow-circle-up','Arrows',NULL,NULL),('fa-arrow-down','Arrows',NULL,NULL),('fa-arrow-left','Arrows',NULL,NULL),('fa-arrow-right','Arrows',NULL,NULL),('fa-arrow-up','Arrows',NULL,NULL),('fa-arrows-alt','Arrows',NULL,NULL),('fa-arrows-alt-h','Arrows',NULL,NULL),('fa-arrows-alt-v','Arrows',NULL,NULL),('fa-caret-down','Arrows',NULL,NULL),('fa-caret-left','Arrows',NULL,NULL),('fa-caret-right','Arrows',NULL,NULL),('fa-caret-square-down','Arrows',NULL,NULL),('fa-caret-square-left','Arrows',NULL,NULL),('fa-caret-square-right','Arrows',NULL,NULL),('fa-caret-square-up','Arrows',NULL,NULL),('fa-caret-up','Arrows',NULL,NULL),('fa-cart-arrow-down','Arrows',NULL,NULL),('fa-chart-line','Arrows',NULL,NULL),('fa-chevron-circle-down','Arrows',NULL,NULL),('fa-chevron-circle-left','Arrows',NULL,NULL),('fa-chevron-circle-right','Arrows',NULL,NULL),('fa-chevron-circle-up','Arrows',NULL,NULL),('fa-chevron-down','Arrows',NULL,NULL),('fa-chevron-left','Arrows',NULL,NULL),('fa-chevron-right','Arrows',NULL,NULL),('fa-chevron-up','Arrows',NULL,NULL),('fa-cloud-download-alt','Arrows',NULL,NULL),('fa-cloud-upload-alt','Arrows',NULL,NULL),('fa-compress-alt','Arrows',NULL,NULL),('fa-compress-arrows-alt','Arrows',NULL,NULL),('fa-download','Arrows',NULL,NULL),('fa-exchange-alt','Arrows',NULL,NULL),('fa-expand-alt','Arrows',NULL,NULL),('fa-expand-arrows-alt','Arrows',NULL,NULL),('fa-external-link-alt','Arrows',NULL,NULL),('fa-external-link-square-alt','Arrows',NULL,NULL),('fa-hand-point-down','Arrows',NULL,NULL),('fa-hand-point-left','Arrows',NULL,NULL),('fa-hand-point-right','Arrows',NULL,NULL),('fa-hand-point-up','Arrows',NULL,NULL),('fa-hand-pointer','Arrows',NULL,NULL),('fa-history','Arrows',NULL,NULL),('fa-level-down-alt','Arrows',NULL,NULL),('fa-level-up-alt','Arrows',NULL,NULL),('fa-location-arrow','Arrows',NULL,NULL),('fa-long-arrow-alt-down','Arrows',NULL,NULL),('fa-long-arrow-alt-left','Arrows',NULL,NULL),('fa-long-arrow-alt-right','Arrows',NULL,NULL),('fa-long-arrow-alt-up','Arrows',NULL,NULL),('fa-mouse-pointer','Arrows',NULL,NULL),('fa-play','Arrows',NULL,NULL),('fa-random','Arrows',NULL,NULL),('fa-recycle','Arrows',NULL,NULL),('fa-redo','Arrows',NULL,NULL),('fa-redo-alt','Arrows',NULL,NULL),('fa-reply','Arrows',NULL,NULL),('fa-reply-all','Arrows',NULL,NULL),('fa-retweet','Arrows',NULL,NULL),('fa-share','Arrows',NULL,NULL),('fa-share-square','Arrows',NULL,NULL),('fa-sign-in-alt','Arrows',NULL,NULL),('fa-sign-out-alt','Arrows',NULL,NULL),('fa-sort','Arrows',NULL,NULL),('fa-sort-alpha-down','Arrows',NULL,NULL),('fa-sort-alpha-down-alt','Arrows',NULL,NULL),('fa-sort-alpha-up','Arrows',NULL,NULL),('fa-sort-alpha-up-alt','Arrows',NULL,NULL),('fa-sort-amount-down','Arrows',NULL,NULL),('fa-sort-amount-down-alt','Arrows',NULL,NULL),('fa-sort-amount-up','Arrows',NULL,NULL),('fa-sort-amount-up-alt','Arrows',NULL,NULL),('fa-sort-down','Arrows',NULL,NULL),('fa-sort-numeric-down','Arrows',NULL,NULL),('fa-sort-numeric-down-alt','Arrows',NULL,NULL),('fa-sort-numeric-up','Arrows',NULL,NULL),('fa-sort-numeric-up-alt','Arrows',NULL,NULL),('fa-sort-up','Arrows',NULL,NULL),('fa-sync','Arrows',NULL,NULL),('fa-sync-alt','Arrows',NULL,NULL),('fa-text-height','Arrows',NULL,NULL),('fa-text-width','Arrows',NULL,NULL),('fa-undo','Arrows',NULL,NULL),('fa-undo-alt','Arrows',NULL,NULL),('fa-upload','Arrows',NULL,NULL),('fa-audio-description','Audio & Video',NULL,NULL),('fa-backward','Audio & Video',NULL,NULL),('fa-broadcast-tower','Audio & Video',NULL,NULL),('fa-circle','Audio & Video',NULL,NULL),('fa-closed-captioning','Audio & Video',NULL,NULL),('fa-compress','Audio & Video',NULL,NULL),('fa-compress-alt','Audio & Video',NULL,NULL),('fa-compress-arrows-alt','Audio & Video',NULL,NULL),('fa-eject','Audio & Video',NULL,NULL),('fa-expand','Audio & Video',NULL,NULL),('fa-expand-alt','Audio & Video',NULL,NULL),('fa-expand-arrows-alt','Audio & Video',NULL,NULL),('fa-fast-backward','Audio & Video',NULL,NULL),('fa-fast-forward','Audio & Video',NULL,NULL),('fa-file-audio','Audio & Video',NULL,NULL),('fa-file-video','Audio & Video',NULL,NULL),('fa-film','Audio & Video',NULL,NULL),('fa-forward','Audio & Video',NULL,NULL),('fa-headphones','Audio & Video',NULL,NULL),('fa-microphone','Audio & Video',NULL,NULL),('fa-microphone-alt','Audio & Video',NULL,NULL),('fa-microphone-alt-slash','Audio & Video',NULL,NULL),('fa-microphone-slash','Audio & Video',NULL,NULL),('fa-music','Audio & Video',NULL,NULL),('fa-pause','Audio & Video',NULL,NULL),('fa-pause-circle','Audio & Video',NULL,NULL),('fa-phone-volume','Audio & Video',NULL,NULL),('fa-photo-video','Audio & Video',NULL,NULL),('fa-play','Audio & Video',NULL,NULL),('fa-play-circle','Audio & Video',NULL,NULL),('fa-podcast','Audio & Video',NULL,NULL),('fa-random','Audio & Video',NULL,NULL),('fa-redo','Audio & Video',NULL,NULL),('fa-redo-alt','Audio & Video',NULL,NULL),('fa-rss','Audio & Video',NULL,NULL),('fa-rss-square','Audio & Video',NULL,NULL),('fa-step-backward','Audio & Video',NULL,NULL),('fa-step-forward','Audio & Video',NULL,NULL),('fa-stop','Audio & Video',NULL,NULL),('fa-stop-circle','Audio & Video',NULL,NULL),('fa-sync','Audio & Video',NULL,NULL),('fa-sync-alt','Audio & Video',NULL,NULL),('fa-tv','Audio & Video',NULL,NULL),('fa-undo','Audio & Video',NULL,NULL),('fa-undo-alt','Audio & Video',NULL,NULL),('fa-video','Audio & Video',NULL,NULL),('fa-volume-down','Audio & Video',NULL,NULL),('fa-volume-mute','Audio & Video',NULL,NULL),('fa-volume-off','Audio & Video',NULL,NULL),('fa-volume-up','Audio & Video',NULL,NULL),('fa-air-freshener','Automotive',NULL,NULL),('fa-ambulance','Automotive',NULL,NULL),('fa-bus','Automotive',NULL,NULL),('fa-bus-alt','Automotive',NULL,NULL),('fa-car','Automotive',NULL,NULL),('fa-car-alt','Automotive',NULL,NULL),('fa-car-battery','Automotive',NULL,NULL),('fa-car-crash','Automotive',NULL,NULL),('fa-car-side','Automotive',NULL,NULL),('fa-caravan','Automotive',NULL,NULL),('fa-charging-station','Automotive',NULL,NULL),('fa-gas-pump','Automotive',NULL,NULL),('fa-motorcycle','Automotive',NULL,NULL),('fa-oil-can','Automotive',NULL,NULL),('fa-shuttle-van','Automotive',NULL,NULL),('fa-tachometer-alt','Automotive',NULL,NULL),('fa-taxi','Automotive',NULL,NULL),('fa-trailer','Automotive',NULL,NULL),('fa-truck','Automotive',NULL,NULL),('fa-truck-monster','Automotive',NULL,NULL),('fa-truck-pickup','Automotive',NULL,NULL),('fa-apple-alt','Autumn',NULL,NULL),('fa-campground','Autumn',NULL,NULL),('fa-cloud-sun','Autumn',NULL,NULL),('fa-drumstick-bite','Autumn',NULL,NULL),('fa-football-ball','Autumn',NULL,NULL),('fa-hiking','Autumn',NULL,NULL),('fa-mountain','Autumn',NULL,NULL),('fa-tractor','Autumn',NULL,NULL),('fa-tree','Autumn',NULL,NULL),('fa-wind','Autumn',NULL,NULL),('fa-wine-bottle','Autumn',NULL,NULL),('fa-beer','Beverage',NULL,NULL),('fa-blender','Beverage',NULL,NULL),('fa-cocktail','Beverage',NULL,NULL),('fa-coffee','Beverage',NULL,NULL),('fa-flask','Beverage',NULL,NULL),('fa-glass-cheers','Beverage',NULL,NULL),('fa-glass-martini','Beverage',NULL,NULL),('fa-glass-martini-alt','Beverage',NULL,NULL),('fa-glass-whiskey','Beverage',NULL,NULL),('fa-mug-hot','Beverage',NULL,NULL),('fa-wine-bottle','Beverage',NULL,NULL),('fa-wine-glass','Beverage',NULL,NULL),('fa-wine-glass-alt','Beverage',NULL,NULL),('fa-archway','Buildings',NULL,NULL),('fa-building','Buildings',NULL,NULL),('fa-campground','Buildings',NULL,NULL),('fa-church','Buildings',NULL,NULL),('fa-city','Buildings',NULL,NULL),('fa-clinic-medical','Buildings',NULL,NULL),('fa-dungeon','Buildings',NULL,NULL),('fa-gopuram','Buildings',NULL,NULL),('fa-home','Buildings',NULL,NULL),('fa-hospital','Buildings',NULL,NULL),('fa-hospital-alt','Buildings',NULL,NULL),('fa-hospital-user','Buildings',NULL,NULL),('fa-hotel','Buildings',NULL,NULL),('fa-house-damage','Buildings',NULL,NULL),('fa-igloo','Buildings',NULL,NULL),('fa-industry','Buildings',NULL,NULL),('fa-kaaba','Buildings',NULL,NULL),('fa-landmark','Buildings',NULL,NULL),('fa-monument','Buildings',NULL,NULL),('fa-mosque','Buildings',NULL,NULL),('fa-place-of-worship','Buildings',NULL,NULL),('fa-school','Buildings',NULL,NULL),('fa-store','Buildings',NULL,NULL),('fa-store-alt','Buildings',NULL,NULL),('fa-synagogue','Buildings',NULL,NULL),('fa-torii-gate','Buildings',NULL,NULL),('fa-university','Buildings',NULL,NULL),('fa-vihara','Buildings',NULL,NULL),('fa-warehouse','Buildings',NULL,NULL),('fa-address-book','Business',NULL,NULL),('fa-address-card','Business',NULL,NULL),('fa-archive','Business',NULL,NULL),('fa-balance-scale','Business',NULL,NULL),('fa-balance-scale-left','Business',NULL,NULL),('fa-balance-scale-right','Business',NULL,NULL),('fa-birthday-cake','Business',NULL,NULL),('fa-book','Business',NULL,NULL),('fa-briefcase','Business',NULL,NULL),('fa-building','Business',NULL,NULL),('fa-bullhorn','Business',NULL,NULL),('fa-bullseye','Business',NULL,NULL),('fa-business-time','Business',NULL,NULL),('fa-calculator','Business',NULL,NULL),('fa-calendar','Business',NULL,NULL),('fa-calendar-alt','Business',NULL,NULL),('fa-certificate','Business',NULL,NULL),('fa-chart-area','Business',NULL,NULL),('fa-chart-bar','Business',NULL,NULL),('fa-chart-line','Business',NULL,NULL),('fa-chart-pie','Business',NULL,NULL),('fa-city','Business',NULL,NULL),('fa-clipboard','Business',NULL,NULL),('fa-coffee','Business',NULL,NULL),('fa-columns','Business',NULL,NULL),('fa-compass','Business',NULL,NULL),('fa-copy','Business',NULL,NULL),('fa-copyright','Business',NULL,NULL),('fa-cut','Business',NULL,NULL),('fa-edit','Business',NULL,NULL),('fa-envelope','Business',NULL,NULL),('fa-envelope-open','Business',NULL,NULL),('fa-envelope-square','Business',NULL,NULL),('fa-eraser','Business',NULL,NULL),('fa-fax','Business',NULL,NULL),('fa-file','Business',NULL,NULL),('fa-file-alt','Business',NULL,NULL),('fa-folder','Business',NULL,NULL),('fa-folder-minus','Business',NULL,NULL),('fa-folder-open','Business',NULL,NULL),('fa-folder-plus','Business',NULL,NULL),('fa-glasses','Business',NULL,NULL),('fa-globe','Business',NULL,NULL),('fa-highlighter','Business',NULL,NULL),('fa-industry','Business',NULL,NULL),('fa-landmark','Business',NULL,NULL),('fa-laptop-house','Business',NULL,NULL),('fa-marker','Business',NULL,NULL),('fa-paperclip','Business',NULL,NULL),('fa-paste','Business',NULL,NULL),('fa-pen','Business',NULL,NULL),('fa-pen-alt','Business',NULL,NULL),('fa-pen-fancy','Business',NULL,NULL),('fa-pen-nib','Business',NULL,NULL),('fa-pen-square','Business',NULL,NULL),('fa-pencil-alt','Business',NULL,NULL),('fa-percent','Business',NULL,NULL),('fa-phone','Business',NULL,NULL),('fa-phone-alt','Business',NULL,NULL),('fa-phone-slash','Business',NULL,NULL),('fa-phone-square','Business',NULL,NULL),('fa-phone-square-alt','Business',NULL,NULL),('fa-phone-volume','Business',NULL,NULL),('fa-print','Business',NULL,NULL),('fa-project-diagram','Business',NULL,NULL),('fa-registered','Business',NULL,NULL),('fa-save','Business',NULL,NULL),('fa-sitemap','Business',NULL,NULL),('fa-socks','Business',NULL,NULL),('fa-sticky-note','Business',NULL,NULL),('fa-stream','Business',NULL,NULL),('fa-table','Business',NULL,NULL),('fa-tag','Business',NULL,NULL),('fa-tags','Business',NULL,NULL),('fa-tasks','Business',NULL,NULL),('fa-thumbtack','Business',NULL,NULL),('fa-trademark','Business',NULL,NULL),('fa-wallet','Business',NULL,NULL);
/*!40000 ALTER TABLE `labelicons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labels` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreground_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labelicon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labels`
--

LOCK TABLES `labels` WRITE;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` VALUES ('0000-0000-0000-0000-0000','0000-0000-0000-0000-0000','viajes','#dd00dd','#445544','fa-road',NULL,NULL),('0000-0000-0000-0000-0001','0000-0000-0000-0000-0000','comida','#d299dd','#425CFF','fa-tint',NULL,NULL);
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES ('EN','england','English','English',NULL,NULL),('ES','spain','Español','Spanish',NULL,NULL),('FR','france','Francais','French',NULL,NULL);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('AUTH_ERROR','AUTH_SUCCESS','NEW_TRANSACTION','UPDT_TRANSACTION','UPDT_PASSWORD','NEW_RESOURCE','UPDT_RESOURCE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_27_160936_create_resources_table',1),(5,'2020_08_27_162238_create_dashboardcards_table',1),(6,'2020_08_27_171323_create_resource_types_table',1),(7,'2020_08_28_023830_create_transaction_table',1),(8,'2020_08_28_025927_create_labels_table',1),(9,'2020_08_28_030910_create_categories_table',1),(10,'2020_08_28_031542_create_languages_table',1),(11,'2020_08_28_033716_create_currencies_table',1),(12,'2020_08_28_035440_create_logs_table',1),(13,'2020_08_28_041605_create_resources_users_table',1),(14,'2020_08_28_042706_create_labels_transactions_table',1),(15,'2021_02_28_193030_create_icons_table',1),(16,'2021_09_03_235810_create_labelicons_table',1),(17,'2021_09_14_001815_create_settings_table',1),(18,'2021_10_23_024233_create_user_appliances_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_types`
--

DROP TABLE IF EXISTS `resource_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_types` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_types`
--

LOCK TABLES `resource_types` WRITE;
/*!40000 ALTER TABLE `resource_types` DISABLE KEYS */;
INSERT INTO `resource_types` VALUES ('CA','Cash',NULL,NULL),('BA','Bank Account / Debit Card',NULL,NULL),('CC','Credit Card',NULL,NULL),('LO','Loan',NULL,NULL),('PA','(Passive Asset) Value',NULL,NULL),('EA','Electronic Account (Paypal, BitCoin, etc)',NULL,NULL),('EW','Electronic Wallet (Paypal, BitCoin, etc)',NULL,NULL);
/*!40000 ALTER TABLE `resource_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(18,6) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `transactions_sorted` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES ('0000-0000-0000-0000-0000','0000-0000-0000-0000-0000','CA','0000-0000-0000-0001','My Wallet (Cash)','MXN',0.000000,1,1,NULL,NULL),('0000-0000-0000-0000-0001','0000-0000-0000-0000-0000','BA','0000-0000-0000-0011','Cuenta Dorada','MXN',0.000000,1,1,NULL,'2024-11-30 03:29:37'),('eb7b538d-5281-4227-b372-11d0501e1cf9','0000-0000-0000-0000-0000','BA','0000-0000-0000-0011','Cuenta Blanca','MXN',41.000000,1,1,'2024-11-30 03:31:40','2024-11-30 03:31:40'),('bf0737db-c167-4771-bb1a-ff1a02356c5a','0000-0000-0000-0000-0000','CA','0000-0000-0000-0010','Nomina','MXN',12308.000000,1,1,'2024-11-30 03:35:44','2024-11-30 03:35:44'),('0fd4c1e4-19ef-492f-84de-fdc35acfabd3','0000-0000-0000-0000-0000','CA','0000-0000-0000-0010','Guardadito BBVA','MXN',22000.000000,1,1,'2024-11-30 03:36:12','2024-11-30 03:38:29'),('5ce7dd5a-5c74-4cda-8c07-21892085ac5b','0000-0000-0000-0000-0000','CC','0000-0000-0000-0010','TC BBVA','MXN',-5301.000000,1,1,'2024-11-30 03:37:47','2024-11-30 03:37:47'),('b3cad795-dee9-4bb2-89e8-6cbf487d5305','0000-0000-0000-0000-0000','CC','0000-0000-0000-0011','TC LikeU','MXN',-2714.310000,1,1,'2024-11-30 03:39:49','2024-11-30 03:39:49'),('62f30f98-0a59-4d5b-b5c2-eb2ba50916dd','0000-0000-0000-0000-0000','BA','0000-0000-0000-0008','Allianz PLU3','MXN',82209.570000,1,1,'2024-11-30 03:44:02','2024-11-30 03:44:02');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources_users`
--

DROP TABLE IF EXISTS `resources_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources_users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` enum('R','RW') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources_users`
--

LOCK TABLES `resources_users` WRITE;
/*!40000 ALTER TABLE `resources_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `resources_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alter_resource_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_timestamp` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` decimal(18,6) NOT NULL,
  `resultant_balance` decimal(18,6) DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES ('81962976-9775-4e9b-9c9e-d889c02ce4d7','eb7b538d-5281-4227-b372-11d0501e1cf9','INCOME','Initial amount','IN','2024-11-30 03:31:40','2024-11-30 03:31:40','2024-11-30 03:31:40',41.000000,41.000000,NULL,'0000-0000-0000-0000-0000','Initial amount'),('2a164d60-1b20-4c48-aa5c-45e27b222b0f','bf0737db-c167-4771-bb1a-ff1a02356c5a','INCOME','Initial amount','IN','2024-11-30 03:35:44','2024-11-30 03:35:44','2024-11-30 03:35:44',12308.000000,12308.000000,NULL,'0000-0000-0000-0000-0000','Initial amount'),('1184031e-1069-4afe-be77-3434edd74396','0fd4c1e4-19ef-492f-84de-fdc35acfabd3','INCOME','Initial amount','IN','2024-11-30 03:36:12','2024-11-30 03:36:12','2024-11-30 03:36:12',22000.000000,22000.000000,NULL,'0000-0000-0000-0000-0000','Initial amount'),('0b1f38d8-986f-487c-b88a-01cbf273b0e2','5ce7dd5a-5c74-4cda-8c07-21892085ac5b','INCOME','Initial amount','IN','2024-11-30 03:37:47','2024-11-30 03:37:47','2024-11-30 03:37:47',-5301.000000,-5301.000000,NULL,'0000-0000-0000-0000-0000','Initial amount'),('4be94794-799b-4830-a246-58a71a87439d','b3cad795-dee9-4bb2-89e8-6cbf487d5305','INCOME','Initial amount','IN','2024-11-30 03:39:49','2024-11-30 03:39:49','2024-11-30 03:39:49',-2714.310000,-2714.310000,NULL,'0000-0000-0000-0000-0000','Initial amount'),('f2c62693-63fe-4363-800f-84ea64d5c969','62f30f98-0a59-4d5b-b5c2-eb2ba50916dd','INCOME','Initial amount','IN','2024-11-30 03:44:02','2024-11-30 03:44:02','2024-11-30 03:44:02',82209.570000,82209.570000,NULL,'0000-0000-0000-0000-0000','Initial amount');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_appliances`
--

DROP TABLE IF EXISTS `user_appliances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_appliances` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_to_use` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_appliances`
--

LOCK TABLES `user_appliances` WRITE;
/*!40000 ALTER TABLE `user_appliances` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_appliances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` enum('AO','SU') COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('0000-0000-0000-0000-0000','Administrator','Perron',NULL,NULL,'admin@localhost',NULL,'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','SU','en','USD',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2024-11-30  3:49:45
