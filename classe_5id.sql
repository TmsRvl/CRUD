-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 11, 2023 alle 08:47
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `classe_5id`
--

CREATE TABLE `classe_5id` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `italiano` float NOT NULL,
  `storia` float NOT NULL,
  `matematica` float NOT NULL,
  `scienze` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `classe_5id`
--

INSERT INTO `classe_5id` (`id`, `nome`, `cognome`, `italiano`, `storia`, `matematica`, `scienze`) VALUES
(1, 'Tommaso', 'Rovoletto', 6, 5, 8, 7),
(2, 'Eros', 'Menin', 8, 9, 9, 10);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `classe_5id`
--
ALTER TABLE `classe_5id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `classe_5id`
--
ALTER TABLE `classe_5id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
