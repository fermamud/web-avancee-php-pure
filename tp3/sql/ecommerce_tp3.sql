-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 12:47 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_tp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
(1, 'Féminin'),
(2, 'Masculin'),
(3, 'Non binaire');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adresse_ip` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `nom` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `usager` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `adresse_ip`, `date`, `nom`, `page`, `usager`) VALUES
(1, '::1', '2023-11-21 00:41:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/log/affichage', 'admin ou emploi'),
(2, '::1', '2023-11-21 00:41:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/produit', 'admin ou emploi'),
(3, '::1', '2023-11-21 00:41:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/log/affichage', 'admin ou emploi'),
(4, '::1', '2023-11-21 00:42:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/log/affichage', 'admin ou emploi'),
(5, '::1', '2023-11-21 00:43:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/log/affichage', 'admin ou emploi'),
(6, '::1', '2023-11-21 00:43:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/login/logout', 'admin ou emploi'),
(7, '::1', '2023-11-21 00:43:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/produit', 'guest'),
(8, '::1', '2023-11-21 00:43:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/artiste', 'guest'),
(9, '::1', '2023-11-21 00:43:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '/WebAvancee22635-Fernanda/tp3/produit', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `description`) VALUES
(1, 'Acier inoxydable'),
(2, 'Argent');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `id_privilege` int NOT NULL AUTO_INCREMENT,
  `privilege` varchar(20) NOT NULL,
  PRIMARY KEY (`id_privilege`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id_privilege`, `privilege`) VALUES
(1, 'admin'),
(2, 'emploi');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` int NOT NULL,
  `id_usager` int NOT NULL,
  `id_material` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_produit`) USING BTREE,
  KEY `fk_produit_usager_idx` (`id_usager`),
  KEY `fk_produit_material1_idx` (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `type`, `description`, `prix`, `id_usager`, `id_material`, `image`) VALUES
(1, 'Collier', 'Magnifique collier de perles, délicat et de haute qualité.', 87, 1, 2, '1.jpeg'),
(2, 'Boucle', 'Magnifique boucle d\'oreille conçue par un artiste, après avoir passé un mois en Amazonie.', 65, 1, 1, '2.jpeg'),
(3, 'Collier', 'Si votre place est la mer, cette belle pièce a été faite pour vous.', 104, 2, 2, '3.jpeg'),
(4, 'Boucle', 'Boucle d\'oreille qui apporte l\'importance de l\'asymétrie et de la symétrie. Tout dépend de votre point de vue.', 2, 1, 1, '4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id_usager` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_genre` int DEFAULT NULL,
  `id_privilege` int NOT NULL,
  PRIMARY KEY (`id_usager`) USING BTREE,
  KEY `fk_usager_genre1_idx` (`id_genre`),
  KEY `fk_usager_privilege1_idx` (`id_privilege`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usager`
--

INSERT INTO `usager` (`id_usager`, `nom`, `prenom`, `username`, `password`, `id_genre`, `id_privilege`) VALUES
(1, 'Mattos', 'Fernanda', 'fernandafrata@gmail.com', '$2y$10$KIThQsPx9uYp1cGtu9nL/e40HEKyCH4AyU4hJdjL7Uugs1OE6b1vK', 1, 1),
(2, 'Frata Mamud', 'Julia', 'juliafrata@gmail.com', '$2y$10$qGJELvCMZ8BSZLY6gyxALuqY6zsk6PSm4cYHQrHW8MxNgiI2tlHv2', 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_material1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `fk_produit_usager` FOREIGN KEY (`id_usager`) REFERENCES `usager` (`id_usager`);

--
-- Constraints for table `usager`
--
ALTER TABLE `usager`
  ADD CONSTRAINT `fk_usager_genre1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_usager_privilege1` FOREIGN KEY (`id_privilege`) REFERENCES `privilege` (`id_privilege`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
