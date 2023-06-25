-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveladmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filemanagers`
--

CREATE TABLE `filemanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filemanagers`
--

INSERT INTO `filemanagers` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 'mobile_login.jpeg', 'public/files\\mobile_login.jpeg', '2023-01-03 02:22:53', NULL),
(2, '(013) SU JUR IF.pdf', 'public/files\\(013) SU JUR IF.pdf', '2023-01-03 02:24:07', NULL),
(3, 'BASIS DATA PENDATAN (1).pptx', 'public/files\\BASIS DATA PENDATAN (1).pptx', '2023-01-03 02:25:52', NULL),
(4, 'wpu_login.sql', 'public/files\\wpu_login.sql', '2023-01-03 02:28:25', NULL),
(5, '9274-Article Text-33864-1-10-20220403.pdf', 'public/files\\9274-Article Text-33864-1-10-20220403.pdf', '2023-01-04 04:52:56', NULL),
(6, 'P3. Javascript.pdf', 'public/files\\P3. Javascript.pdf', '2023-01-04 05:14:19', NULL),
(7, '22.PNG', 'public/files\\22.PNG', '2023-01-04 05:15:30', NULL),
(8, 'DIAGRAM-ERD.jpg', 'public/files\\DIAGRAM-ERD.jpg', '2023-01-04 07:51:56', NULL),
(9, 'wallhaven-nrdl11.jpg', 'public/files\\wallhaven-nrdl11.jpg', '2023-03-13 09:24:39', NULL),
(10, 'ClassDiagram_P-data.png', 'public/files\\ClassDiagram_P-data.png', '2023-03-13 09:24:50', NULL),
(11, 'chmpions.png', 'public/files\\chmpions.png', '2023-03-13 09:24:56', NULL),
(12, 'aduh.png', 'public/files\\aduh.png', '2023-03-13 09:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `folder`, `file`, `created_at`, `updated_at`) VALUES
(4, '1687251003_KTM_1.jpg', '20230620-1687251003-KTM_1.jpg', '2023-06-20 01:50:04', '2023-06-20 01:50:04'),
(5, '1687252646_KOP SURAT.pdf', '20230620-1687252646-KOP SURAT.pdf', '2023-06-20 02:17:28', '2023-06-20 02:17:28'),
(15, '1687254935_ACC113_Midterm_3.docx', '20230620ACC113_Midterm_3.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(16, '1687254935_ACC113_Cheat_Sheet_2.docx', '20230620ACC113_Cheat_Sheet_2.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(17, '1687254936_ACC113_Summary_2.docx', '20230620ACC113_Summary_2.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(18, '1687254936_ACC113_Infomation_5.docx', '20230620ACC113_Infomation_5.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(19, '1687254937_ACC113_Lab_Report_6.docx', '20230620ACC113_Lab_Report_6.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(20, '1687254937_ACC113_Lecture_8.docx', '20230620ACC113_Lecture_8.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(21, '1687254937_ACC113_Lecture_Notes_9.docx', '20230620ACC113_Lecture_Notes_9.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(22, '1687254938_ACC113_Practice_4.docx', '20230620ACC113_Practice_4.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(23, '1687254938_ACC113-Assessment-3.docx', '20230620ACC113-Assessment-3.docx', '2023-06-20 02:55:49', '2023-06-20 02:55:49'),
(24, '1687255183-ACC113-Questions-7.docx', '20230620ACC113-Questions-7.docx', '2023-06-20 02:59:45', '2023-06-20 02:59:45'),
(25, '1687323307-ACC113-Questions-7.docx', '20230621ACC113-Questions-7.docx', '2023-06-20 21:55:10', '2023-06-20 21:55:10'),
(26, '1687323795-Oldtown.png', '20230621Oldtown.png', '2023-06-20 22:03:17', '2023-06-20 22:03:17'),
(27, '1687331477-wallhaven-0jmg55.jpg', '20230621wallhaven-0jmg55.jpg', '2023-06-21 00:11:31', '2023-06-21 00:11:31'),
(28, '1687332572-(013) SU JUR IF.pdf', '20230621(013) SU JUR IF.pdf', '2023-06-21 00:29:44', '2023-06-21 00:29:44'),
(29, '1687332592-3312101061_Tunas Safetyan M.docx', '202306213312101061_Tunas Safetyan M.docx', '2023-06-21 00:29:55', '2023-06-21 00:29:55'),
(30, '1687404953-Screenshot 2023-06-22 085730.png', '20230622Screenshot 2023-06-22 085730.png', '2023-06-21 20:36:15', '2023-06-21 20:36:15'),
(31, '1687405081-A4 - 1.png', '20230622A4 - 1.png', '2023-06-21 20:38:31', '2023-06-21 20:38:31'),
(32, '1687405309-dashboard.png', '20230622dashboard.png', '2023-06-21 20:42:10', '2023-06-21 20:42:10');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_22_062646_add_role_id_column_to_users_table', 2),
(6, '2022_11_22_062802_create_roles_table', 2),
(7, '2022_11_22_063156_add_role_id_column_to_users_table', 3),
(8, '2022_11_22_073821_add_role_id_column_to_users_table', 4),
(9, '2022_11_30_073142_add_photo_column_to_users_table', 4),
(11, '2022_12_12_131137_create_filemanagers_table', 5),
(12, '2023_05_08_135013_create_files_table', 6),
(13, '2023_05_08_135149_create_temporary_files_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', '2022-11-21 23:38:05', '2022-11-21 23:38:05'),
(2, 'Admin', '2022-11-21 23:38:05', '2022-11-21 23:38:05'),
(3, 'User', '2022-11-21 23:38:05', '2022-11-21 23:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_files`
--

INSERT INTO `temporary_files` (`id`, `folder`, `file`, `created_at`, `updated_at`) VALUES
(49, '2023-06-06_1686061230_dedi.jpeg', '2023-06-06_1686061230_dedi.jpeg', '2023-06-06 07:20:30', '2023-06-06 07:20:30'),
(52, '2023-06-07_1686096635_P5_Kelompok1_RegulerC_DW.pptx', '2023-06-07_1686096635_P5_Kelompok1_RegulerC_DW.pptx', '2023-06-06 17:10:35', '2023-06-06 17:10:35'),
(53, '2023-06-07_1686097127_P5_Kelompok1_RegulerC_DW.pptx', '2023-06-07_1686097127_P5_Kelompok1_RegulerC_DW.pptx', '2023-06-06 17:18:47', '2023-06-06 17:18:47'),
(64, '1687250015_KTM_1.jpg', '20230620-1687250015-KTM_1.jpg', '2023-06-20 01:33:36', '2023-06-20 01:33:36'),
(65, '1687250187_KTM_1.jpg', '20230620-1687250187-KTM_1.jpg', '2023-06-20 01:36:27', '2023-06-20 01:36:27'),
(66, '1687250493_Tunas Safetyan Manurung.jpg', '20230620-1687250493-Tunas Safetyan Manurung.jpg', '2023-06-20 01:41:33', '2023-06-20 01:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favorite_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `photo`, `favorite_color`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Budi Sudarsono', 'budi.superadmin@polibatam.ac.id', 1, NULL, '$2y$10$e3kALuRqZtDJJo8dkkY83uRR2izAMhtQgk3EW/karUfpmZ3BTNsti', 'default.jpg', 'Red', 1, NULL, NULL, '2023-02-14 06:42:43'),
(2, 'Jack', 'jack.admin@polibatam.ac.id', 2, NULL, '$2y$10$LUcBXNPHLs.929DjU6/O6O838qyW72BNSvcYK2YyCv/BE2vX40mnm', 'default.jpg', '', 1, NULL, '2022-12-12 19:06:24', '2022-12-12 19:06:24'),
(3, 'Darman', 'darman.user@polibatam.ac.id', 3, NULL, '$2y$10$7pfEfcBnBahGl8OXN5eaMORpAkJiVnly4MCbNyY2RVIJtxTq9z4C.', 'default.jpg', 'Red', 1, NULL, '2022-12-12 19:06:52', '2022-12-29 09:12:44'),
(14, 'Super Admin', 'superadmin@gmail.com', 1, NULL, '$2y$10$N/DyJWbnaKSbvF3/puv6IOSdmX5QY036cMUDbT/ONk8B5N2TmtgPa', 'default.jpg', NULL, 1, NULL, '2023-06-20 02:16:23', '2023-06-20 02:17:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filemanagers`
--
ALTER TABLE `filemanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filemanagers`
--
ALTER TABLE `filemanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
