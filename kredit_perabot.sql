-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2022 at 01:08 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit_perabot`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_settings`
--

CREATE TABLE `application_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_rate` double(8,2) NOT NULL,
  `service_rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_settings`
--

INSERT INTO `application_settings` (`id`, `interest_rate`, `service_rate`, `created_at`, `updated_at`) VALUES
(1, 2.50, 1.00, '2022-07-20 15:43:18', '2022-07-20 15:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `duration` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'rumah-tangga', 'Rumah Tangga', '2022-07-20 10:00:17', '2022-07-20 10:07:57'),
(2, 'kesehatan', 'Kesehatan', '2022-07-20 10:00:19', '2022-07-20 10:00:19'),
(3, 'dapur', 'Dapur', '2022-07-20 10:02:24', '2022-07-20 10:02:24'),
(4, 'furnitur', 'Furnitur', '2022-07-20 10:02:26', '2022-07-20 10:02:26'),
(5, 'rak-dan-penyimpanan', 'Rak dan Penyimpanan', '2022-07-20 10:02:29', '2022-07-20 10:02:29'),
(6, 'bed-bath', 'Bed & Bath', '2022-07-20 10:02:33', '2022-07-20 10:02:33'),
(7, 'home-improvement', 'Home Improvement', '2022-07-20 10:02:37', '2022-07-20 10:02:37'),
(8, 'otomotif', 'Otomotif', '2022-07-20 10:02:39', '2022-07-20 10:02:39'),
(9, 'hobi-gaya-hidup', 'Hobi & Gaya Hidup', '2022-07-20 10:02:42', '2022-07-20 10:02:42'),
(10, 'kesehatan-olahraga', 'Kesehatan & Olahraga', '2022-07-20 10:02:46', '2022-07-20 10:02:46'),
(11, 'elektronik-gadget', 'Elektronik & Gadget', '2022-07-20 10:02:51', '2022-07-20 10:02:51'),
(12, 'mainan-bayi', 'Mainan & Bayi', '2022-07-20 10:02:56', '2022-07-20 10:02:56'),
(13, 'best-deals', 'Best Deals', '2022-07-20 10:02:58', '2022-07-20 10:02:58'),
(15, 'kategori-baru', 'Kategori baru', '2022-07-22 05:44:38', '2022-07-22 05:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `duration` int NOT NULL,
  `installment` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interest_rate` double(8,2) NOT NULL,
  `service_rate` double(8,2) NOT NULL,
  `payment_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `product_id`, `quantity`, `price`, `duration`, `installment`, `created_at`, `updated_at`, `interest_rate`, `service_rate`, `payment_receipt`, `subtotal`, `is_read`) VALUES
(1, 1, 3, 15, 999000, 12, 1292768.4375, '2022-07-21 13:14:42', '2022-07-22 02:31:59', 2.50, 1.00, 'payment_receipts/6OwE8eQcMkvNozi7dtjVgZjcUfyJjlRLJdK6M4TM.jpg', 15134850, 1),
(2, 1, 4, 5, 3722000, 9, 2140666.9444444, '2022-07-21 13:14:42', '2022-07-22 02:32:38', 2.50, 1.00, 'payment_receipts/6OwE8eQcMkvNozi7dtjVgZjcUfyJjlRLJdK6M4TM.jpg', 18796100, 1),
(3, 1, 5, 10, 199000, 3, 686715.83333333, '2022-07-21 13:14:42', '2022-07-22 02:32:40', 2.50, 1.00, 'payment_receipts/6OwE8eQcMkvNozi7dtjVgZjcUfyJjlRLJdK6M4TM.jpg', 2009900, 1),
(4, 1, 6, 1, 279000, 0, 288834.75, '2022-07-21 13:14:42', '2022-07-22 02:32:42', 2.50, 1.00, 'payment_receipts/6OwE8eQcMkvNozi7dtjVgZjcUfyJjlRLJdK6M4TM.jpg', 281790, 1),
(5, 3, 4, 5, 3722000, 12, 1605500.2083333, '2022-07-21 14:22:22', '2022-07-22 02:32:43', 2.50, 1.00, 'payment_receipts/AIoXv3lPYI50tvmQ6v0veydCXS9A1LlcsOIEfZUD.jpg', 18796100, 1),
(6, 3, 7, 5, 479000, 3, 826474.58333333, '2022-07-21 14:23:41', '2022-07-22 02:31:27', 2.50, 1.00, 'payment_receipts/pdTHOXlV1dBdn3GHsJCVTopWbi0e489UpAc377Wa.jpg', 2418950, 1),
(7, 10, 5, 10, 199000, 3, 686715.83333333, '2022-07-22 05:35:36', '2022-07-22 05:49:33', 2.50, 1.00, 'payment_receipts/HtB4A0mr7A2wRk7N8r3tQHTrXyP9AFaljqhqVEPb.jpg', 2009900, 1),
(8, 10, 7, 25, 479000, 12, 1033093.2291667, '2022-07-22 05:35:36', '2022-07-22 05:50:15', 2.50, 1.00, 'payment_receipts/HtB4A0mr7A2wRk7N8r3tQHTrXyP9AFaljqhqVEPb.jpg', 12094750, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_20_162424_create_categories_table', 2),
(7, '2022_07_20_171622_create_subcategories_table', 3),
(10, '2022_07_20_173435_add_slug_column_to_subcategories_table', 4),
(11, '2022_07_20_174817_create_products_table', 5),
(12, '2022_07_20_194054_add_role_column_to_users_table', 6),
(18, '2022_07_20_202527_add_administration_columns_to_users_table', 7),
(19, '2022_07_20_222416_create_application_settings_table', 8),
(20, '2022_07_21_082016_create_views_table', 9),
(21, '2022_07_21_091318_add_user_agent_column_to_views_table', 10),
(23, '2022_07_21_132454_create_carts_table', 11),
(25, '2022_07_21_163203_create_checkouts_table', 12),
(26, '2022_07_21_185005_add_duration_column_to_carts_table', 12),
(27, '2022_07_21_194221_add_payment_receipt_column_to_checkouts_table', 13),
(28, '2022_07_21_200008_add_subtotal_to_checkouts_table', 14),
(34, '2022_07_21_200423_change_installment_column_type_in_checkouts_table', 15),
(35, '2022_07_22_040729_add_is_read_column_to_checkouts_table', 15),
(38, '2022_07_22_080816_create_payments_table', 16);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `checkout_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `payment_order` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `checkout_id`, `product_id`, `payment_order`, `status`, `invoice`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 6, 7, 2, 'Lunas', 'invoices/aIfaLcA8Mwmfgt8NeXUyKxNjAcIhLztTxaxk7xjl.png', 1, '2022-08-21 17:00:00', '2022-07-22 02:28:23'),
(2, 6, 7, 3, 'Lunas', 'invoices/fEsVti9FJUMRRCNN0SvdraSfpSSX8pOy8EvNMNzg.png', 1, '2022-09-21 17:00:00', '2022-07-22 02:30:51'),
(3, 5, 4, 2, 'Lunas', 'invoices/UQ6U2JmYxANA0Dab6sIt3nNcaJ2D5JhHTT215hOb.png', 1, '2022-08-21 17:00:00', '2022-07-22 03:14:28'),
(4, 7, 5, 2, 'Lunas', 'invoices/hKNVAfdhOaQPJWCraoslj0oh7fteg6kfxJ1UKcJO.jpg', 1, '2022-08-21 17:00:00', '2022-07-22 05:50:03'),
(5, 8, 7, 2, 'Lunas', 'invoices/Gy2AxT1C9igEKVHeeVJa1EWqw4NIYIbyO3Q6yxeZ.png', 1, '2022-08-21 17:00:00', '2022-07-22 05:50:18'),
(6, 8, 7, 3, 'Lunas', 'invoices/LQ5fjbJA8QJ8Ail2O3Cg8vkjNjZPZoJYR9nyVuaN.png', 1, '2022-09-21 17:00:00', '2022-07-22 05:50:20'),
(7, 8, 7, 4, 'Lunas', 'invoices/TUwjwrN8s84Degkx9r2i2B7IwsTtZzdTdGIlY7L3.png', 1, '2022-09-21 17:00:00', '2022-07-22 05:50:35'),
(8, 7, 5, 3, 'Lunas', 'invoices/KwDoFTmoU4IWaR1kWwTxtC9LcfG4BwpR3VVWJYyw.png', 1, '2022-09-21 17:00:00', '2022-07-22 05:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'api_token', 'ff81cb655eda2a3f631df189450603045f42cd88e1d0af2ab798c22875638b5a', '[\"*\"]', '2022-07-21 07:48:54', '2022-07-21 07:47:49', '2022-07-21 07:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `weight` int NOT NULL,
  `length` int NOT NULL,
  `width` int NOT NULL,
  `height` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `slug`, `name`, `picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`, `condition`, `description`, `price`, `stock`, `weight`, `length`, `width`, `height`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'testing-dekorasi-rumah', 'Testing Dekorasi Rumah', 'products/B5TxXGtidNkYSXaugigPTqXnp0wfYI1DJ50MZqkF.png', NULL, NULL, NULL, NULL, 'Baru', '<ol><li>asd</li><li>asdasd</li><li>sdaasd</li></ol><ul><li>asdsad</li><li>asdasd</li></ul><p>asasd</p><p><strong>asdasd</strong></p><p><i>asdasda</i></p><p><i><strong>asdasda</strong></i></p><p>Testing</p>', 1000000, 20, 1000, 10, 10, 10, 'bg-black', '2022-07-20 12:06:53', '2022-07-20 12:06:53'),
(3, 1, 1, 'cermin-dinding-60-cm-round-u28', 'Cermin Dinding 60 Cm Round U28', 'products/gvnGMyyUoPzU6pJKSuiMv6hgpGcmczoJS7dLkgRd.webp', 'products/uAhvU3Hnbadx2ndL6triFLY5Kp4S2v9K6ojHsDE5.webp', 'products/ZdOCktg7TLukCc0on25Suui0QEx6xmtkDyt0uC2j.webp', 'products/iN7cV9TTyItAUm586YX3NaZe9OXE7KxtU4EUqdf1.webp', 'products/7GlYIpfAdrhD5iI71aBmt2rAEH66ubXXfmH9eJE3.webp', 'Baru', '<ul><li>Diameter&nbsp;: 60 cm</li><li>Material : aluminium,&nbsp;MDF</li><li>Desain minimalis</li></ul><p>Hadirkan cermin dinding ini di hunian Anda untuk menambah kesan yang lebih menawan. Selain untuk merefleksikan diri, cermin ini juga cocok digunakan sebagai pelengkap dekorasi ruangan Anda. Cocok untuk ditempatkan&nbsp;di kamar tidur, ruang tamu, atau ruangan lainnya sesuai kebutuhan Anda.&nbsp;</p>', 999000, 100, 2880, 63, 4, 62, 'bg-black', '2022-07-21 00:38:03', '2022-07-21 00:38:03'),
(4, 1, 3, 'brabantia-30-ltr-tempat-sampah-stainless-flatback', 'Brabantia 30 Ltr Tempat Sampah Stainless Flatback', 'products/Dqkf46Y3AGO94YCa3tzEA0LRNhaI2WbN7vHfHjgr.webp', 'products/SIukXAlsQ3pbe1di02XGJEut7q34FleNXKHaQv9f.webp', 'products/eebcKUfzaTwNyyfja08IuxvmylJnqVyYyf9AS4mF.webp', NULL, NULL, 'Baru', '<ul><li>Kapasitas : 30 liter</li><li>Tempat sampah pedal</li><li>Bagian belakang berbentuk flat</li><li>Tutup menutup dengan pelan (soft close)</li><li>Memiliki wadah plastik removable di bagian dalam</li><li>Material : steel, plastik</li><li>Dimensi produk : 37 x 30.5 x 66 cm</li></ul><p>Brabantia Tempat Sampah Flatback memiliki desain modern yang cocok untuk area dalam ruangan. Tempat sampah ini dirancang dengan bentuk rata di bagian belakang agar dapat disandarkan pada dinding, lemari atau kabinet. Pedalnya memiliki fitur teknologi Motion Control sehingga dapat menutup secara pelan. Pada bagian dalam tempat sampah, terdapat wadah plastik removable untuk memudahkan Anda membuang sampah. Alat kebersihan ini juga dilengkapi handle pegangan untuk mengangkat tempat sampah dengan mudah. Dapatkan berbagai pilihan produk berkualitas lainnya di Ruparupa.com.</p>', 3722000, 100, 4000, 37, 37, 69, 'bg-cyan-500', '2022-07-21 00:48:08', '2022-07-21 00:48:08'),
(5, 1, 4, 'proclean-alat-pel-spray-tanpa-botol', 'Proclean Alat Pel Spray Tanpa Botol', 'products/U111KuI8x8dwXXmgqjjumpDpulBism8GTVDvxMwj.webp', 'products/SM5w5CwwwMU8zU4rBCvbBviJhwhr4V6QzKO461S0.webp', 'products/Z9NzWk99QRH0vvv9HJAR1U5Shg6szxrwdNNmGUdb.webp', 'products/KOft6ZtXw2E2zcG8vTomOJ0wKyFfVnvl8QJb4QOB.webp', 'products/gGt4pRky0AkdqEl7paY4FYflFUCqrxxnbkKSBvwn.webp', 'Baru', '<ul><li>Dilengkapi penyimpanan untuk cairan pembersih pada alat pel</li><li>Kepala alat pel dapat berputar 360 derajat</li><li>Kain pel membersihkan noda dan kotoran dengan efektif</li><li>Material handle : plastik</li><li>Material gagang : alumunium</li><li>Dimensi produk : 34 x 13 x 128 cm</li><li>*Sudah termasuk kain pel</li><li>SKU refill : 10207505</li></ul><p>Membersihkan lantai akan lebih mudah dengan alat pel dari Proclean. Kelebihan alat pel ini adalah&nbsp;Anda tidak perlu memegang botol cairan pembersih lagi karena terdapat slot di bagian bawah alat pel yang dapat mengalirkan cairan pada mop atau kain pel di bawahnya. Cukup tarik tuas pada bagian atas tangkai pel untuk mengoperasikan fitur tersebut. Kegiatan bersih-bersih di rumah akan lebih praktis dan efisien.</p>', 199000, 90, 870, 140, 12, 7, 'bg-white', '2022-07-21 00:49:50', '2022-07-22 05:35:36'),
(6, 1, 5, 'stora-jemuran-handuk-6-pipa', 'Stora Jemuran Handuk 6 Pipa', 'products/2blTkgaaDOoMBcVeY7XckpRABl2USEY0dBgdjVQK.webp', 'products/zTu6YvboEVDfi6fYgWsGg81gqLqtx0yCsyvEaR1D.webp', 'products/1DdoAUh35PoFLNrS0btwsQ9mRyGtQGOLix6R7SLD.webp', NULL, NULL, 'Baru', '<ul><li>Memiliki 6 pipa gantungan</li><li>Memuat berbagai ukuran handuk dan pakaian</li><li>Mudah untuk dipindahkan</li><li>Material sambungan : plastik ABS</li><li>Material pipa : stainless steel</li><li>Dimensi produk : 78 x 32 x 84 cm</li></ul><p>Pastikan handuk ataupun pakaian yang akan Anda gunakan kembali tidak tercecer berantakan di ruangan. Hadirkan Jemuran Handuk dari Stora ini sebagai solusi masalah tersebut. Memiliki 6 buah tiang gantung, jemuran ini dapat memuat berbagai ukuran handuk ataupaun pakaian. Bagian sambungan dari pipa terbuat dari material plastik berkualitas, sementara pada bagian gantungannya terbuat dari besi yang kokoh. Mampu menahan beban yang berat hingga 2 kali dari beban jemuran sendiri. Cocok untuk digunakan pada hunian minimalis ataupun apartemen yang tidak banyak memiliki ruang terbuka. Dapatkan berbagai pilihan produk berkualitas lainnya.</p>', 279000, 100, 2920, 80, 9, 33, 'bg-green-500', '2022-07-21 00:51:01', '2022-07-21 00:51:01'),
(7, 1, 6, 'gorden-120x160-cm-roller-blind-print-geotriangle', 'Gorden 120x160 Cm Roller Blind Print Geotriangle', 'products/AGDXDREdoIGKTAwbi8JXiiG0BU0iqsc0L5PDksTL.webp', 'products/TelV4EWsi8Y0QUQpZQV2wZtC8C54pAq3s1P0DTPN.webp', 'products/aHUdL8Nw7TCMUJY1bPSuDUSARYDC4yBa3hlWFrge.jpg', 'products/2qnHaOxPX6CNkldjLyAMDcTLZsz57iHmX9c9bdbo.webp', NULL, 'Baru', '<ul><li>Gorden dengan sistem gulung</li><li>Material : polyester</li><li>Menghalangi cahaya masuk ke dalam ruangan</li><li>Dimensi produk : 120 x 160 x 10 cm</li><li>Motif gorden : geotriangle</li><li>Roll penggulung tidak mudah kesat</li><li>* Ukuran lebar sudah termasuk dengan braket &amp; kelengkapannya</li><li>Isi dalam 1 pack :<ul><li>1 set braket dengan pelat</li><li>1 set braket dengan lubang</li><li>1 rantai pengendali</li><li>1 ujung pengendali pegas</li><li>1 batang pipa dengan kain blind</li><li>1 klip pengaman bentuk P</li><li>1 instruksi pemasangan</li></ul></li><li>Selain memberikan privasi untuk hunian atau ruangan, gorden Roll Blind persembahan dari Informa juga memberikan tampilan bergaya. Gorden sistem gulung ini terbuat dari material poliester yang awet dan tidak mudah sobek. Selain itu, tirai ini juga mudah untuk dibersihkan serta dapat dicuci dengan mesin. Dilengkapi dengan roller penggulung yang mudah dioperasikan. Cukup tarik tali yang terdapat pada bagian sisi gorden untuk menggulung ataupun memanjangkan gorden.</li></ul>', 479000, 70, 1170, 45, 17, 6, 'bg-white', '2022-07-21 00:55:02', '2022-07-22 05:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'dekorasi-rumah', 'Dekorasi Rumah', '2022-07-20 10:26:16', '2022-07-20 10:36:43'),
(2, 1, 'tempat-penyimpanan', 'Tempat Penyimpanan', '2022-07-20 10:26:20', '2022-07-20 10:36:43'),
(3, 1, 'tempat-sampah', 'Tempat Sampah', '2022-07-20 10:26:23', '2022-07-20 10:36:43'),
(4, 1, 'pembersih', 'Pembersih', '2022-07-20 10:26:25', '2022-07-20 10:36:43'),
(5, 1, 'perlengkapan-mencuci-setrika', 'Perlengkapan Mencuci & Setrika', '2022-07-20 10:26:32', '2022-07-20 10:36:43'),
(6, 1, 'tekstil', 'Tekstil', '2022-07-20 10:26:34', '2022-07-20 10:36:43'),
(7, 3, 'peralatan-dapur', 'Peralatan Dapur', '2022-07-20 10:26:47', '2022-07-20 10:36:43'),
(8, 3, 'perlengkapan-memasak', 'Perlengkapan Memasak', '2022-07-20 10:26:55', '2022-07-20 10:36:43'),
(9, 3, 'perlengkapan-makan', 'Perlengkapan Makan', '2022-07-20 10:27:02', '2022-07-20 10:36:43'),
(10, 3, 'tempat-penyimpanan-makanan', 'Tempat Penyimpanan Makanan', '2022-07-20 10:27:09', '2022-07-20 10:36:43'),
(11, 3, 'furnitur-dapur', 'Furnitur Dapur', '2022-07-20 10:27:16', '2022-07-20 10:36:43'),
(12, 3, 'hotel', 'Hotel', '2022-07-20 10:27:20', '2022-07-20 10:36:43'),
(13, 4, 'kursi', 'Kursi', '2022-07-20 10:27:26', '2022-07-20 10:36:43'),
(14, 4, 'meja', 'Meja', '2022-07-20 10:27:32', '2022-07-20 10:36:43'),
(15, 4, 'perlengkapan-kantor', 'Perlengkapan Kantor', '2022-07-20 10:27:38', '2022-07-20 10:36:43'),
(16, 4, 'sofa', 'Sofa', '2022-07-20 10:27:42', '2022-07-20 10:36:43'),
(17, 4, 'lemari', 'Lemari', '2022-07-20 10:27:46', '2022-07-20 10:36:43'),
(18, 4, 'furnitur-outdoor', 'Furnitur Outdoor', '2022-07-20 10:27:51', '2022-07-20 10:36:43'),
(19, 5, 'rak', 'Rak', '2022-07-20 10:27:56', '2022-07-20 10:36:43'),
(20, 5, 'gantungan', 'Gantungan', '2022-07-20 10:27:59', '2022-07-20 10:36:43'),
(21, 5, 'keranjang', 'Keranjang', '2022-07-20 10:28:04', '2022-07-20 10:36:43'),
(22, 5, 'laci', 'Laci', '2022-07-20 10:28:08', '2022-07-20 10:36:43'),
(23, 5, 'lemari-dan-loker', 'Lemari dan Loker', '2022-07-20 10:28:12', '2022-07-20 10:36:43'),
(24, 5, 'box-organizer', 'Box & Organizer', '2022-07-20 10:28:20', '2022-07-20 10:36:43'),
(25, 6, 'perlengkapan-kamar-mandi', 'Perlengkapan Kamar Mandi', '2022-07-20 10:28:29', '2022-07-20 10:36:43'),
(26, 6, 'furnitur-kamar-tidur', 'Furnitur Kamar Tidur', '2022-07-20 10:28:36', '2022-07-20 10:36:43'),
(27, 6, 'aksesoris-tempat-tidur', 'Aksesoris Tempat Tidur', '2022-07-20 10:28:42', '2022-07-20 10:36:43'),
(28, 6, 'pipa-keran', 'Pipa & Keran', '2022-07-20 10:28:51', '2022-07-20 10:36:43'),
(29, 7, 'tangga', 'Tangga', '2022-07-20 10:28:58', '2022-07-20 10:36:43'),
(30, 7, 'brankas', 'Brankas', '2022-07-20 10:29:02', '2022-07-20 10:36:43'),
(31, 7, 'bahan-bangunan', 'Bahan Bangunan', '2022-07-20 10:29:08', '2022-07-20 10:36:43'),
(32, 7, 'peralatan-listrik', 'Peralatan Listrik', '2022-07-20 10:29:14', '2022-07-20 10:36:43'),
(33, 7, 'peralatan-ringan', 'Peralatan Ringan', '2022-07-20 10:29:21', '2022-07-20 10:36:43'),
(34, 7, 'alat-bantu-angkut', 'Alat Bantu Angkut', '2022-07-20 10:29:29', '2022-07-20 10:36:43'),
(35, 8, 'aksesoris-mobil-motor', 'Aksesoris Mobil & Motor', '2022-07-20 10:29:37', '2022-07-20 10:36:43'),
(36, 8, 'perawatan-mobil-motor', 'Perawatan Mobil & Motor', '2022-07-20 10:29:47', '2022-07-20 10:36:43'),
(37, 8, 'modifikasi-mobil', 'Modifikasi Mobil', '2022-07-20 10:29:53', '2022-07-20 10:36:43'),
(38, 8, 'peralatan-kendaraan-bermotor', 'Peralatan Kendaraan Bermotor', '2022-07-20 10:30:01', '2022-07-20 10:36:43'),
(39, 8, 'suku-cadang-pengganti', 'Suku Cadang Pengganti', '2022-07-20 10:30:08', '2022-07-20 10:36:43'),
(40, 9, 'makanan-minuman', 'Makanan & Minuman', '2022-07-20 10:30:17', '2022-07-20 10:36:43'),
(41, 9, 'akuarium', 'Akuarium', '2022-07-20 10:30:24', '2022-07-20 10:36:43'),
(42, 9, 'taman', 'Taman', '2022-07-20 10:30:29', '2022-07-20 10:36:43'),
(43, 9, 'perlengkapan-bbq', 'Perlengkapan BBQ', '2022-07-20 10:30:34', '2022-07-20 10:36:43'),
(44, 9, 'wisata', 'Wisata', '2022-07-20 10:30:40', '2022-07-20 10:36:43'),
(45, 9, 'kecantikan', 'Kecantikan', '2022-07-20 10:30:44', '2022-07-20 10:36:43'),
(46, 10, 'gym-fitness', 'Gym & Fitness', '2022-07-20 10:30:49', '2022-07-20 10:36:43'),
(47, 10, 'sepeda', 'Sepeda', '2022-07-20 10:30:55', '2022-07-20 10:36:43'),
(48, 10, 'peralatan-olah-raga', 'Peralatan Olah Raga', '2022-07-20 10:31:00', '2022-07-20 10:36:43'),
(49, 10, 'olahraga-air', 'Olahraga Air', '2022-07-20 10:31:06', '2022-07-20 10:36:43'),
(50, 10, 'perlengkapan-outdoor', 'Perlengkapan Outdoor', '2022-07-20 10:31:15', '2022-07-20 10:36:43'),
(51, 11, 'elektronik-rumah-tangga', 'Elektronik Rumah Tangga', '2022-07-20 10:31:24', '2022-07-20 10:36:43'),
(52, 11, 'smartphone-dan-gadget', 'Smartphone dan Gadget', '2022-07-20 10:31:30', '2022-07-20 10:36:43'),
(53, 11, 'perlengkapan-kantor', 'Perlengkapan Kantor', '2022-07-20 10:31:36', '2022-07-20 10:36:43'),
(54, 11, 'peralatan-elektronik', 'Peralatan Elektronik', '2022-07-20 10:31:46', '2022-07-20 10:36:43'),
(55, 11, 'elektronik-pembersih', 'Elektronik Pembersih', '2022-07-20 10:31:53', '2022-07-20 10:36:43'),
(56, 11, 'audio-video', 'Audio & Video', '2022-07-20 10:31:57', '2022-07-20 10:36:43'),
(57, 12, 'toys-kingdom', 'Toys Kingdom', '2022-07-20 10:32:06', '2022-07-20 10:36:43'),
(58, 12, 'mainan-outdoor', 'Mainan Outdoor', '2022-07-20 10:32:12', '2022-07-20 10:36:43'),
(59, 12, 'mainan', 'Mainan', '2022-07-20 10:32:16', '2022-07-20 10:36:43'),
(60, 12, 'mainan-edukasi', 'Mainan Edukasi', '2022-07-20 10:32:22', '2022-07-20 10:36:43'),
(61, 12, 'mainan-bayi', 'Mainan & Bayi', '2022-07-20 10:32:28', '2022-07-20 10:36:43'),
(62, 12, 'mainan-koleksi', 'Mainan Koleksi', '2022-07-20 10:32:34', '2022-07-20 10:36:43'),
(63, 13, 'produk-pilihan', 'Produk Pilihan', '2022-07-20 10:32:43', '2022-07-20 10:36:43'),
(64, 15, 'subkategori-baru', 'Subkategori baru', '2022-07-22 05:45:08', '2022-07-22 05:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `marriage_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_card_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_identity_card_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_identity_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_slip_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `picture`, `place_of_birth`, `date_of_birth`, `marriage_status`, `address`, `identity_card_picture`, `family_identity_card_picture`, `tax_identity_picture`, `salary_slip_picture`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aghits Nidallah', 'yourlovelydev@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'super_admin', NULL, '$2y$10$WiLLBQMzaogINv2d23e2HOkLkHZ2A2D5u9eMANF/BlfBSJfmf4oNC', NULL, '2022-07-19 08:22:10', '2022-07-20 15:20:07'),
(2, 'Muhamad Ahmadin', 'ahmadinations@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, '$2y$10$7zDgOXpaL/v3DdmbqJupc.ZD.pdcG6JE6UeHnVlOjtwZcz2JvMmge', NULL, '2022-07-20 14:04:40', '2022-07-20 14:53:33'),
(3, 'Freddy Wicaksono, M. Kom', 'freddy@umc.ac.id', '62812312341234', 'users/PfEAWvqmFq0XAqX5PA5hRZo9b6JFvJxQUVouC0UX.jpg', 'Cirebon', '2000-01-01', 'Belum Menikah', '<p>Testing</p>', 'users/uKgS95hhZzP8M19LEraePOEQ9qZpMozw8zAvT17t.jpg', 'users/AwqSIk0JOMFZ8SKoaPvQ0K2fNOWQ3TY23evm3HU8.png', 'users/k2RuO6ChSIKEykWGgVbq2RAjb4IEL5F3Gxzk32SV.png', 'users/3yTosJIfCkuW69qksiXYWlnACuwYO08jhg2LCb8N.png', 'user', NULL, '$2y$10$bSX7tSRHE7gILYzmeKI1IOiV7NH6DAiaWssbeTJXDZX/Uo7EboqYC', NULL, '2022-07-20 14:06:51', '2022-07-21 22:01:43'),
(4, 'Yono Maulana', 'yonomaulana77@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, '$2y$10$D6DBCsegjr4e4DsouI2vCu/LU38Ej2Vlf2WtYokMd4pyuBgwdxgUq', NULL, '2022-07-20 14:07:25', '2022-07-20 14:54:13'),
(7, '初白雪', 'hatsushiroyuki@gmail.com', NULL, 'users/OArTHRvo79rQjqo21d4vWCmMMlxt6nYeXtSevkqr.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, '$2y$10$pvWakVpT/kcTLOX7S7Vm5.WzXoaMr9fEe2DMP.QfvpK8hK3JE5.r6', NULL, '2022-07-20 14:42:23', '2022-07-22 05:43:04'),
(9, 'フリドリチデーグラッセ', 'friedrich@al.jp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, '$2y$10$JsOoRQwhi64UglTvhhKwoeSLbK.oxSNbr3XcI5k4FfP1kpXPTc9cC', NULL, '2022-07-20 14:56:20', '2022-07-20 14:56:20'),
(10, 'Aghits Nidallah', 'shiroyukihatsu@gmail.com', '62812312341234', 'users/DwbxaWFgmbZ1Y0BKy0Z20uu02Zr9h33FqwgjYQcA.jpg', 'Cirebon', '2001-03-16', 'Belum Menikah', '<p>Cirebon</p>', 'users/PfenaAHB0Sm6N50KU8hVcv89TxnrDJYw7rneAR0B.png', 'users/G6HPkifDbfKQa8JFWBj5YmNNOZOWYUXMOCaQwA4P.png', 'users/tAeqfBPri6Kv5EZm9P8IHtfFDGlGGyLY1a8RLhNq.png', 'users/K8LUH10lvCj36cX7fBRAYiZR455QmsuaSEirKPIs.png', 'user', NULL, '$2y$10$rNDVmT.TA7pONgiGOHLEU.AIgxfqLs9Py4MhyG36q5JBbCBB7Aoq2', NULL, '2022-07-22 05:32:27', '2022-07-22 05:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `ip_address`, `user_agent`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 3, '2022-07-21 02:10:29', '2022-07-21 02:10:29'),
(2, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 4, '2022-07-21 02:13:47', '2022-07-21 02:13:47'),
(3, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 1, '2022-07-21 02:14:22', '2022-07-21 02:14:22'),
(4, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 5, '2022-07-21 02:14:26', '2022-07-21 02:14:26'),
(5, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:24:45', '2022-07-21 06:24:45'),
(6, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:26:29', '2022-07-21 06:26:29'),
(7, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:26:29', '2022-07-21 06:26:29'),
(8, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:00', '2022-07-21 06:27:00'),
(9, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:18', '2022-07-21 06:27:18'),
(10, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:19', '2022-07-21 06:27:19'),
(11, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:38', '2022-07-21 06:27:38'),
(12, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:41', '2022-07-21 06:27:41'),
(13, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:47', '2022-07-21 06:27:47'),
(14, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:27:47', '2022-07-21 06:27:47'),
(15, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:29:40', '2022-07-21 06:29:40'),
(16, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:29:46', '2022-07-21 06:29:46'),
(17, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:32:11', '2022-07-21 06:32:11'),
(18, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:32:14', '2022-07-21 06:32:14'),
(19, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:33:05', '2022-07-21 06:33:05'),
(20, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:34:55', '2022-07-21 06:34:55'),
(21, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:35:37', '2022-07-21 06:35:37'),
(22, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:36:07', '2022-07-21 06:36:07'),
(23, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 6, '2022-07-21 06:36:28', '2022-07-21 06:36:28'),
(24, 1, NULL, NULL, 5, '2022-07-21 06:49:00', '2022-07-21 06:49:00'),
(25, 1, NULL, NULL, 5, '2022-07-21 06:49:07', '2022-07-21 06:49:07'),
(26, 1, NULL, NULL, 5, '2022-07-21 06:49:27', '2022-07-21 06:49:27'),
(27, 1, NULL, NULL, 5, '2022-07-21 06:49:30', '2022-07-21 06:49:30'),
(28, 1, NULL, NULL, 5, '2022-07-21 06:49:35', '2022-07-21 06:49:35'),
(29, 1, NULL, NULL, 5, '2022-07-21 06:51:03', '2022-07-21 06:51:03'),
(30, 1, NULL, NULL, 5, '2022-07-21 06:51:03', '2022-07-21 06:51:03'),
(31, 1, NULL, NULL, 5, '2022-07-21 06:52:33', '2022-07-21 06:52:33'),
(32, 1, NULL, NULL, 5, '2022-07-21 07:00:18', '2022-07-21 07:00:18'),
(33, 1, NULL, NULL, 5, '2022-07-21 07:04:22', '2022-07-21 07:04:22'),
(34, 1, NULL, NULL, 5, '2022-07-21 07:07:34', '2022-07-21 07:07:34'),
(35, 1, NULL, NULL, 5, '2022-07-21 07:07:34', '2022-07-21 07:07:34'),
(36, 1, NULL, NULL, 5, '2022-07-21 07:07:36', '2022-07-21 07:07:36'),
(37, 1, NULL, NULL, 5, '2022-07-21 07:09:02', '2022-07-21 07:09:02'),
(38, 1, NULL, NULL, 5, '2022-07-21 07:09:19', '2022-07-21 07:09:19'),
(39, 1, NULL, NULL, 5, '2022-07-21 07:11:57', '2022-07-21 07:11:57'),
(40, 1, NULL, NULL, 5, '2022-07-21 07:13:49', '2022-07-21 07:13:49'),
(41, 1, NULL, NULL, 5, '2022-07-21 07:16:31', '2022-07-21 07:16:31'),
(42, 1, NULL, NULL, 5, '2022-07-21 07:16:45', '2022-07-21 07:16:45'),
(43, 1, NULL, NULL, 5, '2022-07-21 07:17:01', '2022-07-21 07:17:01'),
(44, 1, NULL, NULL, 5, '2022-07-21 07:17:04', '2022-07-21 07:17:04'),
(45, 1, NULL, NULL, 5, '2022-07-21 07:17:05', '2022-07-21 07:17:05'),
(46, 1, NULL, NULL, 5, '2022-07-21 07:17:09', '2022-07-21 07:17:09'),
(47, 1, NULL, NULL, 5, '2022-07-21 07:17:26', '2022-07-21 07:17:26'),
(48, 1, NULL, NULL, 5, '2022-07-21 07:19:02', '2022-07-21 07:19:02'),
(49, 1, NULL, NULL, 5, '2022-07-21 07:19:03', '2022-07-21 07:19:03'),
(50, 1, NULL, NULL, 5, '2022-07-21 07:19:11', '2022-07-21 07:19:11'),
(51, 1, NULL, NULL, 5, '2022-07-21 07:19:20', '2022-07-21 07:19:20'),
(52, 1, NULL, NULL, 5, '2022-07-21 07:19:30', '2022-07-21 07:19:30'),
(53, 1, NULL, NULL, 5, '2022-07-21 07:19:30', '2022-07-21 07:19:30'),
(54, 1, NULL, NULL, 5, '2022-07-21 07:19:35', '2022-07-21 07:19:35'),
(55, 1, NULL, NULL, 5, '2022-07-21 07:19:53', '2022-07-21 07:19:53'),
(56, 1, NULL, NULL, 5, '2022-07-21 07:22:56', '2022-07-21 07:22:56'),
(57, 1, NULL, NULL, 5, '2022-07-21 07:24:58', '2022-07-21 07:24:58'),
(58, 1, NULL, NULL, 5, '2022-07-21 07:28:02', '2022-07-21 07:28:02'),
(59, 1, NULL, NULL, 5, '2022-07-21 07:48:23', '2022-07-21 07:48:23'),
(60, 1, NULL, NULL, 5, '2022-07-21 07:48:52', '2022-07-21 07:48:52'),
(61, 1, NULL, NULL, 5, '2022-07-21 07:50:30', '2022-07-21 07:50:30'),
(62, 1, NULL, NULL, 5, '2022-07-21 07:50:42', '2022-07-21 07:50:42'),
(63, 1, NULL, NULL, 5, '2022-07-21 07:50:57', '2022-07-21 07:50:57'),
(64, 1, NULL, NULL, 5, '2022-07-21 07:51:40', '2022-07-21 07:51:40'),
(65, 1, NULL, NULL, 5, '2022-07-21 07:52:18', '2022-07-21 07:52:18'),
(66, 1, NULL, NULL, 5, '2022-07-21 07:52:25', '2022-07-21 07:52:25'),
(67, 1, NULL, NULL, 5, '2022-07-21 07:53:34', '2022-07-21 07:53:34'),
(68, 1, NULL, NULL, 5, '2022-07-21 07:53:34', '2022-07-21 07:53:34'),
(69, 1, NULL, NULL, 5, '2022-07-21 07:53:45', '2022-07-21 07:53:45'),
(70, 1, NULL, NULL, 5, '2022-07-21 07:53:46', '2022-07-21 07:53:46'),
(71, 1, NULL, NULL, 5, '2022-07-21 07:54:10', '2022-07-21 07:54:10'),
(72, 1, NULL, NULL, 5, '2022-07-21 07:54:12', '2022-07-21 07:54:12'),
(73, 1, NULL, NULL, 5, '2022-07-21 07:54:22', '2022-07-21 07:54:22'),
(74, 1, NULL, NULL, 5, '2022-07-21 07:54:22', '2022-07-21 07:54:22'),
(75, 1, NULL, NULL, 5, '2022-07-21 07:54:22', '2022-07-21 07:54:22'),
(76, 1, NULL, NULL, 5, '2022-07-21 07:55:00', '2022-07-21 07:55:00'),
(77, 1, NULL, NULL, 5, '2022-07-21 07:55:00', '2022-07-21 07:55:00'),
(78, 1, NULL, NULL, 5, '2022-07-21 07:55:06', '2022-07-21 07:55:06'),
(79, 1, NULL, NULL, 5, '2022-07-21 07:55:06', '2022-07-21 07:55:06'),
(80, 1, NULL, NULL, 5, '2022-07-21 07:55:09', '2022-07-21 07:55:09'),
(81, 1, NULL, NULL, 5, '2022-07-21 07:55:24', '2022-07-21 07:55:24'),
(82, 1, NULL, NULL, 5, '2022-07-21 07:55:25', '2022-07-21 07:55:25'),
(83, 1, NULL, NULL, 5, '2022-07-21 07:55:29', '2022-07-21 07:55:29'),
(84, 1, NULL, NULL, 5, '2022-07-21 07:55:29', '2022-07-21 07:55:29'),
(85, 1, NULL, NULL, 5, '2022-07-21 07:55:30', '2022-07-21 07:55:30'),
(86, 1, NULL, NULL, 5, '2022-07-21 07:55:36', '2022-07-21 07:55:36'),
(87, 1, NULL, NULL, 5, '2022-07-21 07:55:44', '2022-07-21 07:55:44'),
(88, 1, NULL, NULL, 5, '2022-07-21 07:55:46', '2022-07-21 07:55:46'),
(89, 1, NULL, NULL, 5, '2022-07-21 07:55:46', '2022-07-21 07:55:46'),
(90, 1, NULL, NULL, 5, '2022-07-21 07:55:47', '2022-07-21 07:55:47'),
(91, 1, NULL, NULL, 5, '2022-07-21 07:55:50', '2022-07-21 07:55:50'),
(92, 1, NULL, NULL, 5, '2022-07-21 07:56:09', '2022-07-21 07:56:09'),
(93, 1, NULL, NULL, 5, '2022-07-21 07:56:27', '2022-07-21 07:56:27'),
(94, 1, NULL, NULL, 5, '2022-07-21 07:57:02', '2022-07-21 07:57:02'),
(95, 1, NULL, NULL, 5, '2022-07-21 07:58:30', '2022-07-21 07:58:30'),
(96, 1, NULL, NULL, 5, '2022-07-21 07:58:39', '2022-07-21 07:58:39'),
(97, 1, NULL, NULL, 5, '2022-07-21 07:58:41', '2022-07-21 07:58:41'),
(98, 1, NULL, NULL, 5, '2022-07-21 07:59:13', '2022-07-21 07:59:13'),
(99, 1, NULL, NULL, 5, '2022-07-21 08:00:24', '2022-07-21 08:00:24'),
(100, 1, NULL, NULL, 5, '2022-07-21 08:00:50', '2022-07-21 08:00:50'),
(101, 1, NULL, NULL, 5, '2022-07-21 08:01:01', '2022-07-21 08:01:01'),
(102, 1, NULL, NULL, 5, '2022-07-21 08:01:01', '2022-07-21 08:01:01'),
(103, 1, NULL, NULL, 5, '2022-07-21 08:01:02', '2022-07-21 08:01:02'),
(104, 1, NULL, NULL, 5, '2022-07-21 08:01:17', '2022-07-21 08:01:17'),
(105, 1, NULL, NULL, 5, '2022-07-21 08:01:17', '2022-07-21 08:01:17'),
(106, 1, NULL, NULL, 5, '2022-07-21 08:01:21', '2022-07-21 08:01:21'),
(107, 1, NULL, NULL, 5, '2022-07-21 08:01:36', '2022-07-21 08:01:36'),
(108, 1, NULL, NULL, 5, '2022-07-21 08:01:44', '2022-07-21 08:01:44'),
(109, 1, NULL, NULL, 5, '2022-07-21 08:01:49', '2022-07-21 08:01:49'),
(110, 1, NULL, NULL, 5, '2022-07-21 08:01:49', '2022-07-21 08:01:49'),
(111, 1, NULL, NULL, 5, '2022-07-21 08:02:17', '2022-07-21 08:02:17'),
(112, 1, NULL, NULL, 5, '2022-07-21 08:02:25', '2022-07-21 08:02:25'),
(113, 1, NULL, NULL, 5, '2022-07-21 08:02:38', '2022-07-21 08:02:38'),
(114, 1, NULL, NULL, 5, '2022-07-21 08:02:41', '2022-07-21 08:02:41'),
(115, 1, NULL, NULL, 5, '2022-07-21 08:02:56', '2022-07-21 08:02:56'),
(116, 1, NULL, NULL, 5, '2022-07-21 08:02:58', '2022-07-21 08:02:58'),
(117, 1, NULL, NULL, 5, '2022-07-21 08:02:58', '2022-07-21 08:02:58'),
(118, 1, NULL, NULL, 5, '2022-07-21 08:03:06', '2022-07-21 08:03:06'),
(119, 1, NULL, NULL, 5, '2022-07-21 08:03:06', '2022-07-21 08:03:06'),
(120, 1, NULL, NULL, 5, '2022-07-21 08:03:10', '2022-07-21 08:03:10'),
(121, 1, NULL, NULL, 5, '2022-07-21 08:03:28', '2022-07-21 08:03:28'),
(122, 1, NULL, NULL, 5, '2022-07-21 08:03:39', '2022-07-21 08:03:39'),
(123, 1, NULL, NULL, 5, '2022-07-21 08:03:40', '2022-07-21 08:03:40'),
(124, 1, NULL, NULL, 5, '2022-07-21 08:03:53', '2022-07-21 08:03:53'),
(125, 1, NULL, NULL, 5, '2022-07-21 08:04:09', '2022-07-21 08:04:09'),
(126, 1, NULL, NULL, 5, '2022-07-21 08:04:31', '2022-07-21 08:04:31'),
(127, 1, NULL, NULL, 5, '2022-07-21 08:04:31', '2022-07-21 08:04:31'),
(128, 1, NULL, NULL, 5, '2022-07-21 08:06:01', '2022-07-21 08:06:01'),
(129, 1, NULL, NULL, 5, '2022-07-21 08:06:34', '2022-07-21 08:06:34'),
(130, 1, NULL, NULL, 5, '2022-07-21 08:06:40', '2022-07-21 08:06:40'),
(131, 1, NULL, NULL, 5, '2022-07-21 08:06:43', '2022-07-21 08:06:43'),
(132, 1, NULL, NULL, 5, '2022-07-21 08:07:11', '2022-07-21 08:07:11'),
(133, 1, NULL, NULL, 5, '2022-07-21 08:09:22', '2022-07-21 08:09:22'),
(134, 1, NULL, NULL, 5, '2022-07-21 08:09:28', '2022-07-21 08:09:28'),
(135, 1, NULL, NULL, 5, '2022-07-21 08:09:35', '2022-07-21 08:09:35'),
(136, 1, NULL, NULL, 5, '2022-07-21 08:09:42', '2022-07-21 08:09:42'),
(137, 1, NULL, NULL, 5, '2022-07-21 08:09:42', '2022-07-21 08:09:42'),
(138, 1, NULL, NULL, 5, '2022-07-21 08:09:47', '2022-07-21 08:09:47'),
(139, 1, NULL, NULL, 5, '2022-07-21 08:10:03', '2022-07-21 08:10:03'),
(140, 1, NULL, NULL, 5, '2022-07-21 08:10:10', '2022-07-21 08:10:10'),
(141, 1, NULL, NULL, 5, '2022-07-21 08:10:15', '2022-07-21 08:10:15'),
(142, 1, NULL, NULL, 5, '2022-07-21 08:10:18', '2022-07-21 08:10:18'),
(143, 1, NULL, NULL, 5, '2022-07-21 08:10:30', '2022-07-21 08:10:30'),
(144, 1, NULL, NULL, 5, '2022-07-21 08:10:34', '2022-07-21 08:10:34'),
(145, 1, NULL, NULL, 5, '2022-07-21 08:10:42', '2022-07-21 08:10:42'),
(146, 1, NULL, NULL, 5, '2022-07-21 08:10:55', '2022-07-21 08:10:55'),
(147, 1, NULL, NULL, 5, '2022-07-21 08:11:07', '2022-07-21 08:11:07'),
(148, 1, NULL, NULL, 5, '2022-07-21 08:11:07', '2022-07-21 08:11:07'),
(149, 1, NULL, NULL, 5, '2022-07-21 08:11:10', '2022-07-21 08:11:10'),
(150, 1, NULL, NULL, 5, '2022-07-21 08:11:10', '2022-07-21 08:11:10'),
(151, 1, NULL, NULL, 5, '2022-07-21 08:11:10', '2022-07-21 08:11:10'),
(152, 1, NULL, NULL, 5, '2022-07-21 08:11:52', '2022-07-21 08:11:52'),
(153, 1, NULL, NULL, 5, '2022-07-21 08:11:53', '2022-07-21 08:11:53'),
(154, 1, NULL, NULL, 5, '2022-07-21 08:12:28', '2022-07-21 08:12:28'),
(155, 1, NULL, NULL, 5, '2022-07-21 08:14:25', '2022-07-21 08:14:25'),
(156, 1, NULL, NULL, 5, '2022-07-21 08:15:16', '2022-07-21 08:15:16'),
(157, 1, NULL, NULL, 5, '2022-07-21 08:15:17', '2022-07-21 08:15:17'),
(158, 1, NULL, NULL, 5, '2022-07-21 08:15:34', '2022-07-21 08:15:34'),
(159, 1, NULL, NULL, 5, '2022-07-21 08:15:34', '2022-07-21 08:15:34'),
(160, 1, NULL, NULL, 5, '2022-07-21 08:16:14', '2022-07-21 08:16:14'),
(161, 1, NULL, NULL, 5, '2022-07-21 08:17:03', '2022-07-21 08:17:03'),
(162, 1, NULL, NULL, 5, '2022-07-21 08:17:10', '2022-07-21 08:17:10'),
(163, 1, NULL, NULL, 5, '2022-07-21 08:17:10', '2022-07-21 08:17:10'),
(164, 1, NULL, NULL, 5, '2022-07-21 08:17:48', '2022-07-21 08:17:48'),
(165, 1, NULL, NULL, 5, '2022-07-21 08:17:55', '2022-07-21 08:17:55'),
(166, 1, NULL, NULL, 5, '2022-07-21 08:17:55', '2022-07-21 08:17:55'),
(167, 1, NULL, NULL, 5, '2022-07-21 08:18:02', '2022-07-21 08:18:02'),
(168, 1, NULL, NULL, 5, '2022-07-21 08:18:09', '2022-07-21 08:18:09'),
(169, 1, NULL, NULL, 5, '2022-07-21 08:18:09', '2022-07-21 08:18:09'),
(170, 1, NULL, NULL, 5, '2022-07-21 08:18:26', '2022-07-21 08:18:26'),
(171, 1, NULL, NULL, 5, '2022-07-21 08:18:26', '2022-07-21 08:18:26'),
(172, 1, NULL, NULL, 5, '2022-07-21 08:18:28', '2022-07-21 08:18:28'),
(173, 1, NULL, NULL, 5, '2022-07-21 08:18:33', '2022-07-21 08:18:33'),
(174, 1, NULL, NULL, 5, '2022-07-21 08:18:50', '2022-07-21 08:18:50'),
(175, 1, NULL, NULL, 5, '2022-07-21 08:18:51', '2022-07-21 08:18:51'),
(176, 1, NULL, NULL, 5, '2022-07-21 08:19:40', '2022-07-21 08:19:40'),
(177, 1, NULL, NULL, 5, '2022-07-21 08:19:40', '2022-07-21 08:19:40'),
(178, 1, NULL, NULL, 5, '2022-07-21 08:20:14', '2022-07-21 08:20:14'),
(179, 1, NULL, NULL, 5, '2022-07-21 08:20:14', '2022-07-21 08:20:14'),
(180, 1, NULL, NULL, 5, '2022-07-21 08:21:06', '2022-07-21 08:21:06'),
(181, 1, NULL, NULL, 5, '2022-07-21 08:21:24', '2022-07-21 08:21:24'),
(182, 1, NULL, NULL, 5, '2022-07-21 08:21:25', '2022-07-21 08:21:25'),
(183, 1, NULL, NULL, 5, '2022-07-21 08:22:18', '2022-07-21 08:22:18'),
(184, 1, NULL, NULL, 5, '2022-07-21 08:22:18', '2022-07-21 08:22:18'),
(185, 1, NULL, NULL, 5, '2022-07-21 08:22:20', '2022-07-21 08:22:20'),
(186, 1, NULL, NULL, 5, '2022-07-21 08:22:21', '2022-07-21 08:22:21'),
(187, 1, NULL, NULL, 5, '2022-07-21 08:22:22', '2022-07-21 08:22:22'),
(188, 1, NULL, NULL, 5, '2022-07-21 08:22:27', '2022-07-21 08:22:27'),
(189, 1, NULL, NULL, 5, '2022-07-21 08:23:01', '2022-07-21 08:23:01'),
(190, 1, NULL, NULL, 5, '2022-07-21 08:23:02', '2022-07-21 08:23:02'),
(191, 1, NULL, NULL, 5, '2022-07-21 08:23:11', '2022-07-21 08:23:11'),
(192, 1, NULL, NULL, 5, '2022-07-21 08:23:12', '2022-07-21 08:23:12'),
(193, 1, NULL, NULL, 5, '2022-07-21 08:26:22', '2022-07-21 08:26:22'),
(194, 1, NULL, NULL, 5, '2022-07-21 08:26:34', '2022-07-21 08:26:34'),
(195, 1, NULL, NULL, 5, '2022-07-21 08:26:46', '2022-07-21 08:26:46'),
(196, 1, NULL, NULL, 5, '2022-07-21 08:26:53', '2022-07-21 08:26:53'),
(197, 1, NULL, NULL, 5, '2022-07-21 08:26:55', '2022-07-21 08:26:55'),
(198, 1, NULL, NULL, 5, '2022-07-21 08:26:56', '2022-07-21 08:26:56'),
(199, 1, NULL, NULL, 5, '2022-07-21 08:26:56', '2022-07-21 08:26:56'),
(200, 1, NULL, NULL, 5, '2022-07-21 08:27:05', '2022-07-21 08:27:05'),
(201, 1, NULL, NULL, 5, '2022-07-21 08:27:11', '2022-07-21 08:27:11'),
(202, 1, NULL, NULL, 5, '2022-07-21 08:27:27', '2022-07-21 08:27:27'),
(203, 1, NULL, NULL, 5, '2022-07-21 08:27:28', '2022-07-21 08:27:28'),
(204, 1, NULL, NULL, 5, '2022-07-21 08:27:35', '2022-07-21 08:27:35'),
(205, 1, NULL, NULL, 5, '2022-07-21 08:27:53', '2022-07-21 08:27:53'),
(206, 1, NULL, NULL, 5, '2022-07-21 08:27:53', '2022-07-21 08:27:53'),
(207, 1, NULL, NULL, 5, '2022-07-21 08:28:34', '2022-07-21 08:28:34'),
(208, 1, NULL, NULL, 5, '2022-07-21 08:28:38', '2022-07-21 08:28:38'),
(209, 1, NULL, NULL, 4, '2022-07-21 08:28:41', '2022-07-21 08:28:41'),
(210, 1, NULL, NULL, 4, '2022-07-21 08:28:43', '2022-07-21 08:28:43'),
(211, 1, NULL, NULL, 4, '2022-07-21 08:29:27', '2022-07-21 08:29:27'),
(212, 1, NULL, NULL, 4, '2022-07-21 08:29:45', '2022-07-21 08:29:45'),
(213, 1, NULL, NULL, 4, '2022-07-21 08:29:48', '2022-07-21 08:29:48'),
(214, 1, NULL, NULL, 4, '2022-07-21 08:29:55', '2022-07-21 08:29:55'),
(215, 1, NULL, NULL, 4, '2022-07-21 08:29:56', '2022-07-21 08:29:56'),
(216, 1, NULL, NULL, 4, '2022-07-21 08:29:57', '2022-07-21 08:29:57'),
(217, 1, NULL, NULL, 4, '2022-07-21 08:29:58', '2022-07-21 08:29:58'),
(218, 1, NULL, NULL, 4, '2022-07-21 08:30:00', '2022-07-21 08:30:00'),
(219, 1, NULL, NULL, 4, '2022-07-21 08:30:00', '2022-07-21 08:30:00'),
(220, 1, NULL, NULL, 4, '2022-07-21 08:30:02', '2022-07-21 08:30:02'),
(221, 1, NULL, NULL, 4, '2022-07-21 08:30:02', '2022-07-21 08:30:02'),
(222, 1, NULL, NULL, 4, '2022-07-21 08:30:07', '2022-07-21 08:30:07'),
(223, 1, NULL, NULL, 4, '2022-07-21 08:30:25', '2022-07-21 08:30:25'),
(224, 1, NULL, NULL, 4, '2022-07-21 08:30:29', '2022-07-21 08:30:29'),
(225, 1, NULL, NULL, 4, '2022-07-21 08:56:37', '2022-07-21 08:56:37'),
(226, 1, NULL, NULL, 4, '2022-07-21 08:56:52', '2022-07-21 08:56:52'),
(227, 1, NULL, NULL, 4, '2022-07-21 08:56:53', '2022-07-21 08:56:53'),
(228, 1, NULL, NULL, 4, '2022-07-21 08:57:10', '2022-07-21 08:57:10'),
(229, 1, NULL, NULL, 4, '2022-07-21 08:57:33', '2022-07-21 08:57:33'),
(230, 1, NULL, NULL, 4, '2022-07-21 08:57:40', '2022-07-21 08:57:40'),
(231, 1, NULL, NULL, 4, '2022-07-21 08:57:47', '2022-07-21 08:57:47'),
(232, 1, NULL, NULL, 4, '2022-07-21 08:57:53', '2022-07-21 08:57:53'),
(233, 1, NULL, NULL, 4, '2022-07-21 08:57:57', '2022-07-21 08:57:57'),
(234, 1, NULL, NULL, 4, '2022-07-21 08:57:57', '2022-07-21 08:57:57'),
(235, 1, NULL, NULL, 4, '2022-07-21 08:57:59', '2022-07-21 08:57:59'),
(236, 1, NULL, NULL, 4, '2022-07-21 08:57:59', '2022-07-21 08:57:59'),
(237, 1, NULL, NULL, 4, '2022-07-21 08:58:17', '2022-07-21 08:58:17'),
(238, 1, NULL, NULL, 4, '2022-07-21 08:58:25', '2022-07-21 08:58:25'),
(239, 1, NULL, NULL, 4, '2022-07-21 08:58:28', '2022-07-21 08:58:28'),
(240, 1, NULL, NULL, 4, '2022-07-21 08:58:37', '2022-07-21 08:58:37'),
(241, 1, NULL, NULL, 4, '2022-07-21 08:58:44', '2022-07-21 08:58:44'),
(242, 1, NULL, NULL, 4, '2022-07-21 08:59:13', '2022-07-21 08:59:13'),
(243, 1, NULL, NULL, 4, '2022-07-21 08:59:15', '2022-07-21 08:59:15'),
(244, 1, NULL, NULL, 4, '2022-07-21 08:59:20', '2022-07-21 08:59:20'),
(245, 1, NULL, NULL, 4, '2022-07-21 08:59:34', '2022-07-21 08:59:34'),
(246, 1, NULL, NULL, 4, '2022-07-21 08:59:34', '2022-07-21 08:59:34'),
(247, 1, NULL, NULL, 4, '2022-07-21 08:59:41', '2022-07-21 08:59:41'),
(248, 1, NULL, NULL, 4, '2022-07-21 08:59:45', '2022-07-21 08:59:45'),
(249, 1, NULL, NULL, 4, '2022-07-21 08:59:55', '2022-07-21 08:59:55'),
(250, 1, NULL, NULL, 4, '2022-07-21 08:59:55', '2022-07-21 08:59:55'),
(251, 1, NULL, NULL, 4, '2022-07-21 09:00:16', '2022-07-21 09:00:16'),
(252, 1, NULL, NULL, 4, '2022-07-21 09:00:23', '2022-07-21 09:00:23'),
(253, 1, NULL, NULL, 4, '2022-07-21 09:00:23', '2022-07-21 09:00:23'),
(254, 1, NULL, NULL, 4, '2022-07-21 09:00:49', '2022-07-21 09:00:49'),
(255, 1, NULL, NULL, 4, '2022-07-21 09:01:02', '2022-07-21 09:01:02'),
(256, 1, NULL, NULL, 4, '2022-07-21 09:01:02', '2022-07-21 09:01:02'),
(257, 1, NULL, NULL, 4, '2022-07-21 09:01:08', '2022-07-21 09:01:08'),
(258, 1, NULL, NULL, 4, '2022-07-21 09:01:15', '2022-07-21 09:01:15'),
(259, 1, NULL, NULL, 4, '2022-07-21 09:01:15', '2022-07-21 09:01:15'),
(260, 1, NULL, NULL, 4, '2022-07-21 09:01:24', '2022-07-21 09:01:24'),
(261, 1, NULL, NULL, 4, '2022-07-21 09:01:52', '2022-07-21 09:01:52'),
(262, 1, NULL, NULL, 4, '2022-07-21 09:01:57', '2022-07-21 09:01:57'),
(263, 1, NULL, NULL, 4, '2022-07-21 09:01:57', '2022-07-21 09:01:57'),
(264, 1, NULL, NULL, 4, '2022-07-21 09:02:02', '2022-07-21 09:02:02'),
(265, 1, NULL, NULL, 4, '2022-07-21 09:02:17', '2022-07-21 09:02:17'),
(266, 1, NULL, NULL, 3, '2022-07-21 09:02:26', '2022-07-21 09:02:26'),
(267, 1, NULL, NULL, 3, '2022-07-21 09:02:31', '2022-07-21 09:02:31'),
(268, 1, NULL, NULL, 3, '2022-07-21 09:03:00', '2022-07-21 09:03:00'),
(269, 1, NULL, NULL, 3, '2022-07-21 09:03:09', '2022-07-21 09:03:09'),
(270, 1, NULL, NULL, 3, '2022-07-21 09:04:02', '2022-07-21 09:04:02'),
(271, 1, NULL, NULL, 3, '2022-07-21 09:04:11', '2022-07-21 09:04:11'),
(272, 1, NULL, NULL, 3, '2022-07-21 09:04:11', '2022-07-21 09:04:11'),
(273, 1, NULL, NULL, 3, '2022-07-21 09:04:15', '2022-07-21 09:04:15'),
(274, 1, NULL, NULL, 3, '2022-07-21 09:05:21', '2022-07-21 09:05:21'),
(275, 1, NULL, NULL, 3, '2022-07-21 09:05:35', '2022-07-21 09:05:35'),
(276, 1, NULL, NULL, 3, '2022-07-21 09:05:58', '2022-07-21 09:05:58'),
(277, 1, NULL, NULL, 3, '2022-07-21 09:06:06', '2022-07-21 09:06:06'),
(278, 1, NULL, NULL, 3, '2022-07-21 09:06:06', '2022-07-21 09:06:06'),
(279, 1, NULL, NULL, 3, '2022-07-21 09:06:39', '2022-07-21 09:06:39'),
(280, 1, NULL, NULL, 3, '2022-07-21 09:06:44', '2022-07-21 09:06:44'),
(281, 1, NULL, NULL, 3, '2022-07-21 09:07:53', '2022-07-21 09:07:53'),
(282, 1, NULL, NULL, 3, '2022-07-21 09:08:21', '2022-07-21 09:08:21'),
(283, 1, NULL, NULL, 3, '2022-07-21 09:08:35', '2022-07-21 09:08:35'),
(284, 1, NULL, NULL, 3, '2022-07-21 09:08:35', '2022-07-21 09:08:35'),
(285, 1, NULL, NULL, 3, '2022-07-21 09:08:50', '2022-07-21 09:08:50'),
(286, 1, NULL, NULL, 3, '2022-07-21 09:08:59', '2022-07-21 09:08:59'),
(287, 1, NULL, NULL, 3, '2022-07-21 09:35:44', '2022-07-21 09:35:44'),
(288, 1, NULL, NULL, 3, '2022-07-21 09:35:53', '2022-07-21 09:35:53'),
(289, 1, NULL, NULL, 3, '2022-07-21 09:52:05', '2022-07-21 09:52:05'),
(290, 1, NULL, NULL, 3, '2022-07-21 09:52:55', '2022-07-21 09:52:55'),
(291, 1, NULL, NULL, 3, '2022-07-21 09:53:01', '2022-07-21 09:53:01'),
(292, 1, NULL, NULL, 4, '2022-07-21 09:58:46', '2022-07-21 09:58:46'),
(293, 1, NULL, NULL, 4, '2022-07-21 09:58:48', '2022-07-21 09:58:48'),
(294, 1, NULL, NULL, 5, '2022-07-21 10:17:35', '2022-07-21 10:17:35'),
(295, 1, NULL, NULL, 5, '2022-07-21 10:17:37', '2022-07-21 10:17:37'),
(296, 1, NULL, NULL, 3, '2022-07-21 10:34:46', '2022-07-21 10:34:46'),
(297, 1, NULL, NULL, 6, '2022-07-21 10:34:51', '2022-07-21 10:34:51'),
(298, 1, NULL, NULL, 6, '2022-07-21 10:34:53', '2022-07-21 10:34:53'),
(299, 1, NULL, NULL, 5, '2022-07-21 11:01:39', '2022-07-21 11:01:39'),
(300, 1, NULL, NULL, 1, '2022-07-21 12:30:51', '2022-07-21 12:30:51'),
(301, 1, NULL, NULL, 3, '2022-07-21 12:31:33', '2022-07-21 12:31:33'),
(302, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 4, '2022-07-21 14:19:27', '2022-07-21 14:19:27'),
(303, 3, NULL, NULL, 4, '2022-07-21 14:19:31', '2022-07-21 14:19:31'),
(304, 3, NULL, NULL, 4, '2022-07-21 14:19:36', '2022-07-21 14:19:36'),
(305, 3, NULL, NULL, 7, '2022-07-21 14:19:45', '2022-07-21 14:19:45'),
(306, 3, NULL, NULL, 7, '2022-07-21 14:19:48', '2022-07-21 14:19:48'),
(307, 3, NULL, NULL, 7, '2022-07-21 14:19:59', '2022-07-21 14:19:59'),
(308, 3, NULL, NULL, 7, '2022-07-21 14:20:18', '2022-07-21 14:20:18'),
(309, 1, NULL, NULL, 4, '2022-07-22 00:28:11', '2022-07-22 00:28:11'),
(310, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 3, '2022-07-22 05:31:50', '2022-07-22 05:31:50'),
(311, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 5, '2022-07-22 05:31:57', '2022-07-22 05:31:57'),
(312, NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 5, '2022-07-22 05:32:08', '2022-07-22 05:32:08'),
(313, 10, NULL, NULL, 5, '2022-07-22 05:32:39', '2022-07-22 05:32:39'),
(314, 10, NULL, NULL, 5, '2022-07-22 05:32:45', '2022-07-22 05:32:45'),
(315, 10, NULL, NULL, 7, '2022-07-22 05:33:53', '2022-07-22 05:33:53'),
(316, 10, NULL, NULL, 7, '2022-07-22 05:33:57', '2022-07-22 05:33:57'),
(317, 10, NULL, NULL, 7, '2022-07-22 05:34:18', '2022-07-22 05:34:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_settings`
--
ALTER TABLE `application_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
