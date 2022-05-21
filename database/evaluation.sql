-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 21 Mai 2022 à 10:22
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `numero` varchar(255) NOT NULL,
  `insurance` date DEFAULT NULL,
  `technical_visit` date DEFAULT NULL,
  `car_brand_id` int(11) NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `oil_change` int(11) NOT NULL,
  `tire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `car`
--

INSERT INTO `car` (`numero`, `insurance`, `technical_visit`, `car_brand_id`, `car_type_id`, `car_model`, `is_available`, `oil_change`, `tire`) VALUES
('1000TAJ', '2022-06-10', '2022-06-10', 4, 1, '3008', 0, 4430, 1430),
('1780TBA', '2022-05-30', '2022-05-30', 3, 2, 'Touareg 2', 0, 4500, 1500),
('8709TBB', '2022-04-01', '2022-04-01', 3, 3, 'Amarok', 0, 5000, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `car_brand`
--

CREATE TABLE `car_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `car_brand`
--

INSERT INTO `car_brand` (`id`, `name`) VALUES
(1, 'Ford'),
(2, 'Mercedes'),
(3, 'Volkswagen'),
(4, 'Pegeout'),
(5, 'Toyota'),
(6, 'Bmx');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `car_daily_travel`
--
CREATE TABLE `car_daily_travel` (
`car_id` varchar(255)
,`date` date
,`km` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `car_details`
--
CREATE TABLE `car_details` (
`numero` varchar(255)
,`insurance` date
,`technical_visit` date
,`brand` varchar(255)
,`type` varchar(255)
,`car_model` varchar(255)
,`is_available` tinyint(1)
,`oil_change` int(11)
,`tire` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `car_brand_id` int(11) DEFAULT NULL,
  `car_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `car_type`
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `car_type`
--

INSERT INTO `car_type` (`id`, `name`) VALUES
(1, 'Legère'),
(2, 'SUV'),
(3, 'Utilitaire'),
(4, 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `driver`
--

INSERT INTO `driver` (`id`, `login`, `password`) VALUES
(1, 'jean', '1234');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `due_state`
--
CREATE TABLE `due_state` (
`numero` varchar(255)
,`insurance` date
,`insurance_day_left` int(7)
,`technical_visit` date
,`tech_day_left` int(7)
,`brand` varchar(255)
,`type` varchar(255)
,`car_model` varchar(255)
,`is_available` tinyint(1)
);

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `end_km` int(11) NOT NULL,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_place` varchar(255) DEFAULT NULL,
  `fuel_price` decimal(10,2) DEFAULT NULL,
  `fuel_quantity` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `start_km` int(11) NOT NULL,
  `start_place` varchar(255) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `car_id` varchar(255) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `travel`
--

INSERT INTO `travel` (`id`, `end_km`, `end_time`, `end_place`, `fuel_price`, `fuel_quantity`, `reason`, `start_km`, `start_place`, `start_time`, `car_id`, `driver_id`) VALUES
(1, 200, '2022-05-21 12:10:00', 'Manjakandriana', '2000.00', 20, 'Premier voyage', 105, 'Garage', '2022-05-21 10:08:00', '1000TAJ', 1),
(2, 310, '2022-05-23 12:14:00', 'Garage', '1000.00', 20, 'Mody', 220, 'Manjakandriana', '2022-05-23 10:09:00', '1000TAJ', 1),
(3, 600, '2022-05-21 20:13:00', 'Toamasina', '2000.00', 100, 'Transport', 100, 'Garage', '2022-05-21 10:12:00', '1780TBA', 1),
(4, 650, '2022-05-21 10:16:36', 'Fenerive Est', '5000.00', 50, 'Balade', 510, 'Toamasina', '2022-05-22 10:14:00', '1780TBA', 1),
(5, 800, '2022-05-24 20:19:33', 'Garage', '1000.00', 100, 'Mody', 555, 'Fenerive Est', '2022-05-24 04:18:00', '1780TBA', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `travel_details`
--
CREATE TABLE `travel_details` (
`id` int(11)
,`end_km` int(11)
,`end_time` timestamp
,`end_place` varchar(255)
,`start_km` int(11)
,`start_time` timestamp
,`start_place` varchar(255)
,`fuel_price` decimal(10,2)
,`fuel_quantity` int(11)
,`reason` varchar(255)
,`car_id` varchar(255)
,`driver` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la vue `car_daily_travel`
--
DROP TABLE IF EXISTS `car_daily_travel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car_daily_travel`  AS  select `travel`.`car_id` AS `car_id`,cast(`travel`.`start_time` as date) AS `date`,sum((`travel`.`end_km` - `travel`.`start_km`)) AS `km` from `travel` group by `travel`.`car_id`,cast(`travel`.`start_time` as date) ;

-- --------------------------------------------------------

--
-- Structure de la vue `car_details`
--
DROP TABLE IF EXISTS `car_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car_details`  AS  select `car`.`numero` AS `numero`,`car`.`insurance` AS `insurance`,`car`.`technical_visit` AS `technical_visit`,`car_brand`.`name` AS `brand`,`car_type`.`name` AS `type`,`car`.`car_model` AS `car_model`,`car`.`is_available` AS `is_available`,`car`.`oil_change` AS `oil_change`,`car`.`tire` AS `tire` from ((`car` join `car_brand` on((`car`.`car_brand_id` = `car_brand`.`id`))) join `car_type` on((`car`.`car_type_id` = `car_type`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `due_state`
--
DROP TABLE IF EXISTS `due_state`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `due_state`  AS  select `car`.`numero` AS `numero`,`car`.`insurance` AS `insurance`,(to_days(`car`.`insurance`) - to_days(curdate())) AS `insurance_day_left`,`car`.`technical_visit` AS `technical_visit`,(to_days(`car`.`technical_visit`) - to_days(curdate())) AS `tech_day_left`,`car_brand`.`name` AS `brand`,`car_type`.`name` AS `type`,`car`.`car_model` AS `car_model`,`car`.`is_available` AS `is_available` from ((`car` join `car_brand` on((`car`.`car_brand_id` = `car_brand`.`id`))) join `car_type` on((`car`.`car_type_id` = `car_type`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `travel_details`
--
DROP TABLE IF EXISTS `travel_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `travel_details`  AS  select `travel`.`id` AS `id`,`travel`.`end_km` AS `end_km`,`travel`.`end_time` AS `end_time`,`travel`.`end_place` AS `end_place`,`travel`.`start_km` AS `start_km`,`travel`.`start_time` AS `start_time`,`travel`.`start_place` AS `start_place`,`travel`.`fuel_price` AS `fuel_price`,`travel`.`fuel_quantity` AS `fuel_quantity`,`travel`.`reason` AS `reason`,`travel`.`car_id` AS `car_id`,`driver`.`login` AS `driver` from (`travel` join `driver` on((`travel`.`driver_id` = `driver`.`id`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `car_brand_id` (`car_brand_id`),
  ADD KEY `car_type_id` (`car_type_id`);

--
-- Index pour la table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_car_brand` FOREIGN KEY (`car_brand_id`) REFERENCES `car_brand` (`id`),
  ADD CONSTRAINT `fk_car_type` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`id`);

--
-- Contraintes pour la table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `fk_travel_car` FOREIGN KEY (`car_id`) REFERENCES `car` (`numero`),
  ADD CONSTRAINT `fk_travel_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
