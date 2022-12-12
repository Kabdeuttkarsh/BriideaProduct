-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `briideaxyz`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_groups`
--

INSERT INTO `chat_groups` (`group_id`, `company_id`, `created_by`, `chat_group_name`, `group_description`, `is_active`, `is_deleted`, `created_on`, `updated_on`) VALUES
(1, 1, 1, 'All Branch Managers', 'y', 1, 0, '2022-12-09 17:11:37', '2022-12-09 17:11:37'),
(2, 3, 57, 'All Branch Managers', 'gf', 1, 0, '2022-12-09 17:56:39', '2022-12-09 17:56:39');

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
  `company_phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `company_phone`, `country`, `message`, `currency`, `company_logo`, `is_active`, `is_deleted`, `is_verified`) VALUES
(1, 'Adarsha Nagri Sahakari Patasanstha Ltd Alibaug', '0', '0', 'Alibaugh', '9607999931', 'India', 'Bank', 'INR', '', 1, 0, 1),
(3, 'Adarsha Shreebag', '0', '0', 'Shreebag', '9607999922', 'India', 'Bank', 'INR', NULL, 1, 0, 1),
(4, 'Adarsha Pimpalbhat', '0', '0', 'Pimpalbhat', '9607999923', 'India', 'Bank', 'INR', NULL, 1, 0, 1),
(5, 'Adarsha Chendre', '0', '0', 'Chendre', '9607999924', '', '', '', NULL, 1, 0, 1),
(6, 'Adarsha Kurul', '', '', 'Kurul', '9607999925', '', '', '', NULL, 1, 0, 1),
(7, 'Adarsha Revdanda', '', '', 'Revdanda', '9607999926', '', '', '', NULL, 1, 0, 1),
(8, 'Adarsha Nagaov', '', '', '', '9607999927', '', '', '', NULL, 1, 0, 1),
(9, 'Adarsha Poynad', '', '', 'Poynad', '9607999928', '', '', '', NULL, 1, 0, 1),
(10, 'Adarsha Chondhi', '', '', 'Chondhi', '9607999929', '', '', '', NULL, 1, 0, 1),
(11, 'Adarsha Bamangaov', '', '', 'Bamangaov', '8600828720', '', '', '', NULL, 1, 0, 1),
(12, 'Adarsha Murud-Janira', '', '', 'Murud-Janira', '8600075669', '', '', '', NULL, 1, 0, 1),
(13, 'Adarsha Revas', '', '', 'Revas', '9028603097', '', '', '', NULL, 1, 0, 1),
(14, 'Adarsha Nagothane', '', '', 'Nagothane', '9096960778', '', '', '', NULL, 1, 0, 1),
(15, 'Adarsha Ramraj', '', '', 'Ramraj', '8484920306', '', '', '', NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_temp_table`
--

CREATE TABLE `delivery_temp_table` (
  `temp_table_id` int(11) NOT NULL,
  `group_message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_temp_table`
--

INSERT INTO `delivery_temp_table` (`temp_table_id`, `group_message_id`, `user_id`, `group_id`, `time`) VALUES
(6, 6, 57, 1, '2022-12-10 21:52:45.000000'),
(7, 7, 57, 1, '2022-12-10 21:52:45.000000');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `permission`, `is_active`, `is_deleted`) VALUES
(1, 'Super Administrator', 'a:17:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:17:\"createDesignation\";i:5;s:17:\"updateDesignation\";i:6;s:15:\"viewDesignation\";i:7;s:17:\"deleteDesignation\";i:8;s:13:\"createCompany\";i:9;s:13:\"updateCompany\";i:10;s:11:\"viewCompany\";i:11;s:13:\"deleteCompany\";i:12;s:11:\"createGroup\";i:13;s:11:\"updateGroup\";i:14;s:9:\"viewGroup\";i:15;s:11:\"deleteGroup\";i:16;s:10:\"viewReport\";}', 1, 0),
(2, 'Branch Manager', 'a:7:{i:0;s:8:\"viewUser\";i:1;s:15:\"viewDesignation\";i:2;s:11:\"viewCompany\";i:3;s:11:\"createGroup\";i:4;s:11:\"updateGroup\";i:5;s:9:\"viewGroup\";i:6;s:11:\"deleteGroup\";}', 1, 0),
(3, 'Branch Staff', 'a:1:{i:0;s:8:\"viewUser\";}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `general_settings_id` int(11) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `group_messages_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `group_message_sender_id` int(10) NOT NULL,
  `group_message` text DEFAULT NULL,
  `group_message_file` varchar(500) DEFAULT NULL,
  `group_message_extension` varchar(50) DEFAULT NULL,
  `group_message_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_sent` tinyint(1) NOT NULL,
  `delivered_to` longtext DEFAULT NULL,
  `seen_by` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `updating` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`group_messages_id`, `group_id`, `group_message_sender_id`, `group_message`, `group_message_file`, `group_message_extension`, `group_message_time`, `is_sent`, `delivered_to`, `seen_by`, `is_active`, `is_deleted`, `updating`) VALUES
(1, 1, 1, NULL, '1670686747Screenshot_(8).png', 'png', '2022-12-10 21:09:07', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07.000000\",\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(2, 1, 1, NULL, '1670686747Screenshot_(7).png', 'png', '2022-12-10 21:09:07', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07.000000\",\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(3, 1, 1, NULL, '1670686747Screenshot_(2).png', 'png', '2022-12-10 21:09:07', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07.000000\",\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(4, 1, 1, 'sd', NULL, NULL, '2022-12-10 21:09:07', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:09:07.000000\",\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:09:07\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(5, 1, 1, NULL, '1670689365Screenshot_(3).png', 'png', '2022-12-10 21:52:45', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:52:45.000000\",\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(6, 1, 1, NULL, '1670689365Screenshot_(7).png', 'png', '2022-12-10 21:52:45', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_delivered\":0,\"delivery_time\":null,\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0),
(7, 1, 1, 'sasasas', NULL, NULL, '2022-12-10 21:52:45', 1, '[{\"is_delivered\":1,\"delivery_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_delivered\":0,\"delivery_time\":null,\"user_id\":\"57\"}]', '[{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:52:45\",\"user_id\":\"1\"},{\"is_seen\":1,\"seen_time\":\"2022-12-10 21:53:05\",\"user_id\":\"57\"}]', 1, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_user_mapping`
--

INSERT INTO `group_user_mapping` (`group_user_mapping_id`, `group_id`, `user_id`, `company_id`, `added_by`, `added_date`, `is_deleted`, `is_active`, `updated_on`) VALUES
(1, 1, 57, 1, 1, '2022-12-09 17:11:37', 0, 1, '2022-12-09 17:11:37'),
(2, 1, 1, 1, 1, '2022-12-09 17:11:37', 0, 1, '2022-12-09 17:11:37'),
(3, 2, 1, 3, 57, '2022-12-09 17:56:39', 0, 1, '2022-12-09 17:56:39'),
(4, 2, 58, 3, 57, '2022-12-09 17:56:39', 0, 1, '2022-12-09 17:56:39'),
(5, 2, 57, 3, 57, '2022-12-09 17:56:39', 0, 1, '2022-12-09 17:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_message_id` int(11) NOT NULL,
  `receiver_message_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `message_file` varchar(500) DEFAULT NULL,
  `message_file_extension` varchar(20) DEFAULT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `seen_time` datetime DEFAULT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_time` datetime DEFAULT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_message_id`, `receiver_message_id`, `message`, `message_file`, `message_file_extension`, `message_time`, `is_deleted`, `is_seen`, `seen_time`, `is_delivered`, `delivery_time`, `is_sent`) VALUES
(1, 1, 57, NULL, '1670680202Screenshot_(5).png', 'png', '2022-12-10 19:20:02', 0, 0, NULL, 0, NULL, 1),
(2, 1, 57, NULL, '1670680202Screenshot_(4).png', 'png', '2022-12-10 19:20:03', 0, 0, NULL, 0, NULL, 1),
(3, 1, 57, NULL, '1670680203Screenshot_(3).png', 'png', '2022-12-10 19:20:03', 0, 0, NULL, 0, NULL, 1),
(4, 1, 57, 'Hello There', NULL, NULL, '2022-12-10 19:20:14', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:20:14', 1),
(5, 1, 57, NULL, '1670680430Screenshot_(6).png', 'png', '2022-12-10 19:23:50', 0, 0, NULL, 0, NULL, 1),
(6, 1, 57, 'hghj', NULL, NULL, '2022-12-10 19:23:54', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:23:54', 1),
(7, 1, 57, NULL, '1670681008Screenshot_(2).png', 'png', '2022-12-10 19:33:28', 0, 0, NULL, 0, NULL, 1),
(8, 1, 57, NULL, '1670681008Screenshot_(3).png', 'png', '2022-12-10 19:33:28', 0, 0, NULL, 0, NULL, 1),
(9, 1, 57, NULL, '1670681008Screenshot_(4).png', 'png', '2022-12-10 19:33:28', 0, 0, NULL, 0, NULL, 1),
(10, 1, 57, 'aA', NULL, NULL, '2022-12-10 19:33:31', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:33:31', 1),
(11, 1, 57, NULL, '1670681180Screenshot_(8).png', 'png', '2022-12-10 19:36:20', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:36:22', 1),
(12, 1, 57, NULL, '1670681180Screenshot_(7).png', 'png', '2022-12-10 19:36:20', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:36:25', 1),
(13, 1, 57, 'sasa', NULL, NULL, '2022-12-10 19:36:26', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:36:26', 1),
(14, 1, 57, NULL, '1670681249Screenshot_(6).png', 'png', '2022-12-10 19:37:29', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:37:29', 1),
(15, 1, 57, NULL, '1670681249Screenshot_(7).png', 'png', '2022-12-10 19:37:29', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:37:31', 1),
(16, 1, 57, NULL, '1670681249Screenshot_(8).png', 'png', '2022-12-10 19:37:29', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:37:34', 1),
(17, 1, 57, 'Hello I am Uttkarsh', NULL, NULL, '2022-12-10 19:37:36', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 19:37:36', 1),
(18, 1, 57, NULL, '1670685427Screenshot_(19).png', 'png', '2022-12-10 20:47:07', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 20:47:07', 1),
(19, 1, 57, 'Hello There', NULL, NULL, '2022-12-10 20:47:07', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 20:47:07', 1),
(20, 1, 57, NULL, '1670685457Screenshot_(2).png', 'png', '2022-12-10 20:47:37', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 20:47:38', 1),
(21, 1, 57, 'hghj', NULL, NULL, '2022-12-10 20:47:38', 0, 1, '2022-12-10 21:53:11', 1, '2022-12-10 20:47:38', 1),
(22, 1, 57, NULL, '1670690341Screenshot_(1).png', 'png', '2022-12-10 22:09:01', 0, 0, NULL, 1, '2022-12-10 22:09:02', 1),
(23, 1, 57, NULL, '1670690341Screenshot_(4).png', 'png', '2022-12-10 22:09:01', 0, 0, NULL, 1, '2022-12-10 22:09:02', 1),
(24, 1, 57, NULL, '1670690341Screenshot_(3).png', 'png', '2022-12-10 22:09:01', 0, 0, NULL, 1, '2022-12-10 22:09:02', 1),
(25, 1, 57, NULL, '1670690342Screenshot_(2).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:02', 1),
(26, 1, 57, NULL, '1670690342Screenshot_(5).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(27, 1, 57, NULL, '1670690342Screenshot_(6).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(28, 1, 57, NULL, '1670690342Screenshot_(7).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(29, 1, 57, NULL, '1670690342Screenshot_(8).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(30, 1, 57, NULL, '1670690342Screenshot_(9).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(31, 1, 57, NULL, '1670690342Screenshot_(10).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:03', 1),
(32, 1, 57, NULL, '1670690342Screenshot_(11).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(33, 1, 57, NULL, '1670690342Screenshot_(12).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(34, 1, 57, NULL, '1670690342Screenshot_(13).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(35, 1, 57, NULL, '1670690342Screenshot_(14).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(36, 1, 57, NULL, '1670690342Screenshot_(15).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(37, 1, 57, NULL, '1670690342Screenshot_(16).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(38, 1, 57, NULL, '1670690342Screenshot_(17).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(39, 1, 57, NULL, '1670690342Screenshot_(18).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(40, 1, 57, NULL, '1670690342Screenshot_(19).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:04', 1),
(41, 1, 57, NULL, '1670690342Screenshot_(20).png', 'png', '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:05', 1),
(42, 1, 57, 'sfsf', NULL, NULL, '2022-12-10 22:09:02', 0, 0, NULL, 1, '2022-12-10 22:09:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seen_temp_table`
--

CREATE TABLE `seen_temp_table` (
  `seen_temp_table_id` int(11) NOT NULL,
  `seen_group_message_id` int(11) NOT NULL,
  `seen_user_id` int(11) NOT NULL,
  `seen_group_id` int(11) NOT NULL,
  `seen_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `last_online_at` datetime DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`last_online_at`, `id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`, `company_id`, `is_active`, `is_deleted`, `is_verified`, `otp`, `is_online`) VALUES
('2022-12-10 22:09:05', 1, 'Super Admin', '$2y$10$pNQrUZcGvsNNJtEY1YcgFuTkOpCzKSs2spKUg8WHuCXfUicM0d8/6', 'superadmin@adarsh.com', 'Super', ' Admin', '7038988442', 1, 1, 1, 0, 1, NULL, 1),
('2022-12-10 22:09:05', 57, 'UttkarshKabde1', '$2y$10$0W84/uOiypK2OYAgkw0ZQOSPrcn8MNXHO0gTzBsfoSSVv2dKBZucO', 'uttkarshkabde81@gmail.com', 'Uttkarsh', 'Kabde', '7038988443', 1, 3, 1, 0, 1, NULL, 1),
('2022-12-09 21:47:13', 58, 'das', '$2y$10$Jab7Yp1LAzAD9WnrMOYETO.drd/bDcmkSeFAwIYdFQxgu.T8GImNi', '', 'XYZ', 'XYZ', '7038988444', 1, 3, 1, 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 2),
(33, 57, 2),
(34, 58, 3);

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
-- Indexes for table `delivery_temp_table`
--
ALTER TABLE `delivery_temp_table`
  ADD PRIMARY KEY (`temp_table_id`);

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
  ADD PRIMARY KEY (`group_user_mapping_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `seen_temp_table`
--
ALTER TABLE `seen_temp_table`
  ADD PRIMARY KEY (`seen_temp_table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_groups`
--
ALTER TABLE `chat_groups`
  MODIFY `group_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `delivery_temp_table`
--
ALTER TABLE `delivery_temp_table`
  MODIFY `temp_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `general_settings_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `group_messages_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_user_mapping`
--
ALTER TABLE `group_user_mapping`
  MODIFY `group_user_mapping_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `seen_temp_table`
--
ALTER TABLE `seen_temp_table`
  MODIFY `seen_temp_table_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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

--
-- Constraints for table `group_user_mapping`
--
ALTER TABLE `group_user_mapping`
  ADD CONSTRAINT `group_user_mapping_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `chat_groups` (`group_id`),
  ADD CONSTRAINT `group_user_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `designations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
