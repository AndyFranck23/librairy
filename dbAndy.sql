-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour useradmin
CREATE DATABASE IF NOT EXISTS `useradmin` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `useradmin`;

-- Listage de la structure de table useradmin. books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heure` int DEFAULT NULL,
  `auteur` varchar(50) NOT NULL DEFAULT '',
  `titre` varchar(50) NOT NULL DEFAULT '',
  `emprunt` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table useradmin.books : ~3 rows (environ)
INSERT INTO `books` (`id`, `heure`, `auteur`, `titre`, `emprunt`, `date`) VALUES
	(1, 48, 'andy', 'the boy', 1, '2024-10-23'),
	(2, 52, 'lucka', 'the little boy', 1, '2024-10-27'),
	(3, 7, 'mandresy', 'the', 0, '2024-11-16'),
	(4, 17, 'sds', 'the', 0, '2024-10-30'),
	(5, 48, 'robert downey', 'ironman', 0, '2024-12-15'),
	(6, 52, 'chris hemsworth', 'thor', 1, '2024-10-27');

-- Listage de la structure de table useradmin. command
CREATE TABLE IF NOT EXISTS `command` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Listage des données de la table useradmin.command : ~2 rows (environ)
INSERT INTO `command` (`id`, `user_id`, `book_id`, `titre`, `auteur`, `email`) VALUES
	(24, 10, 2, 'the little boy', 'lucka', 'rako@gmail.com');

-- Listage de la structure de table useradmin. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table useradmin.users : ~5 rows (environ)
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'ironmanandy23@gmail.com', '123'),
	(2, 'kk@gmail.com', '124'),
	(6, 'mld@gmail.com', '258'),
	(7, 'sdfsd@gmail.com', '125'),
	(8, 'fsd@gmail.com', '147'),
	(9, 'rakoto@gmail.com', '111'),
	(10, 'rako@gmail.com', '123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
useradmin