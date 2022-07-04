-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 01:15 PM
-- Server version: 10.5.10-MariaDB-debug
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jela_svijeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `title`, `slug`) VALUES
(1, 1, 'en', 'New Frederiqueburgh', 'new frederiqueburgh'),
(2, 1, 'hr', 'Makarska', 'makarska'),
(3, 1, 'fr', 'Hubert-la-Forêt', 'hubert-la-forêt'),
(4, 2, 'en', 'Gleasonton', 'gleasonton'),
(5, 2, 'hr', 'Križevci', 'križevci'),
(6, 2, 'fr', 'Verdier', 'verdier'),
(8, 3, 'en', 'Anastasiaport', 'anastasiaport'),
(9, 3, 'hr', 'Pag', 'pag'),
(10, 3, 'fr', 'Marques', 'marques'),
(11, 4, 'en', 'Lonniechester', 'lonniechester'),
(12, 4, 'hr', 'Zlatar', 'zlatar'),
(13, 4, 'fr', 'Guyon', 'guyon'),
(14, 5, 'en', 'Houstonport', 'houstonport'),
(15, 5, 'hr', 'Vrbovsko', 'vrbovsko'),
(16, 5, 'fr', 'Charpentier', 'charpentier'),
(17, 6, 'en', 'Elizabethport', 'elizabethport'),
(18, 6, 'hr', 'Županja', 'Županja'),
(19, 6, 'fr', 'Blanchet-sur-Klein', 'blanchet-sur-klein'),
(20, 7, 'en', 'West Cyrilport', 'west cyrilport'),
(21, 7, 'hr', 'Pula', 'pula'),
(22, 7, 'fr', 'Brun-sur-Ollivier', 'brun-sur-ollivier'),
(23, 8, 'en', 'New Montyhaven', 'new montyhaven'),
(24, 8, 'hr', 'Pregrada', 'pregrada'),
(25, 8, 'fr', 'Parent', 'parent'),
(26, 9, 'en', 'Franeckiview', 'franeckiview'),
(27, 9, 'hr', 'Daruvar', 'daruvar'),
(28, 9, 'fr', 'Leroy-la-Forêt', 'leroy-la-forêt'),
(29, 10, 'en', 'Solonland', 'solonland'),
(30, 10, 'hr', 'Kutjevo', 'kutjevo'),
(31, 10, 'fr', 'Rolland', 'rolland');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_translations`
--

CREATE TABLE `ingredients_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `ingredients_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients_translations`
--

INSERT INTO `ingredients_translations` (`id`, `ingredients_id`, `locale`, `title`, `slug`) VALUES
(1, 1, 'en', 'British Virgin Islands', 'british virgin islands'),
(2, 1, 'hr', 'Južna Koreja', 'južna koreja'),
(3, 1, 'fr', 'Arménie', 'arménie'),
(4, 2, 'en', 'New Caledonia', 'new caledonia'),
(5, 2, 'hr', 'Švedska', 'Švedska'),
(6, 2, 'fr', 'Suisse', 'suisse'),
(7, 3, 'en', 'India', 'india'),
(8, 3, 'hr', 'Oman', 'oman'),
(9, 3, 'fr', 'Corée du Nord', 'corée du nord'),
(11, 4, 'en', 'Puerto Rico', 'puerto rico'),
(12, 4, 'hr', 'Američka Samoa', 'američka samoa'),
(13, 4, 'fr', 'Macédoine', 'macédoine'),
(14, 5, 'en', 'Saint Martin', 'saint martin'),
(15, 5, 'hr', 'Ujedinjeni Arapski Emirati', 'ujedinjeni arapski emirati'),
(16, 5, 'fr', 'Danemark', 'danemark'),
(18, 6, 'en', 'Georgia', 'georgia'),
(19, 6, 'hr', 'Kuba', 'kuba'),
(20, 6, 'fr', 'Saint Pierre et Miquelon', 'saint pierre et miquelon'),
(21, 7, 'en', 'Estonia', 'estonia'),
(22, 7, 'hr', 'Bangladeš', 'bangladeš'),
(23, 7, 'fr', 'Anguilla', 'anguilla'),
(24, 8, 'en', 'Afghanistan', 'afghanistan'),
(25, 8, 'hr', 'Ujedinjeno Kraljevstvo', 'ujedinjeno kraljevstvo'),
(26, 8, 'fr', 'Togo', 'togo'),
(27, 9, 'en', 'El Salvador', 'el salvador'),
(28, 9, 'hr', 'Kuvajt', 'kuvajt'),
(29, 9, 'fr', 'Croatie', 'croatie'),
(30, 10, 'en', 'Saudi Arabia', 'saudi arabia'),
(31, 10, 'hr', 'Kanada', 'kanada'),
(32, 10, 'fr', 'Taiwan', 'taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `locale`) VALUES
(1, 'English', 'en'),
(2, 'Croatian', 'hr'),
(3, 'French', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-06-18 13:53:32', NULL, NULL),
(2, '2022-06-18 13:53:32', NULL, NULL),
(3, '2022-06-18 13:53:32', NULL, NULL),
(4, '2022-06-18 13:53:32', NULL, NULL),
(5, '2022-06-18 13:53:32', NULL, NULL),
(6, '2022-06-18 13:53:32', NULL, NULL),
(7, '2022-06-18 13:53:32', NULL, NULL),
(8, '2022-06-18 13:53:32', NULL, NULL),
(9, '2022-06-18 13:53:32', NULL, NULL),
(10, '2022-06-18 13:53:32', NULL, NULL),
(11, '2022-06-18 13:53:32', NULL, NULL),
(12, '2022-06-18 13:53:32', NULL, NULL),
(13, '2022-06-18 13:53:32', NULL, NULL),
(14, '2022-06-18 13:53:32', NULL, NULL),
(15, '2022-06-18 13:53:32', NULL, NULL),
(16, '2022-06-18 13:53:32', NULL, NULL),
(17, '2022-06-18 13:53:32', NULL, NULL),
(18, '2022-06-18 13:53:32', NULL, NULL),
(19, '2022-06-18 13:53:32', NULL, NULL),
(20, '2022-06-18 13:53:32', NULL, NULL),
(21, '2022-06-18 13:53:32', NULL, NULL),
(22, '2022-06-18 13:53:32', NULL, NULL),
(23, '2022-06-18 13:53:32', NULL, NULL),
(24, '2022-06-18 13:53:32', NULL, NULL),
(25, '2022-06-18 13:53:32', NULL, NULL),
(26, '2022-06-18 13:53:32', NULL, NULL),
(27, '2022-06-18 13:53:32', NULL, NULL),
(28, '2022-06-18 13:53:32', NULL, NULL),
(29, '2022-06-18 13:53:32', NULL, NULL),
(30, '2022-06-18 13:53:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meals_category`
--

CREATE TABLE `meals_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals_category`
--

INSERT INTO `meals_category` (`id`, `meal_id`, `category_id`) VALUES
(1, 1, 3),
(2, 2, NULL),
(3, 3, 1),
(4, 4, 7),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, 2),
(8, 8, 5),
(9, 9, 4),
(10, 10, 8),
(11, 11, 6),
(12, 12, 10),
(13, 13, 9),
(14, 14, 1),
(15, 15, NULL),
(16, 16, 3),
(17, 17, NULL),
(18, 18, 2),
(19, 19, 10),
(20, 20, 6),
(21, 21, NULL),
(22, 22, 8),
(23, 23, 9),
(24, 24, 4),
(25, 25, 4),
(26, 26, 5),
(27, 27, 3),
(28, 28, 7),
(29, 29, 10),
(30, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meals_ingredients`
--

CREATE TABLE `meals_ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `ingredients_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals_ingredients`
--

INSERT INTO `meals_ingredients` (`id`, `meal_id`, `ingredients_id`) VALUES
(1, 1, 7),
(2, 1, 3),
(3, 2, 5),
(4, 3, 10),
(5, 4, 7),
(6, 4, 2),
(7, 5, 9),
(8, 6, 1),
(9, 6, 10),
(10, 7, 2),
(11, 7, 8),
(12, 8, 4),
(13, 8, 2),
(14, 9, 6),
(15, 9, 4),
(16, 10, 2),
(17, 11, 1),
(18, 12, 10),
(19, 13, 8),
(20, 13, 5),
(21, 14, 1),
(22, 15, 4),
(23, 15, 3),
(24, 16, 10),
(25, 17, 4),
(26, 18, 3),
(27, 18, 9),
(28, 19, 1),
(29, 19, 10),
(30, 20, 8),
(31, 21, 6),
(32, 22, 2),
(33, 22, 6),
(34, 23, 9),
(35, 24, 1),
(36, 24, 7),
(37, 25, 4),
(38, 26, 3),
(39, 26, 5),
(40, 27, 2),
(41, 27, 6),
(42, 28, 1),
(43, 28, 5),
(44, 29, 10),
(45, 30, 2),
(46, 30, 7),
(47, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `meals_tags`
--

CREATE TABLE `meals_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_id` int(10) UNSIGNED NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals_tags`
--

INSERT INTO `meals_tags` (`id`, `meal_id`, `tags_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 9),
(4, 3, 5),
(5, 4, 6),
(6, 5, 1),
(7, 5, 7),
(8, 5, 9),
(9, 6, 4),
(10, 7, 8),
(11, 8, 10),
(12, 9, 3),
(13, 9, 5),
(14, 10, 3),
(15, 11, 3),
(16, 11, 7),
(17, 11, 8),
(18, 12, 2),
(19, 13, 1),
(20, 13, 5),
(21, 14, 10),
(22, 15, 4),
(23, 16, 4),
(24, 17, 6),
(25, 18, 6),
(26, 18, 4),
(27, 19, 10),
(28, 20, 9),
(29, 21, 2),
(30, 22, 2),
(31, 23, 1),
(32, 24, 8),
(33, 24, 3),
(34, 25, 3),
(35, 26, 1),
(36, 26, 9),
(37, 26, 7),
(38, 27, 9),
(39, 28, 10),
(40, 28, 1),
(41, 29, 9),
(42, 30, 1),
(43, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meals_translations`
--

CREATE TABLE `meals_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `meals_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('created','modified','deleted','') NOT NULL DEFAULT 'created',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meals_translations`
--

INSERT INTO `meals_translations` (`id`, `meals_id`, `locale`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Will Berge', '833 Brent Center Apt. 395\nNorth Nicholaus, ND 34478', 'deleted', '2022-06-18 14:13:26', NULL, '2022-06-19 15:13:33'),
(2, 1, 'hr', 'Mihaela Čupić', 'Ulica kneza Trpimira 14, 33688 Pleternica', 'deleted', '2022-06-18 14:13:32', NULL, '2022-06-19 15:13:33'),
(3, 1, 'fr', 'Sébastien Le Maury', '8, boulevard de Maury\n75 615 Bailly', 'deleted', '2022-06-18 14:13:35', NULL, '2022-06-19 15:13:33'),
(4, 2, 'en', 'Armani Ruecker', '744 Birdie Valleys\nEast Melodyberg, GA 21209-4785', 'created', '2022-06-18 14:13:53', NULL, NULL),
(5, 2, 'hr', 'Danijel Srna', 'Ulica svetog Martina 60, 63028 Krapina', 'created', '2022-06-18 14:13:56', NULL, NULL),
(6, 2, 'fr', 'Gérard Bernier', '43, avenue Bernard Leclerc\n77261 Roux', 'created', '2022-06-18 14:13:57', NULL, NULL),
(7, 3, 'en', 'Fern Skiles', '5666 Lavinia Mountain\nHodkiewiczstad, FL 33430-3676', 'created', '2022-06-18 14:15:57', NULL, NULL),
(8, 3, 'hr', 'Marino Čupić', 'Virska ulica 35, 99135 Samobor', 'created', '2022-06-18 14:15:59', NULL, NULL),
(9, 3, 'fr', 'Paul Le Robin', '974, rue de Foucher\n57913 Millet', 'created', '2022-06-18 14:16:00', NULL, NULL),
(10, 4, 'en', 'Mr. Ferne Hegmann', '4517 Kiehn Tunnel Apt. 957\nBlandastad, RI 63591', 'modified', '2022-06-18 14:16:04', '2022-06-19 15:12:22', NULL),
(11, 4, 'hr', 'Marko Horvat', 'Srednja ulica 19, 55243 Zabok', 'modified', '2022-06-18 14:16:06', '2022-06-19 15:12:22', NULL),
(12, 4, 'fr', 'Éric Ramos', '8, boulevard Sylvie Marion\n68 944 Guilbert', 'modified', '2022-06-18 14:16:07', '2022-06-19 15:12:22', NULL),
(13, 5, 'en', 'Mr. Nat Bednar', '375 Casper Prairie\nNew Margaret, SC 02838', 'created', '2022-06-18 14:16:10', NULL, NULL),
(14, 5, 'hr', 'Mia Blažević', 'Ulica Ivane Brlić-Mažuranić 29, 35387 Šibenik', 'created', '2022-06-18 14:16:11', NULL, NULL),
(15, 5, 'fr', 'Michel Meyer', '7, chemin Blanchard\n44 455 Blondel', 'created', '2022-06-18 14:16:13', NULL, NULL),
(16, 6, 'en', 'Hannah McCullough DVM', '747 Teagan Court\nKeagantown, NC 77226-6540', 'created', '2022-06-18 14:16:20', NULL, NULL),
(17, 6, 'hr', 'Karla Perković', 'Jorgovanska ulica 56, 99658 Dubrovnik', 'created', '2022-06-18 14:16:22', NULL, NULL),
(18, 6, 'fr', 'Christelle Renard', '72, avenue Stéphane Begue\n02986 Da Costa', 'created', '2022-06-18 14:16:23', NULL, NULL),
(19, 7, 'en', 'Destiney Kub', '2518 O\'Kon Ranch\nWest Dovieburgh, ME 85924', 'deleted', '2022-06-18 14:16:29', NULL, '2022-06-19 15:14:17'),
(20, 7, 'hr', 'Karlo Tomčić', 'Ulica Ivana Gorana Kovačića 55, 11488 Imotski', 'deleted', '2022-06-18 14:16:32', NULL, '2022-06-19 15:14:17'),
(21, 7, 'fr', 'Stéphane Le Richard', '3, chemin Moreau\n43 606 Roux-sur-Mer', 'deleted', '2022-06-18 14:16:34', NULL, '2022-06-19 15:14:17'),
(22, 8, 'en', 'Alexandria West III', '335 Willa Springs\nStiedemannside, NE 77841', 'created', '2022-06-18 14:16:36', NULL, NULL),
(23, 8, 'hr', 'Lovre Vinković', 'Ulica Nikole Tesle 50, 77797 Ivanić-Grad', 'created', '2022-06-18 14:16:38', NULL, NULL),
(24, 8, 'fr', 'Christophe Pierre', 'rue de Marques\n02496 Baron-les-Bains', 'created', '2022-06-18 14:16:40', NULL, NULL),
(26, 9, 'en', 'Catharine Rath', '37271 Hansen Landing\nDeronborough, IL 34991-6172', 'modified', '2022-06-18 14:17:23', '2022-06-19 15:12:25', NULL),
(27, 9, 'hr', 'Sebastijan Antić', 'Nova ulica 53, 27272 Slunj', 'modified', '2022-06-18 14:17:25', '2022-06-19 15:12:25', NULL),
(28, 9, 'fr', 'René Maury-Pineau', '77, rue de Sanchez\n13 359 Roy', 'modified', '2022-06-18 14:17:26', '2022-06-19 15:12:25', NULL),
(29, 10, 'en', 'Dr. Derick Labadie DDS', '7372 O\'Connell Freeway\nHeathcotebury, AZ 11697', 'created', '2022-06-18 14:21:20', NULL, NULL),
(30, 10, 'hr', 'Nikola Babić', 'Ulica Josipa Bösendorfera 44, 31613 Vodice', 'created', '2022-06-18 14:21:22', NULL, NULL),
(31, 10, 'fr', 'Madeleine Colas', '4, rue Charrier\n52720 Letellier', 'created', '2022-06-18 14:21:23', NULL, NULL),
(32, 11, 'en', 'Dion Lindgren III', '8260 Graham Drive\nSouth Betsyfort, AK 31606-2084', 'created', '2022-06-18 14:22:05', NULL, NULL),
(33, 11, 'hr', 'Mateo Vinković', 'Osječka ulica 58, 27573 Krk', 'created', '2022-06-18 14:22:07', NULL, NULL),
(34, 11, 'fr', 'Célina Hardy', '88, chemin Anouk Alves\n27415 Guyot-sur-Allain', 'created', '2022-06-18 14:22:08', NULL, NULL),
(35, 12, 'en', 'Kasandra Beatty II', '8364 Russel Spurs Suite 650\nKirlinview, CO 73207-5267', 'modified', '2022-06-18 14:22:10', '2022-06-19 15:12:38', NULL),
(36, 12, 'hr', 'Ines Brož', 'Ulica Eugena Kvaternika 63, 94266 Vrgorac', 'modified', '2022-06-18 14:22:12', '2022-06-19 15:12:38', NULL),
(37, 12, 'fr', 'Guillaume Laurent', '66, impasse Jacquot\n68 234 Jean', 'modified', '2022-06-18 14:22:14', '2022-06-19 15:12:38', NULL),
(38, 13, 'en', 'Dr. Lisandro Hartmann MD', '580 Stoltenberg Prairie\nNew Giuseppe, NV 90291-9203', 'modified', '2022-06-18 14:22:16', '2022-06-19 15:12:51', NULL),
(39, 13, 'hr', 'Valentina Ivanović', 'Ulica Hrvatske vojske 86, 32712 Ivanić-Grad', 'modified', '2022-06-18 14:22:18', '2022-06-19 15:12:51', NULL),
(40, 13, 'fr', 'Juliette Faure', '55, avenue de Langlois\n24716 Galletnec', 'modified', '2022-06-18 14:22:19', '2022-06-19 15:12:51', NULL),
(41, 14, 'en', 'Delta Frami', '661 Hansen Parkway Apt. 210\nSouth Leonie, TX 26798-0878', 'created', '2022-06-18 14:22:22', NULL, NULL),
(42, 14, 'hr', 'Šime Tomić', 'Ulica Branka Gavelle 98, 31724 Zagreb', 'created', '2022-06-18 14:22:26', NULL, NULL),
(43, 14, 'fr', 'Bernard Leveque', '756, avenue Maury\n97835 Navarro', 'created', '2022-06-18 14:22:27', NULL, NULL),
(44, 15, 'en', 'Ettie Medhurst IV', '8379 Donnelly Wall\nNorth Bridgetburgh, MN 32609', 'deleted', '2022-06-18 14:22:31', NULL, '2022-06-19 15:13:39'),
(45, 15, 'hr', 'Tina Filipović', 'Ulica Ante Kovačića 10, 11889 Pakrac', 'deleted', '2022-06-18 14:22:33', NULL, '2022-06-19 15:13:39'),
(46, 15, 'fr', 'Julien Perrin', 'avenue Lefevre\n17 320 Garnierboeuf', 'deleted', '2022-06-18 14:22:34', NULL, '2022-06-19 15:13:39'),
(47, 16, 'en', 'Colton Smitham', '39788 Elinor Islands Suite 826\nPearliestad, OK 38047', 'deleted', '2022-06-18 14:22:41', NULL, '2022-06-19 15:13:57'),
(48, 16, 'hr', 'Danijel Antić', 'Ulica Miroslava Krleže 93, 64340 Zaprešić', 'deleted', '2022-06-18 14:22:43', NULL, '2022-06-19 15:13:57'),
(49, 16, 'fr', 'Marine de la Michaud', '4, rue Adélaïde Charrier\n87 873 Ollivierdan', 'deleted', '2022-06-18 14:22:45', NULL, '2022-06-19 15:13:57'),
(50, 17, 'en', 'Dr. Johnathon Parisian PhD', '114 Swift Dam\nMonroechester, NH 06669-8099', 'modified', '2022-06-18 14:22:47', '2022-06-19 15:12:41', NULL),
(51, 17, 'hr', 'Valentina Vuković', 'Ulica Jerka Zlatarića 61, 85398 Trogir', 'modified', '2022-06-18 14:22:49', '2022-06-19 15:12:41', NULL),
(52, 17, 'fr', 'Antoine Muller', '26, impasse Bourdon\n94 293 Guillot', 'modified', '2022-06-18 14:22:51', '2022-06-19 15:12:41', NULL),
(53, 18, 'en', 'Rudy Hahn', '6521 Koelpin Court\nRosieborough, NV 79905-9180', 'created', '2022-06-18 14:22:54', NULL, NULL),
(54, 18, 'hr', 'Vice Janković', 'Ulica Tina Ujevića 26, 31353 Kaštela', 'created', '2022-06-18 14:22:55', NULL, NULL),
(55, 18, 'fr', 'Amélie de la Grenier', '66, impasse Riou\n06 692 Seguin', 'created', '2022-06-18 14:22:56', NULL, NULL),
(56, 19, 'en', 'Mabelle Cronin', '75573 Desmond Expressway Suite 430\nRudolphbury, WV 67952', 'created', '2022-06-18 14:22:59', NULL, NULL),
(57, 19, 'hr', 'Viktor Kovačević', 'Draž-planina 91, 22408 Čazma', 'created', '2022-06-18 14:23:00', NULL, NULL),
(58, 19, 'fr', 'Emmanuelle Le Gimenez', '20, chemin Benoît Pereira\n21785 Lebrun-la-Forêt', 'created', '2022-06-18 14:23:02', NULL, NULL),
(59, 20, 'en', 'Alize Dibbert', '784 Grimes Port\nPort Birdie, TN 95056', 'modified', '2022-06-18 14:23:05', '2022-06-19 15:12:42', NULL),
(60, 20, 'hr', 'Marko Bogdanić', 'Ulica Ante Kovačića 54, 00595 Mali Lošinj', 'modified', '2022-06-18 14:23:08', '2022-06-19 15:12:42', NULL),
(61, 20, 'fr', 'Dominique Vidal-Merle', '15, rue Foucher\n31434 Brunel', 'modified', '2022-06-18 14:23:10', '2022-06-19 15:12:42', NULL),
(62, 21, 'en', 'Bradley Buckridge', '29324 Cartwright Row Suite 840\nNew Friedrichhaven, AK 15027-3821', 'deleted', '2022-06-18 14:23:12', NULL, '2022-06-19 15:14:23'),
(63, 21, 'hr', 'Leona Marković', 'Beljska ulica 59, 93856 Glina', 'deleted', '2022-06-18 14:23:25', NULL, '2022-06-19 15:14:23'),
(64, 21, 'fr', 'Louis Buisson', '615, rue Augustin Hoareau\n91776 Georges', 'deleted', '2022-06-18 14:23:28', NULL, '2022-06-19 15:14:23'),
(65, 22, 'en', 'Prof. Elisha Haag DVM', '65238 Rodriguez Tunnel Apt. 588\nEast Libby, OH 29583', 'modified', '2022-06-18 14:23:30', '2022-06-19 15:13:04', NULL),
(66, 22, 'hr', 'Stela Mlakar', 'Ulica Stjepana Radića 72, 71517 Đurđevac', 'modified', '2022-06-18 14:23:32', '2022-06-19 15:13:04', NULL),
(67, 22, 'fr', 'Christine de la Delmas', '26, rue Guy Garnier\n27240 Brunetdan', 'modified', '2022-06-18 14:23:35', '2022-06-19 15:13:04', NULL),
(68, 23, 'en', 'Darrin Kovacek', '3650 Heidenreich Bridge\nKohlerville, KY 57632-1237', 'created', '2022-06-18 14:23:37', NULL, NULL),
(69, 23, 'hr', 'Tara Vuković', 'Ulica kardinala Franje Šefera 17, 67636 Pakrac', 'created', '2022-06-18 14:23:38', NULL, NULL),
(70, 23, 'fr', 'Antoine Perrot', 'impasse Pinto\n34 362 Alexandre', 'created', '2022-06-18 14:23:44', NULL, NULL),
(72, 24, 'en', 'Mateo Hudson', '117 Reta Avenue Suite 319\nLarsonshire, IA 11003-3649', 'created', '2022-06-18 14:23:48', NULL, NULL),
(73, 24, 'hr', 'Josip Neretljak', 'Zagrebačka ulica 96, 65131 Orahovica', 'created', '2022-06-18 14:23:50', NULL, NULL),
(74, 24, 'fr', 'Stéphanie de la Bonnin', '81, avenue Ollivier\n24 350 Diaz', 'created', '2022-06-18 14:23:52', NULL, NULL),
(76, 25, 'en', 'Prof. Gracie Barrows IV', '3777 Gracie Road Suite 070\nMedhurstchester, AK 71088', 'created', '2022-06-18 14:24:03', NULL, NULL),
(77, 25, 'hr', 'Tamara Grgić', 'Ulica Vladana Desnice 37, 06585 Ilok', 'created', '2022-06-18 14:24:05', NULL, NULL),
(78, 25, 'fr', 'Patrick Bazin', '49, boulevard de Blot\n10539 Dias', 'created', '2022-06-18 14:24:07', NULL, NULL),
(79, 26, 'en', 'Carlotta Gulgowski', '899 Clare Ranch\nEast Ricky, AK 80518', 'deleted', '2022-06-18 14:24:10', NULL, '2022-06-18 14:45:35'),
(80, 26, 'hr', 'Adam Bogdanić', 'Ulica Josipa Kraša 82, 45210 Kutina', 'deleted', '2022-06-18 14:24:11', NULL, '2022-06-18 14:45:35'),
(81, 26, 'fr', 'Valentine Cordier', '673, chemin de Bourgeois\n73684 TorresVille', 'deleted', '2022-06-18 14:24:14', NULL, '2022-06-18 14:45:35'),
(82, 27, 'en', 'Mr. Conner Zemlak', '40890 Dillan Circles\nDonnymouth, ID 08428', 'created', '2022-06-18 14:24:16', NULL, NULL),
(83, 27, 'hr', 'Karla Abramović', 'Ulica Marka Marulića 78, 41839 Glina', 'created', '2022-06-18 14:24:17', NULL, NULL),
(84, 27, 'fr', 'Dominique Pinto', '58, avenue Leleu\n08039 Courtois-sur-Mer', 'created', '2022-06-18 14:24:19', NULL, NULL),
(85, 28, 'en', 'Dereck Kautzer', '3751 Joshuah Cliff Apt. 451\nJohnsonside, MI 19470', 'created', '2022-06-18 14:24:21', NULL, NULL),
(86, 28, 'hr', 'Rafael Marušić', 'Ulica Ivana Mažuranića 40, 42664 Sinj', 'created', '2022-06-18 14:24:23', NULL, NULL),
(87, 28, 'fr', 'Pierre Guerin', '92, chemin Éléonore Antoine\n18712 Fabre-sur-Mer', 'created', '2022-06-18 14:24:25', NULL, NULL),
(88, 29, 'en', 'Tom Schuster', '9309 Cortez Manors Apt. 648\nAlessiamouth, OK 06418', 'deleted', '2022-06-18 14:24:27', NULL, '2022-06-19 15:14:04'),
(89, 29, 'hr', 'Josipa Petrović', 'Vijenac Nikole Tesle 91, 51939 Supetar', 'deleted', '2022-06-18 14:24:30', NULL, '2022-06-19 15:14:04'),
(90, 29, 'fr', 'Agnès Bodin', '5, chemin Marcelle Guerin\n84 906 Lemaitre-les-Bains', 'deleted', '2022-06-18 14:24:32', NULL, '2022-06-19 15:14:04'),
(91, 30, 'en', 'Fern Smith II', '1490 Ricardo Court Suite 913\nDawnton, CT 46836', 'created', '2022-06-18 14:24:35', NULL, NULL),
(92, 30, 'hr', 'Gabrijela Dragović', 'Crkvena ulica 78, 84162 Pakrac', 'created', '2022-06-18 14:24:37', NULL, NULL),
(93, 30, 'fr', 'Gérard-André Guyon', '25, chemin Dubois\n38520 Descamps-sur-Mer', 'created', '2022-06-18 14:24:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `tags_translations`
--

CREATE TABLE `tags_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags_translations`
--

INSERT INTO `tags_translations` (`id`, `tags_id`, `locale`, `title`, `slug`) VALUES
(1, 1, 'en', 'Conn, Brown and Cremin', 'conn, brown and cremin'),
(2, 1, 'hr', 'Suvenirnica Srna', 'suvenirnica srna'),
(3, 1, 'fr', 'Roche', 'roche'),
(4, 2, 'en', 'Lockman-Ernser', 'lockman-ernser'),
(5, 2, 'hr', 'Dragić d.o.o.', 'dragić d.o.o.'),
(6, 2, 'fr', 'Loiseau Laurent S.A.', 'loiseau laurent s.a.'),
(7, 3, 'en', 'Sipes-Bergnaum', 'sipes-bergnaum'),
(8, 3, 'hr', 'Market Brož', 'market brož'),
(9, 3, 'fr', 'Bazin S.A.R.L.', 'bazin s.a.r.l.'),
(10, 4, 'en', 'Gusikowski, Farrell and Leffler', 'gusikowski, farrell and leffler'),
(11, 4, 'hr', 'Turistička agencija Modrić', 'turistička agencija modrić'),
(12, 4, 'fr', 'Lelievre', 'lelievre'),
(13, 5, 'en', 'Raynor Inc', 'raynor inc'),
(14, 5, 'hr', 'Suvenirnica Šime', 'suvenirnica Šime'),
(15, 5, 'fr', 'Jacquot Da Costa et Fils', 'jacquot da costa et fils'),
(17, 6, 'en', 'McCullough-Walker', 'mccullough-walker'),
(18, 6, 'hr', 'Turistička agencija Kovačić', 'turistička agencija kovačić'),
(19, 6, 'fr', 'Ferreira', 'ferreira'),
(20, 7, 'en', 'Kemmer, Goyette and Mayer', 'kemmer, goyette and mayer'),
(21, 7, 'hr', 'Cvjećarnica Brož', 'cvjećarnica brož'),
(22, 7, 'fr', 'Maillard S.A.', 'maillard s.a.'),
(23, 8, 'en', 'Abshire, Jacobs and Buckridge', 'abshire, jacobs and buckridge'),
(24, 8, 'hr', 'Mesnica Lea', 'mesnica lea'),
(25, 8, 'fr', 'Delaunay Gomes SA', 'delaunay gomes sa'),
(26, 9, 'en', 'Roberts, Feest and Purdy', 'roberts, feest and purdy'),
(27, 9, 'hr', 'Neretljak j.d.o.o.', 'neretljak j.d.o.o.'),
(28, 9, 'fr', 'Mace', 'mace'),
(29, 10, 'en', 'Pfeffer, Botsford and Lakin', 'pfeffer, botsford and lakin'),
(30, 10, 'hr', 'Cvjećarnica Košar', 'cvjećarnica košar'),
(31, 10, 'fr', 'Pichon', 'pichon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id_locale` (`category_id`,`locale`) USING BTREE,
  ADD UNIQUE KEY `slug` (`slug`) USING BTREE,
  ADD KEY `locale_index` (`locale`) USING BTREE;

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients_translations`
--
ALTER TABLE `ingredients_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `ingredient_id_locale` (`ingredients_id`,`locale`) USING BTREE,
  ADD KEY `locale_index` (`locale`) USING BTREE;

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_category`
--
ALTER TABLE `meals_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meals_id` (`meal_id`),
  ADD KEY `meals_category_category_id` (`category_id`);

--
-- Indexes for table `meals_ingredients`
--
ALTER TABLE `meals_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_ingredients_meals_id` (`meal_id`),
  ADD KEY `meals_ingredients_ingredients_id` (`ingredients_id`);

--
-- Indexes for table `meals_tags`
--
ALTER TABLE `meals_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meals_tags_meals-id` (`meal_id`),
  ADD KEY `meals_tags_tags_id` (`tags_id`);

--
-- Indexes for table `meals_translations`
--
ALTER TABLE `meals_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meals_translation_meal_id_locale` (`meals_id`,`locale`) USING BTREE,
  ADD KEY `locale_index` (`locale`) USING BTREE;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_translations`
--
ALTER TABLE `tags_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_id_locale` (`tags_id`,`locale`) USING BTREE,
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `locale_index` (`locale`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ingredients_translations`
--
ALTER TABLE `ingredients_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `meals_category`
--
ALTER TABLE `meals_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `meals_ingredients`
--
ALTER TABLE `meals_ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `meals_tags`
--
ALTER TABLE `meals_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `meals_translations`
--
ALTER TABLE `meals_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags_translations`
--
ALTER TABLE `tags_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `categories_translations_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients_translations`
--
ALTER TABLE `ingredients_translations`
  ADD CONSTRAINT `ingredients_translation_ingredient_id` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals_category`
--
ALTER TABLE `meals_category`
  ADD CONSTRAINT `meals_category_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meals_category_meal_id` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals_ingredients`
--
ALTER TABLE `meals_ingredients`
  ADD CONSTRAINT `meals_ingredients_ingredients_id` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meals_ingredients_meals_id` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals_tags`
--
ALTER TABLE `meals_tags`
  ADD CONSTRAINT `meals_tags_meals-id` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meals_tags_tags_id` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meals_translations`
--
ALTER TABLE `meals_translations`
  ADD CONSTRAINT `meals_translation_meal_id` FOREIGN KEY (`meals_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_translations`
--
ALTER TABLE `tags_translations`
  ADD CONSTRAINT `tags_translations_tag_id` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
