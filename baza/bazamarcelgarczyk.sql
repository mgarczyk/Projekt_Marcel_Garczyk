-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lis 2019, 21:23
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazamarcelgarczyk`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzial`
--

CREATE TABLE `dzial` (
  `ID_Dzial` int(11) NOT NULL,
  `Nazwa_Dzial` varchar(30) NOT NULL,
  `Ilosc_Slow` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `ID_Kurs` int(20) UNSIGNED NOT NULL,
  `ID_Uzytkownik` int(11) NOT NULL,
  `Jezyk_z` varchar(30) NOT NULL,
  `Jezyk_na` varchar(30) NOT NULL,
  `ID_Dzial` int(11) NOT NULL,
  `ID_Status` int(11) NOT NULL,
  `Ilosc_nauczonych` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slowo`
--

CREATE TABLE `slowo` (
  `ID_Slowo` int(11) NOT NULL,
  `Polski` varchar(50) NOT NULL,
  `Angielski` varchar(50) NOT NULL,
  `ID_Dzial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_kursu`
--

CREATE TABLE `status_kursu` (
  `ID_Status` int(11) NOT NULL,
  `Nazwa_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_uzytkownik`
--

CREATE TABLE `status_uzytkownik` (
  `ID_status_uzytkownik` int(11) NOT NULL,
  `Nazwa_status_uzytkownik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `ID_uprawnienia` int(11) NOT NULL,
  `Nazwa_uprawnienia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `ID_Uzytkownik` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Haslo` varchar(30) NOT NULL,
  `ID_status_uzytkownik` int(11) NOT NULL,
  `Data_Utworzenia_Konta` date NOT NULL,
  `ID_uprawnienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dzial`
--
ALTER TABLE `dzial`
  ADD PRIMARY KEY (`ID_Dzial`);

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`ID_Kurs`),
  ADD KEY `kurs_ID_Uzytkownik->uzytkownik_ID-Uzytkownik` (`ID_Uzytkownik`),
  ADD KEY `kurs_ID_Dzial->dzial_ID_Dzial` (`ID_Dzial`),
  ADD KEY `kurs_ID_Status->status_kursu_ID_status` (`ID_Status`) USING BTREE;

--
-- Indeksy dla tabeli `slowo`
--
ALTER TABLE `slowo`
  ADD PRIMARY KEY (`ID_Slowo`),
  ADD KEY `slowo_ID_Dzial_dzial_ID_Dzial` (`ID_Dzial`);

--
-- Indeksy dla tabeli `status_kursu`
--
ALTER TABLE `status_kursu`
  ADD PRIMARY KEY (`ID_Status`);

--
-- Indeksy dla tabeli `status_uzytkownik`
--
ALTER TABLE `status_uzytkownik`
  ADD PRIMARY KEY (`ID_status_uzytkownik`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`ID_uprawnienia`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`ID_Uzytkownik`),
  ADD KEY `uzytkownik->status_uzytkownik` (`ID_status_uzytkownik`),
  ADD KEY `uzytkownik_ID_uprawnienia->uprawnienia_ID_uprawnienia` (`ID_uprawnienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dzial`
--
ALTER TABLE `dzial`
  MODIFY `ID_Dzial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_Kurs` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `slowo`
--
ALTER TABLE `slowo`
  MODIFY `ID_Slowo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `status_kursu`
--
ALTER TABLE `status_kursu`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `ID_Uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ID_Dzial->dzial_ID_Dzial` FOREIGN KEY (`ID_Dzial`) REFERENCES `dzial` (`ID_Dzial`),
  ADD CONSTRAINT `kurs_ID_Status->status_ID_status` FOREIGN KEY (`ID_Status`) REFERENCES `status_kursu` (`ID_Status`),
  ADD CONSTRAINT `kurs_ID_Uzytkownik->uzytkownik_ID-Uzytkownik` FOREIGN KEY (`ID_Uzytkownik`) REFERENCES `uzytkownik` (`ID_Uzytkownik`);

--
-- Ograniczenia dla tabeli `slowo`
--
ALTER TABLE `slowo`
  ADD CONSTRAINT `slowo_ID_Dzial_dzial_ID_Dzial` FOREIGN KEY (`ID_Dzial`) REFERENCES `dzial` (`ID_Dzial`);

--
-- Ograniczenia dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `uzytkownik->status_uzytkownik` FOREIGN KEY (`ID_status_uzytkownik`) REFERENCES `status_uzytkownik` (`ID_status_uzytkownik`),
  ADD CONSTRAINT `uzytkownik_ID_uprawnienia->uprawnienia_ID_uprawnienia` FOREIGN KEY (`ID_uprawnienia`) REFERENCES `uprawnienia` (`ID_uprawnienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
