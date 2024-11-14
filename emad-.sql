-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 08:09 PM
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
-- Database: `emad-`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `title_en` varchar(191) NOT NULL,
  `titile_ar` varchar(191) NOT NULL,
  `description_en` longtext NOT NULL,
  `description_ar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `photo`, `title_en`, `titile_ar`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'abouts/s0udCo4dDkX0pobwVGZ44mxoOhrv03UU28t7PPxi.jpg', 'Welcome to Emad Bakeries', 'Welcome to Emad Bakeries', '<p>Since our opening, Emad Bakeries focuses on creating the highest standards in producing breads and pastries and as a result, won the hearts of faithful customers in Jeddah. Emad Bakeries is a leader in the baking industry, known for its leading brand, innovative products, freshness and quality.</p>\r\n\r\n<p>Due to the tremendous success in Jeddah, we are planning a vast expansion across the Kingdom.</p>\r\n\r\n<p>Emad Bakeries has constructive ideas and ambitious plans. We are committed to meeting high demand with only the highest quality, and because of our innovative baking methods, now anyone can experience our fresh-baked bread. We offer a variety of selling options for restaurants, bakeries and super markets.</p>', '<p>Since our opening, Emad Bakeries focuses on creating the highest standards in producing breads and pastries and as a result, won the hearts of faithful customers in Jeddah. Emad Bakeries is a leader in the baking industry, known for its leading brand, innovative products, freshness and quality.</p>\r\n\r\n<p>Due to the tremendous success in Jeddah, we are planning a vast expansion across the Kingdom.</p>\r\n\r\n<p>Emad Bakeries has constructive ideas and ambitious plans. We are committed to meeting high demand with only the highest quality, and because of our innovative baking methods, now anyone can experience our fresh-baked bread. We offer a variety of selling options for restaurants, bakeries and super markets.</p>', '2024-10-27 12:40:48', '2024-10-27 12:40:48'),
(2, 'abouts/rvtPz6YJhHDN6Wd3WPtrz6uCntqSmso9eeCF0oTm.jpg', '50 YEARS OF EXPERIENCE', '50 YEARS OF EXPERIENCE', '<p>Since our opening, Emad Bakeries focuses on creating the highest standards in producing breads and pastries and as a result, won the hearts of faithful customers in Jeddah. Emad Bakeries is a leader in the baking industry, known for its leading brand, innovative products, freshness and quality.</p>\r\n\r\n<p>Due to the tremendous success in Jeddah, we are planning a vast expansion across the Kingdom.</p>\r\n\r\n<p>Emad Bakeries has constructive ideas and ambitious plans. We are committed to meeting high demand with only the highest quality, and because of our innovative baking methods, now anyone can experience our fresh-baked bread. We offer a variety of selling options for restaurants, bakeries and super markets.</p>', '<p>Since our opening, Emad Bakeries focuses on creating the highest standards in producing breads and pastries and as a result, won the hearts of faithful customers in Jeddah. Emad Bakeries is a leader in the baking industry, known for its leading brand, innovative products, freshness and quality.</p>\r\n\r\n<p>Due to the tremendous success in Jeddah, we are planning a vast expansion across the Kingdom.</p>\r\n\r\n<p>Emad Bakeries has constructive ideas and ambitious plans. We are committed to meeting high demand with only the highest quality, and because of our innovative baking methods, now anyone can experience our fresh-baked bread. We offer a variety of selling options for restaurants, bakeries and super markets.</p>', '2024-10-27 12:41:28', '2024-10-27 12:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo_profile` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo_profile`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'test@test.com', NULL, '$2y$10$lXxtD3hKQV3LKnDWJjCmBOcdEAr5dVCgmlxrfrFZ2FUxBzpHhoDeC', 1, NULL, '2024-10-27 05:41:22', '2024-10-27 05:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `admin_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Permission - Admin', '2024-10-27 05:41:22', '2024-10-27 05:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_roles`
--

CREATE TABLE `admin_group_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `admin_groups_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show` enum('yes','no') NOT NULL DEFAULT 'no',
  `add` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit` enum('yes','no') NOT NULL DEFAULT 'no',
  `delete` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_group_roles`
--

INSERT INTO `admin_group_roles` (`id`, `name`, `admin_groups_id`, `show`, `add`, `edit`, `delete`, `created_at`, `updated_at`) VALUES
(4, 'group', 1, 'no', 'no', 'no', 'no', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(5, 'settings', 1, 'yes', 'no', 'yes', 'no', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(6, 'admins', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(7, 'admingroups', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(8, 'sendemails', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(9, 'home', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(10, 'homepage', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(11, 'homepagemain', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(12, 'clientphoto', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(13, 'servedindustries', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(14, 'clientsays', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(15, 'clientphotos', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(16, 'ingredients', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(17, 'products', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(18, 'categories', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(19, 'orders', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(20, 'blogs', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(21, 'galleries', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(22, 'abouts', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(23, 'branches', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(24, 'careers', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(25, 'partnerstype', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(26, 'distributors', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(27, 'partners', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(28, 'banners', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(29, 'distributorsbanners', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(30, 'distributorsdata', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(31, 'footersocials', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(32, 'admin', 1, 'no', 'no', 'no', 'no', '2024-10-27 05:44:45', '2024-10-27 05:44:45'),
(33, 'be-partner', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-28 04:05:07', '2024-10-28 04:05:07'),
(34, 'beppartners', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-28 04:05:53', '2024-10-28 04:05:53'),
(35, 'bepartners', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-28 04:06:28', '2024-10-28 04:06:28'),
(36, 'pcpbs', 1, 'yes', 'yes', 'yes', 'yes', '2024-10-29 06:18:39', '2024-10-29 06:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `title_en` varchar(191) DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `action_url` varchar(191) DEFAULT NULL,
  `title_ar` varchar(191) NOT NULL,
  `description_ar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `photo`, `title_en`, `description_en`, `action_url`, `title_ar`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'banners/exQCACSCThjBtVAqcoZh6RwIaH1qRE1HahMM4SjA.jpg', 'test', 'test description', 'http://127.0.0.1:8000/', 'test ', 'test discription', '2024-10-29 06:41:43', '2024-10-29 06:58:28'),
(2, 'banners/gCZi1qHc37xHJgtnaK11N4TfZlGv9l6DAalyHeWZ.jpg', 'test', 'test discription', 'http://127.0.0.1:8000/', 'test ', 'test discription', '2024-10-29 06:42:06', '2024-10-29 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `be_partners`
--

CREATE TABLE `be_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `description_en` longtext NOT NULL,
  `description_ar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `be_partners`
--

INSERT INTO `be_partners` (`id`, `photo`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'bepartners/g0MzusP1wlRcZs3wzPk8nSUbMTcAr6NHZWM6J0dO.jpg', '<p>The first step to securing your online business is to have the right cybersecurity policies. These include having complex passwords, role-based access, and high levels of data- encryption. So, if you want to start at the earliest, follow these tips to keep hacking attempts at bay!</p>\r\n\r\n<h4>Dolor sit amet consectetur</h4>\r\n\r\n<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>', '<p>The first step to securing your online business is to have the right cybersecurity policies. These include having complex passwords, role-based access, and high levels of data- encryption. So, if you want to start at the earliest, follow these tips to keep hacking attempts at bay!</p>\r\n\r\n<h4>Dolor sit amet consectetur</h4>\r\n\r\n<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>', '2024-10-28 04:20:25', '2024-10-28 04:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `description_ar` longtext NOT NULL,
  `description_en` text NOT NULL,
  `product_url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name_ar`, `name_en`, `category_id`, `photo`, `description_ar`, `description_en`, `product_url`, `created_at`, `updated_at`) VALUES
(1, 'test ar', 'test en', 1, 'blogs/UMmbQhTdVTcrfAZgrQ3FKJPHnaeOxeCAPUc2N96s.jpg', 'The first step to securing your online business is to have the right cybersecurity policies. These include having complex passwords, role-based access, and high levels of data- encryption. So, if you want to start at the earliest, follow these tips to keep hacking attempts at bay!</p>\n\n<h4>1. Dolor sit amet consectetur</h4>\n\n<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>\n\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat cumque deserunt! Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit!</p>\n\n<h4>2. Esse quod minima corrupti consequatur</h4>\n\n<p>Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa.</p>\n\n<p>Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam</p>\n\n<p>Sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit!', 'The first step to securing your online business is to have the right cybersecurity policies. These include having complex passwords, role-based access, and high levels of data- encryption. So, if you want to start at the earliest, follow these tips to keep hacking attempts at bay!</p>\n\n<h4>1. Dolor sit amet consectetur</h4>\n\n<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>\n\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat cumque deserunt! Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit!</p>\n\n<h4>2. Esse quod minima corrupti consequatur</h4>\n\n<p>Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa.</p>\n\n<p>Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam</p>\n\n<p>Sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit', 'http://127.0.0.1:8000/admin/orders/create', '2024-10-27 14:19:36', '2024-10-27 14:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `address_ar` varchar(191) NOT NULL,
  `address_en` varchar(191) NOT NULL,
  `call_us` varchar(191) NOT NULL,
  `url_location` text NOT NULL,
  `open_hours` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name_ar`, `name_en`, `address_ar`, `address_en`, `call_us`, `url_location`, `open_hours`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'Jeddah, King Abdulaziz Street next to King\'s Mosque', 'Jeddah, King Abdulaziz Street next to King\'s Mosque', '99999999999', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.519515719114!2d36.5566637!3d28.433751699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15a9b27a6788d58b%3A0xc458bd1d9205db68!2zS0FBQzI5NzXYjCAyOTc1INmF2LnZiNiwINio2YYg2LnZhdix2YjYjCA3NTk32Iwg2K3ZiiDYp9mE2YXYsdmI2Kwg2KfZhNir2KfZhtmK2Iwg2KrYqNmI2YMgNDczMTU!5e0!3m2!1sar!2ssa!4v1730030715702!5m2!1sar!2ssa\"', '9999999999', '2024-10-27 09:01:04', '2024-10-27 09:36:25'),
(2, 'day', 'day', 'yemen-sanaa', 'bytboss', '99999999999', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.519515719114!2d36.5566637!3d28.433751699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15a9b27a6788d58b%3A0xc458bd1d9205db68!2zS0FBQzI5NzXYjCAyOTc1INmF2LnZiNiwINio2YYg2LnZhdix2YjYjCA3NTk32Iwg2K3ZiiDYp9mE2YXYsdmI2Kwg2KfZhNir2KfZhtmK2Iwg2KrYqNmI2YMgNDczMTU!5e0!3m2!1sar!2ssa!4v1730030715702!5m2!1sar!2ssa\"', '9999999999', '2024-10-31 09:45:38', '2024-10-31 09:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Full_Name` varchar(191) NOT NULL,
  `Nationality` varchar(191) NOT NULL,
  `Occupation` varchar(191) DEFAULT NULL,
  `Current_Location` varchar(191) DEFAULT NULL,
  `Age` varchar(191) DEFAULT NULL,
  `Mobile_Number` varchar(191) DEFAULT NULL,
  `Email` varchar(191) DEFAULT NULL,
  `Landline_Number` varchar(191) DEFAULT NULL,
  `Occupation_Interest` varchar(191) DEFAULT NULL,
  `attach_cv` varchar(191) NOT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `description_en` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `photo`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 'test ar', 'test en', 'categories/GWd54Avab5aa8a9JT9o6FMCbxJtLzkRg985HIVdI.jpg', '<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat cumque deserunt! Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit!</p>', '<p>autem beatae molestias suscipit facilis porro, deleniti dignissimos dolorum, libero placeat sequi voluptatem laudantium aliquid et repellat ipsam aperiam similique consectetur totam deserunt quod ut! Ex, inventore impedit. Natus aliquid debitis corporis. A iure magni voluptate. Eveniet ipsam minus cum repellat dignissimos obcaecati, vero ad ratione expedita non tempore ipsa voluptate ullam molestias nesciunt magnam accusantium delectus vel voluptatum hic facere. Unde velit sed ipsum dolores laudantium sit quos sint?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat cumque deserunt! Dolorum obcaecati fugit tenetur voluptates eligendi eum omnis officia consectetur veniam cupiditate aliquid rerum in sint incidunt dolorem saepe earum, animi ipsa, voluptatum mollitia, ex ab a distinctio. Minima iure nulla repellat deserunt architecto, blanditiis corrupti voluptates iusto accusamus atque voluptatem officia eaque repellendus non omnis odio sunt maiores illum repudiandae quo inventore numquam at. Esse quod minima corrupti consequatur reprehenderit dolores, commodi, sunt quis illum distinctio, tempora explicabo facilis magni doloremque consequuntur culpa. Obcaecati, eius minus magni rerum earum laboriosam, eum officiis voluptatum neque assumenda in odit!</p>', '2024-10-27 13:48:09', '2024-10-27 13:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `client_photos`
--

CREATE TABLE `client_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_photo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_saies`
--

CREATE TABLE `client_saies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `titile` varchar(191) NOT NULL,
  `description_ar` longtext NOT NULL,
  `description_en` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_saies`
--

INSERT INTO `client_saies` (`id`, `photo`, `name`, `titile`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 'clientsays/DwaLJUPsEWTg7iz4r0O1TQqmSJNma0EkTVuFclnG.jpg', 'bassil', 'test', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '2024-10-29 06:15:21', '2024-10-29 06:15:21'),
(2, 'clientsays/fIt55f1xV5Va2A0MXPK7za4HDIg73AriCanoToDv.jpg', 'bassil', 'test', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '2024-10-29 06:15:36', '2024-10-29 06:15:36'),
(3, 'clientsays/SHXGBSIphfAu2xcn8YCHkNAQlgtLcAgeQBcCnoTX.jpg', 'bassil', 'test', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', '2024-10-29 06:15:51', '2024-10-29 06:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `client_says`
--

CREATE TABLE `client_says` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `titile` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'distributors/17PprYZEWAyJMQMMHUyZCqESbSdAn6ekCQk5et87.jpg', '2024-10-29 06:08:35', '2024-10-29 06:08:35'),
(2, 'distributors/2zw4RclerNN0A9j8gx5wXQeRZB45RVbqEU8QEFoJ.jpg', '2024-10-29 06:08:50', '2024-10-29 06:08:50'),
(3, 'distributors/Njh3qMXlDsYtChaEyBOaGZg25fc88gR4DASfBS5D.jpg', '2024-10-29 06:08:57', '2024-10-29 06:08:57'),
(4, 'distributors/zSTEw6VcXVB1ApresppuJ4uyDR7TgBNHoMhztqUd.jpg', '2024-10-29 06:09:01', '2024-10-29 06:09:01'),
(5, 'distributors/SPvT6EndwO8cXHtogaq51YjYNM12LCfmEWqZ1tVO.jpg', '2024-10-29 06:09:06', '2024-10-29 06:09:06'),
(6, 'distributors/52KdPI66sH7Drz4B6PlnD615htJoQp5yeMfZRybh.jpg', '2024-10-29 06:09:10', '2024-10-29 06:09:10'),
(7, 'distributors/AuvlaYqlL71biVLQmeY21h9uvgYqQ5JAivMNAONJ.jpg', '2024-10-29 06:09:14', '2024-10-29 06:09:14'),
(8, 'distributors/76YhD7a5O7FMNX4KnfwRUW4oma542g88x5HFK6td.jpg', '2024-10-29 06:09:18', '2024-10-29 06:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `distributors_banners`
--

CREATE TABLE `distributors_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `action_url` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `describtion` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distributors_datas`
--

CREATE TABLE `distributors_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `full_path` varchar(191) NOT NULL,
  `type_file` varchar(191) NOT NULL,
  `type_id` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `ext` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `size` varchar(191) NOT NULL,
  `size_bytes` bigint(20) NOT NULL,
  `mimtype` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footersocials`
--

CREATE TABLE `footersocials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footersocials`
--

INSERT INTO `footersocials` (`id`, `photo`, `url`, `created_at`, `updated_at`) VALUES
(13, 'footersocials/7UzyNCTQSAS0mfsuh896vCBd2EZkyuYeBOzf0wCr.svg', 'test', '2024-10-27 07:00:17', '2024-10-27 07:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) NOT NULL,
  `Address` varchar(191) NOT NULL,
  `category` enum('1','2','3') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `photo`, `Address`, `category`, `created_at`, `updated_at`) VALUES
(1, 'galleries/H6mjTp1T4DxHCGRt2H7ecdbcJ5Mz41AwoSPSp4Ki.jpg', 'test', '1', '2024-10-27 10:22:04', '2024-10-27 10:22:04'),
(2, 'galleries/h8AePtlCUrqG0NOLPew1wlV530OmTXhMQSYlEEeV.jpg', 'test', '2', '2024-10-27 10:22:32', '2024-10-27 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_title_ar` varchar(191) NOT NULL,
  `description_ar` longtext NOT NULL,
  `second_title_ar` varchar(191) NOT NULL,
  `YouTupe_url` varchar(191) DEFAULT NULL,
  `workers` varchar(191) NOT NULL,
  `certificates` bigint(20) NOT NULL,
  `clients` bigint(20) NOT NULL,
  `first_title_en` varchar(191) NOT NULL,
  `description_en` longtext NOT NULL,
  `second_title_en` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Allergens_ar` varchar(191) DEFAULT NULL,
  `Allergens_en` varchar(191) DEFAULT NULL,
  `Calories_per_serving_ar` varchar(191) DEFAULT NULL,
  `Calories_per_serving_en` varchar(191) DEFAULT NULL,
  `Barcode` varchar(191) NOT NULL,
  `Size` varchar(191) DEFAULT NULL,
  `Packing_ar` varchar(191) DEFAULT NULL,
  `Packing_en` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `Allergens_ar`, `Allergens_en`, `Calories_per_serving_ar`, `Calories_per_serving_en`, `Barcode`, `Size`, `Packing_ar`, `Packing_en`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2024-10-28 14:57:03', '2024-10-28 14:57:03'),
(2, 'test', 'test', 'test', 'test', 'test', NULL, 'test', 'test', '2024-10-28 14:58:34', '2024-10-28 14:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_17_094109_create_admins_table', 1),
(5, '2021_02_18_102130_create_files_table', 1),
(6, '2021_02_19_985759_create_settings_table', 1),
(7, '2021_03_22_134182_create_admin_groups_table', 1),
(8, '2021_03_22_193126_create_admin_group_roles_table', 1),
(9, '2023_9_14_081844_create_ingredients_table', 1),
(10, '2023_9_2_2220_create_categories_table', 1),
(11, '2024_09_09_075551_create_subscriptions_table', 1),
(12, '2024_09_09_081012_create_jobs_table', 1),
(13, '2024_09_09_225295_create_send_emails_table', 1),
(14, '2024_09_14_371904_create_client_says_table', 1),
(15, '2024_09_14_452397_create_served_industries_table', 1),
(16, '2024_09_14_47549_create_home_pages_table', 1),
(17, '2024_09_14_61752_create_products_table', 1),
(18, '2024_09_14_813748_create_client_saies_table', 1),
(19, '2024_09_14_824911_create_client_photos_table', 1),
(20, '2024_09_15_082816_product_ingredient', 1),
(21, '2024_09_15_518197_create_orders_table', 1),
(22, '2024_09_15_780042_create_partner_types_table', 1),
(23, '2024_09_16_421557_create_galleries_table', 1),
(24, '2024_09_16_481767_create_careers_table', 1),
(25, '2024_09_16_532317_create_abouts_table', 1),
(26, '2024_09_16_5351_create_branches_table', 1),
(27, '2024_09_16_708747_create_distributors_table', 1),
(28, '2024_10_03_350107_create_distributors_datas_table', 1),
(29, '2024_10_03_587037_create_distributors_banners_table', 1),
(30, '2024_10_03_636818_create_blogs_table', 1),
(31, '2024_10_03_917479_create_banners_table', 1),
(32, '2024_10_05_919196_create_footersocials_table', 1),
(33, '2024_10_17_954896_create_partners_table', 1),
(34, '2024_10_28_42919_create_be_partners_table', 2),
(36, '2024_10_29_983077_create_orders_table', 3),
(37, '2024_10_29_204124_create_pcpbs_table', 4),
(39, '2024_10_29_953106_create_banners_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_url` varchar(191) NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `contact_email` varchar(191) NOT NULL,
  `message` longtext DEFAULT NULL,
  `mobile` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_url`, `full_name`, `contact_email`, `message`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'hu', '0782513003', '2024-10-29 05:52:48', '2024-10-29 05:52:48'),
(2, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'hu', '0782513003', '2024-10-29 05:53:20', '2024-10-29 05:53:20'),
(3, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'sss', '0782513003', '2024-10-29 05:55:35', '2024-10-29 05:55:35'),
(4, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'ss', '0782513003', '2024-10-29 05:57:19', '2024-10-29 05:57:19'),
(5, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'ss', '0782513003', '2024-10-29 05:58:48', '2024-10-29 05:58:48'),
(6, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'سسس', '0782513003', '2024-10-29 11:36:48', '2024-10-29 11:36:48'),
(7, 'http://127.0.0.1:8000/product-details/1', 'Bassil Ali', 'baselali33@gmail.com', 'ssss', '0782513003', '2024-11-04 02:44:37', '2024-11-04 02:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_type` varchar(191) NOT NULL,
  `business_name` varchar(191) NOT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email_address` varchar(191) DEFAULT NULL,
  `message` longtext NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partner_type`, `business_name`, `phone_number`, `email_address`, `message`, `file`, `created_at`, `updated_at`) VALUES
(2, 'ddd', 'dsf', '0782513003', 'baselali33@gmail.com', '<p>zx</p>', 'partners/gyO4gRWgQCCkzC8CYxdIElDFspPClMOWsZW9EFL8.txt', '2024-10-28 06:19:09', '2024-10-28 06:19:09'),
(3, 'ddd', 'dsf', '0782513003', 'baselali33@gmail.com', '<p>sss</p>', 'partners/XBDPzINZjkinSLxQra5fYhV5bwKcQgqNbvPdW3HJ.txt', '2024-10-28 06:21:31', '2024-10-28 06:21:31'),
(4, 'test en', 'dsf', '0782513003', 'baselali33@gmail.com', 'as', '', '2024-10-28 06:23:42', '2024-10-28 06:23:42'),
(5, 'test en', 'as', '0782513003', 'baselali33@gmail.com', 'as', 'C:\\xampp\\tmp\\phpAB19.tmp', '2024-10-28 06:30:20', '2024-10-28 06:30:20'),
(6, 'test en', 'dsf', '0782513003', 'baselali33@gmail.com', 'zzz', 'C:\\xampp\\tmp\\phpB91A.tmp', '2024-10-28 06:32:35', '2024-10-28 06:32:35'),
(7, 'test en', 'ascc', '0782513003', 'baselali33@gmail.com', 'aadsc', 'C:\\xampp\\tmp\\php2EC.tmp', '2024-10-28 06:35:05', '2024-10-28 06:35:05'),
(8, 'ssss', 'dsf', '0782513003', 'baselali33@gmail.com', '<p>zz</p>', 'partners/ZCZRd55gJPZEZPBrM2K1r38OgnfIjNZ2WPcPOZwx.pdf', '2024-10-28 06:40:32', '2024-10-28 06:40:32'),
(9, 'test en', 'as', '0782513003', 'baselali33@gmail.com', 'rdf', 'C:\\xampp\\tmp\\phpB181.tmp', '2024-10-28 06:42:23', '2024-10-28 06:42:23'),
(10, 'test en', 'as', '0782513003', 'baselali33@gmail.com', 'rdf', 'C:\\xampp\\tmp\\phpB5ED.tmp', '2024-10-28 06:44:35', '2024-10-28 06:44:35'),
(11, 'test en', 'as', '0782513003', 'baselali33@gmail.com', 'rdf', 'C:\\xampp\\tmp\\php46EB.tmp', '2024-10-28 06:47:23', '2024-10-28 06:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `partner_types`
--

CREATE TABLE `partner_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_types`
--

INSERT INTO `partner_types` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'test ar', 'test en', '2024-10-28 04:55:51', '2024-10-28 04:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcpbs`
--

CREATE TABLE `pcpbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Partner` varchar(191) NOT NULL,
  `Certificates` varchar(191) NOT NULL,
  `Products` varchar(191) NOT NULL,
  `Branches` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcpbs`
--

INSERT INTO `pcpbs` (`id`, `Partner`, `Certificates`, `Products`, `Branches`, `created_at`, `updated_at`) VALUES
(1, '76', '14', '123', '5', '2024-10-29 06:19:36', '2024-10-29 06:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `title_ar` varchar(191) NOT NULL,
  `title_en` varchar(191) NOT NULL,
  `main_photo` varchar(191) NOT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `price` varchar(191) NOT NULL,
  `number_of_calories` varchar(191) DEFAULT NULL,
  `description_ar` longtext NOT NULL,
  `description_en` longtext NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name_ar`, `name_en`, `title_ar`, `title_en`, `main_photo`, `photos`, `price`, `number_of_calories`, `description_ar`, `description_en`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'products/lBrMlyfBxAKQNmEHuLtH2Lv2mmT1RD3Zo0480m9e.jpg', '[\"products\\/5ai2c3Vktzs6jgMc39eYeEGMJiAjVqzXTqGaXX0n.jpg\",\"products\\/oPcU8hZxloFhSBnUhxrhRPOoNBqX2VGVyoK1MaNG.jpg\",\"products\\/X1h8jFgKZSotMZfwLfd71cbELClCFJFd2puEwmXf.jpg\"]', '12', '2', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, optio eaque similique quaerat adipisci quia et repellat rerum laborum eveniet alias inventore blanditiis porro animi dignissimos eius quas dolor recusandae?</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, optio eaque similique quaerat adipisci quia et repellat rerum laborum eveniet alias inventore blanditiis porro animi dignissimos eius quas dolor recusandae?</p>', 1, '2024-10-28 15:00:27', '2024-10-29 04:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_ingredient`
--

CREATE TABLE `product_ingredient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ingredient`
--

INSERT INTO `product_ingredient` (`id`, `product_id`, `ingredient_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `send_emails`
--

CREATE TABLE `send_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `served_industries`
--

CREATE TABLE `served_industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(191) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `title_en` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `served_industries`
--

INSERT INTO `served_industries` (`id`, `title_ar`, `photo`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'test', 'servedindustries/MPfcIXdPhG1oWFoILzg5pFjgJFyEJkCYqNhYKch3.jpg', 'test', '2024-10-29 06:11:29', '2024-10-29 06:11:29'),
(2, 'test', 'servedindustries/zlq7o9VQYoikPYOg6gNQZZafIrABF7QLOJGm9OvQ.jpg', 'test', '2024-10-29 06:11:36', '2024-10-29 06:11:36'),
(3, 'test', 'servedindustries/FzNA7RmiLM8SvclSdLzfNUWtsxbTyKYsvNgfPUtp.jpg', 'test', '2024-10-29 06:11:44', '2024-10-29 06:11:44'),
(4, 'x', 'servedindustries/iTuIafUE0hEuxYX9tFGZZJEegU6jaZvBAKVTzA1B.jpg', 'test', '2024-10-29 06:11:59', '2024-10-29 06:11:59'),
(5, 'x', 'servedindustries/TN4lGLYuJxMazJ8Gds7HZff25VT5Hprn7oIstt9m.jpg', 'Welcome to Emad Bakeries', '2024-10-29 06:12:24', '2024-10-29 06:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) NOT NULL,
  `sitename_en` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `system_status` enum('open','close') NOT NULL DEFAULT 'open',
  `system_message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `email`, `logo`, `icon`, `system_status`, `system_message`, `created_at`, `updated_at`) VALUES
(1, 'مخابز عماد', 'Emad Bakeries', 'baselali33@gmail.com', 'setting/NL1AHSz9ycUkXDbTrOsfBP4yiiTBKKi7Tsod3iGU.png', NULL, 'open', NULL, '2024-10-27 05:42:04', '2024-10-29 11:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'baselali333@gmail.com', '2024-10-27 07:14:57', '2024-10-27 07:14:57'),
(2, 'baselali3433@gmail.com', '2024-10-27 07:29:54', '2024-10-27 07:29:54'),
(3, 'baselali33@gmail.com', '2024-10-27 07:32:50', '2024-10-27 07:32:50'),
(4, 'baselali333@gmail.comdd', '2024-10-27 07:36:42', '2024-10-27 07:36:42'),
(5, 'txxest@test.com', '2024-11-04 02:46:25', '2024-11-04 02:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_groups_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_group_roles_admin_groups_id_foreign` (`admin_groups_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `be_partners`
--
ALTER TABLE `be_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_photos`
--
ALTER TABLE `client_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_saies`
--
ALTER TABLE `client_saies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_says`
--
ALTER TABLE `client_says`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors_banners`
--
ALTER TABLE `distributors_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors_datas`
--
ALTER TABLE `distributors_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_admin_id_foreign` (`admin_id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indexes for table `footersocials`
--
ALTER TABLE `footersocials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_types`
--
ALTER TABLE `partner_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pcpbs`
--
ALTER TABLE `pcpbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_ingredient`
--
ALTER TABLE `product_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ingredient_product_id_foreign` (`product_id`),
  ADD KEY `product_ingredient_ingredient_id_foreign` (`ingredient_id`);

--
-- Indexes for table `send_emails`
--
ALTER TABLE `send_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_emails_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `served_industries`
--
ALTER TABLE `served_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `be_partners`
--
ALTER TABLE `be_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_photos`
--
ALTER TABLE `client_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_saies`
--
ALTER TABLE `client_saies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_says`
--
ALTER TABLE `client_says`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `distributors_banners`
--
ALTER TABLE `distributors_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributors_datas`
--
ALTER TABLE `distributors_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footersocials`
--
ALTER TABLE `footersocials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partner_types`
--
ALTER TABLE `partner_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pcpbs`
--
ALTER TABLE `pcpbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_ingredient`
--
ALTER TABLE `product_ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `send_emails`
--
ALTER TABLE `send_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `served_industries`
--
ALTER TABLE `served_industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD CONSTRAINT `admin_groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD CONSTRAINT `admin_group_roles_admin_groups_id_foreign` FOREIGN KEY (`admin_groups_id`) REFERENCES `admin_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_ingredient`
--
ALTER TABLE `product_ingredient`
  ADD CONSTRAINT `product_ingredient_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ingredient_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `send_emails`
--
ALTER TABLE `send_emails`
  ADD CONSTRAINT `send_emails_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
