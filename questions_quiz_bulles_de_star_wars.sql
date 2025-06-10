-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 05:25 PM
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
-- Database: `quiz_bulles_de_star_wars`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `intitulé` varchar(256) NOT NULL,
  `reponse_1` varchar(100) NOT NULL,
  `reponse_2` varchar(100) NOT NULL,
  `reponse_3` varchar(100) NOT NULL,
  `reponse_4` varchar(100) NOT NULL,
  `bonne_reponse` varchar(100) NOT NULL,
  `timer` int(11) NOT NULL,
  `difficulté` varchar(10) NOT NULL,
  `catégorie` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `intitulé`, `reponse_1`, `reponse_2`, `reponse_3`, `reponse_4`, `bonne_reponse`, `timer`, `difficulté`, `catégorie`, `type`) VALUES
(1, 'Qui est le père de Luke Skywalker ?', '', '', '', '', 'Anakin Skywalker', 20, 'Facile', 'Famille_Skywalker', 'Réponse Libre'),
(2, 'Qui sont les enfants d\'Anakin ?', 'Leia', 'Padmé', 'Yoda', 'Luke', 'Leia,Luke', 20, 'Facile', 'Famille_Skywalker', 'QCM'),
(3, 'Padmé est la mère de Leia et Luke ?', 'VRAI', 'FAUX', '', '', 'VRAI', 20, 'Facile', 'Famille_Skywalker', 'Vrai ou Faux'),
(4, 'Quel est le nom officiel de Leia ?', '', '', '', '', 'Organa', 20, 'Facile', 'Famille_Skywalker', 'Réponse Libre'),
(5, 'Quel est le nom de la mère d\'Anakin ?', '', '', '', '', 'Shmi Skywalker', 20, 'Facile', 'Famille_Skywalker', 'Réponse Libre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
