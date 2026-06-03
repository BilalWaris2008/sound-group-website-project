-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2026 at 11:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `music_file` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `title`, `artist`, `album`, `genre`, `language`, `year`, `image`, `music_file`, `description`, `created_at`) VALUES
(1, 'Shikayat', 'AUR', 'Shikayat', 'Sad Pop', 'Urdu', '2023', 'musicimg5.png', 'Shikayat .mp3', '“Shikayat” is an emotional Urdu song by AUR. The song features heartfelt lyrics, calm music, and a soulful vibe that connects deeply with listeners.', '2026-05-23 11:45:01'),
(2, 'Night Changes', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'musicimg4.png', 'Night Changes.mp3', '“Night Changes” is a popular song by One Direction. The song talks about growing up, memories, and life changes with emotional lyrics and relaxing music.', '2026-05-25 15:08:32'),
(3, 'Perfect', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'musicimg3.png', 'Perfect.mp3', '“Perfect” is a romantic English song by Ed Sheeran from the album Divide. The song is famous for its emotional lyrics, soft melody, and beautiful love story theme.', '2026-05-25 15:15:16'),
(4, 'Tu Hai Kahan', 'AUR', 'Tu Hai Kahan', 'Pop', 'Urdu', '2023', 'musicimg2.png', 'Tu Hai Kahan.mp3', '“Tu Hai Kahan” is a popular Urdu song by AUR. The song became viral because of its emotional lyrics, soft vocals, and relaxing music vibe loved by young listeners.', '2026-05-25 15:17:10'),
(5, 'Kahani Suno', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2018', 'musicimg1.png', 'Kahani Suno.mp3', '“Kahani Suno 2.0” is a soulful Urdu song by Kaifi Khalil. The song expresses emotions of love, heartbreak, and memories through soft vocals and relaxing music.', '2026-06-01 19:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `music_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Ali', 'ali12@gmail.com', '$2y$10$pn0s6p0MC9UN2BNFEUdPKuwZtHYb1H8DFWGTt5xdGleZMlfgBawNa', 'user', '2026-05-18 17:53:12'),
(2, 'Ahmed', 'ahmed@gmail.com', '$2y$10$qyEH3q1HvUVyK7fAHDiFPO7PuXqk9FbclZOm9m8VUv1rS8un1cyHS', 'user', '2026-05-18 18:01:34'),
(3, 'Khan', 'khan@gmail.com', '$2y$10$6cYOPnAJZOMgYadcrLtUfuDk.hIPfYZhjFFhc1UTwtIomHkSZAHCC', 'user', '2026-05-19 10:26:09'),
(4, 'Admin', 'admin123@gmail.com', '$2y$10$XvQbTb37DykMeQJiKemPWO.NJ480ex3iTwRltpszCf9gcZYUVnirm', 'admin', '2026-05-19 10:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_file` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `artist`, `album`, `genre`, `language`, `year`, `image`, `video_file`, `description`, `created_at`) VALUES
(1, 'Shikayat', 'AUR', 'Shikayat', 'Sad Pop', 'Urdu', '2023', 'musicimg5.png', 'Shikayat.mp4', '“Shikayat” is an emotional Urdu song by AUR. The song features heartfelt lyrics, calm music, and a soulful vibe that connects deeply with listeners.', '2026-05-29 13:11:43'),
(2, 'Night Changes', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'musicimg4.png', 'Night Changes.mp4', '“Night Changes” is a popular song by One Direction. The song talks about growing up, memories, and life changes with emotional lyrics and relaxing music.', '2026-05-29 13:16:05'),
(3, 'Perfect', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'musicimg3.png', 'perfect.mp4', '“Perfect” is a romantic English song by Ed Sheeran from the album Divide. The song is famous for its emotional lyrics, soft melody, and beautiful love story theme.', '2026-05-29 13:19:07'),
(4, 'Tu Hai Kahan', 'AUR', 'Tu Hai Kahan', 'Pop', 'Urdu', '2023', 'musicimg2.png', 'Tu Hai Kahan.mp4', '“Tu Hai Kahan” is a popular Urdu song by AUR. The song became viral because of its emotional lyrics, soft vocals, and relaxing music vibe loved by young listeners.', '2026-05-29 13:22:19'),
(5, 'Kahani Suno', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2021', 'musicimg1.png', 'Kahani Suno.mp4', '“Kahani Suno 2.0” is a soulful Urdu song by Kaifi Khalil. The song expresses emotions of love, heartbreak, and memories through soft vocals and relaxing music.', '2026-05-29 13:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_review` (`user_id`,`video_id`),
  ADD UNIQUE KEY `unique_music_review` (`user_id`,`music_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
