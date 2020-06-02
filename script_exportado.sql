-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2020 at 11:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `systemDigitalStock`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacenes`
--

CREATE TABLE `almacenes` (
  `id_almacen` int(255) NOT NULL,
  `cod_almacen` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lotes`
--

CREATE TABLE `lotes` (
  `id_lote` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL,
  `id_ubicacion` int(255) NOT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lotes`
--

INSERT INTO `lotes` (`id_lote`, `id_producto`, `id_ubicacion`, `vencimiento`, `cantidad`) VALUES
(1, 1, 1, NULL, 20),
(2, 2, 1, NULL, 300);

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(255) NOT NULL,
  `cod_marca` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `cod_marca`, `nombre`) VALUES
(1, 'PHI', 'Phillips'),
(2, 'SAM', 'Samsung'),
(3, 'HP', 'Hewlett-Packard'),
(4, 'II', 'Intel Inside'),
(5, 'AMD', 'AMD'),
(6, 'ASUS', 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(255) NOT NULL,
  `cod_producto` varchar(255) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_marca` int(255) NOT NULL,
  `temperatura` int(255) DEFAULT NULL,
  `cubierto` tinyint(1) DEFAULT NULL,
  `fragil` tinyint(1) DEFAULT NULL,
  `tamanio` double(255,2) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `cod_producto`, `nombre`, `id_marca`, `temperatura`, `cubierto`, `fragil`, `tamanio`, `activo`) VALUES
(1, 'NB1', 'Notebook Samsung i5 - 12gb Ram - 1TB', 2, 100, 1, 1, 1.00, 1),
(2, 'NB2', 'Notebook HP i5 - 4gb Ram - 1TB', 3, 75, 1, 1, 1.00, 1),
(3, 'DESK1', 'Desktop Phillips AMD 2.7Ghz 12GB', 1, 100, 1, 1, 1.00, 1),
(4, 'NB3', 'Notebook Samsung i3 - 2gb Ram - 5000GB', 2, 100, 1, 1, 1.00, 1),
(7, 'Mi98g', 'Microprocesador i9 8.0Ghz', 4, 50, 1, 1, 1.00, 0),
(8, 'AMH310', 'Motherboard Asus H310', 6, 50, 1, 1, 1.00, 0),
(9, 'MAX2', 'Microprocesador Athlon x2', 5, 23, 1, 1, 1.00, 0),
(10, '26738nb18', 'microprocesador i9', 4, 45, 1, 0, 2.00, 0),
(11, '26738nb18', 'microprocesador i5', 3, 43, 1, 0, 1.00, 0),
(12, '26738nb18', 'microprocesador i7', 4, 54, 1, 1, 1.00, 0),
(13, 'AP2kW', 'Aspiradora Phillips 2000W', 1, 50, 1, 0, 1.00, 0),
(14, '26738nb18', 'microprocesador i5', 1, 65, 1, 0, 1.00, 0),
(15, '26738nb18', 'microprocesador i5', 1, 0, 1, 0, 1.00, 0),
(16, '26738nb18', 'microprocesador i5', 1, 0, 0, 0, 1.00, 0),
(17, '26738nb18', 'microprocesador i5', 4, 0, 1, 1, 1.00, 0),
(18, '26738nb18', 'microprocesador i9', 4, 0, 0, 1, 1.00, 0),
(19, '26738nb18', 'microprocesador i9', 4, 0, 0, 0, 1.00, 0),
(20, '26738nb18', 'microprocesador i5', 4, 12, 1, 1, 1.00, 0),
(21, '26738nb18', 'microprocesador i5', 2, 0, 0, 0, 1.00, 0),
(22, 'SA51', 'Celular Samsung A51', 1, 50, 0, 0, 1.00, 0),
(23, 'CELS', 'Celular Samsung A51', 2, 50, 0, 1, 1.00, 0),
(24, 'celS', 'Celular Samsung A53', 2, 100, 0, 0, 1.00, 0),
(25, 'ios8', 'iphone 8', 5, 50, 0, 1, 1.00, 0),
(26, 'CelA30', 'Celular Samsung A30', 6, 45, 0, 0, 1.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id_rack` int(255) NOT NULL,
  `nombre_rack` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(255) NOT NULL,
  `nombre_ubicacion` varchar(255) NOT NULL,
  `id_rack` int(255) NOT NULL,
  `capacidad` double(255,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `password`, `fecha_alta`, `fecha_actualizacion`, `activo`, `tipo`) VALUES
(1, 'Carlos', 'Perez', '$2y$04$X8wLl4zAgG1xoR/41uP0muomiG6DfmScxTS3RSuzfnKeNNIgKcgQ2', '2020-05-23', '2020-05-23', 1, 'ADMIN'),
(2, 'Francisco', 'Sponton', '$2y$04$X8wLl4zAgG1xoR/41uP0muomiG6DfmScxTS3RSuzfnKeNNIgKcgQ2', '2020-05-31', '2020-05-31', 1, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indexes for table `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id_rack`);

--
-- Indexes for table `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id_almacen` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id_lote` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id_rack` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;