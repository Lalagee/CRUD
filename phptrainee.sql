-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2020 at 02:58 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptrainee`
--

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `Pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`Pid`, `title`, `Description`, `id`) VALUES
(2, 'Corona', 'it is very danger', 2),
(14, 'PHP', '    if u are give the regular  fggfgsdfagdfg', 1),
(19, 'PHP', '  sdfsdfsd sdfdfsdf  sdfsdafsdjfsdafsdafsdfsdaf ', 1),
(21, 'PHP', ' we both are yyyyyy', 1),
(24, 'Corona', ' it is a dangerous virus ', 1),
(25, 'Something', 'Corona is a dangerous virus', 1),
(26, 'PHP', 'Php is server side script', 1),
(27, 'Training', 'we both are trainees', 1),
(29, 'PHP', 'we both are trainees of php', 1),
(30, 'PHP', 'we both are trainees of php', 1),
(31, 'PHP', 'Php is server side script', 1),
(32, 'PHP', 'hello how r u', 1),
(33, 'PHP', 'Php is server side script', 1),
(34, 'today 321', 'we both are trainees', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userregis`
--

CREATE TABLE `userregis` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Uemail` varchar(255) NOT NULL,
  `Upass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregis`
--

INSERT INTO `userregis` (`id`, `Username`, `Uemail`, `Upass`) VALUES
(1, 'Tariq', 'tariq.mahmood@salsoft.net', '123456789'),
(2, 'tariq mahmood', 'asdasd@gmail.com', '123'),
(3, 'saqib ali', 'asd@gmail.com', '123'),
(4, 'Tariq', 'asdfasdf@asdf.com', '1234'),
(5, 'Subhan Tariq', 'tariq.mahmood@salsoft.net.pk', '7654'),
(6, 'Tariq', 'test12@test.com', '1234'),
(7, 'john', 'rehman@jds', 'sdd'),
(8, 'aqaa', 'aa@ddddd', 'asas'),
(9, 'asdads', 'a123@dd', '1234'),
(10, 'john', 'test1@test.com', '12345'),
(11, 'saqib ali', 'asd12@gmail.com', '1234'),
(12, 'manzoor', 'asd112@gmail.com', '123'),
(13, 'Coro', 'asdasd12@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `userregis`
--
ALTER TABLE `userregis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `userregis`
--
ALTER TABLE `userregis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userregis` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
