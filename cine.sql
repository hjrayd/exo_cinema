-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
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


-- Listage de la structure de la base pour cinema_hajar
CREATE DATABASE IF NOT EXISTS `cinema_hajar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_hajar`;

-- Listage de la structure de table cinema_hajar. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.acteur : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK_appartient_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_appartient_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.appartient : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK_casting_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_casting_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_casting_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.casting : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '0',
  `duree` int NOT NULL DEFAULT '0',
  `resume` text,
  `note` float DEFAULT NULL,
  `afficheFilm` varchar(50) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.film : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nomGenre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.genre : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(50) NOT NULL,
  `prenom_personne` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.personne : ~33 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `dateNaissance`, `sexe`) VALUES
	(1, 'Tarantino', 'Quentin', '1963-03-27', 'Homme'),
	(2, 'Cameron', 'James', '1954-08-16', 'Homme'),
	(3, 'Eastwood', 'Clint', '1930-05-31', 'Homme'),
	(4, 'Nolan', 'Christopher', '1970-07-30', 'Homme'),
	(5, 'Burton', 'Tim', '1958-08-25', 'Homme'),
	(6, 'Fincher', 'David', '1962-08-28', 'Homme'),
	(7, 'Thurman', 'Uma', '1970-04-22', 'Femme'),
	(8, 'Liu', 'Lucy', '1968-12-02', 'Femme'),
	(9, 'Carradine', 'John', '1936-12-08', 'Homme'),
	(10, 'DiCaprio', 'Leonardo', '1974-11-11', 'Homme'),
	(11, 'Winslet', 'Kate', '1975-10-05', 'Femme'),
	(12, 'Zane', 'Billy', '1966-02-24', 'Homme'),
	(13, 'Worthington', 'Sam', '1976-08-02', 'Homme'),
	(14, 'Saldana', 'Zoê', '1978-06-19', 'Femme'),
	(15, 'Weaver', 'Sigourney', '1949-10-08', 'Femme'),
	(16, 'Penn', 'Sean', '1960-08-17', 'Homme'),
	(17, 'Robbins', 'Tim', '1958-10-16', 'Homme'),
	(18, 'Bacon', 'Kevin', '1958-08-08', 'Homme'),
	(19, 'McConaughey', 'Matthew', '1969-11-04', 'Homme'),
	(20, 'Hathaway', 'Anne', '1982-11-12', 'Femme'),
	(21, 'Chastain', 'Jessica', '1977-03-24', 'Femme'),
	(22, 'Murphy', 'Cilian', '1976-05-25', 'Homme'),
	(23, 'Gordon-Levitt', 'Joseph', '1981-02-17', 'Homme'),
	(24, 'Travolta', 'John', '1954-02-18', 'Homme'),
	(25, 'Jackson', 'Samuel', '1948-12-21', 'Homme'),
	(26, 'Keaton', 'Michael', '1951-09-05', 'Homme'),
	(27, 'Ryder', 'Winona', '1971-10-29', 'Femme'),
	(28, 'Davis', 'Greena', '1956-01-21', 'Femme'),
	(29, 'Norton', 'Edward', '1969-08-18', 'Homme'),
	(30, 'Pitt', 'Brad', '1963-12-18', 'Homme'),
	(31, 'Bonham Carter', 'Helena', '1966-05-25', 'Femme'),
	(32, 'Freeman', 'Morgan', '1937-06-01', 'Homme'),
	(33, 'Spacey', 'Kevin', '1959-07-26', 'Homme');

-- Listage de la structure de table cinema_hajar. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_realisateur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.realisateur : ~0 rows (environ)

-- Listage de la structure de table cinema_hajar. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.role : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
