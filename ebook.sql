-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 03:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `author` varchar(25) NOT NULL,
  `category` enum('fiction','non-fiction','romance','science fiction') NOT NULL,
  `description` text DEFAULT NULL,
  `ebook` varchar(255) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover_image`, `title`, `author`, `category`, `description`, `ebook`, `view_count`) VALUES
(1, '/final_wt/pp.jpg', 'Pride and Prejudice', 'Jane Austen', 'romance', 'A classical about life in the Eighteen Century rural England, exploring themes of love, social class, and misunderstandings', '/final_wt/pp.pdf', 30),
(4, '/final_wt/robin.jpg', 'Robinson Crusoe', 'Daniel Defoe', 'fiction', 'Join our hero in a world of mystery, adventure, and epic journeys. Ready for a thrilling experience?', '/final_wt/robin.pdf', 30),
(5, '/final_wt/dale.jpg', 'The Art of Public Speakin', ' Dale Breckenridge Carneg', 'non-fiction', '\"The Art of Public Speaking\" is a book not for a seasoned public speaker. It can be an academic guide for aspiring public speakers.', '/final_wt/dale.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `age` int(11) DEFAULT NULL CHECK (`age` > 0 and `age` < 100),
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `age`, `password`, `gender`, `phone_number`, `created_at`) VALUES
(9, 'jovita', 'sani123', 23, '1234', 'Female', '1236547890', '2024-10-25 11:44:21'),
(11, 'ewter', 'tert', 23, '7890', 'Female', '1234567654', '2024-10-31 07:23:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cover_image` (`cover_image`,`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
