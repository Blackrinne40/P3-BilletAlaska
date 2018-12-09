-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Décembre 2018 à 09:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `billetalaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reports` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reports`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53', 4),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16', 0),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52', 0),
(4, 2, 'John', 'Preum''s !', '2010-03-27 18:59:49', 0),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu''on ne le pense !', '2010-03-27 22:02:13', 0),
(6, 5, 'Bidule', 'test 119', '2018-11-26 17:23:52', 0),
(7, 4, 'PetitTruc', 'Super chapitre! A quand la suite? ', '2018-11-29 10:56:21', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
