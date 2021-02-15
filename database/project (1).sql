-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 03:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminacc`
--

INSERT INTO `adminacc` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `book_id` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`book_id`, `ISBN`, `title`, `author`, `category`, `status`, `quantity`, `section`) VALUES
(18, 2, 'Dramatic Arts', 'C.Belarmino', 'Programming Languages', 'Available', 21, 'Thesis Section'),
(20, 1, 'Liberalism', 'C.Belarmino', 'programming languages', 'Available', 1, 'Arts Section'),
(21, 2, 'Architecture 2', 'J.Jubanie', 'Programming Languages', 'Available', 1, 'Programming Section');

-- --------------------------------------------------------

--
-- Table structure for table `librarianacc`
--

CREATE TABLE `librarianacc` (
  `library_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarianacc`
--

INSERT INTO `librarianacc` (`library_id`, `name`, `username`, `password`) VALUES
(1, 'jomarie', 'jake', '123');

-- --------------------------------------------------------

--
-- Table structure for table `studentacc`
--

CREATE TABLE `studentacc` (
  `studentnumber` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentacc`
--

INSERT INTO `studentacc` (`studentnumber`, `first_name`, `lastname`, `birthday`, `gender`, `email`, `phone`, `course`, `username`, `password`) VALUES
(181104, 'Jake', 'Melendrez', '14/11/1999', 'Male', 'melendrezjake27@yahoo.com', 9296693851, 'BSIT', 'jake', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrowed`
--

CREATE TABLE `tbl_borrowed` (
  `borrowed_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `borrowed_date` date NOT NULL,
  `due_date` date NOT NULL,
  `request` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `ISBN` int(11) NOT NULL,
  `studentnumber` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminacc`
--
ALTER TABLE `adminacc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `librarianacc`
--
ALTER TABLE `librarianacc`
  ADD PRIMARY KEY (`library_id`);

--
-- Indexes for table `studentacc`
--
ALTER TABLE `studentacc`
  ADD PRIMARY KEY (`studentnumber`);

--
-- Indexes for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  ADD PRIMARY KEY (`borrowed_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `tbl_request_ibfk_1` (`studentnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminacc`
--
ALTER TABLE `adminacc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  MODIFY `borrowed_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
