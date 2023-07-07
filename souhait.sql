-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 juil. 2023 à 09:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `souhait`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `nom`, `description`) VALUES
(1, 'bouteille de vin', 'Une bouteille de vin raffinée pour accompagner vos repas et célébrations.'),
(2, 'appareil photo', 'Un appareil photo professionnel pour capturer des moments précieux.'),
(3, 'portefeuille', 'Un portefeuille élégant avec de multiples compartiments pour organiser vos cartes et votre argent.'),
(4, 'sac', 'Un sac à dos spacieux et résistant pour vos aventures en plein air.'),
(5, 'rase', 'Un rasoir électrique performant pour une peau lisse et soignée.'),
(6, 'rasoir électrique', 'Un rasoir électrique performant pour une peau lisse et soignée.'),
(7, 'plante verte', 'Une plante verte d\'intérieur pour apporter une touche de nature à votre espace.'),
(8, 'casque audio', 'Un casque audio sans fil pour profiter de votre musique avec une qualité sonore exceptionnelle.'),
(9, 'cafetière', 'Une cafetière automatique pour savourer un délicieux café à tout moment de la journée.'),
(10, 'jouet', 'Un jouet éducatif amusant pour divertir et stimuler l\'imagination des enfants.'),
(11, 'coussin', 'Un coussin doux et confortable pour vous reposer et vous détendre.'),
(12, 'couteau suisse', 'Un couteau polyvalent et compact avec de nombreuses fonctionnalités.'),
(13, 'portefeuille', 'Un portefeuille élégant avec de multiples compartiments pour organiser vos cartes et votre argent.'),
(14, 'rasoir électrique', 'Un rasoir électrique performant pour une peau lisse et soignée.'),
(15, 'carte cadeau', 'Une carte cadeau flexible pour offrir la liberté de choisir.'),
(16, 'jouet', 'Un jouet éducatif amusant pour divertir et stimuler l\'imagination des enfants.'),
(17, 'sac à dos', 'Un sac à dos spacieux et résistant pour vos aventures en plein air.'),
(18, 'voyage', 'Un voyage de rêve dans une destination exotique de votre choix.'),
(19, 'chemise', 'Une chemise de qualité supérieure avec un style intemporel.'),
(20, 'enceinte portable', 'Une enceinte portable pour profiter de votre musique préférée n\'importe où.'),
(21, 'boeuf', 'De la bonne viande'),
(22, 'enveloppes', ''),
(23, 'boite de conserve', 'Pour manger lorsqu\'on est fainéant'),
(24, 'Saint seiya', 'une histoire de grece'),
(25, 'Dragon ball Z', 'Une histoire de boule'),
(26, 'Bleach', 'Une histoire de shinigami'),
(27, 'sabre laser vert', 'pour ceux qui ont une grande maitrise de la force comme moi meme'),
(28, 'sabre laser  bleu', 'pour ceux qui ont plus un penchant pour le combat au sabre laser'),
(29, 'sabre laser violet', 'inventé pour samuel l jackson'),
(30, 'le xwing', 'le meilleur vaisseau de guerre'),
(31, 'bwing', 'vaisseau d armement lourd'),
(32, 'Ywing', 'Bombardier'),
(33, 'le millennium falcon', 'le vaisseau d Han Solo'),
(34, 'tatoine', 'planete qui a vu naitre Anakin'),
(35, 'Coruscant', 'Ou se trouvé l&#039;académie des jedi'),
(36, 'Dagoba', 'Ma planète d&#039;exile'),
(37, 'ps5', 'kkkkk'),
(38, 'tv', 'nouvelle tv 4k'),
(39, 'ps5', 'nouvelle console'),
(40, 'perceuse', 'pour faire des trou'),
(41, 'jeux video', 'pour jouer'),
(42, 'xbox', 'nouvelle console'),
(43, 'poupée', 'jolie poupée'),
(44, 'canapé', 'pour se poser'),
(45, 'tv', 'nouvelle tv 4k'),
(46, 'manette', 'nouvelle manette pour console'),
(47, 'fouet', 'pour mélanger'),
(48, 'assiette', 'pour manger'),
(49, 'fourchette', 'pour manger'),
(50, 'couteau', 'pour découper'),
(51, 'cuillère', 'pour manger'),
(52, 'lit', 'pour bien dormir'),
(53, 'Placard', 'pour ranger'),
(54, 'commode ', 'pour ranger');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idcommentaire` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `utilisateur_idutilisateur` int NOT NULL,
  `listeDeSouhait_idlisteDeSouhait` int NOT NULL,
  PRIMARY KEY (`idcommentaire`),
  KEY `fk_commentaire_utilisateur1_idx` (`utilisateur_idutilisateur`),
  KEY `fk_commentaire_listeDeSouhait1_idx` (`listeDeSouhait_idlisteDeSouhait`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcommentaire`, `description`, `createdAt`, `utilisateur_idutilisateur`, `listeDeSouhait_idlisteDeSouhait`) VALUES
(1, 'Eos porro sed et a. Ea eius enim aut est rem ex dolor eius. Est reprehenderit est fugit et nemo error. Voluptate nihil occaecati amet cupiditate reprehenderit.', '2003-08-13 00:00:00', 2, 20),
(3, 'Quos enim quo neque id. Eligendi sequi repellendus ab et est.', '2011-03-23 00:00:00', 4, 9),
(4, 'Tenetur dicta aut et repudiandae. Pariatur voluptatem voluptatibus officiis rerum sunt provident. Expedita autem dolore sunt ducimus ipsa soluta ratione.', '1973-08-06 00:00:00', 7, 12),
(5, 'Recusandae quos quod asperiores ratione laborum minima. Qui facere sit molestiae labore placeat nihil. Ipsa nihil aut vel non tempore quia.', '1989-09-09 00:00:00', 6, 13),
(6, 'Aut minima aperiam non harum ab. Ducimus quo est sed. Suscipit perspiciatis odio minus.', '1998-02-09 00:00:00', 2, 18),
(7, 'Quia quia et nemo facere odit vero. Cum magni et vel aut. Maiores laudantium et eligendi. Dolores beatae est deserunt ipsam temporibus odio neque.', '1986-01-17 00:00:00', 9, 30),
(8, 'Hic et unde sunt incidunt doloribus vero. Dignissimos impedit aut ea culpa expedita. A explicabo impedit vitae et sequi quasi. Est est quia dolores.', '2015-09-28 00:00:00', 11, 42),
(9, 'Modi ad qui ut. Incidunt velit excepturi laborum voluptates. Sequi laudantium occaecati provident et eaque ipsa ex.', '1989-09-30 00:00:00', 7, 40),
(10, 'Quisquam distinctio est et perspiciatis. Sed ut sunt necessitatibus tempora omnis maxime quaerat. Ea quod nisi eveniet dolorem.', '1994-03-23 00:00:00', 3, 19),
(11, 'Suscipit ut autem deserunt rem. Similique illo minima aut et repudiandae illo repellat. Et nihil aut sed aut ea qui.', '1997-11-02 00:00:00', 7, 24),
(12, 'Sint ut tempore ut cum. Minus fugiat ipsam ut quo beatae molestiae nam. Ullam temporibus perspiciatis possimus eum et eveniet nostrum. Illum non sapiente quaerat et amet ullam voluptas.', '1986-06-11 00:00:00', 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `listedesouhait`
--

DROP TABLE IF EXISTS `listedesouhait`;
CREATE TABLE IF NOT EXISTS `listedesouhait` (
  `idlisteDeSouhait` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `utilisateur_idutilisateur` int NOT NULL,
  PRIMARY KEY (`idlisteDeSouhait`),
  KEY `fk_listeDeSouhait_utilisateur1_idx` (`utilisateur_idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `listedesouhait`
--

INSERT INTO `listedesouhait` (`idlisteDeSouhait`, `nom`, `description`, `createdAt`, `utilisateur_idutilisateur`) VALUES
(1, 'expedita impedit', 'Ab non illum velit temporibus assumenda eum. Culpa id repellat ipsam enim. Reiciendis libero non alias quaerat eveniet. Eum quas voluptas non quo.', '1975-07-09 00:00:00', 3),
(2, 'est id', 'Voluptatum neque dolor qui impedit eligendi magni. Laborum vel illum excepturi et sed atque. Sint hic ut voluptas exercitationem eaque ut neque sequi.', '1987-10-09 00:00:00', 3),
(4, 'iste officia', 'Qui sed rerum quaerat veniam omnis eaque. Distinctio fuga ex eveniet cum soluta. Ratione non libero eaque nesciunt in consectetur aut.', '2010-05-07 00:00:00', 3),
(5, 'inventore omnis', 'Voluptas facilis qui pariatur distinctio deserunt sapiente animi. Ad nobis consequuntur alias qui rerum repellendus. Esse voluptates est ipsum assumenda pariatur eveniet.', '2020-01-06 00:00:00', 3),
(6, 'quos impedit', 'Dolor qui quibusdam eligendi neque aut. Sit amet sed optio sunt. Dolor eos unde similique quis voluptates praesentium.', '2004-11-03 00:00:00', 4),
(7, 'consectetur voluptatibus', 'Qui placeat et tenetur est sint. Odit expedita quas ipsam ex vero praesentium. Necessitatibus sed hic repellat laboriosam consectetur aliquam maiores.', '2016-10-24 00:00:00', 4),
(8, 'provident voluptas', 'Quidem neque sed ut quam omnis cumque. Et esse odio totam dolorem. Commodi voluptas ipsam a animi non. Voluptas quas et est incidunt in eum quidem.', '2021-04-02 00:00:00', 4),
(9, 'sunt id', 'Veniam unde exercitationem similique voluptatibus ipsam ea nulla. Ipsa veritatis neque cum nihil. Neque voluptatem optio quasi rerum totam.', '1972-08-21 00:00:00', 4),
(10, 'facilis cupiditate', 'In vitae ex suscipit aspernatur. Ab sunt dolor sed. Qui qui explicabo et aut ducimus.', '1985-06-02 00:00:00', 4),
(16, 'optio magnam', 'Quasi quia est sequi maiores. Nulla repellendus ullam voluptas itaque aliquid dolor at.', '1983-09-25 00:00:00', 6),
(17, 'autem expedita', 'Sapiente maxime laborum sit beatae asperiores voluptate cupiditate. Harum id ipsum qui id. Ad nihil dignissimos deserunt.', '1984-01-27 00:00:00', 6),
(18, 'architecto maxime', 'Adipisci consequatur et molestiae sequi quia est. Ducimus porro perferendis eaque autem dolorem consequatur ipsum. Recusandae nesciunt repudiandae eligendi eum similique.', '1991-03-19 00:00:00', 6),
(19, 'voluptas cum', 'Quia earum in reiciendis magnam est. Est molestiae non id. Blanditiis ut cum qui architecto placeat. Sequi officia blanditiis et in ullam.', '1975-04-23 00:00:00', 6),
(20, 'quis consectetur', 'Qui qui tenetur eos accusantium ea fugiat nobis. Impedit omnis voluptas sint porro praesentium maiores. Sapiente impedit non quae quis enim ut reiciendis. Numquam velit alias in iste illo.', '1979-07-26 00:00:00', 6),
(21, 'similique dolore', 'Nemo voluptatem qui et in placeat occaecati consequatur cupiditate. Molestiae veritatis at aliquid animi sunt nobis minus repellat. Et iste voluptate dignissimos nihil ipsa aperiam.', '2021-04-10 00:00:00', 7),
(22, 'repellat excepturi', 'Voluptate error eum aut et necessitatibus. Est rerum sint necessitatibus est qui. Doloribus distinctio eum ratione odio dolor corporis et. Vel dolores iste impedit reiciendis odit sed aliquam.', '1992-12-03 00:00:00', 7),
(23, 'at recusandae', 'Sequi qui aliquid consequatur quisquam. Sunt debitis vero et placeat omnis. Laborum nulla aspernatur ut qui eveniet qui.', '1971-03-04 00:00:00', 7),
(24, 'fugit enim', 'Eos quo sunt expedita voluptates in non. Ea rerum aut perferendis. Magnam dolorem accusantium sunt.', '1992-03-24 00:00:00', 7),
(25, 'aspernatur beatae', 'Explicabo omnis eum libero animi facere vel labore. Ut quasi a quaerat tenetur libero. Cumque ut quidem nesciunt odit veritatis.', '1982-07-04 00:00:00', 7),
(26, 'ducimus molestiae', 'Molestiae molestias enim illo sunt magnam reiciendis totam. Ab qui ratione soluta error corrupti. Reprehenderit reprehenderit ex nam incidunt odit temporibus. Et explicabo quia ad officiis et.', '1971-10-29 00:00:00', 8),
(27, 'explicabo quas', 'Illo inventore et omnis nulla vel fugiat. Quo eum quasi quam ut nihil. Quo deleniti laboriosam rerum debitis est consequatur nisi cum.', '2011-07-30 00:00:00', 8),
(28, 'nostrum quibusdam', 'Et similique animi nam itaque ut occaecati eveniet pariatur. Rerum commodi quia aspernatur ea fugiat reprehenderit non. At amet ratione et natus reprehenderit rerum.', '2002-03-10 00:00:00', 8),
(29, 'vero non', 'Qui corporis quisquam quo ullam alias temporibus. Iusto animi occaecati sed est.', '2011-07-13 00:00:00', 8),
(30, 'quis fugiat', 'Velit quae omnis quia saepe tempore rerum. Voluptas sit dolores nobis itaque rerum consequatur nam ab. Non asperiores eum officia et et quam.', '2003-07-15 00:00:00', 8),
(31, 'enim iusto', 'Minima ratione tenetur aspernatur et facilis. Et error consequatur fuga fuga. Delectus voluptas ipsam aliquid molestiae. Enim aspernatur vero cum quo.', '2004-05-09 00:00:00', 9),
(32, 'nihil omnis', 'Incidunt et nihil nobis voluptatem sapiente repudiandae. Non enim qui quia. Et dolore consequatur est tenetur. Hic dolores perferendis quia recusandae voluptatum explicabo accusantium.', '1988-07-12 00:00:00', 9),
(33, 'unde inventore', 'Itaque perferendis rerum necessitatibus dolor. Atque eveniet quia aut quam minima natus non.', '1976-09-21 00:00:00', 9),
(34, 'accusamus inventore', 'Quo eveniet eum voluptate perspiciatis. Illum cupiditate occaecati reiciendis tenetur dolorem. Asperiores assumenda amet enim tenetur nesciunt id. Repellendus quibusdam similique quia molestiae.', '2021-08-17 00:00:00', 9),
(35, 'voluptatem quaerat', 'Officiis aspernatur quis reprehenderit odio et. Blanditiis qui incidunt aut quas non. Pariatur ea omnis rerum blanditiis quam occaecati accusantium.', '1985-03-10 00:00:00', 9),
(36, 'omnis numquam', 'Ducimus ea vel voluptas et non. Magnam porro voluptatem pariatur nisi unde sed explicabo. Autem itaque numquam voluptatibus quam. Quaerat veniam dolorum enim omnis quis.', '2014-07-13 00:00:00', 10),
(37, 'possimus incidunt', 'Illo praesentium necessitatibus laboriosam ut officiis culpa. Mollitia nostrum velit sequi assumenda itaque. Exercitationem qui in eos eius cumque delectus ex.', '2014-05-18 00:00:00', 10),
(38, 'perspiciatis et', 'Sed voluptatem dolorem quis libero. Reprehenderit harum neque voluptatem voluptatum commodi et cumque distinctio. Aut consequatur quo recusandae doloribus vel harum ut.', '1987-09-28 00:00:00', 10),
(39, 'ut totam', 'Qui ducimus dolores provident doloremque odit. Ex eligendi aut enim deserunt aliquam aut qui. Reprehenderit eaque labore vitae.', '2005-07-27 00:00:00', 10),
(40, 'dignissimos suscipit', 'Fugiat dolores impedit officiis quod voluptas a. Voluptas velit ut expedita ea. Architecto ut molestiae veritatis.', '1994-03-11 00:00:00', 10),
(41, 'et nisi', 'Magni cumque autem qui voluptatum fugiat et. In natus qui repellat. Odio similique fugiat dolores.', '2021-05-28 00:00:00', 11),
(42, 'vero veniam', 'Distinctio dolorem et ea excepturi nostrum excepturi. Non illum corporis distinctio aut est omnis. Omnis nostrum consectetur laboriosam eum aut doloribus. Non eum minus ipsum placeat.', '2019-07-11 00:00:00', 11),
(43, 'illum eos', 'Nobis reprehenderit tenetur et ut. Blanditiis nemo suscipit et ut at voluptas. Quia exercitationem esse sit adipisci enim tenetur.', '1983-03-04 00:00:00', 11),
(44, 'omnis quos', 'Voluptatem enim ut eum placeat. Sapiente aperiam culpa ea ut culpa distinctio odio. Ut alias possimus et recusandae blanditiis.', '2000-11-29 00:00:00', 11),
(45, 'ullam perferendis', 'Laborum optio quas cum ullam. Eaque dolor magnam excepturi pariatur. Provident aliquid est iure quas vel enim. Inventore natus accusantium in quis vero ad consequuntur et.', '2012-05-01 00:00:00', 11),
(46, 'eos officia', 'Quia eius blanditiis nostrum distinctio nisi. Rerum fuga consequatur laudantium error in impedit. Quia voluptas quasi iste porro. Qui ut maxime omnis ullam quis alias tempore.', '2008-04-24 00:00:00', 12),
(47, 'assumenda commodi', 'Dolor voluptatem autem pariatur ut debitis non est quis. Ut provident tenetur doloribus recusandae et possimus quibusdam voluptatem. Voluptatem molestias dolorem eos.', '2010-10-02 00:00:00', 12),
(48, 'debitis error', 'Et asperiores nobis dolore voluptas dolore. Harum reprehenderit dolorem in aperiam voluptatem consequuntur qui. Animi accusamus non sunt sed. Perspiciatis non quidem nihil quo officia.', '2011-10-14 00:00:00', 12),
(49, 'excepturi similique', 'Dolores et illo et id. Deserunt beatae temporibus ipsum et. Dolores aut ratione error in reprehenderit.', '1981-04-07 00:00:00', 12),
(50, 'et quam', 'Tempora et temporibus aut alias assumenda aut recusandae. Non fugiat eum molestiae velit quia reprehenderit. Et quis sint quo excepturi. Id consequatur aliquid suscipit delectus maxime et.', '1985-07-23 00:00:00', 12),
(59, 'liste de course', 'different produit', '2023-07-04 22:42:24', 14),
(60, 'liste de manga', 'les meilleurs manga', '2023-07-05 00:39:59', 14),
(61, 'liste de sabre laser', 'les meilleurs sabre laser', '2023-07-05 00:42:19', 15),
(62, 'vaisseau', 'les differents vaisseau de la rebellion', '2023-07-05 11:28:21', 15),
(63, 'planete', 'les planetes de la galaxy', '2023-07-05 14:55:23', 15),
(64, 'nouvelle liste', 'un peu de tout', '2023-07-07 10:30:29', 5),
(65, 'liste de cadeau', 'cadeaux de noel', '2023-07-07 10:46:27', 5),
(66, 'liste de cuisine', 'ustensile de cuisine', '2023-07-07 10:49:13', 5),
(67, 'ameublement', 'liste de meuble', '2023-07-07 10:52:13', 5);

-- --------------------------------------------------------

--
-- Structure de la table `listedesouhait_has_article`
--

DROP TABLE IF EXISTS `listedesouhait_has_article`;
CREATE TABLE IF NOT EXISTS `listedesouhait_has_article` (
  `listeDeSouhait_idlisteDeSouhait` int NOT NULL,
  `article_idarticle` int NOT NULL,
  KEY `fk_listeDeSouhait_has_article_article1_idx` (`article_idarticle`),
  KEY `fk_listeDeSouhait_has_article_listeDeSouhait1_idx` (`listeDeSouhait_idlisteDeSouhait`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `listedesouhait_has_article`
--

INSERT INTO `listedesouhait_has_article` (`listeDeSouhait_idlisteDeSouhait`, `article_idarticle`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 5),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(42, 5),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(43, 5),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(45, 5),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(47, 5),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 5),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(49, 5),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(50, 5),
(59, 21),
(59, 22),
(59, 23),
(60, 24),
(60, 25),
(60, 26),
(61, 27),
(61, 28),
(61, 29),
(62, 30),
(62, 31),
(62, 32),
(62, 33),
(63, 34),
(63, 35),
(63, 36),
(64, 38),
(64, 39),
(64, 40),
(64, 41),
(65, 42),
(65, 43),
(65, 44),
(65, 45),
(65, 46),
(66, 47),
(66, 48),
(66, 49),
(66, 50),
(66, 51),
(67, 52),
(67, 53),
(67, 54);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mp` varchar(100) DEFAULT NULL,
  `role` int DEFAULT NULL,
  `isactive` int DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `email`, `mp`, `role`, `isactive`, `avatar`) VALUES
(2, 'guiche', 'bbbb@hotmail.fr', 'olive', 1, 1, 'https://media.paperblog.fr/i/573/5735705/profil-facebook-L-oKfI73.jpeg'),
(3, 'Daryl Luettgen', 'zmacejkovic@ullrich.net', '?q+]s-hR_f|u{N~xqz{', 1, 1, 'https://cdn.shortpixel.ai/spai/q_lossless+ret_img+to_webp/https://media.label.photo/2021/08/photo-de-profil-en-solo-Martyn.jpg'),
(4, 'Dr. Jamar Wunsch', 'bella77@yahoo.com', '_>SFSybF+3', 1, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRf3gaG_afMvTnj1TyIdJDZwozOwcpCRBwKvg&usqp=CAU'),
(5, 'Ella Daugherty Jr.', 'gladys.gislason@yahoo.com', '$3A82`Gt8', 0, 1, 'https://dragonball.guru/wp-content/uploads/2021/03/goku-profile-e1616173641804-400x400.png'),
(6, 'Mr. Braden DuBuque DVM', 'greenholt.keenan@gmail.com', 'X,*4:UC\"', 1, 1, 'https://kazeistore.files.wordpress.com/2018/09/pile-face3.jpg'),
(7, 'Ceasar Toy', 'ygreenfelder@gmail.com', 'ht[;B}@`gH', 0, 1, 'https://www.mecenavie.com/wp-content/uploads/2019/06/Capture%20d%E2%80%99%C3%A9cran%202019-06-15%20%C3%A0%2000.13.10-950x1024.png'),
(8, 'Maurice Lang Jr.', 'zcrist@boehm.com', 'gl=e\'khk', 1, 1, 'https://previews.123rf.com/images/diddleman/diddleman1204/diddleman120400002/13058158-aucune-photo-de-profil-utilisateur-dessin%C3%A9s-%C3%A0-la-main.jpg'),
(9, 'Joan McGlynn', 'maymie75@gmail.com', ']3zd@%I->4:i8', 1, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnbuos_nsu59u6XEaDEOlIACjYt6e4nHlAT7M-Eut1mHmRUOIcsSC9KMgoNZJQRvWdhbw&usqp=CAU'),
(10, 'Ms. Krystal Daniel DDS', 'shartmann@gmail.com', 'Lw!<[n>rcG*O2', 1, 1, 'https://image.over-blog.com/e1EeqCGM5DX9AEqKiFav_pcnEeM=/filters:no_upscale()/image%2F0980383%2F20210308%2Fob_5c6fde_190728103519296851.png'),
(11, 'Vaughn Hammes I', 'elaina73@gmail.com', '5T8P%!%\'_Fr{BH', 1, 1, 'https://img.freepik.com/photos-gratuite/portrait-profil-belle-jeune-femme-sexy-aux-cheveux-boucles-brune-isole-blanc_186202-9070.jpg?w=2000'),
(12, 'Dr. Maynard Hessel', 'kale04@ebert.com', 'olive', 0, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfUQTyDEtNus3O0IqcxmUDooeTRS4svXGqSg&usqp=CAU'),
(14, 'onizuka', 'colivier972@hotmail.fr', 'olive', 0, 1, 'https://i.pinimg.com/236x/f3/ab/e2/f3abe2b5284430b97b02aa819b896b09.jpg'),
(15, 'yoda', 'dagoba@systeme.com', 'olive', 0, 1, 'https://bdi.dlpdomain.com/ecommerce/secondaire/3701167115695/5/M1600x1600/figurine-yoda-using-the-force-53-cm.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_listeDeSouhait1` FOREIGN KEY (`listeDeSouhait_idlisteDeSouhait`) REFERENCES `listedesouhait` (`idlisteDeSouhait`),
  ADD CONSTRAINT `fk_commentaire_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `listedesouhait`
--
ALTER TABLE `listedesouhait`
  ADD CONSTRAINT `fk_listeDeSouhait_utilisateur1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `listedesouhait_has_article`
--
ALTER TABLE `listedesouhait_has_article`
  ADD CONSTRAINT `fk_listeDeSouhait_has_article_article1` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`),
  ADD CONSTRAINT `fk_listeDeSouhait_has_article_listeDeSouhait1` FOREIGN KEY (`listeDeSouhait_idlisteDeSouhait`) REFERENCES `listedesouhait` (`idlisteDeSouhait`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
