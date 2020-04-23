-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 05:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weendigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `pk` int(10) UNSIGNED NOT NULL,
  'id' varchar(30) NOT NULL,
  'nick' varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  'status' smallint(1) NOT NULL DEFAULT 0,
  'auth' smallint(1) NOT NULL DEFAULT 0,
  'prof' int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--
/*status 0=normal 1= banned 2=sleep*/
/*auth 0 = none auth <= account will be removed in 3 days) , 1= email auth,2 phone auth,3 admin*/
/*id and pk should be unique*/
/*prof = address for blockies (search if you don't know what is it)*/

INSERT INTO `users` ('pk',`id`,'nick', `email`, `password`, `updated_at`,'prof') VALUES
(14, 'test','test','test123@gmail.com', '$2y$10$pX/IaSwNGgs92jAe21zblOB1cVXTw4h51iAlH1NLGdTTT6egEw2yS', '2020-04-22 12:11:01',14),
(15, 'testt','test','test123213@gmail.com', '$2y$10$9Pw33WKnIZgsaWFlL9Rleez6gvhnBydZtO2PuS28/6Y/11gu1YUVe', '2020-04-22 17:07:38',15),
(16, 'test1','test', 'test@gmail.com', '$2y$10$uXJKPTkQ7yJ7uhM8jnWt8.fJRyHDx0gX8i6S9dpVtc2zmPIvCYhtK', '2020-04-22 17:17:53',16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `pk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
