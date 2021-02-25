-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 fév. 2021 à 06:21
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zotcoloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` varchar(32) NOT NULL,
  `id_utilisateur` varchar(32) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `indicatif` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `candidater_chambre`
--

CREATE TABLE `candidater_chambre` (
  `id_particulier` varchar(32) NOT NULL,
  `id_chambre` varchar(32) NOT NULL,
  `date_candidature` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revenus` int(11) NOT NULL,
  `lien_dossier_facile` longtext,
  `garant` tinyint(1) NOT NULL,
  `garant_revenu` int(11) DEFAULT NULL,
  `date_emmenagement` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duree` int(11) NOT NULL DEFAULT '24',
  `statut_candidat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_interet`
--

CREATE TABLE `categorie_interet` (
  `id` int(11) NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie_interet`
--

INSERT INTO `categorie_interet` (`id`, `libelle_categorie`) VALUES
(1, 'habitudes alimentaires'),
(2, 'centres d\'interets'),
(3, 'personnalite'),
(4, 'style de vie');

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `id_chambre` varchar(32) NOT NULL,
  `id_logement` varchar(32) NOT NULL,
  `titre_chambre` varchar(100) NOT NULL,
  `description_chambre` longtext NOT NULL,
  `surface_chambre` int(11) DEFAULT '0',
  `type_chambre` varchar(50) DEFAULT NULL,
  `a_louer` tinyint(1) NOT NULL DEFAULT '1',
  `date_disponibilite` date DEFAULT NULL,
  `duree_bail` int(11) DEFAULT '1',
  `loyer` int(11) NOT NULL DEFAULT '0',
  `charges` int(11) DEFAULT NULL,
  `caution` int(11) DEFAULT NULL,
  `frais_dossier` int(11) DEFAULT NULL,
  `date_creation_chambre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id_chambre`, `id_logement`, `titre_chambre`, `description_chambre`, `surface_chambre`, `type_chambre`, `a_louer`, `date_disponibilite`, `duree_bail`, `loyer`, `charges`, `caution`, `frais_dossier`, `date_creation_chambre`) VALUES
('01d7db8f31b79bcb684b09a728e354e1', 'a0002b1bd7a0d3d17c7ad18b0cad5ed6', 'Chambre Bien', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Felis Donec Et Odio Pellentesque Diam Volutpat Commodo Sed Egestas. Orci Ac Auctor Augue Mauris Augue Neque Gravida In Fermentum. Et Sollicitudin Ac Orci Phasellus Egestas Tellus Rutrum Tellus. Magnis Dis Parturient Montes Nascetur Ridiculus Mus. Ut Sem Viverra Aliquet Eget Sit. Sit Amet Mattis Vulputate Enim. Cras Ornare Arcu Dui Vivamus Arcu Felis Bibendum Ut Tristique. Luctus Accumsan Tortor Posuere Ac Ut Consequat Semper Viverra Nam. Eget Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Sit Amet Luctus Venenatis Lectus Magna Fringilla Urna. Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Quis Viverra Nibh Cras Pulvinar Mattis Nunc. Nulla Porttitor Massa Id Neque Aliquam Vestibulum Morbi Blandit. Cum Sociis Natoque Penatibus Et. Amet Facilisis Magna Etiam Tempor Orci Eu.', 50, '', 1, '2021-02-27', 24, 100, NULL, 50, 100, '2021-02-24 10:11:25'),
('536379a1a1be21593a7ef181a38a3863', 'ac17e4529ca09023af4f06e97e6767d2', 'Chambre bien', 'jfgnfgnfnfgn', 15, 'Chambre principale', 1, '2021-02-16', 10, 10, 10, 10, 10, '2021-02-22 09:34:46'),
('96d3bc77054625611a7e26d0de208319', 'c3a1a69a260606f1b2390d96c0caa258', 'Fdgfdgfdf', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Amet Mauris Commodo Quis Imperdiet. Vel Fringilla Est Ullamcorper Eget Nulla Facilisi Etiam. Mauris A', 25, '', 1, '2021-02-25', 100, 100, NULL, 25, 100, '2021-02-24 15:29:38'),
('b1220326bb6742ed450801a0c549448a', 'a0002b1bd7a0d3d17c7ad18b0cad5ed6', 'Fdgdbdfb', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Felis Donec Et Odio Pellentesque Diam Volutpat Commodo Sed Egestas. Orci Ac Auctor Augue Mauris Augue Neque Gravida In Fermentum. Et Sollicitudin Ac Orci Phasellus Egestas Tellus Rutrum Tellus. Magnis Dis Parturient Montes Nascetur Ridiculus Mus. Ut Sem Viverra Aliquet Eget Sit. Sit Amet Mattis Vulputate Enim. Cras Ornare Arcu Dui Vivamus Arcu Felis Bibendum Ut Tristique. Luctus Accumsan Tortor Posuere Ac Ut Consequat Semper Viverra Nam. Eget Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Sit Amet Luctus Venenatis Lectus Magna Fringilla Urna. Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Quis Viverra Nibh Cras Pulvinar Mattis Nunc. Nulla Porttitor Massa Id Neque Aliquam Vestibulum Morbi Blandit. Cum Sociis Natoque Penatibus Et. Amet Facilisis Magna Etiam Tempor Orci Eu.', 50, '', 1, '2021-02-28', 24, 100, NULL, 50, 100, '2021-02-24 10:11:25'),
('c2d3e3bc01d0cd3502f61f4919874d7f', 'c3a1a69a260606f1b2390d96c0caa258', 'Chambre Eclairee', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Amet Mauris Commodo Quis Imperdiet. Vel Fringilla Est Ullamcorper Eget Nulla Facilisi Etiam. Mauris A', 10, '', 1, '2021-02-25', 100, 100, 100, 10, 100, '2021-02-24 15:29:38'),
('ed5e47dccf7fe2fdfd668016702faaa6', '41db69b290e76ce7a8549afbe3e748d8', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet massa vitae tortor. Ut eu sem integer vitae justo eget magna fermentum. Etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Quis vel eros donec ac odio tempor orci dapibus. Nulla facilisi etiam dignissim diam. ', 25, 'Chambre principale', 1, '2021-01-22', 24, 550, 250, 1000, 1000, '2021-01-21 01:00:32'),
('ee91b87bd8454363b7e4d8bbf1f72aea', 'a0a8792cb01920f9e39eadad65b50599', 'Chambre Bien', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Felis Donec Et Odio Pellentesque Diam Volutpat Commodo Sed Egestas. Orci Ac Auctor Augue Mauris Augue Neque Gravida In Fermentum. Et Sollicitudin Ac Orci Phasellus Egestas Tellus Rutrum Tellus. Magnis Dis Parturient Montes Nascetur Ridiculus Mus. Ut Sem Viverra Aliquet Eget Sit. Sit Amet Mattis Vulputate Enim. Cras Ornare Arcu Dui Vivamus Arcu Felis Bibendum Ut Tristique. Luctus Accumsan Tortor Posuere Ac Ut Consequat Semper Viverra Nam. Eget Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Sit Amet Luctus Venenatis Lectus Magna Fringilla Urna. Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Quis Viverra Nibh Cras Pulvinar Mattis Nunc. Nulla Porttitor Massa Id Neque Aliquam Vestibulum Morbi Blandit. Cum Sociis Natoque Penatibus Et. Amet Facilisis Magna Etiam Tempor Orci Eu.', 100, '', 1, '2021-02-26', 100, 100, NULL, 100, 100, '2021-02-24 09:26:40'),
('fcf10903a32baab3cc8203665069bade', '0ac9d6b0bd2d3dd25c26680fe7cedc62', 'Chambre bien', 'chambre bien', 250, 'Chambre principale', 1, '2021-01-29', 24, 250, 250, 250, 250, '2021-01-21 10:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `codes_postaux`
--

CREATE TABLE `codes_postaux` (
  `id` int(11) NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` int(11) NOT NULL,
  `libelle_commune` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `libelle_commune`, `latitude`, `longitude`, `id_zone`) VALUES
(8, 'ST DENIS', -20.933, 55.4469, 1),
(9, 'BRAS PANON', -21.0233, 55.6196, 2),
(10, 'cilaos', -21.1442, 55.4586, 4),
(11, 'entre deux', -21.2042, 55.4923, 4),
(12, 'l\'etang sale', -21.2494, 55.3668, 4),
(13, 'LA PLAINE DES PALMISTES', -21.1522, 55.6445, 2),
(14, 'LA POSSESSION', -20.994, 55.3975, 3),
(15, 'LE PORT', -20.9449, 55.3053, 3),
(16, 'LE TAMPON', -21.2233, 5.55849, 4),
(17, 'LES AVIRONS', -21.209, 55.3591, 4),
(18, 'LES TROIS BASSINS', -21.1105, 55.3298, 3),
(19, 'PETITE ILE', -21.3401, 55.5687, 4),
(20, 'SALAZIE', -21.0469, 55.5082, 2),
(21, 'ST ANDRE', -20.963, 55.6427, 2),
(22, 'ST BENOIT', -21.0919, 55.6494, 2),
(23, 'ST JOSEPH', -21.3064, 55.6421, 4),
(24, 'ST LEU', -21.1666, 55.3331, 3),
(25, 'ST LOUIS', -21.2339, 55.4213, 4),
(26, 'ST PAUL', -21.0445, 55.3223, 3),
(27, 'ST PHILIPPE', -21.304, 55.7455, 4),
(28, 'ST PIERRE', -21.3123, 55.4936, 4),
(29, 'STE MARIE', -20.9471, 55.5304, 1),
(30, 'STE ROSE', -21.1925, 55.7545, 2),
(31, 'STE SUZANNE', -20.9457, 55.5928, 1);

-- --------------------------------------------------------

--
-- Structure de la table `document_certifiants`
--

CREATE TABLE `document_certifiants` (
  `id` varchar(32) NOT NULL,
  `id_proprietaire` varchar(32) NOT NULL,
  `libelle_fichier` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `id` varchar(32) NOT NULL,
  `libelle_equipement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`id`, `libelle_equipement`) VALUES
('02e74f10e0327ad868d138f2b4fdd6f0', 'Terrasse'),
('1679091c5a880faf6fb5e6087eb1b2dc', 'Lit double'),
('182be0c5cdcd5072bb1864cdee4d3d6e', 'Service de Ménage'),
('1f0e3dad99908345f7439f8ffabdffc4', 'Cintres'),
('1ff1de774005f8da13f42943881c655f', 'Fenêtre'),
('33e75ff09dd601bbe69f351039152189', 'Récemment rénové'),
('34173cb38f07f89ddbebc2ac9128303f', 'Portail'),
('37693cfc748049e45d87b8c7d8b9aacd', 'Meublé'),
('3c59dc048e8850243be8079a5c74d079', 'Produits de base'),
('45c48cce2e2d7fbdea1afc51c7c6ad26', 'Parking'),
('4e732ced3463d06de0ca9a15b6153677', 'Jardin'),
('6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'Balcon'),
('6512bd43d9caa6e02c990b0a82652dca', 'Portier'),
('6ea9ab1baa0efb9e19094440c317e21b', 'Maison'),
('6f4922f45568161a8cdf4ad2299f6d23', 'Fer à repasser'),
('70efdf2ec9b086079795c442636b55fb', 'Lave-vaisselle'),
('8e296a067a37563370ded05f5a3bf3ec', 'Gaz, chauffage & électricité inclus dans le loyer'),
('8f14e45fceea167a5a36dedd4bea2543', 'Lit jumeaux'),
('98f13708210194c475687be6106a3b84', 'Chauffage'),
('9bf31c7ff062936a96d3c8bd1f8f2ff3', 'Interphone'),
('a87ff679a2f3e71d9181a67b7542122c', 'Salle de bain privée'),
('aab3238922bcc25a6f606eb525ffdc56', 'Cheminée'),
('b6d767d2f8ed5d21a44b0e5886680cb9', 'Grands placards'),
('c16a5320fa475530d9583c34fd356ef5', 'Salon'),
('c20ad4d76fe97759aa27a0c99bff6710', 'Climatisation'),
('c4ca4238a0b923820dcc509a6f75849b', 'Baignoire'),
('c51ce410c124a10e0db5e4b97fc2af39', 'Accessibles aux personnes à mobilité réduite'),
('c74d97b01eae257e44aa9d5bade97baf', 'Lave-linge'),
('c81e728d9d4c2f636f067f89cc14862c', 'TV'),
('c9f0f895fb98ab9159f51fd0297e236d', 'Ascenceur'),
('d3d9446802a44259755d38e6d163e820', 'Piscine'),
('d41d8cd98f00b204e9800998ecf8427e', 'Wifi'),
('e4da3b7fbbce2345d7772b0674a318d5', 'Salle de bain partagée'),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Salle de sport');

-- --------------------------------------------------------

--
-- Structure de la table `equipement_chambre`
--

CREATE TABLE `equipement_chambre` (
  `id_chambre` varchar(32) NOT NULL,
  `id_equipement` varchar(32) NOT NULL,
  `selectionne` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipement_chambre`
--

INSERT INTO `equipement_chambre` (`id_chambre`, `id_equipement`, `selectionne`) VALUES
('c2d3e3bc01d0cd3502f61f4919874d7f', '37693cfc748049e45d87b8c7d8b9aacd', 1),
('c2d3e3bc01d0cd3502f61f4919874d7f', '6ea9ab1baa0efb9e19094440c317e21b', 1),
('ed5e47dccf7fe2fdfd668016702faaa6', '1679091c5a880faf6fb5e6087eb1b2dc', 1),
('ed5e47dccf7fe2fdfd668016702faaa6', '4e732ced3463d06de0ca9a15b6153677', 1),
('ed5e47dccf7fe2fdfd668016702faaa6', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('ed5e47dccf7fe2fdfd668016702faaa6', 'd41d8cd98f00b204e9800998ecf8427e', 1),
('fcf10903a32baab3cc8203665069bade', '34173cb38f07f89ddbebc2ac9128303f', 1),
('fcf10903a32baab3cc8203665069bade', 'd3d9446802a44259755d38e6d163e820', 1);

-- --------------------------------------------------------

--
-- Structure de la table `equipement_logement`
--

CREATE TABLE `equipement_logement` (
  `id_logement` varchar(32) NOT NULL,
  `id_equipement` varchar(32) NOT NULL,
  `selectionne` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipement_logement`
--

INSERT INTO `equipement_logement` (`id_logement`, `id_equipement`, `selectionne`) VALUES
('0ac9d6b0bd2d3dd25c26680fe7cedc62', '8e296a067a37563370ded05f5a3bf3ec', 1),
('0ac9d6b0bd2d3dd25c26680fe7cedc62', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('41db69b290e76ce7a8549afbe3e748d8', '182be0c5cdcd5072bb1864cdee4d3d6e', 1),
('41db69b290e76ce7a8549afbe3e748d8', '37693cfc748049e45d87b8c7d8b9aacd', 1),
('41db69b290e76ce7a8549afbe3e748d8', '3c59dc048e8850243be8079a5c74d079', 1),
('41db69b290e76ce7a8549afbe3e748d8', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('41db69b290e76ce7a8549afbe3e748d8', 'a87ff679a2f3e71d9181a67b7542122c', 1),
('41db69b290e76ce7a8549afbe3e748d8', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('41db69b290e76ce7a8549afbe3e748d8', 'd41d8cd98f00b204e9800998ecf8427e', 1),
('c3a1a69a260606f1b2390d96c0caa258', '182be0c5cdcd5072bb1864cdee4d3d6e', 1),
('c3a1a69a260606f1b2390d96c0caa258', '6ea9ab1baa0efb9e19094440c317e21b', 1);

-- --------------------------------------------------------

--
-- Structure de la table `favoriser_logement`
--

CREATE TABLE `favoriser_logement` (
  `id_logement` varchar(32) NOT NULL,
  `id_particulier` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `interets`
--

CREATE TABLE `interets` (
  `id_interet` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `libelle_interet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `interets`
--

INSERT INTO `interets` (`id_interet`, `id_categorie`, `libelle_interet`) VALUES
(1, 1, 'Cari'),
(2, 1, 'Végétalien'),
(3, 1, 'Gourmand'),
(4, 1, 'Carnivore'),
(5, 1, 'Junk-Food Lover'),
(6, 1, 'Cuisine Healthy'),
(7, 1, 'Vin'),
(8, 1, 'Chef Cuisinier'),
(9, 1, 'Halal'),
(10, 2, 'Randonnée'),
(11, 2, 'Farniente'),
(12, 2, 'Plage addict'),
(13, 2, 'Golf'),
(14, 2, 'Economie'),
(15, 2, 'Artisan'),
(16, 2, 'Restaurants'),
(17, 2, 'Droit'),
(18, 2, 'Tennis'),
(19, 2, 'Netflix'),
(20, 2, 'Films-Series'),
(21, 2, 'Ladi Lafé'),
(22, 2, 'Gossip'),
(23, 2, 'Ingénieur'),
(24, 2, 'Art'),
(25, 2, 'Sport addict'),
(26, 2, 'Basketball'),
(27, 2, 'Football'),
(28, 2, 'Cyclisme'),
(29, 2, 'Fitness'),
(30, 2, 'Musculation'),
(31, 2, 'Jogging addict'),
(32, 2, 'Musique'),
(33, 2, 'Mode'),
(34, 2, 'Politique'),
(35, 2, 'Actualité'),
(36, 2, 'Globe-Trotter'),
(37, 2, 'Théâtre'),
(38, 2, 'Informatique'),
(39, 2, 'Animaux'),
(40, 2, 'Plongée'),
(41, 2, 'Pêche'),
(42, 2, 'Littérature'),
(43, 2, 'Finance'),
(44, 2, 'Food'),
(45, 3, 'Charismatique'),
(46, 3, 'Extraverti'),
(47, 3, 'Introverti'),
(48, 3, 'Econome'),
(49, 3, 'Génie'),
(50, 3, 'Facile à vivre'),
(51, 3, 'Hyperactif'),
(52, 3, 'Spontané'),
(53, 3, 'Créatif'),
(54, 3, 'Joyeux'),
(55, 3, 'Pipelette'),
(56, 3, 'Proactif'),
(57, 3, 'Flemmard'),
(58, 3, 'Grand coeur'),
(59, 3, 'Fun'),
(60, 3, 'Ouvert d\'esprit'),
(61, 3, 'Détente'),
(62, 3, 'Artiste'),
(63, 3, 'Galérien'),
(64, 3, 'Professionnel'),
(65, 3, 'Sociable'),
(66, 3, 'Fort tempérament'),
(67, 3, 'Romantique'),
(68, 3, 'Blague'),
(69, 3, 'Etudiant'),
(70, 3, 'Bosseur'),
(71, 3, 'Ambitieux'),
(72, 3, 'Solitaire'),
(73, 3, 'Entrepreneur'),
(74, 3, 'Amical'),
(75, 3, 'Casanier'),
(76, 3, 'Dandy'),
(77, 3, 'Leader'),
(78, 3, 'Perfectionniste'),
(79, 4, 'Manique'),
(80, 4, 'Gros dormeur'),
(81, 4, 'Non-fumeur'),
(82, 4, 'Pro du canap'),
(83, 4, 'Lève tôt'),
(84, 4, 'Permis de conduire'),
(85, 4, 'Couche-tard'),
(86, 4, 'Pilier de bar'),
(87, 4, 'Fêtard'),
(88, 4, 'Mon chien'),
(89, 4, 'A l\'arrache'),
(90, 4, 'Fumeur'),
(91, 4, 'Main verte'),
(92, 4, 'Geek'),
(93, 4, 'Ponctuel'),
(94, 4, 'Nature'),
(95, 4, 'Super Busy'),
(96, 4, 'Bordélique'),
(97, 4, 'Mon chat'),
(98, 4, 'J\'ai un animal'),
(99, 4, 'Ecolo'),
(100, 4, 'Bon vivant'),
(101, 4, 'Mr/Mme Propre'),
(102, 4, 'Super Star'),
(103, 4, 'Célibataire'),
(104, 4, 'Aventurier'),
(105, 4, 'En retard'),
(106, 4, 'Tolère le tabac'),
(107, 4, 'Sain'),
(108, 4, 'Clubber');

-- --------------------------------------------------------

--
-- Structure de la table `interet_particulier`
--

CREATE TABLE `interet_particulier` (
  `id_particulier` varchar(32) NOT NULL,
  `id_interet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `interet_particulier`
--

INSERT INTO `interet_particulier` (`id_particulier`, `id_interet`) VALUES
('43e288cf843a00e4378c42977f43da8c', 2),
('b1bc2e542361e46f8e862f0f9e94d2ba', 2),
('e6769afd4dcdebd429f69ef67ae6774f', 2),
('ee435b9df79333915923ce60d1b8183f', 2),
('279cc5ecb8ff21152380fa7600892499', 3),
('6ce5d07429147119e7d1ee1822e16f1d', 4),
('279cc5ecb8ff21152380fa7600892499', 5),
('c715f49c11221920d4adbc4b0f688762', 5),
('ef85d04019cad95adb1bae6e6338a7a7', 6),
('6ce5d07429147119e7d1ee1822e16f1d', 7),
('e6769afd4dcdebd429f69ef67ae6774f', 11),
('279cc5ecb8ff21152380fa7600892499', 12),
('43e288cf843a00e4378c42977f43da8c', 12),
('b1bc2e542361e46f8e862f0f9e94d2ba', 12),
('ee435b9df79333915923ce60d1b8183f', 12),
('279cc5ecb8ff21152380fa7600892499', 14),
('ef85d04019cad95adb1bae6e6338a7a7', 16),
('279cc5ecb8ff21152380fa7600892499', 21),
('279cc5ecb8ff21152380fa7600892499', 22),
('299c4fa2eca8d18f59707692160d7052', 23),
('e6769afd4dcdebd429f69ef67ae6774f', 23),
('e6769afd4dcdebd429f69ef67ae6774f', 24),
('c715f49c11221920d4adbc4b0f688762', 26),
('279cc5ecb8ff21152380fa7600892499', 27),
('ef85d04019cad95adb1bae6e6338a7a7', 27),
('299c4fa2eca8d18f59707692160d7052', 32),
('6ce5d07429147119e7d1ee1822e16f1d', 32),
('299c4fa2eca8d18f59707692160d7052', 33),
('279cc5ecb8ff21152380fa7600892499', 35),
('c715f49c11221920d4adbc4b0f688762', 35),
('279cc5ecb8ff21152380fa7600892499', 36),
('c715f49c11221920d4adbc4b0f688762', 36),
('6ce5d07429147119e7d1ee1822e16f1d', 39),
('279cc5ecb8ff21152380fa7600892499', 42),
('279cc5ecb8ff21152380fa7600892499', 43),
('279cc5ecb8ff21152380fa7600892499', 61),
('279cc5ecb8ff21152380fa7600892499', 62),
('279cc5ecb8ff21152380fa7600892499', 63),
('279cc5ecb8ff21152380fa7600892499', 64),
('279cc5ecb8ff21152380fa7600892499', 65),
('c715f49c11221920d4adbc4b0f688762', 67),
('e6769afd4dcdebd429f69ef67ae6774f', 67),
('6ce5d07429147119e7d1ee1822e16f1d', 68),
('c715f49c11221920d4adbc4b0f688762', 68),
('c715f49c11221920d4adbc4b0f688762', 69),
('6ce5d07429147119e7d1ee1822e16f1d', 72),
('e6769afd4dcdebd429f69ef67ae6774f', 78),
('e6769afd4dcdebd429f69ef67ae6774f', 82),
('6ce5d07429147119e7d1ee1822e16f1d', 83),
('e6769afd4dcdebd429f69ef67ae6774f', 83),
('6ce5d07429147119e7d1ee1822e16f1d', 94),
('c715f49c11221920d4adbc4b0f688762', 94),
('279cc5ecb8ff21152380fa7600892499', 95),
('279cc5ecb8ff21152380fa7600892499', 97),
('6ce5d07429147119e7d1ee1822e16f1d', 103),
('6ce5d07429147119e7d1ee1822e16f1d', 104),
('299c4fa2eca8d18f59707692160d7052', 105);

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `id_logement` varchar(32) NOT NULL,
  `id_profil` varchar(32) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_utilisateur` varchar(32) NOT NULL,
  `titre_logement` varchar(100) NOT NULL,
  `description_logement` longtext NOT NULL,
  `surface_logement` int(11) DEFAULT NULL,
  `meuble` tinyint(1) DEFAULT NULL,
  `eligible_aides` tinyint(1) DEFAULT NULL,
  `candidature_facile` tinyint(1) DEFAULT NULL,
  `age_max` int(11) DEFAULT '0',
  `age_min` int(11) DEFAULT '0',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(100) NOT NULL DEFAULT 'Attente validation',
  `date_maj` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type_logement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`id_logement`, `id_profil`, `id_ville`, `id_utilisateur`, `titre_logement`, `description_logement`, `surface_logement`, `meuble`, `eligible_aides`, `candidature_facile`, `age_max`, `age_min`, `date_creation`, `statut`, `date_maj`, `type_logement`) VALUES
('0ac9d6b0bd2d3dd25c26680fe7cedc62', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 80, '07119a6da54f6042c353d0730fcd0072', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo', 'lorem', 500, 1, 0, 0, 100, 0, '2021-01-21 10:49:18', 'Publiee', '2021-01-21 10:49:18', 'Maison'),
('41db69b290e76ce7a8549afbe3e748d8', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 53, '6dd9c0430966f05eecef3b982cfded89', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet massa vitae tortor. Ut eu sem integer vitae justo eget magna fermentum. Etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Quis vel eros donec ac odio tempor orci dapibus. Nulla facilisi etiam dignissim diam. ', 250, 1, 1, 0, 35, 20, '2021-01-21 01:00:32', 'Publiee', '2021-01-21 01:00:32', 'Maison'),
('a0002b1bd7a0d3d17c7ad18b0cad5ed6', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 26, '5989459af93720cc291e0c955e6d1d0d', 'Lorem Ipsum Dolor Sit Enfiiiiinnnnn, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempo', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Felis Donec Et Odio Pellentesque Diam Volutpat Commodo Sed Egestas. Orci Ac Auctor Augue Mauris Augue Neque Gravida In Fermentum. Et Sollicitudin Ac Orci Phasellus Egestas Tellus Rutrum Tellus. Magnis Dis Parturient Montes Nascetur Ridiculus Mus. Ut Sem Viverra Aliquet Eget Sit. Sit Amet Mattis Vulputate Enim. Cras Ornare Arcu Dui Vivamus Arcu Felis Bibendum Ut Tristique. Luctus Accumsan Tortor Posuere Ac Ut Consequat Semper Viverra Nam. Eget Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Sit Amet Luctus Venenatis Lectus Magna Fringilla Urna. Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Quis Viverra Nibh Cras Pulvinar Mattis Nunc. Nulla Porttitor Massa Id Neque Aliquam Vestibulum Morbi Blandit. Cum Sociis Natoque Penatibus Et. Amet Facilisis Magna Etiam Tempor Orci Eu.', 100, 1, 1, NULL, 35, 25, '2021-02-24 10:11:25', 'Attente validation', '2021-02-24 10:11:25', '1'),
('a0a8792cb01920f9e39eadad65b50599', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 14, '7bf8f3866161343ee36f482664f29dbf', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempo', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Felis Donec Et Odio Pellentesque Diam Volutpat Commodo Sed Egestas. Orci Ac Auctor Augue Mauris Augue Neque Gravida In Fermentum. Et Sollicitudin Ac Orci Phasellus Egestas Tellus Rutrum Tellus. Magnis Dis Parturient Montes Nascetur Ridiculus Mus. Ut Sem Viverra Aliquet Eget Sit. Sit Amet Mattis Vulputate Enim. Cras Ornare Arcu Dui Vivamus Arcu Felis Bibendum Ut Tristique. Luctus Accumsan Tortor Posuere Ac Ut Consequat Semper Viverra Nam. Eget Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Sit Amet Luctus Venenatis Lectus Magna Fringilla Urna. Arcu Dictum Varius Duis At Consectetur Lorem Donec Massa. Quis Viverra Nibh Cras Pulvinar Mattis Nunc. Nulla Porttitor Massa Id Neque Aliquam Vestibulum Morbi Blandit. Cum Sociis Natoque Penatibus Et. Amet Facilisis Magna Etiam Tempor Orci Eu.', 100, 1, 1, NULL, 30, 25, '2021-02-24 09:26:40', 'Attente validation', '2021-02-24 09:26:40', 'Appartement'),
('ac17e4529ca09023af4f06e97e6767d2', 'c81e728d9d4c2f636f067f89cc14862c', 47, '0fdd7e4d4e2c35499acb229033dbd034', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo', 'zedfvsdvsdvsdvsv', 25, 1, 1, 0, 30, 25, '2021-02-22 09:34:46', 'Publiee', '2021-02-22 09:34:46', 'Villa'),
('c3a1a69a260606f1b2390d96c0caa258', 'c81e728d9d4c2f636f067f89cc14862c', 51, '5989459af93720cc291e0c955e6d1d0d', 'Lorem Ipsum Dolor Sit Ameno, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempo', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Amet Mauris Commodo Quis Imperdiet. Vel Fringilla Est Ullamcorper Eget Nulla Facilisi Etiam. Mauris A', 100, 1, 1, NULL, 40, 25, '2021-02-24 15:29:38', 'Attente validation', '2021-02-24 15:29:38', '1');

-- --------------------------------------------------------

--
-- Structure de la table `particulier`
--

CREATE TABLE `particulier` (
  `id` varchar(32) NOT NULL,
  `id_utilisateur` varchar(32) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `indicatif` varchar(5) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `description` longtext,
  `pseudo` varchar(50) NOT NULL,
  `ecole` varchar(150) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `date_disponibilite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `particulier`
--

INSERT INTO `particulier` (`id`, `id_utilisateur`, `nom`, `prenom`, `telephone`, `indicatif`, `genre`, `description`, `pseudo`, `ecole`, `date_naissance`, `date_disponibilite`) VALUES
('279cc5ecb8ff21152380fa7600892499', '7944098f2f027ef6f76d230bf9638a94', 'PAYET', 'Jordan', NULL, NULL, NULL, 'coucou          ', 'PAYETJordan', '', '2021-01-20', '2021-01-28'),
('299c4fa2eca8d18f59707692160d7052', '95e180663d9578895fba95cab8642ec0', 'PAYET', 'JORDAN', NULL, NULL, NULL, NULL, 'JORDANPAYET', NULL, '2021-02-01', '2021-01-11'),
('43e288cf843a00e4378c42977f43da8c', '1f99730cefb5bb8509e3f445d63cf773', 'PAYET', 'Jordan', NULL, NULL, NULL, '                                                                                                            ', 'PAYETJordane', '', '2021-01-12', '2021-01-29'),
('6ce5d07429147119e7d1ee1822e16f1d', '14e0257597e344f04bdeabd18402fad2', 'PAYET', 'Jordan', NULL, NULL, NULL, '                         test           ', 'PAYETJordane', '', '1992-01-03', '2021-01-21'),
('b1bc2e542361e46f8e862f0f9e94d2ba', '098c79bf3fd117a39cfc9b952895a711', 'PAYET', 'JORDAN', NULL, NULL, NULL, NULL, 'JORDANPAYET', NULL, '2021-02-01', '2021-02-16'),
('c715f49c11221920d4adbc4b0f688762', 'a44acb9fa8d62b0340bed6fc2a6d65c4', 'PAYET', 'Jordan', NULL, NULL, NULL, NULL, 'PAYETJordan', NULL, '2021-02-17', '2021-02-19'),
('e6769afd4dcdebd429f69ef67ae6774f', '4866b244660ed3686a8a59ca9746b24a', 'PAYET', 'Jordan', NULL, NULL, NULL, NULL, 'PAYETJordan', NULL, '1992-01-03', '2021-01-20'),
('ee435b9df79333915923ce60d1b8183f', '61590c490bf439843a794fb5d252c1ac', 'PAYET', 'JORDAN', NULL, NULL, NULL, NULL, 'JORDANPAYET', NULL, '2021-02-01', '2021-02-16'),
('ef85d04019cad95adb1bae6e6338a7a7', '61f15b100fc1b2f153bae82b93466561', 'PAYET', 'JORDAN', NULL, NULL, NULL, NULL, 'JORDANPAYET', NULL, '2020-11-02', '2021-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` varchar(32) NOT NULL,
  `libelle_photo` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `libelle_photo`) VALUES
('14f44a00ca6ae02920a0c040632b4ff8', 'f2ba6e85ab9bbce305b272734170436f.jpg'),
('25c02df2d7ebc0ebed529112b07a19a1', '7b2b90b237b151d8e21cdace127a3d25.jpg'),
('2b5ea99efafb152e87a87bd3e6727561', '30fb3e35348279b48b041a81fe01bdc1.jpg'),
('2b85f18720e0257c9491d4036fb97047', 'eaa901338faa902763e1c077e0645538.jpg'),
('4e08aa4975833a7914755034c2cb9afa', '003e211d20e2e407f0dd1738067f9af2.jpg'),
('4e365157b27f9a85117ef8c94159a3b5', '78f178495d9f9b3af28401a96859cb9d.jpg'),
('61a547ed5163b84f6ae6e03b6429b5e6', 'a32b41ed07e83ba2a85306a8d02ab74c.jpg'),
('68eb0bc92e8d1ac758712a839f3f488e', 'fc3c328190a652bc688561f48d128b79.jpg'),
('6f0511b2df0ae2885bb9d5482bce7692', '77963b679230230359dcf3896b609019.jpg'),
('71c883d9251ad01225347ba9a7216518', '7d3689d7f694fcd34184905e93bab3e3.jpg'),
('7973144528e6d65612643ba7cfd325dc', 'debf3288a0fdc453390536b550c840df.jpg'),
('7d157f9c49d33084cdd7ad6b2969dec8', '28f5290f281aba20a1e72b049b0cf7d4.jpg'),
('7eed864009a981620198b1492b1a93b5', '89a6fb564da87e6f3c05238b1e78f24f.jpg'),
('a81e30b9092ecfedc94900db468c920b', 'ac618212a94247e42d25cacfe2b99aa2.jpg'),
('b7025ebb5a952baa1ca29e4adf55f59e', 'd66a75cbb9d6540f14a39bb22658fbde.jpg'),
('bdce72c31ed5c003e886ff069aa1dbcf', '14587e4b662cdf5fcb8fbe2462436f77.jpg'),
('c312b403e3affd557efa1ba0c315d8b0', 'f66347126dca7cfb34d4e0f724a04b17.jpg'),
('cf927f32fe46f01c5a0cacea26fef2b7', 'f2a9f9809144e7c880a99447b16a6d13.jpg'),
('d389e5ec5ecf77700543b3d3b455bb6e', '669098ca05888d6c08bbf395eb061acc.jpg'),
('e41dbdf133f4d74172f6c61333017b2e', '5d560f5c3031a5648fc0888907a9e1b6.jpg'),
('eb10bfc1a91ea2ad8b97d1054ab99c52', 'd8cd2642c15bbe0ed777c753b7da7473.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `photo_chambre`
--

CREATE TABLE `photo_chambre` (
  `id_chambre` varchar(36) NOT NULL,
  `id_photo` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo_chambre`
--

INSERT INTO `photo_chambre` (`id_chambre`, `id_photo`) VALUES
('ed5e47dccf7fe2fdfd668016702faaa6', '4e08aa4975833a7914755034c2cb9afa'),
('fcf10903a32baab3cc8203665069bade', '68eb0bc92e8d1ac758712a839f3f488e'),
('c2d3e3bc01d0cd3502f61f4919874d7f', '6f0511b2df0ae2885bb9d5482bce7692'),
('b1220326bb6742ed450801a0c549448a', '7eed864009a981620198b1492b1a93b5'),
('ee91b87bd8454363b7e4d8bbf1f72aea', 'e41dbdf133f4d74172f6c61333017b2e');

-- --------------------------------------------------------

--
-- Structure de la table `photo_logement`
--

CREATE TABLE `photo_logement` (
  `id_logement` varchar(36) NOT NULL,
  `id_photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo_logement`
--

INSERT INTO `photo_logement` (`id_logement`, `id_photo`) VALUES
('25c02df2d7ebc0ebed529112b07a19a1', 'ac17e4529ca09023af4f06e97e6767d2'),
('a0002b1bd7a0d3d17c7ad18b0cad5ed6', 'cf927f32fe46f01c5a0cacea26fef2b7'),
('a0002b1bd7a0d3d17c7ad18b0cad5ed6', 'd389e5ec5ecf77700543b3d3b455bb6e'),
('a0a8792cb01920f9e39eadad65b50599', '7d157f9c49d33084cdd7ad6b2969dec8'),
('c312b403e3affd557efa1ba0c315d8b0', '41db69b290e76ce7a8549afbe3e748d8'),
('c3a1a69a260606f1b2390d96c0caa258', '14f44a00ca6ae02920a0c040632b4ff8'),
('eb10bfc1a91ea2ad8b97d1054ab99c52', '0ac9d6b0bd2d3dd25c26680fe7cedc62');

-- --------------------------------------------------------

--
-- Structure de la table `photo_utilisateur`
--

CREATE TABLE `photo_utilisateur` (
  `id_utilisateur` varchar(32) NOT NULL,
  `id_photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo_utilisateur`
--

INSERT INTO `photo_utilisateur` (`id_utilisateur`, `id_photo`) VALUES
('14e0257597e344f04bdeabd18402fad2', '2b85f18720e0257c9491d4036fb97047'),
('5989459af93720cc291e0c955e6d1d0d', '61a547ed5163b84f6ae6e03b6429b5e6'),
('7944098f2f027ef6f76d230bf9638a94', '71c883d9251ad01225347ba9a7216518'),
('6dd9c0430966f05eecef3b982cfded89', '7973144528e6d65612643ba7cfd325dc'),
('a44acb9fa8d62b0340bed6fc2a6d65c4', 'a81e30b9092ecfedc94900db468c920b'),
('f6ae3ac88dfc4766f8f2743d459fc109', 'b7025ebb5a952baa1ca29e4adf55f59e'),
('c8085ad4a527ea809c5174f2c82c59c5', 'bdce72c31ed5c003e886ff069aa1dbcf');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` varchar(32) NOT NULL,
  `libelle_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `libelle_profil`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'homme'),
('c81e728d9d4c2f636f067f89cc14862c', 'femme'),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'indifferent');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id` varchar(32) NOT NULL,
  `id_utilisateur` varchar(32) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `indicatif` varchar(5) DEFAULT '+262',
  `telephone` text NOT NULL,
  `site_web` longtext,
  `description` longtext,
  `notification_email` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `id_utilisateur`, `nom`, `prenom`, `indicatif`, `telephone`, `site_web`, `description`, `notification_email`) VALUES
('0dbc81654258da45f6aa3fbc9266efb2', '25fa8e891bfa84f031390d99a3fab6e6', 'PAYET', 'JORDAN', '+262', '693864664', NULL, NULL, 0),
('2f8d8c497160d204911caf9a2cd2d0c6', 'bef9440ab174ebdcf68841ae33934fc7', 'PAYET', 'JORDAN', '+262', '0693864664', NULL, NULL, 0),
('3737f2703d73b1492fc7da118937e5b4', 'c8085ad4a527ea809c5174f2c82c59c5', 'PAYET', 'Jordanze', '+262', '693864664', NULL, NULL, 0),
('8224f0eb02216281821e0fdacfc674ce', '5989459af93720cc291e0c955e6d1d0d', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('8c7fd43686c76ca21ef4a65f6f9e01ae', '07119a6da54f6042c353d0730fcd0072', 'PAYET', 'Jordanoux', '+262', '693864664', 'toto.974@gmail.com', '                     hello je teste le zotcoloc\r\n                                                   ', 0),
('a28116260d4a742ed1ff81dd706b11ae', '7bf8f3866161343ee36f482664f29dbf', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('b517aa7ba71865d1da6f57f509cec97d', 'f6ae3ac88dfc4766f8f2743d459fc109', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('c90e2853e5ce102a74794e1a9ff5d0d2', '2316ea4287aad51a68228418f841e657', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('d8245802b79934696c64de7fcae11119', 'dd9a2452af81af12a7199364cfdf72b8', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('db4fa335f557d9a750b0ef4ef3eb928b', '0fdd7e4d4e2c35499acb229033dbd034', 'PAYET', 'Jordan', '+262', '693864664', NULL, NULL, 0),
('e218a11e4eb5de4d07f8549c5ea91cd6', 'c349778acfc5579fd55fa5b86b9cc1bc', 'Payet', 'Jordan', '+262', '0693864664', NULL, NULL, 0),
('f03794a6b2c6bd4c3e3f9434c8981721', '7d343d72282c82783862bd7675bc6951', 'PAYET', 'Jordan', '+262', '693864664', NULL, NULL, 0),
('fdc5dceba9e6d91045883b033dbf8679', '6dd9c0430966f05eecef3b982cfded89', 'PAYET', 'Jordan', '+262', '693864664', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `regles`
--

CREATE TABLE `regles` (
  `id` varchar(32) NOT NULL,
  `libelle_regle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regles`
--

INSERT INTO `regles` (`id`, `libelle_regle`) VALUES
('1679091c5a880faf6fb5e6087eb1b2dc', 'Soirée interdite'),
('45c48cce2e2d7fbdea1afc51c7c6ad26', 'Animaux Acceptés'),
('6512bd43d9caa6e02c990b0a82652dca', 'Couples'),
('8f14e45fceea167a5a36dedd4bea2543', 'Sans alcool'),
('a87ff679a2f3e71d9181a67b7542122c', 'Pas de musique forte'),
('aab3238922bcc25a6f606eb525ffdc56', 'Paiement Hebdomadaire'),
('c20ad4d76fe97759aa27a0c99bff6710', 'Voisins aimant la \r\ntranquillité'),
('c4ca4238a0b923820dcc509a6f75849b', 'Non fumeur'),
('c51ce410c124a10e0db5e4b97fc2af39', 'Paiement Mensuel'),
('c81e728d9d4c2f636f067f89cc14862c', 'Pas d\'animaux'),
('c9f0f895fb98ab9159f51fd0297e236d', 'Pas d\'invités'),
('d3d9446802a44259755d38e6d163e820', 'Logement Fumeur'),
('e4da3b7fbbce2345d7772b0674a318d5', 'Drogue interdite'),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Pas d\'invité pour la nuit');

-- --------------------------------------------------------

--
-- Structure de la table `regle_logement`
--

CREATE TABLE `regle_logement` (
  `id_logement` varchar(32) NOT NULL,
  `id_regle` varchar(32) NOT NULL,
  `selectionne` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regle_logement`
--

INSERT INTO `regle_logement` (`id_logement`, `id_regle`, `selectionne`) VALUES
('0240638e96c97628f417a4b2d0a011a2', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('0240638e96c97628f417a4b2d0a011a2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
('027cac26e33ecd7bf880726c095ac600', '6512bd43d9caa6e02c990b0a82652dca', 1),
('0ac9d6b0bd2d3dd25c26680fe7cedc62', 'c9f0f895fb98ab9159f51fd0297e236d', 1),
('0ac9d6b0bd2d3dd25c26680fe7cedc62', 'd3d9446802a44259755d38e6d163e820', 1),
('22cfd7c147bb51907bd54b49c327c7ef', '6512bd43d9caa6e02c990b0a82652dca', 1),
('3eed1d71a8ee9e8abe74646313249264', '6512bd43d9caa6e02c990b0a82652dca', 1),
('41db69b290e76ce7a8549afbe3e748d8', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('41db69b290e76ce7a8549afbe3e748d8', 'c20ad4d76fe97759aa27a0c99bff6710', 1),
('5b8a8c99fc3e3cd55c85c8351ef3030d', '6512bd43d9caa6e02c990b0a82652dca', 1),
('632c852666f68f868312aa2c90d318d6', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
('6f46413bdde6ea6f0fae0a552257b5db', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('6f46413bdde6ea6f0fae0a552257b5db', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('78777789826dcc89ffa3c9e5cd8b676f', '6512bd43d9caa6e02c990b0a82652dca', 1),
('bb971dc8816df5048f170bc9e3ea9c10', '6512bd43d9caa6e02c990b0a82652dca', 1),
('bb971dc8816df5048f170bc9e3ea9c10', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('bb971dc8816df5048f170bc9e3ea9c10', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
('c3a1a69a260606f1b2390d96c0caa258', '1679091c5a880faf6fb5e6087eb1b2dc', 1),
('c3a1a69a260606f1b2390d96c0caa258', 'a87ff679a2f3e71d9181a67b7542122c', 1),
('c3a1a69a260606f1b2390d96c0caa258', 'c20ad4d76fe97759aa27a0c99bff6710', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `libelle_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `libelle_role`) VALUES
(3, 'proprietaire'),
(4, 'particulier'),
(5, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` varchar(32) NOT NULL,
  `id_role` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `id_role`, `email`, `password`) VALUES
('07119a6da54f6042c353d0730fcd0072', 3, 'jha.payet@gmailxxxxxx.com', '$2y$10$i4.yiEwRsOFg//89WWT9y.JnaCRpushLZw1Whnp6NF8duMzjTsZ6C'),
('098c79bf3fd117a39cfc9b952895a711', 4, 'jha.payet@gmail.comggf', '1234'),
('0fdd7e4d4e2c35499acb229033dbd034', 3, 'jha.payet@gmail.comtrgnf', '$2y$10$tuawbgT.67I3Z0epvatOhOKQz.UcjDu6NIC89/MolbrAnDX1p/LwS'),
('14e0257597e344f04bdeabd18402fad2', 4, 'jha.payet@gmail.comoos', '$2y$10$qsR1.ZML24revXB6jCQBne8tc2OFMML0qOGDZQz8rWKrYhQsBTMHS'),
('1f99730cefb5bb8509e3f445d63cf773', 4, 'jha.payet@gmail.comdsdcsd', '$2y$10$CiSNkvPt4ctfIlasnaR9X.ZFoOWCm8E70IvIXCZ1yS.LgFlb5CnZK'),
('2316ea4287aad51a68228418f841e657', 4, 'jha.payet@gmail.comsdvsd', '$2y$10$FQIfllvFuy9mbyTko4Diketp.ouDfFSg/x96UomEZxWh7xleQ.HJW'),
('25fa8e891bfa84f031390d99a3fab6e6', 3, 'jha.payet@gmail.comdgbfgnf', '$2y$10$3cjeAdqUEjW.NAspCoi1wegaBz4YVllGYFOSypS9GiexD3mOr2TAO'),
('2f7c219ded0e79d429542825804e8e83', 3, 'jha.payet@gmail.comvsfdfbvd', '$2y$10$pWizCAGtLBFHq9gvx1fX6OvSMxxs5/8tNgAgYGmI/VZQhjTPyhcZK'),
('466055912453d587f7e362ff5deb6d19', 3, 'jha.payet@gmail.comvsfdfbvdk', '$2y$10$72hLaIrdJm3P4OA8O6pKGe4peMvX8PgAeikE1mtyQqMfq.2b0TW22'),
('4866b244660ed3686a8a59ca9746b24a', 4, 'jha.payet@gmail.com', '$2y$10$J0z7M1GbnopnHG6CfCVtp.jQne/1Ky65e6PYDagYCOsl7RxbCCv5u'),
('5989459af93720cc291e0c955e6d1d0d', 4, 'jha.payet@gmail.comdfbdfb', '$2y$10$VsaupPSPFO/0UEWCp9Xdj.9OjY3Zyv9/C4RoL9vZP8dT4PKdzkLA6'),
('61590c490bf439843a794fb5d252c1ac', 4, 'jha.payet@gmail.comggfdfbd', '1234'),
('61f15b100fc1b2f153bae82b93466561', 4, 'jha.payet@gmail.comtoto', '1234'),
('6dd9c0430966f05eecef3b982cfded89', 3, 'jha.payet@gmail.cooom', '$2y$10$MGjM0kdBxYH8e4rUSG9l2.gOOzgxUHxkZcjPhle7I4jG0VVFyZ.P2'),
('7944098f2f027ef6f76d230bf9638a94', 4, 'jha.payet@gmaidddl.com', '$2y$10$Hxl.SjWymtM4qNeOCRjS1.bcU914yJBV7/gvFYQSQibZyP4G2jCBK'),
('7bf8f3866161343ee36f482664f29dbf', 4, 'jha.payet@gmail.comdvsdvsd', '$2y$10$V2n31wSMUC6e4b44ak7FQ.jJyOcv9uFm5tWXnxgfHkVflw8kNBg3y'),
('7d343d72282c82783862bd7675bc6951', 3, 'jha.payet@gmail.comp', '$2y$10$oD1bWYHyKhFYqLJJq3gtiOFk0iPnUkfCI5FsucSMLiBMH6W5ccL5G'),
('95e180663d9578895fba95cab8642ec0', 4, 'jha.payet@gmail.comttt', '1234'),
('a44acb9fa8d62b0340bed6fc2a6d65c4', 4, 'jha.payet@gmail.comuuu', '$2y$10$ZHvWniHPRr.U0PAwoRHMKu7StNmrrAKaBiA7GG5E98SNAuzzUephy'),
('bef9440ab174ebdcf68841ae33934fc7', 4, 'jha.payet@gmail.comgrgr', '1234'),
('c349778acfc5579fd55fa5b86b9cc1bc', 4, 'jha.payet@gmail.comtyty', '$2y$10$gg9LAGgzRTpiXoXtZrqJ2.mxII.vSnwjKUxy5Thqa4VqSl/SDD/dO'),
('c8085ad4a527ea809c5174f2c82c59c5', 3, 'jha.payet@gmail.comuu', '$2y$10$ZlIWhU0AxOxztvRokN17eO4400GW53mG5S0gI3xhT.aGB57YNSfkm'),
('dd9a2452af81af12a7199364cfdf72b8', 4, 'jha.payet@gmail.comtttffff', '$2y$10$Hah4edJcv/PszgsTRH6hfOrZGThduiRjpo/YlbA.C8egXRqeQmkMm'),
('f6ae3ac88dfc4766f8f2743d459fc109', 4, 'jha.payet@gmail.comvsdsvd', '$2y$10$E/MMJxfcFF4gxq21uzSryeI3QF1.VSY8p1CcPYRKiOgsYyQHf1Tzm');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `libelle_ville` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `libelle_ville`, `code_postal`, `id_commune`) VALUES
(1, 'LE BRULE', 97400, 8),
(2, 'ST DENIS CAMELIAS', 97400, 8),
(3, 'ST FRANCOIS', 97400, 8),
(4, 'ST DENIS', 97400, 8),
(5, 'BELLEPIERRE\r\n', 97400, 8),
(6, 'ST PIERRE', 97410, 28),
(7, 'RAVINE BLANCHE', 97410, 28),
(8, 'TERRE SAINTE', 97410, 28),
(9, 'GRAND BOIS', 97410, 28),
(10, 'MONT VERT', 97410, 28),
(11, 'BASSE TERRE', 97410, 28),
(12, 'BOIS DE NEFLES ST PAUL', 97411, 26),
(13, 'BRAS PANON', 97412, 9),
(14, 'RIVIERE DU MAT', 97412, 9),
(15, 'CILAOS', 97413, 10),
(16, 'PALMISTE ROUGE', 97413, 10),
(17, 'ENTRE DEUX', 97414, 11),
(18, 'LA CHALOUPE', 97416, 24),
(19, 'LA MONTAGNE', 97417, 8),
(20, 'ST BERNARD', 97417, 8),
(21, 'LA PLAINE DES CAFRES', 97418, 16),
(22, 'TAMPON 17EME KM', 97418, 16),
(23, 'STE THERESE', 97419, 14),
(24, 'LA RIVIERE DES GALETS', 97419, 14),
(25, 'LE DOS D ANE', 97419, 14),
(26, 'LA POSSESSION', 97419, 14),
(27, 'LE PORT ZUP', 97420, 15),
(28, 'LE PORT', 97420, 15),
(29, 'LE PORT MARINE', 97420, 15),
(30, 'LES MAKES', 97421, 25),
(31, 'LA RIVIERE', 97421, 25),
(32, 'LA SALINE', 97422, 26),
(33, 'LE GUILLAUME', 97423, 26),
(34, 'LE PLATE', 97424, 24),
(35, 'LE PITON ST LEU', 97424, 24),
(36, 'LES AVIRONS', 97425, 17),
(37, 'TEVELAVE', 97425, 17),
(38, 'LES TROIS BASSINS', 97426, 18),
(39, 'L ETANG SALE', 97427, 12),
(40, 'L ETANG SALE LES BAINS', 97427, 12),
(41, 'PITON GOYAVES', 97429, 19),
(42, 'PETITE ILE', 97429, 19),
(43, 'PONT D YVES', 97430, 16),
(44, 'LE TAMPON', 97430, 16),
(45, 'TAMPON 14EME KM', 97430, 16),
(46, 'LES TROIS MARES', 97430, 16),
(47, 'LA PLAINE DES PALMISTES', 97431, 13),
(48, 'RAVINE DES CABRIS', 97432, 28),
(49, 'SALAZIE', 97433, 20),
(50, 'HELL BOURG', 97433, 20),
(51, 'LA SALINE LES BAINS', 97434, 26),
(52, 'ST GILLES LES BAINS', 97434, 26),
(53, 'ST GILLES LES HAUTS', 97435, 26),
(54, 'TAN ROUGE', 97435, 26),
(55, 'BERNICA', 97435, 26),
(56, 'ST LEU', 97436, 24),
(57, 'STE ANNE', 97437, 22),
(58, 'STE MARIE', 97438, 29),
(59, 'LA GRANDE MONTEE', 97438, 29),
(60, 'ROLAND GARROS AEROPORT', 97438, 29),
(61, 'RIVIERE DES PLUIES', 97438, 29),
(62, 'LE PITON STE ROSE', 97439, 30),
(63, 'STE ROSE', 97439, 30),
(64, 'ST ANDRE', 97440, 21),
(65, 'LA CRESSONNIERE', 97440, 21),
(66, 'CAMBUSTON', 97440, 21),
(67, 'STE SUZANNE', 97441, 31),
(68, 'ST PHILIPPE', 97442, 27),
(69, 'BASSE VALLEE', 97442, 27),
(70, 'ST LOUIS', 97450, 25),
(71, 'ST PAUL', 97460, 26),
(72, 'PLATEAU CAILLOUX', 97460, 26),
(73, 'BELLEMENE', 97460, 26),
(74, 'ST BENOIT', 97470, 22),
(75, 'BEAUFONDS', 97470, 22),
(76, 'JEAN PETIT', 97480, 23),
(77, 'ST JOSEPH', 97480, 23),
(78, 'LES LIANES', 97480, 23),
(79, 'VINCENDO', 97480, 23),
(80, 'LA BRETAGNE', 97490, 8),
(81, 'STE CLOTILDE', 97490, 8),
(82, 'MOUFIA', 97490, 8),
(83, 'ST DENIS CHAUDRON', 97490, 8),
(84, 'BOIS DE NEFLES ST DENIS', 97490, 8);

-- --------------------------------------------------------

--
-- Structure de la table `ville_particulier`
--

CREATE TABLE `ville_particulier` (
  `particulier_id` varchar(32) NOT NULL,
  `ville_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville_particulier`
--

INSERT INTO `ville_particulier` (`particulier_id`, `ville_id`) VALUES
('ef85d04019cad95adb1bae6e6338a7a7', 1),
('b1bc2e542361e46f8e862f0f9e94d2ba', 9),
('ee435b9df79333915923ce60d1b8183f', 9),
('6ce5d07429147119e7d1ee1822e16f1d', 32),
('c715f49c11221920d4adbc4b0f688762', 32),
('ef85d04019cad95adb1bae6e6338a7a7', 36),
('279cc5ecb8ff21152380fa7600892499', 41),
('ef85d04019cad95adb1bae6e6338a7a7', 41),
('299c4fa2eca8d18f59707692160d7052', 51),
('c715f49c11221920d4adbc4b0f688762', 63),
('43e288cf843a00e4378c42977f43da8c', 65),
('e6769afd4dcdebd429f69ef67ae6774f', 69),
('e6769afd4dcdebd429f69ef67ae6774f', 82);

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `libelle_zone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id`, `libelle_zone`) VALUES
(1, 'nord'),
(2, 'est'),
(3, 'ouest'),
(4, 'sud');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `candidater_chambre`
--
ALTER TABLE `candidater_chambre`
  ADD PRIMARY KEY (`id_particulier`,`id_chambre`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `categorie_interet`
--
ALTER TABLE `categorie_interet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `codes_postaux`
--
ALTER TABLE `codes_postaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zone` (`id_zone`);

--
-- Index pour la table `document_certifiants`
--
ALTER TABLE `document_certifiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipement_chambre`
--
ALTER TABLE `equipement_chambre`
  ADD PRIMARY KEY (`id_chambre`,`id_equipement`),
  ADD KEY `id_equipement` (`id_equipement`);

--
-- Index pour la table `equipement_logement`
--
ALTER TABLE `equipement_logement`
  ADD PRIMARY KEY (`id_logement`,`id_equipement`),
  ADD KEY `id_equipement` (`id_equipement`);

--
-- Index pour la table `favoriser_logement`
--
ALTER TABLE `favoriser_logement`
  ADD PRIMARY KEY (`id_logement`,`id_particulier`),
  ADD KEY `id_utilisateur` (`id_particulier`);

--
-- Index pour la table `interets`
--
ALTER TABLE `interets`
  ADD PRIMARY KEY (`id_interet`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `interet_particulier`
--
ALTER TABLE `interet_particulier`
  ADD PRIMARY KEY (`id_particulier`,`id_interet`),
  ADD KEY `id_interet` (`id_interet`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id_logement`),
  ADD KEY `id_profil` (`id_profil`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Index pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo_chambre`
--
ALTER TABLE `photo_chambre`
  ADD PRIMARY KEY (`id_chambre`,`id_photo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Index pour la table `photo_logement`
--
ALTER TABLE `photo_logement`
  ADD PRIMARY KEY (`id_photo`,`id_logement`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `photo_utilisateur`
--
ALTER TABLE `photo_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`,`id_photo`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `regles`
--
ALTER TABLE `regles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regle_logement`
--
ALTER TABLE `regle_logement`
  ADD PRIMARY KEY (`id_logement`,`id_regle`),
  ADD KEY `id_regle` (`id_regle`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commune` (`id_commune`);

--
-- Index pour la table `ville_particulier`
--
ALTER TABLE `ville_particulier`
  ADD PRIMARY KEY (`particulier_id`,`ville_id`),
  ADD KEY `ville_id` (`ville_id`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_interet`
--
ALTER TABLE `categorie_interet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `codes_postaux`
--
ALTER TABLE `codes_postaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `interets`
--
ALTER TABLE `interets`
  MODIFY `id_interet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `candidater_chambre`
--
ALTER TABLE `candidater_chambre`
  ADD CONSTRAINT `candidater_chambre_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `chambres` (`id_chambre`),
  ADD CONSTRAINT `candidater_chambre_ibfk_2` FOREIGN KEY (`id_particulier`) REFERENCES `particulier` (`id`);

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logements` (`id_logement`);

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `communes_ibfk_1` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id`);

--
-- Contraintes pour la table `document_certifiants`
--
ALTER TABLE `document_certifiants`
  ADD CONSTRAINT `document_certifiants_ibfk_1` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id`);

--
-- Contraintes pour la table `equipement_chambre`
--
ALTER TABLE `equipement_chambre`
  ADD CONSTRAINT `equipement_chambre_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `chambres` (`id_chambre`),
  ADD CONSTRAINT `equipement_chambre_ibfk_2` FOREIGN KEY (`id_equipement`) REFERENCES `equipements` (`id`);

--
-- Contraintes pour la table `equipement_logement`
--
ALTER TABLE `equipement_logement`
  ADD CONSTRAINT `equipement_logement_ibfk_1` FOREIGN KEY (`id_equipement`) REFERENCES `equipements` (`id`),
  ADD CONSTRAINT `equipement_logement_ibfk_2` FOREIGN KEY (`id_logement`) REFERENCES `logements` (`id_logement`);

--
-- Contraintes pour la table `favoriser_logement`
--
ALTER TABLE `favoriser_logement`
  ADD CONSTRAINT `favoriser_logement_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logements` (`id_logement`),
  ADD CONSTRAINT `favoriser_logement_ibfk_2` FOREIGN KEY (`id_particulier`) REFERENCES `particulier` (`id`);

--
-- Contraintes pour la table `interets`
--
ALTER TABLE `interets`
  ADD CONSTRAINT `interets_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_interet` (`id`);

--
-- Contraintes pour la table `interet_particulier`
--
ALTER TABLE `interet_particulier`
  ADD CONSTRAINT `interet_particulier_ibfk_1` FOREIGN KEY (`id_interet`) REFERENCES `interets` (`id_interet`),
  ADD CONSTRAINT `interet_particulier_ibfk_2` FOREIGN KEY (`id_particulier`) REFERENCES `particulier` (`id`);

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `logements_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `logements_ibfk_3` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id`);

--
-- Contraintes pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD CONSTRAINT `particulier_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `photo_utilisateur`
--
ALTER TABLE `photo_utilisateur`
  ADD CONSTRAINT `photo_utilisateur_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photos` (`id`),
  ADD CONSTRAINT `photo_utilisateur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `regle_logement`
--
ALTER TABLE `regle_logement`
  ADD CONSTRAINT `regle_logement_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logements` (`id_logement`),
  ADD CONSTRAINT `regle_logement_ibfk_2` FOREIGN KEY (`id_regle`) REFERENCES `regles` (`id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`role_id`);

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`id_commune`) REFERENCES `communes` (`id`);

--
-- Contraintes pour la table `ville_particulier`
--
ALTER TABLE `ville_particulier`
  ADD CONSTRAINT `ville_particulier_ibfk_1` FOREIGN KEY (`particulier_id`) REFERENCES `particulier` (`id`),
  ADD CONSTRAINT `ville_particulier_ibfk_2` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
