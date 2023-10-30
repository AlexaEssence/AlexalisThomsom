-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 02:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beenati`
--

-- --------------------------------------------------------

--
-- Table structure for table `embo_botellones`
--

CREATE TABLE `embo_botellones` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cedula` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `embo_botellones`
--

INSERT INTO `embo_botellones` (`id`, `cantidad`, `fecha`, `hora`, `cedula`) VALUES
(10, 10, '2023-10-28', '20:20:17', 4522587),
(11, 20, '2023-10-28', '20:20:24', 30010114),
(12, 3, '2023-10-28', '20:29:40', 30010114);

-- --------------------------------------------------------

--
-- Table structure for table `embo_cliente`
--

CREATE TABLE `embo_cliente` (
  `cedula` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `embo_cliente`
--

INSERT INTO `embo_cliente` (`cedula`, `nombre`, `correo`, `zona`) VALUES
(4522587, 'Jesús Duque', 'jeduq@outlook.com', 'Ciudad Ojeda'),
(30010114, 'José Martínez', 'jjmd@gmail.com', 'San Francisco');

-- --------------------------------------------------------

--
-- Table structure for table `embo_usuario`
--

CREATE TABLE `embo_usuario` (
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `embo_usuario`
--

INSERT INTO `embo_usuario` (`usuario`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `embo_botellones`
--
ALTER TABLE `embo_botellones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`);

--
-- Indexes for table `embo_cliente`
--
ALTER TABLE `embo_cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `embo_botellones`
--
ALTER TABLE `embo_botellones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `embo_botellones`
--
ALTER TABLE `embo_botellones`
  ADD CONSTRAINT `embo_botellones_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `embo_cliente` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
