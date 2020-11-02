-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 01:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `millionaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(12, 'daniel', 'daniel@test.com', 'd83ccfea485ef533a51d309d953472b5'),
(14, 'john.doe', 'john@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(256) NOT NULL,
  `level` varchar(16) NOT NULL,
  `answer1` varchar(128) NOT NULL,
  `answer2` varchar(128) NOT NULL,
  `answer3` varchar(128) NOT NULL,
  `answer4` varchar(128) NOT NULL,
  `correct` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `level`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
(11, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(12, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(13, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(14, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(15, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(16, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(17, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(18, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(19, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(20, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(21, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(22, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(23, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(24, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(25, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(26, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(27, 'Question', '0', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(28, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(29, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(30, 'Question', '1', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(31, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1),
(32, 'Question', '2', 'Answer1', 'Answer2', 'Answer3', 'Answer4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
