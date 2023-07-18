-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 juil. 2023 à 15:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `adresse`) VALUES
(12, 'marieme', 'karara', 'nohainejj'),
(42, 'hoo', 'noha', 'montreuil'),
(43, 'nadia', 'loo', 'nohain'),
(44, 'abass', 'abass', 'mairie'),
(45, 'mame', 'mame', 'nohain'),
(46, 'lolo', 'lolo', 'paris'),
(47, 'lora', 'lora', 'placeitalie'),
(48, 'diabi', 'mohamed', 'montreuil'),
(49, 'noel', 'occasion', '5rue louis fourrier 77100 Meaux');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `numero` varchar(55) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client` varchar(250) NOT NULL,
  `reference` varchar(55) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `quantite` varchar(55) DEFAULT NULL,
  `puht` decimal(10,2) DEFAULT NULL,
  `mht` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `montantht` decimal(10,2) DEFAULT NULL,
  `ttva` decimal(10,2) DEFAULT NULL,
  `tttc` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `numero`, `date`, `client_id`, `client`, `reference`, `designation`, `quantite`, `puht`, `mht`, `tva`, `montantht`, `ttva`, `tttc`) VALUES
(3, 'FA2023073 ', '2023-06-07', 12, '', 'zer', 'prestation', '3', 100.00, 0, 0, 300.00, 60.00, 360.00),
(4, 'FA2023078 ', '2023-06-08', 42, '', 'zer', 'prestation', '2', 210.00, 0, 0, 420.00, 84.00, 504.00),
(5, 'FA2023077 ', '2023-06-07', 12, '', 'zer', 'prestation', '2', 210.00, 0, 0, 420.00, 84.00, 504.00),
(6, 'FA2023177 ', '2023-07-31', 42, '', '', 'prestation', '4', 100.00, 400, 0, 400.00, 80.00, 480.00);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `siret` varchar(50) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `cee` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `capital` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirmation` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id`, `nom`, `siret`, `adresse`, `cee`, `tel`, `capital`, `email`, `password`, `confirmation`, `date`) VALUES
(16, 'chantal', '93672610', 'nohain', 560000, 610075467, 57500, 'mariemeaidara66@gmail.com', '$2y$10$DsXqlPu0YrkTpfiTomamhOukPhQmhhsjU31C8srQOe27icL/g7022', 'n7iwu2I9uGtckoJy8wButYrndZTBBIlR69yUq6xhqPI52VEcAK', NULL),
(17, 'seven', '1000039', 'Montreuil', 9300001, 610075467, 57500, 'seven@gmail.com', '$2y$10$DR51yZb3FafFjj2K5DCpXeYqsOf2VfeuIDPco0qouY5hGijIdOwfu', 'e5aFXLHxbeaPXig0Ywki07sdgeLYsxRGMRt1sV38FeNFROiZJz', NULL),
(18, 'sotransls', '52463201500045', 'montreuil', 0, 610075467, 20000, 'sotransls@gmail.com', '$2y$10$CPnf79N5O05mC6199sTueevCgr.Eh6JCegNzsPmd0xhFnHhJJeGym', 'qZEsUpJfOcvkWjjfLCF0xJ6ed0cMobOxe2QlE6PLSjJzyeYZGh', NULL),
(19, 'df', '58773019', 'montreuil', 234565688, 610075467, 57500, 'df@gmail.com', '$2y$10$zCTrnzYMfcgZKbFRglLWyeswxcgzKnDAjkxGysg4HBKVK0WPctWzG', 'Lr4pbZIDz4Xo0Ixmi7QKA10ngwiZhOMlBvjiIlBbNy1wzCU0Fk', NULL),
(20, 'diomande', '873692900', 'montreuil', 2236200, 610075467, 57500, 'diomande@gmail.com', 'Dioma22', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
