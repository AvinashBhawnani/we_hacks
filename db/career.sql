-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 07:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5ddd932f8142d', '5ddd932f95592'),
('5ddd932fc093c', '5ddd932fc8af6'),
('5ddd9330028ed', '5ddd93300a467'),
('5ddd9330491e2', '5ddd93305087a'),
('5ddd93308f142', '5ddd9330972d8'),
('5de3032083f1c', '5de30320a7830'),
('5de6125cad83b', '5de6125cdd515'),
('5de6125d5173a', '5de6125d6dcfd'),
('5de6125ddded6', '5de6125e08403'),
('5de6125ea868f', '5de6125ed07d2'),
('5de6125f3de7a', '5de6125f46b61'),
('5de613e8f09d2', '5de613e90e7f9'),
('5de613ea1151e', '5de613ea2cb7d'),
('5de613ea7b915', '5de613ea865cb'),
('5de613eac7824', '5de613eacfb93'),
('5de613eb1ecee', '5de613eb31cd3'),
('5de6151d283ed', '5de6151d78d80'),
('5de6151dc29a6', '5de6151ded839'),
('5de6151e58dc0', '5de6151e63b68'),
('5de6151edd2ee', '5de6151ee5e76'),
('5de6151fc22bc', '5de6151fcac90'),
('5e60bb01bba2e', '5e60bb01d658e'),
('5e60bb0222b04', '5e60bb022d76d'),
('5e60c12accaa5', '5e60c12aec5ed'),
('5e60c12b7ca34', '5e60c12b9248c'),
('5e60cd70c0c27', '5e60cd70e0d99');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stream` text NOT NULL,
  `county` text NOT NULL,
  `course` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `stream`, `county`, `course`) VALUES
(1, 'vivekanad', 'Certificate,Diploma,Degree', 'india', 'engineering'),
(2, 'Dy patil', 'Certificate,Diploma,Degree', 'india', 'Accouting'),
(3, 'Tsec', 'Diploma', 'india', 'Business Administration'),
(6, 'VJTI', 'Certificate,Diploma,Degree', 'india', 'Aviation'),
(10, 'Somaiya', 'Certificate,Diploma,Degree', 'india', 'commerce,business administration,business management'),
(12, 'Spit', 'Certificate', 'india', 'Accouting'),
(13, 'Sabbu Sidiki', 'Diploma', 'india', 'Aviation');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `location` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`location`, `filename`, `size`) VALUES
('e-books/CAT 0NE EXAM COMP 483.docx', 'CAT 0NE EXAM COMP 483.docx', 24),
('e-books/LESSON 6.pdf', 'LESSON 6.pdf', 82),
('e-books/TOPIC THREE and FOUR.docx', 'TOPIC THREE and FOUR.docx', 78),
('e-books/LESSON7 Client- server application architecture.docx', 'LESSON7 Client- server application architecture.docx', 19),
('e-books/lesson 8 Client technologies.pdf', 'lesson 8 Client technologies.pdf', 92),
('e-books/lesson 10.pdf', 'lesson 10.pdf', 85),
('e-books/3 Threads.pdf', '3 Threads.pdf', 604),
('e-books/1 Introduction.ppt', '1 Introduction.ppt', 530);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `course`, `position`) VALUES
(1, 'Computer Science', 'Programmer'),
(3, 'Commerce', 'Accountant'),
(5, 'Aviation Industry', 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('john', '5de6142b8f28f', 4, 5, 2, 3, '2020-03-05 08:32:36'),
('mercy', '5de6142b8f28f', 4, 5, 2, 3, '2020-03-05 08:34:50'),
('mercy', '5de612f5642be', 4, 5, 2, 3, '2020-03-05 08:35:40'),
('john', '5e60ba7033b79', 10, 2, 2, 0, '2020-03-05 08:54:59'),
('john', '5e60cd5511300', 3, 1, 1, 0, '2020-03-05 10:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5ddd932f8142d', '10', '5ddd932f9557f'),
('5ddd932f8142d', '6', '5ddd932f95592'),
('5ddd932f8142d', '32', '5ddd932f9559d'),
('5ddd932f8142d', '4', '5ddd932f955a6'),
('5ddd932fc093c', '104', '5ddd932fc8ae5'),
('5ddd932fc093c', '114', '5ddd932fc8af6'),
('5ddd932fc093c', '315', '5ddd932fc8afd'),
('5ddd932fc093c', '325', '5ddd932fc8b05'),
('5ddd9330028ed', '1.7m', '5ddd93300a440'),
('5ddd9330028ed', '1.57m', '5ddd93300a45a'),
('5ddd9330028ed', '0.5m', '5ddd93300a467'),
('5ddd9330028ed', '2.5m', '5ddd93300a473'),
('5ddd9330491e2', '(x-3)(x-2)', '5ddd93305085a'),
('5ddd9330491e2', ' (x-3)(3y-2)', '5ddd93305087a'),
('5ddd9330491e2', '(x-3)2            ', '5ddd93305088a'),
('5ddd9330491e2', '3y(x-3)', '5ddd933050898'),
('5ddd93308f142', '2', '5ddd9330972b8'),
('5ddd93308f142', '-31', '5ddd9330972ce'),
('5ddd93308f142', '5', '5ddd9330972d8'),
('5ddd93308f142', '-5', '5ddd9330972e0'),
('5de3032083f1c', '7', '5de30320a7830'),
('5de3032083f1c', '5', '5de30320a7864'),
('5de3032083f1c', '8', '5de30320a7871'),
('5de3032083f1c', '6', '5de30320a7879'),
('5de6125cad83b', '104', '5de6125cdd4f7'),
('5de6125cad83b', '114', '5de6125cdd515'),
('5de6125cad83b', '325', '5de6125cdd51e'),
('5de6125cad83b', '315', '5de6125cdd527'),
('5de6125d5173a', '10', '5de6125d6dcdb'),
('5de6125d5173a', '4', '5de6125d6dcf1'),
('5de6125d5173a', '6', '5de6125d6dcfd'),
('5de6125d5173a', '8', '5de6125d6dd13'),
('5de6125ddded6', '  (x-3)2           ', '5de6125e083f1'),
('5de6125ddded6', '3y(x-3)', '5de6125e083fe'),
('5de6125ddded6', '(x-3)(3y-2)     ', '5de6125e08403'),
('5de6125ddded6', '(x-3)(x-2)', '5de6125e0840b'),
('5de6125ea868f', '0.5m', '5de6125ed07d2'),
('5de6125ea868f', '1.7m', '5de6125ed07f8'),
('5de6125ea868f', '2.0m', '5de6125ed0807'),
('5de6125ea868f', '1.57m', '5de6125ed0815'),
('5de6125f3de7a', '-32', '5de6125f46b3e'),
('5de6125f3de7a', '-5', '5de6125f46b50'),
('5de6125f3de7a', '-25', '5de6125f46b59'),
('5de6125f3de7a', '5', '5de6125f46b61'),
('5de613e8f09d2', 'Unless', '5de613e90e7ec'),
('5de613e8f09d2', 'Till', '5de613e90e7f9'),
('5de613e8f09d2', 'Although', '5de613e90e7fd'),
('5de613e8f09d2', 'Even', '5de613e90e801'),
('5de613ea1151e', '  no improvement.', '5de613ea2cb4e'),
('5de613ea1151e', 'wooden and broken chair.     ', '5de613ea2cb6d'),
('5de613ea1151e', 'broken wooden chair.    ', '5de613ea2cb7d'),
('5de613ea1151e', 'broken and wooden chair.', '5de613ea2cb8e'),
('5de613ea7b915', 'from', '5de613ea865b9'),
('5de613ea7b915', 'for', '5de613ea865c4'),
('5de613ea7b915', 'through', '5de613ea865c8'),
('5de613ea7b915', 'of', '5de613ea865cb'),
('5de613eac7824', 'consists', '5de613eacfb93'),
('5de613eac7824', 'depicts', '5de613eacfb9f'),
('5de613eac7824', 'portrays', '5de613eacfba5'),
('5de613eac7824', 'shows', '5de613eacfbaa'),
('5de613eb1ecee', 'was always there.      ', '5de613eb31cc6'),
('5de613eb1ecee', 'will always be there.', '5de613eb31cd3'),
('5de613eb1ecee', 'is more today than ever before.   ', '5de613eb31cd9'),
('5de613eb1ecee', 'is no longer there.   ', '5de613eb31cde'),
('5de6151d283ed', '1', '5de6151d78d43'),
('5de6151d283ed', '4', '5de6151d78d5f'),
('5de6151d283ed', '6', '5de6151d78d71'),
('5de6151d283ed', '5', '5de6151d78d80'),
('5de6151dc29a6', 'A', '5de6151ded811'),
('5de6151dc29a6', 'AB', '5de6151ded82b'),
('5de6151dc29a6', 'O', '5de6151ded839'),
('5de6151dc29a6', 'B', '5de6151ded847'),
('5de6151e58dc0', 'Gliding ', '5de6151e63b58'),
('5de6151e58dc0', 'mortise and tenon         ', '5de6151e63b68'),
('5de6151e58dc0', 'ball and socket       ', '5de6151e63b6d'),
('5de6151e58dc0', 'suture', '5de6151e63b71'),
('5de6151edd2ee', '260000 million', '5de6151ee5e66'),
('5de6151edd2ee', '26 million  ', '5de6151ee5e71'),
('5de6151edd2ee', '2.6 million', '5de6151ee5e76'),
('5de6151edd2ee', '260 million', '5de6151ee5e79'),
('5de6151fc22bc', 'Lungs', '5de6151fcac90'),
('5de6151fc22bc', 'pituitary gland                  ', '5de6151fcaca5'),
('5de6151fc22bc', 'adrenal gland                     ', '5de6151fcacaf'),
('5de6151fc22bc', 'thyroid gland', '5de6151fcacb9'),
('5e60bb01bba2e', 'English', '5e60bb01d6577'),
('5e60bb01bba2e', 'Marathi', '5e60bb01d6584'),
('5e60bb01bba2e', 'Hindi', '5e60bb01d6588'),
('5e60bb01bba2e', 'C', '5e60bb01d658e'),
('5e60bb0222b04', 'print()', '5e60bb022d76d'),
('5e60bb0222b04', 'printf()', '5e60bb022d780'),
('5e60bb0222b04', 'system.out.print()', '5e60bb022d784'),
('5e60bb0222b04', 'print_r()', '5e60bb022d787'),
('5e60c12accaa5', 'Indian police code', '5e60c12aec5e8'),
('5e60c12accaa5', 'Italy penalty code', '5e60c12aec5ec'),
('5e60c12accaa5', 'Indian penal code', '5e60c12aec5ed'),
('5e60c12accaa5', 'Indian penalty code', '5e60c12aec5ee'),
('5e60c12b7ca34', 'Rape', '5e60c12b92488'),
('5e60c12b7ca34', 'Roberry', '5e60c12b9248c'),
('5e60c12b7ca34', 'Sexual assult', '5e60c12b9248d'),
('5e60c12b7ca34', 'Intimidation', '5e60c12b9248e'),
('5e60cd70c0c27', '8', '5e60cd70e0d99'),
('5e60cd70c0c27', '7', '5e60cd70e0da4'),
('5e60cd70c0c27', '9', '5e60cd70e0dab'),
('5e60cd70c0c27', '2', '5e60cd70e0db6');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5de610650ad29', '5de6125cad83b', 'The sum of two numbers is 25 and their difference is 13. Find their product', 4, 1),
('5de610650ad29', '5de6125d5173a', 'The value of x + x (x)when x = 2 is:', 4, 2),
('5de610650ad29', '5de6125ddded6', 'Factor: 3y(x-3) -2 (x-3)', 4, 3),
('5de610650ad29', '5de6125ea868f', 'What is the radius of a circle that has a circumference of 3.14 meters?', 4, 4),
('5de610650ad29', '5de6125f3de7a', 'Which is greater than 4?', 4, 5),
('5de612f5642be', '5de613e8f09d2', '_________ the arrival of the police, nobody went near the victim.', 4, 1),
('5de612f5642be', '5de613ea1151e', 'He found a wooden broken chair in the room', 4, 2),
('5de612f5642be', '5de613ea7b915', 'The boy was cured __________ typhoid.', 4, 3),
('5de612f5642be', '5de613eac7824', 'True brevity______ in saying only what needs to be said.', 4, 4),
('5de612f5642be', '5de613eb1ecee', 'The need for a greater understanding between nations__________', 4, 5),
('5de6142b8f28f', '5de6151d283ed', 'How many basic tastes can humans sense?', 4, 1),
('5de6142b8f28f', '5de6151dc29a6', 'Which blood group is called the \"universal donor\"?', 4, 2),
('5de6142b8f28f', '5de6151e58dc0', 'Which of these joints is not found in the human body?', 4, 3),
('5de6142b8f28f', '5de6151edd2ee', 'How many sweat glands does the average person have?', 4, 4),
('5de6142b8f28f', '5de6151fc22bc', 'Which of these is not part of the endocrine system?', 4, 5),
('5e60ba7033b79', '5e60bb01bba2e', 'Which of following is programming language?', 4, 1),
('5e60ba7033b79', '5e60bb0222b04', 'Function for print statement in python 3 is?', 4, 2),
('5e60bf55443f3', '5e60c12accaa5', 'IPC full form?', 4, 1),
('5e60bf55443f3', '5e60c12b7ca34', 'Section 420 is for?', 4, 2),
('5e60cd5511300', '5e60cd70c0c27', '5+3=?', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5de610650ad29', 'Mathematics', 2, 0, 5, 10, 'Mathematics test', 'Maths', '2019-12-03 07:36:05'),
('5de612f5642be', 'English', 2, 0, 5, 10, 'English Test', 'English', '2019-12-03 07:47:01'),
('5de6142b8f28f', 'Biology', 2, 0, 5, 10, 'Biology Test', 'Biology', '2019-12-03 07:52:11'),
('5e60ba7033b79', 'Programming', 5, 1, 2, 10, '', '', '2020-03-05 08:38:08'),
('5e60bf55443f3', 'Law', 1, 0, 2, 1, '', '', '2020-03-05 08:59:01'),
('5e60cd5511300', 'Finance', 3, 1, 1, 5, '', '', '2020-03-05 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `username` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `rec` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`username`, `score`, `rec`, `time`) VALUES
('john', 13, 100, '2020-03-05 10:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `registrar`
--

CREATE TABLE `registrar` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrar`
--

INSERT INTO `registrar` (`id`, `username`, `email`, `password`) VALUES
(1, 'registrar', 'registrar@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(52) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `username`, `email`, `reg_date`, `password`) VALUES
(1, 'John', 'Kimani', 'male', 'john', 'john@gmail.com', '2020-03-05 08:11:35', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(2, 'Mercy', 'Wambui', 'female', 'mercy', 'mercy@gmail.com', '2020-03-05 08:12:00', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, 'Carlos', 'Martinez', 'male', 'carlos', 'carlos@gmail.com', '2020-03-05 08:12:06', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrar`
--
ALTER TABLE `registrar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registrar`
--
ALTER TABLE `registrar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
