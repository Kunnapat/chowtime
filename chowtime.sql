-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 10:04 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chowtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `content` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `question_id` int(2) NOT NULL,
  `choice_id` int(1) NOT NULL,
  `quiz_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(4) NOT NULL,
  `datetime` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(4) DEFAULT NULL,
  `topic_id` int(5) NOT NULL,
  `staff_id` int(2) DEFAULT NULL,
  `comment_pics` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(4) NOT NULL,
  `subscribe` tinyint(1) NOT NULL,
  `address` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(3) NOT NULL,
  `ename` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `organizer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(2) NOT NULL,
  `event_pics` blob
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `ename`, `start_date`, `end_date`, `organizer`, `type`, `description`, `staff_id`, `event_pics`) VALUES
(11, 'a', '2015-03-01 00:00:00', '2015-03-01 00:00:00', 'a', 'a', '', 1, NULL),
(222, 'Doe', '2015-10-01 00:00:00', '2015-11-01 00:00:00', 'aummy', 'best', 'eieigumgum', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE IF NOT EXISTS `exhibitions` (
  `exhibition_id` int(3) NOT NULL,
  `ename` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `organizer` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(2) NOT NULL,
  `exhibition_pics` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhitbition_items`
--

CREATE TABLE IF NOT EXISTS `exhitbition_items` (
  `item_id` int(5) NOT NULL,
  `iname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `desciption` text COLLATE utf8_unicode_ci,
  `item_pics` blob NOT NULL,
  `exhibition_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(5) NOT NULL,
  `resolution` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `iname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(4) NOT NULL,
  `fname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `secure_quest` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `secure_ans` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `fav_event` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pics` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `newsletter_id` int(4) NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `staff_id` int(2) NOT NULL,
  `email_id` int(4) NOT NULL,
  `news_pics` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `play`
--

CREATE TABLE IF NOT EXISTS `play` (
  `score` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `member_id` int(4) NOT NULL,
  `quiz_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(1) NOT NULL,
  `content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_pics` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `quiz_id` int(2) NOT NULL,
  `qname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `staff_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int(5) NOT NULL,
  `reservation_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `event_id` int(3) NOT NULL,
  `member_id` int(4) NOT NULL,
  `round_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_seats`
--

CREATE TABLE IF NOT EXISTS `reserve_seats` (
  `reservation_id` int(5) NOT NULL,
  `seat_id` int(3) NOT NULL,
  `round_id` int(2) NOT NULL,
  `event_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE IF NOT EXISTS `rounds` (
  `round_id` int(2) NOT NULL,
  `location` varchar(20) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `language` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `event_id` int(3) NOT NULL,
  `staff_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `seat_id` int(3) NOT NULL,
  `seat_number` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `round_id` int(2) NOT NULL,
  `event_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `send_news`
--

CREATE TABLE IF NOT EXISTS `send_news` (
  `newsletter_id` int(4) NOT NULL,
  `staff_id` int(2) NOT NULL,
  `email_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `staff_id` int(2) NOT NULL,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_pics` blob
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `username`, `password`, `fname`, `lname`, `email`, `tel`, `birthdate`, `gender`, `staff_pics`) VALUES
(1, 'toppy', '1234', 'p', 'v', 'aa', 8, '0000-00-00', 'm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(5) NOT NULL,
  `category` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `member_id` int(4) DEFAULT NULL,
  `staff_id` int(2) DEFAULT NULL,
  `topic_pics` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`question_id`,`choice_id`,`quiz_id`), ADD KEY `question_id` (`question_id`), ADD KEY `choice_id` (`choice_id`), ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`,`topic_id`), ADD KEY `topic_id` (`topic_id`), ADD KEY `staff_id` (`staff_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `member_id` (`member_id`), ADD KEY `topic_id_2` (`topic_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`), ADD KEY `event_id` (`event_id`), ADD KEY `event_id_2` (`event_id`), ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`exhibition_id`), ADD KEY `staff_id` (`staff_id`), ADD KEY `exhibition_id` (`exhibition_id`);

--
-- Indexes for table `exhitbition_items`
--
ALTER TABLE `exhitbition_items`
  ADD PRIMARY KEY (`item_id`), ADD KEY `item_id` (`item_id`), ADD KEY `exhibition_id` (`exhibition_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`), ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsletter_id`), ADD KEY `email_id` (`email_id`), ADD KEY `staff_id` (`staff_id`), ADD KEY `email_id_2` (`email_id`);

--
-- Indexes for table `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`member_id`,`quiz_id`), ADD KEY `member_id` (`member_id`), ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`), ADD KEY `question_id` (`question_id`), ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`), ADD KEY `quiz_id` (`quiz_id`), ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`), ADD KEY `reservation_code` (`reservation_code`), ADD KEY `event_id` (`event_id`), ADD KEY `member_id` (`member_id`), ADD KEY `round_id` (`round_id`);

--
-- Indexes for table `reserve_seats`
--
ALTER TABLE `reserve_seats`
  ADD PRIMARY KEY (`reservation_id`,`seat_id`,`round_id`,`event_id`), ADD KEY `seat_id` (`seat_id`), ADD KEY `round_id` (`round_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`round_id`), ADD KEY `staff_id` (`staff_id`), ADD KEY `round_id` (`round_id`), ADD KEY `event_id` (`event_id`), ADD KEY `round_id_2` (`round_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`round_id`,`event_id`), ADD KEY `round_id` (`round_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `send_news`
--
ALTER TABLE `send_news`
  ADD PRIMARY KEY (`newsletter_id`), ADD KEY `staff_id` (`staff_id`), ADD KEY `email_id` (`email_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`), ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`), ADD KEY `topic_id` (`topic_id`), ADD KEY `member_id` (`member_id`), ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `exhibition_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exhitbition_items`
--
ALTER TABLE `exhitbition_items`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsletter_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `round_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `choices_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibitions`
--
ALTER TABLE `exhibitions`
ADD CONSTRAINT `exhibitions_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhitbition_items`
--
ALTER TABLE `exhitbition_items`
ADD CONSTRAINT `exhitbition_items_ibfk_1` FOREIGN KEY (`exhibition_id`) REFERENCES `exhibitions` (`exhibition_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletters`
--
ALTER TABLE `newsletters`
ADD CONSTRAINT `newsletters_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `newsletters_ibfk_2` FOREIGN KEY (`email_id`) REFERENCES `email` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `play`
--
ALTER TABLE `play`
ADD CONSTRAINT `play_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `play_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve_seats`
--
ALTER TABLE `reserve_seats`
ADD CONSTRAINT `reserve_seats_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `reserve_seats_ibfk_2` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `reserve_seats_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rounds`
--
ALTER TABLE `rounds`
ADD CONSTRAINT `rounds_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rounds_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `send_news`
--
ALTER TABLE `send_news`
ADD CONSTRAINT `send_news_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `send_news_ibfk_2` FOREIGN KEY (`email_id`) REFERENCES `email` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
