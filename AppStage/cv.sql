-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2021 at 02:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `first name` varchar(255) DEFAULT NULL,
  `last name` varchar(255) DEFAULT NULL,
  `description` text,
  `author_id` int(11) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `filière` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `first name`, `last name`, `description`, `author_id`, `statut`, `filière`) VALUES
(1, 'Jean', 'de La Fontaine', 'Jean de La Fontaine, né le 8 juillet 1621 à Château-Thierry et mort le 13 avril 1695 à Paris, est un poète français de grande renommée, principalement pour ses Fables et dans une moindre mesure pour ses contes.', 2, 'Indisponible', 'Cyberlog'),
(2, 'Louis', 'de Funès', 'Louis de Funès, de son nom complet Louis de Funès de Galarza, est un acteur français né le 31 juillet 1914 à Courbevoie et mort le 27 janvier 1983 à Nantes.', 1, 'Indispo', 'Cyberdata'),
(3, 'Bob', 'Lennon', 'Bob Lennon est un vidéaste web, auteur et comédien de doublage français spécialisé dans le jeu vidéo né le 3 avril 1987 à Romans-sur-Isère, dans la Drôme. Il évolue principalement sur les plateformes YouTube et Twitch. Il participe également à des web-séries, dessins animés et émissions, principalement sur YouTube.', NULL, 'Disponible', 'Cyberlog'),
(4, 'Park', 'Chan-wook', 'Park Chan-wook  (born August 23, 1963) is a South Korean film director, screenwriter, producer, and former film critic. One of the most acclaimed and popular filmmakers in the world, Park is best known for his films Joint Security Area (2000), Thirst (2009), The Handmaiden (2016) and what has become known as The Vengeance Trilogy, consisting of Sympathy for Mr. Vengeance (2002), Oldboy (2003) and Lady Vengeance (2005).', NULL, 'Disponible', 'Cyberlog'),
(5, 'Jean-Claude', 'Van Damme', 'Jean-Claude Van Damme, né Jean-Claude Van Vaerenbergh le 18 octobre 1960 à Berchem-Sainte-Agathe, en Belgique, est un acteur, réalisateur, producteur de cinéma et pratiquant d\'arts martiaux belge.', NULL, 'Disponible', 'Cyberdata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
