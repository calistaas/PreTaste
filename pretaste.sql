-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 08:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pretaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `cat_name`, `cat_desc`) VALUES
(1, 'Breakfast', 'what i always skipped.'),
(2, 'Lunch', 'I hate it\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id_food` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_time` int(11) NOT NULL,
  `time_unit` varchar(20) NOT NULL,
  `food_desc` longtext NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id_food`, `food_name`, `food_time`, `time_unit`, `food_desc`, `id_cat`) VALUES
(1, 'Satay', 100, 'minutes', 'ini makanan enak. enakan sate apa. ya sate bulayak. cuman gw suka sate banget. sate enak pake banget sumaph eheheheh. laper. mau geprek. tapi sate enak. beneran enak.', 1),
(2, 'Geprek', 30, 'minutes', 'ini gepre. miko ga suka. tapi banyak dijual di Kekalik. Geprek enak, di Kekalik ada banyak, tapi susah milih.', 1),
(4, 'Taichan', 20, 'minutes', 'ga tau ga pernah makannya.', 1),
(5, 'Burger', 15, 'minutes', 'ini miko suka. emang aneh.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingridient`
--

CREATE TABLE `ingridient` (
  `id_ing` int(11) NOT NULL,
  `ing_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingridient`
--

INSERT INTO `ingridient` (`id_ing`, `ing_name`) VALUES
(1, 'Ayam'),
(2, 'Cabai Merah'),
(3, 'Bawang Putih');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id_food` int(11) NOT NULL,
  `id_ing` int(11) NOT NULL,
  `measurement` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id_food`, `id_ing`, `measurement`, `unit`) VALUES
(2, 1, 1, 'potong'),
(2, 3, 5, 'siung');

-- --------------------------------------------------------

--
-- Table structure for table `recom`
--

CREATE TABLE `recom` (
  `id_food` int(11) NOT NULL,
  `id_res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recom`
--

INSERT INTO `recom` (`id_food`, `id_res`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_res` int(11) NOT NULL,
  `res_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id_res`, `res_name`) VALUES
(1, 'Pizza Hut'),
(2, 'Burger King');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id_food` int(11) NOT NULL,
  `desc_step` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id_food`, `desc_step`) VALUES
(2, 'Potong ayam jadi gede banget sumpah gatau seberapa besar dipotongnya.'),
(2, 'Balurkan ayam dengan tepung ngeng.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `user_img`, `password`) VALUES
(6, 'irpan', 'cawi@mail.com', '', '$2y$10$2Ep.rbSN5hKl56w/6S9yEO2Hi9Jwz46nNKts5XgaSTmYye/TRwFn.'),
(9, 'rara', 'rara@mail.com', '', '$2y$10$qe1Qb3RoRyu1rpDOghM8kOeMKsrKGyVrNtfyaAKlsFwryL3Q4vNyC'),
(10, 'icak', 'icak@mail.com', 'assets\\img\\f1.jpg', '$2y$10$UY4q80CYYbuGJP9Zeh4UT.0h63b9rnOPB9A.rvY2vpCITTjNVVeym'),
(11, 'cya', 'cya@mail.com', '', '$2y$10$TceSbiaggC9nvN/vbATcPuIJsi4cz1gPQZNilB3APrmez0gVGdn0S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`),
  ADD KEY `FK_id_cat_on_food` (`id_cat`);

--
-- Indexes for table `ingridient`
--
ALTER TABLE `ingridient`
  ADD PRIMARY KEY (`id_ing`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD KEY `FK_id_food_on_recipe` (`id_food`),
  ADD KEY `FK_id_ing_on_recipe` (`id_ing`);

--
-- Indexes for table `recom`
--
ALTER TABLE `recom`
  ADD KEY `id_food_on_recom` (`id_food`),
  ADD KEY `id_res_on_recom` (`id_res`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_res`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD KEY `FK_id_food_on_step` (`id_food`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingridient`
--
ALTER TABLE `ingridient`
  MODIFY `id_ing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `FK_id_cat_on_food` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`) ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `FK_id_food_on_recipe` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_ing_on_recipe` FOREIGN KEY (`id_ing`) REFERENCES `ingridient` (`id_ing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recom`
--
ALTER TABLE `recom`
  ADD CONSTRAINT `id_food_on_recom` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_res_on_recom` FOREIGN KEY (`id_res`) REFERENCES `restaurant` (`id_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `FK_id_food_on_step` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
