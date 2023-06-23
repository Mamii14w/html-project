-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 07:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dh`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(55) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `cr_hr` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course_name`, `cr_hr`, `dept_id`, `year`, `term`) VALUES
(1, 'INSY121', 'Introduction to IS', 5, 1, 1, 1),
(4, 'PSY155', 'programing 1', 7, 1, 1, 1),
(5, 'MATH1', 'statistics', 5, 1, 1, 1),
(6, 'CS121', 'Introduction to cs', 5, 57, 1, 1),
(7, 'ENG11', 'English speaking skill', 5, 1, 1, 1),
(8, 'INSY21', 'programing 2', 7, 1, 1, 1),
(9, 'INSY1211', 'research method', 5, 1, 1, 2),
(10, 'INSY121', 'Intro info', 5, 1, 2, 1),
(11, 'INSY121', 'intr', 7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `dept_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `pro_id`, `dept_name`) VALUES
(1, 1, 'Information Systems'),
(57, 1, 'computer science'),
(70, 1, 'Software engineering'),
(72, 1, 'food scince'),
(73, 1, 'psychology');

-- --------------------------------------------------------

--
-- Table structure for table `inst_assign`
--

CREATE TABLE `inst_assign` (
  `id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inst_assign`
--

INSERT INTO `inst_assign` (`id`, `inst_id`, `dept_id`, `course_id`, `session_id`, `action`) VALUES
(3, 18, 1, 1, 1, 1),
(15, 18, 1, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `pro_id` int(11) NOT NULL,
  `pro_Name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`pro_id`, `pro_Name`) VALUES
(1, 'DEP'),
(2, 'SEP'),
(3, 'CEP');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_name` varchar(55) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_name`, `status`) VALUES
(1, '2022/2023 TERM 1', 1),
(3, '2022/2023 TERM 2', 0),
(4, '2022/2023 TERM 3', 0),
(6, '2024/2025 TERM1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Department` int(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `Pnumber` text NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `Fname`, `Lname`, `Department`, `sex`, `DOB`, `Pnumber`, `Email`) VALUES
(4, 'Beyene', 'Bedassa', 1, 'female', '1995-08-27', '+251985654555', 'malkee@gmail.com'),
(18, 'melkamu', 'fasika', 1, 'male', '2016-10-26', '+251956563287', 'etefamk@gmail.com'),
(22, 'dani', 'fasika', 1, 'male', '2022-09-21', '+251956563287', 'dan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff_account`
--

CREATE TABLE `staff_account` (
  `id` int(11) NOT NULL,
  `Staff_id` int(11) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_account`
--

INSERT INTO `staff_account` (`id`, `Staff_id`, `Uname`, `Password`, `Role`, `Status`) VALUES
(4, 4, 'HRU/DST4/22', '212121', 'Academic head', 1),
(18, 18, 'HRU/DST18/22', '121212', 'Instructor', 1),
(22, 22, 'HRU/DST22/22', 'fZtrA2', 'Instructor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Mname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `Mother_name` varchar(30) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Phone` text NOT NULL,
  `Zone` varchar(30) NOT NULL,
  `Woreda` varchar(50) NOT NULL,
  `Kebele` varchar(50) NOT NULL,
  `Elementary` varchar(50) NOT NULL,
  `Preparatory` varchar(50) NOT NULL,
  `Upload_doc` longtext CHARACTER SET utf8 NOT NULL,
  `Request` varchar(55) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `Fname`, `Mname`, `Lname`, `DOB`, `sex`, `Mother_name`, `Nationality`, `Dept_id`, `Email`, `Phone`, `Zone`, `Woreda`, `Kebele`, `Elementary`, `Preparatory`, `Upload_doc`, `Request`) VALUES
(10, 'Beyene', 'heyl', 'Bedassa', '2004-11-26', 'male', 'shgh', 'ethiopia', 57, 'malke@gmail.com', '+251985654544', 'gaf', 'fdgf', 'dhgfg', 'retes', 'hfgd', 'DBMS Project Report.pdf', 'Approved'),
(11, 'Beyene', 'heyl', 'Bedassa', '2004-11-26', 'male', 'shgh', 'ethiopia', 57, 'malke@gmail.com', '+251985654544', 'gaf', 'fdgf', 'dhgfg', 'retes', 'hfgd', 'DBMS Project Report.pdf', 'Approved'),
(12, 'Daniel', 'Worku', 'tegegn', '1985-10-27', 'female', 'tale', 'ethiopia', 1, 'daniel79wt@gmail.com', '+251979363627', 'jimma', 'limu', 'ambuye', 'ambuye', 'jimma', 'sami_ppt_doc[30].pdf', 'Approved'),
(29, 'dani', 'worku', 'tuha', '2022-10-10', 'male', 'tigi', 'ethiopia', 1, 'dan@gmail.com', '+251956563287', 'jimma', 'iluu', '01', 'metu', 'metu', 'dseminar.pdf (2) (1) (1) (1) (1).docx', 'Approved'),
(30, 'daniel', 'worku', 'worku', '2022-09-13', 'male', 'tigi', 'ethiopia', 57, 'dan@gmail.com', '+251956563287', 'jimma', 'limu', '01', 'amb', 'jimma', 'dseminar.pdf (2) (1) (1).docx', 'Approved'),
(32, 'mohamed', 'worku', 'etefa', '2022-09-19', 'female', 'Addise', 'ethiopia', 57, 'dan@gmail.com', '+251956563287', 'jimma', 'limu', 'ambuye', 'metu', 'jimma', 'dseminar.pdf (2) (1).docx', 'Approved'),
(34, 'melkamu', 'Etefa', 'bekele', '1991-03-02', 'male', 'Addise', 'ethiopia', 1, 'etefamk@gmail.com', '+251952419014', 'metu', 'iluu', '01', 'metu', 'metu', 'dseminar.pdf (2) (1) (1) (1) (1) (1).docx', 'Approved'),
(35, 'nuru', 'ababu', 'dani', '2000-09-22', 'male', 'tigi', 'ethiopia', 57, 'dan@gmail.com', '+251956563287', 'metu', 'limu', 'ambuye', 'ambuye', 'jimma', 'dani1 (1).docx', 'Approved'),
(38, 'melkamu', 'etefa', 'bekele', '2022-09-13', 'male', 'tigi', 'ethiopia', 1, 'dan@gmail.com', '+251956563287', 'jimma', 'limu', '01', 'ambuye', 'jimma', 'dani1 (1) (1) (1).docx', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `Uname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`id`, `student_id`, `Uname`, `Password`, `Role`, `Status`) VALUES
(13, 11, 'HRU/DS11/22', '121212', 'student', 1),
(34, 34, 'HRU/DS34/22', 'LNYwWl', 'student', 1),
(38, 38, 'HRU/DS38/22', 'k7cf6B', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `30%` int(11) NOT NULL,
  `70%` int(11) NOT NULL,
  `total 100%` int(11) NOT NULL,
  `Grade` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term_name`) VALUES
(1, 'TERM 1'),
(2, 'TERM 2'),
(3, 'TERM 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `Pnumber` text NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `Fname`, `Lname`, `sex`, `DOB`, `Pnumber`, `Email`) VALUES
(1, 'Daniel', 'worku', 'male', '1992-03-30', '+251979363627', 'dani@gmail.com'),
(8, 'daniel', 'Bekele', 'male', '2003-04-28', '+251979363627', 'daniel79wt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Uname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `user_id`, `Uname`, `Password`, `Role`, `status`) VALUES
(1, 1, 'HRU/DU1/11', '121212', 'admin', 1),
(7, 8, 'HRU/DU8/22', '121212', 'registrar officer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_name`) VALUES
(1, 'Year 1'),
(2, 'Year 2'),
(3, 'Year 3'),
(4, 'Year 4'),
(5, 'Year 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `year` (`year`),
  ADD KEY `term` (`term`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `inst_assign`
--
ALTER TABLE `inst_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `staff_account`
--
ALTER TABLE `staff_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_account_ibfk_1` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `student_course_ibfk_2` (`year`),
  ADD KEY `term` (`term`),
  ADD KEY `session` (`session`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `inst_assign`
--
ALTER TABLE `inst_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff_account`
--
ALTER TABLE `staff_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`year`) REFERENCES `year` (`year_id`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`term`) REFERENCES `term` (`term_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `programs` (`pro_id`);

--
-- Constraints for table `inst_assign`
--
ALTER TABLE `inst_assign`
  ADD CONSTRAINT `inst_assign_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `inst_assign_ibfk_2` FOREIGN KEY (`inst_id`) REFERENCES `staff` (`s_id`),
  ADD CONSTRAINT `inst_assign_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`),
  ADD CONSTRAINT `inst_assign_ibfk_4` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `staff_account`
--
ALTER TABLE `staff_account`
  ADD CONSTRAINT `staff_account_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `staff` (`s_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `student_account`
--
ALTER TABLE `student_account`
  ADD CONSTRAINT `student_account_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`year`) REFERENCES `year` (`year_id`),
  ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`term`) REFERENCES `term` (`term_id`),
  ADD CONSTRAINT `student_course_ibfk_5` FOREIGN KEY (`session`) REFERENCES `session` (`id`),
  ADD CONSTRAINT `student_course_ibfk_6` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD CONSTRAINT `tblresult_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `tblresult_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
