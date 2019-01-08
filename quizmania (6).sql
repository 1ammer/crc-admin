-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 09:21 PM
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
(1, 1, 4, '2018-12-16 06:51:40', '2018-12-16 06:51:40'),
(2, 1, 3, '2018-12-25 08:36:06', '2018-12-25 08:36:06'),
(5, 2, 4, '2018-12-25 09:56:52', '2018-12-25 09:56:52');

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
(13, 'admin', 'upload/15469708731543426305Updated Design Document of CRC (1).docx', '1', '2019-01-10', '2019-01-08 18:07:53', '2019-01-08 18:07:53');

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

--
-- Dumping data for table `assign_submit`
--

INSERT INTO `assign_submit` (`id`, `comment`, `pathfile`, `assignment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'df', 'upload/1546970891IMG_20181109_082515.jpg', '13', '4', '2019-01-08 18:08:11', '2019-01-08 18:08:11');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` varchar(100) DEFAULT NULL,
  `userID` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message`, `userID`, `userName`, `type`, `created_at`, `updated_at`) VALUES
(1, 'sdsdsdwewe', '4', 'studnet 2', '1', '2019-01-08 16:09:54', '2019-01-08 16:09:54'),
(2, 'sdsdwwewe', '4', 'studnet 2', '1', '2019-01-08 16:10:38', '2019-01-08 16:10:38'),
(3, 'sdsd ew qq', '4', 'studnet 2', 'quiz', '2019-01-08 16:10:45', '2019-01-08 16:10:45'),
(4, 'sdsd sd', '4', 'studnet 2', 'assignment', '2019-01-08 16:11:43', '2019-01-08 16:11:43'),
(5, 'sdsd sssd sd', '4', 'studnet 2', 'assignment', '2019-01-08 16:12:11', '2019-01-08 16:12:11'),
(6, 'ali', '4', 'studnet 2', 'assignment', '2019-01-08 16:18:20', '2019-01-08 16:18:20'),
(7, 'qq', '4', 'studnet 2', 'quiz', '2019-01-08 16:23:48', '2019-01-08 16:23:48'),
(8, 'sdsdsd tt', '3', 'ammer teacher', 'quiz', '2019-01-08 16:28:29', '2019-01-08 16:28:29'),
(9, 'sdsd tt', '3', 'ammer teacher', 'quiz', '2019-01-08 16:29:09', '2019-01-08 16:29:09'),
(10, 'tt', '3', 'ammer teacher', 'assignment', '2019-01-08 16:33:09', '2019-01-08 16:33:09'),
(11, 'qq tt', '3', 'ammer teacher', 'quiz', '2019-01-08 16:37:07', '2019-01-08 16:37:07'),
(12, 'tt5', '3', 'ammer teacher', 'assignment', '2019-01-08 18:07:29', '2019-01-08 18:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `message` varchar(100) DEFAULT NULL,
  `code` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `degree_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `message`, `code`, `title`, `degree_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'CS112', 'PROGRAMING 2', '1', '2018-11-11 19:20:17', '2018-11-11 19:20:17'),
(2, NULL, 'CS889', 'FUNDAMENTAL', '1', '2018-11-11 14:42:39', '2018-11-11 14:53:42'),
(7, NULL, 'CS112a', 'as', '1', '2018-12-25 02:11:11', '2018-12-25 02:11:11');

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
(2, 'BSIT', '2018-11-11 13:49:12', '2018-11-11 13:49:12'),
(3, 'sd', '2018-12-16 01:46:59', '2018-12-16 01:46:59'),
(4, 'sdsd', '2018-12-25 02:40:41', '2018-12-25 02:40:41');

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
(13, 2, 8, 'R', '2', '2019-01-08', '2019-01-08 18:10:50', '2019-01-08 18:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_marks` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `assign_marks` int(5) NOT NULL,
  `mid_marks` int(5) NOT NULL,
  `final_marks` int(5) NOT NULL,
  `project_marks` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`id`, `user_id`, `quiz_marks`, `total`, `course_id`, `assign_marks`, `mid_marks`, `final_marks`, `project_marks`, `created_at`, `updated_at`) VALUES
(11, 4, 4, 0, 1, 8, 0, 0, 0, '2019-01-08 18:08:31', '2019-01-08 18:15:18');

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
(17, 'Lec tuesday', 'upload/154433765015443345041543423548admin (1).pdf', '1', '2018-12-09 01:40:50', '2018-12-09 01:40:50'),
(18, 'qwer', 'upload/1546153980admin.pdf', '1', '2018-12-30 02:13:00', '2018-12-30 02:13:00'),
(19, 'admin', 'upload/15469706701543423548admin (1).pdf', '1', '2019-01-08 18:04:30', '2019-01-08 18:04:30');

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$2uovh3eCMpCGeyKEtFMhQOJlA1PtUYgFaRrBhohaigjlXgrsQu7Pe', '2018-12-25 02:56:17');

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
(15, 'sdasd1', '12', '21', '121', '1212', '7', 'a', 'M', '2018-12-29 12:42:28', '2018-12-29 12:42:28'),
(16, '12232 2', '1', 'kjkhb', 'c', 'as', '7', 'b', 'M', '2018-12-29 12:42:52', '2018-12-29 12:42:52'),
(17, 'dsfsf 3', 'sdfds', 'sdfsd', 'sdfs', 'asdf', '7', 'c', 'M', '2018-12-29 12:43:13', '2018-12-29 12:43:13'),
(18, '1111', '11', '112', '123', '1234', '8', 'b', 'M', '2019-01-08 18:10:15', '2019-01-08 18:10:15'),
(19, '1223', '12', '12', '12', '12', '8', 'b', 'M', '2019-01-08 18:10:30', '2019-01-08 18:10:30');

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
(8, 'aaaa', '3', 'M', 4, '1', '2019-01-08 18:10:01', '2019-01-08 18:10:01');

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
(59, 4, 0, 15, 12, 13, '2019-01-08 18:08:31', '2019-01-08 18:08:31'),
(60, 4, 8, 4, 2, 0, '2019-01-08 18:15:18', '2019-01-08 18:15:18');

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
(2, 'ali', 'admin@admin.com', '1221`', '2018-11-20 19:00:00', '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 1, 1, 'C7nXLSvs0Q7atJIao5LqXGKWXiwuuYuqnAltUCF3e2tizjVdE1bVEyWCCJoe', '2018-11-11 00:55:18', '2018-11-11 14:53:48', NULL, 1, 'MULTAN', 'MALE'),
(3, 'ammer teacher', 'teacher@td.com', '1111', NULL, '$2y$10$k3W7uETCcc/SW5pniuTp/eOVtzdAGrtCEJSEA1hSgLeL9GUIDuJdy', 2, 1, 'SwXtAZfs9cwYdyW1OjUDQPLupmmXE7E1lYqfqQd41EdhyxsN2GWKqDuoYKyw', '2018-11-11 01:27:35', '2018-11-11 14:59:58', '121212', 1, 'LAHORE', 'male'),
(4, 'studnet 2', 'std2@std.com', '123', NULL, '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 3, 1, 'x6verQVV6Q6Jwz8YeQWBfKTdGhx4l2hhn7Zo2KHYreXJsZGjIPJSgSpkGdmk', '2018-11-11 12:39:09', '2018-11-11 13:56:20', NULL, 1, 'LAHORE', 'male'),
(5, 'STD ', 'std@std.com', 'SDD23', NULL, '$2y$10$O79Z9WnEWeYWbp1c5SscCex3yl6v5rkSy1vfMtn9xjmkauB6njzq2', 3, 0, 'ddIXKmz55JUF3mMrutnjB9Q6mTE17EXP9vyGg3aOyWChxh7sNe0jCY3xQbyd', '2018-11-11 13:12:59', '2018-11-11 13:43:32', 'assas', 1, 'LAHORE 2', 'female'),
(6, 'ali admin', 'ali1@admin.com', '22222', NULL, '$2y$10$raZfpOPwd6PjOXL3aiudqeg08glSMkRUeeOLePk/H1fEXO7f6vExS', 2, 1, 'uo36942uW6fiPpzeSLmf7ro5bnypFVyZS2jYSTz9Q8ePjT4MjRdmU8gioLOm', '2018-11-14 14:43:43', '2018-12-25 02:31:02', '1212233323', 1, 'alkj', 'male');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `final_quiz`
--
ALTER TABLE `final_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_result`
--
ALTER TABLE `final_result`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assign_submit`
--
ALTER TABLE `assign_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_quiz`
--
ALTER TABLE `final_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `final_result`
--
ALTER TABLE `final_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
