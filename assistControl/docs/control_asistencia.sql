-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2019 a las 23:25:09
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$fCOiMky4n5hCJx3cpsG20Od4wHtlkCLKmO6VLobJNRIg9ooHTkgjK', 'Yess', 'HA', 'female4.jpg', '2018-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  `month` varchar(50) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`, `month`) VALUES
(1, 2, '2019-01-01', '17:04:58', 1, '00:00:00', 0, 'enero'),
(9, 1, '2019-01-03', '17:09:02', 1, '21:47:36', 0.15, 'enero'),
(10, 2, '2019-01-03', '17:09:50', 1, '21:47:28', 0.15, 'enero'),
(11, 3, '2019-01-03', '17:11:33', 1, '21:47:44', 0.18333333333333, 'enero'),
(12, 4, '2019-01-03', '17:12:07', 1, '21:47:40', 0.2, 'enero'),
(17, 4, '2018-12-05', '08:00:00', 1, '17:00:00', 8, 'diciembre'),
(18, 3, '2018-12-05', '08:00:00', 1, '17:00:00', 8, 'diciembre'),
(19, 4, '2019-01-04', '00:53:48', 1, '00:00:00', 0, 'enero'),
(20, 2, '2019-01-04', '00:54:00', 1, '00:00:00', 0, 'enero'),
(21, 1, '2019-01-04', '00:54:04', 1, '00:00:00', 0, 'enero'),
(24, 3, '2019-01-04', '02:45:05', 1, '00:00:00', 0, 'enero'),
(25, 5, '2019-01-04', '14:59:37', 1, '15:07:50', 1.3666666666667, 'enero'),
(26, 6, '2019-01-04', '16:33:22', 1, '00:00:00', 0, 'enero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(1, 'KER0852', 'Kaly', 'Cristobal AlcÃ¡ntara', 'Jr. Martires de Rancas 456', '1983-11-24', '975845844', 'Female', 2, 2, 'ANDRE.JPG', '2019-01-01'),
(2, 'KER2691', 'Yessenia', 'HuamÃ¡n Atencio', 'Av. Bolivia 4567', '1990-01-16', '975845844', 'Female', 1, 2, 'female4.jpg', '2019-01-01'),
(3, 'KER7953', 'Paola', 'Cruz Rafael', 'Av. Los girasoles 7894', '1995-07-19', '975845844', 'Female', 4, 2, 'thanossmile.jpg', '2019-01-01'),
(4, 'KER3815', 'Sharon', 'HuamÃ¡n Quispe', 'Av. Canada 1234', '2009-02-17', '975845844', 'Female', 3, 2, 'male6.jpg', '2019-01-01'),
(5, 'KER3617', 'Alguien', 'MÃ¡s', 'bhjbn', '2019-01-11', 'bhjn', 'Male', 1, 4, '', '2019-01-04'),
(6, 'KER1478', 'Marco', 'de lal Cruz', 'bhjbkj', '2019-01-08', '975845844', 'Male', 1, 4, '', '2019-01-04'),
(7, 'KER1502', 'Mari', 'Soto', 'bjbkj', '2019-01-11', 'bhjn', 'Female', 3, 5, '', '2019-01-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falta`
--

CREATE TABLE `falta` (
  `id_falta` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `justificacion_date` date DEFAULT NULL,
  `justificacion_file` varchar(100) DEFAULT NULL,
  `justificacion_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `falta`
--

INSERT INTO `falta` (`id_falta`, `employee_id`, `date`, `justificacion_date`, `justificacion_file`, `justificacion_status`) VALUES
(1, 'KER7953', '2018-12-03', '2019-01-03', 'https://drive.google.com/file/d/1RZcR1XwIlnps2hhHbpLhGrlOYUTIsH9Y/view?usp=sharing', 'Aprobado'),
(2, 'KER2691', '2018-12-04', '2019-01-03', 'https://drive.google.com/file/d/1RZcR1XwIlnps2hhHbpLhGrlOYUTIsH9Y/view?usp=sharing', 'Aprobado'),
(3, 'KER3815', '2018-12-06', '2019-01-03', 'https://drive.google.com/file/d/1RZcR1XwIlnps2hhHbpLhGrlOYUTIsH9Y/view?usp=sharing', 'Aprobado'),
(4, 'KER7953', '2019-01-02', '2019-01-04', 'https://drive.google.com/file/d/1RZcR1XwIlnps2hhHbpLhGrlOYUTIsH9Y/view?usp=sharing', NULL),
(5, 'KER3815', '2019-01-02', NULL, NULL, NULL),
(6, 'KER2691', '2019-01-02', NULL, NULL, NULL),
(7, 'KER0852', '2019-01-02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programador', 100),
(2, 'Digitador', 50),
(3, 'Vendedor', 35),
(4, 'DiseÃ±ador GrÃ¡fico', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '16:30:00', '19:00:00'),
(5, '16:00:00', '16:30:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`id_falta`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
