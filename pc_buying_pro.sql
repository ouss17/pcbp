-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 jan. 2020 à 12:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pc_buying_pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Id` int(10) NOT NULL,
  `Quantity_Ordered` int(11) NOT NULL,
  `PriceEach` double NOT NULL,
  `Order_Id` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `orderline`
--

INSERT INTO `orderline` (`Id`, `Product_Id`, `Quantity_Ordered`, `PriceEach`, `Order_Id`) VALUES
(1, 2, 1, 159, 2),
(2, 5, 1, 255, 3),
(3, 5, 1, 300, 4),
(4, 2, 1, 159, 5),
(5, 1, 1, 234.5, 9),
(6, 5, 1, 300, 10),
(7, 7, 1, 1799, 10);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  `TaxRate` double DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`Id`, `User_Id`, `CreationTimestamp`, `CompleteTimestamp`, `TaxRate`, `TaxAmount`, `TotalAmount`) VALUES
(10, 2, '2020-01-25 13:06:34', '2020-01-25 13:06:35', 20, 41980, 2099),
(3, 3, '2020-01-23 19:47:10', '2020-01-23 19:47:11', 20, 5100, 255),
(4, 2, '2020-01-23 19:47:54', '2020-01-24 12:25:02', 20, 6000, 300);

-- --------------------------------------------------------

--
-- Structure de la table `productline`
--

DROP TABLE IF EXISTS `productline`;
CREATE TABLE IF NOT EXISTS `productline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `productLine` varchar(250) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Resume` varchar(9000) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `productline`
--

INSERT INTO `productline` (`Id`, `productLine`, `Title`, `Resume`, `Image`) VALUES
(1, 'complet', 'complet', 'Vous ne vous y connaissez pas trop en montage ou dans les produits? Vous trouverez ici notre gamme de pc déjà montés et de haute qualité.', 'complet.jpg'),
(2, 'cables', 'cables', 'Le connecteur de l’écran PC est presque toujours de type DVI-D, c\'est-à-dire numérique de manière exclusive. Il existe une distinction entre DVI-D et DVI-D Dual Link, ce dernier permettant d\'exploiter des résolutions supérieures au Full HD et la 3D. Mais ne vous en préoccupez pas trop : ce connecteur est de toute manière adapté aux différents modes d\'affichage supportés par le moniteur. Par exemple, les moniteurs de 2560x1440 pixels bénéficient d\'office d\'un port DVI-D Dual Link.', 'fils.jpg'),
(4, 'graphic', 'cartes graphiques', 'La carte graphique est un composant de l\'unité centrale chargé de l\'affichage sur l\'écran : Windows, les fenêtres, le bureau... Les cartes graphiques puissantes ont pour rôle également de gérer les affichages 3D (jeux vidéo). Les principaux constructeurs de cartes graphiques sont Nvidia et ATI.', 'graphic.jpg'),
(5, 'processor', 'processeurs', 'Le processeur est le cerveau de l\'ordinateur, c\'est lui qui organise les échanges de données entre les différents composants (disque dur, mémoire RAM, carte graphique) et qui fait les calculs qui font que l\'ordinateur interagit avec vous et affiche votre système à l\'écran. Sa puissance est exprimée en Hz.', 'processor.jpg'),
(6, 'boitier', 'boitiers', 'En informatique, le boîtier de l\'unité centrale (en anglais computer case) loge et protège les principaux composants d\'un appareil informatique (poste, système embarqué) composé d\'un ou de plusieurs ordinateurs (carte mère, processeur, disque dur, etc.)1. Un boîtier est souvent composé d\'acier, d\'aluminium ou de plastique. Pour des raisons décoratives, il peut également contenir d\'autres matériaux comme du bois ou du plexiglas. Lorsque le boîtier est horizontal et placé à plat sur le bureau, on parle de « boîtier de bureau » (desktop case), mais lorsqu\'il est vertical et placé debout sous le bureau, on parle de « boîtier tour » (tower case).', 'tour.jpg'),
(7, 'coolder', 'CPU refroidisseurs', 'La surchauffe est une des principales causes de la baisse de performance d’un PC. Ce sont surtout les ordinateurs portables qui sont sujets à ce genre de problème lorsqu’ils sont posés directement sur les genoux, sur le lit ou même sur le bureau. Heureusement, il existe les refroidisseurs ordinateur qui ont pour fonction de ventiler l’appareil pour lui laisser respirer.', 'ventilator.jpg'),
(8, 'stockage', 'stockage', 'La RAM est un type de mémoire qui équipe tout ordinateur et qui permet de stocker des informations provisoires. Son avantage majeur est sa capacité de lecture très rapide par rapport au disque dur et qui permet une utilisation fluide de votre ordinateur. RAM veut dire en anglais Random Access Memory : mémoire à accès aléatoire (son but n\'étant pas de ranger de l\'information mais d\'y accéder rapidement et provisoirement).', 'ram.jpg'),
(9, 'disk', 'disques durs', 'Le disque dur (HDD en anglais pour Hard Disk Drive) est l\'organe de l\'ordinateur servant à conserver les données de manière permanente, contrairement à la mémoire vive, qui s\'efface à chaque redémarrage de l\'ordinateur, c\'est la raison pour laquelle on parle parfois de mémoire de masse pour désigner les disques durs.', 'disk.jpg'),
(10, 'power', 'alimentations', 'En gros, votre PC portable va simplement fonctionner grâce au courant dont il a accès via votre câble de recharge et va laisser l\'énergie stockée dans la batterie pour plus tard. Pas de surcharge donc, votre PC va simplement faire des réserves pour plus tard.', 'battery.jpg'),
(11, 'motherboard', 'cartes meres', 'Le rôle de la carte mère est de centraliser et traiter les données échangées dans un ordinateur à l\'aide du processeur, qui est fixé dessus. La carte mère gère donc le disque dur, un disque, le clavier et la souris, le réseau, les ports USB... La mémoire RAM et le processeur sont directement branchés sur la carte mère.', 'LD0005259246_2.jpg'),
(12, 'speakers', 'enceintes', 'Le son sur PC a longtemps été négligé et le budget qui lui est alloué se limite souvent à la portion congrue. Pourtant, à en juger par la quantité de fichiers échangés et streamés sur la toile, le son est manifestement l\'une des composantes principales de nos occupations favorites, que ce soit à travers le visionnage de films et de vidéos ou l\'écoute de musique et podcasts.', 'JBL-Pebbles-Wireless-Bluetooth-mini-Speaker-USB-Plug-and-Play-Stereo-Aux-Connection-Mini-Portable-Speakers.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `ProductLine` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(900) NOT NULL,
  `QuantityInStock` int(100) NOT NULL,
  `BuyPrice` double NOT NULL,
  `SalePrice` double NOT NULL,
  `Reduction` int(5) DEFAULT NULL,
  `CreationTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Id`, `Name`, `ProductLine`, `Photo`, `Description`, `QuantityInStock`, `BuyPrice`, `SalePrice`, `Reduction`, `CreationTimestamp`) VALUES
(1, 'Gigabyte Radeon RX 5700 XT GAMING OC', 'cartes graphiques', 'gigabyte_radeon_RX_5700.jpg', 'Faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA avec la carte graphique customisé Gigabyte Radeon RX 5700 XT Gaming OC (GV-R57XTGAMING OC-8GD)! Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 50, 400, 469, 50, '2020-01-14 00:10:00'),
(2, 'Asus Radeon RX 580 Dual OC - 4 Go', 'cartes graphiques', 'asus_radeon_RX_580.jpg', 'AMD nous présente sa génération de cartes graphiques Radeon ; les AMD Radeon RX 580 (90YV0AQ0-M0NA00) ! La nouvelle gamme RX série 450 Asus affiche un rapport performances prix hors normes pour le plus grand plaisir des joueurs PC ! La carte graphique gamer AMD Radeon RX 580 version 4 Go se base sur la nouvelle architecture AMD Polaris, est certifiée pour la Réalité Virtuelle (VR) et ravira tous les assoiffés de jeux PC !', 20, 170, 159, 0, '2020-01-14 10:00:00'),
(3, 'RAM 8GB Mo de mémoire pour IBM-Lenovo ThinkPad X240 (DDR3-12800)', 'stockage', 'ram_DDR3_1333Mhz_PC3_10600_204.jpg', 'RAM 8GB Mo de mémoire pour IBM-Lenovo ThinkPad X240 (DDR3-12800) - Extension de mémoire d ordinateur portable - OFFTEK', 90, 49.99, 45.92, 30, '2020-01-14 00:00:10'),
(4, 'XUM Barrette de mémoire RAM DDR3 1333 MHz PC3 10600 204, broches SODIMM, pour ordinateur portable/notebook, 4 Go/8 Go 8 Go (2 x 4 Go) Vert', 'stockage', 'ram_8gb_IBM-Lenovo_ThinkpadX240.jpg', 'RAM 8GB Mo de mémoire pour IBM-Lenovo ThinkPad X240 (DDR3-12800) - Extension de mémoire d ordinateur portable - OFFTEK', 10, 50, 47, 0, '2020-01-14 10:10:10'),
(5, 'Seagate ST10000DM0004 Disque Dur Interne 3,5\" 10 to SATA', 'disques durs', '71LLCRJSmwL._SX522_.jpg', 'Marque: Seagate, Numéro du modèle de l\'article:	ST10000DM0004, séries:	ST10000DM0004, Couleur:	Silver, Garantie constructeur	Garantie Fabricant: 5 ans, Système d\'exploitation:	Desktop, Plate-forme du matériel informatique:	PC, Marque du processeur:	Intel, Taille du disque dur:	10000 GB, Technologie du disque dur:	HDD, Bluetooth:	Non, Interface du matériel informatique:	SATA 6.0 Gb/s, Nombre de ports USB: 2.0	1, Type de connecteur:	USB, Serial ATA, Compatibilité du périphérique:	Ordinateur Portable, Item dimensions: L x W x H	14,7 x 10,2 x 2,6 cm, Poids du produit:	635 grammes.', 20, 332, 300, 15, '2020-01-22 11:07:37'),
(6, 'Core i9 7980XE : 1000W de conso à 6.1 GHz !', 'processeurs', 'Intel-Core-i9-7980XE-667x400.jpg', 'Ce qui est vraiment impressionnant avec ce CPU c’est sa consommation lors de session d’overclocking. Effectivement, le processeur à lui seul, overclocké à 5.5 GHz sur ses 18 cœurs affiche déjà quelque 840 petits watts de consommation ! Une fois à 6.1 GHz sur tous ses cœurs, la conso grimpe à 1000W (!!!). Ce qui compte finalement, c’est le score. Ainsi, une fois O.C à 5.6 GHz, le Core i9 7980XE effectue quelques 5635 cb sur Cinebench R15 en multi-thread. En single thread, nous sommes à 257 cb. À titre de comparaison, le Threadripper 1950X O.C à 5.4 GHz donne 4514 cb en multi-thread sur le même test !', 45, 956, 1000, 30, '2020-01-22 13:11:13'),
(7, 'PC de jeu, Intel Core i5 9600K, NVIDIA GeForce RTX 2070 Super, SSD NVMe 512 Go, 16 Go DDR4, Windows 10 Pro', 'complet', 'MN0005559124_1_0005567540.jpg', 'Difficile depuis quelques années de passer à coté du phénomène streaming, mais très facile de s\'y lancer aujourd\'hui grâce à cette nouvelle gamme de PC Creator.  Ce PC Creator Ultra est le parfait équilibre entre puissance brute et budget maîtrisé. Son architecture haut de gamme à base de NVIDIA GeForce RTX 2070 Super et de processeur Intel Core i5 9600K vous permet de jouer en résolution 2K tout en ayant un stream ultra fluide en full HD. Aorus ajoute 16 Go de mémoire DDR4 et pas moins de 512 Go de SSD NVMe pour un système qui répond au doigt et à l\'oeil. Le PC Creator Ultra est fourni avec une webcam Logitech 1080p et un Stream Deck Elgato pour personnifier vos contenus live et intéragir avec votre communauté. Egalement au programme : un boitier de capture Elgato HD60S pour l\'enregistrement et la diffusion de toutes vos parties gaming sur les dernières consoles en 1080p 60 FPS !', 10, 1500, 1799, 15, '2020-01-25 12:38:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(90) COLLATE utf8_bin NOT NULL,
  `Password` varchar(160) COLLATE utf8_bin NOT NULL,
  `Role` varchar(10) COLLATE utf8_bin NOT NULL,
  `FirstName` varchar(15) COLLATE utf8_bin NOT NULL,
  `LastName` varchar(15) COLLATE utf8_bin NOT NULL,
  `Pseudo` varchar(90) COLLATE utf8_bin NOT NULL,
  `CreationTimeStamp` date NOT NULL,
  `Address` varchar(60) COLLATE utf8_bin NOT NULL,
  `City` varchar(60) COLLATE utf8_bin NOT NULL,
  `Zip` int(12) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `Role`, `FirstName`, `LastName`, `Pseudo`, `CreationTimeStamp`, `Address`, `City`, `Zip`) VALUES
(1, 'admin@gmail.com', '$2y$11$a8db3af922184c3df2b85u2982EX1nZkIGG1eeXlHdofYiqO7NMB6', 'admin', 'Ousmane', 'Diarra', 'admin', '2020-01-13', '1 rue de l\'admin', 'paris', 75011),
(2, 'user@gmail.com', '$2y$11$8489e8d8d7dacda5bf434u4b9GpyAVwydr6Q6E.H640Z3EhYxFm8G', 'user', 'Ousmane', 'DIARRA', 'user', '2020-01-13', '1 rue user', 'paris', 75011),
(5, 'pro@gmail.com', '$2y$11$27211953528347f32e180umsJ0EpJGu/JIJJiDD.PGC.U1/GkplLy', 'premium', 'Ousmane', 'DIARRA', 'pro', '2020-01-25', '1 rue du premium', 'paris', 75011);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
