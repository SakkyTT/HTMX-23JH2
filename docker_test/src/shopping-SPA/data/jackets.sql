-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Sep 11, 2024 at 12:08 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jackets`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `price`, `description`) VALUES
(1, 'jacket_1.jpeg', 'Jacket 1', 129.99, 'Elevate your streetwear game with our Jacket 1. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.'),
(2, 'jacket_2.jpeg', 'Jacket 2', 189.99, 'Elevate your streetwear game with our Jacket 2. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.'),
(3, 'jacket_3.jpeg', 'Jacket 3', 49.99, 'Elevate your streetwear game with our Jacket 3. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.'),
(4, 'jacket_4.jpeg', 'Jacket 4', 249.99, 'Elevate your streetwear game with our Jacket 4. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.'),
(5, 'jacket_5.jpeg', 'Jacket 5', 159.99, 'Elevate your streetwear game with our Jacket 5. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.'),
(6, 'jacket_6.jpeg', 'Jacket 6', 79.99, 'Elevate your streetwear game with our Jacket 6. The rich fabric ensures durability and comfort, making it ideal for both everyday wear and special occasions.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
