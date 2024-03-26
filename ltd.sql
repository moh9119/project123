-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 يونيو 2023 الساعة 21:17
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltd`
--

-- --------------------------------------------------------

--
-- بنية الجدول `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `statue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `lname`, `email`, `password`, `type`, `statue`) VALUES
(8, 'Mohammad', 'Masloom', 'going2052@gmail.com', 'Mohammad@123', 2, 1),
(10, 'ahmed', 'alo', 'alo@gmail.com', 'M@123456789m', 3, 0),
(11, 'moh', 'ahmed', 'ah@gmail.com', 'M@123456789m', 1, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `phone`) VALUES
(8, 'Mohammad', 'Masloom', 'going2052@gmail.com', 'Mohammad@123', '0555555555');

-- --------------------------------------------------------

--
-- بنية الجدول `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL,
  `s_time` varchar(20) NOT NULL,
  `e_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `books`
--

INSERT INTO `books` (`id`, `event_id`, `user_id`, `event_name`, `city`, `date`, `s_time`, `e_time`) VALUES
(8, 12, 11, '1', 'Najran', '2023-06-05', '13:22', '14:22');

-- --------------------------------------------------------

--
-- بنية الجدول `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `chat`
--

INSERT INTO `chat` (`id`, `events_id`, `sender_id`, `sender_name`, `message`) VALUES
(8, 7, 7, 'fbfb', 'hi'),
(9, 7, 7, 'fbfb', 'hla wallh'),
(10, 7, 7, 'fbfb', 'jknlnl'),
(11, 7, 6, 'aaa', 'hi'),
(12, 7, 6, 'aaa', 'gg'),
(13, 7, 6, 'aaa', 'wp'),
(14, 7, 6, 'aaa', 'ws'),
(15, 8, 11, 'moh', 'hi'),
(16, 0, 11, 'moh', 'wellcome'),
(17, 8, 11, 'moh', 'wellcome');

-- --------------------------------------------------------

--
-- بنية الجدول `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `s_time` varchar(20) NOT NULL,
  `e_time` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `coordinator_name` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `log` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `events`
--

INSERT INTO `events` (`id`, `name`, `s_time`, `e_time`, `date`, `category`, `city`, `coordinator_id`, `coordinator_name`, `lat`, `log`) VALUES
(12, '1', '13:22', '14:22', '2023-06-05', 'Sport', 'Najran', 10, 'ahmed', 17.565153816579993, 44.227689246990735),
(13, '2', '13:23', '18:23', '2023-06-05', 'Culture', 'Al Riadh', 10, 'ahmed', 24.661682372088162, 46.605892181396484),
(14, '3', '13:25', '15:25', '2023-06-05', 'Education', 'Jazan', 10, 'ahmed', 16.963613547252294, 42.544467103466204),
(15, '6', '17:20', '18:20', '2023-06-05', 'Sport', 'Jazan', 11, 'moh', 16.921645366976936, 42.54696495722088);

-- --------------------------------------------------------

--
-- بنية الجدول `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `user_name`, `type`) VALUES
(3, 9, 'mauth', 2),
(4, 9, 'mauth', 2),
(5, 6, 'aaa', 3),
(6, 7, 'fbfb1234', 3),
(8, 7, 'fbfb1234', 1),
(9, 7, 'fbfb1234', 1),
(10, 13, 'hjh', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `age`, `gender`, `city`) VALUES
(1, 'khalid', 'alwadie', 'khalid@gmail.com', 'Khalid@12345678', '0511111111', '1', 'male', 'Najran'),
(4, 'test', 'test', 'test@gmail.com', 'Test@12345678', '0511111111', '1', 'male', 'Najran'),
(5, 'aaa', 'bbb', 'going@gmail.com', 'Mohammad@9119', '0555555555', '23', 'male', 'Najran'),
(6, 'moh', 'Moh', 'going2552@gmail.com', 'Mohammad@9119', '0559022550', '23', 'male', 'Najran'),
(7, 'fbfb1234', 'klvf', 'goi2ng@gmail.com', 'Lol321321321@', '0555555555', '23', 'male', 'Najran'),
(11, 'moh', 'ahmed', 'ah@gmail.com', 'M@123456789m', '0500000000', '24', 'male', 'Najran'),
(13, 'hjh', 'jhj', 'cx@gmail.com', 'Cx@123123123', '0598376457', '21', 'male', 'Jazan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
