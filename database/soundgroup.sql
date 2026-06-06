-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2026 at 09:28 AM
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

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `fullname`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Khan', 'khan@gmail.com', 'Best Music Platform', 'This is one of the best music websites I have visited. The artist pages, song details, and overall layout make the experience enjoyable. Highly recommended for music lovers.', '2026-06-06 07:17:56'),
(2, 'Ali', 'ali@gmail.com', 'Excellent Music Collection', 'I really enjoyed using this website. The music collection is impressive, and the songs play smoothly without any issues. The design is modern and easy to navigate.', '2026-06-06 07:18:35'),
(3, 'Ahmed', 'ahmed@gmail.com', 'Great User Experience', 'The website is very user-friendly and responsive. I found my favorite songs quickly, and the audio quality was excellent. Looking forward to more updates.', '2026-06-06 07:18:51');

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
(1, 'Shape of You', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'shapeofyou.jpeg', 'Shape of You.mp3', 'Shape of You is one of Ed Sheeran\'s most popular songs from the album Divide. The song combines catchy pop melodies with dancehall-inspired rhythms, making it a worldwide hit. It topped charts in multiple countries and became one of the best-selling digital singles of all time.', '2026-06-01 18:48:14'),
(2, 'Muntazir', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2025', 'muntazir.jpeg', 'Muntazir.mp3', 'Muntazir is an emotional Urdu song by Kaifi Khalil that explores themes of love, longing, and waiting for someone special. The song features Kaifi Khalil\'s signature soulful vocals and poetic storytelling, creating a heartfelt listening experience for fans of romantic and Sufi-inspired music.', '2026-06-01 19:50:04'),
(3, 'Sapphire', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2025', 'sapphire.jpeg', 'Sapphire.mp3', 'Sapphire is a pop song by Ed Sheeran. The song features energetic melodies, vibrant production, and heartfelt lyrics. It showcases Ed Sheeran\'s signature songwriting style while exploring themes of love, connection, and personal growth.', '2026-06-02 11:11:30'),
(4, 'Kabhi Kabhi', 'AUR', 'AUR', 'Pop', 'Urdu', '2024', 'kabhikabhi.jpeg', 'Kabhi Kabhi.mp3', 'Kabhi Kabhi is an emotional Urdu pop song by AUR. The song combines modern production with soulful vocals and lyrics that reflect love, memories, and heartfelt emotions. It is known for its smooth melody and relatable storytelling.', '2026-06-03 05:53:43'),
(5, 'No Control', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'nocontrol.jpeg', 'No control.mp3', 'No Control is an energetic pop rock song by One Direction from their album Four. The track is known for its upbeat sound, catchy chorus, and powerful vocals. It became a fan favorite due to its lively atmosphere and memorable lyrics about attraction and excitement.                                                                            ', '2026-06-03 06:10:44'),
(6, 'Shikayat', 'AUR', 'AUR', 'Sad Pop', 'Urdu', '2023', 'shikayat.png', 'Shikayat .mp3', '“Shikayat” is an emotional Urdu song by AUR. The song features heartfelt lyrics, calm music, and a soulful vibe that connects deeply with listeners.', '2026-06-03 11:45:01'),
(7, 'Night Changes', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'nightchanges.png', 'Night Changes.mp3', '“Night Changes” is a popular song by One Direction. The song talks about growing up, memories, and life changes with emotional lyrics and relaxing music.', '2026-06-03 15:08:32'),
(8, 'Perfect', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'perfect.png', 'Perfect.mp3', '“Perfect” is a romantic English song by Ed Sheeran from the album Divide. The song is famous for its emotional lyrics, soft melody, and beautiful love story theme.', '2026-06-03 15:15:16'),
(9, 'Tu Hai Kahan', 'AUR', 'AUR', 'Pop', 'Urdu', '2023', 'tuhaikahan.png', 'Tu Hai Kahan.mp3', '“Tu Hai Kahan” is a popular Urdu song by AUR. The song became viral because of its emotional lyrics, soft vocals, and relaxing music vibe loved by young listeners.', '2026-06-03 15:17:10'),
(10, 'Kahani Suno', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2021', 'kahanisuno.png', 'Kahani Suno.mp3', '“Kahani Suno 2.0” is a soulful Urdu song by Kaifi Khalil. The song expresses emotions of love, heartbreak, and memories through soft vocals and relaxing music.', '2026-06-03 19:09:45');

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `music_id`, `video_id`, `user_id`, `rating`, `review`, `created_at`) VALUES
(1, 10, NULL, 2, 5, 'Kahani Suno never gets old. The storytelling and soulful voice make it one of my favorite tracks.', '2026-06-06 07:21:51'),
(2, NULL, 3, 2, 5, 'The video quality is excellent, and the visuals perfectly complement the music. Very enjoyable to watch.', '2026-06-06 07:24:55'),
(3, 7, NULL, 4, 5, 'Night Changes brings back so many memories. The song is catchy, emotional, and beautifully produced.', '2026-06-06 07:25:35'),
(4, NULL, 6, 4, 5, 'The visuals add so much emotion to the song. Every scene feels meaningful and professionally produced.', '2026-06-06 07:26:10'),
(5, 6, NULL, 5, 5, 'Shikayat has amazing lyrics and a powerful message. The composition and vocals are absolutely outstanding.', '2026-06-06 07:26:52'),
(6, NULL, 9, 5, 5, 'Beautiful cinematography and smooth transitions. The storyline keeps viewers engaged from start to finish.', '2026-06-06 07:27:52');

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
(1, 'Admin', 'admin@gmail.com', '$2y$10$H06rWrAv0sJywxiSz.mGLe6lv4iU5wXTnhL2I7jghRVnHMBTOXMCy', 'admin', '2026-06-04 18:28:12'),
(2, 'Ali', 'ali@gmail.com', '$2y$10$9/LR6Zg0zQYRdr7qmoVES./eMo092kcmiTAWSonCS4W/LhzV/U6cm', 'user', '2026-06-04 18:28:49'),
(3, 'Ahmed', 'ahmed@gmail.com', '$2y$10$vrzYI8GbR48auZFATjR2veru4EXfYisHuza86lIMvTQ27/ONpXbva', 'user', '2026-06-04 18:29:16'),
(4, 'Khan', 'khan@gmail.com', '$2y$10$RCMG8Z6MVAgb7pY0BWZp3.iICKrswIBBP3PUjyjjJnXBIKyYQKOVO', 'user', '2026-06-04 18:29:34'),
(5, 'Imran', 'imran@gmail.com', '$2y$10$RMiWekE4fZ4BgVuCbnNULeEB7SrZbkJ5Aem5.W3ELVOSg4KAewlYe', 'user', '2026-06-04 18:30:17');

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
(1, 'Shape of You', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'shapeofyou.jpeg', 'Shape of You.mp4', 'Shape of You is one of Ed Sheeran\'s most popular songs from the album Divide. The song combines catchy pop melodies with dancehall-inspired rhythms, making it a worldwide hit. It topped charts in multiple countries and became one of the best-selling digital singles of all time.', '2026-05-31 19:08:06'),
(2, 'Muntazir', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2025', 'muntazir.jpeg', 'Muntazir.mp4', 'Muntazir is an emotional Urdu song by Kaifi Khalil that explores themes of love, longing, and waiting for someone special. The song features Kaifi Khalil\'s signature soulful vocals and poetic storytelling, creating a heartfelt listening experience for fans of romantic and Sufi-inspired music.', '2026-06-01 19:51:17'),
(3, 'Kabhi Kabhi', 'AUR', 'AUR', 'Pop', 'Urdu', '2024', 'kabhikabhi.jpeg', 'Kabhi Kabhi.mp4', 'Kabhi Kabhi is an emotional Urdu pop song by AUR. The song combines modern production with soulful vocals and lyrics that reflect love, memories, and heartfelt emotions. It is known for its smooth melody and relatable storytelling.', '2026-06-02 05:56:03'),
(4, 'No Control', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'nocontrol.jpeg', 'No control.mp4', 'No Control is an energetic pop rock song by One Direction from their album Four. The track is known for its upbeat sound, catchy chorus, and powerful vocals. It became a fan favorite due to its lively atmosphere and memorable lyrics about attraction and excitement.                                                                        ', '2026-06-02 06:11:43'),
(5, 'Sapphire', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2025', 'sapphire.jpeg', 'sapphire.mp4', 'Sapphire is a pop song by Ed Sheeran. The song features energetic melodies, vibrant production, and heartfelt lyrics. It showcases Ed Sheeran\'s signature songwriting style while exploring themes of love, connection, and personal growth.', '2026-06-02 06:42:24'),
(6, 'Shikayat', 'AUR', 'AUR', 'Sad Pop', 'Urdu', '2023', 'shikayat.png', 'Shikayat.mp4', '“Shikayat” is an emotional Urdu song by AUR. The song features heartfelt lyrics, calm music, and a soulful vibe that connects deeply with listeners.', '2026-06-03 13:11:43'),
(7, 'Night Changes', 'One Direction', 'Four', 'Pop Rock', 'English', '2014', 'nightchanges.png', 'Night Changes.mp4', '“Night Changes” is a popular song by One Direction. The song talks about growing up, memories, and life changes with emotional lyrics and relaxing music.', '2026-06-03 13:16:05'),
(8, 'Perfect', 'Ed Sheeran', 'Divide', 'Pop', 'English', '2017', 'perfect.png', 'perfect.mp4', '“Perfect” is a romantic English song by Ed Sheeran from the album Divide. The song is famous for its emotional lyrics, soft melody, and beautiful love story theme.', '2026-06-03 13:19:07'),
(9, 'Tu Hai Kahan', 'AUR', 'AUR', 'Pop', 'Urdu', '2023', 'tuhaikahan.png', 'Tu Hai Kahan.mp4', '“Tu Hai Kahan” is a popular Urdu song by AUR. The song became viral because of its emotional lyrics, soft vocals, and relaxing music vibe loved by young listeners.', '2026-06-03 13:22:19'),
(10, 'Kahani Suno', 'Kaifi Khalil', 'Kahani Suno 2.0', 'Sad Pop', 'Urdu', '2021', 'kahanisuno.png', 'Kahani Suno.mp4', '“Kahani Suno 2.0” is a soulful Urdu song by Kaifi Khalil. The song expresses emotions of love, heartbreak, and memories through soft vocals and relaxing music.', '2026-06-03 13:24:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
