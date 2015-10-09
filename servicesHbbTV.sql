-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 30 Septembre 2015 à 13:04
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `servicesHbbTV`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_naiss` date NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `fonction` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `nom`, `prenom`, `date_naiss`, `lieu`, `fonction`) VALUES
(1, 'khalifa', 'passer', 'ndiaye', 'khalifa', '1992-01-01', 'Mekhe', 'admin'),
(2, 'bass', 'passer', 'Ngom', 'Bass', '1993-01-01', 'Thies', 'admin'),
(3, 'woury', 'passer', 'Diallo', 'Mamadou Woury', '1993-01-01', 'Abidjan', 'admin'),
(4, 'kama', 'passer', 'Kama', 'Abdoulaye', '1993-01-01', 'Dakar', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(500) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `details` varchar(500) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `source` varchar(100) NOT NULL,
  `formatter` varchar(250) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vod`
--

CREATE TABLE IF NOT EXISTS `vod` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `src` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `vod`
--

INSERT INTO `vod` (`id`, `title`, `src`, `description`, `video`) VALUES
(8, 'Wadial', 'http://home/khalifa/dwhlp/', 'kobé et maniok badiane', 'Wadial Tabaski épisode 7 du Dimanche 20 septembre 2015.mp4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
