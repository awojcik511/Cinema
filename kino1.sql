-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Maj 2019, 15:44
-- Wersja serwera: 5.6.26
-- Wersja PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kino1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktorzy`
--

CREATE TABLE IF NOT EXISTS `aktorzy` (
  `ID_aktora` int(11) NOT NULL,
  `Imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `aktorzy`
--

INSERT INTO `aktorzy` (`ID_aktora`, `Imie`, `Nazwisko`) VALUES
(1, 'Rami', 'Malek'),
(2, 'Lucy', 'Boynton'),
(3, 'Gwilym', 'Lee'),
(4, 'Gwilym', 'Lee'),
(5, 'Ben', 'Hardy'),
(6, 'Joseph', 'Mazzello'),
(7, 'Jennifer', 'Lawrence'),
(8, 'Joel', 'Edgerton'),
(9, 'Matthias', 'Schoenaerts'),
(10, 'Charlotte', 'Rampling'),
(11, 'Mary-Louise', 'Parker'),
(12, 'Emily', 'Blunt'),
(13, 'John', 'Krasinski'),
(14, 'Millicent', 'Simmonds'),
(15, 'Noah', 'Jupe'),
(16, 'Cade', 'Woodward'),
(17, 'Jakub', 'Gierszał'),
(18, 'Kamila', 'Kamińska'),
(19, 'Anna', 'Próchniak'),
(20, 'Arkadiusz', 'Jakubik'),
(21, 'Janusz', 'Gajos');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `ID_filmu` int(10) unsigned NOT NULL,
  `Tytul` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Rok` int(4) DEFAULT NULL,
  `Rezyseria` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `Scenariusz` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `Produkcja` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `Boxoffice` int(11) NOT NULL,
  `Okladka` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Opis` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `Ocena` float NOT NULL,
  `Glosy` int(11) NOT NULL,
  `modal` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `film`
--

INSERT INTO `film` (`ID_filmu`, `Tytul`, `Rok`, `Rezyseria`, `Scenariusz`, `Produkcja`, `Boxoffice`, `Okladka`, `Opis`, `Ocena`, `Glosy`, `modal`) VALUES
(1, 'Bohemian Rapsody', 2018, 'Francis Lawrence', 'Justin Haythe', 'USA', 151572634, '1.jpg', 'Dzięki oryginalnemu brzmieniu Queen staje się jednym z najpopularniejszych zespołów w historii muzyki.', 8.3, 38165, 'modal1'),
(2, 'Czerwona Jaskółka', 2018, 'Bryan Singer', 'Anthony McCarten', 'USA', 145108665, '2.jpg', 'Młoda Rosjanka wbrew swojej woli odbywa szkolenie, \r\npodczas którego uczy się uwodzić szpiegów. Niebawem zostaje wysłana \r\ndo Budapesztu, gdzie musi wydobyć tajne informacje od amerykańskiego \r\nwywiadowcy.', 6.96, 62073, 'modal2'),
(3, 'Ciche miejsce', 2018, 'John Krasinski', 'Scott Beck', 'USA', 2147483647, '3.jpg', 'Pięcioosobowa rodzina stara się przetrwać w świecie pełnym \r\npotworów, które stanowią śmiertelne niebezpieczeństwo, \r\na zwabia je najmniejszy hałas.', 6.8, 22997, 'modal3'),
(4, 'Najlepszy ', 2017, 'Łukasz Palkowski', 'Maciej Karpiński, Agatha Dominik', 'Polska', 9473951, '4.jpg', 'To fascynująca, pełna morderczego wysiłku, spektakularnych upadków i niezwykłej siły, historia inspirowana życiem Jerzego Górskiego, który ukończył bieg śmierci...', 7.9, 67423, 'modal4'),
(5, 'Planeta Singli 2', 2018, 'Sam Akina', 'Sam Akina, Jules Jones', 'Polska', 51365, '5.jpg', 'Związek Ani i Tomka przeżywa kryzys, bo oboje mają względem siebie inne zamiary. Tymczasem na horyzoncie pojawia się zakochany w dziewczynie milioner. ', 6.75, 24640, 'modal5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunek`
--

CREATE TABLE IF NOT EXISTS `gatunek` (
  `ID_gatunku` int(10) unsigned NOT NULL,
  `gatunek` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `gatunek`
--

INSERT INTO `gatunek` (`ID_gatunku`, `gatunek`) VALUES
(1, 'Muzyczny'),
(2, 'Biograficzny'),
(3, 'Thriller'),
(4, 'Szpiegowski'),
(5, 'Horror'),
(6, 'Sportowy'),
(7, 'Sci-Fi'),
(8, 'Komedia romantyczna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunekfilmu`
--

CREATE TABLE IF NOT EXISTS `gatunekfilmu` (
  `ID_gatunku` int(10) unsigned NOT NULL,
  `ID_filmu` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `gatunekfilmu`
--

INSERT INTO `gatunekfilmu` (`ID_gatunku`, `ID_filmu`) VALUES
(1, 1),
(2, 1),
(5, 3),
(2, 4),
(3, 2),
(6, 4),
(4, 2),
(7, 3),
(8, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nagroda`
--

CREATE TABLE IF NOT EXISTS `nagroda` (
  `ID_filmu` int(10) unsigned NOT NULL,
  `Nagroda` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nagroda`
--

INSERT INTO `nagroda` (`ID_filmu`, `Nagroda`) VALUES
(1, 'Kryształowa Statuetka'),
(2, 'Kryształowa Statuetka'),
(3, 'Teen Choice Ulubiony film'),
(4, 'Kryształowa Statuetka'),
(4, 'Złoty Lew: Najlepsza scenografia '),
(2, 'Kryształowa Statuetka: Ulubiony dramat'),
(1, 'Złote Globy: Najlepszy dramat'),
(3, 'Critics Choice: Najlepszy horror');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obsada`
--

CREATE TABLE IF NOT EXISTS `obsada` (
  `ID_aktora` int(11) NOT NULL,
  `ID_film` int(10) unsigned NOT NULL,
  `Postac` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `obsada`
--

INSERT INTO `obsada` (`ID_aktora`, `ID_film`, `Postac`) VALUES
(1, 2, 'Freddie Mercury'),
(2, 2, 'Mary Austin'),
(3, 2, 'Brian May'),
(4, 2, 'Roger Taylor'),
(5, 2, 'John Deacon'),
(6, 1, 'Dominika Egorova'),
(7, 1, 'Nate Nash'),
(8, 1, 'Vanya Egorov'),
(9, 1, 'Dyrektorka'),
(10, 1, 'Stephanie Boucher'),
(11, 3, 'Evelyn Abbott'),
(12, 3, 'Lee Abbott'),
(13, 3, 'Regan Abbott'),
(14, 3, 'Marcus Abbott'),
(15, 3, 'Beau Abbott'),
(17, 4, 'Jerzy Górski'),
(18, 4, 'Ewa Meller'),
(19, 4, 'Grażyna'),
(20, 4, 'Kierownik basenu'),
(21, 4, 'Marek Kotański');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repertuar`
--

CREATE TABLE IF NOT EXISTS `repertuar` (
  `ID_repertuaru` int(11) NOT NULL,
  `ID_filmu` int(10) unsigned NOT NULL,
  `Dzien` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL,
  `Godzina` time NOT NULL,
  `modal` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `repertuar`
--

INSERT INTO `repertuar` (`ID_repertuaru`, `ID_filmu`, `Dzien`, `Godzina`, `modal`) VALUES
(1, 1, 'Wtorek', '11:00:00', 'modal1'),
(2, 1, 'Wtorek', '20:00:00', 'modal2'),
(3, 2, 'Wtorek', '16:00:00', 'modal3'),
(4, 3, 'Wtorek', '13:00:00', 'modal4'),
(5, 4, 'Poniedziałek', '10:00:00', 'modal5'),
(6, 4, 'Poniedziałek', '13:00:00', 'modal6'),
(7, 3, 'Poniedziałek', '15:00:00', 'modal7'),
(8, 1, 'Środa', '11:00:00', 'modal8'),
(9, 5, 'Środa', '19:00:00', 'modal9'),
(10, 4, 'Środa', '16:00:00', 'modal10'),
(11, 5, 'Czwartek', '10:00:00', 'modal11'),
(12, 5, 'Czwartek', '13:00:00', 'modal12'),
(13, 5, 'Czwartek', '20:00:00', 'modal13'),
(14, 1, 'Piątek', '10:00:00', 'modal14'),
(15, 3, 'Piątek', '13:00:00', 'modal15'),
(16, 2, 'Czwartek', '15:00:00', 'modal16'),
(17, 1, 'Sobota', '10:00:00', 'modal17'),
(18, 2, 'Sobota', '12:00:00', 'modal18'),
(19, 3, 'Sobota', '14:00:00', 'modal19'),
(20, 4, 'Sobota', '16:00:00', 'modal20'),
(21, 5, 'Sobota', '18:00:00', 'modal21'),
(22, 5, 'Sobota', '20:00:00', 'modal22'),
(23, 3, 'Sobota', '22:00:00', 'modal23'),
(24, 1, 'Niedziela', '10:00:00', 'modal24'),
(25, 2, 'Niedziela', '12:00:00', 'modal25'),
(26, 2, 'Niedziela', '14:00:00', 'modal26'),
(27, 3, 'Niedziela', '21:00:00', 'modal27'),
(28, 3, 'Niedziela', '23:00:00', 'modal28'),
(29, 5, 'Niedziela', '15:00:00', 'modal29'),
(30, 5, 'Niedziela', '17:00:00', 'modal30'),
(31, 4, 'Niedziela', '19:00:00', 'modal31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE IF NOT EXISTS `rezerwacja` (
  `ID_rezerwacji` int(11) NOT NULL,
  `ID_repertuar` int(11) NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL,
  `cena` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`ID_rezerwacji`, `ID_repertuar`, `ID_uzytkownika`, `cena`) VALUES
(60, 7, 59, NULL),
(61, 5, 60, NULL),
(62, 7, 61, NULL),
(63, 7, 62, NULL),
(64, 6, 62, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja_miejsca`
--

CREATE TABLE IF NOT EXISTS `rezerwacja_miejsca` (
  `ID_rezerwacji` int(11) NOT NULL,
  `ID_siedzenia` int(11) NOT NULL,
  `Status_siedzenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacja_miejsca`
--

INSERT INTO `rezerwacja_miejsca` (`ID_rezerwacji`, `ID_siedzenia`, `Status_siedzenia`) VALUES
(60, 13, 1),
(61, 37, 1),
(63, 12, 1),
(64, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `Siedzenie` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL,
  `Rzad` int(11) NOT NULL,
  `Cena` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sale`
--

INSERT INTO `sale` (`Siedzenie`, `miejsce`, `Rzad`, `Cena`) VALUES
(1, 1, 1, 10),
(2, 2, 1, 10),
(3, 3, 1, 10),
(4, 4, 1, 10),
(5, 5, 1, 10),
(6, 6, 1, 10),
(7, 7, 1, 10),
(8, 8, 1, 10),
(9, 9, 1, 10),
(10, 10, 1, 10),
(11, 1, 2, 10),
(12, 2, 2, 10),
(13, 3, 2, 10),
(14, 4, 2, 10),
(15, 5, 2, 10),
(16, 6, 2, 10),
(17, 7, 2, 10),
(18, 8, 2, 10),
(19, 9, 2, 10),
(20, 10, 2, 10),
(21, 1, 3, 10),
(22, 2, 3, 10),
(23, 3, 3, 10),
(24, 4, 3, 10),
(25, 5, 3, 10),
(26, 6, 3, 10),
(27, 7, 3, 10),
(28, 8, 3, 10),
(29, 9, 3, 10),
(30, 10, 3, 10),
(31, 1, 4, 15),
(32, 2, 4, 15),
(33, 3, 4, 15),
(34, 4, 4, 15),
(35, 5, 4, 15),
(36, 6, 4, 15),
(37, 7, 4, 15),
(38, 8, 4, 15),
(39, 9, 4, 15),
(40, 10, 4, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `ID_repertuaru` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `rzad` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL,
  `imie` varchar(70) NOT NULL,
  `nazwisko` varchar(80) NOT NULL,
  `telefon` varchar(9) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `ID_uzytkownika` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(9) COLLATE utf8_polish_ci DEFAULT NULL,
  `adresEmail` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`ID_uzytkownika`, `imie`, `nazwisko`, `telefon`, `adresEmail`) VALUES
(59, 'Kamil', 'ada', '124', 'qeqw@wp.pl'),
(60, 'a2', 'a2', '123', 'ko@wp.pl'),
(61, '', '', '0', ''),
(62, 'Adam', 'Much', '123456789', 'pan@wp.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `aktorzy`
--
ALTER TABLE `aktorzy`
  ADD PRIMARY KEY (`ID_aktora`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_filmu`);

--
-- Indexes for table `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`ID_gatunku`);

--
-- Indexes for table `gatunekfilmu`
--
ALTER TABLE `gatunekfilmu`
  ADD KEY `gatunekFilm_FK` (`ID_filmu`),
  ADD KEY `gatunek_FK2` (`ID_gatunku`);

--
-- Indexes for table `nagroda`
--
ALTER TABLE `nagroda`
  ADD KEY `ID_filmu` (`ID_filmu`);

--
-- Indexes for table `obsada`
--
ALTER TABLE `obsada`
  ADD KEY `ID_aktora` (`ID_aktora`),
  ADD KEY `ID_film` (`ID_film`);

--
-- Indexes for table `repertuar`
--
ALTER TABLE `repertuar`
  ADD PRIMARY KEY (`ID_repertuaru`),
  ADD KEY `ID_filmu` (`ID_filmu`);

--
-- Indexes for table `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`ID_rezerwacji`),
  ADD KEY `FOREIGNKEY1` (`ID_repertuar`),
  ADD KEY `FK_user` (`ID_uzytkownika`);

--
-- Indexes for table `rezerwacja_miejsca`
--
ALTER TABLE `rezerwacja_miejsca`
  ADD KEY `FK_siedzenia` (`ID_siedzenia`),
  ADD KEY `ID_rezerwacji` (`ID_rezerwacji`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Siedzenie`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`ID_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `aktorzy`
--
ALTER TABLE `aktorzy`
  MODIFY `ID_aktora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `film`
--
ALTER TABLE `film`
  MODIFY `ID_filmu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `ID_rezerwacji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT dla tabeli `sale`
--
ALTER TABLE `sale`
  MODIFY `Siedzenie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `ID_uzytkownika` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `gatunekfilmu`
--
ALTER TABLE `gatunekfilmu`
  ADD CONSTRAINT `gatunekFilm_FK` FOREIGN KEY (`ID_filmu`) REFERENCES `film` (`ID_filmu`),
  ADD CONSTRAINT `gatunek_FK2` FOREIGN KEY (`ID_gatunku`) REFERENCES `gatunek` (`ID_gatunku`);

--
-- Ograniczenia dla tabeli `nagroda`
--
ALTER TABLE `nagroda`
  ADD CONSTRAINT `nagroda_ibfk_1` FOREIGN KEY (`ID_filmu`) REFERENCES `film` (`ID_filmu`);

--
-- Ograniczenia dla tabeli `obsada`
--
ALTER TABLE `obsada`
  ADD CONSTRAINT `obsada_ibfk_1` FOREIGN KEY (`ID_aktora`) REFERENCES `aktorzy` (`ID_aktora`),
  ADD CONSTRAINT `obsada_ibfk_2` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_filmu`);

--
-- Ograniczenia dla tabeli `repertuar`
--
ALTER TABLE `repertuar`
  ADD CONSTRAINT `repertuar_ibfk_1` FOREIGN KEY (`ID_filmu`) REFERENCES `film` (`ID_filmu`);

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`ID_uzytkownika`) REFERENCES `uzytkownik` (`ID_uzytkownika`),
  ADD CONSTRAINT `rezerwacja_ibfk_1` FOREIGN KEY (`ID_repertuar`) REFERENCES `repertuar` (`ID_repertuaru`);

--
-- Ograniczenia dla tabeli `rezerwacja_miejsca`
--
ALTER TABLE `rezerwacja_miejsca`
  ADD CONSTRAINT `FK_siedzenia` FOREIGN KEY (`ID_siedzenia`) REFERENCES `sale` (`Siedzenie`),
  ADD CONSTRAINT `rezerwacja_miejsca_ibfk_1` FOREIGN KEY (`ID_rezerwacji`) REFERENCES `rezerwacja` (`ID_rezerwacji`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
