-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 09:52 AM
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
-- Database: `student_ratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_rating` tinyint(4) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `logger_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_rating`, `user_review`, `datetime`, `sid`, `logger_id`) VALUES
(87, 4, 'Good in studies', '2022-10-14 14:33:35', 3, 30),
(90, 5, 'this is intelegent student', '2022-10-14 15:34:29', 6, 32),
(91, 3, 'Not so good in studies', '2022-10-14 15:49:36', 5, 33),
(92, 4, 'expresses ideas clearly, both verbally and through writing.', '2022-10-14 16:08:43', 6, 30),
(93, 4, 'Exhibits a positive outlook and attitude in the classroom.', '2022-10-17 08:24:59', 1, 30),
(94, 5, 'treats school property and the belongings of others with care and respect.\r\n', '2022-10-17 08:26:11', 2, 30),
(95, 3, 'she enjoys conversation with friends during free periods.', '2022-10-17 08:27:53', 4, 30),
(96, 4, 'good in studies and also good behaviour', '2022-10-17 08:32:21', 2, 34),
(98, 3, 'Polite Nature', '2022-10-17 08:43:46', 2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(200) NOT NULL,
  `stu_img` varchar(100) NOT NULL,
  `stu_age` varchar(200) NOT NULL,
  `stu_edu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`stu_id`, `stu_name`, `stu_img`, `stu_age`, `stu_edu`) VALUES
(1, 'Riya', 'student.webp', '18', 'BTech'),
(2, 'Aashita', 'student2.jpg', '25', 'MCA'),
(3, 'Rishabh', 'student3.webp', '19', 'BBA'),
(4, 'Lavi', 'student4.webp', '20', 'B.SC'),
(5, 'Naman', 'student5.webp', '22', 'MBA'),
(6, 'Nishchal', 'student6.jpg', '22', 'MBBS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(30, 'Aashita', 'aashita@gmail.com', '12345'),
(31, 'kushal', 'Kushal@gmail.com', 'K123'),
(32, 'Harsh', 'harsh@gmail.com', '123456'),
(33, 'Vinod', 'vinod@gmail.com', 'Vi123'),
(34, 'yyy', 'y@y.y', '12345'),
(35, 'Riya', 'riya@gmail.com', 'Riya28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `user_id` (`logger_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student_details` (`stu_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`logger_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
