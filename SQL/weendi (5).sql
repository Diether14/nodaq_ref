-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 03:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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
  `category` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = remove, 2 = reset',
  `questions` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `user_id`, `com_photo_id`, `title`, `community_type`, `content`, `color`, `text_color`, `upvote_name`, `devote_name`, `category`, `status`, `questions`, `created_at`, `updated_at`) VALUES
(38, 18, 39, 'Test Community', 0, '\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', '', '', '', '', '', 0, '', '2020-08-20 22:07:42', '2020-08-20 22:07:42'),
(39, 24, 40, 'Test Public Community', 0, '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"', '', '', '', '', '', 0, '', '2020-08-20 23:22:04', '2020-08-20 23:22:04'),
(40, 18, 41, 'Test Recommended', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', '', '', '', 0, '', '2020-08-20 23:40:52', '2020-08-20 23:40:52'),
(41, 24, 42, 'Test Test', 0, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '', '', '', '', '', 0, '', '2020-08-20 23:57:21', '2020-08-20 23:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `community_ac_settings`
--

CREATE TABLE `community_ac_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `remove_comments` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `remove_posts` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `punish_users` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `remove_posts_from_hotboard` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `edit_cover_photo` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `edit_categories` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `edit_subclass` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `notice` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `general` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `politic` int(11) NOT NULL COMMENT '0 = false, 1 = true',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_ac_settings`
--

INSERT INTO `community_ac_settings` (`id`, `user_id`, `community_id`, `remove_comments`, `remove_posts`, `punish_users`, `remove_posts_from_hotboard`, `edit_cover_photo`, `edit_categories`, `edit_subclass`, `notice`, `general`, `politic`, `created_at`, `update_at`) VALUES
(1, 21, 30, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-07-15 15:33:25', '2020-07-15 15:33:25');

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
(2, 21, 29, 18, 0, '2020-06-03 16:19:15', '2020-06-03 16:19:15'),
(6, 18, 29, 18, 0, '2020-06-18 15:47:01', '2020-06-18 15:47:01');

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
-- Table structure for table `community_category`
--

CREATE TABLE `community_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_category`
--

INSERT INTO `community_category` (`id`, `user_id`, `community_id`, `category_name`, `created_at`, `updated_at`) VALUES
(5, 18, 30, 'Category', '2020-07-19 13:29:28', '2020-07-19 13:29:28'),
(8, 18, 30, 'CATEGORY 2', '2020-07-23 14:38:26', '2020-07-23 14:38:26'),
(9, 18, 32, 'tEST', '2020-07-23 15:16:36', '2020-07-23 15:16:36'),
(10, 18, 30, 'CATEGORY 3', '2020-07-28 11:20:51', '2020-07-28 11:20:51'),
(11, 18, 23, 'CATEGORY 1', '2020-07-23 14:38:26', '2020-07-23 14:38:26'),
(12, 18, 23, 'CATEGORY 2', '2020-07-23 15:16:36', '2020-07-23 15:16:36'),
(13, 18, 23, 'CATEGORY 3', '2020-07-28 11:20:51', '2020-07-28 11:20:51'),
(14, 35, 36, 'Category 1', '2020-08-12 13:34:25', '2020-08-12 13:34:25'),
(15, 18, 38, 'Coffee test', '2020-08-23 09:59:03', '2020-08-23 09:59:03'),
(20, 24, 39, 'Test', '2020-08-26 13:47:01', '2020-08-26 13:47:01'),
(21, 24, 39, 'Test', '2020-08-26 13:47:01', '2020-08-26 13:47:01'),
(23, 18, 38, 'Test 2', '2020-08-27 08:02:58', '2020-08-27 08:02:58'),
(24, 18, 38, 'test', '2020-08-27 11:19:30', '2020-08-27 11:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `community_category_subclass`
--

CREATE TABLE `community_category_subclass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subclass` varchar(255) NOT NULL,
  `createad_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_category_subclass`
--

INSERT INTO `community_category_subclass` (`id`, `user_id`, `community_id`, `category_id`, `subclass`, `createad_at`, `update_at`) VALUES
(1, 18, 23, 11, 'Subclass1', '2020-07-23 15:18:27', '2020-07-23 15:18:27'),
(2, 18, 23, 12, 'Subclass2', '2020-07-23 15:19:40', '2020-07-23 15:19:40'),
(3, 18, 30, 5, 'Subclass update', '2020-07-23 12:40:24', '2020-07-23 12:40:24'),
(5, 18, 30, 8, 'test', '2020-07-23 15:00:25', '2020-07-23 15:00:25'),
(6, 18, 32, 9, 'TSET', '2020-07-23 15:16:42', '2020-07-23 15:16:42'),
(7, 18, 30, 5, 'Subclass1', '2020-07-23 15:18:27', '2020-07-23 15:18:27'),
(8, 18, 30, 5, 'Subclass2', '2020-07-23 15:19:40', '2020-07-23 15:19:40'),
(9, 35, 36, 14, 'Sub Class 1', '2020-08-12 13:34:40', '2020-08-12 13:34:40'),
(10, 35, 36, 14, 'Sub Class 2', '2020-08-12 13:34:54', '2020-08-12 13:34:54'),
(11, 35, 36, 14, 'Subclass 3', '2020-08-12 13:35:02', '2020-08-12 13:35:02'),
(12, 18, 38, 15, 'test', '2020-08-23 09:59:13', '2020-08-23 09:59:13'),
(13, 18, 38, 16, 'Test', '2020-08-25 13:13:41', '2020-08-25 13:13:41'),
(16, 24, 39, 20, 'test', '2020-08-26 13:47:08', '2020-08-26 13:47:08'),
(17, 18, 38, 22, 'Notice', '2020-08-27 07:09:04', '2020-08-27 07:09:04'),
(19, 18, 38, 23, 'Notice test', '2020-08-27 08:02:58', '2020-08-27 08:02:58'),
(20, 18, 38, 23, 'testsetest', '2020-08-27 08:10:46', '2020-08-27 08:10:46'),
(21, 18, 38, 24, 'Notice', '2020-08-27 11:19:30', '2020-08-27 11:19:30'),
(22, 18, 38, 24, 'test2', '2020-08-27 11:19:57', '2020-08-27 11:19:57');

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
(39, 'profile_city.jpg', '', '2020-08-20 22:07:42', '2020-08-20 22:07:42'),
(40, 'profile_city.jpg', '', '2020-08-20 23:22:03', '2020-08-20 23:22:03'),
(41, 'profile_city.jpg', '', '2020-08-20 23:40:52', '2020-08-20 23:40:52'),
(42, 'profile_city.jpg', '', '2020-08-20 23:57:21', '2020-08-20 23:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `community_users_anonymous`
--

CREATE TABLE `community_users_anonymous` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `join_community_files`
--

CREATE TABLE `join_community_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(244) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createad_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_community_files`
--

INSERT INTO `join_community_files` (`id`, `name`, `type`, `community_id`, `user_id`, `createad_at`, `update_at`) VALUES
(1, 'Future-Created-Today.jpg', 'image/jpeg', 30, 18, '2020-07-01 13:42:42', '2020-07-01 13:42:42'),
(2, 'web-development-minimalism-bl-1920x1080.jpg', 'image/jpeg', 30, 18, '2020-07-01 13:42:42', '2020-07-01 13:42:42');

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
(12, 18, 19, 'Test Comment', '2020-06-12 20:30:28', '2020-06-12 20:30:28'),
(13, 18, 21, 'test', '2020-06-24 21:18:28', '2020-06-24 21:18:28'),
(14, 18, 19, '<p><a href=\"mailto:ajohnson@example.com\">@ajohnson</a>&nbsp;</p>', '2020-06-25 23:08:25', '2020-06-25 23:08:25'),
(15, 18, 19, '<p>????</p>', '2020-06-25 23:10:17', '2020-06-25 23:10:17'),
(16, 18, 19, '<p>????????</p>', '2020-06-25 23:10:59', '2020-06-25 23:10:59'),
(17, 18, 21, '<p><a href=\"mailto:dgriffin@example.com\">@dgriffin</a>&nbsp;test</p>', '2020-06-25 23:38:31', '2020-06-25 23:38:31'),
(18, 18, 21, '<p>test</p>', '2020-06-29 19:22:45', '2020-06-29 19:22:45'),
(19, 18, 21, '<p>test</p>', '2020-06-29 19:52:25', '2020-06-29 19:52:25'),
(20, 21, 19, '<p>test</p>', '2020-06-29 19:57:23', '2020-06-29 19:57:23'),
(21, 21, 21, '<p>test</p>', '2020-06-30 00:00:20', '2020-06-30 00:00:20'),
(22, 18, 40, '<p>test</p>', '2020-08-10 23:06:05', '2020-08-10 23:06:05'),
(23, 18, 40, '<p>test</p>', '2020-08-11 22:13:14', '2020-08-11 22:13:14'),
(24, 18, 40, '<p>tsetset</p>', '2020-08-11 22:13:23', '2020-08-11 22:13:23'),
(25, 18, 40, '<p>????test</p>', '2020-08-11 22:13:34', '2020-08-11 22:13:34');

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
(1, 18, 0, 'web-development-minimalism-bl-1920x1080.jpg', 'image/jpeg', '2020-05-09 23:30:09'),
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

INSERT INTO `users` (`id`, `pk`, `nickname`, `email`, `birthdate`, `gender`, `password`, `user_type`, `status`, `auth`, `prof`, `created_at`, `updated_at`) VALUES
(18, 0, 'John Smith', 'test@gmail.com', '', '', '$2y$10$vAxwPXIwhwY6ntzC2I.WROqgUyWSiUiJAoq6aPNSOjWKNsl9WzrEe', 0, 0, 0, 0, '2020-04-26 23:34:03', '2020-04-26 23:34:03'),
(21, 0, 'Test User', 'test@test.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 0, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(22, 0, 'manager', 'manager@weendi.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 1, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(23, 0, 'assistant manager', 'assistant_manager@weendi.com', '', '', '$2y$10$rcvnM8zG.b1U5qxukG6pO.82v7X.NYZBFU9CsEI/ki1gQUNvhlpSW', 2, 0, 0, 0, '2020-05-04 18:38:55', '2020-05-04 18:38:55'),
(24, 0, 'test_user', 'test_user@gmail.com', '', '', '$2y$10$VMCm9olTym6fLoqWUTIByO23/Zy.WjlyRzYHrUttlEPEG53jp79Ym', 0, 0, 0, 0, '2020-05-06 22:51:17', '2020-05-06 22:51:17'),
(26, 0, 'admin', 'admin@weendi.com', '', '', '$2y$10$LJ.xc4KwoR9xfNhrmtdZnOq/53G3b4c7MfFULeVU2pS3but75Zv2G', 3, 0, 0, 0, '2020-05-10 01:41:29', '2020-05-10 01:41:29'),
(30, 0, 'test manager', 'test_manager@weendi.com', '', '', '$2y$10$tF1oZV7ZI7gQTLDUQiLXA.T2sNAUJkxRdmxUMlPWtmn.KtHtHLQl.', 1, 0, 0, 0, '2020-05-24 19:20:15', '2020-05-24 19:20:15'),
(31, 0, 'testings ', 'test123@weendi.com', '1995-12-31', '2', '$2y$10$B8ec0KaXXxONX.mvsfrXDOdQNlOyQE44A8zbly6foAbA1v05JdIDi', 0, 0, 0, 0, '2020-05-25 19:41:50', '2020-05-25 19:41:50'),
(33, 0, 'Test User', 'test_user@weendi.com', '1999-01-02', '1', '$2y$10$8LS/pVuwSlaTqGL2twMrTufPe4jg2rvRqVpLgwZsTQ/A0w8nr8Eme', 0, 0, 0, 0, '2020-06-17 21:06:38', '2020-06-17 21:06:38'),
(34, 0, 'test pending', 'test_pending@gmail.com', '1998-08-04', '1', '$2y$10$4j2NrVQY6ox7NnAH3yg1bukezyBrjvUG8bZK1btpk06oV7Bh/T.zK', 0, 0, 0, 0, '2020-07-13 22:11:23', '2020-07-13 22:11:23'),
(35, 0, 'User Test', 'user_test@gmail.com', '1996-01-01', '1', '$2y$10$sVR.7FCAAWELjARWWqROdOpKY4CBCQDhw9nxr2vVFBPMLp/bOESDe', 0, 0, 0, 0, '2020-08-12 19:29:34', '2020-08-12 19:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `users_community`
--

CREATE TABLE `users_community` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not yet accepted, 1 = accepted, 2 = assistant manage, 3 = ban user ',
  `anounymous` int(11) NOT NULL COMMENT '0 = public, 1 = anounymous',
  `ban_reason` varchar(255) NOT NULL,
  `remove_ac_reason` varchar(255) NOT NULL,
  `post` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `upvote_devote` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_community`
--

INSERT INTO `users_community` (`id`, `user_id`, `community_id`, `status`, `anounymous`, `ban_reason`, `remove_ac_reason`, `post`, `comment`, `share`, `report`, `upvote_devote`, `answer`, `created_at`, `updated_at`) VALUES
(2, 18, 26, 0, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-05-11 23:10:32', '2020-05-11 23:10:32'),
(3, 18, 23, 2, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-05-12 00:07:02', '2020-05-12 00:07:02'),
(4, 18, 29, 1, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-03 22:06:33', '2020-06-03 22:06:33'),
(5, 21, 29, 0, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-03 23:56:10', '2020-06-03 23:56:10'),
(10, 21, 24, 0, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-15 23:27:23', '2020-06-15 23:27:23'),
(11, 18, 24, 1, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-19 22:06:43', '2020-06-19 22:06:43'),
(12, 21, 23, 0, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-22 23:13:30', '2020-06-22 23:13:30'),
(13, 21, 31, 0, 0, '0', '', 0, 0, 0, 0, 0, '', '2020-06-24 21:33:23', '2020-06-24 21:33:23'),
(14, 21, 30, 2, 0, '1', 'test', 0, 0, 0, 0, 0, '', '2020-06-24 21:33:23', '2020-06-24 21:33:23'),
(16, 18, 30, 3, 0, 'test block', 'tset', 1, 1, 1, 1, 1, '', '2020-06-19 22:06:43', '2020-06-19 22:06:43'),
(17, 34, 30, 0, 0, 'test', '', 0, 0, 0, 0, 0, '', '2020-06-19 22:06:43', '2020-06-19 22:06:43'),
(21, 35, 23, 0, 0, '', '', 0, 0, 0, 0, 0, 'test', '2020-08-12 22:06:41', '2020-08-12 22:06:41'),
(23, 18, 39, 1, 0, '', '', 0, 0, 0, 0, 0, '', '2020-08-12 22:41:32', '2020-08-12 22:41:32');

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
(9, 31, '::1', '2020-05-25 19:50:29', '2020-05-25 19:50:29'),
(10, 34, '::1', '2020-07-13 22:11:33', '2020-07-13 22:11:33'),
(11, 35, '::1', '2020-08-12 19:29:53', '2020-08-12 19:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_post`
--

CREATE TABLE `users_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subclass_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_post`
--

INSERT INTO `users_post` (`id`, `user_id`, `community_id`, `title`, `content`, `status`, `reason`, `tags`, `category_id`, `subclass_id`, `created_at`, `updated_at`) VALUES
(218, 18, 0, '', 'a:13:{i:0;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:9:\"Editor.js\";s:5:\"level\";s:1:\"2\";}}i:1;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:168:\"Hey. Meet the new Editor. On this page you can see it in action — try to edit this text. Source code of the page contains the example of connection and configuration.\";}}i:2;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:12:\"Key features\";s:5:\"level\";s:1:\"3\";}}i:3;a:2:{s:4:\"type\";s:4:\"list\";s:4:\"data\";a:2:{s:5:\"style\";s:9:\"unordered\";s:5:\"items\";a:3:{i:0;s:27:\"It is a block-styled editor\";i:1;s:36:\"It returns clean data output in JSON\";i:2;s:57:\"Designed to be extendable and pluggable with a simple API\";}}}i:4;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:41:\"What does it mean «block-styled editor»\";s:5:\"level\";s:1:\"3\";}}i:5;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:374:\"Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor\'s Core.\";}}i:6;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:304:\"There are dozens of <a href=\"https://github.com/editor-js\">ready-to-use Blocks</a> and the <a href=\"https://editorjs.io/creating-a-block-tool\">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games.\";}}i:7;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:35:\"What does it mean clean data output\";s:5:\"level\";s:1:\"3\";}}i:8;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:195:\"Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below\";}}i:9;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:363:\"Given data can be used as you want: render with HTML for <code class=\"inline-code\">Web clients</code>, render natively for <code class=\"inline-code\">mobile apps</code>, create markup for <code class=\"inline-code\">Facebook Instant Articles</code> or <code class=\"inline-code\">Google AMP</code>, generate an <code class=\"inline-code\">audio version</code> and so on.\";}}i:10;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:70:\"Clean data is useful to sanitize, validate and process on the backend.\";}}i:11;a:1:{s:4:\"type\";s:9:\"delimiter\";}i:12;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:284:\"We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make its core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. ????\";}}}', 0, '', '', 0, 0, '2020-08-27 20:45:49', '2020-08-27 20:45:49'),
(219, 18, 39, 'tset', 'a:13:{i:0;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:9:\"Editor.js\";s:5:\"level\";s:1:\"2\";}}i:1;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:168:\"Hey. Meet the new Editor. On this page you can see it in action — try to edit this text. Source code of the page contains the example of connection and configuration.\";}}i:2;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:12:\"Key features\";s:5:\"level\";s:1:\"3\";}}i:3;a:2:{s:4:\"type\";s:4:\"list\";s:4:\"data\";a:2:{s:5:\"style\";s:9:\"unordered\";s:5:\"items\";a:3:{i:0;s:27:\"It is a block-styled editor\";i:1;s:36:\"It returns clean data output in JSON\";i:2;s:57:\"Designed to be extendable and pluggable with a simple API\";}}}i:4;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:41:\"What does it mean «block-styled editor»\";s:5:\"level\";s:1:\"3\";}}i:5;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:374:\"Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor\'s Core.\";}}i:6;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:304:\"There are dozens of <a href=\"https://github.com/editor-js\">ready-to-use Blocks</a> and the <a href=\"https://editorjs.io/creating-a-block-tool\">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games.\";}}i:7;a:2:{s:4:\"type\";s:6:\"header\";s:4:\"data\";a:2:{s:4:\"text\";s:35:\"What does it mean clean data output\";s:5:\"level\";s:1:\"3\";}}i:8;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:195:\"Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below\";}}i:9;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:363:\"Given data can be used as you want: render with HTML for <code class=\"inline-code\">Web clients</code>, render natively for <code class=\"inline-code\">mobile apps</code>, create markup for <code class=\"inline-code\">Facebook Instant Articles</code> or <code class=\"inline-code\">Google AMP</code>, generate an <code class=\"inline-code\">audio version</code> and so on.\";}}i:10;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:70:\"Clean data is useful to sanitize, validate and process on the backend.\";}}i:11;a:1:{s:4:\"type\";s:9:\"delimiter\";}i:12;a:2:{s:4:\"type\";s:9:\"paragraph\";s:4:\"data\";a:1:{s:4:\"text\";s:284:\"We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make its core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. ????\";}}}', 0, '', 'test,tset2', 20, 16, '2020-08-27 21:16:09', '2020-08-27 21:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `users_report`
--

CREATE TABLE `users_report` (
  `id` int(11) NOT NULL,
  `reported_by_user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_report`
--

INSERT INTO `users_report` (`id`, `reported_by_user_id`, `community_id`, `post_id`, `user_id`, `report_content`, `created_at`, `updated_at`) VALUES
(1, 18, 30, 19, 31, 'I want to report this post!', '2020-07-16 21:24:57', '2020-07-16 21:24:57');

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
(11, 18, 23, 21, 'I just want to share this post! Test update', '2020-06-15 21:55:14', '2020-06-15 21:55:14');

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
(12, 18, 0, 0, '2020-05-05 21:33:51', '2020-05-05 21:33:51'),
(13, 24, 0, 0, '2020-05-06 22:52:14', '2020-05-06 22:52:14'),
(14, 21, 1, 0, '2020-06-22 22:53:49', '2020-06-22 22:53:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_ac_settings`
--
ALTER TABLE `community_ac_settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indexes for table `community_category`
--
ALTER TABLE `community_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_category_subclass`
--
ALTER TABLE `community_category_subclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_photo`
--
ALTER TABLE `community_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_users_anonymous`
--
ALTER TABLE `community_users_anonymous`
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
-- Indexes for table `join_community_files`
--
ALTER TABLE `join_community_files`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `community_ac_settings`
--
ALTER TABLE `community_ac_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `community_assistant_managers`
--
ALTER TABLE `community_assistant_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `community_banned_users`
--
ALTER TABLE `community_banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `community_category`
--
ALTER TABLE `community_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `community_category_subclass`
--
ALTER TABLE `community_category_subclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `community_photo`
--
ALTER TABLE `community_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `community_users_anonymous`
--
ALTER TABLE `community_users_anonymous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `join_community_files`
--
ALTER TABLE `join_community_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users_community`
--
ALTER TABLE `users_community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_deleted_post`
--
ALTER TABLE `users_deleted_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_ip`
--
ALTER TABLE `users_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_post`
--
ALTER TABLE `users_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `users_report`
--
ALTER TABLE `users_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_shared_posts`
--
ALTER TABLE `users_shared_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_vote`
--
ALTER TABLE `users_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
