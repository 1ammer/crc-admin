-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 06:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotments`
--

CREATE TABLE `allotments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allotments`
--

INSERT INTO `allotments` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-12-09 01:35:29', '2018-12-09 01:35:29'),
(2, 1, 4, '2018-12-09 01:35:29', '2018-12-09 01:35:29'),
(3, 1, 5, '2018-12-09 01:35:29', '2018-12-09 01:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pathfile` varchar(200) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `last_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `name`, `pathfile`, `course_id`, `last_date`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'upload/15443376241543423548admin.pdf', '1', '2018-12-11', '2018-12-09 01:40:24', '2018-12-09 01:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `assign_submit`
--

CREATE TABLE `assign_submit` (
  `id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `pathfile` varchar(200) NOT NULL,
  `assignment_id` varchar(50) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pathfile` varchar(200) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `pathfile`, `course_id`, `created_at`, `updated_at`) VALUES
(2, 'css book', 'upload/1544336886Discount centres.pdf', '2', '2018-12-09 01:28:06', '2018-12-09 01:28:06'),
(3, 'bb 1', 'upload/15443375621543426305Updated Design Document of CRC (6).docx', '1', '2018-12-09 01:39:22', '2018-12-09 01:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `degree_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `title`, `degree_id`, `created_at`, `updated_at`) VALUES
(1, 'CS112', 'PROGRAMING 2', '1', '2018-11-11 19:20:17', '2018-11-11 19:20:17'),
(2, 'CS889', 'FUNDAMENTAL', '1', '2018-11-11 14:42:39', '2018-11-11 14:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BSCS', '2018-11-11 13:49:12', '2018-11-11 13:49:12'),
(2, 'BSIT', '2018-11-11 13:49:12', '2018-11-11 13:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `final_quiz`
--

CREATE TABLE `final_quiz` (
  `id` int(11) NOT NULL,
  `numberofquestion` int(4) NOT NULL,
  `quiz_id` int(4) NOT NULL,
  `difficulty` varchar(11) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `quizdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_quiz`
--

INSERT INTO `final_quiz` (`id`, `numberofquestion`, `quiz_id`, `difficulty`, `marks`, `quizdate`, `created_at`, `updated_at`) VALUES
(7, 2, 4, 'M', '12', '2018-12-21', '2018-12-09 03:48:48', '2018-12-09 03:48:48'),
(8, 4, 4, 'H', '1', '2019-01-17', '2018-12-09 04:17:42', '2018-12-09 04:17:42'),
(9, 3, 6, 'R', '1', '2018-12-20', '2018-12-15 21:29:35', '2018-12-15 21:29:35'),
(10, 5, 5, 'M', '12', '2018-12-20', '2018-12-15 21:35:45', '2018-12-15 21:35:45'),
(11, 1, 6, 'R', '1', '2018-12-13', '2018-12-15 21:37:14', '2018-12-15 21:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pathfile` varchar(200) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `name`, `pathfile`, `course_id`, `created_at`, `updated_at`) VALUES
(17, 'Lec tuesday', 'upload/154433765015443345041543423548admin (1).pdf', '1', '2018-12-09 01:40:50', '2018-12-09 01:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_11_06_210802_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `option_a` varchar(200) NOT NULL,
  `option_b` varchar(200) NOT NULL,
  `option_c` varchar(200) NOT NULL,
  `option_d` varchar(200) NOT NULL,
  `quiz_id` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `description`, `option_a`, `option_b`, `option_c`, `option_d`, `quiz_id`, `answer`, `difficulty`, `created_at`, `updated_at`) VALUES
(1, 'q 1', 'aaads', 'b', 'aaadscc', 'aaadsdd', '2', 'b', 'M', '2018-12-01 16:39:17', '2018-12-01 16:39:17'),
(2, 'q 1 2', 'aaads', 'b', 'ccc', 'ddd', '5', 'b', 'N', '2018-12-01 16:40:46', '2018-12-01 16:40:46'),
(3, 'q 1 4', 'aaads', 'b', 'aaadscc', 'aaadsd', '6', 'b', 'M', '2018-12-01 16:41:08', '2018-12-01 16:41:08'),
(4, 'q 133j', 'kjkj', 'b', 'kjkjcc', 'kjkjd', '6', 'b', 'H', '2018-12-01 22:54:32', '2018-12-01 22:54:32'),
(5, 'q 1 e', 'sd', 'sd', 'sd', 'sd', '6', 'b', 'M', '2018-12-08 15:31:24', '2018-12-08 15:31:24'),
(6, 'sdasd', 'aaads', 'aaads', 'aaads', 'aaads', '3', 'c', 'M', '2018-12-08 15:33:28', '2018-12-08 15:33:28'),
(7, 'q 1', '1', '1', '1', '1', '5', 'b', 'M', '2018-12-09 01:45:11', '2018-12-09 01:45:11'),
(8, 'sdasd', 'a', 'b', 'c', 'd', '5', 'c', 'N', '2018-12-09 03:47:41', '2018-12-09 03:47:41'),
(9, 'q 1', 'a', 'b', 'c', 'd', '4', 'c', 'M', '2018-12-09 03:48:10', '2018-12-09 03:48:10'),
(10, 'as', 'a', 'a', 'a', 'a', '5', 'd', 'H', '2018-12-09 04:01:04', '2018-12-09 04:01:04'),
(11, 'qqq', 'a', 'ab', 'abc', 'ascd', '5', 'a', 'M', '2018-12-15 21:05:39', '2018-12-15 21:05:39'),
(12, 'qwwqw', 'as', 'b', 's', 'a', '5', 'b', 'M', '2018-12-15 21:06:35', '2018-12-15 21:06:35'),
(13, 'sds', 's', 's', 'j', 'j', '6', 'a', 'M', '2018-12-15 21:36:47', '2018-12-15 21:36:47'),
(14, 'wewe', 'we', 'we', 'we', 'we', '5', 'b', 'M', '2018-12-15 23:46:53', '2018-12-15 23:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `difficulty` varchar(200) NOT NULL,
  `time` int(5) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `user_id`, `difficulty`, `time`, `course_id`, `created_at`, `updated_at`) VALUES
(5, 'qqq', '3', 'M', 2, '2', '2018-12-15 21:05:08', '2018-12-15 21:05:08'),
(6, 'sdsdsd', '3', 'M', 122, '1', '2018-12-15 21:36:27', '2018-12-15 21:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `obtained` int(5) NOT NULL,
  `ass_id` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `quiz_id`, `total`, `obtained`, `ass_id`, `created_at`, `updated_at`) VALUES
(10, 3, 6, 10, 8, 5, '2018-12-09 00:45:43', '2018-12-09 00:45:43'),
(12, 5, 6, 1, 0, 0, '2018-12-09 01:56:32', '2018-12-09 01:56:32'),
(13, 5, 5, 36, 12, 0, '2018-12-09 03:58:32', '2018-12-09 03:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-11-10 19:00:00', '2018-11-10 19:00:00'),
(2, 'teacher', '2018-11-10 19:00:00', '2018-11-10 19:00:00'),
(3, 'student', '2018-11-10 19:00:00', '2018-11-10 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RGNumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` int(11) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `RGNumber`, `email_verified_at`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `mobile`, `degree`, `address`, `gender`) VALUES
(2, 'ali', 'admin@admin.com', '1221`', '2018-11-20 19:00:00', '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 1, 1, 'JIrkjdUthVw3D8vkzYztXP5HrifPf1dwzAyjYWa4gbANWYy2IfEGgiosyvmz', '2018-11-11 00:55:18', '2018-11-11 14:53:48', NULL, 1, 'MULTAN', 'MALE'),
(3, 'ammer teacher', 'teacher@td.com', '1111', NULL, '$2y$10$k3W7uETCcc/SW5pniuTp/eOVtzdAGrtCEJSEA1hSgLeL9GUIDuJdy', 2, 1, 'wUQFoGigmeXWJGMwNUd9kITUBPiAVLTrpNP2CJIGF9SEaAfh3EXHniOcgXsQ', '2018-11-11 01:27:35', '2018-11-11 14:59:58', '121212', 1, 'LAHORE', 'male'),
(4, 'studnet 2', 'std2@std.com', '123', NULL, '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 3, 1, 'QbY0N4wHWALti0Me669boqc05HdmvQc8UWlyD9prLVPYKx9gBIt6TDzsxWpH', '2018-11-11 12:39:09', '2018-11-11 13:56:20', NULL, 1, 'LAHORE', 'male'),
(5, 'STD ', 'std@std.com', 'SDD23', NULL, '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 3, 1, '9NVLcjmQm88QYT2YWlArujCMQoUFOrr21CRyHkUjh7HM2quZ3RrD3BiXxTtT', '2018-11-11 13:12:59', '2018-11-11 13:43:32', 'assas', 1, 'LAHORE 2', 'female'),
(6, 'ali admin', 'ali@admin.com', 'lkjlk', NULL, '$2y$10$raZfpOPwd6PjOXL3aiudqeg08glSMkRUeeOLePk/H1fEXO7f6vExS', 1, 1, 'uo36942uW6fiPpzeSLmf7ro5bnypFVyZS2jYSTz9Q8ePjT4MjRdmU8gioLOm', '2018-11-14 14:43:43', '2018-11-25 02:52:22', '02222', 2, 'alkj', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotments`
--
ALTER TABLE `allotments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_submit`
--
ALTER TABLE `assign_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_quiz`
--
ALTER TABLE `final_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `allotments`
--
ALTER TABLE `allotments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_submit`
--
ALTER TABLE `assign_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `final_quiz`
--
ALTER TABLE `final_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
