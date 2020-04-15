-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2018 at 03:22 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6da82f983b09b7b68ee177466e986dd5', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 1529716290, 'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:10:\"superadmin\";s:7:\"user_id\";s:1:\"7\";s:7:\"role_id\";s:1:\"1\";s:5:\"email\";s:21:\"rshrestha92@gmail.com\";s:4:\"name\";s:16:\"Rojeena Shrestha\";}'),
('a8c85d635e22c315a709ec4eedc8ea99', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 1529716929, 'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"staff\";s:7:\"user_id\";s:1:\"2\";s:7:\"role_id\";s:1:\"2\";s:5:\"email\";s:15:\"staff@staff.com\";s:4:\"name\";s:5:\"Staff\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `status`, `slug`) VALUES
(8, 'Login', 'Active', 'login'),
(9, 'Address', 'Active', 'address');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `answer` text,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_by` int(11) DEFAULT NULL,
  `created_on` int(15) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `question`, `category_id`, `answer`, `status`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(51, 'How do I login in to my VU system?', '8', '<p>In order to login, you need a student ID and a password. If you are a new student or lost your password, please contact the VU administration at 0442023402</p>\n', 'Active', NULL, NULL, 7, 1529656827),
(52, 'What is the address of the Victoria University?', '9', 'The location is 160 Sussex St, Sydney NSW 2000.', 'Active', 7, 1529656942, 7, 1529657000),
(53, 'Which Unit to study?', NULL, NULL, 'Active', NULL, NULL, NULL, NULL),
(54, 'Which is the nearest address to the college location', '9', '<p>Darling harbour</p>\n', 'Active', 7, 1529660636, 7, 1529660636),
(55, 'Where to login', '8', '<p>to the VU website</p>\n', 'Active', 7, 1529661048, 7, 1529661048);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `public_module` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`id`, `name`, `slug`, `priority`, `parent_id`, `updated_by`, `updated_time`, `public_module`) VALUES
(5, 'Categories', 'category', 0, 0, NULL, NULL, 'Yes'),
(9, 'Settings', 'settings', 0, 0, NULL, NULL, 'Yes'),
(20, 'Users', 'user', 0, 0, NULL, NULL, 'No'),
(64, 'FAQ', 'faq', 0, 0, NULL, NULL, 'Yes'),
(94, 'Role Manager', 'role', 0, 9, NULL, NULL, 'Yes'),
(97, 'Unanswered Question', 'unanswered', 0, 0, NULL, NULL, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`, `updated_by`, `updated_on`) VALUES
(1, 'Super Administrator', 'Super Administrator', NULL, NULL),
(2, 'Staff', '<p>Staff</p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_module`
--

CREATE TABLE `tbl_role_module` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `permission` varchar(4) COLLATE utf8_unicode_ci DEFAULT '1111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_module`
--

INSERT INTO `tbl_role_module` (`id`, `module_id`, `role_id`, `permission`) VALUES
(31, 5, 2, '1110'),
(32, 64, 2, '1110'),
(33, 97, 2, '1011');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) NOT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `token_generated_at` datetime DEFAULT NULL,
  `user_type` enum('Backend','Frontend') COLLATE utf8_unicode_ci DEFAULT 'Backend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `username`, `password`, `role_id`, `status`, `updated_by`, `updated_time`, `token_generated_at`, `user_type`) VALUES
(2, 'Staff', 'staff@staff.com', 'staff', 'staff', 2, 'Active', NULL, NULL, NULL, 'Backend'),
(7, 'Rojeena Shrestha', 'rshrestha92@gmail.com', 'superadmin', 'superadmin', 1, 'Active', NULL, NULL, NULL, 'Backend');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Module` (`updated_by`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role_module`
--
ALTER TABLE `tbl_role_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role_module`
--
ALTER TABLE `tbl_role_module`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD CONSTRAINT `User Module` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
