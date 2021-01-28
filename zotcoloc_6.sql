-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 jan. 2021 à 07:01
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
  `surface_chambre` int(11) DEFAULT NULL,
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
  `selectionne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipement_logement`
--

CREATE TABLE `equipement_logement` (
  `id_logement` varchar(32) NOT NULL,
  `id_equipement` varchar(32) NOT NULL,
  `selectionne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('e6769afd4dcdebd429f69ef67ae6774f', 2),
('e6769afd4dcdebd429f69ef67ae6774f', 11),
('e6769afd4dcdebd429f69ef67ae6774f', 23),
('e6769afd4dcdebd429f69ef67ae6774f', 24),
('e6769afd4dcdebd429f69ef67ae6774f', 67),
('e6769afd4dcdebd429f69ef67ae6774f', 78),
('e6769afd4dcdebd429f69ef67ae6774f', 82),
('e6769afd4dcdebd429f69ef67ae6774f', 83);

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
('e6769afd4dcdebd429f69ef67ae6774f', '4866b244660ed3686a8a59ca9746b24a', 'PAYET', 'Jordan', NULL, NULL, NULL, NULL, 'PAYETJordan', NULL, '1992-01-03', '2021-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` varchar(32) NOT NULL,
  `libelle_photo` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo_chambre`
--

CREATE TABLE `photo_chambre` (
  `id_chambre` varchar(36) NOT NULL,
  `id_photo` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo_logement`
--

CREATE TABLE `photo_logement` (
  `id_logement` varchar(36) NOT NULL,
  `id_photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo_utilisateur`
--

CREATE TABLE `photo_utilisateur` (
  `id_utilisateur` varchar(32) NOT NULL,
  `id_photo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `selectionne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regle_logement`
--

INSERT INTO `regle_logement` (`id_logement`, `id_regle`, `selectionne`) VALUES
('0240638e96c97628f417a4b2d0a011a2', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('0240638e96c97628f417a4b2d0a011a2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
('027cac26e33ecd7bf880726c095ac600', '6512bd43d9caa6e02c990b0a82652dca', 1),
('22cfd7c147bb51907bd54b49c327c7ef', '6512bd43d9caa6e02c990b0a82652dca', 1),
('3eed1d71a8ee9e8abe74646313249264', '6512bd43d9caa6e02c990b0a82652dca', 1),
('5b8a8c99fc3e3cd55c85c8351ef3030d', '6512bd43d9caa6e02c990b0a82652dca', 1),
('632c852666f68f868312aa2c90d318d6', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
('6f46413bdde6ea6f0fae0a552257b5db', '45c48cce2e2d7fbdea1afc51c7c6ad26', 1),
('6f46413bdde6ea6f0fae0a552257b5db', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('78777789826dcc89ffa3c9e5cd8b676f', '6512bd43d9caa6e02c990b0a82652dca', 1),
('bb971dc8816df5048f170bc9e3ea9c10', '6512bd43d9caa6e02c990b0a82652dca', 1),
('bb971dc8816df5048f170bc9e3ea9c10', 'c81e728d9d4c2f636f067f89cc14862c', 1),
('bb971dc8816df5048f170bc9e3ea9c10', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `libelle_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle_role`) VALUES
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
('4866b244660ed3686a8a59ca9746b24a', 4, 'jha.payet@gmail.com', '$2y$10$J0z7M1GbnopnHG6CfCVtp.jQne/1Ky65e6PYDagYCOsl7RxbCCv5u');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

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
