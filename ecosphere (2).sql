-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 08:23 AM
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
-- Database: `ecosphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'ecosphereadmin1', '091234578');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `organization` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `layout` enum('left-image','right-image','centered','background-image') NOT NULL,
  `section_heading` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `layout`, `section_heading`, `created_at`, `admin_id`) VALUES
(25, ' Guardians of the Skies: How the Philippine Eagle Foundation Champions Conservation', '<hr><p><strong>(10-19-24)&nbsp;</strong>The Philippine Eagle Foundation (PEF) fulfills its mission to protect the critically endangered Philippine Eagle through innovative conservation programs and community engagement. By combining captive breeding efforts, habitat restoration, and extensive education campaigns, the foundation ensures both the survival of the species and the empowerment of local communities as stewards of biodiversity. Their work exemplifies a holistic approach to conservation, highlighting the interconnection between wildlife protection and sustainable human development. <a href=\"https://www.philippineeaglefoundation.org/\" rel=\"noopener noreferrer\" target=\"_blank\">Reference</a></p>', 'uploads/673b64e99cba0-example1.jpg', 'left-image', 'Empowering Communities and Protecting Biodiversity Through Innovation and Education ', '2024-11-18 16:01:46', NULL),
(27, 'Safeguarding Our Seas: Marine Conservation Philippines’ Path to Ocean Sustainability', '<hr><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:11pt;font-family:Arial, sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;\"><strong>(10-20-24)</strong> Marine Conservation Philippines (MCP) fulfills its mission to protect marine ecosystems by combining scientific research, community outreach, and hands-on environmental action. Through programs like coral reef restoration, marine debris cleanup, and education initiatives, MCP inspires local communities and volunteers to become active advocates for ocean health. Their efforts contribute to sustainable marine biodiversity, addressing pressing threats like overfishing and habitat destruction. <a href=\"https://www.marineconservationphilippines.org/\">Reference</a></span></p>', 'uploads/674462553a30b-example2.jpg', 'right-image', 'Uniting Research, Community, and Action to Protect Marine Biodiversity.', '2024-11-25 11:41:16', NULL),
(33, 'PhilBio: Protecting Critically Endangered Species in the Philippines!', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:11pt;font-family:Arial, sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;\">The work of PhilBio demonstrates that protecting critically endangered species is possible through a combination of science, community engagement, and collaboration. However, much remains to be done. As threats like habitat loss and climate change persist, PhilBio calls on individuals, organizations, and policymakers to join the fight to preserve the Philippines&rsquo; biodiversity.</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><br></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:11pt;font-family:Arial, sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;\">For more information or to support their initiatives, visit the official PhilBio website or participate in their conservation programs. <em>Together, we can ensure a future where the Philippines&rsquo; unique wildlife continues to thrive. <a href=\"https://www.philbio.org.ph/\">Reference</a></em></span></p>', 'uploads/67451ab57c5ed-present.png', 'left-image', 'A Call to Action ', '2024-11-26 00:47:49', NULL),
(36, 'The Philippine Eagle Foundation: Championing the Survival of a National Treasure ', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:11pt;font-family:Arial, sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;\">(12-12-24)&nbsp;</span><span style=\"font-size:11pt;font-family:Arial, sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;\">PEF envisions a world where the Philippine eagle thrives in sustainable forests. Guided by this vision, their mission focuses on fostering partnerships for wildlife conservation, ensuring the balance between human development and environmental stewardship. The foundation also aims to inspire future generations to uphold the values of biodiversity conservation. <a href=\"https://www.philippineeaglefoundation.org/\">Reference</a>&nbsp;</span></p>', 'uploads/675a53bca9c7d-download (3).jpg', 'right-image', 'Mission and Vision: A Guiding Light', '2024-12-12 03:08:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newslinks`
--

CREATE TABLE `newslinks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newslinks`
--

INSERT INTO `newslinks` (`id`, `title`, `link`, `added_on`) VALUES
(5, 'Philippine hatchling stirs hope for endangered eagle', 'https://www.msn.com/en-ph/news/other/philippine-hatchling-stirs-hope-for-endangered-eagle/ar-AA1urb59?ocid=BingNewsVerp', '2024-11-21 14:03:13'),
(12, 'SM, DENR partner to save critically endangered PH species', 'https://www.msn.com/en-ph/news/news/content/ar-AA1sxHxs?ocid=BingNewsVerp', '2024-11-26 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- Indexes for table `newslinks`
--
ALTER TABLE `newslinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `newslinks`
--
ALTER TABLE `newslinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
