-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 03 jan. 2024 à 17:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionbiblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `CONTENIR`
--

CREATE TABLE `CONTENIR` (
  `libelle_type` varchar(255) NOT NULL,
  `ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `EMPRUNTEURS`
--

CREATE TABLE `EMPRUNTEURS` (
  `codeBarreEmp` int(11) NOT NULL,
  `nomemp` varchar(255) NOT NULL,
  `prenomemp` varchar(255) NOT NULL,
  `telemp` char(15) NOT NULL,
  `emailemp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `EXEMPLAIRES`
--

CREATE TABLE `EXEMPLAIRES` (
  `codeBarreExemp` int(11) NOT NULL,
  `dateAquisition` date DEFAULT curdate(),
  `dureeVie` varchar(255) NOT NULL,
  `codeBarreEmp` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `numrayon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MOT_CLE`
--

CREATE TABLE `MOT_CLE` (
  `libelle_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `OUVRAGE`
--

CREATE TABLE `OUVRAGE` (
  `ISBN` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Auteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RAYONS`
--

CREATE TABLE `RAYONS` (
  `numrayon` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `numetagere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mdp`) VALUES
(1, 'luqnleng5@gmail.com', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `CONTENIR`
--
ALTER TABLE `CONTENIR`
  ADD PRIMARY KEY (`libelle_type`,`ISBN`),
  ADD KEY `fk_ouv_cont` (`ISBN`);

--
-- Index pour la table `EMPRUNTEURS`
--
ALTER TABLE `EMPRUNTEURS`
  ADD PRIMARY KEY (`codeBarreEmp`);

--
-- Index pour la table `EXEMPLAIRES`
--
ALTER TABLE `EXEMPLAIRES`
  ADD PRIMARY KEY (`codeBarreExemp`),
  ADD KEY `fk_emp_exp` (`codeBarreEmp`),
  ADD KEY `fk_ouv_exp` (`ISBN`),
  ADD KEY `fk_ray_exp` (`numrayon`);

--
-- Index pour la table `MOT_CLE`
--
ALTER TABLE `MOT_CLE`
  ADD PRIMARY KEY (`libelle_type`);

--
-- Index pour la table `OUVRAGE`
--
ALTER TABLE `OUVRAGE`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index pour la table `RAYONS`
--
ALTER TABLE `RAYONS`
  ADD PRIMARY KEY (`numrayon`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `EMPRUNTEURS`
--
ALTER TABLE `EMPRUNTEURS`
  MODIFY `codeBarreEmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `EXEMPLAIRES`
--
ALTER TABLE `EXEMPLAIRES`
  MODIFY `codeBarreExemp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `OUVRAGE`
--
ALTER TABLE `OUVRAGE`
  MODIFY `ISBN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `RAYONS`
--
ALTER TABLE `RAYONS`
  MODIFY `numrayon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `CONTENIR`
--
ALTER TABLE `CONTENIR`
  ADD CONSTRAINT `fk_mot_cont` FOREIGN KEY (`libelle_type`) REFERENCES `MOT_CLE` (`libelle_type`),
  ADD CONSTRAINT `fk_ouv_cont` FOREIGN KEY (`ISBN`) REFERENCES `OUVRAGE` (`ISBN`);

--
-- Contraintes pour la table `EXEMPLAIRES`
--
ALTER TABLE `EXEMPLAIRES`
  ADD CONSTRAINT `fk_emp_exp` FOREIGN KEY (`codeBarreEmp`) REFERENCES `EMPRUNTEURS` (`codeBarreEmp`),
  ADD CONSTRAINT `fk_ouv_exp` FOREIGN KEY (`ISBN`) REFERENCES `OUVRAGE` (`ISBN`),
  ADD CONSTRAINT `fk_ray_exp` FOREIGN KEY (`numrayon`) REFERENCES `RAYONS` (`numrayon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
