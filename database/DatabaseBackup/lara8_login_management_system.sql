/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.21 : Database - larvel_login_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`larvel_login_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `larvel_login_management`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2021_05_24_042334_create_roles_table',1),
(6,'2021_05_24_042811_create_role_user_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('rohit@gmail.com','$2y$10$/QBjTCOGYbss5/aFpd6iaOf.4/xoJ4N.bw.rCRG/IVfBj7miv8ecm','2021-05-29 04:42:53'),
('virat@gmail.com','$2y$10$mdNKFX4NqN5l5.j9syo0UOtUZbZV8f4rsYo7XFe2M4YAh9le0zo0m','2021-05-29 04:45:21'),
('dohyjihaf@mailinator.com','$2y$10$fjhWzPPS9K36XvzdD4IB4uBzJUhwc3w5NsNVFlgs3ZRPe/4cTm7cG','2021-05-29 05:06:40');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`role_id`,`user_id`,`created_at`,`updated_at`) values 
(1,3,1,NULL,NULL),
(2,2,2,NULL,NULL),
(3,2,3,NULL,NULL),
(4,1,4,NULL,NULL),
(5,2,5,NULL,NULL),
(6,1,6,NULL,NULL),
(7,2,6,NULL,NULL),
(8,3,6,NULL,NULL),
(9,2,7,NULL,NULL),
(10,3,7,NULL,NULL),
(11,1,7,NULL,NULL),
(12,1,8,NULL,NULL),
(13,3,8,NULL,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Admin','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(2,'Author','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(3,'User','2021-05-29 04:40:46','2021-05-29 04:40:46');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Mr. Devonte Ledner','colt.connelly@example.net','2021-05-29 04:40:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'OC8aXbNlO0','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(2,'Nia Koch','tremblay.joanny@example.com','2021-05-29 04:40:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'s3D5xCzKpI','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(3,'Noel Collins','izabella92@example.com','2021-05-29 04:40:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'SltHSdHFC6','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(4,'Alysson Hessel','jerald.rath@example.org','2021-05-29 04:40:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'X5KJKpKugT03TPLMJePNTUluF8owR0H3a5Zh4oDOrLpW3xdacqgVZE6G4DRO','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(5,'Elliott Turner Jr.','nina27@example.org','2021-05-29 04:40:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,'SJO3zgi7q7pDQSf5GuBlUmHiMGIXTYaRjpGLicZSm8mW5DPMQADUPyLOfaJG','2021-05-29 04:40:46','2021-05-29 04:40:46'),
(6,'rohit','rohit@gmail.com','2021-05-29 05:00:49','$2y$10$Tj58j4Pkql2Bpz22NU3Ku.ZPT8tBjugQ2zjg9FkvEpv972/i04t6O',NULL,NULL,NULL,'2021-05-29 04:42:53','2021-05-29 05:00:49'),
(7,'virat','virat@gmail.com','2021-05-29 05:00:09','$2y$10$Rk3MCQq89saERpBdK2dJhe/T9yxXQZ5VROmPfJIB7NCvfnE51H8z6',NULL,NULL,NULL,'2021-05-29 04:45:21','2021-05-29 05:00:09'),
(8,'Nadine Alvarez','dohyjihaf@mailinator.com',NULL,'$2y$10$DJM9ebmFHdCut7V2L9SFuuUpeW7bCmYMV8DWxikqxxKiSZte0dgpW',NULL,NULL,NULL,'2021-05-29 05:06:40','2021-05-29 05:06:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
