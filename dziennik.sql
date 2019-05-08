-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lis 2018, 00:42
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `frekwencja`
--

CREATE TABLE `frekwencja` (
  `id_obecnosci` int(11) NOT NULL,
  `klasa` int(11) NOT NULL,
  `id_lekcji` int(11) NOT NULL,
  `uczen` int(11) NOT NULL,
  `obecny` tinyint(1) NOT NULL,
  `data_lekcji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `frekwencja`
--

INSERT INTO `frekwencja` (`id_obecnosci`, `klasa`, `id_lekcji`, `uczen`, `obecny`, `data_lekcji`) VALUES
(1, 1, 1, 1, 1, '2018-11-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa_klasy` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `wychowawca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa_klasy`, `wychowawca`) VALUES
(1, '4TI', 1),
(2, '3TI', 2),
(3, '2TI', 3),
(4, '1TI', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekcje`
--

CREATE TABLE `lekcje` (
  `id_lekcji` int(11) NOT NULL,
  `nauczyciel` int(11) NOT NULL,
  `przedmiot` int(11) NOT NULL,
  `klasa` int(11) NOT NULL,
  `nazwa_lekcji` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `opis_lekcji` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `data_lekcji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lekcje`
--

INSERT INTO `lekcje` (`id_lekcji`, `nauczyciel`, `przedmiot`, `klasa`, `nazwa_lekcji`, `opis_lekcji`, `data_lekcji`) VALUES
(1, 1, 1, 1, 'Test', 'Test', '2018-11-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `id_nauczyciele` int(11) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `plec` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `przedmiot` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nauczyciele`
--

INSERT INTO `nauczyciele` (`id_nauczyciele`, `imie`, `nazwisko`, `data_urodzenia`, `plec`, `przedmiot`) VALUES
(1, 'Jan', 'Nowak', '2018-11-05', 'M', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_oceny` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `klasa` int(11) NOT NULL,
  `uczen` int(11) NOT NULL,
  `przedmiot` int(11) NOT NULL,
  `nauczyciel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`id_oceny`, `ocena`, `klasa`, `uczen`, `przedmiot`, `nauczyciel`) VALUES
(1, 6, 1, 1, 1, 1),
(2, 6, 2, 2, 1, 1),
(3, 4, 2, 2, 1, 1),
(4, 4, 1, 1, 1, 1),
(5, 3, 1, 1, 1, 1),
(6, 2, 1, 1, 1, 1),
(7, 3, 1, 1, 1, 1),
(8, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa_przedmiotu` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `opis_przedmiotu` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `nazwa_przedmiotu`, `opis_przedmiotu`) VALUES
(1, 'Historia', 'Nauka o przeszłości'),
(2, 'Biologia', 'Nauka o przyrodzie'),
(3, 'Religia', 'Nauka o Bogu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprawdziany`
--

CREATE TABLE `sprawdziany` (
  `id_sprawdziany` int(11) NOT NULL,
  `nazwa_spr` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `opis_spr` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `data_spr` date NOT NULL,
  `przedmiot` int(11) NOT NULL,
  `nauczyciel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sprawdziany`
--

INSERT INTO `sprawdziany` (`id_sprawdziany`, `nazwa_spr`, `opis_spr`, `data_spr`, `przedmiot`, `nauczyciel`) VALUES
(1, 'Sprawdzian o II Wojnie Światowej', 'Sprawdzenie wiadomości z treści II Wojny Światowej', '2018-11-13', 1, 1),
(2, 'Sprawdzian Historia', 'Sprawdzian z zakresu Historii', '2018-11-16', 1, 1),
(3, 'Sprawdzian Historia', 'Sprawdzian ze starożytności', '2018-11-30', 1, 1),
(4, 'Sprawdzian Historia', 'Sprawdzian ze Średniowiecza', '2018-11-29', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `studenci`
--

CREATE TABLE `studenci` (
  `id_studenci` int(11) NOT NULL,
  `imie` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `plec` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `klasa` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `studenci`
--

INSERT INTO `studenci` (`id_studenci`, `imie`, `nazwisko`, `data_urodzenia`, `plec`, `klasa`) VALUES
(1, 'Andrzej', 'Kowalski', '2018-11-06', 'M', '1'),
(2, 'Jakub', 'Nowak', '1999-11-17', 'M', '2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uwagi`
--

CREATE TABLE `uwagi` (
  `id_uwagi` int(11) NOT NULL,
  `klasa` int(11) NOT NULL,
  `uczen` int(11) NOT NULL,
  `nauczyciel` int(11) NOT NULL,
  `tresc` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uwagi`
--

INSERT INTO `uwagi` (`id_uwagi`, `klasa`, `uczen`, `nauczyciel`, `tresc`) VALUES
(1, 1, 1, 1, 'Uczeń rozmawia na lekcji');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `nazwa_uzytkownika`, `haslo`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, 'admin2', 'admin2', 'admin2@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `frekwencja`
--
ALTER TABLE `frekwencja`
  ADD PRIMARY KEY (`id_obecnosci`);

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indeksy dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  ADD PRIMARY KEY (`id_lekcji`);

--
-- Indeksy dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD PRIMARY KEY (`id_nauczyciele`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_oceny`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id_przedmiotu`);

--
-- Indeksy dla tabeli `sprawdziany`
--
ALTER TABLE `sprawdziany`
  ADD PRIMARY KEY (`id_sprawdziany`);

--
-- Indeksy dla tabeli `studenci`
--
ALTER TABLE `studenci`
  ADD PRIMARY KEY (`id_studenci`);

--
-- Indeksy dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  ADD PRIMARY KEY (`id_uwagi`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `frekwencja`
--
ALTER TABLE `frekwencja`
  MODIFY `id_obecnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `lekcje`
--
ALTER TABLE `lekcje`
  MODIFY `id_lekcji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  MODIFY `id_nauczyciele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `sprawdziany`
--
ALTER TABLE `sprawdziany`
  MODIFY `id_sprawdziany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `studenci`
--
ALTER TABLE `studenci`
  MODIFY `id_studenci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  MODIFY `id_uwagi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
