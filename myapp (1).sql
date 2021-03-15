-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2020 at 02:48 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `ID_FICHIER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONNEL` int(11) NOT NULL,
  `TITRE` varchar(128) NOT NULL,
  `FILE_URL` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_FICHIER`),
  KEY `I_FK_FICHIER_PERSONNEL` (`ID_PERSONNEL`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fichier`
--

INSERT INTO `fichier` (`ID_FICHIER`, `ID_PERSONNEL`, `TITRE`, `FILE_URL`) VALUES
(6, 7, 'document1', 'certificate.PDF');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `ID_PERSONNEL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_POSTE` int(11) DEFAULT NULL,
  `NOM` varchar(150) DEFAULT NULL,
  `PRENOM` varchar(150) DEFAULT NULL,
  `mdp` varchar(200) DEFAULT NULL,
  `ORANGE` varchar(15) DEFAULT NULL,
  `MTN` varchar(12) DEFAULT NULL,
  `PHONE_PRO` varchar(128) DEFAULT NULL,
  `CNI` varchar(128) DEFAULT NULL,
  `VILLE_RESIDENCE` varchar(128) DEFAULT NULL,
  `QUARTIER` varchar(128) DEFAULT NULL,
  `DTE_EMBAUCHE` datetime DEFAULT current_timestamp(),
  `CONTRAT` varchar(128) DEFAULT NULL,
  `PERMIS_CONDUIRE` varchar(128) DEFAULT NULL,
  `CONTACT_URGENT` varchar(15) DEFAULT NULL,
  `NOM_URGENT` varchar(128) DEFAULT NULL,
  `LIEN_PARENTER` varchar(128) DEFAULT NULL,
  `PLAN_LOCALISATION` varchar(128) DEFAULT NULL,
  `ETAT_MATRIMONIAL` varchar(128) DEFAULT NULL,
  `NBRE_ENFANT` varchar(11) DEFAULT NULL,
  `POINTURE` varchar(128) DEFAULT NULL,
  `CV` varchar(128) DEFAULT NULL,
  `FRANCAIS` varchar(32) DEFAULT NULL,
  `ANGLAIS` varchar(32) DEFAULT NULL,
  `AUTRE_LANGUE` varchar(128) DEFAULT NULL,
  `ROLE` varchar(32) DEFAULT NULL,
  `STATUT` varchar(20) DEFAULT NULL,
  `MATRICULE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONNEL`),
  KEY `I_FK_PERSONNEL_POSTE` (`ID_POSTE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`ID_PERSONNEL`, `ID_POSTE`, `NOM`, `PRENOM`, `mdp`, `ORANGE`, `MTN`, `PHONE_PRO`, `CNI`, `VILLE_RESIDENCE`, `QUARTIER`, `DTE_EMBAUCHE`, `CONTRAT`, `PERMIS_CONDUIRE`, `CONTACT_URGENT`, `NOM_URGENT`, `LIEN_PARENTER`, `PLAN_LOCALISATION`, `ETAT_MATRIMONIAL`, `NBRE_ENFANT`, `POINTURE`, `CV`, `FRANCAIS`, `ANGLAIS`, `AUTRE_LANGUE`, `ROLE`, `STATUT`, `MATRICULE`) VALUES
(7, 5, 'Oumarou', 'Ramadan', 'e46fe04c2110182be955b4230f87e4767d7b8412', '6777777777777', '1111111111', '99999999999999', 'profil2.PNG', 'Douala', 'Deido', '2020-11-18 11:44:10', 'eno.PNG', 'extension nom de domaine.PNG', '55555555555', '55555555555', 'grand', 'profil.PNG', 'mariÃ©(e)', '2', '44', 'localisation.PNG', 'lire', 'lire', '', 'admin', 'Inactif', ''),
(8, 5, 'Talla', 'Yvan', NULL, '232323', '232323', '323232323', 'PHOTOCOPIE CERTIFIEE CONFORME DE CNI DG.pdf', 'douala', 'Village', '2020-11-18 16:50:16', 'certificate.PDF', 'PHOTOCOPIE CERTIFIEE CONFORME DE CNI DG.pdf', '23232323', '23232323', 'ami', 'PHOTOCOPIE CERTIFIEE CONFORME DE CNI DG.pdf', 'celibataire', '0', '33', 'Formation laravel-fr.pdf', 'lire', 'lire', '', NULL, 'actif', '133445454545');

-- --------------------------------------------------------

--
-- Table structure for table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `ID_POSTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_POSTE` varchar(128) NOT NULL,
  `create_poste` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_POSTE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poste`
--

INSERT INTO `poste` (`ID_POSTE`, `NOM_POSTE`, `create_poste`) VALUES
(5, 'Informaticien', '2020-11-11 14:47:47'),
(8, 'secretaire', '2020-11-17 11:36:31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`ID_PERSONNEL`) REFERENCES `personnel` (`ID_PERSONNEL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`ID_POSTE`) REFERENCES `poste` (`ID_POSTE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
