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

INSERT INTO `case` (`id_casa`, `nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES
(24, 'Casa n1', 53000, 'In pieno centro cittÃ , in un elegante condominio con servizio di portineria e ascensori, UniCredit Subito Casa propone in vendita un appartamento di 195 mq. con affaccio sugli alberi della piazza.', 'img/p1.jpg', 'new', 'Catania', 'via aci '),
(25, 'Casa n2', 21000, 'Lâ€™appartamento si compone di un ingresso, tre ampie stanze su un balcone terrazzato, un corridoio che disimpegna altre due camere, una cucina abitabile, un ampio bagno con vasca, un secondo bagno con lavanderia ed un ripostiglio.', 'img/p2.jpg', 'new', 'Catania', 'Via etnea'),
(26, 'Casa n3', 76000, 'L\'abitazione si compone di un ingresso su un grande soggiorno doppio, un disimpegno, una cucina abitabile, tre camere da letto, un bagno con vasca, una lavanderia con servizi, doccia idromassaggio e con vano ripostiglio.\r\nCompletano la proprietÃ  due balconi.', 'img/p3.jpg', 'new', 'Genova', 'via genova'),
(27, 'Casa p1', 58000, 'La nostra agenzia propone in vendita Appartamento panoramico di 4 vani e mezzo circa 120 mq, sito a Catania in zona Canalicchio, nei pressi della Piazza VicerÃ© e precisamente in via Leucatia, posto al secondo piano senza ascensore all\'interno di un piccolo condominio in buono stato', 'img/p4.jpg', 'popular', 'Genova', 'Via genova'),
(28, 'Casa p2', 73000, ' L\'immobile al suo interno Ã¨ composto da: ingresso su saletta, disimpegno, a seguire salone doppio con esposizione su balcone terrazzato, due camere da letto, cucina, servizio con box doccia, ripostiglio e lavanderia interna (con possibilitÃ  di creare il doppio servizio).', 'img/p5.jpg', 'popular', 'Firenze', 'Via firenze'),
(29, 'Casa p3', 82000, 'Lâ€™immobile, attualmente adibito ad ufficio, si distribuisce su due livelli con doppia esposizione, Ã¨ composto da un ingresso con reception, tre ampie sale con soffitti affrescati, una cucina, un bagno ed un secondo ingresso dal cortile condominiale; al piano soppalcato due sale ed un bagno.', 'img/p6.jpg', 'popular', 'Firenze', 'Via firenze');

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
