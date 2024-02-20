-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 20 fév. 2024 à 17:12
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gropec`
--

-- --------------------------------------------------------

--
-- Structure de la table `gpc_bodyweight_score`
--

DROP TABLE IF EXISTS `gpc_bodyweight_score`;
CREATE TABLE IF NOT EXISTS `gpc_bodyweight_score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('push_up','pull_up','plank','handstand','sit_up') COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `reps` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gpc_group`
--

DROP TABLE IF EXISTS `gpc_group`;
CREATE TABLE IF NOT EXISTS `gpc_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gpc_group`
--

INSERT INTO `gpc_group` (`id`, `name`, `code`) VALUES
(9, 'Picsou', 'F0GV2ATW'),
(19, 'Fabrice éboué', 'U19DOJ8T'),
(20, 'Fabrice éboué', 'JKEULBTD');

-- --------------------------------------------------------

--
-- Structure de la table `gpc_running`
--

DROP TABLE IF EXISTS `gpc_running`;
CREATE TABLE IF NOT EXISTS `gpc_running` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` int NOT NULL,
  `distance` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gpc_training`
--

DROP TABLE IF EXISTS `gpc_training`;
CREATE TABLE IF NOT EXISTS `gpc_training` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gpc_user`
--

DROP TABLE IF EXISTS `gpc_user`;
CREATE TABLE IF NOT EXISTS `gpc_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(256) COLLATE utf8mb3_unicode_ci NOT NULL,
  `group_id` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `gpc_user`
--

INSERT INTO `gpc_user` (`id`, `username`, `password`, `group_id`, `created`) VALUES
(19, 'admin', '$2y$10$DFwbRF7wUuUZAX2PimQYgOOdBFWc7KVhA14uYfxClOFXCLyFfh.R.', 20, '2023-12-03 19:57:23'),
(21, 'busnardb', '$2y$10$GeWtwm3Dj5lHfF.Xj8Bxc./4ERIYICHBmnU38PeeckGer62W6ryjG', 9, '2024-02-16 07:48:39'),
(22, '111', '$2y$10$GO6w.InQxZsk4h7jBo3bQ.kXP7AzxTKAu8BlWJ3V2szWYlh.qE0bO', 9, '2024-02-20 15:13:49'),
(23, '112', '$2y$10$cmGUpDLs7UvPLJTBZJtQCOvBJM1fdWsuoUNyneUaSVOqQzeZBJH3m', 9, '2024-02-20 15:16:18'),
(24, '113', '$2y$10$8yrX3U0IzU3WSW/T.kfMf.zaZAiyd7ftKW2KUhTZrq6BH9NJlae7C', 9, '2024-02-20 15:16:58'),
(25, '114', '$2y$10$fSj6x2MUye4TFxQVd4lCbuZK9.RdTMKdDmNAiXYTkIlh03601R2N.', 9, '2024-02-20 15:17:43'),
(26, 'wwwwwwwwwwwwwww', '$2y$10$DU09D9ZSjfcgOZT0YzpmXeoP.QyJaaBxXqD0Iga2C1Rd4AN7GpPDm', 9, '2024-02-20 15:21:18'),
(27, '115', '$2y$10$wgCwKwfb1er4vHQz13N7ZuVCjUj6AS.g6CuwpMwngFMjSghnJ/XYG', NULL, '2024-02-20 15:23:35'),
(28, '116', '$2y$10$8M5ceVwPDBXR.a47a4EhrOpN7U3cirfZQT1wpGgddyCNdyYP.XI9O', NULL, '2024-02-20 15:25:51'),
(29, 'wwwwwwwwwwwwww2', '$2y$10$7JSink8U8XR8wFna0zfUH.9sdBfzjzCzio/DuCHTWdsEL47wN4PqO', 9, '2024-02-20 15:26:18'),
(30, 'wwwwwwwwwwwwww3', '$2y$10$.fwhJpNXOS0vDM/eWin9tuapVqYKSQpC2dW8B/HpKq9YLmIzzH0E2', 9, '2024-02-20 15:27:26'),
(31, 'busnardbb', '$2y$10$Qfrm5Px81FMXoNVLX8L20u/iMVbSPfukh0WUd4GLYmeHiiF02uWny', 19, '2024-02-20 15:27:55');

-- --------------------------------------------------------

--
-- Structure de la table `gpc_version`
--

DROP TABLE IF EXISTS `gpc_version`;
CREATE TABLE IF NOT EXISTS `gpc_version` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gpc_version`
--

INSERT INTO `gpc_version` (`id`, `number`, `date`, `description`) VALUES
(1, '0.1', '2024-01-06 16:02:47', 'Mise en forme App-Connexion-Inscription-Messages d\'alertes '),
(4, '0.2', '2024-01-07 18:05:26', 'Barre de navigation-Sous domaines-Installation possible'),
(5, '0.3', '2024-01-08 19:22:46', 'Version App/Version web avec séparations fonctionnelles-Règlage affichage barre de navigation'),
(6, '0.4', '2024-02-20 16:27:14', 'Réglages bugs visuels-Légère optimisation'),
(7, '0.5', '2024-02-20 16:28:51', 'Optimisation temps de chargement-Réglage des transitions'),
(8, '0.6', '2024-02-20 16:31:44', 'Ajout des groupes (Créer, rejoindre, quitter)-Dates d\'inscriptions');

-- --------------------------------------------------------

--
-- Structure de la table `gpc_weights_score`
--

DROP TABLE IF EXISTS `gpc_weights_score`;
CREATE TABLE IF NOT EXISTS `gpc_weights_score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('bench_press','shoulder_press','squat','bicep_curl','barbel_row','weighted_dip','weighted_pull_up') COLLATE utf8mb4_general_ci NOT NULL,
  `kg` int NOT NULL,
  `reps` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
