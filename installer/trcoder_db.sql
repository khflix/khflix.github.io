-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2023 at 05:31 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dstreampro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'bdccf21c8f522e6a45c2a227fcaa8e9e');

-- --------------------------------------------------------

--
-- Table structure for table `ads_list`
--

CREATE TABLE `ads_list` (
  `id` int(11) NOT NULL,
  `ads` varchar(10000) DEFAULT NULL,
  `popupads` varchar(10000) DEFAULT NULL,
  `vastads` varchar(10000) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ads_list`
--

INSERT INTO `ads_list` (`id`, `ads`, `popupads`, `vastads`, `posting_date`) VALUES
(67, 'ON', '<script src=\"https://bobabillydirect.org/v3/a/pop/js/217452\" async></script>\r\n<script data-cfasync=\"false\" async type=\"text/javascript\" src=\"//bidreeaxioms.com/rEG7MHNckXm1M7/40628\"></script>\r\n', 'https://bobabillydirect.org/v2/a/prl/vst/218492', '2023-06-27 19:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_domains_list`
--

CREATE TABLE `allowed_domains_list` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `allowed_domains_list`
--

INSERT INTO `allowed_domains_list` (`id`, `domain`, `posting_date`) VALUES
(12, 'dstreampro.xyz', '2023-06-30 18:28:56'),
(13, 'wbnewstv.com', '2023-06-30 18:29:20'),
(15, 'jiomovies.online', '2023-07-02 17:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `player_controls`
--

CREATE TABLE `player_controls` (
  `id` int(11) NOT NULL,
  `download` varchar(300) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `player_controls`
--

INSERT INTO `player_controls` (`id`, `download`, `posting_date`) VALUES
(1, 'ON', '2023-06-27 19:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contactno`, `posting_date`) VALUES
(33, 'roshan', 'roshan', 'roshandrive13@gmail.com', '@Rd123456', '9685748596', '2023-06-29 07:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `video_list`
--

CREATE TABLE `video_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `poster` varchar(300) DEFAULT NULL,
  `subtitle` varchar(300) DEFAULT NULL,
  `host` varchar(300) DEFAULT NULL,
  `direct_link` varchar(300) DEFAULT NULL,
  `embed_code` varchar(300) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `video_list`
--

INSERT INTO `video_list` (`id`, `title`, `url`, `poster`, `subtitle`, `host`, `direct_link`, `embed_code`, `posting_date`) VALUES
(120, 'Gofile Test', 'https://gofile.io/d/oRAMfK', '', '', 'gofile', 'https://dstreampro.xyz/play.php?uid=120', '<iframe src=\"https://dstreampro.xyz/play.php?uid=120\" width=\"100%\" height=\"380px\" frameborder=\"0\" scrolling=\"no\" allowfullscreen></iframe>', '2023-07-11 05:19:39'),
(121, 'Doostream Test', 'https://doodstream.com/d/p1r85dfb6zgz', '', '', 'doodstream', 'https://dstreampro.xyz/play.php?uid=121', '<iframe src=\"https://dstreampro.xyz/play.php?uid=121\" width=\"100%\" height=\"380px\" frameborder=\"0\" scrolling=\"no\" allowfullscreen></iframe>', '2023-07-11 05:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `views` bigint(20) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`views`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workers_list`
--

CREATE TABLE `workers_list` (
  `id` int(11) NOT NULL,
  `workers` varchar(10000) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `workers_list`
--

INSERT INTO `workers_list` (`id`, `workers`, `posting_date`) VALUES
(1, 'https://streampro.fihag47015.workers.dev,https://streampro2.fihag47015.workers.dev,https://helloworldstreampro.fihag47015.workers.dev,https://streampro5.vosodi3559.workers.dev,https://streampro.tiher56899.workers.dev,https://streampro.jicevey694.workers.dev,https://streampro.memap66651.workers.dev,https://streampro.biholat161.workers.dev,https://dstream.moxol15644.workers.dev,https://dstreampro.xeyirar456.workers.dev', '2023-06-27 19:22:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_list`
--
ALTER TABLE `ads_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowed_domains_list`
--
ALTER TABLE `allowed_domains_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_controls`
--
ALTER TABLE `player_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_list`
--
ALTER TABLE `video_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workers_list`
--
ALTER TABLE `workers_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads_list`
--
ALTER TABLE `ads_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `allowed_domains_list`
--
ALTER TABLE `allowed_domains_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `player_controls`
--
ALTER TABLE `player_controls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `video_list`
--
ALTER TABLE `video_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers_list`
--
ALTER TABLE `workers_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;