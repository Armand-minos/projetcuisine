-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 déc. 2024 à 13:02
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recette`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliments`
--

DROP TABLE IF EXISTS `aliments`;
CREATE TABLE IF NOT EXISTS `aliments` (
  `id_aliments` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_aliments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `id_recettes` int NOT NULL,
  `date_publication` date NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_recettes` (`id_recettes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `mail`, `commentaire`, `Date`) VALUES
(1, 'armand@gmail.com', 'salut', '2024-12-09'),
(2, 'armand.moisan08@gmail.com', 'salut', '2024-12-09'),
(3, 'wolgrey08@gmail.com', 'coucou', '0000-00-00'),
(4, 'wolgrey08@gmail.com', 'coucou', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `id_continents` int NOT NULL AUTO_INCREMENT,
  `continents` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_continents`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id_continents`, `continents`, `pays`) VALUES
(12, 'Europe', 'France'),
(13, 'Amérique du nord', 'Etats Unis'),
(14, 'Afrique', 'Maroc'),
(15, 'Afrique', 'Algérie'),
(16, 'Europe', 'Allemagne'),
(17, 'Europe', 'Italie'),
(18, 'Europe', 'Espagne'),
(19, 'Europe', 'Angleterre'),
(20, 'Europe', 'Belgique'),
(21, 'Amérique du nord', 'Canada'),
(22, 'Asie', 'Chine'),
(23, 'Asie', 'Japon'),
(24, 'Asie', 'Inde'),
(25, 'Amérique du nord', 'Méxique');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `id_description` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_description`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`id_description`, `nom`) VALUES
(1, 'plat'),
(2, 'Dessert'),
(3, 'Entrée'),
(4, 'Salade'),
(5, 'Soupe'),
(6, 'Amuse bouche');

-- --------------------------------------------------------

--
-- Structure de la table `difficultes`
--

DROP TABLE IF EXISTS `difficultes`;
CREATE TABLE IF NOT EXISTS `difficultes` (
  `id_difficultes` int NOT NULL AUTO_INCREMENT,
  `difficultes_nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_difficultes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `difficultes`
--

INSERT INTO `difficultes` (`id_difficultes`, `difficultes_nom`) VALUES
(1, 'débutant'),
(2, 'intermédiaire'),
(3, 'expert');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id_evaluation` int NOT NULL AUTO_INCREMENT,
  `id_recette` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `note` int NOT NULL,
  `id_com` int DEFAULT NULL,
  `date_publication` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_evaluation`),
  KEY `id_recette` (`id_recette`)
) ;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_images` int NOT NULL AUTO_INCREMENT,
  `nom_images` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_images`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_images`, `nom_images`, `image_url`) VALUES
(1, 'cassoulet', 'C:wamp64wwwprojet-1\recette phpimages\\cassoulet.jpeg'),
(2, 'couscous', 'C:wamp64wwwprojet-1\recette phpimages\\couscous.jpg'),
(3, 'spaghetti', 'C:wamp64wwwprojet-1\recette phpimages\\spaghetti.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id_ingredient` int NOT NULL AUTO_INCREMENT,
  `ingredient_nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `ingredient_nom`) VALUES
(1, 'Tomates'),
(2, 'Oignons'),
(3, 'Steak de boeuf'),
(4, 'Huile'),
(5, 'Sel'),
(6, 'Poivre'),
(7, 'Spaghetti'),
(8, 'farine'),
(9, 'Bœuf haché'),
(10, 'Bouquet garni'),
(11, 'piment'),
(12, 'épices couscous'),
(13, 'semoule'),
(14, 'poulet'),
(15, 'cuisse de poulet'),
(16, 'blanc de poulet'),
(17, 'aile de poulet'),
(18, 'escalope de dinde'),
(19, 'vinaigre de vin'),
(20, 'échalotte'),
(21, 'steack de boeuf'),
(22, 'choux fleur'),
(23, 'choux blanc'),
(24, 'choux de Bruxelles'),
(25, 'cote de porc'),
(26, 'porc demi-sel'),
(27, 'poitrine de porc'),
(28, 'jarret de porc'),
(29, 'jambon'),
(30, 'endive'),
(31, 'harricot vert'),
(32, 'harricot blanc'),
(33, 'harricot rouge'),
(34, 'paprika'),
(35, 'cumin'),
(36, 'bouillon de légumes'),
(37, 'canelle'),
(38, 'curry'),
(39, 'citron'),
(40, 'orange'),
(41, 'fraise'),
(42, 'persil'),
(43, 'safran'),
(44, 'moutarde'),
(45, 'aneth'),
(46, 'coriandre'),
(47, 'épices paëlla'),
(48, 'riz blanc'),
(49, 'romarin'),
(50, 'basilic'),
(51, 'fenouille'),
(52, 'vanille'),
(53, 'herbes de provence'),
(54, 'piment de cayenne'),
(55, 'olive vert'),
(56, 'olive noir'),
(57, 'cabillaud'),
(58, 'moru'),
(59, 'maquereau'),
(60, 'lait'),
(61, 'lait en poudre'),
(62, 'Gigot d agneau'),
(63, 'choux vert'),
(64, 'concentré de tomate'),
(65, 'navet'),
(66, 'broccoli'),
(67, 'maïs'),
(68, 'poivron vert'),
(69, 'poivron rouge'),
(70, 'poivron jaune'),
(71, 'pomme de terre'),
(72, 'radis'),
(73, 'céleri'),
(74, 'rascasse'),
(75, 'cacahuète'),
(76, 'noix'),
(77, 'banane'),
(78, 'basilic'),
(79, 'noix de coco'),
(80, 'lait de coco'),
(81, 'chataîgne'),
(82, 'ciboulette'),
(83, 'échalote'),
(84, 'moule'),
(85, 'crevette'),
(86, 'langouste'),
(87, 'homard'),
(88, 'crabe'),
(89, 'araignée de mer'),
(90, 'oursin'),
(91, 'poisson rouget'),
(92, 'Bar ou loup de mer'),
(93, 'Barracuda'),
(94, 'poulpe'),
(95, 'Dorade'),
(96, 'Églefin'),
(97, 'Esturgeon'),
(98, 'Gardon'),
(99, 'Hareng'),
(100, 'anchoie'),
(101, 'Limande'),
(102, 'Lotte'),
(103, 'Merlan'),
(104, 'Merlu ou merluche'),
(105, 'Mulet'),
(106, 'Perche'),
(107, 'Poisson-chat'),
(108, 'Raie'),
(109, 'Roussette'),
(110, 'Sardine'),
(111, 'truite'),
(112, 'saumon'),
(113, 'sole'),
(114, 'thon'),
(115, 'Truite arc-en-ciel'),
(116, 'Truite de mer'),
(117, 'Truite fario ou truite de rivière'),
(118, 'bulot'),
(119, 'huître'),
(120, 'mouton'),
(121, 'agneau'),
(122, 'langoustine'),
(123, 'crustacé coques'),
(124, 'lentille noir'),
(125, 'lentille vert'),
(126, 'poireau'),
(127, 'poix chiche'),
(128, 'pieuvre'),
(129, 'seiche');

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE IF NOT EXISTS `prix` (
  `id_prix` int NOT NULL AUTO_INCREMENT,
  `cout` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id_recettes` int NOT NULL AUTO_INCREMENT,
  `recette_nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preparation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_difficulte` int DEFAULT NULL,
  `id_ingredient` int DEFAULT NULL,
  `id_images` int DEFAULT NULL,
  PRIMARY KEY (`id_recettes`),
  KEY `diff` (`id_difficulte`),
  KEY `ind` (`id_ingredient`),
  KEY `fk_recettes_images` (`id_images`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recettes`, `recette_nom`, `preparation`, `id_difficulte`, `id_ingredient`, `id_images`) VALUES
(13, 'tarte aux pommes', '', NULL, NULL, NULL),
(14, 'cassoulet', '', NULL, NULL, NULL),
(15, 'Coucous', '', NULL, NULL, NULL),
(16, 'Pizza', '', NULL, NULL, NULL),
(17, 'Salade méditatéréenne', '', NULL, NULL, NULL),
(18, 'Spaghetti à la Bolognaise', '', NULL, NULL, NULL),
(19, 'Endives aux jambon', '', NULL, NULL, NULL),
(20, 'paëla', '', NULL, NULL, NULL),
(21, 'couscous végétarien', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `regimes`
--

DROP TABLE IF EXISTS `regimes`;
CREATE TABLE IF NOT EXISTS `regimes` (
  `id_regime` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_regime`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `regimes`
--

INSERT INTO `regimes` (`id_regime`, `nom`) VALUES
(1, 'végétarien'),
(2, 'végétalien'),
(3, 'Omnivore'),
(4, 'cétogène'),
(5, 'Sans sucre'),
(6, 'Sans lactose');

-- --------------------------------------------------------

--
-- Structure de la table `type_aliments`
--

DROP TABLE IF EXISTS `type_aliments`;
CREATE TABLE IF NOT EXISTS `type_aliments` (
  `id_types_aliments` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_types_aliments`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_aliments`
--

INSERT INTO `type_aliments` (`id_types_aliments`, `nom`) VALUES
(8, 'Viande'),
(9, 'Poisson'),
(10, 'Légumes'),
(11, 'Fruits'),
(13, 'Agrumes'),
(14, 'Féculents'),
(15, 'Epices'),
(16, 'Volailles');

-- --------------------------------------------------------

--
-- Structure de la table `ustensiles`
--

DROP TABLE IF EXISTS `ustensiles`;
CREATE TABLE IF NOT EXISTS `ustensiles` (
  `id_ustensiles` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ustensiles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `mdp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_utilisateurs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_creat_compte` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `mdp`, `role`, `mail`, `nom_utilisateurs`, `date_creat_compte`) VALUES
(4, '55e024b419d9d7861245e16e8639e017713447df77127f73b2', 'admin', 'victor@exampl.com', 'Victor', '2024-01-01 12:00:00'),
(5, '55e024b419d9d7861245e16e8639e017713447df77127f73b2', 'modo', 'armand@exampl.com', 'Armand', '2024-01-01 12:00:00'),
(6, '55e024b419d9d7861245e16e8639e017713447df77127f73b2', 'Utilisateur', 'aurélie@exampl.com', 'Aurélie', '2024-01-01 12:00:00'),
(7, '55e024b419d9d7861245e16e8639e017713447df77127f73b2', 'Utilisateur', 'fabienne@exampl.com', 'Fabienne', '2024-01-01 12:00:00'),
(8, '55e024b419d9d7861245e16e8639e017713447df77127f73b2', 'Utilisateur', 'renaud@exampl.com', 'Renaud', '2024-01-01 12:00:00'),
(9, '$2y$10$AYKz6vsuXYfp1A7ERZ2xgesDqOEh4.n2MUemUOWDOKx', '', '', '', '2024-11-26 11:50:48'),
(10, '$2y$10$tQKq/xN3Ks0UhUQ4gkWBgu1LG4A53q0uZumdmc0PHNh', '', '', '', '2024-11-26 11:51:22'),
(11, '$2y$10$ITfJOt9pm8I90RpCa6MMielO447A903vkypG2YwwIzk', '', '', '', '2024-11-26 11:51:58'),
(12, '$2y$10$DQVXHsc4PAGlvX1.mEMdu.yzU2sEd/lEYjFq8Jo4xSI', 'user', 'essdddddd@gmail.com', 'spectrem', '2024-12-05 07:39:30'),
(13, '$2y$10$Qodp/i9mrYLedPIGZuTlpO/0hj293Mt7E1Y9WsHgaEr', 'user', 'essdddddd@gmail.com', 'spectrem', '2024-12-05 07:54:48'),
(14, '$2y$10$vm45F9FLaNAOKW0fJZlCeey4seVzUV1hOC4M84hKYw5', 'user', 'armand.moisan08@gmail.com', 'armand', '2024-12-05 10:11:44'),
(15, '$2y$10$UhMhWOG4yEtmuHBCoXyFwuOQIeBRUatTOorCBr1L/OT', 'user', 'armand.moisan08@gmail.com', 'armand', '2024-12-05 10:21:55'),
(16, '$2y$10$HZkOe2Cxey0ShFv5wlIF4ei10fwdZuMwMSdm8TGvVPU', 'user', 'armand.moisan08@gmail.com', 'armand', '2024-12-05 10:22:34'),
(17, '$2y$10$kjMgwv8W/ieEPevwPEHHauDF698CCoaYyABl6CUs1j9', 'user', 'armand.moisan08@gmail.com', 'moisan0', '2024-12-05 10:33:36'),
(18, '$2y$10$28CYic6mo28CieON4mHnfeqji.eGIS.v42kPKNtXy6S', 'user', 'armand.moisan08@gmail.com', 'arman', '2024-12-05 10:35:44');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_recettes`) REFERENCES `recettes` (`id_recettes`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
