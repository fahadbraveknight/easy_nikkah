-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 08:05 PM
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

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`id`, `age_group`) VALUES
(1, '(16-20)'),
(2, '(20-24)');

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
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city_name`) VALUES
(1, 1, 'Mumbai'),
(2, 1, 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'india');

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
-- Table structure for table `hijab_types`
--

CREATE TABLE `hijab_types` (
  `id` int(11) NOT NULL,
  `hijab_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `profession_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `profession_name`) VALUES
(1, 'Doctor'),
(2, 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `qualification_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `qualification_name`) VALUES
(1, 'S.S.C'),
(2, 'H.S.C');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`) VALUES
(1, 'Maharashtra', 1),
(2, 'Goa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` bigint(20) NOT NULL,
  `user_personal_description` text NOT NULL,
  `user_height` varchar(255) NOT NULL,
  `user_namaz_type` int(11) NOT NULL,
  `user_fasting_type` int(11) NOT NULL,
  `user_beard_type` int(11) NOT NULL,
  `user_marital_status` int(11) NOT NULL,
  `user_children_status` enum('0','1','2') NOT NULL,
  `user_location_city` int(255) NOT NULL,
  `user_location_state` int(11) NOT NULL,
  `user_location_country` int(11) NOT NULL,
  `user_native_location` varchar(255) NOT NULL,
  `user_work_location` varchar(255) NOT NULL,
  `user_partner_age_group` int(11) NOT NULL,
  `user_partner_current_location` varchar(255) NOT NULL,
  `user_partner_native_location` varchar(255) NOT NULL,
  `user_qualification` int(11) NOT NULL,
  `user_profession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_id`, `full_name`, `email`, `password`, `gender`, `age`, `user_personal_description`, `user_height`, `user_namaz_type`, `user_fasting_type`, `user_beard_type`, `user_marital_status`, `user_children_status`, `user_location_city`, `user_location_state`, `user_location_country`, `user_native_location`, `user_work_location`, `user_partner_age_group`, `user_partner_current_location`, `user_partner_native_location`, `user_qualification`, `user_profession`) VALUES
(3, 0, 'fahad1', 'fahad.braveknight@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 1440280800, 'sdjasoidjasjdoasdoiasiodjasodjoasjdojasjdasojdasjdasoidjasoijdoasjdoa', '4''12"', 2, 1, 2, 2, '1', 1, 1, 1, 'Pune Maharashtra india', 'Mumbai Maharashtra india', 1, 'Pune Maharashtra india', 'Mumbai Maharashtra india', 1, 2),
(4, 0, 'adasd', 'fahad.braveknight+1@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 374454000, '', '', 0, 0, 0, 0, '0', 0, 0, 0, '', '', 0, '', '', 0, 0),
(5, 0, 'asdasd', 'fahad.braveknight+2@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 343004400, '', '', 0, 0, 0, 0, '0', 0, 0, 0, '', '', 0, '', '', 0, 0),
(6, 1, 'fahaad', 'fahad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 0, '', '', 0, 0, 0, 0, '0', 0, 0, 0, '', '', 0, '', '', 0, 0),
(7, 2000, 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+21@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 845416800, '', '', 0, 0, 0, 0, '0', 0, 0, 0, '', '', 0, '', '', 0, 0),
(8, 2001, 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+22@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 1161036000, 'I am awesome', '4''2"', 2, 3, 1, 1, '0', 1, 1, 1, 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', 1, 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', 2, 2),
(9, 2002, 'fahad Kheratkar', 'fahad.braveknight+121@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 782175600, '', '', 0, 0, 0, 0, '0', 0, 0, 0, '', '', 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_contact_person`
--

CREATE TABLE `user_has_contact_person` (
  `id` int(11) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `contact_person_phone_no` int(11) NOT NULL,
  `contact_person_relation` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_contact_person`
--

INSERT INTO `user_has_contact_person` (`id`, `contact_person_name`, `contact_person_email`, `contact_person_phone_no`, `contact_person_relation`, `user_id`) VALUES
(17, 'fahad', 'fahad/cpmasda', 2147483647, 'son', 3),
(18, 'tasneem', 'fahad/cpmasdaasdasd', 2147483647, 'mother', 3),
(19, 'Sajid', 'sajidark@ymail.com', 2147483647, 'father', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_family`
--

CREATE TABLE `user_has_family` (
  `id` int(11) NOT NULL,
  `family_member_name` varchar(255) NOT NULL,
  `family_member_relation` varchar(255) NOT NULL,
  `family_member_marital_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_family`
--

INSERT INTO `user_has_family` (`id`, `family_member_name`, `family_member_relation`, `family_member_marital_status`, `user_id`) VALUES
(7, 'tasneem', 'mother', 2, 3),
(8, 'tasneem', 'mother', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_partner_marital_statuses`
--

CREATE TABLE `user_has_partner_marital_statuses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_partner_marital_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_partner_marital_statuses`
--

INSERT INTO `user_has_partner_marital_statuses` (`id`, `user_id`, `user_partner_marital_status`) VALUES
(17, 3, 2),
(18, 3, 3),
(21, 8, 3);

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasting_types`
--
ALTER TABLE `fasting_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hijab_types`
--
ALTER TABLE `hijab_types`
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
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
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
-- Indexes for table `user_has_family`
--
ALTER TABLE `user_has_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_partner_marital_statuses`
--
ALTER TABLE `user_has_partner_marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `beard_types`
--
ALTER TABLE `beard_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fasting_types`
--
ALTER TABLE `fasting_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hijab_types`
--
ALTER TABLE `hijab_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_has_contact_person`
--
ALTER TABLE `user_has_contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_has_family`
--
ALTER TABLE `user_has_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_has_partner_marital_statuses`
--
ALTER TABLE `user_has_partner_marital_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
