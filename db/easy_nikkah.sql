-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2016 at 08:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy_nikkah`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `id` int(11) NOT NULL,
  `age_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beard_types`
--

CREATE TABLE `beard_types` (
  `id` int(11) NOT NULL,
  `beard_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beard_types`
--

INSERT INTO `beard_types` (`id`, `beard_type_name`) VALUES
(1, 'Yes Sunnah Beard'),
(2, 'Yes but not as per Sunnah'),
(3, 'No Beard');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasting_types`
--

CREATE TABLE `fasting_types` (
  `id` int(11) NOT NULL,
  `fasting_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasting_types`
--

INSERT INTO `fasting_types` (`id`, `fasting_type_name`) VALUES
(1, 'Only in Ramzan'),
(2, 'Ramzan & some Sunnah fasts'),
(3, 'Ramzan, some Sunnah & some Nawafil fasts');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `id` int(11) NOT NULL,
  `marital_status_name` varchar(255) NOT NULL,
  `marital_status_has_children` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `marital_status_name`, `marital_status_has_children`) VALUES
(1, 'Unmarried', 0),
(2, 'Divorced', 1),
(3, 'Widowed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `namaz_types`
--

CREATE TABLE `namaz_types` (
  `id` int(11) NOT NULL,
  `namaz_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namaz_types`
--

INSERT INTO `namaz_types` (`id`, `namaz_type_name`) VALUES
(1, 'Regular 5 times a day'),
(2, 'Sometimes but not all 5 times'),
(3, 'Only Jumuah (Friday) prayer');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` bigint(20) NOT NULL,
  `user_height` float NOT NULL,
  `user_namaz_type` int(11) NOT NULL,
  `user_fasting_type` int(11) NOT NULL,
  `user_beard_type` int(11) NOT NULL,
  `user_marital_status` int(11) NOT NULL,
  `user_children_status` enum('0','1','2') NOT NULL,
  `user_location` varchar(255) NOT NULL,
  `user_native_place` varchar(255) NOT NULL,
  `user_work_location` varchar(255) NOT NULL,
  `user_partner_age_group` int(11) NOT NULL,
  `user_partner_marital_status` int(11) NOT NULL,
  `user_partner_current_location` varchar(255) NOT NULL,
  `user_partner_native_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `gender`, `age`, `user_height`, `user_namaz_type`, `user_fasting_type`, `user_beard_type`, `user_marital_status`, `user_children_status`, `user_location`, `user_native_place`, `user_work_location`, `user_partner_age_group`, `user_partner_marital_status`, `user_partner_current_location`, `user_partner_native_location`) VALUES
(3, 'fahad1', 'fahad.braveknight@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 1428098400, 2, 0, 1, 2, 2, '1', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_contact_person`
--

CREATE TABLE `user_has_contact_person` (
  `id` int(11) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `contact_person_phone_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beard_types`
--
ALTER TABLE `beard_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasting_types`
--
ALTER TABLE `fasting_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `namaz_types`
--
ALTER TABLE `namaz_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_contact_person`
--
ALTER TABLE `user_has_contact_person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beard_types`
--
ALTER TABLE `beard_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasting_types`
--
ALTER TABLE `fasting_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `namaz_types`
--
ALTER TABLE `namaz_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_has_contact_person`
--
ALTER TABLE `user_has_contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
