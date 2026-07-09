-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2026 at 01:29 AM
-- Server version: 9.6.0
-- PHP Version: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invitation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brides`
--

CREATE TABLE `brides` (
  `id` bigint UNSIGNED NOT NULL,
  `invitation_id` bigint UNSIGNED NOT NULL,
  `groom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groom_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groom_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bride_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bride_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `love_story` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brides`
--

INSERT INTO `brides` (`id`, `invitation_id`, `groom_name`, `groom_nickname`, `groom_father`, `groom_mother`, `groom_photo`, `bride_name`, `bride_nickname`, `bride_father`, `bride_mother`, `bride_photo`, `love_story`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zaky', 'Zaky', 'Khakim', 'Laeli', NULL, 'Alisha', 'Alisha', 'Ali', 'Vita', NULL, NULL, '2026-05-25 04:40:50', '2026-05-25 04:40:50'),
(2, 2, 'Sitii Nur', 'Siti', 'Test', 'Test', NULL, 'Siman Ganteng', 'Siman', 'test', 'test', NULL, NULL, '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(3, 3, 'Ramadhan', 'Rama', 'Bapak Rem', 'Ibu Rum', NULL, 'Sinta Dwi', 'Sinta', 'Bapak Sin', 'Ibu Sun', NULL, NULL, '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(4, 4, 'Salim Sulaiman', 'Salim', 'Sulaiman', 'Hawa', NULL, 'Salimah Sulaimani', 'Salimah', 'Sulaimani', 'Hawa', NULL, NULL, '2026-07-07 22:08:29', '2026-07-07 22:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-1ef3f99b24cec81b06076384330ad064', 'i:1;', 1783558549),
('laravel-cache-1ef3f99b24cec81b06076384330ad064:timer', 'i:1783558549;', 1783558549),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1779698075),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1779698075;', 1779698075),
('laravel-cache-9835133970fcc9ca90d58caee7af879e', 'i:1;', 1780471374),
('laravel-cache-9835133970fcc9ca90d58caee7af879e:timer', 'i:1780471374;', 1780471374),
('laravel-cache-a6cf3449fbccdc26d9aeadb6f26b8c25', 'i:1;', 1783558380),
('laravel-cache-a6cf3449fbccdc26d9aeadb6f26b8c25:timer', 'i:1783558380;', 1783558380),
('laravel-cache-admin@gmail.com|127.0.0.1', 'i:3;', 1783515357),
('laravel-cache-admin@gmail.com|127.0.0.1:timer', 'i:1783515357;', 1783515357),
('laravel-cache-b268e3db78af83f167c2b8546ee63e76', 'i:1;', 1783487042),
('laravel-cache-b268e3db78af83f167c2b8546ee63e76:timer', 'i:1783487042;', 1783487042),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a', 'i:3;', 1783515357),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a:timer', 'i:1783515357;', 1783515357),
('laravel-cache-debe483a4ef836bd5b400831a98c6708', 'i:1;', 1783514975),
('laravel-cache-debe483a4ef836bd5b400831a98c6708:timer', 'i:1783514975;', 1783514975),
('laravel-cache-eb41b5a004c61ce2997242ffb94a0568', 'i:1;', 1783518340),
('laravel-cache-eb41b5a004c61ce2997242ffb94a0568:timer', 'i:1783518340;', 1783518340);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `envelopes`
--

CREATE TABLE `envelopes` (
  `id` bigint UNSIGNED NOT NULL,
  `invitation_id` bigint UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `envelopes`
--

INSERT INTO `envelopes` (`id`, `invitation_id`, `bank_name`, `account_number`, `account_owner`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dana', '085802908730', 'Zaky', '2026-05-25 04:40:50', '2026-05-25 04:40:50'),
(2, 2, 'Dana', '085802908730', 'Siti', '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(3, 2, 'Dana', '07874683234', 'Siman', '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(4, 3, 'Dana', '085802908730', 'Rama', '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(5, 3, 'Dana', '07874683234', 'Sinta', '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(6, 4, 'Dana', '085802908730', 'Salim', '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(7, 4, 'BCA', '088746783764', 'Salimmah', '2026-07-07 22:08:29', '2026-07-07 22:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `invitation_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `invitation_id`, `file_path`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'galleries/EX6KnV44khGXb8wZaALWCJKy25VwVsLqZbLqTiE3.jpg', 0, '2026-05-25 04:40:50', '2026-05-25 04:40:50'),
(2, 2, 'galleries/bHFjagQllPHB69lpZAMjXWzhLBFCe00M0gxzgrZm.jpg', 0, '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(3, 3, 'galleries/1kXaYOBgRC03C8GbORKA07s7Hu9QZQ75CrDAtlfW.png', 0, '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(4, 3, 'galleries/UpbGVWzADJaG58a2HqbKL64oKrfE5xigK5QxObiv.jpg', 1, '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(5, 3, 'galleries/9IHwTE9qPDXLLpX61dpeyadNS6nAmxv7etqXhUYv.png', 2, '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(6, 4, 'galleries/29cCiAleLwEn198wcHBNu0TF7osTTyaNygybEcny.png', 0, '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(7, 4, 'galleries/rux7zwkwgkD1mXZ5OYriC9ye68fwAubZEo9T0PUZ.jpg', 1, '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(8, 4, 'galleries/P40hGJ8BBAPYXpg8V4IblgmM6Of9cm9lwwH2h3rb.png', 2, '2026-07-07 22:08:29', '2026-07-07 22:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `guestbooks`
--

CREATE TABLE `guestbooks` (
  `id` bigint UNSIGNED NOT NULL,
  `invitation_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` enum('hadir','tidak_hadir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guestbooks`
--

INSERT INTO `guestbooks` (`id`, `invitation_id`, `name`, `attendance`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 'Zaky Rama', 'hadir', 'Samawa', '2026-06-03 23:41:27', '2026-06-03 23:41:27'),
(2, 4, 'Dimas', 'tidak_hadir', 'kontol', '2026-07-07 22:11:19', '2026-07-07 22:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint UNSIGNED NOT NULL,
  `invitation_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `invitation_id`, `name`, `slug`, `status_attendance`, `created_at`, `updated_at`) VALUES
(1, 1, 'zaky', 'zaky', 'pending', '2026-05-25 04:40:50', '2026-05-25 04:40:50'),
(2, 2, 'Rama', 'rama', 'pending', '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(3, 2, 'Ridho', 'ridho', 'pending', '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(4, 2, 'Ardhi', 'ardhi', 'pending', '2026-06-03 00:48:37', '2026-06-03 00:48:37'),
(5, 3, 'Ardian', 'ardian', 'pending', '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(6, 3, 'Ridho', 'ridho', 'pending', '2026-06-03 23:40:17', '2026-06-03 23:40:17'),
(7, 4, 'Ardi', 'ardi', 'pending', '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(8, 4, 'Dimas', 'dimas', 'pending', '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(9, 4, 'Zaky', 'zaky', 'pending', '2026-07-07 22:08:29', '2026-07-07 22:08:29'),
(10, 4, 'Dodi', 'dodi', 'pending', '2026-07-07 22:08:29', '2026-07-07 22:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_maps_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'romance',
  `custom_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mobile-responsive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `font_family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'serif',
  `quote_text` text COLLATE utf8mb4_unicode_ci,
  `quote_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_stream_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_gift_address` text COLLATE utf8mb4_unicode_ci,
  `akad_date` date DEFAULT NULL,
  `akad_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akad_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akad_address` text COLLATE utf8mb4_unicode_ci,
  `music_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `user_id`, `slug`, `title`, `event_date`, `event_time`, `location_name`, `location_address`, `google_maps_url`, `template_theme`, `custom_size`, `created_at`, `updated_at`, `font_family`, `quote_text`, `quote_source`, `live_stream_url`, `physical_gift_address`, `akad_date`, `akad_time`, `akad_location`, `akad_address`, `music_path`) VALUES
(1, NULL, 'zaky-alisha-94nu5', 'Zaky & Alish', '2027-08-25', '10:00:00', 'Hotel', 'Jl. Tegal', NULL, 'forest', 'normal', '2026-05-25 04:40:50', '2026-05-25 04:40:50', 'sans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'siti-siman-moyqf', 'Siti & Siman', '2026-06-04', '14:45:00', 'Mempelai Wanita', 'Jl. Tegal Selatan', 'https://maps.app.goo.gl/TY3nrBjSf5awsf32A', 'forest', 'normal', '2026-06-03 00:48:37', '2026-06-03 00:48:37', 'serif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'rama-sinta-ffesk', 'Rama & Sinta', '2026-06-05', '13:34:00', 'Mempelai Wanita', 'Jl. Tegal barat', 'https://maps.app.goo.gl/9uUpwqhsuXphCzwz5', 'gold', 'loose', '2026-06-03 23:40:17', '2026-06-03 23:40:17', 'serif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'music/SfWYAEB8tCRx0DYGdpYzojhRUTT2VqHle2bjO8dA.mp3'),
(4, NULL, 'salim-salimah-ltdbo', 'Salim & Ardi', '2026-07-09', '10:00:00', 'Mempelai Wanita', 'Lebakgowah', 'https://maps.app.goo.gl/dL4XKZ6jCrGMC4JR9', 'forest', 'compact', '2026-07-07 22:08:29', '2026-07-07 22:08:29', 'sans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'music/T58dvJM21a1QgBOccb5Np3vv7vb8D2HHxlIJ56KJ.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000000_create_passkeys_table', 1),
(5, '2025_08_14_170933_add_two_factor_columns_to_users_table', 1),
(6, '2026_05_25_043116_create_invitations_table', 1),
(7, '2026_05_25_043117_create_brides_table', 1),
(8, '2026_05_25_043118_create_guests_table', 1),
(9, '2026_05_25_043119_create_envelopes_table', 1),
(10, '2026_05_25_043120_create_galleries_table', 1),
(11, '2026_05_25_080334_add_font_family_to_invitations_table', 2),
(12, '2026_06_04_062151_add_music_path_to_invitations_table', 3),
(13, '2026_06_04_062605_create_guestbooks_table', 4),
(14, '2026_07_08_123708_add_role_to_users_table', 5),
(15, '2026_07_08_135252_add_new_features_to_invitations_and_brides_tables', 6),
(16, '2026_07_08_141132_create_themes_table', 7),
(17, '2026_07_08_141133_add_theme_id_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `passkeys`
--

CREATE TABLE `passkeys` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential` json NOT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Dz45BtmJiRQkAXiTabiHWYwySOeKGzEoyiHrVrnY', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHZExsZXBuczNwcmt2ZjMwWEcwU01MWVFPVkNOTWpwdE9CR1dUSnJVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1783558293),
('Lyr4c4Nur1G3TfAjlSDnt9UWF9S4bGCLTwBn0tad', 4, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMNGptRUM2VzhVbnhJN1NmUWlkd1htdGMwaFcwQWNQeG9qSlBSRTZnIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NsaWVudFwvYnVpbGRlciIsInJvdXRlIjoiY2xpZW50LmJ1aWxkZXIuaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjR9', 1783559817),
('UNHFNirROys4FS5EVcNCD88HNQEQYlvmyyVPOcD3', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJhWEI5UWtYaFFvUllwekg4QlZrUlRDZ1FEdDQwUGtaNWRybnVLeFI1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NsaWVudFwvYnVpbGRlciIsInJvdXRlIjoiY2xpZW50LmJ1aWxkZXIuaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjJ9', 1783521777);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `promo_price` int DEFAULT NULL,
  `preview_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `slug`, `price`, `promo_price`, `preview_image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bunga Biru', 'bunga-biru', 120000, NULL, 'themes/9L9MFZOPTnCvLfISZDAQ6hxNe3Ljq9q1tEE0Jskc.jpg', 1, '2026-07-08 17:53:08', '2026-07-08 17:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theme_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `theme_id`) VALUES
(1, 'Zaky Rama', 'zaky@gmail.com', 'client', NULL, '$2y$12$8YkRsJEd0NKZW2vpp/zWtO3mmWMn7uVtsctxG80oMkVwu5HXkDAoC', NULL, NULL, NULL, NULL, '2026-05-24 21:58:43', '2026-05-24 21:58:43', NULL),
(2, 'Administrator', 'admin@admin.com', 'admin', NULL, '$2y$12$IKZNk9QHfGCe.4dVZdF8se6YoHT/gEq0Xk8mZyQM838M1aWKwyG0.', NULL, NULL, NULL, NULL, '2026-07-08 05:38:46', '2026-07-08 05:38:46', NULL),
(3, 'Arif Dwi', 'arif@gmail.com', 'client', NULL, '$2y$12$/f1splw.vESYWldyrSECdeqi7UC9CCGwb/BSubhKAN9VIdCO7y6wm', NULL, NULL, NULL, NULL, '2026-07-08 06:44:19', '2026-07-08 06:44:19', NULL),
(4, 'Cahyo Mukti', 'cahyo@gmail.com', 'client', NULL, '$2y$12$nxjLkYxlxAJT18oSWKvDSuy8zXNDbwv5VdNliW5YWFpmjgM.JBcjG', NULL, NULL, NULL, NULL, '2026-07-08 17:54:21', '2026-07-08 17:54:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brides`
--
ALTER TABLE `brides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brides_invitation_id_foreign` (`invitation_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `envelopes`
--
ALTER TABLE `envelopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `envelopes_invitation_id_foreign` (`invitation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_invitation_id_foreign` (`invitation_id`);

--
-- Indexes for table `guestbooks`
--
ALTER TABLE `guestbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guestbooks_invitation_id_foreign` (`invitation_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guests_invitation_id_foreign` (`invitation_id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitations_slug_unique` (`slug`),
  ADD KEY `invitations_user_id_foreign` (`user_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passkeys_credential_id_unique` (`credential_id`),
  ADD KEY `passkeys_user_id_index` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `themes_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_theme_id_foreign` (`theme_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brides`
--
ALTER TABLE `brides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `envelopes`
--
ALTER TABLE `envelopes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guestbooks`
--
ALTER TABLE `guestbooks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `passkeys`
--
ALTER TABLE `passkeys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brides`
--
ALTER TABLE `brides`
  ADD CONSTRAINT `brides_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `envelopes`
--
ALTER TABLE `envelopes`
  ADD CONSTRAINT `envelopes_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guestbooks`
--
ALTER TABLE `guestbooks`
  ADD CONSTRAINT `guestbooks_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passkeys`
--
ALTER TABLE `passkeys`
  ADD CONSTRAINT `passkeys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
