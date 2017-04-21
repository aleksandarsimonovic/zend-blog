-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 11:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zend_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image_name` varchar(55) NOT NULL,
  `date` datetime DEFAULT NULL,
  `category` varchar(55) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `subject`, `body`, `image_name`, `date`, `category`, `tags`) VALUES
(12, 'Firefox počeo da pravi telefone sa svojim operativnim sistemom', '<p>Pametni telefoni su prava senzacija. Kako svi pokusavaju da izvuku zaradu od tog trenda, tako se i Firefox ume&scaron;ao u tu priču, po&scaron;to njihov pretraživač nije vi&scaron;e na vrhuncu slave. Naime, uskoro će svetlost dana ugledati prva generacija telefona koji će raditi sa Firefox-ovim OS-om baziranim na HTML 5 platformi. Nosiće nazive Keon i Peak, a proizvodiće ih &scaron;panska kompanija GeeksPhone. Za kupovinu će biti dostupni u online prodavnici pomenute &scaron;panske firme.<br />\r\nGeeksPhone je zvanično potvrdio i cene ova dva smartphone-a, koje će definitivno biti među najnižima na trži&scaron;tu.</p>\r\n\r\n<p>Model Keon biće opremljen 3.5-inch HVGA ekranom, 1GHz single-core procesorom, imaće 512MB RAM-a i 4GB interne memorije, a ko&scaron;taće samo 91 evro. Jači model Peak imaće jo&scaron; zavidnije performanse, 4.3-inčni qHD IPS ekran, 1,2GHz dual-core procesor, 512MB RAM-a, 4GB interne memorije i 8MP kameru, a ko&scaron;taće zaista skromnih 149 evra. Kakvu će prođu na tiži&scaron;tu imati ove novajlije, vreme će pokazati.</p>\r\n', 'firefox-os.png', '2017-01-28 05:04:47', 'Vesti', 'Firefox, FireOs'),
(13, 'Google predstavio Chrome OS računar', '<p>Google je predstavio svoj lični Chrome OS računar, koji se veoma razlikuje od dosada&scaron;njih Chrome OS računara koji su bili vrno ograničenih mogućnosti, a koje je Google radio i saradnji sa partnerskim kompanijama.&nbsp;Chromebook Pixel kako su ga nazvali najskuplji je i najnapredniji računar koji radi na Chrome OS. Chromebook Pixel pokreće dvojezgarni Core i5 [&hellip;]</p>\r\n', 'Chromebook-Pixel-210x130.jpg', '2016-01-20 18:12:31', 'Vesti', 'Google, Chrome OS'),
(16, 'WhatsApp postaje besplatan za sve - ukida naplatu od 0,99$ godišnje', '<p>Jan Koum, generalni izvr&scaron;ni direktor WhatsApp-a, aplikacije za razmenu poruka koja je u Facebook-ovom vlasni&scaron;tvu, govorio je juče na DLD konferenciji u M&uuml;nchenu. U svom je govoru najavio da će WhatsApp uskoro krenuti s novim načinima finansiranja svog poslovanja, pa su u skladu s tim juče ukinuti naplatu mobilne aplikacije. Do sada su korisnici mogli ovu aplikaciju koristiti godinu dana besplatno, da bi im se nakon toga svaka sledeća godina naplaćivala 0,99 američkih dolara.<br />\r\n<br />\r\nNa ovaj potez su se odlučili kako bi svoju uslugu približili jo&scaron; većem broju korisnika, pogotovo onima koji ne poseduju kreditne kartice. Ako žele da budu način komuniciranja za mase, shvatili su, moraju biti potpuno besplatni &ndash; ba&scaron; kao i njihova konkurencija.<br />\r\n<br />\r\nManjak prihoda od godi&scaron;nje pretplate WhatsApp planira namaknuti iz drugih usluga, pogotovo od poslovnih korisnika, za koje će razviti posebne usluge. Ali, to ne znači da će obični korisnici unutar svoje aplikacije videti oglase raznih kompanija. WhatsApp će i dalje biti &quot;čist&quot; od reklama, obećao je Koum.</p>\r\n', '1234.jpg', '2016-11-18 05:20:57', 'Vesti', 'Whats app'),
(17, 'Zotac predstavio GeForce GTX 970 Extreme Edition OC grafičku karticu', '<p>Segment grafičkih kartica visoke klase je u&scaron;ao u stagnaciju, a oni koji i dalje čekaju dual-GPU modele će morati da sačekaju jo&scaron; nekoliko nedelja. Dok se očekuje nova generacija FinFET GPU-ova, neke kompanije i dalje objavljuju novitete. Kompanija Zotac danas je predstavila svoj novi model koji nosi naziv GeForce GTX 970 Extreme Edition OC. Model je baziran na trenutno najpopularnijoj grafičkoj kartici na trži&scaron;tu.</p>\r\n\r\n<p>GeForce GTX 970 ima 1664 CUDA jezgara, 4 GB GDDR5 memorije uz 256-bitni interfejs. Zotac-ovo re&scaron;enje je fabrički overklokovano na 1203/1335 MHz dok memorija radi na 7200 MHz. Sve to zahvaljujući prilagođenoj &scaron;tampanoj ploči koja je opremljena sa 8+2-faznim VRM i dva 8-pinska konektora. TDP rejting je deklarisan na 155W, &scaron;to je&nbsp;ne&scaron;to vi&scaron;e od referentnog dizajna. Zotac trenutno prima prednarudžbe za novu karticu po ceni od 425 dolara.</p>\r\n', 'zotac-gtx970.jpg', '2017-04-16 21:07:10', 'Vesti', 'Zotac. GeForce, GTX 970'),
(28, 'Samsung će vratiti Note 7 u prodaju?', '<p>Korejski Samsung pretrpeo je značajne finansijske gubitke i doživeo veliki udarac za svoj ugled i kredibilitet, kada je zbog ponovnih slučajeva samozapaljenja bio prisiljen s trži&scaron;ta povući najnoviji flagship mobitel, Galaxy Note 7. O tom slučaju se naveliko pisalo ove jeseni, da bi na kraju Note 7 oti&scaron;ao u istoriju 11. oktobru kada je poslato obave&scaron;tenje o povlačenju.<br />\r\n<br />\r\nAli, kako sada navodi južnokorejski portal&nbsp;<a href=\"http://www.theinvestor.co.kr/view.php?ud=20160926000417\" target=\"_blank\">The Investor</a>, izvori bliski Samsung-u govore da bi se Galaxy Note 7 ipak mogao vratiti na trži&scaron;te tokom 2017. godine. Stotine hiljada ispravnih uređaja koji su zamenjeni za druge modele i vraćeni u fabriku Samsung-u je očito žao da uni&scaron;te, pa razmatraju pokretanje procesa njihove obnove.<br />\r\n<br />\r\nTako bi se Galaxy Note 7 u prodaji mogao naći sledeće godine, po sniženoj ceni i s oznakom &quot;refurbished&quot;. Moguće je i da ih Samsung ponudi samo na nekim trži&scaron;tima u razvoju, poput Vijetnama ili Indije. Konačna službena odluka o tome ipak jo&scaron; nije doneta.</p>\r\n', '12.jpg', '2016-11-18 04:26:40', 'Vesti', 'Mobile, Widgets, Samsung, Note 7');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `category` varchar(55) NOT NULL,
  `cat_desc` mediumtext NOT NULL,
  `category_tags` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `category`, `cat_desc`, `category_tags`) VALUES
(1, 'Vesti', '<p>Najnovije vesti iz IT sveta, zanimljivosti iz sveta tehnike i tehnologije.</p>\r\n', 'IT vesti, zanimljivosti, novosti');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `comment` text NOT NULL,
  `id_article` int(11) NOT NULL,
  `submited_on` datetime NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribers`
--

CREATE TABLE `email_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_subscribers`
--

INSERT INTO `email_subscribers` (`id`, `email`, `date`) VALUES
(1, 'aleksandarsimonovic@live.com', '2016-01-20 02:41:40'),
(2, 'a.simonovic.viser.edu.rs@gmail.com', '2016-01-21 05:21:58'),
(3, 'peraperic@live.com', '2016-10-16 02:41:19'),
(4, 'proba@live.com', '2016-11-18 05:49:06'),
(5, 'perica@live.com', '2016-11-20 05:19:36'),
(6, 'aleksandar@live.com', '2017-01-28 04:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `id_article`, `image_name`, `image_path`) VALUES
(1, 0, '1123.jpg', '/opt/lampp/temp/1123.jpg'),
(2, 0, '1123.jpg', '/opt/lampp/temp/1123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `salt` varchar(55) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(55) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role` varchar(55) NOT NULL,
  `registration_date` datetime NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salt`, `username`, `password`, `first_name`, `last_name`, `email`, `phone_number`, `role`, `registration_date`, `last_access`) VALUES
(1, '649f6a3aa2ab2225deb45ed7dcf7435d2e90ee47', 'admin', 'd222f5711d832d8b48fe557d92b7af477bb61916', 'Aleksandar', 'Simonovic', 'aleksandarsimonovic@live.com', 640112381, 'administrator', '2016-10-19 04:07:36', '2017-04-16 22:58:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
