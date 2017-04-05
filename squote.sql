-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2017 at 08:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squote`
--

-- --------------------------------------------------------

--
-- Table structure for table `font_color`
--

CREATE TABLE `font_color` (
  `id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `font_color`
--

INSERT INTO `font_color` (`id`) VALUES
('black'),
('green'),
('red'),
('white'),
('yellow');

-- --------------------------------------------------------

--
-- Table structure for table `font_size`
--

CREATE TABLE `font_size` (
  `id` int(11) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `font_size`
--

INSERT INTO `font_size` (`id`, `size`) VALUES
(1, 'tiny'),
(2, 'normal'),
(3, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `font_size` int(11) NOT NULL,
  `font_color` varchar(255) NOT NULL,
  `quote_owner` varchar(255) NOT NULL,
  `text_highlight_color` varchar(255) NOT NULL,
  `quote_type` int(11) NOT NULL,
  `quote_text` varchar(2000) NOT NULL,
  `quote_picture` varchar(1000) NOT NULL,
  `quote_posisition` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `title`, `font_size`, `font_color`, `quote_owner`, `text_highlight_color`, `quote_type`, `quote_text`, `quote_picture`, `quote_posisition`) VALUES
(2, 'a', 2, 'red', 'asd', 'bg-green', 2, 'dasdas', 'images/images.jpeg', 'bot-right'),
(3, 'asd', 2, 'green', 'rere', 'bg-black', 1, 'sadasdasdasd', 'images/images.jpeg', 'top');

-- --------------------------------------------------------

--
-- Table structure for table `quote_posisition`
--

CREATE TABLE `quote_posisition` (
  `id` varchar(25) NOT NULL,
  `posisition` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_posisition`
--

INSERT INTO `quote_posisition` (`id`, `posisition`) VALUES
('bot-left', 'bot | left'),
('bot-right', 'bot | right'),
('bottom', 'bottom'),
('top', 'top'),
('top-left', 'top | left'),
('top-right', 'top | right');

-- --------------------------------------------------------

--
-- Table structure for table `quote_type`
--

CREATE TABLE `quote_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_type`
--

INSERT INTO `quote_type` (`id`, `type`) VALUES
(1, 'Love'),
(2, 'Life'),
(3, 'Motivation'),
(4, 'Sarcasm'),
(5, 'Friendship'),
(6, 'Worship');

-- --------------------------------------------------------

--
-- Table structure for table `text_highlight_color`
--

CREATE TABLE `text_highlight_color` (
  `id` varchar(25) NOT NULL,
  `highlight_color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_highlight_color`
--

INSERT INTO `text_highlight_color` (`id`, `highlight_color`) VALUES
('bg-black', 'black'),
('bg-green', 'green'),
('bg-red', 'red'),
('bg-white', 'white'),
('bg-yellow', 'yellow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `font_color`
--
ALTER TABLE `font_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `font_size`
--
ALTER TABLE `font_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Type` (`quote_type`),
  ADD KEY `FK_Quote_Posisition` (`quote_posisition`),
  ADD KEY `FK_FONT_COLOR` (`font_color`),
  ADD KEY `FK_FONT_SIZE` (`text_highlight_color`),
  ADD KEY `FK_FontSize` (`font_size`);

--
-- Indexes for table `quote_posisition`
--
ALTER TABLE `quote_posisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_type`
--
ALTER TABLE `quote_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_highlight_color`
--
ALTER TABLE `text_highlight_color`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quote`
--
ALTER TABLE `quote`
  ADD CONSTRAINT `FK_FONT_COLOR` FOREIGN KEY (`font_color`) REFERENCES `font_color` (`id`),
  ADD CONSTRAINT `FK_FONT_SIZE` FOREIGN KEY (`text_highlight_color`) REFERENCES `text_highlight_color` (`id`),
  ADD CONSTRAINT `FK_FontSize` FOREIGN KEY (`font_size`) REFERENCES `font_size` (`id`),
  ADD CONSTRAINT `FK_Quote_Posisition` FOREIGN KEY (`quote_posisition`) REFERENCES `quote_posisition` (`id`),
  ADD CONSTRAINT `FK_Type` FOREIGN KEY (`quote_type`) REFERENCES `quote_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
