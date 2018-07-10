-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 10 Lip 2018, 18:19
-- Wersja serwera: 5.5.57-MariaDB
-- Wersja PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_dpp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `decorations`
--

CREATE TABLE `decorations` (
  `id` int(10) UNSIGNED NOT NULL,
  `kind` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1-piwo 2-szklo 3-emalia 4-naszkliwna 5-wszkliwna 6-niskotemp',
  `indeks` char(10) DEFAULT NULL,
  `number` char(10) NOT NULL,
  `year` char(2) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `descript` text NOT NULL,
  `tags` text NOT NULL,
  `canvassing` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1- akwizycja',
  `production` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1- produkcja',
  `etc_canvassing` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1-akwizycja_etc',
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `path` varchar(120) NOT NULL,
  `date_add` datetime NOT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL,
  `sess` varchar(120) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  `decor_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photo_works`
--

CREATE TABLE `photo_works` (
  `photo_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `path` varchar(120) NOT NULL,
  `date_add` datetime NOT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL,
  `sess` varchar(120) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  `w_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login` varchar(120) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `name` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `date_rej` datetime NOT NULL,
  `date_last_log` datetime DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `avatar` varchar(120) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `v_customers`
-- (See below for the actual view)
--
CREATE TABLE `v_customers` (
`id` int(10) unsigned
,`name` varchar(250)
,`descript` text
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `v_prev_decor`
-- (See below for the actual view)
--
CREATE TABLE `v_prev_decor` (
`id` int(10) unsigned
,`indeks` char(10)
,`number` char(10)
,`year` char(2)
,`number_full` varchar(13)
,`name` varchar(120)
,`date` varchar(10)
,`descript` text
,`tags` text
,`kind` tinyint(1) unsigned
,`canvassing` tinyint(1) unsigned
,`production` tinyint(1) unsigned
,`etc_canvassing` tinyint(1) unsigned
,`customer` varchar(250)
,`path` varchar(120)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `v_prev_decor2`
-- (See below for the actual view)
--
CREATE TABLE `v_prev_decor2` (
`id` int(10) unsigned
,`indeks` char(10)
,`number` char(10)
,`year` char(2)
,`number_full` varchar(13)
,`name` varchar(120)
,`date` varchar(10)
,`descript` text
,`tags` text
,`kind` tinyint(1) unsigned
,`canvassing` tinyint(1) unsigned
,`production` tinyint(1) unsigned
,`customer` varchar(250)
,`path` varchar(120)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `v_prev_works`
-- (See below for the actual view)
--
CREATE TABLE `v_prev_works` (
`id` int(10) unsigned
,`number` char(10)
,`name` varchar(120)
,`date` varchar(10)
,`descript` text
,`tags` text
,`kind` tinyint(1) unsigned
,`local` varchar(220)
,`path` varchar(120)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `works`
--

CREATE TABLE `works` (
  `w_id` int(10) UNSIGNED NOT NULL,
  `number` char(10) NOT NULL,
  `date_add` datetime NOT NULL,
  `name` varchar(120) NOT NULL,
  `descript` text NOT NULL,
  `tags` text NOT NULL,
  `kind` tinyint(1) UNSIGNED NOT NULL COMMENT '1-offset, 2-sito',
  `path` varchar(220) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura widoku `v_customers`
--
DROP TABLE IF EXISTS `v_customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_baza`@`localhost` SQL SECURITY DEFINER VIEW `v_customers`  AS  select `customers`.`id` AS `id`,`customers`.`name` AS `name`,`customers`.`descript` AS `descript` from `customers` where (`customers`.`id` <> 1) order by `customers`.`name` ;

-- --------------------------------------------------------

--
-- Struktura widoku `v_prev_decor`
--
DROP TABLE IF EXISTS `v_prev_decor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_baza`@`localhost` SQL SECURITY DEFINER VIEW `v_prev_decor`  AS  select `decorations`.`id` AS `id`,`decorations`.`indeks` AS `indeks`,`decorations`.`number` AS `number`,`decorations`.`year` AS `year`,concat(`decorations`.`number`,'/',`decorations`.`year`) AS `number_full`,`decorations`.`name` AS `name`,date_format(`decorations`.`date_add`,'%Y-%m-%d') AS `date`,`decorations`.`descript` AS `descript`,`decorations`.`tags` AS `tags`,`decorations`.`kind` AS `kind`,`decorations`.`canvassing` AS `canvassing`,`decorations`.`production` AS `production`,`decorations`.`etc_canvassing` AS `etc_canvassing`,(select `customers`.`name` from `customers` where (`customers`.`id` = `decorations`.`customer_id`)) AS `customer`,(select `images`.`path` from `images` where (`images`.`decor_id` = `decorations`.`id`) order by `images`.`date_add` desc limit 1) AS `path`,(select count(0) AS `ile` from `images` where (`images`.`decor_id` = `decorations`.`id`)) AS `count` from `decorations` order by `decorations`.`date_add` desc ;

-- --------------------------------------------------------

--
-- Struktura widoku `v_prev_decor2`
--
DROP TABLE IF EXISTS `v_prev_decor2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prev_decor2`  AS  select `decorations`.`id` AS `id`,`decorations`.`indeks` AS `indeks`,`decorations`.`number` AS `number`,`decorations`.`year` AS `year`,concat(`decorations`.`number`,'/',`decorations`.`year`) AS `number_full`,`decorations`.`name` AS `name`,date_format(`decorations`.`date_add`,'%Y-%m-%d') AS `date`,`decorations`.`descript` AS `descript`,`decorations`.`tags` AS `tags`,`decorations`.`kind` AS `kind`,`decorations`.`canvassing` AS `canvassing`,`decorations`.`production` AS `production`,(select `customers`.`name` from `customers` where (`customers`.`id` = `decorations`.`customer_id`)) AS `customer`,(select `images`.`path` from `images` where (`images`.`decor_id` = `decorations`.`id`) order by `images`.`date_add` desc limit 1) AS `path`,(select count(0) AS `ile` from `images` where (`images`.`decor_id` = `decorations`.`id`)) AS `count` from `decorations` order by `decorations`.`date_add` desc ;

-- --------------------------------------------------------

--
-- Struktura widoku `v_prev_works`
--
DROP TABLE IF EXISTS `v_prev_works`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prev_works`  AS  select `works`.`w_id` AS `id`,`works`.`number` AS `number`,`works`.`name` AS `name`,date_format(`works`.`date_add`,'%Y-%m-%d') AS `date`,`works`.`descript` AS `descript`,`works`.`tags` AS `tags`,`works`.`kind` AS `kind`,`works`.`path` AS `local`,(select `photo_works`.`path` from `photo_works` where (`photo_works`.`w_id` = `id`) order by `photo_works`.`date_add` desc limit 1) AS `path`,(select count(0) AS `ile` from `photo_works` where (`photo_works`.`w_id` = `id`)) AS `count` from `works` order by `works`.`date_add` desc ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decorations`
--
ALTER TABLE `decorations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `number` (`number`),
  ADD KEY `name` (`name`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decor_id` (`decor_id`);

--
-- Indexes for table `photo_works`
--
ALTER TABLE `photo_works`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `number` (`number`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT dla tabeli `decorations`
--
ALTER TABLE `decorations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=979;
--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1180;
--
-- AUTO_INCREMENT dla tabeli `photo_works`
--
ALTER TABLE `photo_works`
  MODIFY `photo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `works`
--
ALTER TABLE `works`
  MODIFY `w_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `decorations`
--
ALTER TABLE `decorations`
  ADD CONSTRAINT `decorations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ograniczenia dla tabeli `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`decor_id`) REFERENCES `decorations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `photo_works`
--
ALTER TABLE `photo_works`
  ADD CONSTRAINT `photo_works_ibfk_1` FOREIGN KEY (`w_id`) REFERENCES `works` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
