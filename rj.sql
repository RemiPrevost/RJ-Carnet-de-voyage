-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2014 at 04:43 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rj`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `titre_lieux` text NOT NULL,
  `adresse_lieux` text NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date`, `titre_lieux`, `adresse_lieux`, `titre`, `texte`) VALUES
(1, '2014-07-17', 'Rio de Janeiro', 'https://www.google.fr/maps/place/Rio+de+Janeiro,+%C3%89tat+de+Rio+de+Janeiro,+Br%C3%A9sil/@-22.9156912,-43.449703,11z/data=!3m1!4b1!4m2!3m1!1s0x997efe4224b50b:0xf988253c846c59ee', 'Sejam Bem-vindos !', 'Voici un petit site web crée de mes propres mains\n							spécialement pour vous !<br />\n							Comme vous le savez sûrement, je suis acteullement\n							en semestre d''étude à Rio de Janeiro, au Brésil.<br />\n							L''objetif de ce site est très simple: partager avec\n							vous mes découvertes de ce merveilleux pays et cette ville magnifique.<br />\n							Je publierai des messages sur le site le plus souvent possible.\n							Pour consulter mes publications, cliquez sur un des liens du volet\n							de gauche.<br />\n							N''hésitez pas à me faire part de vos commentaires à propos de ce\n							site ou à me poser des questions sur mon séjour par mail à l''adresse \n							prevost-r@hotmail.com, je me ferai un plaisir d''y répondre !'),
(2, '2014-07-21', 'Rio de Janeiro, Lagoa Rodrigo de Freitas', 'https://www.google.fr/maps/place/Lagoa+Rodrigo+de+Freitas,+Rio+de+Janeiro+-+%C3%89tat+de+Rio+de+Janeiro,+Br%C3%A9sil/@-22.9713906,-43.2053308,14z/data=!4m2!3m1!1s0x9bd574afbc853f:0x20a26959ca6918cd', 'Lagoa Rodrigo de Freitas', 'Commentaire sur le Lagoa'),
(3, '2014-08-10', 'Rio de Janeiro, Corcovado', 'https://www.google.fr/maps/place/Corcovado/@-22.9429968,-43.2143128,13z/data=!4m2!3m1!1s0x997e2bc2331757:0x2a060bea445d622c', 'Pain de Sucre vu depuis le Corcovado', 'Voici le fameux Pain de Sucre dit "Pão de Açúcar" vu depuis le Corcovado.'),
(4, '2014-08-28', 'Buzios', '', 'Week-end à Buzios', 'Commentaire Buzios'),
(5, '2014-09-02', 'Rio de Janeiro, Vidigal', 'https://www.google.com.br/maps/place/Vidigal,+Rio+de+Janeiro+-+RJ/@-22.9942061,-43.2410875,15z/data=!4m2!3m1!1s0x9bd424ad5308c5:0x81aacb05f5bacf62', 'Vidigal', 'Commentaire sur VIDIGAL'),
(6, '2014-09-02', 'Rio de Janeiro, Os Dois Irmãos', '', 'Os Dois Irmãos', 'Commentaire sur Os Dois Irmãos'),
(7, '2014-09-06', 'Rio de Janeiro, Centro', '', 'Bairro Centro', 'Commentaire sur Centro'),
(8, '2014-09-14', 'Rio de Janeiro, Pedra da Gavea', 'https://www.google.fr/maps/place/Pedra+da+G%C3%A1vea+-+Parque+Nacional+da+Tijuca+-+S%C3%A3o+Conrado,+Rio+de+Janeiro+-+%C3%89tat+de+Rio+de+Janeiro,+Br%C3%A9sil/@-22.9940454,-43.2665807,14z/data=!4m2!3m1!1s0x9bd6d13e950037:0x2c49dc1b12837f3f', 'Pedra da Gavea', 'Visite à Pedra da Gavea'),
(9, '2014-09-17', 'Rio de Janeiro, Praia de Copacabana', '', 'Petit foot sur Copa', 'Commentaire sur event');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `chemin` varchar(255) NOT NULL,
  `id_linked` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  PRIMARY KEY (`chemin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`chemin`, `id_linked`, `main`) VALUES
('10350345_10203855749807070_7552782389824012083_n.jpg', 8, 0),
('10485403_667036896717779_2023176632286021186_o.jpg', 3, 0),
('10485408_10205082619248450_8510886160065799897_o.jpg', 8, 0),
('10517352_10205082615088346_5680299366956674339_o.jpg', 8, 0),
('10531438_667037260051076_6103020110510194124_o.jpg', 3, 0),
('10535670_667036783384457_1766702200382550729_o.jpg', 3, 0),
('10562518_667036973384438_8286220240704442783_o.jpg', 3, 0),
('10582818_10205041595782889_3050268279557395572_o.jpg', 9, 0),
('10623368_10205082613008294_3565517302286911233_o.jpg', 8, 0),
('10623431_10205082616008369_8118943725032076564_o.jpg', 8, 0),
('10628310_10203855746886997_4186231496426850448_n.jpg', 8, 0),
('10635796_10203855750607090_6354827424810939481_n.jpg', 8, 0),
('10645040_10203855748487037_7902000063247328629_n.jpg', 8, 0),
('10653397_10203855747927023_4022087416633979441_n.jpg', 8, 0),
('10661773_336012996565422_8891288301956135475_o.jpg', 4, 1),
('10662011_10205082617528407_4131072999407725236_o.jpg', 8, 1),
('10669005_10205041587222675_2476987027363224660_o.jpg', 9, 0),
('10688035_10205041630903767_1775833278586800830_o.jpg', 9, 1),
('10698663_10203855746966999_7160077393317023619_n.jpg', 8, 0),
('10701961_10203855749687067_9090753294704002244_n.jpg', 8, 0),
('10712767_10203855748647041_454435903433674183_n.jpg', 8, 0),
('1540364_10205041623063571_3486210003430757705_o.jpg', 9, 0),
('1941472_667037266717742_950286103464010497_o.jpg', 3, 0),
('corco_welcome.jpg', 1, 1),
('P8100038.JPG', 2, 0),
('P8100039.JPG', 2, 0),
('P8100040.JPG', 2, 1),
('P8100041.JPG', 2, 0),
('P8100042.JPG', 2, 0),
('P8100045.JPG', 2, 0),
('P8100046.JPG', 2, 0),
('P8100047.JPG', 2, 0),
('P8100048.JPG', 2, 0),
('P8100068.JPG', 3, 0),
('P8100069.JPG', 3, 0),
('P8100070.JPG', 3, 0),
('P8100072.JPG', 3, 0),
('P8100074.JPG', 3, 0),
('P8100075.JPG', 3, 0),
('P8100076.JPG', 3, 0),
('P8100077.JPG', 3, 0),
('P8100081.JPG', 3, 0),
('P8100082.JPG', 3, 0),
('P8100085.JPG', 3, 0),
('P8100088.JPG', 3, 0),
('P8100089.JPG', 3, 0),
('P8100092.JPG', 3, 0),
('P8100095.JPG', 3, 0),
('P8100097.JPG', 3, 0),
('P8100098.JPG', 3, 0),
('P8100099.JPG', 3, 0),
('P8100100.JPG', 3, 0),
('P8100101.JPG', 3, 0),
('P8100102.JPG', 3, 0),
('P8100103.JPG', 3, 0),
('P8100107.JPG', 3, 0),
('P8100119.JPG', 3, 0),
('P8100121.JPG', 3, 0),
('P8100122.JPG', 3, 1),
('P8100123.JPG', 3, 0),
('P8100126.JPG', 3, 0),
('P8100127.JPG', 3, 0),
('P8100128.JPG', 3, 0),
('P8100129.JPG', 3, 0),
('P8100132.JPG', 3, 0),
('P8100133.JPG', 3, 0),
('P8100136.JPG', 3, 0),
('P8100147.JPG', 3, 0),
('P8100153.JPG', 3, 0),
('P8100156.JPG', 3, 0),
('P8100178.JPG', 3, 0),
('P8100179.JPG', 3, 0),
('P8100183.JPG', 3, 0),
('P8160203.JPG', 5, 0),
('P8170227.JPG', 5, 0),
('P8170228.JPG', 5, 0),
('P8170229.JPG', 5, 0),
('P8170230.JPG', 5, 0),
('P8170231.JPG', 5, 0),
('P8170232.JPG', 5, 0),
('P8170233.JPG', 5, 0),
('P8170235.JPG', 5, 0),
('P8170237.JPG', 5, 0),
('P8170239.JPG', 5, 0),
('P8170240.JPG', 5, 0),
('P8170243.JPG', 5, 1),
('P8170253.JPG', 5, 0),
('P8170256.JPG', 5, 0),
('P8170259.JPG', 5, 0),
('P8170261.JPG', 5, 0),
('P8170263.JPG', 5, 0),
('P8170264.JPG', 5, 0),
('P8170265.JPG', 5, 0),
('P8170273.JPG', 5, 0),
('P8170275.JPG', 5, 0),
('P8170276.JPG', 5, 0),
('P8170295.JPG', 5, 0),
('P8170297.JPG', 5, 0),
('P8170301.JPG', 5, 0),
('P8170305.JPG', 5, 0),
('P8170306.JPG', 5, 0),
('P8230007.JPG', 6, 0),
('P8230008.JPG', 6, 0),
('P8230010.JPG', 6, 0),
('P8230012.JPG', 6, 0),
('P8230013.JPG', 6, 0),
('P8230021.JPG', 6, 0),
('P8230022.JPG', 6, 0),
('P8230028.JPG', 6, 0),
('P8230029.JPG', 6, 0),
('P8230032.JPG', 6, 0),
('P8230037.JPG', 6, 0),
('P8230038.JPG', 6, 0),
('P8230039.JPG', 6, 0),
('P8230040.JPG', 6, 0),
('P8230044.JPG', 6, 0),
('P8230046.JPG', 6, 0),
('P8230047.JPG', 6, 0),
('P8230050.JPG', 6, 0),
('P8230053.JPG', 6, 0),
('P8230057.JPG', 6, 0),
('P8230060.JPG', 6, 0),
('P8230074.JPG', 6, 0),
('P8230082.JPG', 6, 0),
('P8230110.JPG', 6, 1),
('P8230114.JPG', 6, 0),
('P8230129.JPG', 6, 0),
('P8230138.JPG', 6, 0),
('P8230141.JPG', 6, 0),
('P8230146.JPG', 6, 0),
('P8290179.JPG', 4, 0),
('P8290182.JPG', 4, 0),
('P8290184.JPG', 4, 0),
('P8290185.JPG', 4, 0),
('P8290186.JPG', 4, 0),
('P8300204.JPG', 4, 0),
('P8300207.JPG', 4, 0),
('P8300209.JPG', 4, 0),
('P8300211.JPG', 4, 0),
('P8300213.JPG', 4, 0),
('P8300215.JPG', 4, 0),
('P8300216.JPG', 4, 0),
('P8300218.JPG', 4, 0),
('P8310227.JPG', 4, 0),
('P8310234.JPG', 4, 0),
('P8310236.JPG', 4, 0),
('P8310238.JPG', 4, 0),
('P8310240.JPG', 4, 0),
('P8310241.JPG', 4, 0),
('P8310244.JPG', 4, 0),
('P8310245.JPG', 4, 0),
('P9060269.JPG', 7, 0),
('P9060270.JPG', 7, 0),
('P9060275.JPG', 7, 0),
('P9060277.JPG', 7, 0),
('P9060279.JPG', 7, 0),
('P9060283.JPG', 7, 0),
('P9060286.JPG', 7, 0),
('P9060288.JPG', 7, 0),
('P9060289.JPG', 7, 0),
('P9060290.JPG', 7, 0),
('P9060291.JPG', 7, 0),
('P9060292.JPG', 7, 0),
('P9060294.JPG', 7, 0),
('P9060296.JPG', 7, 0),
('P9060300.JPG', 7, 0),
('P9060301.JPG', 7, 0),
('P9060303.JPG', 7, 0),
('P9060305.JPG', 7, 0),
('P9060306.JPG', 7, 0),
('P9060308.JPG', 7, 0),
('P9060309.JPG', 7, 0),
('P9060311.JPG', 7, 0),
('P9060313.JPG', 7, 0),
('P9060318.JPG', 7, 0),
('P9060321.JPG', 7, 0),
('P9060323.JPG', 7, 0),
('P9060326.JPG', 7, 0),
('P9060330.JPG', 7, 0),
('P9060331.JPG', 7, 0),
('P9060341.JPG', 7, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
