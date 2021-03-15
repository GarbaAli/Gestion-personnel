-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 nov. 2020 à 08:51
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `ID_FICHIER` int(11) NOT NULL,
  `ID_PERSONNEL` int(11) NOT NULL,
  `TITRE` varchar(128) NOT NULL,
  `FILE_URL` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_FICHIER`),
  KEY `I_FK_FICHIER_PERSONNEL` (`ID_PERSONNEL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `ID_PERSONNEL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_POSTE` int(11) NOT NULL,
  `NOM` varchar(128) NOT NULL,
  `PRENOM` varchar(128) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `ORANGE` varchar(15) NOT NULL,
  `MTN` varchar(12) NOT NULL,
  `PHONE_PRO` varchar(128) NOT NULL,
  `CNI` varchar(128) NOT NULL,
  `VILLE_RESIDENCE` varchar(128) NOT NULL,
  `QUARTIER` varchar(128) NOT NULL,
  `DTE_EMBAUCHE` date NOT NULL,
  `CONTRAT` varchar(128) NOT NULL,
  `PERMIS_CONDUIRE` varchar(128) NOT NULL,
  `CONTACT_URGENT` char(32) NOT NULL,
  `NOM_URGENT` varchar(128) NOT NULL,
  `LIEN_PARENTER` varchar(128) NOT NULL,
  `PLAN_LOCALISATION` varchar(128) NOT NULL,
  `ETAT_MATRIMONIAL` varchar(128) NOT NULL,
  `NBRE_ENFANT` varchar(11) NOT NULL,
  `POINTURE` varchar(128) NOT NULL,
  `CV` varchar(128) NOT NULL,
  `FRANCAIS` char(32) NOT NULL,
  `ANGLAIS` char(32) NOT NULL,
  `AUTRE_LANGUE` varchar(128) DEFAULT NULL,
  `ROLE` char(32) NOT NULL,
  PRIMARY KEY (`ID_PERSONNEL`),
  KEY `I_FK_PERSONNEL_POSTE` (`ID_POSTE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`ID_PERSONNEL`, `ID_POSTE`, `NOM`, `PRENOM`, `mdp`, `ORANGE`, `MTN`, `PHONE_PRO`, `CNI`, `VILLE_RESIDENCE`, `QUARTIER`, `DTE_EMBAUCHE`, `CONTRAT`, `PERMIS_CONDUIRE`, `CONTACT_URGENT`, `NOM_URGENT`, `LIEN_PARENTER`, `PLAN_LOCALISATION`, `ETAT_MATRIMONIAL`, `NBRE_ENFANT`, `POINTURE`, `CV`, `FRANCAIS`, `ANGLAIS`, `AUTRE_LANGUE`, `ROLE`) VALUES
(1, 1, 'Madji Ali', 'Garba', 'febeb7a480860e20e3a6580f089c0d0ebe054b53', '690842552', '0', '', '', '', '', '2020-11-10', '', '', '', '', '', '', '', '0', '', '', '', '', NULL, 'admin'),
(2, 6, 'toto', 'tata', '', '12', '12', '', '', '', '', '2020-11-13', '', '', '', '', '', '', '', '0', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `ID_POSTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_POSTE` varchar(128) NOT NULL,
  `create_poste` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_POSTE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`ID_POSTE`, `NOM_POSTE`, `create_poste`) VALUES
(1, 'stagiaire', '2020-11-11 13:03:59'),
(5, 'Informaticien', '2020-11-11 14:47:47'),
(6, 'test', '2020-11-12 11:13:56');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`ID_PERSONNEL`) REFERENCES `personnel` (`ID_PERSONNEL`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`ID_POSTE`) REFERENCES `poste` (`ID_POSTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
