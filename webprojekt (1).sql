-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Jan 05. 16:39
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webprojekt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `date_uploaded` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `storage`
--

INSERT INTO `storage` (`id`, `filename`, `file_type`, `date_uploaded`, `user_id`) VALUES
(4, '12.Lab.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Array', 1),
(5, 'ZH_Ápoló_november_18_LEVELEZŐ CMGO4R.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023,01,02 11,58,57', 1),
(6, 'gyász-jo-formázni-kell.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023,01,02 12,14,33', 4),
(9, 'projekthez01.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023.01.03 15.15.54', 4),
(10, 'Vizsga_Kovetelemenyek_WebProgramozas_2022-2023.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023.01.03 - 17.21.09', 4),
(11, '10.Lab.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023.01.03 - 17:21:52', 4),
(18, 'Laborator-2.pdf', 'application/pdf', '2023.01.05 - 17:38:18', 6),
(19, 'Laborator-4.pdf', 'application/pdf', '2023.01.05 - 17:38:22', 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `name`, `last_login`, `created_at`) VALUES
(1, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'blalba@gmail.com', 'bla bla', '2023-01-02 11:39:37', '2022-12-28 11:06:36'),
(2, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'fpista@freemail.hu', 'Ferenc Pista', '2022-12-28 13:31:56', '2022-12-28 12:21:38'),
(3, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'hajnika@gmail.com', 'Ferenc Hajnika', '2022-12-29 19:48:46', '2022-12-29 18:48:31'),
(4, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'bszabi@gmail.com', 'Bilibok Szabolcs', '2023-01-03 17:09:31', '2023-01-02 11:14:10'),
(5, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'mateka@gmail.com', 'Kis  Mate', '2023-01-05 17:13:22', '2023-01-05 16:12:02'),
(6, 'e9dcc6acd0cdb78a288eda3fd8b8fe70', 'elike@gmail.com', 'nagy elemer', '2023-01-05 00:00:00', '2023-01-05 00:00:00');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
