-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 11:56 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smighties_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smighties`
--

CREATE TABLE IF NOT EXISTS `tbl_smighties` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `personality` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `weakness` varchar(255) NOT NULL,
  `fav_color` varchar(255) NOT NULL,
  `fav_food` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `element` enum('Air','Earth','Water','Light','Magic') NOT NULL,
  `rarity` enum('Super Duper Rare','Super Rare','Very rare','Rare','Limited') DEFAULT NULL,
  `sm_card` varchar(255) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `orderby` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_smighties`
--

INSERT INTO `tbl_smighties` (`id`, `name`, `image_url`, `personality`, `power`, `weakness`, `fav_color`, `fav_food`, `birthday`, `element`, `rarity`, `sm_card`, `is_active`, `orderby`, `created_on`, `updated_on`) VALUES
(1, 'Smoochie', 'kissy.png', 'Loving', 'Gives Healing Hugs and Kisses', 'Shouting Voices', 'Pink', 'Chocolate hearts', '1990-02-14', 'Magic', 'Limited', 'smoochie_card.png', 'Y', 1, '2017-04-26 00:00:00', '2017-04-26 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_smighties`
--
ALTER TABLE `tbl_smighties`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_smighties`
--
ALTER TABLE `tbl_smighties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
