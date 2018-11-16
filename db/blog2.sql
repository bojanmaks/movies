-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 03:21 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_05_19_092153_create_posts_table', 1),
('2018_05_30_152922_add_slug_to_posts', 1),
('2018_06_04_151346_create_categories_table', 2),
('2018_06_04_151746_add_category_id_to_posts', 2),
('2018_06_05_175952_create_tags_table', 3),
('2018_06_05_181712_create_post_tag_table', 4),
('2018_06_07_075335_create_comments_table', 5),
('2018_06_11_101557_add_image_col_to_posts', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` text COLLATE utf8_unicode_ci,
  `plot` text COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `writer` text COLLATE utf8_unicode_ci,
  `actors` text COLLATE utf8_unicode_ci,
  `rating` text COLLATE utf8_unicode_ci,
  `votes` text COLLATE utf8_unicode_ci,
  `runtime` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `movie`, `genre`, `plot`, `director`, `writer`, `actors`, `rating`, `votes`, `runtime`, `image`, `created_at`, `updated_at`) VALUES
(20, '', ' Action , Adventure , Sci-Fi', 'Two mutants come to a private academy for their kind whose resident superhero team must oppose a terrorist organization with similar powers..', 'Bryan Singer', ' Tom DeSanto', ' Patrick Stewart, Hugh Jackman, Ian McKellen', '7.4', '519,472', '1h 44mi', '1542377690.jpg', '2018-11-16 13:14:51', '2018-11-16 13:15:22'),
(21, 'Deadpool 2', ' Action , Adventure , Comedy', 'Foul-mouthed mutant mercenary Wade Wilson (AKA. Deadpool), brings together a team of fellow mutant rogues to protect a young boy with supernatural abilities from the brutal, time-traveling cyborg, Cable.', 'David Leitch', ' Rhett Reese', ' Ryan Reynolds, Josh Brolin, Morena Baccarin', '7.8', '298,934', '1h 59min', '1542377806.jpg', '2018-11-16 13:16:46', '2018-11-16 13:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bojan Maksimovski', 'bojanmaks@gmail.com', '$2y$10$/fxX29gOfLfkNjkuW0F33.Q3TNDEEL7vj5dvZUyoCFqj7pS4VSdj6', 'DTelgi6C6adueqd0apOljPlV8hZ7kYAgsZk1ZXGjrAsS7SgEgl7pAnECiUvz', '2018-06-19 06:18:02', '2018-06-19 06:18:02'),
(2, 'Admin', 'administrator@administrator.com', '$2y$10$aWDLVC48Vg8PVp51OgKaIuJ85DrqkOQH8H8XXiFyaI4A60bY3MA3a', 'a40mkW6HokNX0PjoohGN0CdXYVfg2MIXXdzRwlFimft4rmNi2rDnexwlr9gX', '2018-07-22 11:13:41', '2018-07-22 11:13:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
