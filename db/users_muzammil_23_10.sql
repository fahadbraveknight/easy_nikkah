-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2016 at 05:23 PM
-- Server version: 5.5.45-37.4-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easynika_h`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` bigint(20) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `email_verification_status` tinyint(1) NOT NULL,
  `password_change_id` varchar(100) NOT NULL,
  `password_change_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_height` varchar(255) NOT NULL,
  `user_namaz_type` enum('','regular','sometime','friday') NOT NULL DEFAULT '',
  `user_fasting_type` enum('','ramzan','ramzan_sunnah','ramzan_sunnah_nawafil') NOT NULL,
  `user_beard_type` enum('','yes_sunnah','no_sunnah','no_beard') NOT NULL,
  `user_hijab` tinyint(1) NOT NULL,
  `user_marital_status` enum('','unmarried','divorced','widowed','married') NOT NULL,
  `user_children` varchar(11) DEFAULT NULL,
  `user_location_city` int(255) NOT NULL,
  `user_location_state` int(11) NOT NULL,
  `user_location_country` int(11) NOT NULL,
  `user_native_location` varchar(255) NOT NULL,
  `user_work_location` varchar(255) NOT NULL,
  `user_partner_age_group` int(11) NOT NULL,
  `user_partner_current_location` varchar(255) NOT NULL,
  `user_partner_native_location` varchar(255) NOT NULL,
  `user_qualification` int(11) NOT NULL,
  `user_profession` int(11) NOT NULL,
  `user_father_name` varchar(255) NOT NULL,
  `user_father_profession` varchar(255) NOT NULL,
  `user_mother_name` varchar(255) NOT NULL,
  `user_mother_profession` varchar(255) NOT NULL,
  `user_brothers` int(11) NOT NULL,
  `user_married_brothers` int(11) NOT NULL,
  `user_sisters` int(11) NOT NULL,
  `user_married_sisters` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_id`, `full_name`, `email`, `password`, `gender`, `age`, `verification_id`, `email_verification_status`, `password_change_id`, `password_change_status`, `user_height`, `user_namaz_type`, `user_fasting_type`, `user_beard_type`, `user_hijab`, `user_marital_status`, `user_children`, `user_location_city`, `user_location_state`, `user_location_country`, `user_native_location`, `user_work_location`, `user_partner_age_group`, `user_partner_current_location`, `user_partner_native_location`, `user_qualification`, `user_profession`, `user_father_name`, `user_father_profession`, `user_mother_name`, `user_mother_profession`, `user_brothers`, `user_married_brothers`, `user_sisters`, `user_married_sisters`) VALUES
(3, '0', 'fahad1', 'fahad.braveknight@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 1440280800, '0', 1, '', 0, '4''12"', 'sometime', 'ramzan', 'no_sunnah', 0, 'divorced', NULL, 1, 1, 1, 'Pune Maharashtra india', 'Mumbai Maharashtra india', 1, 'Pune Maharashtra india', 'Mumbai Maharashtra india', 1, 2, '', '', '', '', 0, 0, 0, 0),
(4, '0', 'adasd', 'fahad.braveknight+1@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 374371200, '0', 1, '', 0, '4''2"', 'sometime', 'ramzan', 'yes_sunnah', 0, 'unmarried', '1', 0, 0, 7, '  India', '  Argentina', 0, '', '', 4, 6, 'fasdas', 'Private Company', 'tasneem', 'Government Firm', 3, 4, 1, 2),
(5, '0', 'asdasd', 'fahad.braveknight+2@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 343004400, '0', 0, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(6, '1', 'fahaad', 'fahad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 0, '0', 0, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(7, '2000', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+21@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 845416800, '0', 0, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(8, '2001', 'Mohamed Fahad Mohd Sajid Kheratkar', 'fahad.braveknight+22@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 1161036000, '0', 0, '', 0, '4''2"', 'sometime', 'ramzan_sunnah_nawafil', 'yes_sunnah', 0, 'unmarried', NULL, 1, 1, 1, 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', 1, 'Mumbai Maharashtra india', 'Mumbai Maharashtra india', 2, 2, '', '', '', '', 0, 0, 0, 0),
(9, '2002', 'fahad Kheratkar', 'fahad.braveknight+121@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 782175600, '0', 0, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(10, 'EN_90027', 'd', 'fahad.braveknight+12@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'male', 618969600, '6852', 1, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(14, 'EN_11346', 'Fahad', 'fahad.braveknight+878@gmail.com', '5d793fc5b00a2348c3fb9ab59e5ca98a', 'male', 1328140800, 'aMm8QxdOzDCKR6Ap9ZeGgXWVsu30SlB2IcyofhF5NtqUP4JiHv', 1, '', 0, '4''5"', 'regular', 'ramzan_sunnah', 'no_sunnah', 0, 'divorced', '8', 715, 35, 1, 'Dadra Dadar And Nagar Haveli  India', 'Garacherama Andaman & Nicobar  India', 0, '', '', 3, 2, '', '', '', '', 0, 0, 0, 0),
(16, 'EN_16', 'Fahad', 'fahad.braveknight+78@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'female', 449884800, 'Rj0flniNrWPwhbtkFqJxYE9SXz6UKQpGZ4BIo8M1yAgvsmcVC5', 1, '', 0, '4''1"', 'friday', 'ramzan_sunnah', '', 0, 'married', '3', 418, 21, 1, 'Anuppur Madhya Pradesh India', 'Mumbai Maharashtra India', 0, '', '', 6, 7, 'Sajid', 'Government Firm', 'Tasneem', 'Private Company', 1, 0, 1, 0),
(18, 'EN_18', 'Muzammil Akhtar Quadri', 'mukatuka7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 628473600, '8mKyOciSGRkMa3hVlo5r490wLJDEINZzdsgpe2vACWPBT6tbjH', 1, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0),
(19, 'EN_19', 'Asif Dange', 'asif.dange@gmail.com', '4d1d9b11a24299a89381e367f963b053', 'male', 506736000, '3IpGD01vmqUOP5gAysX9t7zrVChLH6NZF8fYxMcdQBTEl2JkSa', 1, '', 0, '', '', '', '', 0, '', NULL, 0, 0, 0, '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
