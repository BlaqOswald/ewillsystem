-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 12:40 PM
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
-- Database: `ewilldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `id` int(5) NOT NULL,
  `topic` text DEFAULT NULL,
  `advert` text DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`id`, `topic`, `advert`, `file`, `status`, `created_at`, `updated_at`) VALUES
(25, 'eWillSystem status', '<p>the system is up and running.</p>', NULL, 1, '2025-06-26 04:26:55', '2025-06-26 04:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `activity` text NOT NULL,
  `addedon` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user`, `activity`, `addedon`, `created_at`, `updated_at`) VALUES
(269, 160, 'Created an advert: eWillSystem status', '2025-06-26 07:26:55', '2025-06-26 04:26:55', '2025-06-26 04:26:55'),
(270, 160, 'Updated an advert: eWillSystem status', '2025-06-26 07:41:25', '2025-06-26 04:41:25', '2025-06-26 04:41:25'),
(271, 160, 'Destroyed a faq', '2025-06-26 10:18:16', '2025-06-26 07:18:16', '2025-06-26 07:18:16'),
(272, 160, 'Destroyed a faq', '2025-06-26 10:18:25', '2025-06-26 07:18:25', '2025-06-26 07:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount_dispositions`
--

CREATE TABLE `bankaccount_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankaccount_dispositions`
--

INSERT INTO `bankaccount_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `updated_at`, `created_at`) VALUES
(1, 106, 5, 'half of the amount', 'take of the amount', 'Nailah Franey - - MA - Child', '2023-11-17 06:32:58', '2023-11-17 06:32:58'),
(2, 106, 10, '34', 'rt', 'Hmm - - Earth - Spouse', '2023-11-17 07:39:39', '2023-11-17 07:39:39'),
(3, 106, 19, 'half of the money', 'the other half goes to my Heir', 'Jajja - - Entebbe - Dependant', '2023-11-22 07:33:45', '2023-11-22 07:33:45'),
(4, 106, 5, '50%', 'dont sell the valuables', 'Jordan Franey - - MA - Child', '2023-11-23 04:39:25', '2023-11-23 04:39:25'),
(5, 106, 20, '50%', 'of the total money', 'Jajja - - Entebbe - Dependant', '2023-11-23 04:51:56', '2023-11-23 04:51:56'),
(6, 122, 21, NULL, 'HALF OF THE MONEY', 'SSENYANGE - 0703928363 - NAMUGONGO - Dependant', '2023-12-20 14:03:05', '2023-12-20 14:03:05'),
(7, 122, 21, NULL, 'HALF OF THE MONEY', 'MERCY - 0703928363 - NAMUGONGO - Heir', '2023-12-20 14:03:25', '2023-12-20 14:03:25'),
(8, 110, 22, 'undefined', 'undefined', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2023-12-20 14:28:28', '2023-12-20 14:28:28'),
(9, 124, 23, '1', 'whole of it', 'Jajja - 0772384918 - Entebbe - OtherRelative', '2023-12-22 14:15:03', '2023-12-22 14:15:03'),
(10, 110, 24, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:50:16', '2024-01-08 20:50:16'),
(11, 110, 24, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:50:17', '2024-01-08 20:50:17'),
(12, 126, 25, '10', NULL, 'MUKASA MAJORINE - 0703928363 - KIREKA - Spouse', '2024-01-22 18:27:10', '2024-01-22 18:27:10'),
(13, 127, 26, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:48:40', '2024-01-22 20:48:40'),
(14, 127, 26, '10', NULL, 'JENNY KISA - 0703754233 - KIREKA - Child', '2024-01-22 20:48:46', '2024-01-22 20:48:46'),
(15, 127, 26, '10', NULL, 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:48:54', '2024-01-22 20:48:54'),
(16, 135, 27, '50%', 'share it with the rest of the family', 'ada - 8904193 - fg - Dependant', '2024-02-21 14:06:04', '2024-02-21 14:06:04'),
(17, 135, 27, '50%', 'its yours alone', 'first - 598900 - sa - Child', '2024-02-21 14:06:24', '2024-02-21 14:06:24'),
(18, 135, 28, 'W', 'WER', 'second - 3456456 - ada - Heir', '2024-03-01 17:05:24', '2024-03-01 17:05:24'),
(19, 135, 28, 'W', 'WER', 'first - 598900 - sa - Child', '2024-03-01 17:05:31', '2024-03-01 17:05:31'),
(20, 135, 28, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:05:38', '2024-03-01 17:05:38'),
(21, 135, 28, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:05:47', '2024-03-01 17:05:47'),
(22, 135, 29, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:05:54', '2024-03-01 17:05:54'),
(23, 51, 30, NULL, 'take everything', 'first - 2345678876 - wakiso - Child', '2024-06-19 11:46:26', '2024-06-19 11:46:26'),
(24, 51, 31, NULL, 'take everything', 'second child - 1234567887 - wakiso - Child', '2024-06-19 11:46:34', '2024-06-19 11:46:34'),
(25, 110, 33, '50', '50', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:27:53', '2024-07-10 02:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `account_number`, `bank_name`, `account_name`, `branch`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(4, 102, '60878967896', 'Absa', 'Kwagala', 'Kampala', 'Alice - 075900876 - Kawanda - Spouse', 'BankAccount_1736762840.jpg', '2023-10-31 05:27:06', '2025-01-13 07:07:20'),
(5, 106, '123654789369852', 'Green Bank', 'Million Millage', 'Entebbe', NULL, NULL, '2023-11-17 06:23:52', '2023-11-17 06:23:52'),
(20, 106, '123456897532', 'Testing', 'testing', 'testing', NULL, NULL, '2023-11-23 04:50:30', '2023-11-23 04:50:30'),
(21, 122, '98174839021191', 'STANBIC BANK', 'MARY GORRETTI', 'NATEETE', NULL, NULL, '2023-12-20 13:56:18', '2023-12-20 13:56:18'),
(23, 124, '12365478987456321', 'Stanbic', 'Mariam', 'Entebbe', NULL, NULL, '2023-12-22 14:12:23', '2023-12-22 14:12:23'),
(24, 110, '909999873', 'STANBIC BANK', 'MARY GORRETTI NAKAMYA COMMUNICATIONS', 'NATEETE', NULL, NULL, '2024-01-08 20:46:24', '2024-01-08 20:46:24'),
(25, 126, '900487810308384', 'STANBIC BANK', 'JOHN MUKASA', 'KIREKA', NULL, NULL, '2024-01-22 18:11:04', '2024-01-22 18:11:04'),
(26, 127, '902334267888', 'STANBIC BANK', 'MUKASA MELANIE', 'NATEETE', NULL, NULL, '2024-01-22 20:43:53', '2024-01-22 20:43:53'),
(27, 135, '1234567890', 'Stanbic', 'Mariam', 'Entebbe', NULL, NULL, '2024-02-21 13:40:03', '2024-02-21 13:40:03'),
(28, 135, '123456', 'qwedrf', 'wedfg', 'qwedrfg', NULL, NULL, '2024-03-01 15:55:09', '2024-03-01 15:55:09'),
(29, 135, '21341', 'adsa', '321341', 'sds', NULL, NULL, '2024-03-01 17:01:56', '2024-03-01 17:01:56'),
(30, 51, '22345678987654321', 'stanbic', 'new star', 'wakiso', NULL, NULL, '2024-06-19 11:39:03', '2024-06-19 11:39:03'),
(31, 51, '23456765432', 'GTG', 'newy', 'wakios', NULL, NULL, '2024-06-19 11:39:25', '2024-06-19 11:39:25'),
(32, 138, '9030023663529', 'Stanbic Bank', 'Maria Kate Nanyonga', 'William street', NULL, NULL, '2024-07-08 14:03:26', '2024-07-08 14:03:26'),
(33, 110, '839290498193917', 'CENTENARY BANK', 'MARY GORRETTI NAKAMYA COMMUNICATIONS', 'NATEETE', NULL, NULL, '2024-07-10 02:21:18', '2024-07-10 02:21:18'),
(35, 221, '987654', 'hjfkkuyvhj', 'fukhyuk', 'hjgzdf', NULL, NULL, '2025-02-12 12:44:25', '2025-02-12 12:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `burial_detials`
--

CREATE TABLE `burial_detials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `executors` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `burial_detials`
--

INSERT INTO `burial_detials` (`id`, `user_id`, `executors`, `location`, `instructions`, `created_at`, `updated_at`) VALUES
(2, 102, 'fgfd', 'Kayunga', '<p>No photos</p>', '2023-10-30 10:18:20', '2023-11-08 06:04:33'),
(4, 103, NULL, NULL, NULL, '2023-11-03 07:28:15', '2023-11-03 07:28:15'),
(5, 96, 'null', 'null', 'null', '2023-11-06 10:40:00', '2023-11-06 10:40:07'),
(6, 104, NULL, NULL, NULL, '2023-11-10 05:49:55', '2023-11-10 05:49:55'),
(7, 106, NULL, 'Entebbe', '<p>no photos</p>', '2023-11-14 05:27:33', '2023-11-14 11:34:10'),
(8, 110, NULL, 'null', '<p>To be buried at the place that my husband and children choses to bury me at.&nbsp;</p>\r\n<p>however, for all intents and purposes they should not bury at Mpigi my original ancestral place. Any other place of their choice.</p>\r\n<p>Mourners should wear white and thank God for all the precious moments we spent together.</p>\r\n<p>If they can afford they should build a shelter over my graveyard.</p>\r\n<p>Mourners should not be given beans if they afford meat and chicken.</p>\r\n<p>They can withdraw money from my accounts if any to use in the preparations of burial.</p>', '2023-12-02 22:54:34', '2023-12-19 18:42:35'),
(9, 112, NULL, NULL, NULL, '2023-12-04 23:14:44', '2023-12-04 23:14:44'),
(10, 51, NULL, 'wakiso', '<p>burn my remainings</p>', '2023-12-05 11:42:10', '2024-06-19 11:48:36'),
(11, 122, NULL, 'MPIGI', '<p>BURIED IN WHITE AT THE BURIAL GROUND.</p>', '2023-12-20 14:05:42', '2023-12-20 14:05:42'),
(12, 124, NULL, 'Mitiyana', '<p>no photos</p>', '2023-12-22 14:16:00', '2023-12-22 14:16:00'),
(13, 125, NULL, 'RUKUNJIRI', '<p>TO BE BURRIED&nbsp; AT EXACTLY 4:00PM WITH ALL MY FAMILY MEMBERS AVAILABLE AND PRESENT</p>\r\n<p>I MUST BE BURRIED IN A WHITE COFFIN AND AFTER THE BURRIAL EVERY ONE MUST LIVE IMMEDIATELY TO LET ME REST IN PEACE&nbsp;</p>', '2024-01-22 17:21:51', '2024-01-22 17:21:51'),
(14, 126, NULL, 'KASANA LUWERO', '<p>TO BE BURIED AT 4PM AT OUR ANCESTRAL BURIAL GROUNDS</p>', '2024-01-22 18:29:40', '2024-01-22 18:29:40'),
(15, 127, NULL, 'MUKONO KYAGWE.', '<p>TO PICK MONEY FROM MY ACCOUNT FOR ALL BURIAL EXPENSES.</p>', '2024-01-22 20:51:49', '2024-01-22 20:51:49'),
(16, 128, NULL, 'null', 'null', '2024-02-05 11:39:38', '2024-02-05 11:45:05'),
(17, 129, NULL, 'Ma', '<p>all white</p>', '2024-02-05 12:47:15', '2024-02-05 17:52:14'),
(18, 131, NULL, 'null', 'null', '2024-02-05 13:14:42', '2024-02-05 13:17:03'),
(19, 132, NULL, 'null', '<p>null</p>', '2024-02-05 18:59:36', '2024-02-06 12:08:44'),
(20, 133, NULL, 'null', 'null', '2024-02-07 01:07:03', '2024-02-07 01:10:51'),
(21, 134, NULL, 'null', 'null', '2024-02-07 01:19:19', '2024-02-07 01:22:01'),
(22, 135, NULL, 'Mars', '<p>my remainings should be first taken to the moon before burial at mars</p>', '2024-02-07 01:39:18', '2024-02-21 14:21:32'),
(23, 138, NULL, 'Bubebeere Kasanje', '<p>null</p>', '2024-07-08 14:08:48', '2024-07-08 14:57:41'),
(24, 146, NULL, 'Bweyogerere kirinya', '<p>I will be buried next to my father</p>', '2024-07-31 03:10:36', '2024-07-31 03:10:36'),
(25, 151, NULL, 'Our ancestry burial place at Mirambi, Kibinge, Bukomansimbi', '<p>The reading of my will has to take place the next day after the burial to sort everything out immediately for people to on about their lives.&nbsp;</p>', '2024-10-24 14:21:58', '2024-10-24 14:21:58'),
(26, 153, NULL, 'null', 'null', '2024-10-25 11:59:50', '2024-10-25 12:18:02'),
(27, 154, NULL, NULL, NULL, '2024-11-04 04:07:26', '2024-11-04 04:07:26'),
(28, 157, NULL, NULL, NULL, '2024-11-04 10:20:23', '2024-11-04 10:20:23'),
(29, 159, NULL, NULL, NULL, '2024-11-05 05:16:50', '2024-11-05 05:16:50'),
(30, 161, NULL, NULL, NULL, '2024-11-18 05:55:27', '2024-11-18 05:55:27'),
(31, 160, NULL, 'null', 'null', '2024-11-18 06:15:42', '2024-11-18 07:00:31'),
(32, 221, NULL, 'ghdfgdhuhgfckghcvhgckugchkcvuhgch', '<ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><u>tfgyhujinkhjigufyttyfgvhjbyugoiuhmjk</u></li></ol>', '2025-02-11 03:42:26', '2025-02-14 12:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `email`, `website`, `contact`, `address`, `updated_at`, `created_at`) VALUES
(0, 'eWill Services', 'validwills@gmail.com', 'https://www.ewillservices.net', '256 761 222456', 'kyanja', '2025-06-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `child_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user_id`, `name`, `address`, `contact`, `date_of_birth`, `gender`, `status`, `child_file`, `created_at`, `updated_at`) VALUES
(1, 102, 'Kayiru Jamal', 'Kampala', '0787867', '2023-10-25', 'Male', '1', NULL, '2023-10-26 06:05:30', '2023-10-26 06:05:30'),
(2, 102, 'Nanyanzi Rehma', 'Kireka', '0776598788', '2023-10-09', 'Female', '1', NULL, '2023-10-26 06:47:57', '2023-10-26 06:47:57'),
(4, 102, 'Esau Nsumba', 'Kabowa', '0756765767', '2023-10-03', 'Male', 'Alive', NULL, '2023-10-26 07:32:59', '2023-10-26 07:32:59'),
(5, 103, 'Ali Mukasa', 'Kireka', '0786788', '1977-03-25', 'Male', 'Alive', NULL, '2023-11-03 07:08:37', '2023-11-03 07:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `creditors`
--

CREATE TABLE `creditors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditors`
--

INSERT INTO `creditors` (`id`, `user_id`, `name`, `address`, `contact`, `amount`, `description`, `file`, `created_at`, `updated_at`) VALUES
(2, 102, 'Allan Kabuura', 'Kisasi', '0756567667', '900000', 'loan', 'Creditor_1736748448.jpg', '2023-10-26 10:22:50', '2025-01-13 03:07:28'),
(3, 106, 'The Masscos', 'Entebbe', '07789562315', '20000', 'for the items i took', NULL, '2023-11-21 04:42:09', '2023-11-21 04:42:09'),
(5, 110, 'MELCHI ADVOCATES', 'KIREKA NAMUGONGO', '07039283', '100000', 'Money paid in advance for legal services.', NULL, '2023-12-02 22:15:47', '2023-12-02 22:15:47'),
(6, 124, 'Dan', 'Entebbe', '0750778965', '100000', 'all my debys', NULL, '2023-12-22 14:09:17', '2023-12-22 14:09:17'),
(7, 125, 'MUKWAYA ROGERS', 'KAWEMPE', '0701409609', '6000000', 'HE GOT A LOAN OF SIX MILLION FROM ME AND PROMISED TO PAY IN JANUARY 2025', NULL, '2024-01-22 17:13:55', '2024-01-22 17:13:55'),
(9, 126, 'MUWONGE KINTU', 'BUSEGA', '0709023401', '100000', 'FOR FURNITURE WORKS', NULL, '2024-01-22 18:03:55', '2024-01-22 18:03:55'),
(10, 126, 'MUWONGE KINTU', 'BUSEGA', '0709023401', '100000', 'FOR FURNITURE WORKS', NULL, '2024-01-22 18:03:55', '2024-01-22 18:03:55'),
(11, 127, 'MUKISA JOHN', 'BUSEGA', '0783533435', '20000', 'FOR SHOES', NULL, '2024-01-22 20:38:57', '2024-01-22 20:38:57'),
(12, 135, 'Masscoss', 'earth', '0234477288', '200000000', NULL, NULL, '2024-02-21 14:19:09', '2024-02-21 14:19:09'),
(13, 135, 'sdadf', 'sdfgh', '123456', '23456', NULL, NULL, '2024-03-01 17:00:15', '2024-03-01 17:00:15'),
(14, 51, 'first creditor', 'wakiso', '6543223456', '20000', 'service', NULL, '2024-06-19 11:35:20', '2024-06-19 11:35:20'),
(15, 221, 'tfygvyvyivbyiv', 'ufvgyigiug', '36458798', '765846669', 'yigiygvuytv', NULL, '2025-02-10 10:20:21', '2025-02-12 12:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `user_id`, `name`, `address`, `contact`, `amount`, `description`, `file`, `created_at`, `updated_at`) VALUES
(2, 102, 'Mukyaya Eric', 'Ntinda', '07867576', '70000', 'loan', 'Debtor_1736748679.jpg', '2023-10-26 10:35:42', '2025-01-13 03:11:19'),
(3, 106, 'Dan Maseke', 'Entebbe', '01478896523', '800000000', 'Million dollars', NULL, '2023-11-21 04:42:43', '2023-11-21 04:42:43'),
(5, 110, 'SSENYANGE ISAAC KEITH', 'NAMUGNGO MBALWA', '0701231030', '20000', 'Money for buying groceries.', NULL, '2023-12-02 22:17:07', '2023-12-02 22:17:07'),
(6, 124, 'Masscos', 'Entebbe', '0772725698', '500', 'all the items i took', NULL, '2023-12-22 14:09:46', '2023-12-22 14:09:46'),
(7, 125, 'MUTAAKI PETER OWEN', 'KYEBANDO', '0704242193', '1000000', 'AM SUPPOSED TO PAY HIM IN TWO INSTALLMENTS \r\nFIRST ONE IN 2024 AND OTHER ONE IN 2025', NULL, '2024-01-22 17:15:59', '2025-01-10 04:21:22'),
(9, 126, 'MUSOKE IRENE', 'BUSEGA', '0709283732', '200000', 'FOR CLOTHES', 'Debtor_1736761971.jpg', '2024-01-22 18:04:46', '2025-01-13 06:52:51'),
(10, 127, 'JOHN PAUL', 'BULOBA', '0708383383', '50000', 'WATER', NULL, '2024-01-22 20:39:39', '2024-01-22 20:39:39'),
(11, 135, 'DK', 'Mars', '012353', '20000000000', 'goods', 'Debtor_1736493144.jpg', '2024-02-21 14:20:13', '2025-01-10 04:12:24'),
(12, 135, '23456', 'sdfgh', '23456', '123456', 'asdfgh', NULL, '2024-03-01 17:00:35', '2024-03-01 17:00:35'),
(13, 51, 'first debtor', 'wakiso', '7654322345', '200000', 'serviced', NULL, '2024-06-19 11:35:47', '2024-06-19 11:35:47'),
(14, 151, 'Majorie Nalunkuma', 'Matugga', '0754522055', '8000000', 'Ms. Marjorie  Nalunkuma sold mine car Toyota Raum UAG 768G to her cousin Mr. Kalungi Gelvard at UgShs 11,000,000 and only gave me UgShs 3,000,000.', NULL, '2024-10-24 14:06:54', '2024-10-24 14:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `dependants`
--

CREATE TABLE `dependants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `dependant_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependants`
--

INSERT INTO `dependants` (`id`, `user_id`, `name`, `address`, `gender`, `contact`, `date_of_birth`, `dependant_file`, `created_at`, `updated_at`) VALUES
(2, 102, 'Edson Mwalimu', 'Kyanja', 'Male', '07098686', '2000-10-25', NULL, '2023-10-26 08:58:05', '2023-10-26 08:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `executors`
--

CREATE TABLE `executors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `executors`
--

INSERT INTO `executors` (`id`, `user_id`, `name`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(3, 102, 'Namiiro Habiibah', '0755768878', 'Kawempe', '2023-11-10 08:41:27', '2023-11-10 08:41:27'),
(4, 106, 'Sophia Namazzi', '0750718162', 'MA', '2023-11-14 11:35:04', '2023-11-14 11:35:04'),
(5, 106, 'a', '2234', 'as', '2023-11-22 04:40:40', '2023-11-22 04:40:40'),
(6, 110, 'SSENYANGE ISAAC KEITH', '0701231030', 'NAMUGONGO-MBALWA', '2023-12-02 22:55:18', '2023-12-02 22:55:18'),
(7, 110, 'BABIRYE ANN MARY', '0703928363', 'BULOBA', '2023-12-02 22:56:13', '2023-12-02 22:56:13'),
(8, 110, 'NANYONJO IRENE KAREEN', '0703928363', 'KITOVU', '2023-12-02 22:59:43', '2023-12-02 22:59:43'),
(9, 112, 'mmmd', '0099988', 'jdjdjjd', '2023-12-04 23:15:08', '2023-12-04 23:15:08'),
(10, 51, 'Mariam', '1234578889', 'Entebbe', '2023-12-05 11:42:58', '2023-12-05 11:42:58'),
(11, 122, 'SSENYANGE', '0703928363', 'NAMUGONGO', '2023-12-20 14:06:28', '2023-12-20 14:06:28'),
(12, 122, 'ANN', '0703928363', 'BULOBA', '2023-12-20 14:06:50', '2023-12-20 14:06:50'),
(13, 124, 'Sarah', '0750718162', 'Entebbe', '2023-12-22 14:16:32', '2023-12-22 14:16:32'),
(14, 125, 'MUKWAYA ROGERS', '0701409609', 'KIRA', '2024-01-22 17:22:46', '2024-01-22 17:22:46'),
(16, 126, 'MUKASA ERIC', '0703926745', 'BUSEGA', '2024-01-22 18:30:20', '2024-01-22 18:30:20'),
(17, 126, 'BABIRYE MUKASA', '0794567890', 'BULOBA', '2024-01-22 18:31:01', '2024-01-22 18:31:01'),
(18, 127, 'MUWONGO GEORGE', '0703927664', 'BUIKWE', '2024-01-22 20:52:37', '2024-01-22 20:52:37'),
(19, 127, 'MUGOYA MERCY', '0784566925', 'BUSEGA', '2024-01-22 20:53:06', '2024-01-22 20:53:06'),
(20, 128, 'Mariam', '0879837898', 'entebbe', '2024-02-05 11:40:07', '2024-02-05 11:40:07'),
(21, 129, 'Mariam', '0123654789', 'er', '2024-02-05 12:47:34', '2024-02-05 12:47:34'),
(22, 131, 'Mariam', '0789654123', 'eb', '2024-02-05 13:15:02', '2024-02-05 13:15:02'),
(23, 132, 'MAriam', '0750718162', 'Ma', '2024-02-05 18:59:54', '2024-02-05 18:59:54'),
(24, 133, 'Mariam', '070718162', 'ma', '2024-02-07 01:07:25', '2024-02-07 01:07:25'),
(25, 134, 'Mariam', '0750718162', 'ebbs', '2024-02-07 01:19:40', '2024-02-07 01:19:40'),
(26, 135, 'mafiam', '123654789', 'a', '2024-02-07 01:40:11', '2024-02-07 01:40:11'),
(27, 138, 'Mirembe Shammah', '0705269891', 'Nsaggu, Kajjansi town council, Wakiso district', '2024-07-08 14:10:22', '2024-07-08 14:10:22'),
(28, 110, 'NAMISANVU JULIET SAMONA', '9986', 'USA', '2024-07-10 02:30:06', '2024-07-10 02:30:06'),
(29, 146, 'Grace namayanja', '0788028878', 'Katikamu', '2024-07-31 03:11:36', '2024-07-31 03:11:36'),
(30, 151, 'Patrick Sewanoda', '0756665533', 'Nakasero', '2024-10-24 14:23:11', '2024-10-24 14:23:11'),
(31, 151, 'Christopher Nyenje', '0772068367', 'Mityana', '2024-10-24 14:24:28', '2024-10-24 14:24:28'),
(33, 160, 'bob', '123456789', 'kireka', '2024-11-18 06:43:51', '2024-11-18 06:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(10, 'What is a Will?', '<p><b>A will</b>, or a last will and testament, is a legal document that describes how you would like your property and other assets to be distributed after your death.<br>When you make a will, you can also use it to nominate guardians for your minor children, dependents, or any other beneficiary.<br></p>', 1, '2023-12-06 19:27:49', '2023-12-06 19:27:49'),
(11, 'FOUR LEGAL TERMS YOU SHOULD KNOW:', '<p><b>Testator: </b>The person who creates a will<b><br>Executor: </b>The person that the testator appoints to carry out their will.<br>Beneficiaries: The people or organizations who are left bequests (cash gifts, assets or others) in the will by the testator.<b><br>Probate: </b>Is the judicial process whereby a will is &amp;quot;proved&amp;quot; in a court of law and accepted as a valid public document that is the true last testament of the deceased<b>. <br></b>When you pass away with a will, the will is usually presented to a court within territorial and pecuniary Jurisdiction. This court then authorizes the executor to distribute your assets according to the instructions in your will.<b><br>Intestate:</b> this is when you die without a will or valid will. In those cases, a court will distribute your property according to intestacy law under the Succession Act.<b><br></b>These typically give your spouse or partner, children, parents, siblings or other relatives a part of your property. But this may not necessarily be in the order or amounts you would like. The estate is settled according to the laws of intestacy as provided under the Succession Act at the time of death in the absence of a legal will.<b><br></b></p>', 1, '2023-12-06 19:34:30', '2023-12-06 19:58:53'),
(12, 'Who needs a will?', '<p><i>Many people assume that they are &amp;quot;too young&amp;quot; to need a will. Some people<br>believe that they don&amp;#39;t own enough assets or have a big enough net worth to<br>necessitate a will. You might even think it&amp;#39;s too late to start your first will.<br><u>Everyone needs a will.</u></i></p><p>Create your will today for the future is not promised.<i><u><br></u></i></p>', 1, '2023-12-06 19:35:11', '2023-12-06 19:35:41'),
(13, 'What do I need to have a will?', 'As long you are of majority age with beneficiaries and have any assets in whatever form to dispose off in accordance to wishes upon your demise.', 1, '2023-12-06 19:36:16', '2023-12-06 19:36:16'),
(14, 'Where do I find my loved one’s will?', '<p>In Uganda, currently people register their wills/documents with URSB<br>Uganda Registration Service Bureau you can try checking there.</p><ul><li>Bank’s safe custody.</li><li>One’s Advocate/Attorney.</li><li>A copy can also be retrieved from Witness to a will.</li><li>Any other place that the person customarily kept their document for custody.</li></ul>', 1, '2023-12-06 19:37:06', '2025-01-20 10:43:25'),
(22, 'Reply to Feedback', '123456789', 1, '2025-02-06 05:55:19', '2025-02-06 05:55:19'),
(23, 'ooh thats nice', 'poiuytrewq', 1, '2025-02-06 05:58:55', '2025-06-26 07:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `replied` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `email`, `fullname`, `message`, `replied`, `created_at`, `updated_at`) VALUES
(2, 'habibkyeyune31@gmail.com', 'kyeyune habib', 'testing feedback', 1, '2025-01-30 03:39:22', '2025-02-06 06:13:39'),
(8, 'habibkyeyune31@gmail.com', 'tusu tusu', 'testing testing', 1, '2025-02-06 05:54:50', '2025-02-06 06:00:13'),
(9, 'habibkyeyune31@gmail.com', 'habib', 'testing', NULL, '2025-02-11 21:56:53', '2025-02-11 21:56:53'),
(10, 'habibkyeyune31@gmail.com', 'habib', 'testing', NULL, '2025-02-11 21:57:12', '2025-02-11 21:57:12'),
(11, 'habibkyeyune31@gmail.com', 'habib', 'testing', NULL, '2025-02-11 22:03:14', '2025-02-11 22:03:14'),
(12, 'habibkyeyune31@gmail.com', 'habib', 'testing', NULL, '2025-02-11 22:04:23', '2025-02-11 22:04:23'),
(13, 'habibkyeyune31@gmail.com', 'habib', 'testing', NULL, '2025-02-11 22:07:33', '2025-02-11 22:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `guardian_file` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `user_id`, `name`, `address`, `contact`, `gender`, `guardian_file`, `updated_at`, `created_at`) VALUES
(1, 102, 'Ali Mulyanyama', 'Kireka', '0799787867', 'Male', NULL, '2023-10-26 10:06:34', '2023-10-26 10:06:34'),
(3, 106, 'Dan Maseke', 'Entebbe', '077856231995', 'Male', NULL, '2023-11-21 04:41:34', '2023-11-21 04:41:34'),
(5, 110, 'BABIRYE ANN MARY NAMIIRO', 'BULOBA', '07039283', 'Female', NULL, '2023-12-02 22:12:11', '2023-12-02 22:12:11'),
(6, 110, 'JULIET SAMONA', 'BUSEGA', '07039283', 'Female', NULL, '2023-12-02 22:12:55', '2023-12-02 22:12:55'),
(7, 122, 'NAKAMYA', 'NAMUGONGO', '0703928363', 'Male', NULL, '2023-12-20 13:41:50', '2023-12-20 13:41:50'),
(8, 124, 'Sarah', 'MA', '071856245', 'Female', NULL, '2023-12-22 14:07:31', '2023-12-22 14:07:31'),
(9, 125, 'NAMUYIBWA SARAH', 'KYALIWAJJALA', '0742149477', 'Male', NULL, '2024-01-22 17:12:07', '2024-01-22 17:12:07'),
(10, 126, 'ERIC MUKASA', 'NATEETE', '0702846573', 'Male', NULL, '2024-01-22 18:02:27', '2024-01-22 18:02:27'),
(11, 126, 'BABIRYE MUKASA', 'BULOBA', '0703928361', 'Female', NULL, '2024-01-22 18:02:58', '2024-01-22 18:02:58'),
(12, 127, 'JOHN SENTONGO', 'BUSEGA', '0702822726', 'Male', NULL, '2024-01-22 20:38:13', '2024-01-22 20:38:13'),
(13, 135, 'testing Guardian', 'sdfgh', '3423456', 'Male', NULL, '2024-03-01 16:59:59', '2024-03-01 16:59:59'),
(14, 51, 'first guardian', 'wakios', '1234567765', 'Male', NULL, '2024-06-19 11:34:53', '2024-06-19 11:34:53'),
(15, 146, 'Juliet nakiwu', 'Katikamu', '0773055327', 'Female', NULL, '2024-07-31 03:08:54', '2024-07-31 03:08:54'),
(16, 151, 'Atim Assumpta', 'P. O Box 104537 Kampala', '0704497297', 'Female', NULL, '2024-10-24 13:54:55', '2024-10-24 13:54:55'),
(17, 151, 'Marjorie Nalunkuma', 'Matugga', '0754522055', 'Female', NULL, '2024-10-24 13:55:46', '2024-10-24 13:55:46'),
(18, 221, 'byubibhu', 'yugbiub', '65468976', 'female', NULL, '2025-02-12 12:23:56', '2025-02-10 10:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `heirs`
--

CREATE TABLE `heirs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `block` varchar(100) NOT NULL,
  `plot` varchar(100) NOT NULL,
  `custodian` varchar(255) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `user_id`, `type`, `category`, `location`, `block`, `plot`, `custodian`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(1, 102, 'Bungalow', 'Residentail', 'Kyanja', '', '', 'Ali', 'Alice - 075900876 - Kawanda - Spouse', NULL, '2023-10-30 05:23:37', '2023-11-08 07:55:26'),
(3, 102, 'Bungalow', 'Residentail', 'fgdhfg', '', '', 'cvbfg', NULL, NULL, '2023-10-30 10:36:18', '2023-10-30 10:36:18'),
(9, 106, 'Bungalow', 'Commercial', 'Entebbe', '444', '62', 'none', NULL, NULL, '2023-11-17 03:49:44', '2023-11-17 03:49:44'),
(15, 106, 'Flat House', 'Residential', 'test', '23', 'w3', 'test', NULL, NULL, '2023-11-20 04:24:02', '2023-11-20 04:24:02'),
(17, 106, 'Bungalow', 'Residential', 'testing', 'adfa', 'asdf', 'dsfa', NULL, NULL, '2023-11-21 06:31:58', '2023-11-21 06:31:58'),
(21, 106, 'Flat House', 'Commercial', 'ds', 'ad', 'ds', 'ada', NULL, NULL, '2023-11-22 04:28:09', '2023-11-22 04:28:09'),
(22, 110, 'Bungalow', 'Commercial', 'SHOP AT NATEETE', '18', '642', 'NAMUDDU SARAH', NULL, NULL, '2023-12-02 22:22:22', '2023-12-02 22:22:22'),
(26, 122, 'Bungalow', 'Commercial', 'MAYA', '20', '1250', 'LUBWAMA-0703928363', NULL, NULL, '2023-12-20 13:54:35', '2023-12-20 13:54:35'),
(27, 124, 'Bungalow', 'Residential', 'Entebbe', '45', '78', 'none', NULL, NULL, '2023-12-22 14:11:11', '2023-12-22 14:11:11'),
(28, 124, 'Flat House', 'Commercial', 'wakiso', '45', '89', 'none', NULL, NULL, '2023-12-22 14:11:33', '2023-12-22 14:11:33'),
(29, 125, 'Bungalow', 'Residential', 'KIRA BULINDO', 'D26', '100*50', 'KAPEERE PETER', NULL, NULL, '2024-01-22 17:47:08', '2024-01-22 17:47:08'),
(30, 126, 'Bungalow', 'Residential', 'KIREKA', '80', '15', 'FAMILY', NULL, NULL, '2024-01-22 18:09:26', '2024-01-22 18:09:26'),
(31, 127, 'Flat House', 'Residential', 'KIREKA', '18', '101', 'FAMILY', NULL, NULL, '2024-01-22 20:41:29', '2024-01-22 20:41:29'),
(32, 127, 'Flat House', 'Residential', 'KIREKA', '18', '101', 'FAMILY', NULL, NULL, '2024-01-22 20:41:29', '2024-01-22 20:41:29'),
(33, 135, 'Bungalow', 'Residential', 'wakiso', '23', '32', 'myself', NULL, NULL, '2024-02-21 13:38:23', '2024-02-21 13:38:23'),
(34, 135, 'Flat House', 'Commercial', 'kampala', '345', '543', 'second', NULL, NULL, '2024-02-21 13:38:57', '2024-02-21 13:38:57'),
(35, 135, 'Flat House', 'Commercial', 'Entebbe', '58', '95', 'MAriam', NULL, NULL, '2024-03-01 16:27:10', '2024-03-01 16:27:10'),
(36, 135, 'Flat House', 'Commercial', 'test', 'wert', 'wer', 'sdfa', NULL, NULL, '2024-03-01 17:01:21', '2024-03-01 17:01:21'),
(37, 51, 'Bungalow', 'Residential', 'wakiso', '43', '23', 'me', NULL, NULL, '2024-06-19 11:37:14', '2024-06-19 11:37:14'),
(38, 51, 'Flat House', 'Commercial', 'wakiso', '45', '53', 'none', NULL, NULL, '2024-06-19 11:37:33', '2024-06-19 11:37:33'),
(39, 110, 'Flat House', 'Residential', 'KATENDE', '602', '50', 'FAMILY HOUSE', NULL, NULL, '2024-07-10 02:19:30', '2024-07-10 02:19:30'),
(40, 221, 'commercial', 'flat', 'guyghjk', 'ou877', 'ytyyutuitiut', 'ytivgbhj', NULL, NULL, '2025-02-10 10:22:30', '2025-02-12 12:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `house_dispositions`
--

CREATE TABLE `house_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_dispositions`
--

INSERT INTO `house_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(8, 106, 9, 'first floor', 'only 2 rooms', 'Nailah Franey - - MA - Child', '2023-11-17 05:47:54', '2023-11-17 05:47:54'),
(9, 106, 15, 'whole house', 'take the whole house', 'Jajja - - Entebbe - Dependant', '2023-11-20 07:44:08', '2023-11-20 07:44:08'),
(10, 106, 17, 'whole house', 'whole house', 'Sophia Namazzi - - MA - Heir', '2023-11-21 06:32:28', '2023-11-21 06:32:28'),
(11, 106, 21, 'undefined', 'undefined', NULL, '2023-11-22 04:30:47', '2023-11-22 04:30:47'),
(12, 110, 22, '4.7 FT BY 7FT', 'undefined', 'NAMUTEBI PAULINE - 0703928363 - BUSEGA - Heir', '2023-12-02 22:35:06', '2023-12-02 22:35:06'),
(13, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(14, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(15, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(16, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(17, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(18, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(19, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:12', '2023-12-02 22:45:12'),
(20, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:13', '2023-12-02 22:45:13'),
(21, 110, 22, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:13', '2023-12-02 22:45:13'),
(22, 122, 26, '5 ACRES', 'SUBDIVISION', 'DANNIEL - 0703928363 - NAMUGONGO - OtherRelative', '2023-12-20 14:02:13', '2023-12-20 14:02:13'),
(23, 122, 26, '5 ACRES', 'SUBDIVISION', 'MERCY - 0703928363 - NAMUGONGO - Heir', '2023-12-20 14:02:24', '2023-12-20 14:02:24'),
(24, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2023-12-20 14:24:17', '2023-12-20 14:24:17'),
(25, 124, 28, '1', 'whole of it', 'Sophia - 0750718162 - IO - Heir', '2023-12-22 14:14:14', '2023-12-22 14:14:14'),
(26, 110, 22, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:49:27', '2024-01-08 20:49:27'),
(27, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:32', '2024-01-08 20:52:32'),
(28, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:32', '2024-01-08 20:52:32'),
(29, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:52', '2024-01-08 20:52:52'),
(30, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:52', '2024-01-08 20:52:52'),
(31, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:52', '2024-01-08 20:52:52'),
(32, 110, 22, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:52:53', '2024-01-08 20:52:53'),
(33, 126, 30, NULL, NULL, 'MUKASA NORINE - 0703928363 - NAMUGONGO - Spouse', '2024-01-22 18:25:51', '2024-01-22 18:25:51'),
(34, 126, 30, NULL, NULL, 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:26:07', '2024-01-22 18:26:07'),
(35, 126, 30, NULL, NULL, 'MUKASA MAJORINE - 0703928363 - KIREKA - Spouse', '2024-01-22 18:26:16', '2024-01-22 18:26:16'),
(36, 126, 30, NULL, NULL, 'MUKASA MELANIE - 0703928363 - KIREKA - Child', '2024-01-22 18:26:26', '2024-01-22 18:26:26'),
(37, 127, 31, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:47:45', '2024-01-22 20:47:45'),
(38, 127, 32, '10', NULL, 'JENNY KISA - 0703754233 - KIREKA - Child', '2024-01-22 20:47:54', '2024-01-22 20:47:54'),
(39, 135, 34, 'undefined', 'undefined', 'ada - 8904193 - fg - Dependant', '2024-02-21 13:50:03', '2024-02-21 13:50:03'),
(40, 135, 33, 'all of it', 'all of it', 'first - 598900 - sa - Child', '2024-02-21 13:50:30', '2024-02-21 13:50:30'),
(41, 135, 35, 'W', 'WER', 'kasdlf - 2345 - sdfg - Heir', '2024-03-01 17:03:29', '2024-03-01 17:03:29'),
(42, 135, 35, 'W', 'WER', 'BK - 0758662148 - earth - OtherRelative', '2024-03-01 17:03:35', '2024-03-01 17:03:35'),
(43, 135, 35, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:03:41', '2024-03-01 17:03:41'),
(44, 135, 35, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:03:47', '2024-03-01 17:03:47'),
(45, 135, 36, 'W', 'WER', 'testing child - 09283475 - sdf - Child', '2024-03-01 17:03:54', '2024-03-01 17:03:54'),
(46, 135, 36, 'W', 'WER', 'ada - 8904193 - fg - Dependant', '2024-03-01 17:04:01', '2024-03-01 17:04:01'),
(47, 51, 38, 'whole of it', 'whole of it', 'first spouse - 5432345677 - waakio - Spouse', '2024-06-19 11:44:43', '2024-06-19 11:44:43'),
(48, 51, 37, 'share', 'first floor', 'first - 2345678876 - wakiso - Child', '2024-06-19 11:45:10', '2024-06-19 11:45:10'),
(49, 51, 37, 'share', 'second floor', 'second child - 1234567887 - wakiso - Child', '2024-06-19 11:45:23', '2024-06-19 11:45:23'),
(50, 110, 39, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:26:34', '2024-07-10 02:26:34'),
(51, 221, 40, '78675', 'dtftyfiyufu', 'yuvuvybuyv - 876986097 - gyiggguyg - Spouse', '2025-02-11 03:38:41', '2025-02-11 03:38:55'),
(52, 221, 40, '7789', 'hddhddhdh', 'hdsrdtfgh - 987654 - hgfdscdgh - Child', '2025-02-14 11:40:12', '2025-02-14 11:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_bases`
--

CREATE TABLE `knowledge_bases` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `knowledge_bases`
--

INSERT INTO `knowledge_bases` (`id`, `title`, `description`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Creation of your will via this Platform is guided by the following laws;', '<ul><li>The 1995, Constitution of the Republic of Uganda.</li><li>The Succession Act Cap 162 as Amended.<br></li></ul>', NULL, 1, '2023-12-06 19:40:07', '2023-12-06 19:40:07'),
(19, 'FOUR LEGAL TERMS YOU SHOULD KNOW:', '<b>Testator: </b>The person who creates a will<b><br>Executor: </b>The person that the testator appoints to carry out their will.<b><br>Beneficiaries: </b>The people or organizations who are left bequests (cash gifts, assets or others) in the will by the testator.<b><br>Probate: </b>Is the judicial process whereby a will is &amp;quot;proved&amp;quot; in a court of law and accepted as a valid public document that is the true last testament of the deceased. When you pass away with a will, the will is usually presented to a court within territorial and pecuniary Jurisdiction. This court then authorizes the executor to distribute your assets according to the instructions in your will.<b><br>Intestate: </b>This is when you die without a will or valid will. In those cases, a court will distribute your property according to intestacy law under the Succession Act.<br>These typically give your spouse or partner, children, parents, siblings or other relatives a part of your property. But this may not necessarily be in the order or amounts you would like. The estate is settled according to the laws of intestacy as provided under the Succession Act at the time of death in the absence of a legal will.<br>', NULL, 1, '2023-12-06 19:42:27', '2023-12-06 19:57:35'),
(20, 'Who needs a will?', '<i>Many people assume that they are too young to need a will. Some people believe that they don\'t own enough assets or have a big enough net worth to necessitate a will. You might even think it\'s too late to start your first will.</i><br><u>Everyone needs a will.</u><br>Create your will today for the future is not promised.', NULL, 1, '2023-12-06 19:43:26', '2023-12-20 14:20:25'),
(21, 'When do I need to have a will?', '<i>As long you are of majority age with beneficiaries and have any assets in whatever form to dispose off in accordance to wishes upon your demise.</i>', NULL, 1, '2023-12-06 19:43:57', '2023-12-20 14:19:34'),
(22, 'Where do I find my loved one’s will?', '<p><i>In Uganda, currently people register their wills/documents with URSB<br>Uganda Registration Service Bureau you can try checking there.</i></p><ul><li><i>&nbsp;Bank’s safe custody.</i></li><li><i>&nbsp;One’s Advocate/Attorney.</i></li><li><i>A copy can also be retrieved from Witness to a will.</i></li><li><i>Any other place that the person customarily kept their document for custody.</i></li></ul>', NULL, 1, '2023-12-06 19:44:51', '2023-12-06 19:44:51'),
(23, 'When will I be asked to pay?', '<p><i>At</i><a href=\"http://127.0.0.1:8000/www.validwills.net\" target=\"_blank\"> validwills</a><i>,you will only be asked to make a payment after you have<br>fully\r\n and duly filled in your information for creation of your legal document\r\n we have helped you create. The payment process will be initiated and \r\nupon payment you will be able to preview, edit and proof read your \r\ndocument and when you are ready, you print and execute your will by \r\nsigning it and witnesses should sign.<br>You can after signing and also after your witnesses have signed upload the<br>document or make any necessary edits for life.</i></p>', NULL, 1, '2023-12-06 19:46:07', '2025-01-20 10:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE `lands` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `district` varchar(100) NOT NULL,
  `village` varchar(255) NOT NULL,
  `block` varchar(100) NOT NULL,
  `plot` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `custodian` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `interest_type` varchar(100) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lands`
--

INSERT INTO `lands` (`id`, `user_id`, `district`, `village`, `block`, `plot`, `size`, `custodian`, `description`, `interest_type`, `disposed_to`, `created_at`, `updated_at`, `file`) VALUES
(3, 102, '', 'Kikandwa', '', '', '100', 'Miriam', NULL, 'Kibanja', 'Alice - 075900876 - Kawanda - Spouse', '2023-10-31 04:49:26', '2023-11-08 07:41:16', NULL),
(4, 102, 'Luweero', 'Kikyusa', '20', '20', '1000', 'none', 'bought it', 'Kyapa', 'Sarah Aziz - 0750017176 - Kyanja - Spouse', '2023-11-08 05:03:29', '2025-01-13 06:59:56', 'Land_1736762396.jpg'),
(5, 106, 'Wakiso', 'Entebbe', '456', '952', '20 hectare', 'none', NULL, 'Titled Land (Kyapa)', 'Nailah Franey - - MA - Child', '2023-11-14 05:56:52', '2023-11-16 09:56:53', NULL),
(6, 106, 'Mitiyana', 'Entebbe', '47', '85', 'dsa', 'ad', 'adsaaf', 'Kibanja', NULL, '2023-11-17 04:39:13', '2023-11-17 04:39:13', NULL),
(15, 106, 'wef', 'sd', '23', '23', 'as', 'ad', NULL, 'Customary Land', NULL, '2023-11-22 04:27:45', '2023-11-22 04:27:45', NULL),
(16, 122, 'KAMPALA', 'NATEETE', '18', '642', '11 DECIMALS', 'NONE', 'LAND AT NANFUKA ZONE', 'Titled Land (Kyapa)', NULL, '2023-12-20 13:50:48', '2023-12-20 13:50:48', NULL),
(17, 122, 'MPIGI', 'BULANSINKU', '20', '18', '10 ACRES', 'NONE', 'THIS LAND IS BORDERED BY MASAKA ROAD ON THE RIGHT, JOHN ON THE LEFT AND SAMMIE IN THE SOUTH.', 'Kibanja', NULL, '2023-12-20 13:53:19', '2023-12-20 13:53:19', NULL),
(19, 124, 'Wakiso', 'Mityana', '45', '78', '45 acres', 'Jajja', NULL, 'Kibanja', NULL, '2023-12-22 14:10:21', '2023-12-22 14:10:21', NULL),
(20, 110, 'KAMPALA', 'nateete', '18', '642', '12DECIMALS', 'SARAH', 'KIBANJA THAT HAS MY MGN SHOP', 'Kibanja', NULL, '2024-01-08 20:48:21', '2024-01-08 20:48:21', NULL),
(21, 125, 'WAKISO', 'KAMWENGE', 'A1283', '73', '100 *100', 'MUZAMILU', 'I BOUGHT THIS LAND IN 2020 AND ITS WELL FENCED', 'Titled Land (Kyapa)', NULL, '2024-01-22 17:17:26', '2024-01-22 17:17:26', NULL),
(22, 126, 'KAMAPALA', 'NATEETE', '20', '8', '20 DECIMALS', 'MERCY', 'Land  comprised on Kibuga Block 20', 'Titled Land (Kyapa)', NULL, '2024-01-22 18:06:28', '2024-01-22 18:06:28', NULL),
(23, 126, 'MUKONO', 'KYAGGWE', '83', '20', '2 ACRES', 'MIKE', 'Land on Kayunga Road next Munira\'s farm', 'Titled Land (Kyapa)', NULL, '2024-01-22 18:08:29', '2024-01-22 18:08:29', NULL),
(24, 127, 'MUKONO', 'KYAGWE', '80', '20', '10 ACRES', 'MALE', 'LAND FOR FARMING', 'Titled Land (Kyapa)', NULL, '2024-01-22 20:40:46', '2024-01-22 20:40:46', NULL),
(25, 135, 'wakiso', 'kampala', '34', '45', '45 arces', 'first', NULL, 'Titled Land (Kyapa)', NULL, '2024-02-21 13:37:53', '2024-02-21 13:37:53', NULL),
(26, 135, 'Mpigi', 'Mpigi', '45', '36', '23 arces', 'Mariam', 'akjdlfa;fedghjuiytgrfedsxcdvfbghnyjukil', 'Titled Land (Kyapa)', NULL, '2024-03-01 16:26:44', '2024-03-01 16:26:44', NULL),
(27, 135, 'test', 'xzc', '2', '2', 'dsf', 'adfa', 'dsa', 'Customary Land', NULL, '2024-03-01 17:01:02', '2024-03-01 17:01:02', NULL),
(28, 51, 'wakiso', 'wako', '234', '433', '45 arces', 'none', NULL, 'Titled Land (Kyapa)', NULL, '2024-06-19 11:36:17', '2024-06-19 11:36:17', NULL),
(29, 51, 'wakiso', 'aks', '6666666', '456', '5 arces', 'none', NULL, 'Customary Land', NULL, '2024-06-19 11:36:49', '2024-06-19 11:36:49', NULL),
(30, 110, 'MPIGI', 'BULANSIKU', '602', '22', '50 DECIMALS', 'NONE', 'LAND BULASIKU', 'Titled Land (Kyapa)', NULL, '2024-07-10 02:18:40', '2024-07-10 02:18:40', NULL),
(31, 151, 'Wakiso', 'Bugogo', '440', '543', '0.19 Acres', 'Atim Assumpta and Nickson', 'Land used for a mini Farm', 'Titled Land (Kyapa)', NULL, '2024-10-24 14:12:34', '2024-10-24 14:12:34', NULL),
(33, 154, 'hsabxjBBJbSJH', 'matugga', '23', '5432', '23', 'me', 'nbcdvchgcvuavchvc', 'Customary Land', NULL, '2024-11-05 03:14:16', '2024-11-05 03:14:16', NULL),
(37, 160, 'yf7yfyfi', 'vyvyu', 'v8v8', 'v8yyu', '87', 'gyviu', NULL, 'broker', NULL, '2024-11-05 07:36:47', '2024-11-05 07:36:47', 'uploads/land_files/TmLuo7dJje5FP9coqnTt5iaetkMqnpw5qxJm00a2.pdf'),
(38, 221, 'bvbgcgxgfhc', 'uydtrsyerdgh', '7867545', 'uydtsry5rt', '87765 metre', 'fythddgh', 'biveeuvbeisubv', 'broker', NULL, '2025-02-12 12:40:36', '2025-02-12 12:40:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `land_dispositions`
--

CREATE TABLE `land_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_dispositions`
--

INSERT INTO `land_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 106, 5, '10 hectare', 'Take the one next to the mall', 'Nailah Franey - - MA - Child', '2023-11-16 11:22:41', '2023-11-16 11:22:41'),
(2, 106, 5, '5 hectare', 'Take the one where Nailah stop', 'Jordan Franey - - MA - Child', '2023-11-16 11:23:31', '2023-11-16 11:23:31'),
(3, 106, 5, '10', 'next to mall', 'Nailah Franey - - MA - Child', '2023-11-16 11:28:02', '2023-11-16 11:28:02'),
(4, 106, 5, '4', 'the remaining part', 'Jajja - - Entebbe - Dependant', '2023-11-16 11:44:36', '2023-11-16 11:44:36'),
(5, 106, 5, '2', 'sda', 'Jajja - - Entebbe - Dependant', '2023-11-16 11:47:06', '2023-11-16 11:47:06'),
(6, 106, 6, 'dsa', 'ds', 'Hmm - - Earth - Spouse', '2023-11-17 04:40:47', '2023-11-17 04:40:47'),
(7, 106, 15, 'undefined', 'undefined', NULL, '2023-11-22 04:30:16', '2023-11-22 04:30:16'),
(8, 122, 16, '5', 'NATEETE- TO BE SUBDIVIDED', 'MARY GRACIA - 0703928363 - NAMUGONGP - Child', '2023-12-20 13:59:48', '2023-12-20 13:59:48'),
(9, 122, 16, '6', 'NATEETE- TO BE SUBDIVIDED', 'SSENYANGE - 0703928363 - NAMUGONGO - Dependant', '2023-12-20 14:00:06', '2023-12-20 14:00:06'),
(10, 122, 17, '6', 'NATEETE- TO BE SUBDIVIDED', 'MARY GRACIA - 0703928363 - NAMUGONGP - Child', '2023-12-20 14:00:46', '2023-12-20 14:00:46'),
(11, 122, 17, '5 ACRES', 'SUBDIVISION', 'DANNIEL - 0703928363 - NAMUGONGO - OtherRelative', '2023-12-20 14:01:28', '2023-12-20 14:01:28'),
(12, 122, 17, '5 ACRES', 'SUBDIVISION', 'MERCY - 0703928363 - NAMUGONGO - Heir', '2023-12-20 14:01:47', '2023-12-20 14:01:47'),
(13, 110, 18, '20', 'NATEETE', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-20 14:26:34', '2023-12-20 14:26:34'),
(14, 110, 18, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2023-12-20 14:28:12', '2023-12-20 14:28:12'),
(15, 110, 18, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2023-12-20 14:28:13', '2023-12-20 14:28:13'),
(16, 124, 19, '1', 'whole of it', 'Jajja - 0772384918 - Entebbe - OtherRelative', '2023-12-22 14:13:59', '2023-12-22 14:13:59'),
(17, 110, 20, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:48:50', '2024-01-08 20:48:50'),
(18, 110, 20, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:49:06', '2024-01-08 20:49:06'),
(19, 125, 21, '50*50', 'THIS IS MY OTHER LAND', 'NUWAGABA - 0755273013 - KAMPALA - Child', '2024-01-22 17:26:32', '2024-01-22 17:26:32'),
(20, 126, 22, '10', 'HALF OF THE PROPERTY', 'MUKASA MELANIE - 0703928363 - KIREKA - Child', '2024-01-22 18:14:25', '2024-01-22 18:14:25'),
(21, 126, 22, '10', 'HALF OF THE PROPERTY', 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:14:44', '2024-01-22 18:14:44'),
(22, 126, 23, '1 ACRE', 'HALF OF THE PROPERTY', 'MUKASA MAJORINE - 0703928363 - KIREKA - Spouse', '2024-01-22 18:15:30', '2024-01-22 18:15:30'),
(23, 126, 23, '1 ACRE', 'HALF OF THE PROPERTY', 'MUKASA NORINE - 0703928363 - NAMUGONGO - Spouse', '2024-01-22 18:16:00', '2024-01-22 18:16:00'),
(24, 127, 24, '10', NULL, 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:47:05', '2024-01-22 20:47:05'),
(25, 127, 24, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:47:14', '2024-01-22 20:47:14'),
(26, 127, 24, '10', NULL, 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:47:30', '2024-01-22 20:47:30'),
(27, 127, 24, '10', NULL, 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:47:30', '2024-01-22 20:47:30'),
(28, 126, 22, 'undefined', 'undefined', 'MUKASA NORINE - 0703928363 - NAMUGONGO - Spouse', '2024-01-30 15:25:58', '2024-01-30 15:25:58'),
(29, 135, 25, '20 arces', 'undefined', 'first - 598900 - sa - Child', '2024-02-21 13:43:41', '2024-02-21 13:43:41'),
(30, 135, 25, '20 arces', 'undefined', 'second - 3456456 - ada - Heir', '2024-02-21 13:44:00', '2024-02-21 13:44:00'),
(31, 135, 26, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:02:51', '2024-03-01 17:02:51'),
(32, 135, 26, 'W', 'WER', 'wqerty - 1234567 - awedrfg - OtherRelative', '2024-03-01 17:02:57', '2024-03-01 17:02:57'),
(33, 135, 26, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:03:04', '2024-03-01 17:03:04'),
(34, 135, 27, 'W', 'WER', 'first - 598900 - sa - Child', '2024-03-01 17:03:10', '2024-03-01 17:03:10'),
(35, 135, 27, 'W', 'WER', 'second - 3456456 - ada - Heir', '2024-03-01 17:03:16', '2024-03-01 17:03:16'),
(36, 51, 28, '10', 'be the first to select', 'first spouse - 5432345677 - waakio - Spouse', '2024-06-19 11:41:55', '2024-06-19 11:41:55'),
(37, 51, 28, '10', 'be the second to select', 'first - 2345678876 - wakiso - Child', '2024-06-19 11:42:24', '2024-06-19 11:42:24'),
(38, 51, 28, '10', 'be the 3rd  to select', 'second child - 1234567887 - wakiso - Child', '2024-06-19 11:42:42', '2024-06-19 11:42:42'),
(39, 51, 28, '5', 'be the 4th  to select', 'first dependant - 8765432123 - wakiso - Dependant', '2024-06-19 11:43:19', '2024-06-19 11:43:19'),
(40, 51, 28, '5', 'be the 5th  to select', 'testing - 123456 - asdfa - OtherRelative', '2024-06-19 11:43:38', '2024-06-19 11:43:38'),
(41, 51, 28, '5', 'be the last  to select', 'firs heir - 7654323456 - wakiso - Heir', '2024-06-19 11:43:59', '2024-06-19 11:43:59'),
(42, 51, 29, '5', 'be the last  to select', 'first spouse - 5432345677 - waakio - Spouse', '2024-06-19 11:44:18', '2024-06-19 11:44:18'),
(45, 110, 20, 'undefined', 'undefined', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2024-07-10 02:24:54', '2024-07-10 02:24:54'),
(46, 110, 20, 'undefined', 'undefined', 'SSENYONJO ISAIAH YOHANAN - 0703928363 - NAMUGONGO - Child', '2024-07-10 02:25:04', '2024-07-10 02:25:04'),
(47, 110, 20, 'undefined', 'undefined', 'SSENYONJO ISAIAH YOHANAN - 0703928363 - NAMUGONGO - Child', '2024-07-10 02:25:04', '2024-07-10 02:25:04'),
(48, 110, 30, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:25:19', '2024-07-10 02:25:19'),
(49, 110, 30, 'undefined', 'undefined', 'SSENYONJO ISAIAH YOHANAN - 0703928363 - NAMUGONGO - Child', '2024-07-10 02:25:32', '2024-07-10 02:25:32'),
(50, 110, 30, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:25:41', '2024-07-10 02:25:41'),
(51, 110, 30, 'undefined', 'undefined', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-07-10 02:25:53', '2024-07-10 02:25:53'),
(52, 110, 30, 'undefined', 'undefined', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2024-07-10 02:26:03', '2024-07-10 02:26:03'),
(53, 151, 31, 'undefined', 'undefined', 'Atim Assumpta - 0704497297 - C/O Ronald Kaweesi P. O Box 104537 Kampala - Spouse', '2024-10-24 14:13:35', '2024-10-24 14:13:35'),
(54, 221, 38, '7', 'fgkh', 'hdsrdtfgh - 987654 - hgfdscdgh - Child', '2025-02-12 12:54:23', '2025-02-12 12:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `livestocks`
--

CREATE TABLE `livestocks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_owner` varchar(255) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestocks`
--

INSERT INTO `livestocks` (`id`, `user_id`, `type`, `number`, `location`, `location_owner`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(1, 102, 'Chicken', 10, 'Kikyusa', 'Mine', 'Kawaalya - 075565 - 3443 - Child', NULL, '2023-10-30 06:07:49', '2023-11-08 08:58:24'),
(2, 106, 'hens', 5, 'Entebbe', 'mine', 'Jordan Franey - - MA - Child', NULL, '2023-11-14 05:57:53', '2023-11-14 10:56:46'),
(4, 106, 'goats', 3, 'Entebbe', 'mine', NULL, 'Livestock_1736762030.jpg', '2023-11-17 06:02:36', '2025-01-13 06:53:50'),
(6, 106, 'cows', 4, 'Entebbe', 'mine', NULL, NULL, '2023-11-17 06:31:06', '2023-11-17 06:31:06'),
(13, 106, 'sd', 2, 'as', 'dsa', NULL, NULL, '2023-11-22 04:28:37', '2023-11-22 04:28:37'),
(14, 110, 'COWS', 100, 'BUTAMBALA', 'KYESWA FAMILY', NULL, NULL, '2023-12-02 22:24:35', '2023-12-02 22:24:35'),
(15, 122, 'COWS', 50, 'BUTAMBALA', 'KYESWA', NULL, NULL, '2023-12-20 13:55:04', '2023-12-20 13:55:04'),
(16, 124, 'chicken', 10, 'Entebbe', 'Jajja', NULL, NULL, '2023-12-22 14:11:54', '2023-12-22 14:11:54'),
(17, 125, 'cattle', 24, 'RUKUNGIRI', 'KARUGABA', NULL, NULL, '2024-01-22 17:46:05', '2024-01-22 17:46:05'),
(18, 126, 'COWS', 59, 'MUKONO', 'JOHN MUKASA(MINE)', NULL, NULL, '2024-01-22 18:10:15', '2024-01-22 18:10:15'),
(19, 127, 'GOATS', 50, 'BULOBAA', 'MYSELF', NULL, NULL, '2024-01-22 20:42:03', '2024-01-22 20:42:03'),
(20, 135, 'cows', 4, 'kampala', 'myself', NULL, NULL, '2024-02-21 13:39:22', '2024-02-21 13:39:22'),
(21, 135, 'cows', 45, 'Entebbe', 'Mine', NULL, NULL, '2024-03-01 15:53:54', '2024-03-01 15:53:54'),
(22, 135, 'cows', 34, 'Entebbe', 'mine', NULL, NULL, '2024-03-01 15:54:42', '2024-03-01 15:54:42'),
(23, 135, 'Goats', 34, 'Entebbe', 'MAriam', NULL, NULL, '2024-03-01 16:27:28', '2024-03-01 16:27:28'),
(24, 135, 'lkdsjsdf', 12345, 'sdfg', 'dfgh', NULL, NULL, '2024-03-01 16:35:19', '2024-03-01 16:35:19'),
(25, 135, 'dsa', 3, 'sdaf', 'sdf', NULL, NULL, '2024-03-01 17:01:39', '2024-03-01 17:01:39'),
(26, 51, 'goats', 45, 'wakiso', 'me', NULL, NULL, '2024-06-19 11:37:58', '2024-06-19 11:37:58'),
(27, 51, 'cows', 4, 'wakiso', 'me', NULL, NULL, '2024-06-19 11:38:16', '2024-06-19 11:38:16'),
(28, 110, 'GOATS', 10000, 'KATENDE', 'FAMILY', NULL, NULL, '2024-07-10 02:20:07', '2024-07-10 02:20:07'),
(29, 221, 'gyjdths', 68576, 'hgukft', 'uytretfygjkhuyftd', NULL, NULL, '2025-02-10 10:24:04', '2025-02-12 12:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `livestock_dispositions`
--

CREATE TABLE `livestock_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestock_dispositions`
--

INSERT INTO `livestock_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 106, 2, '2', 'Cocks', 'Jordan Franey - - MA - Child', '2023-11-17 06:01:08', '2023-11-17 06:01:08'),
(2, 106, 4, '3', 'she should be given everythin', 'Nailah Franey - - MA - Child', '2023-11-17 06:03:28', '2023-11-17 06:03:28'),
(3, 106, 6, '4', 'bulls only', 'Jordan Franey - - MA - Child', '2023-11-20 05:00:21', '2023-11-20 05:00:21'),
(4, 106, 13, 'undefined', 'undefined', NULL, '2023-11-22 04:31:00', '2023-11-22 04:31:00'),
(5, 110, 14, '100', 'To be shared equally', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2023-12-02 22:42:53', '2023-12-02 22:42:53'),
(6, 110, 14, '100', 'To be shared equally', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2023-12-02 22:42:54', '2023-12-02 22:42:54'),
(7, 110, 14, '100', 'To be shared equally', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2023-12-02 22:42:54', '2023-12-02 22:42:54'),
(8, 124, 16, '1', 'whole of it', 'Nailah - 0750718162 - MA - Child', '2023-12-22 14:14:30', '2023-12-22 14:14:30'),
(9, 124, 16, '1', 'whole of it', 'Jordan - 0718162 - MA - Child', '2023-12-22 14:14:40', '2023-12-22 14:14:40'),
(10, 110, 14, 'undefined', 'undefined', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2024-01-08 20:49:43', '2024-01-08 20:49:43'),
(11, 110, 14, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:49:58', '2024-01-08 20:49:58'),
(12, 110, 14, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-01-08 20:49:59', '2024-01-08 20:49:59'),
(13, 126, 18, '10', NULL, 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:26:45', '2024-01-22 18:26:45'),
(14, 126, 18, '10', NULL, 'MUKASA MELANIE - 0703928363 - KIREKA - Child', '2024-01-22 18:26:57', '2024-01-22 18:26:57'),
(15, 127, 19, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:48:18', '2024-01-22 20:48:18'),
(16, 127, 19, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:48:18', '2024-01-22 20:48:18'),
(17, 127, 19, '10', NULL, 'JOY MUKISA - 0701234567 - KIREKA - Child', '2024-01-22 20:48:18', '2024-01-22 20:48:18'),
(18, 127, 19, '10', NULL, 'JENNY KISA - 0703754233 - KIREKA - Child', '2024-01-22 20:48:29', '2024-01-22 20:48:29'),
(19, 135, 20, '2', 'share', 'first - 598900 - sa - Child', '2024-02-21 13:51:40', '2024-02-21 13:51:40'),
(20, 135, 20, '2', 'share', 'second - 3456456 - ada - Heir', '2024-02-21 13:51:49', '2024-02-21 13:51:49'),
(21, 135, 21, '47', 'ASFGTHYUJSDFGH', 'BK - 0758662148 - earth - OtherRelative', '2024-03-01 16:52:54', '2024-03-01 16:52:54'),
(22, 135, 21, '47', 'ASFGTHYUJSDFGH', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 16:53:08', '2024-03-01 16:53:08'),
(23, 135, 21, '47', 'ASFGTHYUJSDFGH', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 16:53:20', '2024-03-01 16:53:20'),
(24, 135, 22, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:04:14', '2024-03-01 17:04:14'),
(25, 135, 22, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:04:20', '2024-03-01 17:04:20'),
(26, 135, 22, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:04:26', '2024-03-01 17:04:26'),
(27, 135, 22, 'W', 'WER', 'kasdlf - 2345 - sdfg - Heir', '2024-03-01 17:04:33', '2024-03-01 17:04:33'),
(28, 135, 22, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:04:40', '2024-03-01 17:04:40'),
(29, 135, 23, 'W', 'WER', 'ada - 8904193 - fg - Dependant', '2024-03-01 17:04:48', '2024-03-01 17:04:48'),
(30, 135, 23, 'W', 'WER', 'second - 3456456 - ada - Heir', '2024-03-01 17:04:54', '2024-03-01 17:04:54'),
(31, 135, 23, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:05:00', '2024-03-01 17:05:00'),
(32, 135, 24, 'W', 'WER', 'kasdlf - 2345 - sdfg - Heir', '2024-03-01 17:05:08', '2024-03-01 17:05:08'),
(33, 135, 25, 'W', 'WER', 'BK - 0758662148 - earth - OtherRelative', '2024-03-01 17:05:14', '2024-03-01 17:05:14'),
(34, 51, 26, NULL, 'all the goats', 'first dependant - 8765432123 - wakiso - Dependant', '2024-06-19 11:45:49', '2024-06-19 11:45:49'),
(35, 51, 27, NULL, 'all the cows', 'testing - 123456 - asdfa - OtherRelative', '2024-06-19 11:46:07', '2024-06-19 11:46:07'),
(36, 110, 28, 'undefined', '50', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:26:58', '2024-07-10 02:26:58'),
(37, 110, 28, '50', '50', 'NANYONJO ESTHER GIANNA - 07039282363 - NAMUGONGO-MBALWA - Child', '2024-07-10 02:27:16', '2024-07-10 02:27:16'),
(38, 110, 28, '50', '50', 'SSENYONJO ISAIAH YOHANAN - 0703928363 - NAMUGONGO - Child', '2024-07-10 02:27:28', '2024-07-10 02:27:28'),
(39, 110, 28, '50', '50', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2024-07-10 02:27:37', '2024-07-10 02:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(11, '2024_10_30_060912_create_options_criterias_table', 3),
(12, '2024_10_31_062629_create_images_documents_table', 3),
(13, '2024_11_01_073631_images_documents', 4),
(14, '2024_11_05_062520_add_file_to_lands_table', 5),
(15, '2024_11_06_054048_create_packages_table', 6),
(16, '2024_11_01_073631_image_documents', 7),
(17, '2024_11_10_123238_create_permission_tables', 8),
(18, '2024_11_12_052148_roles_table', 9),
(19, '2024_11_12_103247_create_roles_and_permissions', 10),
(20, '2024_11_14_074226_add_otp_columns_to_users_table', 11),
(21, '2024_11_14_133653_create_jobs_table', 12),
(22, '2024_11_18_064158_payment_modules', 13),
(23, '2024_11_21_072620_add_password_reset_otp_to_users', 14),
(24, '2024_11_26_110202_add_last_reminder_sent_at_to_users_table', 15),
(25, '2024_11_26_135342_add_last_reminder_sent_at_to_users_table', 16),
(26, '2024_12_02_210748_create_audits_table', 17),
(27, '2024_12_02_222908_create_audits_table', 18),
(28, '2024_12_05_102304_feedbacks_table', 19),
(29, '2024_12_05_111223_create_feedbacks_table', 20),
(30, '2024_12_11_011832_create_audits_table', 21),
(31, '2024_12_11_064137_create_audits_table', 22),
(32, '2024_12_11_071021_create_audits_table', 23),
(33, '2024_12_11_072912_create_audits_table', 24),
(34, '2024_12_11_103532_create_audits_table', 25),
(35, '2025_01_08_081741_add_file_columns_to_relatives_creditors_debtors_tables', 26);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(14, 'App\\Models\\User', 112),
(14, 'App\\Models\\User', 160),
(14, 'App\\Models\\User', 228);

-- --------------------------------------------------------

--
-- Table structure for table `options_criterias`
--

CREATE TABLE `options_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options_criterias`
--

INSERT INTO `options_criterias` (`id`, `category`, `value`, `created_at`, `updated_at`) VALUES
(32, 'Gender', 'male', '2024-11-05 07:02:01', '2024-11-05 07:02:01'),
(33, 'marital_status', 'divorced', '2024-11-05 07:02:21', '2024-11-05 07:02:21'),
(34, 'life_status', 'bed ridden', '2024-11-05 07:02:32', '2024-11-05 07:02:32'),
(35, 'marriage_type', 'church', '2024-11-05 07:02:49', '2024-11-05 07:02:49'),
(36, 'interest_type', 'broker', '2024-11-05 07:03:01', '2024-11-05 07:03:01'),
(37, 'house_type', 'commercial', '2024-11-05 07:03:20', '2024-11-05 07:03:20'),
(38, 'vehicle_type', 'commercial', '2024-11-05 07:03:34', '2024-11-05 07:03:34'),
(39, 'house_category', 'flat', '2024-11-05 07:03:45', '2024-11-05 07:03:45'),
(43, 'Gender', 'female', '2024-11-15 09:20:32', '2024-11-15 09:20:32'),
(50, 'Gender', 'trans', '2025-01-27 09:04:22', '2025-01-27 09:04:22'),
(51, 'interest_type', 'mortgage', '2025-02-10 09:43:48', '2025-02-10 09:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `other_properties`
--

CREATE TABLE `other_properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `number` varchar(11) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_properties`
--

INSERT INTO `other_properties` (`id`, `user_id`, `name`, `description`, `number`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(2, 106, 'cups', 'green in color', '42', 'Nailah Franey - - MA - Child', NULL, '2023-11-14 09:19:36', '2023-11-15 04:56:24'),
(3, 106, 'Gomesi', 'all red', '4', 'Sophia Namazzi - - MA - Heir', NULL, '2023-11-14 09:25:14', '2023-11-14 11:24:32'),
(14, 106, 'phone', 'Black in color', '1', NULL, NULL, '2023-11-15 07:22:34', '2023-11-15 07:22:34'),
(15, 106, 'Apple watch', 'all apple watch', '13', NULL, NULL, '2023-11-15 10:30:10', '2023-11-15 10:30:10'),
(16, 106, 'macbook', 'laptop', '2', NULL, NULL, '2023-11-16 06:14:28', '2023-11-16 06:14:28'),
(31, 106, 'sd', 'ssd', '4', NULL, NULL, '2023-11-22 04:27:07', '2023-11-22 04:27:07'),
(32, 110, 'CHAIRS', 'PROPERTY IN THE HOUSE', '7', NULL, NULL, '2023-12-02 22:32:02', '2023-12-02 22:32:02'),
(33, 122, 'SHOES', 'YELLOW, BLUE, GREEN', '50 PAIRS', NULL, NULL, '2023-12-20 13:58:24', '2023-12-20 13:58:24'),
(35, 124, 'Iphone', 'black in color', '1', NULL, 'OtherProperty_1736762170.jpg', '2023-12-22 14:13:29', '2025-01-13 06:56:10'),
(36, 126, 'CLOTHES AND SHOES', 'ALL MY CLOTHES', '100', NULL, NULL, '2024-01-22 18:13:28', '2024-01-22 18:13:28'),
(37, 135, 'cups', 'only green ones', '54', NULL, NULL, '2024-02-21 13:42:47', '2024-02-21 13:42:47'),
(38, 135, 'gomesi', 'all green', '45', NULL, NULL, '2024-03-01 16:32:19', '2024-03-01 16:32:19'),
(39, 135, 'WEQ', 'ADS', '43', NULL, NULL, '2024-03-01 17:02:33', '2024-03-01 17:02:33'),
(40, 51, 'cups', 'pink', '34', NULL, NULL, '2024-06-19 11:41:19', '2024-06-19 11:41:19'),
(41, 110, 'FUNITURE', 'OFFICE FURNITURE', '1000', NULL, NULL, '2024-07-10 02:23:22', '2024-07-10 02:23:22'),
(42, 221, 'gjh', 'uyfdstrjbhvcxfdhgxf', '89765', NULL, NULL, '2025-02-12 12:48:56', '2025-02-12 12:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `other_relatives`
--

CREATE TABLE `other_relatives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `otherrelative_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('habibkyeyune31@gmail.com', '$2y$10$vEyActVs48vUXQPkceq1YuUe.QZuFpFNtFGtnbcFxxxcLJggcigb6', '2025-01-28 09:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount_paid`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 51, 500, '1187520592', '2023-12-21 17:51:38', '2023-12-21 17:51:38'),
(3, 124, 500, '1188620078', '2023-12-22 14:33:20', '2023-12-22 14:33:20'),
(4, 124, 500, '1188633754', '2023-12-22 14:47:21', '2023-12-22 14:47:21'),
(5, 124, 500, '1188651025', '2023-12-22 15:02:37', '2023-12-22 15:02:37'),
(6, 124, 500, '1188660728', '2023-12-22 15:09:44', '2023-12-22 15:09:44'),
(7, 125, 500, '1227538582', '2024-01-22 17:37:14', '2024-01-22 17:37:14'),
(8, 128, 500, '1246474363', '2024-02-05 11:44:21', '2024-02-05 11:44:21'),
(9, 131, 500, '1246570648', '2024-02-05 13:49:44', '2024-02-05 13:49:44'),
(10, 132, 500, '1248410427', '2024-02-06 17:49:50', '2024-02-06 17:49:50'),
(11, 129, 500, '1248927641', '2024-02-07 00:55:19', '2024-02-07 00:55:19'),
(12, 133, 500, '1248941568', '2024-02-07 01:08:40', '2024-02-07 01:08:40'),
(13, 134, 500, '1248956234', '2024-02-07 01:27:00', '2024-02-07 01:27:00'),
(14, 135, 500, '1249328333', '2024-02-07 10:58:40', '2024-02-07 10:58:40'),
(15, 135, 500, '1249355999', '2024-02-07 11:23:52', '2024-02-07 11:23:52'),
(16, 135, 500, '1249453566', '2024-02-07 12:42:28', '2024-02-07 12:42:28'),
(17, 135, 500, '1249481602', '2024-02-07 13:04:09', '2024-02-07 13:04:09'),
(18, 135, 500, '1249526039', '2024-02-07 13:38:29', '2024-02-07 13:38:29'),
(19, 135, 500, '1249588164', '2024-02-07 14:24:19', '2024-02-07 14:24:19'),
(20, 135, 500, '1249636773', '2024-02-07 15:06:05', '2024-02-07 15:06:05'),
(21, 135, 500, '1249723738', '2024-02-07 16:33:43', '2024-02-07 16:33:43'),
(22, 135, 500, '1249811380', '2024-02-07 17:59:52', '2024-02-07 17:59:52'),
(23, 135, 500, '1249845413', '2024-02-07 18:30:54', '2024-02-07 18:30:54'),
(24, 135, 500, '1249869185', '2024-02-07 18:51:54', '2024-02-07 18:51:54'),
(25, 135, 500, '1249892115', '2024-02-07 19:12:43', '2024-02-07 19:12:43'),
(26, 135, 500, '1250850195', '2024-02-08 12:52:03', '2024-02-08 12:52:03'),
(27, 135, 500, '1250870107', '2024-02-08 13:07:55', '2024-02-08 13:07:55'),
(28, 135, 500, '1252135688', '2024-02-09 12:32:04', '2024-02-09 12:32:04'),
(29, 135, 500, '1252209825', '2024-02-09 13:28:41', '2024-02-09 13:28:41'),
(30, 135, 500, '1252279449', '2024-02-09 14:51:17', '2024-02-09 14:51:17'),
(31, 135, 500, '1252363150', '2024-02-09 16:14:58', '2024-02-09 16:14:58'),
(32, 135, 500, '1252436824', '2024-02-09 17:22:08', '2024-02-09 17:22:08'),
(33, 135, 500, '1252455124', '2024-02-09 17:39:49', '2024-02-09 17:39:49'),
(34, 135, 500, '1252468515', '2024-02-09 17:52:32', '2024-02-09 17:52:32'),
(35, 138, 100000, '1457557688', '2024-07-08 15:00:34', '2024-07-08 15:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modules`
--

CREATE TABLE `payment_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(11, 'view roles', 'web', '2024-11-28 05:56:44', '2024-11-28 05:56:44'),
(14, 'view permissions', 'web', '2024-11-28 05:58:00', '2024-11-28 05:58:00'),
(15, 'add permissions', 'web', '2024-11-28 05:58:14', '2024-11-28 05:58:14'),
(18, 'view dashboard', 'web', '2024-11-28 07:16:24', '2024-11-28 07:16:24'),
(22, 'add role model', 'web', '2024-11-28 08:11:23', '2024-11-28 08:11:23'),
(25, 'view wills', 'web', '2024-11-28 09:46:42', '2024-11-28 09:46:42'),
(26, 'view options', 'web', '2024-11-28 10:40:10', '2024-11-28 10:40:10'),
(27, 'view faqs', 'web', '2024-11-28 10:49:32', '2024-11-28 10:49:32'),
(28, 'view knowledgebase', 'web', '2024-11-28 10:49:57', '2024-11-28 10:49:57'),
(29, 'view audit trail', 'web', '2024-11-28 10:50:20', '2024-11-28 10:50:20'),
(30, 'view packages', 'web', '2024-11-30 12:04:37', '2024-11-30 12:04:37'),
(31, 'view files', 'web', '2024-11-30 12:06:03', '2024-11-30 12:06:03'),
(32, 'manage role model', 'web', '2024-11-30 12:09:49', '2024-11-30 12:09:49'),
(33, 'manage permissions', 'web', '2024-11-30 12:10:48', '2024-11-30 12:10:48'),
(35, 'manage role', 'web', '2024-11-30 12:11:42', '2024-11-30 12:11:42'),
(36, 'manage files', 'web', '2024-11-30 12:11:54', '2024-11-30 12:11:54'),
(37, 'manage packages', 'web', '2024-11-30 12:12:04', '2024-11-30 12:12:04'),
(38, 'manage knowledgebase', 'web', '2024-11-30 12:12:19', '2024-11-30 12:12:19'),
(39, 'manage faqs', 'web', '2024-11-30 12:12:38', '2024-11-30 12:12:38'),
(40, 'manage options', 'web', '2024-11-30 12:12:46', '2024-11-30 12:12:46'),
(41, 'export wills', 'web', '2024-11-30 12:13:17', '2024-11-30 12:13:17'),
(42, 'print wills', 'web', '2024-11-30 12:14:00', '2024-11-30 12:14:00'),
(50, 'assign roles', 'web', '2024-12-01 05:37:17', '2024-12-01 05:37:17'),
(51, 'view users role', 'web', '2024-12-01 05:53:35', '2024-12-01 05:53:35'),
(52, 'add files', 'web', '2024-12-01 11:44:03', '2024-12-01 11:44:03'),
(53, 'add packages', 'web', '2024-12-02 10:25:15', '2024-12-02 10:25:15'),
(55, 'add options', 'web', '2024-12-04 05:34:56', '2024-12-04 05:34:56'),
(56, 'view feedback', 'web', '2024-12-05 08:03:25', '2024-12-05 08:03:25'),
(57, 'manage feedback', 'web', '2024-12-05 08:04:10', '2024-12-05 08:04:10'),
(59, 'add faqs', 'web', '2025-01-16 03:37:28', '2025-01-16 03:37:28'),
(62, 'add knowledgebase', 'web', '2025-01-16 05:23:49', '2025-01-16 05:23:49'),
(63, 'add adverts', 'web', '2025-01-23 03:37:35', '2025-01-23 03:37:35'),
(64, 'view adverts', 'web', '2025-01-23 03:37:56', '2025-01-23 03:37:56'),
(65, 'manage adverts', 'web', '2025-01-23 03:38:04', '2025-01-23 03:38:04'),
(66, 'view business details', 'web', '2025-01-30 11:53:09', '2025-01-30 11:53:09'),
(67, 'manage business details', 'web', '2025-01-30 11:53:27', '2025-01-30 11:53:27'),
(68, 'manage system administrators details', 'web', '2025-01-30 12:01:01', '2025-01-30 12:01:01'),
(69, 'view system administrators details', 'web', '2025-01-30 12:01:10', '2025-01-30 12:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 54, 'my-app-token', '59c834a0c94d5ee51b5752e9f9a9c3d9654c8b0edee87222c3dcce6b589e8146', '[\"*\"]', '2023-10-24 05:47:00', NULL, '2023-10-24 02:54:00', '2023-10-24 05:47:00'),
(7, 'App\\Models\\User', 70, 'my-app-token', '1d6c10a49e7655e2f259f377253e3ef43e1f91e981f5281d10215d4a276cfdb8', '[\"*\"]', '2023-10-24 06:03:19', NULL, '2023-10-24 05:57:13', '2023-10-24 06:03:19'),
(8, 'App\\Models\\User', 73, 'my-app-token', 'c400c98f0b096490d02aa4f272420849f0541a516ff3cc98388639029a5f6762', '[\"*\"]', '2023-10-24 06:10:15', NULL, '2023-10-24 06:06:42', '2023-10-24 06:10:15'),
(9, 'App\\Models\\User', 75, 'my-app-token', '5349931845a0acbc694e2407d648e66aa976137479ef502a45d11144dd3a56a9', '[\"*\"]', NULL, NULL, '2023-10-24 06:11:14', '2023-10-24 06:11:14'),
(10, 'App\\Models\\User', 76, 'my-app-token', 'ec0c133ed9a723ea23e459701da0af5ce1679cead22a338049403563b3e5a863', '[\"*\"]', '2023-10-24 06:24:01', NULL, '2023-10-24 06:21:07', '2023-10-24 06:24:01'),
(11, 'App\\Models\\User', 79, 'my-app-token', 'eb500d14a8ba8947b7a403570ec07ead2685fb7204c9a72edb0c3ec022c3f9f9', '[\"*\"]', '2023-10-24 06:42:19', NULL, '2023-10-24 06:28:24', '2023-10-24 06:42:19'),
(12, 'App\\Models\\User', 83, 'my-app-token', 'ac4df05c915a9854e4e204f1bb046b78a91b6e0bbba8fee9bdc58224c61e1307', '[\"*\"]', '2023-10-24 07:09:09', NULL, '2023-10-24 07:07:27', '2023-10-24 07:09:09'),
(13, 'App\\Models\\User', 84, 'my-app-token', 'a1e19c5fbbb2b7c6ea2b615f67191664ac7131855730c2ff5b35440fc855494f', '[\"*\"]', '2023-10-24 07:11:24', NULL, '2023-10-24 07:10:53', '2023-10-24 07:11:24'),
(14, 'App\\Models\\User', 85, 'my-app-token', '07839c08f85dbbce38ab8bc2f94f76620e668783575da919a816bbce19435af7', '[\"*\"]', '2023-10-24 07:20:55', NULL, '2023-10-24 07:20:07', '2023-10-24 07:20:55'),
(15, 'App\\Models\\User', 87, 'my-app-token', 'a5d3e3be7c836ec0abd6bb189818bd9473fc9a65fa26ac22fe50f5035859595e', '[\"*\"]', '2023-10-24 07:32:35', NULL, '2023-10-24 07:29:20', '2023-10-24 07:32:35'),
(16, 'App\\Models\\User', 88, 'my-app-token', '95425740bac281a062f1d03c7cee7308ee0f46e2009167a7f182a3e82e6d6adf', '[\"*\"]', '2023-10-24 08:01:06', NULL, '2023-10-24 07:37:42', '2023-10-24 08:01:06'),
(17, 'App\\Models\\User', 93, 'my-app-token', '265ed486e27a7463dfd53ed35f2caa0a075579dc629ad1805265d67ddcce1489', '[\"*\"]', '2023-10-24 09:50:20', NULL, '2023-10-24 08:02:12', '2023-10-24 09:50:20'),
(42, 'App\\Models\\User', 103, 'my-app-token', '25952a9e8cdb64cd5a64c833dad284bc56dd91376012358b3dd1b91949c993b7', '[\"*\"]', '2023-11-03 07:29:24', NULL, '2023-11-03 07:05:55', '2023-11-03 07:29:24'),
(62, 'App\\Models\\User', 104, 'my-app-token', 'a89ba0e0c3e0855f837e667d64a80c3d7fbb8c8593db6d069eb009e8accc579f', '[\"*\"]', '2023-11-10 05:49:56', NULL, '2023-11-10 05:49:12', '2023-11-10 05:49:56'),
(72, 'App\\Models\\User', 105, 'my-app-token', 'd9b814ba5dc703d3bef71f96f6a8159122cc521aa513619715095879ebbd071c', '[\"*\"]', '2023-11-14 04:57:44', NULL, '2023-11-14 04:57:42', '2023-11-14 04:57:44'),
(92, 'App\\Models\\User', 108, 'my-app-token', '2f92905b9840f212ec041f2116c41d7ed37331e0a52866c880fb51f0da0e138b', '[\"*\"]', '2023-11-16 10:05:56', NULL, '2023-11-16 10:05:53', '2023-11-16 10:05:56'),
(151, 'App\\Models\\User', 112, 'my-app-token', 'd332825b5ef27886bbceb0c6ebb45b8f6034d9401e1a53736080faa1094c726e', '[\"*\"]', '2023-12-04 23:21:23', NULL, '2023-12-04 23:21:21', '2023-12-04 23:21:23'),
(177, 'App\\Models\\User', 106, 'my-app-token', 'ac715b6482a6d37a8fe82bff7e16fb38576fb78488e9f5460643428606e0fbb8', '[\"*\"]', '2023-12-14 15:34:20', NULL, '2023-12-14 11:47:33', '2023-12-14 15:34:20'),
(184, 'App\\Models\\User', 102, 'my-app-token', 'a4020021ec1675c0cbc425d8ec3f928ca3d636b3a5383a405da5f823b470892c', '[\"*\"]', '2023-12-20 13:11:28', NULL, '2023-12-20 13:11:27', '2023-12-20 13:11:28'),
(185, 'App\\Models\\User', 96, 'my-app-token', '2058d9e30595645ca72dbf039c1ea2aa3434d52c0dd606a5a67cdbabd7e6319f', '[\"*\"]', '2023-12-20 13:16:32', NULL, '2023-12-20 13:16:29', '2023-12-20 13:16:32'),
(186, 'App\\Models\\User', 122, 'my-app-token', '8d0f2d30a4d6dffddce5428d5ffd5b365b7ef198fed54a7de4e24f0fe4bc4328', '[\"*\"]', '2023-12-20 14:07:56', NULL, '2023-12-20 13:35:03', '2023-12-20 14:07:56'),
(220, 'App\\Models\\User', 125, 'my-app-token', '417837c7b85f28068e055235bc98a4a09fe42c68d14cc6717987cd9c8e3bd9a0', '[\"*\"]', '2024-01-22 18:13:05', NULL, '2024-01-22 18:06:14', '2024-01-22 18:13:05'),
(227, 'App\\Models\\User', 127, 'my-app-token', '712cd186ec4e0cc9413c38355bc74ff3c9377d226ef0ea80fa2924726090a1a9', '[\"*\"]', '2024-01-22 20:57:31', NULL, '2024-01-22 20:56:51', '2024-01-22 20:57:31'),
(228, 'App\\Models\\User', 126, 'my-app-token', '358413fc024ae8321d0f7c40f68e8d3da240c7904fb621e56790b80838c82083', '[\"*\"]', '2024-01-30 15:26:13', NULL, '2024-01-30 15:25:07', '2024-01-30 15:26:13'),
(250, 'App\\Models\\User', 124, 'my-app-token', '7a6ada5018f62ce7f9ea84f5c719683ec4631c365764fd8e21cd5f7d651f4001', '[\"*\"]', '2024-02-05 18:01:39', NULL, '2024-02-05 18:01:38', '2024-02-05 18:01:39'),
(276, 'App\\Models\\User', 132, 'my-app-token', 'a08a5e0b518acc7a60f57bdd82a7f4fbb2befaccbbea8cf2cd49631450a7fece', '[\"*\"]', '2024-02-06 18:06:34', NULL, '2024-02-06 18:06:15', '2024-02-06 18:06:34'),
(284, 'App\\Models\\User', 133, 'my-app-token', 'e3959af70cd628a921c9e64170ba5b1c0c1c32afa26df0025568d4a039c7bf5e', '[\"*\"]', '2024-02-07 01:13:25', NULL, '2024-02-07 01:12:01', '2024-02-07 01:13:25'),
(287, 'App\\Models\\User', 134, 'my-app-token', '233dbe7fbba5dfc55656fe3073a676ef8878f5f78e6f3089c921bf52302e5b31', '[\"*\"]', '2024-02-07 01:31:14', NULL, '2024-02-07 01:29:04', '2024-02-07 01:31:14'),
(360, 'App\\Models\\User', 128, 'my-app-token', 'e5285f24ebfd19e7df16e9b849b41863ac546e79003aebf1dc8dee17d2b3b484', '[\"*\"]', '2024-06-18 14:05:58', NULL, '2024-06-18 14:05:32', '2024-06-18 14:05:58'),
(361, 'App\\Models\\User', 131, 'my-app-token', '0a675c484a469f3554412aa2af5d0bb49d0295f0abcfcc1c5251270fe583263f', '[\"*\"]', '2024-06-18 14:06:43', NULL, '2024-06-18 14:06:25', '2024-06-18 14:06:43'),
(365, 'App\\Models\\User', 129, 'my-app-token', '4aae304107487b4c83c1e5e721e30b40bf407b53e77298b9b197dab98618eaeb', '[\"*\"]', '2024-06-18 18:17:04', NULL, '2024-06-18 18:16:47', '2024-06-18 18:17:04'),
(397, 'App\\Models\\User', 135, 'my-app-token', '5ea62a317fda81ed212596a645e1bf9e33b8a65bc6c55a5b35fbd81e7af0e354', '[\"*\"]', '2024-06-19 18:20:06', NULL, '2024-06-19 18:11:31', '2024-06-19 18:20:06'),
(401, 'App\\Models\\User', 139, 'my-app-token', '15d6e4a18034660cde422b23e5261e79055ecd57833e5b7b64a0d75a293cc877', '[\"*\"]', '2024-08-04 08:54:42', NULL, '2024-07-21 20:26:38', '2024-08-04 08:54:42'),
(402, 'App\\Models\\User', 140, 'my-app-token', 'b8618a8afa48f6a1cf5e1a61135e7f9a86caf947bb6c51fc8568156efc2ccec8', '[\"*\"]', '2024-07-21 21:02:34', NULL, '2024-07-21 20:47:21', '2024-07-21 21:02:34'),
(403, 'App\\Models\\User', 141, 'my-app-token', '83a613144f52a403412caf99a9f1ffbe148632590ef1bf6ce648bc7b5a90a437', '[\"*\"]', '2024-07-22 18:07:50', NULL, '2024-07-22 17:45:15', '2024-07-22 18:07:50'),
(407, 'App\\Models\\User', 138, 'my-app-token', '6fc6d461c8dc12466de76f0dfa288b012a809c459bbe6adb75b9c449e7a63795', '[\"*\"]', '2024-07-23 20:21:09', NULL, '2024-07-23 13:31:02', '2024-07-23 20:21:09'),
(408, 'App\\Models\\User', 110, 'my-app-token', 'b3536c58baf707395121a526b4907694547208e7af5c9cefb619f0362f306f8e', '[\"*\"]', '2024-07-23 13:55:16', NULL, '2024-07-23 13:34:46', '2024-07-23 13:55:16'),
(409, 'App\\Models\\User', 145, 'my-app-token', '14d0b5892a67dc2b9211a48d7ef47cbc6c5f849598e1bfb3b8e92247c5c28c65', '[\"*\"]', '2024-07-23 13:45:03', NULL, '2024-07-23 13:45:01', '2024-07-23 13:45:03'),
(418, 'App\\Models\\User', 51, 'my-app-token', '6e9f463c9b4510678a962606ead0f4aadd262318e8fd8ee6a539529e88624c4b', '[\"*\"]', '2024-07-24 13:02:21', NULL, '2024-07-24 13:02:20', '2024-07-24 13:02:21'),
(419, 'App\\Models\\User', 146, 'my-app-token', '5ffbd6241037cd72db3c87e0d1a6fa79f81ff0e7357c149e8d7589ee693b5a56', '[\"*\"]', '2024-07-31 03:14:57', NULL, '2024-07-31 02:54:11', '2024-07-31 03:14:57'),
(420, 'App\\Models\\User', 147, 'my-app-token', '44833bfcc6e6369ce09acb082739c3a897ee2cd0968e5ef296315ccc16508266', '[\"*\"]', '2024-08-20 10:31:36', NULL, '2024-08-20 10:30:02', '2024-08-20 10:31:36'),
(421, 'App\\Models\\User', 148, 'my-app-token', '0f1fdf5cb029214b6ceb93f79f945179b22577b2f6cce619c24e99f25d819b1b', '[\"*\"]', '2024-09-30 16:47:22', NULL, '2024-09-30 16:40:16', '2024-09-30 16:47:22'),
(422, 'App\\Models\\User', 149, 'my-app-token', '3ad1301cf01f0d1f2d62ff6b665ea57843b5e65b8fd6af11258f48bf61265584', '[\"*\"]', '2024-10-26 16:28:56', NULL, '2024-10-10 06:19:51', '2024-10-26 16:28:56'),
(424, 'App\\Models\\User', 150, 'my-app-token', '7e062d9e2a8ed8b2d9316d6bb4a11fcf1379f1b86a5a81bef90bb3d28247d590', '[\"*\"]', '2024-10-22 21:32:56', NULL, '2024-10-22 21:32:08', '2024-10-22 21:32:56'),
(426, 'App\\Models\\User', 151, 'my-app-token', '5c5d0fcb2c9db28ee06eab6dd4c7e8703dd4d581fdf6ab99a6e94385704c5cb0', '[\"*\"]', '2024-10-24 14:25:44', NULL, '2024-10-24 13:44:57', '2024-10-24 14:25:44'),
(427, 'App\\Models\\User', 152, 'my-app-token', 'a3963fc380b8bb38386d41dedf2f2f63d7e9bea24d68e31ffe663448398309af', '[\"*\"]', '2024-10-25 10:32:28', NULL, '2024-10-25 10:32:27', '2024-10-25 10:32:28'),
(428, 'App\\Models\\User', 153, 'my-app-token', 'ae8530b575b53ab130673c5721d5e0b24e9099121a444466f1c8d1cd86f3811e', '[\"*\"]', '2024-10-25 12:18:03', NULL, '2024-10-25 10:59:15', '2024-10-25 12:18:03'),
(431, 'App\\Models\\User', 155, 'my-app-token', 'eecfb4bba82f4e79c488bb461963243e63044068ed19de12c196cb5fb3ed75fc', '[\"*\"]', '2024-10-31 07:43:28', NULL, '2024-10-31 07:43:08', '2024-10-31 07:43:28'),
(432, 'App\\Models\\User', 157, 'my-app-token', '0de2439f4eb026f2e781566d794b6990af05aeceab7a773ca0602e854f788b1a', '[\"*\"]', '2024-11-04 11:03:11', NULL, '2024-10-31 08:14:23', '2024-11-04 11:03:11'),
(437, 'App\\Models\\User', 154, 'my-app-token', '3e3fa027cef8b639b0d5838ab741cedeaf20b56dad74706de183b82520fc20f5', '[\"*\"]', '2024-11-05 04:44:12', NULL, '2024-11-05 04:43:55', '2024-11-05 04:44:12'),
(438, 'App\\Models\\User', 159, 'my-app-token', '216393fe8b0de84ec2eff531e435deb0f715c9e53980876832926ad965032984', '[\"*\"]', '2024-11-05 05:37:28', NULL, '2024-11-05 05:09:26', '2024-11-05 05:37:28'),
(440, 'App\\Models\\User', 161, 'my-app-token', '53031d127fa6629b53801c564ae6071ef38f467381826f89ea65ab09010ce604', '[\"*\"]', '2024-11-18 05:55:27', NULL, '2024-11-10 06:59:40', '2024-11-18 05:55:27'),
(442, 'App\\Models\\User', 160, 'my-app-token', 'b0c1666e2fcc6b887b131f28a146470078e5ea2bf62a1ab6c23c45b3ea239ac8', '[\"*\"]', '2024-11-18 07:00:32', NULL, '2024-11-18 06:59:47', '2024-11-18 07:00:32'),
(454, 'App\\Models\\User', 217, 'my-app-token', '41233936c1279de6b2dc09fdc2a35f0650f7c6b9b632e200c0cf9773847dba8c', '[\"*\"]', NULL, NULL, '2024-12-16 06:13:02', '2024-12-16 06:13:02'),
(459, 'App\\Models\\User', 218, 'my-app-token', '84dc04f20ee18214b25d5d084fa1286ab61c2c3460448e2cd28a5912535e49ba', '[\"*\"]', '2025-01-27 07:36:27', NULL, '2025-01-08 11:08:28', '2025-01-27 07:36:27'),
(460, 'App\\Models\\User', 219, 'my-app-token', '1ad97474fb9047b3f48e3920abb576d83aaf60c983809b7c9b3b714b14a37910', '[\"*\"]', '2025-01-27 09:04:43', NULL, '2025-01-27 09:03:04', '2025-01-27 09:04:43'),
(509, 'App\\Models\\User', 234, 'my-app-token', '153eba57b84d585890471ded48bc41076d45dd8bafa9b416156f56dc32c0053b', '[\"*\"]', '2025-02-10 09:48:27', NULL, '2025-02-10 09:32:42', '2025-02-10 09:48:27'),
(541, 'App\\Models\\User', 221, 'my-app-token', '098f956dda7810c10720ce10c615c6a74796df3ed2536bc7fb248d4d4313c19c', '[\"*\"]', NULL, NULL, '2025-02-18 20:07:09', '2025-02-18 20:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `property_dispositions`
--

CREATE TABLE `property_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `disposed_to` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_disposition_details`
--

CREATE TABLE `property_disposition_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_disposition_details`
--

INSERT INTO `property_disposition_details` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(33, 106, 2, '10', 'broken cups', 'Hmm - - Earth - Spouse', '2023-11-16 07:31:02', '2023-11-16 07:31:02'),
(34, 106, 2, '5', 'green cups', 'Jordan Franey - - MA - Child', '2023-11-16 07:32:35', '2023-11-16 07:32:35'),
(35, 106, 2, '5', 'blue cups', 'Nailah Franey - - MA - Child', '2023-11-16 07:33:05', '2023-11-16 07:33:05'),
(36, 106, 3, '5', 'all gomesi', 'Jajja - - Entebbe - Dependant', '2023-11-20 04:58:24', '2023-11-20 04:58:24'),
(37, 106, 31, 'undefined', 'undefined', NULL, '2023-11-22 04:33:14', '2023-11-22 04:33:14'),
(38, 122, 33, '25', NULL, 'MARY GRACIA - 0703928363 - NAMUGONGP - Child', '2023-12-20 14:04:33', '2023-12-20 14:04:33'),
(39, 122, 33, '25', NULL, 'MERCY - 0703928363 - NAMUGONGO - Heir', '2023-12-20 14:04:42', '2023-12-20 14:04:42'),
(40, 110, 32, 'undefined', 'undefined', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-20 14:30:54', '2023-12-20 14:30:54'),
(41, 110, 32, 'undefined', 'undefined', 'NANYANGE MARY GRACIA - 0703928363 - NAMUGONGO-MBALWA - Child', '2023-12-20 14:31:06', '2023-12-20 14:31:06'),
(42, 124, 35, '1', 'whole of it', 'Sophia - 0750718162 - IO - Heir', '2023-12-22 14:15:34', '2023-12-22 14:15:34'),
(43, 135, 37, '50%', 'its yours alone', 'ada - 8904193 - fg - Dependant', '2024-02-21 14:08:57', '2024-02-21 14:08:57'),
(44, 135, 37, '50%', 'undefined', 'second - 3456456 - ada - Heir', '2024-02-21 14:13:39', '2024-02-21 14:13:39'),
(45, 135, 38, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:07:29', '2024-03-01 17:07:29'),
(46, 135, 38, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:07:36', '2024-03-01 17:07:36'),
(47, 135, 38, 'W', 'WER', 'wqerty - 1234567 - awedrfg - OtherRelative', '2024-03-01 17:07:43', '2024-03-01 17:07:43'),
(48, 135, 39, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:07:50', '2024-03-01 17:07:50'),
(49, 51, 40, 'share', 'share', 'testing - 123456 - asdfa - OtherRelative', '2024-06-19 11:48:06', '2024-06-19 11:48:06'),
(50, 51, 40, 'share', 'share', 'first dependant - 8765432123 - wakiso - Dependant', '2024-06-19 11:48:16', '2024-06-19 11:48:16'),
(51, 110, 41, '50', '50', 'SSENYONJO ISAIAH YOHANAN - 0703928363 - NAMUGONGO - Child', '2024-07-10 02:28:38', '2024-07-10 02:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `propety_types`
--

CREATE TABLE `propety_types` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `mariage` varchar(100) DEFAULT NULL,
  `life_status` varchar(11) NOT NULL DEFAULT 'Alive',
  `type` varchar(50) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `user_id`, `name`, `address`, `contact`, `date_of_birth`, `gender`, `mariage`, `life_status`, `type`, `file`, `created_at`, `updated_at`) VALUES
(1, 102, 'Kawaalya', '3443', '075565', '1999-02-22', 'Male', NULL, 'Alive', 'Child', NULL, '2023-11-08 05:48:28', '2025-01-13 00:09:13'),
(2, 102, 'fds', '54645', '345345', NULL, NULL, 'Court', 'Alive', 'Spouse', NULL, '2023-11-08 05:51:07', '2025-01-10 04:07:43'),
(4, 102, 'Alice', 'Kawanda', '075900876', NULL, NULL, 'Church', 'Alive', 'Spouse', NULL, '2023-11-08 06:21:47', '2023-11-08 06:21:47'),
(5, 102, 'Wera Sarah', 'Gomba', '078967665', '1990-11-22', 'Female', NULL, 'Alive', 'Child', NULL, '2023-11-09 04:22:10', '2025-01-12 14:35:22'),
(6, 102, 'Kakooza Fahad', 'Gomba', '078676757', '2006-03-05', 'Male', NULL, 'Alive', 'Dependant', NULL, '2023-11-09 04:23:21', '2023-11-09 04:23:21'),
(7, 102, 'Sebata Ivan', 'Kasasi', '0750177406', '1999-12-12', 'Male', NULL, 'Alive', 'Child', NULL, '2023-11-10 08:06:13', '2025-01-12 14:35:32'),
(8, 102, 'Sarah Aziz', 'Kyanja', '0750017176', NULL, NULL, 'Islamic / Mohammedan', 'Alive', 'Spouse', 'Relative_1736747841.jpg', '2023-11-10 08:10:25', '2025-01-13 02:57:21'),
(10, 105, 'Nailah Franey', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Child', NULL, '2023-11-14 03:47:58', '2025-02-06 03:37:41'),
(11, 105, 'Jordan Franey', 'Entebbe', NULL, '2021-08-23', 'Male', NULL, 'Alive', 'Child', NULL, '2023-11-14 03:48:45', '2025-01-12 13:53:08'),
(12, 105, 'Any', 'Entebbe', NULL, NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2023-11-14 03:49:46', '2023-11-14 03:49:46'),
(13, 105, 'Jajja', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Dependant', NULL, '2023-11-14 03:50:55', '2023-11-14 03:50:55'),
(15, 105, 'Sophia', 'undefined', '0750718162', NULL, 'Female', NULL, 'Alive', 'Heir', NULL, '2023-11-14 04:53:42', '2023-11-14 04:53:42'),
(16, 106, 'Nailah Franey', 'MA', NULL, '2016-03-14', 'Female', NULL, 'Alive', 'Child', NULL, '2023-11-14 05:00:51', '2023-11-14 05:00:51'),
(17, 106, 'Jordan Franey', 'MA', NULL, '2019-08-23', 'Male', NULL, 'Alive', 'Child', NULL, '2023-11-14 05:01:26', '2023-11-14 05:01:26'),
(18, 106, 'Hmm', 'Earth', NULL, NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2023-11-14 05:01:50', '2023-11-14 05:01:50'),
(19, 106, 'Jajja', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Dependant', 'Relative_1736747863.jpg', '2023-11-14 05:02:12', '2025-01-13 02:57:43'),
(23, 106, 'Sophia Namazzi', 'MA', NULL, NULL, 'Female', NULL, 'Alive', 'Heir', NULL, '2023-11-14 05:21:20', '2023-11-14 05:21:20'),
(33, 110, 'NANYONJO ESTHER GIANNA', 'NAMUGONGO-MBALWA', '07039282363', '2021-03-12', 'Female', NULL, 'Alive', 'Child', NULL, '2023-12-02 22:05:07', '2023-12-02 22:05:07'),
(34, 110, 'NANYANGE MARY GRACIA', 'NAMUGONGO-MBALWA', '0703928363', '2023-04-19', 'Female', NULL, 'Alive', 'Child', NULL, '2023-12-02 22:06:48', '2023-12-02 22:06:48'),
(35, 110, 'SSENYANGE ISAAC KEITH', 'NAMUGONGO-MBALWA', '0701231030', NULL, NULL, 'Church', 'Alive', 'Spouse', NULL, '2023-12-02 22:09:07', '2023-12-02 22:09:07'),
(36, 110, 'NAMUTEBI PAULINE', 'BUSEGA', '0703928363', '2009-05-23', 'Female', NULL, 'Alive', 'Heir', NULL, '2023-12-02 22:10:56', '2023-12-02 22:10:56'),
(37, 122, 'MARY GRACIA', 'NAMUGONGP', '0703928363', '2023-04-18', 'Female', NULL, 'Alive', 'Child', NULL, '2023-12-20 13:36:44', '2023-12-20 13:36:44'),
(38, 122, 'SSENYANGE', 'NAMUGONGO', '0703928363', '1994-04-18', 'Male', NULL, 'Alive', 'Dependant', NULL, '2023-12-20 13:38:11', '2023-12-20 13:38:11'),
(39, 122, 'MERCY', 'NAMUGONGO', '0703928363', '1995-05-25', 'Female', NULL, 'Alive', 'Heir', NULL, '2023-12-20 13:39:01', '2023-12-20 13:39:01'),
(40, 122, 'MERCY', 'NAMUGONGO', '0703928363', '1995-05-25', 'Female', NULL, 'Alive', 'Heir', NULL, '2023-12-20 13:39:01', '2023-12-20 13:39:01'),
(41, 122, 'DANNIEL', 'NAMUGONGO', '0703928363', '2023-05-05', 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2023-12-20 13:40:23', '2023-12-20 13:40:23'),
(42, 124, 'Nailah', 'MA', '0750718162', '2021-03-18', 'Female', NULL, 'Alive', 'Child', NULL, '2023-12-22 14:03:46', '2023-12-22 14:03:46'),
(43, 124, 'anybody', 'MArs', '0750718162', NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2023-12-22 14:04:18', '2023-12-22 14:04:18'),
(44, 124, 'Jordan', 'MA', '0718162', '2023-08-21', 'Male', NULL, 'Alive', 'Child', NULL, '2023-12-22 14:05:52', '2023-12-22 14:05:52'),
(45, 124, 'Grace', 'Entebbe', '0750718162', '2000-12-04', 'Female', NULL, 'Alive', 'Dependant', NULL, '2023-12-22 14:06:23', '2023-12-22 14:06:23'),
(46, 124, 'Sophia', 'IO', '0750718162', '2023-03-03', 'Female', NULL, 'Alive', 'Heir', NULL, '2023-12-22 14:07:07', '2023-12-22 14:07:07'),
(47, 124, 'Jajja', 'Entebbe', '0772384918', '1990-01-03', 'Female', NULL, 'Alive', 'OtherRelative', 'Relative_1736747898.jpg', '2023-12-22 14:08:21', '2025-01-13 02:58:18'),
(48, 124, 'Willam', 'wakiso', NULL, '2023-02-02', 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2023-12-22 14:18:46', '2023-12-22 14:18:46'),
(51, 125, 'NUWAGABA', 'KAMPALA', '0755273013', '2023-12-23', 'Male', NULL, 'Alive', 'Child', NULL, '2024-01-22 17:09:33', '2024-01-22 17:09:33'),
(52, 125, 'NATUKUNDA', 'NAMUGONGO', '0701664348', '2021-07-06', 'Female', NULL, 'Alive', 'Child', NULL, '2024-01-22 17:11:15', '2024-01-22 17:11:15'),
(53, 126, 'MUKASA PAUL', 'KIREKA', '0703928362', '2020-05-05', 'Male', NULL, 'Alive', 'Child', NULL, '2024-01-22 17:53:40', '2024-01-22 17:53:40'),
(54, 126, 'MUKASA MELANIE', 'KIREKA', '0703928363', '2023-05-05', 'Female', NULL, 'Alive', 'Child', NULL, '2024-01-22 17:54:37', '2024-01-22 17:54:37'),
(56, 126, 'MUKASA MAJORINE', 'KIREKA', '0703928363', NULL, NULL, 'Customary', 'Alive', 'Spouse', NULL, '2024-01-22 17:58:31', '2024-01-22 17:58:31'),
(57, 126, 'MUKASA NORINE', 'NAMUGONGO', '0703928363', NULL, NULL, 'Customary', 'Alive', 'Spouse', NULL, '2024-01-22 17:59:30', '2024-01-22 17:59:30'),
(58, 126, 'Joanita Mercy', 'bunga', NULL, '2000-01-01', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-01-22 18:00:36', '2024-01-22 18:00:36'),
(59, 126, 'MUKASA PAUL', 'KIREKA', NULL, '2020-05-05', 'Male', NULL, 'Alive', 'Heir', NULL, '2024-01-22 18:01:25', '2024-01-22 18:01:25'),
(60, 127, 'JOY MUKISA', 'KIREKA', '0701234567', '2019-05-05', 'Female', NULL, 'Alive', 'Child', NULL, '2024-01-22 20:34:10', '2024-01-22 20:34:10'),
(61, 127, 'JENNY KISA', 'KIREKA', '0703754233', '2021-12-03', 'Female', NULL, 'Alive', 'Child', NULL, '2024-01-22 20:35:22', '2024-01-22 20:35:22'),
(62, 127, 'MUWONGE PAUL', 'KIREKA', '0709965544', NULL, NULL, 'Customary', 'Alive', 'Spouse', NULL, '2024-01-22 20:35:54', '2024-01-22 20:35:54'),
(63, 127, 'NAKATE AGGY', 'ENTEBBE', '0753677786', '1990-06-07', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-01-22 20:36:40', '2024-01-22 20:36:40'),
(64, 127, 'MARTHA JOSE', 'BUSEGA', '0789765433', '1995-05-05', 'Female', NULL, 'Alive', 'Heir', NULL, '2024-01-22 20:37:33', '2024-01-22 20:37:33'),
(65, 127, 'MARTHA JOSE', 'BUSEGA', '0789765433', '1995-05-05', 'Female', NULL, 'Alive', 'Heir', NULL, '2024-01-22 20:37:33', '2024-01-22 20:37:33'),
(66, 129, 'Nailah', 'MA', '0750718162', NULL, 'Female', NULL, 'Alive', 'Child', NULL, '2024-02-05 17:51:46', '2024-02-05 17:51:46'),
(68, 132, 'test', 'ebbs', NULL, NULL, 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-02-06 14:08:24', '2024-02-06 14:08:24'),
(69, 135, 'first', 'sa', '598900', NULL, 'Male', NULL, 'Alive', 'Child', NULL, '2024-02-21 13:32:46', '2024-02-21 13:32:46'),
(70, 135, 'second', 'ada', '3456456', NULL, 'Female', NULL, 'Alive', 'Heir', NULL, '2024-02-21 13:33:27', '2024-02-21 13:33:27'),
(71, 135, 'ada', 'fg', '8904193', NULL, 'Male', NULL, 'Alive', 'Dependant', NULL, '2024-02-21 13:36:50', '2024-02-21 13:36:50'),
(72, 135, 'Mars', 'Mars', '0876639927', NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2024-02-21 14:17:59', '2024-02-21 14:17:59'),
(73, 135, 'BK', 'earth', '0758662148', '2024-02-21', 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-02-21 14:18:36', '2024-02-21 14:18:36'),
(74, 135, 'testing child', 'sdf', '09283475', '2024-03-01', 'Male', NULL, 'Alive', 'Child', NULL, '2024-03-01 16:58:12', '2024-03-01 16:58:12'),
(75, 135, 'testing spouse', 'sdfg', '12345', NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2024-03-01 16:58:33', '2024-03-01 16:58:33'),
(76, 135, 'testing Dependant', 'defrgt', '123456', '2024-03-01', 'Male', NULL, 'Alive', 'Dependant', NULL, '2024-03-01 16:58:55', '2024-03-01 16:58:55'),
(77, 135, 'kasdlf', 'sdfg', '2345', NULL, 'Male', NULL, 'Alive', 'Heir', NULL, '2024-03-01 16:59:18', '2024-03-01 16:59:18'),
(78, 135, 'wqerty', 'awedrfg', '1234567', NULL, 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-03-01 16:59:37', '2024-03-01 16:59:37'),
(79, 135, 'testing', 'asdfrgthyuj', '1234567', NULL, 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-03-04 16:39:49', '2024-03-04 16:39:49'),
(80, 128, 'testing', 'sdfg', '234563456', NULL, 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-03-04 16:52:56', '2024-03-04 16:52:56'),
(81, 51, 'testing', 'asdfa', '123456', NULL, 'Male', NULL, 'Alive', 'OtherRelative', NULL, '2024-03-04 17:01:53', '2024-03-04 17:01:53'),
(82, 51, 'first', 'wakiso', '2345678876', '1800-06-19', 'Male', NULL, 'Alive', 'Child', NULL, '2024-06-19 11:32:52', '2024-06-19 11:32:52'),
(83, 51, 'second child', 'wakiso', '1234567887', '1900-06-19', 'Male', NULL, 'Alive', 'Child', NULL, '2024-06-19 11:33:17', '2024-06-19 11:33:17'),
(84, 51, 'first spouse', 'waakio', '5432345677', NULL, NULL, 'Others', 'Alive', 'Spouse', NULL, '2024-06-19 11:33:40', '2024-06-19 11:33:40'),
(85, 51, 'first dependant', 'wakiso', '8765432123', NULL, 'Male', NULL, 'Alive', 'Dependant', NULL, '2024-06-19 11:34:09', '2024-06-19 11:34:09'),
(86, 51, 'firs heir', 'wakiso', '7654323456', NULL, 'Male', NULL, 'Alive', 'Heir', NULL, '2024-06-19 11:34:31', '2024-06-19 11:34:31'),
(87, 138, 'Senyonga Jaiden Mwesigwa', 'Wakiso district', NULL, '2019-06-09', 'Male', NULL, 'Alive', 'Heir', NULL, '2024-07-08 14:01:06', '2024-07-08 14:01:06'),
(88, 110, 'SSENYONJO ISAIAH YOHANAN', 'NAMUGONGO', '0703928363', '2024-05-05', 'Male', NULL, 'Alive', 'Child', NULL, '2024-07-10 02:16:15', '2024-07-10 02:16:15'),
(89, 138, 'Nazziwa', 'Nsaggu Wakiso district', '0705269891', '2023-07-15', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-07-13 23:32:53', '2024-07-13 23:32:53'),
(90, 138, 'Naluyange Zabbu Shayndel Berna', 'Nsaggu Wakiso district', '0705269891', '2022-02-10', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-07-13 23:34:02', '2024-07-13 23:34:02'),
(91, 138, 'Naluyange Zabbu Shayndel Berna', 'Nsaggu Wakiso district', '0705269891', '2022-02-10', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-07-13 23:34:02', '2024-07-13 23:34:02'),
(92, 138, 'Nazziwa Shiloh', 'Nsaggu Wakiso district', '0705269891', '2023-07-19', 'Female', NULL, 'Alive', 'Dependant', NULL, '2024-07-13 23:35:13', '2024-07-13 23:35:13'),
(98, 146, 'Lubanga avie', 'Kampala', '0784102071', '2011-01-08', 'Male', NULL, 'Alive', 'Child', NULL, '2024-07-31 02:58:07', '2024-07-31 02:58:07'),
(99, 146, 'Semuwemba Ruben', 'Katikamu', '0784102071', '2014-12-13', 'Male', NULL, 'Alive', 'Child', NULL, '2024-07-31 03:00:25', '2024-07-31 03:00:25'),
(100, 146, 'Rahma mukalazi', 'Bweyale', '0784102071', '2015-01-16', 'Female', NULL, 'Alive', 'Child', NULL, '2024-07-31 03:02:23', '2024-07-31 03:02:23'),
(101, 146, 'Rashmi nalwoga', 'Katikamu', '0784102071', '2019-12-06', 'Female', NULL, 'Alive', 'Child', NULL, '2024-07-31 03:03:34', '2024-07-31 03:03:34'),
(102, 146, 'Grace namayanja', 'Qatar', '0788028878', NULL, NULL, 'Civil', 'Alive', 'Spouse', NULL, '2024-07-31 03:04:22', '2024-07-31 03:04:22'),
(103, 146, 'Rashmi nalwoga', 'Katikamu', '0784102071', '2019-12-06', 'Female', NULL, 'Alive', 'Heir', NULL, '2024-07-31 03:05:56', '2024-07-31 03:05:56'),
(104, 148, 'Pearl Elisabeth Kitimbo', 'Namayina', '0771416888', NULL, NULL, 'Islamic / Mohammedan', 'Alive', 'Spouse', NULL, '2024-09-30 16:42:19', '2024-09-30 16:42:19'),
(105, 148, 'Ariana Mubiru Ssekalala', 'Namayina', '0771416888', '2021-12-31', 'Female', NULL, 'Alive', 'Child', NULL, '2024-09-30 16:47:15', '2024-09-30 16:47:15'),
(107, 151, 'Elon Hoffmann Kaweesi', 'C/O Ronald Kaweesi P.O Box 104537 Kampala', '0', '2016-06-06', 'Male', NULL, 'Alive', 'Child', NULL, '2024-10-24 13:46:28', '2024-10-24 13:46:28'),
(108, 151, 'Ephraim Neumann Wangi', 'C/O Ronald Kaweesi P. O Box 104537 Kampala', '0', '2020-08-20', 'Male', NULL, 'Alive', 'Child', NULL, '2024-10-24 13:47:44', '2024-10-24 13:47:44'),
(109, 151, 'Atim Assumpta', 'C/O Ronald Kaweesi P. O Box 104537 Kampala', '0704497297', NULL, NULL, 'Customary', 'Alive', 'Spouse', NULL, '2024-10-24 13:49:47', '2024-10-24 13:49:47'),
(110, 151, 'Martha Nassazi', 'Masajja', '0758168600', '2002-10-15', 'Male', NULL, 'Alive', 'Dependant', NULL, '2024-10-24 13:51:48', '2024-10-24 13:51:48'),
(111, 151, 'Rubangakene Spencer Vianney Etemu', 'Bukoto', '0', '2017-11-01', 'Male', NULL, 'Alive', 'Dependant', NULL, '2024-10-24 13:53:57', '2024-10-24 13:53:57'),
(112, 153, 'Rayan', 'Kampala', '0779181780', '2006-11-29', 'Male', NULL, 'Alive', 'Child', NULL, '2024-10-25 11:08:08', '2024-10-25 11:08:08'),
(113, 234, 'thomas jr.', 'kampala', '2', '2020-02-14', 'male', NULL, 'Alive', 'Child', NULL, '2025-02-10 09:36:36', '2025-02-10 09:36:36'),
(116, 221, 'hdsrdtfgh', 'hgfdscdgh', '987654', '2000-08-23', 'male', NULL, 'bed ridden', 'Child', NULL, '2025-02-12 12:13:57', '2025-02-12 12:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(14, 'Top Admin', 'web', '2024-11-27 10:01:37', '2024-11-28 04:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(11, 14),
(14, 14),
(15, 14),
(18, 14),
(22, 14),
(25, 14),
(26, 14),
(27, 14),
(28, 14),
(29, 14),
(30, 14),
(31, 14),
(32, 14),
(33, 14),
(35, 14),
(36, 14),
(37, 14),
(38, 14),
(39, 14),
(40, 14),
(41, 14),
(42, 14),
(50, 14),
(51, 14),
(52, 14),
(53, 14),
(55, 14),
(56, 14),
(57, 14),
(59, 14),
(62, 14),
(63, 14),
(64, 14),
(65, 14),
(66, 14),
(67, 14),
(68, 14),
(69, 14);

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `percentage`, `organisation`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(1, 102, '70', 'MTA', 'fds - 345345 - 54645 - Spouse', NULL, '2023-10-30 07:53:49', '2023-11-08 09:25:00'),
(12, 106, '50', 'The Masscoss', NULL, NULL, '2023-11-20 04:59:16', '2025-01-13 06:54:52'),
(14, 106, '2', 'ertg', NULL, NULL, '2023-11-22 04:29:17', '2023-11-22 04:29:17'),
(15, 110, '25', 'MELCHI ADVOCATES', NULL, NULL, '2023-12-02 22:29:28', '2023-12-02 22:29:28'),
(16, 122, '25', 'MELCHI ADVOCATES', NULL, NULL, '2023-12-20 13:56:46', '2023-12-20 13:56:46'),
(17, 124, '50', 'MTA', NULL, NULL, '2023-12-22 14:12:37', '2023-12-22 14:12:37'),
(18, 126, '25', 'MELCHI ADVOCATES', NULL, NULL, '2024-01-22 18:11:40', '2024-01-22 18:11:40'),
(19, 127, '10', 'MELCHI ADVOCATES', NULL, NULL, '2024-01-22 20:45:22', '2024-01-22 20:45:22'),
(20, 135, '30', 'MTA', NULL, NULL, '2024-02-21 13:40:18', '2024-02-21 13:40:18'),
(21, 135, '50', 'masscos', NULL, NULL, '2024-03-01 16:31:35', '2024-03-01 16:31:35'),
(22, 135, '45', 'adsdsd', NULL, NULL, '2024-03-01 17:02:06', '2024-03-01 17:02:06'),
(23, 51, '20', 'mta', NULL, NULL, '2024-06-19 11:39:41', '2024-06-19 11:39:41'),
(24, 51, '30', 'stanbic', NULL, NULL, '2024-06-19 11:39:52', '2024-06-19 11:39:52'),
(27, 110, '50', 'ALIDWILLS', NULL, NULL, '2024-07-10 02:21:49', '2024-07-10 02:21:49'),
(28, 138, '6200', 'Stanbic Holdings Ltd', NULL, NULL, '2024-07-13 23:35:58', '2024-07-13 23:35:58'),
(29, 221, '798987', 'fyjgdnc', NULL, NULL, '2025-02-11 03:40:10', '2025-02-12 12:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `share_dispositions`
--

CREATE TABLE `share_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `disposed_to` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `share_dispositions`
--

INSERT INTO `share_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 106, 4, '12', 'talk all', 'Nailah Franey - - MA - Child', '2023-11-17 08:26:45', '2023-11-17 08:26:45'),
(2, 106, 6, '40', 'only 40', 'Sophia Namazzi - - MA - Heir', '2023-11-17 08:27:04', '2023-11-17 08:27:04'),
(3, 106, 7, '3', 'dfsd', 'Nailah Franey - - MA - Child', '2023-11-20 03:35:04', '2023-11-20 03:35:04'),
(4, 106, 12, '5', 'Hajjii do not sell these shares', 'Jajja - - Entebbe - Dependant', '2023-11-20 04:59:42', '2023-11-20 04:59:42'),
(5, 106, 12, '50', 'take all of them', 'Jajja - - Entebbe - Dependant', '2023-11-20 05:12:54', '2023-11-20 05:12:54'),
(6, 110, 15, '25', 'To be shared equally', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:42:00', '2023-12-02 22:42:00'),
(7, 110, 15, '25', 'To be shared equally', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:42:01', '2023-12-02 22:42:01'),
(8, 122, 16, '25', 'ALL SHARES', 'SSENYANGE - 0703928363 - NAMUGONGO - Dependant', '2023-12-20 14:03:58', '2023-12-20 14:03:58'),
(9, 124, 17, '1', 'whole of it', 'anybody - 0750718162 - MArs - Spouse', '2023-12-22 14:15:15', '2023-12-22 14:15:15'),
(10, 126, 18, '25', 'TO BE SHARED EQUALLY', 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:28:06', '2024-01-22 18:28:06'),
(11, 126, 18, '25', 'TO BE SHARED EQUALLY', 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:28:07', '2024-01-22 18:28:07'),
(12, 126, 18, '25', 'TO BE SHARED EQUALLY', 'MUKASA PAUL - 0703928362 - KIREKA - Child', '2024-01-22 18:28:07', '2024-01-22 18:28:07'),
(13, 127, 19, '25', 'TO BE SHARED EQUALLY', 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:50:51', '2024-01-22 20:50:51'),
(14, 135, 20, '50%', 'its yours alone', 'ada - 8904193 - fg - Dependant', '2024-02-21 14:08:36', '2024-02-21 14:08:36'),
(15, 135, 20, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:06:04', '2024-03-01 17:06:04'),
(16, 135, 21, 'W', 'WER', 'wqerty - 1234567 - awedrfg - OtherRelative', '2024-03-01 17:06:10', '2024-03-01 17:06:10'),
(17, 135, 21, 'W', 'WER', 'testing spouse - 12345 - sdfg - Spouse', '2024-03-01 17:06:16', '2024-03-01 17:06:16'),
(18, 135, 21, 'W', 'WER', 'BK - 0758662148 - earth - OtherRelative', '2024-03-01 17:06:24', '2024-03-01 17:06:24'),
(19, 135, 22, 'W', 'WER', 'wqerty - 1234567 - awedrfg - OtherRelative', '2024-03-01 17:06:29', '2024-03-01 17:06:29'),
(20, 51, 23, 'everything', 'take everything', 'first spouse - 5432345677 - waakio - Spouse', '2024-06-19 11:47:03', '2024-06-19 11:47:03'),
(21, 51, 24, 'everything', 'take everything', 'firs heir - 7654323456 - wakiso - Heir', '2024-06-19 11:47:12', '2024-06-19 11:47:12'),
(22, 138, 25, 'undefined', 'undefined', 'Senyonga Jaiden Mwesigwa - - Wakiso district - Heir', '2024-07-08 14:13:31', '2024-07-08 14:13:31'),
(23, 110, 27, '50', '50', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:28:06', '2024-07-10 02:28:06'),
(24, 138, 28, 'undefined', 'undefined', 'Senyonga Jaiden Mwesigwa - - Wakiso district - Heir', '2024-07-13 23:37:06', '2024-07-13 23:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `spouses`
--

CREATE TABLE `spouses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '1',
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mariage` varchar(100) NOT NULL,
  `spouse_file` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_packages`
--

CREATE TABLE `sub_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `storage_limit` int(11) DEFAULT NULL,
  `support_level` varchar(255) NOT NULL DEFAULT 'Basic',
  `consultation_included` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_packages`
--

INSERT INTO `sub_packages` (`id`, `name`, `price`, `description`, `storage_limit`, `support_level`, `consultation_included`, `created_at`, `updated_at`) VALUES
(26, 'standard', 150000.000, 'we can discuss whats best for you', NULL, 'Standard', 1, '2025-02-06 03:33:24', '2025-02-06 05:09:47'),
(27, 'begginner', 500000.000, 'friendly', NULL, 'Standard', 1, '2025-02-06 08:39:44', '2025-02-06 08:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `will_id` varchar(50) NOT NULL,
  `sub_package_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `nin` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `original_address` varchar(50) DEFAULT NULL,
  `current_address` varchar(50) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `paystatus` int(11) NOT NULL DEFAULT 0,
  `last_reminder_sent_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `addedby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `password_reset_otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `will_id`, `sub_package_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `remember_token`, `contact`, `nin`, `gender`, `date_of_birth`, `original_address`, `current_address`, `marital_status`, `username`, `paystatus`, `last_reminder_sent_at`, `user_type`, `status`, `addedby`, `created_at`, `updated_at`, `otp`, `otp_expires_at`, `password_reset_otp`) VALUES
(51, '1', NULL, NULL, NULL, NULL, '$2y$10$NRivscAE6KABCriN.T131OxaNEMm3ImmA5WEmlm/EO3eqwzuuzxoq', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, 'Single', 'tester', 1, NULL, 1, 1, NULL, '2023-10-23 11:15:47', '2024-11-27 23:32:49', NULL, NULL, NULL),
(96, '231110001', NULL, 'Alidwills', 'Tester', 'tester@gmail.com', '$2y$10$0qewyBqf2U9pmyZ9tNJ3DOLssl4AIRGcQ7UCiE/hwXxqqPp/CopGq', NULL, NULL, NULL, 'null', 'Male', '1999-08-08', 'null', 'Kampala', 'Single', 'admin', 0, NULL, 1, 1, NULL, '2023-10-24 13:54:24', '2023-12-14 20:19:34', NULL, NULL, NULL),
(102, '231110010', NULL, 'Kaweesi', 'Twahah', 'carwecy@gmail.com', '$2y$10$fwdeGp50.2My5qQekBEXfuT.p73ipTFfVYhpHT.0.1RaRizhRszgy', NULL, NULL, '0750177406', 'CM7899FGG67788', 'Male', '1999-11-07', 'Kisasi', 'Kyanja', 'Single', 'twahah', 1, NULL, 1, 1, NULL, '2023-10-26 06:53:43', '2023-11-06 11:02:18', NULL, NULL, NULL),
(110, '231202001', NULL, 'MARY GORRETTI', 'NAKAMYA SSENYANGE', 'mgnakamya@yahoo.com', '$2y$10$Pt4TZFrGABiP1oDaTKYyr.FXKn3R2KrCTShTwBv.K8zSEvdVV2FOG', NULL, NULL, '0703928363', 'CF95030104JRFH', 'Female', '1995-05-25', 'BUSEGA', 'NAMUGONGO-MBALWA', 'Married', 'MARY GORRETTI', 1, NULL, 1, 1, NULL, '2023-12-03 02:59:20', '2023-12-19 23:32:50', NULL, NULL, NULL),
(112, '231204001', NULL, 'FAIZO', 'MUHUMUZA', 'faisal@mta.co.ug', '$2y$10$F7fNlhFm06FX1Ru02kFgRucHTqasD8NTw5HDkrtBehdmeCWCiGD/u', NULL, NULL, '0783821695', 'null', 'Male', 'null', 'null', 'Plot 20, Piato Building', 'null', 'faizo', 0, NULL, 2, 1, NULL, '2023-12-05 04:13:24', '2023-12-05 04:14:09', NULL, NULL, NULL),
(122, '231220002', NULL, 'ESTHER', 'GIANNA', 'rettyknowles@gmail.com', '$2y$10$iz3wmVkcMdArnGZyDHCaceSnXBq0K89PVgTFlnS9QDpSq9jgen3iu', NULL, NULL, '0703928363', 'null', 'Female', '2021-03-12', 'NAMUGONGO', 'NAMUGONGO', 'Single', 'ESTHER GIANNA', 0, NULL, 2, 1, NULL, '2023-12-20 18:29:01', '2023-12-20 18:35:49', NULL, NULL, NULL),
(124, '231222001', NULL, 'Mariam', 'Nakanyike', 'mariam.nakanyike@gmail.com', '$2y$10$OPuPL6StQFkVaHeheyagKeoPGyuPr.0CxbZ5CSKQeUs8nkglwzsM6', NULL, NULL, '0750718162', 'null', 'Female', 'null', 'null', 'Entebbe', 'null', 'ma.', 1, NULL, 2, 1, NULL, '2023-12-22 19:02:32', '2023-12-22 20:09:44', NULL, NULL, NULL),
(125, '240122001', NULL, 'NUWAGABA', 'EDRINE', 'edrineizzy@gmail.com', '$2y$10$iChq45H2C5xHPQJ4kYEHB.qRqiwsqtx0Yywc3OfiP0KJUkauy78g2', NULL, NULL, '0701664348', 'CM0205210N4YLA', 'Male', '2002-02-24', 'RUKUNGIRI', 'kampala', 'Married', 'EDRINE IZZY', 1, NULL, 2, 1, NULL, '2024-01-22 22:03:48', '2024-01-22 22:37:14', NULL, NULL, NULL),
(126, '240122002', NULL, 'John', 'Mukasa', 'melchiadvocates@gmail.com', '$2y$10$ckanbRj4XpBE.C/Pri0DuOTLsNr/FSd14o1de.r1khNjz6b50Xvam', NULL, NULL, '0788231030', 'CF48575754RFH', 'Male', '1995-05-05', 'KIREKA', 'Kireka', 'Married', 'JOHN MUKASA', 0, NULL, 2, 1, NULL, '2024-01-22 22:41:34', '2024-01-30 20:25:24', NULL, NULL, NULL),
(127, '240122003', NULL, 'Melanie', 'Mukasa', 'mothersolarestablishments@gmail.com', '$2y$10$sTjn4Tl08czYcU6cX1K5nuPOo11RUueZKdA.cok0rMomyVTW7Nbye', NULL, NULL, '0703928361', 'CF67557888876JRFH', 'Female', '1995-05-05', 'Kireka', 'Kireka', 'Married', 'MELANIE MUKASA', 0, NULL, 2, 1, NULL, '2024-01-23 01:31:16', '2024-01-23 01:33:03', NULL, NULL, NULL),
(128, '240205001', NULL, 'Nah', 'Franey', 'franey.n@yahoo.com', '$2y$10$3JVGNEaaeJgMkJ/82Juezuy3/Yj9cyMEWIu9F.YqFko9QSqry3r6y', NULL, NULL, '0750718162', 'null', 'Female', '2023-06-05', 'null', 'entebbe', 'null', 'N', 1, NULL, 2, 1, NULL, '2024-02-05 16:38:25', '2024-02-05 16:44:21', NULL, NULL, NULL),
(129, '240205002', NULL, 'Jodan', 'Franey', 'j.franey@yahoo.com', '$2y$10$E/S4CMu5efBdZybHQvplp.WkHjXT9w3tW2Y2GHtIWi/xgyjYSAG.a', NULL, NULL, '0750718162', 'null', 'Male', 'null', 'null', 'es', 'null', 'jo', 1, NULL, 2, 1, NULL, '2024-02-05 17:44:59', '2024-02-07 05:55:19', NULL, NULL, NULL),
(131, '240205003', NULL, 'sophia', 'franey', 's.f@gmail.com', '$2y$10$/UHuq6thITPRc.UP7MaPZOQ3FI1StnzqNryFVlxgBzsktWqCqhvHy', NULL, NULL, '0750718162', 'null', 'Female', 'null', 'null', 'ebbs', 'null', 'S', 1, NULL, 2, 1, NULL, '2024-02-05 18:13:50', '2024-02-05 18:49:44', NULL, NULL, NULL),
(132, '240205004', NULL, 'sarah', 'Franey', 's.fa@yahoo.com', '$2y$10$GkQ875ejlLcZsMa5t94On.Rxo3dAdfSKQzfzHp3JiVxX9vMFk8xLu', NULL, NULL, '0750718162', 'null', 'Female', 'null', 'null', 'ma', 'null', 'sa', 1, NULL, 2, 1, NULL, '2024-02-05 23:57:23', '2024-02-06 22:49:50', NULL, NULL, NULL),
(133, '240206001', NULL, 'null', 'null', 'null', '$2y$10$S36L3GR4h2Hw82oeQuyvzu4CSCyFZRLDLQPsEJGSHF150Vueu7ZdG', NULL, NULL, 'null', 'null', 'Male', 'null', 'null', 'null', 'Single', 'M', 1, NULL, 2, 1, NULL, '2024-02-07 06:06:32', '2024-02-07 06:12:09', NULL, NULL, NULL),
(134, '240206002', NULL, 'Covia', 'Nannono', 'covia.na@yahoo.com', '$2y$10$Q/zU1klXhX3aFhTH9d24huZD.0WNpt/pH9Nu/2v50W0e.IQ.ZjinG', NULL, NULL, '0750718162', 'null', 'Female', 'null', 'null', 'null', 'Single', 'C', 1, NULL, 2, 1, NULL, '2024-02-07 06:18:50', '2024-02-07 06:31:09', NULL, NULL, NULL),
(135, '240206003', NULL, 'Mathidu', 'Jojo', 'mathidu.jojo', '$2y$10$Z5s.neFoIGGCk83o2kFRpuZhMrcY05.wSjOsl2yCPUwmGVBCGprT6', NULL, NULL, '0778521356', 'null', 'Male', '1900-06-18', 'null', 'null', 'Single', 'Ma', 1, NULL, 2, 1, NULL, '2024-02-07 06:38:43', '2024-06-18 18:13:38', NULL, NULL, NULL),
(138, '240708001', NULL, NULL, NULL, NULL, '$2y$10$rS.4WWhYFq4Pv.2lPNB.OOEJjJ.E03Wv6R9lXCSqgUE7CoHdJxbje', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, 'Single', 'Maria Nanyonga', 1, NULL, 2, 1, NULL, '2024-07-08 17:57:24', '2024-07-14 03:30:31', NULL, NULL, NULL),
(139, '240721001', NULL, 'Gaswaga', 'Joan', 'gaswagaj@gmail.com', '$2y$10$bf0lTotzpjNSl74ASki8vuF1yytGHziQmsjsztJ5n1kuJRUH0GgJ2', NULL, NULL, '0778014754', 'CF91049102103E', 'Female', '1991-09-08', 'gaswagaj@gmail.com', 'Hoima', 'Married', 'Gaswaga Joan', 0, NULL, 2, 1, NULL, '2024-07-22 00:26:11', '2024-07-22 00:32:53', NULL, NULL, NULL),
(140, '240721002', NULL, 'Suzan', 'Wanyana', 'evanswanya@gmail.com', '$2y$10$4MFPRBI2GPpBbgvH1xkEYeH.DkA5HizpEdGo2dMX7e08dx56G3ZxC', NULL, NULL, '0702626699', 'null', 'Female', '1979-01-01', 'null', 'Mpererwe, Sekanyonyi zone, kawempe division.', 'Married', 'Suewanya', 0, NULL, 2, 1, NULL, '2024-07-22 00:42:14', '2024-07-22 00:52:15', NULL, NULL, NULL),
(141, '240722001', NULL, 'ANTHONY', 'ZZIWA', 'thjanthony@gmail.com', '$2y$10$3U4A0ZdAEv17Wn5TVEa.wuwmRAy/aEcMgvGfsBtlAOFB.wV9rwGxa', NULL, NULL, '0779823688', 'null', 'Male', '1988-06-01', 'null', 'thjanthony@gmail.com', 'null', 'antoine', 0, NULL, 2, 1, NULL, '2024-07-22 21:44:41', '2024-07-22 21:47:35', NULL, NULL, NULL),
(145, '240723001', NULL, 'Admin', 'Wills', 'adminwills@gmail.com', '$2y$10$gWOzC4Hl2ymUGJmKZTM2oerMJVS3A/Cp5WNV9Y9rqyXHE66DR0JPq', NULL, '7cFB7lQJdaOBErAlyoDXamxtgkMjTPGyHdSstFzKaMgUy94UraIR7Ho0TP3X', '0785693541', NULL, 'Male', NULL, NULL, 'Kireka', NULL, 'adminwills', 0, NULL, 1, 1, NULL, '2024-07-23 17:44:37', '2024-07-23 17:44:37', NULL, NULL, NULL),
(146, '240730001', NULL, 'Emma', 'Mukalazi', 'emmamukalazi@gmail.com', '$2y$10$TnS09lfDbvq2t7iIOM7cN.Bw.gg2ie59Hvl0tIIET9uPU8n72Pfee', NULL, NULL, '0784102071', 'CM870231083M8H', 'Male', '1986-12-24', 'Wobulenzi luweero district', 'Wobulenzi luweero district', 'Married', 'Emadagreat', 0, NULL, 2, 1, NULL, '2024-07-31 06:53:45', '2024-07-31 06:56:14', NULL, NULL, NULL),
(147, '240820001', NULL, 'Eve', 'Mbabazi', 'mbabazieve1@gmail.com', '$2y$10$NoSccmIr5IN77sICuncahuNKQg/Cwe6M.GSH26Pqit1Ln.pcjiK/q', NULL, NULL, '0773518665', 'null', 'Female', '1991-03-25', 'null', 'Kampala', 'null', 'Eve Mbabazi', 0, NULL, 2, 1, NULL, '2024-08-20 14:29:16', '2024-08-20 14:31:32', NULL, NULL, NULL),
(148, '240930001', NULL, 'Abdu', 'Ssekalala', 'assekalala@gmail.com', '$2y$10$qWXupzCFUFoqduzgA.BeKueIM19sw1BBH2yDtVQbqVxUyZp3CYX.y', NULL, NULL, '0706144416', 'CM89099101H3KJ', 'Male', 'null', 'null', 'Namayina', 'Married', 'assekalala', 0, NULL, 2, 1, NULL, '2024-09-30 20:40:07', '2024-09-30 20:41:46', NULL, NULL, NULL),
(149, '241010001', NULL, 'Egesa', 'Ronald Leonard', 'egesa@magezi.net', '$2y$10$NRKnzjmPJAii2q0LdZR2Y.DNG9KuMBc2ZM0W1Eki8VUz2toCYFpTq', NULL, NULL, '0782442375', 'CM84042106X5MJ', 'Male', '1984-07-31', 'null', 'Plot 425, Block 253, Lukuli, Sekimpi Road', 'Married', 'rlegesa', 0, NULL, 2, 1, NULL, '2024-10-10 10:17:40', '2024-10-10 10:23:24', NULL, NULL, NULL),
(150, '241022001', NULL, 'ANDREW', 'NJUKI', 'andrewnjuki@gmail.com', '$2y$10$Cx6VZjuzGyTC2e2uNRprX.5cQOhluQkYInqV37eNpWNTcs83w62ZS', NULL, NULL, '0751533676', 'null', 'Male', '1995-04-25', 'null', 'Balintuma road', 'null', 'CaptNdereya', 0, NULL, 2, 1, NULL, '2024-10-23 01:30:43', '2024-10-23 01:32:52', NULL, NULL, NULL),
(151, '241024001', NULL, 'Ronald', 'Kaweesi', 'kwsronald7@gmail.com', '$2y$10$j67WgIM0Cde4ps.QPrmbKu/.B0AW3Q1NPINzRvLBlMN/H30T9Zg8.', NULL, NULL, '0704522035', 'null', 'Male', '1989-05-23', 'null', 'P.O Box 104537 Kampala', 'Married', 'Ronald101', 0, NULL, 2, 1, NULL, '2024-10-24 17:34:09', '2024-10-24 17:36:48', NULL, NULL, NULL),
(152, '241025001', NULL, 'Test', 'Test', 'testuser@gmail.com', '$2y$10$BlxKgMbQar19t6wwErtpMufyT.Wq9Z1ypJ9ItA/F2abwSmlUDZJ9.', NULL, NULL, '0759879877', NULL, 'Male', NULL, NULL, 'Kampala', NULL, 'testuser', 0, NULL, 2, 1, NULL, '2024-10-25 14:32:02', '2024-10-25 14:32:02', NULL, NULL, NULL),
(153, '241025002', NULL, 'Ali', 'Musa', 'alimusa@gmail.com', '$2y$10$NP/Z3WnpdfepDDxsmuJQOOrGbrQHFhuiQdt0DiOGEcYMjiLPJ7DlW', NULL, NULL, '0758788903', 'null', 'Male', 'null', 'null', 'Kampala', 'Single', 'alimusa', 0, NULL, 2, 1, NULL, '2024-10-25 14:58:49', '2024-10-25 15:06:00', NULL, NULL, NULL),
(154, '241111001', NULL, 'ali', 'musa', 'ali@gmail.com', '$2y$10$Th9bAm8W1wIYkToUdAx2UeG7xtoNzGgRCNFbk8MMQYWHAZDsslPF6', NULL, NULL, '0759988693', 'null', 'Male', 'null', 'null', 'kampala', 'null', 'ali', 0, NULL, 2, 1, NULL, '2024-11-11 19:54:06', '2024-11-11 19:57:48', NULL, NULL, NULL),
(160, '241105001', '', 'kyeyune', 'Habib', 'habibtusubira27@gmail.com', '$2y$10$HfQtY15pHTRF9YsFCxHluuTjg9uLnQAs27H0xW.Q7C538IpSqgL5i', NULL, '1U51xwXzKoeeqI150YnPkFvw4Vs63Fq4RwC7Be8ELHt2iJmjwVEQMvRaRvWk', '2566787786', '78675463542354657', 'male', '2002-04-27', 'null', 'tuesday', 'null', 'tuesday', 0, NULL, 1, 1, NULL, '2024-11-05 11:07:48', '2025-06-26 07:08:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number_plate` varchar(20) NOT NULL,
  `model` varchar(15) NOT NULL,
  `color` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `name`, `number_plate`, `model`, `color`, `type`, `disposed_to`, `file`, `created_at`, `updated_at`) VALUES
(2, 102, 'dffgd', 'fhgh', 'dfgdf', '', 'Commercial', 'Kawaalya - 075565 - 3443 - Child', 'Vehicle_1736762133.jpg', '2023-10-30 07:54:56', '2025-01-13 06:55:33'),
(3, 106, 'Benz', 'UAB304Q', '1994', 'white', 'Personal', 'Jordan Franey - - MA - Child', NULL, '2023-11-14 06:59:07', '2023-11-14 10:52:24'),
(4, 106, 'Pajero', 'UAF237Y', '2000', 'Green', 'Commercial', NULL, NULL, '2023-11-14 07:02:02', '2023-11-14 07:02:02'),
(26, 106, 'df', 'sd4', 's', 'z', 'Personal', NULL, NULL, '2023-11-22 04:24:50', '2023-11-22 04:24:50'),
(28, 106, 'test', 'test', 'test', 'test', 'Personal', NULL, NULL, '2023-11-24 04:42:34', '2023-11-24 04:42:34'),
(29, 106, 'df', 'sd4', 's', 'z', 'Personal', NULL, NULL, '2023-11-24 04:43:42', '2023-11-24 04:43:42'),
(30, 110, 'SUBARU IMPREZA', 'UBM 677W', '2013', 'NAVY BLUE', 'Personal', NULL, NULL, '2023-12-02 22:30:54', '2023-12-02 22:30:54'),
(31, 122, 'SUBARU', 'UBM 677W', '2013', 'BLUE', 'Personal', NULL, NULL, '2023-12-20 13:57:37', '2023-12-20 13:57:37'),
(32, 124, 'Pajero', 'UAB301Q', '1990', 'White', 'Personal', NULL, NULL, '2023-12-22 14:13:07', '2023-12-22 14:13:07'),
(33, 125, 'SUBARU CROSS SPORT', 'UBQ 001A', '2004', 'BLUE', 'Personal', NULL, NULL, '2024-01-22 17:18:20', '2024-01-22 17:18:20'),
(34, 126, 'LEXUS', 'UBQ 122A', '2023', 'BLACK', 'Personal', NULL, NULL, '2024-01-22 18:12:44', '2024-01-22 18:12:44'),
(35, 127, 'LEXUS', 'UBQ 234X', '2023', 'BLACK', 'Personal', NULL, NULL, '2024-01-22 20:46:05', '2024-01-22 20:46:05'),
(36, 135, 'Pajero', 'UBX302A', '2024', 'navy blue', 'Personal', NULL, NULL, '2024-02-21 13:41:19', '2024-02-21 13:41:19'),
(37, 135, 'Benz', 'UCA987P', '2025', 'Grey', 'Commercial', NULL, NULL, '2024-02-21 13:42:08', '2024-02-21 13:42:08'),
(38, 135, 'sadfsa', 'adas', 'sdaafds', 'adfas', 'Commercial', NULL, NULL, '2024-03-01 16:31:51', '2024-03-01 16:31:51'),
(39, 135, 'asdas', '2e', 'sDS', 'casda', 'Personal', NULL, NULL, '2024-03-01 17:02:22', '2024-03-01 17:02:22'),
(40, 51, 'min copper', 'UYY 382H', '78999', 'green', 'Personal', NULL, NULL, '2024-06-19 11:40:26', '2024-06-19 11:40:26'),
(41, 51, 'benz', 'uyt908I', '4589', 'green', 'Commercial', NULL, NULL, '2024-06-19 11:41:01', '2024-06-19 11:41:01'),
(42, 110, 'RANGE ROVER', 'MELCHI', '2024', 'GREY', 'Personal', NULL, NULL, '2024-07-10 02:22:36', '2024-07-10 02:22:36'),
(43, 221, 'yfdtr', '9876', 'gfhguykfhvhgj', 'gyufdt', 'commercial', NULL, NULL, '2025-02-10 10:33:28', '2025-02-12 12:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_dispositions`
--

CREATE TABLE `vehicle_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `disposed_to` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_dispositions`
--

INSERT INTO `vehicle_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `updated_at`, `created_at`) VALUES
(1, 106, 20, NULL, NULL, 'Jordan Franey - - MA - Child', '2023-11-17 08:21:59', '2023-11-17 08:21:59'),
(2, 106, 3, 'undefined', 'share it with your siblings', 'Jordan Franey - - MA - Child', '2023-11-20 03:39:57', '2023-11-20 03:39:57'),
(3, 106, 4, '5', 'all gomesi', 'Jordan Franey - - MA - Child', '2023-11-20 04:58:40', '2023-11-20 04:58:40'),
(4, 106, 26, '1', 'take it', 'Jajja - - Entebbe - Dependant', '2023-11-22 07:46:24', '2023-11-22 07:46:24'),
(5, 106, 27, '1', 'share it with all your siblings', 'Sophia Namazzi - - MA - Heir', '2023-11-23 06:14:51', '2023-11-23 06:14:51'),
(6, 106, 27, '1', 'share it with all your siblings', 'Jajja - - Entebbe - Dependant', '2023-11-23 06:15:38', '2023-11-23 06:15:38'),
(7, 106, 27, 'undefined', 'undefined', 'Jajja - - Entebbe - Dependant', '2023-11-24 04:31:28', '2023-11-24 04:31:28'),
(8, 106, 29, 'undefined', 'undefined', 'Hmm - - Earth - Spouse', '2023-11-24 04:43:56', '2023-11-24 04:43:56'),
(9, 106, 29, 'undefined', 'undefined', 'Sophia Namazzi - - MA - Heir', '2023-11-24 07:19:33', '2023-11-24 07:19:33'),
(10, 106, 29, 'undefined', 'undefined', 'Jordan Franey - - MA - Child', '2023-11-24 08:04:28', '2023-11-24 08:04:28'),
(11, 110, 30, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:54', '2023-12-02 22:45:54'),
(12, 110, 30, '4.7FT BY 7FT', 'Proceeds of the shop to be shared equally.', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:45:54', '2023-12-02 22:45:54'),
(13, 110, 30, '4.7FT BY 7FT', NULL, 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:46:26', '2023-12-02 22:46:26'),
(14, 110, 30, '4.7FT BY 7FT', NULL, 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:46:26', '2023-12-02 22:46:26'),
(15, 110, 30, '4.7FT BY 7FT', NULL, 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:46:26', '2023-12-02 22:46:26'),
(16, 110, 30, '4.7FT BY 7FT', NULL, 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2023-12-02 22:46:26', '2023-12-02 22:46:26'),
(17, 122, 31, '25', NULL, 'SSENYANGE - 0703928363 - NAMUGONGO - Dependant', '2023-12-20 14:04:20', '2023-12-20 14:04:20'),
(18, 124, 32, '1', 'whole of it', 'Jordan - 0718162 - MA - Child', '2023-12-22 14:15:24', '2023-12-22 14:15:24'),
(19, 125, 33, 'UBQ001A', 'MY SECOND VEHICLE', 'NATUKUNDA - 0701664348 - NAMUGONGO - Child', '2024-01-22 17:27:17', '2024-01-22 17:27:17'),
(20, 126, 34, '1', 'TO BE SHARED EQUALLY', 'MUKASA MELANIE - 0703928363 - KIREKA - Child', '2024-01-22 18:28:33', '2024-01-22 18:28:33'),
(21, 127, 35, '25', 'TO BE SHARED EQUALLY', 'MUWONGE PAUL - 0709965544 - KIREKA - Spouse', '2024-01-22 20:51:04', '2024-01-22 20:51:04'),
(22, 135, 36, '50%', 'its yours alone', 'first - 598900 - sa - Child', '2024-02-21 14:08:15', '2024-02-21 14:08:15'),
(23, 135, 37, '50%', 'its yours alone', 'second - 3456456 - ada - Heir', '2024-02-21 14:08:25', '2024-02-21 14:08:25'),
(24, 135, 38, 'W', 'WER', 'kasdlf - 2345 - sdfg - Heir', '2024-03-01 17:06:37', '2024-03-01 17:06:37'),
(25, 135, 38, 'W', 'WER', 'BK - 0758662148 - earth - OtherRelative', '2024-03-01 17:06:43', '2024-03-01 17:06:43'),
(26, 135, 38, 'W', 'WER', 'wqerty - 1234567 - awedrfg - OtherRelative', '2024-03-01 17:06:49', '2024-03-01 17:06:49'),
(27, 135, 39, 'W', 'WER', 'testing Dependant - 123456 - defrgt - Dependant', '2024-03-01 17:06:55', '2024-03-01 17:06:55'),
(28, 135, 39, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:07:02', '2024-03-01 17:07:02'),
(29, 135, 39, 'W', 'WER', 'Mars - 0876639927 - Mars - Spouse', '2024-03-01 17:07:20', '2024-03-01 17:07:20'),
(30, 51, 40, 'everything', 'take everything', 'second child - 1234567887 - wakiso - Child', '2024-06-19 11:47:25', '2024-06-19 11:47:25'),
(31, 51, 40, 'everything', 'take everything', 'first spouse - 5432345677 - waakio - Spouse', '2024-06-19 11:47:33', '2024-06-19 11:47:33'),
(32, 51, 41, 'everything', 'take everything', 'firs heir - 7654323456 - wakiso - Heir', '2024-06-19 11:47:42', '2024-06-19 11:47:42'),
(33, 51, 41, 'everything', 'take everything', 'first - 2345678876 - wakiso - Child', '2024-06-19 11:47:51', '2024-06-19 11:47:51'),
(34, 110, 42, '50', '50', 'SSENYANGE ISAAC KEITH - 0701231030 - NAMUGONGO-MBALWA - Spouse', '2024-07-10 02:28:24', '2024-07-10 02:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `witnesses`
--

CREATE TABLE `witnesses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '1',
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `witnesses`
--

INSERT INTO `witnesses` (`id`, `user_id`, `name`, `contact`, `address`, `updated_at`, `created_at`) VALUES
(6, 102, 'Esau', '0867', 'Kyanja', '2023-11-06 06:03:43', '2023-11-06 06:03:43'),
(7, 102, 'Joan Bomugisha', '0756767678', 'Maganjo', '2023-11-09 06:19:05', '2023-11-09 06:19:05'),
(8, 106, 'Sophia', '0750718162', 'Entebbe', '2023-11-14 11:35:24', '2023-11-14 11:35:24'),
(9, 106, 'wfaf', '134', 'ass', '2023-11-22 04:41:53', '2023-11-22 04:41:53'),
(10, 110, 'BABIRYE ANN MARY', '0703928363', 'BULOBA', '2023-12-02 22:57:08', '2023-12-02 22:57:08'),
(12, 110, 'SAMONA JULIET', '0703928363', 'BUSEGA', '2023-12-02 22:57:56', '2023-12-02 22:57:56'),
(13, 110, 'SAKAMU ANTHONY', '0703928363', 'BUSEGA', '2023-12-02 22:58:30', '2023-12-02 22:58:30'),
(14, 112, 'djdjjfjjf', '00999595', 'kdjdhd', '2023-12-04 23:15:23', '2023-12-04 23:15:23'),
(15, 51, 'Mariam', '0755433345', 'Entebbe', '2023-12-05 11:42:38', '2023-12-05 11:42:38'),
(16, 122, 'ANN MARY', '070392', 'BULOBA', '2023-12-20 14:07:30', '2023-12-20 14:07:30'),
(17, 122, 'JULIET', '23', 'BUSEGA', '2023-12-20 14:07:56', '2023-12-20 14:07:56'),
(18, 124, 'Sarah', '0750718162', 'Entebbe', '2023-12-22 14:16:59', '2023-12-22 14:16:59'),
(19, 125, 'KOBUSINGYE ANGEL', '0755273013', 'KYALIWAJJALA', '2024-01-22 17:23:27', '2024-01-22 17:23:27'),
(20, 126, 'MUSA JUMA', '0704567892', 'MAKINDYE', '2024-01-22 18:31:52', '2024-01-22 18:31:52'),
(21, 126, 'JONA MUTEBI', '0789823452', 'BUSABALA', '2024-01-22 18:32:22', '2024-01-22 18:32:22'),
(22, 126, 'JONA MUTEBI', '0789823452', 'BUSABALA', '2024-01-22 18:32:22', '2024-01-22 18:32:22'),
(23, 127, 'MUKISA EUNICE', '0703377484', 'NAMAGOMA', '2024-01-22 20:53:39', '2024-01-22 20:53:39'),
(24, 127, 'NAKATO LEO', '0702356378', 'NATEETE', '2024-01-22 20:54:13', '2024-01-22 20:54:13'),
(25, 128, 'Mariam', '0123456789', 'Entebbe', '2024-02-05 11:40:29', '2024-02-05 11:40:29'),
(26, 129, 'Mariam', '7896541230', 'ebbs', '2024-02-05 12:47:52', '2024-02-05 12:47:52'),
(27, 131, 'Mariam', '0123654789', 'ebbs', '2024-02-05 13:15:18', '2024-02-05 13:15:18'),
(28, 132, 'Mariam', '0750718162', 'MA', '2024-02-05 19:00:13', '2024-02-05 19:00:13'),
(29, 133, 'Mariam', '0750718162', 'Ma', '2024-02-07 01:07:43', '2024-02-07 01:07:43'),
(30, 134, 'Mariam', '0750718162', 'Ebbs', '2024-02-07 01:20:00', '2024-02-07 01:20:00'),
(31, 135, 'es', '12345679', 'f', '2024-02-07 01:40:11', '2024-02-07 01:40:11'),
(33, 138, 'Berna Senyonga', '0772518664', 'Busega, Rubaga division, Kampala city', '2024-07-08 14:11:09', '2024-07-08 14:11:09'),
(34, 138, 'George Senyonga', '0772501169', 'Busega, Rubaga division, Kampala city', '2024-07-08 14:11:54', '2024-07-08 14:11:54'),
(35, 110, 'NAKATO LEOCARDIA BULYA', '9877565', 'NAMAGOMA', '2024-07-10 02:30:49', '2024-07-10 02:30:49'),
(36, 146, 'Grace namayanja', '0788028878', 'Katikamu', '2024-07-31 03:12:11', '2024-07-31 03:12:11'),
(37, 151, 'Abala Nicholas', '0755688821', 'CEDAT, Makerere University', '2024-10-24 14:25:43', '2024-10-24 14:25:43'),
(38, 160, 'bob', '123456789', 'kireka', '2024-11-18 06:45:09', '2024-11-18 06:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_user_foreign` (`user`);

--
-- Indexes for table `bankaccount_dispositions`
--
ALTER TABLE `bankaccount_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `burial_detials`
--
ALTER TABLE `burial_detials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditors`
--
ALTER TABLE `creditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependants`
--
ALTER TABLE `dependants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executors`
--
ALTER TABLE `executors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heirs`
--
ALTER TABLE `heirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_dispositions`
--
ALTER TABLE `house_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_dispositions`
--
ALTER TABLE `land_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestocks`
--
ALTER TABLE `livestocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestock_dispositions`
--
ALTER TABLE `livestock_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `options_criterias`
--
ALTER TABLE `options_criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_properties`
--
ALTER TABLE `other_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_relatives`
--
ALTER TABLE `other_relatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_modules`
--
ALTER TABLE `payment_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `property_dispositions`
--
ALTER TABLE `property_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_disposition_details`
--
ALTER TABLE `property_disposition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propety_types`
--
ALTER TABLE `propety_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_dispositions`
--
ALTER TABLE `share_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouses`
--
ALTER TABLE `spouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_packages`
--
ALTER TABLE `sub_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_will_id` (`will_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `idx_username` (`username`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_dispositions`
--
ALTER TABLE `vehicle_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witnesses`
--
ALTER TABLE `witnesses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `bankaccount_dispositions`
--
ALTER TABLE `bankaccount_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `burial_detials`
--
ALTER TABLE `burial_detials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `creditors`
--
ALTER TABLE `creditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `executors`
--
ALTER TABLE `executors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `heirs`
--
ALTER TABLE `heirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `house_dispositions`
--
ALTER TABLE `house_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `land_dispositions`
--
ALTER TABLE `land_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `livestocks`
--
ALTER TABLE `livestocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `livestock_dispositions`
--
ALTER TABLE `livestock_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `options_criterias`
--
ALTER TABLE `options_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `other_properties`
--
ALTER TABLE `other_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `other_relatives`
--
ALTER TABLE `other_relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payment_modules`
--
ALTER TABLE `payment_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `property_dispositions`
--
ALTER TABLE `property_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_disposition_details`
--
ALTER TABLE `property_disposition_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `propety_types`
--
ALTER TABLE `propety_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `share_dispositions`
--
ALTER TABLE `share_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `spouses`
--
ALTER TABLE `spouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_packages`
--
ALTER TABLE `sub_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vehicle_dispositions`
--
ALTER TABLE `vehicle_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `witnesses`
--
ALTER TABLE `witnesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `audits_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
