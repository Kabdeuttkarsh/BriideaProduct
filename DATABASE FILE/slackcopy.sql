-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 07:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slackcopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_groups`
--

CREATE TABLE `chat_groups` (
  `group_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `chat_group_name` varchar(200) NOT NULL,
  `group_description` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_groups`
--

INSERT INTO `chat_groups` (`group_id`, `company_id`, `created_by`, `chat_group_name`, `group_description`, `is_active`, `is_deleted`, `created_on`, `updated_on`) VALUES
(1, 1, 1, 'New', 'as', 1, 0, '2022-11-09 18:51:47', '2022-11-09 18:51:47'),
(2, 1, 1, 'Grop1', 'ada', 1, 0, '2022-11-09 19:17:46', '2022-11-09 19:17:46'),
(3, 1, 1, 'XYZ', 'sadfgh', 1, 0, '2022-11-10 10:12:33', '2022-11-10 10:12:33'),
(4, 1, 1, 'New Chat Group', 'gdjsfnsn', 1, 0, '2022-11-14 14:03:16', '2022-11-14 14:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`, `company_logo`, `is_active`, `is_deleted`, `is_verified`) VALUES
(1, 'Briidea Innoventures LLP', '0', '0', 'Alibaugh', '7038988442', 'India', 'IT Company', 'INR', 'angadlogo.png', 1, 0, 0),
(2, 'XYZ', '', '', 'Nanded', '123456789', 'India', 'er', 'INR', NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `permission`, `is_active`, `is_deleted`) VALUES
(1, 'Super Administrator(Briidea)', 'a:29:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:17:\"createDesignation\";i:5;s:17:\"updateDesignation\";i:6;s:15:\"viewDesignation\";i:7;s:17:\"deleteDesignation\";i:8;s:13:\"createCompany\";i:9;s:13:\"updateCompany\";i:10;s:11:\"viewCompany\";i:11;s:13:\"deleteCompany\";i:12;s:11:\"createGroup\";i:13;s:11:\"updateGroup\";i:14;s:9:\"viewGroup\";i:15;s:11:\"deleteGroup\";i:16;s:10:\"viewReport\";i:17;s:18:\"createOnetoOneChat\";i:18;s:18:\"updateOnetoOneChat\";i:19;s:16:\"viewOnetoOneChat\";i:20;s:18:\"deleteOnetoOneChat\";i:21;s:15:\"createGroupChat\";i:22;s:15:\"updateGroupChat\";i:23;s:13:\"viewGroupChat\";i:24;s:15:\"deleteGroupChat\";i:25;s:19:\"createBroadCastChat\";i:26;s:19:\"updateBroadCastChat\";i:27;s:17:\"viewBroadCastChat\";i:28;s:19:\"deleteBroadCastChat\";}', 1, 0),
(2, 'Company Admin', 'a:21:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:10:\"viewReport\";i:9;s:18:\"createOnetoOneChat\";i:10;s:18:\"updateOnetoOneChat\";i:11;s:16:\"viewOnetoOneChat\";i:12;s:18:\"deleteOnetoOneChat\";i:13;s:15:\"createGroupChat\";i:14;s:15:\"updateGroupChat\";i:15;s:13:\"viewGroupChat\";i:16;s:15:\"deleteGroupChat\";i:17;s:19:\"createBroadCastChat\";i:18;s:19:\"updateBroadCastChat\";i:19;s:17:\"viewBroadCastChat\";i:20;s:19:\"deleteBroadCastChat\";}', 1, 0),
(3, 'Company Staff', 'a:7:{i:0;s:8:\"viewUser\";i:1;s:18:\"createOnetoOneChat\";i:2;s:16:\"viewOnetoOneChat\";i:3;s:15:\"createGroupChat\";i:4;s:13:\"viewGroupChat\";i:5;s:19:\"createBroadCastChat\";i:6;s:17:\"viewBroadCastChat\";}', 1, 0),
(4, 'Company Manager', 'a:17:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:10:\"viewReport\";i:5;s:18:\"createOnetoOneChat\";i:6;s:18:\"updateOnetoOneChat\";i:7;s:16:\"viewOnetoOneChat\";i:8;s:18:\"deleteOnetoOneChat\";i:9;s:15:\"createGroupChat\";i:10;s:15:\"updateGroupChat\";i:11;s:13:\"viewGroupChat\";i:12;s:15:\"deleteGroupChat\";i:13;s:19:\"createBroadCastChat\";i:14;s:19:\"updateBroadCastChat\";i:15;s:17:\"viewBroadCastChat\";i:16;s:19:\"deleteBroadCastChat\";}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `general_settings_id` int(11) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `group_messages_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `group_message_sender_id` int(10) NOT NULL,
  `group_message` text DEFAULT NULL,
  `group_message_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_sent` tinyint(1) NOT NULL,
  `delivered_to` varchar(200) DEFAULT NULL,
  `seen_by` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`group_messages_id`, `group_id`, `group_message_sender_id`, `group_message`, `group_message_time`, `is_sent`, `delivered_to`, `seen_by`, `is_active`, `is_deleted`) VALUES
(1, 1, 1, 'dsfgh', '2022-11-10 15:16:05', 0, NULL, NULL, 1, 0),
(2, 1, 24, 'reply', '2022-11-10 15:16:05', 0, NULL, NULL, 1, 0),
(3, 1, 1, NULL, '2022-11-10 16:38:26', 0, NULL, NULL, 1, 0),
(4, 1, 1, NULL, '2022-11-10 16:38:45', 0, NULL, NULL, 1, 0),
(5, 1, 1, 'frfrfrfrf', '2022-11-10 16:39:46', 0, NULL, NULL, 1, 0),
(6, 1, 1, 'dadad', '2022-11-10 16:42:26', 0, NULL, NULL, 1, 0),
(7, 1, 1, 'dadaddadad', '2022-11-10 16:42:33', 0, NULL, NULL, 1, 0),
(8, 1, 1, 'eesa', '2022-11-10 16:42:39', 0, NULL, NULL, 1, 0),
(9, 1, 1, 'sasasa', '2022-11-10 16:45:12', 0, NULL, NULL, 1, 0),
(10, 1, 23, 're', '2022-11-10 16:46:57', 0, NULL, NULL, 1, 0),
(11, 1, 1, 'Hiii All', '2022-11-10 16:47:42', 0, NULL, NULL, 1, 0),
(12, 1, 23, 'Hii Admin', '2022-11-10 16:47:53', 0, NULL, NULL, 1, 0),
(13, 1, 23, 'dada', '2022-11-10 17:18:08', 0, NULL, NULL, 1, 0),
(14, 1, 1, 'hello', '2022-11-10 17:36:29', 0, NULL, NULL, 1, 0),
(15, 1, 1, 'dada', '2022-11-10 17:37:23', 0, NULL, NULL, 1, 0),
(16, 1, 1, 'rwe', '2022-11-10 17:38:45', 0, NULL, NULL, 1, 0),
(17, 1, 1, 'wq', '2022-11-10 17:39:18', 0, NULL, NULL, 1, 0),
(18, 1, 1, 'tr', '2022-11-10 17:41:15', 0, NULL, NULL, 1, 0),
(19, 1, 1, 'tgb', '2022-11-10 17:43:38', 0, NULL, NULL, 1, 0),
(20, 1, 1, 'gt', '2022-11-10 17:45:22', 0, NULL, NULL, 1, 0),
(21, 2, 1, 'tgb', '2022-11-10 17:45:35', 0, NULL, NULL, 1, 0),
(22, 3, 1, 'wertyu', '2022-11-10 17:45:43', 0, NULL, NULL, 1, 0),
(25, 1, 1, 'ggf', '2022-11-10 17:46:36', 0, NULL, NULL, 1, 0),
(27, 1, 1, 'hello', '2022-11-10 17:51:03', 0, NULL, NULL, 1, 0),
(28, 1, 23, 'hii', '2022-11-10 17:51:08', 0, NULL, NULL, 1, 0),
(29, 1, 1, 'how are you', '2022-11-10 17:51:21', 0, NULL, NULL, 1, 0),
(30, 1, 1, 'fine', '2022-11-10 17:52:31', 0, NULL, NULL, 1, 0),
(31, 1, 24, 'rvr', '2022-11-10 17:52:38', 0, NULL, NULL, 1, 0),
(32, 1, 1, 'Admin', '2022-11-10 17:53:12', 0, NULL, NULL, 1, 0),
(33, 1, 23, 'kabde', '2022-11-10 17:53:35', 0, NULL, NULL, 1, 0),
(34, 1, 24, 'college', '2022-11-10 17:53:49', 0, NULL, NULL, 1, 0),
(35, 2, 1, 'gy', '2022-11-10 17:54:17', 0, NULL, NULL, 1, 0),
(36, 2, 24, 'yty', '2022-11-10 17:54:23', 0, NULL, NULL, 1, 0),
(37, 1, 23, 'ghhj', '2022-11-10 17:54:30', 0, NULL, NULL, 1, 0),
(38, 3, 1, 'ertyui', '2022-11-10 17:54:40', 0, NULL, NULL, 1, 0),
(39, 3, 24, 'jhjgfd', '2022-11-10 17:54:44', 0, NULL, NULL, 1, 0),
(40, 3, 1, 'frfr', '2022-11-10 18:03:31', 0, NULL, NULL, 1, 0),
(41, 1, 1, 'I am a Disco Dancer', '2022-11-10 18:11:05', 0, NULL, NULL, 1, 0),
(42, 1, 23, 'I am A Don', '2022-11-10 18:11:21', 0, NULL, NULL, 1, 0),
(43, 1, 24, 'I am Charlie', '2022-11-10 18:11:29', 0, NULL, NULL, 1, 0),
(44, 1, 1, 'Hiii', '2022-11-11 10:37:30', 0, NULL, NULL, 1, 0),
(45, 1, 1, 'Hiii ', '2022-11-11 10:37:38', 0, NULL, NULL, 1, 0),
(46, 1, 1, 'Heillo', '2022-11-11 10:38:20', 0, NULL, NULL, 1, 0),
(47, 1, 23, 'Hello All', '2022-11-11 10:38:32', 0, NULL, NULL, 1, 0),
(48, 1, 24, 'How Are You', '2022-11-11 10:38:43', 0, NULL, NULL, 1, 0),
(49, 2, 1, 'ffa', '2022-11-11 10:39:01', 0, NULL, NULL, 1, 0),
(50, 1, 1, 'as', '2022-11-11 11:42:18', 0, NULL, NULL, 1, 0),
(51, 1, 1, 'wdfgh', '2022-11-11 14:08:23', 0, NULL, NULL, 1, 0),
(52, 1, 1, 'hgjhbhj', '2022-11-14 14:07:08', 0, NULL, NULL, 1, 0),
(53, 1, 1, 'dgfhjk', '2022-11-14 14:07:12', 0, NULL, NULL, 1, 0),
(54, 1, 1, 'dadada', '2022-11-14 14:07:56', 0, NULL, NULL, 1, 0),
(55, 1, 23, 'dfhgjk', '2022-11-14 14:08:12', 0, NULL, NULL, 1, 0),
(56, 1, 1, 'fghnm', '2022-11-14 14:08:18', 0, NULL, NULL, 1, 0),
(57, 1, 1, 'asa', '2022-11-15 11:02:41', 0, NULL, NULL, 1, 0),
(58, 1, 1, 'sa', '2022-11-15 11:30:28', 0, NULL, NULL, 1, 0),
(59, 1, 1, 'sarthak', '2022-11-15 11:30:34', 0, NULL, NULL, 1, 0),
(60, 1, 1, 'sasa', '2022-11-15 11:31:48', 0, NULL, NULL, 1, 0),
(61, 1, 23, 'saafa', '2022-11-15 11:37:04', 0, NULL, NULL, 1, 0),
(62, 1, 1, 'trtr', '2022-11-15 11:37:16', 0, NULL, NULL, 1, 0),
(63, 1, 23, 'gdfh', '2022-11-15 11:37:21', 0, NULL, NULL, 1, 0),
(64, 2, 1, 'sa', '2022-11-15 11:53:03', 0, NULL, NULL, 1, 0),
(65, 3, 1, 'sasa', '2022-11-15 11:53:09', 0, NULL, NULL, 1, 0),
(66, 4, 1, 'saa', '2022-11-15 11:53:18', 0, NULL, NULL, 1, 0),
(67, 4, 23, 'sasa', '2022-11-15 11:53:36', 0, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_user_mapping`
--

CREATE TABLE `group_user_mapping` (
  `group_user_mapping_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_user_mapping`
--

INSERT INTO `group_user_mapping` (`group_user_mapping_id`, `group_id`, `user_id`, `company_id`, `added_by`, `added_date`, `is_deleted`, `is_active`, `updated_on`) VALUES
(1, 1, 23, 1, 1, '2022-11-09 18:51:47', 0, 1, '2022-11-09 18:51:47'),
(2, 1, 24, 1, 1, '2022-11-09 18:51:47', 0, 1, '2022-11-09 18:51:47'),
(3, 1, 1, 1, 1, '2022-11-09 18:51:47', 0, 1, '2022-11-09 18:51:47'),
(4, 2, 24, 1, 1, '2022-11-09 19:17:46', 0, 1, '2022-11-09 19:17:46'),
(5, 2, 1, 1, 1, '2022-11-09 19:17:46', 0, 1, '2022-11-09 19:17:46'),
(6, 3, 24, 1, 1, '2022-11-10 10:12:33', 0, 1, '2022-11-10 10:12:33'),
(7, 3, 1, 1, 1, '2022-11-10 10:12:33', 0, 1, '2022-11-10 10:12:33'),
(8, 4, 23, 1, 1, '2022-11-14 14:03:16', 0, 1, '2022-11-14 14:03:16'),
(9, 4, 24, 1, 1, '2022-11-14 14:03:16', 0, 1, '2022-11-14 14:03:16'),
(10, 4, 1, 1, 1, '2022-11-14 14:03:16', 0, 1, '2022-11-14 14:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_message_id` int(11) NOT NULL,
  `receiver_message_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `is_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_message_id`, `receiver_message_id`, `message`, `message_time`, `is_deleted`, `is_seen`, `is_delivered`, `is_sent`) VALUES
(1, 1, 23, 'Hello Uttkarsh', '2022-10-21 01:13:36', 0, 0, 0, 0),
(2, 23, 1, 'Hello Admin', '2022-10-21 01:15:36', 0, 0, 0, 0),
(3, 1, 23, 'How Are You', '2022-10-21 01:15:46', 0, 0, 0, 0),
(4, 1, 23, 'hiiiii', '2022-11-07 16:51:29', 0, 0, 0, 0),
(5, 1, 23, 'dfgh', '2022-11-08 09:03:20', 0, 0, 0, 0),
(6, 1, 23, 'hiii', '2022-11-08 11:22:08', 0, 0, 0, 0),
(7, 1, 23, 'sdf', '2022-11-08 11:22:34', 0, 0, 0, 0),
(8, 1, 23, 'dsfghj', '2022-11-08 11:23:06', 0, 0, 0, 0),
(9, 1, 23, 'sadf', '2022-11-08 11:24:26', 0, 0, 0, 0),
(10, 1, 23, 'sdfgh', '2022-11-08 11:24:50', 0, 0, 0, 0),
(11, 1, 23, 'sdfgh', '2022-11-08 11:28:37', 0, 0, 0, 0),
(12, 1, 23, 'sdf', '2022-11-08 11:29:20', 0, 0, 0, 0),
(13, 1, 23, 'sadf', '2022-11-08 11:33:07', 0, 0, 0, 0),
(14, 1, 23, 'df', '2022-11-08 11:35:07', 0, 0, 0, 0),
(15, 1, 23, 'hiii', '2022-11-08 11:39:09', 0, 0, 0, 0),
(16, 1, 23, 'hiiii', '2022-11-08 11:40:45', 0, 0, 0, 0),
(17, 23, 1, 'hiiii', '2022-11-08 11:40:59', 0, 0, 0, 0),
(18, 1, 23, 'hiii', '2022-11-08 12:04:51', 0, 0, 0, 0),
(19, 1, 23, 'hello', '2022-11-08 12:12:22', 0, 0, 0, 0),
(20, 1, 23, 'hiii', '2022-11-08 12:38:05', 0, 0, 0, 0),
(21, 1, 23, 'HIiii', '2022-11-08 12:38:25', 0, 0, 0, 0),
(22, 1, 23, 'Hello ', '2022-11-08 12:39:50', 0, 0, 0, 0),
(23, 1, 23, 'Hello There', '2022-11-08 12:40:53', 0, 0, 0, 0),
(24, 1, 23, 'Hello', '2022-11-08 12:50:37', 0, 0, 0, 0),
(25, 1, 23, 'fgh', '2022-11-08 13:08:05', 0, 0, 0, 0),
(26, 1, 23, 'sdrtred', '2022-11-08 13:08:17', 0, 0, 0, 0),
(27, 1, 23, 'fgrfd', '2022-11-08 13:08:27', 0, 0, 0, 0),
(28, 1, 23, 'hiii', '2022-11-08 13:10:58', 0, 0, 0, 0),
(29, 1, 23, 'heiiii', '2022-11-08 13:13:34', 0, 0, 0, 0),
(30, 1, 23, 'drtedewdwedy', '2022-11-08 13:13:41', 0, 0, 0, 0),
(31, 1, 23, 'fgh', '2022-11-08 13:35:21', 0, 0, 0, 0),
(32, 1, 23, 'dfgh', '2022-11-08 13:35:43', 0, 0, 0, 0),
(33, 1, 24, 'dfg', '2022-11-08 13:37:17', 0, 0, 0, 0),
(34, 1, 23, 'asdf', '2022-11-08 13:37:27', 0, 0, 0, 0),
(35, 1, 23, 'fghj', '2022-11-08 14:05:07', 0, 0, 0, 0),
(36, 1, 23, 'rtghbnm ', '2022-11-08 14:05:17', 0, 0, 0, 0),
(37, 1, 0, 'asdfg', '2022-11-08 19:34:34', 0, 0, 0, 0),
(38, 1, 0, 'asdfg', '2022-11-08 19:34:37', 0, 0, 0, 0),
(39, 1, 0, 'sdfg', '2022-11-08 19:34:45', 0, 0, 0, 0),
(40, 1, 0, 'sdf', '2022-11-08 19:36:04', 0, 0, 0, 0),
(41, 1, 0, 'aedf', '2022-11-08 19:36:11', 0, 0, 0, 0),
(42, 1, 0, 'dfg', '2022-11-08 19:36:21', 0, 0, 0, 0),
(43, 1, 0, 'dfg', '2022-11-08 19:38:13', 0, 0, 0, 0),
(44, 1, 0, 'asdf', '2022-11-08 19:39:11', 0, 0, 0, 0),
(45, 1, 23, 'asdfg', '2022-11-08 19:40:11', 0, 0, 0, 0),
(46, 1, 23, 'sdfg', '2022-11-08 19:40:54', 0, 0, 0, 0),
(47, 1, 23, 'sdf', '2022-11-08 19:41:37', 0, 0, 0, 0),
(48, 1, 23, 'zxc', '2022-11-08 20:00:33', 0, 0, 0, 0),
(49, 1, 23, 'ertr', '2022-11-08 20:05:26', 0, 0, 0, 0),
(50, 1, 23, 'awdf', '2022-11-08 20:06:28', 0, 0, 0, 0),
(51, 1, 23, 'eret', '2022-11-08 20:06:37', 0, 0, 0, 0),
(52, 1, 23, 'asdfg', '2022-11-08 20:10:10', 0, 0, 0, 0),
(53, 1, 23, 'sadf', '2022-11-08 20:10:15', 0, 0, 0, 0),
(54, 1, 23, 'asedfghuytre', '2022-11-08 20:11:30', 0, 0, 0, 0),
(55, 1, 23, 'asdasdfdsf', '2022-11-08 20:12:49', 0, 0, 0, 0),
(56, 1, 23, 'fghjk', '2022-11-08 20:14:24', 0, 0, 0, 0),
(57, 1, 23, 'sdf', '2022-11-08 20:16:40', 0, 0, 0, 0),
(58, 1, 23, 'wewrtygfd', '2022-11-08 20:22:15', 0, 0, 0, 0),
(59, 1, 23, 'asas', '2022-11-08 20:26:01', 0, 0, 0, 0),
(60, 1, 23, 'sdf', '2022-11-08 20:39:50', 0, 0, 0, 0),
(61, 1, 23, 'Hellosdf', '2022-11-08 20:40:06', 0, 0, 0, 0),
(62, 1, 23, 'Hello', '2022-11-08 20:40:14', 0, 0, 0, 0),
(63, 1, 23, 'hello', '2022-11-08 20:41:14', 0, 0, 0, 0),
(64, 1, 23, 'dfg', '2022-11-08 20:41:38', 0, 0, 0, 0),
(65, 1, 23, 'fdg', '2022-11-08 20:41:44', 0, 0, 0, 0),
(66, 1, 23, 'sdf', '2022-11-08 20:51:43', 0, 0, 0, 0),
(67, 1, 23, 'ddd', '2022-11-08 20:55:46', 0, 0, 0, 0),
(68, 1, 23, 'dddd', '2022-11-08 21:35:45', 0, 0, 0, 0),
(69, 1, 23, 'sdfg', '2022-11-08 21:39:07', 0, 0, 0, 0),
(70, 1, 23, 'sdf', '2022-11-08 21:50:23', 0, 0, 0, 0),
(71, 1, 23, 'sdf', '2022-11-08 21:51:19', 0, 0, 0, 0),
(72, 1, 23, 'sdfg', '2022-11-08 21:51:32', 0, 0, 0, 0),
(73, 1, 23, 'df', '2022-11-08 21:51:52', 0, 0, 0, 0),
(74, 1, 23, 'ddddfefef', '2022-11-08 21:55:08', 0, 0, 0, 0),
(75, 1, 23, 'sadf', '2022-11-08 21:57:53', 0, 0, 0, 0),
(76, 1, 23, 'hi', '2022-11-08 21:58:30', 0, 0, 0, 0),
(77, 1, 23, 'gr', '2022-11-08 21:59:33', 0, 0, 0, 0),
(78, 1, 23, 'gt', '2022-11-08 21:59:40', 0, 0, 0, 0),
(79, 1, 23, 'gtgt', '2022-11-08 22:14:10', 0, 0, 0, 0),
(80, 1, 23, 'frfr', '2022-11-08 22:15:13', 0, 0, 0, 0),
(81, 1, 23, 'erd', '2022-11-08 22:16:32', 0, 0, 0, 0),
(82, 1, 23, 'erd', '2022-11-08 22:16:34', 0, 0, 0, 0),
(83, 1, 23, 'sasa', '2022-11-08 22:17:57', 0, 0, 0, 0),
(84, 1, 23, 'sasa', '2022-11-08 22:17:59', 0, 0, 0, 0),
(85, 1, 23, 'sasasasas', '2022-11-08 22:30:08', 0, 0, 0, 0),
(86, 1, 23, 'sasasa', '2022-11-08 22:30:17', 0, 0, 0, 0),
(87, 1, 23, 'sasasaffd', '2022-11-08 22:30:25', 0, 0, 0, 0),
(88, 1, 23, 'hii', '2022-11-08 22:30:46', 0, 0, 0, 0),
(89, 1, 23, 'sa', '2022-11-08 22:32:59', 0, 0, 0, 0),
(90, 1, 23, 'sasa', '2022-11-08 22:38:54', 0, 0, 0, 0),
(91, 1, 23, 'frfr', '2022-11-08 22:50:43', 0, 0, 0, 0),
(92, 1, 23, 'frfrfrfr', '2022-11-08 22:50:49', 0, 0, 0, 0),
(93, 1, 23, 'frfrgh', '2022-11-08 22:51:02', 0, 0, 0, 0),
(94, 1, 23, 'ghj', '2022-11-08 22:51:15', 0, 0, 0, 0),
(95, 1, 23, 'fhi', '2022-11-08 23:02:38', 0, 0, 0, 0),
(96, 1, 23, 'gyru', '2022-11-08 23:02:45', 0, 0, 0, 0),
(97, 1, 23, 'dadsda', '2022-11-08 23:03:14', 0, 0, 0, 0),
(98, 1, 23, 'rwrwr', '2022-11-08 23:03:27', 0, 0, 0, 0),
(99, 1, 23, 'dadada', '2022-11-08 23:04:21', 0, 0, 0, 0),
(100, 1, 23, 'rghej', '2022-11-08 23:04:41', 0, 0, 0, 0),
(101, 1, 23, 'cgvhbj', '2022-11-08 23:06:19', 0, 0, 0, 0),
(102, 1, 23, 'Gwki', '2022-11-08 23:11:29', 0, 0, 0, 0),
(103, 1, 23, 'Hello', '2022-11-08 23:11:46', 0, 0, 0, 0),
(104, 1, 23, 'Final Testing', '2022-11-08 23:11:53', 0, 0, 0, 0),
(105, 1, 23, 'Kaise ho ?', '2022-11-08 23:12:06', 0, 0, 0, 0),
(106, 1, 23, 'Sb badhiya >', '2022-11-08 23:12:24', 0, 0, 0, 0),
(107, 1, 24, 'Hello Uttkarsh College', '2022-11-08 23:14:15', 0, 0, 0, 0),
(108, 1, 24, 'Hell', '2022-11-08 23:15:57', 0, 0, 0, 0),
(109, 1, 24, 'sasa', '2022-11-08 23:18:01', 0, 0, 0, 0),
(110, 1, 24, 'ghgh', '2022-11-08 23:18:56', 0, 0, 0, 0),
(111, 1, 23, 'dasda', '2022-11-08 23:23:19', 0, 0, 0, 0),
(112, 1, 24, 'geeg', '2022-11-08 23:23:51', 0, 0, 0, 0),
(113, 1, 23, 'dada', '2022-11-08 23:25:51', 0, 0, 0, 0),
(114, 1, 24, 'dadadada', '2022-11-08 23:26:13', 0, 0, 0, 0),
(115, 1, 24, 'dadas', '2022-11-08 23:27:12', 0, 0, 0, 0),
(116, 24, 1, 'dadad', '2022-11-08 23:28:30', 0, 0, 0, 0),
(117, 24, 1, 'czcz', '2022-11-08 23:28:39', 0, 0, 0, 0),
(118, 1, 24, 'czcz', '2022-11-08 23:28:49', 0, 0, 0, 0),
(119, 24, 1, 'czczcz', '2022-11-08 23:28:54', 0, 0, 0, 0),
(120, 1, 23, 'sasa', '2022-11-08 23:31:12', 0, 0, 0, 0),
(121, 1, 23, 'sa', '2022-11-08 23:32:54', 0, 0, 0, 0),
(122, 1, 23, 'Hii Uttkarsh Kabde', '2022-11-08 23:33:36', 0, 0, 0, 0),
(123, 23, 1, 'Hiii Admin', '2022-11-08 23:33:44', 0, 0, 0, 0),
(124, 1, 24, 'Hello Uttkarsh College', '2022-11-08 23:34:07', 0, 0, 0, 0),
(125, 24, 1, 'Hii Admin', '2022-11-08 23:34:15', 0, 0, 0, 0),
(126, 23, 1, 'How are you admin', '2022-11-08 23:34:29', 0, 0, 0, 0),
(127, 24, 1, 'fsa', '2022-11-08 23:34:46', 0, 0, 0, 0),
(128, 1, 24, 'dada', '2022-11-08 23:36:04', 0, 0, 0, 0),
(129, 23, 1, 'frrfr', '2022-11-08 23:36:42', 0, 0, 0, 0),
(130, 1, 23, 'desa', '2022-11-09 10:04:05', 0, 0, 0, 0),
(131, 1, 23, 'desa', '2022-11-09 10:04:10', 0, 0, 0, 0),
(132, 1, 23, 'desa', '2022-11-09 10:04:56', 0, 0, 0, 0),
(133, 1, 23, 'fsfs', '2022-11-09 10:05:10', 0, 0, 0, 0),
(134, 1, 23, 'dede', '2022-11-09 10:05:21', 0, 0, 0, 0),
(135, 1, 23, 'sasa', '2022-11-09 10:05:30', 0, 0, 0, 0),
(136, 23, 1, 'gtg', '2022-11-09 10:07:05', 0, 0, 0, 0),
(137, 1, 23, 'dada', '2022-11-09 10:09:09', 0, 0, 0, 0),
(138, 1, 23, 'sdfg', '2022-11-09 10:29:52', 0, 0, 0, 0),
(139, 1, 23, 'hi', '2022-11-09 10:44:10', 0, 0, 0, 0),
(140, 23, 1, 'hello', '2022-11-09 10:44:19', 0, 0, 0, 0),
(141, 1, 24, 'hi Uttkarsh College', '2022-11-09 10:44:46', 0, 0, 0, 0),
(142, 24, 1, 'helooo single', '2022-11-09 10:45:03', 0, 0, 0, 0),
(143, 1, 24, 'da', '2022-11-09 10:46:16', 0, 0, 0, 0),
(144, 1, 23, 'frfr', '2022-11-10 15:57:26', 0, 0, 0, 0),
(145, 1, 23, 'sasa', '2022-11-10 16:05:23', 0, 0, 0, 0),
(146, 1, 23, 'dada', '2022-11-10 16:05:52', 0, 0, 0, 0),
(147, 23, 1, 'dadadadada', '2022-11-10 16:06:33', 0, 0, 0, 0),
(148, 23, 1, 'mass', '2022-11-10 16:56:30', 0, 0, 0, 0),
(149, 23, 1, 'ma ma mass', '2022-11-10 16:56:59', 0, 0, 0, 0),
(150, 23, 1, 'Hello Admin Mass', '2022-11-10 17:01:25', 0, 0, 0, 0),
(151, 1, 23, 'How Are you Uttkarsh Kabde', '2022-11-10 17:01:40', 0, 0, 0, 0),
(152, 23, 1, 'Fine How Are You', '2022-11-10 17:02:05', 0, 0, 0, 0),
(153, 1, 23, 'Goood', '2022-11-10 17:02:14', 0, 0, 0, 0),
(154, 1, 23, 'Try', '2022-11-10 17:02:57', 0, 0, 0, 0),
(155, 23, 1, 'Try2', '2022-11-10 17:03:07', 0, 0, 0, 0),
(156, 1, 23, 'Try43', '2022-11-10 17:03:14', 0, 0, 0, 0),
(157, 23, 1, 'Try56', '2022-11-10 17:03:20', 0, 0, 0, 0),
(158, 1, 23, 'xcs', '2022-11-10 18:11:57', 0, 0, 0, 0),
(159, 1, 23, 'wedfc', '2022-11-10 18:12:01', 0, 0, 0, 0),
(160, 1, 24, 'ewdxsa', '2022-11-10 18:12:13', 0, 0, 0, 0),
(161, 1, 23, 'rwrw', '2022-11-11 10:00:58', 0, 0, 0, 0),
(162, 1, 23, 'ty', '2022-11-11 10:01:42', 0, 0, 0, 0),
(163, 1, 23, 'ty', '2022-11-11 10:01:44', 0, 0, 0, 0),
(164, 1, 23, 'gr', '2022-11-11 10:01:53', 0, 0, 0, 0),
(165, 1, 23, 'dadaa', '2022-11-11 10:39:23', 0, 0, 0, 0),
(166, 1, 23, 'sa', '2022-11-14 10:15:05', 0, 0, 0, 0),
(167, 1, 23, 'ew', '2022-11-14 10:17:01', 0, 0, 0, 0),
(168, 1, 23, 'dada', '2022-11-14 10:22:39', 0, 0, 0, 0),
(169, 1, 23, 'rere', '2022-11-14 10:22:54', 0, 0, 0, 0),
(170, 1, 23, 'rerere', '2022-11-14 10:22:57', 0, 0, 0, 0),
(171, 1, 23, 'rererere', '2022-11-14 10:23:02', 0, 0, 0, 0),
(172, 1, 24, 'redsxc', '2022-11-14 10:23:16', 0, 0, 0, 0),
(173, 1, 23, 'Hello Sir', '2022-11-14 10:53:56', 0, 0, 0, 0),
(174, 1, 23, 'fsfww', '2022-11-14 10:55:15', 0, 0, 0, 0),
(175, 1, 23, 'fsfsf', '2022-11-14 10:55:18', 0, 0, 0, 0),
(176, 1, 23, 'sa', '2022-11-14 11:15:56', 0, 0, 0, 0),
(177, 1, 24, 'sasasa', '2022-11-14 11:16:03', 0, 0, 0, 0),
(178, 23, 1, 'asa', '2022-11-14 11:35:59', 0, 0, 0, 0),
(179, 1, 23, 'dfgh', '2022-11-14 11:36:53', 0, 0, 0, 0),
(180, 1, 23, 'sasa', '2022-11-14 11:37:34', 0, 0, 0, 0),
(181, 23, 1, 'sasasa', '2022-11-14 11:38:03', 0, 0, 0, 0),
(182, 23, 1, 'sasasasasa', '2022-11-14 11:38:44', 0, 0, 0, 0),
(183, 23, 1, 'htfsjk', '2022-11-14 11:40:51', 0, 0, 0, 0),
(184, 23, 1, 'saa', '2022-11-14 11:41:51', 0, 0, 0, 0),
(185, 1, 23, 'rtyuk', '2022-11-14 11:42:32', 0, 0, 0, 0),
(186, 1, 23, 'sasa', '2022-11-14 12:02:15', 0, 0, 0, 0),
(187, 1, 23, 'sasasas', '2022-11-14 12:03:07', 0, 0, 0, 0),
(188, 1, 23, 'sa', '2022-11-14 12:04:23', 0, 0, 0, 0),
(189, 1, 23, 'da', '2022-11-14 12:04:44', 0, 0, 0, 0),
(190, 1, 23, 'da', '2022-11-14 12:05:29', 0, 0, 0, 0),
(191, 23, 1, 'sada', '2022-11-14 12:05:34', 0, 0, 0, 0),
(192, 1, 23, 'sa', '2022-11-14 12:13:32', 0, 0, 0, 0),
(193, 1, 23, 'sasa', '2022-11-14 12:15:02', 0, 0, 0, 0),
(194, 1, 23, 'sasasa', '2022-11-14 12:15:41', 0, 0, 0, 0),
(195, 1, 23, 'nanded', '2022-11-14 12:16:19', 0, 0, 0, 0),
(196, 1, 23, 'message', '2022-11-14 12:17:35', 0, 0, 0, 0),
(197, 1, 23, 'fghjkaksdakl', '2022-11-14 12:18:42', 0, 0, 0, 0),
(198, 1, 23, 'dfghwjk', '2022-11-14 12:19:20', 0, 0, 0, 0),
(199, 23, 1, 'fghjkl', '2022-11-14 12:19:30', 0, 0, 0, 0),
(200, 1, 23, 'fghj', '2022-11-14 12:19:36', 0, 0, 0, 0),
(201, 1, 23, 'vhm,', '2022-11-14 12:19:45', 0, 0, 0, 0),
(202, 1, 23, 'cvbnm,', '2022-11-14 12:21:12', 0, 0, 0, 0),
(203, 23, 1, 'dfghjk,', '2022-11-14 12:26:49', 0, 0, 0, 0),
(204, 1, 23, 'trygwhjs,skfmsklfsf vnksjdfjksf vslf', '2022-11-14 12:27:52', 0, 0, 0, 0),
(205, 1, 23, 'dadada', '2022-11-14 12:29:56', 0, 0, 0, 0),
(206, 1, 23, 'dada', '2022-11-14 12:30:31', 0, 0, 0, 0),
(207, 1, 23, 'sa', '2022-11-14 12:31:21', 0, 0, 0, 0),
(208, 1, 23, 'dsds', '2022-11-14 12:34:23', 0, 0, 0, 0),
(209, 1, 23, 'sa', '2022-11-14 12:34:46', 0, 0, 0, 0),
(210, 1, 23, 'sasa', '2022-11-14 12:36:27', 0, 0, 0, 0),
(211, 1, 23, 'saa', '2022-11-14 12:38:48', 0, 0, 0, 0),
(212, 1, 23, 'sasa', '2022-11-14 12:39:53', 0, 0, 0, 0),
(213, 1, 23, 'sasasa', '2022-11-14 12:40:56', 0, 0, 0, 0),
(214, 1, 23, 'asa', '2022-11-14 12:41:17', 0, 0, 0, 0),
(215, 1, 23, 'sasasa', '2022-11-14 12:50:37', 0, 0, 0, 0),
(216, 1, 23, 'sfs', '2022-11-14 12:51:01', 0, 0, 0, 0),
(217, 1, 23, 'sa', '2022-11-14 12:52:51', 0, 0, 0, 0),
(218, 1, 23, 'Narendra Modi', '2022-11-14 12:53:33', 0, 0, 0, 0),
(219, 1, 23, 'Narendra', '2022-11-14 12:55:03', 0, 0, 0, 0),
(220, 1, 23, 'sa', '2022-11-14 12:55:16', 0, 0, 0, 0),
(221, 1, 23, 'Hello Uttkarsh', '2022-11-14 12:57:01', 0, 0, 0, 0),
(222, 1, 23, 'dada', '2022-11-14 12:57:36', 0, 0, 0, 0),
(223, 1, 23, 'mmmmm', '2022-11-14 12:57:41', 0, 0, 0, 0),
(224, 1, 23, 'gsdnzx', '2022-11-14 12:57:51', 0, 0, 0, 0),
(225, 1, 23, 'da', '2022-11-14 12:59:05', 0, 0, 0, 0),
(226, 1, 23, 'sa', '2022-11-14 12:59:22', 0, 0, 0, 0),
(227, 1, 24, 'good piece of writing. Paragraphs lend a natural rhythm to your writing that makes it a joy to read. The question is, how do you handle them successfully?   Below, we take a close look at what makes up an effective paragraph and explain how to write one that suits your needs. We also cover some advanced tips. But first, let’s start with the fundamentals. ', '2022-11-14 13:01:57', 0, 0, 0, 0),
(228, 1, 24, 'good piece of writing. Paragraphs lend a natural rhythm to your writing that makes it a joy to read. The question is, how do you handle them successfully?   Below, we take a close look at what makes up an effective paragraph and explain how to write one that suits your needs. We also cover some advanced tips. But first, let’s start with the fundamentals. ', '2022-11-14 13:02:31', 0, 0, 0, 0),
(229, 1, 23, 'good piece of writing. Paragraphs lend a natural rhythm to your writing that makes it a joy to read. The question is, how do you handle them successfully?   Below, we take a close look at what makes up an effective paragraph and explain how to write one that suits your needs. We also cover some advanced tips. But first, let’s start with the fundamentals. ', '2022-11-14 13:02:40', 0, 0, 0, 0),
(230, 1, 23, 'adada', '2022-11-14 13:13:50', 0, 0, 0, 0),
(231, 1, 23, 'dagda', '2022-11-14 13:15:30', 0, 0, 0, 0),
(232, 1, 23, 'asghaj', '2022-11-14 13:15:36', 0, 0, 0, 0),
(233, 1, 23, 'da', '2022-11-14 13:15:43', 0, 0, 0, 0),
(234, 1, 23, 'hiiii', '2022-11-14 14:04:30', 0, 0, 0, 0),
(235, 1, 23, 'guiui', '2022-11-14 14:04:52', 0, 0, 0, 0),
(236, 1, 23, 'gcnv', '2022-11-14 14:05:07', 0, 0, 0, 0),
(237, 1, 23, 'ghdrfbdj', '2022-11-14 14:05:28', 0, 0, 0, 0),
(238, 23, 1, 'jmbjb', '2022-11-14 14:05:34', 0, 0, 0, 0),
(239, 1, 23, 'gfhfh', '2022-11-14 14:05:45', 0, 0, 0, 0),
(240, 1, 23, 'vhvhv', '2022-11-14 14:06:17', 0, 0, 0, 0),
(241, 1, 23, 'fss', '2022-11-14 14:06:36', 0, 0, 0, 0),
(242, 1, 23, 'da', '2022-11-14 15:56:33', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(10) DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`, `company_id`, `is_active`, `is_deleted`, `is_verified`, `otp`, `is_online`) VALUES
(1, 'Super Admin(Briidea)', '$2y$10$YG.fXPe7Me1PiS3sCmv73.Y9hCMen7dnfKgzbyj8yKCPHi86yXpBi', 'admin@briidea.com', 'Admin', ' ', '7038988442', 1, 1, 1, 0, 1, NULL, 1),
(23, 'Uttkarsh Username', '$2y$10$fDQvYy/W9KwP03qLxkwLZuT8LJgNOBrY6WIyJlpZfRAHnpZSQtoae', 'uttkarshkabde81@gmail.com', 'Uttkarsh', 'Kabde', '7038988442', 1, 1, 1, 0, 1, NULL, 1),
(24, 'qqq', '$2y$10$EGZ8nX67rkp1xsFAYdQEAOHhx7jinux9LssfKOZ37pTzdj.2wXxku', '2019mit002@sggs.ac.in', 'Uttkarsh College', ' ', '7038988442', 1, 1, 1, 0, 1, NULL, 1),
(39, 'hanuman1', '$2y$10$IN2WeRgbq24ZS8bmrvtfV.eO84avSlcr1NjF5vYazOKtZF01c3NL.', 'hanumank2050@gmail.com', 'Hanuman', 'Karhale', '8623950926', 1, 2, 1, 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(15, 18, 3),
(16, 21, 4),
(17, 22, 45),
(18, 23, 3),
(19, 24, 3),
(20, 39, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_groups`
--
ALTER TABLE `chat_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`general_settings_id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`group_messages_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `group_message_sender_id` (`group_message_sender_id`);

--
-- Indexes for table `group_user_mapping`
--
ALTER TABLE `group_user_mapping`
  ADD PRIMARY KEY (`group_user_mapping_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_groups`
--
ALTER TABLE `chat_groups`
  MODIFY `group_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `general_settings_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `group_messages_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `group_user_mapping`
--
ALTER TABLE `group_user_mapping`
  MODIFY `group_user_mapping_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_groups`
--
ALTER TABLE `chat_groups`
  ADD CONSTRAINT `chat_groups_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `chat_groups_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD CONSTRAINT `group_messages_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `chat_groups` (`group_id`),
  ADD CONSTRAINT `group_messages_ibfk_2` FOREIGN KEY (`group_message_sender_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
