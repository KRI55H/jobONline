-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 10:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tybca138`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Accounting'),
(11, 'Data Entry'),
(1, 'Data Science and Analysis'),
(5, 'Design and Creative'),
(3, 'Digital Marketing'),
(6, 'Engineering and Architecture'),
(7, 'IT & Networking'),
(8, 'Sales and Marketing'),
(9, 'Web, Mobile, & Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `required_employee` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `city` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `job_type`, `ref_id`, `required_employee`, `role`, `city`) VALUES
(1, 'UI/UX Designer', 'We are looking for creative contestants having 2 year of experience in UI/UX designer. ', 'Remote Job', 5, 2, 'UI/UX designer', 'Surat'),
(2, 'Laravel Developer', 'We are looking for backed developer, freshers can apply also.', 'Stable Job', 9, 5, 'Jr Backend developer', 'Vadodra'),
(4, 'Social Media Marketer.', 'We are looking for freshers who want to make career in social media marketing.', 'Stable Job', 3, 5, 'Jr Social Media Marketer', 'Surat'),
(5, 'Node JS developer', 'We are looking for a node JS developer who has 3 years of experience.', 'Remote Job', 9, 3, 'Node JS developer', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `occupation_type` varchar(50) NOT NULL,
  `role` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `mobile_number`, `occupation_type`, `role`) VALUES
(1, 'Krish Siddhapura', 'admin@gmail.com', 'admin@123', 'admin@123', '7575848475', 'Admin', 'admin'),
(3, 'Krish Siddhapura', 'krish.siddhapura@gmial.com', 'kri55h_u011', 'krish@123', '7575816889', 'PHP | Laravel Developer', 'user'),
(4, 'Tushar Tarsariya', 'Tushar02@gmail.com', 't_shar.exe', 'vegetathekingofsupersian', '8596326387', 'Game Developer', 'user'),
(5, 'Chirag Rathod', 'chirag007@gmial.com', 'chirag_111', 'chirag@123', '7896547896', 'React JS', 'user'),
(6, 'Vivek Sarvaiya', 'vivek@gmial.com', 'vivky_sarvaiya', 'vivek@123', '7854213265', 'Wordpress | Shopify Developer', 'user'),
(7, 'Harsh Munjpara', 'harsh@gmail.com', 'harsh_8899', 'harsh@123', '4565453212', 'UI/UX Desginer', 'user'),
(8, 'Khushal Kumar Solanki', 'khushak.solanki@gmial.com', 'khush_100lanki', 'khushal@gmial.com', '7896543211', 'Web Desginer', 'user'),
(15, 'DEMO', 'DEMOs', 'DEMOs', 'DEMO', '7878787879', 'DEMO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
