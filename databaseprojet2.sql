-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 01 nov. 2020 à 16:34
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `databaseprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Loisir'),
(2, 'Alimentaire');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `ope_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ope_amount` int(11) NOT NULL,
  `ope_type` varchar(50) NOT NULL,
  `ope_date` date NOT NULL,
  `ope_comment` varchar(255) DEFAULT NULL,
  `ope_create_at` date DEFAULT NULL,
  `ope_update_at` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ope_id`),
  KEY `user_id` (`user_id`),
  KEY `cate_id` (`cate_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`ope_id`, `ope_amount`, `ope_type`, `ope_date`, `ope_comment`, `ope_create_at`, `ope_update_at`, `user_id`, `cate_id`, `payment_id`) VALUES
(1, 0, '', '0000-00-00', NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`) VALUES
(1, 'Cheque');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_birthday` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_birthday`) VALUES
(7, 'testa', 'testa', 'test@testa.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '2020-01-01'),
(40, 'azzz', 'aaaaa', 'aaaaaaaaaa@f.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '2020-10-12'),
(39, 'hhh', 'hhh', 'aaakk@dd.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '2020-10-11'),
(38, 'AAAAA', 'AAA', 'qqqq@ff.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '2020-10-18'),
(37, 'AAAA', 'AAAA', 'AAAAA@ff.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '2020-10-25'),
(36, 'AAAA', 'AAA', 'aaa@aaa.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '0000-00-00'),
(35, 'testa', 'testa', 'testa@testa.fr', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '0000-00-00'),
(33, 'test2', 'test2', 'test2@test.com', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '1111-11-11'),
(34, 'test', 'test', 'test@test.com', '8ab4b6b376dd7bccc0fe52d78d904ca1be167081e263ef49c2dfd78fd23e2c32cd9a280c289b75c68e363a77d171fbeffa01b2f151ddee07fadeff2a800fbc36', '1111-11-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
