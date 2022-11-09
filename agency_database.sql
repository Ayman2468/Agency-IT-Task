-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 09:32 PM
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
-- Database: `agency_database`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 3, 'token', 'dc90e18a5386c37d5b6159b40a268a6b5d23fa7e954d3675f496ea6b120b64d3', '[3]', NULL, NULL, '2022-11-07 22:13:08', '2022-11-07 22:13:08'),
(45, 'App\\Models\\User', 5, 'token', 'a45c379c26d99e6e44967a2ae7f2869a5f164f17538168b174bfa58cb145b642', '[5]', NULL, NULL, '2022-11-09 17:21:33', '2022-11-09 17:21:33'),
(46, 'App\\Models\\User', 5, 'token', 'dfa07c589abd1a38920f83510d2f75c23471e38cd8fc3668ac8144acc865c4f9', '[5]', NULL, NULL, '2022-11-09 17:21:33', '2022-11-09 17:21:33'),
(47, 'App\\Models\\User', 5, 'token', '9af3a89658c3dfcda37da0453b6525a1583bc2537afe4efb6a485f34eb73d5ac', '[5]', NULL, NULL, '2022-11-09 17:23:06', '2022-11-09 17:23:06'),
(48, 'App\\Models\\User', 5, 'token', '162de4823e2fd7ea784878f8f6739f313bb3e02fa2f170a21d3eaeab8bfae9cb', '[5]', NULL, NULL, '2022-11-09 17:25:56', '2022-11-09 17:25:56'),
(49, 'App\\Models\\User', 5, 'token', 'a4984b75fd5eeb793f249d8be0e0ac6afb84f133f3053bd646e61cf4c389a655', '[5]', NULL, NULL, '2022-11-09 17:27:12', '2022-11-09 17:27:12'),
(50, 'App\\Models\\User', 5, 'token', '0c6738dc4e25461cfbc164ca0f0882150e1b34a9e3dd858ace716f4237c77274', '[5]', NULL, NULL, '2022-11-09 17:29:33', '2022-11-09 17:29:33'),
(51, 'App\\Models\\User', 5, 'token', 'abbd8f324b92b7222346cc0036dd0f62df6228003988350fe49ac0b7b87d2559', '[5]', NULL, NULL, '2022-11-09 17:30:05', '2022-11-09 17:30:05'),
(52, 'App\\Models\\User', 5, 'token', 'dbcd9ce835f1c8288102984f22af34bf3e826a58813a9d239640c9055714fdf0', '[5]', NULL, NULL, '2022-11-09 17:31:18', '2022-11-09 17:31:18'),
(53, 'App\\Models\\User', 5, 'token', '771aba9bffb8e7d5d4b4f3cf1c83dff93d0dc94016f8afa08abc97bc9a723731', '[5]', NULL, NULL, '2022-11-09 17:31:59', '2022-11-09 17:31:59'),
(54, 'App\\Models\\User', 5, 'token', '43aeef44b0b15e62e46de16fe814db3aa9837aca174724e6ae2c62ca67d0d4ab', '[5]', NULL, NULL, '2022-11-09 17:32:50', '2022-11-09 17:32:50'),
(55, 'App\\Models\\User', 5, 'token', '41972261103c28e6b6380ec0368632a3b409c05d2e75e7c0863d26d6713bd513', '[5]', NULL, NULL, '2022-11-09 17:33:48', '2022-11-09 17:33:48'),
(56, 'App\\Models\\User', 5, 'token', 'c2ffe616f2d70dae3b6c552af1d124f521582732a70fcf606864b860043f7a65', '[5]', NULL, NULL, '2022-11-09 17:34:21', '2022-11-09 17:34:21'),
(57, 'App\\Models\\User', 5, 'token', '6e8ee373d449cefdee3c2b5e844add72825fbf69036a49cc53bd7365e54a106e', '[5]', NULL, NULL, '2022-11-09 17:36:04', '2022-11-09 17:36:04'),
(59, 'App\\Models\\User', 5, 'token', 'e9ae91ab60aff3af2c7a214a39bb389591956b806c6db96fa6de925c776857a1', '[5]', NULL, NULL, '2022-11-09 17:38:16', '2022-11-09 17:38:16'),
(60, 'App\\Models\\User', 5, 'token', 'ff454016c570bc639d709053ce5895a4aa275f15773a523fed38794ea85d9c35', '[5]', NULL, NULL, '2022-11-09 17:39:18', '2022-11-09 17:39:18'),
(61, 'App\\Models\\User', 1, 'token', '875a8016ccc5e05fe2f25a082eae4bfb8551ce4223c2f1c1ff2f145661f88f5e', '[\"admin\"]', NULL, NULL, '2022-11-09 17:40:09', '2022-11-09 17:40:09'),
(62, 'App\\Models\\User', 1, 'token', '23881c36c34d2134f774cd853010583b25c219ca3a6a4882bbb9037e68576af4', '[\"admin\"]', NULL, NULL, '2022-11-09 17:40:35', '2022-11-09 17:40:35'),
(63, 'App\\Models\\User', 1, 'token', '438a3ab3df56149cbb7b5fd415c506189bb13ea99bbcbc22f0fa7402828c6ac8', '[\"admin\"]', NULL, NULL, '2022-11-09 17:40:46', '2022-11-09 17:40:46'),
(64, 'App\\Models\\User', 1, 'token', '123f456c3f621de8214fe20d2f33d0a06835f4e7298c8e0f21cf94e6b649dbe9', '[\"admin\"]', NULL, NULL, '2022-11-09 17:41:32', '2022-11-09 17:41:32'),
(65, 'App\\Models\\User', 1, 'token', '6b940fe4c979ee95c9400dcb64a6826a2aeef47d7de3fd200bf1778a6da2d57c', '[\"admin\"]', NULL, NULL, '2022-11-09 17:42:12', '2022-11-09 17:42:12'),
(66, 'App\\Models\\User', 1, 'token', 'd43992ae2fb4eaf88d6dfd84e79b3a403b665a6b75f65869c3cb1c2774b0367c', '[\"admin\"]', NULL, NULL, '2022-11-09 17:43:30', '2022-11-09 17:43:30'),
(68, 'App\\Models\\User', 1, 'token', 'efc027667b03f1ca2167b3851567fd0ae809c45adb480ae52c74c32b13b39ad9', '[\"admin\"]', NULL, NULL, '2022-11-09 18:09:02', '2022-11-09 18:09:02'),
(69, 'App\\Models\\User', 1, 'token', '8663c45d33161776688d88841f2e42e41ae2528c8d47203d341298405278a242', '[\"admin\"]', NULL, NULL, '2022-11-09 18:09:47', '2022-11-09 18:09:47'),
(70, 'App\\Models\\User', 1, 'token', 'be6651d159ad4619408b409aa90b89321710b475c4a7c5b187c2b667572c9de4', '[\"admin\"]', NULL, NULL, '2022-11-09 18:10:44', '2022-11-09 18:10:44'),
(71, 'App\\Models\\User', 1, 'token', 'a443ceffb0be0de593390e022d88a70dad60cf9856353f8b45ccff204eed4140', '[\"admin\"]', NULL, NULL, '2022-11-09 18:11:44', '2022-11-09 18:11:44'),
(72, 'App\\Models\\User', 1, 'token', 'd93b5e5469bddc62d1461e3d527ee4848f212e4f3de5b2305625fae9d93d1647', '[\"admin\"]', NULL, NULL, '2022-11-09 18:12:02', '2022-11-09 18:12:02'),
(73, 'App\\Models\\User', 1, 'token', '56f021296b5da982b8f68c6b4e52244aa6b9a9842c6179a9874196971101ae88', '[\"admin\"]', NULL, NULL, '2022-11-09 18:13:00', '2022-11-09 18:13:00'),
(74, 'App\\Models\\User', 1, 'token', 'dff3a60ed988b65cb3496714f23d38b82700bef86d62b350a39700d1b17d94c6', '[\"admin\"]', NULL, NULL, '2022-11-09 18:14:17', '2022-11-09 18:14:17'),
(75, 'App\\Models\\User', 1, 'token', 'c35dd9973ed7826d5fa2ec91271f85146732f0c5f390b08bfeb9feb406953952', '[\"admin\"]', NULL, NULL, '2022-11-09 18:16:10', '2022-11-09 18:16:10'),
(76, 'App\\Models\\User', 1, 'token', 'dc85327a8ccbb194d7d36b75beaf65550635539a69be30911109597060a8b3c0', '[\"admin\"]', NULL, NULL, '2022-11-09 18:18:13', '2022-11-09 18:18:13'),
(77, 'App\\Models\\User', 1, 'token', 'd527e131efb4fc8146fc452f8e7fea6c46478573a32c5e200a24defa01b261c5', '[\"admin\"]', NULL, NULL, '2022-11-09 18:20:29', '2022-11-09 18:20:29'),
(78, 'App\\Models\\User', 1, 'token', '09edf4fedf1b2f349364cd489894e05bc408acc925fe042e202d18400894e777', '[\"admin\"]', NULL, NULL, '2022-11-09 18:20:50', '2022-11-09 18:20:50'),
(79, 'App\\Models\\User', 1, 'token', '53282abbe4c78b0796b369829dbdc88a41f5b749ee66166f0094d40a3920ba93', '[\"admin\"]', NULL, NULL, '2022-11-09 18:22:49', '2022-11-09 18:22:49'),
(80, 'App\\Models\\User', 1, 'token', '60103404a0e363f35b5cd718d025770fdbc38d98c780b3b221d68d6e20faea6b', '[\"admin\"]', NULL, NULL, '2022-11-09 18:23:52', '2022-11-09 18:23:52'),
(81, 'App\\Models\\User', 1, 'token', '4fe9b3b867a132cb8ec20d9310fd5ec4beb24f9fbe818fd212921471607c04a6', '[\"admin\"]', NULL, NULL, '2022-11-09 18:24:15', '2022-11-09 18:24:15'),
(82, 'App\\Models\\User', 1, 'token', '85c366d0b6548f33ff3b87d05e57be7dae74065a59b0002d258e2b643882c106', '[\"admin\"]', NULL, NULL, '2022-11-09 18:24:41', '2022-11-09 18:24:41'),
(83, 'App\\Models\\User', 1, 'token', '43fc496f4fa84e15eba965d54c600133d6e3397de46cc27d64ab1005988bd462', '[\"admin\"]', NULL, NULL, '2022-11-09 18:26:00', '2022-11-09 18:26:00'),
(84, 'App\\Models\\User', 1, 'token', 'e079999f4986d87ef320a9ab2c9e7cb049c0f3a74de0eb95e51f9047f28f6f01', '[\"admin\"]', NULL, NULL, '2022-11-09 18:26:31', '2022-11-09 18:26:31'),
(85, 'App\\Models\\User', 1, 'token', 'e7b07c7ddb44e90a2ca93c51bf9069d031e9c761cbc6e7d0b2741255bf897c51', '[\"admin\"]', NULL, NULL, '2022-11-09 18:28:32', '2022-11-09 18:28:32'),
(86, 'App\\Models\\User', 1, 'token', 'e480d05644c2eef8ecd092fd0067e36101f5bc5382b91bdbf5a32f7a31d7b5f9', '[\"admin\"]', NULL, NULL, '2022-11-09 18:29:17', '2022-11-09 18:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `created_at`, `updated_at`) VALUES
(3, 'k', '2022-11-08 22:55:51', '2022-11-08 22:55:51'),
(4, 'second', '2022-11-08 22:59:05', '2022-11-08 22:59:05'),
(5, 'kkkk', '2022-11-09 17:49:37', '2022-11-09 17:49:37'),
(6, 'kkkk', '2022-11-09 17:51:59', '2022-11-09 17:51:59'),
(8, 'lllll', '2022-11-09 18:01:17', '2022-11-09 18:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `task_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(15) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `employee_id`, `task_name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'first-task0', 'lets try a new thing', 'submitted', '2022-11-08 00:58:51', '2022-11-09 00:48:38'),
(3, 4, 5, 'lllll', 'djfklsjdfkljsd', 'pending', '2022-11-09 18:20:50', '2022-11-09 18:20:50'),
(4, 4, 5, 'lllll', 'djfklsjdfkljsd', 'submitted', '2022-11-09 18:22:49', '2022-11-09 18:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayman_safwat', '$2y$10$ukEQ3myBME3T9qu/pi1Gj.TSUwMCdadnUkZtIRZgsBN802IZ1Qc..', 'is_admin', NULL, NULL, NULL),
(2, 'ahmed', '$2y$10$ukEQ3myBME3T9qu/pi1Gj.TSUwMCdadnUkZtIRZgsBN802IZ1Qc..', 'employee', NULL, '2022-11-07 22:07:03', '2022-11-07 22:07:03'),
(3, 'ahmed2', '$2y$10$d5TcPcoLEhkFqxIAf7.xdO6ZpAJmV9vnfYx7gE1TNB2l.PQl8KpIC', 'employee', NULL, '2022-11-07 22:13:06', '2022-11-07 22:13:06'),
(4, 'mohamed', '$2y$10$aK5aPUvWE8HAyeYuxvAKnequJtqb27uyflXx76ouRi/CEm.iKTx46', 'employee', NULL, '2022-11-09 00:59:11', '2022-11-09 00:59:11'),
(5, 'hello', '$2y$04$YrwH6Fedw3jES.6k7XpBFeXj5W7F31LKrBY3invNp5ALgJoOeX.A2', 'employee', NULL, '2022-11-09 17:21:33', '2022-11-09 17:21:33');

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
