-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 07:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen, 1 => seen',
  `approved` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not approved, 1 => approved',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_27_182016_create_post_categories_table', 1),
(5, '2025_01_27_182525_create_posts_table', 1),
(6, '2025_01_27_183446_create_menus_table', 1),
(7, '2025_01_27_185103_create_faqs_table', 1),
(8, '2025_01_27_185721_create_comments_table', 1),
(9, '2025_01_27_190304_create_ticket_categories_table', 1),
(10, '2025_01_27_190416_create_ticket_priorities_table', 1),
(11, '2025_01_27_190517_create_ticket_admins_table', 1),
(12, '2025_01_27_191121_create_tickets_table', 1),
(13, '2025_01_27_191403_create_ticket_files_table', 1),
(14, '2025_01_27_192049_create_roles_table', 1),
(15, '2025_01_27_192114_create_permissions_table', 1),
(16, '2025_01_27_192133_create_role_user_table', 1),
(17, '2025_01_27_192150_create_permission_role_table', 1),
(18, '2025_01_27_194036_create_product_categories_table', 1),
(19, '2025_01_27_194928_create_products_table', 1),
(20, '2025_01_27_200149_create_product_images_table', 1),
(21, '2025_01_27_200150_create_product_videos_table', 1),
(22, '2025_01_28_164519_create_provinces_table', 1),
(23, '2025_01_28_164539_create_cities_table', 1),
(24, '2025_01_28_165323_create_public_sms_table', 1),
(25, '2025_01_28_165343_create_public_mail_table', 1),
(26, '2025_01_28_165402_create_public_mail_files_table', 1),
(27, '2025_01_28_165757_create_product_user_table', 1),
(28, '2025_01_28_174215_create_orders_table', 1),
(29, '2025_01_28_174227_create_order_items_table', 1),
(30, '2025_01_28_174228_create_payments_table', 1),
(31, '2025_02_03_235603_create_settings_table', 1),
(32, '2025_02_10_151710_create_notifications_table', 1),
(33, '2025_02_10_174548_create_otps_table', 1),
(34, '2025_02_15_233039_create_banners_table', 1),
(35, '2025_03_03_113910_create_permission_user_table', 1),
(36, '2025_03_07_184436_create_ratings_table', 1),
(37, '2025_05_07_185937_add_two_factor_columns_to_users_table', 1),
(38, '2025_05_07_190354_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_video_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(20,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp_code` varchar(255) NOT NULL,
  `login_id` varchar(255) NOT NULL COMMENT 'email address or mobile number',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => mobile number , 1 => email',
  `used` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not used , 1 => used',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `token`, `user_id`, `otp_code`, `login_id`, `type`, `used`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NdlGm9jHIdJKQ7rGVTB4zHG18szfjcWIhQcby9D6eQZH8WAIVfjtaieNmrHw', 1, '869802', '9183818662', 0, 1, 0, '2025-05-11 13:31:53', '2025-05-11 13:32:17');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `bank_first_response` text DEFAULT NULL,
  `status` enum('pending','completed','failed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'create-categoryContent', 'ساختن دسته بندی محتوا', 1, NULL, '2025-03-04 05:16:37', NULL),
(2, 'edit-categoryContent', 'ویرایش دسته بندی محتوا', 1, NULL, '2025-03-04 05:16:56', NULL),
(3, 'delete-categoryContent', 'حذف دسته بندی محتوا', 1, NULL, '2025-03-04 05:17:08', NULL),
(4, 'index-categoryContent', 'دیدن دسته بندی محتوا', 1, NULL, '2025-03-04 05:17:19', NULL),
(6, 'status-categoryContent', 'وضعیت دسته بندی محتوا', 0, '2025-03-03 05:11:42', '2025-03-04 05:17:31', NULL),
(7, 'index-categoryProduct', 'دیدن دسته بندی محصولات', 0, '2025-03-03 05:11:55', '2025-03-04 05:24:40', NULL),
(8, 'create-categoryProduct', 'ایجاد دسته بندی محصولات', 0, '2025-03-03 05:12:10', '2025-03-04 05:22:23', NULL),
(9, 'edit-categoryProduct', 'ویرایش دسته بندی محصولات', 0, '2025-03-03 05:12:33', '2025-03-04 05:23:15', NULL),
(10, 'delete-categoryProduct', 'حذف دسته بندی محصولات', 0, '2025-03-04 05:24:14', '2025-03-04 05:24:14', NULL),
(11, 'create-product', 'ساختن محصول', 0, '2025-03-04 05:32:05', '2025-03-04 05:32:05', NULL),
(13, 'index-product', 'دیدن محصول', 0, '2025-03-04 05:34:20', '2025-03-04 05:34:20', NULL),
(14, 'edit-product', 'ویرایش محصول', 0, '2025-03-04 05:35:09', '2025-03-04 05:35:22', NULL),
(15, 'delete-product', 'حذف محصول', 0, '2025-03-04 05:35:53', '2025-03-04 05:35:53', NULL),
(16, 'status-product', 'وضعیت  محصول', 0, '2025-03-04 05:36:34', '2025-03-04 05:36:34', NULL),
(17, 'index-content', 'دیدن محتوا', 0, '2025-03-04 06:16:58', '2025-03-04 06:16:58', NULL),
(18, 'create-content', 'ایجاد محتوا', 0, '2025-03-04 06:17:15', '2025-03-04 06:17:15', NULL),
(19, 'edit-content', 'ویرایش محتوا', 0, '2025-03-04 06:17:35', '2025-03-04 06:17:35', NULL),
(20, 'delete-content', 'حذف محتوا', 0, '2025-03-04 06:17:55', '2025-03-04 06:17:55', NULL),
(21, 'status-content', 'وضعیت محتوا', 0, '2025-03-04 06:18:11', '2025-03-04 06:18:11', NULL),
(22, 'commentable-content', 'قابلیت کامنت محتوا', 0, '2025-03-04 06:18:35', '2025-03-04 06:18:35', NULL),
(23, 'create-brand', 'ساختن برند', 0, '2025-03-05 04:00:56', '2025-03-05 04:00:56', NULL),
(24, 'index-brand', 'دیدن برند', 0, '2025-03-05 04:01:27', '2025-03-05 04:01:27', NULL),
(25, 'edit-brand', 'ویرایش برند', 0, '2025-03-05 04:02:02', '2025-03-05 04:02:02', NULL),
(26, 'delete-brand', 'حذف برند', 0, '2025-03-05 04:02:43', '2025-03-05 04:02:43', NULL),
(27, 'create-store', 'ایجاد انبار', 0, '2025-03-05 04:04:01', '2025-03-05 04:04:01', NULL),
(28, 'index-store', 'دیدن انبار', 0, '2025-03-05 04:04:21', '2025-03-05 04:04:21', NULL),
(29, 'edit-store', 'ویرایش انبار', 0, '2025-03-05 04:04:41', '2025-03-05 04:04:41', NULL),
(30, 'delete-store', 'حذف انبار', 0, '2025-03-05 04:04:58', '2025-03-05 04:04:58', NULL),
(31, 'create-copan', 'ایجاد کپن تخفیف', 0, '2025-03-05 04:43:01', '2025-03-05 04:43:01', NULL),
(32, 'index-copan', 'دیدن کپن تخفیف', 0, '2025-03-05 04:43:36', '2025-03-05 04:43:36', NULL),
(33, 'edit-copan', 'ویرایش کپن تخفیف', 0, '2025-03-05 04:43:58', '2025-03-05 04:43:58', NULL),
(34, 'delete-copan', 'حذف کپن تخفیف', 0, '2025-03-05 04:44:16', '2025-03-05 04:44:16', NULL),
(35, 'create-payment', 'ایجاد پرداخت', 0, '2025-03-05 04:45:06', '2025-03-05 04:45:06', NULL),
(36, 'index-payment', 'دیدن پرداخت ها', 0, '2025-03-05 04:45:27', '2025-03-05 04:45:27', NULL),
(37, 'edit-payment', 'ویرایش پرداخت', 0, '2025-03-05 04:45:48', '2025-03-05 04:45:48', NULL),
(38, 'delete-payment', 'حذف پرداخت ها', 0, '2025-03-05 04:46:06', '2025-03-05 04:46:06', NULL),
(39, 'create-order', 'ایجاد سفارش', 0, '2025-03-05 04:46:40', '2025-03-05 04:46:40', NULL),
(40, 'index-order', 'دیدن سفارش', 0, '2025-03-05 04:47:19', '2025-03-05 04:47:19', NULL),
(41, 'edit-order', 'ویرایش سفارش', 0, '2025-03-05 04:47:41', '2025-03-05 04:47:41', NULL),
(42, 'delete-order', 'حذف سفارش', 0, '2025-03-05 04:47:59', '2025-03-05 04:47:59', NULL),
(43, 'index-delivery', 'دیدن روش ارسال', 0, '2025-03-05 04:48:39', '2025-03-05 04:48:39', NULL),
(44, 'create-delivery', 'ایجاد روش ارسال', 0, '2025-03-05 04:48:57', '2025-03-05 04:48:57', NULL),
(45, 'edit-delivery', 'ویرایش روش ارسال', 0, '2025-03-05 04:49:13', '2025-03-05 04:49:13', NULL),
(46, 'delete-delivery', 'حذف روش ارسال', 0, '2025-03-05 04:49:29', '2025-03-05 04:49:29', NULL),
(47, 'index-commentProduct', 'دیدن کامنت محصولات', 0, '2025-03-05 04:50:29', '2025-03-05 04:50:29', NULL),
(48, 'create-commentProduct', 'ایجاد کامنت محصولات', 0, '2025-03-05 04:50:55', '2025-03-05 04:50:55', NULL),
(49, 'edit-commentProduct', 'ویرایش کامنت محصولات', 0, '2025-03-05 04:51:17', '2025-03-05 04:51:17', NULL),
(50, 'delete-commentProduct', 'حذف کامنت محصولات', 0, '2025-03-05 04:51:35', '2025-03-05 04:51:35', NULL),
(51, 'index-commentPost', 'دیدن کامنت پست ها', 0, '2025-03-05 04:52:04', '2025-03-05 04:52:04', NULL),
(52, 'create-commentPost', 'ایجاد کامنت پست ها', 0, '2025-03-05 04:52:44', '2025-03-05 04:52:44', NULL),
(53, 'edit-commentPost', 'ویرایش کامنت پست', 0, '2025-03-05 04:53:03', '2025-03-05 04:53:03', NULL),
(54, 'delete-commentPost', 'حذف کامنت پست ها', 0, '2025-03-05 04:53:23', '2025-03-05 04:53:23', NULL),
(55, 'approved-commentPost', 'بهبود بخشیدن کامنت پست ها', 0, '2025-03-05 04:54:56', '2025-03-05 04:54:56', NULL),
(56, 'approved-commentProduct', 'بهبود بخشیدن کامنت محصولات', 0, '2025-03-05 04:55:26', '2025-03-05 04:55:26', NULL),
(57, 'show-commentPost', 'نمایش کامنت پست ها', 0, '2025-03-05 04:55:59', '2025-03-05 04:55:59', NULL),
(58, 'show-commentProduct', 'نمایش کامنت محصولات', 0, '2025-03-05 04:56:38', '2025-03-05 04:56:38', NULL),
(59, 'status-commentPost', 'وضعیت کامنت پست ها', 0, '2025-03-05 04:57:27', '2025-03-05 04:57:27', NULL),
(60, 'status-commentProduct', 'وضعیت کامنت محصولات', 0, '2025-03-05 04:57:58', '2025-03-05 04:57:58', NULL),
(61, 'index-menu', 'دیدن منو ها', 0, '2025-03-05 04:59:15', '2025-03-05 04:59:15', NULL),
(62, 'edit-menu', 'ویرایش منو ها', 0, '2025-03-05 04:59:33', '2025-03-05 04:59:33', NULL),
(63, 'create-menu', 'ایجاد منو', 0, '2025-03-05 04:59:54', '2025-03-05 04:59:54', NULL),
(64, 'delete-menu', 'حذف منو', 0, '2025-03-05 05:00:18', '2025-03-05 05:00:18', NULL),
(65, 'status-menu', 'وضعیت منو', 0, '2025-03-05 05:00:35', '2025-03-05 05:00:35', NULL),
(66, 'index-faq', 'دیدن سوالات متداول', 0, '2025-03-05 05:01:30', '2025-03-05 05:01:30', NULL),
(67, 'edit-faq', 'ویرایش سوالات متداول', 0, '2025-03-05 05:01:58', '2025-03-05 05:01:58', NULL),
(68, 'create-faq', 'ایجاد سوالات متداول', 0, '2025-03-05 05:02:28', '2025-03-05 05:02:28', NULL),
(69, 'delete-faq', 'حذف سوالات متداول', 0, '2025-03-05 05:02:50', '2025-03-05 05:02:50', NULL),
(70, 'status-faq', 'وضعیت سوالات متداول', 0, '2025-03-05 05:03:18', '2025-03-05 05:03:18', NULL),
(71, 'index-banner', 'دیدن بنر ها', 0, '2025-03-05 05:04:05', '2025-03-05 05:04:05', NULL),
(72, 'edit-banner', 'ویرایش بنر', 0, '2025-03-05 05:04:32', '2025-03-05 05:04:32', NULL),
(73, 'create-banner', 'ایجاد بنر', 0, '2025-03-05 05:04:57', '2025-03-05 05:04:57', NULL),
(74, 'delete-banner', 'حذف بنر', 0, '2025-03-05 05:05:28', '2025-03-05 05:05:28', NULL),
(75, 'status-banner', 'وضعیت بنر', 0, '2025-03-05 05:05:50', '2025-03-05 05:05:50', NULL),
(76, 'index-ticket', 'دیدن تیکت', 0, '2025-03-05 09:53:31', '2025-03-05 09:53:31', NULL),
(77, 'create-ticket', 'ایجاد تیکت', 0, '2025-03-05 09:53:51', '2025-03-05 09:53:51', NULL),
(78, 'edit-ticket', 'ویرایش تیکت', 0, '2025-03-05 09:54:17', '2025-03-05 09:54:17', NULL),
(79, 'delete-ticket', 'حذف تیکت', 0, '2025-03-05 09:54:48', '2025-03-05 09:54:48', NULL),
(80, 'status-ticket', 'وضعیت تیکت', 0, '2025-03-05 09:55:09', '2025-03-05 09:55:09', NULL),
(81, 'show-ticket', 'نمایش تیکت', 0, '2025-03-05 10:05:33', '2025-03-05 10:05:33', NULL),
(82, 'change-ticket', 'باز و بسته کردن تیکت', 0, '2025-03-05 10:17:46', '2025-03-05 10:17:46', NULL),
(83, 'index-ticketPriority', 'دیدن اولویت بندی تیکت ها', 0, '2025-03-05 10:27:33', '2025-03-05 10:27:33', NULL),
(84, 'index-ticketCategory', 'دیدن دسته بندی تیکت ها', 0, '2025-03-05 10:28:16', '2025-03-05 10:28:16', NULL),
(85, 'index-ticketAdmin', 'دیدن دسترسی تیکت ادمین', 0, '2025-03-05 10:37:24', '2025-03-05 10:37:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`) VALUES
(1, 1, '2025-05-11 17:04:28'),
(1, 2, '2025-05-11 17:04:28'),
(1, 3, '2025-05-11 17:04:28'),
(1, 4, '2025-05-11 17:04:28'),
(1, 6, '2025-05-11 17:04:29'),
(1, 7, '2025-05-11 17:04:29'),
(1, 8, '2025-05-11 17:04:29'),
(1, 9, '2025-05-11 17:04:29'),
(1, 10, '2025-05-11 17:04:29'),
(1, 11, '2025-05-11 17:04:29'),
(1, 13, '2025-05-11 17:04:29'),
(1, 14, '2025-05-11 17:04:29'),
(1, 15, '2025-05-11 17:04:29'),
(1, 16, '2025-05-11 17:04:29'),
(1, 17, '2025-05-11 17:04:29'),
(1, 18, '2025-05-11 17:04:29'),
(1, 19, '2025-05-11 17:04:30'),
(1, 20, '2025-05-11 17:04:30'),
(1, 21, '2025-05-11 17:04:30'),
(1, 22, '2025-05-11 17:04:30'),
(1, 23, '2025-05-11 17:04:30'),
(1, 24, '2025-05-11 17:04:30'),
(1, 25, '2025-05-11 17:04:30'),
(1, 26, '2025-05-11 17:04:30'),
(1, 27, '2025-05-11 17:04:30'),
(1, 28, '2025-05-11 17:04:30'),
(1, 29, '2025-05-11 17:04:30'),
(1, 30, '2025-05-11 17:04:30'),
(1, 31, '2025-05-11 17:04:30'),
(1, 32, '2025-05-11 17:04:30'),
(1, 33, '2025-05-11 17:04:30'),
(1, 34, '2025-05-11 17:04:31'),
(1, 35, '2025-05-11 17:04:31'),
(1, 36, '2025-05-11 17:04:31'),
(1, 37, '2025-05-11 17:04:31'),
(1, 38, '2025-05-11 17:04:31'),
(1, 39, '2025-05-11 17:04:31'),
(1, 40, '2025-05-11 17:04:31'),
(1, 41, '2025-05-11 17:04:31'),
(1, 42, '2025-05-11 17:04:31'),
(1, 43, '2025-05-11 17:04:31'),
(1, 44, '2025-05-11 17:04:31'),
(1, 45, '2025-05-11 17:04:31'),
(1, 46, '2025-05-11 17:04:31'),
(1, 47, '2025-05-11 17:04:32'),
(1, 48, '2025-05-11 17:04:32'),
(1, 49, '2025-05-11 17:04:32'),
(1, 50, '2025-05-11 17:04:32'),
(1, 51, '2025-05-11 17:04:32'),
(1, 52, '2025-05-11 17:04:32'),
(1, 53, '2025-05-11 17:04:32'),
(1, 54, '2025-05-11 17:04:32'),
(1, 55, '2025-05-11 17:04:32'),
(1, 56, '2025-05-11 17:04:32'),
(1, 57, '2025-05-11 17:04:32'),
(1, 58, '2025-05-11 17:04:32'),
(1, 59, '2025-05-11 17:04:32'),
(1, 60, '2025-05-11 17:04:32'),
(1, 61, '2025-05-11 17:04:32'),
(1, 62, '2025-05-11 17:04:32'),
(1, 63, '2025-05-11 17:04:32'),
(1, 64, '2025-05-11 17:04:32'),
(1, 65, '2025-05-11 17:04:32'),
(1, 66, '2025-05-11 17:04:32'),
(1, 67, '2025-05-11 17:04:32'),
(1, 68, '2025-05-11 17:04:33'),
(1, 69, '2025-05-11 17:04:33'),
(1, 70, '2025-05-11 17:04:33'),
(1, 71, '2025-05-11 17:04:33'),
(1, 72, '2025-05-11 17:04:33'),
(1, 73, '2025-05-11 17:04:33'),
(1, 74, '2025-05-11 17:04:33'),
(1, 75, '2025-05-11 17:04:33'),
(1, 76, '2025-05-11 17:04:33'),
(1, 77, '2025-05-11 17:04:33'),
(1, 78, '2025-05-11 17:04:33'),
(1, 79, '2025-05-11 17:04:33'),
(1, 80, '2025-05-11 17:04:33'),
(1, 81, '2025-05-11 17:04:33'),
(1, 82, '2025-05-11 17:04:33'),
(1, 83, '2025-05-11 17:04:33'),
(1, 84, '2025-05-11 17:04:33'),
(1, 85, '2025-05-11 17:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `commentable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => uncommentable, 1 => commentable',
  `tags` varchar(255) NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `view` bigint(20) NOT NULL DEFAULT 0,
  `duration` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `story` text NOT NULL,
  `actors` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `price` decimal(20,3) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `view`, `duration`, `summary`, `story`, `actors`, `slug`, `image`, `video`, `price`, `status`, `tags`, `category_id`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'درام', 0, '1ساعت', '<p>تزرتزرتزرتزرتزرتزرتزرتزر</p>', '<p>تزرتزرتزرتزرتزرتزرتزرتزر</p>', 'تزرتزرتزرتزرتزرتزرتزرتزر', 'درام', '\"images\\\\product\\\\2025\\\\05\\\\11\\\\1746983477.jpg\"', 'files\\video-files\\2025\\05\\11\\1746983477.jpg', 10000.000, 1, 'درام', 1, '2025-05-11 13:40:28', '2025-05-11 13:41:17', '2025-05-11 13:41:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `show_in_menu` tinyint(4) NOT NULL DEFAULT 0,
  `tags` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `slug`, `image`, `status`, `show_in_menu`, `tags`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'درام', '<p>درام-اجتماعی</p>', 'درام', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\05\\\\11\\\\1746983309\\\\1746983309_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\05\\\\11\\\\1746983309\\\\1746983309_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\05\\\\11\\\\1746983309\\\\1746983309_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\05\\\\11\\\\1746983309\",\"currentImage\":\"medium\"}', 1, 1, 'درام', NULL, '2025-05-11 13:38:29', '2025-05-11 13:38:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_videos`
--

CREATE TABLE `product_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `price` decimal(20,3) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_mail`
--

CREATE TABLE `public_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_mail_files`
--

CREATE TABLE `public_mail_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_mail_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_sms`
--

CREATE TABLE `public_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `rateable_type` varchar(255) NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(20,3) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'ادمین', 0, '2025-05-11 13:34:28', '2025-05-11 13:36:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`) VALUES
(1, 1, '2025-05-11 17:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JknAjhhlsIPu4nADMLyUKkuT341799vBmPPwP3yF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMEZGZ0h0RE1hSWpHa215V2FIMWFZcVo0bjZiUzU2ZG9CNjc4cU9pZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tYXJrZXQvcHJvZHVjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1746983479);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen, 1 => seen',
  `reference_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_admins`
--

CREATE TABLE `ticket_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `national_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL COMMENT 'avatar',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `activation` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => inactive, 1 => active',
  `activation_date` timestamp NULL DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => user, 1 => admin',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `mobile_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `national_code`, `first_name`, `last_name`, `slug`, `profile_photo_path`, `email_verified_at`, `activation`, `activation_date`, `user_type`, `status`, `current_team_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '9183818662', '2025-05-11 13:32:17', '$2y$12$FYIdHh1zCFVucyKSVTlFEOVOXpergnpbKYODXliJFZesEwFYOa3Du', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, NULL, '2025-05-11 13:31:53', '2025-05-11 13:32:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_author_id_foreign` (`author_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_product_video_id_foreign` (`product_video_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_videos_product_id_foreign` (`product_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail`
--
ALTER TABLE `public_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_mail_files_public_mail_id_foreign` (`public_mail_id`);

--
-- Indexes for table `public_sms`
--
ALTER TABLE `public_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_reference_id_foreign` (`reference_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_files_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_national_code_unique` (`national_code`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_mail`
--
ALTER TABLE `public_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_sms`
--
ALTER TABLE `public_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_video_id_foreign` FOREIGN KEY (`product_video_id`) REFERENCES `product_videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `product_videos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD CONSTRAINT `public_mail_files_public_mail_id_foreign` FOREIGN KEY (`public_mail_id`) REFERENCES `public_mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_reference_id_foreign` FOREIGN KEY (`reference_id`) REFERENCES `ticket_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD CONSTRAINT `ticket_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `ticket_files_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
