-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2023 a las 16:41:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventory-app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_brand` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_model` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_presentation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `pro_min_stock` int(11) DEFAULT NULL,
  `pro_max_stock` int(11) DEFAULT NULL,
  `pro_purchased_price` double(8,2) DEFAULT NULL,
  `pro_cost` double(8,2) NOT NULL,
  `pro_wholesale_cost` double(8,2) DEFAULT NULL,
  `pro_iva` int(11) DEFAULT NULL,
  `pro_state` tinyint(1) NOT NULL,
  `pro_discount` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `pro_code`, `pro_img`, `pro_name`, `pro_brand`, `pro_color`, `pro_model`, `pro_description`, `pro_presentation`, `pro_stock`, `pro_min_stock`, `pro_max_stock`, `pro_purchased_price`, `pro_cost`, `pro_wholesale_cost`, `pro_iva`, `pro_state`, `pro_discount`, `category_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'SS-2', 'https://i.pinimg.com/550x/9e/f1/d8/9ef1d83080f0fc5691a44e11a333c000.jpg', 'Pininm', 'Pichi', 'Azul', NULL, NULL, 'unidad', 10, NULL, NULL, NULL, 80000.00, NULL, NULL, 1, NULL, 2, 2, '2022-11-27 07:32:33', '2022-11-27 08:17:08'),
(2, 'SS-23', 'https://mimundodemoda.com/wp-content/uploads/2017/10/Camisa_de_hombre.jpg', 'Syle', 'Pichi', 'Azul', NULL, NULL, 'unidad', 10, NULL, NULL, NULL, 82000.00, NULL, NULL, 0, NULL, 2, 1, '2022-11-27 08:19:12', '2022-11-27 08:19:12'),
(3, 'SS-1we', 'https://http2.mlstatic.com/D_NQ_NP_958145-MCO50939074009_072022-W.jpg', 'Alamy', 'Adidas', 'Blanco', NULL, NULL, 'unidad', 10, NULL, NULL, NULL, 85000.00, NULL, NULL, 1, NULL, 1, 1, '2022-11-27 09:55:00', '2022-11-27 09:55:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
