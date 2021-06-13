-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 13, 2021 alle 17:11
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionedocumentistorici`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `archivio`
--

CREATE TABLE `archivio` (
  `id_documento` int(11) NOT NULL,
  `nome_documento` char(60) NOT NULL,
  `tipo_documento` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `archivio`
--

INSERT INTO `archivio` (`id_documento`, `nome_documento`, `tipo_documento`) VALUES
(1, 'Crisi del 29', 'analogico'),
(2, 'La crescita del primo dopoguerra', 'analogico'),
(3, 'La coscienza di Zeno', 'analogico'),
(4, 'La guerra del Vietnam', 'digitale'),
(5, 'Gli hippie e gli anni 70', 'digitale'),
(6, 'La guerra di Piero prima versione', 'digitale');

-- --------------------------------------------------------

--
-- Struttura della tabella `documento_analogico`
--

CREATE TABLE `documento_analogico` (
  `supporto` char(30) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `caratteristiche` char(60) NOT NULL,
  `lugod_custodia` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `documento_analogico`
--

INSERT INTO `documento_analogico` (`supporto`, `id_documento`, `nome`, `caratteristiche`, `lugod_custodia`) VALUES
('cartaceo', 1, 'Crisi del 29', 'giornale inglese del 1929 riguardo al fallimento della borsa', 'archivio di Pitsburgh'),
('disco magnetico', 2, 'La crescita del primo dopoguerra', 'Dati della crescita economica del primo dopoguerra', 'archivio di Chicago'),
('Cartaceo', 3, 'La coscienza di Zeno', 'prima edizione del famoso romanzo \"La coscienza di Zeno\"', 'archivio di Milano');

-- --------------------------------------------------------

--
-- Struttura della tabella `documento_digitale`
--

CREATE TABLE `documento_digitale` (
  `URL` char(60) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `nome` char(40) NOT NULL,
  `applicazione_riproduzione` char(30) NOT NULL,
  `apparato_ausiliiario` char(30) DEFAULT 'nessuno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `documento_digitale`
--

INSERT INTO `documento_digitale` (`URL`, `id_documento`, `nome`, `applicazione_riproduzione`, `apparato_ausiliiario`) VALUES
('http://ustory.com/archivio/documentiDigitali/GuerraVietnam', 4, 'La guerra del Vietnam', 'riproduttore video', 'casse'),
('http://ustory.com/archivio/documentiDigitali/HippieAnni70', 5, 'Gli hippie e gli anni 70', 'visualizzatore foto', 'nessuno'),
('http://ustory.com/archivio/documentiDigitali/GuerraDiPiero', 6, 'La guerra di Piero prima versione', 'riproduttore audio', 'cuffie');

-- --------------------------------------------------------

--
-- Struttura della tabella `manutentore`
--

CREATE TABLE `manutentore` (
  `email` char(30) NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `manutentore`
--

INSERT INTO `manutentore` (`email`, `username`, `password`) VALUES
('dario.tonetti@gmail.com', 'tonetti', '4567'),
('provenzano367@gmail.com', 'provenzano', '1234'),
('simone.scavezzon@gmail.com', 'scavezzon', '1234');

-- --------------------------------------------------------

--
-- Struttura della tabella `operazione`
--

CREATE TABLE `operazione` (
  `numero_protocollo` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_documento` int(11) NOT NULL,
  `tipo_operazione` char(30) NOT NULL,
  `email_manutentore` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `operazione`
--

INSERT INTO `operazione` (`numero_protocollo`, `data`, `id_documento`, `tipo_operazione`, `email_manutentore`) VALUES
(1, '2021-05-19', 7, 'rimozione', 'provenzano367@gmail.com'),
(2, '2021-05-25', 2, 'aggiunta', 'provenzano367@gmail.com'),
(3, '2021-05-25', 1, 'aggiunta', 'provenzano367@gmail.com'),
(4, '2021-05-25', 2, 'aggiunta', 'provenzano367@gmail.com'),
(5, '2021-05-25', 3, 'aggiunta', 'provenzano367@gmail.com'),
(6, '2021-05-25', 4, 'aggiunta', 'provenzano367@gmail.com'),
(7, '2021-05-25', 5, 'aggiunta', 'provenzano367@gmail.com'),
(8, '2021-05-25', 6, 'aggiunta', 'provenzano367@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni_e_prestiti`
--

CREATE TABLE `prenotazioni_e_prestiti` (
  `cod_prestito` int(11) NOT NULL,
  `nome` char(20) NOT NULL,
  `cognome` char(20) NOT NULL,
  `email` char(40) NOT NULL,
  `luogo_prestito` char(60) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazioni_e_prestiti`
--

INSERT INTO `prenotazioni_e_prestiti` (`cod_prestito`, `nome`, `cognome`, `email`, `luogo_prestito`, `id_documento`, `data`) VALUES
(1, 'Nicolo', 'Provenzano', 'provenzano@gmail.com', 'Venezia', 6, '2021-05-03'),
(2, 'Simone', 'Scavezzon', 'scavezzon@gmail.com', 'Mestre', 4, '2021-05-31'),
(3, 'Dario', 'Tonetti', 'dario@gmail.com', 'Venezia', 5, '2021-05-30');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `nome` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tag`
--

INSERT INTO `tag` (`nome`) VALUES
('curiosità'),
('letteratura'),
('WW1'),
('WW2');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_documenti`
--

CREATE TABLE `tag_documenti` (
  `nome_tag` char(30) NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `archivio`
--
ALTER TABLE `archivio`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indici per le tabelle `documento_analogico`
--
ALTER TABLE `documento_analogico`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indici per le tabelle `documento_digitale`
--
ALTER TABLE `documento_digitale`
  ADD PRIMARY KEY (`id_documento`),
  ADD UNIQUE KEY `URL` (`URL`);

--
-- Indici per le tabelle `manutentore`
--
ALTER TABLE `manutentore`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `operazione`
--
ALTER TABLE `operazione`
  ADD PRIMARY KEY (`numero_protocollo`);

--
-- Indici per le tabelle `prenotazioni_e_prestiti`
--
ALTER TABLE `prenotazioni_e_prestiti`
  ADD PRIMARY KEY (`cod_prestito`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `tag_documenti`
--
ALTER TABLE `tag_documenti`
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `nome_tag` (`nome_tag`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `documento_analogico`
--
ALTER TABLE `documento_analogico`
  ADD CONSTRAINT `documento_analogico_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `archivio` (`id_documento`) ON DELETE CASCADE;

--
-- Limiti per la tabella `documento_digitale`
--
ALTER TABLE `documento_digitale`
  ADD CONSTRAINT `documento_digitale_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `archivio` (`id_documento`);

--
-- Limiti per la tabella `tag_documenti`
--
ALTER TABLE `tag_documenti`
  ADD CONSTRAINT `tag_documenti_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `archivio` (`id_documento`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_documenti_ibfk_2` FOREIGN KEY (`nome_tag`) REFERENCES `tag` (`nome`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
