-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 nov. 2019 à 20:44
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `transcom`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_pro`
--

CREATE TABLE `affectation_pro` (
  `id_affect_pro` int(11) NOT NULL,
  `id_pro_affect` int(11) NOT NULL,
  `nom_pro_affect` varchar(255) NOT NULL,
  `id_ut_affect` int(11) NOT NULL,
  `nom_ut_affect` varchar(255) NOT NULL,
  `id_mt_affect` int(11) NOT NULL,
  `nom_mt_affect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation_pro`
--

INSERT INTO `affectation_pro` (`id_affect_pro`, `id_pro_affect`, `nom_pro_affect`, `id_ut_affect`, `nom_ut_affect`, `id_mt_affect`, `nom_mt_affect`) VALUES
(1, 1, 'rrrttte', 1, 'admin', 8, 'BENZ 354'),
(2, 1, 'rrrttte', 1, 'admin', 8, 'BENZ 354'),
(3, 1, 'rrrttte', 1, 'admin', 8, 'BENZ 354'),
(15, 4, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 1, 'admin', 8, 'BENZ 354'),
(16, 1, 'rrrttte', 1, 'admin', 7, 'RAV4'),
(17, 1, 'rrrttte', 1, 'admin', 7, 'RAV4'),
(18, 4, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 1, 'admin', 7, 'RAV4'),
(19, 3, 'qqqqqq', 1, 'admin', 7, 'RAV4'),
(20, 8, 'test', 1, 'admin', 6, 'ffff');

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `id_alerte` int(11) NOT NULL,
  `type_alerte` varchar(255) NOT NULL,
  `autre_alerte` varchar(255) NOT NULL,
  `date_alerte` date NOT NULL,
  `lieu_alerte` varchar(255) NOT NULL,
  `description_alerte` text NOT NULL,
  `casier_mt` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_alerte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`id_alerte`, `type_alerte`, `autre_alerte`, `date_alerte`, `lieu_alerte`, `description_alerte`, `casier_mt`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_alerte`) VALUES
(12, 'vol', 'wrwrrrr', '0000-00-00', 'rrrrr', 'rrrrr', 'non', 1, 'admin', 7, '1234/AB22', '2019-11-05 22:09:42'),
(17, 'vol', '', '0000-00-00', '', '', 'i', 1, 'admin', 7, '1234/AB22', '2019-11-05 22:22:16'),
(18, 'vol', '', '0000-00-00', '', '', 'non reglÃ©', 1, 'admin', 7, '1234/AB22', '2019-11-05 22:21:52');

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `reff_assurance` varchar(255) NOT NULL,
  `date_livraison_assurance` date NOT NULL,
  `date_expiration_assurance` date NOT NULL,
  `scan_assurance` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_assurance` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `reff_assurance`, `date_livraison_assurance`, `date_expiration_assurance`, `scan_assurance`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_assurance`) VALUES
(4, '343', '2019-10-01', '2019-10-31', 'javascript.jpg', 1, 'admin', 7, 'RAV4', '2019-10-31 12:35:13'),
(5, '23232', '2019-10-02', '2019-10-09', 'loc.png', 1, 'admin', 7, 'RAV4', '2019-10-31 12:46:38'),
(6, '23232', '2019-10-02', '2019-10-09', 'loc.png', 1, 'admin', 7, 'RAV4', '2019-10-31 12:46:50'),
(7, '66676', '2019-10-09', '2019-10-11', 'person_1.jpg', 1, 'admin', 7, 'RAV4', '2019-10-31 12:57:28'),
(8, '33333333', '2019-10-02', '2019-10-02', '', 1, 'admin', 7, 'RAV4', '2019-10-31 14:00:23'),
(9, 'testtttttttttt', '2019-10-02', '2019-10-09', 'person_1.jpg', 1, 'admin', 6, '2344', '2019-10-31 20:09:14'),
(10, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 9, '1234/1234', '2019-11-01 21:03:36');

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `id_cond` int(11) NOT NULL,
  `nom_cond` varchar(255) NOT NULL,
  `postnom_cond` varchar(255) NOT NULL,
  `prenom_cond` varchar(255) NOT NULL,
  `sexe_cond` varchar(255) NOT NULL,
  `date_naiss_cond` date NOT NULL,
  `lieu_naiss_cond` varchar(255) NOT NULL,
  `province_cond` varchar(255) NOT NULL,
  `ville_cond` varchar(255) NOT NULL,
  `commune_cond` varchar(255) NOT NULL,
  `quartier_cond` varchar(255) NOT NULL,
  `avennue_cond` varchar(255) NOT NULL,
  `num_domicile_cond` varchar(255) NOT NULL,
  `tel1_cond` varchar(255) NOT NULL,
  `tel2_cond` varchar(255) NOT NULL,
  `email_cond` varchar(255) NOT NULL,
  `scan_identite_cond` varchar(255) NOT NULL,
  `photo_cond` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_conducteur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tel2_chauf';

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`id_cond`, `nom_cond`, `postnom_cond`, `prenom_cond`, `sexe_cond`, `date_naiss_cond`, `lieu_naiss_cond`, `province_cond`, `ville_cond`, `commune_cond`, `quartier_cond`, `avennue_cond`, `num_domicile_cond`, `tel1_cond`, `tel2_cond`, `email_cond`, `scan_identite_cond`, `photo_cond`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_conducteur`) VALUES
(1, '', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 1, '', '2019-10-31 17:20:50'),
(2, 'rere', 't', 't', 'MASCULIN', '0000-00-00', 't', 't', 't', 't', 't', 't', 't', 't', 't', '', '', '', 1, 'admin', 7, 'RAV4', '2019-10-31 17:24:40'),
(3, 'fdff', 'u', 'u', 'MASCULIN', '0000-00-00', 'j', 'h', 'j', 'h', 'j', 'j', 'k', 'lk', 'l', 'l', 'person_2.jpg', 'person_4.jpg', 1, 'admin', 7, 'RAV4', '2019-10-31 17:25:01'),
(4, '', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 9, '1234/1234', '2019-11-01 21:03:42'),
(5, '', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 6, '2344', '2019-11-05 20:19:18'),
(6, 'twteywtt', 'tyty', 'tyt', 'MASCULIN', '0000-00-00', 'i', 'iu', 'iu', 'iu', 'i', 'ui', 'ui', 'jk', 'j', 'k', '', '', 1, 'admin', 6, '2344', '2019-11-05 20:19:28');

-- --------------------------------------------------------

--
-- Structure de la table `controle_technique`
--

CREATE TABLE `controle_technique` (
  `id_controle_technique` int(11) NOT NULL,
  `reff_controle_technique` varchar(255) NOT NULL,
  `date_livraison_controle_technique` date NOT NULL,
  `date_expiration_controle_technique` date NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` int(11) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` int(11) NOT NULL,
  `date_enreg_controle_technique` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle_technique`
--

INSERT INTO `controle_technique` (`id_controle_technique`, `reff_controle_technique`, `date_livraison_controle_technique`, `date_expiration_controle_technique`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_controle_technique`) VALUES
(1, '333', '2019-10-01', '2019-10-23', 1, 0, 6, 0, '0000-00-00 00:00:00'),
(2, '334', '2019-10-08', '2019-10-22', 1, 0, 6, 0, '0000-00-00 00:00:00'),
(3, '222222222222', '2019-10-09', '2019-10-02', 1, 0, 6, 0, '0000-00-00 00:00:00'),
(4, '', '0000-00-00', '0000-00-00', 1, 0, 6, 0, '2019-10-31 14:15:52'),
(5, '', '0000-00-00', '0000-00-00', 1, 0, 6, 0, '2019-10-31 14:15:54'),
(6, '6666666666666666777', '0000-00-00', '0000-00-00', 1, 0, 6, 0, '2019-10-31 14:16:00'),
(7, '', '0000-00-00', '0000-00-00', 1, 0, 9, 1234, '2019-11-01 21:03:45');

-- --------------------------------------------------------

--
-- Structure de la table `moyen_de_transport`
--

CREATE TABLE `moyen_de_transport` (
  `id_mt` int(11) NOT NULL,
  `num_plaque_mt` varchar(255) NOT NULL,
  `marque_mt` varchar(255) NOT NULL,
  `model_mt` varchar(255) NOT NULL,
  `type_mt` varchar(255) NOT NULL,
  `annee_fabrication_mt` year(4) NOT NULL,
  `num_chassis_mt` varchar(255) NOT NULL,
  `num_moteur_mt` varchar(255) NOT NULL,
  `main_mt` varchar(255) NOT NULL,
  `couleur_mt` varchar(255) NOT NULL,
  `image_mt` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `date_enreg_mt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `moyen_de_transport`
--

INSERT INTO `moyen_de_transport` (`id_mt`, `num_plaque_mt`, `marque_mt`, `model_mt`, `type_mt`, `annee_fabrication_mt`, `num_chassis_mt`, `num_moteur_mt`, `main_mt`, `couleur_mt`, `image_mt`, `id_ut_fk`, `nom_ut_fk`, `date_enreg_mt`) VALUES
(6, '2344', 'dsd', 'ffff', 'moto', 2019, '98765', '234567', 'droite', 'jaunr', 'javascript.jpg', 1, 'admin', '2019-11-01 07:49:08'),
(7, '1234/AB22', 'TOYOTA', 'RAV4', 'vehicule', 2002, '1000009', '35567', 'droite', 'VERTE', 'webdesign.jpg', 1, 'admin', '2019-11-01 07:49:08'),
(8, '654323AB/21', 'MERCEDES BENZ', 'BENZ 354', 'moto', 2019, '23456', '876543', 'gauche', 'ROUGE', 'reactjs.jpg', 1, 'admin', '2019-11-01 19:47:55'),
(9, '1234/1234', 'MERCEDES BENZ', 'muuu', 'vehicule', 2019, '444555', '33366666', 'GAUCHE', 'j', 'person_1.jpg', 1, 'admin', '2019-11-01 07:50:08');

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `id_permis` int(11) NOT NULL,
  `type_permis` varchar(255) NOT NULL,
  `date_livraison_permis` date NOT NULL,
  `date_expiration_permis` date NOT NULL,
  `scan_permis` varchar(255) NOT NULL,
  `date_jour` date NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_permis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permis`
--

INSERT INTO `permis` (`id_permis`, `type_permis`, `date_livraison_permis`, `date_expiration_permis`, `scan_permis`, `date_jour`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_permis`) VALUES
(48, 'A,B,C,D', '2019-11-01', '2019-11-03', '', '2019-11-02', 1, 'admin', 6, 'ffff', '2019-11-02 21:18:45'),
(49, 'A,B,C,D', '2019-11-01', '2019-11-01', '', '2019-11-02', 1, 'admin', 6, 'ffff', '2019-11-02 21:18:58'),
(50, 'A,B,C,D', '2019-10-01', '2019-11-01', '', '2019-11-02', 1, 'admin', 6, 'ffff', '2019-11-02 21:20:39'),
(51, 'A,B,C,D', '2019-10-01', '2019-10-05', '', '2019-11-02', 1, 'admin', 6, 'ffff', '2019-11-02 21:20:55');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_pro` int(11) NOT NULL,
  `nom_pro` varchar(255) NOT NULL,
  `postnom_pro` varchar(255) NOT NULL,
  `prenom_pro` varchar(255) NOT NULL,
  `sexe_pro` varchar(255) NOT NULL,
  `date_naiss_pro` date NOT NULL,
  `lieu_naiss_pro` varchar(255) NOT NULL,
  `province_pro` varchar(255) NOT NULL,
  `ville_pro` varchar(255) NOT NULL,
  `commune_pro` varchar(255) NOT NULL,
  `quartier_pro` varchar(255) NOT NULL,
  `avennue_pro` varchar(255) NOT NULL,
  `num_domicile_pro` varchar(255) NOT NULL,
  `tel1_pro` varchar(255) NOT NULL,
  `tel2_pro` varchar(255) NOT NULL,
  `email_pro` varchar(255) NOT NULL,
  `scan_identite_pro` varchar(255) NOT NULL,
  `photo_pro` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_proprietaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_pro`, `nom_pro`, `postnom_pro`, `prenom_pro`, `sexe_pro`, `date_naiss_pro`, `lieu_naiss_pro`, `province_pro`, `ville_pro`, `commune_pro`, `quartier_pro`, `avennue_pro`, `num_domicile_pro`, `tel1_pro`, `tel2_pro`, `email_pro`, `scan_identite_pro`, `photo_pro`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_proprietaire`) VALUES
(1, 'rrrttte', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 7, 'RAV4', '2019-10-31 20:28:13'),
(2, 'trtytytUIuoUOIuoIOOo', 'oi', 'o', 'MASCULIN', '0000-00-00', 'j', 'hj', 'j', 'j', 'kj', 'j', 'l', 'l', 'j', 'k', '', '', 1, 'admin', 7, 'RAV4', '2019-10-31 18:15:51'),
(3, 'qqqqqq', 'qqqqqqqq', 'qqqqq', 'MASCULIN', '2019-10-01', 'qqqqqq', 'qqqqqqqqq', 'qqqqqqqq', 'qqqqqqq', 'qqqqqqqqqq', 'qqqqqqqq', 'qqqqqqqq', 'qqqqqqqqqqq', 'qqqqqqqqq', 'qqqqqqq', 'person_2.jpg', 'person_4.jpg', 1, 'admin', 7, '1234/AB22', '2019-10-31 18:21:49'),
(4, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 7, '1234/AB22', '2019-10-31 18:32:19'),
(5, '', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 9, '1234/1234', '2019-11-01 21:03:31'),
(6, 'rtggggg', 'tyt', 'ty', 'MASCULIN', '0000-00-00', 'iu', 'gu', 'gj', 'j', 'gh', '', 'j', 'j', 'j', 'j', '', '', 1, 'admin', 8, '654323AB/21', '2019-11-02 12:20:33'),
(7, '', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 6, '2344', '2019-11-02 19:40:54'),
(8, 'test', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 6, '2344', '2019-11-02 19:41:12'),
(9, 'pro', 'defdf', 'prpoeo', 'FEMININ', '2019-11-06', 'ewe', 'wwww', 'wewe', 'wewrer', 'rrtr', 'dfdfdf', 'dddd', 'dfdfd', 'dfdf', 'fdfdf', '', '', 1, 'admin', 7, '1234/AB22', '2019-11-05 20:07:18');

-- --------------------------------------------------------

--
-- Structure de la table `taxe_voirie`
--

CREATE TABLE `taxe_voirie` (
  `id_taxe_voirie` int(11) NOT NULL,
  `reff_taxe_voirie` varchar(255) NOT NULL,
  `date_livraison_taxe_voirie` date NOT NULL,
  `date_expiration_taxe_voirie` date NOT NULL,
  `scan_taxe_voirie` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_taxe_voirie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taxe_voirie`
--

INSERT INTO `taxe_voirie` (`id_taxe_voirie`, `reff_taxe_voirie`, `date_livraison_taxe_voirie`, `date_expiration_taxe_voirie`, `scan_taxe_voirie`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_taxe_voirie`) VALUES
(1, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(2, '4434', '2019-10-01', '2019-10-15', 'javascript.jpg', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(3, '6567777', '2019-10-08', '2019-10-15', 'person_1.jpg', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(4, '6567777', '2019-10-08', '2019-10-15', 'person_1.jpg', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(5, '6567777', '2019-10-08', '2019-10-15', 'person_1.jpg', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(6, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(7, '7654', '2019-10-02', '2019-10-09', 'webdesign.jpg', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(8, '7654', '2019-10-22', '2019-10-10', 'person_1.jpg', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(9, '77', '2019-10-09', '2019-10-01', '', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(10, '9999999999', '2019-10-01', '2019-10-01', '', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(11, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 9, '1234/1234', '2019-10-31 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_ut` int(11) NOT NULL,
  `nom_ut` varchar(255) NOT NULL,
  `mdp_ut` int(11) NOT NULL,
  `postnom_ut` varchar(255) NOT NULL,
  `prenom_ut` varchar(255) NOT NULL,
  `sexe_ut` varchar(255) NOT NULL,
  `tel1_ut` varchar(255) NOT NULL,
  `tel2_ut` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `act_desact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_ut`, `nom_ut`, `mdp_ut`, `postnom_ut`, `prenom_ut`, `sexe_ut`, `tel1_ut`, `tel2_ut`, `role`, `act_desact`) VALUES
(1, 'admin', 1234, 'hello', 'gggg', 'm', '0987654321', '123456789', 'operateur', '1'),
(2, 'admin2', 1234, 'ffff', 'fffgggh', 'f', '22222333', '44443332', 'roullage', '1');

-- --------------------------------------------------------

--
-- Structure de la table `vignette`
--

CREATE TABLE `vignette` (
  `id_vignette` int(11) NOT NULL,
  `reff_vignette` varchar(255) NOT NULL,
  `date_livraison_vignette` date NOT NULL,
  `date_expiration_vignette` date NOT NULL,
  `scan_vignette` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_vignette` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vignette`
--

INSERT INTO `vignette` (`id_vignette`, `reff_vignette`, `date_livraison_vignette`, `date_expiration_vignette`, `scan_vignette`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_vignette`) VALUES
(1, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(2, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(3, 'yyyyy', '2019-10-01', '2019-10-09', 'javascript.jpg', 1, 'admin', 6, 'ffff', '0000-00-00 00:00:00'),
(4, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(5, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(6, '', '2019-10-01', '2019-10-09', '', 1, 'admin', 7, 'RAV4', '0000-00-00 00:00:00'),
(7, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 9, '1234/1234', '2019-11-01 21:03:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_pro`
--
ALTER TABLE `affectation_pro`
  ADD PRIMARY KEY (`id_affect_pro`);

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`id_alerte`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`id_cond`);

--
-- Index pour la table `controle_technique`
--
ALTER TABLE `controle_technique`
  ADD PRIMARY KEY (`id_controle_technique`);

--
-- Index pour la table `moyen_de_transport`
--
ALTER TABLE `moyen_de_transport`
  ADD PRIMARY KEY (`id_mt`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`id_permis`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_pro`);

--
-- Index pour la table `taxe_voirie`
--
ALTER TABLE `taxe_voirie`
  ADD PRIMARY KEY (`id_taxe_voirie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_ut`);

--
-- Index pour la table `vignette`
--
ALTER TABLE `vignette`
  ADD PRIMARY KEY (`id_vignette`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_pro`
--
ALTER TABLE `affectation_pro`
  MODIFY `id_affect_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `id_alerte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `id_cond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `controle_technique`
--
ALTER TABLE `controle_technique`
  MODIFY `id_controle_technique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `moyen_de_transport`
--
ALTER TABLE `moyen_de_transport`
  MODIFY `id_mt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `permis`
--
ALTER TABLE `permis`
  MODIFY `id_permis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `taxe_voirie`
--
ALTER TABLE `taxe_voirie`
  MODIFY `id_taxe_voirie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vignette`
--
ALTER TABLE `vignette`
  MODIFY `id_vignette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
