-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2018 at 01:26 PM
-- Server version: 5.6.20-log
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scsprj`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `department` varchar(50) NOT NULL DEFAULT '0',
  `subjects` varchar(250) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department`, `subjects`, `created_at`) VALUES
(1, 'engineering', 'science', 'mathematics,physics,chemistry,english,biology/agricultural_science', 0),
(2, 'computer_science', 'science', 'mathematics,english,physics,chemistry,biology/agricultural_science', 0),
(3, 'agricultural_engineering', 'science', 'mathematics,english,physics,chemistry,agricultural_science', 0),
(4, 'accounting', 'commercial', 'mathematics,english,accounting,biology,eonomics/commerce', 0),
(5, 'banking_and_finance', 'commercial', 'mathematics,english,commerce,economics,accounting', 0),
(6, 'insurance', 'commercial', 'mathematics,english,biology,government,economics/commerce', 0),
(7, 'mass_communication', 'art', 'mathematics,english,biology,literature_in_english,government', 0),
(8, 'law', 'art', 'mathematics,english,government,IRS/CRS,literature_in_english', 0),
(9, 'art_and_design', 'art', 'mathematics,english,government,literature_in_english,biology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password_hash` varchar(60) DEFAULT NULL,
  `blocked` enum('0','1') NOT NULL DEFAULT '0',
  `admin` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `blocked`, `admin`, `created_at`) VALUES
(3, 'halmat', 'aleemisiaka@gmail.com', '$2y$10$DYvKqlUUGWjQGsKIqEykHeSH/Pop6fOMhtCXTJqZScRuSOCgxI.oa', '0', '1', 1507820801),
(5, 'RIDOHALABI', 'RILWANGANI@YAHOO.COM', '$2y$10$5MloeRn/TLbHYPY7g3Be3Oo5dFtesUX1SFpuIOEMDz/YPHDkpzaBq', '0', '1', 1508331209),
(6, 'test', 'aleemisiakfgxca@gmail.com', '$2y$10$xYgaq0IRbOj3bs34rTvDmOUCfaiI6goXlLfBaItE.NTrZmd7wLzUO', '0', '0', 1513783517),
(7, 'alabi', 'rilwangani@gmail.com', '$2y$10$7116ldRDXoC3k3PkB3Sz9.8vg9MY8CkaR.LR2D/5D0SMLFFzUZdk6', '0', '0', 1515500357),
(8, 'kehinde', 'taiwojaj@gmail.com', '$2y$10$6WDHrc7Wql91i196AOBrse0eAc231cJ.q.iTg.4jjpGZfUNvh3KYK', '0', '0', 1541853894);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
