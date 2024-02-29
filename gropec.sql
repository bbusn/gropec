-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 fév. 2024 à 12:23
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
-- Structure de la table `gpc_group`
--

DROP TABLE IF EXISTS `gpc_group`;
CREATE TABLE IF NOT EXISTS `gpc_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gpc_group`
--

INSERT INTO `gpc_group` (`id`, `name`, `code`) VALUES
(16, 'Zguegos', 'JK48VYLA');

-- --------------------------------------------------------

--
-- Structure de la table `gpc_score_bodyweight`
--

DROP TABLE IF EXISTS `gpc_score_bodyweight`;
CREATE TABLE IF NOT EXISTS `gpc_score_bodyweight` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('push_up','pull_up','plank','handstand','sit_up') COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `reps` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gpc_score_running`
--

DROP TABLE IF EXISTS `gpc_score_running`;
CREATE TABLE IF NOT EXISTS `gpc_score_running` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `distance` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gpc_score_weights`
--

DROP TABLE IF EXISTS `gpc_score_weights`;
CREATE TABLE IF NOT EXISTS `gpc_score_weights` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('bench_press','shoulder_press','squat','bicep_curl','barbel_row','weighted_dip','weighted_pull_up') COLLATE utf8mb4_general_ci NOT NULL,
  `kg` int NOT NULL,
  `reps` int NOT NULL,
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
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `sport` enum('musculation','running','cycling','boxing','calisthenics') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gpc_training`
--

INSERT INTO `gpc_training` (`id`, `user_id`, `date`, `day`, `time`, `sport`) VALUES
(21, 30, '2024-02-29 11:10:53', 'monday', 21, 'cycling'),
(22, 33, '2024-02-29 11:43:10', 'monday', 137, 'musculation'),
(23, 33, '2024-02-29 11:43:14', 'monday', 49, 'running'),
(24, 33, '2024-02-29 11:43:17', 'monday', 165, 'calisthenics'),
(25, 33, '2024-02-29 11:43:33', 'monday', 60, 'boxing');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `gpc_user`
--

INSERT INTO `gpc_user` (`id`, `username`, `password`, `group_id`, `created`) VALUES
(21, 'GazparLeBrakmar', '$2y$10$FhfDvWnhOpowC3Ind3xt0.5jk6jW0vJRvctfxH/8ihrAc/LrEkt/m', NULL, '2024-01-08 06:43:16'),
(22, 'Maxxx', '$2y$10$AK236IbNNB/h6AMrjeOhM.ZnUGmV6svjp5MPw.Joe.Qn4D7oaZHxy', NULL, '2024-01-08 06:58:20'),
(23, 'LeMaitre', '$2y$10$TN.BTZSZK8XFEIv6GsmzZu4Z5ogAj3BeCLvmhazbwXjn4zrcywmRy', NULL, '2024-01-08 10:07:05'),
(25, 'Moumou', '$2y$10$Fp4PH8rORX0sRdCkGx6STuC10JSUkBApBj2V8m6DSolSQ3eONylCC', NULL, '2024-01-20 16:44:11'),
(26, 'm_carron', '$2y$10$GlBkEttP5bKBXMO.TGtMC.WKKxaVY7aElsc1A4o7G1WiJXeNXr8cy', NULL, '2024-01-29 19:53:54'),
(27, 'Nownoch', '$2y$10$kjEU0vByJbgvrS3PyNfn6u3SlQvkY9NLf1W8y0SncfHg7nQoweKE6', NULL, '2024-02-06 08:19:41'),
(29, 'benoit', '$2y$10$BR.tkilPCOCXNVdRTMfW.OsbAoTM7s6fJYose50VcpcuNfyNMmzPS', 16, '2024-02-20 17:45:41'),
(30, 'zgueg', '$2y$10$o/h7m6jerPMOBOaduKHotO1YWhJySl9d4WL6en8FtUO.yWcL3Z6TG', NULL, '2024-02-20 18:57:32'),
(33, 'admin', '$2y$10$9jEffrd9ZptoQlDj1fsuh..42jh.25a7lS4Qn8G.fbqpj/YiJw7uK', NULL, '2024-02-29 11:20:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gpc_version`
--

INSERT INTO `gpc_version` (`id`, `number`, `date`, `description`) VALUES
(1, '0.1', '2024-01-06 16:02:47', 'Mise en forme App-Connexion-Inscription-Messages d\'alertes '),
(4, '0.2', '2024-01-07 18:05:26', 'Barre de navigation-Sous domaines-Installation possible'),
(5, '0.3', '2024-01-08 19:22:46', 'Version App/Version web avec séparations fonctionnelles-Règlage affichage barre de navigation'),
(6, '0.4', '2024-02-20 16:27:14', 'Réglages bugs visuels-Légère optimisation'),
(7, '0.5', '2024-02-20 16:28:51', 'Optimisation temps de chargement-Réglage des transitions'),
(8, '0.6', '2024-02-20 16:31:44', 'Ajout des groupes (Créer, rejoindre, quitter)-Dates d\'inscriptions'),
(9, '0.7', '2024-02-21 19:51:26', 'Ajout de la page d\'accueil-Design de la page ajouter-Design des options de la page profil');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
