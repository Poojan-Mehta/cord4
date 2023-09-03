-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2023 at 11:18 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cord4`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(55) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `accessToken` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_mobile_no` varchar(255) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT '2' COMMENT '1=admin, 2=user, 3=employee',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=inactive, 1=active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `accessToken`, `user_email`, `user_mobile_no`, `user_type`, `created_at`, `updated_at`, `user_status`) VALUES
(1, 'poojan', 'poojan', '100-token', 'poojanmehta008@gmail.com', '8866319747', 2, '2023-09-02 15:38:52', '2023-09-02 15:38:52', 0),
(3, NULL, NULL, NULL, 'poojan@gmail.com', '9974368582', 3, '2023-09-02 16:41:15', '2023-09-02 16:41:15', 0),
(4, NULL, NULL, NULL, 'poojan@cord.com', '8454755585', 2, '2023-09-02 16:56:37', '2023-09-02 16:56:37', 0),
(7, NULL, NULL, NULL, 'john@gmail.com', '4574547845', 2, '2023-09-02 17:20:06', '2023-09-02 17:20:06', 0),
(8, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-02 23:28:04', '2023-09-02 23:28:04', 0),
(9, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-02 23:30:03', '2023-09-02 23:30:03', 0),
(10, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-02 23:32:23', '2023-09-02 23:32:23', 0),
(11, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-02 23:33:06', '2023-09-02 23:33:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(55) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `accessToken` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_mobile_no` varchar(255) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT '2' COMMENT '1=admin, 2=user, 3=employee',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=inactive, 1=active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `accessToken`, `user_email`, `user_mobile_no`, `user_type`, `created_at`, `updated_at`, `user_status`) VALUES
(1, 'admin', 'admin', '', 'admin@cord.com', '1111111111', 1, '2023-09-03 14:24:48', '2023-09-03 14:24:48', 1),
(2, 'john', 'john', '', 'john@test.com', '2222222222', 2, '2023-09-03 14:26:12', '2023-09-03 14:26:12', 1),
(6, 'cord4', 'cord4', '', 'cord4@test.com', '3333333333', 2, '2023-09-03 14:38:00', '2023-09-03 14:38:00', 1),
(7, 'tatva', 'tatva', '', 'tatva@test.com', '6566666667', 3, '2023-09-03 15:33:10', '2023-09-03 15:33:10', 1),
(9, 'team', 'team', '', 'team@test.com', '5555555555', 2, '2023-09-03 16:25:15', '2023-09-03 16:25:15', 1),
(10, 'poojan', 'poojan', '2147483647', 'poojan@gmail.com', '65555555555', 2, '2023-09-03 16:45:40', '2023-09-03 16:45:40', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
