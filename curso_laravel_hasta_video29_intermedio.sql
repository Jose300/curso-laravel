-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 30-03-2021 a las 16:16:38
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assigned_roles`
--

INSERT INTO `assigned_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(6, 3),
(4, 4),
(5, 2),
(7, 2),
(8, 2),
(9, 2),
(9, 3),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensaje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `nombre`, `email`, `phone`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'Jose Perera', 'jperera@gmail.com', '04169105581', 'Mensaje Jose Perera', '2021-03-28 03:58:51', '2021-03-28 03:58:51'),
(2, 'Francisco Cabriales', 'fcabriales@gmail.com', '02122592556', 'Mensaje de Francisco', '2021-03-28 03:59:11', '2021-03-28 03:59:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(59, '2014_10_12_000000_create_users_table', 3),
(60, '2014_10_12_100000_create_password_resets_table', 3),
(61, '2019_08_19_000000_create_failed_jobs_table', 3),
(62, '2020_11_21_205343_create_messages_table', 3),
(63, '2020_11_21_210852_add_phone_to_messages_table', 3),
(64, '2020_12_15_153345_create_roles_table', 3),
(65, '2021_03_03_013908_create_assigned_roles_table', 3),
(49, '2021_03_27_004020_create_note_models_table', 2),
(66, '2021_03_27_005011_create_notes_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notable_id` int(11) NOT NULL,
  `notable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `body`, `notable_id`, `notable_type`, `created_at`, `updated_at`) VALUES
(1, 'Nota del Mensaje 1', 1, 'App\\Models\\MessageModel', '2021-03-28 04:05:04', '2021-03-28 04:05:04'),
(2, 'Nota del Mensaje 2', 2, 'App\\Models\\MessageModel', '2021-03-28 04:06:13', '2021-03-28 04:06:13'),
(3, 'Nota del Usuario 1', 1, 'App\\Models\\User', '2021-03-28 04:13:56', '2021-03-28 04:13:56'),
(4, 'Nota del Usuario 2', 2, 'App\\Models\\User', '2021-03-28 04:14:59', '2021-03-28 04:14:59'),
(5, 'Nota del Usuario 3', 3, 'App\\Models\\User', '2021-03-28 04:18:40', '2021-03-28 04:18:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrador', 'Este rol tiene los permisos de Administrador del site', '2021-03-28 03:55:45', '2021-03-28 03:55:45'),
(2, 'Estudiante', 'Estudiante', 'Este rol tiene los permisos de Estudiante del site', '2021-03-28 03:56:06', '2021-03-28 03:56:06'),
(3, 'Invitado', 'Invitado', 'Este rol tiene los permisos de Invitado del site', '2021-03-28 03:56:23', '2021-03-28 03:56:23'),
(4, 'Moderador', 'Moderador', 'Este rol tiene permisos como Moderador del Site', '2021-03-29 21:10:15', '2021-03-29 21:10:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@email.com', NULL, '$2y$10$eKEHIW0avzcU06TGznH4qu/0iR/31ExsA21.vM33Ks.AGFEexDewW', NULL, '2021-03-28 03:52:27', '2021-03-28 03:52:27'),
(2, 'Estudiante', 'estudiante@email.com', NULL, '$2y$10$SDmHrY8AbxmK1jEqyok8tOjQvnJn2ncCstN.ih3vSk32UZxiEInPi', NULL, '2021-03-28 03:53:01', '2021-03-28 03:53:01'),
(3, 'Invitado', 'guest@email.com', NULL, '$2y$10$VAwR/4Dk/UvsHTO1LSHjAectg1iCYObXzFXV.E2wZ52hzpMoqh1NO', NULL, '2021-03-28 03:53:39', '2021-03-28 03:53:39'),
(4, 'Luis', 'mod@email.com', NULL, '$2y$10$.tVbncl7VCWvFt7Iy0vB4./5DL6hQMDBmxrs79QvoothY/gaFnncq', NULL, '2021-03-29 21:03:19', '2021-03-29 21:03:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
