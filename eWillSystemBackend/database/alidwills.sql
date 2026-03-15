-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eWillSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount_dispositions`
--

CREATE TABLE `bankaccount_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(100) DEFAULT NULL,
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
(5, 106, 20, '50%', 'of the total money', 'Jajja - - Entebbe - Dependant', '2023-11-23 04:51:56', '2023-11-23 04:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_name` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `account_number`, `bank_name`, `account_name`, `branch`, `disposed_to`, `created_at`, `updated_at`) VALUES
(4, 102, '60878967896', 'Absa', 'Kwagala', 'Kampala', 'Alice - 075900876 - Kawanda - Spouse', '2023-10-31 05:27:06', '2023-11-08 09:10:46'),
(5, 106, '123654789369852', 'Green Bank', 'Million Millage', 'Entebbe', NULL, '2023-11-17 06:23:52', '2023-11-17 06:23:52'),
(20, 106, '123456897532', 'Testing', 'testing', 'testing', NULL, '2023-11-23 04:50:30', '2023-11-23 04:50:30');

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
(8, 51, NULL, 'null', 'null', '2023-12-14 03:24:33', '2023-12-14 03:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user_id`, `name`, `address`, `contact`, `date_of_birth`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 102, 'Kayiru Jamal', 'Kampala', '0787867', '2023-10-25', 'Male', '1', '2023-10-26 06:05:30', '2023-10-26 06:05:30'),
(2, 102, 'Nanyanzi Rehma', 'Kireka', '0776598788', '2023-10-09', 'Female', '1', '2023-10-26 06:47:57', '2023-10-26 06:47:57'),
(4, 102, 'Esau Nsumba', 'Kabowa', '0756765767', '2023-10-03', 'Male', 'Alive', '2023-10-26 07:32:59', '2023-10-26 07:32:59'),
(5, 103, 'Ali Mukasa', 'Kireka', '0786788', '1977-03-25', 'Male', 'Alive', '2023-11-03 07:08:37', '2023-11-03 07:08:37');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditors`
--

INSERT INTO `creditors` (`id`, `user_id`, `name`, `address`, `contact`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(2, 102, 'Allan Kabuura', 'Kisasi', '0756567667', '900000', 'loan', '2023-10-26 10:22:50', '2023-10-26 10:22:50'),
(3, 106, 'The Masscos', 'Entebbe', '07789562315', '20000', 'for the items i took', '2023-11-21 04:42:09', '2023-11-21 04:42:09');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `user_id`, `name`, `address`, `contact`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(2, 102, 'Mukyaya Eric', 'Ntinda', '07867576', '70000', 'loan', '2023-10-26 10:35:42', '2023-10-26 10:35:42'),
(3, 106, 'Dan Maseke', 'Entebbe', '01478896523', '800000000', 'Million dollars', '2023-11-21 04:42:43', '2023-11-21 04:42:43');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependants`
--

INSERT INTO `dependants` (`id`, `user_id`, `name`, `address`, `gender`, `contact`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(2, 102, 'Edson Mwalimu', 'Kyanja', 'Male', '07098686', '2000-10-25', '2023-10-26 08:58:05', '2023-10-26 08:58:05');

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
(6, 51, 'mariam', '1234567890', 'Mpala', '2023-12-14 03:24:58', '2023-12-14 03:24:58');

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
(1, 'What is a Will', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque tenetur, blanditiis praesentium dicta quae voluptatibus saepe ratione dolorum pariatur animi similique, eius consequuntur aspernatur architecto dignissimos laborum eligendi maxime quasi.', 1, '2023-10-28 05:10:00', '2023-10-28 05:10:00'),
(2, 'Who needs a Will', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque tenetur, blanditiis praesentium dicta quae voluptatibus saepe ratione dolorum pariatur animi similique, eius consequuntur aspernatur architecto dignissimos laborum eligendi maxime quasi.', 1, '2023-10-28 05:10:00', '2023-10-28 05:10:00'),
(3, 'What do i need to have a will', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque tenetur, blanditiis praesentium dicta quae voluptatibus saepe ratione dolorum pariatur animi similique, eius consequuntur aspernatur architecto dignissimos laborum eligendi maxime quasi', 1, '2023-10-28 05:11:12', '2023-10-28 05:11:12'),
(4, 'Where do my loved ones find my will ?', '\r\nSome states allow a will registry to be created at the courthouse, so you may try inquiring at the local probate court whether they maintain such a registry. Other locations to look at include a safety deposit box (this may require a court order if you didn\'t sign the signature card), under mattresses, between book pages, car glove boxes or trunks, or other private safes. If you don\'t know the attorney who drafted the will, you might look for old checks made out to attorneys or legal firms. You can also ask friends of the deceased who may have acted as witnesses whether or not there was mention of where the will was kept or the attorney involved. An address book may be a good resource for people to contact. If the Testator used an online service you way want to contact these.', 1, '2023-10-28 05:11:12', '2023-10-28 05:11:12'),
(5, 'When will i be asked to pay ?\r\n', 'At eWillSystem.com, we understand the importance of ensuring your complete satisfaction before requesting payment. You will only be asked to make a payment after you have carefully proofread your will and are fully satisfied with the state-specific legal document we have helped you create. The payment process will be initiated when you are ready to execute your will by signing it.', 1, '2023-10-28 05:11:48', '2023-10-28 05:11:48'),
(6, 'fdghrd1CXV', 'DFXGFDGDFSG', 1, '2023-11-02 04:29:46', '2023-11-02 04:29:46'),
(7, 'testeing', '<p>In Uganda, currently people register their wills/documents with URSB<br>Uganda<u> Regis</u>tration Service Bureau you can try checking there.</p><ul><li>&nbsp;Bank’s safe custody.</li><li>&nbsp;One’s Advocate/Attorney.</li><li>A copy can also be retrieved from Witness to a will.<i><b> Any other place that the person customarily kept their document for custody.</b></i></li></ul><p><b>At </b><a href=\"https://eWillSystem.net\" target=\"_blank\">eWillSystem</a><b>,you will only be asked to make a payment after you have fully and duly filled in your information for creation of your legal document we have helped you create. The payment process will be initiated and upon payment you will be able to preview, edit and proof read your document and when you are ready, you print and execute your will by signing it and witnesses should sign.<br>You can after signing and also after your witnesses have signed upload the document or make any necessary edits for life.<br></b><br></p>', 1, '2023-12-06 10:58:02', '2023-12-06 11:10:30');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `user_id`, `name`, `address`, `contact`, `gender`, `updated_at`, `created_at`) VALUES
(1, 102, 'Ali Mulyanyama', 'Kireka', '0799787867', 'Male', '2023-10-26 10:06:34', '2023-10-26 10:06:34'),
(3, 106, 'Dan Maseke', 'Entebbe', '077856231995', 'Male', '2023-11-21 04:41:34', '2023-11-21 04:41:34');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `user_id`, `type`, `category`, `location`, `block`, `plot`, `custodian`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 102, 'Bungalow', 'Residentail', 'Kyanja', '', '', 'Ali', 'Alice - 075900876 - Kawanda - Spouse', '2023-10-30 05:23:37', '2023-11-08 07:55:26'),
(3, 102, 'Bungalow', 'Residentail', 'fgdhfg', '', '', 'cvbfg', NULL, '2023-10-30 10:36:18', '2023-10-30 10:36:18'),
(9, 106, 'Bungalow', 'Commercial', 'Entebbe', '444', '62', 'none', NULL, '2023-11-17 03:49:44', '2023-11-17 03:49:44'),
(15, 106, 'Flat House', 'Residential', 'test', '23', 'w3', 'test', NULL, '2023-11-20 04:24:02', '2023-11-20 04:24:02'),
(17, 106, 'Bungalow', 'Residential', 'testing', 'adfa', 'asdf', 'dsfa', NULL, '2023-11-21 06:31:58', '2023-11-21 06:31:58'),
(21, 106, 'Flat House', 'Commercial', 'ds', 'ad', 'ds', 'ada', NULL, '2023-11-22 04:28:09', '2023-11-22 04:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `house_dispositions`
--

CREATE TABLE `house_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(100) DEFAULT NULL,
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
(11, 106, 21, 'undefined', 'undefined', NULL, '2023-11-22 04:30:47', '2023-11-22 04:30:47');

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
(1, 'Meet Makerere’s Faith Kwizera', 'The Makerere Trailblazer Making Waves on UOT Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime itaque, sint incidunt beatae magni corrupti ducimus! Distinctio, autem dolores atque sapiente perferendis, unde asperiores dicta culpa deleniti quisquam repellat ducimus.', NULL, 1, '2023-10-28 05:48:02', '2023-10-28 05:48:02'),
(2, 'Young Kampala Lawyer and UCU Alumnus, Tumukunde Tony.', 'Pledges to Sponsor Law Students at LDC Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime itaque, sint incidunt beatae magni corrupti ducimus! Distinctio, autem dolores atque sapiente perferendis, unde asperiores dicta culpa deleniti quisquam repellat ducimus.', NULL, 1, '2023-10-28 05:48:02', '2023-10-28 05:48:02'),
(16, 'testeing', '<ol><li><u><b>Testator</b></u>: The person who creates a will</li><li>Executor: The person that the testator appoints to carry out their will.<br>Beneficiaries: The people or organizations who are left bequests (cash gifts, assets<br>or others) in the will by the testator.<br>Probate: Is the judicial process whereby a will is &amp;quot;proved&amp;quot; in a court of law and<br>accepted as a valid public document that is the true last testament of the deceased.<br>When you pass away with a will, the will is usually presented to a court within<br>territorial and pecuniary Jurisdiction. This court then authorizes the executor to<br>distribute your assets according to the instructions in your will.<br>Intestate: this is when you die without a will or valid will. In those cases, a court<br>will distribute your property according to intestacy law under the Succession Act.<br>These typically give your spouse or partner, children, parents, siblings or other<br>relatives a part of your property. But this may not necessarily be in the order or<br>amounts you would like. The estate is settled according to the laws of intestacy as<br></li></ol>', NULL, 1, '2023-12-06 08:20:59', '2023-12-06 08:20:59'),
(17, 'FOUR LEGAL TERMS YOU SHOULD KNOW:', '<ol><li><b>Testator: </b>The person who creates a will</li><li><u>Executor</u>: The person that the testator appoints to carry out their will.<br>Beneficiaries: The people or organizations who are left bequests (cash gifts, assets<br>or others) in the will by the testator.<br>Probate: Is the judicial process whereby a will is &amp;quot;proved&amp;quot; in a court of law and<br>accepted as a valid public document that is the true last testament of the deceased.<br>When you pass away with a will, the will is usually presented to a court within<br>territorial and pecuniary Jurisdiction. This court then authorizes the executor to<br>distribute your assets according to the instructions in your will.<br>Intestate: this is when you die without a will or valid will. In those cases, a court<br>will distribute your property according to intestacy law under the Succession Act.<br>These typically give your spouse or partner, children, parents, siblings or other<br>relatives a part of your property. But this may not necessarily be in the order or<br>amounts you would like. The estate is settled according to the laws of intestacy as provided under the Succession Act at the time of death in the absence of a legal<br>will.<br></li></ol>', NULL, 1, '2023-12-06 09:23:46', '2023-12-06 09:23:46'),
(18, 'testing', '<p>In Uganda, currently people register their wills/documents with URSB<br>Uganda Registration Service Bureau you can try checking there.</p><ul><li>Bank’s safe custody.</li><li>One’s Advocate/Attorney.</li><li>A copy can also be retrieved from Witness to a will.<br> Any other place that the person customarily kept their document for custody.<br></li></ul>', NULL, 1, '2023-12-06 09:31:40', '2023-12-06 09:31:40'),
(19, 'new', '<p>In Uganda, currently people register their wills/documents with URSB<br>Uganda Registration Service Bureau you can try checking there.</p><ul><li><b>Bank’s safe custody.</b></li><li>One’s Advocate/Attorney.</li><li>A copy can also be retrieved from Witness to a will.</li><li> Any other place that the person customarily kept their document for custody.<br></li></ul>', NULL, 1, '2023-12-06 09:46:26', '2023-12-06 09:46:26'),
(20, 'where to get will', '<p>At <a href=\"https://eWillSystem.net\" target=\"_blank\">link</a>,you will only be asked to make a payment after you have<br>fully and duly filled in your information for creation of your legal document we have helped you create. The payment process will be initiated and upon payment you will be able to preview, edit and proof read your document and when you are ready, you print and execute your will by signing it and witnesses should sign.<br>You can after signing and also after your witnesses have signed upload the<br>document or make any necessary edits for life.</p><p><br></p><p><br></p><p><b>Testator: </b>The person who creates a will<br><b>Executor: </b>The person that the testator appoints to carry out their will.<br><b>Beneficiaries: </b>The people or organizations who are left bequests (cash gifts, assets or others) in the will by the testator.<br><b>Probate</b>: Is the judicial process whereby a will is ,proved, in a court of law and accepted as a valid public document that is the true last testament of the deceased.<br><i>When you pass away with a will, the will is usually presented to a court within territorial and pecuniary Jurisdiction. This court then authorizes the executor to distribute your assets according to the instructions in your will.</i><br></p>', NULL, 1, '2023-12-06 09:53:26', '2023-12-06 10:41:34');

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
  `size` varchar(10) NOT NULL,
  `custodian` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `interest_type` varchar(100) NOT NULL,
  `disposed_to` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lands`
--

INSERT INTO `lands` (`id`, `user_id`, `district`, `village`, `block`, `plot`, `size`, `custodian`, `description`, `interest_type`, `disposed_to`, `created_at`, `updated_at`) VALUES
(3, 102, '', 'Kikandwa', '', '', '100', 'Miriam', NULL, 'Kibanja', 'Alice - 075900876 - Kawanda - Spouse', '2023-10-31 04:49:26', '2023-11-08 07:41:16'),
(4, 102, 'Luweero', 'Kikyusa', '20', '20', '1000', 'none', 'bought it', 'Kyapa', 'Sarah Aziz - 0750017176 - Kyanja - Spouse', '2023-11-08 05:03:29', '2023-11-10 08:28:51'),
(5, 106, 'Wakiso', 'Entebbe', '456', '952', '20 hectare', 'none', NULL, 'Titled Land (Kyapa)', 'Nailah Franey - - MA - Child', '2023-11-14 05:56:52', '2023-11-16 09:56:53'),
(6, 106, 'Mitiyana', 'Entebbe', '47', '85', 'dsa', 'ad', 'adsaaf', 'Kibanja', NULL, '2023-11-17 04:39:13', '2023-11-17 04:39:13'),
(15, 106, 'wef', 'sd', '23', '23', 'as', 'ad', NULL, 'Customary Land', NULL, '2023-11-22 04:27:45', '2023-11-22 04:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `land_dispositions`
--

CREATE TABLE `land_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(15) NOT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(50) DEFAULT NULL,
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
(7, 106, 15, 'undefined', 'undefined', NULL, '2023-11-22 04:30:16', '2023-11-22 04:30:16');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestocks`
--

INSERT INTO `livestocks` (`id`, `user_id`, `type`, `number`, `location`, `location_owner`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 102, 'Chicken', 10, 'Kikyusa', 'Mine', 'Kawaalya - 075565 - 3443 - Child', '2023-10-30 06:07:49', '2023-11-08 08:58:24'),
(2, 106, 'hens', 5, 'Entebbe', 'mine', 'Jordan Franey - - MA - Child', '2023-11-14 05:57:53', '2023-11-14 10:56:46'),
(4, 106, 'goats', 3, 'Entebbe', 'mine', NULL, '2023-11-17 06:02:36', '2023-11-17 06:02:36'),
(6, 106, 'cows', 4, 'Entebbe', 'mine', NULL, '2023-11-17 06:31:06', '2023-11-17 06:31:06'),
(13, 106, 'sd', 2, 'as', 'dsa', NULL, '2023-11-22 04:28:37', '2023-11-22 04:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `livestock_dispositions`
--

CREATE TABLE `livestock_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestock_dispositions`
--

INSERT INTO `livestock_dispositions` (`id`, `user_id`, `property_id`, `size`, `detail`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 106, 2, '2', 'Cocks', 'Jordan Franey - - MA - Child', '2023-11-17 06:01:08', '2023-11-17 06:01:08'),
(2, 106, 4, '3', 'He should be given everythin', 'Nailah Franey - - MA - Child', '2023-11-17 06:03:28', '2023-11-17 06:03:28'),
(3, 106, 6, '4', 'bulls only', 'Jordan Franey - - MA - Child', '2023-11-20 05:00:21', '2023-11-20 05:00:21'),
(4, 106, 13, 'undefined', 'undefined', NULL, '2023-11-22 04:31:00', '2023-11-22 04:31:00');

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
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_properties`
--

INSERT INTO `other_properties` (`id`, `user_id`, `name`, `description`, `number`, `disposed_to`, `created_at`, `updated_at`) VALUES
(2, 106, 'cups', 'green in color', '42', 'Nailah Franey - - MA - Child', '2023-11-14 09:19:36', '2023-11-15 04:56:24'),
(3, 106, 'Gomesi', 'all red', '4', 'Sophia Namazzi - - MA - Heir', '2023-11-14 09:25:14', '2023-11-14 11:24:32'),
(14, 106, 'phone', 'Black in color', '1', NULL, '2023-11-15 07:22:34', '2023-11-15 07:22:34'),
(15, 106, 'Apple watch', 'all apple watch', '13', NULL, '2023-11-15 10:30:10', '2023-11-15 10:30:10'),
(16, 106, 'macbook', 'laptop', '2', NULL, '2023-11-16 06:14:28', '2023-11-16 06:14:28'),
(31, 106, 'sd', 'ssd', '4', NULL, '2023-11-22 04:27:07', '2023-11-22 04:27:07');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
(58, 'App\\Models\\User', 96, 'my-app-token', 'a16a2e593241036490bbb97ae8a3d27001675f5a038b26002b5c09de959ce287', '[\"*\"]', '2023-11-09 03:49:55', NULL, '2023-11-09 03:49:54', '2023-11-09 03:49:55'),
(62, 'App\\Models\\User', 104, 'my-app-token', 'a89ba0e0c3e0855f837e667d64a80c3d7fbb8c8593db6d069eb009e8accc579f', '[\"*\"]', '2023-11-10 05:49:56', NULL, '2023-11-10 05:49:12', '2023-11-10 05:49:56'),
(68, 'App\\Models\\User', 102, 'my-app-token', 'be49d6a7458425a4a00584894c1539d339565a3858938d72afd90d4d65129051', '[\"*\"]', '2023-11-11 07:24:22', NULL, '2023-11-10 09:10:35', '2023-11-11 07:24:22'),
(72, 'App\\Models\\User', 105, 'my-app-token', 'd9b814ba5dc703d3bef71f96f6a8159122cc521aa513619715095879ebbd071c', '[\"*\"]', '2023-11-14 04:57:44', NULL, '2023-11-14 04:57:42', '2023-11-14 04:57:44'),
(92, 'App\\Models\\User', 108, 'my-app-token', '2f92905b9840f212ec041f2116c41d7ed37331e0a52866c880fb51f0da0e138b', '[\"*\"]', '2023-11-16 10:05:56', NULL, '2023-11-16 10:05:53', '2023-11-16 10:05:56'),
(183, 'App\\Models\\User', 117, 'my-app-token', '7a45ea0d481dda84e45dec64f288e800e524c7ba99a37b3c66855abe1c44a72a', '[\"*\"]', '2023-12-04 07:19:02', NULL, '2023-12-04 06:42:32', '2023-12-04 07:19:02'),
(184, 'App\\Models\\User', 106, 'my-app-token', '3855f871e3e485319b4ad5b11e8b63c7f5fce3e25e8bada78c4a198ab5e71b1d', '[\"*\"]', '2023-12-04 07:53:08', NULL, '2023-12-04 07:53:04', '2023-12-04 07:53:08'),
(251, 'App\\Models\\User', 51, 'my-app-token', 'e0ea6585104c8a611f23eac2b9c32a82707ac4f8c88b79f170626d2f8b603f3b', '[\"*\"]', '2023-12-14 04:25:17', NULL, '2023-12-14 04:22:40', '2023-12-14 04:25:17');

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
  `size` varchar(50) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(50) DEFAULT NULL,
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
(37, 106, 31, 'undefined', 'undefined', NULL, '2023-11-22 04:33:14', '2023-11-22 04:33:14');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `user_id`, `name`, `address`, `contact`, `date_of_birth`, `gender`, `mariage`, `life_status`, `type`, `created_at`, `updated_at`) VALUES
(1, 102, 'Kawaalya', '3443', '075565', '1999-02-22', 'Male', NULL, 'Alive', 'Child', '2023-11-08 05:48:28', '2023-11-08 05:48:28'),
(2, 102, 'fds', '54645', '345345', NULL, NULL, 'Court', 'Alive', 'Spouse', '2023-11-08 05:51:07', '2023-11-08 05:51:07'),
(4, 102, 'Alice', 'Kawanda', '075900876', NULL, NULL, 'Church', 'Alive', 'Spouse', '2023-11-08 06:21:47', '2023-11-08 06:21:47'),
(5, 102, 'Wera Sarah', 'Gomba', '078967665', '1990-11-22', 'Female', NULL, 'Alive', 'Child', '2023-11-09 04:22:10', '2023-11-09 04:22:10'),
(6, 102, 'Kakooza Fahad', 'Gomba', '078676757', '2006-03-05', 'Male', NULL, 'Alive', 'Dependant', '2023-11-09 04:23:21', '2023-11-09 04:23:21'),
(7, 102, 'Sebata Ivan', 'Kasasi', '0750177406', '1999-12-12', 'Male', NULL, 'Alive', 'Child', '2023-11-10 08:06:13', '2023-11-10 08:06:13'),
(8, 102, 'Sarah Aziz', 'Kyanja', '0750017176', NULL, NULL, 'Islamic / Mohammedan', 'Alive', 'Spouse', '2023-11-10 08:10:25', '2023-11-10 08:10:25'),
(10, 105, 'Nailah Franey', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Child', '2023-11-14 03:47:58', '2023-11-14 03:47:58'),
(11, 105, 'Jordan Franey', 'Entebbe', NULL, '2021-08-23', 'Male', NULL, 'Alive', 'Child', '2023-11-14 03:48:45', '2023-11-14 03:48:45'),
(12, 105, 'Any', 'Entebbe', NULL, NULL, NULL, 'Others', 'Alive', 'Spouse', '2023-11-14 03:49:46', '2023-11-14 03:49:46'),
(13, 105, 'Jajja', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Dependant', '2023-11-14 03:50:55', '2023-11-14 03:50:55'),
(15, 105, 'Sophia', 'undefined', '0750718162', NULL, 'Female', NULL, 'Alive', 'Heir', '2023-11-14 04:53:42', '2023-11-14 04:53:42'),
(16, 106, 'Nailah Franey', 'MA', NULL, '2016-03-14', 'Female', NULL, 'Alive', 'Child', '2023-11-14 05:00:51', '2023-11-14 05:00:51'),
(17, 106, 'Jordan Franey', 'MA', NULL, '2019-08-23', 'Male', NULL, 'Alive', 'Child', '2023-11-14 05:01:26', '2023-11-14 05:01:26'),
(18, 106, 'Hmm', 'Earth', NULL, NULL, NULL, 'Others', 'Alive', 'Spouse', '2023-11-14 05:01:50', '2023-11-14 05:01:50'),
(19, 106, 'Jajja', 'Entebbe', NULL, NULL, 'Female', NULL, 'Alive', 'Dependant', '2023-11-14 05:02:12', '2023-11-14 05:02:12'),
(23, 106, 'Sophia Namazzi', 'MA', NULL, NULL, 'Female', NULL, 'Alive', 'Heir', '2023-11-14 05:21:20', '2023-11-14 05:21:20'),
(33, 117, 'Sekajja Micheal', 'entebbe', '012251234', '2023-11-03', 'Male', NULL, 'Alive', 'OtherRelative', '2023-12-04 06:09:09', '2023-12-04 06:09:09'),
(35, 106, 'Grace Nabatanzi', 'entebbe', '0123654789', '2023-11-01', 'Female', NULL, 'Alive', 'OtherRelative', '2023-12-04 06:22:27', '2023-12-04 06:22:27');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `percentage`, `organisation`, `disposed_to`, `created_at`, `updated_at`) VALUES
(1, 102, '70', 'MTA', 'fds - 345345 - 54645 - Spouse', '2023-10-30 07:53:49', '2023-11-08 09:25:00'),
(12, 106, '50', 'The Masscoss', NULL, '2023-11-20 04:59:16', '2023-11-20 04:59:16'),
(14, 106, '2', 'ertg', NULL, '2023-11-22 04:29:17', '2023-11-22 04:29:17'),
(16, 117, '234', 'ads', NULL, '2023-12-04 07:18:34', '2023-12-04 07:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `share_dispositions`
--

CREATE TABLE `share_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `disposed_to` varchar(100) NOT NULL,
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
(5, 106, 12, '50', 'take all of them', 'Jajja - - Entebbe - Dependant', '2023-11-20 05:12:54', '2023-11-20 05:12:54');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `will_id` varchar(50) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(25) DEFAULT NULL,
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
  `user_type` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `addedby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `will_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `remember_token`, `contact`, `nin`, `gender`, `date_of_birth`, `original_address`, `current_address`, `marital_status`, `username`, `paystatus`, `user_type`, `status`, `addedby`, `created_at`, `updated_at`) VALUES
(51, '1', NULL, NULL, NULL, '$2y$10$34Nitu5kYgf5HlPSETPJmOHlEvr03T5ofJFuSq6gGAR/TcpLYHTZi', '', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, 'Single', 'tester', 0, 1, 1, NULL, '2023-10-23 07:15:47', '2023-12-14 04:24:55'),
(96, '231110001', 'eWillSystem', 'Tester', 'tester@gmail.com', '$2a$04$JnjSu7dvcq59FF3b3gnYYOZMPq2amwt4vAcC2CCbDfyEKJrxa4PPm', '', NULL, 'undefined', 'null', 'Male', '1999-08-08', 'null', 'Kampala', 'Single', 'admin', 0, 2, 1, NULL, '2023-10-24 09:54:24', '2023-11-06 10:39:55'),
(98, '3', NULL, NULL, 'ali@gmail.com', '$2y$10$xo5bA0L5NhUj61q3PbpPtulZV64UU8aRyMqkqRF/KUQKU243kQDDa', '', NULL, NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'ali', 0, 2, 1, NULL, '2023-10-25 06:00:46', '2023-10-25 06:00:46'),
(99, '4', 'sdf', 'srtg', 'rdtd@dhdf.ffd', NULL, '', NULL, '54345v', NULL, 'Female', NULL, NULL, 'sdfdg', NULL, 'ertretgre', 0, 2, 1, NULL, '2023-10-25 07:38:30', '2023-10-25 07:38:30'),
(100, '44', 'fhdb', 'jhbjh', 'hjb@hb.cj', 'neverMind', '', NULL, '78', NULL, 'Female', NULL, NULL, 'hjgj', NULL, 'jhkh', 0, 2, 1, NULL, '2023-10-25 07:42:32', '2023-10-25 07:42:32'),
(101, '332', 'dfgd', 'retre', 'hjg2@jhbb.dfiu', '$2y$10$/mklnET63lMs7bMZ0TYwsuBTfiYwMS2knKMgOIAS8CTRGHWQeu/x6', '', NULL, '98877878', NULL, 'Male', NULL, NULL, 'knjkb', NULL, 'rgdfbf', 0, 2, 1, NULL, '2023-10-25 07:54:15', '2023-10-25 07:54:15'),
(102, '231110010', 'Kaweesi', 'Twahah', 'carwecy@gmail.com', '$2y$10$fwdeGp50.2My5qQekBEXfuT.p73ipTFfVYhpHT.0.1RaRizhRszgy', '', NULL, '0750177406', 'CM7899FGG67788', 'Male', '1999-11-07', 'Kisasi', 'Kyanja', 'Single', 'twahah', 1, 2, 1, NULL, '2023-10-26 02:53:43', '2023-11-06 06:02:18'),
(103, '231110011', 'Allan', 'Okello', 'allan@gmail.com', '$2y$10$dDW78cIZdYpEjJC3KLFNlu76g7Ai7B8fCFoiqlEBthU8oef5Som2K', '', NULL, 'undefined', NULL, 'Male', 'null', 'null', 'Kampala', 'Single', 'faizo', 0, 2, 1, NULL, '2023-11-03 07:00:23', '2023-11-03 07:06:55'),
(104, '231110012', 'Isaac', 'Kawalya', 'isaac@gmail.com', '$2y$10$ZKV/LOMXo4M3hUmB.UsYN.YF7sRSFbvSgHgITDPawkHwIKbaGjWj6', '', NULL, '0757888998', 'null', 'Male', 'null', 'null', 'Kireka', 'Married', 'isaac', 0, 2, 1, NULL, '2023-11-10 05:48:53', '2023-11-10 05:49:48'),
(106, '231114001', 'Mariam', 'Nakanyike', 'mariam.nakanyike@gmail.com', '$2y$10$xZg6GW10FLpuERetUq62IuIrh55CbeduuexTcc0B0vIfaAdap5J7a', '', NULL, '0750718162', 'null', 'Female', 'null', 'Entebbe', 'Entebbe', 'Single', 'Mariam', 1, 1, 1, NULL, '2023-11-14 04:59:53', '2023-11-22 03:48:35'),
(108, '231116001', 'Johnie', 'Doe', 'johnie.doe@gmail.com', '$2y$10$Fm857wyypdk4PGtWoFGsmOU0X0G3VUirLF38r32P1J2/xtX0d99Mi', '', NULL, '0775718162', NULL, 'Female', NULL, NULL, 'Earthy', NULL, 'Doe', 0, 2, 1, NULL, '2023-11-16 10:05:35', '2023-11-16 10:05:35'),
(117, '231204001', 'sd', 'sd', 'sd@gmail.com', '$2y$10$lNaJWqnMcRv9WJpGtfKugOfofPyspG4MnVejC6J3L4wrMGnQ0fwaK', NULL, NULL, '123654789', 'null', 'Male', 'null', 'null', 'sd', 'null', 'sd', 0, 2, 1, NULL, '2023-12-04 04:35:27', '2023-12-04 04:36:51');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `name`, `number_plate`, `model`, `color`, `type`, `disposed_to`, `created_at`, `updated_at`) VALUES
(2, 102, 'dffgd', 'fhgh', 'dfgdf', '', 'Commercial', 'Kawaalya - 075565 - 3443 - Child', '2023-10-30 07:54:56', '2023-11-08 09:24:51'),
(3, 106, 'Benz', 'UAB304Q', '1994', 'white', 'Personal', 'Jordan Franey - - MA - Child', '2023-11-14 06:59:07', '2023-11-14 10:52:24'),
(4, 106, 'Pajero', 'UAF237Y', '2000', 'Green', 'Commercial', NULL, '2023-11-14 07:02:02', '2023-11-14 07:02:02'),
(26, 106, 'df', 'sd4', 's', 'z', 'Personal', NULL, '2023-11-22 04:24:50', '2023-11-22 04:24:50'),
(28, 106, 'test', 'test', 'test', 'test', 'Personal', NULL, '2023-11-24 04:42:34', '2023-11-24 04:42:34'),
(29, 106, 'df', 'sd4', 's', 'z', 'Personal', NULL, '2023-11-24 04:43:42', '2023-11-24 04:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_dispositions`
--

CREATE TABLE `vehicle_dispositions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disposed_to` varchar(100) DEFAULT NULL,
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
(11, 106, 29, '1', 'all belongs to', 'Nailah Franey - - MA - Child', '2023-12-04 03:38:07', '2023-12-04 03:38:07');

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
(10, 51, 'mariam', '1234567890', 'mpala', '2023-12-14 03:25:17', '2023-12-14 03:25:17');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
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
-- AUTO_INCREMENT for table `bankaccount_dispositions`
--
ALTER TABLE `bankaccount_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `burial_detials`
--
ALTER TABLE `burial_detials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `creditors`
--
ALTER TABLE `creditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `executors`
--
ALTER TABLE `executors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `heirs`
--
ALTER TABLE `heirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `house_dispositions`
--
ALTER TABLE `house_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `land_dispositions`
--
ALTER TABLE `land_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `livestocks`
--
ALTER TABLE `livestocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `livestock_dispositions`
--
ALTER TABLE `livestock_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_properties`
--
ALTER TABLE `other_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `other_relatives`
--
ALTER TABLE `other_relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `property_dispositions`
--
ALTER TABLE `property_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_disposition_details`
--
ALTER TABLE `property_disposition_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `propety_types`
--
ALTER TABLE `propety_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `share_dispositions`
--
ALTER TABLE `share_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spouses`
--
ALTER TABLE `spouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vehicle_dispositions`
--
ALTER TABLE `vehicle_dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `witnesses`
--
ALTER TABLE `witnesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
