-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 oct. 2023 à 22:03
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
-- Base de données : `job_board_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `advertisement`
--

CREATE TABLE `advertisement` (
  `id_adv` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `post_date` date NOT NULL DEFAULT current_timestamp(),
  `wage` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `contract_type` enum('CDD','CDI','Stage','Alternant','Interim') NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `advertisement`
--

INSERT INTO `advertisement` (`id_adv`, `title`, `description`, `post_date`, `wage`, `place`, `contract_type`, `id_company`) VALUES
(1, 'Développeur FullStack H/F', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis tortor nisl. Donec urna orci, imperdiet nec tincidunt eget, imperdiet at mauris. Sed interdum mauris aliquet volutpat imperdiet. Fusce pellentesque lectus in augue eleifend, quis lacinia augue faucibus. Nunc ut dolor pretium, congue justo eget, molestie ex. Sed maximus posuere nisl eget consectetur. Suspendisse tristique magna a diam lobortis, fringilla consequat metus rhoncus. Cras pulvinar cursus imperdiet. Praesent risus mi, laoreet in pharetra vel, venenatis accumsan ligula. Integer in iaculis lacus. Mauris consequat consectetur tincidunt. Proin ultrices arcu id nulla eleifend, nec condimentum leo commodo. Donec justo justo, malesuada ac pulvinar quis, cursus et sem.\r\n\r\nPellentesque dapibus efficitur eleifend. Proin vestibulum sagittis gravida. Integer id elit hendrerit, aliquam justo id, iaculis nunc. Ut lobortis urna eros, faucibus sollicitudin ligula consectetur semper. Vivamus rhoncus lectus eget mattis maximus. Aliquam ac gravida libero. Mauris egestas augue mattis lorem rutrum viverra. Phasellus malesuada lacinia justo a pharetra.\r\n\r\nPraesent molestie dui tortor, ac auctor lorem scelerisque in. Fusce quis orci tempor, sodales ex a, eleifend tellus. Donec dolor lacus, bibendum in velit vitae, suscipit semper massa. Vestibulum ac enim eget orci tristique imperdiet. Nullam hendrerit tempor vehicula. Ut in ligula massa. Praesent sit amet. ', '2023-10-10', 40000, 'Nancy', 'CDI', 2),
(2, 'Administrateur Système et Réseau H/F', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula eu justo non venenatis. Nullam diam augue, molestie at tortor vitae, mollis tempor ex. Donec varius pellentesque lectus, at condimentum nibh cursus vitae. Ut vitae tincidunt lacus. Nunc sed scelerisque lorem. In ut risus sed sem aliquam dapibus sit amet in massa. Morbi nec aliquam elit. Mauris ornare ipsum a purus suscipit, a maximus nisl mollis. Nullam sed lorem vel purus tristique venenatis. Donec consectetur augue vel felis fringilla, a efficitur orci varius. Mauris sed sagittis ipsum. Aenean ullamcorper velit in lacinia mattis. Aliquam erat volutpat. Vivamus bibendum tristique sodales.\r\n\r\nPellentesque tincidunt magna vitae eros luctus laoreet. Nam malesuada non metus nec scelerisque. Pellentesque eu orci nec velit tincidunt sodales et a erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dictum justo vitae metus rhoncus molestie. Integer vehicula pulvinar magna nec mollis. Duis ex ante, gravida ut dolor. ', '2023-10-10', 45000, 'Vandoeuvre les Nancy', 'CDI', 1),
(5, 'DevOps H/F', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula eu justo non venenatis. Nullam diam augue, molestie at tortor vitae, mollis tempor ex. Donec varius pellentesque lectus, at condimentum nibh cursus vitae. Ut vitae tincidunt lacus. Nunc sed scelerisque lorem. In ut risus sed sem aliquam dapibus sit amet in massa. Morbi nec aliquam elit. Mauris ornare ipsum a purus suscipit, a maximus nisl mollis. Nullam sed lorem vel purus tristique venenatis. Donec consectetur augue vel felis fringilla, a efficitur orci varius. Mauris sed sagittis ipsum. Aenean ullamcorper velit in lacinia mattis. Aliquam erat volutpat. Vivamus bibendum tristique sodales.\r\n\r\nPellentesque tincidunt magna vitae eros luctus laoreet. Nam malesuada non metus nec scelerisque. Pellentesque eu orci nec velit tincidunt sodales et a erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dictum justo vitae metus rhoncus molestie. Integer vehicula pulvinar magna nec mollis. Duis ex ante, gravida ut dolor. ', '2023-10-06', 50000, 'Nancy', 'CDI', 3),
(6, 'Développeur COBOL', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit odio, condimentum vestibulum orci sollicitudin, tincidunt tincidunt urna. Aliquam vel pharetra dui. Vivamus nec facilisis orci. Sed tempus, libero in aliquet volutpat, nunc lacus egestas nunc, nec placerat nunc nisl tempus ante. Integer efficitur est justo, vitae hendrerit ex consectetur sit amet. Suspendisse hendrerit metus nec accumsan tincidunt. Vivamus accumsan turpis sit amet metus vestibulum, nec aliquet turpis semper.\r\n\r\nInteger interdum eu justo ac semper. Donec gravida ante in velit consectetur fermentum. Aenean neque odio, finibus eget ultricies a, commodo vel elit. Mauris convallis molestie purus vitae fermentum. Sed imperdiet molestie mauris non sodales. Nam molestie dui ut odio vehicula mollis in in erat. Suspendisse laoreet vulputate lectus. Proin vel mollis elit. Aliquam porttitor, diam sed vulputate maximus, sapien velit tincidunt est, vitae gravida arcu tortor id est. Duis vel laoreet lacus. Curabitur convallis egestas justo, a ultrices nisl euismod ut.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Duis sit amet mauris lacinia, vehicula massa non, facilisis felis. Fusce non tempus erat. Proin eu iaculis arcu, quis scelerisque lorem. Mauris nec fringilla est, eu semper mauris. Nam cursus quam quis sagittis luctus. Nullam justo diam, vehicula accumsan leo non, suscipit fermentum tellus.\r\n\r\nDonec ut condimentum sem, a maximus sapien. Fusce pretium nisl sed urna euismod, euismod dignissim massa rhoncus. Cras id purus enim. Nunc at lorem quis justo egestas accumsan ut at ex. Etiam diam magna, fermentum at libero sed, tincidunt egestas mi. Nullam eleifend sapien eu dolor commodo dignissim. Nulla facilisi. Nulla ut laoreet sem. Nam ultricies egestas arcu et convallis. Etiam eleifend sodales orci, nec viverra lectus laoreet sit amet. Sed sed massa nec ligula convallis congue. Curabitur a dapibus ligula. In hac habitasse platea dictumst. Maecenas semper ut odio nec aliquet. In cursus dapibus. ', '2023-10-11', 65000, 'Luxembourg', 'CDI', 4),
(7, 'Agent d\'accueil H/F', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-10-19', 25000, 'Nancy', 'CDI', 2);

-- --------------------------------------------------------

--
-- Structure de la table `candidacy`
--

CREATE TABLE `candidacy` (
  `id_candidacy` int(11) NOT NULL,
  `id_adv` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_candidacy` date NOT NULL DEFAULT current_timestamp(),
  `mail_content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_address`, `email`, `tel`) VALUES
(1, 'ARKETEAM', 'Vandoeuvre les Nancy', 'contact@arketeam.com', '0384632597'),
(2, '60fps', 'Nancy', 'hello@60fps.fr', '0649874411'),
(3, 'BPI France', 'Nancy', 'contact@bpifrance.fr', '0383674674'),
(4, 'BCL - Banque Centrale du Luxembourg', 'Luxembourg', 'contact@bcl.lu', '+352689874');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(320) NOT NULL,
  `pwd_user` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `user_fullname`, `birthdate`, `email`, `pwd_user`, `tel`, `is_admin`) VALUES
(2, 'admin', '1999-06-29', 'admin@dmin.fr', '$2y$10$dPorOoyyXq8fmNy5HGIG4uPhRlKNErp0LtmSBcy/YVM7GAGSXNlE2', '0778840661', 1),
(4, 'Laurent Ipsum', '1992-07-13', 'ipsumlaurent@gmail.com', '$2y$10$EZ3El8ShxOfOiXH77317Ietl04Q6QOYLx9U6kGAOLSqMVAYgjtPaW', '0654879532', 0),
(9, 'Didier Martin', '1982-05-01', 'mardid@mail.com', '$2y$10$xxd51jJDpbBNA9Kw9y4awOUzBvJlBbXw/EaeWZErBs0TpSsM9R/jG', '0648953164', 0),
(11, 'Benoit Dufour', '1984-02-07', 'benoit.dufour@gmail.fr', '$2y$10$XnrKxuzRcFoS9dJPCIMz/On0e6Pq///kaTRb.NbQuW5TPDs6iK0mG', '0659846325', 0),
(14, 'Pierre Laroche', '2001-02-01', 'laroche.pierre@gmail.com', '$2y$10$1PWUULZj7bWHrhtpiQomQO/CVq6BIO29WViwZRv6pVcRM3YengKeC', '0685946731', 0),
(19, 'Laurent Blanc', '1974-09-03', 'lolowhite@gmail.com', '$2y$10$S8ZfesDqgY3K0vlOrN465uxlthjrlgP8dkWnHRajnXAD2fp9/S2xy', '0658497842', 0),
(21, 'Didier Deschamps', '1971-05-17', 'dider.deschamps@fff.fr', '$2y$10$VJrY5/FCtaeO2p679Ro9xu1/bD.aeADaI4CJBnoXEz63PVGYKoXYW', '0635489751', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id_adv`),
  ADD KEY `id_company` (`id_company`);

--
-- Index pour la table `candidacy`
--
ALTER TABLE `candidacy`
  ADD PRIMARY KEY (`id_candidacy`),
  ADD KEY `id_adv` (`id_adv`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`,`tel`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`,`tel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id_adv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `candidacy`
--
ALTER TABLE `candidacy`
  MODIFY `id_candidacy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `id_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Contraintes pour la table `candidacy`
--
ALTER TABLE `candidacy`
  ADD CONSTRAINT `id_adv` FOREIGN KEY (`id_adv`) REFERENCES `advertisement` (`id_adv`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
