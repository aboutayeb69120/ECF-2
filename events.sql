-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 jan. 2025 à 09:54
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `events`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id_events` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_date` date NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_participant` int NOT NULL,
  `id_location` int NOT NULL,
  PRIMARY KEY (`id_events`),
  KEY `LOCATION` (`id_location`),
  KEY `PARTICIPANT` (`id_participant`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_events`, `event_name`, `event_date`, `description`, `id_participant`, `id_location`) VALUES
(30, 'birthday', '2025-02-01', 'birthday surprise', 10, 1),
(31, 'Réunion', '2025-02-04', 'réunion d\'équipe', 10, 1),
(32, 'Baptême de Lara', '2025-06-21', 'Baptême tah les fous', 15, 1),
(33, 'anniversaire', '2025-01-31', '23 ans', 11, 1),
(34, 'comic con', '2025-01-27', 'zety', 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id_location` int NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `capacity` int NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id_location`, `location_name`, `adress`, `capacity`) VALUES
(1, 'salle de conference', '1 rue des roseraies', 0);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `id_participant` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `statut` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_events` int DEFAULT NULL,
  PRIMARY KEY (`id_participant`),
  KEY `EVENTS` (`id_events`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id_participant`, `name`, `email`, `password`, `statut`, `id_events`) VALUES
(8, 'boutayeb', 'boutayeb.ahlem@outlook.fr', '123456789', '', NULL),
(9, 'thomas', 'thomas@gmail.com', '$2y$10$yFU/f64LBeRy9Bj1qlHFNOCr7OlT2JF0CPm3jzQ/a2kSlwWJXZvpm', '', NULL),
(10, 'ahlem', 'ahlem69@gmail.com', '$2y$10$wxq..CsRR0P9k0KnzVkPA.2/Nm4PSOPGklMHbojBnXNeAgZkyl1Tu', '', NULL),
(11, 'ilias', 'ilias@gmail.com', '$2y$10$r5aERfC9dTACgMmk8fxJ/OuBpiLwkEGPRlMgMEpzjGUQ.AUKxl4sC', '', NULL),
(12, 'Nefer', 'nefer@nefer.com', '$2y$10$d9YOalyqPZNc.O7XpiteBuszmCNaqpNSv5n7dStij.MWSvqFzVGO2', '', NULL),
(13, 'samy', 'mechiche.samysm@gmail.com', '$2y$10$XPy2PyC6EOjSn.tyDM7cdOvQrD9hb1795L4HGvmp3DksafKwyKoq2', '', NULL),
(14, 'blop', 'elmaster@gmail.com', '$2y$10$FT6agNABnaUc7/6m.ilDbO3LfwTiy.pSguNRX.Lk7U4qPZeA4IjkC', '', NULL),
(15, 'Mel00w', 'mel00w.tv@gmail.com', '$2y$10$nxoZZ2J7SIn/T24iiOjjB.xNYh5xCTV1bhDH/W5Xjqx5B/ZDYpdh2', '', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id_events`) REFERENCES `events` (`id_events`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
