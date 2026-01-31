-- phpMyAdmin SQL Dump
-- version 5.2.3-1.el10_2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2026 at 03:23 PM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `np02cs4a240001`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_id`, `ingredient_name`) VALUES
(1, 1, 'Flour'),
(2, 1, 'Minced Meat'),
(3, 1, 'Onion'),
(4, 1, 'Ginger/Garlic'),
(5, 3, 'Fermented Gundruk'),
(6, 3, 'Onion'),
(7, 3, 'Tomato'),
(8, 3, 'Bhatmas (Soybeans)'),
(9, 4, 'Rice Flour'),
(10, 4, 'Ghee'),
(11, 4, 'Sugar'),
(12, 4, 'Cardamom'),
(13, 5, 'Basmati Rice'),
(14, 5, 'Chicken'),
(15, 5, 'Saffron'),
(16, 5, 'Biryani Masala'),
(17, 5, 'Yogurt'),
(18, 6, 'Chicken pieces'),
(19, 6, 'Ginger-Garlic paste'),
(20, 6, 'Garam Masala'),
(21, 6, 'Turmeric'),
(27, 8, 'Paneer'),
(28, 8, 'Butter'),
(29, 8, 'Heavy Cream'),
(30, 8, 'Tomato Puree'),
(31, 8, 'Kasuri Methi'),
(32, 7, 'Chicken'),
(33, 7, 'Burger Buns'),
(34, 7, 'Cheddar Cheese'),
(35, 7, 'Lettuce'),
(36, 7, 'Pickles'),
(48, 9, 'Basmati Rice'),
(49, 9, 'Lentils (Musuro or Rahar Dal)'),
(50, 9, 'Ghee'),
(51, 9, 'Turmeric Powder'),
(52, 9, 'Garlic & Ginger Paste'),
(53, 9, 'Cumin Seeds'),
(54, 9, 'Fresh Spinach (Rayyo Saag)');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cuisine` varchar(50) DEFAULT NULL,
  `difficulty` enum('Easy','Medium','Hard') DEFAULT 'Easy',
  `instructions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `cuisine`, `difficulty`, `instructions`, `created_at`) VALUES
(1, 'Momo', 'Nepali', 'Medium', 'Prepare dough, mix minced meat with spices, steam for 15 mins.', '2026-01-31 12:03:31'),
(3, 'Gundruk Ko Jhol', 'Nepali', 'Easy', 'A traditional fermented leafy green vegetable soup, iconic to Nepal.', '2026-01-31 14:53:48'),
(4, 'Sel Roti', 'Nepali', 'Hard', 'Ring-shaped, sweet fried rice bread prepared during festivals like Tihar.', '2026-01-31 14:53:48'),
(5, 'Chicken Biryani', 'Indian', 'Hard', 'A fragrant rice dish made with aromatic spices, basmati rice, and marinated chicken.', '2026-01-31 14:53:48'),
(6, 'Chicken Curry', 'Indian', 'Medium', 'Classic Indian style chicken simmered in a thick, spiced onion-tomato gravy.', '2026-01-31 14:53:48'),
(7, 'Classic Chicken Burger', 'Western', 'Medium', 'Juicy grilled chicken patty with lettuce, tomato, and cheese on a toasted bun.', '2026-01-31 14:53:48'),
(8, 'Paneer Butter Masala', 'Indian', 'Medium', 'Creamy and slightly sweet gravy with cubes of soft cottage cheese.', '2026-01-31 14:53:48'),
(9, 'Dal Bhat Power', 'Nepali', 'Medium', 'Wash rice and lentils separately and Cook rice in a pressure cooker and Boil lentils with turmeric and salt, then temper with ghee, cumin seeds, and garlic (jimbu if available) and Serve with tarkari (vegetable curry) and achar.', '2026-01-31 15:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'yunik', '$2y$10$xr4P9HHvi45RNRDYVf/xoOxbr2YiH/fDEDtCyiJiUBmOu5TZ2QWvS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipe` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
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
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
