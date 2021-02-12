-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 12 fév. 2021 à 16:23
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
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
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_status`, `comment_date`) VALUES
(53, 21, 'Joris', 'Source\r\n\r\nhttps://www.silicon.fr/developpeurs-10-langages-programmation-apprecies-333211.html', 'valide', '2021-02-09 09:02:52'),
(54, 20, 'Joris', 'Source\r\n\r\nhttps://www.01net.com/actualites/pourquoi-en-langage-informatique-on-utilise-des-0-et-des-1-504619.html', 'valide', '2021-02-09 09:03:43'),
(62, 28, 'Source', 'https://leblogducodeur.fr/pourquoi-apprendre-php/', 'avalider', '2021-02-10 19:02:01'),
(63, 28, 'Joris', 'Commentaire', 'valide', '2021-02-12 16:39:46');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` text,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `creation_date`) VALUES
(20, 'Pourquoi, en langage informatique, on utilise des 0 et des 1 ?', 'En 1938, un étudiant américain, Claude Shannon, est le premier à faire un parallèle entre l\'algèbre booléenne et le fonctionnement des circuits électriques. Le vrai/faux se transforme en 1 : le courant passe, 0 : il ne passe pas. C\'est Shannon qui popularise le terme de bit, et qui, dix ans plus tard, publie Théorie mathématique des communications, fondement de la théorie de l\'information et de notre monde numérique actuel ', 'Parce que c\'est un système simple, qui limite les erreurs. Un “ chiffre informatique ”, appelé bit (pour BInary digiT), ne peut prendre que deux valeurs : 0 et 1. Ce que l\'on peut traduire par deux “ états ” : ouvert/fermé, oui/non, vrai/faux.Dans un ordinateur, qui fonctionne avec de l\'électricité, les 0 et les 1 sont déterminés par la présence ou non d\'un courant. Comme seules deux valeurs sont possibles, on parle de code binaire. Il peut, bien sûr, y avoir des erreurs de transmission : un 0 peut être pris pour un 1, par exemple, et vice versa. Mais il existe des techniques perfectionnées qui permettent de repérer et de corriger de telles erreurs, en ajoutant par exemple des bits de contrôle qui donneront le nombre de 0 et de 1 contenus dans les informations échangées.L\'utilisation du code binaire en informatique est l\'aboutissement d\'une évolution technologique en plusieurs étapes. Dans la deuxième partie du XIXe siècle, George Boole, philosophe et mathématicien anglais épris de logique, travaille sur la compréhension des mécanismes du langage. Il réussit à les traduire sous la forme de symboles mathématiques : il élabore une algèbre binaire, n\'acceptant que vrai et faux comme valeurs, et trois fonctions logiques (Et, Ou, Non), suffisantes pour retracer la démarche de la pensée. La publication de ses travaux en 1854 lui confère la renommée, mais il s\'agit uniquement d\'une recherche théorique.', '2021-02-09 08:51:44'),
(21, 'Développeurs : les 10 langages de programmation les plus appréciés', 'Python devance Java et JavaScript au top des langages les plus populaires auprès des développeurs de la communauté CodinGame.', 'CodinGame, la plateforme d’apprentissage, de tests techniques et de recrutement, a livré son classement 2020 des langages de programmation et frameworks les plus populaires.\r\n\r\nPlus de 21 000 développeurs dans le monde ont participé à l’enquête*, dont 11,5% de femmes cette année (elles étaient 8,7% lors de la précédente édition).\r\n\r\nLa popularité de Python ne se dément pas. En effet, avec 35,97% de réponses en sa faveur, Python est le langage de programmation le plus apprécié des développeurs interrogés.\r\n\r\nAux 3e et 4e places, JavaScript (29,48%) et Java (29,10%) sont au coude-à-coude. C# (24,98%), C++ (24,26%), C (13;15%) et PHP (11,47%) suivent. Bash et Kotlin font également partie du top 10 des langages de programmation les plus populaires, selon la société montpelliéraine.\r\n\r\nPHP est le plus redouté\r\n\r\nMais un langage très apprécié peut aussi être redouté. PHP (25,10%) obtient la palme dans ce domaine. On retrouve également Java (23,93%) et Javascript (21,29%), ou encore, en 9e position, Python (8,39%) parmi les 10 langages de programmation les plus redoutés.\r\n\r\nMalgré tout, Javascript, Java et Python sont, avec C++, les langages les plus connus du panel : plus de la moitié des développeurs interrogés disent savoir coder dans ces langages.\r\nNode.js au top des frameworks\r\n\r\nQu’en est il du côté des frameworks de développement ?\r\n\r\nCe sont Node.js, React et .NETCore que les développeurs déclarent connaître le mieux.', '2021-02-09 09:02:25'),
(28, 'Pourquoi apprendre PHP ?', 'PHP est le langage de programmation web le plus utilisé au monde. 80% des site internet utilisent PHP', 'Pourtant, on entends beaucoup sur internet que PHP est un langage de programmation simplement mauvais. J’ai d’ailleurs écris un article sur le sujet si vous voulez plus de détails\r\n\r\nPour la faire courte, non PHP n’est pas un langage de programmation mauvais. Il as des défauts comme tout les autres langages. Les critiques de PHP proviennent souvent des anciennes versions qui pour le coup étaient extrêmement mal foutues.\r\n\r\nAujourd’hui, PHP est partout. Il n’y à qu’à voir WordPress, le CMS le plus utilisé sur le web. Il dépends intégralement de PHP et des millions de site web utilisent ce CMS quotidiennement.\r\n\r\nPHP as beaucoup d’avantages. C’est un langage simple à apprendre, il est rapide à utiliser et globalement efficace. Nous allons voir ensemble les différentes raisons d’apprendre PHP , surtout si c’est votre premier langage de programmation backend.\r\n\r\nPHP est un langage parfait pour commencer\r\n\r\nPHP est l’amis des débutants\r\n\r\nIl est très facile de commencer PHP, c’est un langage simple et extrêmement compréhensible.\r\n\r\nPHP as été crée dans l’optique d’être simple , en fait, beaucoup de débutants sont capable de créer des site en PHP en copiant des bouts de code ensemble. La syntaxe est très intuitive et il est possible de faire beaucoup de choses en peu de lignes de code\r\n\r\nLa dernière version de PHP c’est à dire la 7 as réglé un bon nombre des reproches que l’on pouvait faire au langage (comme dis plus haut). Cette version est stable et très performante.\r\n\r\nPHP est bien documenté, si vous avez la moindre erreur, vous trouverez des explications sur la doc officielle ou sur des forums en quelques minutes.\r\n\r\nPHP est flexible\r\n\r\nPHP est un langage interprété, c’est à dire que le code n’as pas besoin d’être compilé. Cette particularité lui donne une grande flexibilité et une grande simplicité.\r\n\r\nLes langages interprétés n’ont pas à gérer les problèmes de mémoire ou de pointeurs. Le code est plus simple et globalement beaucoup plus court.\r\n\r\nEnfin, PHP est un langage à typage faible (aussi appelé typage dynamique). Cela signifie que les variables n’ont pas à avoir un type définit à l’avance. Par exemple, vous pouvez créer une variable sans dire que c’est un nombre ou une liste, ce qui simplifie grandement le code.\r\n\r\nLa Scalabilité\r\n\r\nMaintenir le code PHP\r\n\r\nLe code PHP n’est pas le plus simple à maintenir. Surtout le code impératif classique, c’est à dire un code sans programmation orientée objet et sans système tel que le MVC\r\n\r\nLe code PHP n’est pas simple à maintenir de base car c’est un langage interprété très simple, il est donc difficile de traquer les erreurs. \r\n\r\nHeureusement, l’application de techniques de programmation et d’organisation permettent d’avoir un code facile à maintenir car le code est séparé en plusieurs parties facilement décomposable et analysable\r\n\r\nLa vitesse du code PHP\r\n\r\nPHP n’est pas le langage de programmation le plus rapide. Vous allez lire partout sur internet que PHP est lent et que c’est donc un mauvais langage.\r\n\r\nLes personnes qui disent ça ne prennent pas une donnée importante en compte, tout les langages de développement web sont lents et 99% des temps de chargement ne viennent pas de la vitesse du langage mais du temps de téléchargement des pages.\r\n\r\nOui, PHP n’est pas le langage de programmation le plus rapide. Mais pourtant, Facebook l’utilisent pour leur site web, et le site est loin d’être lent.\r\n\r\nIl y a toujours moyen d’optimiser la vitesse du code PHP, notamment en le compilant via HipHop\r\n\r\nLa communauté\r\n\r\nDans un langage de programmation, la communauté est une des choses les plus importantes. Et croyez moi, la communauté de PHP est une des meilleure.\r\n\r\nLorsque vous débutez dans le monde de la programmation, vous vous sentez forcément perdus. Il y a beaucoup de choses que vous ne comprenez pas et vous allez passer des heures à rechercher des choses qui vous sembleront idiotes par la suite\r\n\r\nLa communauté, c’est ce qui va vous sortir de la galère. Si vous avez un soucis, regardez une vidéo sur youtube, lisez un article ou posez une question sur un forum. Discutez avec les autres programmeurs, échangez des idées et apprenez des choses.\r\n\r\nApprendre la programmation seul avec un livre sans jamais échanger avec d’autres programmeurs est une très mauvaise idée. Vous perdez beaucoup d’outils qui pourraient vous sauver la vie.\r\n\r\nVoyons maintenant un peu plus en détails la taille et la présence de la communauté PHP\r\n\r\nLa 3ème plus grande communauté de stack overflow\r\n\r\nStack overflow est le plus grand forum de programmation au monde. Sérieusement, si vous avez un problème, vous avez déjà la réponse sur Stack Overflow.\r\n\r\nSi PHP est la 3ème plus grande communauté, imaginez le nombre de questions et de réponses se trouvant déjà sur le site. Il y a probablement plus de réponses que de développeurs PHP\r\n\r\nLe 5ème langage de programmation le plus populaire sur GitHub\r\n\r\nGithub est le plus grand site de gestion de projets informatique au monde. Des millions de lignes de codes sont stockés sur GitHub.\r\n\r\nPHP est le 5ème langage le plus populaire, ce qui signifie qu’il y a des centaines de milliers de projets PHP développés en Open Source.\r\n\r\nPHP est populaire pour le développement web, c’est un choix solide et ces chiffres nous le montrent.\r\n\r\nLe langage de programmation backend le plus utilisé\r\n\r\nEnfin, PHP est le langage de programmation web le plus utilisé. N’oubliez pas, WordPress et Facebook dépendent de wordpress.\r\n\r\nDes millions voir milliards de site web utilisent PHP. C’est donc le langage le plus adapté à la majorité des besoins. Oui, il existe des langages plus rapides et plus performants, mais PHP est adapté à la majorité des projets\r\n\r\nEn conclusion\r\n\r\nSi vous voulez apprendre la programmation web ou simplement un nouveau langage, PHP est un excellent choix.\r\n\r\nN’oubliez pas, il n’y a pas de langages parfaits. Beaucoup de critiques faites à PHP ne sont plus valables et de toute façon , chaque langage à ses défauts.\r\n\r\nPHP est le langage de développement web le plus utilisé au monde, et il y a une raison derrière ça. C’est le choix de la sécurité et de la fiabilité, pas le langage le plus rapide ou le plus efficace, mais vous pouvez lui faire confiance', '2021-02-10 19:01:28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`) VALUES
(3, 'azerty', 'joris.reynes@protonmail.com', '$2y$10$958QT5sS2VLCVJAjtiwq9OE/vXAwkGeou5YGstbJQEDQjXNDz96l.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_postid` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_postid` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
