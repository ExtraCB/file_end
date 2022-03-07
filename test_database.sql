-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 02:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `c_id` int(11) NOT NULL,
  `c_pid` int(11) NOT NULL,
  `c_memberid` int(11) NOT NULL,
  `c_text` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`c_id`, `c_pid`, `c_memberid`, `c_text`, `c_timestamp`) VALUES
(1, 8, 2, 'werwerwerxcvbxcbvxcvb', '2022-03-05 06:23:32'),
(2, 8, 2, ';;;;dfgdgfdgdg', '2022-03-05 06:23:37'),
(3, 10, 2, 'wrwerwxcvxvxvxcvxvnnnnnnnnnnnnnnnnnnnnn', '2022-03-05 06:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `p_id` int(11) NOT NULL,
  `p_memberid` int(11) NOT NULL,
  `p_text` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`p_id`, `p_memberid`, `p_text`, `p_img`, `p_timestamp`) VALUES
(8, 2, 'ทดสอบ Postrgdgdgrdgdrgdg23424324234', '1479402762.jpg', '2022-03-05 04:30:23'),
(10, 2, 'ทดสอบ Post', '1440849713.mp4', '2022-03-05 06:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `u_memberid` int(11) NOT NULL,
  `u_username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`u_memberid`, `u_username`, `u_password`, `u_tel`, `u_address`, `u_img`, `u_timestamp`) VALUES
(2, 'tdev', '1234', '1234141241', 'thai', '998984860.jpeg', '2022-03-05 03:46:33'),
(3, 'tdev1', '123', '6666666', 'ไทย x x x ', '100858342.jpeg', '2022-03-05 03:47:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_pid` (`c_pid`),
  ADD KEY `c_memberid` (`c_memberid`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_memberid` (`p_memberid`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`u_memberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `u_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`c_memberid`) REFERENCES `tb_users` (`u_memberid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`c_pid`) REFERENCES `tb_posts` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD CONSTRAINT `tb_posts_ibfk_1` FOREIGN KEY (`p_memberid`) REFERENCES `tb_users` (`u_memberid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
