-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 Jan 2015 om 16:58
-- Serverversie: 5.1.44
-- PHP-Versie: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `periodeopdracht2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_users` int(11) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `is_done` int(11) NOT NULL DEFAULT '0' COMMENT '0=bezig;1=done',
  `is_archived` int(11) NOT NULL DEFAULT '0' COMMENT '1=verwijderd',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Gegevens worden uitgevoerd voor tabel `todos`
--

INSERT INTO `todos` (`ID`, `FK_users`, `omschrijving`, `is_done`, `is_archived`) VALUES
(1, 19, 'tets', 1, 1),
(2, 19, 'test2', 1, 1),
(3, 19, 'test done', 1, 1),
(4, 19, 'test', 1, 1),
(5, 19, 'test', 1, 1),
(6, 19, 'test', 1, 1),
(7, 19, 'test', 1, 1),
(8, 23, 'test', 1, 1),
(9, 23, 'test 10', 1, 1),
(10, 23, 'test11', 1, 1),
(11, 23, 'testestest', 1, 1),
(12, 23, 'test', 1, 1),
(13, 23, 'teaeztazeta', 1, 1),
(14, 23, 'test', 1, 0),
(15, 23, 'test', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Gegevens worden uitgevoerd voor tabel `Users`
--

INSERT INTO `Users` (`ID`, `email`, `salt`, `hashed_password`) VALUES
(4, 'jonasvanreeth@hotmail.com', '72546796154bd18f84d01b0.36220200', '7281cdef8349c8d0efeed703d1b6d21c9e930d281a19ed2fbb41946dab1e9698b85ccff20e56ff354ce57ccc7d3fba7f522b12dea5d8ff1ad723f4427908b01a'),
(3, 'jonasvanreeth@gmail.com', '149078943254bd18b78e0523.53194010', 'dcd32a7644fc075ce52d4626c289885d28f11d3fa3f57ec584e0686c280de5ca6dc84b471683480688a2d928d9d122cd1f708c536032acac90465a0e5861f380'),
(5, 'test@gmail.com', '128809225354bd1fbdce3144.33887354', '04a789f3f8fed15b8d6c8ea780e38db6fdb4d8e16046336c54b1904f825f9b5de479b93b08ec6ab4dc51e548e54860819d6c0b5256c3c6de0965dfe389ea9f7f'),
(6, 'test3@gmail.com', '116005041954bd20345144f4.77806912', '0402c6f9b8eb4d5871d66af261527724bb6e34cd1265df848aa34c8e096df784e38118da62684671a5c0afd3e1ce294822dd844b03a760ff4e581c7ca66a52e5'),
(7, 'tst@gmail.com', '97140516254bd205e664647.40279091', '3257f022a4f454c524977b405d962a48181468a0b0c3cb78fc01c1a8f51d62c4fa1780b25acf6fb43fb5cce682602307ab1d5be32fa1435adc1dc2c8a15e3ebe'),
(8, 'test5@gmail.com', '171921190054bd20aa746fe0.83901211', 'aa5508bd1a7a90e890a2b19b59ba9bcdec3ca475961ea78e3f1fcd71172a8ca053c52b269e02cbaf997763a7ecc3d7fa4e8a3ea2f6793998c7c60ec78e75b73c'),
(9, 'test6@gmail.com', '64550065754bd21f1ddb123.25696514', 'ffc9d0c7cb18e1c1736fa84ee019698d7293e6c45d32c660b745d3d1c8cb295105dbd4dd48ac86bd14a1dbcbb83417cd2347a37732a050af49834645ab228dad'),
(10, 'test8@gmail.com', '90469192354bd2234978c01.96438969', 'b89378ffbe3c8b6b441fdf40b6c54ab283f7e5c1d404e19fc31c8a4f74bb5a3fe8a1b6816e619ff9be340cec254b0937deda65bb3242209aa9ae19a756d72534'),
(11, 'test10@gmail.com', '211746403854bd227e95d482.61560238', '9e07b9ef6b4d3975fc4df6909075dfe9a66e2fca8d876f3c70f97546ef9383352318f68e2e1002ca01302e80372c0a2a1b3278962c2b17f64b85b7b3840a0a47'),
(12, 'test11@gmail.com', '96247549154bd22ad2a64e2.04098554', '448ad154c832863c6d6fbb86a63fdc4b93875ecbba7b678ce27aa2049176603572a9ff032e2ec3a6b8992d53e333e7574807d760d0b2291c27b10b013f71ff0b'),
(13, 'test12@gmail.com', '23844509254bd22d85f76d0.28613470', 'f8f227bdd7e726e40ce35589925d1805da7e6090fb737da65b70b6d81ec8623778c45744942cce20c9fa605804e115a431149933dd3b8f20e4dcb3cf77a2b9d6'),
(14, 'test13@gmail.com', '43032284954bd22eea67110.84314714', '5b4629f12e4797d0f28629df3d31ae3e8d3be2e63c8f8ece519b75dd61712692338bc89329cc845310e1cbce7429381e08a43a0c0fe0381176897c73f7dbb724'),
(15, 'test14@gmail.com', '15643525454bd232b503812.01423796', '6f97eee93875dfa057b2df98e18a6a613f28bf146f1a7ce98df834d8ab746c9b44b552768ab145742cd0193171253ef94acff23dbdf812a48e0963be007ae020'),
(16, 'test15@gmail.com', '83362183854bd233ff1c7b5.03173836', '846be67719c14424b60dc457c75a53e2a11dea00d161a5134fa7592aa73076e40bfdf93bb92c5dc9ed5fcd3d04f20c5c27226f0196312c905e1778860e4aa765'),
(17, 'test16@gmail.com', '100163800954bd234f263a06.01219745', '94466f18b8d6fbc4918ff835a91874029db1c005a94d2cc1facf0df365c400aa52dbf67b066b3f3c9b6098a5dd8132648b211e53941e6e1d3d62f0d9bd4a3b0b'),
(18, 'test17@gmail.com', '88500173754bd2389d04a53.34530012', 'c19873591c02b46cb511036e524618222a419ff236166483afec787b82716b76adedfe82fc3e7894cd035f5fc1ddf5c125df5c6425421fd2ca95d1a70ca25cb3'),
(19, 'test25@gmail.com', '68427828854bd6d4e7305b3.08202796', '7666a27a426bd3961cdeefcdcf5ab3a870078528fbc6b90ec02581a8060068a41dccb5c178b3fdfd7dabf13170131b5dcad7f5e95c8dd4d2ecfcb04665cfa500'),
(20, 'test21@gmail.com', '136807956654be762a0d5dd6.91636575', '0e4d1ef7922b1304b7ebdb72c96c44a66e13426eef38d307d5ce75aa3f43bca31176768d0a100b1111561dab5e774a889a09ccc2cdc47f062b34c3362d9a3892'),
(21, 'test22@gmail.com', '171060172754be7651606683.76446143', 'bc5daf5f7030b12831be28fe649db84048310be4fe92e7945f30bda87ac55456362ac3d1b6689854f60616a5163aa3e1bd9a60d5e6238c2b418a356fe9195d7f'),
(22, 'test23@gmail.com', '73606000254be76779a94c6.81966594', '37349d2e3287f53f0dad5bdd032fb435e3422141cc4c6472dedebe57c2425b870a8352e95d6df565abb70172ce8e28df6999f2f00f7870f409f7bb1d289c4bb5'),
(23, 'test24@gmail.com', '53479130654be769b1ffab4.65718850', '1e2854c8dee201350a6b92db4aee97c512c09156543ae60fb6b26029dca3f4d37e3379264273ebbd0e503afc8a90cde1676ec9b38ed6977b3a952fc9028d905a');
