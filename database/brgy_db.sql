-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 12:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'Susan', 'Cruz', '2009-10-03', 'Pampanga', 3, 0, 0),
(3, 'asd', 'imgsrconerroralert1', '2024-01-11', 'asd', 13, 0, 0),
(4, 'as', 'as', '2024-04-19', 'as', 21, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `description` varchar(2555) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `is_active`, `is_deleted`, `description`, `title`, `date`, `time`) VALUES
(1, 0, 0, 'asd', 'asd', '2024-05-07', '03:49:05'),
(2, 0, 0, 'dasdwad', 'awdaw', '2024-05-07', '03:49:09'),
(3, 0, 0, 'awdawd', 'asdawd', '2024-05-07', '03:49:13'),
(4, 0, 0, 'cdawdcawd', 'asd wadaw', '2024-05-07', '03:49:17'),
(5, 0, 0, '4', '4', '2024-05-07', '04:08:31'),
(6, 0, 0, '5', '5', '2024-05-07', '04:08:34'),
(7, 0, 0, '5', '5', '2024-05-07', '04:08:34'),
(8, 0, 0, '8', '8', '2024-05-07', '04:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `first_name_child` varchar(255) NOT NULL,
  `last_name_child` varchar(255) NOT NULL,
  `middle_name_child` varchar(255) NOT NULL,
  `suffix_child` varchar(10) NOT NULL,
  `gender_child` enum('Male','Female') NOT NULL,
  `birthdate_child` date NOT NULL,
  `birth_weight_child` decimal(5,2) NOT NULL,
  `birth_height_child` decimal(5,2) NOT NULL,
  `place_of_birth_child` text NOT NULL,
  `children_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `first_name_child`, `last_name_child`, `middle_name_child`, `suffix_child`, `gender_child`, `birthdate_child`, `birth_weight_child`, `birth_height_child`, `place_of_birth_child`, `children_id`) VALUES
(1, 'James', 'Obrial', 'Uba', 'None', 'Male', '2002-10-21', 50.00, 165.00, 'CDO', 0),
(2, 'test1', 'test1', 'test1', 'None', 'Male', '2019-12-22', 40.00, 134.00, 'CDO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `subjective` varchar(255) DEFAULT NULL,
  `objective` varchar(50) NOT NULL,
  `assessment` varchar(50) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `not_approved` int(11) NOT NULL DEFAULT 0,
  `nurse_id` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) DEFAULT 'Consultations',
  `checkup_date` date DEFAULT NULL,
  `is_print` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `steps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `patient_id`, `subjective`, `objective`, `assessment`, `plan`, `diagnosis`, `medicine`, `doctor_id`, `is_active`, `not_approved`, `nurse_id`, `category`, `checkup_date`, `is_print`, `is_deleted`, `status`, `steps`) VALUES
(1, 1, 'test', 'test', 'test', 'test', NULL, NULL, 1, 0, 0, 0, 'Consultations', '2005-09-24', 0, 0, 'Pending', ''),
(2, 1, '1', '1', '1', '1', 'asd', 'asd', 1, 0, 0, 0, 'Consultations', '2005-09-24', 0, 0, 'Pending', 'Step 4 Prescription'),
(3, 2, 'qwe', 'qwe', 'qwe', 'qwe', NULL, NULL, 1, 0, 0, 0, 'Consultations', '2024-05-09', 0, 0, 'Pending', 'Consultation'),
(4, 2, 'qwe', 'qwe', 'qwe', 'qwe', NULL, NULL, 1, 0, 0, 0, 'Consultations', '2024-05-16', 0, 0, 'Pending', 'Consultation');

-- --------------------------------------------------------

--
-- Table structure for table `family_plannings`
--

CREATE TABLE `family_plannings` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `checkup_date` date DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `not_approved` int(11) NOT NULL DEFAULT 0,
  `category2` varchar(255) NOT NULL DEFAULT 'Family Planning',
  `category` varchar(255) NOT NULL DEFAULT 'Family Planning',
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fp_consultation`
--

CREATE TABLE `fp_consultation` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `checkup_date` int(11) DEFAULT NULL,
  `is_print` int(11) DEFAULT 0,
  `fp_information_id` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `steps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_consultation`
--

INSERT INTO `fp_consultation` (`id`, `patient_id`, `description`, `diagnosis`, `medicine`, `nurse_id`, `checkup_date`, `is_print`, `fp_information_id`, `method`, `is_deleted`, `status`, `steps`) VALUES
(1, 1, NULL, NULL, NULL, 1, 2024, 0, 1, NULL, 0, 'Pending', 'FamilyPlanning');

-- --------------------------------------------------------

--
-- Table structure for table `fp_information`
--

CREATE TABLE `fp_information` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `no_of_children` int(11) DEFAULT NULL,
  `income` decimal(10,0) DEFAULT NULL,
  `plan_to_have_more_children` varchar(100) DEFAULT NULL,
  `client_type` varchar(100) DEFAULT NULL,
  `reason_for_fp` varchar(100) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `not_approved` int(11) DEFAULT 0,
  `checkup_date` date NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_information`
--

INSERT INTO `fp_information` (`id`, `patient_id`, `no_of_children`, `income`, `plan_to_have_more_children`, `client_type`, `reason_for_fp`, `nurse_id`, `method`, `serial`, `doctor_id`, `not_approved`, `checkup_date`, `is_deleted`) VALUES
(1, 1, 1, 1, 'Yes', 'NewAcceptor', 'spacing', 1, '1', '123', 2, 0, '2024-05-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_medical_history`
--

CREATE TABLE `fp_medical_history` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `fp_information_id` int(11) DEFAULT NULL,
  `severe_headaches` varchar(10) DEFAULT NULL,
  `history_stroke_heart_attack_hypertension` varchar(10) DEFAULT NULL,
  `hematoma_bruising_gum_bleeding` varchar(10) DEFAULT NULL,
  `breast_cancer_breast_mass` varchar(10) DEFAULT NULL,
  `severe_chest_pain` varchar(10) DEFAULT NULL,
  `cough_more_than_14_days` varchar(10) DEFAULT NULL,
  `vaginal_bleeding` varchar(10) DEFAULT NULL,
  `vaginal_discharge` varchar(10) DEFAULT NULL,
  `phenobarbital_rifampicin` varchar(10) DEFAULT NULL,
  `smoker` varchar(10) DEFAULT NULL,
  `with_disability` varchar(10) DEFAULT NULL,
  `jaundice` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `consultation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_medical_history`
--

INSERT INTO `fp_medical_history` (`id`, `patient_id`, `fp_information_id`, `severe_headaches`, `history_stroke_heart_attack_hypertension`, `hematoma_bruising_gum_bleeding`, `breast_cancer_breast_mass`, `severe_chest_pain`, `cough_more_than_14_days`, `vaginal_bleeding`, `vaginal_discharge`, `phenobarbital_rifampicin`, `smoker`, `with_disability`, `jaundice`, `is_deleted`, `consultation_id`) VALUES
(1, 1, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 1),
(2, 1, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 2),
(3, 1, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 1),
(4, 1, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 2),
(5, 2, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 3),
(6, 2, NULL, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 4),
(7, 1, 1, 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fp_obstetrical_history`
--

CREATE TABLE `fp_obstetrical_history` (
  `id` int(11) NOT NULL,
  `last_period` date DEFAULT NULL,
  `no_of_pregnancies` int(11) DEFAULT NULL,
  `date_of_last_delivery` date DEFAULT NULL,
  `type_of_last_delivery` varchar(255) DEFAULT NULL,
  `mens_type` varchar(255) DEFAULT NULL,
  `fp_information_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_obstetrical_history`
--

INSERT INTO `fp_obstetrical_history` (`id`, `last_period`, `no_of_pregnancies`, `date_of_last_delivery`, `type_of_last_delivery`, `mens_type`, `fp_information_id`, `is_deleted`) VALUES
(1, '2024-05-17', 1, '2024-05-16', 'Vaginal', 'Scanty', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_physical_examination`
--

CREATE TABLE `fp_physical_examination` (
  `id` int(11) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `pulse` varchar(10) DEFAULT NULL,
  `skin` varchar(255) DEFAULT NULL,
  `extremities` varchar(255) DEFAULT NULL,
  `conjunctiva` varchar(255) DEFAULT NULL,
  `neck` varchar(255) DEFAULT NULL,
  `breast` varchar(255) DEFAULT NULL,
  `abdomen` varchar(255) DEFAULT NULL,
  `fp_information_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `consultation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_physical_examination`
--

INSERT INTO `fp_physical_examination` (`id`, `weight`, `bp`, `height`, `pulse`, `skin`, `extremities`, `conjunctiva`, `neck`, `breast`, `abdomen`, `fp_information_id`, `is_deleted`, `consultation_id`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'Normal', '', 'Normal', '', NULL, NULL, NULL, 0, 1),
(2, 'asd', 'asd', 'asd', 'asd', 'Normal', 'Normal', 'Normal', 'Normal', NULL, NULL, NULL, 0, 2),
(3, '14', '14', '14', '14', 'Normal', 'Normal', 'Normal', 'Normal', NULL, NULL, NULL, 0, 1),
(4, '1', '1', '1', '1', 'Normal', 'Normal', 'Normal', 'Normal', NULL, NULL, NULL, 0, 2),
(5, '123', '123', '123', '123', 'Normal', 'Normal', 'Normal', 'Normal', NULL, NULL, NULL, 0, 3),
(6, '123', '123', '123', '123', 'Normal', 'Normal', 'Normal', 'Normal', NULL, NULL, NULL, 0, 4),
(7, '1', '1', '1', '1', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fp_risk_for_sexuality`
--

CREATE TABLE `fp_risk_for_sexuality` (
  `id` int(11) NOT NULL,
  `fp_information_id` int(11) DEFAULT NULL,
  `abnormal_discharge` varchar(10) DEFAULT NULL,
  `genital_sores_ulcers` varchar(10) DEFAULT NULL,
  `genital_pain_burning_sensation` varchar(10) DEFAULT NULL,
  `treatment_for_sti` varchar(10) DEFAULT NULL,
  `hiv_aids_pid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_risk_for_sexuality`
--

INSERT INTO `fp_risk_for_sexuality` (`id`, `fp_information_id`, `abnormal_discharge`, `genital_sores_ulcers`, `genital_pain_burning_sensation`, `treatment_for_sti`, `hiv_aids_pid`) VALUES
(1, 1, 'Yes', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `fp_risk_for_violence_against_women`
--

CREATE TABLE `fp_risk_for_violence_against_women` (
  `id` int(11) NOT NULL,
  `fp_information_id` int(11) DEFAULT NULL,
  `unpleasant_relationship` varchar(10) DEFAULT NULL,
  `partner_does_not_approve` varchar(10) DEFAULT NULL,
  `domestic_violence` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fp_risk_for_violence_against_women`
--

INSERT INTO `fp_risk_for_violence_against_women` (`id`, `fp_information_id`, `unpleasant_relationship`, `partner_does_not_approve`, `domestic_violence`) VALUES
(1, 1, 'Yes', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `immunization`
--

CREATE TABLE `immunization` (
  `id` int(11) NOT NULL,
  `bgc_date` date DEFAULT NULL,
  `bgc_remarks` varchar(255) DEFAULT NULL,
  `hepa_date` date DEFAULT NULL,
  `hepa_remarks` varchar(255) DEFAULT NULL,
  `pentavalent_date1` date DEFAULT NULL,
  `pentavalent_date2` date DEFAULT NULL,
  `pentavalent_date3` date DEFAULT NULL,
  `pentavalent_remarks` varchar(255) DEFAULT NULL,
  `oral_date1` date DEFAULT NULL,
  `oral_date2` date DEFAULT NULL,
  `oral_date3` date DEFAULT NULL,
  `oral_remarks` varchar(255) DEFAULT NULL,
  `ipv_date1` date DEFAULT NULL,
  `ipv_date2` date DEFAULT NULL,
  `ipv_remarks` varchar(255) DEFAULT NULL,
  `pcv_date1` date DEFAULT NULL,
  `pcv_date2` date DEFAULT NULL,
  `pcv_date3` date DEFAULT NULL,
  `pcv_remarks` varchar(255) DEFAULT NULL,
  `mmr_date1` date DEFAULT NULL,
  `mmr_date2` date DEFAULT NULL,
  `mmr_remarks` varchar(255) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `checkup_date` date DEFAULT current_timestamp(),
  `doctor_id` int(11) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `steps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immunization`
--

INSERT INTO `immunization` (`id`, `bgc_date`, `bgc_remarks`, `hepa_date`, `hepa_remarks`, `pentavalent_date1`, `pentavalent_date2`, `pentavalent_date3`, `pentavalent_remarks`, `oral_date1`, `oral_date2`, `oral_date3`, `oral_remarks`, `ipv_date1`, `ipv_date2`, `ipv_remarks`, `pcv_date1`, `pcv_date2`, `pcv_date3`, `pcv_remarks`, `mmr_date1`, `mmr_date2`, `mmr_remarks`, `patient_id`, `checkup_date`, `doctor_id`, `nurse_id`, `description`, `is_deleted`, `status`, `steps`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-05-29', NULL, 1, 'asd', 0, 'Pending', 'Immunization');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `type`, `date`, `time`, `user_id`) VALUES
(1, 'logout', '2024-05-07', '02:31:21', 2),
(2, 'login', '2024-05-07', '05:34:21', 2),
(3, 'logout', '2024-05-07', '05:35:15', 2),
(4, 'login', '2024-05-07', '05:35:19', 3),
(5, 'logout', '2024-05-07', '05:35:34', 3),
(6, 'login', '2024-05-07', '05:35:42', 1),
(7, 'logout', '2024-05-07', '05:46:41', 1),
(8, 'login', '2024-05-07', '05:46:45', 2),
(9, 'logout', '2024-05-07', '05:52:49', 2),
(10, 'login', '2024-05-07', '06:01:41', 2),
(11, 'logout', '2024-05-07', '06:38:18', 2),
(12, 'login', '2024-05-07', '06:49:14', 2),
(13, 'logout', '2024-05-07', '07:35:26', 2),
(14, 'login', '2024-05-08', '06:53:45', 2),
(15, 'logout', '2024-05-08', '06:59:54', 2),
(16, 'login', '2024-05-08', '07:10:07', 2),
(17, 'logout', '2024-05-08', '07:37:59', 2),
(18, 'login', '2024-05-08', '06:45:21', 2),
(19, 'logout', '2024-05-08', '06:52:52', 2),
(20, 'login', '2024-05-10', '04:16:48', 2),
(21, 'logout', '2024-05-10', '04:23:42', 2),
(22, 'login', '2024-05-10', '04:31:52', 1),
(23, 'logout', '2024-05-10', '04:32:00', 1),
(24, 'login', '2024-05-10', '04:33:00', 2),
(25, 'logout', '2024-05-10', '05:14:21', 2),
(26, 'login', '2024-05-10', '05:14:50', 2),
(27, 'logout', '2024-05-10', '05:51:29', 2),
(28, 'login', '2024-05-10', '05:54:47', 2),
(29, 'logout', '2024-05-10', '06:26:01', 2),
(30, 'login', '2024-05-10', '06:26:07', 1),
(31, 'logout', '2024-05-10', '06:32:04', 1),
(32, 'login', '2024-05-10', '06:32:17', 3),
(33, 'logout', '2024-05-10', '06:32:43', 3),
(34, 'login', '2024-05-10', '06:32:49', 1),
(35, 'logout', '2024-05-10', '06:32:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `midwife`
--

CREATE TABLE `midwife` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midwife`
--

INSERT INTO `midwife` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'Diane', 'Santos', '1992-10-02', 'Pasig', 8, 0, 1),
(4, 'qwe', 'qwe', '2024-05-03', 'qwe', 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'Abigail', 'Martinez', '2023-10-11', 'Laguna', 5, 0, 0),
(4, 'meow', 'aw', '2024-04-16', 'qwe', 18, 0, 0),
(5, 'test', 'test', '2024-04-27', 'test', 19, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `middle_name` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `serial_no` varchar(255) NOT NULL,
  `step` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `is_active`, `middle_name`, `suffix`, `gender`, `age`, `contact_no`, `civil_status`, `religion`, `is_deleted`, `serial_no`, `step`) VALUES
(1, 'Joemari', 'Obrial', '2002-11-21', 'CDO', 0, 'Uba', 'None', 'Male', '21', '09123', 'Married', 'Roman Catholic', 0, '240001', 'Interview Staff'),
(2, 'Test', 'Test', '2009-12-21', 'cdo', 0, 'Test', 'None', 'Female', '14', '123', 'Married', 'Muslim', 0, '240002', 'Interview Staff');

-- --------------------------------------------------------

--
-- Table structure for table `prenatal`
--

CREATE TABLE `prenatal` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `family_serial_no` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `pr` varchar(255) DEFAULT NULL,
  `rr` varchar(255) DEFAULT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `menarche` varchar(255) DEFAULT NULL,
  `lmp` varchar(255) DEFAULT NULL,
  `gravida` varchar(255) DEFAULT NULL,
  `para` varchar(255) DEFAULT NULL,
  `fullterm` varchar(255) DEFAULT NULL,
  `preterm` varchar(255) DEFAULT NULL,
  `abortion` varchar(255) DEFAULT NULL,
  `stillbirth` varchar(255) DEFAULT NULL,
  `alive` varchar(255) DEFAULT NULL,
  `hgb` varchar(255) DEFAULT NULL,
  `ua` varchar(255) DEFAULT NULL,
  `vdrl` varchar(255) DEFAULT NULL,
  `edc` varchar(255) DEFAULT NULL,
  `aog` varchar(255) DEFAULT NULL,
  `date_of_last_delivery` date DEFAULT NULL,
  `place_of_last_delivery` date DEFAULT NULL,
  `tt1` varchar(255) DEFAULT NULL,
  `tt2` varchar(255) DEFAULT NULL,
  `tt3` varchar(255) DEFAULT NULL,
  `tt4` varchar(255) DEFAULT NULL,
  `tt5` varchar(255) DEFAULT NULL,
  `checkup_date` date NOT NULL DEFAULT current_timestamp(),
  `nurse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prenatal_consultation`
--

CREATE TABLE `prenatal_consultation` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `midwife_id` int(11) DEFAULT NULL,
  `checkup_date` date NOT NULL DEFAULT current_timestamp(),
  `is_print` int(11) NOT NULL DEFAULT 0,
  `prenatal_subjective_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prenatal_consultation`
--

INSERT INTO `prenatal_consultation` (`id`, `patient_id`, `description`, `diagnosis`, `medicine`, `midwife_id`, `checkup_date`, `is_print`, `prenatal_subjective_id`) VALUES
(1, 2, NULL, NULL, NULL, 1, '2024-05-09', 0, 1),
(2, 2, NULL, NULL, NULL, 1, '2024-05-10', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prenatal_diagnosis`
--

CREATE TABLE `prenatal_diagnosis` (
  `id` int(11) NOT NULL,
  `edc` varchar(255) DEFAULT NULL,
  `aog` varchar(255) DEFAULT NULL,
  `date_of_last_delivery` date DEFAULT NULL,
  `place_of_last_delivery` varchar(255) DEFAULT NULL,
  `tt1` varchar(255) DEFAULT NULL,
  `tt2` varchar(255) DEFAULT NULL,
  `tt3` varchar(255) DEFAULT NULL,
  `tt4` varchar(255) DEFAULT NULL,
  `tt5` varchar(255) DEFAULT NULL,
  `multiple_sex_partners` varchar(10) DEFAULT NULL,
  `unusual_discharges` varchar(10) DEFAULT NULL,
  `itching_sores_around_vagina` varchar(10) DEFAULT NULL,
  `tx_for_stis_in_the_past` varchar(10) DEFAULT NULL,
  `pain_burning_sensation` varchar(10) DEFAULT NULL,
  `ovarian_cyst` varchar(10) DEFAULT NULL,
  `myoma_uteri` varchar(10) DEFAULT NULL,
  `placenta_previa` varchar(10) DEFAULT NULL,
  `still_birth` varchar(10) DEFAULT NULL,
  `pre_eclampsia` varchar(10) DEFAULT NULL,
  `eclampsia` varchar(10) DEFAULT NULL,
  `premature_contraction` varchar(10) DEFAULT NULL,
  `hpn` varchar(10) DEFAULT NULL,
  `uterine_myomectomy` varchar(10) DEFAULT NULL,
  `thyroid_disorder` varchar(10) DEFAULT NULL,
  `epilepsy` varchar(10) DEFAULT NULL,
  `height_less_than_145cm` varchar(10) DEFAULT NULL,
  `family_history_gt_36cm` varchar(10) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `prenatal_subjective_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prenatal_diagnosis`
--

INSERT INTO `prenatal_diagnosis` (`id`, `edc`, `aog`, `date_of_last_delivery`, `place_of_last_delivery`, `tt1`, `tt2`, `tt3`, `tt4`, `tt5`, `multiple_sex_partners`, `unusual_discharges`, `itching_sores_around_vagina`, `tx_for_stis_in_the_past`, `pain_burning_sensation`, `ovarian_cyst`, `myoma_uteri`, `placenta_previa`, `still_birth`, `pre_eclampsia`, `eclampsia`, `premature_contraction`, `hpn`, `uterine_myomectomy`, `thyroid_disorder`, `epilepsy`, `height_less_than_145cm`, `family_history_gt_36cm`, `patient_id`, `prenatal_subjective_id`) VALUES
(1, '1', '1', '2024-06-07', '1', '1', '1', '1', '1', '1', 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 2, 1),
(2, '12', '21', '2024-05-22', 'qwe', '1', '1', '1', '1', '1', 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prenatal_subjective`
--

CREATE TABLE `prenatal_subjective` (
  `id` int(11) NOT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `pr` varchar(255) DEFAULT NULL,
  `rr` varchar(255) DEFAULT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `menarche` varchar(255) DEFAULT NULL,
  `lmp` varchar(255) DEFAULT NULL,
  `gravida` varchar(255) DEFAULT NULL,
  `para` varchar(255) DEFAULT NULL,
  `fullterm` varchar(255) DEFAULT NULL,
  `preterm` varchar(255) DEFAULT NULL,
  `abortion` varchar(255) DEFAULT NULL,
  `stillbirth` varchar(255) DEFAULT NULL,
  `alive` varchar(255) DEFAULT NULL,
  `hgb` varchar(255) DEFAULT NULL,
  `ua` varchar(255) DEFAULT NULL,
  `vdrl` varchar(255) DEFAULT NULL,
  `forceps_delivery` varchar(255) DEFAULT NULL,
  `smoking` varchar(255) DEFAULT NULL,
  `allergy_alcohol_intake` varchar(255) DEFAULT NULL,
  `previous_cs` varchar(255) DEFAULT NULL,
  `consecutive_miscarriage` varchar(255) DEFAULT NULL,
  `ectopic_pregnancy_h_mole` varchar(255) DEFAULT NULL,
  `pp_bleeding` varchar(255) DEFAULT NULL,
  `baby_weight_gt_4kgs` varchar(255) DEFAULT NULL,
  `asthma` varchar(255) DEFAULT NULL,
  `goiter` varchar(255) DEFAULT NULL,
  `premature_contraction` varchar(255) DEFAULT NULL,
  `obesity` varchar(255) DEFAULT NULL,
  `heart_disease` varchar(255) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `checkup_date` date DEFAULT current_timestamp(),
  `doctor_id` int(11) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `dm` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `steps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prenatal_subjective`
--

INSERT INTO `prenatal_subjective` (`id`, `height`, `weight`, `temperature`, `pr`, `rr`, `bp`, `menarche`, `lmp`, `gravida`, `para`, `fullterm`, `preterm`, `abortion`, `stillbirth`, `alive`, `hgb`, `ua`, `vdrl`, `forceps_delivery`, `smoking`, `allergy_alcohol_intake`, `previous_cs`, `consecutive_miscarriage`, `ectopic_pregnancy_h_mole`, `pp_bleeding`, `baby_weight_gt_4kgs`, `asthma`, `goiter`, `premature_contraction`, `obesity`, `heart_disease`, `patient_id`, `checkup_date`, `doctor_id`, `nurse_id`, `dm`, `is_deleted`, `status`, `steps`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 2, '2024-05-09', NULL, 1, 'Yes', 0, 'Pending', 'Prenatal'),
(2, '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 2, '2024-05-10', NULL, 1, 'No', 0, 'Pending', 'Prenatal');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `step` varchar(255) NOT NULL,
  `patient_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'Richard', 'Gomez', '2000-08-08', 'Pasig', 2, 0, 0),
(3, 'James Matthew', 'Uba', '2002-10-21', 'CDO', 15, 0, 0),
(4, 'Joemari', 'Obrial', '2002-01-02', 'USA', 16, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`id`, `first_name`, `last_name`, `birthdate`, `address`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'Gary', 'Punzalan', '2023-10-02', 'superadmin', 1, 0, 0),
(2, 'Joemari', 'Obrial', '2024-03-06', 'Cdo', 14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','staff','nurse','superadmin','midwife') NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `is_active`, `is_deleted`, `email`) VALUES
(1, 'doctor', '$2y$10$JG57dAWRiqqFwybIqIcJjOfQ4NKyg2oF2FPw3AJfQwN9MCcFv8KXm', 'superadmin', 0, 0, ''),
(2, 'staff', '$2y$10$VT9uPNhpb7Yqym3UokBxPOVtIkomIbee7NUFoUuALXQdKeC9hUn1e', 'staff', 0, 0, ''),
(3, 'admin', '$2y$10$/ECAxe./Yu8tvLqASD7gXeVB/hRzIWKjJlP2bCNvHX2L1oiIs248a', 'admin', 0, 0, 'joemariobrial54@gmail.com'),
(5, 'nurse', '$2y$10$UEg98xlisBhOCHdsUxVd.uVLyRJW4qtHDN5CmbXU56fXvE0l.RD9G', 'nurse', 0, 0, ''),
(8, 'midwife', '$2y$10$AK/y2mQqwNSbiTHcoY/nEe.OE4g4N1c/c5s6i25P4eafzutlQ8dWK', 'midwife', 0, 0, ''),
(13, 'asd', '$2y$10$CiRbk.Zj.QhgkYLXTuu8cuvYOvPb4B2hlyt3q0MBZ6MhZJm1XmgD6', 'admin', 0, 0, 'joemariobrial54@gmail.com'),
(14, 'joemari', '$2y$10$dFJ2WM9cKs4OnyJ9p720EeuG3NT5n6pTT/4EZDbpYZ9HHC6v/GXHC', 'superadmin', 0, 0, ''),
(15, 'James', '$2y$10$9.VNQyywUOB5zZxVICNx4eKrQHdqOOyJYlheNu15GkEP/ydoT3DDO', 'staff', 0, 0, ''),
(16, 'Joemar', '$2y$10$jM8lJG7JWZKXquhGNDZZ1ONBKZABOG3LqjO0PfdphECU/MtLd6Jm.', 'staff', 0, 0, ''),
(17, 'Secretss', '$2y$10$KLzK0extdI2WaBH2gSmQ1OJXLKhWKQQ7lW4ly1vHLnbAar9KFocgS', 'staff', 0, 0, ''),
(18, 'aswd', '$2y$10$xX6e3ssILaH//o65dC1zreDAq.k43GhPu4OJkWbkLDMiKbKjsBD26', 'nurse', 0, 0, 'joemariobrial54@gmail.com'),
(19, 'test', '$2y$10$pDG0WEint1LKwKZKv44SV.LTgQonUYgLTsYwcyUsO1l.PCfFyVBMG', 'nurse', 0, 0, 'joemariobrial54@gmail.com'),
(20, 'qwe', '$2y$10$e0chII02YuskmAAP40.UGuwsCOXbtlDMje0XIdHLgVMXCljBLUY36', 'midwife', 0, 0, 'jamesmatthewobrial@gmail.com'),
(21, 'as', '$2y$10$knqfSJk5YWfUzqjWHioFPORUucVYaKmxRi676U/MVmmMDzhmDNsRq', 'admin', 0, 0, 'as');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_plannings`
--
ALTER TABLE `family_plannings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_consultation`
--
ALTER TABLE `fp_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_information`
--
ALTER TABLE `fp_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_medical_history`
--
ALTER TABLE `fp_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_obstetrical_history`
--
ALTER TABLE `fp_obstetrical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_physical_examination`
--
ALTER TABLE `fp_physical_examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_risk_for_sexuality`
--
ALTER TABLE `fp_risk_for_sexuality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_risk_for_violence_against_women`
--
ALTER TABLE `fp_risk_for_violence_against_women`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunization`
--
ALTER TABLE `immunization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midwife`
--
ALTER TABLE `midwife`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prenatal`
--
ALTER TABLE `prenatal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prenatal_consultation`
--
ALTER TABLE `prenatal_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prenatal_diagnosis`
--
ALTER TABLE `prenatal_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prenatal_subjective`
--
ALTER TABLE `prenatal_subjective`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `family_plannings`
--
ALTER TABLE `family_plannings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fp_consultation`
--
ALTER TABLE `fp_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fp_information`
--
ALTER TABLE `fp_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fp_medical_history`
--
ALTER TABLE `fp_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fp_obstetrical_history`
--
ALTER TABLE `fp_obstetrical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fp_physical_examination`
--
ALTER TABLE `fp_physical_examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fp_risk_for_sexuality`
--
ALTER TABLE `fp_risk_for_sexuality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fp_risk_for_violence_against_women`
--
ALTER TABLE `fp_risk_for_violence_against_women`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `immunization`
--
ALTER TABLE `immunization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `midwife`
--
ALTER TABLE `midwife`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prenatal`
--
ALTER TABLE `prenatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prenatal_consultation`
--
ALTER TABLE `prenatal_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prenatal_diagnosis`
--
ALTER TABLE `prenatal_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prenatal_subjective`
--
ALTER TABLE `prenatal_subjective`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
