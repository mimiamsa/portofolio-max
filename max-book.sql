-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 02 Mars 2017 à 12:31
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `max-book`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) UNSIGNED NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(3, 'maxallix', '$2y$10$1Bhs7MggR72P4Yr.6eSUvO8hQLW0oo8I.LNoCHtYbDs5LqXP8eZK6');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(12) UNSIGNED NOT NULL,
  `id_projet` int(12) UNSIGNED NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `id_projet`, `url_img`) VALUES
(15, 79, 'kaka.png'),
(16, 79, 'img-proj2- copie.png'),
(17, 2, 'kaka.png'),
(18, 79, 'img-proj2- copie.png');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(12) UNSIGNED NOT NULL,
  `titre` varchar(55) NOT NULL,
  `quote` varchar(160) NOT NULL,
  `txt` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `quote`, `txt`, `cover`) VALUES
(2, 'Titre projet ', 'Integer aliquam dignissim pellentesque. Duis gravida lorem ac maximus rutrum. Quisque elementum felis et purus mollis aliquet.      ', 'Leu quam gravida cursus. Send blandit neque quis libero egestas mattis. Cras ac nibh eu turpis congue pulvinar et id justo. Ut consequat aliquam tincidunt. Aenean luctus orci et ligula fermentum, sed cursus augue porta. Integer aliquam dignissim pellentesque. Duis gravida lorem ac maximus rutrum. Quisque elementum felis et purus mollis aliquet.                                                                        ', 'img3.jpg'),
(79, 'Titre projet ', 'fdsfsd', 'fsdfsd', 'img1.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
