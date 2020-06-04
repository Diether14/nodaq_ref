-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 06:02 PM
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
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 18, 3, 'test comment', '2020-05-07 23:14:46', '2020-05-07 23:14:46'),
(3, 18, 3, 'test 2 comment', '2020-05-07 23:17:29', '2020-05-07 23:17:29'),
(4, 18, 3, 'test comment', '2020-05-07 23:18:52', '2020-05-07 23:18:52'),
(5, 18, 3, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\r\n', '2020-05-07 23:26:24', '2020-05-07 23:26:24'),
(6, 18, 9, 'Test Comment', '2020-05-20 01:43:01', '2020-05-20 01:43:01'),
(7, 18, 9, 'test comments', '2020-05-20 21:13:15', '2020-05-20 21:13:15'),
(8, 18, 9, 'tset', '2020-05-20 21:24:37', '2020-05-20 21:24:37'),
(9, 18, 9, 'test test', '2020-05-20 22:26:07', '2020-05-20 22:26:07'),
(10, 21, 10, 'Test Comment', '2020-05-21 00:16:48', '2020-05-21 00:16:48');

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
(12, 18, 11, 'Test share comment', '2020-05-29 00:31:37', '2020-05-29 00:31:37');

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
(21, 0, 'test', 'user', 'tset', 'test@test.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 0, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
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
(10, 21, 23, 'test', 'tset', '<h1>Hello world!</h1>\n\n<p>I&#39;m an instance of <a href=\"https://ckeditor.com\">CKEditor</a>.</p>\n', 0, 'This post should be reported!', '2020-05-21 00:13:13', '2020-05-21 00:13:13'),
(11, 18, 23, 'Test Post', 'This is a test Post DID U KNOW THAT A LONG TIME AGO THERE ONCE WAS A YOUNG HOT WING HE WAS A VERY NICE HOT WING EXCEPT HE WANTED TO HE TOMATO\'S NOT JUST NORMAL TAMATO\'S BUT TOMATO\'S FROM A CLOWNS NOSE.', '<h1>Hello world!</h1>\n\n<p>I&#39;m an instance of <a href=\"https://ckeditor.com\">CKEditor</a>.</p>\n', 0, 'This post should be reported!', '2020-05-28 00:45:11', '2020-05-28 00:45:11'),
(12, 18, 29, 'Test', 'Test', '<h1>Hello world!</h1>\n\n<p>I&#39;m an instance of <a href=\"https://ckeditor.com\">CKEditor</a>.</p>\n', 1, 'delete post testing', '2020-06-04 20:27:47', '2020-06-04 20:27:47');

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

--
-- Dumping data for table `users_report`
--

INSERT INTO `users_report` (`id`, `user_id`, `community_id`, `post_id`, `report_content`, `created_at`, `updated_at`) VALUES
(1, 18, 23, 8, 'This post is spamming', '2020-05-13 19:14:41', '2020-05-13 19:14:41'),
(2, 18, 23, 9, 'Test report content!', '2020-05-13 23:42:27', '2020-05-13 23:42:27');

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
(3, 21, 23, 10, 'test', '2020-05-21 00:13:39', '2020-05-21 00:13:39'),
(5, 18, 23, 11, 'Sample share post', '2020-05-29 00:27:23', '2020-05-29 00:27:23');

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
(8, 18, 11, 23, 1, '2020-05-29 09:53:14', '2020-05-29 09:53:14');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_report`
--
ALTER TABLE `users_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_shared_posts`
--
ALTER TABLE `users_shared_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_vote`
--
ALTER TABLE `users_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
