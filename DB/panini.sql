-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2024 alle 17:48
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panini`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE `menu` (
  `panino_cotto` int(5) NOT NULL,
  `panino_crudo` int(5) NOT NULL,
  `panino_formaggio` int(5) NOT NULL,
  `panino_sopressa` int(5) NOT NULL,
  `pizzetta` int(5) NOT NULL,
  `torta_salata` int(5) NOT NULL,
  `croissant` int(5) NOT NULL,
  `yogurt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `menu`
--

INSERT INTO `menu` (`panino_cotto`, `panino_crudo`, `panino_formaggio`, `panino_sopressa`, `pizzetta`, `torta_salata`, `croissant`, `yogurt`) VALUES
(30, 30, 30, 30, 30, 30, 30, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int(20) NOT NULL,
  `utente` varchar(20) NOT NULL,
  `panino_cotto` int(20) NOT NULL,
  `panino_crudo` int(5) NOT NULL,
  `panino_formaggio` int(5) NOT NULL,
  `panino_sopressa` int(5) NOT NULL,
  `pizzetta` int(5) NOT NULL,
  `torta_salata` int(5) NOT NULL,
  `croissant` int(5) NOT NULL,
  `yogurt` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `plesso` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id_prenotazione`, `utente`, `panino_cotto`, `panino_crudo`, `panino_formaggio`, `panino_sopressa`, `pizzetta`, `torta_salata`, `croissant`, `yogurt`, `data`, `ora`, `plesso`) VALUES
(4, 'Gianni Nacu', 0, 4, 0, 0, 0, 0, 0, 0, '0000-00-00', '00:00:00', 'N'),
(5, 'Gianni Nacu', 3, 3, 0, 0, 0, 0, 0, 0, '2024-05-09', '17:15:29', 'N'),
(35, 'Gianni Nacu', 1, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:28:40', 'P'),
(36, 'Gianni Nacu', 1, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:28:47', 'P'),
(37, 'Gianni Nacu', 1, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:29:13', 'P'),
(38, 'Gianni Nacu', 4, 2, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:34:52', 'N'),
(39, 'Gianni Nacu', 4, 2, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:35:26', 'N'),
(40, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:35:30', 'P'),
(41, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 2, '2024-05-12', '17:37:00', 'N'),
(42, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 2, '2024-05-12', '17:38:16', 'N'),
(43, 'Gianni Nacu', 2, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:38:22', 'P'),
(44, 'Gianni Nacu', 4, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:42:11', 'N'),
(45, 'Gianni Nacu', 4, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:42:26', 'N'),
(46, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:42:30', 'P'),
(47, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:43:06', 'P'),
(48, 'Gianni Nacu', 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-12', '17:43:07', 'P'),
(49, 'Gianni Nacu', 5, 0, 0, 0, 0, 0, 0, 1, '2024-05-12', '17:43:48', 'N');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `nome`, `cognome`, `username`, `email`, `password`, `tipo`) VALUES
(5, 'Gianni', 'Nacu', 'Juani', 'gianninacu0@gmail.com', 'newton', 'A');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
