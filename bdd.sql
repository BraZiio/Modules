phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 11 août 2020 à 21:42
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Webreathe_Le_Breton`
--

-- --------------------------------------------------------

--
-- Structure de la table `historical`
--

CREATE TABLE `historical` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historical`
--

INSERT INTO `historical` (`id`, `description`, `success`) VALUES
(6, '2020-07-19', 0),
(7, '2020-07-19', 1),
(8, '2020-08-11', 1),
(9, '2020-08-11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `number` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `working_condition` tinyint(1) NOT NULL,
  `temperature` float DEFAULT NULL,
  `operating_time` float DEFAULT NULL,
  `number_of_data_send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `number`, `type`, `working_condition`, `temperature`, `operating_time`, `number_of_data_send`) VALUES
(32, 'Calculateur/Transmetteur', 'Les cellules sont connectées au calculateur, qui anonymise, géolocalise et traite les données en temps réel pour les transmettre au serveur virtuel via le réseau 4G ou Wifi.', 456, 'Calculateur/Transmetteur', 0, 10, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historical`
--
ALTER TABLE `historical`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `historical`
--
ALTER TABLE `historical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
