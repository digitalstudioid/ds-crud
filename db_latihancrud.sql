# SQL Manager 2005 Lite for MySQL 3.7.7.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : db_latihancrud


SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `db_latihancrud`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `db_latihancrud`;

#
# Structure for the `blog_post` table : 
#

CREATE TABLE `blog_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `items` table : 
#

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `likes` table : 
#

CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `links` table : 
#

CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `members` table : 
#

CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `migrations` table : 
#

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `nerds` table : 
#

CREATE TABLE `nerds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nerd_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `passports` table : 
#

CREATE TABLE `passports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passports_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `password_resets` table : 
#

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `posts` table : 
#

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `products` table : 
#

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `sessions` table : 
#

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `tasks` table : 
#

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Structure for the `users` table : 
#

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for the `blog_post` table  (LIMIT 0,500)
#

INSERT INTO `blog_post` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES 
  (2,'test222','test222','2018-06-06 01:07:14','2018-06-06 01:07:36');

COMMIT;

#
# Data for the `items` table  (LIMIT 0,500)
#

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES 
  (1,'aaa','aaa111','2018-06-06 03:24:06','2018-06-06 03:24:06'),
  (2,'bbb','bbb222','2018-06-06 03:24:18','2018-06-06 03:24:18'),
  (3,'ccc','ccc123','2018-06-06 03:28:49','2018-06-06 03:28:49');

COMMIT;

#
# Data for the `likes` table  (LIMIT 0,500)
#

INSERT INTO `likes` (`id`, `created_at`, `updated_at`, `user_id`, `post_id`, `like`) VALUES 
  (1,'2018-06-06 01:46:12','2018-06-06 01:46:31',1,2,1),
  (2,'2018-06-06 02:11:24','2018-06-06 02:11:27',1,4,0),
  (3,'2018-06-06 02:11:25','2018-06-06 02:11:26',1,3,0);

COMMIT;

#
# Data for the `links` table  (LIMIT 0,500)
#

INSERT INTO `links` (`id`, `url`, `description`, `created_at`, `updated_at`) VALUES 
  (1,'https://laravel.com/','Laravel - The PHP framework for web artisans.','2018-06-06 03:41:17','2018-06-06 03:41:17'),
  (2,'https://laracasts.com/','The best PHP and Laravel screencasts on the web.','2018-06-06 03:41:17','2018-06-06 03:41:17');

COMMIT;

#
# Data for the `migrations` table  (LIMIT 0,500)
#

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES 
  (1,'2014_10_12_000000_create_users_table',1),
  (2,'2014_10_12_100000_create_password_resets_table',1),
  (3,'2018_05_30_023008_create_passports_table',2),
  (4,'2018_05_30_031135_create_nerds_table',3),
  (5,'2018_05_30_040649_create_sessions_table',4),
  (6,'2018_05_30_043120_create_products_table',5),
  (7,'2018_05_30_062536_create_tasks_table',6),
  (8,'2018_05_30_082232_create_members_table',7),
  (9,'2018_06_06_010224_create_blog_post_table',8),
  (10,'2018_06_06_011638_create_posts_table',9),
  (11,'2018_06_06_011646_create_likes_table',9),
  (12,'2018_06_06_031457_create_items_table',10),
  (13,'2018_06_06_033831_create_links_table',11);

COMMIT;

#
# Data for the `nerds` table  (LIMIT 0,500)
#

INSERT INTO `nerds` (`id`, `name`, `email`, `nerd_level`, `created_at`, `updated_at`) VALUES 
  (9,'Rudi Amirudin1','rudi.amirudin1@gmail.com',3,'2018-05-30 04:16:20','2018-05-30 04:18:40'),
  (10,'Ajeng Dwie Rahayu Lestari','ajeng.drl@gmail.com',1,'2018-05-30 04:19:03','2018-05-30 04:19:03');

COMMIT;

#
# Data for the `passports` table  (LIMIT 0,500)
#

INSERT INTO `passports` (`id`, `name`, `date`, `email`, `number`, `office`, `filename`, `created_at`, `updated_at`) VALUES 
  (2,'Rudi Amirudin',1525132800,'rudi.amirudin@gmail.com',11111,'Mumbai','1527648829Abang Adik.jpg','2018-05-30 02:53:49','2018-05-30 02:53:49'),
  (3,'Ajeng Dwie Rahayu Lestari',1525737600,'ajeng.drl@gmail.com',22222,'Chennai','15276488721.png','2018-05-30 02:54:32','2018-05-30 02:54:32');

COMMIT;

#
# Data for the `posts` table  (LIMIT 0,500)
#

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`) VALUES 
  (2,'aaa','aaa123','2018-06-06 08:30:38',NULL,1),
  (3,'bbb','bbb123','2018-06-06 08:46:58',NULL,1),
  (4,'ccc','ccc123','2018-06-06 08:47:07',NULL,1);

COMMIT;

#
# Data for the `products` table  (LIMIT 0,500)
#

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES 
  (1,'AAA','aaa','2018-05-30 04:38:48','2018-05-30 04:38:48');

COMMIT;

#
# Data for the `users` table  (LIMIT 0,500)
#

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
  (1,'Rudi Amirudin','rudi.amirudin@gmail.com','$2y$10$IGRrupl7sfKIovFfCcedpOAY2.XdpZWP6zsKeDXswDSVyVGyli786',NULL,'2018-06-06 01:29:51','2018-06-06 01:29:51');

COMMIT;

