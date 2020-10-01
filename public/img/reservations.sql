-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2020 at 10:34 PM
-- Server version: 10.1.45-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wristban_detox`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ivcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `event_id`, `ticket_name`, `name`, `phone`, `email`, `ivcode`, `attend`, `author`, `created_at`, `updated_at`) VALUES
(2, 'detox', 'DHP', 'Finnie Ochukpue', '08035958266', 'finnieochukpue@yahoo.com', 'Detox-House-Party-3403', '0', NULL, '2020-09-29 06:50:42', '2020-09-29 06:50:42'),
(3, 'detox', 'DHP', 'Sani Malik', '08083069828', 'kilaminnas@gmail.com', 'Detox-House-Party-4106', '0', NULL, '2020-09-29 07:06:51', '2020-09-29 07:06:51'),
(4, 'detox', 'DHP', 'Sani Malik', '08083069828', 'kilaminnas@gmail', 'Detox-House-Party-4956', '0', NULL, '2020-09-29 07:07:48', '2020-09-29 07:07:48'),
(5, 'detox', 'DHP', 'Joy A.', '07030739979', 'janozie89@gmail.com', 'Detox-House-Party-6396', '0', NULL, '2020-09-29 07:08:42', '2020-09-29 07:08:42'),
(6, 'detox', 'DHP', 'Layo Adeniyi', '09044296734', 'titivikky@yahoo.com', 'Detox-House-Party-2033', '0', NULL, '2020-09-29 10:41:17', '2020-09-29 10:41:17'),
(7, 'detox', 'DHP', 'Ann Okere', '08026859792', 'straightup2ann@yahoo.com', 'Detox-House-Party-2527', '0', NULL, '2020-09-29 10:44:32', '2020-09-29 10:44:32'),
(8, 'detox', 'DHP', 'Tobi Adewale', '08087418091', 'adewaletobi01@gmail.com', 'Detox-House-Party-7838', '0', NULL, '2020-09-29 10:52:11', '2020-09-29 10:52:11'),
(9, 'detox', 'DHP', 'Omobolarinwa Oladimeji', '08137989515', 'oladimejiomobolarinwa@gmail.com', 'Detox-House-Party-4197', '0', NULL, '2020-09-29 10:53:00', '2020-09-29 10:53:00'),
(10, 'detox', 'DHP', 'Olayomi Akanbi', '08028082088', 'lacremechick10@yahoo.com', 'Detox-House-Party-4318', '0', NULL, '2020-09-29 10:58:17', '2020-09-29 10:58:17'),
(11, 'detox', 'DHP', 'Olayomi Akanbi', '08028082088', 'lacremechick10@yahoo.com', 'Detox-House-Party-740', '0', NULL, '2020-09-29 10:58:18', '2020-09-29 10:58:18'),
(12, 'detox', 'DHP', 'Ambrose Richards', '08027612472', 'ambroseenenmoh@gmail.com', 'Detox-House-Party-765', '0', NULL, '2020-09-29 12:06:06', '2020-09-29 12:06:06'),
(13, 'detox', 'DHP', 'Doris Dorch', '08177733662', 'dorchdrope@gmail.com', 'Detox-House-Party-6585', '0', NULL, '2020-09-29 12:33:10', '2020-09-29 12:33:10'),
(14, 'detox', 'DHP', 'Ndidiamaka Okonkwo', '08066566767', 'ammyok2007@gmail.com', 'Detox-House-Party-1035', '0', NULL, '2020-09-29 13:15:53', '2020-09-29 13:15:53'),
(15, 'detox', 'DHP', 'Fejiro Ejeghrevwo', '08151358843', 'ejeghrevwofejiro@gmail.com', 'Detox-House-Party-7324', '0', NULL, '2020-09-29 13:28:07', '2020-09-29 13:28:07'),
(16, 'detox', 'DHP', 'Amie Balogun', '09022606290', 'amiebalogun@gmail.com', 'Detox-House-Party-2661', '0', NULL, '2020-09-29 13:43:15', '2020-09-29 13:43:15'),
(17, 'detox', 'DHP', 'Ayo Jay', '08083600940', 'ayoolajalekun@gmail.com', 'Detox-House-Party-8229', '0', NULL, '2020-09-29 17:46:49', '2020-09-29 17:46:49'),
(18, 'detox', 'DHP', 'Ada Obinatu', '07039161821', 'dianaobinatu1@gmail.com', 'Detox-House-Party-3102', '0', NULL, '2020-09-29 17:50:06', '2020-09-29 17:50:06'),
(19, 'detox', 'DHP', 'Olanrewaju Ola-Daniel', '08085858367', 'labelsinlag@gmail.com', 'Detox-House-Party-2223', '0', NULL, '2020-09-29 17:57:44', '2020-09-29 17:57:44'),
(20, 'detox', 'DHP', 'Ethel Agba', '08167641499', 'd.xcluzzy16@gmail.com', 'Detox-House-Party-2502', '0', NULL, '2020-09-29 19:31:02', '2020-09-29 19:31:02'),
(21, 'detox', 'DHP', 'Prestige Dike', '08102515831', 'dikeprestige8@gmail.com', 'Detox-House-Party-6894', '0', NULL, '2020-09-29 19:51:03', '2020-09-29 19:51:03'),
(22, 'detox', 'DHP', 'Tonia Okafor', '08056241750', 'toniatony21@gmail.com', 'Detox-House-Party-4258', '0', NULL, '2020-09-29 19:52:32', '2020-09-29 19:52:32'),
(23, 'detox', 'DHP', 'Damilola Asekun', '07063262403', 'damilolaasekun@gmail.com', 'Detox-House-Party-1187', '0', NULL, '2020-09-30 11:08:25', '2020-09-30 11:08:25'),
(24, 'detox', 'DHP', 'Yomi Owojori', '07014091310', 'glowithpride@yahoo.co.uk', 'Detox-House-Party-296', '0', NULL, '2020-09-30 12:21:05', '2020-09-30 12:21:05'),
(25, 'detox', 'DHP', 'Tomi Wonuola', '08182370274', 'adetomilayolawal@yahoo.co.uk', 'Detox-House-Party-5555', '0', NULL, '2020-09-30 12:22:12', '2020-09-30 12:22:12'),
(26, 'detox', 'DHP', 'Yemi Omish', '08099456041', 'adomish007@gmail.com', 'Detox-House-Party-1916', '0', NULL, '2020-09-30 12:31:35', '2020-09-30 12:31:35'),
(27, 'detox', 'DHP', 'Oladunjoye Lakunle', '08078899988', 'kayoladunjoye@yahoo.com', 'Detox-House-Party-4947', '0', NULL, '2020-09-30 12:40:25', '2020-09-30 12:40:25'),
(28, 'detox', 'DHP', 'Bukola Ablawoman', '09085019090', 'ablawoman@gmail.com', 'Detox-House-Party-1331', '0', NULL, '2020-09-30 14:09:34', '2020-09-30 14:09:34'),
(29, 'detox', 'DHP', 'Jean Usman', '08143147544', 'aderonkeu@gmail.com', 'Detox-House-Party-2619', '0', NULL, '2020-09-30 14:47:31', '2020-09-30 14:47:31'),
(30, 'detox', 'DHP', 'Toluwalase Wiloughby', '08022015540', 'lashe4t@yahoo.co.uk', 'Detox-House-Party-7883', '0', NULL, '2020-09-30 15:23:24', '2020-09-30 15:23:24'),
(31, 'detox', 'DHP', 'Femi Olowolagba', '08033852658', 'femiolowo@yahoo.com', 'Detox-House-Party-3406', '0', NULL, '2020-09-30 17:56:39', '2020-09-30 17:56:39'),
(32, 'detox', 'DHP', 'Adetoun Adenuga', '09097933583', 'ttomlabaaky@icloud.com', 'Detox-House-Party-148', '0', NULL, '2020-09-30 18:00:38', '2020-09-30 18:00:38'),
(33, 'detox', 'DHP', 'Adenuga Adetoun', '09097933583', 'ttomlabasky@gmail.com', 'Detox-House-Party-3276', '0', NULL, '2020-09-30 18:21:11', '2020-09-30 18:21:11'),
(34, 'detox', 'DHP', 'Alexandra Nnaekezie', '09090889924', 'alexandrannaekezie@gmail.com', 'Detox-House-Party-4104', '0', NULL, '2020-09-30 18:40:04', '2020-09-30 18:40:04'),
(35, 'detox', 'DHP', 'Dora Emeh', '08132538503', 'xandydora@gmail.com', 'Detox-House-Party-8652', '0', NULL, '2020-09-30 18:57:14', '2020-09-30 18:57:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
