-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 06:55 PM
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
(27, 1083, 31, 'miguel', 'reyes', 'romuga', 424124124, 'mareyes2132@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `classrecords`
--

CREATE TABLE `classrecords` (
  `id` int(11) NOT NULL,
  `subject_data_id` int(11) NOT NULL,
  `quarter` tinyint(4) NOT NULL,
  `w1` int(11) NOT NULL DEFAULT 0,
  `w2` int(11) NOT NULL DEFAULT 0,
  `w3` int(11) NOT NULL DEFAULT 0,
  `w4` int(11) NOT NULL DEFAULT 0,
  `w5` int(11) NOT NULL DEFAULT 0,
  `w6` int(11) NOT NULL DEFAULT 0,
  `w7` int(11) NOT NULL DEFAULT 0,
  `w8` int(11) NOT NULL DEFAULT 0,
  `w9` int(11) NOT NULL DEFAULT 0,
  `w10` int(11) NOT NULL DEFAULT 0,
  `p1` int(11) NOT NULL DEFAULT 0,
  `p2` int(11) NOT NULL DEFAULT 0,
  `p3` int(11) NOT NULL DEFAULT 0,
  `p4` int(11) NOT NULL DEFAULT 0,
  `p5` int(11) NOT NULL DEFAULT 0,
  `p6` int(11) NOT NULL DEFAULT 0,
  `p7` int(11) NOT NULL DEFAULT 0,
  `p8` int(11) NOT NULL DEFAULT 0,
  `p9` int(11) NOT NULL DEFAULT 0,
  `p10` int(11) NOT NULL DEFAULT 0,
  `q1` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrecords`
--

INSERT INTO `classrecords` (`id`, `subject_data_id`, `quarter`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `w9`, `w10`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `q1`) VALUES
(3, 11, 1, 12, 15, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(4, 11, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 12, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 13, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 13, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classrecord_details`
--

CREATE TABLE `classrecord_details` (
  `id` int(11) NOT NULL,
  `subject_data_id` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `written_weight` int(11) NOT NULL DEFAULT 0,
  `performance_weight` int(11) NOT NULL DEFAULT 0,
  `quarterly_weight` int(11) NOT NULL DEFAULT 0,
  `hw1` int(11) NOT NULL DEFAULT 0,
  `hw2` int(11) NOT NULL DEFAULT 0,
  `hw3` int(11) NOT NULL DEFAULT 0,
  `hw4` int(11) NOT NULL DEFAULT 0,
  `hw5` int(11) NOT NULL DEFAULT 0,
  `hw6` int(11) NOT NULL DEFAULT 0,
  `hw7` int(11) NOT NULL DEFAULT 0,
  `hw8` int(11) NOT NULL DEFAULT 0,
  `hw9` int(11) NOT NULL DEFAULT 0,
  `hw10` int(11) NOT NULL DEFAULT 0,
  `hp1` int(11) NOT NULL DEFAULT 0,
  `hp2` int(11) NOT NULL DEFAULT 0,
  `hp3` int(11) NOT NULL DEFAULT 0,
  `hp4` int(11) NOT NULL DEFAULT 0,
  `hp5` int(11) NOT NULL DEFAULT 0,
  `hp6` int(11) NOT NULL DEFAULT 0,
  `hp7` int(11) NOT NULL DEFAULT 0,
  `hp8` int(11) NOT NULL DEFAULT 0,
  `hp9` int(11) NOT NULL DEFAULT 0,
  `hp10` int(11) NOT NULL DEFAULT 0,
  `hq1` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrecord_details`
--

INSERT INTO `classrecord_details` (`id`, `subject_data_id`, `quarter`, `written_weight`, `performance_weight`, `quarterly_weight`, `hw1`, `hw2`, `hw3`, `hw4`, `hw5`, `hw6`, `hw7`, `hw8`, `hw9`, `hw10`, `hp1`, `hp2`, `hp3`, `hp4`, `hp5`, `hp6`, `hp7`, `hp8`, `hp9`, `hp10`, `hq1`) VALUES
(2, 12, 1, 40, 1, 21, 15, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20),
(3, 12, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 13, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 13, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
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

INSERT INTO `schools` (`id`, `barangay`, `city`, `province`, `country`, `postal_code`, `principal_fn`, `principal_ln`, `principal_mn`, `school_name`) VALUES
(31, 'nasipit', 'cebu', 'cebu city', 'philippines', 6315, 'loreta', 'garcia', 'ambot', 'university of san carlos');

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
(8, 31, '2021-05-21', '2021-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `section_name` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `school_year_id`, `advisor_id`, `section_name`, `strand`, `track`, `grade`) VALUES
(11, 8, 25, 'curie', 'Information and Communications Technology', 'Technical-Vocational-Livelihood', 11),
(12, 8, 25, 'lee', 'Information and Communications Technology', 'Technical-Vocational-Livelihood', 12);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `continuing` tinyint(4) NOT NULL DEFAULT 1,
  `completed` tinyint(4) NOT NULL DEFAULT 0,
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

INSERT INTO `students` (`id`, `user_id`, `school_id`, `continuing`, `completed`, `firstname`, `lastname`, `middlename`, `email`, `province`, `city`, `barangay`, `gender`, `LRN`, `birthdate`) VALUES
(18, 1085, 31, 1, 0, 'jose', 'mari', 'chan', 'jose@gmail.com', 'bohol', 'ubay', 'banrgay', 'm', 129301, '2021-06-22'),
(20, 1087, 31, 1, 0, 'miguel', 'reyes', 'angel', 'mareyes2132@gmail.com', 'cebu city', 'cebu', 'nasipit', 'm', 412, '2021-05-21'),
(21, 1088, 31, 1, 0, 'errol', 'spence', 'senerpida', 'erol@2wer', 'cebu city', 'city', 'nasipit', 'm', 41241, '2021-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_assignments`
--

INSERT INTO `student_assignments` (`id`, `student_id`, `section_id`) VALUES
(12, 18, 11),
(13, 20, 12),
(14, 21, 11);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `school_year_id`, `subject_name`, `semester`, `hours`) VALUES
(15, 8, 'science', 1, 41),
(16, 8, 'animation', 2, 80);

-- --------------------------------------------------------

--
-- Table structure for table `subject_assignments`
--

CREATE TABLE `subject_assignments` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_assignments`
--

INSERT INTO `subject_assignments` (`id`, `section_id`, `subject_id`, `teacher_id`) VALUES
(20, 11, 15, 25),
(21, 12, 16, 25);

-- --------------------------------------------------------

--
-- Table structure for table `subject_data`
--

CREATE TABLE `subject_data` (
  `id` int(11) NOT NULL,
  `subject_assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_data`
--

INSERT INTO `subject_data` (`id`, `subject_assignment_id`, `student_id`) VALUES
(11, 20, 18),
(12, 20, 21),
(13, 21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `continuing` tinyint(4) NOT NULL DEFAULT 1,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `school_id`, `continuing`, `firstname`, `lastname`, `middlename`, `phone_no`, `email`) VALUES
(25, 1084, 31, 1, 'kio', 'riki', 'reyes', 92841042, 'best@gmail.com');

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
(1083, '$2y$10$o4FL214eg29FaSaU5p2sFOg42VqaUzpT2XrtUIxdF33pfBI8NSPE2', '3'),
(1084, '$2y$10$bCUPzxpjI0CUfo9C1DSqeu25i8faV20ElS7IRsWu6aizDWxs1Vk1a', '2'),
(1085, '$2y$10$84ys69itaUR5RNuUpZi1gObGOfjzKRf...ig5Jyz4KpkEyJILGnza', '1'),
(1086, '$2y$10$VzFmKSYcyhzPvH6u9SV/P.CL1aYjXIv6mh3a7uzzUBoCS4QX6qAM.', '1'),
(1087, '$2y$10$RUAZIW4CbpvbH4amCGXVsOblBIJc.rSK9nw9sMhN40ZllfTZnl4nO', '1'),
(1088, '$2y$10$x0uUKeumTqdD7kuUhyLtyeQEfe6m6vloZHPWXLVojVdEyxfTJ0b0m', '1');

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
-- Indexes for table `classrecords`
--
ALTER TABLE `classrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cr_subject_data_fk` (`subject_data_id`);

--
-- Indexes for table `classrecord_details`
--
ALTER TABLE `classrecord_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crd_subject_data_fk` (`subject_data_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_sy_fk` (`school_year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_fk` (`user_id`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stud_assign_section_fk` (`section_id`),
  ADD KEY `stud_assign_student_fk` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_sy_fk` (`school_year_id`);

--
-- Indexes for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_section_fk` (`section_id`),
  ADD KEY `sa_subject_fk` (`subject_id`),
  ADD KEY `sa_teacher_fk` (`teacher_id`);

--
-- Indexes for table `subject_data`
--
ALTER TABLE `subject_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sd_subject_assign_fk` (`subject_assignment_id`),
  ADD KEY `sd_student_fk` (`student_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `classrecords`
--
ALTER TABLE `classrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classrecord_details`
--
ALTER TABLE `classrecord_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject_data`
--
ALTER TABLE `subject_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

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
-- Constraints for table `classrecords`
--
ALTER TABLE `classrecords`
  ADD CONSTRAINT `cr_subject_data_fk` FOREIGN KEY (`subject_data_id`) REFERENCES `subject_data` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `classrecord_details`
--
ALTER TABLE `classrecord_details`
  ADD CONSTRAINT `crd_subject_data_fk` FOREIGN KEY (`subject_data_id`) REFERENCES `subject_data` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `school_years`
--
ALTER TABLE `school_years`
  ADD CONSTRAINT `school_years_school_fk` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_sy_fk` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD CONSTRAINT `stud_assign_section_fk` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stud_assign_student_fk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_sy_fk` FOREIGN KEY (`school_year_id`) REFERENCES `school_years` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject_assignments`
--
ALTER TABLE `subject_assignments`
  ADD CONSTRAINT `sa_section_fk` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sa_subject_fk` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sa_teacher_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject_data`
--
ALTER TABLE `subject_data`
  ADD CONSTRAINT `sd_student_fk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sd_subject_assign_fk` FOREIGN KEY (`subject_assignment_id`) REFERENCES `subject_assignments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
