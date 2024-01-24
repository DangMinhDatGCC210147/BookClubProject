-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 06:29 PM
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
-- Database: `bookclubmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `idEvent` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` datetime NOT NULL DEFAULT '2024-01-24 20:06:16',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nameEvent` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `description_1` longtext NOT NULL,
  `description_2` longtext NOT NULL,
  `description_3` longtext NOT NULL,
  `description_4` longtext NOT NULL,
  `comments` text DEFAULT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `jan` tinyint(4) NOT NULL DEFAULT 0,
  `feb` tinyint(4) NOT NULL DEFAULT 0,
  `mar` tinyint(4) NOT NULL DEFAULT 0,
  `apr` tinyint(4) NOT NULL DEFAULT 0,
  `may` tinyint(4) NOT NULL DEFAULT 0,
  `jun` tinyint(4) NOT NULL DEFAULT 0,
  `jul` tinyint(4) NOT NULL DEFAULT 0,
  `aug` tinyint(4) NOT NULL DEFAULT 0,
  `sep` tinyint(4) NOT NULL DEFAULT 0,
  `oct` tinyint(4) NOT NULL DEFAULT 0,
  `nov` tinyint(4) NOT NULL DEFAULT 0,
  `dec` tinyint(4) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `idSt`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`, `total`, `created_at`, `updated_at`) VALUES
(1, 'GDC210099', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-01-24 17:24:40', '2024-01-24 17:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `course` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `joiningDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `idSt`, `image`, `name`, `gender`, `dateOfBirth`, `course`, `email`, `phoneNumber`, `joiningDate`, `created_at`, `updated_at`) VALUES
(1, 'GDC210099', 'images/members/z3812361223142_04dce7d235f5a48db65acef00a891020.jpg', 'Nguyễn Huỳnh Ngọc Thi', 1, '1974-04-09', 'K10', 'thinhngdc210099@fpt.edu.vn', '0907294396', '2021-06-14', '2024-01-24 17:24:40', '2024-01-24 17:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `member_event`
--

CREATE TABLE `member_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `idEvent` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(7, '2023_12_28_211217_create_payments_table', 1),
(23, '2024_01_06_213734_add_comments_to_events_table', 9),
(92, '2014_10_12_000000_create_users_table', 10),
(93, '2014_10_12_100000_create_password_reset_tokens_table', 10),
(94, '2019_08_19_000000_create_failed_jobs_table', 10),
(95, '2019_12_14_000001_create_personal_access_tokens_table', 10),
(96, '2023_12_28_211151_create_members_table', 10),
(97, '2023_12_28_211211_create_events_table', 10),
(98, '2023_12_28_211221_create_attendances_table', 10),
(99, '2023_12_30_183642_create_member_event_table', 10),
(100, '2024_01_01_024935_create_funds_table', 10),
(101, '2024_01_01_081046_create_total_funds_table', 10),
(102, '2024_01_06_231633_create_payments_table', 10);

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
  `name` varchar(255) NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 20000,
  `checkout_time` timestamp NULL DEFAULT '2024-01-24 13:06:16',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `total_funds`
--

CREATE TABLE `total_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `idSt` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `password_reset_sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `idSt`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `password_reset_token`, `password_reset_sent_at`, `created_at`, `updated_at`) VALUES
(1, 'Đặng Minh Đạt', 'GCC210147', 2, 'datdmgcc210147@fpt.edu.vn', NULL, '$2y$12$GkhLpV2dqdidsD5FQgrTwumL78BYC0xJabIfBl7Cf.kE.OIdWrKrC', NULL, NULL, NULL, '2024-01-24 17:06:44', '2024-01-24 17:06:44'),
(2, 'Nguyễn Huỳnh Ngọc Thi', 'GDC210099', 0, 'thinhngdc210099@fpt.edu.vn', NULL, '$2y$12$1PRXAttim1BYj9VA/U7nseTMgn/wb6DDQ4Xu/qwCTkIFTGldEX/Lm', NULL, NULL, NULL, '2024-01-24 17:07:26', '2024-01-24 17:07:26'),
(3, 'Nguyễn Thị Tú Trinh', 'GBC230138', 0, 'trinhnttgbc230138@fpt.edu.vn', NULL, '$2y$12$53UFgxkFqT26uo.Od3XpmetrYvRlThc1a6GIMAFa4uf4a9xXpLVIa', NULL, NULL, NULL, '2024-01-24 17:07:59', '2024-01-24 17:07:59'),
(4, 'La Xuân Uyên', 'GCC230050', 0, 'uyenlxgcc230050@fpt.edu.vn', NULL, '$2y$12$J9grOT8KzWLOTeZAa3as.eFrC5JEIR.wgUCWITmFhlyPj38lJtC0G', NULL, NULL, NULL, '2024-01-24 17:08:19', '2024-01-24 17:08:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_idst_foreign` (`idSt`),
  ADD KEY `attendances_idevent_foreign` (`idEvent`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `funds_idst_unique` (`idSt`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_idst_unique` (`idSt`);

--
-- Indexes for table `member_event`
--
ALTER TABLE `member_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_event_idst_foreign` (`idSt`),
  ADD KEY `member_event_idevent_foreign` (`idEvent`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `payments_idst_foreign` (`idSt`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `total_funds`
--
ALTER TABLE `total_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_idst_unique` (`idSt`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_event`
--
ALTER TABLE `member_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_funds`
--
ALTER TABLE `total_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_idevent_foreign` FOREIGN KEY (`idEvent`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_idst_foreign` FOREIGN KEY (`idSt`) REFERENCES `members` (`idSt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `funds_idst_foreign` FOREIGN KEY (`idSt`) REFERENCES `members` (`idSt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_idst_foreign` FOREIGN KEY (`idSt`) REFERENCES `users` (`idSt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_event`
--
ALTER TABLE `member_event`
  ADD CONSTRAINT `member_event_idevent_foreign` FOREIGN KEY (`idEvent`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_event_idst_foreign` FOREIGN KEY (`idSt`) REFERENCES `members` (`idSt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_idst_foreign` FOREIGN KEY (`idSt`) REFERENCES `members` (`idSt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
