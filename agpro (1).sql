-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agpro`
--

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
(4, '2020_12_23_155200_create_profiles_table', 2),
(5, '2020_12_24_120201_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ag.sonuali@gmail.com', '$2y$10$dN3dBtj8cWSX95mfxrqU2OzVWMlbhN7NKztlmkAm5jG6NZmRy5P6i', '2020-12-26 09:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'The save method may also be used to update models that already exist in the database. To update a model, you should retrieve it, set any attributes you wish to update, and then call the save method. Again, the updated_at timestamp will automatically be up', 'uploads/662txA5lObwG16BHfjdsQiuq120BQvlZKlNFkVkH.jpg', '2020-12-25 11:39:38', '2020-12-25 11:39:38'),
(2, 1, 'Cap2', 'uploads/onJZJT3SVmMMmbxzhjK8NCzHzi9loOApclYPGFoc.jpg', '2020-12-25 11:39:59', '2020-12-25 11:39:59'),
(3, 1, 'Cap3', 'uploads/7MiA2uNugGX7vv5gcwyHNbbzw9rk9cWOQCqCcQ1t.jpg', '2020-12-25 11:40:17', '2020-12-25 11:40:17'),
(4, 1, 'Cap4', 'uploads/rtgzMLSOQ9eIHWpMPIZB2gjvBgDptiYWFvRVnbAD.png', '2020-12-26 03:57:20', '2020-12-26 03:57:20'),
(5, 1, 'Cap5', 'uploads/ZOnM3wy06uladL4o7seKWpUyYzQ3CQnNS13OgPqT.png', '2020-12-26 03:58:28', '2020-12-26 03:58:28'),
(6, 1, 'Cap6', 'uploads/KSd8d7LMOXWgbz70Zq6rw9r5vhXa3ojP0NM38MSH.jpg', '2020-12-26 09:07:53', '2020-12-26 09:07:53'),
(7, 1, 'User2', 'uploads/bSdvrxz3OGpYViGUYxwBY0snZ9zIdIDCKxy8iKLj.jpg', '2020-12-28 04:55:54', '2020-12-28 04:55:54'),
(8, 2, 'User2Amir', 'uploads/VBVTyfI3jMxhRBeoRWZNGGt90rtHjuQ3iPXrh8to.png', '2020-12-28 05:26:28', '2020-12-28 05:26:28'),
(9, 1, 'AA', 'uploads/nNLOvseN2DLON3qYPtcsq6shTVxY4OXukAy53AUH.jpg', '2020-12-31 12:05:35', '2020-12-31 12:05:35'),
(10, 1, 'AA', 'uploads/wXplBaA0jLlUzobGy3MiqCbcBQvrWKZqBO8cvLQI.jpg', '2020-12-31 12:06:44', '2020-12-31 12:06:44'),
(11, 1, 'AA', 'uploads/iMeMLnfdvYTGW7XNAIL1puWnntYlbPzsTcnk3obK.jpg', '2021-01-01 07:29:52', '2021-01-01 07:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `title`, `description`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'YourTitleCool', 'Indeed, I change the line you suggest me into $file = Input::file(\'url_Avatar\');. I have also change the line $file= Image::make($image->getRealPath())->resize(\'200\',\'200\')->save(\'upload/\'.$filename); into Image::make($file->getRealPath())->resize(\'200\',\'200\')->save($filename);. It works well. Thank you for the help, your answer guided me to make this feature. – french_dev Jun 13 \'14 at 7:36  I have a similar problem. I also edit my code as pointed out by you but it still gives me the same error message. Can you please have a look at the link and help me out? – Vagabond Feb 19 \'15 at 5:30  I am also having the same problem. I need to make image from url. Using Input::file() we can make image from input type file only. But in my case input is url. So How can I? – Eswara Reddy Apr 10 \'15 at 12:41 Have you tried $image = Image::make(\'http://someurl.com/image.png\')', 'http://iamsoftech.in', '', '2020-12-31 09:56:36', '2021-01-05 08:43:31'),
(2, 2, 'YourTitle', NULL, NULL, NULL, '2021-01-01 08:09:39', '2021-01-01 08:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `profile_user`
--

CREATE TABLE `profile_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_user`
--

INSERT INTO `profile_user` (`id`, `profile_id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 'Unfollow', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Akbar', 'ag.sonuali@gmail.com', 'SonuAli', 'Address', NULL, '$2y$10$jU0KSsoCoXXPQ9Xi7rZE.OV3g.cFEcL0kyyeTY8uLabyomhh5N/Pa', NULL, '2020-12-31 09:56:36', '2020-12-31 09:56:36'),
(2, 'Arbaz', 'arbaz@gmail.com', 'ArbazCool', 'Address', NULL, '$2y$10$BFKCAbE4zvSsYkuY2OvB8uOGFcvKkY4ukQyDYs1gNtCxd2v2imbMC', NULL, '2021-01-01 08:09:39', '2021-01-01 08:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
