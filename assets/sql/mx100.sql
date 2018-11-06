-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 11:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mx100`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'company', 'company user'),
(3, 'freelancer', 'freelancer user');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(15) NOT NULL,
  `users_id` int(15) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `users_id`, `judul`, `date`) VALUES
(34, 12, 'Need call center operators, team leaders to work with customer orders (remote work)', '2018-11-06 11:09:52'),
(35, 12, 'Need help in translating booklets from Bahasa Indonesia to English', '2018-11-06 11:10:04'),
(36, 12, 'Need help translating voice recordings word by word to text (Thai, Vietnamese, Tagalog, Bahasa Indonesia, Korean, Mandarin)', '2018-11-06 11:10:11'),
(37, 12, 'Require English to Indonesian/Bahasa translation for media content', '2018-11-06 11:10:19'),
(38, 12, 'Bahasa Indonesia voice over for 90?120sec explainer video', '2018-11-06 11:10:29'),
(39, 12, 'Lead calls in Indonesia', '2018-11-06 11:10:43'),
(40, 13, 'Subtitle Executive/ Freelancers', '2018-11-06 11:11:12'),
(41, 13, 'Subtitle Executive/ Freelancers', '2018-11-06 11:11:20'),
(42, 13, 'Chemistry, Physic and Biology Online Tutoring; Dicari guru tutor online Kimia, Fisika atau Biologi', '2018-11-06 11:11:28'),
(43, 13, 'Translator required from English to Burmese, Portuguese, and Bahasa Indonesia.', '2018-11-06 11:11:35'),
(44, 13, 'Looking for Bahasa Indonesian to English and English to Bahasa Indonesian Translation', '2018-11-06 11:11:42'),
(45, 13, 'Mystery Shopper (Part Time)', '2018-11-06 11:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(5, '::1', 'company', 1541486595);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(15) NOT NULL,
  `jobs_id` int(15) NOT NULL,
  `users_id` int(15) UNSIGNED NOT NULL,
  `budget` varchar(25) NOT NULL,
  `completion_day` varchar(15) NOT NULL,
  `file` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `jobs_id`, `users_id`, `budget`, `completion_day`, `file`, `date`) VALUES
(33, 40, 10, '10000000', '60', '40_10_06_Nov_2018.pdf', '2018-11-06 11:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(15) NOT NULL,
  `rank` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `rank`) VALUES
(1, 'A'),
(2, 'B'),
(3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1541494674, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(10, '::1', 'user1', '$2y$08$5606H11M/T9r5c.mAy3V6eO90KP.SnEk.MuKBTRPsGX0pEhAOVqP2', NULL, 'user1@gmail.com', NULL, NULL, NULL, NULL, 1541474108, 1541499141, 1, 'user', '1', 'upana studio', '0'),
(11, '::1', 'user2', '$2y$08$KpAyfo1u5d0CLjxvpDjHD.33hC2KaZeRDP6apERfM2qh/K3C86FZ.', NULL, 'user2@gmail.com', NULL, NULL, NULL, NULL, 1541474145, NULL, 1, 'user', '2', 'upana studio', '0'),
(12, '::1', 'company1', '$2y$08$PU3gofzyMQy00SJR18kJ4.uQQPl0X2abym6sUYPgY.IeQKyQsr1GG', NULL, 'company1@gmail.com', NULL, NULL, NULL, NULL, 1541486674, 1541498800, 1, 'company', '1', 'upana studio', '0'),
(13, '::1', 'company2', '$2y$08$kSnuL6z0cxfiNqZJ.uawhO7a6KyiDcP.mNj07iKoy08kFC6eYK9/m', NULL, 'company2@gmail.com', NULL, NULL, NULL, NULL, 1541494702, 1541499060, 1, 'company', '2', 'upana studio', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(15) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(26, 10, 3),
(27, 11, 3),
(29, 12, 2),
(31, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_rank`
--

CREATE TABLE `users_rank` (
  `id` int(15) NOT NULL,
  `user_id` int(15) UNSIGNED NOT NULL,
  `rank_id` int(15) NOT NULL,
  `point` int(25) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_rank`
--

INSERT INTO `users_rank` (`id`, `user_id`, `rank_id`, `point`, `last_update`) VALUES
(4, 10, 2, 18, '2018-11-06 10:41:45'),
(5, 11, 1, 40, '2018-11-06 00:00:00'),
(7, 12, 3, 0, '0000-00-00 00:00:00'),
(9, 13, 3, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_id` (`jobs_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `users_id_2` (`users_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_rank`
--
ALTER TABLE `users_rank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rank_id` (`rank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_rank`
--
ALTER TABLE `users_rank`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_rank`
--
ALTER TABLE `users_rank`
  ADD CONSTRAINT `users_rank_ibfk_1` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`id`),
  ADD CONSTRAINT `users_rank_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
