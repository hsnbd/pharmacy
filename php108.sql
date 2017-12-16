-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2017 at 08:47 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php108`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url_slug`, `created_at`, `updated_at`) VALUES
(1, 'Pain & Fever', 'pain-fever', NULL, NULL),
(2, 'Personal Care', 'personal-care', NULL, NULL),
(3, 'Hair Care', 'hair-care', NULL, NULL),
(4, 'General OTC', 'general-otc', NULL, NULL),
(5, 'Allergy & Sinus', 'allergy-sinus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countriesid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `usersid` int(10) UNSIGNED NOT NULL,
  `medicinesid` int(10) UNSIGNED NOT NULL,
  `comment` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `citiesid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generics`
--

CREATE TABLE `generics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generics`
--

INSERT INTO `generics` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Oxycodone', 'AHFS DI from the American Society of Health-System', NULL, NULL),
(2, 'Pantoprazole', ' Pharmacists\' (ASHP) is the most comprehensive source of', NULL, NULL),
(3, 'Prednisone', ' unbiased and authoritative drug information available to', NULL, NULL),
(4, 'Tramadol', ' health professionals today. A wholly independent staff of ', NULL, NULL),
(5, 'Trazodone', 'drug information pharmacists and other professional ', NULL, NULL),
(6, 'Viagra', 'editorial and analytical staff thoroughly research AHFS DI', NULL, NULL),
(7, 'Wellbutrin', ' content. Authors incorporate clinical research findings, ', NULL, NULL),
(8, 'Xanax', 'therapeutic guidelines, and Food and Drug Administration', NULL, NULL),
(9, 'Zoloft', ' (FDA) approved labeling to ensure that monographs include', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `least_order` smallint(6) NOT NULL,
  `sub_categoriesid` int(10) UNSIGNED NOT NULL,
  `unitsid` int(10) UNSIGNED NOT NULL,
  `genericsid` int(10) UNSIGNED NOT NULL,
  `powersid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `description`, `price`, `discount`, `stock`, `least_order`, `sub_categoriesid`, `unitsid`, `genericsid`, `powersid`, `created_at`, `updated_at`) VALUES
(1, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 'Clindamycin', 'Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 2, 2, 2, 2, 2, 2, NULL, '2017-11-15 02:23:08'),
(3, 'Clonazepam', 'unbiased and authoritative drug information available to', 456, 30, 3, 3, 3, 3, 3, 3, NULL, '2017-11-07 17:01:24'),
(4, 'Codeine', 'health professionals today. A wholly independent staff of', 23, 10, 4, 4, 4, 4, 4, 4, NULL, '2017-11-07 17:01:37'),
(5, 'Cyclobenzaprine', 'drug information pharmacists and other professional', 42, 20, 2, 2, 5, 5, 5, 5, NULL, '2017-11-15 02:23:25'),
(6, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 1, 1, 6, 6, 6, 6, NULL, NULL),
(7, 'Doxycycline', 'content. Authors incorporate clinical research findings,', 25, 10, 0, 2, 7, 1, 7, 1, NULL, '2017-11-15 02:24:03'),
(8, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 3, 3, 8, 2, 8, 2, NULL, NULL),
(9, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 4, 4, 9, 3, 9, 3, NULL, NULL),
(10, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 0, 1, 11, 5, 2, 5, NULL, NULL),
(11, 'Clonazepam', 'unbiased and authoritative drug information available to', 456, 30, 2, 2, 12, 6, 3, 6, NULL, '2017-11-15 03:34:05'),
(12, 'Codeine', 'health professionals today. A wholly independent staff of', 23, 10, 3, 3, 13, 1, 4, 1, NULL, '2017-11-15 03:34:42'),
(13, 'Cyclobenzaprine', 'drug information pharmacists and other professional', 42, 20, 4, 4, 14, 2, 5, 2, NULL, '2017-11-15 03:35:02'),
(14, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 15, 3, 6, 3, NULL, NULL),
(15, 'Doxycycline', 'content. Authors incorporate clinical research findings,', 25, 10, 0, 1, 16, 4, 7, 4, NULL, '2017-11-15 03:35:47'),
(16, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 2, 2, 17, 5, 8, 5, NULL, NULL),
(17, 'Hydrochlorothiazide', '(FDA) approved labeling to ensure that monographs include', 34, 30, 3, 3, 18, 6, 9, 6, NULL, '2017-11-15 03:36:11'),
(18, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 4, 4, 19, 1, 1, 1, NULL, NULL),
(19, 'Clindamycin', 'Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 0, 2, 20, 2, 2, 2, NULL, '2017-11-15 03:36:32'),
(20, 'Clonazepam', 'unbiased and authoritative drug information available to', 456, 30, 1, 1, 21, 3, 3, 3, NULL, '2017-11-15 03:36:42'),
(21, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 2, 2, 22, 4, 4, 4, NULL, NULL),
(22, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 3, 3, 23, 5, 5, 5, NULL, NULL),
(23, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 4, 4, 1, 6, 6, 6, NULL, NULL),
(24, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 2, 1, 7, 1, NULL, NULL),
(25, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 0, 1, 3, 2, 8, 2, NULL, NULL),
(26, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 2, 2, 4, 3, 9, 3, NULL, NULL),
(27, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 3, 3, 5, 4, 1, 4, NULL, NULL),
(28, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 4, 4, 6, 5, 2, 5, NULL, NULL),
(29, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 2, 2, 7, 6, 3, 6, NULL, NULL),
(30, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 1, 1, 8, 1, 4, 1, NULL, NULL),
(31, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 9, 2, 5, 2, NULL, NULL),
(32, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 3, 3, 10, 3, 6, 3, NULL, NULL),
(33, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 4, 4, 11, 4, 7, 4, NULL, NULL),
(34, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 2, 2, 12, 5, 8, 5, NULL, NULL),
(35, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 1, 1, 13, 6, 9, 6, NULL, NULL),
(36, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 0, 2, 14, 1, 1, 1, NULL, NULL),
(37, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 3, 3, 15, 2, 2, 2, NULL, NULL),
(38, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 4, 4, 16, 3, 3, 3, NULL, NULL),
(39, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 2, 2, 17, 4, 4, 4, NULL, NULL),
(40, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 1, 1, 18, 5, 5, 5, NULL, NULL),
(41, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 19, 6, 6, 6, NULL, NULL),
(42, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 3, 3, 20, 1, 7, 1, NULL, NULL),
(43, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 4, 4, 21, 2, 8, 2, NULL, NULL),
(44, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 2, 2, 22, 3, 9, 3, NULL, NULL),
(45, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 0, 1, 23, 4, 1, 4, NULL, NULL),
(46, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 2, 2, 1, 5, 2, 5, NULL, NULL),
(47, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 3, 3, 2, 6, 3, 6, NULL, NULL),
(48, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 4, 4, 3, 1, 4, 1, NULL, NULL),
(49, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 4, 2, 5, 2, NULL, NULL),
(50, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 1, 1, 5, 3, 6, 3, NULL, NULL),
(51, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 6, 4, 7, 4, NULL, NULL),
(52, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 0, 3, 7, 5, 8, 5, NULL, NULL),
(53, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 4, 4, 8, 6, 9, 6, NULL, NULL),
(54, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 2, 2, 9, 1, 1, 1, NULL, NULL),
(55, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 1, 1, 10, 2, 2, 2, NULL, NULL),
(56, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 2, 2, 11, 3, 3, 3, NULL, NULL),
(57, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 0, 3, 12, 4, 4, 4, NULL, NULL),
(58, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 4, 4, 13, 5, 5, 5, NULL, NULL),
(59, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 14, 6, 6, 6, NULL, NULL),
(60, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 1, 1, 15, 1, 7, 1, NULL, NULL),
(61, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 0, 2, 16, 2, 8, 2, NULL, NULL),
(62, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 3, 3, 17, 3, 9, 3, NULL, NULL),
(63, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 4, 4, 18, 4, 1, 4, NULL, NULL),
(64, 'Clindamycin', 'Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 2, 2, 19, 5, 2, 5, NULL, '2017-12-01 22:42:05'),
(65, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 0, 1, 20, 6, 3, 6, NULL, NULL),
(66, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 2, 2, 21, 1, 4, 1, NULL, NULL),
(67, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 3, 3, 22, 2, 5, 2, NULL, NULL),
(68, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 4, 4, 23, 3, 6, 3, NULL, NULL),
(69, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 1, 4, 7, 4, NULL, NULL),
(70, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 1, 1, 2, 5, 8, 5, NULL, NULL),
(71, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 2, 2, 3, 6, 9, 6, NULL, NULL),
(72, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 3, 3, 4, 1, 1, 1, NULL, NULL),
(73, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 4, 4, 5, 2, 2, 2, NULL, NULL),
(74, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 0, 2, 6, 3, 3, 3, NULL, NULL),
(75, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 1, 1, 7, 4, 4, 4, NULL, NULL),
(76, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 8, 5, 5, 5, NULL, NULL),
(77, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 3, 3, 9, 6, 6, 6, NULL, NULL),
(78, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 4, 4, 10, 1, 7, 1, NULL, NULL),
(79, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 0, 2, 11, 2, 8, 2, NULL, NULL),
(80, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 1, 1, 12, 3, 9, 3, NULL, NULL),
(81, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 2, 2, 13, 4, 1, 4, NULL, NULL),
(82, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 3, 3, 14, 5, 2, 5, NULL, NULL),
(83, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 4, 4, 15, 6, 3, 6, NULL, NULL),
(84, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 0, 2, 16, 1, 4, 1, NULL, NULL),
(85, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 1, 1, 17, 2, 5, 2, NULL, NULL),
(86, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 18, 3, 6, 3, NULL, NULL),
(87, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 3, 3, 19, 4, 7, 4, NULL, NULL),
(88, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 4, 4, 20, 5, 8, 5, NULL, NULL),
(89, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 2, 2, 21, 6, 9, 6, NULL, NULL),
(90, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 1, 1, 22, 1, 1, 1, NULL, NULL),
(91, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 0, 2, 23, 2, 2, 2, NULL, NULL),
(92, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 3, 3, 1, 3, 3, 3, NULL, NULL),
(93, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 4, 4, 2, 4, 4, 4, NULL, NULL),
(94, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 3, 5, 5, 5, NULL, NULL),
(95, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 1, 1, 4, 6, 6, 6, NULL, NULL),
(96, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 5, 1, 7, 1, NULL, NULL),
(97, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 3, 3, 6, 2, 8, 2, NULL, NULL),
(98, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 4, 4, 7, 3, 9, 3, NULL, NULL),
(99, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 2, 2, 8, 4, 1, 4, NULL, NULL),
(100, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 1, 1, 9, 5, 2, 5, NULL, NULL),
(101, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 2, 2, 10, 6, 3, 6, NULL, NULL),
(102, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 3, 3, 11, 1, 4, 1, NULL, NULL),
(103, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 4, 4, 12, 2, 5, 2, NULL, NULL),
(104, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 13, 3, 6, 3, NULL, NULL),
(105, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 1, 1, 14, 4, 7, 4, NULL, NULL),
(106, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 2, 2, 15, 5, 8, 5, NULL, NULL),
(107, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 0, 3, 16, 6, 9, 6, NULL, NULL),
(108, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 4, 4, 17, 1, 1, 1, NULL, NULL),
(109, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 2, 2, 18, 2, 2, 2, NULL, NULL),
(110, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 1, 1, 19, 3, 3, 3, NULL, NULL),
(111, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 2, 2, 20, 4, 4, 4, NULL, NULL),
(112, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 3, 3, 21, 5, 5, 5, NULL, NULL),
(113, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 4, 4, 22, 6, 6, 6, NULL, NULL),
(114, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 23, 1, 7, 1, NULL, NULL),
(115, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 1, 1, 1, 2, 8, 2, NULL, NULL),
(116, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 2, 2, 2, 3, 9, 3, NULL, NULL),
(117, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 3, 3, 3, 4, 1, 4, NULL, NULL),
(118, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 4, 4, 4, 5, 2, 5, NULL, NULL),
(119, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 2, 2, 5, 6, 3, 6, NULL, NULL),
(120, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 1, 1, 6, 1, 4, 1, NULL, NULL),
(121, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 7, 2, 5, 2, NULL, NULL),
(122, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 0, 3, 8, 3, 6, 3, NULL, NULL),
(123, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 4, 4, 9, 4, 7, 4, NULL, NULL),
(124, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 2, 2, 10, 5, 8, 5, NULL, NULL),
(125, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 1, 1, 11, 6, 9, 6, NULL, NULL),
(126, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 0, 2, 12, 1, 1, 1, NULL, NULL),
(127, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 3, 3, 13, 2, 2, 2, NULL, NULL),
(128, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 4, 4, 14, 3, 3, 3, NULL, NULL),
(129, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 0, 2, 15, 4, 4, 4, NULL, NULL),
(130, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 1, 1, 16, 5, 5, 5, NULL, NULL),
(131, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 2, 2, 17, 6, 6, 6, NULL, NULL),
(132, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 3, 3, 18, 1, 7, 1, NULL, NULL),
(133, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 4, 4, 19, 2, 8, 2, NULL, NULL),
(134, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 0, 2, 20, 3, 9, 3, NULL, NULL),
(135, 'Citalopram', 'AHFS DI from the American Society of Health-System', 20, 10, 1, 1, 21, 4, 1, 4, NULL, NULL),
(136, 'Clindamycin', ' Pharmacists\' (ASHP) is the most comprehensive source of', 34, 20, 2, 2, 22, 5, 2, 5, NULL, NULL),
(137, 'Clonazepam', ' unbiased and authoritative drug information available to', 456, 30, 3, 3, 23, 6, 3, 6, NULL, NULL),
(138, 'Codeine', ' health professionals today. A wholly independent staff of ', 23, 10, 4, 4, 1, 1, 4, 1, NULL, NULL),
(139, 'Cyclobenzaprine', 'drug information pharmacists and other professional ', 42, 20, 2, 2, 2, 2, 5, 2, NULL, NULL),
(140, 'Cymbalta', 'editorial and analytical staff thoroughly research AHFS DI', 57, 30, 1, 1, 3, 3, 6, 3, NULL, NULL),
(141, 'Doxycycline', ' content. Authors incorporate clinical research findings, ', 25, 10, 2, 2, 4, 4, 7, 4, NULL, NULL),
(142, 'Gabapentin', 'therapeutic guidelines, and Food and Drug Administration', 756, 20, 3, 3, 5, 5, 8, 5, NULL, NULL),
(143, 'Hydrochlorothiazide', ' (FDA) approved labeling to ensure that monographs include', 34, 30, 4, 4, 6, 6, 9, 6, NULL, NULL),
(144, 'Napa', 'Its for illness', 20, 5, 10, 2, 10, 2, 2, 2, '2017-11-27 03:49:08', '2017-11-27 03:49:08'),
(145, 'Extra', 'Napa is good for fever.', 2, 1, 10, 5, 2, 1, 1, 1, '2017-12-01 22:48:25', '2017-12-01 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_10_162417_create_users_table', 1),
(2, '2017_10_10_162418_create_password_resets_table', 1),
(3, '2017_10_10_162419_create_categories_table', 1),
(4, '2017_10_10_162420_create_countries_table', 1),
(5, '2017_10_10_162421_create_units_table', 1),
(6, '2017_10_10_162422_create_generics_table', 1),
(7, '2017_10_10_162423_create_powers_table', 1),
(8, '2017_10_10_162424_create_cities_table', 1),
(9, '2017_10_10_162425_create_sub_categories_table', 1),
(10, '2017_10_10_162426_create_customers_table', 1),
(11, '2017_10_10_162427_create_medicines_table', 1),
(13, '2017_10_10_162429_create_shipping_table', 1),
(14, '2017_10_10_162430_create_saledetails_table', 1),
(15, '2017_12_15_145836_create_ratings_table', 1),
(16, '2017_12_15_172749_create_watch_lists_table', 1),
(17, '2017_10_10_162428_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `powers`
--

CREATE TABLE `powers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `powers`
--

INSERT INTO `powers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '10 mg', NULL, NULL),
(2, '20 mg', NULL, NULL),
(3, '50 mg', NULL, NULL),
(4, '100 mg', NULL, NULL),
(5, '500 mg', NULL, NULL),
(6, '1000 mg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `usersid` int(10) UNSIGNED NOT NULL,
  `medicinesid` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `usersid`, `medicinesid`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 35, 2, '2017-12-15 12:36:22', '2017-12-15 13:29:19'),
(3, 1, 35, 5, '2017-12-15 12:48:47', '2017-12-15 13:12:27'),
(10, 1, 30, 5, '2017-12-15 13:52:58', '2017-12-15 13:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

CREATE TABLE `saledetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicinesid` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `shippingid` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `usersid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `url_slug`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 'Advil & Ibuprofen', 'advil-ibuprofen', 1, NULL, NULL),
(2, 'Aleve & Naproxen', 'aleve-naproxen', 1, NULL, NULL),
(3, 'Aspirin', 'aspirin', 1, NULL, NULL),
(4, 'Tylenol & Acetaminophen', 'tylenol-acetaminophen', 1, NULL, NULL),
(5, 'Deodorants', 'deodorants', 2, NULL, NULL),
(6, 'Sexual Health', 'sexual-health', 2, NULL, NULL),
(7, 'Shaving', 'shaving', 2, NULL, NULL),
(8, 'Skin Care', 'skin-care', 2, NULL, NULL),
(9, 'Women\'s Health', 'womens-health', 2, NULL, NULL),
(10, 'Hair Supplements', 'hair-supplements', 3, NULL, NULL),
(11, 'Rogaine & Minoxidil', 'rogaine-minoxidil', 3, NULL, NULL),
(12, 'Shampoo & Conditioner', 'shampoo-conditioner', 3, NULL, NULL),
(13, 'Cough, Cold & Flu', 'cough-cold-flu', 4, NULL, NULL),
(14, 'Creams & Ointments', 'creams-ointments', 4, NULL, NULL),
(15, 'Eye Care', 'eye-care', 4, NULL, NULL),
(16, 'Sleep Aids', 'sleep-aids', 4, NULL, NULL),
(17, 'Stop Smoking', 'stop-smoking', 4, NULL, NULL),
(18, 'Travel Sickness', 'travel-sickness', 4, NULL, NULL),
(19, 'Allegra & Fexofenadine', 'allegra-fexofenadine', 5, NULL, NULL),
(20, 'Benadryl & Diphenhydramine', 'benadryl-diphenhydramine', 5, NULL, NULL),
(21, 'Claritin & Loratadine', 'claritin-loratadine', 5, NULL, NULL),
(22, 'Nasal Decongestants', 'nasal-decongestants', 5, NULL, NULL),
(23, 'Zyrtec & Cetirizine HCL', 'zyrtec-cetirizine-hcl', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tablet', NULL, NULL),
(2, 'pill', NULL, NULL),
(3, 'capsule', NULL, NULL),
(4, 'liter', NULL, NULL),
(5, 'kg', NULL, NULL),
(6, 'mg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', 'hasan@gmail.com', '$2y$10$sbqbog.dt6t0Oxyee1MaG.k2Gyc5dDhVhTMf60oG6sMHxkkRiHvA.', 'JkSU5fOy5grQNM0n6BdDleuAwfJLA6kT87Go6z8NSDGsCURkJFfAcY57SoQj', NULL, NULL),
(2, 'new', 'new@gmail.com', '$2y$10$HRjDY8n/1hLOxrmJB74FGOdnJIztA/VfaTNf9rR5mOO7YVBYPHVeW', 'ohdA3lsnRsZayQz3tAGrn92x9yZXAI254BkJo2r31tbAWrLZrGPPwYj1TEMl', '2017-10-19 09:10:16', '2017-10-19 09:10:16'),
(3, 'Sujon', 'sujon@gmail.com', '$2y$10$5Oex4cHK.MgIePMWyOseL.V/d0PDEaOQu4EroJ/HBQ8.Ldut0WUXK', 'LCiVfCiJLxOOpzr5nkQHSmXg0bZKjyz0LZM6MTKCkROkghmddtQ6iicDjF4n', '2017-10-21 03:06:17', '2017-10-21 03:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `watch_lists`
--

CREATE TABLE `watch_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `usersid` int(10) UNSIGNED NOT NULL,
  `medicinesid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watch_lists`
--

INSERT INTO `watch_lists` (`id`, `usersid`, `medicinesid`, `created_at`, `updated_at`) VALUES
(1, 1, 18, NULL, NULL),
(2, 1, 30, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_countriesid_foreign` (`countriesid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_usersid_foreign` (`usersid`),
  ADD KEY `comments_medicinesid_foreign` (`medicinesid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_citiesid_foreign` (`citiesid`);

--
-- Indexes for table `generics`
--
ALTER TABLE `generics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_sub_categoriesid_foreign` (`sub_categoriesid`),
  ADD KEY `medicines_unitsid_foreign` (`unitsid`),
  ADD KEY `medicines_genericsid_foreign` (`genericsid`),
  ADD KEY `medicines_powersid_foreign` (`powersid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `powers`
--
ALTER TABLE `powers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_usersid_foreign` (`usersid`),
  ADD KEY `ratings_medicinesid_foreign` (`medicinesid`);

--
-- Indexes for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saledetails_medicinesid_foreign` (`medicinesid`),
  ADD KEY `saledetails_shippingid_foreign` (`shippingid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_usersid_foreign` (`usersid`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_categories_id_foreign` (`categories_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watch_lists`
--
ALTER TABLE `watch_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watch_lists_usersid_foreign` (`usersid`),
  ADD KEY `watch_lists_medicinesid_foreign` (`medicinesid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generics`
--
ALTER TABLE `generics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `powers`
--
ALTER TABLE `powers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `watch_lists`
--
ALTER TABLE `watch_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_countriesid_foreign` FOREIGN KEY (`countriesid`) REFERENCES `countries` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_medicinesid_foreign` FOREIGN KEY (`medicinesid`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `comments_usersid_foreign` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_citiesid_foreign` FOREIGN KEY (`citiesid`) REFERENCES `cities` (`id`);

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_genericsid_foreign` FOREIGN KEY (`genericsid`) REFERENCES `generics` (`id`),
  ADD CONSTRAINT `medicines_powersid_foreign` FOREIGN KEY (`powersid`) REFERENCES `powers` (`id`),
  ADD CONSTRAINT `medicines_sub_categoriesid_foreign` FOREIGN KEY (`sub_categoriesid`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `medicines_unitsid_foreign` FOREIGN KEY (`unitsid`) REFERENCES `units` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_medicinesid_foreign` FOREIGN KEY (`medicinesid`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `ratings_usersid_foreign` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `saledetails_medicinesid_foreign` FOREIGN KEY (`medicinesid`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `saledetails_shippingid_foreign` FOREIGN KEY (`shippingid`) REFERENCES `shipping` (`id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_usersid_foreign` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `watch_lists`
--
ALTER TABLE `watch_lists`
  ADD CONSTRAINT `watch_lists_medicinesid_foreign` FOREIGN KEY (`medicinesid`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `watch_lists_usersid_foreign` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
