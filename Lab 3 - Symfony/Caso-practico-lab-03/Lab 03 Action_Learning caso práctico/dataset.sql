-- Adminer 4.8.1 MySQL 8.0.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C4B89032C` (`post_id`),
  CONSTRAINT `FK_9474526C4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231017120522',	'2023-10-17 12:05:35',	22),
('DoctrineMigrations\\Version20231017130634',	'2023-10-17 13:06:49',	82),
('DoctrineMigrations\\Version20231017134329',	'2023-10-17 13:43:37',	250),
('DoctrineMigrations\\Version20231017134639',	'2023-10-17 13:49:52',	46),
('DoctrineMigrations\\Version20231017135509',	'2023-10-17 13:55:13',	126),
('DoctrineMigrations\\Version20231017140052',	'2023-10-17 14:01:02',	145),
('DoctrineMigrations\\Version20231017140335',	'2023-10-17 14:03:42',	171),
('DoctrineMigrations\\Version20231018085728',	'2023-10-18 08:57:53',	99);

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `author_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8DF675F31B` (`author_id`),
  CONSTRAINT `FK_5A8A6C8DF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `updated_at`, `author_id`) VALUES
(1,	'Primer Post',	'Contenido del primer post',	'2023-10-18 08:40:06',	'2023-10-18 08:40:06',	1),

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1,	'Jesus',	'jesus@jesus.com');

-- 2023-10-18 14:57:15