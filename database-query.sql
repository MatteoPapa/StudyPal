-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2022 alle 16:01
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `studypaldb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annunci`
--

CREATE TABLE `annunci` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `luogo` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `orario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `annunci`
--

INSERT INTO `annunci` (`id`, `username`, `genere`, `luogo`, `descrizione`, `data`, `orario`) VALUES
(3, 'Matthew', 'maschio', 'Aula 33 ', 'Ripasserò Algebra Lineare', '2022-06-02', '11:00:00'),
(4, 'Claudia', 'femmina', 'Biblioteca dell\'edificio Marco Polo, Sapienza', 'Studierò Basi di Dati', '2022-06-01', '11:15:00'),
(5, 'Ilaria', 'femmina', 'Biblioteca Civica Centrale, Torino', 'Mi preparerò per l\'esame di sociologia', '2022-06-05', '17:30:00'),
(6, 'Giuseppe', 'maschio', 'Aula 15 Laboratorio di Informatica Sapienza', 'Studierò medicina, in particolar modo anatomia', '2022-06-07', '15:00:00'),
(10, 'Fabio', 'maschio', 'Laboratorio di Disegno Tecnico', 'Dovrò ridisegnare alcune tavole di disegno tecnico', '2022-06-11', '17:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `idannuncio` int(20) NOT NULL,
  `liker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`id`, `idannuncio`, `liker`) VALUES
(65, 1, 'Ilaria'),
(92, 3, 'Davide'),
(70, 3, 'Giuseppe'),
(66, 3, 'Ilaria'),
(88, 4, 'Fabio'),
(67, 4, 'Ilaria'),
(68, 5, 'Giuseppe'),
(91, 5, 'Nora'),
(87, 6, 'Fabio'),
(90, 10, 'Giuseppe');

-- --------------------------------------------------------

--
-- Struttura della tabella `profile`
--

CREATE TABLE `profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `studente` varchar(50) NOT NULL,
  `facolta` varchar(70) NOT NULL,
  `biografia` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `profile`
--

INSERT INTO `profile` (`id`, `username`, `email`, `genere`, `studente`, `facolta`, `biografia`, `nome`, `cognome`, `picture`) VALUES
(2, 'Matthew', 'matteo.papa@icloud.com', 'maschio', 'universitario', 'Ingegneria Informatica', 'Ciao ! Mi chiamo Matteo e abito a Roma.\r\nStudio alla Sapienza e sono al terzo anno.\r\nContattami per essere il mio StudyPal !', 'Matteo', 'Papa', 'Matthewpic.jpg'),
(3, 'Claudia', 'claudia.coletta@gmail.com', 'femmina', 'universitario', 'Ingegneria Informatica', 'Ciao sono Claudia e sto al terzo anno di Ingegneria alla Sapienza !', 'Claudia', 'Coletta', 'Claudiapic.jpg'),
(4, 'Nora', 'nora.salvini@icloud.com', 'femmina', 'universitario', 'Medicina e Chirurgia', 'Vivo a Milano in qualità di fuorisede. Aspiro a diventare pediatra perché adoro i bambini.', 'Nora', 'Cortesi', 'Norapic.jpg'),
(8, 'Fabio', 'fabio@icloud.com', 'maschio', 'liceale', 'Liceo Artistico', 'Il mio nome è Fabio e adoro disegnare.\r\nSono particolarmente interessato al design e alla moda.', 'Fabio', 'Verdi', 'Fabiopic.jpg'),
(9, 'Giulia', 'giulia@icloud.com', 'femmina', 'liceale', 'Liceo Scientifico', 'Frequento il liceo scientifico e adoro la matematica.', 'Giulia', 'Rossi', 'Giuliapic.jpg'),
(10, 'Giorgia', 'giorgia@icloud.com', 'femmina', 'liceale', 'Liceo Artistico', 'Il mio hobby preferito è dipingere.\r\nSono una grande appassionata di storia dell\'arte.', 'Giorgia', 'Bianchi', 'Giorgiapic.jpg'),
(13, 'Giuseppe', 'giu@gmail.com', 'maschio', 'universitario', 'Psicologia', 'Nato a Catanzaro, ora vivo a Roma.\r\nCerco un compagno di studi.', 'Giuseppe', 'Paoli', 'Giuseppepic.jpg'),
(14, 'Martina', 'martina@gmail.com', 'femmina', 'universitario', 'Design o Design e Arti', 'Mi chiamo Martina e adoro l\'arte.\r\nSono socievole, tranquilla e ben organizzata.', 'Martina', 'Stella', 'Martinapic.jpg'),
(15, 'Ilaria', 'ilaria@gmail.com', 'femmina', 'universitario', 'Psicologia', 'Nata a Bassano, vivo a Roma come studentessa della Sapienza.', 'Ilaria', 'Fontana', 'Ilariapic.jpg'),
(16, 'Carlos', 'carlos@gmail.com', 'maschio', 'universitario', 'Lingue e Letterature Straniere', 'Sono nato a Barcellona, ora studio all\'università di Roma Tre.', 'Carlos', 'Garcia', 'Carlospic.jpg'),
(17, 'Luigi', 'luigi@gmail.com', 'maschio', 'liceale', 'Liceo Linguistico', 'Adoro viaggiare e ho deciso di imparare le lingue per poterlo fare più agevolmente.', 'Luigi', 'Romano', 'Luigipic.jpg'),
(18, 'Davide', 'davide@gmail.com', 'maschio', 'universitario', 'Architettura', 'Il mio sogno più grande è di progettare un grattacielo.\r\nStudio per riuscirci, un giorno !', 'Davide', 'Costa', 'Davidepic.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Matthew', 'matteo.papa@icloud.com', '$2y$10$5d9orqJNk5.erkGOJLaNBuQzhh5t7QxaPtyD/Jjr76FsqQjQ9gYb2'),
(2, 'Claudia', 'claudia.coletta@gmail.com', '$2y$10$ju67yclC4crCSzVAoXW1NePe6rFFvAdB7wIaWiUEVYnDkwLc4/Mii'),
(3, 'Nora', 'nora.salvini@icloud.com', '$2y$10$46QwDfxULTCCnd0pQuBkNO/VydFu7nNstPtMIVSHU10aGLXCoCiru'),
(6, 'Mat', 'mat@gmail.com', '$2y$10$GyKaRtEQ5UXrYqPA1vkJpeKZaFfjLQKhIyEWLBTAjb6hfH5REAOmW'),
(7, 'Fabio', 'fabio@icloud.com', '$2y$10$13BI1Gf/UZUyDtbh5t7KgOCO4a6/tF6kO5o4nykX0DTn5/KZ2a1eK'),
(8, 'Giulia', 'giulia@icloud.com', '$2y$10$MCg9LZy/jt3H6JAFTVbSXulFlpjAYeQVuyXsVQSQ01BE/LeRLzbwW'),
(9, 'Giorgia', 'giorgia@icloud.com', '$2y$10$i492DjNYiFq0AmYUx752q.EW36Dz1KfF8T6znS.D4Wo1vacp2hjCa'),
(10, 'Edoardo', 'edo@icloud.com', '$2y$10$gV.EhtKMR4v.I8aO9MQdyuUkBJpHu3tGX2eQ7h7bM4gX4DQuJTZf.'),
(11, 'Edo', 'edo@gmail.com', '$2y$10$KNAOmMz5cMqBHeJ2neY4COJhdtBmCtOuMTI316qHQcnfnfKkZ.IOK'),
(12, 'Giuseppe', 'giu@gmail.com', '$2y$10$JztqtGyMI5dJ8THz.Wfrbu5N8mlr6tuf7dlg3kg209566qB57ZVoq'),
(13, 'Martina', 'martina@gmail.com', '$2y$10$2iFQ9v0IB2HesLIW5gTKWOM8Bt5.4juT7bGfnh4kmfDAnckLBbhDm'),
(14, 'Ilaria', 'ilaria@gmail.com', '$2y$10$cRRDY3qzr269TuWFNei1dei2F3qO8Ld5Zs2fgxwIXSoYnxMiDZ0Da'),
(15, 'Carlos', 'carlos@gmail.com', '$2y$10$G1TjvSl1PykYx1pdCMNjRuACbVn7pUg7Un4XiwRCnCoPM7TAGIXbe'),
(16, 'Luigi', 'luigi@gmail.com', '$2y$10$GBAFsuSoCcRIyAbJ8jRn.uBZpfvjzeClywzuv.4wkYRcW8BE2.CLC'),
(17, 'Davide', 'davide@gmail.com', '$2y$10$ETx0WHtV.DHZSn0WSQMcnuoKUqjPVo2WbrmBKh0pUTfPxLATQKKoa');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annunci`
--
ALTER TABLE `annunci`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idannuncio` (`idannuncio`,`liker`);

--
-- Indici per le tabelle `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `annunci`
--
ALTER TABLE `annunci`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT per la tabella `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;
