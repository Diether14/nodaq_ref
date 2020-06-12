-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 05:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weendi`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_photo_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `community_type` int(11) NOT NULL COMMENT '0 = public, 1 = private',
  `content` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `upvote_name` varchar(255) NOT NULL,
  `devote_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `user_id`, `com_photo_id`, `title`, `community_type`, `content`, `color`, `text_color`, `upvote_name`, `devote_name`, `created_at`, `updated_at`) VALUES
(23, 26, 24, 'Test Community', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '#11309b', '#ffffff', 'Like', 'Dislike', '2020-05-10 23:29:08', '2020-05-10 23:29:08'),
(24, 26, 25, 'Test Community', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '#ffffff', '#000000', '', '', '2020-05-10 23:29:38', '2020-05-10 23:29:38'),
(25, 26, 26, 'Test Community', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '#f08e91', '#ffffff', '', '', '2020-05-10 23:30:22', '2020-05-10 23:30:22'),
(26, 26, 27, 'Test Community', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '#f08e91', '', '', '', '2020-05-11 18:40:25', '2020-05-11 18:40:25'),
(29, 18, 30, 'Test Community user', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '#ffffff', '#555555', 'Like', 'Dislike', '2020-06-02 22:55:25', '2020-06-02 22:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `community_assistant_managers`
--

CREATE TABLE `community_assistant_managers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_assistant_managers`
--

INSERT INTO `community_assistant_managers` (`id`, `user_id`, `community_id`, `manager_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 21, 29, 18, 0, '2020-06-03 16:19:15', '2020-06-03 16:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `community_banned_users`
--

CREATE TABLE `community_banned_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_banned_users`
--

INSERT INTO `community_banned_users` (`id`, `user_id`, `community_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 18, 23, 'test community user', '2020-05-15 03:47:28', '2020-05-15 03:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `community_photo`
--

CREATE TABLE `community_photo` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'file type',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created date',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='demo table';

--
-- Dumping data for table `community_photo`
--

INSERT INTO `community_photo` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(24, 'xmFj7k.png', '', '2020-05-10 23:29:08', '2020-05-10 23:29:08'),
(25, 'Desert.jpg', '', '2020-05-10 23:29:38', '2020-05-10 23:29:38'),
(26, 'Jellyfish.jpg', '', '2020-05-10 23:30:21', '2020-05-10 23:30:21'),
(27, 'Tulips.jpg', '', '2020-05-11 18:40:25', '2020-05-11 18:40:25'),
(30, 'Future-Created-Today.jpg', '', '2020-06-02 22:55:25', '2020-06-02 22:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo`
--

CREATE TABLE `cover_photo` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'file type',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='demo table';

--
-- Dumping data for table `cover_photo`
--

INSERT INTO `cover_photo` (`id`, `user_id`, `name`, `type`, `created_at`) VALUES
(15, 18, 'bg2.jpg', 'image/jpeg', '2020-05-03 23:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `emoticon_store`
--

CREATE TABLE `emoticon_store` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emoticon_store`
--

INSERT INTO `emoticon_store` (`id`, `user_id`, `title`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 18, 'Future Created Today', 'Future-Created-Today.jpg', 'image/jpeg', '2020-06-05 08:53:12', '2020-06-05 08:53:12'),
(2, 18, 'Test Sticker Bundle', 'web-development-minimalism-bl-1920x1080.jpg', 'image/jpeg', '2020-06-10 13:53:13', '2020-06-10 13:53:13'),
(3, 21, 'Test Bundle Sticker', 'xmFj7k.png', 'image/png', '2020-06-11 18:35:27', '2020-06-11 18:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `emoticon_store_files`
--

CREATE TABLE `emoticon_store_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emoticon_store_id` int(11) NOT NULL,
  `files` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emoticon_store_files`
--

INSERT INTO `emoticon_store_files` (`id`, `user_id`, `emoticon_store_id`, `files`, `name`, `type`, `created_at`) VALUES
(7, 18, 1, '', 'clark-tibbs-oqStl2L5oxI-unsplash.jpg', 'image/jpeg', '2020-06-09 21:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `p_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'file type',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='demo table';

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `p_type`, `user_id`, `name`, `type`, `created_at`) VALUES
(10, 'profile', 18, '62387785_2315816385357221_4789437401795657728_n.jpg', 'image/jpeg', '2020-05-03 21:59:25'),
(13, 'cover', 18, 'bg.jpg', 'image/jpeg', '2020-05-03 22:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(11, 18, 19, 'Test', '2020-06-12 19:12:01', '2020-06-12 19:12:01'),
(12, 18, 19, 'Test Comment', '2020-06-12 20:30:28', '2020-06-12 20:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_photo`
--

CREATE TABLE `post_photo` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'file type',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='demo table';

-- --------------------------------------------------------

--
-- Table structure for table `profile_photo`
--

CREATE TABLE `profile_photo` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `type` varchar(255) NOT NULL COMMENT 'file type',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Created date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='demo table';

--
-- Dumping data for table `profile_photo`
--

INSERT INTO `profile_photo` (`id`, `user_id`, `post_id`, `name`, `type`, `created_at`) VALUES
(1, 18, 0, 'Koala.jpg', 'image/jpeg', '2020-05-09 23:30:09'),
(2, 21, 0, 'clark-tibbs-oqStl2L5oxI-unsplash.jpg', 'image/jpeg', '2020-05-20 16:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `shared_comments`
--

CREATE TABLE `shared_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shared_comments`
--

INSERT INTO `shared_comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(11, 18, 10, 'Test shared Comment', '2020-05-28 23:18:02', '2020-05-28 23:18:02'),
(12, 18, 11, 'Test share comment', '2020-05-29 00:31:37', '2020-05-29 00:31:37'),
(13, 18, 21, 'Test', '2020-06-12 22:18:17', '2020-06-12 22:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `pk` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL COMMENT '1 = male, 2 = female',
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '0 = users | 1 = manager | 2 assistant manager | 3 = admin',
  `status` int(11) NOT NULL,
  `auth` int(11) NOT NULL,
  `prof` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pk`, `firstname`, `lastname`, `nickname`, `email`, `birthdate`, `gender`, `password`, `user_type`, `status`, `auth`, `prof`, `created_at`, `updated_at`) VALUES
(18, 0, 'John', 'Smith', 'John Smith', 'test@gmail.com', '', '', '$2y$10$vAxwPXIwhwY6ntzC2I.WROqgUyWSiUiJAoq6aPNSOjWKNsl9WzrEe', 0, 0, 0, 0, '2020-04-26 23:34:03', '2020-04-26 23:34:03'),
(21, 0, 'test', 'user', 'Test User', 'test@test.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 0, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(22, 0, 'firstname', 'lastname', 'manager', 'manager@weendi.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 1, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(23, 0, 'firstname', 'lastname', 'assistant manager', 'assistant_manager@weendi.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 2, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(24, 0, 'test_user', 'test_user', 'test_user', 'test_user@gmail.com', '', '', '$2y$10$VMCm9olTym6fLoqWUTIByO23/Zy.WjlyRzYHrUttlEPEG53jp79Ym', 0, 0, 0, 0, '2020-05-06 22:51:17', '2020-05-06 22:51:17'),
(26, 0, '', '', 'admin', 'admin@weendi.com', '', '', '$2y$10$LJ.xc4KwoR9xfNhrmtdZnOq/53G3b4c7MfFULeVU2pS3but75Zv2G', 3, 0, 0, 0, '2020-05-10 01:41:29', '2020-05-10 01:41:29'),
(30, 0, '', '', 'test manager', 'test_manager@weendi.com', '', '', '$2y$10$tF1oZV7ZI7gQTLDUQiLXA.T2sNAUJkxRdmxUMlPWtmn.KtHtHLQl.', 1, 0, 0, 0, '2020-05-24 19:20:15', '2020-05-24 19:20:15'),
(31, 0, '', '', 'testings ', 'test123@weendi.com', '1995-12-31', '2', '$2y$10$B8ec0KaXXxONX.mvsfrXDOdQNlOyQE44A8zbly6foAbA1v05JdIDi', 0, 0, 0, 0, '2020-05-25 19:41:50', '2020-05-25 19:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_community`
--

CREATE TABLE `users_community` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_community`
--

INSERT INTO `users_community` (`id`, `user_id`, `community_id`, `created_at`, `updated_at`) VALUES
(2, 18, 26, '2020-05-11 23:10:32', '2020-05-11 23:10:32'),
(3, 18, 23, '2020-05-12 00:07:02', '2020-05-12 00:07:02'),
(4, 18, 29, '2020-06-03 22:06:33', '2020-06-03 22:06:33'),
(5, 21, 29, '2020-06-03 23:56:10', '2020-06-03 23:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_deleted_post`
--

CREATE TABLE `users_deleted_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_ip`
--

CREATE TABLE `users_ip` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_ip`
--

INSERT INTO `users_ip` (`id`, `user_id`, `ip`, `created_at`, `updated_at`) VALUES
(4, 18, '::1', '2020-05-02 18:26:26', '2020-05-02 18:26:26'),
(5, 24, '::1', '2020-05-06 22:51:27', '2020-05-06 22:51:27'),
(6, 26, '::1', '2020-05-10 01:51:48', '2020-05-10 01:51:48'),
(7, 21, '::1', '2020-05-18 21:28:24', '2020-05-18 21:28:24'),
(8, 30, '::1', '2020-05-24 19:30:35', '2020-05-24 19:30:35'),
(9, 31, '::1', '2020-05-25 19:50:29', '2020-05-25 19:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `users_post`
--

CREATE TABLE `users_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_post`
--

INSERT INTO `users_post` (`id`, `user_id`, `community_id`, `title`, `description`, `content`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(19, 18, 23, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '<h1><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', 0, '', '2020-06-11 23:32:55', '2020-06-11 23:32:55'),
(21, 21, 23, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old', '<h1>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up ', 0, '', '2020-06-12 00:15:32', '2020-06-12 00:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `users_report`
--

CREATE TABLE `users_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `report_content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_shared_posts`
--

CREATE TABLE `users_shared_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_shared_posts`
--

INSERT INTO `users_shared_posts` (`id`, `user_id`, `community_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(10, 18, 23, 21, 'Share post test', '2020-06-12 23:21:46', '2020-06-12 23:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_vote`
--

CREATE TABLE `users_vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = devote, 1 = upvote',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_vote`
--

INSERT INTO `users_vote` (`id`, `user_id`, `post_id`, `community_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 18, 19, 23, 1, '2020-06-11 15:34:24', '2020-06-11 15:34:24'),
(12, 21, 19, 23, 1, '2020-06-11 16:05:11', '2020-06-11 16:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_mode` int(11) NOT NULL COMMENT '0 = static, 1 = anonoymous',
  `user_nickname` int(11) NOT NULL COMMENT '1 = hide nickname, 0 show nickname',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `user_mode`, `user_nickname`, `created_at`, `updated_at`) VALUES
(12, 18, 1, 1, '2020-05-05 21:33:51', '2020-05-05 21:33:51'),
(13, 24, 0, 0, '2020-05-06 22:52:14', '2020-05-06 22:52:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_assistant_managers`
--
ALTER TABLE `community_assistant_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_banned_users`
--
ALTER TABLE `community_banned_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_photo`
--
ALTER TABLE `community_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emoticon_store`
--
ALTER TABLE `emoticon_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emoticon_store_files`
--
ALTER TABLE `emoticon_store_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_photo`
--
ALTER TABLE `post_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shared_comments`
--
ALTER TABLE `shared_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_community`
--
ALTER TABLE `users_community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_deleted_post`
--
ALTER TABLE `users_deleted_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_ip`
--
ALTER TABLE `users_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_post`
--
ALTER TABLE `users_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_report`
--
ALTER TABLE `users_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_shared_posts`
--
ALTER TABLE `users_shared_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_vote`
--
ALTER TABLE `users_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `community_assistant_managers`
--
ALTER TABLE `community_assistant_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `community_banned_users`
--
ALTER TABLE `community_banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `community_photo`
--
ALTER TABLE `community_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cover_photo`
--
ALTER TABLE `cover_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `emoticon_store`
--
ALTER TABLE `emoticon_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emoticon_store_files`
--
ALTER TABLE `emoticon_store_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_photo`
--
ALTER TABLE `post_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shared_comments`
--
ALTER TABLE `shared_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users_community`
--
ALTER TABLE `users_community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_deleted_post`
--
ALTER TABLE `users_deleted_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_ip`
--
ALTER TABLE `users_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_post`
--
ALTER TABLE `users_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_report`
--
ALTER TABLE `users_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_shared_posts`
--
ALTER TABLE `users_shared_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_vote`
--
ALTER TABLE `users_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
