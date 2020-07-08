-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 juil. 2020 à 16:06
-- Version du serveur :  8.0.20-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogTest`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `publication_time` datetime NOT NULL,
  `publie` tinyint NOT NULL,
  `path_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `publication_time`, `publie`, `path_img`) VALUES
(1, 'Etre ou ne pas etre ?', 'Snowsdy', 'Un truc de ouf cette question !!! On s\'y perds rien que d\'y penser !!! :)', '2020-07-03 00:04:00', 0, 'admin/upload/example.jpeg'),
(2, 'C\'est un test !', 'Snowsdy', 'C\'est l\'histoire d\'un abruti qui passe ses nuits à coder comme un fou pour parvenir à ses fins :)', '2020-07-03 10:30:14', 0, 'admin/upload/image2.jpeg'),
(3, 'Une petite Histoire', 'Snowsdy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque sem est, et facilisis arcu auctor sed. Proin enim lectus, convallis vel convallis sed, interdum a dolor. Nullam pulvinar sem eu scelerisque placerat. Phasellus porttitor elit vitae mi sollicitudin iaculis. Morbi accumsan sed urna eu tempus. Praesent id augue risus. Vivamus at arcu vitae mauris ullamcorper blandit sit amet eu purus. Sed iaculis diam eu porttitor gravida. Fusce diam ex, hendrerit sed rhoncus nec, mattis eget mi. Vivamus vitae nulla lectus. Fusce faucibus dui in odio tempus, at tincidunt mi tempor. Mauris lorem augue, porta nec massa condimentum, ornare facilisis massa. Pellentesque feugiat pretium dolor, sed laoreet lectus. Nunc mattis dignissim urna vel venenatis. Aliquam ultricies, justo quis pretium sollicitudin, odio nisi fermentum massa, id vehicula massa mi a nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor ex eu libero scelerisque tempor. Integer laoreet pulvinar lorem, sit amet eleifend libero vehicula vitae. Ut vitae sem vulputate, ultricies metus ac, tincidunt lacus. Praesent auctor sapien a neque bibendum vulputate. Proin feugiat massa ac tortor euismod, vel eleifend quam placerat. Mauris consectetur at lectus a maximus. Nullam sed mi commodo, rhoncus mi vel, suscipit nibh. Quisque vel semper risus. In interdum convallis blandit. ', '2020-07-03 11:09:32', 0, 'admin/upload/image3.jpeg'),
(4, 'Animal Crossing : Dangeureux pour votre entourage ainsi que vous-même', 'Snowsdy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque sem est, et facilisis arcu auctor sed. Proin enim lectus, convallis vel convallis sed, interdum a dolor. Nullam pulvinar sem eu scelerisque placerat. Phasellus porttitor elit vitae mi sollicitudin iaculis. Morbi accumsan sed urna eu tempus. Praesent id augue risus. Vivamus at arcu vitae mauris ullamcorper blandit sit amet eu purus. Sed iaculis diam eu porttitor gravida. Fusce diam ex, hendrerit sed rhoncus nec, mattis eget mi. Vivamus vitae nulla lectus. Fusce faucibus dui in odio tempus, at tincidunt mi tempor. Mauris lorem augue, porta nec massa condimentum, ornare facilisis massa. Pellentesque feugiat pretium dolor, sed laoreet lectus. Nunc mattis dignissim urna vel venenatis. Aliquam ultricies, justo quis pretium sollicitudin, odio nisi fermentum massa, id vehicula massa mi a nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor ex eu libero scelerisque tempor. Integer laoreet pulvinar lorem, sit amet eleifend libero vehicula vitae. Ut vitae sem vulputate, ultricies metus ac, tincidunt lacus. Praesent auctor sapien a neque bibendum vulputate. Proin feugiat massa ac tortor euismod, vel eleifend quam placerat. Mauris consectetur at lectus a maximus. Nullam sed mi commodo, rhoncus mi vel, suscipit nibh. Quisque vel semper risus. In interdum convallis blandit. ', '2020-07-03 11:12:42', 0, 'admin/upload/image4.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `idArticle` int NOT NULL,
  `idUser` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `publication_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` tinyint NOT NULL,
  `creation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `pseudo`, `mdp`, `admin`, `creation_time`) VALUES
(1, 'Cusma', 'Vincenzo', 'shadowss.yt@gmail.com', 'Snowsdy', '$2y$10$M8UTMhc6dx.3x9ewLFGEOOLAtp7Mng0tF5X2uFuNwT/q4r0C2.sD2', 1, '2020-07-08 15:57:22'),
(2, 'Bailleu', 'Evan', 'bailleu.evan@gmail.com', 'darkdevs', '$2y$10$0HRYmTjjZ2Rz6onc7QBtJeQ23ciCXwomDQ8V/y/LiUamTsUVPJt..', 1, '2020-07-08 15:58:00'),
(3, 'Solmon', 'Hugo', 'coba.kalilinux.ru', 'Coba', '$2y$10$ESm/6qwjTteFTD.qEMGxBuXUJR3NHG/ZLTFJby9NFmX7qFeVcPb1.', 0, '2020-07-08 14:34:36'),
(4, 'Alonso', 'Stéphane', 'stef.alonso@gmail.com', 'fanou', '$2y$10$zas.J/vIm7QL380ct14cduRww7gzNmmPvtMk4oWvgJUCgA4NAiwra', 0, '2020-07-08 16:03:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArticle` (`idArticle`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
