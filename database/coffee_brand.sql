-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 07. Jun 2022 um 20:11
-- Server-Version: 5.7.36
-- PHP-Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `coffee_brand`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coffee_brands`
--

DROP TABLE IF EXISTS `coffee_brands`;
CREATE TABLE IF NOT EXISTS `coffee_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `coffee_brands`
--

INSERT INTO `coffee_brands` (`id`, `name`, `image`, `path`, `created_at`, `updated_at`) VALUES
(3, 'fdsfsdfdsf', 'coffee2.png', '/storage/uploads/coffee2.png', '2022-06-07 13:45:16', '2022-06-07 15:35:45'),
(4, 'fdsfdsafdsf', 'coffee1.jpg', '/storage/uploads/coffee1.jpg', '2022-06-07 17:18:07', '2022-06-07 17:18:07');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@test.com', '891Zud7lPkMd5aL6EWJxjYcwaQI6oDWzbT3EnrDoDQ0K1kLnxPf0uqVkRODhBOnN', '2021-06-09 12:05:26'),
('admin@test.com', '29HtyFI9FANHBIoiaYJ9hnCuKgNGXAFNrKXOdzU500LuBcHwsA47dzUH9IPfTaRJ', '2021-06-09 12:06:54'),
('admin@test.com', 'XYYLda5Bn3I53aH6ALy0wtZ9NUxVsEb23POdN9iIL8szk15nvlk29WCHGDJZuhux', '2021-06-09 12:11:26'),
('admin@test.com', 'mWlJa7ADRlZtJPpv70QtmV1EWTSNJXXE9b6S705YdZrPol4UoTmCHluaJ17H8ZY8', '2021-06-09 12:11:46'),
('admin@test.com', 'OljzcvrIqe8I2Izh5aNRSy3Ab3NcydGsDy32VEJdNfaLAXFdxS2QTJnaFUaZj6Ko', '2021-06-09 12:15:19');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coffee_brand_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `coffee_brand_id`, `name`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, NULL, 'shyam', 'shyam@test.com', '$2y$10$KyCM8psQt4ABrLhQWwu/c.LfxCP1CQp6jqE9xXI88eoeKMcYvhUre', '2021-10-26 18:08:43', '2022-03-19 20:33:05', NULL),
(14, NULL, 'test user', 'test@test.com', '$2y$10$PTbPSn0cePGBELtkeawQL.m85EBpsr8TvT6C8YL9syG3fwW63ufva', '2022-06-07 11:59:04', '2022-06-07 11:59:04', NULL),
(16, NULL, 'cczxcz\\x', 'abc@test.com', '$2y$10$jNUks62enFH1F3u5CtrnkOztkU5lXwEyp9cOCoR/hEkxdf2Ve2Dhm', '2022-06-07 12:35:11', '2022-06-07 12:35:11', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_brand_vote`
--

DROP TABLE IF EXISTS `user_brand_vote`;
CREATE TABLE IF NOT EXISTS `user_brand_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `coffee_brand_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user_brand_vote`
--

INSERT INTO `user_brand_vote` (`id`, `user_id`, `coffee_brand_id`, `created_at`, `updated_at`) VALUES
(1, 13, 2, '2022-06-07 16:44:48', '2022-06-07 16:44:48'),
(2, 13, 4, '2022-06-07 17:18:28', '2022-06-07 17:18:28'),
(3, 13, 3, '2022-06-07 17:24:11', '2022-06-07 17:24:11'),
(4, 14, 4, '2022-06-07 17:24:55', '2022-06-07 17:24:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
