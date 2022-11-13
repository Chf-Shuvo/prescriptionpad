-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 07:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescriptionpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Chafiullah', 'Bhuiyan', 'shuvo.sam2012@gmail.com', '$2y$10$UOvn5VOu6uwgpfGSq99J7OvYOaBTaAE1F/6VeLhJVywsX9HOntUqG', '2022-11-11 20:35:31', '2022-11-12 02:35:31'),
(2, 'Nasiful', 'Walid', 'nasif@gmail.com', '$2y$10$bAL1M446e5cTSvhTGnr2rOMVoAqq0EXMlqpFVISPRvbTCL8pKSLG2', '2022-11-12 13:11:15', '2022-11-12 13:11:15'),
(4, 'Mehedi', 'Mehedi', 'mehedi@gmail.com', '$2y$10$IQYHhshAWYksdB8NQJcqsemQYZVa3oIRIMrZd595bgdLCHpY8dXU6', '2022-11-12 13:12:08', '2022-11-12 13:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `doctor_id` int(11) UNSIGNED NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `schedule`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '12 November 2022 09:27 pm', NULL, 'active', '2022-11-12 09:30:13', '2022-11-12 09:30:13'),
(2, 1, 1, '10 December 2022 09:30 pm', NULL, 'attended', '2022-11-12 09:31:00', '2022-11-12 09:31:00'),
(5, 1, 2, '12 November 2022 09:54 pm', '636fc1c698dd0.pdf', 'active', '2022-11-12 09:54:46', '2022-11-12 09:54:46'),
(6, 1, 1, '13 November 2022 07:53 pm', '6370f86739adb.pdf', 'attended', '2022-11-13 08:00:07', '2022-11-13 08:00:07'),
(7, 1, 1, '13 November 2022 08:00 pm', '6370f871306fd.pdf', 'active', '2022-11-13 08:00:17', '2022-11-13 08:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `specializations` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `gender`, `age`, `image`, `specializations`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Chafiullah', 'Bhuiyan', '01730159866', 'shuvo.sam2012@gmail.com', '$2y$10$UOvn5VOu6uwgpfGSq99J7OvYOaBTaAE1F/6VeLhJVywsX9HOntUqG', 'Male', 35, '636f93143b74b.jpg', 'Tests', '2022-11-12 12:35:32', '2022-11-12 06:35:32'),
(2, 'Dr. Nasiful', 'Walid', '01521211335', 'nasif@gmail.com', '123456', 'Male', 35, '636f9326c7c22.jpg', '<ul><li>Specialization 1</li><li>Specialization 2</li><li>3</li><li>4</li><li>5</li></ul>', '2022-11-12 12:35:50', '2022-11-12 06:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `phone`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '01730159866', 'Chafiullah', 'Shuvo', 'shuvo.sam2012@gmail.com', '$2y$10$Id3TwiLlfORmQou33HjWlOHw/5GZ5F0EFPtRjfO/jA7/.AYHTDsdy', '2022-11-13 18:32:16', '2022-11-13 12:32:16'),
(2, '01521211335', 'Nasiful', 'Walid', 'nasif@gmail.com', '$2y$10$6G.VabY3qhDJBZzEkKW2yu4sannLHGxc8YqIYonniMRU1sSKAbTDm', '2022-11-12 14:02:43', '2022-11-12 08:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Get Well Pharma', '01730159866', 'shuvo.sam2012@gmail.com', '$2y$10$UOvn5VOu6uwgpfGSq99J7OvYOaBTaAE1F/6VeLhJVywsX9HOntUqG', '2022-11-11 21:30:21', '2022-11-11 21:30:21'),
(3, 'Lazz Pharma', '01521211335', 'lazz@gmail.com', '$2y$10$pDjnrcA8IveiSwb7joE4veh8ZbXVwcHMxjIvXZNXGoydEnjTPND8O', '2022-11-12 13:33:17', '2022-11-12 07:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) UNSIGNED NOT NULL,
  `appointment_id` int(11) UNSIGNED NOT NULL,
  `doctor_id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `dx` longtext NOT NULL,
  `rx` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `appointment_id`, `doctor_id`, `patient_id`, `dx`, `rx`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 'Problem 1\r\nProblem 2\r\nProblem 3\r\n.\r\n.\r\n.\r\n.', '<ul><li>Moxaciline</li><li>Seclo</li><li>Pantonix<br></li></ul>', '2022-11-13 09:28:11', '2022-11-13 09:28:11'),
(2, 2, 1, 1, 'Problem 1\r\nProblem 2\r\nProblem 3\r\n.\r\n.\r\n.\r\n.', '<ul><li>Moxaciline</li><li>Seclo</li><li>Pantonix<br></li></ul>', '2022-11-13 09:28:11', '2022-11-13 09:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `p_profile`
--

CREATE TABLE `p_profile` (
  `PatientID` varchar(50) NOT NULL,
  `ID` int(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Blood` varchar(2) NOT NULL,
  `Age` varchar(3) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_profile`
--

INSERT INTO `p_profile` (`PatientID`, `ID`, `Gender`, `Blood`, `Age`, `Occupation`, `Phone`, `Address`, `Picture`) VALUES
('01683200510111111', 13, 'Male', 'B+', '24', 'Student', '', '22 No. Gate, Cumilla Cantoment, Cumilla.', 'pimg/5c9ba5e673a990.84463399.jpg'),
('01683200511111111', 14, 'Male', 'B-', '22', 'Engg.', '', 'Ammtoli, Cumilla Cantonment,Cumilla.', 'pimg/5c9ba6650e0068.91519284.jpg'),
('01683200513111111', 15, 'Male', 'B+', '36', 'Govt. Job', '', 'Jhawtola, Cumilla.', 'pimg/5c9ba6d487b9a9.64479116.jpg'),
('01683200514111111', 16, 'Male', 'O-', '44', 'Business', '', 'Kandirpar, Cumilla', 'pimg/5c9ba70cea1dd4.93979946.jpg'),
('01683200515111111', 17, 'Female', 'A+', '22', 'Student', '', 'Cumilla', 'pimg/5c9ba77d151f29.23796556.jpg'),
('01683200516111111', 18, 'Female', 'A+', '33', 'Student', '', 'Cumilla', 'pimg/5c9ba8e2040f56.33565345.jpg'),
('01683200517111111', 19, 'Female', 'A+', '22', 'Engg.', '', 'Cumilla', 'pimg/5c9ba985a9cda2.21703587.jpg'),
('01683200518111111', 20, 'Female', 'B+', '25', 'Student', '', 'Cumilla ', 'pimg/5c9ba9465c55c1.41341042.jpg'),
('11111111111111111', 26, 'Male', 'A+', '22', 'Engg.', '10101010101', 'gg', 'pimg/5ca4f3980006a5.50194926.jpg'),
('01730159866', 27, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `PatientID` varchar(50) NOT NULL,
  `PrescriptionID` int(10) NOT NULL,
  `ReportID` int(10) NOT NULL,
  `ImageR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_doctor_id` (`doctor_id`),
  ADD KEY `appointment_patient_id` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_record_patient_id` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD UNIQUE KEY `ID` (`id`),
  ADD UNIQUE KEY `Phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_doctor_id` (`doctor_id`),
  ADD KEY `prescriptions_patient_id` (`patient_id`),
  ADD KEY `prescriptions_appointment_id` (`appointment_id`);

--
-- Indexes for table `p_profile`
--
ALTER TABLE `p_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_profile`
--
ALTER TABLE `p_profile`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointment_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointment_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_record_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `prescriptions_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `prescriptions_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
