-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 30, 2020 at 06:50 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_status` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_status`, `comment_date`) VALUES
(23, 1, 'Joris', 'Ceci est un extrait des tendances 2019 d\'après l\'etude de Malt.fr', '', '2020-09-01 22:23:27'),
(24, 2, 'Joris', 'Cet extrait vient de Malt.fr', '', '2020-09-01 22:23:47'),
(25, 2, 'Lecteur', 'Très interessant ', '', '2020-09-01 22:24:05'),
(26, 1, 'Lecteur', 'D\'apres l\'article, 6 métiers sur 10 qui existeront en 2030 n’existent pas aujourd’hui', '', '2020-09-01 22:24:53'),
(30, 1, 'test', 'test', '', '2020-10-21 18:20:41'),
(32, 2, 'zzzz', 'zzzz', 'avalider', '2020-11-30 19:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `creation_date`) VALUES
(1, 'Les défis de la transformation digitale', 'L’édition 2019 du Tech Trends s’inscrit dans cette nécessité. En explorant l’activité des freelances et entreprises travaillant ensemble à travers Malt, elle propose de repérer les technologies émergentes, comprendre l’évolution des métiers IT, et anticiper la pénurie des talents. ', 'L’analyse aborde plus précisément :\r\n• Les compétences tech les plus recherchées par les entreprises\r\n• Les métiers IT émergents et leur transformation\r\n• Le marché de l’emploi, les taux journaliers moyens des freelances et les hubs technologiques en France\r\nL’échange global et instantané de l’information a précipité l’évolution des technologies et des marchés. Les innovations sont intégrées rapidement par la concurrence, et leur adoption par les utilisateurs est fulgurante.\r\nCette escalade des possibilités techniques et de leur diffusion entraîne les produits et services dans un renouvellement permanent. Les entreprises doivent réduire leur time to market tout en délivrant de l’excellence, et les experts des métiers IT doivent évoluer en même temps que la technique.\r\n6 métiers sur 10 qui existeront en 2030 n’existent pas aujourd’hui\r\nLa chute du géant américain Blockbuster, autrefois leader incontesté de la location vidéo, fait figure de cas d’école. L’exemple est frappant car en 2000, le CEO de la compagnie a refusé un partenariat avec le tout jeune Netflix. Un changement de paradigme technologique raté a ainsi mis un mastodonte en faillite.\r\n\r\nDe nouveaux changements de fond se présentent aujourd’hui et s’imposent tout au long de ce Tech Trends. Le cloud trouve enfin son essor en France, les Data Sciences rencontrent des usages dans un champ d’application de plus en plus large, et les ponts entre métiers IT sont omniprésents.\r\n\r\nExperts et entreprises doivent détecter ce genre de virages, pour mener ensemble les projets de demain, et ne pas rater le prochain bouleversement du marché. C’est dans cet objectif que nous mesurons, analysons et interprétons l’activité bouillonnante se produisant chaque jour sur Malt, rendant ce Tech Trends possible.', '2020-09-01 16:28:41'),
(2, 'L’avènement des Data Sciences', 'On constate à nouveau ce semestre la montée de plusieurs technologies relatives aux Data Sciences. Python est un langage général, mais sa croissance conjointe à celles de Scikit-Learn, et MATLAB est révélatrice de la tendance.', ' La croissance de TensorFlow témoigne par ailleurs d’une évolution des Data Sciences vers des techniques plus complexes de deep learning.\r\n\r\nL\'augmentation de la puissance de traitement des données ainsi que la démocratisation des méthodes de Machine Learning ont permis de révolutionner des domaines aussi nombreux que variés. Bien sûr, ce phénomène est d\'autant plus perceptible dans les secteurs où les données sont nombreuses et au coeur du business, comme l\'e-commerce, le marketing ou encore la finance. Dans ces domaines, les avancées faites par les Data Sciences sont spectaculaires, notamment dans les techniques de prédictions des comportement clients, de système de fidélisation ou encore de trading haute fréquence. Ces avancées sont en train de se répandre à tous les domaines, alimentées par des produits numériques récoltant continuellement des informations auprès des usagers.', '2017-09-20 16:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`) VALUES
(2, 'jojo', 'jo@gmail', '$2y$10$KiL3Et/8bOolwMxkXvUalu.5T35aIegfuw3a9WGflA4XlNqent.f6'),
(3, 'azerty', 'azerty', '$2y$10$958QT5sS2VLCVJAjtiwq9OE/vXAwkGeou5YGstbJQEDQjXNDz96l.'),
(4, 'eee', 'eee', '$2y$10$caegBV3qwtqMO9yoz9rZpeu62bh8YouxW8whfwX0PlGGV5Dz/UE8u'),
(5, 'Joris', 'joris.reynes81@gmail.com', '$2y$10$CCxT1W5lxZTtfylYVjauc.DfUQyccZV5RPDpQZMfBPqhg2Uuq0dtu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
