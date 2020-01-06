-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 06 jan. 2020 à 10:00
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  7.2.22-1+0~20190902.26+debian8~1.gbpd64eb7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agussolg`
--

-- --------------------------------------------------------

--
-- Structure de la table `_S3_Emotions`
--

CREATE TABLE `_S3_Emotions` (
  `id` int(11) NOT NULL,
  `tristesse` int(11) NOT NULL,
  `joie` int(11) NOT NULL,
  `colere` int(11) NOT NULL,
  `peur` int(11) NOT NULL,
  `surprise` int(11) NOT NULL,
  `degout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_Emotions`
--

INSERT INTO `_S3_Emotions` (`id`, `tristesse`, `joie`, `colere`, `peur`, `surprise`, `degout`) VALUES
(1, 3, 59, 75, 0, 20, 10),
(2, 85, 85, 85, 85, 85, 85),
(3, 55, 55, 55, 55, 55, 55),
(4, 5, 4, 3, 9, 20, 99),
(5, 55, 0, 0, 0, 0, 0),
(6, 55, 8, 5, 10, 10, 0),
(7, 6, 8, 10, 0, 0, 0),
(8, 100, 46, 8, 65, 9, 0),
(9, 20, 100, 90, 99, 0, 0),
(10, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 1, 0, 0),
(12, 0, 0, 0, 1, 0, 0),
(13, 0, 0, 0, 0, 0, 0),
(14, 7, 6, 0, 0, 0, 0),
(15, 10, 1, 0, 1, 0, 0),
(16, 10, 11, 0, 1, 0, 0),
(17, 10, 11, 0, 1, 0, 0),
(18, 10, 11, 0, 1, 0, 0),
(19, 10, 99, 66, 5, 0, 0),
(20, 1, 100, 50, 0, 0, 0),
(21, 10, 99, 66, 5, 0, 0),
(22, 10, 99, 66, 5, 0, 0),
(23, 10, 0, 0, 0, 99, 0),
(24, 100, 51, 94, 50, 50, 100),
(25, 2, 1, 1, 0, 1, 10),
(26, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0),
(28, 50, 60, 30, 10, 80, 5),
(29, 50, 60, 30, 20, 60, 40),
(30, 50, 60, 30, 20, 60, 40),
(31, 0, 50, 40, 45, 30, 10),
(32, 6, 1, 1, 1, 1, 1),
(33, 6, 1, 1, 1, 1, 1),
(34, 6, 1, 1, 1, 1, 1),
(35, 6, 1, 1, 1, 1, 1),
(36, 30, 70, 20, 10, 40, 30),
(37, 10, 10, 10, 20, 10, 10),
(38, 20, 54, 50, 0, 40, 0),
(39, 0, 100, 50, 0, 80, 0),
(40, 0, 100, 50, 0, 80, 0),
(41, 0, 100, 50, 0, 80, 0),
(42, 20, 40, 30, 30, 20, 30);

-- --------------------------------------------------------

--
-- Structure de la table `_S3_Jeu`
--

CREATE TABLE `_S3_Jeu` (
  `id` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `nbPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_Jeu`
--

INSERT INTO `_S3_Jeu` (`id`, `titre`, `nbPost`) VALUES
(1, 'Tetris', 14),
(2, 'Test', 1),
(3, 'mariokart', 5),
(4, 'BO2', 9);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `_S3_Moyennes`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `_S3_Moyennes` (
`id_Jeu` int(11)
,`Moy_Tristesse` decimal(14,4)
,`Moy_Surprise` decimal(14,4)
,`Moy_Peur` decimal(14,4)
,`Moy_Degout` decimal(14,4)
,`Moy_Colere` decimal(14,4)
,`Moy_Joie` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Structure de la table `_S3_Post`
--

CREATE TABLE `_S3_Post` (
  `id` int(11) NOT NULL,
  `auteur_id` varchar(50) NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` longtext NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `emotion_id` int(11) NOT NULL,
  `nbUpvote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_Post`
--

INSERT INTO `_S3_Post` (`id`, `auteur_id`, `date_publication`, `contenu`, `jeu_id`, `titre`, `emotion_id`, `nbUpvote`) VALUES
(32, 'kxlil', '2019-11-20 23:00:00', 'test de modification', 4, 'test', 24, 1),
(33, 'dieu', '2019-12-12 13:56:04', 'J\'adore les zombies j\'ai tenu jusqu\'a manch 22', 4, 'Le zombie ', 31, 0),
(34, 'kxlil', '2019-12-27 16:55:50', 'petit test après modification de la clé primaire des users', 1, 'fornite', 32, 0),
(35, 'kxlil', '2019-12-27 16:57:47', 'petit test après modification de la clé primaire des users', 1, 'fornite', 33, 0),
(36, 'kxlil', '2019-12-27 16:58:10', 'petit test après modification de la clé primaire des users', 1, 'fornite', 34, 0),
(37, 'kxlil', '2019-12-27 16:58:43', 'petit test après modification de la clé primaire des users', 1, 'fornite', 35, 0),
(38, 'pala', '2019-12-28 16:16:29', 'ca va trop vite ', 1, 'Trop de briques ', 37, 0),
(39, 'kxlil', '2019-12-29 23:00:00', 'sfgq', 4, 'lala', 38, 0),
(40, 'kxlil', '2020-01-04 19:15:34', 'c\'est très addictif', 1, 'ce jeu déchire', 40, 0),
(41, 'pala', '2020-01-05 14:55:02', 'vous saviez que les briques ont des noms?', 1, 'Trop de briques ', 42, 1);

--
-- Déclencheurs `_S3_Post`
--
DELIMITER $$
CREATE TRIGGER `tr_add_nbPost` AFTER INSERT ON `_S3_Post` FOR EACH ROW BEGIN
	UPDATE _S3_Jeu 
    SET nbPost=nbPost+1 
    WHERE id=NEW.jeu_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_suppr_nbPost` AFTER DELETE ON `_S3_Post` FOR EACH ROW BEGIN
	UPDATE _S3_Jeu 
    SET nbPost=nbPost-1 
    WHERE id=OLD.jeu_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `_S3_Upvotes`
--

CREATE TABLE `_S3_Upvotes` (
  `user_id` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_Upvotes`
--

INSERT INTO `_S3_Upvotes` (`user_id`, `post_id`) VALUES
('exaf', 32),
('pala', 41);

--
-- Déclencheurs `_S3_Upvotes`
--
DELIMITER $$
CREATE TRIGGER `tr_add_nbUpvote` AFTER INSERT ON `_S3_Upvotes` FOR EACH ROW BEGIN
	UPDATE _S3_Post
    SET nbUpvote=nbUpvote+1 
    WHERE id=NEW.post_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_suppr_nbUpvote` AFTER DELETE ON `_S3_Upvotes` FOR EACH ROW BEGIN
	UPDATE _S3_Post
    SET nbUpvote=nbUpvote-1 
    WHERE id=OLD.post_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `_S3_User`
--

CREATE TABLE `_S3_User` (
  `login` varchar(50) NOT NULL,
  `password` varchar(90) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_enregistrement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_User`
--

INSERT INTO `_S3_User` (`login`, `password`, `email`, `date_enregistrement`, `admin`) VALUES
('dieu', '258e069ae75cc50f2d4596a77141e5e231f068163d871e456838802cd9945981', 'dieu@gmail.com', '2019-11-21 19:12:48', 0),
('exaf', '6b1b18cd33761850b1ba9619ca965445edcbf93a5b0493b76b5d0501740b1023', 'andy.houillon2@gmail.com', '2020-01-04 14:31:59', 1),
('joanye', 'c09060dcc6fe712b57a616388025b573cf7e04c99000f90307e479accf25776a', 'jojo@gmail.com', '2019-11-27 15:30:46', 0),
('kxlil', 'c09060dcc6fe712b57a616388025b573cf7e04c99000f90307e479accf25776a', 'kalil@gmail.com', '2019-12-23 23:28:20', 1),
('nina', 'c09060dcc6fe712b57a616388025b573cf7e04c99000f90307e479accf25776a', 'nina@gmail.com', '2019-12-28 11:42:44', 0),
('pala', 'cb863c1c184e0f6e8831d628a623825516f7127ff4a6a843c2ea57c684a17beb', 'pala@gmail.com', '2019-12-28 14:51:28', 0),
('Rodin', '2abcb3fc517441ee43a08540396967a65041048f1d36de8bc619ac6d4ed05a3d', 'Rodin@gmail.com', '2019-12-12 13:37:01', 0);

-- --------------------------------------------------------

--
-- Structure de la vue `_S3_Moyennes`
--
DROP TABLE IF EXISTS `_S3_Moyennes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agussolg`@`%` SQL SECURITY DEFINER VIEW `_S3_Moyennes`  AS  select `J`.`id` AS `id_Jeu`,avg(`E`.`tristesse`) AS `Moy_Tristesse`,avg(`E`.`surprise`) AS `Moy_Surprise`,avg(`E`.`peur`) AS `Moy_Peur`,avg(`E`.`degout`) AS `Moy_Degout`,avg(`E`.`colere`) AS `Moy_Colere`,avg(`E`.`joie`) AS `Moy_Joie` from ((`_S3_Jeu` `J` join `_S3_Post` `P` on((`P`.`jeu_id` = `J`.`id`))) join `_S3_Emotions` `E` on((`E`.`id` = `P`.`emotion_id`))) group by `J`.`id` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `_S3_Emotions`
--
ALTER TABLE `_S3_Emotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `_S3_Jeu`
--
ALTER TABLE `_S3_Jeu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `_S3_Post`
--
ALTER TABLE `_S3_Post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `jeu_id` (`jeu_id`),
  ADD KEY `emotion_id` (`emotion_id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `_S3_Upvotes`
--
ALTER TABLE `_S3_Upvotes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `_S3_User`
--
ALTER TABLE `_S3_User`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `_S3_Emotions`
--
ALTER TABLE `_S3_Emotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `_S3_Jeu`
--
ALTER TABLE `_S3_Jeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `_S3_Post`
--
ALTER TABLE `_S3_Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `_S3_Post`
--
ALTER TABLE `_S3_Post`
  ADD CONSTRAINT `auteur_id` FOREIGN KEY (`auteur_id`) REFERENCES `_S3_User` (`login`),
  ADD CONSTRAINT `emotion_id` FOREIGN KEY (`emotion_id`) REFERENCES `_S3_Emotions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeu_id` FOREIGN KEY (`jeu_id`) REFERENCES `_S3_Jeu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `_S3_Upvotes`
--
ALTER TABLE `_S3_Upvotes`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `_S3_Post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `_S3_User` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;