-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 nov. 2024 à 09:36
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
  `id_user` int NOT NULL AUTO_INCREMENT,
  `date__publication` date NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL,
  `mail` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_difficultes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `difficultes`
--

INSERT INTO `difficultes` (`id_difficultes`, `nom`) VALUES
(1, 'débutant'),
(2, 'intermédiaire'),
(3, 'expert');

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
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `nom`) VALUES
(1, 'riz'),
(2, 'pommes de terre'),
(3, 'pommes'),
(4, 'haricots blanc'),
(6, 'haricot vert'),
(7, 'tomates'),
(8, 'tomate cerise'),
(9, 'oignon'),
(10, 'champignon'),
(11, 'choux fleurs'),
(13, 'carotte'),
(14, 'poireaux'),
(15, 'cuisse de poulet'),
(16, 'escalope de dinde'),
(17, 'aile de poulet'),
(18, 'steack de boeuf'),
(19, 'jambon'),
(20, 'endives'),
(21, 'sel'),
(22, 'poivre'),
(23, 'curcuma'),
(24, 'clous de girofle'),
(25, 'orange'),
(26, 'banane'),
(34, 'Huile'),
(35, 'Vinaigre'),
(36, 'Moutarde'),
(37, 'Laitue');

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
  `nom` varchar(50) NOT NULL,
  `id_difficulte` int DEFAULT NULL,
  `id_ingredient` int DEFAULT NULL,
  `id_images` int DEFAULT NULL,
  PRIMARY KEY (`id_recettes`),
  KEY `diff` (`id_difficulte`),
  KEY `ind` (`id_ingredient`),
  KEY `fk_recettes_images` (`id_images`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recettes`, `nom`, `id_difficulte`, `id_ingredient`, `id_images`) VALUES
(1, 'spaghetti à la bolognaise', 1, 7, 3),
(2, 'tarte aux pommes', 2, 3, NULL),
(3, 'cassoulet', 2, 4, 1),
(4, 'Coucous', 3, 15, 2),
(8, 'Paëla', 3, 1, NULL),
(9, 'Pizza', 2, 7, NULL),
(10, 'Salade méditatéréenne', 1, 37, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(11, '$2y$10$ITfJOt9pm8I90RpCa6MMielO447A903vkypG2YwwIzk', '', '', '', '2024-11-26 11:51:58');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `fk_recettes_images` FOREIGN KEY (`id_images`) REFERENCES `images` (`id_images`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
