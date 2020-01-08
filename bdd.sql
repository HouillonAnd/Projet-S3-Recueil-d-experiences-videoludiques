-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 08 jan. 2020 à 17:56
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
(37, 36, 10, 10, 20, 10, 10),
(38, 20, 54, 50, 0, 40, 0),
(39, 0, 100, 50, 0, 80, 0),
(40, 0, 100, 50, 0, 80, 0),
(41, 0, 100, 50, 0, 80, 0),
(42, 20, 40, 30, 30, 20, 30),
(43, 0, 100, 0, 0, 50, 0),
(44, 10, 80, 100, 5, 50, 2),
(45, 55, 30, 82, 16, 24, 10),
(46, 12, 72, 90, 33, 71, 5),
(47, 44, 52, 33, 18, 60, 10),
(48, 100, 0, 100, 100, 0, 100),
(49, 100, 0, 100, 100, 0, 100),
(50, 0, 0, 0, 0, 0, 0),
(51, 0, 47, 48, 0, 32, 0),
(52, 0, 32, 82, 0, 20, 74),
(53, 0, 32, 82, 0, 20, 74),
(54, 10, 44, 35, 30, 37, 32);

-- --------------------------------------------------------

--
-- Structure de la table `_S3_Jeu`
--

CREATE TABLE `_S3_Jeu` (
  `id` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `nbPost` int(11) NOT NULL,
  `nonce` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `_S3_Jeu`
--

INSERT INTO `_S3_Jeu` (`id`, `titre`, `nbPost`, `nonce`) VALUES
(1, 'Tetris', 0, 'NULL'),
(3, 'Mariokart', 1, 'NULL'),
(4, 'BO2', 0, 'NULL'),
(795, 'League of Legends', 1, 'NULL'),
(797, 'Pokemon Diamant', 0, 'NULL'),
(798, 'Final Fantasy VII', 0, 'NULL'),
(799, 'Assasin\'s creed', 0, 'NULL'),
(800, 'Fortnite', 1, 'NULL'),
(801, 'Assassin\'s creed 2', 0, 'NULL');

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
(9883, 'user', '2020-01-08 12:17:39', 'patchez Oriana svp ', 795, 'Ce jeux est géniale', 51, 1),
(9884, 'user', '2020-01-08 12:29:35', 'il est assez ragent ', 800, 'chacun ses goûts', 52, 0),
(9886, 'pala', '2020-01-07 23:00:00', 'drift', 3, 'com', 54, 0);

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
('user', 9883);

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
('pala', '27a6c2bb1291ee44b117e89dcf3bb6704e11afc50a3b1148b8b56f58e57b0ad8', 'pal@gmail.com', '2020-01-08 12:55:31', 1),
('user', 'c09060dcc6fe712b57a616388025b573cf7e04c99000f90307e479accf25776a', 'user@gmail.com', '2020-01-08 12:15:28', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `_S3_Jeu`
--
ALTER TABLE `_S3_Jeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=802;

--
-- AUTO_INCREMENT pour la table `_S3_Post`
--
ALTER TABLE `_S3_Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9887;

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
