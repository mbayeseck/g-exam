-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Janvier 2018 à 16:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddep`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `ANNEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `anonymat`
--

CREATE TABLE `anonymat` (
  `NUMANONYMAT` varchar(8) NOT NULL,
  `NUMBASE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `NUMBASE` int(11) NOT NULL,
  `NUMCENTRE` int(11) NOT NULL,
  `NUMSALLE` int(11) NOT NULL,
  `CNI` int(11) DEFAULT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `DATENAIS` date DEFAULT NULL,
  `LIEUNAIS` varchar(25) DEFAULT NULL,
  `GENRE` varchar(1) DEFAULT NULL,
  `PROVENANCE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `candidat`
--

INSERT INTO `candidat` (`NUMBASE`, `NUMCENTRE`, `NUMSALLE`, `CNI`, `PRENOM`, `NOM`, `DATENAIS`, `LIEUNAIS`, `GENRE`, `PROVENANCE`) VALUES
(1, 1, 20, 1101990161, 'Cheikh', 'NDIAYE', '1990-10-23', 'Dakar', 'M', 'LMS'),
(2, 1, 21, 254785547, 'Mbene', 'Pene', '1992-01-05', 'Kaolack', 'F', 'LND'),
(3, 1, 21, 254785567, 'Mbaye', 'Fall', '1991-01-05', 'Keur Massar', 'M', 'LND'),
(4, 1, 20, 254785577, 'Demba', 'DIOP', '1992-02-07', 'Kaolack', 'M', 'LND');

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `NUMCENTRE` int(11) NOT NULL,
  `NOMCENTRE` varchar(25) DEFAULT NULL,
  `REGION` varchar(15) DEFAULT NULL,
  `DEPARTEMENT` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `centre`
--

INSERT INTO `centre` (`NUMCENTRE`, `NOMCENTRE`, `REGION`, `DEPARTEMENT`) VALUES
(1, 'Dakar plateau', 'Dakar', 'Dakar'),
(2, 'Dakar parcelles', 'Dakar Banlieue', 'Dakar');

-- --------------------------------------------------------

--
-- Structure de la table `correcteur`
--

CREATE TABLE `correcteur` (
  `CODECORRECTEUR` int(11) NOT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PROVENANCE` varchar(20) DEFAULT NULL,
  `GRADE` varchar(10) DEFAULT NULL,
  `MATRICULE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `corriger`
--

CREATE TABLE `corriger` (
  `CODECORRECTEUR` int(11) NOT NULL,
  `NUMMATIERE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

CREATE TABLE `evaluer` (
  `NUMMATIERE` int(11) NOT NULL,
  `NUMEXAM` int(11) NOT NULL,
  `NOTE` decimal(2,2) DEFAULT NULL,
  `COEFFICIENT` decimal(1,0) DEFAULT NULL,
  `NOTEELIMINATOIRE` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `NUMEXAM` int(11) NOT NULL,
  `ANNEE` int(11) NOT NULL,
  `NOMEXAM` varchar(30) DEFAULT NULL,
  `NIVEAU` varchar(5) DEFAULT NULL,
  `DATEEXAM` date DEFAULT NULL,
  `SESSION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `informaticien`
--

CREATE TABLE `informaticien` (
  `NUMINFOR` int(11) NOT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PROVENANCE` varchar(20) DEFAULT NULL,
  `GRADE` varchar(10) DEFAULT NULL,
  `MATRICULE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE `inscrire` (
  `NUMBASE` int(11) NOT NULL,
  `NUMEXAM` int(11) NOT NULL,
  `FRAIS` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

CREATE TABLE `jury` (
  `NUMJURY` int(11) NOT NULL,
  `NUMCENTRE` int(11) NOT NULL,
  `NOMJURY` varchar(25) DEFAULT NULL,
  `PRESIDENT` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `NUMMATIERE` int(11) NOT NULL,
  `NOMMATIERE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organiser`
--

CREATE TABLE `organiser` (
  `NUMEXAM` int(11) NOT NULL,
  `NUMJURY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `NUMSALLE` int(11) NOT NULL,
  `NOMSALLE` varchar(10) DEFAULT NULL,
  `BATIMENT` varchar(10) DEFAULT NULL,
  `NUMCENTRE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`NUMSALLE`, `NOMSALLE`, `BATIMENT`, `NUMCENTRE`) VALUES
(20, 'Salle 20', 'A', 1),
(21, 'Salle 21', 'A', 1);

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `NUMSECRETAIRE` int(11) NOT NULL,
  `NUMJURY` int(11) NOT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PROVENANCE` varchar(20) DEFAULT NULL,
  `GRADE` varchar(10) DEFAULT NULL,
  `MATRICULE` varchar(10) DEFAULT NULL,
  `CORPS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sieger`
--

CREATE TABLE `sieger` (
  `NUMINFOR` int(11) NOT NULL,
  `NUMJURY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `NUMSPECIALITE` int(11) NOT NULL,
  `SPECIALITE` varchar(20) DEFAULT NULL,
  `NIVEAU_SPECIALITE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `surveillant`
--

CREATE TABLE `surveillant` (
  `NUMSURV` int(11) NOT NULL,
  `NUMSALLE` int(11) DEFAULT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PROVENANCE` varchar(20) DEFAULT NULL,
  `TELEPHONE` varchar(12) DEFAULT NULL,
  `DATESURV` date DEFAULT NULL,
  `HEURESMATINEE` decimal(2,0) DEFAULT NULL,
  `HEURESSOIREE` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE `tables` (
  `NUMTABLE` int(11) NOT NULL,
  `NUMSALLE` int(11) NOT NULL,
  `NOMSALLE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tour`
--

CREATE TABLE `tour` (
  `NUMTOUR` int(11) NOT NULL,
  `NUMEXAM` int(11) NOT NULL,
  `NOMTOUR` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `NUMUSER` int(11) NOT NULL,
  `LOGIN` varchar(30) DEFAULT NULL,
  `PWD` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`ANNEE`);

--
-- Index pour la table `anonymat`
--
ALTER TABLE `anonymat`
  ADD PRIMARY KEY (`NUMANONYMAT`),
  ADD KEY `FK_CONSERVER` (`NUMBASE`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`NUMBASE`),
  ADD KEY `FK_CONTENIR` (`NUMSALLE`);

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`NUMCENTRE`);

--
-- Index pour la table `correcteur`
--
ALTER TABLE `correcteur`
  ADD PRIMARY KEY (`CODECORRECTEUR`);

--
-- Index pour la table `corriger`
--
ALTER TABLE `corriger`
  ADD PRIMARY KEY (`CODECORRECTEUR`,`NUMMATIERE`),
  ADD KEY `FK_CORRIGER2` (`NUMMATIERE`);

--
-- Index pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD PRIMARY KEY (`NUMMATIERE`,`NUMEXAM`),
  ADD KEY `FK_EVALUER2` (`NUMEXAM`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`NUMEXAM`),
  ADD KEY `FK_DEROULER` (`ANNEE`);

--
-- Index pour la table `informaticien`
--
ALTER TABLE `informaticien`
  ADD PRIMARY KEY (`NUMINFOR`);

--
-- Index pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD PRIMARY KEY (`NUMBASE`,`NUMEXAM`),
  ADD KEY `FK_INSCRIRE2` (`NUMEXAM`);

--
-- Index pour la table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`NUMJURY`),
  ADD KEY `FK_REGROUPER` (`NUMCENTRE`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`NUMMATIERE`);

--
-- Index pour la table `organiser`
--
ALTER TABLE `organiser`
  ADD PRIMARY KEY (`NUMEXAM`,`NUMJURY`),
  ADD KEY `FK_ORGANISER2` (`NUMJURY`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`NUMSALLE`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`NUMSECRETAIRE`),
  ADD KEY `FK_RESIDER` (`NUMJURY`);

--
-- Index pour la table `sieger`
--
ALTER TABLE `sieger`
  ADD PRIMARY KEY (`NUMINFOR`,`NUMJURY`),
  ADD KEY `FK_SIEGER2` (`NUMJURY`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`NUMSPECIALITE`);

--
-- Index pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD PRIMARY KEY (`NUMSURV`),
  ADD KEY `FK_SURVEILLER` (`NUMSALLE`);

--
-- Index pour la table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`NUMTABLE`),
  ADD KEY `FK_AVOIR` (`NUMSALLE`);

--
-- Index pour la table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`NUMTOUR`),
  ADD KEY `FK_SE_TENIR` (`NUMEXAM`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`NUMUSER`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `anonymat`
--
ALTER TABLE `anonymat`
  ADD CONSTRAINT `FK_CONSERVER` FOREIGN KEY (`NUMBASE`) REFERENCES `candidat` (`NUMBASE`);

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_CONTENIR` FOREIGN KEY (`NUMSALLE`) REFERENCES `salle` (`NUMSALLE`);

--
-- Contraintes pour la table `corriger`
--
ALTER TABLE `corriger`
  ADD CONSTRAINT `FK_CORRIGER` FOREIGN KEY (`CODECORRECTEUR`) REFERENCES `correcteur` (`CODECORRECTEUR`),
  ADD CONSTRAINT `FK_CORRIGER2` FOREIGN KEY (`NUMMATIERE`) REFERENCES `matiere` (`NUMMATIERE`);

--
-- Contraintes pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `FK_EVALUER` FOREIGN KEY (`NUMMATIERE`) REFERENCES `matiere` (`NUMMATIERE`),
  ADD CONSTRAINT `FK_EVALUER2` FOREIGN KEY (`NUMEXAM`) REFERENCES `examen` (`NUMEXAM`);

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `FK_DEROULER` FOREIGN KEY (`ANNEE`) REFERENCES `annee` (`ANNEE`);

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `FK_INSCRIRE` FOREIGN KEY (`NUMBASE`) REFERENCES `candidat` (`NUMBASE`),
  ADD CONSTRAINT `FK_INSCRIRE2` FOREIGN KEY (`NUMEXAM`) REFERENCES `examen` (`NUMEXAM`);

--
-- Contraintes pour la table `jury`
--
ALTER TABLE `jury`
  ADD CONSTRAINT `FK_REGROUPER` FOREIGN KEY (`NUMCENTRE`) REFERENCES `centre` (`NUMCENTRE`);

--
-- Contraintes pour la table `organiser`
--
ALTER TABLE `organiser`
  ADD CONSTRAINT `FK_ORGANISER` FOREIGN KEY (`NUMEXAM`) REFERENCES `examen` (`NUMEXAM`),
  ADD CONSTRAINT `FK_ORGANISER2` FOREIGN KEY (`NUMJURY`) REFERENCES `jury` (`NUMJURY`);

--
-- Contraintes pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD CONSTRAINT `FK_RESIDER` FOREIGN KEY (`NUMJURY`) REFERENCES `jury` (`NUMJURY`);

--
-- Contraintes pour la table `sieger`
--
ALTER TABLE `sieger`
  ADD CONSTRAINT `FK_SIEGER` FOREIGN KEY (`NUMINFOR`) REFERENCES `informaticien` (`NUMINFOR`),
  ADD CONSTRAINT `FK_SIEGER2` FOREIGN KEY (`NUMJURY`) REFERENCES `jury` (`NUMJURY`);

--
-- Contraintes pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD CONSTRAINT `FK_SURVEILLER` FOREIGN KEY (`NUMSALLE`) REFERENCES `salle` (`NUMSALLE`);

--
-- Contraintes pour la table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`NUMSALLE`) REFERENCES `salle` (`NUMSALLE`);

--
-- Contraintes pour la table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `FK_SE_TENIR` FOREIGN KEY (`NUMEXAM`) REFERENCES `examen` (`NUMEXAM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
