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
CREATE DATABASE IF NOT EXISTS `cinema_hajar` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_hajar`;

 
-- Listage de la structure de table cinema_hajar. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.acteur : ~29 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(2, 1),
	(3, 3),
	(1, 7),
	(4, 8),
	(5, 9),
	(6, 10),
	(7, 11),
	(8, 12),
	(9, 13),
	(10, 14),
	(11, 15),
	(12, 16),
	(13, 17),
	(14, 18),
	(15, 19),
	(16, 20),
	(17, 21),
	(18, 22),
	(19, 23),
	(20, 24),
	(21, 25),
	(22, 26),
	(23, 27),
	(24, 28),
	(25, 29),
	(26, 30),
	(27, 31),
	(28, 32),
	(29, 33);
	
-- Listage de la structure de table cinema_hajar. appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK_appartient_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_appartient_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Listage des données de la table cinema_hajar.appartient : ~15 rows (environ)
INSERT INTO `appartient` (`id_film`, `id_genre`) VALUES
	(1, 3),
	(2, 1),
	(4, 2),
	(4, 1),
	(5, 1),
	(5, 4),
	(3, 4),
	(6, 3),
	(6, 4),
	(7, 3),
	(7, 1),
	(8, 5),
	(9, 3),
	(10, 2),
	(10, 1);
	
	
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

-- Listage des données de la table cinema_hajar.casting : ~31 rows (environ)
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 2),
	(1, 4, 3),
	(1, 5, 4),
	(2, 6, 5),
	(2, 7, 6),
	(2, 8, 7),
	(3, 9, 8),
	(3, 10, 9),
	(3, 11, 10),
	(4, 12, 11),
	(4, 13, 12),
	(4, 14, 13),
	(5, 15, 14),
	(5, 16, 15),
	(5, 17, 16),
	(6, 6, 17),
	(6, 18, 19),
	(6, 19, 18),
	(7, 2, 1),
	(7, 1, 20),
	(7, 20, 21),
	(7, 21, 22),
	(8, 22, 23),
	(8, 23, 24),
	(8, 24, 25),
	(9, 25, 27),
	(9, 26, 26),
	(9, 27, 28),
	(10, 26, 31),
	(10, 28, 29),
	(10, 29, 30);


-- Listage de la structure de table cinema_hajar. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '0',
  `duree` int NOT NULL DEFAULT '0',
  `resume` text,
  `note` float DEFAULT NULL,
  `date_sortie` int DEFAULT NULL,
  `afficheFilm` varchar(50) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Listage des données de la table cinema_hajar.film : ~10 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `duree`, `resume`, `note`, `date_sortie`, `afficheFilm`, `id_realisateur`) VALUES
	(1, 'Kill Bill', 111, 'Au cours d\'une cérémonie de mariage en plein désert, un commando fait irruption dans la chapelle et tire sur les convives. Laissée pour morte, la Mariée enceinte retrouve ses esprits après un coma de quatre ans. Celle qui a auparavant exercé les fonctions de tueuse à gages au sein du Détachement International des Vipères Assassines n\'a alors plus qu\'une seule idée en tête : venger la mort de ses proches en éliminant tous les membres de l\'organisation criminelle, dont leur chef Bill qu\'elle se réserve pour la fin.', 4, '2003', 'https://th.bing.com/th/id/OIP.QRoYUipqebs6BA7urEIoUgHaLH?pid=ImgDet&w=120&h=180&c=7', 1),
	(2, 'Titanic', 194, 'moderne du monde, réputé pour son insubmersibilité, le « Titanic », appareille pour son premier voyage. 4 jours plus tard, il heurte un iceberg. À son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.', 5, '1997', 'http://www.senscritique.com/film/Titanic/414447/images', 2),
	(3, 'Avatar', 162, 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des " pilotes " humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora.', 4.3, '2009', 'https://th.bing.com/th/id/OIP.NNDzj9c4s1ntnvDOwTDNagHaLH?pid=ImgDet&w=120&h=180&c=7', 2),
	(4, 'Mystic River', 137, 'Jimmy Markum, Dave Boyle et Sean Devine ont grandi ensemble dans les rues de Boston. Rien ne semblait devoir altérer le cours de leur amitié jusqu\'au jour où Dave se fit enlever par un inconnu sous les yeux de ses amis. Leur complicité juvénile ne résista pas à un tel événement et leurs chemins se séparèrent inéluctablement.', 4.2, '2003', 'https://th.bing.com/th/id/OIP.jpDL4DF9mrt3DQ-35AUcPwHaJ4?pid=ImgDet&w=127.750177430802&h=180.00000000000003&c=7', 3),
	(5, 'Interstellar', 169, 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire. ', 4.5, '2014', 'https://th.bing.com/th/id/OIP.jVVUF1D1uEuSPvQtvM5uXgHaLH?pid=ImgDet&w=126.22720897615707&h=180&c=7', 4),
	(6, 'Inception', 148, 'Dom Cobb est un voleur expérimenté – le meilleur qui soit dans l’art périlleux de l’extraction : sa spécialité consiste à s’approprier les secrets les plus précieux d’un individu, enfouis au plus profond de son subconscient, pendant qu’il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l’univers trouble de l’espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier qui a perdu tout ce qui lui est cher. Mais une ultime mission pourrait lui permettre de retrouver sa vie d’avant – à condition qu’il puisse accomplir l’impossible : l’inception. Au lieu de subtiliser un rêve, Cobb et son équipe doivent faire l’inverse : implanter une idée dans l’esprit d’un individu. S’ils y parviennent, il pourrait s’agir du crime parfait. Et pourtant, aussi méthodiques et doués soient-ils, rien n’aurait pu préparer Cobb et ses partenaires à un ennemi redoutable qui semble avoir systématiquement un coup d’avance sur eux. Un ennemi dont seul Cobb aurait pu soupçonner l’existence.', 4.5, '2010', 'https://th.bing.com/th/id/OIP.3Zgn-7AZnNIGlHOdVMNG2AHaK-?pid=ImgDet&w=120&h=180&c=7', 4),
	(7, 'Pulp Fiction', 149, 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent.', 4.5, '1994', '', 1),
	(8, 'Beetlejuice', 92, 'Pour avoir voulu sauver un chien, Adam et Barbara Maitland passent tout de go dans l\'autre monde. Peu après, occupants invisibles de leur antique demeure ils la voient envahie par une riche et bruyante famille new-yorkaise. Rien à redire jusqu\'au jour où cette honorable famille entreprend de donner un cachet plus urbain à la vieille demeure. Adam et Barbara, scandalisés, décident de déloger les intrus. Mais leurs classiques fantômes et autres sortilèges ne font aucun effet. C\'est alors qu\'ils font appel à un "bio-exorciste" freelance connu sous le sobriquet de Beetlejuice.', 3.9, '1998', 'https://th.bing.com/th/id/OIP.MKbVQnnZPDxbo2iCDMTDoQHaLH?pid=ImgDet&w=120.44999999999999&h=180&c=7', 5),
	(9, 'Fight club', 139, 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d\'autres personnes seules qui connaissent la misère humaine, morale et sexuelle. C\'est pourquoi il va devenir membre du Fight club, un lieu clandestin ou il va pouvoir retrouver sa virilité, l\'échange et la communication. Ce club est dirigé par Tyler Durden, une sorte d\'anarchiste entre gourou et philosophe qui prêche l\'amour de son prochain.', 4.5, '1999', 'https://th.bing.com/th/id/OIP.GGzj_iHbeurTqIEcNGIEdwAAAA?pid=ImgDet&w=120.375&h=180&c=7', 6),
	(10, 'Seven', 130, 'Pour conclure sa carrière, l\'inspecteur Somerset, vieux flic blasé, tombe à sept jours de la retraite sur un criminel peu ordinaire. John Doe, c\'est ainsi que se fait appeler l\'assassin, a decidé de nettoyer la societé des maux qui la rongent en commettant sept meurtres basés sur les sept pechés capitaux: la gourmandise, l\'avarice, la paresse, l\'orgueil, la luxure, l\'envie et la colère.', 4.5, '1996', 'https://th.bing.com/th/id/OIP.Oiw_wuFjwBzGUNhecOUfUAHaJ4?pid=ImgDet&w=120&h=180&c=7', 6);


-- Listage de la structure de table cinema_hajar. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- Listage des données de la table cinema_hajar.genre : ~5 rows (environ)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Drame'),
	(2, 'Thriller'),
	(3, 'Action'),
	(4, 'Science-fiction'),
	(5, 'Comédie');

-- Listage de la structure de table cinema_hajar. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(50) NOT NULL,
  `prenom_personne` varchar(50) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `sexe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.personne : ~33 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `date_naissance`, `sexe`) VALUES
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
	(28, 'Davis', 'Geena', '1956-01-21', 'Femme'),
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
 
 
-- Listage des données de la table cinema_hajar.realisateur : ~6 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6);

-- Listage de la structure de table cinema_hajar. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_hajar.role : ~31 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Jimmie Dimmick'),
	(2, 'Beatrix Kiddo'),
	(3, 'O-Ren Ishii'),
	(4, 'Bill'),
	(5, 'Jack Dawson'),
	(6, 'Rose Buckater'),
	(7, 'Cal Hockley'),
	(8, 'Jake Sully'),
	(9, 'Neytiri'),
	(10, 'Dr. Grace Augustine'),
	(11, 'Jimmy Markum'),
	(12, 'Dave Boyle'),
	(13, 'Sean Devine'),
	(14, 'Cooper'),
	(15, 'Brand'),
	(16, 'Murph'),
	(17, 'Dom Cobb'),
	(18, 'Arthur'),
	(19, 'Robert Fisher'),
	(20, 'Mia Wallace'),
	(21, 'Vincent Vega'),
	(22, 'Jules Winnfield'),
	(23, 'Beetlejuice'),
	(24, 'Lydia Deetz'),
	(25, 'Barbara Maitland'),
	(26, 'Tyler Durden'),
	(27, 'Le narrateur'),
	(28, 'Marla Singer'),
	(29, 'Somerset'),
	(30, 'John Doe'),
	(31, 'David Mills');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
