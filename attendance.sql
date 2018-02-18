-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2017 at 02:18 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `alloted_subject`
--

CREATE TABLE `alloted_subject` (
  `tid` varchar(255) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alloted_subject`
--

INSERT INTO `alloted_subject` (`tid`, `cid`, `branch`) VALUES
('T415022', 'c1', 'IT'),
('T415022', 'c12', 'CSE'),
('t415026', 'c13', 'CSE'),
('T415022', 'c14', 'CSE'),
('t415036', 'c15', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `a_date` date NOT NULL,
  `tid` varchar(255) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `present` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_table`
--

INSERT INTO `attendance_table` (`a_date`, `tid`, `cid`, `sid`, `present`) VALUES
('2017-10-21', 't415026', 'c1', 'b415026', 'P'),
('2017-10-21', 't415026', 'c1', 'b415032', 'P'),
('2017-10-21', 't415026', 'c1', 'b415045', 'P'),
('2017-10-21', 't415026', 'c1', 'b415050', 'P'),
('2017-10-22', 't415026', 'c1', 'b415026', 'P'),
('2017-10-22', 't415026', 'c1', 'b415032', 'P'),
('2017-10-22', 't415026', 'c1', 'b415045', 'P'),
('2017-10-22', 't415026', 'c1', 'b415050', 'A'),
('2017-10-23', 't415026', 'c1', 'b415026', 'A'),
('2017-10-23', 't415026', 'c1', 'b415032', 'A'),
('2017-10-23', 't415026', 'c1', 'b415045', 'A'),
('2017-10-23', 't415026', 'c1', 'b415050', 'A'),
('2017-10-24', 't415026', 'c1', 'b415026', 'P'),
('2017-10-24', 't415026', 'c1', 'b415032', 'P'),
('2017-10-24', 't415026', 'c1', 'b415045', 'A'),
('2017-10-24', 't415026', 'c1', 'b415050', 'A'),
('2017-10-25', 't415026', 'c1', 'b415026', 'P'),
('2017-10-25', 't415026', 'c1', 'b415032', 'P'),
('2017-10-25', 't415026', 'c1', 'b415045', 'A'),
('2017-10-25', 't415026', 'c1', 'b415050', 'A'),
('0000-00-00', 'T415036', 'c1', 'b415026', 'P'),
('0000-00-00', 'T415036', 'c1', 'b415032', 'P'),
('0000-00-00', 'T415036', 'c1', 'b415035', 'P'),
('0000-00-00', 'T415036', 'c1', 'B415037', 'A'),
('0000-00-00', 'T415036', 'c1', 'b415045', 'A'),
('0000-00-00', 'T415036', 'c1', 'b415050', 'A'),
('2017-10-30', 'T415036', 'c1', 'b415026', 'A'),
('2017-10-30', 'T415036', 'c1', 'b415032', 'P'),
('2017-10-30', 'T415036', 'c1', 'b415035', 'A'),
('2017-10-30', 'T415036', 'c1', 'B415037', 'P'),
('2017-10-30', 'T415036', 'c1', 'b415045', 'P'),
('2017-10-30', 'T415036', 'c1', 'b415050', 'A'),
('0000-00-00', 'T415036', 'c12', 'b115011', 'P'),
('0000-00-00', 'T415036', 'c12', 'b115014', 'P'),
('0000-00-00', 'T415036', 'c12', 'b115022', 'A'),
('0000-00-00', 'T415036', 'c12', 'b115036', 'A'),
('0000-00-00', 'T415036', 'c12', 'b115066', 'A'),
('0000-00-00', 'T415036', 'c12', 'b415022', 'A'),
('0000-00-00', 'T415036', 'c12', 'b415036', 'A'),
('2017-10-29', 'T415036', 'c12', 'b115011', 'P'),
('2017-10-29', 'T415036', 'c12', 'b115014', 'P'),
('2017-10-29', 'T415036', 'c12', 'b115022', 'P'),
('2017-10-29', 'T415036', 'c12', 'b115036', 'A'),
('2017-10-29', 'T415036', 'c12', 'b115066', 'A'),
('2017-10-29', 'T415036', 'c12', 'b415022', 'A'),
('2017-10-29', 'T415036', 'c12', 'b415036', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `semester`, `branch`) VALUES
('c1', 'toc', '5th', 'IT'),
('c12', 'Data Structure', '5th', 'CSE'),
('c13', 'Compiier Design', '5th', 'CSE'),
('c14', 'RDBMS', '5th', 'CSE'),
('c15', 'Network Security', '5th', 'CSE'),
('c2', 'Java Programming', '5th', 'IT'),
('c3', 'C++', '1st', 'CSE'),
('c4', 'System Programming', '4th', 'IT'),
('c5', 'Computer Organization', '5th', 'IT'),
('c6', 'cswds', '2nd', 'IT'),
('c7', 'SQL', '5', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(255) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `branch`, `semester`, `password`) VALUES
('', '', 'CSE', '1st', 'Nzg5'),
('b115011', 'raammm', 'CSE', '5th', 'MTIzNDU='),
('b115014', 'Prashu', 'CSE', '5th', 'MTIzNDU='),
('b115022', 'Rajaa', 'CSE', '5th', 'MTIzNDU='),
('b115036', 'mohan', 'CSE', '5th', 'MTIzNDU='),
('b115066', 'taylor swift', 'CSE', '5th', 'MTIzNDU='),
('b315044', 'Animesh', 'EEE', '5th', 'MTIzNDU='),
('b415001', 'qwerty', 'IT', '1st', 'MTIzNDU='),
('b415019', 'binay', 'CSE', '1st', 'MTIzNDU='),
('b415022', 'faheem habib', 'CSE', '5th', 'ZmFoZWVt'),
('b415026', 'Kaushik', 'IT', '5th', 'MTIzNDU='),
('b415032', 'Mahabir', 'IT', '5th', 'MTIzNDU='),
('b415035', 'Gora', 'IT', '5th', 'MTIzNDU='),
('b415036', 'Prashant', 'CSE', '5th', 'bWFneWFrYXVzaGlr'),
('B415037', 'PRATEEK MOHANTY', 'IT', '5th', 'MTIzNDU='),
('b415045', 'Rudra', 'IT', '5th', 'MTIzNDU='),
('b415050', 'saru', 'IT', '5th', 'MTIzNDU='),
('b415066', 'vikash', 'CSE', '1st', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `sid` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`sid`, `phone_no`, `email`) VALUES
('b415026', '9040888404', 'kkaushiksubudhi@gmail.com'),
('b415036', '123456789', 'prashant@gmail.com'),
('b415022', '123654', 'a@gmail.com'),
('b415045', 'Array', 'rudra@gmail.com'),
('', '', ''),
('b415019', '7894561230', 'binay@gmail.com'),
('b415050', '8658208215', 'saru@gmail.com'),
('b315044', '8658208215', 'animesh@gmail.com'),
('b415001', '8658208215', 'qwerty@gmail.com'),
('b415032', '9040888404', 'mahabir@gmail.com'),
('B415037', '1144556688', 'prateek@gmail.com'),
('b115022', '1144778855', 'a@gmail.com'),
('b115011', '1122336655', 'ram@sita.com'),
('b115036', '4455669988', 'mohan@mohan.com'),
('b115066', '5566998866', 'tay@lor.com'),
('b115014', '4455669933', 'g@j.com'),
('b415035', '8685208215', 'gora@gmail.com'),
('b415066', '8658208215', 'vikash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` varchar(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `password`) VALUES
('T415022', 'S.P.SIngh', 'MTIzNDU='),
('t415026', 'bharati', 'MTIzNDU='),
('t415036', 'Anjali', 'MTIzNDU='),
('t415045', 'Swati Vipsita', 'MTIzNDU=');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `tid` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`tid`, `phone_no`, `email`, `dob`) VALUES
('t415026', '7978754039', 'bharati@gmail.com', '1980-12-10'),
('T415022', '1122336655', 'abc@gmail.com', '0000-00-00'),
('t415036', '8658208215', 'anjali@gmail.com', '0000-00-00'),
('t415045', '8658208215', 'swati@gmail.com', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alloted_subject`
--
ALTER TABLE `alloted_subject`
  ADD PRIMARY KEY (`cid`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`cid`,`tid`,`a_date`,`sid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD KEY `tid` (`tid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alloted_subject`
--
ALTER TABLE `alloted_subject`
  ADD CONSTRAINT `alloted_subject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`),
  ADD CONSTRAINT `alloted_subject_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD CONSTRAINT `attendance_table_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`),
  ADD CONSTRAINT `attendance_table_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD CONSTRAINT `teacher_details_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
