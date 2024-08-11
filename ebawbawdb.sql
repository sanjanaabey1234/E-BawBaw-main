-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2024 at 04:31 PM
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
-- Database: `ebawbawdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abhyadana`
--

DROP TABLE IF EXISTS `abhyadana`;
CREATE TABLE IF NOT EXISTS `abhyadana` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `animal_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `age` int NOT NULL,
  `nic` varchar(20) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abhyadana`
--

INSERT INTO `abhyadana` (`id`, `name`, `client_name`, `animal_type`, `location`, `sex`, `age`, `nic`, `colour`, `amount`, `contact`, `invoice`, `link`, `note`, `created_at`, `updated_at`) VALUES
(1, 'buyer5522', 'sag', 'fdvww', 'matara', 'Male', 20, '1234567', 'bb', '33.00', '0769652149', '5445', 'http://localhost:3003/cruds/new', 'dddc', '2024-07-29 14:55:10', '2024-07-29 16:46:15'),
(2, 'Sanjana Abeysirigunawardana', 'sag', 'fdvww', 'matara', 'Male', 20, '1234567', 'bb', '33.00', '0769652149', '5445', 'http://localhost:3003/cruds/new', 'bgv ', '2024-07-29 14:55:52', '2024-07-29 14:55:52'),
(3, 'sag1', 'sag', 'fdvww', 'matara', 'Male', 20, '1234567', 'bb', '33.00', '0769652149', '5445', 'http://localhost:3003/cruds/new', 'ghtm', '2024-07-29 14:57:58', '2024-07-29 14:57:58'),
(4, 'Sanjana Abeysirigunawardana', 'sag', 'fdvww', 'matara', 'Male', 20, '1234567', 'bb', '33.00', '0769652149', '5445', 'http://localhost:3003/cruds/new', 'bgv ', '2024-07-29 14:58:23', '2024-07-29 14:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `animalType` enum('Dog','Cat','Pig','Cow','Rabbit') NOT NULL,
  `location` varchar(255) NOT NULL,
  `client_location` varchar(255) NOT NULL,
  `animalSex` enum('Male','Female') NOT NULL,
  `age` int NOT NULL,
  `clientNIC` varchar(20) NOT NULL,
  `link` text,
  `client_contact` varchar(20) NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `client_name`, `animalType`, `location`, `client_location`, `animalSex`, `age`, `clientNIC`, `link`, `client_contact`, `note`, `created_at`, `updated_at`) VALUES
(3, 'scd', 'sag111', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'ddd', '2024-07-31 08:15:04', '2024-07-31 08:15:04'),
(2, 'cat', 'sag', 'Cat', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'hello', '2024-07-23 20:45:59', '2024-07-23 22:12:25'),
(4, 'scd', 'sag111', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'ddd', '2024-07-31 08:15:06', '2024-07-31 08:15:06'),
(5, 'sandy', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'dgvcx', '2024-07-31 10:12:20', '2024-07-31 10:12:20'),
(6, 'kitty', 'sag', 'Cat', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'dffc', '2024-07-31 10:13:03', '2024-07-31 10:13:03'),
(7, 'ggdd', 'fbc', 'Dog', 'dfgfg', 'dfd', 'Male', 20, '1111', 'gg', '77777', 'gfxg', '2024-07-31 10:37:28', '2024-07-31 10:37:28'),
(8, 'trt', 'ttt', 'Dog', 'ttt', 'ttt', 'Male', 33, '11111', 'dd', '77777', 'dd', '2024-07-31 10:48:51', '2024-07-31 10:48:51'),
(12, 'www', 'www', 'Dog', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 12:09:15', '2024-07-31 12:09:15'),
(13, 'dvc', 'cc', 'Dog', 'ccc', 'ccc', 'Male', 22, '1111', 'ccc', '77777', 'ccc', '2024-07-31 12:12:16', '2024-07-31 12:12:16'),
(14, 'www', 'www', 'Dog', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 14:07:51', '2024-07-31 14:07:51'),
(15, 'www', 'www', 'Cat', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 14:13:06', '2024-07-31 14:13:06'),
(16, 'ggg', 'ggg', 'Pig', 'ggg', 'ggg', 'Male', 22, '333', 'ggg', '77777', 'ggg', '2024-07-31 14:50:36', '2024-07-31 14:50:36'),
(21, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'hjh', '2024-08-02 09:44:14', '2024-08-02 09:44:14'),
(22, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'fgcfvcx', '2024-08-02 09:57:17', '2024-08-02 09:57:17'),
(23, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'bgxvc', '2024-08-02 09:57:55', '2024-08-02 09:57:55'),
(24, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'fgnvcbc', '2024-08-02 10:05:40', '2024-08-02 10:05:40');

--
-- Triggers `animals`
--
DROP TRIGGER IF EXISTS `after_insert_animals`;
DELIMITER $$
CREATE TRIGGER `after_insert_animals` AFTER INSERT ON `animals` FOR EACH ROW BEGIN
  DECLARE foster_parent_id INT;
  SET foster_parent_id = (SELECT id FROM foster_parents WHERE foster_parent = NEW.client_name AND nic = NEW.clientNIC LIMIT 1);
  
  IF foster_parent_id IS NOT NULL THEN
    INSERT INTO combined_animals_foster_parents (
      animal_id, name, client_name, animalType, location, client_location, animalSex, age, clientNIC, link, client_contact, note, created_at, updated_at, foster_parent_id, foster_parent, email, contact, address, nic, description, foster_parent_created_at
    )
    SELECT
      NEW.id, NEW.name, NEW.client_name, NEW.animalType, NEW.location, NEW.client_location, NEW.animalSex, NEW.age, NEW.clientNIC, NEW.link, NEW.client_contact, NEW.note, NEW.created_at, NEW.updated_at,
      fp.id, fp.foster_parent, fp.email, fp.contact, fp.address, fp.nic, fp.description, fp.created_at
    FROM foster_parents fp
    WHERE fp.foster_parent = NEW.client_name AND fp.nic = NEW.clientNIC;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `combined_animals_foster_parents`
--

DROP TABLE IF EXISTS `combined_animals_foster_parents`;
CREATE TABLE IF NOT EXISTS `combined_animals_foster_parents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `animalType` enum('Dog','Cat','Pig','Cow','Rabbit') NOT NULL,
  `location` varchar(255) NOT NULL,
  `client_location` varchar(255) NOT NULL,
  `animalSex` enum('Male','Female') NOT NULL,
  `age` int NOT NULL,
  `clientNIC` varchar(20) NOT NULL,
  `link` text,
  `client_contact` varchar(20) NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foster_parent_id` int NOT NULL,
  `foster_parent` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `description` text,
  `foster_parent_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  KEY `foster_parent_id` (`foster_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `combined_animals_foster_parents`
--

INSERT INTO `combined_animals_foster_parents` (`id`, `animal_id`, `name`, `client_name`, `animalType`, `location`, `client_location`, `animalSex`, `age`, `clientNIC`, `link`, `client_contact`, `note`, `created_at`, `updated_at`, `foster_parent_id`, `foster_parent`, `email`, `contact`, `address`, `nic`, `description`, `foster_parent_created_at`) VALUES
(1, 12, 'www', 'www', 'Dog', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 12:09:15', '2024-07-31 12:09:15', 8, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 12:09:51'),
(3, 14, 'www', 'www', 'Dog', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 14:07:51', '2024-07-31 14:07:51', 8, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 12:09:51'),
(12, 18, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'efdfdx', '2024-08-02 09:27:22', '2024-08-02 09:27:22', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(5, 15, 'www', 'www', 'Cat', 'www', 'www', 'Male', 22, '333', 'www', '77777', 'www', '2024-07-31 14:13:06', '2024-07-31 14:13:06', 8, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 12:09:51'),
(11, 17, 'kitty', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'www', '2024-08-02 09:24:24', '2024-08-02 09:24:24', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(10, 16, 'ggg', 'ggg', 'Pig', 'ggg', 'ggg', 'Male', 22, '333', 'ggg', '77777', 'ggg', '2024-07-31 14:50:36', '2024-07-31 14:50:36', 12, 'ggg', 'ggg', '11111', 'ggg', '333', 'ggg', '2024-07-31 14:50:56'),
(13, 19, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'tjtfggvn', '2024-08-02 09:31:58', '2024-08-02 09:31:58', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(14, 20, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'xvxvcxv', '2024-08-02 09:37:59', '2024-08-02 09:37:59', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(15, 21, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'hjh', '2024-08-02 09:44:14', '2024-08-02 09:44:14', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(16, 22, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'fgcfvcx', '2024-08-02 09:57:17', '2024-08-02 09:57:17', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(17, 23, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'bgxvc', '2024-08-02 09:57:55', '2024-08-02 09:57:55', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(18, 24, 'buyer55', 'sag', 'Dog', 'matara', 'matara', 'Male', 20, '2002', 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html', '0769652149', 'fgnvcbc', '2024-08-02 10:05:40', '2024-08-02 10:05:40', 3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nicnum` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `donation_type` varchar(100) NOT NULL,
  `donation_value` decimal(10,2) NOT NULL,
  `notes` text,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `nicnum`, `contact`, `email`, `donation_type`, `donation_value`, `notes`, `reg_date`) VALUES
(1, 'sanjana abeysirigunawardana', '200210801839', '0769652149', 'sanjanaabeysiri1234567@gmail.com', 'money', '10000.00', 'hello', '2024-07-24 16:38:22'),
(2, 'sanjana abeysirigunawardana', '23454466', '0769652149', 'sanjanaabeysiri1@gmail.com', 'money', '10000.00', 'thyh', '2024-07-29 08:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `follow_up_details`
--

DROP TABLE IF EXISTS `follow_up_details`;
CREATE TABLE IF NOT EXISTS `follow_up_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int DEFAULT NULL,
  `follow_up_details` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `follow_up_details`
--

INSERT INTO `follow_up_details` (`id`, `animal_id`, `follow_up_details`, `created_at`) VALUES
(1, 2, 'how', '2024-07-31 07:40:28'),
(2, 2, 'hello', '2024-07-31 07:57:34'),
(3, 2, 'rte123', '2024-07-31 08:00:08'),
(4, 2, 'wwwww', '2024-07-31 08:12:42'),
(5, 12, 'hello', '2024-08-01 15:16:49'),
(6, 16, '35rf', '2024-08-02 06:52:58'),
(7, 16, '35rf', '2024-08-02 07:00:28'),
(8, 16, '35rf', '2024-08-02 07:04:39'),
(9, 16, 'rte123', '2024-08-02 08:04:13'),
(10, 16, 'rte123', '2024-08-02 08:04:58'),
(11, 16, 'how 22442323', '2024-08-02 08:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `foster_follow_up`
--

DROP TABLE IF EXISTS `foster_follow_up`;
CREATE TABLE IF NOT EXISTS `foster_follow_up` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foster_parent_id` int NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `foster_parent_id` (`foster_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foster_follow_up`
--

INSERT INTO `foster_follow_up` (`id`, `foster_parent_id`, `details`, `created_at`) VALUES
(1, 12, 'hello', '2024-07-31 15:24:41'),
(2, 4, 'ggh', '2024-07-31 15:25:39'),
(3, 12, 'rte123', '2024-08-02 09:03:40'),
(4, 12, 'how', '2024-08-02 15:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `foster_parents`
--

DROP TABLE IF EXISTS `foster_parents`;
CREATE TABLE IF NOT EXISTS `foster_parents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foster_parent` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foster_parents`
--

INSERT INTO `foster_parents` (`id`, `foster_parent`, `email`, `contact`, `address`, `nic`, `description`, `created_at`) VALUES
(1, 'skdj', 'testuser@gmail.com', '0769652149', '1a, matara', '132456744555555', 'sdfgbn', '2024-07-29 10:17:48'),
(3, 'sag', 'sanjanaabeysirigunawardana111@gmail.com', '0769652149', '199A', '2002', 'hello', '2024-07-31 10:21:10'),
(4, 'fbc', 'bcb', '1111', 'vbc', '1111', 'gfg', '2024-07-31 10:36:16'),
(5, 'ttt', 'ttt', '11111', 'ttt', '11111', 'cfc', '2024-07-31 10:49:29'),
(8, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 12:09:51'),
(9, 'dfdfc', 'ccc', '11111', 'bbvf', '564786', 'bfgb', '2024-07-31 12:12:41'),
(10, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 14:07:22'),
(11, 'www', 'www', '11111', 'www', '333', 'www', '2024-07-31 14:13:20'),
(12, 'ggg', 'ggg', '11111', 'ggg', '333', 'ggg', '2024-07-31 14:50:56');

--
-- Triggers `foster_parents`
--
DROP TRIGGER IF EXISTS `after_insert_foster_parents`;
DELIMITER $$
CREATE TRIGGER `after_insert_foster_parents` AFTER INSERT ON `foster_parents` FOR EACH ROW BEGIN
  DECLARE animal_id INT;
  SET animal_id = (SELECT id FROM animals WHERE client_name = NEW.foster_parent AND clientNIC = NEW.nic LIMIT 1);
  
  IF animal_id IS NOT NULL THEN
    INSERT INTO combined_animals_foster_parents (
      animal_id, name, client_name, animalType, location, client_location, animalSex, age, clientNIC, link, client_contact, note, created_at, updated_at, foster_parent_id, foster_parent, email, contact, address, nic, description, foster_parent_created_at
    )
    SELECT
      a.id, a.name, a.client_name, a.animalType, a.location, a.client_location, a.animalSex, a.age, a.clientNIC, a.link, a.client_contact, a.note, a.created_at, a.updated_at,
      NEW.id, NEW.foster_parent, NEW.email, NEW.contact, NEW.address, NEW.nic, NEW.description, NEW.created_at
    FROM animals a
    WHERE a.client_name = NEW.foster_parent AND a.clientNIC = NEW.nic;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history_details`
--

DROP TABLE IF EXISTS `history_details`;
CREATE TABLE IF NOT EXISTS `history_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `history_details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `history_details`
--

INSERT INTO `history_details` (`id`, `animal_id`, `history_details`, `created_at`) VALUES
(1, 16, 'hello', '2024-08-02 08:00:01'),
(2, 16, 'how are u', '2024-08-02 08:02:07'),
(3, 16, 'sder', '2024-08-02 08:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `medical_details`
--

DROP TABLE IF EXISTS `medical_details`;
CREATE TABLE IF NOT EXISTS `medical_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int DEFAULT NULL,
  `details` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medical_details`
--

INSERT INTO `medical_details` (`id`, `animal_id`, `details`, `created_at`) VALUES
(1, 2, 'erft1111', '2024-07-31 07:40:37'),
(2, 2, 'erft1111', '2024-07-31 07:45:46'),
(3, 2, 'erft1111', '2024-07-31 07:50:27'),
(4, 2, 'hello12345', '2024-07-31 07:57:47'),
(5, 2, 'hello12345', '2024-07-31 08:00:02'),
(6, 2, 'swe111222', '2024-07-31 08:00:20'),
(7, 2, 'swe111222', '2024-07-31 08:02:22'),
(8, 2, 'swe111222', '2024-07-31 08:08:28'),
(9, 2, 'swe111222', '2024-07-31 08:12:16'),
(10, 2, 'trg222', '2024-07-31 08:12:57'),
(11, 12, 'erft1111', '2024-08-01 15:17:04'),
(12, 16, 'hello12345', '2024-08-02 06:52:51'),
(13, 16, 'hello12345', '2024-08-02 07:53:04'),
(14, 16, 'hello12345', '2024-08-02 07:54:31'),
(15, 16, 'swe111', '2024-08-02 08:04:06'),
(16, 16, 'drt222', '2024-08-02 08:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `sterilization`
--

DROP TABLE IF EXISTS `sterilization`;
CREATE TABLE IF NOT EXISTS `sterilization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `animal_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `age` int NOT NULL,
  `nic` varchar(50) NOT NULL,
  `kids` int DEFAULT NULL,
  `count` int DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `form` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sterilization`
--

INSERT INTO `sterilization` (`id`, `name`, `client_name`, `animal_type`, `location`, `sex`, `age`, `nic`, `kids`, `count`, `contact`, `form`, `date_created`) VALUES
(1, 'buyer5512tt', 'sag', 'fdvww', 'matara', 'Male', 20, '1324567444444444', 2, 2, '0769652149', '2', '2024-07-29 13:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

DROP TABLE IF EXISTS `transports`;
CREATE TABLE IF NOT EXISTS `transports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `driver` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `animal_details` text NOT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `driver`, `client`, `vehicle`, `vehicle_type`, `from`, `to`, `contact`, `mileage`, `animal_details`, `notes`, `created_at`) VALUES
(1, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', '0', 'ddfv', 'ddcc', '2024-07-28 15:11:03'),
(2, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', '0', 'ddfv', 'ewrf', '2024-07-28 15:15:38'),
(3, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', '34', 'ddfv', '', '2024-07-28 15:20:18'),
(4, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', '0', 'ddfv', 'df', '2024-07-28 15:21:33'),
(5, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', '0', 'ddfv', '', '2024-07-28 15:24:46'),
(6, 'driver1', 'client1', '202019', 'Van', 'colombo', 'matara', '0769652149', 'gghbn', 'ddfv', 'dfghv', '2024-07-28 15:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `type` enum('Admin','Manager','Vet','Transport','Edit') NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_password`, `user_email`, `type`, `date_created`) VALUES
(1, 'testuser4', '1234567', 'testuser@gmail.com', 'Manager', '2024-07-23 20:19:50'),
(3, 'testuser5', '11111111', '', 'Admin', '2024-07-29 09:10:23'),
(4, 'testuser7', '11111111', 'buyer55@gmail.com', 'Admin', '2024-07-29 09:10:46'),
(5, 'testuser11', '111111111', 'sag1@gmail.com', 'Admin', '2024-07-29 09:11:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
