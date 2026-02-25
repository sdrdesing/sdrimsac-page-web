-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2026 a las 15:56:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdrimsac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 1,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `codigo_compra` varchar(32) NOT NULL,
  `estado` enum('pendiente','validada','rechazada') DEFAULT 'pendiente',
  `notificado` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT 0.00,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `codigo_compra`, `estado`, `notificado`, `fecha`, `total`, `observaciones`) VALUES
(1, 9, 'PED000027', 'validada', 0, '2026-02-23 18:17:42', 330.00, NULL),
(2, 11, 'PED000028', 'validada', 1, '2026-02-23 18:46:39', 280.00, NULL),
(3, 37, 'PED000029', 'validada', 0, '2026-02-23 18:55:56', 280.00, NULL),
(4, 11, 'PED000030', 'pendiente', 0, '2026-02-23 18:59:16', 280.00, NULL),
(5, 11, 'PED000031', 'validada', 0, '2026-02-23 19:00:11', 500.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `ventas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `cliente` varchar(150) DEFAULT NULL,
  `metodo` varchar(60) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `cliente`, `metodo`, `total`, `creado`) VALUES
(1, 'gema', 'contra', 899.00, '2026-02-20 17:57:16'),
(2, 'gema', 'transferencia', 350.00, '2026-02-20 17:58:12'),
(3, 'gema', 'transferencia', 350.00, '2026-02-20 17:58:27'),
(4, 'HOLA', 'contra', 2697.00, '2026-02-21 23:53:31'),
(5, 'admin', 'contra', 8.00, '2026-02-23 17:18:12'),
(6, 'admin', 'transferencia', 7.00, '2026-02-23 17:18:45'),
(7, 'admin', 'contra', 4.00, '2026-02-23 17:19:24'),
(8, 'maria', 'contra', 16.00, '2026-02-23 17:20:22'),
(9, 'maria', 'contra', 23.00, '2026-02-23 17:21:37'),
(10, 'maria', 'contra', 4.00, '2026-02-23 17:21:49'),
(11, 'maria', 'transferencia', 4.00, '2026-02-23 17:22:06'),
(12, 'maria', 'transferencia', 4.00, '2026-02-23 17:22:35'),
(13, 'admin', 'transferencia', 4.00, '2026-02-23 17:30:49'),
(14, 'hgyj', 'contra', 12.00, '2026-02-23 17:33:00'),
(15, 'hgyj', 'transferencia', 7.00, '2026-02-23 17:33:46'),
(16, 'hgyj', 'contra', 7.00, '2026-02-23 17:34:11'),
(17, 'hgyj', 'contra', 7.00, '2026-02-23 17:34:33'),
(18, 'gema vasquez', 'contra', 15.00, '2026-02-23 17:41:49'),
(19, 'gema vasquez', 'contra', 5.00, '2026-02-23 17:42:16'),
(20, 'gema vasquez', 'transferencia', 1268.00, '2026-02-23 17:58:33'),
(21, 'gema vasquez', 'contra', 520.00, '2026-02-23 18:10:06'),
(22, 'gema vasquez', 'contra', 260.00, '2026-02-23 20:07:00'),
(23, 'gema vasquez', 'transferencia', 6.00, '2026-02-23 20:15:53'),
(24, 'gema vasquez', 'transferencia', 500.00, '2026-02-23 22:59:46'),
(25, 'gema vasquez', 'transferencia', 250.00, '2026-02-23 23:07:39'),
(26, 'maria', 'transferencia', 330.00, '2026-02-23 23:11:22'),
(27, 'gema vasquez', 'transferencia', 330.00, '2026-02-23 23:17:42'),
(28, 'maria', 'transferencia', 280.00, '2026-02-23 23:46:39'),
(29, 'vasquez', 'transferencia', 280.00, '2026-02-23 23:55:56'),
(30, 'maria', 'transferencia', 280.00, '2026-02-23 23:59:16'),
(31, 'maria', 'transferencia', 500.00, '2026-02-24 00:00:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `vistas` int(11) DEFAULT 0,
  `vendidos` int(11) DEFAULT 0,
  `favoritos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `views`, `vistas`, `vendidos`, `favoritos`) VALUES
(10, 'La All In One Villacorp 23.8″ FHD IPS ', 'All In One Villacorp 23.8″ FHD IPS Corei3 8GB, 256BG SSD M.2 -12va Generación', 320.00, 5, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTB69gNTm9tyWhuiDedqlAeVM-4dqSFPo4wMAVybjBAzeYHmzAZMiwmTWGoq-dDEn4tMjOVXPgtpzdBcVOjcnv9R6FaJlAinjGMgrnCvk3idejaYq-9kqUqRrdxC2iZ9TQaUhaJsVNPAQ4&usqp=CAc', 0, 0, 0, 0),
(11, '	Caja de 20 Rollos Papel Térmico 80mmX80mm – Contómetros', '', 110.00, 3, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhASEhISFQ8WFRUWEBUSFRAPEBUSFRYWFhcRFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDQ0NDg0NDysZFRkrKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/', 0, 0, 0, 0),
(12, '	Caja de 50 Rollos Papel Térmico de 80mmX80mm – Contómetros', '', 270.00, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOSxYRumJT3KFk88jD72N6c1o3v7JJkrap7w&s', 0, 0, 0, 0),
(13, '	Gaveta de monedas y billetes KR330 con interfaz RJ11 – VILLACORP', '', 240.00, 3, 'https://www.bienex.pe/img_productos/productos_imagenes_19_clYLB.jpg', 0, 0, 0, 0),
(14, '	Caja de 20 Rollos Papel Térmico de 58X40mm – Contómetros', '', 75.00, 6, 'https://dasmitec.pe/wp-content/uploads/2022/06/CONT-58MM-3.jpg', 0, 0, 0, 0),
(15, '	Impresora térmica de etiquetas 100mm – interfaz USB', '', 600.00, 4, 'https://casemotions.pe/wp-content/uploads/2024/07/N14_000.jpg', 0, 0, 0, 0),
(16, '	Impresora térmica de etiquetas 100mm – interfaz USB+LAN/RED/ETHERNET + Soporte para rollos de etiqu', '', 600.00, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbvOs-G2K5Eiowhgf3htoLdNPdRLDhZ7Jo8w&s', 0, 0, 0, 0),
(17, '	Impresora térmica de etiquetas 80mm – interfaz USB', '', 500.00, 1, 'https://http2.mlstatic.com/D_NQ_NP_682698-CBT73701473035_122023-O-impresora-termica-de-etiquetas-interfaz-usb-20-80mm.webp', 0, 0, 0, 0),
(18, 'Lector de código de barras 1D y 2D inalámbrico con soporte – VLA-1100DW', '', 250.00, 7, 'https://media.falabella.com/falabellaPE/128388124_01/w=1500,h=1500,fit=cover', 0, 0, 0, 0),
(19, '	Lector de código de barras Bluetooth 1D y 2D inalámbrico con soporte – VLA-1100DB', '', 280.00, 8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvuzmAyJZdL-GrR7Z-tlxaNKHwLP1jNQ5UOA&s', 0, 0, 0, 0),
(20, 'Lector de escritorio omnidireccional de código de barras 1D y QR 2D – VLA-9200D', '', 330.00, 2, 'https://sdrimsac.com/wp-content/uploads/elementor/thumbs/Lector-de-escritorio-omnidireccional-de-codigo-de-barras-1D-y-QR-2D-VLA-9200D-qcw70o45nhrl64tji9b8zx6nwieotnay7fy3cczmso.jpg', 0, 0, 0, 0),
(21, 'Lector Portátil de código de barras 1D y QR 2D + Bluetooth – VLA-3200DB', '', 250.00, 6, 'https://media.falabella.com/falabellaPE/120586205_07/w=800,h=800,fit=pad', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `email`, `password`, `is_admin`, `is_blocked`) VALUES
(9, 'gema vasquez', '', '122@gmail.com', '$2y$10$E95R4PJcofqLy4cGbH2IierJX.A1LRsxeNB9lJMmgrGgyjc4V7Lwy', 0, 0),
(11, 'maria', '', '123@gmail.com', '$2y$10$kCVEs7RgjXt8wLS5YpC50enPn4IJzFwTnCeSgjUNtEhdWNviV4YE2', 0, 0),
(13, 'admin', '', 'admin@correo.com', '$2y$10$TFYk.DT/QWvyQAwZWWhvOus3G.ZkxXZ5/sn2FMmjrDNjkksOz.q0u', 1, 0),
(16, 'gema vasquez', '', 'rosa@gmail.com', '$2y$10$5A4zQan0BRZgJHVD388VKubDMAdVTeeSApZWbLjdVx1la00l/HNd6', 0, 0),
(17, 'gfd', '', 'sfgjgfj@xn--jkl-6maa', '$2y$10$p5STekksZkxtEovxC4tM/OmoqnYCjw6gIxGw2OaQKjcmh30aRphyW', 0, 0),
(18, 'gfd', '', 'dsgdfg@gmail.com', '$2y$10$GZwXE6E86mOaTQDIpxgjhO9qmn83nEsg.CTMdgN5NlVz5zeLOrWd6', 0, 0),
(19, 'gfd', '', 'rosa@gmail.com', '$2y$10$lsBSNAiHcJrh9ZmXAnqT2.Tsw31h6p7idLqArF1hAsbCsgUFB/7cG', 0, 0),
(20, 'gfd', '', 'rosa@gmail.com', '$2y$10$EH5mUq/KDkTy9m4ZJdwQceVB3/6VoDyFPsHC11TJQw05MKEOkqdGu', 0, 0),
(21, 'HOLA', '', 'dsgdfg@gmail.com', '$2y$10$ZBtyp/prU8CyToQJ0FO6TuStDLnxt46tq/I6.OuiU/mlP/PgLzp46', 0, 0),
(22, 'HOLA', '', 'sfgjgfj@xn--jkl-6maa', '$2y$10$zl.yvy97TWYjQ/lWaixVKO/lIkMhTUS13ZwcjYfFGe7YftdiRU8dW', 0, 0),
(23, 'gfd', '', 'dsgdfg@gmail.com', '$2y$10$ZGL9gWPYIoZWrTt2y8VWIOzJFBFau/snhovMeezOiUq/ZvUSRitu6', 0, 0),
(24, 'gfd', '', 'dsgdfg@gmail.com', '$2y$10$fsihWOumSFnsNBpYomb.MOhz18T/uZ7XHymxmN4dFWTf7QBSNX3De', 0, 0),
(25, 'gfd', '', 'dsgdfg@gmail.com', '$2y$10$3rBKayqZ8zNJUvzOqzW.QerjDsvs0X1j4xSDFZauDajQSjOqJiN0a', 0, 0),
(26, 'gfd', '', 'dsgdfssfg@gmail.com', '$2y$10$A4yLPxdG9eodiFgw.5cy7OEZWitoVfyrCNxXwQ4.WDmblixJGbKw6', 0, 0),
(27, 'HOLA', '', 'rosa@gmail.com', '$2y$10$rd8pWcEiclHNhgw3nMIqtu2FqrAxbVuJUkSJDfVTvMzgskzuRLAGG', 0, 0),
(28, 'HOLA', '', 'dsgdfg@gmail.com', '$2y$10$trnJROEeQWGiRpgj4kpyMOQjOfG74VqMdW2IKg72KSveghjGjsUDG', 0, 0),
(29, 'luis', '', 'rosa@gmail.com', '$2y$10$LebLH6QQ3nttF5ir9qfBKeG/Y6ShFy.GdXOm10rW/vb03GsdrmC3y', 0, 0),
(30, 'maria', '', 'dsgdfg@gmail.com', '$2y$10$PhUtpGlyYirjypgtnX4z9.SUD0uVHyvp0uJXTGNhMQl7yG6Vv5zLa', 0, 0),
(31, 'hgyj', '', 'dsgdfg@gmail.com', '$2y$10$tjGe6VguibjaihoEBS0KxO1xJKj3XudQtEnUT50lLP7n1U6XJ6Nte', 0, 0),
(32, 'gema', '', 'rosa@gmail.com', '$2y$10$/aNujb4QQpvptbV2q0wUae/nC6zb4PxFkGNObxhMhb3KVg5Dz6fua', 0, 1),
(33, 'gema', '', '123@gmail.com', '$2y$10$xFXCgbqLSyt.FhGq6hbfQerf1KEE99pSZ3Ft2.JknLe/9Fj0cl5Fq', 0, 1),
(34, 'gema', '', 'gemavasquez812@gmail.com', '$2y$10$Imw/sWcnqrnYGazo3pyIC.lVpwLFXLhVq0T4es4B8/pE1jL13WMxK', 0, 0),
(35, 'gema', '', 'gemavasquez812@gmail.com', '$2y$10$r8R2q6yqPmJXh72Pv1pRZuOA2BnSijgSUvZ9UXKsBqwpH8F3TfigC', 0, 0),
(36, 'gema', '', 'gemavasquez812@gmail.com', '$2y$10$ipITXmB7lw2fhVX4F4afguIul1r.4MI5rlBoHc3CAvGZpfqTPMYZe', 0, 0),
(37, 'vasquez', '', 'gemavasquez812@gmail.com', '$2y$10$GhiNaSMfxOtZu7U/QCm/geoHlp2i2j//4nIBcwcmuS4Eeu92uuOP.', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
