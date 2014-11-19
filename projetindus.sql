-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Novembre 2014 à 15:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetindus`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `artistemusique`
--

CREATE TABLE IF NOT EXISTS `artistemusique` (
  `idArtiste` int(11) NOT NULL,
  `hotttness` int(11) NOT NULL,
  `familiarity` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `artistevideo`
--

CREATE TABLE IF NOT EXISTS `artistevideo` (
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecoute`
--

CREATE TABLE IF NOT EXISTS `ecoute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `typeEcoute` varchar(1) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `interactions`
--

CREATE TABLE IF NOT EXISTS `interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateHeure` datetime NOT NULL,
  `type` varchar(64) NOT NULL,
  `idEcoute` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEcoute` (`idEcoute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `note` int(11) NOT NULL,
  `duree` decimal(10,0) NOT NULL,
  `typeItem` tinyint(4) NOT NULL,
  `nbVues` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `itemartiste`
--

CREATE TABLE IF NOT EXISTS `itemartiste` (
  `idItem` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idArtiste`),
  KEY `idItem` (`idItem`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `itemgenre`
--

CREATE TABLE IF NOT EXISTS `itemgenre` (
  `idItem` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idGenre`),
  KEY `idItem` (`idItem`),
  KEY `idGenre` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `itemitem`
--

CREATE TABLE IF NOT EXISTS `itemitem` (
  `idItem` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idAlbum`),
  KEY `idItem` (`idItem`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `itemplaylist`
--

CREATE TABLE IF NOT EXISTS `itemplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idItem`),
  KEY `idPlaylist` (`idPlaylist`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE IF NOT EXISTS `musique` (
  `idItem` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `mode` int(25) NOT NULL,
  `loudness` int(11) NOT NULL,
  `energy` int(11) NOT NULL,
  `hotttness` int(11) NOT NULL,
  `danceability` int(11) NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idArtiste` int(11) DEFAULT NULL,
  `idItem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idArtiste` (`idArtiste`),
  KEY `idItem` (`idItem`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notetagitem`
--

CREATE TABLE IF NOT EXISTS `notetagitem` (
  `note` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idItem`),
  KEY `idTag` (`idTag`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sessionecoute`
--

CREATE TABLE IF NOT EXISTS `sessionecoute` (
  `idSession` int(11) NOT NULL,
  `idEcoute` int(11) NOT NULL,
  PRIMARY KEY (`idSession`,`idEcoute`),
  KEY `idSession` (`idSession`),
  KEY `idEcoute` (`idEcoute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sessionplaylist`
--

CREATE TABLE IF NOT EXISTS `sessionplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idSession`),
  KEY `idPlaylist` (`idPlaylist`),
  KEY `idSession` (`idSession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tagartiste`
--

CREATE TABLE IF NOT EXISTS `tagartiste` (
  `idTag` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idArtiste`),
  KEY `idTag` (`idTag`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tagplaylist`
--

CREATE TABLE IF NOT EXISTS `tagplaylist` (
  `idTag` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idPlaylist`),
  KEY `idTag` (`idTag`),
  KEY `idPlaylist` (`idPlaylist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tagsession`
--

CREATE TABLE IF NOT EXISTS `tagsession` (
  `idTag` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idSession`),
  KEY `idTag` (`idTag`),
  KEY `idSession` (`idSession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `dateInscription` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `pays` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateuramis`
--

CREATE TABLE IF NOT EXISTS `utilisateuramis` (
  `idUtilisateur` int(11) NOT NULL,
  `idUtilisateurAmi` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idUtilisateurAmi`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idUtilisateurAmi` (`idUtilisateurAmi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `idItem` int(11) NOT NULL,
  `description` varchar(25) NOT NULL,
  `qualite` varchar(25) NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `videolangue`
--

CREATE TABLE IF NOT EXISTS `videolangue` (
  `idVideo` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`idVideo`,`idLangue`),
  KEY `idVideo` (`idVideo`),
  KEY `idLangue` (`idLangue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `artistemusique`
--
ALTER TABLE `artistemusique`
  ADD CONSTRAINT `artistemusique_ibfk_1` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `artistevideo`
--
ALTER TABLE `artistevideo`
  ADD CONSTRAINT `artistevideo_ibfk_1` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ecoute`
--
ALTER TABLE `ecoute`
  ADD CONSTRAINT `ecoute_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `interactions_ibfk_1` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemartiste`
--
ALTER TABLE `itemartiste`
  ADD CONSTRAINT `itemartiste_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemartiste_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemgenre`
--
ALTER TABLE `itemgenre`
  ADD CONSTRAINT `itemgenre_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemgenre_ibfk_2` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemitem`
--
ALTER TABLE `itemitem`
  ADD CONSTRAINT `itemitem_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemitem_ibfk_2` FOREIGN KEY (`idAlbum`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemplaylist`
--
ALTER TABLE `itemplaylist`
  ADD CONSTRAINT `itemplaylist_ibfk_1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemplaylist_ibfk_2` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `item_musique` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notetagitem`
--
ALTER TABLE `notetagitem`
  ADD CONSTRAINT `notetagitem_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notetagitem_ibfk_2` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sessionecoute`
--
ALTER TABLE `sessionecoute`
  ADD CONSTRAINT `sessionecoute_ibfk_1` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessionecoute_ibfk_2` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sessionplaylist`
--
ALTER TABLE `sessionplaylist`
  ADD CONSTRAINT `sessionplaylist_ibfk_1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessionplaylist_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tagartiste`
--
ALTER TABLE `tagartiste`
  ADD CONSTRAINT `tagartiste_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagartiste_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tagplaylist`
--
ALTER TABLE `tagplaylist`
  ADD CONSTRAINT `tagplaylist_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagplaylist_ibfk_2` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tagsession`
--
ALTER TABLE `tagsession`
  ADD CONSTRAINT `tagsession_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagsession_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateuramis`
--
ALTER TABLE `utilisateuramis`
  ADD CONSTRAINT `utilisateuramis_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateuramis_ibfk_2` FOREIGN KEY (`idUtilisateurAmi`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `item_video` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `videolangue`
--
ALTER TABLE `videolangue`
  ADD CONSTRAINT `videolangue_ibfk_1` FOREIGN KEY (`idVideo`) REFERENCES `video` (`idItem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videolangue_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
