-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 10:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competency`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) NOT NULL,
  `project` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `eid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project`, `duration`, `eid`) VALUES
(1, 'database', '', 5),
(2, 'Website', '10', 7);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) NOT NULL,
  `skill` varchar(30) NOT NULL,
  `cdimension` varchar(30) NOT NULL,
  `competency` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `cdimension`, `competency`) VALUES
(4, 'Decision Making', 'Deciding and Initiating Action', 'Leading and Deciding'),
(5, 'Leadership skills', 'Leading and Supervising', 'Supporting and cooperating'),
(6, 'Teamwork', 'Working With People', 'Interacting and Presenting'),
(7, 'Collaborating with other', 'Adhering with Principles and V', 'Analyzing and Interpreating'),
(8, 'Respecting Ethics', 'Relating with Networks', 'Creating and conceptualizing'),
(9, 'Environmental Awareness', 'Persuading', 'Organization and Execuating'),
(10, 'Awareness of Ergonomics', 'Presenting and Communicating', 'Adapting and Coping'),
(11, 'Compromising', 'Writing and Reporting', 'Enterprising and Performing'),
(12, 'Creating business Networks', 'Applying Expertise and Technol', ''),
(13, 'Maintaining Customer Relations', 'Analyzing', ''),
(14, 'Negotiating', 'Learning and Researching', ''),
(15, 'Emotional Intelligence', 'Creating and Innovating', ''),
(16, 'Presentation and Communication', 'Formulating Concepts', ''),
(17, 'Technical Communication', 'Planning and Orginizaing', ''),
(18, 'Literacy', 'Delivering Results', ''),
(19, 'Economics', 'Following Instructions', ''),
(20, 'Problem Solving', 'Responsive to Charge', ''),
(21, 'System Development', 'Influencing', ''),
(22, 'Development', 'Achieving Goals', ''),
(23, 'Project Management', 'Entrepreneurial Thinking', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N',
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `cdimension` varchar(50) NOT NULL DEFAULT 'Not Assigned Yet',
  `competency` varchar(30) NOT NULL DEFAULT 'Not Assigned Yet',
  `projectassigned` varchar(50) NOT NULL DEFAULT 'N',
  `cassigned` varchar(1) NOT NULL DEFAULT 'N',
  `city` varchar(30) NOT NULL,
  `project` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `pass`, `gender`, `skills`, `role`, `status`, `active`, `cdimension`, `competency`, `projectassigned`, `cassigned`, `city`, `project`, `duration`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '123456', '--', '--', 'admin', 'O', 'N', '', '', 'Y', 'N', '', '', ''),
(6, 'Manager', 'manager@gmail.com', 'manager', 'manager123', '--', '--', 'manager', 'O', 'N', 'Not Assigned Yet', 'Not Assigned Yet', 'N', 'N', '--', '', ''),
(8, 'Mark', 'mark@gmail.com', 'mark', 'mark123', 'Male', ' Decision Making, Teamwork, Collaborating with other, Compromising, Maintaining Customer Relations, Negotiating', 'user', 'O', 'N', ' Deciding and Initiating Action', ' Leading and Deciding', 'Y', 'Y', 'Sydney', 'database', '10'),
(9, 'David', 'david@gmail.com', 'david', 'david123', 'Male', ' Decision Making, Teamwork, Problem Solving, System Development, Development, Project Management', 'user', 'O', 'Y', ' Deciding and Initiating Action', 'Not Assigned Yet', 'N', 'N', 'Sydney', '', ''),
(12, 'Mishal', 'mishal@gmail.com', 'mishal', '123456', 'Female', ' Decision Making, Leadership skills, Collaborating with other, Maintaining Customer Relations', 'user', 'O', 'Y', ' Leading and Supervising', ' Interacting and Presenting', 'Y', 'Y', 'Sydney', 'Website', '10'),
(13, 'Mishal', 'mishal1@gmail.com', 'mishal1', '123456', 'Female', ' Decision Making, Teamwork, Collaborating with other', 'user', 'O', 'Y', ' Leading and Supervising', ' Interacting and Presenting', 'N', 'Y', 'Sydney', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
