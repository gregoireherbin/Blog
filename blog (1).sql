-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 juil. 2021 à 12:19
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(6, 2, 'Zozo l\'haricot', 'Quelle belle journée !', '2021-06-10 15:49:44'),
(7, 1, '', 'Commentaires', '2021-06-10 15:50:33'),
(8, 1, '', 'Commentaires', '2021-06-10 15:52:11'),
(9, 1, 'Zozo l\'haricot', 'qsdqsdsd', '2021-06-10 15:52:56'),
(10, 1, 'Zozo l\'haricot', 'Commentaires', '2021-06-10 15:53:44'),
(11, 2, 'Gertrude', 'J\'ai faim !!!', '2021-06-10 15:56:23'),
(12, 2, 'Gertrude', 'J\'ai faim !!!', '2021-06-10 16:02:25'),
(13, 2, 'Bob l\'éponge', 'Bouawardf\r\n', '2021-06-10 16:02:47'),
(14, 1, 'Zorro', 'Un cavalier qui surgit', '2021-06-10 16:03:14'),
(15, 2, 'Gustave', 'Il fait bien beau ce soir.\r\n', '2021-06-12 19:43:33'),
(16, 2, '', '', '2021-06-12 21:28:41'),
(17, 2, 'Pierre', 'Je ne vous jette pas la pierre Pierre...', '2021-06-12 21:30:06'),
(18, 1, '&lt;strong&gt;Jo l\'Indien&lt;/strong&gt;', 'coucou', '2021-06-15 19:30:00'),
(19, 1, 'Pierre PERRET', 'Ouvrez la cage aux oiseaux', '2021-06-15 20:01:06'),
(20, 1, 'Joséphine', 'tac tac tic', '2021-06-15 20:24:07'),
(21, 10, 'Mike', 'Super jeu !!!', '2021-06-21 16:29:44'),
(24, 20, 'Bill Gates', 'Vive windows !', '2021-06-21 19:38:12'),
(25, 20, 'Steve Jobs', 'Apple vaincra !', '2021-06-21 19:38:41'),
(26, 1, 'Herni IV', 'Je me ballade dans le jardin', '2021-06-21 19:39:36'),
(27, 1, '', '', '2021-06-28 16:56:01'),
(28, 1, '', '', '2021-06-28 16:56:04'),
(29, 1, '', '', '2021-06-28 16:56:07'),
(30, 1, '', '', '2021-06-28 16:56:08'),
(31, 10, 'Jason', 'Enfin depuis le temps que je l\'attendais !', '2021-06-30 16:25:34'),
(32, 20, 'Raymond', 'C\'est un bien beau site que v\'la !', '2021-07-06 16:00:56'),
(33, 10, 'qsdqsd', 'qsdqsd', '2021-07-06 16:09:00'),
(34, 20, '', '', '2021-07-06 16:11:47'),
(35, 20, '', '', '2021-07-06 16:11:50'),
(36, 10, 'Zorro', 'un cavalier qui surgit hors de la nuit...', '2021-07-11 17:05:48'),
(37, 10, 'Zorro', 'un cavalier qui surgit hors de la nuit...', '2021-07-11 17:10:00'),
(38, 10, 'Zorro', 'un cavalier qui surgit hors de la nuit...', '2021-07-11 17:10:29'),
(39, 1, 'Bernard', '654321', '2021-07-14 16:18:35'),
(40, 1, 'Zorro', '654654654', '2021-07-14 16:23:30'),
(41, 1, 'zezette', 'c\'est beau', '2021-07-14 16:32:06'),
(42, 2, 'Astrid', 'Il fait beau ce soir', '2021-07-14 16:40:21'),
(43, 23, 'Davy Crocket', 'Ca me ferait un beau chapeau !', '2021-07-14 16:54:08'),
(44, 22, 'Chat Botté', 'miaou', '2021-07-14 20:24:09'),
(45, 2, 'mlkmlk', '65464654', '2021-07-14 20:28:50'),
(46, 2, 'mlkmlk', '65464654', '2021-07-14 20:33:24'),
(47, 22, 'Bernard', '65464654', '2021-07-14 20:33:45'),
(48, 23, 'raccoon', '65465465', '2021-07-14 20:35:25');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'melozy', '$2y$10$f1klni0/GCjtJiOEkoak2uY.kGa6PAjhaG9fi3Oz.g7MHxKTrB6be', 'melozy@free.fr', '2021-06-24'),
(2, 'Jean de Florette', '$2y$10$fJQ/XLon4ng.T.kJ06cBSeUVCMDcXk.cRN7X6T8yyI7zJNIuSjHBe', 'jean@deflorette.com', '2021-06-26'),
(3, 'Dédé la Saumure', '$2y$10$qKC0H0XD0dMar5RlWSbj8.BM17y9zMAP/0dFLcYY5vOLXFNy9uura', 'dede@free.fr', '2021-06-26'),
(4, 'Maurice', '$2y$10$qE6nlgnKLl1tENE9f4g8IO/v1Nox7OrxCmf/fL5KvhTaxekayqZRS', 'momo@lafripouille.fr', '2021-06-26'),
(5, 'Jean-René', '$2y$10$oUNGXewFZJ80gC43hLsH/e4sF4L12Bl3QMAR9RR4/Z7XQwdYiivW6', 'jean@rene.com', '2021-07-06'),
(6, 'Marco POLO', '$2y$10$R7r6Zg44JW1mLJfI.qIp/.4jDOy7ZWCWuFAj5JGPkkgf.JdoEoth2', 'marco@usa.com', '2021-07-06'),
(7, 'Kevin', '$2y$10$I7wyctQzO.KfsIvsu4MTHeAm2yzjKlauyMSNJxRryGpRPVKuZFsxm', 'kevin@lilian.fr', '2021-07-06'),
(8, 'Bernard', '$2y$10$hGUr4iTB53XCdygzPCEHyOHpRzw51gcj5.YjXjoOYtm/K1dFI9EuW', 'test@bernard.com', '2021-07-06'),
(9, 'François', '$2y$10$gY5UkGcTa5T3a6tbezDWIOMiLChR0fZg6PnOPtT5CuMovnkajJkxO', 'francois@lefrancais.fr', '2021-07-06');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `picture`, `content`, `creation_date`) VALUES
(1, 'les Boubous sont partout', 'mario.jpg', 'Le bouledogue ou bouledogue français est une race canine de la famille des molosses qui apparut d\'abord en Orient avec le molosse de Sumer, et dont les principales caractéristiques sont un crâne brachycéphale, un corps trapu et court près du sol, des babines pendantes et une imposante musculature', '2021-07-07 16:39:52'),
(2, 'Le PHP à la conquête du monde !', 'php.jpg', 'PHP: Hypertext Preprocessor, plus connu sous son sigle PHP, est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant également fonctionner comme n\'importe quel langage interprété de façon locale. ', '2021-06-21 15:52:57'),
(10, 'Cyberpunk 2077', 'cyberpunk.png', 'Cyberpunk 2077 est un jeu vidéo d\'action-RPG en vue à la première personne développé par CD Projekt RED, fondé sur la série de jeu de rôle sur table Cyberpunk 2020 conçue par Mike Pondsmuith.', '2021-07-02 23:32:34'),
(20, 'Pourquoi le choix de la pomme en tant que logo Apple ?', 'apple.jpg', 'Le tout premier logo de Apple représente le célèbre mathématicien Isaac Newton appuyé contre un pommier. Ce dernier aurait eu une révélation sur la gravitation universelle lorsqu\'une pomme lui serait tombée sur la tête. Ce logo fut dessiné par Ronald Wayne. Début 1977, Rob Janoff dessine la fameuse pomme croquée.', '2021-06-21 16:20:18'),
(21, 'La guitare', 'guitare.jpg', 'La guitare est un instrument à cordes pincées. Les cordes sont disposées parallèlement à la table d\'harmonie et au manche, généralement coupé de frettes, sur lesquelles on appuie les cordes, d\'une main, pour produire des notes différentes. L\'autre main pince les cordes, soit avec les ongles et le bout des doigts, soit avec un plectre (ou médiator). La guitare a le plus souvent six cordes.\r\n\r\nLa guitare est la version européenne la plus courante de la catégorie organologique des luth-boîte à manche. Elle se différencie des instruments similaires (balalaïka, bouzouki, charango, luth, mandoline, oud, théorbe, ukulele) principalement par sa forme, et secondairement par le nombre de cordes et leur accord le plus habituel. Des variantes de guitare sont appelées, régionalement, par des noms particuliers : viola, violão, cavaco et cavaquinho (Brésil) ; tiple et requinto (Amérique latine)…', '2021-07-07 17:29:03'),
(22, 'Chat alors !', 'chat.jpg', 'Le Chat domestique est la sous-espèce issue de la domestication du Chat sauvage, mammifère carnivore de la famille des Félidés. Il est l’un des principaux animaux de compagnie et compte aujourd’hui une cinquantaine de races différentes reconnues par les instances de certification.', '2021-07-08 00:06:33'),
(23, 'le Racoon', 'racoon.jpg', 'Le raton laveur, ou plus exactement le raton laveur commun, est une espèce de mammifères omnivores de l\'ordre des carnivores. Originaire d’Amérique du Nord, cette espèce a été introduite pour la dernière fois en Europe dans les années 1930.', '2021-07-08 00:11:06'),
(25, 'la pêche ', 'pêche.jpg', 'La pêche sportive est un type de pêche pratiqué par des personnes en possession d\'une licence sportive, qui a pour objectif le plaisir de la pratique dans la compétition ou non, et éventuellement la consommation de ses prises. Ces dernières sont interdites à la vente en France et en Belgique.', '2021-07-08 17:07:36'),
(26, 'La peinture', 'peinture.jpg', 'Les premières peintures connues à ce jour sont les peintures rupestres. On trouve des peintures rupestres partout dans le monde: en Afrique, en Eurasie, en Australie, comme sur le continent américain - y compris en Océanie. Les plus anciennes du monde, celles de Maros (Célèbes, Indonésie) ont été datées de 40 000 ans1. Les plus anciennes d\'Europe datent d\'environ quarante à trente mille ans avant notre ère et se trouvent dans la grotte de Sainte-Eulalie (El Castillon, Espagne, datées de 40 800 ans) et dans la grotte Chauvet (France, datées de 32 000 ans).', '2021-07-09 00:57:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
