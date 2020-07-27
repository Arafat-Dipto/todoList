-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 12:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minilist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `verified`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$Ldsh7oX9cu8QJpMglXLDoeNBAfBokYN502RiJ9mUmhoUNcC6/f3l6', 1, 'admin', NULL, '2020-07-26 02:15:36', '2020-07-26 02:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_tasks`
--

CREATE TABLE `assigned_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` int(11) NOT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `t_done` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_tasks`
--

INSERT INTO `assigned_tasks` (`id`, `child_id`, `task_id`, `t_done`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'completed', '2020-07-25 08:14:18', '2020-07-25 23:58:42'),
(2, 2, 1, 'completed', '2020-07-25 08:17:40', '2020-07-25 20:43:09'),
(3, 2, 2, 'completed', '2020-07-25 08:17:40', '2020-07-26 01:13:26'),
(6, 1, 1, 'incomplete', '2020-07-25 20:37:25', '2020-07-25 20:37:25'),
(7, 1, 2, 'completed', '2020-07-25 20:37:25', '2020-07-25 20:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `assign_names`
--

CREATE TABLE `assign_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_names`
--

INSERT INTO `assign_names` (`id`, `parent_id`, `child_id`, `created_at`, `updated_at`) VALUES
(3, 2, 2, '2020-07-25 02:47:23', '2020-07-25 02:47:23'),
(5, 1, 2, '2020-07-25 05:19:54', '2020-07-25 05:19:54'),
(6, 1, 1, '2020-07-25 20:37:21', '2020-07-25 20:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `password`, `verified`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', 'KHAN', 'jhon12', 'khanarafat1245@gmail.com', '01922384927', '$2y$10$skWR.nW/Plwf2xoiyA78gePSIVTUaUqPJQ9S1L62l0Axgv0L9xW0i', 1, 'child', NULL, '2020-07-25 01:19:48', '2020-07-25 01:19:48'),
(2, 'Shaun', 'Mendis', 'Shaun12', 'shaun@mail.com', '01934567287', '$2y$10$58l3sCi/b7D2RzGsVC2tD.2uzVYAWqgfrKEFRSzSx2LrbSbwvqiHS', 1, 'child', NULL, '2020-07-25 02:46:54', '2020-07-25 02:46:54');

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
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2020_07_24_150343_create_ptasks_table', 1),
(21, '2020_07_24_152435_add_user_id_column_in_ptasks_table', 1),
(22, '2020_07_25_055318_add_username_column_in_users_table', 1),
(23, '2020_07_25_064519_create_children_table', 1),
(24, '2020_07_25_072055_create_assign_names_table', 2),
(25, '2020_07_25_102056_add_task_done_column_in_ptasks_table', 3),
(27, '2020_07_25_111636_create_assigned_tasks_table', 4),
(28, '2020_07_25_143729_create_submissions_table', 5),
(29, '2020_07_26_021544_add_gained_mark_column_in_submissions_table', 6),
(30, '2020_07_26_064740_add_child_id_column_in_submissions_table', 7),
(31, '2020_07_26_080354_create_admins_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ptasks`
--

CREATE TABLE `ptasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof` tinyint(4) NOT NULL,
  `task_done` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ptasks`
--

INSERT INTO `ptasks` (`id`, `task_name`, `point`, `proof`, `task_done`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'math homework', '12', 1, 0, '2020-07-25 01:18:49', '2020-07-25 01:18:49', 1),
(2, 'Eat dinner', '10', 0, 0, '2020-07-25 01:19:04', '2020-07-25 01:19:04', 1),
(3, 'Buy food', '30', 1, 0, '2020-07-25 04:03:30', '2020-07-25 04:03:30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gained_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `assign_id`, `details`, `pr_img`, `gained_mark`, `created_at`, `updated_at`, `child_id`) VALUES
(9, 2, 'task is done', 'no image', 12, '2020-07-25 20:43:09', '2020-07-26 00:36:11', 2),
(10, 7, 'task is done', 'no image', 0, '2020-07-25 20:59:50', '2020-07-25 20:59:50', 1),
(11, 1, 'task is done', '5f1d1b92e4945.jpg', 0, '2020-07-25 23:58:42', '2020-07-25 23:58:42', 2),
(12, 3, 'task is done', 'no image', 10, '2020-07-26 01:13:26', '2020-07-26 01:13:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `password`, `verified`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arafat', 'KHAN', 'Arafat12', 'khandipto0010@gmail.com', '01922384927', '$2y$10$RTeLHVMp3NR6A0GNYunGf.YDeET0S7eVUc4iSrnN4x4MWV3gmXB/O', 1, 'parent', NULL, '2020-07-25 01:17:52', '2020-07-25 01:17:52'),
(2, 'Sami', 'adams', 'sami22', 'sami@email.com', '01224384', '$2y$10$BIwnRuQHlwDIejhZoWHNGuGDX3biyogEoy8XP9.aC2.P1CBkcnJHy', 1, 'parent', NULL, '2020-07-25 01:35:41', '2020-07-25 01:35:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assigned_tasks`
--
ALTER TABLE `assigned_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_tasks_task_id_foreign` (`task_id`);

--
-- Indexes for table `assign_names`
--
ALTER TABLE `assign_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_names_parent_id_foreign` (`parent_id`),
  ADD KEY `assign_names_child_id_foreign` (`child_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `children_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptasks`
--
ALTER TABLE `ptasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ptasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_assign_id_foreign` (`assign_id`),
  ADD KEY `submissions_child_id_foreign` (`child_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_tasks`
--
ALTER TABLE `assigned_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_names`
--
ALTER TABLE `assign_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ptasks`
--
ALTER TABLE `ptasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_tasks`
--
ALTER TABLE `assigned_tasks`
  ADD CONSTRAINT `assigned_tasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `ptasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_names`
--
ALTER TABLE `assign_names`
  ADD CONSTRAINT `assign_names_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_names_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ptasks`
--
ALTER TABLE `ptasks`
  ADD CONSTRAINT `ptasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_assign_id_foreign` FOREIGN KEY (`assign_id`) REFERENCES `assigned_tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
