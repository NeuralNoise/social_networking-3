-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.27-0ubuntu0.15.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4998
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for social_networking
DROP DATABASE IF EXISTS `social_networking`;
CREATE DATABASE IF NOT EXISTS `social_networking` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `social_networking`;


-- Dumping structure for table social_networking.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_comment_user` int(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`,`id_post`),
  KEY `FK_comments_post` (`id_post`),
  CONSTRAINT `FK_comments_comment` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`),
  CONSTRAINT `FK_comments_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.keys_table
DROP TABLE IF EXISTS `keys_table`;
CREATE TABLE IF NOT EXISTS `keys_table` (
  `email` varchar(50) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.likes_post
DROP TABLE IF EXISTS `likes_post`;
CREATE TABLE IF NOT EXISTS `likes_post` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_post` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_like`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.post
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT '0',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_post`),
  KEY `FK_posts_post` (`id_post`),
  CONSTRAINT `FK_posts_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  CONSTRAINT `FK_posts_users_table` FOREIGN KEY (`id_user`) REFERENCES `users_table` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table social_networking.users_table
DROP TABLE IF EXISTS `users_table`;
CREATE TABLE IF NOT EXISTS `users_table` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `surname` varchar(50) NOT NULL DEFAULT '0',
  `age` varchar(50) NOT NULL DEFAULT '0',
  `tel` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for view social_networking.view_comments
DROP VIEW IF EXISTS `view_comments`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_comments` (
	`id_post` INT(11) NOT NULL,
	`content` VARCHAR(500) NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view social_networking.view_posts_usr
DROP VIEW IF EXISTS `view_posts_usr`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_posts_usr` (
	`username` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_user` INT(11) NOT NULL,
	`id_post` INT(11) NOT NULL,
	`content` VARCHAR(500) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view social_networking.view_comments
DROP VIEW IF EXISTS `view_comments`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_comments`;
CREATE ALGORITHM=UNDEFINED DEFINER=`cicy`@`localhost` SQL SECURITY DEFINER VIEW `view_comments` AS select `comments`.`id_post` AS `id_post`,`comment`.`content` AS `content`,`users_table`.`username` AS `username` from ((`comments` join `comment` on((`comments`.`id_comment` = `comment`.`id_comment`))) join `users_table` on((`comment`.`id_comment_user` = `users_table`.`id_user`)));


-- Dumping structure for view social_networking.view_posts_usr
DROP VIEW IF EXISTS `view_posts_usr`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_posts_usr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_posts_usr` AS select `users_table`.`username` AS `username`,`users_table`.`id_user` AS `id_user`,`post`.`id_post` AS `id_post`,`post`.`content` AS `content` from ((`users_table` join `posts` on((`users_table`.`id_user` = `posts`.`id_user`))) join `post` on((`posts`.`id_post` = `post`.`id_post`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
