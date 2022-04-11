-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 21 nov. 2021 à 17:24
-- Version du serveur :  5.7.16-log
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_ensibs`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `begin_at` date NOT NULL,
  `end_at` date NOT NULL,
  `contract_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `title`, `description`, `author_id`, `location`, `begin_at`, `end_at`, `contract_type`) VALUES
(1, 'Apprentie - Corporation&Co', 'Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate', 2, 'Brest', '2021-12-01', '2022-01-01', 'Stage de découverte'),
(2, 'ApprentieBis - Corporation&Co', 'Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate', 2, 'Brest', '2021-12-01', '2022-01-01', 'Stage de découverte');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `description` text,
  `author_id` int(11) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `filiere` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`id`, `first_name`, `last_name`, `description`, `author_id`, `statut`, `filiere`) VALUES
(1, 'Jean', 'de La Fontaine', 'Jean de La Fontaine, né le 8 juillet 1621 à Château-Thierry et mort le 13 avril 1695 à Paris, est un poète français de grande renommée, principalement pour ses Fables et dans une moindre mesure pour ses contes.', 2, 'Indisponible', 'Cyberlog'),
(2, 'Louis', 'de Funès', 'Louis de Funès, de son nom complet Louis de Funès de Galarza, est un acteur français né le 31 juillet 1914 à Courbevoie et mort le 27 janvier 1983 à Nantes.', 1, 'Indispo', 'Cyberdata'),
(4, 'Park', 'Chan-wook', 'Park Chan-wook  (born August 23, 1963) is a South Korean film director, screenwriter, producer, and former film critic. One of the most acclaimed and popular filmmakers in the world, Park is best known for his films Joint Security Area (2000), Thirst (2009), The Handmaiden (2016) and what has become known as The Vengeance Trilogy, consisting of Sympathy for Mr. Vengeance (2002), Oldboy (2003) and Lady Vengeance (2005).', NULL, 'Disponible', 'Cyberlog'),
(5, 'Jean-Claude', 'Van Damme', 'Jean-Claude Van Damme, né Jean-Claude Van Vaerenbergh le 18 octobre 1960 à Berchem-Sainte-Agathe, en Belgique, est un acteur, réalisateur, producteur de cinéma et pratiquant d\'arts martiaux belge.', NULL, 'Disponible', 'Cyberdata');

-- --------------------------------------------------------

--
-- Structure de la table `motiv`
--

DROP TABLE IF EXISTS `motiv`;
CREATE TABLE IF NOT EXISTS `motiv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `remember_token`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`) VALUES
(2, 'tristan_souillard', 'souillard.e2005147@etud.univ-ubs.fr', '$2y$10$ocFK39lfN2IPkTIG86.1Y.7n1joPRc3Mp72L19jPVp/sFdbPG8JBa', 3, NULL, '8ExWKjDXF0ZOEfvfgeCEoxhrpvMGPCNJDfAdgy7zeJnEXgxHWmmrxMb8yr8U', NULL, 'sDClU51UkmQbPXvJhk5NSsBwBENjCPmweMmsTcE8j5oAo9CjFzx0Vb0ttVco', '2021-11-14 14:00:23'),
(5, 'ChikaDee', 'tristan.souillard76@gmail.com', '$2y$10$VA7vHASk6dNTGx16cUzIkOuYurwKR3lT2bZ0AbRE5Ygmlnv8ZoPzK', 1, NULL, 'DJO8fBEBNv2LKRxizQdmwPi2MgzwgfqWUTDGM8rIUyWShvnTqAFeyLi6RfXC', NULL, NULL, NULL),
(6, 'Company', 'Company@gmail.com', '$2y$10$CyVZ7OkG85Yl1TjBqDe7ee3e.K8dkRtkZLg8V8susKAyTmnXX0BIO', 2, NULL, 'CrqRBL1qTIAKnfivstngJkamNnHBzMBiBld8AJfs2kSGHuNNpqBAKrvGjajf', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
