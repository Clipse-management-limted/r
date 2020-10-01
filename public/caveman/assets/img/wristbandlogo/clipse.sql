-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 04:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clipse`
--

-- --------------------------------------------------------

--
-- Table structure for table `caputerdata`
--

CREATE TABLE `caputerdata` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `event` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_settings`
--

CREATE TABLE `event_settings` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_tickets`
--

CREATE TABLE `online_tickets` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `recaptcha` varchar(5) NOT NULL,
  `theme` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `timezone`, `recaptcha`, `theme`) VALUES
(1, 'Wristbands CMS System ', 'Africa/Lagos', 'no', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css');

-- --------------------------------------------------------

--
-- Table structure for table `staff_event_settings`
--

CREATE TABLE `staff_event_settings` (
  `id` int(10) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_event_settings`
--

INSERT INTO `staff_event_settings` (`id`, `ticket_type`, `event`, `user_id`) VALUES
(1, 'Invite', 'lekki', 1),
(2, 'vip', 'Drive in', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, '89b4e3f8731da6e56d54564482fff3', 1, '2020-09-04'),
(2, 'a6d2b3e77086e1b0a0b5e0786c6779', 2, '2020-09-05'),
(3, 'cad4558c78015a7852fee9d83d17aa', 3, '2020-09-22'),
(4, 'f5f97a01f125084a6f817af96d56a7', 4, '2020-09-22'),
(5, 'b5442d0891e656b3bd803aec62cadb', 5, '2020-09-22'),
(6, 'eb138cff3ce9582110895784f2a605', 6, '2020-09-22'),
(7, '12e3c32bf445e32082f125490a6db8', 7, '2020-09-22'),
(8, '541beca55bcef2c6a62234d25fb887', 8, '2020-09-22'),
(9, '955e946762e5512a34101af8e95237', 9, '2020-09-22'),
(10, '3231009f5601ace975f62b22655bf5', 10, '2020-09-22'),
(11, '986b1d9a29402f5a26d18fe73e333c', 11, '2020-09-22'),
(12, '0944d6bf6270c4a934e12cdac745dd', 12, '2020-09-22'),
(13, '9aa8606e5d6820a85765bd62ca5fdb', 13, '2020-09-22'),
(14, 'cbb04ba69a02b293f5a2b1aa4817d5', 14, '2020-09-22'),
(15, '36510ee66e733a6a6cffb8159eebd6', 15, '2020-09-22'),
(16, '5b597f46c31b4f89050b7f64c38deb', 16, '2020-09-22'),
(17, 'e8936bd88b9d6ab8e8f85542948965', 17, '2020-09-22'),
(18, '500edcb2a9af1d0c5ee86399af468f', 18, '2020-09-23'),
(19, '849c5e9f87b102706ff69c910946d7', 19, '2020-09-23'),
(20, '9fe041dac86d0f941cc45513e76052', 20, '2020-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `banned_users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `username`, `phone`, `role`, `password`, `last_login`, `status`, `banned_users`) VALUES
(1, 'kenneyg50@gmail.com', 'kenneth akpan', 'kennyendowed', '08120960876', '3', '$2a$08$tfGLqPTWszAX8ziXfEjgwuAr2pS4lJ1DKeHWSV1QFlk1CdOlDSgPC', '2020-09-24 03:48:43 AM', 'approved', 'unban'),
(2, 'ayo4real2009@gmail.com', 'onabajo', 'ayomide', '08137550255', '3', '$2a$08$9tpO/fIsgZK0KLATJQRfW.Ql2IbZoCKSOm7UZdigVhX.5OxMa8PCq', '2020-09-07 11:52:18 AM', 'approved', 'unban');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caputerdata`
--
ALTER TABLE `caputerdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_settings`
--
ALTER TABLE `event_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_tickets`
--
ALTER TABLE `online_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_event_settings`
--
ALTER TABLE `staff_event_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caputerdata`
--
ALTER TABLE `caputerdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_settings`
--
ALTER TABLE `event_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_tickets`
--
ALTER TABLE `online_tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_event_settings`
--
ALTER TABLE `staff_event_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
