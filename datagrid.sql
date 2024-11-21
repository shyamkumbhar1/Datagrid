-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for datagrid
CREATE DATABASE IF NOT EXISTS `datagrid` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `datagrid`;

-- Dumping structure for table datagrid.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.cache: ~0 rows (approximately)
DELETE FROM `cache`;

-- Dumping structure for table datagrid.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table datagrid.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table datagrid.family_heads
CREATE TABLE IF NOT EXISTS `family_heads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` enum('Married','Unmarried') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wedding_date` date DEFAULT NULL,
  `hobbies` json DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.family_heads: ~0 rows (approximately)
DELETE FROM `family_heads`;
INSERT INTO `family_heads` (`id`, `name`, `surname`, `birthdate`, `mobile_no`, `address`, `state`, `city`, `pincode`, `marital_status`, `wedding_date`, `hobbies`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'Shellie Weber', 'Valencia', '1992-08-19', '9767624172', 'Non voluptatem Reru', 'Uttarakhand (UK)', 'Nainital', '440006', 'Married', '2015-08-28', '["Odio officiis et con"]', 'photos/kFiAgxYxGstQpTZYtMXDIlidIfwuLn2mmUUPs9cU.jpg', '2024-11-21 13:13:44', '2024-11-21 13:13:45'),
	(2, 'Babu', 'Kumbhar', '1957-01-01', '7798751680', 'Possimus et et opti', 'Arunachal Pradesh (AR)', 'Upper Subansiri', '440006', 'Married', '1997-05-08', '["Cooking", "Dancing"]', 'photos/fRKaSUEhyoby8CWKFI1NafvAgSdLKbedUOwSfuBV.jpg', '2024-11-21 13:31:50', '2024-11-21 13:31:50'),
	(3, 'Shyam', 'Kumbhar', '1993-12-27', '9767624172', 'surendragad seminary hills', 'Assam (AS)', 'Goalpara', '440013', 'Married', '2022-10-15', '["Dignissimos quibusda"]', 'photos/ZhzS01356YXj52QnGtrN1BoMYKzHECxzY1k81jLr.jpg', '2024-11-21 14:11:29', '2024-11-21 14:11:29'),
	(4, 'Guy Castaneda', 'Campos', '1996-01-04', '9767624172', 'Placeat et deleniti', 'Delhi (DL)', 'North Delhi', '440006', 'Married', '2021-11-05', '["Velit non id vitae"]', 'photos/Czz3gzGb18DH29hunRirl3GiGr5kHbPvyJqtaZ0w.jpg', '2024-11-21 15:14:57', '2024-11-21 15:14:57');

-- Dumping structure for table datagrid.family_members
CREATE TABLE IF NOT EXISTS `family_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `family_head_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` enum('Father','Mother','Brother','Sister','Spouse','Other') COLLATE utf8mb4_unicode_ci DEFAULT 'Other',
  `birthdate` date NOT NULL,
  `marital_status` enum('Married','Unmarried') COLLATE utf8mb4_unicode_ci NOT NULL,
  `wedding_date` date DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `family_members_family_head_id_foreign` (`family_head_id`),
  CONSTRAINT `family_members_family_head_id_foreign` FOREIGN KEY (`family_head_id`) REFERENCES `family_heads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.family_members: ~6 rows (approximately)
DELETE FROM `family_members`;
INSERT INTO `family_members` (`id`, `family_head_id`, `name`, `relation`, `birthdate`, `marital_status`, `wedding_date`, `education`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Deepak KUmbhar', 'Other', '2024-03-06', 'Married', NULL, NULL, 'family_photos/1732220745_2.jpg', '2024-11-21 13:20:35', '2024-11-21 13:20:35'),
	(2, 2, 'Lisandra Carlson', 'Other', '2001-03-03', 'Married', NULL, NULL, 'family_photos/1732220745_2.jpg', '2024-11-21 14:03:51', '2024-11-21 14:03:51'),
	(3, 3, 'Renee Hoffman', 'Other', '2024-11-23', 'Married', NULL, NULL, 'family_photos/1732220745_2.jpg', '2024-11-21 14:55:45', '2024-11-21 14:55:45'),
	(4, 4, 'Armando Dunlap', 'Other', '1977-01-18', 'Married', NULL, NULL, 'family_photos/1732221953_2.jpg', '2024-11-21 15:15:53', '2024-11-21 15:15:53');

-- Dumping structure for table datagrid.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table datagrid.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table datagrid.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.migrations: ~1 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_11_20_163109_create_family_heads_table', 1),
	(5, '2024_11_20_163130_create_family_members_table', 1),
	(6, '2024_11_21_113650_add_relation_to_family_members_table', 1);

-- Dumping structure for table datagrid.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table datagrid.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.sessions: ~0 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6pktmFHISaXgYEILI0wxybkBPXOSImKXl7kGMaEi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienNzc3RhMVFjNkpuMTRxdDJlcHYzTlVPY0hvV2dKNVR3NGh6TzJJbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mYW1pbHkvY3JlYXRlIjt9fQ==', 1732222934);

-- Dumping structure for table datagrid.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table datagrid.users: ~0 rows (approximately)
DELETE FROM `users`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
