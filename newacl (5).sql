-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2021 at 08:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newacl`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_03_114828_create_userdatas_table', 1),
(5, '2020_09_07_054838_create_multipleimages_table', 1),
(6, '2020_09_10_080128_create_rolemanagers_table', 1),
(7, '2020_09_14_053804_create_multipleimagestores_table', 1),
(8, '2020_09_14_082915_create_multiimages_table', 1),
(9, '2020_09_14_094732_create_forms_table', 1),
(10, '2020_09_25_073959_sample', 1),
(11, '2020_09_25_083056_newtb', 1),
(12, '2020_09_25_095826_create_testdemos_table', 1),
(13, '2020_09_28_093655_create_items_table', 1),
(14, '2020_09_28_093720_create_orders_table', 1),
(15, '2020_09_28_093742_create_invoice_table', 1),
(16, '2020_09_29_055328_create_testparent_table', 1),
(17, '2020_09_29_055344_create_testchild_table', 1),
(18, '2020_10_13_081211_create_permission_tables', 2),
(19, '2021_01_21_072802_create_register_data_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(35, 'App\\User', 19),
(45, 'App\\User', 20),
(47, 'App\\User', 23),
(48, 'App\\User', 25),
(49, 'App\\User', 26);

-- --------------------------------------------------------

--
-- Table structure for table `multiimages`
--

CREATE TABLE `multiimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multipleimages`
--

CREATE TABLE `multipleimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `multipleimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multipleimagestores`
--

CREATE TABLE `multipleimagestores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `multipleimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multipleimagestores`
--

INSERT INTO `multipleimagestores` (`id`, `multipleimage`, `created_at`, `updated_at`) VALUES
(2, '1602677980.jpg', '2020-10-14 06:49:40', '2020-10-14 06:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `newtb`
--

CREATE TABLE `newtb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(2, 'role-create', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(3, 'role-edit', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(4, 'role-delete', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(5, 'img-list', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(6, 'img-create', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(7, 'img-edit', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35'),
(8, 'img-delete', 'web', '2020-10-13 02:44:35', '2020-10-13 02:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `register_data`
--

CREATE TABLE `register_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_data`
--

INSERT INTO `register_data` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(149, 'ruchit', 'product@gmail.com', '8574968574', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(150, 'rakesh', 'admin@gmail.com', '5417859685', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(151, 'saumil', 'saler123@gmail.com', '9748574658', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(152, 'ruchit', 'manager@gmail.com', '8748965874', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(153, 'rakesh', 'managernw@gmail.com', '8745968745', 'aus', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(154, 'saumil', 'database@gmail.com', '8574968575', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(155, 'ruchit', 'Prof. Dayna Hegmann@gmail.com', '5417859686', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(156, 'rakesh', 'Davon Hayes@gmail.com', '9748574659', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(157, 'saumil', 'Dr. Freeda Daniel@gmail.com', '8748965875', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(158, 'ruchit', 'Forest Wintheiser IV@gmail.com', '8745968746', 'aus', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(159, 'rakesh', 'Ernie Kerluke@gmail.com', '8574968576', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(160, 'saumil', 'Erick Simonis@gmail.com', '5417859687', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(161, 'ruchit', 'Jarred Renner@gmail.com', '9748574660', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(162, 'rakesh', 'Rashawn Davis II@gmail.com', '8748965876', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(163, 'saumil', 'Delilah Kiehn@gmail.com', '8745968747', 'aus', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(164, 'ruchit', 'Mrs. Winnifred Stoltenberg@gmail.com', '8574968577', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(165, 'rakesh', 'Dedric Shields@gmail.com', '5417859688', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(166, 'saumil', 'Hadley Harvey@gmail.com', '9748574661', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(167, 'ruchit', 'Dr. Akeem Kilback DDS@gmail.com', '8748965877', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(168, 'rakesh', 'Dayne Bartell@gmail.com', '8745968748', 'aus', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(169, 'saumil', 'Kenya Luettgen@gmail.com', '8574968578', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(170, 'ruchit', 'Ahmed Haag III@gmail.com', '5417859689', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(171, 'rakesh', 'Murphy Wisoky@gmail.com', '9748574662', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(172, 'saumil', 'Dr. Autumn Gleichner DDS@gmail.com', '8748965878', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(173, 'ruchit', 'Dr. Arden Jacobson@gmail.com', '8745968749', 'aus', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(174, 'rakesh', 'Susan Rogahn@gmail.com', '8574968579', 'india', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(175, 'saumil', 'ruchit@gmail.com', '5417859690', 'pak', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(176, 'ruchit', 'ruchit1@gmail.com', '9748574663', 'srilanka', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(177, 'rakesh', 'ruchit123@gmail.com', '8748965879', 'canada', '2021-01-30 02:45:05', '2021-01-30 02:45:05'),
(178, 'saumil', 'test@gmail.com', '8745968750', 'aus', '2021-01-30 02:45:05', '2021-03-31 04:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `rolemanagers`
--

CREATE TABLE `rolemanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolemanagers`
--

INSERT INTO `rolemanagers` (`id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Php', 'ACTIVE', '2021-03-31 04:34:01', '2021-03-31 04:34:01'),
(2, 'java', 'ACTIVE', '2021-03-31 05:34:49', '2021-03-31 05:34:49'),
(3, 'Python', 'ACTIVE', '2021-03-31 05:35:02', '2021-03-31 05:35:02'),
(4, 'Android', 'ACTIVE', '2021-03-31 05:35:11', '2021-03-31 05:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(35, 'Admin', 'web', '2020-10-14 04:30:01', '2020-10-14 04:30:01'),
(45, 'salesman', 'web', '2020-10-14 06:38:51', '2020-10-14 06:38:51'),
(46, 'demoproject', 'web', '2020-10-14 06:47:47', '2020-10-14 06:47:47'),
(47, 'sales manager', 'web', '2020-10-15 00:10:01', '2020-10-15 00:10:01'),
(48, 'new manager', 'web', '2020-10-15 00:15:06', '2020-10-15 00:15:06'),
(49, 'database', 'web', '2020-10-15 00:27:45', '2020-10-15 00:27:45'),
(50, 'test', 'web', '2021-03-31 06:51:09', '2021-03-31 06:51:09'),
(51, 'dummy', 'web', '2021-03-31 06:53:22', '2021-03-31 06:53:22');

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
(1, 35),
(1, 49),
(1, 50),
(2, 35),
(2, 47),
(2, 48),
(3, 35),
(4, 35),
(5, 35),
(5, 45),
(6, 35),
(6, 45),
(6, 46),
(6, 49),
(7, 35),
(7, 45),
(7, 46),
(7, 47),
(7, 51),
(8, 35),
(8, 46),
(8, 48);

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testchild`
--

CREATE TABLE `testchild` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imgid` bigint(20) UNSIGNED NOT NULL,
  `imagename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testchild`
--

INSERT INTO `testchild` (`id`, `imgid`, `imagename`, `created_at`, `updated_at`) VALUES
(1, 1, 'pro_1610351913_0.DphR22PWsAA-A62.jpg', '2021-01-11 02:28:33', '2021-01-11 02:28:33'),
(2, 2, 'pro_1610446427_0.index.jpeg', '2021-01-12 04:43:47', '2021-01-12 04:43:47'),
(4, 4, 'pro_1610446792_0.index.png', '2021-01-12 04:49:52', '2021-01-12 04:49:52'),
(5, 5, 'pro_1610446852_0.index.jpeg', '2021-01-12 04:50:52', '2021-01-12 04:50:52'),
(6, 8, 'pro_1610447025_0.index.png', '2021-01-12 04:53:45', '2021-01-12 04:53:45'),
(7, 9, 'pro_1610447209_0.index.jpeg', '2021-01-12 04:56:49', '2021-01-12 04:56:49'),
(8, 10, 'pro_1610447857_0.road-1072823__340.jpeg', '2021-01-12 05:07:37', '2021-01-12 05:07:37'),
(9, 11, 'pro_1610448335_0.index.png', '2021-01-12 05:15:35', '2021-01-12 05:15:35'),
(10, 6, 'pro_1610449242_0.vil1.jpg', '2021-01-12 05:30:42', '2021-01-12 05:30:42'),
(11, 12, 'pro_1610450390_0.DphR22PWsAA-A62.jpg', '2021-01-12 05:49:50', '2021-01-12 05:49:50'),
(12, 13, 'pro_1610452897_0.road-1072823__340.jpeg', '2021-01-12 06:31:37', '2021-01-12 06:31:37'),
(13, 14, 'pro_1610453063_0.index.png', '2021-01-12 06:34:23', '2021-01-12 06:34:23'),
(15, 16, 'pro_1610455418_0.50df34b9e93f30269853b96b09c37e3b.jpeg', '2021-01-12 07:13:38', '2021-01-12 07:13:38'),
(16, 16, 'pro_1610455418_1.car.jpeg', '2021-01-12 07:13:38', '2021-01-12 07:13:38'),
(17, 16, 'pro_1610455418_2.index.jpeg', '2021-01-12 07:13:38', '2021-01-12 07:13:38'),
(18, 16, 'pro_1610455418_3.index.png', '2021-01-12 07:13:38', '2021-01-12 07:13:38'),
(19, 16, 'pro_1610455418_4.nature\'.jpeg', '2021-01-12 07:13:38', '2021-01-12 07:13:38'),
(22, 15, 'pro_1610455487_0..jpeg', '2021-01-12 07:14:47', '2021-01-12 07:14:47'),
(23, 7, 'pro_1610455554_0.car.jpeg', '2021-01-12 07:15:54', '2021-01-12 07:15:54'),
(24, 7, 'pro_1610455554_1.50df34b9e93f30269853b96b09c37e3b.jpeg', '2021-01-12 07:15:54', '2021-01-12 07:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `testdemos`
--

CREATE TABLE `testdemos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testparent`
--

CREATE TABLE `testparent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testparent`
--

INSERT INTO `testparent` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'wefwefw', '2021-01-11 02:28:33', '2021-01-11 02:28:33'),
(2, 'new img', '2021-01-12 04:43:47', '2021-01-12 04:43:47'),
(4, 'test', '2021-01-12 04:49:52', '2021-01-12 04:49:52'),
(5, 'lorem', '2021-01-12 04:50:52', '2021-01-12 04:50:52'),
(6, 'gbgfb', '2021-01-12 04:52:26', '2021-01-12 04:52:26'),
(7, 'gbgfb', '2021-01-12 04:52:35', '2021-01-12 04:52:35'),
(8, 'gbgfb', '2021-01-12 04:53:45', '2021-01-12 04:53:45'),
(9, 'test', '2021-01-12 04:56:49', '2021-01-12 04:56:49'),
(10, 'lorem', '2021-01-12 05:07:37', '2021-01-12 05:07:37'),
(11, 'wefwef', '2021-01-12 05:15:35', '2021-01-12 05:15:35'),
(12, 'rfgwfg', '2021-01-12 05:49:50', '2021-01-12 05:49:50'),
(13, 'test', '2021-01-12 06:31:37', '2021-01-12 06:31:37'),
(14, 'test3', '2021-01-12 06:34:23', '2021-01-12 06:34:23'),
(15, 'WEFEWF', '2021-01-12 06:43:06', '2021-01-12 06:43:06'),
(16, 'loremipsum', '2021-01-12 07:13:38', '2021-01-12 07:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `userdatas`
--

CREATE TABLE `userdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confpwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdatas`
--

INSERT INTO `userdatas` (`id`, `name`, `email`, `pwd`, `confpwd`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'saumil.rana@iflair.com', '12345678', '12345678', '2020-10-13 06:45:22', '2020-10-13 06:45:22'),
(2, 'new1', 'newvuejs@gmail.com', '12345678', '12345678', '2020-10-13 06:52:56', '2020-10-13 06:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'product', 'produxtsuuplier@gmail.com', NULL, '$2y$10$WxZvfJKaZT6LhkU0bbmM2ufX9tvxPGFR0It.qzhZUMVkv1UOaWb9e', NULL, '2020-10-14 02:08:30', '2020-10-14 02:08:30'),
(19, 'admin', 'admin@gmail.com', NULL, '$2y$10$MXA5QS068njNP.J6uOmzOuPStSUvTpU075ZzjO1lnd6x8akrSdEse', NULL, '2020-10-14 04:30:01', '2020-10-14 04:30:01'),
(20, 'saler123', 'saler12@gmail.com', NULL, '$2y$10$lp0ROFLAq49dVdKtGRZHjei2uYnKvO60pgMc9gSVQST8.QDLFm6Je', NULL, '2020-10-14 04:33:07', '2020-10-14 07:53:41'),
(23, 'manager', 'manager@gmail.com', NULL, '$2y$10$TZQTOtVvcZmv28Or.aMor.LwIk1JbE0cuGz/ZiOBMZrSNomCcVBTq', NULL, '2020-10-15 00:13:01', '2020-10-15 00:13:01'),
(25, 'managernw', 'newmanager@gmail.com', NULL, '$2y$10$cizHBtR1WUBC9/rkw9k5DOIoQn.zQ49vzWRjH0mxEyHuf3XFKFoH6', NULL, '2020-10-15 00:15:41', '2020-10-15 00:15:41'),
(26, 'database', 'database@gmail.com', NULL, '$2y$10$p6DzisBPt9mm0pu1m07mpuWePSAYVLO.YoGS11u/fxdBFg5fzYQ2K', NULL, '2020-10-15 00:28:07', '2020-10-15 00:28:07'),
(27, 'Prof. Dayna Hegmann', 'bins.juvenal@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'M651KmDiVH', '2021-01-13 00:39:03', '2021-01-13 00:39:03'),
(28, 'Davon Hayes', 'waters.gia@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WVf3RW1Y7z', '2021-01-13 00:39:03', '2021-01-13 00:39:03'),
(29, 'Dr. Freeda Daniel', 'fidel05@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4EnWQE7P72', '2021-01-13 00:39:03', '2021-01-13 00:39:03'),
(30, 'Forest Wintheiser IV', 'karley.baumbach@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xGgvRWSnAb', '2021-01-13 00:39:03', '2021-01-13 00:39:03'),
(31, 'Ernie Kerluke', 'vdoyle@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nCW4nANGvX', '2021-01-13 00:39:03', '2021-01-13 00:39:03'),
(32, 'Erick Simonis', 'eugene72@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '60YvrCSMt1', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(33, 'Jarred Renner', 'mills.verla@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mkhwN3YIYY', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(34, 'Rashawn Davis II', 'mante.susana@example.org', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '15pnljx6tE', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(35, 'Delilah Kiehn', 'akunze@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1umEcmPVgk', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(36, 'Mrs. Winnifred Stoltenberg', 'elbert15@example.org', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SKJNmedX1y', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(37, 'Dedric Shields', 'jolie44@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd8jpPkc2lM', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(38, 'Hadley Harvey', 'bluettgen@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i1sdJ7oO0R', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(39, 'Dr. Akeem Kilback DDS', 'prau@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gCdVqjp6ex', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(40, 'Dayne Bartell', 'nkovacek@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WCNkX2V5Rf', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(41, 'Kenya Luettgen', 'jacobson.issac@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'skFC4B93Qk', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(42, 'Ahmed Haag III', 'alek.witting@example.com', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Af4G5vK4mC', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(43, 'Murphy Wisoky', 'deshawn.walsh@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WArvulWlfp', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(44, 'Dr. Autumn Gleichner DDS', 'erdman.delmer@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UpODYmMbyB', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(45, 'Dr. Arden Jacobson', 'nina86@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sHnuyx4AOy', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(46, 'Susan Rogahn', 'oceane88@example.net', '2021-01-13 00:39:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hiVkTgN5PD', '2021-01-13 00:39:04', '2021-01-13 00:39:04'),
(47, 'ruchit', 'ruchit@gmail.com', NULL, '$2y$10$B/D1WlVKQhykdNbYKJlgAOlh/XQmlrbwWfJRG.lfez.Pf1RUCWeIa', NULL, '2021-01-13 01:18:46', '2021-01-13 01:18:46'),
(49, 'ruchit1', 'ruchit123@gmail.com', NULL, '$2y$10$CgFrInhbcXeGGKD0yLdW0.WzIlfAYiikP8k.XgWl9hYvf.yAECAcq', NULL, '2021-01-13 02:09:51', '2021-01-13 02:09:51'),
(50, 'ruchit123', 'ruchit12345@gmail.com', NULL, '$2y$10$ltiNBP5xfdQthUCx9C6gPuEYcH0dB.BNVoE0YMf46/FjuDcVXykpG', NULL, '2021-01-13 02:09:51', '2021-01-13 02:09:51'),
(52, 'test', 'saumil.rana@iflair.com', '2021-01-20 01:47:54', '$2y$10$cDXGgFZ5wIJ/3D8rFib3b.cj./Xb51AN8VwnkF3B38GJZreGBIGsC', 'ye7NNAXlTyZFCSWmAFxpgKHzvmE8cG24aUHe9T1xbpasvy7Ed0siPbNdkxCr', '2021-01-20 01:47:25', '2021-01-20 02:17:54'),
(53, 'Caleigh Carter IV', 'swift.elmo@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KkUu9iYcp2', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(54, 'Barry Collier', 'ydavis@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U25ltmBvSj', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(55, 'Mr. Zachery Klein PhD', 'padams@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TByBMSclD9', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(56, 'Price Haley', 'shawn.bednar@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kx8y71ji5s', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(57, 'Jorge Windler DDS', 'alivia.ernser@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rRUj5lGKoN', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(58, 'Dr. Claud Stroman', 'kozey.sidney@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OTDBAYfE1r', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(59, 'Prof. Alaina Brown', 'hirthe.demario@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '13Dh3o3rF0', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(60, 'Hailey Gutkowski', 'rhoda.johns@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WVt16U1QUF', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(61, 'Burley Rowe', 'athena70@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XKOmcjC8FI', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(62, 'Josefina Corkery', 'aurelie18@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yJFIIRNT3E', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(63, 'Otha Olson', 'lakin.helen@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DNzmaLzFQc', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(64, 'Miss Autumn Littel', 'kerluke.vanessa@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8mcOevyK3f', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(65, 'Mr. Kyle Fisher', 'jaydon99@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7n0KqbiQ1z', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(66, 'Michel Konopelski', 'koss.imelda@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TQjriNksRI', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(67, 'Warren Goldner', 'lela.kautzer@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cJq8xPteeF', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(68, 'Destini Anderson', 'don77@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KStHlAxoXp', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(69, 'Cali Welch', 'schuster.mark@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pYQ4TiWsnZ', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(70, 'Abby Yundt', 'sidney.hirthe@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lPivYebBG0', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(71, 'Stephen Carroll', 'zeffertz@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OEu2l1A8kH', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(72, 'Prof. Audie Kuhn', 'cheyenne03@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KiDeMuIeD2', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(73, 'Dr. Amir Farrell', 'vito.anderson@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KmD4xvnlcW', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(74, 'Mrs. Tianna Miller DDS', 'tchristiansen@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aFhonqieCs', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(75, 'Johnnie Thompson V', 'lilly.orn@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '23yqLSqNo2', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(76, 'Beatrice Bergstrom', 'gislason.aurelia@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pgGcFuvrXF', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(77, 'Whitney Kohler', 'wgottlieb@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CDAu2vUCyh', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(78, 'Darion Bernier', 'johns.glenna@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Fthz0oDCWX', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(79, 'Cullen Lemke', 'kiara43@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QiMPWv3EQT', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(80, 'Jaclyn Kemmer', 'kschimmel@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nXSxmVcpvX', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(81, 'Miss Elsie Pfeffer Sr.', 'rconnelly@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4MwzRXRGWc', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(82, 'Verla Murazik', 'freda40@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tmpaDNSRAG', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(83, 'Iliana Wehner', 'ihauck@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DHaFPcqW5v', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(84, 'Ruby Huels', 'allan64@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5WCQ9Gx8Tj', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(85, 'Mr. Francis Mann II', 'haylie82@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fCDJNDs2n0', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(86, 'Eloisa Schamberger', 'ward.abbie@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'W5Q0hVptnT', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(87, 'Ms. Adeline Jenkins', 'nienow.dario@example.org', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GFIvhT2gO3', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(88, 'Ansel McKenzie', 'ikutch@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zrUYVSVfzl', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(89, 'Gerry Homenick', 'vivienne.gerhold@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IfHQJUpC20', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(90, 'Rickey Fay DDS', 'dmueller@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TSUTuhoR8Q', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(91, 'Herminio Lynch', 'rfranecki@example.net', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wDXKd6cjRH', '2021-03-31 06:27:21', '2021-03-31 06:27:21'),
(92, 'Jennifer Bayer', 'vandervort.thomas@example.com', '2021-03-31 06:27:21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OD9C2PgAjP', '2021-03-31 06:27:21', '2021-03-31 06:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipleimages`
--
ALTER TABLE `multipleimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipleimagestores`
--
ALTER TABLE `multipleimagestores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtb`
--
ALTER TABLE `newtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_data`
--
ALTER TABLE `register_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolemanagers`
--
ALTER TABLE `rolemanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testchild`
--
ALTER TABLE `testchild`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testchild_imgid_foreign` (`imgid`);

--
-- Indexes for table `testdemos`
--
ALTER TABLE `testdemos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testparent`
--
ALTER TABLE `testparent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdatas`
--
ALTER TABLE `userdatas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multipleimages`
--
ALTER TABLE `multipleimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multipleimagestores`
--
ALTER TABLE `multipleimagestores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newtb`
--
ALTER TABLE `newtb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register_data`
--
ALTER TABLE `register_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `rolemanagers`
--
ALTER TABLE `rolemanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testchild`
--
ALTER TABLE `testchild`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testdemos`
--
ALTER TABLE `testdemos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testparent`
--
ALTER TABLE `testparent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdatas`
--
ALTER TABLE `userdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

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

--
-- Constraints for table `testchild`
--
ALTER TABLE `testchild`
  ADD CONSTRAINT `testchild_imgid_foreign` FOREIGN KEY (`imgid`) REFERENCES `testparent` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
