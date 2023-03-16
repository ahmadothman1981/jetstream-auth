-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 03:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jetauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returnorder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alluser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminuserrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(25) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupons`, `shipping`, `blog`, `setting`, `returnorder`, `review`, `orders`, `stock`, `reports`, `alluser`, `adminuserrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '2022-11-01 16:44:01', '$2y$10$TQdrB2MG/I/cR8GyHPkRJuN1KxMDzTey/wGyRwNTSFBZk3wfPoXbC', '01113736196', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'NKcZDS3t0xoyIf4OHIZubCUHYRKPIDMQtf1IeRKwr10CWJhu7ytNUZYTdJKQ', NULL, '202211050624logo-aikido-aikikai-large.jpg', '2022-11-01 16:44:01', '2023-03-12 13:45:32'),
(2, 'aisha', 'aisha@mail.com', NULL, '$2y$10$BVG0PKKnRj1vNncXvEvEfeXxxpp5cazIWHNye1X6Y3km59JGItPki', '012345789', '1', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, 2, NULL, NULL, 'upload/admin_images/1756754727256945.png', '2023-02-04 09:42:34', '2023-02-04 09:42:34'),
(3, 'othman', 'othman@mail.com', NULL, '$2y$10$L91cKqF9yrwf1eIdcZPEkeXq9KBykPvAgT3YnI3ky3/hDAlWV0FMS', '0123456789', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 2, NULL, NULL, 'upload/admin_images/1756842870326300.png', '2023-02-03 18:25:23', '2023-02-03 18:25:23'),
(5, 'dini', 'dini@mail.com', NULL, '$2y$10$newh4b.uYkq0KvGWJ3hHSeA2IcrFDebDYQUXpa/eyd/Jmskzfm/zC', '011111111', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 2, NULL, NULL, '2023031215571750025384838230.jpg', '2023-03-12 13:56:38', '2023-03-12 13:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `post_title_en`, `post_title_ar`, `post_slug_en`, `post_slug_ar`, `post_image`, `post_details_en`, `post_details_ar`, `created_at`, `updated_at`) VALUES
(1, 4, '5 Habits That Will Keep 2023', '5 عادات ستجعل 2023 أفضل', '5-habits-that-will-keep-2023', '5-عادات-ستجعل-2023-أفضل', 'upload/post/1755567650656242.jpeg', 'Originally launched as a part of Gawker Media Network, Gizmodo is a design, technology, science and science fiction website that also features articles on politics.', ' \nمن الرائع أن يكون لديك قائمة نبيلة بأهداف العام الجديد ، ولكن الأهم من ذلك بكثير هو تحديد الأهداف التي يمكنك الالتزام بها باستمرار. بدلاً من سرد ، على سبيل المثال ، من عشر إلى عشرين طريقة لتحسين نفسك أو عملك ، اختر أربع أو خمس طرق فقط يمكن دمجها عمليًا في روتين يومي. فيما يلي بعض الأشياء التي ساعدت في إحداث فرق حقيقي بالنسبة لي', '2023-01-20 16:36:19', NULL),
(2, 4, 'Strong Employer Branding', 'العلامة التجارية القوية لصاحب العمل', 'strong-employer-branding', 'العلامة-التجارية-القوية-لصاحب-العمل', 'upload/post/1755567976474957.jpeg', '<p>The power of <a  is unmistakable. In 2022, according to a specialist company in that field, Universum,  reported that it was a top priority for their strategies. Businesses that realize the value of harnessing it will lead the charge toward better employer-employee relationships and more brand visibility. Employer branding is the bridge from where a business is today to where it wants to be tomorrow.</p>\n\n<p>A well-conceived and executed employer brand can become the foundation of the entire employee experience, from job candidate status to corporate alumnus. A Glassdoor poll found that <a href=\"https://www.glassdoor.com/employers/resources/hr-and-recruiting-stats/\" rel=\"nofollow noopener\">86% of employees and job seekers</a> research company reviews and ratings when choosing which business to apply to, and an effective employer brand can serve as free advertising&mdash; one that informs the world about what a company stands for and what people can expect if they become part of its team.</p>', '\nقوة العلامة التجارية لصاحب العمل لا لبس فيها. في عام 2022 ، وفقًا لإحدى الشركات المتخصصة في هذا المجال ، Universum ، أفاد 86٪ من أرباب العمل الأكثر جاذبية في العالم أن ذلك يمثل أولوية قصوى لاستراتيجياتهم. الشركات التي تدرك قيمة الاستفادة منها ستقود زمام الأمور نحو علاقات أفضل بين صاحب العمل والموظف وزيادة وضوح العلامة التجارية. العلامة التجارية لصاحب العمل هي الجسر من مكان العمل اليوم إلى حيث يريد أن يكون غدًا.\n\nيمكن أن تصبح العلامة التجارية لصاحب العمل المصممة والمنفذة جيدًا الأساس لتجربة الموظف بأكملها ، من حالة المرشح للوظيفة إلى خريجي الشركات. وجد استطلاع أجراه موقع Glassdoor أن 86٪ من الموظفين والباحثين عن عمل يبحثون عن تقييمات وتقييمات الشركة عند اختيار النشاط التجاري الذي يتقدمون إليه ، ويمكن للعلامة التجارية الفعالة لصاحب العمل أن تكون بمثابة إعلان مجاني - إعلان يُعلم العالم بما تمثله الشركة وما الأشخاص يمكن أن تتوقع إذا أصبحوا جزءًا من فريقها.', '2023-01-20 16:41:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE IF NOT EXISTS `blog_post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `blog_category_name_en`, `blog_category_name_ar`, `blog_category_slug_en`, `blog_category_slug_ar`, `created_at`, `updated_at`) VALUES
(1, 'TECH', 'تكنولوجيا', 'tech', 'تكنولوجيا', NULL, NULL),
(2, 'Wealth', 'صحة', 'wealth', 'صحة', NULL, NULL),
(4, 'marketing', 'التسويق', 'marketing', 'التسويق', '2023-01-18 10:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_ar`, `brand_slug_en`, `brand_slug_ar`, `brand_image`, `created_at`, `updated_at`) VALUES
(2, 'samsung', 'سامسونج', 'samsung', 'سامسونج', 'upload/brand/1748936030657769.png', NULL, NULL),
(3, 'XIAOMI', 'شاومى', 'xiaomi', 'شاومى', 'upload/brand/1748937251928353.png', NULL, NULL),
(4, 'apple', 'أبل', 'apple', 'أبل', 'upload/brand/1748937277561165.png', NULL, NULL),
(5, 'oppo', 'أوبو', 'oppo', 'أوبو', 'upload/brand/1748937300702156.png', NULL, NULL),
(6, 'vivo', 'فيفو', 'vivo', 'فيفو', 'upload/brand/1748937321680314.png', NULL, NULL),
(7, 'huawei', 'هواوى', 'huawei', 'هواوى', 'upload/brand/1748937352041655.png', NULL, NULL),
(10, 'COOFANDY', 'كوفاندى', 'coofandy', 'كوفاندى', 'upload/brand/1751113037222157.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_ar`, `category_slug_en`, `category_slug_ar`, `category_icon`, `created_at`, `updated_at`) VALUES
(8, 'Fashion', 'الموضة', 'fashion', 'الموضة', 'fa fa-shopping-bag', NULL, '2022-11-25 14:19:33'),
(9, 'Electronics', 'إلكترونيات', 'electronics', 'إلكترونيات', 'fa fa-laptop', NULL, '2022-11-25 14:20:30'),
(10, 'Sweet Home', 'المنزل', 'sweet-home', 'المنزل', 'fa fa-bed', NULL, NULL),
(11, 'Appliances', 'الأجهزة', 'appliances', 'الأجهزة', 'fa fa-television', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`, `category_id`, `coupon_type`) VALUES
(2, 'EID AL FETTER--', 40, '2023-06-22', 1, '2023-03-16 11:56:21', '2023-03-16 11:56:21', 9, 'PERCENTAGE'),
(3, 'TEST', 12, '2023-06-05', 1, '2023-03-16 11:23:52', '2023-03-16 11:23:52', 9, 'FIXED'),
(4, 'TEST_NEW', 20, '2023-03-23', 1, '2023-03-16 11:40:59', NULL, 9, 'FIXED'),
(5, 'TEST_2', 25, '2023-03-30', 1, '2023-03-16 11:55:37', NULL, 10, 'PERCENTAGE');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_23_141454_create_sessions_table', 1),
(7, '2022_10_23_151455_create_admins_table', 1),
(8, '2022_11_06_185637_create_brands_table', 2),
(11, '2022_11_10_103810_create_categories_table', 3),
(12, '2022_11_11_184238_create_sub_categories_table', 4),
(13, '2022_11_13_140413_create_sub_sub_categories_table', 5),
(14, '2022_11_15_142140_create_products_table', 6),
(15, '2022_11_15_145738_create_multi_imgs_table', 6),
(16, '2022_11_22_145124_create_sliders_table', 7),
(17, '2022_12_15_132853_create_wishlists_table', 8),
(18, '2022_12_20_190206_create_coupons_table', 9),
(19, '2022_12_27_120539_create_ship_divisions_table', 10),
(20, '2022_12_27_143916_create_ship_districts_table', 11),
(21, '2022_12_28_093734_create_ship_states_table', 12),
(22, '2023_01_06_171251_create_shippings_table', 13),
(23, '2023_01_08_141353_create_orders_table', 14),
(24, '2023_01_08_141535_create_order_items_table', 14),
(25, '2023_01_18_105322_create_blog_post_categories_table', 15),
(26, '2023_01_20_140456_create_blog_posts_table', 16),
(28, '2023_01_23_062451_create_site_settings_table', 17),
(29, '2023_01_25_061902_create_seos_table', 18),
(30, '2023_01_27_183121_create_reviews_table', 19),
(31, '2023_03_16_073142_add_details_to_coupons', 20);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE IF NOT EXISTS `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(6, 13, 'upload/products/multi-images/1750025585436971.jpg', '2022-11-19 07:38:07', '2022-11-20 12:27:34'),
(7, 13, 'upload/products/multi-images/1750025384838230.jpg', '2022-11-19 07:38:07', '2022-11-20 12:24:22'),
(8, 13, 'upload/products/multi-images/1750025585747710.jpg', '2022-11-19 07:38:07', '2022-11-20 12:27:34'),
(9, 14, 'upload/products/multi-images/1750621649771212.jpg', '2022-11-27 02:21:45', NULL),
(10, 14, 'upload/products/multi-images/1750621650061439.jpg', '2022-11-27 02:21:45', NULL),
(11, 14, 'upload/products/multi-images/1750621650349568.jpg', '2022-11-27 02:21:45', NULL),
(12, 14, 'upload/products/multi-images/1750621650572543.jpg', '2022-11-27 02:21:46', NULL),
(13, 15, 'upload/products/multi-images/1750622029056395.jpg', '2022-11-27 02:27:47', NULL),
(14, 15, 'upload/products/multi-images/1750622029263962.jpg', '2022-11-27 02:27:47', NULL),
(15, 15, 'upload/products/multi-images/1750622029432755.jpg', '2022-11-27 02:27:47', NULL),
(16, 16, 'upload/products/multi-images/1750622255537987.jpg', '2022-11-27 02:31:23', NULL),
(17, 16, 'upload/products/multi-images/1750622255790844.jpg', '2022-11-27 02:31:23', NULL),
(18, 16, 'upload/products/multi-images/1750622256060495.jpg', '2022-11-27 02:31:23', NULL),
(19, 17, 'upload/products/multi-images/1750622554333794.jpg', '2022-11-27 02:36:07', NULL),
(20, 17, 'upload/products/multi-images/1750622554556367.jpg', '2022-11-27 02:36:08', NULL),
(21, 17, 'upload/products/multi-images/1750622554723181.jpg', '2022-11-27 02:36:08', NULL),
(22, 18, 'upload/products/multi-images/1750622932739314.jpg', '2022-11-27 02:42:08', NULL),
(23, 18, 'upload/products/multi-images/1750622932910787.jpg', '2022-11-27 02:42:09', NULL),
(24, 18, 'upload/products/multi-images/1750622933110565.jpg', '2022-11-27 02:42:09', NULL),
(25, 19, 'upload/products/multi-images/1750831259534552.jpg', '2022-11-29 09:53:24', NULL),
(26, 19, 'upload/products/multi-images/1750831259691865.jpg', '2022-11-29 09:53:24', NULL),
(27, 19, 'upload/products/multi-images/1750831259842080.jpg', '2022-11-29 09:53:25', NULL),
(28, 20, 'upload/products/multi-images/1751113453847122.jpg', '2022-12-02 12:38:46', NULL),
(29, 20, 'upload/products/multi-images/1751113453971002.jpg', '2022-12-02 12:38:46', NULL),
(30, 20, 'upload/products/multi-images/1751113454090583.jpg', '2022-12-02 12:38:46', NULL),
(31, 21, 'upload/products/multi-images/1757541717580546.jpeg', '2023-02-11 11:33:16', NULL),
(32, 21, 'upload/products/multi-images/1757541717721838.jpeg', '2023-02-11 11:33:16', NULL),
(33, 21, 'upload/products/multi-images/1757541717863494.jpeg', '2023-02-11 11:33:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trsnsition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `notes`, `post_code`, `payment_type`, `payment_method`, `trsnsition_id`, `currency`, `amount`, `order_number`, `invoice_number`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_order`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 1, 1, 'user laravel', 'user@example.com', '0111111111', 'final', 42312, 'card_1MOj5xAZSzg6tHElQxotFLTJ', 'Stripe', 'txn_3MOj5yAZSzg6tHEl3hEkU2GE', 'usd', 6103.00, '63bd7a4d5e12c', 'MSS53883355', '10 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-01-10 12:46:39', '2023-03-14 09:35:48'),
(2, 9, 1, 1, 1, 'user laravel', 'user@example.com', '0111111111', 'final', NULL, 'card_1MOj7HAZSzg6tHElXh3yyxap', 'Stripe', 'txn_3MOj7IAZSzg6tHEl0fIFLjcL', 'usd', 6103.00, '63bd7a9f3a178', 'MSS58132039', '10 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-01-10 12:48:00', '2023-01-16 06:01:44'),
(3, 9, 1, 1, 1, 'user laravel', 'user@example.com', '0111111111', 'test', 12545, 'card_1MOjKZAZSzg6tHElZTsbdiFU', 'Stripe', 'txn_3MOjKaAZSzg6tHEl0RuAwzsw', 'usd', 58.00, '63bd7dd761c02', 'MSS30086125', '10 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'canceled', '2023-01-10 13:01:46', '2023-01-16 06:16:14'),
(4, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'notes', NULL, 'card_1MPSiFAZSzg6tHElM5mfa2kA', 'Stripe', 'txn_3MPSiGAZSzg6tHEl260QGZjQ', 'usd', 32.00, '63c0274372df2', 'MSS67339013', '12 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-01-12 13:29:10', '2023-01-31 11:14:58'),
(5, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'test', 42132, 'card_1MPSjKAZSzg6tHElWkxxiTZD', 'Stripe', 'txn_3MPSjLAZSzg6tHEl2mVrmJHc', 'usd', 6103.00, '63c027863bd05', 'MSS70370982', '12 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-01-12 13:30:15', '2023-03-14 11:05:56'),
(6, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'test', 42312, 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 3532.00, '63c027863bd02', 'MSS75808009', '13 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '27 January 2023', '2', 'mistaken', 'delivered', '2023-01-13 13:27:07', '2023-01-27 13:08:43'),
(7, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'test', 42312, 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 6103.00, '63c027863bd09', 'MSS68111946', '25 January 2023', 'January', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '25 January 2023', '1', 'Broke', 'delivered', '2023-01-25 09:59:23', '2023-01-25 11:02:59'),
(8, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'note', 42123, 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 49980.00, NULL, 'MSS56290798', '11 February 2023', 'February', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-02-11 11:39:29', '2023-03-14 09:42:11'),
(9, 11, 1, 1, 1, 'ahmadothman', 'user@mail.com', '01234567890', 'test', 42312, 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 1400.00, NULL, 'MSS40881720', '14 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-03-14 12:34:28', '2023-03-14 12:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 17, 'Red', 'Large', '1', 6103.00, NULL, NULL),
(2, 3, 20, 'Black', 'Large', '3', 32.00, NULL, NULL),
(3, 4, 20, 'Red', 'Small', '1', 32.00, NULL, NULL),
(4, 5, 17, 'Red', 'Large', '1', 6103.00, NULL, NULL),
(5, 6, 14, 'Black', NULL, '1', 3500.00, NULL, NULL),
(6, 6, 20, 'Red', 'Small', '1', 32.00, NULL, NULL),
(7, 7, 17, 'Black', 'Large', '1', 6103.00, NULL, NULL),
(8, 8, 21, 'Red', 'Small', '2', 24990.00, NULL, NULL),
(9, 9, 13, 'Black', 'small', '1', 1400.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@example.com', '$2y$10$YYg/.jXl98KgR/sfOPbjH.C98H//Qlcl4F/EGNgcXFkz3e/jlPOfq', '2023-01-10 13:38:31'),
('user@mail.com', '$2y$10$SujwNLVV8V2MTtvmr4JxOumWgMy0OqTaSP3/.sVEJGUZd0q5VhLIq', '2023-01-12 05:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_qty` int(255) DEFAULT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `spacial_offer` int(11) DEFAULT NULL,
  `spacial_deals` int(11) DEFAULT NULL,
  `digital_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_ar`, `product_slug_en`, `product_slug_ar`, `product_code`, `product_qty`, `selling_qty`, `product_tags_en`, `product_tags_ar`, `product_size_en`, `product_size_ar`, `product_color_en`, `product_color_ar`, `selling_price`, `discount_price`, `short_desc_en`, `short_desc_ar`, `long_desc_en`, `long_desc_ar`, `product_thambnail`, `hot_deals`, `featured`, `spacial_offer`, `spacial_deals`, `digital_file`, `status`, `created_at`, `updated_at`) VALUES
(13, 7, 9, 12, 12, 'AuKing Mini Projector', 'جهاز عرض صغير', 'auking-mini-projector', 'جهاز-عرض-صغير', '2023Upgraded', '149', 2, 'Projector', 'جهاز عرض فيديو محمول', 'small', 'صغير,ميني', 'Black,White', 'ابيض, اسود', '1800', '1400', '2022 Upgraded mini projector equipped with 2000:1 contrast ratio, supported 1080p resolution, brings you a 35% brighter images than similar projectors in market. It provides you with a premium home', '2022 بروجيكتور صغير مطور ومجهز بنسبة تباين 2000: 1 ، ودقة 1080 بكسل المدعومة ، يجلب لك صورًا أكثر سطوعًا بنسبة 35٪ من أجهزة العرض المماثلة في السوق. يوفر لك منزلًا متميزًا', '<p>★【2 Year Satisfied Warranty】Our team offers every customer 100% satisfaction guarantee. If you have any problems while using, please feel free to contact us. Please rest assured that we also have 2 year warranty. Not recommended for PPT, or business presentation, it is a home theater projector. You can enjoy the fun at outdoor journey in dark.</p>', '<p>★ 【جهاز عرض مسرح منزلي فائق】 2022 جهاز عرض صغير مطور ومجهز بنسبة تباين 2000: 1 ، ودقة 1080 بكسل المدعومة ، يوفر لك صورًا أكثر سطوعًا بنسبة 35٪ من أجهزة العرض المماثلة في السوق. يوفر لك تجربة سينما منزلية متميزة مع شاشة أكبر وصورة أوضح.<br />\r\n★ 【شاشة كبيرة ومكبرات صوت مدمجة يحتوي جهاز العرض المصغر على شاشة عرض من 32 إلى 170 بوصة بمسافة عرض من 1 إلى 5 أمتار. توفر مكبرات الصوت المدمجة جودة صوت عالية ممتازة ، كما يمكنك توصيلها بمكبرات صوت خارجية لتلبية احتياجاتك الصوتية عالية الجودة.<br />\r\n★ 【ضوضاء منخفضة وعمر طويل للمصباح】 ضوضاء جهاز العرض أقل وأكثر متانة من الموديلات السابقة بفضل تقنية التبريد المتقدمة للمروحة. يعمل نظام التبريد القوي على تبريد حرارة المصباح بكفاءة ، مما يطيل عمر المصباح إلى 55000 ساعة ، مما يعني أنه يمكنك استخدامه لأكثر من 15 عامًا.<br />\r\n★ 【اتصال أجهزة متعددة ومحمولة】 جهاز عرض الأفلام المحمول هذا مناسب لتشغيل مقاطع الفيديو والمسلسلات التلفزيونية ومشاركة الصور ومباريات كرة القدم وما إلى ذلك ، ويمكن توصيله بسهولة بأجهزة الكمبيوتر المحمولة والهواتف الذكية والأجهزة اللوحية ومحركات أقراص USB و X-Box ONE للاستمتاع بشكل كبير ألعاب. ★★★ عند الاتصال بالهاتف ، يرجى شراء محول HDMI إضافي. يرجى ملاحظة أن أجهزة العرض المزودة بمرآة غير متوافقة مع Netflix و Hulu بسبب مشكلات حقوق النشر.<br />\r\n★ 【ضمان راضٍ لمدة عامين】 يقدم فريقنا ضمان إرضاء كل عميل بنسبة 100٪. إذا كان لديك أي مشاكل أثناء الاستخدام ، فلا تتردد في الاتصال بنا. يرجى أن تطمئن إلى أن لدينا أيضًا ضمان لمدة عامين. لا يوصى باستخدامه في PPT أو عرض الأعمال ، فهو جهاز عرض مسرحي منزلي. يمكنك الاستمتاع بالمرح في رحلة في الهواء الطلق في الظلام.</p>', 'upload/products/thambnail/1749916777154059.jpg', 1, NULL, NULL, NULL, NULL, 1, '2022-11-20 09:51:40', '2023-03-14 12:36:18'),
(14, 2, 9, 20, 43, 'Samsung Galaxy A04s', 'سامسونج A04S', 'samsung-galaxy-a04s', 'سامسونج-A04S', 'A04s, 64GB, 4GB', '200', 5, 'Dual Sim ', 'A04s,Dual Sim', '', 'Large', 'Black', 'اسود', '3875', '3500', 'Samsung Galaxy A04 S, 64GB, Dual Sim, Black', 'Samsung Galaxy A04 S, 64GB, Dual Sim, Black', '<p>Maximize your view to the fullest<br />\r\nMinimal look, quality design<br />\r\nCapture more moments with Triple Camera</p>', '<p>تكبير وجهة نظرك على أكمل وجه<br />\r\nالحد الأدنى من المظهر والجودة التصميم<br />\r\nالتقط المزيد من اللحظات مع الكاميرا الثلاثية</p>', 'upload/products/thambnail/1750621648851968.jpg', 1, 1, 1, NULL, NULL, 1, '2022-11-30 11:02:06', '2022-11-30 11:02:06'),
(15, 2, 9, 20, 43, 'Galaxy A23 Dual SIM', 'جالكسي A23 ثنائي الشريحة', 'galaxy-a23-dual-sim', 'جالكسي-A23-ثنائي-الشريحة', 'BLACK 4GB RAM 128GB 4G', '150', 3, 'Dual Sim', 'Samsung Galaxy,A23 Dual SIM', 'Large', 'Large', 'Black,White', 'ابيض, اسود', '4899', '4500', 'Samsung Galaxy A23 Dual SIM BLACK 4GB RAM 128GB 4G', 'Samsung Galaxy A23 Dual SIM BLACK 4GB RAM 128GB 4G', '<p>&nbsp;display attribute: ce display on website<br />\r\nmemory storage capacity: unit:GB value:128.0<br />\r\nItem Category: cellular phone</p>', '<p>سمة العرض: عرض ce على الموقع<br />\r\nسعة تخزين الذاكرة: الوحدة: قيمة جيجابايت: 128.0<br />\r\nفئة العنصر: الهاتف الخلوي</p>', 'upload/products/thambnail/1750622028822396.jpg', NULL, NULL, 1, 1, NULL, 1, '2023-03-01 11:12:18', '2023-03-01 11:12:18'),
(16, 3, 9, 20, 43, 'Xiaomi Redmi Note 11', 'شاومي ريدمي نوت 11', 'xiaomi-redmi-note-11', 'شاومي-ريدمي-نوت-11', 'Xiaomi Redmi Note 11,90 Hz Amoled', '200', 10, 'Dual Sim', 'Xiaomi Redmi Note', 'Large', 'Large', 'Red,Black,White', 'احمر,ابيض,اسود', '6290', '6190', 'Xiaomi Redmi Note 11,90 Hz Amoled Pioneer, 128 GB, 6GB RAM, Graphite Gray', 'Xiaomi Redmi Note 11,90 Hz Amoled Pioneer, 128 GB, 6GB RAM, Graphite Gray', '<p>&nbsp; Storage: 128 GB<br />\r\n&nbsp;&nbsp;&nbsp; RAM: 6GB<br />\r\n&nbsp;&nbsp;&nbsp; Color:Graphite Gray<br />\r\n&nbsp;&nbsp;&nbsp; Camera: 50 MP + 8MP+2MP + 2MP<br />\r\n&nbsp;&nbsp;&nbsp; Fast Charging: 33W</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; التخزين: 128 جيجا بايت<br />\r\n&nbsp;&nbsp;&nbsp; ذاكرة الوصول العشوائي: 6 جيجابايت<br />\r\n&nbsp;&nbsp;&nbsp; اللون: رمادي جرافيت<br />\r\n&nbsp;&nbsp;&nbsp; الكاميرا: 50 ميجا بيكسل + 8 ميجا بيكسل + 2 ميجا بيكسل + 2 ميجا بيكسل<br />\r\n&nbsp;&nbsp;&nbsp; الشحن السريع: 33 واط</p>', 'upload/products/thambnail/1750622255307153.jpg', 1, NULL, NULL, NULL, NULL, 1, '2023-03-01 11:11:56', '2023-03-01 11:11:56'),
(17, 5, 9, 20, 43, 'Redmi 10', 'ريدمى نوت 10', 'redmi-10', 'ريدمى-نوت-10', 'Redmi 10,', '199', 4, 'Dual Sim', 'Dual Sim,Redmi 10', 'Large', 'Large', 'Red,Black,White', 'ابيض', '6103', NULL, 'Redmi 10, 6GB RAM, 128GB,CARBON GREY, Dual Sim', 'Redmi 10, 6GB RAM, 128GB,CARBON GREY, Dual Sim', '<p>&nbsp;The type and location of SIM card slot on Redmi 10 2022 is slightly different from that of Redmi 10<br />\r\nHelio G88 processor<br />\r\ndual speakers. Listen to music with crisp stereo sound directly from your phone</p>', '<p>يختلف نوع وموقع فتحة بطاقة SIM في Redmi 10 2022 قليلاً عن تلك الموجودة في Redmi 10<br />\r\nمعالج Helio G88<br />\r\nمكبرات صوت مزدوجة. استمع إلى الموسيقى بصوت ستيريو واضح مباشرة من هاتفك</p>', 'upload/products/thambnail/1750622554149367.jpg', NULL, 1, NULL, 1, NULL, 1, '2023-03-01 11:10:55', '2023-03-14 11:05:56'),
(18, 4, 9, 13, 44, 'Apple AirPods', 'ابل ايربودز', 'apple-airpods', 'ابل-ايربودز', 'MV7N2RU/A', '0', 6, 'AirPods', 'AirPods,Apple', 'Medium', 'Medium', 'White', 'ابيض', '4999', '4900', 'Apple AirPods with Charging Case, MV7N2RU/A - White', 'Apple AirPods with Charging Case, MV7N2RU/A - White', '<p>Brand: Apple<br />\r\nColor: White<br />\r\nCountry of Origin: China<br />\r\nsuitable weight<br />\r\nitem package weight: 176.0</p>', '<p>الماركة: آبل<br />\r\nاللون الابيض<br />\r\nبلد المنشأ: الصين<br />\r\nوزن مناسب<br />\r\nوزن حزمة الصنف: 176.0</p>', 'upload/products/thambnail/1750622933110565.jpg', NULL, 1, 1, 1, NULL, 1, '2023-03-01 11:10:10', '2023-03-01 11:10:10'),
(19, 10, 8, 10, 39, 'adidas Athletic 6-Pack Crew Socks', '6 أزواج من الجوارب الرياضية أديداس', 'adidas-athletic-6-pack-crew-socks', '6-أزواج-من-الجوارب-الرياضية-أديداس', '6-Pack', '300', 3, 'شراب رجالى', 'Socks', 'Large', 'Large', 'Black', 'اسود', '18', '14', 'adidas Athletic 6-Pack Crew Socks', '6 أزواج من الجوارب الرياضية أديداس', '<p>Size: Large<br />\r\nColor: Black/Aluminum 2</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; 97% Polyester, 3% Spandex<br />\r\n&nbsp;&nbsp;&nbsp; Imported<br />\r\n&nbsp;&nbsp;&nbsp; Machine wash in cold with like colors. Non-chlorine bleach. Tumble dry low<br />\r\n&nbsp;&nbsp;&nbsp; Cushioned in the foot for comfort and durability.<br />\r\n&nbsp;&nbsp;&nbsp; Moisture-wicking yarns keep feet dry from sweat.<br />\r\n&nbsp;&nbsp;&nbsp; Arch compression for a secure fit.</p>\r\n\r\n<p>&nbsp;</p>', '<p>الحجم: كبير<br />\r\nاللون: أسود / ألومنيوم 2</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; 97٪ بوليستر ، 3٪ سباندكس<br />\r\n&nbsp;&nbsp;&nbsp; مستورد<br />\r\n&nbsp;&nbsp;&nbsp; يُغسل في الغسالة بماء بارد بألوان متشابهة. مبيض خالٍ من الكلور. تعثر منخفض جاف<br />\r\n&nbsp;&nbsp;&nbsp; مبطن في القدم لراحة ومتانة.<br />\r\n&nbsp;&nbsp;&nbsp; خيوط ماصة للرطوبة تحافظ على جفاف القدمين من العرق.<br />\r\n&nbsp;&nbsp;&nbsp; ضغط القوس لملاءمة آمنة.</p>', 'upload/products/thambnail/1759534386051653.jpg', 1, NULL, 1, 1, NULL, 1, '2023-03-05 11:20:05', '2023-03-05 11:25:53'),
(20, 10, 8, 8, 6, 'Shirt Business', 'قميص الأعمال', 'shirt-business', 'قميص-الأعمال', 'Slim Fit Dress', '99', 20, 'Business Shirts', 'قمصان طويلة الأكمام,قميص الأعمال', 'Small,Medium,Large,xxlarge', 'Small,Medium,Large,xxlarge', 'Red,Black,White', 'احمر,اخضر,بنفسجى', '35', '32', 'COOFANDY Men\'s Slim Fit Dress Shirt Business Casual Button Down Shirts Long Sleeve Work Shirt with Pockets', 'قميص COOFANDY للرجال بقصة ضيقة قميص عمل كاجوال بأزرار لأسفل قميص عمل بأكمام طويلة مع جيوب', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; 100% Polyester<br />\r\n&nbsp;&nbsp;&nbsp; Imported<br />\r\n&nbsp;&nbsp;&nbsp; Button closure<br />\r\n&nbsp;&nbsp;&nbsp; Machine Wash<br />\r\n&nbsp;&nbsp;&nbsp; Excellent Material: High quality fabric is lightweight and breathable, this material provides you a sharp classy look all time and makes you feel comfortable when wearing.<br />\r\n&nbsp;&nbsp;&nbsp; Classic Design: Slim fit button down shirt designs in unique stripes, turn down collar, long sleeves, two front pockets, standard button cuffs and a contrast trim fabric to make you handsome and fashionable.<br />\r\n&nbsp;&nbsp;&nbsp; Smart Outfits: This mens stylish dress shirts can be worn tucked or untucked pairing, it can be paired with suit jacket and dress pants for a formal outfits, or matches chino pants, jeans, cargo pants for casual occasions.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; Occasions: This smart shirt is essential in mens wardrobe and greats for all season, suitable for business, work, party, wedding, home, dating, prom, nightclub, concert, holiday, travel, daily,casual and so on.<br />\r\n&nbsp;&nbsp;&nbsp; Garment Care: Machine Washable. Please refer to the size information on the product page to ensure accurate fitting.</p>\r\n\r\n<p>Show less</p>\r\n\r\n<p>&nbsp;</p>', '<p>100٪ بوليستر<br />\r\n&nbsp;&nbsp;&nbsp; مستورد<br />\r\n&nbsp;&nbsp;&nbsp; زر الإغلاق<br />\r\n&nbsp;&nbsp;&nbsp; غسالة<br />\r\n&nbsp;&nbsp;&nbsp; مادة ممتازة: نسيج عالي الجودة خفيف الوزن وقابل للتنفس ، هذه المادة توفر لك مظهرًا أنيقًا حادًا طوال الوقت وتجعلك تشعر بالراحة عند ارتدائها.<br />\r\n&nbsp;&nbsp;&nbsp; تصميم كلاسيكي: تصميمات قميص بأزرار متناسقة بخطوط فريدة ، وياقة مقلوبة ، وأكمام طويلة ، وجيبان أماميان ، وأساور بأزرار قياسية ، ونسيج متباين ليجعلك وسيمًا وعصريًا.<br />\r\n&nbsp;&nbsp;&nbsp; ملابس ذكية: يمكن ارتداء هذه القمصان الرجالية الأنيقة مطوية أو غير مدسوسة ، ويمكن إقرانها مع جاكيت بدلة وسراويل رسمية لملابس رسمية ، أو مطابقة بنطلون تشينو أو جينز أو سروال كارغو للمناسبات غير الرسمية.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; المناسبات: هذا القميص الذكي ضروري في خزانة الملابس الرجالية والعظماء لجميع المواسم ، ومناسب للعمل ، والعمل ، والحفلات ، والزفاف ، والمنزل ، والمواعدة ، والحفلات الراقصة ، والحفلات الموسيقية ، والعطلات ، والسفر ، واليومية ، وغير الرسمية ، وما إلى ذلك.<br />\r\n&nbsp;&nbsp;&nbsp; العناية بالملابس: يمكن غسلها في الغسالة. يرجى الرجوع إلى معلومات الحجم الموجودة على صفحة المنتج لضمان التركيب الدقيق.</p>\r\n\r\n<p>عرض أقل</p>', 'upload/products/thambnail/1751113453656861.jpg', 1, 1, 1, 1, NULL, 1, '2023-03-01 11:11:30', '2023-03-01 11:11:30'),
(21, 2, 9, 20, 43, 'samsung galaxy 2023', 'جلاكسى 2023', 'samsung-galaxy-2023', 'جلاكسى-2023', '202312345', '96', 23, 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Medium,Large', 'Small,Medium,Large', 'Red,Black,White', 'ابيض اسود اخضر', '25000', '24990', 'new', 'جديد', '<p>new phone galaxy</p>', '<p>جديد 2023 جلاكسى</p>', 'upload/products/thambnail/1757541717094789.jpeg', 1, 1, NULL, 1, '20230211133315.pdf', 1, '2023-03-01 11:10:32', '2023-03-14 09:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `summary`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 11, 'this is a good shirt', 'so far so good', 5, '1', '2023-01-27 17:20:10', '2023-01-28 07:09:02'),
(2, 17, 11, 'good device hard working', 'good device', 3, '1', '2023-01-27 17:22:28', '2023-01-28 07:10:29'),
(4, 20, 11, 'nice rating', 'nice', 4, '1', '2023-02-11 05:49:38', '2023-02-11 05:50:39'),
(5, 20, 11, 'rating', 'rating', 2, '1', '2023-02-11 06:10:35', '2023-02-11 06:10:43'),
(6, 20, 11, 'good', 'good', 5, '1', '2023-02-11 06:32:13', '2023-02-11 06:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'mansoura aikikai', 'mansoura aikido aikikai', 'aikido,self defence,aikikai', 'Aikido is a modern Martial Art created by the Founder, Morihei Ueshiba. After the Founder\'s passing, his son Kisshomaru Ueshiba was inaugurated as Aikido Doshu. At present, Moriteru Ueshiba has succeeded his father as Aikido Doshu.\r\n\r\nThe Aikikai Foundation is an association that was established in order to support inheritance of Aikido created by the Founder, to train body and mind through Aikido and to promote Aikido. Today, Aikido has become established in 140 countries around the world.\r\nAikido Hombu Dojo was built in 1931. Under Doshu, a great number of Shihan and Shidoin unite in their efforts to commit to the development and', 'google-analytics', NULL, '2023-01-25 05:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CdDYs7KkDVVJ2xCytxO93iEjsXn4RWdFtwU7m4Qo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0NPeGJndjAxTER1QTRpUktQeVFuNEZQNkJkbWdObVBTTjA1VXRVbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1678975099),
('f6oCLwC91KKsnRkrvaMDw4olZJcvCOZUxrVwZRd4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUFZpazZkUjFhdlhsRWIyeTg5a2NLcm9meDU5NHdCT2pDWWF2OW9mTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1678975101),
('Iy4KmnV8Gvu133HlNU4O9OWvdUxShFiNGVtCQk0m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNU5va2pIemM0YzVNUm5xZUNrTzJNU3dMRjB5ZWxzVDlOOHJ1MDhKQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1678975101),
('kHQ5bADb3K1401xaSt3T5Dd2kp01z0XS9voON5RR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMkZ1bWJLT2wyeFN5MVNaUXhyR2R2QUw3MlB4Ukg5a0h6ZHI3eHpIUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1678975101),
('LwOJ771N5kgMbWsV5nwkusjyeW8mtbGOEGgj5x30', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiSWNhUVozQTF6N0w5TXRFdmxRMnZnTWVxeTNFWFhyUlJnZnZKVno4bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL215Y2FydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkVFFkckIyTUcvSS9jUjhHeUhQa1JKdU4xS3hNRHpUZXkvd0d5UndOVFNGQlprM3dmUG9YYkMiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFlUbTg1Z1hvZUkuckl5MUlVbi41YnVtRGFoTXJ6YVljZ1pDVWFHZm55ZTBaS3RrMDVCZkRLIjtzOjQ6ImNhcnQiO2E6MTp7czo3OiJkZWZhdWx0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YToxOntzOjMyOiIxZGQ5ZGIyODc3ZDNhODVmZDA1YWVmNWZiMDk4MmVhMCI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjExOntzOjU6InJvd0lkIjtzOjMyOiIxZGQ5ZGIyODc3ZDNhODVmZDA1YWVmNWZiMDk4MmVhMCI7czoyOiJpZCI7czoyOiIyMSI7czozOiJxdHkiO3M6MToiMSI7czo0OiJuYW1lIjtzOjE5OiJzYW1zdW5nIGdhbGF4eSAyMDIzIjtzOjU6InByaWNlIjtkOjI0OTkwO3M6Njoid2VpZ2h0IjtkOjE7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo0OiJzaXplIjtzOjY6Ik1lZGl1bSI7czo1OiJjb2xvciI7czozOiJSZWQiO3M6NToiaW1hZ2UiO3M6NDc6InVwbG9hZC9wcm9kdWN0cy90aGFtYm5haWwvMTc1NzU0MTcxNzA5NDc4OS5qcGVnIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjc6InRheFJhdGUiO2k6MDtzOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtOO3M6NDY6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBkaXNjb3VudFJhdGUiO2k6MDtzOjg6Imluc3RhbmNlIjtzOjc6ImRlZmF1bHQiO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319fQ==', 1678976275),
('Vrgg41hroTLaUo5rQR1vYiNZWfG8ln56soqagrZG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibnByMENjZEF6b3ByTk83bmpLdWVZVFJyVmx1STA0UElMVUFwZDVUUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1678975101);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE IF NOT EXISTS `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'MANSOURA', '2022-12-28 05:02:45', NULL),
(3, 1, 'DEKERNES', '2022-12-28 05:06:11', NULL),
(4, 2, 'RAMSISS', '2022-12-28 05:54:25', '2022-12-28 05:54:25'),
(5, 2, 'HELWAN', '2022-12-28 05:06:50', NULL),
(6, 4, 'LUXOR', '2022-12-28 05:17:18', NULL),
(7, 1, 'SHIRBIN', '2022-12-28 05:58:29', NULL),
(8, 5, 'ASSUIT', '2023-01-07 08:27:16', NULL),
(9, 5, 'ALFATH', '2023-01-07 08:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE IF NOT EXISTS `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'DAKAHLIA', '2022-12-27 12:28:20', '2022-12-27 12:28:20'),
(2, 'CAIRO', '2022-12-27 11:41:32', NULL),
(4, 'LUXOR', '2022-12-27 12:28:27', NULL),
(5, 'ASSUT', '2022-12-27 12:30:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE IF NOT EXISTS `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ahmad maher street', '2022-12-28 09:52:31', NULL),
(2, 2, 4, 'abbassia', '2022-12-28 09:55:17', NULL),
(4, 2, 3, 'fsdfsd', '2023-01-02 05:18:39', NULL),
(5, 1, 1, 'meet khamr', '2023-01-07 06:54:37', NULL),
(6, 1, 1, 'aga', '2023-01-07 06:54:45', NULL),
(7, 1, 1, 'senbelaween', '2023-01-07 06:55:00', NULL),
(8, 5, 9, 'alfath', '2023-01-07 08:27:44', NULL),
(9, 5, 8, 'assuit', '2023-01-07 08:27:51', NULL),
(10, 4, 6, 'armant', '2023-01-07 08:28:56', NULL),
(11, 4, 6, 'isna', '2023-01-07 08:29:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1755796334317428.png', '12345678910', '0123456789', 'mansoura@aikido.com', 'Aikikai', 'Dakahlia/Mansoura', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkdin.com/', 'https://www.youtube.com/', NULL, '2023-01-23 05:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1750211047593239.jpg', 'test', 'this is test image', 1, '2022-11-22 13:35:24', '2022-11-25 17:44:45'),
(3, 'upload/slider/1750496933220060.jpg', 'first', 'first slider number one', 1, '2022-11-25 17:19:26', '2022-11-25 17:44:43'),
(4, 'upload/slider/1750496959440659.jpg', 'second', 'second slider number three', 1, '2022-11-25 17:19:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_ar`, `subcategory_slug_en`, `subcategory_slug_ar`, `created_at`, `updated_at`) VALUES
(8, 8, 'Mans Top Ware', 'ملابس رجالى للخروج', 'mans-top-ware', 'ملابس-رجالى-للخروج', NULL, NULL),
(9, 8, 'Mans Bottom Ware', 'بنطلون رجالى', 'mans-bottom-ware', 'بنطلون-رجالى', NULL, NULL),
(10, 8, 'Mans Footwear', 'أحذية رجالى', 'mans-footwear', 'أحذية-رجالى', NULL, NULL),
(11, 8, 'Women Footwear', 'أحذية نسائية', 'women-footwear', 'أحذية-نسائية', NULL, NULL),
(12, 9, 'Computer Peripherals', 'ملحقات إلكترونية', 'computer-peripherals', 'ملحقات-إلكترونية', NULL, NULL),
(13, 9, 'Mobile Accessory', 'ملحقات موبايل', 'mobile-accessory', 'ملحقات-موبايل', NULL, NULL),
(14, 9, 'Gaming', 'ألعاب', 'gaming', 'ألعاب', NULL, NULL),
(15, 10, 'Bed Liners', 'البطاطين', 'bed-liners', 'البطاطين', NULL, NULL),
(16, 10, 'Living Room', 'غرف المعيشة', 'living-room', 'غرف-المعيشة', NULL, NULL),
(17, 11, 'Televisions', 'التليفزيون', 'televisions', 'التليفزيون', NULL, NULL),
(18, 11, 'Washing Machines', 'الغسالات', 'washing-machines', 'الغسالات', NULL, NULL),
(19, 11, 'Refrigerators', 'الثلاجات', 'refrigerators', 'الثلاجات', NULL, NULL),
(20, 9, 'Mobile Phone', 'التليفونات المحمولة', 'mobile-phone', 'التليفونات-المحمولة', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_ar`, `subsubcategory_slug_en`, `subsubcategory_slug_ar`, `created_at`, `updated_at`) VALUES
(6, 8, 8, 'Mans Tshirt', 'قميص رجالى', 'mans-tshirt', 'قميص-رجالى', NULL, NULL),
(7, 8, 9, 'Mans Jeans', 'جينز رجالى', 'mans-jeans', 'جينز-رجالى', NULL, NULL),
(8, 8, 10, 'Mans Sports Shoes', 'أحذية رياضية', 'mans-sports-shoes', 'أحذية-رياضية', NULL, NULL),
(9, 8, 11, 'Women Flats', 'شباشب حريمى', 'women-flats', 'شباشب-حريمى', NULL, NULL),
(10, 9, 12, 'Printers', 'طابعات', 'printers', 'طابعات', NULL, NULL),
(11, 9, 12, 'Monitors', 'شاشات', 'monitors', 'شاشات', NULL, NULL),
(12, 9, 12, 'Projectors', 'بروجيكتور', 'projectors', 'بروجيكتور', NULL, NULL),
(13, 9, 13, 'Plain Cases', 'حافظات للموبايل', 'plain-cases', 'حافظات-للموبايل', NULL, NULL),
(14, 9, 13, 'Designer Cases', 'حافظات مصممة', 'designer-cases', 'حافظات-مصممة', NULL, NULL),
(15, 9, 13, 'Screen Guards', 'حافظات للشاشة', 'screen-guards', 'حافظات-للشاشة', NULL, NULL),
(16, 9, 14, 'Gaming Mouse', 'ماوس للألعاب', 'gaming-mouse', 'ماوس-للألعاب', NULL, NULL),
(17, 9, 14, 'Gaming Keyboars', 'لوحة مفاتيح للألعاب', 'gaming-keyboars', 'لوحة-مفاتيح-للألعاب', NULL, NULL),
(18, 9, 14, 'Gaming Mousepads', 'بادة ماوس للألعاب', 'gaming-mousepads', 'بادة-ماوس-للألعاب', NULL, NULL),
(19, 10, 15, 'Bedsheets', 'شراشف', 'bedsheets', 'شراشف', NULL, NULL),
(20, 10, 15, 'Blankets', 'بطانيات', 'blankets', 'بطانيات', NULL, NULL),
(21, 10, 16, 'Tv Units', 'وحدات التليفزيون', 'tv-units', 'وحدات-التليفزيون', NULL, NULL),
(22, 10, 16, 'Dining Sets', 'أدوات المطبخ', 'dining-sets', 'أدوات-المطبخ', NULL, NULL),
(23, 10, 16, 'Coffee Tables', 'ترابيزات القهوة', 'coffee-tables', 'ترابيزات-القهوة', NULL, NULL),
(24, 10, 16, 'Home Decor', 'ديكور المنزل', 'home-decor', 'ديكور-المنزل', NULL, NULL),
(25, 10, 16, 'Lightings', 'الإضائات', 'lightings', 'الإضائات', NULL, NULL),
(26, 10, 16, 'Clocks', 'ساعات', 'clocks', 'ساعات', NULL, NULL),
(27, 10, 16, 'Wall Decor', 'ديكور الحائط', 'wall-decor', 'ديكور-الحائط', NULL, NULL),
(28, 11, 17, 'Big Screen TVs', 'شاشات كبيرة الحجم', 'big-screen-tvs', 'شاشات-كبيرة-الحجم', NULL, NULL),
(29, 11, 17, 'Smart TVs', 'شاشات سمارت', 'smart-tvs', 'شاشات-سمارت', NULL, NULL),
(30, 11, 17, 'OLED TVs', 'شاشات اولد', 'oled-tvs', 'شاشات-اولد', NULL, NULL),
(31, 11, 18, 'Washer Dryers', 'مجفف الملابس', 'washer-dryers', 'مجفف-الملابس', NULL, NULL),
(32, 11, 18, 'Washer Only', 'غسيل فقط', 'washer-only', 'غسيل-فقط', NULL, NULL),
(33, 11, 18, 'Energy Efficient', 'موفر الطاقة', 'energy-efficient', 'موفر-الطاقة', NULL, NULL),
(34, 11, 19, 'Single Door', 'باب واحد', 'single-door', 'باب-واحد', NULL, NULL),
(35, 11, 19, 'Double Door', 'ثلاجة بابين', 'double-door', 'ثلاجة-بابين', NULL, NULL),
(36, 11, 19, 'Mini Rerigerators', 'ثلاجات صغيرة', 'mini-rerigerators', 'ثلاجات-صغيرة', NULL, NULL),
(37, 8, 9, 'Mans Trousers', 'بناطيل رجالى', 'mans-trousers', 'بناطيل-رجالى', NULL, NULL),
(38, 8, 9, 'Mans Cargos', 'بجامات رجالى', 'mans-cargos', 'بجامات-رجالى', NULL, NULL),
(39, 8, 10, 'Mans Casual Shoes', 'احذية كاجوال', 'mans-casual-shoes', 'احذية-كاجوال', NULL, NULL),
(40, 8, 10, 'Mans Formal Shoes', 'احذية مناسبات رسمية', 'mans-formal-shoes', 'احذية-مناسبات-رسمية', NULL, NULL),
(41, 8, 11, 'Women Heels', 'احذية نسائية بكعب عالى', 'women-heels', 'احذية-نسائية-بكعب-عالى', NULL, NULL),
(42, 8, 11, 'Woman Sheakers', 'احذية نسائية رياضية', 'woman-sheakers', 'احذية-نسائية-رياضية', NULL, NULL),
(43, 9, 20, 'new arrivals', 'أحدث موبايلات', 'new-arrivals', 'أحدث-موبايلات', NULL, NULL),
(44, 9, 13, 'Hearphones-earbuds', 'سماعات الاذن', 'hearphones-earbuds', 'سماعات-الاذن', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Lowell Prosacco PhD', 'bergnaum.carter@example.net', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'g1MqXK73lK', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(2, 'Nola Keeling', 'kshlerin.kade@example.org', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'lacqCvbg4R', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(3, 'Demario Stamm', 'hallie58@example.org', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'w06aNuP6tC', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(4, 'Jamison Schmidt MD', 'leilani.williamson@example.net', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'fGL1Ma6Xjx', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(5, 'Darien McGlynn', 'avery.beahan@example.org', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'gzG3C42MuD', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(6, 'Lonny Buckridge', 'bobbie.mosciski@example.org', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'UyoTNSrxN8', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(7, 'Annalise Steuber', 'jakayla.thompson@example.com', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'BTPfOKFeD6', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(8, 'Shawn McClure II', 'maryam45@example.net', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ZTIKpPVxdQ', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(9, 'user laravel', 'user@example.com', '0111111111', '2023-02-04 12:33:23', '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, '8pAeVbo7YuoN2rW5DKDBeXfvK2KCkQslrEBxYTNziLNCnP9LQ0UPqBm6Ajn6', NULL, 'profile-photos/XxjFuG2kDo8Y54Pzy83YLenDg7RCiK7fDEQGFZF7.jpg', '2022-11-01 16:45:46', '2023-02-04 10:33:23'),
(10, 'Orlando Eichmann DVM', 'lkrajcik@example.net', NULL, NULL, '2022-11-01 16:45:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'QmJTsl7o96', NULL, NULL, '2022-11-01 16:45:46', '2022-11-01 16:45:46'),
(11, 'ahmadothman', 'user@mail.com', '01234567890', '2023-03-16 14:00:23', NULL, '$2y$10$YTm85gXoeI.rIy1IUn.5bumDahMrzaYcgZCUaGfnye0ZKtk05BfDK', NULL, NULL, NULL, NULL, NULL, '202211061855resize-1632727770173185082egyptianaikidoassociation.jpg', '2022-11-04 11:18:03', '2023-03-16 12:00:23'),
(12, 'othmanaisha', 'othman@aisha.com', '0123456789', '2023-02-09 19:11:53', NULL, '$2y$10$VlT8Dj.nef1QYoAGCkrZpebN.MMocIA9ldMdznSq7yARSqShfKqnO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-09 17:11:13', '2023-02-09 17:11:53'),
(13, 'dini', 'dini@ahmad.com', '0123456789', NULL, NULL, '$2y$10$A2cSHIbeVt34URt0azpf2.XeJqRBAj/ZJJmxiqSFKy0ENxkKNVCmO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-09 17:20:04', '2023-02-09 17:20:04'),
(14, 'aishaahmad', 'aishaahmad@mail.com', '012345678', '2023-02-09 19:21:00', NULL, '$2y$10$QxCtscDTm3ZCwU7NySKVleDc0Vrg1pmqB5w1J6LvqKuMZMuEDSw5m', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-09 17:20:58', '2023-02-09 17:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 9, 20, '2022-12-18 10:07:02', NULL),
(7, 9, 18, '2022-12-18 10:07:05', NULL),
(8, 9, 17, '2022-12-18 11:09:56', NULL),
(9, 11, 20, '2023-03-02 05:22:48', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
