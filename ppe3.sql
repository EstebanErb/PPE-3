-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mai 2024 à 13:24
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ppe3`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `IdAnnonce` int(11) NOT NULL,
  `NomAnnonce` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`IdAnnonce`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`IdAnnonce`, `NomAnnonce`, `Description`) VALUES
(1, 'Agent d\'entretient', 'Recherche d\'agent d\'entretient'),
(2, 'Développeur', 'Recherche de Développeur'),
(3, 'Cantinier', 'Recherche de cantinier');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numTel` varchar(10) NOT NULL,
  `numEtRue` varchar(255) NOT NULL,
  `ville` text NOT NULL,
  `CP` int(11) NOT NULL,
  `urlCV` varchar(255) NOT NULL,
  `urlLettre` varchar(255) DEFAULT NULL,
  `accepter` tinyint(1) DEFAULT NULL,
  `idAnnonce` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `nom`, `prenom`, `mail`, `numTel`, `numEtRue`, `ville`, `CP`, `urlCV`, `urlLettre`, `accepter`, `idAnnonce`) VALUES
(1, 'Zebulon', 'thomas', 'thomas.lasselin@lycee-pardailhan.fr', '0785648256', '14 rue du chÃªne', 'auch', 32000, '', '', 0, 1),
(2, 'ERB', 'EstÃ©ban', 'esteban@gmail.com', '0782231852', '136 rue nationale', 'Gimont', 32200, '.\\CV\\Rapport d\'activitÃ©.pdf', '.\\lettre\\Rapport d\'activitÃ©.pdf', NULL, 1),
(3, 'ERB', 'EtÃ©ban', 'esteban@gmail.com', '0782231852', '136 rue nationale', 'Gimont', 32200, '.\\CV\\Compte rendu PPE3.pdf', '.\\lettre\\Rapport d\'activitÃ©.pdf', NULL, 2),
(4, 'ERB', 'EtÃ©ban', 'esteban@gmail.com', '0782231852', '136 rue nationale', 'Gimont', 32200, '.\\CV\\Compte rendu PPE3.pdf', '.\\lettre\\Rapport d\'activitÃ©.pdf', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rhadmin`
--

DROP TABLE IF EXISTS `rhadmin`;
CREATE TABLE IF NOT EXISTS `rhadmin` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `numIDEnt` int(10) NOT NULL,
  `hashMdp` varchar(255) NOT NULL,
  PRIMARY KEY (`numIDEnt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rhadmin`
--

INSERT INTO `rhadmin` (`nom`, `prenom`, `numIDEnt`, `hashMdp`) VALUES
('ERB', 'Esteban', 1, 'mdp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
