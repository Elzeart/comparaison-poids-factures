-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 avr. 2022 à 09:50
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `first_seller`
--

-- --------------------------------------------------------

--
-- Structure de la table `prix_poids`
--

CREATE TABLE `prix_poids` (
  `idPrixPoids` int(11) NOT NULL,
  `valeurPoids` float NOT NULL,
  `valeurPrix` float NOT NULL,
  `idTransporteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prix_poids`
--

INSERT INTO `prix_poids` (`idPrixPoids`, `valeurPoids`, `valeurPrix`, `idTransporteur`) VALUES
(3, 1, 4.06, 1),
(5, 3, 4.06, 2),
(6, 2, 4.06, 1),
(7, 3, 4.06, 1),
(8, 5, 5.16, 1),
(9, 6, 5.52, 1),
(10, 7, 5.52, 1),
(11, 8, 5.52, 1),
(12, 9, 5.52, 1),
(13, 10, 5.52, 1),
(14, 11, 6.72, 1),
(15, 12, 6.72, 1),
(16, 13, 6.72, 1),
(18, 14, 6.72, 1),
(19, 15, 6.72, 1),
(20, 16, 7.99, 1),
(21, 17, 7.99, 1),
(22, 18, 7.99, 1),
(23, 19, 7.99, 1),
(24, 20, 7.99, 1),
(25, 21, 9.47, 1),
(26, 22, 9.47, 1),
(27, 23, 9.47, 1),
(28, 24, 9.47, 1),
(29, 25, 9.47, 1),
(30, 26, 11.07, 1),
(31, 27, 11.07, 1),
(32, 28, 11.07, 1),
(33, 29, 11.07, 1),
(36, 30, 11.07, 1),
(37, 1, 6.49, 2),
(38, 2, 6.49, 2),
(39, 4, 7.49, 2),
(40, 5, 7.99, 2),
(41, 6, 8.49, 2),
(42, 7, 8.99, 2),
(43, 8, 9.5, 2),
(44, 9, 10, 2),
(45, 10, 10.5, 2),
(46, 11, 11, 2),
(47, 12, 11.5, 2),
(48, 13, 12, 2),
(49, 14, 12.5, 2),
(50, 15, 13, 2),
(51, 16, 13.5, 2),
(52, 17, 14, 2),
(53, 18, 14.5, 2),
(54, 19, 15, 2),
(55, 20, 15.5, 2),
(56, 21, 16, 2),
(57, 22, 16.5, 2),
(58, 23, 17, 2),
(59, 24, 17.51, 2),
(60, 25, 18.01, 2),
(61, 26, 18.51, 2),
(62, 27, 19.01, 2),
(63, 28, 19.51, 2),
(64, 29, 20.01, 2),
(65, 30, 20.51, 2),
(78, 1, 2.02, 4),
(79, 3, 2.04, 4),
(82, 2, 2.04, 4),
(84, 4, 2.04, 4),
(85, 4, 5.16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `taxes`
--

CREATE TABLE `taxes` (
  `idTaxe` int(11) NOT NULL,
  `nomTaxe` varchar(50) NOT NULL,
  `valeurTaxe` float NOT NULL,
  `idTransporteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taxes`
--

INSERT INTO `taxes` (`idTaxe`, `nomTaxe`, `valeurTaxe`, `idTransporteur`) VALUES
(1, 'CSR', 0.6, 1),
(2, 'PER', 0.015, 1),
(3, 'SGO', 0.17, 1),
(4, 'CSR', 0.6, 2),
(11, 'SGO', 0.17, 2),
(15, 'PER', 0.015, 2),
(21, 'PER', 0.015, 4),
(22, 'CSR', 0.6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `transporteur`
--

CREATE TABLE `transporteur` (
  `idTransporteur` int(11) NOT NULL,
  `nomTransporteur` varchar(50) NOT NULL,
  `calcul` varchar(25) NOT NULL,
  `colonnePoidsCsv` varchar(50) NOT NULL,
  `colonneRefCsv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `transporteur`
--

INSERT INTO `transporteur` (`idTransporteur`, `nomTransporteur`, `calcul`, `colonnePoidsCsv`, `colonneRefCsv`) VALUES
(1, 'GLS', 'V+CSR+V*PER+V*SGO', 'Poids pour le traitement commande vente', 'Numéro de colis'),
(2, 'Chronopost', 'V+CSR+V*PER+V*SGO', 'Poids', 'NumeroLT'),
(4, 'DHL', 'V+CSR+V*PER+V*SGO', 'Poids en Kg', 'Numero de AWB');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `password`) VALUES
(1, 'nathalie', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `prix_poids`
--
ALTER TABLE `prix_poids`
  ADD PRIMARY KEY (`idPrixPoids`),
  ADD KEY `PRIX_POIDS_TRANSPORTEUR_FK` (`idTransporteur`);

--
-- Index pour la table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`idTaxe`),
  ADD KEY `TAXES_TRANSPORTEUR_FK` (`idTransporteur`);

--
-- Index pour la table `transporteur`
--
ALTER TABLE `transporteur`
  ADD PRIMARY KEY (`idTransporteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `prix_poids`
--
ALTER TABLE `prix_poids`
  MODIFY `idPrixPoids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `idTaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `transporteur`
--
ALTER TABLE `transporteur`
  MODIFY `idTransporteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prix_poids`
--
ALTER TABLE `prix_poids`
  ADD CONSTRAINT `PRIX_POIDS_TRANSPORTEUR_FK` FOREIGN KEY (`idTransporteur`) REFERENCES `transporteur` (`idTransporteur`);

--
-- Contraintes pour la table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `TAXES_TRANSPORTEUR_FK` FOREIGN KEY (`idTransporteur`) REFERENCES `transporteur` (`idTransporteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
