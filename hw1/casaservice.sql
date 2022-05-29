-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2022 alle 23:18
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casaservice`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `case`
--

CREATE TABLE `case` (
  `id_casa` int(10) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `descrizione` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `indirizzo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `case`
--

INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa p1', '32000', 'descrizione', 'img/p1.jpg','popular', 'catania', 'via aci');
INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa p2', '52000', 'descrizione', 'img/p2.jpg','popular', 'catania', 'via messina');
INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa p3', '62000', 'descrizione', 'img/p3.jpg','popular', 'genova', 'via verdi');
INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa n1', '75000', 'descrizione', 'img/p4.jpg','new', 'genova', 'via roma');
INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa n2', '21000', 'descrizione', 'img/p5.jpg','new', 'firenze', 'via nuova');
INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('Casa n3', '83000', 'descrizione', 'img/p6.jpg','new', 'firenze', 'via principale');

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `id_like` int(10) NOT NULL,
  `id_utente` int(10) NOT NULL,
  `id_casa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `nome`, `email`, `password`) VALUES
(1, 'Gabriele', 'gabryelerolo@gmail.com', '5898722e026109acad0103e11741e448');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id_casa`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_casa` (`id_casa`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `case`
--
ALTER TABLE `case`
  MODIFY `id_casa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_casa`) REFERENCES `case` (`id_casa`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
