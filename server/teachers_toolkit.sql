-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 04:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachers_toolkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `school_id`, `firstname`, `lastname`, `middlename`, `phone_no`, `email`) VALUES
(23, 1033, 24, 'miguel', 'reyes', 'romuga', 2147483647, 'mareyes2132@gmail.com'),
(24, 1042, 25, 'miguel', 'reyes', 'romuga', 2147483647, 'mr.reyes101lmfao@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `principal_fn` varchar(100) NOT NULL,
  `principal_ln` varchar(100) NOT NULL,
  `principal_mn` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `address`, `barangay`, `city`, `province`, `country`, `postal_code`, `principal_fn`, `principal_ln`, `principal_mn`, `school_name`) VALUES
(24, '', '', '', '', '', 0, '', '', '', ''),
(25, '', '', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_records`
--

CREATE TABLE `school_records` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_records`
--

INSERT INTO `school_records` (`id`, `section_id`, `subject_id`, `teacher_id`, `school_year_id`) VALUES
(1, 3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `sy_start` date NOT NULL,
  `sy_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `school_id`, `sy_start`, `sy_end`) VALUES
(2, 25, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `section_name` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `track` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `advisor_id`, `section_name`, `strand`, `track`, `grade`) VALUES
(3, 69, 'Newton', 'STEM', 'Academic', 11);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(5) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `LRN` int(11) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `section_id`, `firstname`, `lastname`, `middlename`, `email`, `province`, `city`, `barangay`, `gender`, `LRN`, `birthdate`) VALUES
(2, 1041, NULL, 'firstname', 'lastname', 'middlename', 'email', 'province', 'city', 'barangay', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `semester`, `hours`) VALUES
(2, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `firstname`, `lastname`, `middlename`, `phone_no`, `email`) VALUES
(1, 1036, 'firstname', 'lastname', 'middlename', 92841042, 'example@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `access` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `access`) VALUES
(1033, '$2y$10$YUleb9YxgRLU0XCwh0MziOfwzzbJNkabbopvyYiVpy8OC/8iLGBVu', '3'),
(1034, '$2y$10$DMjSwrdR6cwtBDovLDNguuPGUGXV91xoLfZtor8a88Sueo.Ymp3Nu', '2'),
(1035, '$2y$10$Ydd.tNU7lJ3hxy6RzIGpWOVLLrrBHKCZttyhkZMhWkax8P8LOygFG', '2'),
(1036, '$2y$10$ZRPFLWa2lMxWRAvk5GHULOzbyRX4aj/QJgIbaRtNxbGV4qJmfq5iO', '2'),
(1037, '$2y$10$x7kJtCh6B4rPiWM1.FZIm.L2Etl10uhOVdCm9mxIzUfV0gBlTdBGS', '1'),
(1038, '$2y$10$6i.a7ufv02X6u6dS0HoYn.dNOmzywtzKIUFx10RqpC0tjEUM/Hdma', '1'),
(1039, '$2y$10$yoCr86ckylRTRE25lz0hI.ZCwENHcoER5X3WgNU8ZcDgcoAvFSe/2', '1'),
(1040, '$2y$10$lAVGVpqWWvYyNo014ONavekDU7sAa8Cqdy7VQc9f0PTZLnixAUP7.', '1'),
(1041, '$2y$10$uuxmmf7Chr8BPmyhioNDHu059qLBvqNf.23pyQ9WStqq4Hkvl2cZu', '1'),
(1042, '$2y$10$ueBd.s5GIiRt.QsM4JAHc.QJWjsTXkKHSyzDdiCNlmWkwujb5dZw.', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `school_id_fk` (`school_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_records`
--
ALTER TABLE `school_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sr_section_fk` (`section_id`),
  ADD KEY `sr_subject_fk` (`subject_id`),
  ADD KEY `sr_teacher_fk` (`teacher_id`),
  ADD KEY `sr_school_year_fk` (`school_year_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_years_school_fk` (`school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_fk` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_user_fk` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `school_records`
--
ALTER TABLE `school_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `school_id_fk` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `school_records`
--
ALTER TABLE `school_records`
  ADD CONSTRAINT `sr_school_year_fk` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sr_section_fk` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sr_subject_fk` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sr_teacher_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `school_years`
--
ALTER TABLE `school_years`
  ADD CONSTRAINT `school_years_school_fk` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
