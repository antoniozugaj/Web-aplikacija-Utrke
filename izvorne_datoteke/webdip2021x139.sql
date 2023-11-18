-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 11:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdip2021x139`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `drzava_id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `kontinent` varchar(45) NOT NULL,
  `broj_dosadasnjih_utrka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`drzava_id`, `ime`, `kontinent`, `broj_dosadasnjih_utrka`) VALUES
(1, 'Hrvatska', 'Europa', 0),
(2, 'UK', 'Europa', 0),
(3, 'Italija', 'Europa', 0),
(4, 'Njemačka', 'Europa', 0),
(5, 'Španjolska', 'Europa', 0),
(6, 'Švedska', 'Europa', 0),
(7, 'SAD', 'Sjeverna Amerika', 0),
(8, 'Kanada', 'Sjeverna Amerika', 0),
(9, 'Meksiko', 'Sjeverna Amerika', 0),
(10, 'Brazil', 'Južna Amerika', 0),
(11, 'Argentina', 'Južna Amerika', 0),
(12, 'Peru', 'Južna Amerika', 0),
(13, 'Urugvaj', 'Južna Amerika', 0),
(14, 'Egipat', 'Afrika', 0),
(15, 'Nigerija', 'Afrika', 0),
(16, 'Alžir', 'Afrika', 0),
(17, 'Kina', 'Azija', 0),
(18, 'Japan', 'Azija', 0),
(19, 'Vijetnam', 'Azija', 0),
(20, 'Katar', 'Azija', 0),
(21, 'Izrael', 'Azija', 0);

-- --------------------------------------------------------

--
-- Table structure for table `etapa`
--

CREATE TABLE `etapa` (
  `etapa_id` int(11) NOT NULL,
  `grad` varchar(45) NOT NULL,
  `adresa_pocetka` varchar(45) NOT NULL,
  `duljina` varchar(45) NOT NULL,
  `zakljucana` tinyint(4) NOT NULL,
  `vrijeme_pocetka` datetime NOT NULL DEFAULT current_timestamp(),
  `vrijeme_kraja` datetime NOT NULL DEFAULT current_timestamp(),
  `utrka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etapa`
--

INSERT INTO `etapa` (`etapa_id`, `grad`, `adresa_pocetka`, `duljina`, `zakljucana`, `vrijeme_pocetka`, `vrijeme_kraja`, `utrka_id`) VALUES
(1, 'London', 'London', '32', 1, '2022-09-01 12:00:00', '2022-09-01 16:00:00', 1),
(2, 'London', 'London 2', '16', 1, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 1),
(3, 'London', 'London 2', '45', 1, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 1),
(4, 'Torino', 'Torino 1 ', '100', 1, '2023-01-01 18:00:00', '2023-01-01 19:00:00', 2),
(5, 'Torino', 'Torino 2', '100', 1, '2023-01-15 18:00:00', '2023-01-15 19:00:00', 2),
(6, 'Torino', 'Torino 3', '100', 1, '2023-02-01 17:00:00', '2023-02-01 18:00:00', 2),
(7, 'Munchen', 'adresa 1', '3000', 1, '2022-06-08 15:00:00', '2022-06-08 20:00:00', 3),
(8, 'Munchen', 'adresa 2', '3000', 1, '2022-06-09 15:00:00', '2022-06-09 20:00:00', 3),
(9, 'Munchen', 'adresa 3', '3000', 1, '2022-06-10 15:00:00', '2022-06-10 20:00:00', 3),
(10, 'Zagreb', 'Ilica 1', '100', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 12),
(11, 'Zagreb', 'Ilica 2', '100 m', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 12),
(12, 'Zagreb', 'Ilica 3', '100 m', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 12),
(13, 'Zagreb', 'Slavonska 1', '26 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 13),
(14, 'Zagreb', 'Slavonska 2', '30 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 13),
(15, 'Zagreb', 'Slavonska 3', '32 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 13),
(16, 'Zagreb', 'Slavonska 4', '21 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 13),
(17, 'Zagreb', 'Ilirska 1', '20', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 14),
(18, 'Zagreb', 'Ilirska 2', '21 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 14),
(19, 'Zagreb', 'Ilirska 3', '19 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 14),
(20, 'Zagreb', 'Ilirska 4', '20 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 14),
(21, 'Zagreb', 'Ilirska 5', '23 km', 0, '2022-06-07 12:00:00', '2022-06-07 12:00:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime_prezime` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  `SHA256_lozinka` char(64) NOT NULL,
  `validiran` tinyint(4) NOT NULL,
  `blokiran` tinyint(4) NOT NULL,
  `uvjeti_koristenja` tinyint(4) NOT NULL,
  `tip_korisnika` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `aktivacijski_kod` varchar(20) NOT NULL,
  `datum_registracije` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime_prezime`, `username`, `lozinka`, `SHA256_lozinka`, `validiran`, `blokiran`, `uvjeti_koristenja`, `tip_korisnika`, `email`, `aktivacijski_kod`, `datum_registracije`) VALUES
(1, 'Antonio Žugaj', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 3, 'admin@gmail.com', '123456', '2022-01-01 22:57:48'),
(2, 'Ivo Ivić', 'iivo', 'korisnik', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 1, 1, 'ivo@gmail.com', '653123', '2022-05-07 22:57:48'),
(3, 'Marko Marković', 'MrMarko', 'moderator', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 2, 'mr.marko@nesto.com', 'dawdadw', '2022-05-01 23:03:45'),
(4, 'Ivona Ivić', 'ivona_cro', 'lKwa421fsx', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 1, 2, 'crovona@nesta.com', 'awdasv', '2022-05-01 23:03:45'),
(5, 'Jasmin Jakov', 'jj_boyo', 'QwErT123', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 1, 0, 1, 'moderator@nesto.com', 'asd789', '2022-05-02 23:03:45'),
(6, 'Branko Bašić', 'Baško', 'Bbranko12111993', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, 1, 1, 1, 'bbranko@nesta.com', 'thfhda', '2022-05-03 23:03:45'),
(7, 'Jozo Matijavić', 'jozo', 'JaSamJ020', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 1, 'jozo@nesta.com', '75136', '2022-05-03 23:03:45'),
(8, 'Korina Kotla', 'korina89', '86Korina', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 1, 'korina89@nesta.com', 'qw56as', '2022-05-04 23:03:45'),
(9, 'Patrik Filipović', 'red', 'red462RED', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, 0, 1, 1, 'filipovic@nesta.com', 'red23r', '2022-05-04 23:03:45'),
(10, 'Lucija Lucić', 'luce', 'nEz123456789', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 1, 'luce@nesta.com', '76aw15', '2022-05-04 23:03:45'),
(11, 'Ana Anić', 'anica', 'mojaLozinka3', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 0, 0, 2, 'ane@nesta.com', 'wrq384', '2022-05-08 23:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `vrijeme` datetime NOT NULL,
  `dogadaj` varchar(280) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `vrijeme`, `dogadaj`, `korisnik_id`) VALUES
(1, '2022-06-06 14:39:31', 'PRIJAVA KORISNIKA: admin', 1),
(2, '2022-06-06 14:39:46', 'admin KREIRANJE DRZAVE: Hrvatska', 1),
(3, '2022-06-06 14:40:14', 'admin KREIRANJE DRZAVE: UK', 1),
(4, '2022-06-06 14:40:26', 'admin KREIRANJE DRZAVE: Italija', 1),
(5, '2022-06-06 14:40:44', 'admin KREIRANJE DRZAVE: Njemacka', 1),
(6, '2022-06-06 14:41:00', 'admin AZURIRANJE DRZAVE: Njemačka', 1),
(7, '2022-06-06 14:42:34', 'admin KREIRANJE DRZAVE: Španjolska', 1),
(8, '2022-06-06 14:42:45', 'admin KREIRANJE DRZAVE: Švedska', 1),
(9, '2022-06-06 14:44:20', 'admin KREIRANJE DRZAVE: SAD', 1),
(10, '2022-06-06 14:44:35', 'admin KREIRANJE DRZAVE: Kanada', 1),
(11, '2022-06-06 14:44:49', 'admin KREIRANJE DRZAVE: Meksiko', 1),
(12, '2022-06-06 14:45:10', 'admin KREIRANJE DRZAVE: Brazil', 1),
(13, '2022-06-06 14:45:23', 'admin KREIRANJE DRZAVE: Argentina', 1),
(14, '2022-06-06 14:46:31', 'admin KREIRANJE DRZAVE: Peru', 1),
(15, '2022-06-06 14:46:55', 'admin KREIRANJE DRZAVE: Urugvaj', 1),
(16, '2022-06-06 14:47:08', 'admin KREIRANJE DRZAVE: Egipat', 1),
(17, '2022-06-06 14:47:18', 'admin KREIRANJE DRZAVE: Nigerija', 1),
(18, '2022-06-06 14:47:31', 'admin KREIRANJE DRZAVE: Alžir', 1),
(19, '2022-06-06 14:47:49', 'admin KREIRANJE DRZAVE: Kina', 1),
(20, '2022-06-06 14:47:56', 'admin KREIRANJE DRZAVE: Japan', 1),
(21, '2022-06-06 14:48:06', 'admin KREIRANJE DRZAVE: Vijetnam', 1),
(22, '2022-06-06 14:48:15', 'admin KREIRANJE DRZAVE: Katar', 1),
(23, '2022-06-06 14:48:24', 'admin KREIRANJE DRZAVE: Izrael', 1),
(24, '2022-06-06 14:48:53', 'jj_boyo POSTAVLJEN ZA KORISNIKA (OD admin)', 5),
(25, '2022-06-06 14:49:03', 'jj_boyo POSTAVLJEN ZA ADMINISTRATORA (OD admin)', 5),
(26, '2022-06-06 14:49:07', 'jj_boyo POSTAVLJEN ZA MODERATORA (OD admin)', 5),
(27, '2022-06-06 14:49:16', 'jj_boyo POSTAVLJEN ZA ADMINISTRATORA (OD admin)', 5),
(28, '2022-06-06 14:49:19', 'jj_boyo POSTAVLJEN ZA KORISNIKA (OD admin)', 5),
(29, '2022-06-06 14:49:21', 'anica POSTAVLJEN ZA MODERATORA (OD admin)', 11),
(30, '2022-06-06 14:50:25', 'OTKLJUCAN KORISNIK: anica', 11),
(31, '2022-06-06 14:50:31', 'BLOKIRAN KORISNIK: anica', 11),
(32, '2022-06-06 14:58:39', 'admin KREIRANJE UTRKE: Londonski maraton', 1),
(33, '2022-06-06 14:59:26', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(34, '2022-06-06 15:03:27', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(35, '2022-06-06 15:04:20', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(36, '2022-06-06 15:04:40', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(37, '2022-06-06 15:20:36', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(38, '2022-06-06 15:20:48', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(39, '2022-06-06 15:20:53', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(40, '2022-06-06 15:25:10', 'PRIJAVA KORISNIKA: MrMarko', 3),
(41, '2022-06-06 15:25:40', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 1', 1),
(42, '2022-06-06 15:25:47', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 1', 1),
(43, '2022-06-06 15:25:57', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 2', 1),
(44, '2022-06-06 15:26:18', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 3', 1),
(45, '2022-06-06 15:26:22', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 3', 1),
(46, '2022-06-06 15:26:28', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 4', 1),
(47, '2022-06-06 15:26:31', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 4', 1),
(48, '2022-06-06 15:26:39', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 5', 1),
(49, '2022-06-06 15:26:46', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 6', 1),
(50, '2022-06-06 15:26:49', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 6', 1),
(51, '2022-06-06 15:27:06', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 7', 1),
(52, '2022-06-06 15:27:09', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 7', 1),
(53, '2022-06-06 15:27:11', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 7', 1),
(54, '2022-06-06 15:27:13', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 7', 1),
(55, '2022-06-06 15:27:17', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 7', 1),
(56, '2022-06-06 15:27:35', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 8', 1),
(57, '2022-06-06 15:27:44', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 9', 1),
(58, '2022-06-06 15:27:56', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 10', 1),
(59, '2022-06-06 15:28:26', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 11', 1),
(60, '2022-06-06 15:28:30', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 12', 1),
(61, '2022-06-06 15:28:35', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 13', 1),
(62, '2022-06-06 15:28:38', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 13', 1),
(63, '2022-06-06 15:28:41', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 14', 1),
(64, '2022-06-06 15:28:46', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 15', 1),
(65, '2022-06-06 15:28:49', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 15', 1),
(66, '2022-06-06 15:28:52', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 16', 1),
(67, '2022-06-06 15:28:54', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 16', 1),
(68, '2022-06-06 15:28:58', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 17', 1),
(69, '2022-06-06 15:29:00', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 17', 1),
(70, '2022-06-06 15:29:03', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 17', 1),
(71, '2022-06-06 15:29:05', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 17', 1),
(72, '2022-06-06 15:29:10', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 18', 1),
(73, '2022-06-06 15:29:16', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 18', 1),
(74, '2022-06-06 15:29:21', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 19', 1),
(75, '2022-06-06 15:29:25', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 20', 1),
(76, '2022-06-06 15:29:29', 'admin AZURIRANJE MODERATORA ZA DRZAVU: 21', 1),
(77, '2022-06-06 15:42:53', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(78, '2022-06-06 15:44:16', 'MrMarko KREIRANJE Etape: 1', 3),
(79, '2022-06-06 15:44:55', 'MrMarko KREIRANJE Etape: 1', 3),
(80, '2022-06-06 15:45:24', 'MrMarko AZURIRANJE UTRKE: 2', 3),
(81, '2022-06-06 15:45:38', 'MrMarko AZURIRANJE UTRKE: 2', 3),
(82, '2022-06-06 15:45:42', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(83, '2022-06-06 15:45:49', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(84, '2022-06-06 15:48:25', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(85, '2022-06-06 15:48:37', 'MrMarko AZURIRANJE UTRKE: 2', 3),
(86, '2022-06-06 15:49:02', 'MrMarko AZURIRANJE UTRKE: 2', 3),
(87, '2022-06-06 15:50:39', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(88, '2022-06-06 15:52:08', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(89, '2022-06-06 15:52:25', 'MrMarko AZURIRANJE UTRKE: 1', 3),
(90, '2022-06-06 15:52:49', 'MrMarko AZURIRANJE UTRKE: 1', 3),
(91, '2022-06-06 15:54:34', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(92, '2022-06-06 15:54:40', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(93, '2022-06-06 15:54:55', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(94, '2022-06-06 15:54:59', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(95, '2022-06-06 15:55:08', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(96, '2022-06-06 15:59:02', 'admin AZURIRANJE UTRKE: Londonski maraton', 1),
(97, '2022-06-06 15:59:08', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(98, '2022-06-06 16:00:26', 'admin KREIRANJE UTRKE: Torino 100 m', 1),
(99, '2022-06-06 16:02:20', 'admin KREIRANJE UTRKE: Bavarijski 3000 2022', 1),
(100, '2022-06-06 16:03:32', 'admin KREIRANJE UTRKE: Švedska planina 2022', 1),
(101, '2022-06-06 16:05:13', 'admin KREIRANJE UTRKE: New York Super maraton', 1),
(102, '2022-06-06 16:06:24', 'admin KREIRANJE UTRKE: Kanadskih 200', 1),
(103, '2022-06-06 16:07:32', 'admin KREIRANJE UTRKE: Arg 400', 1),
(104, '2022-06-06 16:08:28', 'admin KREIRANJE UTRKE: Faraonski put', 1),
(105, '2022-06-06 16:09:48', 'admin KREIRANJE UTRKE: Nigerija 100m', 1),
(106, '2022-06-06 16:10:22', 'admin KREIRANJE UTRKE: Super Alžir', 1),
(107, '2022-06-06 16:11:27', 'admin KREIRANJE UTRKE: Peking 2022', 1),
(108, '2022-06-06 16:13:32', 'admin KREIRANJE UTRKE: Zagrebački sprint', 1),
(109, '2022-06-06 16:13:59', 'admin KREIRANJE UTRKE: Zagrebački maraton', 1),
(110, '2022-06-06 16:14:27', 'admin KREIRANJE UTRKE: Zagrebačko hodanje', 1),
(111, '2022-06-06 16:16:03', 'MrMarko OTKLJUČANA UTRKA: 12', 3),
(112, '2022-06-06 16:16:25', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(113, '2022-06-06 16:17:48', 'MrMarko KREIRANJE Etape: 1', 3),
(114, '2022-06-06 16:18:50', 'MrMarko OTKLJUČANA UTRKA: 2', 3),
(115, '2022-06-06 16:19:40', 'MrMarko KREIRANJE Etape: 2', 3),
(116, '2022-06-06 16:20:06', 'MrMarko KREIRANJE Etape: 2', 3),
(117, '2022-06-06 16:20:40', 'MrMarko KREIRANJE Etape: 2', 3),
(118, '2022-06-06 16:21:35', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(119, '2022-06-06 16:22:31', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(120, '2022-06-06 16:23:10', 'MrMarko KREIRANJE Etape: 3', 3),
(121, '2022-06-06 16:23:55', 'MrMarko KREIRANJE Etape: 3', 3),
(122, '2022-06-06 16:24:30', 'MrMarko KREIRANJE Etape: 3', 3),
(123, '2022-06-06 16:26:40', 'ODJAVA KORISNIKA: admin', 1),
(124, '2022-06-06 16:26:57', 'PRIJAVA KORISNIKA: iivo', 2),
(125, '2022-06-06 16:28:38', 'MrMarko OTKLJUČANA UTRKA: 12', 3),
(126, '2022-06-06 16:30:29', 'MrMarko KREIRANJE Etape: 12', 3),
(127, '2022-06-06 16:30:50', 'MrMarko KREIRANJE Etape: 12', 3),
(128, '2022-06-06 16:31:10', 'MrMarko KREIRANJE Etape: 12', 3),
(129, '2022-06-06 16:31:45', 'MrMarko OTKLJUČANA UTRKA: 13', 3),
(130, '2022-06-06 16:32:19', 'MrMarko KREIRANJE Etape: 13', 3),
(131, '2022-06-06 16:32:36', 'MrMarko KREIRANJE Etape: 13', 3),
(132, '2022-06-06 16:33:08', 'MrMarko KREIRANJE Etape: 13', 3),
(133, '2022-06-06 16:33:33', 'MrMarko KREIRANJE Etape: 13', 3),
(134, '2022-06-06 16:33:42', 'MrMarko OTKLJUČANA UTRKA: 14', 3),
(135, '2022-06-06 16:33:58', 'MrMarko KREIRANJE Etape: 14', 3),
(136, '2022-06-06 16:34:19', 'MrMarko KREIRANJE Etape: 14', 3),
(137, '2022-06-06 16:35:00', 'MrMarko KREIRANJE Etape: 14', 3),
(138, '2022-06-06 16:35:23', 'MrMarko KREIRANJE Etape: 14', 3),
(139, '2022-06-06 16:35:43', 'MrMarko KREIRANJE Etape: 14', 3),
(140, '2022-06-06 16:42:41', ' : PRIJAVLJENA UTRKA 12', 2),
(141, '2022-06-06 16:43:07', ' : PRIJAVLJENA UTRKA 13', 2),
(142, '2022-06-06 16:43:44', ' : PRIJAVLJENA UTRKA 14', 2),
(143, '2022-06-06 16:44:55', 'ODJAVA KORISNIKA: iivo', 2),
(144, '2022-06-06 16:45:29', 'ODJAVA KORISNIKA: MrMarko', 3),
(145, '2022-06-06 17:40:37', 'PRIJAVA KORISNIKA: jozo', 7),
(146, '2022-06-06 17:41:04', ' : PRIJAVLJENA UTRKA 12', 7),
(147, '2022-06-06 17:41:23', ' : PRIJAVLJENA UTRKA 13', 7),
(148, '2022-06-06 17:41:43', ' : PRIJAVLJENA UTRKA 14', 7),
(149, '2022-06-06 17:42:05', ' : PRIJAVLJENA UTRKA 1', 7),
(150, '2022-06-06 17:42:30', ' : PRIJAVLJENA UTRKA 2', 7),
(151, '2022-06-06 17:42:45', ' : PRIJAVLJENA UTRKA 3', 7),
(152, '2022-06-06 17:43:14', ' : PRIJAVLJENA UTRKA 3', 7),
(153, '2022-06-06 17:43:41', ' : PRIJAVLJENA UTRKA 4', 7),
(154, '2022-06-06 17:44:07', 'ODJAVA KORISNIKA: jozo', 7),
(155, '2022-06-06 17:44:31', 'PRIJAVA KORISNIKA: korina89', 8),
(156, '2022-06-06 17:44:48', ' : PRIJAVLJENA UTRKA 12', 8),
(157, '2022-06-06 17:45:04', ' : PRIJAVLJENA UTRKA 13', 8),
(158, '2022-06-06 17:45:20', ' : PRIJAVLJENA UTRKA 14', 8),
(159, '2022-06-06 17:45:55', ' : PRIJAVLJENA UTRKA 1', 8),
(160, '2022-06-06 17:46:10', ' : AZURIRANA UTRKA 1', 8),
(161, '2022-06-06 17:47:58', ' : AZURIRANA UTRKA 1', 8),
(162, '2022-06-06 17:48:24', ' : PRIJAVLJENA UTRKA 2', 8),
(163, '2022-06-06 17:48:39', ' : AZURIRANA UTRKA 2', 8),
(164, '2022-06-06 17:48:57', ' : PRIJAVLJENA UTRKA 3', 8),
(165, '2022-06-06 17:49:14', ' : PRIJAVLJENA UTRKA 4', 8),
(166, '2022-06-06 17:49:37', 'ODJAVA KORISNIKA: korina89', 8),
(167, '2022-06-06 17:50:22', 'PRIJAVA KORISNIKA: luce', 10),
(168, '2022-06-06 17:51:03', ' : PRIJAVLJENA UTRKA 12', 10),
(169, '2022-06-06 17:51:18', ' : PRIJAVLJENA UTRKA 13', 10),
(170, '2022-06-06 17:51:34', ' : PRIJAVLJENA UTRKA 14', 10),
(171, '2022-06-06 17:51:46', ' : PRIJAVLJENA UTRKA 1', 10),
(172, '2022-06-06 17:52:08', ' : PRIJAVLJENA UTRKA 2', 10),
(173, '2022-06-06 17:52:35', ' : PRIJAVLJENA UTRKA 3', 10),
(174, '2022-06-06 17:52:49', ' : PRIJAVLJENA UTRKA 4', 10),
(175, '2022-06-06 17:53:05', 'ODJAVA KORISNIKA: luce', 10),
(176, '2022-06-06 17:53:21', 'PRIJAVA KORISNIKA: anica', 11),
(177, '2022-06-06 17:54:35', ' : PRIJAVLJENA UTRKA 12', 11),
(178, '2022-06-06 17:54:50', ' : PRIJAVLJENA UTRKA 13', 11),
(179, '2022-06-06 17:55:06', ' : PRIJAVLJENA UTRKA 14', 11),
(180, '2022-06-06 17:55:19', ' : PRIJAVLJENA UTRKA 1', 11),
(181, '2022-06-06 17:55:34', ' : PRIJAVLJENA UTRKA 2', 11),
(182, '2022-06-06 17:55:52', ' : PRIJAVLJENA UTRKA 3', 11),
(183, '2022-06-06 17:56:05', ' : PRIJAVLJENA UTRKA 4', 11),
(184, '2022-06-06 17:56:10', 'ODJAVA KORISNIKA: anica', 11),
(185, '2022-06-06 17:56:24', 'PRIJAVA KORISNIKA: MrMarko', 3),
(186, '2022-06-06 17:56:38', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(187, '2022-06-06 18:00:30', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(188, '2022-06-06 18:01:57', 'MrMarko ZAKLJUČANA ETAPA: 1', 3),
(189, '2022-06-06 18:01:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(190, '2022-06-06 18:01:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(191, '2022-06-06 18:01:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(192, '2022-06-06 18:01:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(193, '2022-06-06 18:02:02', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(194, '2022-06-06 18:02:07', 'MrMarko ZAKLJUČANA ETAPA: 1', 3),
(195, '2022-06-06 18:02:13', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(196, '2022-06-06 18:04:28', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(197, '2022-06-06 18:04:41', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(198, '2022-06-06 18:05:12', 'MrMarko AZURIRANJE UTRKE: 2', 3),
(199, '2022-06-06 18:05:57', 'MrMarko ZAKLJUČANA ETAPA: 2', 3),
(200, '2022-06-06 18:05:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(201, '2022-06-06 18:05:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(202, '2022-06-06 18:05:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(203, '2022-06-06 18:05:57', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(204, '2022-06-06 18:07:44', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(205, '2022-06-06 18:08:20', 'MrMarko ZAKLJUČANA ETAPA: 3', 3),
(206, '2022-06-06 18:08:20', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(207, '2022-06-06 18:08:20', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(208, '2022-06-06 18:08:20', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(209, '2022-06-06 18:08:20', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(210, '2022-06-06 18:32:16', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(211, '2022-06-06 18:32:25', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(212, '2022-06-06 18:32:49', 'MrMarko ZAKLJUČANA ETAPA: 1', 3),
(213, '2022-06-06 18:32:49', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(214, '2022-06-06 18:32:49', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(215, '2022-06-06 18:32:49', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(216, '2022-06-06 18:32:49', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(217, '2022-06-06 18:34:56', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(218, '2022-06-06 18:48:14', 'test UNESEN REZULTAT ETAPE ZA 7', 1),
(219, '2022-06-06 18:48:15', 'test UNESEN REZULTAT ETAPE ZA 8', 1),
(220, '2022-06-06 18:48:15', 'test UNESEN REZULTAT ETAPE ZA 10', 1),
(221, '2022-06-06 18:48:15', 'test UNESEN REZULTAT ETAPE ZA 11', 1),
(222, '2022-06-06 18:49:30', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(223, '2022-06-06 18:49:44', 'MrMarko ZAKLJUČANA ETAPA: 1', 3),
(224, '2022-06-06 18:49:44', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(225, '2022-06-06 18:49:44', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(226, '2022-06-06 18:49:44', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(227, '2022-06-06 18:49:44', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(228, '2022-06-06 18:49:50', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(229, '2022-06-06 18:54:07', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(230, '2022-06-06 18:54:37', 'MrMarko ZAKLJUČANA ETAPA: 1', 3),
(231, '2022-06-06 18:54:37', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(232, '2022-06-06 18:54:37', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(233, '2022-06-06 18:54:37', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(234, '2022-06-06 18:54:37', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(235, '2022-06-06 18:55:34', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(236, '2022-06-06 18:55:58', 'MrMarko ZAKLJUČANA ETAPA: 2', 3),
(237, '2022-06-06 18:55:58', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(238, '2022-06-06 18:55:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(239, '2022-06-06 18:55:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(240, '2022-06-06 18:55:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(241, '2022-06-06 18:56:02', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(242, '2022-06-06 18:56:51', 'MrMarko ZAKLJUČANA ETAPA: 3', 3),
(243, '2022-06-06 18:56:51', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(244, '2022-06-06 18:56:51', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(245, '2022-06-06 18:56:51', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(246, '2022-06-06 18:56:51', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(247, '2022-06-06 18:56:55', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(248, '2022-06-06 18:57:02', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(249, '2022-06-06 18:57:17', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(250, '2022-06-06 18:58:43', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(251, '2022-06-06 18:58:55', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(252, '2022-06-06 19:00:51', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(253, '2022-06-06 19:01:49', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(254, '2022-06-06 19:03:21', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(255, '2022-06-06 19:06:16', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(256, '2022-06-06 19:06:22', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(257, '2022-06-06 19:06:26', 'MrMarko OTKLJUČANA UTRKA: 1', 3),
(258, '2022-06-06 19:06:28', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(259, '2022-06-06 19:06:49', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(260, '2022-06-06 19:07:40', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(261, '2022-06-06 19:09:38', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(262, '2022-06-06 19:10:43', 'MrMarko OTKLJUČANA UTRKA: 2', 3),
(263, '2022-06-06 19:11:02', 'MrMarko ZAKLJUČANA ETAPA: 4', 3),
(264, '2022-06-06 19:11:02', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(265, '2022-06-06 19:11:02', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(266, '2022-06-06 19:11:02', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(267, '2022-06-06 19:11:02', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(268, '2022-06-06 19:11:06', 'MrMarko OTKLJUČANA UTRKA: 2', 3),
(269, '2022-06-06 19:11:26', 'MrMarko ZAKLJUČANA ETAPA: 5', 3),
(270, '2022-06-06 19:11:26', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(271, '2022-06-06 19:11:26', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(272, '2022-06-06 19:11:26', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(273, '2022-06-06 19:11:27', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(274, '2022-06-06 19:11:32', 'MrMarko OTKLJUČANA UTRKA: 2', 3),
(275, '2022-06-06 19:11:58', 'MrMarko ZAKLJUČANA ETAPA: 6', 3),
(276, '2022-06-06 19:11:58', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(277, '2022-06-06 19:11:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(278, '2022-06-06 19:11:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(279, '2022-06-06 19:11:59', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(280, '2022-06-06 19:12:04', 'MrMarko ZAKLJUČANA UTRKA: 1', 3),
(281, '2022-06-06 19:12:08', 'MrMarko OTKLJUČANA UTRKA: 2', 3),
(282, '2022-06-06 19:12:10', 'MrMarko ZAKLJUČANA UTRKA: 2', 3),
(283, '2022-06-06 19:12:33', 'MrMarko OTKLJUČANA UTRKA: 9', 3),
(284, '2022-06-06 19:12:41', 'MrMarko OTKLJUČANA UTRKA: 5', 3),
(285, '2022-06-06 19:12:48', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(286, '2022-06-06 19:14:06', 'MrMarko ZAKLJUČANA ETAPA: 7', 3),
(287, '2022-06-06 19:14:06', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(288, '2022-06-06 19:14:06', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(289, '2022-06-06 19:14:06', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(290, '2022-06-06 19:14:06', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(291, '2022-06-06 19:14:13', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(292, '2022-06-06 19:14:36', 'MrMarko ZAKLJUČANA ETAPA: 8', 3),
(293, '2022-06-06 19:14:36', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(294, '2022-06-06 19:14:36', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(295, '2022-06-06 19:14:36', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(296, '2022-06-06 19:14:36', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(297, '2022-06-06 19:14:40', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(298, '2022-06-06 19:15:10', 'MrMarko ZAKLJUČANA ETAPA: 9', 3),
(299, '2022-06-06 19:15:10', 'MrMarko UNESEN REZULTAT ETAPE ZA 7', 3),
(300, '2022-06-06 19:15:10', 'MrMarko UNESEN REZULTAT ETAPE ZA 8', 3),
(301, '2022-06-06 19:15:10', 'MrMarko UNESEN REZULTAT ETAPE ZA 10', 3),
(302, '2022-06-06 19:15:10', 'MrMarko UNESEN REZULTAT ETAPE ZA 11', 3),
(303, '2022-06-06 19:15:14', 'MrMarko OTKLJUČANA UTRKA: 3', 3),
(304, '2022-06-06 19:15:16', 'MrMarko ZAKLJUČANA UTRKA: 3', 3),
(305, '2022-06-06 19:15:25', 'MrMarko OTKLJUČANA UTRKA: 4', 3),
(306, '2022-06-06 19:15:33', 'MrMarko OTKLJUČANA UTRKA: 4', 3),
(307, '2022-06-06 19:23:05', 'ODJAVA KORISNIKA: MrMarko', 3);

-- --------------------------------------------------------

--
-- Table structure for table `moderiranje`
--

CREATE TABLE `moderiranje` (
  `korisnik_id` int(11) NOT NULL,
  `drzava_id` int(11) NOT NULL,
  `datum_postavljanja_moderatora` datetime NOT NULL,
  `broj_moderiranih_utrka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderiranje`
--

INSERT INTO `moderiranje` (`korisnik_id`, `drzava_id`, `datum_postavljanja_moderatora`, `broj_moderiranih_utrka`) VALUES
(3, 1, '2022-06-06 15:25:40', 0),
(3, 2, '2022-06-06 15:25:57', 0),
(3, 3, '2022-06-06 15:26:18', 0),
(3, 4, '2022-06-06 15:26:28', 0),
(3, 6, '2022-06-06 15:26:46', 0),
(3, 7, '2022-06-06 15:27:06', 0),
(3, 8, '2022-06-06 15:27:35', 0),
(3, 11, '2022-06-06 15:28:26', 0),
(3, 14, '2022-06-06 15:28:41', 0),
(3, 15, '2022-06-06 15:28:46', 0),
(3, 16, '2022-06-06 15:28:52', 0),
(3, 17, '2022-06-06 15:28:58', 0),
(4, 1, '2022-06-06 15:25:47', 0),
(4, 5, '2022-06-06 15:26:39', 0),
(4, 7, '2022-06-06 15:27:09', 0),
(4, 10, '2022-06-06 15:27:56', 0),
(4, 13, '2022-06-06 15:28:35', 0),
(4, 16, '2022-06-06 15:28:54', 0),
(4, 17, '2022-06-06 15:29:05', 0),
(4, 18, '2022-06-06 15:29:16', 0),
(4, 19, '2022-06-06 15:29:21', 0),
(4, 20, '2022-06-06 15:29:24', 0),
(11, 3, '2022-06-06 15:26:22', 0),
(11, 4, '2022-06-06 15:26:31', 0),
(11, 6, '2022-06-06 15:26:49', 0),
(11, 7, '2022-06-06 15:27:17', 0),
(11, 9, '2022-06-06 15:27:43', 0),
(11, 12, '2022-06-06 15:28:30', 0),
(11, 13, '2022-06-06 15:28:38', 0),
(11, 15, '2022-06-06 15:28:49', 0),
(11, 17, '2022-06-06 15:29:00', 0),
(11, 18, '2022-06-06 15:29:10', 0),
(11, 21, '2022-06-06 15:29:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE `prijava` (
  `korisnik_id` int(11) NOT NULL,
  `utrka_id` int(11) NOT NULL,
  `godina_rodenja` varchar(45) NOT NULL,
  `slika` varchar(100) NOT NULL,
  `pozicija` int(11) DEFAULT NULL,
  `ukupni_bodovi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prijava`
--

INSERT INTO `prijava` (`korisnik_id`, `utrka_id`, `godina_rodenja`, `slika`, `pozicija`, `ukupni_bodovi`) VALUES
(2, 12, '1999', 'materijali/slike_korisnika/iivo_12.jpg', 0, 0),
(2, 13, '1999', 'materijali/slike_korisnika/iivo_13.jpg', 0, 0),
(2, 14, '1999', 'materijali/slike_korisnika/iivo_14.jpg', 0, 0),
(7, 1, '1989', 'materijali/slike_korisnika/jozo_1.jpg', 1, 250),
(7, 2, '1989', 'materijali/slike_korisnika/jozo_2.jpg', 1, 250),
(7, 3, '1989', 'materijali/slike_korisnika/jozo_3.jpg', 2, 100),
(7, 4, '1989', 'materijali/slike_korisnika/jozo_4.jpg', 0, 0),
(7, 12, '1989', 'materijali/slike_korisnika/jozo_12.jpg', 0, 0),
(7, 13, '1989', 'materijali/slike_korisnika/jozo_13.jpg', 0, 0),
(7, 14, '1989', 'materijali/slike_korisnika/jozo_14.jpg', 0, 0),
(8, 1, '1990', 'materijali/slike_korisnika/korina89_1.jpg', 4, 60),
(8, 2, '1990', 'materijali/slike_korisnika/korina89_2.jpg', 2, 150),
(8, 3, '1990', 'materijali/slike_korisnika/korina89_3.jpg', 3, 70),
(8, 4, '1990', 'materijali/slike_korisnika/korina89_4.jpg', 0, 0),
(8, 12, '1990', 'materijali/slike_korisnika/korina89_12.jpg', 0, 0),
(8, 13, '1990', 'materijali/slike_korisnika/korina89_13.jpg', 0, 0),
(8, 14, '1990', 'materijali/slike_korisnika/korina89_14.jpg', 0, 0),
(10, 1, '1998', 'materijali/slike_korisnika/luce_1.jpg', 3, 70),
(10, 2, '1998', 'materijali/slike_korisnika/luce_2.jpg', 4, 30),
(10, 3, '1998', 'materijali/slike_korisnika/luce_3.jpg', 4, 60),
(10, 4, '1998', 'materijali/slike_korisnika/luce_4.jpg', 0, 0),
(10, 12, '1998', 'materijali/slike_korisnika/luce_12.jpg', 0, 0),
(10, 13, '1998', 'materijali/slike_korisnika/luce_13.jpg', 0, 0),
(10, 14, '1998', 'materijali/slike_korisnika/luce_14.jpg', 0, 0),
(11, 1, '2000', 'materijali/slike_korisnika/anica_1.jpg', 2, 100),
(11, 2, '2000', 'materijali/slike_korisnika/anica_2.jpg', 3, 50),
(11, 3, '2000', 'materijali/slike_korisnika/anica_3.jpg', 1, 250),
(11, 4, '2000', 'materijali/slike_korisnika/anica_4.jpg', 0, 0),
(11, 12, '2000', 'materijali/slike_korisnika/anica_12.jpg', 0, 0),
(11, 13, '2000', 'materijali/slike_korisnika/anica_13.jpg', 0, 0),
(11, 14, '2000', 'materijali/slike_korisnika/anica_14.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sudjelovanje`
--

CREATE TABLE `sudjelovanje` (
  `etapa_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `vrijeme` varchar(45) DEFAULT NULL,
  `pozicija` varchar(45) DEFAULT NULL,
  `sudjelovanje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sudjelovanje`
--

INSERT INTO `sudjelovanje` (`etapa_id`, `korisnik_id`, `vrijeme`, `pozicija`, `sudjelovanje`) VALUES
(1, 7, '3:20', '1', 1),
(1, 8, '3:40', '2', 1),
(1, 10, '4.01', '3', 1),
(1, 11, '4:25', '4', 1),
(2, 7, '3:20', '1', 1),
(2, 8, '4:25', '3', 1),
(2, 10, '4:21', '2', 1),
(2, 11, '6:00', '4', 1),
(3, 7, '4:50', '2', 1),
(3, 8, '4:51', '4', 1),
(3, 10, '4:55', '3', 1),
(3, 11, '1:20', '1', 1),
(4, 7, '12', '1', 1),
(4, 8, '15', '2', 1),
(4, 10, '53', '3', 1),
(4, 11, '56', '4', 1),
(5, 7, '12', '2', 1),
(5, 8, '10', '1', 1),
(5, 10, '45', '3', 1),
(5, 11, '56', '4', 1),
(6, 7, '32', '1', 1),
(6, 8, '35', '4', 1),
(6, 10, '34', '3', 1),
(6, 11, '33', '2', 1),
(7, 7, '13', '4', 1),
(7, 8, '12', '3', 1),
(7, 10, '11', '2', 1),
(7, 11, '10', '1', 1),
(8, 7, '12', '1', 1),
(8, 8, '20', '3', 1),
(8, 10, '24', '4', 1),
(8, 11, '13', '2', 1),
(9, 7, '30', '4', 1),
(9, 8, '22', '2', 1),
(9, 10, '24', '3', 1),
(9, 11, '20', '1', 1),
(10, 2, NULL, NULL, 1),
(10, 7, NULL, NULL, 1),
(10, 8, NULL, NULL, 1),
(10, 10, NULL, NULL, 1),
(10, 11, NULL, NULL, 1),
(11, 2, NULL, NULL, 1),
(11, 7, NULL, NULL, 1),
(11, 8, NULL, NULL, 1),
(11, 10, NULL, NULL, 1),
(11, 11, NULL, NULL, 1),
(12, 2, NULL, NULL, 1),
(12, 7, NULL, NULL, 1),
(12, 8, NULL, NULL, 1),
(12, 10, NULL, NULL, 1),
(12, 11, NULL, NULL, 1),
(13, 2, NULL, NULL, 1),
(13, 7, NULL, NULL, 1),
(13, 8, NULL, NULL, 1),
(13, 10, NULL, NULL, 1),
(13, 11, NULL, NULL, 1),
(14, 2, NULL, NULL, 1),
(14, 7, NULL, NULL, 1),
(14, 8, NULL, NULL, 1),
(14, 10, NULL, NULL, 1),
(14, 11, NULL, NULL, 1),
(15, 2, NULL, NULL, 1),
(15, 7, NULL, NULL, 1),
(15, 8, NULL, NULL, 1),
(15, 10, NULL, NULL, 1),
(15, 11, NULL, NULL, 1),
(16, 2, NULL, NULL, 1),
(16, 7, NULL, NULL, 1),
(16, 8, NULL, NULL, 1),
(16, 10, NULL, NULL, 1),
(16, 11, NULL, NULL, 1),
(17, 2, NULL, NULL, 1),
(17, 7, NULL, NULL, 1),
(17, 8, NULL, NULL, 1),
(17, 10, NULL, NULL, 1),
(17, 11, NULL, NULL, 1),
(18, 2, NULL, NULL, 1),
(18, 7, NULL, NULL, 1),
(18, 8, NULL, NULL, 1),
(18, 10, NULL, NULL, 1),
(18, 11, NULL, NULL, 1),
(19, 2, NULL, NULL, 1),
(19, 7, NULL, NULL, 1),
(19, 8, NULL, NULL, 1),
(19, 10, NULL, NULL, 1),
(19, 11, NULL, NULL, 1),
(20, 2, NULL, NULL, 1),
(20, 7, NULL, NULL, 1),
(20, 8, NULL, NULL, 1),
(20, 10, NULL, NULL, 1),
(20, 11, NULL, NULL, 1),
(21, 2, NULL, NULL, 1),
(21, 7, NULL, NULL, 1),
(21, 8, NULL, NULL, 1),
(21, 10, NULL, NULL, 1),
(21, 11, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_korisnika_id` int(11) NOT NULL,
  `uloga` varchar(45) NOT NULL,
  `opis_uloge` varchar(280) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `uloga`, `opis_uloge`) VALUES
(1, 'registriran korisnik', 'Registrirani korisnik koji se prijavljuje na utrke i ima pregled svojih prijašnjih uspijeha.'),
(2, 'Moderator', 'Moderira utrke. Proglašava pobjednika za utrku za koju je zadužen.'),
(3, 'Administrator', 'Ima najveća prava. Kreira utrke i dodjeljuje moderatora');

-- --------------------------------------------------------

--
-- Table structure for table `tip_utrke`
--

CREATE TABLE `tip_utrke` (
  `tip_utrke_id` int(11) NOT NULL,
  `naziv_tipa` varchar(45) NOT NULL,
  `opis` varchar(280) NOT NULL,
  `tipicna_udaljenost` varchar(45) NOT NULL,
  `tipicna_kolicina_sudionika` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_utrke`
--

INSERT INTO `tip_utrke` (`tip_utrke_id`, `naziv_tipa`, `opis`, `tipicna_udaljenost`, `tipicna_kolicina_sudionika`) VALUES
(1, '100 metara', 'Trčanje na 100 metara', '100 m', '100'),
(2, '200 metara', 'Trčanje na 200 metara', '200 m', '100'),
(3, '400 metara', 'Trčanje na 400 metara', '400 m', '100'),
(4, 'Hodanje 20 kilometara', 'Hodanje na 20 kilometara', '20000 m', '300'),
(5, 'Hodanje 50 kilometara', 'Hodanje 50 kilometara', '50000m', '300'),
(6, 'Maraton', 'Trčanje maratona', '42195 m', '500'),
(7, 'Polumaraton', 'Trčanje polumaratona', '21975 m', '400'),
(8, 'Supermaraton', 'Duža verzija maratona', '60000', '300'),
(9, 'Ultramaraton', 'Najduža varijanta maratona', '100000 m', '100'),
(10, '1500 metara', 'Trčanje na 1.5 km', '1500 m', '50'),
(11, '3000 metara', 'Trčanje na 3 km', '3000 m', '50');

-- --------------------------------------------------------

--
-- Table structure for table `utrka`
--

CREATE TABLE `utrka` (
  `utrka_id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `vrijeme_zavrsetka_prijava` datetime NOT NULL,
  `zakljucana` tinyint(4) NOT NULL,
  `pocetak_odrzavanja` datetime NOT NULL,
  `kraj_odrzavanja` datetime NOT NULL,
  `broj_sudionika` int(11) NOT NULL,
  `broj_prijava` int(11) NOT NULL,
  `drzava_id` int(11) NOT NULL,
  `tip_utrke_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utrka`
--

INSERT INTO `utrka` (`utrka_id`, `naziv`, `vrijeme_zavrsetka_prijava`, `zakljucana`, `pocetak_odrzavanja`, `kraj_odrzavanja`, `broj_sudionika`, `broj_prijava`, `drzava_id`, `tip_utrke_id`) VALUES
(1, 'Londonski maraton', '2022-06-07 12:00:00', 1, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 500, 4, 2, 6),
(2, 'Torino 100 m', '2023-01-01 18:00:00', 1, '2023-02-01 18:00:00', '2023-02-01 20:00:00', 25, 4, 3, 1),
(3, 'Bavarijski 3000 2022', '2022-06-08 15:00:00', 1, '2022-06-10 15:00:00', '2022-06-11 15:00:00', 1000, 5, 4, 11),
(4, 'Švedska planina 2022', '2022-10-10 00:00:00', 0, '2022-11-10 03:00:00', '2022-11-11 00:00:00', 30, 4, 6, 4),
(5, 'New York Super maraton', '2023-01-01 00:00:00', 0, '2023-01-16 12:00:00', '2023-01-17 00:00:00', 10000, 0, 7, 8),
(6, 'Kanadskih 200', '2023-01-01 12:00:00', 0, '2023-01-16 12:00:00', '2023-01-16 16:00:00', 56, 0, 8, 2),
(7, 'Arg 400', '2022-05-05 00:00:00', 0, '2022-07-05 00:00:00', '2022-07-05 02:00:00', 36, 0, 11, 3),
(8, 'Faraonski put', '2023-01-01 12:00:00', 0, '2023-01-15 12:00:00', '2023-01-16 12:00:00', 8000, 0, 14, 5),
(9, 'Nigerija 100m', '2023-01-01 12:00:00', 0, '2023-01-02 12:00:00', '2023-01-02 13:00:00', 128, 0, 15, 1),
(10, 'Super Alžir', '2023-01-01 12:00:00', 0, '2023-02-01 18:00:00', '2023-02-01 20:00:00', 10, 0, 16, 8),
(11, 'Peking 2022', '2022-08-08 08:08:08', 0, '2022-09-09 09:09:09', '2022-09-10 10:10:10', 648, 0, 17, 2),
(12, 'Zagrebački sprint', '2022-06-07 12:00:00', 0, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 10, 5, 1, 1),
(13, 'Zagrebački maraton', '2022-06-07 12:00:00', 0, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 100, 5, 1, 6),
(14, 'Zagrebačko hodanje', '2022-06-07 12:00:00', 0, '2022-09-01 12:00:00', '2022-09-01 18:00:00', 1000, 5, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`drzava_id`);

--
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`etapa_id`),
  ADD KEY `fk_etapa_utrka1_idx` (`utrka_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_log_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `moderiranje`
--
ALTER TABLE `moderiranje`
  ADD PRIMARY KEY (`korisnik_id`,`drzava_id`),
  ADD KEY `fk_korisnik_has_drzava_drzava1_idx` (`drzava_id`),
  ADD KEY `fk_korisnik_has_drzava_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `prijava`
--
ALTER TABLE `prijava`
  ADD PRIMARY KEY (`korisnik_id`,`utrka_id`),
  ADD KEY `fk_korisnik_has_utrka_utrka1_idx` (`utrka_id`),
  ADD KEY `fk_korisnik_has_utrka_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `sudjelovanje`
--
ALTER TABLE `sudjelovanje`
  ADD PRIMARY KEY (`etapa_id`,`korisnik_id`),
  ADD KEY `fk_etapa_has_korisnik_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_etapa_has_korisnik_etapa1_idx` (`etapa_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_korisnika_id`);

--
-- Indexes for table `tip_utrke`
--
ALTER TABLE `tip_utrke`
  ADD PRIMARY KEY (`tip_utrke_id`);

--
-- Indexes for table `utrka`
--
ALTER TABLE `utrka`
  ADD PRIMARY KEY (`utrka_id`),
  ADD KEY `fk_utrka_drzava1_idx` (`drzava_id`),
  ADD KEY `fk_utrka_tip_utrke1_idx` (`tip_utrke_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `drzava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `etapa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_korisnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tip_utrke`
--
ALTER TABLE `tip_utrke`
  MODIFY `tip_utrke_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utrka`
--
ALTER TABLE `utrka`
  MODIFY `utrka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etapa`
--
ALTER TABLE `etapa`
  ADD CONSTRAINT `fk_etapa_utrka1` FOREIGN KEY (`utrka_id`) REFERENCES `utrka` (`utrka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika`) REFERENCES `tip_korisnika` (`tip_korisnika_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `moderiranje`
--
ALTER TABLE `moderiranje`
  ADD CONSTRAINT `fk_korisnik_has_drzava_drzava1` FOREIGN KEY (`drzava_id`) REFERENCES `drzava` (`drzava_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_drzava_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prijava`
--
ALTER TABLE `prijava`
  ADD CONSTRAINT `fk_korisnik_has_utrka_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_utrka_utrka1` FOREIGN KEY (`utrka_id`) REFERENCES `utrka` (`utrka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sudjelovanje`
--
ALTER TABLE `sudjelovanje`
  ADD CONSTRAINT `fk_etapa_has_korisnik_etapa1` FOREIGN KEY (`etapa_id`) REFERENCES `etapa` (`etapa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etapa_has_korisnik_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utrka`
--
ALTER TABLE `utrka`
  ADD CONSTRAINT `fk_utrka_drzava1` FOREIGN KEY (`drzava_id`) REFERENCES `drzava` (`drzava_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utrka_tip_utrke1` FOREIGN KEY (`tip_utrke_id`) REFERENCES `tip_utrke` (`tip_utrke_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
