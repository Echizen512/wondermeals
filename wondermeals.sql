-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 16:42:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wondermeals`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Desserts'),
(2, 'Burgers & Sandwiches'),
(3, 'Kid\'s Meals'),
(4, 'Appetizers and Companions'),
(5, 'Burritos & Quesadillas'),
(6, 'Pizzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `stars`, `comment`) VALUES
(4, 'Prueba', 'jmrm19722@gmail.com', 5, 'w'),
(5, 'Prueba', 'jmrm19722@gmail.com', 3, 'e'),
(6, 'Nanami Kento', 'jmrm19722@gmail.com', 4, 'dasds'),
(7, 'Nanami Kento', 'jmrm19722@gmail.com', 4, 'sad'),
(8, 'Nanami Kento', 'jmrm19722@gmail.com', 5, 'sdada'),
(9, 'Nanami Kento', 'jmrm19722@gmail.com', 4, 'asdsa'),
(11, 'Prueba', 'jmrm19722@gmail.com', 4, 'aaaaaazz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `complaint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `email`, `complaint`) VALUES
(2, 'Prueba', 'jmrm19722@gmail.com', 'Prueba 2'),
(5, 'Nanami Kento', 'jmrm19722@gmail.com', NULL),
(7, 'Nanami Kento', 'jmrm19722@gmail.com', 'sdsd'),
(8, 'Nanami Kento', 'jmrm19722@gmail.com', 'sds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 0 and 5),
  `type` enum('Featured','Special') NOT NULL,
  `category` varchar(50) NOT NULL,
  `active` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `rating`, `type`, `category`, `active`) VALUES
(1, 'Auusie Burguer', 'Australian style burger made with 1/2 pound pure house dipping sauce. Angus beef topped with American cheese, pickle.', 7.30, 'auusieburger.PNG', 4, 'Featured', 'Burgers & Sandwiches', 'Active'),
(2, 'Empanadas', '3 crispy stuffed pastries.\r\nFlour: Beef / Chicken. Served with house cilantro garlic dipping sauce.\r\n●Chicken\r\n●Beef', 7.70, 'empanadas.jpg', 3, 'Featured', 'Appetizers and Companions', 'Inactive'),
(4, 'Churros', '5 stuffed churro bites.', 2.80, 'churros.jpg', 4, 'Featured', 'Desserts', 'Active'),
(6, 'Brownie', '1 chocolate brownie.', 3.30, 'brownie.jpg', 3, 'Special', 'Desserts', 'Active'),
(9, 'Chicken Nuggets', '4 Crispy Chicken Nuggets or 6 Crispy Chicken Nuggets.', 8.99, 'chickennugget.jpg', 4, 'Special', 'Appetizers and Companions', 'Active'),
(10, 'Kolaches', 'It is a type of cake with origins in the Czech Republic. The word comes from kolo, which means circle.\r\n●Ham/Bacon/Chez\r\n●Sausage/Egg/Chez\r\n●Egg/Chez\r\n●Brisket', 10.99, 'kolaches.jpg', 4, 'Featured', 'Desserts', 'Active'),
(11, 'Fried Oreos', '3 oreo cookies per serving.', 12.99, 'friedoreos.PNG', 4, 'Special', 'Desserts', 'Active'),
(15, 'Mozzarella Sticks', '3 crispy mozzarella fingers. Served with dipping sauce on the side', 6.49, 'mozzarelasticks.jpg', 4, 'Featured', 'Appetizers and Companions', 'Active'),
(16, 'Caesar Wrap', 'Caesar Wrap', 5.99, 'caesarwrap.jpg', 4, 'Featured', 'Burritos & Quesadillas', 'Active'),
(17, 'Mac N’ Cheese', 'Bowl of macaroni and cheese.', 4.99, 'macncheese.jpg', 4, 'Special', 'Appetizers and Companions', 'Active'),
(18, 'Chicken Strips / Fries', '5 chicken tender and side of fries. served with ketchup and ranch dressing.', 7.99, 'chickenstrips.jpg', 5, 'Featured', 'Appetizers and Companions', 'Active'),
(19, 'Breakfast Burritos', 'Breakfast Burritos', 7.49, 'brakfastburritos.jpg', 4, 'Featured', 'Burritos & Quesadillas', 'Active'),
(20, 'Cheeseburger', 'Juicy cheeseburger with a side of fries.', 6.99, 'cheezburguer.jpg', 4, 'Featured', 'Burgers & Sandwiches', 'Active'),
(21, 'Cuban Sandwich', 'Traditional Cuban sandwich with pork, ham, and cheese.', 8.49, 'porksandwich.jpg', 5, 'Special', 'Burgers & Sandwiches', 'Active'),
(22, 'Quesadillas', 'Crispy 12\" flour tortilla stuffed with melty cheese. Served with sour cream, shredded cheese. Served with sour cream, shredded, lettuce, guacamole and salsa,', 7.99, 'quesadillas.jpg', 4, 'Featured', 'Appetizers and Companions', 'Active'),
(23, 'Chicken Wings', 'Spicy chicken wings served with dipping sauce.', 8.99, 'wings.jpg', 4, 'Special', 'Appetizers and Companions', 'Active'),
(24, 'Tequeños', 'Three Panela Cheese rolls, hand wrapped served with cilantro garlic dipping sauce.', 3.50, 'tequenos.jpg', 4, 'Special', 'Appetizers and Companions', 'Active'),
(26, 'Wedges Potato', 'Crispy Potato Wedges served with sour cream and chili sauce.', 3.50, 'wedgespotato.jpg', 4, 'Featured', 'Appetizers and Companions', 'Active'),
(28, 'Nutella Croissant', 'Nutella Croissant', 4.10, 'nutellacroissant.jpg', 4, 'Special', 'Desserts', 'Active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `icon`, `url`, `color`) VALUES
(1, 'WhatsApp', 'fa-brands fa-whatsapp', 'https://wa.me/123456789', '#25D366'),
(2, 'Instagram', 'fa-brands fa-instagram', 'https://www.instagram.com/wondermealstx?igsh=MW1zeWgyMTQ3NmVp', '#E4405F'),
(3, 'Facebook', 'fa-brands fa-facebook', 'https://facebook.com/yourprofile', '#1877F2'),
(4, 'Gmail', 'fa-solid fa-envelope', 'wondermeals@support.com', '#EA4335');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$oYNLjuMm6GHkEB03exSTLOmSJjy/ge1OUra0sUUVsPKXLgREexoN.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
