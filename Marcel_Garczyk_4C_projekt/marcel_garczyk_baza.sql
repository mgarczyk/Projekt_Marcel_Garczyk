-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2020, 13:33
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `marcel_garczyk_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzial`
--

CREATE TABLE `dzial` (
  `ID_Dzial` int(11) NOT NULL,
  `Nazwa_Dzial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dzial`
--

INSERT INTO `dzial` (`ID_Dzial`, `Nazwa_Dzial`) VALUES
(1, 'SO'),
(2, 'UTK'),
(3, 'SK');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `ID_kurs` int(11) NOT NULL,
  `ID_uzytkownik` int(11) NOT NULL,
  `ID_dzial` int(11) NOT NULL,
  `ID_status` int(11) NOT NULL,
  `Ilosc_slow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`ID_kurs`, `ID_uzytkownik`, `ID_dzial`, `ID_status`, `Ilosc_slow`) VALUES
(59, 89, 2, 3, 0),
(60, 89, 3, 3, 0),
(105, 88, 1, 3, 5),
(106, 88, 2, 3, 0);

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

--
-- Zrzut danych tabeli `slowo`
--

INSERT INTO `slowo` (`ID_Slowo`, `Polski`, `Angielski`, `ID_Dzial`) VALUES
(5, 'system operacyjny', 'operating system', 1),
(6, 'karta graficzna', 'video card', 2),
(9, 'jądro systemu operacyjnego', 'kernel (OS)', 1),
(10, 'klawiatura', 'keyboard', 2),
(13, 'światłowód', 'optical fiber', 3),
(14, 'skrętka', 'twisted pair', 3),
(15, 'myszka', 'mouse', 2),
(16, 'przełącznik', 'switch', 3),
(17, 'proces', 'process', 1),
(30, 'pliki', 'files', 1),
(31, 'ścieżka', 'path', 1),
(32, 'pulpit', 'desktop', 1),
(33, 'katalog', 'directory', 1),
(34, 'domyślne', 'default', 1),
(35, 'podkatalog', 'subdirectory', 1),
(36, 'atrybuty', 'attributes', 1),
(37, 'tylko do odczytu', 'read only', 1),
(38, 'nazwa pliku', 'filename', 1),
(39, 'rozszerzenie', 'extension', 1),
(40, 'każdy', 'each', 1),
(41, 'właściciel', 'owner', 1),
(42, 'strumień', 'stream', 1),
(43, 'dostęp', 'access', 1),
(44, 'wstawić', 'insert', 1),
(45, 'podpowiedź', 'prompt', 1),
(46, 'wykonywać', 'execute', 1),
(47, 'zawierać', 'contain', 1),
(48, 'ustawiać', 'set', 1),
(49, 'wykonywać', 'execute', 1),
(50, 'przenieść', 'move', 1),
(51, 'włączyć', 'enable', 1),
(52, 'przestrzeń nazw', 'namespace', 1),
(53, 'odrzucić', 'to deny', 1),
(54, 'pozwolenie', 'permission', 1),
(55, 'ilość', 'amount', 1),
(56, 'przenieść', 'move', 1),
(57, 'pliki', 'files', 1),
(58, 'ścieżka', 'path', 1),
(59, 'pulpit', 'desktop', 1),
(60, 'katalog', 'directory', 1),
(61, 'domyślne', 'default', 1),
(62, 'podkatalog', 'subdirectory', 1),
(63, 'atrybuty', 'attributes', 1),
(64, 'tylko do odczytu', 'read only', 1),
(65, 'nazwa pliku', 'filename', 1),
(66, 'rozszerzenie', 'extension', 1),
(67, 'każdy', 'each', 1),
(68, 'właściciel', 'owner', 1),
(69, 'strumień', 'stream', 1),
(70, 'dostęp', 'access', 1),
(71, 'wstawić', 'insert', 1),
(72, 'podpowiedź', 'prompt', 1),
(73, 'wykonywać', 'execute', 1),
(74, 'zawierać', 'contain', 1),
(75, 'ustawiać', 'set', 1),
(76, 'nadpisać', 'overwrite', 1),
(112, 'BIOS (rozwiń skrót)', 'Basic Input Output System', 2),
(113, 'szeregowy', 'serial', 2),
(114, 'równoległy', 'parallel', 2),
(115, 'kursor', 'cursor', 2),
(116, 'dane', 'data', 2),
(117, 'defragmentacja', 'defragmentation', 2),
(118, 'dysk', 'disc', 2),
(119, 'dyskietka', 'diskette', 2),
(120, 'ściągać', 'download', 2),
(121, 'napęd', 'driver', 2),
(122, 'błąd', 'error', 2),
(123, 'sprzęt komputerowy 	', 'hardware', 2),
(124, 'joystick', 'joystick', 2),
(125, 'instrukcja', 'instruction', 2),
(126, 'klawisz', 'key', 2),
(127, 'laptop', 'laptop', 2),
(128, 'pamięć', 'memory', 2),
(129, 'mikroprocesor', 'microprocessor', 2),
(130, 'monitor', 'monitor', 2),
(131, 'płyta główna', 'motherboard', 2),
(132, 'podkładka', 'pad', 2),
(133, 'rdzeń', 'core', 2),
(134, 'pamięć operacyjna', 'Random Acces Memory', 2),
(135, 'mikrofon', 'microphone', 2),
(136, 'słuchawki', 'headphones', 2),
(137, 'obudowa', 'case', 2),
(138, 'rozdzielczość', 'resolution', 2),
(139, 'drukarka', 'printer', 2),
(140, 'skaner', 'scanner', 2),
(141, 'głośnik', 'speaker', 2),
(142, 'BIOS (rozwiń skrót)', 'Basic Input Output System', 2),
(143, 'szeregowy', 'serial', 2),
(144, 'równoległy', 'parallel', 2),
(145, 'kursor', 'cursor', 2),
(146, 'dane', 'data', 2),
(147, 'defragmentacja', 'defragmentation', 2),
(148, 'dysk', 'disc', 2),
(149, 'dyskietka', 'diskette', 2),
(150, 'ściągać', 'download', 2),
(151, 'napęd', 'driver', 2),
(152, 'błąd', 'error', 2),
(153, 'sprzęt komputerowy 	', 'hardware', 2),
(154, 'joystick', 'joystick', 2),
(155, 'instrukcja', 'instruction', 2),
(156, 'klawisz', 'key', 2),
(157, 'laptop', 'laptop', 2),
(158, 'pamięć', 'memory', 2),
(159, 'mikroprocesor', 'microprocessor', 2),
(160, 'monitor', 'monitor', 2),
(161, 'płyta główna', 'motherboard', 2),
(162, 'podkładka', 'pad', 2),
(163, 'rdzeń', 'core', 2),
(164, 'pamięć operacyjna', 'Random Acces Memory', 2),
(165, 'mikrofon', 'microphone', 2),
(166, 'słuchawki', 'headphones', 2),
(167, 'obudowa', 'case', 2),
(168, 'rozdzielczość', 'resolution', 2),
(169, 'drukarka', 'printer', 2),
(170, 'skaner', 'scanner', 2),
(171, 'głośnik', 'speaker', 2),
(228, 'router', 'router', 3),
(229, 'punkt dostępu', 'acces point', 3),
(230, 'panel krosowy', 'patchpanel', 3),
(231, 'przewód krosowy', 'patchcord', 3),
(232, 'sieć globalna', 'internet', 3),
(233, 'sieć wewnętrzna', 'intranet', 3),
(234, 'strona internetowa', 'website', 3),
(235, 'internet szerokopasmowy', 'broadband internet', 3),
(236, 'dostawca usług internetowych', 'internet service provider', 3),
(237, 'zapora sieciowa', 'firewall', 3),
(238, 'hosting', 'web hosting', 3),
(239, 'internet bezprzewodowy', 'wireless internet', 3),
(240, 'przeglądać strony internetowe', 'browse the Internet', 3),
(241, 'połączony', 'online', 3),
(242, 'niepołączony', 'offline', 3),
(243, 'modem', 'modem', 3),
(244, 'skrzynka pocztowa', 'mailbox', 3),
(245, 'login', 'login', 3),
(246, 'hasło', 'password', 3),
(247, 'pobierać', 'download', 3),
(248, 'chmura', 'cloud', 3),
(249, 'koncentrator', 'hub', 3),
(250, 'wzmacniak', 'repeater', 3),
(251, 'most', 'bridge', 3),
(252, 'sieć szkieletowa', 'backbone network', 3),
(253, 'trasowanie', 'routing', 3),
(254, 'protokół', 'protocol', 3),
(255, 'maska podsieci', 'subnet mask', 3),
(256, 'brama sieciowa', 'gateway', 3),
(257, 'adres IP', 'IP addres', 3),
(258, 'router', 'router', 3),
(259, 'punkt dostępu', 'acces point', 3),
(260, 'panel krosowy', 'patchpanel', 3),
(261, 'przewód krosowy', 'patchcord', 3),
(262, 'sieć globalna', 'internet', 3),
(263, 'sieć wewnętrzna', 'intranet', 3),
(264, 'strona internetowa', 'website', 3),
(265, 'internet szerokopasmowy', 'broadband internet', 3),
(266, 'dostawca usług internetowych', 'internet service provider', 3),
(267, 'zapora sieciowa', 'firewall', 3),
(268, 'hosting', 'web hosting', 3),
(269, 'internet bezprzewodowy', 'wireless internet', 3),
(270, 'przeglądać strony internetowe', 'browse the Internet', 3),
(271, 'połączony', 'online', 3),
(272, 'niepołączony', 'offline', 3),
(273, 'modem', 'modem', 3),
(274, 'skrzynka pocztowa', 'mailbox', 3),
(275, 'login', 'login', 3),
(276, 'hasło', 'password', 3),
(277, 'pobierać', 'download', 3),
(278, 'chmura', 'cloud', 3),
(279, 'koncentrator', 'hub', 3),
(280, 'wzmacniak', 'repeater', 3),
(281, 'most', 'bridge', 3),
(282, 'sieć szkieletowa', 'backbone network', 3),
(283, 'trasowanie', 'routing', 3),
(284, 'protokół', 'protocol', 3),
(285, 'maska podsieci', 'subnet mask', 3),
(286, 'brama sieciowa', 'gateway', 3),
(287, 'adres IP', 'IP addres', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_kursu`
--

CREATE TABLE `status_kursu` (
  `ID_Status` int(11) NOT NULL,
  `Nazwa_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status_kursu`
--

INSERT INTO `status_kursu` (`ID_Status`, `Nazwa_Status`) VALUES
(1, 'Utworzony'),
(2, 'Aktywny_wykonywany'),
(3, 'Aktywny_niewykonywany');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_uzytkownik`
--

CREATE TABLE `status_uzytkownik` (
  `ID_status_uzytkownik` int(11) NOT NULL,
  `Nazwa_status_uzytkownik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status_uzytkownik`
--

INSERT INTO `status_uzytkownik` (`ID_status_uzytkownik`, `Nazwa_status_uzytkownik`) VALUES
(1, 'Zalogowany'),
(2, 'Wylogowany'),
(3, 'Niepotwierdzony_email');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `ID_uprawnienia` int(11) NOT NULL,
  `Nazwa_uprawnienia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`ID_uprawnienia`, `Nazwa_uprawnienia`) VALUES
(1, 'Zwykly_uzytkownik'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `ID_Uzytkownik` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Haslo` varchar(200) NOT NULL,
  `ID_status_uzytkownik` int(11) NOT NULL,
  `Data_Ostatniego_Logowania` date NOT NULL,
  `ID_uprawnienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`ID_Uzytkownik`, `Login`, `Haslo`, `ID_status_uzytkownik`, `Data_Ostatniego_Logowania`, `ID_uprawnienia`) VALUES
(88, 'marcelgarczyk.projekt@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VDhQd2Jzd3Q0QldHdURLdA$+hMuIcW1kT8IFTEx76rSJrSmCfVJJTuNGpR2QPGxQZo', 1, '2020-03-17', 1),
(89, 'xxmadzelxx@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$WlVNT0J1RVhsSTQ5aFZ5Mw$mrRzw4VdURKVZbNjxiun/BHo3EeTDFWBnCN3d5I12OI', 2, '2020-03-20', 1);

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
  ADD PRIMARY KEY (`ID_kurs`);

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
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `dzial`
--
ALTER TABLE `dzial`
  MODIFY `ID_Dzial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT dla tabeli `slowo`
--
ALTER TABLE `slowo`
  MODIFY `ID_Slowo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT dla tabeli `status_kursu`
--
ALTER TABLE `status_kursu`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `ID_Uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Ograniczenia dla zrzutów tabel
--

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
