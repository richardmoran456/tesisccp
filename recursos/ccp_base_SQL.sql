-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2024 at 02:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccp`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `departamento_id` int UNSIGNED NOT NULL,
  `nombre` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `abreviatura` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`departamento_id`, `nombre`, `abreviatura`, `created_at`, `modified_at`) VALUES
(1, 'Recursos Humanos', 'rrhh', '2024-01-17 11:25:28', '2024-01-17 15:25:28'),
(2, 'Recepción', 'rcp', '2024-01-17 11:35:28', '2024-01-17 15:35:28'),
(4, 'Gerencia', 'Gerencia', '2024-01-17 13:26:40', '2024-01-17 17:26:40'),
(5, 'Mantenimiento', 'Mant', '2024-01-17 13:52:08', '2024-01-17 17:52:08'),
(6, 'Desarrollo', 'dev', '2024-01-17 13:59:35', '2024-01-17 17:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `empleado_id` int UNSIGNED NOT NULL,
  `nombre_completo` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `documento` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `url_imagen` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `url_resumen` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fk_puesto` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombre_completo`, `documento`, `url_imagen`, `url_resumen`, `fk_puesto`, `created_at`, `modified_at`) VALUES
(2, 'José G Heredia B', 'V20890738', 'SIN DATO', 'SIN DATO', 5, '2024-01-18 13:03:19', '2024-01-18 17:40:26'),
(3, 'Richard Moran', 'V31589745', 'SIN DATO', 'SIN DATO', 6, '2024-01-18 13:41:06', '2024-01-18 17:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `modulo_id` int UNSIGNED NOT NULL,
  `nombre` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`modulo_id`, `nombre`, `created_at`, `modified_at`) VALUES
(24, 'Pruebas', '2024-01-17 10:41:56', '2024-01-17 14:42:14'),
(25, 'Camion', '2024-01-17 10:42:06', '2024-01-17 14:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `puestos`
--

CREATE TABLE `puestos` (
  `puesto_id` int UNSIGNED NOT NULL,
  `nombre` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fk_departamento` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `puestos`
--

INSERT INTO `puestos` (`puesto_id`, `nombre`, `fk_departamento`, `created_at`, `modified_at`) VALUES
(5, 'Caja', 2, '2024-01-17 13:56:02', '2024-01-17 17:56:02'),
(6, 'Prueba', 6, '2024-01-17 13:59:49', '2024-01-17 18:11:38'),
(7, 'Administrador', 1, '2024-01-18 12:42:48', '2024-01-18 16:42:48'),
(8, 'Cajero', 2, '2024-01-18 12:42:58', '2024-01-18 16:42:58'),
(9, 'Limpieza', 5, '2024-01-18 12:43:08', '2024-01-18 16:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int UNSIGNED NOT NULL,
  `nombre_completo` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `passwd` varchar(140) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fk_departamento` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre_completo`, `username`, `passwd`, `fk_departamento`, `created_at`, `modified_at`) VALUES
(2, 'José Heredia', 'jochdev', 'VFdUUG8xVTVVaUp5V0IvUWhCRDlDUT09', 6, '2024-01-17 15:06:32', '2024-01-17 19:13:28'),
(3, 'Richard Moran', 'richard', 'aUNCTkpKdGpsTkx5VVNrd3RYb2QxZz09', 6, '2024-01-17 19:51:42', '2024-01-17 23:51:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`departamento_id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleado_id`),
  ADD KEY `fk_puesto` (`fk_puesto`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`modulo_id`);

--
-- Indexes for table `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`puesto_id`),
  ADD KEY `fk_departamento` (`fk_departamento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `fk_departamento` (`fk_departamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `departamento_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleado_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `modulo_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `puestos`
--
ALTER TABLE `puestos`
  MODIFY `puesto_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`fk_puesto`) REFERENCES `puestos` (`puesto_id`);

--
-- Constraints for table `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`fk_departamento`) REFERENCES `departamentos` (`departamento_id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_departamento`) REFERENCES `departamentos` (`departamento_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
