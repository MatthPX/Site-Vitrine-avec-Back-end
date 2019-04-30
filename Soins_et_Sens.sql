-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 30 Avril 2019 à 11:45
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Soins et Sens`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `ID` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`ID`, `login`, `password`, `mail`) VALUES
(1, 'pmatth', '09121990', 'pmatth59@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `Statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Categories`
--

INSERT INTO `Categories` (`ID`, `Nom`, `Statut`) VALUES
(1, 'Massage Visage', 1),
(2, 'Massage Corps', 0),
(3, 'Réflexologie Plantaire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `ID` int(10) NOT NULL,
  `ID_client` int(10) NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`ID`, `ID_client`, `prix_total`, `Date`) VALUES
(5, 5, '140', '2019-04-15'),
(6, 5, '140', '2019-04-15'),
(7, 5, '140', '2019-04-15'),
(8, 5, '140', '2019-04-15'),
(9, 5, '140', '2019-04-15'),
(10, 5, '140', '2019-04-15'),
(11, 5, '155', '2019-04-15'),
(12, 6, '275', '2019-04-18');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `ID` int(10) NOT NULL,
  `ID_commande` int(10) NOT NULL,
  `ID_soins` int(10) UNSIGNED NOT NULL,
  `Quantité` int(11) NOT NULL,
  `Prix_Unitaire` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`ID`, `ID_commande`, `ID_soins`, `Quantité`, `Prix_Unitaire`) VALUES
(1, 5, 6, 1, '50.00'),
(2, 5, 5, 1, '30.00'),
(3, 5, 4, 1, '60.00'),
(4, 6, 6, 1, '50.00'),
(5, 6, 5, 1, '30.00'),
(6, 6, 4, 1, '60.00'),
(7, 7, 6, 1, '50.00'),
(8, 7, 5, 1, '30.00'),
(9, 7, 4, 1, '60.00'),
(13, 9, 6, 1, '50.00'),
(14, 9, 5, 1, '30.00'),
(15, 9, 4, 1, '60.00'),
(16, 10, 6, 1, '50.00'),
(17, 10, 5, 1, '30.00'),
(18, 10, 4, 1, '60.00'),
(19, 11, 6, 1, '50.00'),
(20, 11, 5, 1, '30.00'),
(21, 11, 2, 1, '75.00'),
(23, 12, 2, 1, '75.00');

-- --------------------------------------------------------

--
-- Structure de la table `Livre_or`
--

CREATE TABLE `Livre_or` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Titre` text NOT NULL,
  `Note` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Commentaire` text NOT NULL,
  `Nom` text NOT NULL,
  `Email` text NOT NULL,
  `Statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Livre_or`
--

INSERT INTO `Livre_or` (`ID`, `Titre`, `Note`, `Date`, `Commentaire`, `Nom`, `Email`, `Statut`) VALUES
(1, 'Un vrai voyage des sens', 5, '2019-04-08', 'Un éveil magique des sens. Rassurez-vous, la transition de Stéphanie entre les soins est très fluide, l\'ambiance sonore, les parfums, le message étaient relaxants. Un vrai voyage ! Stéphanie dégage une énergie très positive. Je recommande vivement les soins. Merci encore.', 'Emeline D.', 'EmelineD@gmail.com', 1),
(2, 'Détente assurée', 4, '2019-04-02', 'Très bon accueil dans un cadre agréable, j\'ai bénéficié d\'un massage complet et de grande qualité et suis ressortie détendue et ressourcée. Merci beaucoup.', 'Hélène S.', 'HélèneS@gmail.com', 1),
(3, 'Décevant', 1, '2017-04-01', 'Très décu ! Stéphanie a refusé de m\'accorder les petits extras que je lui ai demandé.', 'Arthur G. ', 'ArthurG@gmail.com ', 1),
(4, 'Relaxation garantie ', 4, '2019-01-01', '\r\n\r\nRelaxation et évasion assurées. La sensation procurée par les pierres chaudes est très agréable et reposante. En plus de cela, table chauffante, stimulation de l\'odorat, l\'ouïe etc. Bien plus qu\'un simple massage bien-être, l\'accent est mis sur la relaxation avec l\'imagerie mentale, l\'introspection et la respiration. Après une heure de massage/relaxation, on en ressort complètement relâché, apaisé et réénergisé à condition de savoir lâcher prise. Je recommande fortement, bon accueil et on sent l\'expérience de la praticienne.', 'Romain B.', 'RomainB@gmail.com', 0),
(6, 'Formidable TEST', 4, '2019-04-16', 'superbe prestation', 'jean-marie LE Test', 'Letest@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Soins`
--

CREATE TABLE `Soins` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Prix` decimal(10,0) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `Durée` int(11) NOT NULL,
  `Publié` tinyint(1) NOT NULL,
  `Nouveau` tinyint(1) NOT NULL,
  `Promu` tinyint(1) NOT NULL,
  `photo_mobile` varchar(250) DEFAULT NULL,
  `photo_tablette` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Soins`
--

INSERT INTO `Soins` (`ID`, `Nom`, `Description`, `Photo`, `Prix`, `id_cat`, `Durée`, `Publié`, `Nouveau`, `Promu`, `photo_mobile`, `photo_tablette`) VALUES
(1, 'Massage de la tête', 'Massage-lissage du crâne avec de l’huile chaude, ce soin stimule le cuir chevelu ; vos cheveux sont plus doux et brillants.Il procure un grand apaisement; diminue les tensions, fait baisser le stress et l’anxiété et permet le vide mental et prépare au sommeil.', 'massage-tete.jpg', '35', 1, 40, 1, 1, 1, 'massage-tete.jpg', 'massage-tete-300x199.jpg'),
(2, 'Soin relaxant aux pochons chauds', 'Les pochons renferment des plantes, des herbes aromatiques et des huiles essentielles, bourrées de principes actifs libérés sous l’action de la chaleur.Ce soin permet de dénouer les tensions et raideurs musculaires, il apporte une grande relaxation, grâce à la température de l’huile, des pochons et des massages effectués sur les muscles et points énergétiques. C’est un grand moment de détente.', 'soin-relaxant-pochon-chaud.jpg', '75', 1, 72, 1, 1, 1, '', ''),
(3, 'Massage californien ', 'Ce soin relaxant complet du corps et de tête avec étirement, flexion, pression, lissage, procure douceur, bien - être et équilibre.Il permet d\'éliminer les toxines etd écontracte les muscles.Il favorise la détente, évacue les tensions, la nervosité, les émotions et permet de retrouver de la vitalité.', 'massage-californien.jpg', '63', 1, 60, 1, 1, 1, '', ''),
(4, 'Massage abhyanga', 'Originaire de l’Inde, le massage Abhyanga* s’appuie sur les 7 centres énergétiques du corps (les chakras) et il est avant tout un soin rééquilibrant. Le masseur va agir sur les nadis, les trajets de l’énergie sur lesquels sont répartis des points de pression, pour permettre à l’énergie vitale (le prana dans la tradition ayurvédique) de circuler librement et harmonieusement dans tout le corps.', 'massage-abhyanga.jpg', '75', 1, 60, 1, 1, 1, '', ''),
(5, 'Detente du dos', 'Il s\'agit d\'un massage complet du dos avec de l’huile chaude vous apportant détente générale et bien - être.Ce massage permet de dénouer les tensions nerveuses et musculaires. Idéal pour un premier massage et pour les messieurs.', 'massage-detente-dos.jpg', '33', 1, 20, 1, 1, 1, '', ''),
(6, 'Réflexologie plantaire', 'Plus qu\'un simple massage des pieds, la réflexologie plantaire procure une détente profonde et a un effet dynamisant sur tout l\'organisme.\r\n\r\nSelon la médecine traditionnelle chinoise, tous nos organes sont représentés dans le pied. Une pression des doigts sur un point particulier permet ainsi d\'exercer une action à distance.', 'reflexologie-plantaire-200x133.jpg', '50', 3, 50, 1, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `Prenom` varchar(250) NOT NULL,
  `Adresse` varchar(250) NOT NULL,
  `CP` int(11) NOT NULL,
  `Ville` varchar(250) NOT NULL,
  `Tel` varchar(250) NOT NULL,
  `Mail` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID`, `Nom`, `Prenom`, `Adresse`, `CP`, `Ville`, `Tel`, `Mail`, `Password`) VALUES
(3, 'fred', 'dupont', 'testpw hash', 59000, 'test pw hash', '066969694', 'pwhash@gmail.com', '$2y$10$1YZwSMb3q8prQho7ZFJBq.XSILSKGyt4POa7LTKbaXHq1mgj4Vpbi'),
(5, 'Proix', 'MAtthieu', '428 rue leon gambetta', 59800, 'Lille', '0650810974', 'pmatth59@gmail.com', '$2y$10$wcZz9OVC7hFGbisgaRJ6m.OTxiKtPv286vI5AtMDnx4CjH.gvsTuy'),
(6, 'LE Test', 'jean-marie ', '39 rue pasteur', 59880, 'Saint-SaULVE', '0320810974', 'PMATTH@GMAIL.COM', '$2y$10$3flJrGRYWItLXmgdC8mSsuEdRudsJ9SjOANB6GGH.Un.GNEvJhW32');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_client` (`ID_client`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_commande` (`ID_commande`),
  ADD KEY `ID_soins` (`ID_soins`);

--
-- Index pour la table `Livre_or`
--
ALTER TABLE `Livre_or`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Soins`
--
ALTER TABLE `Soins`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `Livre_or`
--
ALTER TABLE `Livre_or`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Soins`
--
ALTER TABLE `Soins`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `Commande_ibfk_2` FOREIGN KEY (`ID_client`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`ID_soins`) REFERENCES `Soins` (`ID`),
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`ID_commande`) REFERENCES `Commande` (`ID`);

--
-- Contraintes pour la table `Soins`
--
ALTER TABLE `Soins`
  ADD CONSTRAINT `Soins_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `Categories` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
