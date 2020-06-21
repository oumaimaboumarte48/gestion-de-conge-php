-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 juin 2020 à 15:42
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionconge`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande_conge`
--

CREATE TABLE `demande_conge` (
  `id` int(11) NOT NULL,
  `date_début` date NOT NULL,
  `date_fin` date NOT NULL,
  `durée` int(11) NOT NULL,
  `id_employe` int(11) NOT NULL,
  `id_type_conge` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `demande` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `CIN` varchar(45) NOT NULL,
  `Tel` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `date_embauche` date NOT NULL,
  `id_service` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `CIN`, `Tel`, `email`, `date_embauche`, `id_service`, `matricule`, `date_de_naissance`) VALUES
(76, 'batty', 'zakaria', 'HA:208445', 687904633, 'zakaria@gmail.com', '2020-06-18', 6, 100100, '1997-12-09');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `Service` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `Service`) VALUES
(6, 'responsable ressources humaines'),
(7, 'développeur front-end'),
(8, 'développeur back-end'),
(9, 'réception'),
(10, 'designer'),
(11, ' Informatique ');

-- --------------------------------------------------------

--
-- Structure de la table `sign_in`
--

CREATE TABLE `sign_in` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sign_in`
--

INSERT INTO `sign_in` (`id`, `email`, `password`) VALUES
(37, 'zakaria@gmail.com', 'b9c93fbdfd2a30504e05d3b0b32307da'),
(40, 'amine@gmail.com', 'c0d29696fc1eea771df60ff95a4772ff'),
(45, 'ayoub@gmail.com', 'c1a41159a94ed9bf45e035f6a2a2ca79'),
(71, 'zakaria@hotmail.com', 'b9c93fbdfd2a30504e05d3b0b32307da'),
(90, '', 'b9c93fbdfd2a30504e05d3b0b32307da');

-- --------------------------------------------------------

--
-- Structure de la table `type_conge`
--

CREATE TABLE `type_conge` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_conge`
--

INSERT INTO `type_conge` (`id`, `type`) VALUES
(1, 'Congé annuel'),
(2, 'Congé exceptionnel'),
(3, 'Le pèlerinage aux Lieux saints de l’Islam'),
(4, 'Congé de maladie'),
(5, 'Maternité');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande_conge`
--
ALTER TABLE `demande_conge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employés` (`id_employe`),
  ADD KEY `id_type_conge` (`id_type_conge`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `service_1` (`id_service`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sign_in`
--
ALTER TABLE `sign_in`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `type_conge`
--
ALTER TABLE `type_conge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande_conge`
--
ALTER TABLE `demande_conge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `sign_in`
--
ALTER TABLE `sign_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `type_conge`
--
ALTER TABLE `type_conge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande_conge`
--
ALTER TABLE `demande_conge`
  ADD CONSTRAINT `id_employés` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `id_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `id_type_conge` FOREIGN KEY (`id_type_conge`) REFERENCES `type_conge` (`id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `service_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
