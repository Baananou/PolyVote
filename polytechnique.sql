-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 09 jan. 2022 à 16:51
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
-- Base de données : `polytechnique`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ajoute_par` int(11) NOT NULL,
  `date_ouv` date NOT NULL,
  `date_ferm` date NOT NULL,
  `titre` text NOT NULL,
  `choix` text NOT NULL,
  `close` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `niveau` varchar(100) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `groupe` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id`, `ajoute_par`, `date_ouv`, `date_ferm`, `titre`, `choix`, `close`, `status`, `niveau`, `filiere`, `groupe`) VALUES
(73, 29, '2022-01-09', '2022-03-16', 'test tes2', '12/12/2022,12/11/2022', 0, 'confirme', '', '', ''),
(74, 45, '2022-01-09', '2022-01-12', 'Vous votez pour qui?', '11/5/2022,12/5/2022', 0, 'confirme', '', '', ''),
(71, 29, '2022-01-09', '2022-01-22', 'Quand vous pouvez passer examen PYTHON?', 'lundi,mardi', 0, 'confirme', '', '', ''),
(75, 29, '2022-01-09', '2022-01-30', 'HEYHEYHEY', 'HEY,HEY', 0, 'confirme', '', '', ''),
(72, 29, '2022-01-09', '2022-01-15', 'test test', '10/05/2022,03/08/2022', 0, 'confirme', '', '', ''),
(70, 29, '2022-01-09', '2022-01-14', 'Vous votez pour qui?', 'ameny,foulen', 0, 'confirme', '', '', ''),
(69, 29, '2022-01-09', '2022-02-12', 'Quand vous pouvez passer examen PYTHON?', 'LUNDI,MARDI', 0, 'confirme', '', '', ''),
(67, 29, '2022-01-09', '2022-12-12', 'Vous votez pour qui?', '1,2', 0, 'confirme', '', '', ''),
(68, 29, '2022-01-09', '2022-01-12', 'Qui choisissez vous comme deleguÃ© du classe?', 'FOULEN,AMENY', 0, 'confirme', '', '', ''),
(66, 29, '2022-01-09', '2022-01-28', 'Qui choisissez vous comme deleguÃ© du classe?', 'ameny,foulen', 0, 'confirme', '', '', ''),
(76, 54, '2022-01-09', '2022-05-11', 'test test', 'hhhh,pmpm', 0, 'confirme', '3', 'info', '1'),
(77, 29, '2022-01-09', '2022-01-22', 'test', '12/5/2022,12/5/2022', 0, 'confirme', '3', 'info', '2'),
(78, 54, '2022-01-09', '2022-05-03', 'Best club 2021', 'mmmmm,mmmppppk', 0, 'en attente', '3', 'info', '1'),
(79, 45, '2022-01-09', '2022-12-12', 'test', '12-01-2022,11/5/2022', 0, 'en attente', '3', 'info', '3');

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

DROP TABLE IF EXISTS `codes`;
CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `expire` (`expire`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(30, 'ameny.elokb@polytechnicien.tn', '53379', 1641743091),
(29, 'ameny.elokb@polytechnicien.tn', '61143', 1641743076),
(28, 'ameny.elokb@polytechnicien.tn', '92637', 1641743022),
(27, 'ameny.elokb@polytechnicien.tn', '35891', 1641742893);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `emetteur` int(11) NOT NULL,
  `recepteur` varchar(255) NOT NULL,
  `id_cand` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `titre`, `sujet`, `emetteur`, `recepteur`, `id_cand`) VALUES
(43, 'Nouvelle candidature', 'Le/La candidat(e) welid wg a ajoutÃ© une nouvelle candidture sous le titre Best club 2021 avec les choix mmmmm,mmmppppk et attends votre validation', 54, 'admin', 78),
(44, 'Nouvelle candidature', 'Le/La candidat(e) Ameny a ajoutÃ© une nouvelle candidture sous le titre test avec les choix 12-01-2022,11/5/2022 et attends votre validation', 45, 'admin', 77);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cond` int(11) NOT NULL,
  `nom_choix` varchar(60) NOT NULL,
  `resultat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ch` (`id_cond`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`id`, `id_cond`, `nom_choix`, `resultat`) VALUES
(54, 71, 'mardi', 1),
(53, 73, '12/11/2022', 1),
(52, 72, '10/05/2022', 1),
(51, 73, '12/12/2022', 1),
(50, 67, '2', 1),
(49, 66, 'foulen', 2),
(48, 68, 'AMENY', 2),
(47, 67, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `niveau` text NOT NULL,
  `filiere` text NOT NULL,
  `groupe` int(11) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `nom`, `type`, `password`, `niveau`, `filiere`, `groupe`, `avatar`) VALUES
(29, 'ameny.elokb3@polytechnicien.tn', 'Ameny okb', 'candidat', 'e10adc3949ba59abbe56e057f20f883e', '3', 'info', 2, './image/3082b9534376484397ec541fbfd6b7b1user.png'),
(28, 'amenyelokb@polytechnicien.tn', 'ameny_elokb', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '4', '', 0, ''),
(50, 'amenyelokb3L@polytechnicien.tn', 'ameny elokb', 'voteur', 'e10adc3949ba59abbe56e057f20f883e', '1', 'EA', 2, './image/5ba1b91e388b1723e7892204fcea5bdc3082b9534376484397ec541fbfd6b7b1user.png'),
(45, 'ameny.elokb@polytechnicien.tn', 'Ameny', 'candidat', 'fcea920f7412b5da7be0cf42b8c93759', '3', 'info', 3, './image/900b41a5358820ced3930c2731ae8dadback8.jpg'),
(52, 'mohamedyessine.baananou@polytechnicien.tn', 'Med Yessine Baananou', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3', 'info', 2, ''),
(47, 'ameny.Elokb1@polytechnicien.tn', 'elokb ameny', 'candidat', 'e10adc3949ba59abbe56e057f20f883e', '2', 'info', 2, ''),
(48, 'amenyelokb33@polytechnicien.tn', 'ameny elokb', 'candidat', '25d55ad283aa400af464c76d713c07ad', '1', 'EA', 1, ''),
(49, 'amenyelokbA1@polytechnicien.tn', 'ameny elokb', 'voteur', 'fcea920f7412b5da7be0cf42b8c93759', '2', 'info', 2, './image/158d81e9532be8ff60d7d103e5d529c3starry_sky_milky_way_night_124665_3840x2400.jpg'),
(51, 'amenyelokbb@polytechnicien.tn', 'ameny elokb', 'voteur', 'e10adc3949ba59abbe56e057f20f883e', '2', 'info', 2, './image/f2e462cefe75e82fad86c46ae872338c3082b9534376484397ec541fbfd6b7b1user.png'),
(53, 'amenyelokb22@polytechnicien.tn', 'ameny_elokb', 'candidat', 'e10adc3949ba59abbe56e057f20f883e', '2', 'info', 4, './image/b259f29d64ee8821938e0d0d77ce2ddd3082b9534376484397ec541fbfd6b7b1user.png'),
(54, 'walid.gueddari@polytechnicien.tn', 'welid wg', 'candidat', '77776548ec3f1d7611e074120cf3008d', '3', 'info', 1, './image/e59069a13c67f4675e1df370d21e7a8aimage_7.png');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cond` int(11) NOT NULL,
  `id_voteur` int(11) NOT NULL,
  `dateVote` date NOT NULL,
  `Nomchoix` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cond` (`id_cond`),
  KEY `fk_vote` (`id_voteur`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id`, `id_cond`, `id_voteur`, `dateVote`, `Nomchoix`) VALUES
(110, 71, 45, '2022-01-09', 'mardi'),
(109, 73, 45, '2022-01-09', '12/11/2022'),
(108, 72, 29, '2022-01-09', '10/05/2022'),
(107, 73, 29, '2022-01-09', '12/12/2022'),
(106, 66, 29, '2022-01-09', 'ameny'),
(105, 68, 29, '2022-01-09', 'FOULEN'),
(104, 67, 29, '2022-01-09', '2'),
(103, 66, 50, '2022-01-09', 'foulen'),
(102, 68, 50, '2022-01-09', 'AMENY'),
(101, 67, 50, '2022-01-09', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
