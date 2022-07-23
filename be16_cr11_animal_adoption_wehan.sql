-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 12:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr11_animal_adoption_wehan`
--
CREATE DATABASE IF NOT EXISTS `be16_cr11_animal_adoption_wehan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr11_animal_adoption_wehan`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `live_location` varchar(255) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` enum('true','false') NOT NULL,
  `breed` varchar(50) NOT NULL,
  `status` enum('adopted','available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `picture`, `live_location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES
(11, 'LionKing', '62dbc5a250fc9.jpg', 'Vienna', 'The next King', 'small', 2, 'true', 'savanna', 'available'),
(12, 'T-Rex', '62dadd87c8826.jpg', 'Jurrassic Park', 'He is back!', 'large', 8, 'false', 'Labor', 'adopted'),
(13, 'Bugs Bunny', '62dbc579c6466.jpg', 'farm yard', 'fast and furious', 'small', 3, 'true', 'egg', 'available'),
(14, 'ChickenNugget', '62dade469669a.jpg', 'farm yard', 'hot and crispy', 'small', 8, 'true', 'egg', 'adopted'),
(15, 'Bahamut', '62db7b55d7e36.jpg', 'Fantasy', 'King of the Air', 'small', 9, 'true', 'Heaven', 'adopted'),
(16, 'Lazykittie', '62dadf3c1b391.jpg', 'Vienna', 'dont touch not sweet', 'small', 2, 'true', 'garden', 'available'),
(17, 'CryParrot', '62dadfaf6f748.jpg', 'Vienna', 'can dance and sing', 'small', 10, 'true', 'garden', 'adopted'),
(18, 'AngryPony', '62dae00c098d5.jpg', 'Germany', 'fast as light', 'large', 8, 'false', 'garden', 'available'),
(19, 'Puddle', '62dae0639438e.jpg', 'Germany', 'snappy', 'small', 1, 'true', 'garden', 'adopted'),
(20, 'SweetSpider', '62dae0b7a1fd4.jpg', 'Tree', 'cute and sweet', 'large', 18, 'false', 'egg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `adoption_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`id`, `fk_animal_id`, `fk_user_id`, `adoption_date`) VALUES
(2, 11, 2, '2022-07-23'),
(3, 13, 2, '2022-07-31'),
(4, 12, 2, '2022-07-24'),
(5, 14, 2, '2022-07-31'),
(6, 12, 2, '2022-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `picture`, `password`, `status`) VALUES
(1, 'wehan', 'chen', 'chen@mail.com', 214567, 'kaisergasse 17', '62da756dd6eb8.png', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'adm'),
(2, 'wehan', 'chen', 'chen2@mail.com', 89495615, 'kaisergasse 1', 'avatar.png', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `fk_animal_id` FOREIGN KEY (`fk_animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
