-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 01:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_id` int(11) NOT NULL,
  `user_id_crew` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`id`, `first_name`, `surname`, `email_address`, `ship_id`, `user_id_crew`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'Marko', 'Simic', 'milossimicbz@gmail', 8, 7, '2020-09-29 09:05:02', '2020-09-30 08:26:21', 0, NULL),
(2, 'Nikola', 'Jovic', 'nikolajovic@gmail.com', 7, 7, '2020-09-29 09:32:06', '2020-09-29 15:18:24', 0, NULL),
(12, 'Dusan', 'Jovic', 'dusanjovic@gmail.com', 10, 7, '2020-09-29 10:29:40', '2020-09-29 11:09:27', 1, '2020-09-29 11:09:27'),
(13, 'Milan', 'Dragic', 'milandragic@gmail.com', 9, 7, '2020-09-29 11:16:44', '2020-09-29 15:16:57', 0, NULL),
(14, 'Nevena', 'Zubac', 'znevena@gmail.com', 7, 7, '2020-09-29 11:17:29', '0000-00-00 00:00:00', 0, NULL),
(15, 'Luka', 'Lukic', 'lukalukic@gmail.com', 13, 7, '2020-09-30 10:48:53', '2020-09-30 10:51:27', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crew_ranks`
--

CREATE TABLE `crew_ranks` (
  `id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `crew_id` int(11) NOT NULL,
  `rc_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `crew_ranks`
--

INSERT INTO `crew_ranks` (`id`, `rank_id`, `crew_id`, `rc_user_id`, `created_at`, `updated_at`) VALUES
(9, 1, 13, 7, '2020-09-29 11:16:44', '0000-00-00 00:00:00'),
(10, 4, 14, 7, '2020-09-29 11:17:29', '0000-00-00 00:00:00'),
(11, 1, 2, 7, '2020-09-29 15:18:24', '0000-00-00 00:00:00'),
(12, 4, 2, 7, '2020-09-29 15:18:24', '0000-00-00 00:00:00'),
(13, 3, 1, 7, '2020-09-30 08:26:21', '0000-00-00 00:00:00'),
(15, 1, 15, 7, '2020-09-30 10:51:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `not_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_not_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `not_name`, `content`, `user_not_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'Notification Tester', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula ligula lacus, vitae cursus risus cursus vitae. Integer feugiat neque sem, in convallis ex volutpat et. Vivamus tempor lacus non lectus porta vehicula. Pellentesque diam justo, consectetur non elementum ut, porta ut mi. Vestibulum dictum auctor ante tempus fringilla. Nam convallis in dolor eget lobortis. In hac habitasse platea dictumst.\r\n\r\nPraesent nec lorem ac risus interdum viverra maximus quis velit. Donec viverra interdum urna a consequat. Curabitur ut ex vitae arcu sollicitudin pulvinar. Ut lacinia varius tellus, vitae pharetra tellus posuere ac. Cras luctus ligula ac nunc pretium, nec vehicula purus consequat. In vitae enim non lectus molestie ultrices in sit amet erat. Nulla facilisi. Maecenas eros justo, facilisis eget hendrerit eget, dapibus at odio.\r\n\r\nVestibulum euismod semper erat vel finibus. Sed bibendum laoreet imperdiet. Fusce at condimentum ipsum, ac imperdiet dolor. Nam rutrum pharetra velit vel molestie. Vivamus ultrices dictum orci. Suspendisse pulvinar risus semper blandit vestibulum. Integer porttitor quam vel massa tristique venenatis. Duis accumsan arcu vitae ex aliquam, viverra commodo est molestie. Sed felis ligula, ullamcorper sit amet mollis tempor, ornare non lacus. Nunc a tellus aliquam, semper felis quis, efficitur nibh. Morbi lacinia scelerisque velit, quis vulputate nisl sollicitudin quis. Nullam nec odio et felis cursus ultricies ac id arcu.', 7, '2020-09-29 15:28:22', '2020-09-30 08:33:22', 1, '2020-09-30 08:33:22'),
(2, 'Notifikacija', '                                                                                                                                                                <p><b>Loreum Ipsum</b></p><p><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non metus ac diam mollis scelerisque. Nam vehicula, quam ut commodo congue, lacus nisi aliquam quam, vitae finibus dui augue vel mi. Quisque elementum, odio at fringilla ornare, arcu odio tempor nunc, vel pellentesque urna dolor quis nisi. Nam a erat condimentum, tincidunt lorem eget, suscipit ipsum. Praesent elit libero, vestibulum sit amet ultricies et, posuere vel nisi. Phasellus finibus ex auctor turpis rutrum, quis consectetur nibh rhoncus. Proin cursus sem id magna accumsan scelerisque. Sed in eros justo. Sed et erat et diam volutpat luctus at eget urna. Nunc est urna, ullamcorper vitae sapien in, malesuada consectetur magna. Suspendisse malesuada dapibus pharetra.</span></p><p><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\"><b>Lorem 2 Ipsum</b></span></p><p><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non metus ac diam mollis scelerisque. Nam vehicula, quam ut commodo congue, lacus nisi aliquam quam, vitae finibus dui augue vel mi. Quisque elementum, odio at fringilla ornare, arcu odio tempor nunc, vel pellentesque urna dolor quis nisi. Nam a erat condimentum, tincidunt lorem eget, suscipit ipsum. Praesent elit libero, vestibulum sit amet ultricies et, posuere vel nisi. Phasellus finibus ex auctor turpis rutrum, quis consectetur nibh rhoncus. Proin cursus sem id magna accumsan scelerisque. Sed in eros justo. Sed et erat et diam volutpat luctus at eget urna. Nunc est urna, ullamcorper vitae sapien in, malesuada consectetur magna. Suspendisse malesuada dapibus pharetra.</span><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\"><b><br></b><br></span><br></p>                                                                                                                                                ', 7, '2020-09-29 17:45:35', '2020-09-30 10:51:46', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_ranks`
--

CREATE TABLE `notification_ranks` (
  `id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `not_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_ranks`
--

INSERT INTO `notification_ranks` (`id`, `rank_id`, `not_id`, `created_at`, `updated_at`) VALUES
(8, 1, 2, '2020-09-30 10:51:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id_ranks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `rank_name`, `user_id_ranks`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'Captain', 7, '2020-09-29 08:56:08', '2020-09-29 08:56:08', 0, NULL),
(3, 'Staff Captain', 7, '2020-09-29 08:29:53', '0000-00-00 00:00:00', 0, NULL),
(4, 'Safety Officer', 7, '2020-09-29 08:30:17', '0000-00-00 00:00:00', 0, NULL),
(6, 'Environmental Compliance Officer', 7, '2020-09-29 09:00:59', '2020-09-29 09:00:59', 1, '2020-09-29 09:00:59'),
(7, 'Test Rank', 7, '2020-09-30 09:50:19', '2020-09-30 09:50:19', 1, '2020-09-30 09:50:19'),
(8, 'Test Rank', 7, '2020-09-30 10:49:08', '2020-09-30 10:49:08', 1, '2020-09-30 10:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-09-28 13:58:48', '0000-00-00 00:00:00'),
(3, 'Crew member', '2020-09-30 09:21:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `ship_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `ship_name`, `serial_num`, `image_path`, `user_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(7, 'Ovation of the seas Edit', 'MODL2205', 'ovation.jpg', 7, '2020-09-28 17:22:18', '2020-09-29 08:12:42', 0, NULL),
(8, 'Freedom of the seas', 'DESK211A', 'freedom.jpg', 7, '2020-09-28 17:23:11', '2020-09-28 17:23:22', 0, NULL),
(9, 'Anthem of the seas', 'DESK211B', 'athem.jpg', 7, '2020-09-28 17:24:23', '0000-00-00 00:00:00', 0, NULL),
(10, 'Explorer of the seas', 'MODL2250', 'explorer.jpg', 7, '2020-09-28 17:25:55', '0000-00-00 00:00:00', 0, NULL),
(11, 'Vision of the seas', 'MODL2217', 'vision.jpg', 7, '2020-09-28 17:26:36', '2020-09-28 17:45:47', 0, NULL),
(12, 'Caribbean princess', 'ASDAD556', 'carribien.jpg', 7, '2020-09-29 07:38:49', '2020-09-29 08:16:03', 1, '2020-09-29 08:16:03'),
(13, 'Wonder of seas', 'LAOJ5222', 'wonder.jpg', 7, '2020-09-30 10:46:46', '2020-09-30 10:52:05', 1, '2020-09-30 10:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(7, 'Milos', 'milossimic@gmail.com', '$2y$10$nE0klLXFJUFj3838dpR1f.qRsrhBJ2BEs9zoC1zLYZ506HrMLwQiC', 1, '2020-09-28 16:41:02', '2020-09-30 10:12:56', 0, NULL),
(8, 'CrewMem', 'crewmem@gmail.com', '$2y$10$.TsASxT8PUCZeA4kZnyfUu3hopyBxO/fEdimqpuHEMYcZcv3ZHjU2', 3, '2020-09-30 09:34:46', '2020-09-30 10:12:39', 0, '2020-09-30 10:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_crew_added` (`user_id_crew`),
  ADD KEY `fk_crew_ship` (`ship_id`);

--
-- Indexes for table `crew_ranks`
--
ALTER TABLE `crew_ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rank_crew` (`rank_id`),
  ADD KEY `fk_crew_rank` (`crew_id`),
  ADD KEY `fk_user_rc` (`rc_user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_not` (`user_not_id`);

--
-- Indexes for table `notification_ranks`
--
ALTER TABLE `notification_ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rank_not` (`rank_id`),
  ADD KEY `fk_not_rank` (`not_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_ranks` (`user_id_ranks`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_num` (`serial_num`),
  ADD KEY `fk_user_added` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `crew_ranks`
--
ALTER TABLE `crew_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_ranks`
--
ALTER TABLE `notification_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crew`
--
ALTER TABLE `crew`
  ADD CONSTRAINT `fk_ship_crew` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`),
  ADD CONSTRAINT `fk_user_crew` FOREIGN KEY (`user_id_crew`) REFERENCES `users` (`id`);

--
-- Constraints for table `crew_ranks`
--
ALTER TABLE `crew_ranks`
  ADD CONSTRAINT `fk_crew_rank` FOREIGN KEY (`crew_id`) REFERENCES `crew` (`id`),
  ADD CONSTRAINT `fk_rank_crew` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`),
  ADD CONSTRAINT `fk_user_rc` FOREIGN KEY (`rc_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_user_not` FOREIGN KEY (`user_not_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification_ranks`
--
ALTER TABLE `notification_ranks`
  ADD CONSTRAINT `fk_not_rank` FOREIGN KEY (`not_id`) REFERENCES `notification` (`id`),
  ADD CONSTRAINT `fk_rank_not` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`);

--
-- Constraints for table `ranks`
--
ALTER TABLE `ranks`
  ADD CONSTRAINT `fk_user_ranks` FOREIGN KEY (`user_id_ranks`) REFERENCES `users` (`id`);

--
-- Constraints for table `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `fk_user_ship` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
