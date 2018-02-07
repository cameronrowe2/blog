-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2018 at 11:16 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `fp_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `email`, `username`, `password`, `image`, `fp_hash`) VALUES
(20, 'cameron.rowe.au@gmail.com', 'peezer', '$2y$10$7BZBE.E7WjyaYiFP1WgIV.3c4FBxgfXnQOra/FzFY0orkTfx5kxSy', NULL, NULL),
(21, 'djcameronrowe@gmail.com', 'pototo', '$2y$10$7aZca5gCenFXy.XWF1Xvl.ekHzs2ifad30zwlAO8GscacyptHPDyG', NULL, NULL),
(22, 'cameronrowe2@bigpond.com', 'pototo2', '$2y$10$Z6j0xizjzAfKpWwnhELgO.NLleVDnhUMLfrtc536AYAwf0T.UHGAy', NULL, NULL),
(23, 'cameronroweau@gmail.com', 'pooloer', '$2y$10$RvdVJCbX5lxqZ4oHB9JzsObFCRYrd6YTHCRNrPtlvJzd8SjpOeWYO', 'images/90.png', '$2y$10$7pI5zJBh6ZVUbk7JD2t19.6m9wbooBX04cD/5wzhHBTvTTMIu6ujG'),
(24, 'cameronroweau2@gmail.com', 'runner', '$2y$10$63hkXi6HnQSGrCGOkFagmO9GvJJu9A7DG8FjLir.Rdg94RCPI3KMO', 'images/49.jpg', NULL),
(25, 'jeff@gmail.com', 'Jeffee', '$2y$10$UrR9skW432SD8.7TjLKEYuXtBVNbQgkSNxVMVT4.AiSCdCyj6Ct6S', 'images/75.png', NULL),
(26, 'cameronroweau3@gmail.com', 'robbie', '$2y$10$limTuCfeu3TWD/JwqzvpPOMMN/ee/bNC57X9baf.X35NgxG7ayR9e', 'images/76.jpg', NULL),
(27, 'amyrowe@bigpond.com', 'pelican', '$2y$10$c.HYaqXHKRs9L/W40MxQw.xKLlmAlqkqGzqlgVoF38ZDw.GvcD6Qi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `text`, `pid`, `aid`) VALUES
(21, 'yum yum', 16, 22),
(22, 'yum yum', 16, 22),
(23, 'totot', 16, 22),
(24, 'ol', 16, 22),
(25, 'lol', 16, 22),
(26, 'lol', 16, 22),
(27, 'lol', 16, 22),
(28, 'lol', 16, 22),
(29, 'lol', 16, 22),
(30, 'lol', 16, 22),
(31, 'lol', 16, 22),
(32, 'lol', 16, 22),
(33, 'lol', 16, 22),
(34, 'lol', 16, 22),
(35, 'haha', 16, 22),
(36, 'bum', 16, 22),
(37, 'Jeff', 31, 25),
(38, 'I love theme parks', 31, 25),
(39, 'boom', 32, 26),
(40, 'haha', 32, 26),
(41, 'what?', 32, 26),
(42, 'I love that', 32, 26),
(43, 'Its cool', 32, 26),
(44, 'I want to buy a fridge really bad, they are awesome', 32, 26),
(45, '', 32, 26),
(46, '', 32, 26),
(47, 'They\'re cool', 32, 26),
(48, 'lol', 32, 26),
(49, 'lol', 32, 26),
(50, 'haha', 32, 26),
(51, 'lol', 40, 23),
(52, 'lol', 40, 23),
(53, 'hahaha', 40, 23),
(54, 'hekki', 40, 23),
(55, 'That\'s true', 42, 23);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `text`, `title`, `image`, `aid`) VALUES
(16, 'hoggos', 'haha', 'images/33.jpg', 21),
(17, 'Giraffe', 'Post', 'images/34.jpg', 22),
(18, 'Testing', 'Test', 'images/42.jpg', 23),
(19, 'I love wombats', 'Wombats', 'images/44.jpg', 23),
(20, 'I love wombats', 'Wombats', 'images/45.jpg', 23),
(21, 'Kangaroo', 'Kangaroo', 'images/46.jpg', 23),
(22, 'Little fish swim swim swim', 'Little fish', 'images/47.png', 24),
(23, 'One day I met Fred on a walk to the beach. It was fun.', 'Fred', 'images/50.png', 24),
(24, 'Jurrasic Parks is a cool set of movies to watch.', 'Jurrasic', 'images/53.jpg', 24),
(25, 'Jurrassic Park is a cool set of movies to watch.', 'Jurrassic', 'images/56.jpg', 24),
(26, 'Jurrassic PArk is a cool set of movies to watch. Ive seen them all. Theyre cool.', 'Jurrassic', 'images/58.jpg', 24),
(27, 'I\'ve eaten.', 'Jurrassic', 'images/59.jpg', 24),
(28, 'I\'ve', 'Ive', 'images/61.jpg', 24),
(29, 'Here is an awesome theme park. I love Theme Parks. They\'re so much fun.', 'Theme Park', 'images/62.jpg', 25),
(30, '', '', 'images/63', 25),
(31, 'g', 'g', 'images/68.jpg', 25),
(32, 'I love fridges', 'Fridge', 'images/77.jpeg', 26),
(33, 'I love chairs', 'Chair', 'images/78.JPG', 23),
(34, 'chair', 'Chair', 'images/79.JPG', 23),
(35, 'chair', 'chairs', 'images/81.JPG', 23),
(36, 'lol', 'lol', 'images/82.JPG', 23),
(37, 'lol', 'lol', 'images/83.JPG', 23),
(38, 'lol', 'lol', 'images/84.JPG', 23),
(39, 'tp', 'hahaha', 'images/85.jpg', 23),
(40, 'lol', 'tp', 'images/86.jpg', 23),
(41, 'penguin', 'HAha', 'images/87.png', 23),
(42, 'I don\'t code, but my brother does', 'Blob', 'images/88.jpg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `word` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `decay` float NOT NULL,
  `last_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`word`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
