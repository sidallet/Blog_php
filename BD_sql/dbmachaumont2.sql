-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 02 Janvier 2022 à 13:32
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbmachaumont2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `login` varchar(25) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`login`, `mdp`) VALUES
('admin', '$2y$10$U///Y6sP0xnBcohGd9HbXOvHMPAk0YG8neBQqdyiErIGlu70sMuUe'),
('NewAdmin', '$2y$10$rQHFr5f3jkuAm8aLrDwMbOAAUysqhtK2kA2XKjvwHedCscniZ0t7e');

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `idNews` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `contenu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Commentaire`
--

INSERT INTO `Commentaire` (`idCommentaire`, `idNews`, `pseudo`, `contenu`) VALUES
(109, 68, 'admin', 'Salut, bon courage'),
(110, 59, 'admin', 'Joyeux noel !'),
(112, 68, 'Toto', 'Bonne année');

-- --------------------------------------------------------

--
-- Structure de la table `News`
--

CREATE TABLE `News` (
  `idNews` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `contenu` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `News`
--

INSERT INTO `News` (`idNews`, `titre`, `contenu`, `date`) VALUES
(59, 'C&#39;est Noël', 'Nono', '2021-12-25'),
(68, 'Rendu du projet', 'Voici une des news du projet', '2022-01-02'),
(69, 'JavaFX', 'Mon [u]projet [/u]sur mario [b]avance[/b] !  [img]https://i.pinimg.com/originals/21/d7/e5/21d7e5f3bb12e33708ffe9943be50280.png[/img]', '2022-01-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `idNews` (`idNews`);

--
-- Index pour la table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`idNews`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT pour la table `News`
--
ALTER TABLE `News`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `Commentaire_ibfk_1` FOREIGN KEY (`idNews`) REFERENCES `News` (`idNews`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
