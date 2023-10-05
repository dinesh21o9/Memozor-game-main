-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2023 at 05:00 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21056940_simon`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_project`
--

CREATE TABLE `game_project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `high_score` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_project`
--

INSERT INTO `game_project` (`id`, `name`, `email`, `password_hash`, `high_score`) VALUES
(1, 'Abhishek', '1@gmail.com', '$2y$10$L2Fgi9hYRzbnpqFYmvxlc.vcz1b64i9n8sQ0FM2x8iQ4e53QwJLHm', 0),
(2, 'Dinesh surya', 'dineshsurya.2002@gmail.com', '$2y$10$JTYghLpM0f16pQZP9z7R0OtvBMK1KShdnlgmul6lCzM7ov7RG9sju', 0),
(3, 'Gidijala Uday', 'udaysrinu.786@gmail.com', '$2y$10$64.w/c5hRJFMsvRcBad1YuooUD3eFlSDI4VClWgY4OJQgp9ppYcLK', 0),
(4, 'dinesh_u_fk', 'dbra@surya.xxx', '$2y$10$yVADDRd.sJpmWhysJOz9gev.11a9IJMP/bK9wTBvKKRTb2teSOnG2', 0),
(5, 'Sirisha', 'sirisha.gidijala@gmail.com', '$2y$10$sxAt9NZms8lSZsCliNoyUORsKAKtt6NcKDkI/OiG1d9KDr6.sKlou', 0),
(6, 'Dishu raj', 'dishu@gmail.com', '$2y$10$Gh3jvgfZUuGXa706HVi27uPwkDovLiKJPbWWmphHVX66ap652YcnC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_project`
--
ALTER TABLE `game_project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_project`
--
ALTER TABLE `game_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
