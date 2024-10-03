-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-lastfragment.alwaysdata.net
-- Generation Time: Oct 03, 2024 at 04:22 PM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastfragment_1`
--
CREATE DATABASE IF NOT EXISTS `lastfragment_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lastfragment_1`;

-- --------------------------------------------------------

--
-- Table structure for table `aliments`
--

CREATE TABLE `aliments` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Ete` int(11) NOT NULL,
  `Automne` int(11) NOT NULL,
  `Hiver` int(11) NOT NULL,
  `Printemps` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Qualite` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aliments`
--

INSERT INTO `aliments` (`id`, `Nom`, `Ete`, `Automne`, `Hiver`, `Printemps`, `Quantite`, `Qualite`, `Type`) VALUES
(1, 'Blé', 2, 3, 5, 5, 1, 0, 'Céréale'),
(2, 'Maïs', 5, 2, 3, 5, 1, 2, 'Céréale'),
(3, 'Lentilles', 2, 3, 5, 5, 1, 2, 'Céréale'),
(4, 'Haricots', 2, 3, 5, 5, 1, 2, 'Céréale'),
(5, 'Pain', 2, 3, 5, 5, 1, 2, 'Céréale'),
(6, 'Riz', 10, 4, 6, 10, 1, 4, 'Céréale'),
(7, 'Choux', 5, 3, 3, 4, 1, 2, 'Légume'),
(8, 'Carottes', 2, 3, 5, 5, 1, 2, 'Légume'),
(9, 'Navets', 3, 5, 5, 5, 1, 2, 'Légume'),
(10, 'Betteraves', 3, 5, 5, 2, 1, 2, 'Légume'),
(11, 'Laitues', 3, 5, 5, 2, 1, 2, 'Légume'),
(12, 'Oignon', 5, 2, 3, 5, 1, 2, 'Légume'),
(13, 'Épinards', 2, 3, 2, 3, 1, 2, 'Légume'),
(14, 'Pomme', 4, 4, 6, 4, 1, 4, 'Fruit'),
(15, 'Poire', 10, 4, 6, 10, 1, 4, 'Fruit'),
(16, 'Cerises', 6, 10, 10, 4, 1, 4, 'Fruit'),
(17, 'Baies', 4, 4, 4, 4, 1, 2, 'Fruit'),
(18, 'Figue', 10, 4, 6, 10, 1, 4, 'Fruit'),
(19, 'Dattes', 10, 4, 6, 10, 1, 4, 'Fruit'),
(20, 'Prune', 4, 6, 10, 10, 1, 4, 'Fruit'),
(21, 'Pomme Séchée', 2, 2, 3, 2, 1, 2, 'Fruit'),
(22, 'Poire Séchée', 5, 2, 3, 5, 1, 2, 'Fruit'),
(23, 'Cerises Séchées', 3, 5, 5, 2, 1, 2, 'Fruit'),
(24, 'Baies Séchées', 2, 2, 2, 2, 1, 1, 'Fruit'),
(25, 'Figue Séchée', 5, 2, 3, 5, 1, 2, 'Fruit'),
(26, 'Dattes Séchées', 5, 2, 3, 5, 1, 2, 'Fruit'),
(27, 'Prune Séchée', 2, 3, 5, 5, 1, 2, 'Fruit'),
(28, 'Venaison', 10, 10, 10, 10, 1, 6, 'Viande'),
(29, 'Faisan', 10, 10, 10, 10, 1, 6, 'Viande'),
(30, 'Porc', 10, 10, 10, 10, 1, 6, 'Viande'),
(31, 'Boeuf', 10, 10, 10, 10, 1, 6, 'Viande'),
(32, 'Volaille', 10, 10, 10, 10, 1, 6, 'Viande'),
(33, 'Thon', 10, 10, 10, 10, 1, 6, 'Poisson'),
(34, 'Truite', 10, 10, 10, 10, 1, 6, 'Poisson'),
(35, 'Brochet', 10, 10, 10, 10, 1, 6, 'Poisson'),
(36, 'Oeufs', 10, 10, 10, 10, 1, 6, 'Viande'),
(37, 'Fromage', 5, 5, 5, 5, 1, 4, 'Viande'),
(38, 'Lait', 2, 2, 2, 2, 1, 2, 'Viande'),
(39, 'Beurre', 3, 3, 3, 3, 1, 2, 'Viande'),
(40, 'Crème', 3, 3, 3, 3, 1, 2, 'Viande'),
(41, 'Ration de nourriture', 8, 8, 8, 8, 1, 1, 'Viande'),
(42, 'Soupe en Bouteille', 5, 5, 5, 5, 2, 10, 'Viande'),
(43, 'Nourritures avariées', 10, 10, 10, 10, 1, 1, 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `argent`
--

CREATE TABLE `argent` (
  `id` int(11) NOT NULL,
  `argent` int(11) NOT NULL,
  `qui` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `argent`
--

INSERT INTO `argent` (`id`, `argent`, `qui`, `token`) VALUES
(1, 1959, 'Gora', 'PER:INT,PER:ELO,FOR:END'),
(2, 7080, 'Shuri', 'MDF:ACC,VIT:FUR,FOR:END'),
(3, 3016, 'Zayath', 'VIT:FUR,ACC:ELO,FOR:INT,MDF:FUR,FOR:FOR'),
(4, 25116, 'Manon', ''),
(5, 2147482659, 'Ryry', 'END:END,END:CHA,END:ELO'),
(6, 5375, 'Gira', 'MDF:INT'),
(7, 9414, 'Xianos', 'VIT:FUR'),
(8, 837, 'Élhanan', ''),
(9, 16011, 'Dario Bianchi', 'PER:INT,PER:FUR,VIT:ACC');

-- --------------------------------------------------------

--
-- Table structure for table `armure`
--

CREATE TABLE `armure` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Emplacement` int(11) NOT NULL,
  `Stats` varchar(100) NOT NULL,
  `Valeurs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `armure`
--

INSERT INTO `armure` (`id`, `Nom`, `Emplacement`, `Stats`, `Valeurs`) VALUES
(1, 'Casque en cuir', 1, 'DEF', '2'),
(2, 'Plastron en cuir', 2, 'DEF', '5'),
(3, 'Brassards en cuir', 3, 'DEF', '1'),
(4, 'Bottes de cuir', 4, 'DEF', '2'),
(5, 'Heaume en Acier', 1, 'DEF,VIT,ACC', '5,-2,-3'),
(6, 'Plastron en Acier', 2, 'DEF,VIT', '12,-3'),
(7, 'Gantelets en Acier', 3, 'DEF,VIT', '3,-1'),
(8, 'Jambières en Acier', 4, 'DEF,VIT', '5,-1'),
(9, 'Heaume en Aucellum', 1, 'DEF,VIT', '5,1'),
(10, 'Plastron en Aucellum', 2, 'DEF,VIT', '12,2'),
(11, 'Jambières en Aucellum', 4, 'DEF,VIT', '5,1'),
(12, 'Gantelets en Aucellum', 3, 'DEF,VIT', '3,1'),
(13, 'Heaume en Fabuliath', 1, 'DEF,VIT,MDF,ACC', '8,-2,2,-3'),
(14, 'Plastron en Fabuliath', 2, 'DEF,VIT,MDF', '15,-5,3'),
(15, 'Gantelets en Fabuliath', 3, 'DEF,VIT,MDF', '5,-1,3'),
(16, 'Jambières en Fabuliath', 4, 'DEF,VIT,MDF', '8,-2,2'),
(17, 'Heaume en Tungstène', 1, 'DEF,VIT,ACC', '8,-2,-3'),
(18, 'Plastron en Tungstène', 2, 'DEF,VIT', '15,-3'),
(19, 'Gantelets en Tungstène', 3, 'DEF,VIT', '5,-1'),
(20, 'Jambières en Tungstène', 4, 'DEF,VIT', '8,-1'),
(21, 'Casque en cuir fourré', 1, 'DEF,ACC', '3,-2'),
(22, 'Plastron en cuir fourré', 2, 'DEF,VIT', '7,-2'),
(23, 'Brassards en cuir fourrés', 3, 'DEF,VIT', '2,-1'),
(24, 'Bottes de cuir fourrées', 4, 'DEF,VIT', '3,-2'),
(25, 'Sac à Dos', 2, 'VIT', '-5'),
(26, 'Anneau doré', 3, 'CHA', '7'),
(27, 'Tenue de Civil', 2, 'DEF', '-10');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `stats` varchar(8) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `stats`, `description`) VALUES
(1, 'MDF:MDF', 'Augmente la Maîtrise de 10%'),
(2, 'MDF:FOR', 'Vous pouvez booster vos attaques avec votre flux et attaquer en même temps, en une seule action.'),
(3, 'MDF:DEF', 'Vous pouvez générer un bouclier de flux qui consommera du flux et qui réduira les dégâts liés aux flux.'),
(4, 'MDF:VIT', 'Vous pouvez doubler votre consommation de flux pour remplacer un cast.'),
(5, 'MDF:ACC', 'Vous pouvez désormais mettre du flux en fiole.'),
(6, 'MDF:END', 'Les attaques de MDF ne consomme désormais plus d\'endurance.'),
(7, 'MDF:PER', 'Vous pouvez obtenir la stats de MDF de l\'individu scanné par une détection de flux.'),
(8, 'MDF:FUR', 'Vous pouvez effectuer un camouflage de flux, permettant de cacher votre véritable puissance.'),
(9, 'MDF:CHA', 'Vous pouvez intimider un individu en utilisant votre flux.'),
(10, 'MDF:ELO', 'Vous êtes capable de manipuler un individu pour qu\'il vous dévoile son flux.'),
(11, 'MDF:INT', 'Vous connaissez toutes les informations concernant les compétences de MDF, de plus vous récupérer un jeton MDF. (Les informations reçues doivent restées confidentielles)'),
(12, 'FOR:FOR', 'Augmente la Force de 10%'),
(13, 'FOR:DEF', 'Lors d\'une situation de blocage ou de parade avec un bouclier, vous pouvez enchaîner sur une contre-attaque physique.'),
(14, 'FOR:VIT', 'Lors d\'une contre-attaque, vous taper avant votre adversaire, ce qui vous permets de potentiellement de nullifier l\'attaque de la cible. Soyez réactif cependant.'),
(15, 'FOR:ACC', 'Grâce à votre dextérité, lorsque vous frapperez un adversaire vous saurez les dégâts que vous lui infligez.'),
(16, 'FOR:END', 'Vous pouvez jauger votre endurance pour mettre des coups plus puissants.'),
(17, 'FOR:PER', 'Vous pouvez déterminer la stats de FOR des individus observés, de plus vous êtes imbattable au jeu du regard.'),
(18, 'FOR:FUR', 'Les charges lourdes ne baisse pas votre furtivité.'),
(19, 'FOR:CHA', 'Vous pouvez intimider un individu juste avec votre prestance.'),
(20, 'FOR:ELO', 'Vous pouvez crier tellement fort que vous pouvez effrayer vos adversaires pour les empêcher de vous attaquer pendant un tour. (Un cri par jour)'),
(21, 'FOR:INT', 'Vous connaissez toutes les informations concernant les compétences de FOR, de plus vous récupérer un jeton FOR. (Les informations reçues doivent restées confidentielles)'),
(22, 'DEF:DEF', 'Augmente la Défense de 10%'),
(23, 'DEF:VIT', 'Lorsque vous bloquez un coup de bouclier alors que vous êtes en garde, vous ne consommerez pas votre action, mais de l\'endurance à la place.'),
(24, 'DEF:ACC', 'Lorsque vous combattez un adversaire, vous pouvez déterminer sa DEF en le frappant et sa FOR en recevant des coups.'),
(25, 'DEF:END', 'Vous pouvez consommer de l\'endurance à la place de la santé lorsque vous recevez des coups mortels.'),
(26, 'DEF:PER', 'Vous pouvez déterminer les points faibles des adversaires d\'un simple coup d\'oeil.'),
(27, 'DEF:FUR', 'Vous pouvez camoufler votre armure sous un manteau, dangereux dans les zones chaudes.'),
(28, 'DEF:CHA', 'Les armures et armes d\'apparat ne possèdent aucun malus lié au fait qu\'il soit d\'apparat.'),
(29, 'DEF:ELO', 'Vous n\'avez plus besoin de jet d\'Éloquence pour mentir éhontément à un PNJ.'),
(30, 'DEF:INT', 'Vous connaissez toutes les informations concernant les compétences de DEF, de plus vous récupérer un jeton DEF. (Les informations reçues doivent restées confidentielles)'),
(31, 'VIT:VIT', 'Augmente la Vitesse de 10%'),
(32, 'VIT:ACC', 'Vous pouvez recharger et tirer avec votre arbalète dans le même tour désormais. De plus, si elle est déjà chargée, vous pouvez tirer en consommant de l\'endurance plutôt que votre action.'),
(33, 'VIT:END', 'Les mouvements et les esquives ne consomment plus d\'endurance.'),
(34, 'VIT:PER', 'Vous pouvez déterminer la stats de VIT de l\'individu observé.'),
(35, 'VIT:FUR', 'Vous êtes discret sur toutes les compétences de VIT.'),
(36, 'VIT:CHA', 'Votre première impression est meilleurs, et vous êtes meilleurs en drague.'),
(37, 'VIT:ELO', 'Vous n\'avez pas besoin d\'expliquer quelques choses, vous pouvez juste dire \"Je fais mon rapport de mission\" et ce sera bon.'),
(38, 'VIT:INT', 'Vous connaissez toutes les informations concernant les compétences de VIT, de plus vous récupérer un jeton VIT. (Les informations reçues doivent restées confidentielles)'),
(39, 'ACC:ACC', 'Augmente la Précision de 10%'),
(40, 'ACC:END', 'Vous pouvez demander au MJ votre endurance en combat. '),
(41, 'ACC:PER', 'Votre voyez d\'absurdement loin.'),
(42, 'ACC:FUR', 'Les individus ne peuvent pas déterminer d\'où vienne vos tirs réussis.'),
(43, 'ACC:CHA', 'Vous êtes capable d\'effectuer des feintes, en plus d\'être meilleur en danse, en utilisant une feite vous pouvez esquiver ou attaquer de manière subtile.'),
(44, 'ACC:ELO', 'Vous pouvez stocker des munitions dans votre bouche et les recracher sur vos adversaires quand ils sont proche. Pensez à les retirer à la fin des combats, ça peut-être dangereux.'),
(45, 'ACC:INT', 'Vous connaissez toutes les informations concernant les compétences de ACC, de plus vous récupérer un jeton ACC. (Les informations reçues doivent restées confidentielles)'),
(46, 'END:END', 'N\'existe pas, une erreur a dû se glisser.'),
(47, 'END:PER', 'Vous pouvez avoir accès aux points de vie d\'un adversaire que vous voyez très bien (soit en étant très proche, soit grâce à une compétence).'),
(48, 'END:FUR', 'Vous pouvez vous maintenir en furtivité pendant un temps rallongé, sans consommer d\'Endurance.'),
(49, 'END:CHA', 'N\'existe pas, une erreur a dû se glisser.'),
(50, 'END:ELO', 'N\'existe pas, une erreur a dû se glisser.'),
(51, 'END:INT', 'N\'existe pas, une erreur a dû se glisser.'),
(52, 'PER:PER', 'Augmente la Perception de 15%'),
(53, 'PER:FUR', 'De part vos compétences de furtivité, vous connaissez les bonnes cachettes et repérer plus facilement les cachettes et les cachés.'),
(54, 'PER:CHA', 'Vous êtes capable de percevoir si les individus que vous côtoyer possède une attirance quelconque pour vous, où pour autrui.'),
(55, 'PER:ELO', 'Vous pouvez insulter un individu sur un défaut de son physique, cela inflige des dégâts. La vérité blesse vraiment.'),
(56, 'PER:INT', 'Vous connaissez toutes les informations concernant les compétences de PER, de plus vous récupérer un jeton PER. (Les informations reçues doivent restées confidentielles)'),
(57, 'FUR:FUR', 'Augmente la Furtivité de 15%'),
(58, 'FUR:CHA', 'Vous devenez un prestidigitateur d\'exeption, vous pouvez attirer l\'attention du monde sur vous pour augmenter la furtivité de vos camarades.'),
(59, 'FUR:ELO', 'Vous pouvez parler en toute discrétion sans avoir besoin de faire de jet de furtivité.'),
(60, 'FUR:INT', 'Vous connaissez toutes les informations concernant les compétences de FUR, de plus vous récupérer un jeton FUR. (Les informations reçues doivent restées confidentielles)'),
(61, 'CHA:CHA', 'Augmente le Charisme de 15%'),
(62, 'CHA:ELO', 'Vous êtes le commerçant ultime, pour tout achat effectué POUR VOUS, vous réduisez le prix de 10%.'),
(63, 'CHA:INT', 'Vous connaissez toutes les informations concernant les compétences de CHA, de plus vous récupérer un jeton CHA. (Les informations reçues doivent restées confidentielles)'),
(64, 'ELO:ELO', 'Augmente l\'Éloquence de 15%'),
(65, 'ELO:INT', 'Vous connaissez toutes les informations concernant les compétences de ELO, de plus vous récupérer un jeton ELO. (Les informations reçues doivent restées confidentielles)'),
(66, 'INT:INT', 'Augmente l\'Intelligence de 15%');

-- --------------------------------------------------------

--
-- Table structure for table `bestiaire`
--

CREATE TABLE `bestiaire` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `visibilite` int(11) NOT NULL,
  `Race` varchar(100) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Theme` varchar(200) NOT NULL,
  `Descendance` varchar(20) NOT NULL,
  `Arc` tinyint(1) NOT NULL DEFAULT 0,
  `Taille` varchar(100) NOT NULL,
  `Poids` varchar(100) NOT NULL,
  `Dangerosite` int(11) NOT NULL,
  `Competence` text NOT NULL,
  `QdF` int(11) NOT NULL,
  `Maitrise` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `Sante` int(11) NOT NULL,
  `Endurance` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `Accuracy` int(11) NOT NULL,
  `Perception` int(11) NOT NULL,
  `Furtivite` int(11) NOT NULL,
  `Charisme` int(11) NOT NULL,
  `Eloquence` int(11) NOT NULL,
  `SexAbility` int(11) NOT NULL,
  `Link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bestiaire`
--

INSERT INTO `bestiaire` (`id`, `Nom`, `visibilite`, `Race`, `Image`, `Theme`, `Descendance`, `Arc`, `Taille`, `Poids`, `Dangerosite`, `Competence`, `QdF`, `Maitrise`, `Strength`, `Defense`, `Sante`, `Endurance`, `Vitesse`, `Accuracy`, `Perception`, `Furtivite`, `Charisme`, `Eloquence`, `SexAbility`, `Link`) VALUES
(1, 'Chapardeur', 1, 'Gobelin', 'Image/Chapardeur.jpg', 'Majora\'s Incarnate Battle', 'Yinva', 0, '0.80m - 1.25m', '30kg-40kg', 2, 'Monstre Faible', 1000, 30, 40, 30, 1000, 500, 40, 40, 30, 50, 25, 0, 20, 'description/chapardeur.txt'),
(2, 'Roi Chapardeur', 1, 'Gobelin', 'Image/Roi_Chapardeur.jpg', 'Majora\'s Incarnate Battle', 'Yinva', 0, '2m', '100kg', 2, 'Compétence Boss : Change l\'humeur de tout le monde sur le terrain quand il joue.', 1500, 50, 60, 40, 3000, 1000, 35, 40, 35, 10, 50, 0, 40, 'description/roi_chapardeur.txt'),
(3, 'Roi des Montagnes', 1, 'Cervidae', 'Image/RoiDesMontagnes.jpg', 'Inconnu', 'Guizamark', 0, '2m20 (longueur)', '250kg', 4, 'Inconnu', 3000, 75, 50, 66, 12000, 1200, 65, 72, 68, 15, 78, 0, 34, 'description/MonstreInconnu.txt'),
(4, 'Reniath', 1, 'Renard', 'Image/Reniath.jpg', 'Aucun', 'Goliath', 0, '40 - 60cm', '15kg - 25kg', 2, 'Prédateur Apex', 500, 30, 50, 35, 800, 500, 50, 50, 40, 50, 25, 0, 25, 'description/reniath.txt'),
(5, 'Linci', 1, 'Reptile', 'Image/Linci.jpg', 'Great Maccao - Battle Theme', 'Yinva', 0, '3m - 5m (longueur)', '10kg - 15kg', 2, 'Monstre Dangereux', 1000, 40, 35, 40, 1000, 500, 45, 40, 40, 55, 25, 0, 35, 'description/linci.txt'),
(6, 'Troll Humain', 1, 'Troll', 'Image/TrollHumain.jpg', 'Aucun', 'Inconnu', 0, '1m60 - 2m', '80kg - 120kg', 3, 'Compétence Boss : Se régénère un certain montant de HP à chaque fois qu\'il joue.', 0, 0, 65, 45, 6000, 1200, 50, 45, 55, 25, 15, 40, 40, 'description/trollHumain.txt'),
(7, 'Habitant de la Forêt', 1, 'Gobelin', 'Image/HabitantForet.jpg', 'Majora\'s Incarnate Battle', 'Guizamark', 0, '0.8m - 1.2m', '15kg - 30kg', 2, 'Monstre Faible', 1000, 60, 25, 30, 1000, 500, 45, 45, 40, 40, 25, 0, 15, 'description/habitantForet.txt'),
(8, 'Gourmours', 1, 'Ours', 'Image/Gourmours.jpg', 'Arzuros, Lagombi & Volvidon - Battle Theme', 'Yinva', 0, '1m80 - 2m20', '150kg - 250kg', 2, 'Compétence Boss : Il vit en symbiose avec les abeilles, il peut s\'en servir pour vous attaquer ou se défendre.', 1500, 40, 60, 50, 3000, 500, 35, 40, 40, 15, 40, 0, 15, 'description/gourmours.txt'),
(9, 'Terrours', 1, 'Ours', 'Image/Terrours.jpg', 'Arzuros, Lagombi & Volvidon - Battle Theme', 'Yinva', 0, '2m40 - 3m00', '300kg - 450kg', 2, 'Compétence Boss : À son tour, terrifie toutes ses proies sauf une.', 1500, 50, 65, 55, 3000, 1000, 45, 40, 25, 5, 65, 0, 40, 'description/terrours.txt'),
(10, 'Loup Aveugle', 1, 'Loup', 'Image/LoupAveugle.jpg', 'Aucun', 'Aucun', 0, '1m40 - 1m70', '50kg - 80kg', 2, 'Monstre Faible', 0, 0, 55, 40, 1500, 1000, 40, 45, 60, 50, 35, 0, 40, 'description/loupAveugle.txt'),
(11, 'Troll des Glaces', 1, 'Troll', 'Image/Troll des Glaces.jpg', 'Aucun', 'Aqua', 0, '2m00 - 2m40', '120kg - 180kg', 4, 'Compétence Boss : Se régénère un certain montant de HP à chaque fois qu\'il joue.', 1800, 40, 80, 55, 10000, 1500, 55, 65, 55, 15, 45, 0, 45, 'description/trollGlace.txt'),
(12, 'Zérisson', 1, 'Hérisson', 'Image/Zérisson.jpg', 'Aucun', 'Goliath', 0, '10cm - 30cm', '<1kg', 1, 'Animal de Compagnie', 500, 30, 10, 50, 300, 100, 10, 40, 15, 30, 50, 0, 15, 'description/zerisson.txt'),
(13, 'Liavre', 1, 'Lièvre', 'Image/Liavre.jpg', 'Aucun', 'Goliath', 0, '40cm - 60cm', '3kg - 5kg', 1, 'Gibier', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/liavre.txt'),
(14, 'Gloutre', 1, 'Loutre', 'Image/Gloutre.jpg', 'Aucun', 'Goliath', 0, '50cm - 70cm', '<5kg', 1, 'Animal Faible', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/gloutre.txt'),
(15, 'Wasep', 1, 'Plante', 'Image/Wasep.jpg', 'Hunter\'s Chance Festival', 'Pestia', 0, '5m', '35kg', 4, 'Compétence de Zone : Attire tous les animaux et monstres de la zone.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/wasep.txt'),
(16, 'Engeance Reniath', 1, 'Renard', 'Image/Engeance Reniath.jpg', 'Halo Thème', 'Shizari', 0, '40 - 60cm', '10kg - 15kg', 3, 'Engeance de Shizari : Vole une partie de la QdF en cas d\'attaque.', 500, 50, 30, 35, 1000, 500, 50, 50, 40, 50, 25, 0, 25, 'description/engeanceReniath.txt'),
(17, 'Engeance Canine', 1, 'Engeance Shizari', 'Image/Engeance Canine.jpg', 'Halo Theme', 'Shizari', 0, '1m80', '80kg', 3, 'Compétence Boss : Absorbe le flux de ses cibles pour l\'utiliser contre eux.', 0, 70, 40, 55, 3000, 1000, 44, 50, 25, 25, 60, 0, 25, 'description/engeanceCanine.txt'),
(18, 'Engeance Humaine', 1, 'Humain', 'Image/Engeance Humaine.jpg', 'Halo Theme', 'Shizari', 0, '1m60-2m00', '40kg-80kg', 3, 'Mémoire d\'Antan : Permet de générer certains objets.', 0, 0, 40, 35, 1000, 500, 45, 45, 60, 35, 25, 0, 35, 'description/engeanceHumaine.txt');

-- --------------------------------------------------------

--
-- Table structure for table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Statistique` varchar(100) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`id`, `Nom`, `Description`, `Statistique`, `Level`) VALUES
(1, 'Fioleur Fou', 'Vous pouvez enclencher des fioles de flux une fois que vous les avez brisées.', 'MDF', 30),
(2, 'Radar Magique', 'Vous permet de lancer une détection de flux autour de vous, cela permet de détecter les fortes présences de flux qui ne sont pas camouflées. Un jet de perception sera cependant requis pour valider la réussite de la compétence.', 'MDF', 50),
(6, 'Votre inventaire est plein !', 'Tous les 20 points de force, vous gagnez un emplacement d\'inventaire.', 'FOR', 20),
(7, 'Métaux Solides', 'Vous permet de manier des outils, des armes et des armures en Acier, Fer ou Cuivre.', 'FOR', 25),
(8, 'Métaux Lourd', 'Vous permet de manier des outils, des armes et des armures en Tungstène ou en Fabuliath.', 'FOR', 40),
(9, 'Métal Indestructible', 'Vous permet de manier des outils, des armes et des armures en Iridium.', 'FOR', 50),
(10, 'Comme un gant', 'Vous ne recevez plus aucun malus de vitesse lié au port d\'armure lourde.', 'FOR', 60),
(11, 'Ambidextre', 'Vous permet d\'équipez certaines armes à deux mains, sur une seule main. Cependant vous ne pourrez pas porter deux armes à deux mains simultanément. De surcroit, elles ne prennent plus qu\'une seule place d\'inventaire.', 'FOR', 70),
(12, 'Barbare… J\'ai dit BARBARE !', 'Vous pouvez équipez n\'importe quelle arme à deux mains sur une main. Oui, même une dans la menotte droite et une autre dans la gauche.', 'FOR', 80),
(13, 'Visière invisible', 'Retire tous les malus de précision lié au port d\'un casque.', 'ACC', 50),
(15, 'Sniper', 'À moins que l\'adversaire est une vitesse supérieur à 65, aucun jet d\'esquive n\'aura lieu (sauf cas exceptionnel).', 'ACC', 80),
(16, 'En garde !', 'Vous pouvez vous mettre en position défensive, cela permet de potentiellement réduire les dégâts reçus voire les bloquer si vous posséder un bouclier.', 'DEF', 30),
(17, 'Formation Tortue, avec les petites pattes.', 'La maîtrise des boucliers augmentent, vous pouvez désormais bloquer intégralement certains coups !', 'DEF', 40),
(18, 'Sate sate sate...', 'Vous pouvez tenter désarmer votre adversaire en utilisant votre arme.', 'DEF', 50),
(19, 'Toujours prêt', 'Vous permet de vous mettre en position défensive même en dehors de votre tour.', 'DEF', 60),
(20, 'Abdos d\'Ours', 'Vous permet de bloquer l\'arme d\'un adversaire s\'il la plante en vous.', 'DEF', 70),
(21, 'Protège Talon', 'Vous ne recevez plus de dégâts supplémentaires sur vos points faibles', 'DEF', 80),
(22, 'Réserve de graisse', 'Vous ne perdez plus toute votre Endurance après un entraînement, seulement 800. ', 'END', 800),
(23, 'Monster', 'Vous pouvez effectuer deux entraînements par jour. Vous serez cependant complètement à sec. ', 'END', 1600),
(24, 'Roulade', 'Vous permet d\'effectuer l\'action Esquive en combat.', 'VIT', 30),
(25, 'Jump !', 'Vous pouvez franchir des obstacles simples sur le terrain (un buisson par exemple).', 'VIT', 40),
(26, 'CS08', 'Vous permet d\'utilisez les obstacles complexes en combat. (Grimper un arbre par exemple)', 'VIT', 50),
(27, 'B-Hop', 'Vous pouvez effectuer deux actions de mouvement en combat.', 'VIT', 60),
(28, 'Usain Bolt', 'Vous galopez aussi vite qu\'un cheval à pied. Vous divisez par deux le temps de vos voyages à pied.', 'VIT', 70),
(29, 'D\'une pierre deux coups', 'Si l\'adversaire possède moins de 60 VIT, vous pouvez effectuer deux actions d\'attaques.', 'VIT', 80),
(30, 'Chasseur Nocturne', 'Le nuit ne pose plus de malus aux jets de Perception.', 'PER', 50),
(31, 'Lunette Naturelle', 'Augmente la précision sur les jets de dés d\'armes à distances.', 'PER', 60),
(32, 'Je suis le traître', 'Vous pouvez tenter d\'effectuer n\'importe quelle action dans le dos de vos camarades en envoyant un message privé au MJ, cela ajoute un jet de furtivité EN PLUS du jet de l\'action.', 'FUR', 40),
(33, 'Douce main', 'Voler des objets à un individu est une chose que vous pouvez envisager. Un tel pouvoir implique de grandes responsabilités, faites attention. (Un jet de Précision peut-être demandé en fonction de l\'objet et la manière de voler).', 'FUR', 50),
(34, 'Super Seducer', 'Vous pouvez tenter de séduire avec votre charisme les personnages. ', 'CHA', 30),
(35, 'Gold Digging', 'Dans une boutique, vous pouvez tenter une fois de temps en temps de gratter un geste commercial.', 'CHA', 50),
(36, 'Le Mercator', 'Vous pouvez tenter de négocier le prix d\'un objet. Rien n\'empêche le prix de monter. Une fois les négociations fini, vous êtes obligés d\'acheter l\'objet.', 'ELO', 30),
(37, 'Mémoire sélective', 'Vous pouvez tenter un jet de dés pour avoir une information que vous avez déjà eu. En cas de perte de mémoire...', 'INT', 40),
(38, '...---...', 'Vous pouvez un jet de dés pour avoir l\'aide du MJ sur une situation.', 'INT', 60),
(39, 'Encyclopédie', 'Vous pouvez demander une information au MJ sans jet de dés, cependant certaines informations peuvent être refusées.', 'INT', 80),
(40, 'Alphabétisation', 'Vous savez lire. C\'est déjà un bon début.', 'INT', 25),
(41, 'Flux Brouillant', 'Créé des interférences avec son flux, ce qui permet d\'empêcher que toutes personnes autour d\'elle soit détectable. Cependant un jet de furtivité est nécessaire.', 'MDF', 80),
(42, 'Flux Pur', 'Permet d\'utiliser le flux pur. Consomme énormément de flux et inflige d\'énormes dégâts aussi bien à l\'adversaire qu à soi-même, utilisable qu\'au Corps à Corps. (N\'utilise aucun jet)', 'MDF', 90),
(43, 'Gâchette', 'Une fois par combat, vous pouvez augmentez le jet de précision de 10. (Avant le jet)', 'ACC', 60),
(44, 'Classe d\'archerie', 'Vous pouvez utilisez des armes de précision.', 'ACC', 30),
(45, 'Longue Inspiration', 'Hors-Combat, les jets de précisions sont mis à 90. (sauf si vous avez plus de base)', 'ACC', 70),
(46, 'Erwin Smith', 'En combat, vous pouvez utiliser votre action d attaque pour faire un cri de guerre qui augmente la force de toutes les troupes alliés. Une fois par combat uniquement et sans jet de dé.', 'ELO', 60),
(47, 'Fabien Olicard', 'Vous êtes capable de déceler le mensonge chez une personne ayant une éloquence inférieur à 60.', 'ELO', 80),
(48, 'Instinct Primaire', 'Tu es capable de détecter le danger avant qu il arrive.', 'PER', 70),
(49, 'Intimidation', 'Permet d intimider les individus ayant un charisme inférieur au tien (avec un jet de dé).', 'CHA', 60),
(50, 'Corruption', 'Permet de donner de l argent aux personnes pour obtenir de petit service (détourner le regard, acheter leur opinion etc...) la somme varie sur un jet de dé.', 'ELO', 45),
(51, 'Éveil', 'Cette compétence diffère entre chaque joueur, demander au MJ pour plus d\'information.', 'MDF', 60),
(52, 'Pas Légers', 'S\'il y a des pièges simples au sol, tu ne les enclenches pas en marchant dessus.', 'FUR', 60),
(53, 'Mimique', 'Permet de changer son attitude pour mieux entrer dans le moule de la zone et ne pas attirer l\'attention.', 'CHA', 70),
(54, 'Geoguessr ', 'Vous avez un excellent sens de l\'orientation, vous n\'avez pas besoin de répéter pour vous rendre au endroit que vous voulez.', 'PER', 40);

-- --------------------------------------------------------

--
-- Table structure for table `etat`
--

CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Etat` int(11) NOT NULL,
  `Saison` varchar(15) NOT NULL,
  `Viande` tinyint(1) NOT NULL,
  `Poisson` tinyint(1) NOT NULL,
  `Porte` int(11) NOT NULL,
  `Sac` int(11) NOT NULL,
  `Coffre` int(11) NOT NULL,
  `Cheval` int(11) NOT NULL,
  `Commun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etat`
--

INSERT INTO `etat` (`id`, `Nom`, `Etat`, `Saison`, `Viande`, `Poisson`, `Porte`, `Sac`, `Coffre`, `Cheval`, `Commun`) VALUES
(1, 'Marché', 1, 'Printemps', 0, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fiche`
--

CREATE TABLE `fiche` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `visibilite` int(11) NOT NULL,
  `Arc` tinyint(1) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `Race` varchar(50) NOT NULL,
  `Ethnie` varchar(50) NOT NULL,
  `QdF` int(11) NOT NULL,
  `Maitrise` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `Sante` int(11) NOT NULL,
  `Endurance` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `Accuracy` int(11) NOT NULL,
  `Perception` int(11) NOT NULL,
  `Furtivite` int(11) NOT NULL,
  `Charisme` int(11) NOT NULL,
  `Eloquence` int(11) NOT NULL,
  `SexAbility` int(11) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `Flux` varchar(50) NOT NULL,
  `Categorie` varchar(200) NOT NULL,
  `Descendance` varchar(100) NOT NULL,
  `Groupe` int(11) NOT NULL,
  `Citation` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fiche`
--

INSERT INTO `fiche` (`id`, `Nom`, `visibilite`, `Arc`, `Titre`, `Image`, `Theme`, `Age`, `Sexe`, `Race`, `Ethnie`, `QdF`, `Maitrise`, `Strength`, `Defense`, `Sante`, `Endurance`, `Vitesse`, `Accuracy`, `Perception`, `Furtivite`, `Charisme`, `Eloquence`, `SexAbility`, `Link`, `Flux`, `Categorie`, `Descendance`, `Groupe`, `Citation`) VALUES
(69, 'Destra', 1, 1, 'Ecuyer de Chevalier Dragon', 'Image/Destra.jpg', 'The Reluctant Heroes', '16', 'Masculin', 'Humain', 'Augeois', 1500, 52, 57, 67, 1620, 1000, 48, 50, 55, 30, 44, 25, 34, 'description/Destra.txt', 'Destruction', 'Classe Promo Carmin R5', 'Artrish', 2, ''),
(68, 'Leest', 1, 1, 'Écuyère de Chevalier Dragon', 'Image/Leest.jpg', 'The Reluctant Heroes', '16', 'Féminin', 'Humaine', 'Augeoise', 1750, 62, 63, 55, 1300, 740, 45, 48, 50, 27, 28, 34, 52, 'description/Leest.txt', 'Création de Fer', 'Classe Promo Steelah R5', 'Goliath-Pura', 2, ''),
(67, 'Fahe', 1, 0, 'Professeur de Théorie', 'Image/Fahe.jpg', 'Aucun', 'Mort', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Fahe.txt', 'Création illusoire ', 'Professeur Mort', 'Pestia', 2, ''),
(66, 'Esra', 1, 1, 'Gerrier darjile', 'Image/Esra.jpg', 'Aucun', '17', 'Masculin', 'Humain', 'Augeois', 1700, 67, 58, 40, 1250, 700, 49, 50, 27, 32, 53, 34, 35, 'description/Esra.txt', 'Création électrique', 'Classe Promo Noble Abruti R7', 'Pestia-Drii', 2, ''),
(65, 'Axra ', 1, 1, 'Bourreau', 'Image/Axra.jpg', 'Aucun', '16', 'Masculin', 'Humain', 'Augeois', 1350, 58, 70, 47, 1380, 1110, 52, 42, 30, 40, 51, 35, 35, 'description/Axra.txt', 'Force Pure', 'Classe Promo R7', 'Pura', 2, ''),
(63, 'Liva', 1, 0, 'Ex-Chevalier', 'Image/Liva.jpg', 'Aucun', 'Morte', 'Féminin', 'Humaine', 'Augeoise', 1350, 56, 32, 36, 1300, 900, 57, 67, 38, 51, 44, 28, 41, 'description/Liva.txt', 'Invocation Sanguine', 'Classe Promo Mort R7', 'Aqua-Shizari-Yinva', 2, ''),
(64, 'Lato', 1, 1, 'Guerrier d\'Argile', 'Image/Lato.jpg', 'Aucun', '16', 'Masculin', 'Humain', 'Augeois', 1500, 70, 34, 40, 1200, 700, 42, 62, 39, 48, 25, 53, 40, 'description/Lato.txt', 'Création tornadique', 'Classe Promo R7', 'Lada', 2, ''),
(62, 'Hada', 1, 0, 'Professeur de combat', 'Image/Hada.jpg', 'Aucun', 'Mort', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Hada.txt', 'Création de glace ', 'Professeur Mort', 'Aqua-Lada', 2, ''),
(61, 'Kanna', 1, 1, 'Guerrière d\'Argile', 'Image/Kanna.jpg', 'Aucun', '16', 'Féminin', 'Humaine', 'Augeoise', 1310, 52, 30, 28, 1080, 920, 66, 60, 45, 58, 26, 36, 50, 'description/Kanna.txt', 'Création de Vent', 'Classe Promo R6', 'Lada', 2, ''),
(60, 'Adam', 1, 1, 'Gardien de Pierre / Adam au chevalier noir ?', 'Image/Adam.jpg', 'Aucun', '17', 'Masculin', 'Humain', 'Augeois', 1400, 60, 62, 65, 1530, 920, 28, 42, 52, 22, 45, 40, 42, 'description/Adam.txt', 'Création des flots', 'Classe Promo R6', 'Aqua', 2, ''),
(59, 'Lyra', 1, 1, 'Guerrière d\'Argile', 'Image/Lyra.jpg', 'Aucun', '16', 'Féminin', 'Humaine', 'Augeoise', 1000, 42, 59, 48, 1200, 1180, 58, 44, 63, 40, 35, 22, 30, 'description/Lyra.txt', 'Création Rocheuse', 'Classe Promo R7', 'Goliath', 2, ''),
(58, 'Xianos', 1, 1, 'Guerrière d\'Argile', 'Image/Xianos.jpg', 'Zinnia - Traditional Japanese Version', '16', 'Féminin', 'Humaine', 'Augeoise', 1320, 63, 39, 32, 1200, 840, 56, 62, 29, 61, 36, 37, 30, 'description/Xianos.txt', 'Air venimeux', 'Classe Promo Noble Apollyon R7', 'Lada-Shizari', 2, ''),
(57, 'Phillia', 1, 1, 'Gardienne de Pierre', 'Image/Phillia.jpg', 'Aucun', '16', 'Féminin', 'Humaine', 'Augeoise', 1700, 71, 26, 35, 1000, 840, 52, 58, 40, 28, 47, 53, 54, 'description/Phillia.txt', 'Limaille de Fer', 'Classe Promo R5', 'Goliath-Lada-Pura', 2, ''),
(56, 'Dali', 1, 0, 'Chevalier Dragon', 'Image/Dhali.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Dhali.txt', 'Création de Terre', 'Professeur R2', 'Aqua-Goliath', 2, ''),
(55, 'Nimha', 1, 0, 'Chevalier Dragon', 'Image/Nimha.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 2200, 82, 65, 72, 2520, 1540, 81, 78, 64, 75, 69, 65, 72, 'description/Nimha.txt', 'Création de flammes', 'Professeur R2', 'Drii', 2, ''),
(54, 'Zayath', 1, 1, 'Gardien de Pierre', 'Image/Zayath.jpg', 'Elden Ring Theme | Ultra Epic Extended Version', '16', 'Masculin', 'Humain', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Zayath.txt', 'Création d\'être tellurique', 'Joueur Classe Promo R6', 'Goliath-Guizamark', 2, ''),
(52, 'Shuri', 1, 1, 'Guerrière d\'Argile', 'Image/Shuri3.jpg', 'Radiance - Hollow Knight', '39', 'Asexué', 'Éternelle', 'Mudoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Shuri.txt', 'Flammes dévoreuses de flux', 'Joueur Classe Promo R7 Boobs Éternelle', 'Drii-Shizari', 2, ''),
(50, 'Gora', 1, 1, 'Guerrier d\'Argile', 'Image/Gora4.jpg', 'Ragnarok Official - Record of Ragnarok OST [ Shuumatsu No Valkyrie ]', '17', 'Masculin', 'Humain', 'Mudois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Gora.txt', 'Création Acier', 'Joueur Classe Promo Belinda R6', 'Goliath-Pura', 2, ''),
(53, 'Gira', 1, 1, 'Guerrière d\'Argile', 'Image/Gira.jpg', 'The Final Battle - Endwalker - FFXIV  ', '17', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Gira.txt', 'Création de chair', 'Joueur Classe Promo Bimbo Champs R7', 'Drii-Guizamark', 2, ''),
(70, 'Art. Drino II', 1, 1, 'Roi d\'Augeaime', 'Image/Driino.jpg', 'Cid Theme - Final Fantasy IX', '64', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Drino.txt', 'Flammes', 'Roi R1', 'Drii', 2, ''),
(72, 'Shiwa', 1, 0, 'Prêtresse de la Diablesse', 'Image/Shiwa.jpg', 'Aucun', 'Morte', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Shiwa.txt', 'Prédiction Funeste', 'Mort', 'Shizari', 2, ''),
(73, 'Riness', 1, 0, 'Mairesse de Urive', 'Image/Riness.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Riness.txt', 'Inconnu', 'Noble', 'Aucun', 2, ''),
(74, 'Ria', 1, 0, 'Aucun', 'Image/Ria.jpg', 'Aucun', 'Mort', 'Masculin', 'Humain', 'Augeois', 1140, 56, 42, 46, 1770, 760, 38, 48, 25, 26, 33, 25, 47, 'description/Ria.txt', 'Ébullition', 'Mort ATEL', 'Aqua-Drii', 2, ''),
(75, 'Pore', 1, 0, 'Membre du groupe Judy', 'Image/Pore2.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Humaine ?', 'Inconnu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Pore.txt', 'Inconnu', 'ATEL Judy', 'Aucun', 2, ''),
(76, 'Mugi', 1, 1, 'Esclave', 'Image/Mugi.jpg', 'Aucun', 'Mort', 'Masculin', 'Humain', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Mugi.txt', 'Aucun', 'Traître', 'Aucun', 2, ''),
(77, 'Vazalia', 1, 1, 'Ex-Titan', 'Image/Vazalia.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Humaine ?', 'Mudoise', 2400, 75, 75, 60, 2400, 1200, 78, 77, 72, 42, 65, 68, 70, 'description/Vazalia.txt', 'Inconnu', 'ATEL Sugawara', 'Yinva', 2, ''),
(78, 'Nojina', 1, 1, 'Chef de Sugawara', 'Image/Nojina.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Inconnu', 'Inconnu', 1380, 52, 62, 40, 2000, 1240, 55, 67, 75, 43, 73, 72, 68, 'description/Nojina.txt', 'Inconnu', 'ATEL Sugawara', 'Aucun', 2, ''),
(79, 'Oryo', 1, 1, 'Ponte de Sugawara', 'Image/Oryo.jpg', 'Guess Monster', 'Inconnu', 'Masculin', 'Inconnu', 'Inconnu', 1500, 63, 79, 100, 2100, 1160, 64, 77, 69, 46, 57, 63, 71, 'description/Oryo.txt', 'Inconnu', 'ATEL Sugawara', 'Aucun', 2, ''),
(80, 'Vagui', 1, 0, 'L\'Écorce Sanglante', 'Image/Vagui.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Vagui.txt', 'Invocation Boisée', 'R3 Noble Carmin', 'Aqua-Goliath-Yinva', 2, ''),
(81, 'Katia', 1, 0, 'La Géante Humaine', 'Image/Katia.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 1800, 62, 80, 68, 2370, 1500, 70, 65, 36, 30, 64, 58, 68, 'description/Katia.txt', 'Liquide Gris', 'R3 Noble', 'Aqua-Goliath', 2, ''),
(82, 'Sonila', 1, 0, 'L\'Antique Stratège', 'Image/Sonila.jpg', 'Aucun', '28', 'Féminin', 'Humaine', 'Augeoise', 2340, 71, 50, 44, 1620, 1060, 78, 66, 69, 74, 36, 63, 76, 'description/Sonila.txt', 'Ambre', 'R3 Professeur', 'Chronos-Goliath', 2, ''),
(83, 'Valaria', 1, 0, 'Femme Mystérieuse', 'Image/Valaria.jpg', 'Aucun', '27 ans', 'Féminin', 'Humaine', 'Augeoise', 2250, 72, 54, 63, 1600, 1200, 48, 78, 67, 68, 82, 70, 72, 'description/valaria.txt', 'Inconnu', '', 'Guizamark', 2, ''),
(84, 'Blanche', 1, 0, 'Bourgeoise', 'Image/Blanche.jpg', 'Aucun', 'On ne demande pas l\'âge d\'une Lady !', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Blanche.txt', 'Inconnu', 'Parent Noble', 'Aucun', 2, ''),
(85, 'Joestar', 1, 0, 'Bourgeois', 'Image/Joestar.jpg', 'Aucun', '58 ans', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Joestar.txt', 'Inconnu', 'Parent Noble', 'Aucun', 2, ''),
(86, 'Marie', 1, 0, 'Bourgeoise', 'Image/Marie.jpg', 'Aucun', '48', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Marie.txt', 'Inconnu', 'Parent Noble', 'Aucun', 2, ''),
(87, 'Levy', 1, 0, 'Bourgeois', 'Image/Levy.jpg', 'Aucun', '47', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Levy.txt', 'Inconnu', 'Parent Noble', 'Aucun', 2, ''),
(88, 'Refer', 1, 0, 'Bourgeois', 'Image/Refer.jpg', 'Aucun', '62', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Refer.txt', 'Effroi', 'Parent Noble', 'Shizari', 2, ''),
(89, 'Azaya', 1, 0, 'Bourgeoise', 'Image/Azaya.jpg', 'Aucun', '56', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Azaya.txt', 'Création Fleurie', 'Parent Noble', 'Aqua-Guizamark', 2, ''),
(90, 'Leaf', 1, 1, 'Égérie du Chaos', 'Image/Leaf.jpg', 'Guess Monster', 'Inconnu', 'Masculin', 'Inconnu', 'Inconnu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Leaf.txt', 'Fils de Métal', 'ATEL Guignol', 'Goliath-Pura', 2, ''),
(91, 'Shiya', 1, 1, 'Ponte des Guignols', 'Image/Shiya.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Inconnu', 'Inconnu', 2300, 80, 46, 38, 1850, 1020, 71, 84, 62, 73, 54, 63, 51, 'description/Shiya.txt', 'Inconnu', 'ATEL Guignol', 'Aucun', 2, ''),
(92, 'Elhanan', 1, 1, 'Ponte des Guignols', 'Image/Elhanan2.jpg', 'Guess Monster', 'Inconnu', 'Masculin', 'Inconnu', 'Inconnu', 3500, 17, 44, 60, 2280, 1160, 80, 73, 71, 52, 55, 53, 71, 'description/Elhanan.txt', 'Inconnu', 'ATEL Guignol', 'Aucun', 2, ''),
(93, 'Riza', 1, 0, 'Chef de Grand Oiseau', 'Image/Riza.jpg', 'Guess Monster', 'Inconnu', 'Masculin', 'Inconnu', 'Inconnu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Riza.txt', 'Création de plumes enflammées', 'ATEL Grand Oiseau', 'Aucun', 2, ''),
(94, 'Lula', 1, 1, 'Inconnu', 'Image/Lula.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Inconnu', 'Inconnu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Lula.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(95, 'Varo', 1, 1, 'Ponte de Madelon', 'Image/Varo.jpg', 'Guess Monster', 'Mort', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Varo.txt', 'Miroir', 'ATEL Madelon', 'Goliath', 2, ''),
(96, 'Anori', 1, 0, 'Aucun', 'Image/Anori.jpg', 'Aucun', '19', 'Féminin', 'Humaine', 'Mudoise', 1600, 62, 31, 24, 900, 840, 42, 58, 51, 36, 33, 27, 49, 'description/Anori.txt', 'Création Cométaire', '', 'Aqua-Chronos', 2, ''),
(97, 'La Momie', 1, 0, 'La Momie', 'Image/Momie.jpg', 'Aucun', 'Inconnu', 'Asexué', 'Éternelle', 'Edenien', 12500, 120, 35, 89, 7250, 1640, 88, 97, 95, 115, 12, 90, 100, 'description/Momie.txt', 'Inconnu', 'Éternelle', 'Aucun', 2, ''),
(98, 'Nary', 1, 0, 'La Merveille Belliqueuse', 'Image/Nary.jpg', 'Naruto Shippuuden - Flying Light', '23', 'Féminin', 'Humaine', 'Saxifranche', 1600, 60, 73, 52, 1500, 1080, 63, 54, 42, 32, 71, 68, 59, 'description/Nary.txt', 'Création de Mirage', '', 'Chronos-Pestia', 2, ''),
(99, 'Daal', 1, 0, 'Archélémentalist', 'Image/Daal.jpg', 'Zinnia - Traditional Japanese Version', '14', 'Masculin', 'Humaine', 'Mudois', 1500, 65, 52, 48, 1200, 800, 32, 55, 42, 25, 35, 40, 35, 'description/Daal.txt', 'Vent', 'Archélémentaliste', 'Lada', 2, ''),
(100, 'Sana', 1, 0, 'Noble Irisienne', 'Image/Sana.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Géante', 'Irisien', 0, 0, 72, 68, 2500, 800, 62, 40, 35, 21, 62, 47, 53, 'description/Sana.txt', 'Aucun', 'Géant', 'Aucun', 2, ''),
(101, 'Rizame', 1, 0, 'Roi d\'Irisia', 'Image/Rizame.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humaine', 'Irisien', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Rizame.txt', 'Inconnu', 'Roi', 'Aucun', 2, ''),
(102, 'Darana', 1, 0, 'La Chasseuse de Prime Noire', 'Image/Darana.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Irisienne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Darana.txt', 'Papier', 'Folle', 'Guizamark-Lada', 2, ''),
(103, 'Oga', 1, 0, 'Le Chasseur de Monstre Géant', 'Image/Oga.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Géant', 'Irisien', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Oga.txt', 'Aucun', 'Géant', 'Aucun', 2, ''),
(104, 'Liya', 1, 0, 'Sœur de Zayath', 'Image/Liya.jpg', 'Aucun', '24', 'Féminin ', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Liya.txt', 'Création Sableuse', 'Noble', 'Goliath-Lada', 2, ''),
(105, 'Lianos', 1, 0, 'Aucun', 'Image/Lianos.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Irisienne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Lianos.txt', 'Inconnu', '', 'Aucun', 2, ''),
(106, 'Liaciry', 1, 0, 'L\'Humain le plus fort de Saxifra', 'Image/Liaciry.jpg', 'Vocaloid Colosseum Instrumental', 'Inconnu', 'Masculin', 'Humaine', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Liaciry.txt', 'Inconnu', 'Froid', 'Aucun', 2, ''),
(107, 'Edrahil', 1, 0, 'Roi de Saxifra', 'Image/Edrahil.jpg', 'Vocaloid Colosseum Instrumental', 'Inconnu', 'Masculin', 'Géant', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Edrahil.txt', 'Aucun', 'Roi Géant', 'Aucun', 2, ''),
(108, 'Goliath', 1, 0, 'Aîné', 'Image/Goliath.jpg', 'Vocaloid Colosseum Instrumental', 'Inconnu', 'Masculin', 'Géant', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Twin.txt', 'Aucun', 'Abruti Géant', 'Aucun', 2, ''),
(109, 'Goliath', 1, 0, 'Aîné', 'Image/Goliath.jpg', 'Vocaloid Colosseum Instrumental', 'Inconnu', 'Masculin', 'Géant', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Twin.txt', 'Aucun', 'Abruti Géant', 'Aucun', 2, ''),
(110, 'Niwha', 1, 0, 'Archélémentaliste', 'Image/Niwha.jpg', 'Zinnia - Traditional Japanese Version', 'Inconnu', 'Féminin', 'Humaine', 'Mudoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Niwha.txt', 'Création d\'Eau / de Glace', 'Archélémentaliste', 'Aqua-Lada', 2, ''),
(111, 'Wanih', 1, 0, 'Archélémentaliste', 'Image/Wanih.jpg', 'Zinnia - Traditional Japanese Version', 'Inconnu', 'Masculin', 'Humain', 'Mudois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Wanih.txt', 'Création d\'Eau / de Glace', 'Archélémentaliste', 'Aucun', 2, ''),
(112, 'Pestia', 1, 0, 'Impératrice de la Lumière', 'Image/Pestia2.jpg', 'Zinnia - Traditional Japanese Version', 'Inconnu', 'Asexué', 'Dragon', 'Céleste', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Pestia.txt', 'Lumière Divine', 'Dragon Dieu', 'Pestia', 2, ''),
(113, 'Jiferci-Lapegi', 1, 0, 'L\'Œil d\'Artrish', 'Image/Jiferci Lapegi.jpg', 'Log Horizon 2 Main Theme ', 'Inconnu', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Jiferci.txt', 'Création Angélique', 'Noble R3', 'Guizamark-Lada', 2, ''),
(114, 'Lily', 1, 0, 'La Titan Ardente', 'Image/Lily.jpg', 'Log Horizon 2 Main Theme ', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Lily.txt', 'Création de Flammes', 'Noble R3', 'Drii', 2, ''),
(115, 'Émeraude', 1, 0, 'La Brise du Rosier', 'Image/Emeraude.jpg', 'Aucun', '30 ans', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Émeraude.txt', 'Création de Vent', 'R2', 'Lada', 2, ''),
(116, 'Requin', 1, 0, 'Le Trident d\'Aqua', 'Image/Requin.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Requin.txt', 'Création d\'Eau', 'R2', 'Aqua', 2, ''),
(117, 'Taka', 1, 0, 'Fils de Refer', 'Image/Taka.jpg', 'Aucun', 'Mort', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Taka.txt', 'Créateur de Cristaux', 'R4 Noble', 'Goliath-Pestia', 2, ''),
(118, 'Aliya', 1, 0, 'Fille de Carmin', 'Image/Aliya.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Aliya.txt', 'Invocation Armée', 'R5 Carmin', 'Yinva', 2, ''),
(119, 'Lira', 1, 0, 'Cheffe des Chevaliers des Flammes', 'Image/Lira.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Lira.txt', 'Création Chaleureuse', 'R4 Noble', 'Drii-Lada', 2, ''),
(120, 'Sero', 1, 0, 'Fils de Carmin', 'Image/Sero.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Sero.txt', 'Invocation Armée', 'Carmin R4', 'Yinva', 2, ''),
(121, 'Epza', 1, 0, 'Chevalière des Flammes', 'Image/Epza.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'None', 'Création Vénimeuse', 'R4 Abruti', 'Aqua-Shizari', 2, ''),
(122, 'Kuza', 1, 0, 'Scientifique d\'Augeaime', 'Image/Kuza.jpg', 'Aucun', '35', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Kuza.txt', 'Inconnu', '', 'Aucun', 2, ''),
(123, 'Hélio', 1, 0, 'Scientifique d\'Edenia', 'Image/Helio.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humain', 'Edenien', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Hélio.txt', 'Inconnu', '', 'Aucun', 2, ''),
(124, 'La Juge', 1, 0, 'Garde du Corps d\'Edenia', 'Image/Juge.jpg', 'Aucun', 'Inconnu', 'Asexué', 'Eternelle', 'Edenienne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Juge.txt', 'Inconnu', 'Éternelle', 'Aucun', 2, ''),
(125, 'Rig', 1, 1, 'Chevalier des Flammes', 'Image/Rig.jpg', 'Aucun', '24', 'Masculin', 'Humain', 'Mudois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Rig.txt', 'Inconnu', 'R4', 'Aucun', 2, ''),
(126, 'Shishi', 1, 0, 'Colporteuse de Rumeur', 'Image/Shishi.jpg', 'Aucun', '15', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Shishi.txt', 'Lumière', 'Journaliste', 'Pestia', 2, ''),
(127, 'Toda', 1, 0, 'Garde du Corps de Mudan', 'Image/Toda.jpg', 'Zinnia - Traditional Japanese Version', 'Inconnu', 'Masculin', 'Humaine', 'Mudois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Toda.txt', 'Inconnu', 'Archélémentaliste', 'Aucun', 2, ''),
(128, 'Zaw', 1, 0, 'Servante de Pestia', 'Image/Zaw.jpg', 'Aucun', 'Inconnu (25-30 ans)', 'Asexué', 'Éternelle', 'Mudoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Zaw.txt', 'Création de Bras', 'Eternelle, Éternelle', 'Guizamark', 2, ''),
(129, 'Wakutia', 1, 0, 'Imprimeuse', 'Image/Wakutia.jpg', 'Aucun', 'Inconnu (Trentaine)', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Wakutia.txt', 'Création Lumineuse', '', 'Pestia', 2, ''),
(130, 'Kaito', 0, 0, 'Mercenaire', 'Image/Killian.jpg', 'Aucun', '23', 'Masculin', 'Humain', 'Augeois', 1000, 45, 52, 55, 1520, 980, 32, 41, 45, 28, 51, 40, 42, 'None', 'Création de Chaleur', 'Invité', 'Drii-Lada', 2, ''),
(131, 'Bael', 1, 0, 'Écarlate / Maître d\'Armes', 'Image/Bael.jpg', 'Aucun', 'Trentaine', 'Masculin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Bael.txt', 'Invocation Armée', 'R2 Carmin Écarlate', 'Yinva', 2, ''),
(132, 'Zapo', 1, 0, 'Le Diable', 'Image/Zapo.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Zapo.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(133, 'Puda', 1, 0, 'Médecin', 'Image/Puda.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Puda.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(134, 'Alu', 1, 0, 'Brigande de Madelon', 'Image/Alu.jpg', 'Guess Monster', 'Dans la vingtaine', 'Féminin', 'Humaine ?', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Alu.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(135, 'Jiza', 1, 0, 'Brigand Madelon', 'Image/Jiza.jpg', 'Guess Monster', 'Dans la vingtaine', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Jiza.txt', 'Explosion', 'ATEL Madelon', 'Drii', 2, ''),
(136, 'Lishi', 1, 0, 'Brigande de Madelon', 'Image/Lishi.jpg', 'Guess Monster', 'Dans la fin de la vingtaine', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Lishi.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(137, 'Poto', 1, 0, 'Brigande de Madelon', 'Image/Poto.jpg', 'Guess Monster', 'Dans la trentaine', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Poto.txt', 'Inconnu', 'ATEL Madelon', 'Inconnu', 2, ''),
(138, 'Sellu', 1, 0, 'Brigande de Madelon', 'Image/Sellu.jpg', 'Guess Monster', 'Morte', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Sellu.txt', 'Création de Sommeil', 'ATEL Madelon', 'Artrish', 2, ''),
(139, 'Yinshi', 1, 0, 'Brigande de Madelon', 'Image/Yinshi.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Humaine', 'Irisienne', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Yinshi.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(140, 'Zarashi', 1, 0, 'Brigand Madelon', 'Image/Zarashi.jpg', 'Guess Monster', 'Dans la vingtaine', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Zarashi.txt', 'Inconnu', 'ATEL Madelon', 'Aucun', 2, ''),
(141, 'Gamma', 1, 0, 'Peintre', 'Image/Gamma.jpg', 'Aucun', 'Dans la trentaine', 'Masculin', 'Humaine', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Gamma.txt', 'Inconnu', '', 'Aucun', 2, ''),
(142, 'Sera', 1, 0, 'Enquêtrice', 'Image/Sera.jpg', 'Aucun', 'Dans la trentaine', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Sera.txt', 'Inconnu', '', 'Aucun', 2, ''),
(143, 'Eadric', 0, 0, 'Le Petit Forgeron', 'Image/Censor.jpg', 'Aucun', 'Inconnu', 'Masculin', 'Humain', 'Saxifranc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Eadric.txt', 'Inconnu', 'Forgeron', 'Goliath', 2, ''),
(144, 'Dario Bianchi', 1, 1, 'Vieux Briscard', 'Image/Dario.jpg', 'Clavar La Espada - Bleach', '32', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'None', 'Créateur de Vent', 'Mercenaire', 'Lada', 2, ''),
(145, 'Aze', 1, 1, 'Mercenaire', 'Image/Aze.jpg', 'None', 'Fin de la Vingtaine', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Aze.txt', 'Création de Glace', '', 'Aqua-Lada', 3, 'Je sais ce que j\'ai à faire, pas besoin de vous répéter.'),
(146, 'Naza', 1, 1, 'Éternelle d\'ATEL', 'Image/Naza.jpg', 'Guess Monster', 'Entre 50 et 60 ans', 'Asexué', 'Éternelle', 'Mudois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Naza.txt', 'Création de balle sismique', '', 'Artrish-Pura', 4, 'Vous n\'avez souffert que d\'une ONCE de notre douleur.'),
(147, 'Zara', 1, 1, 'Mercenaire', 'Image/Zara.jpg', 'Aucun', 'Dans la trentaine', 'Féminin', 'Humaine', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Zara.txt', 'Création Herculéenne', '', 'Guizamark-Pura', 3, 'Partez d\'ici, vous ne ferez que me gêner !'),
(148, 'Kakania', 1, 1, 'Membre d\'ATEL', 'Image/Kakania.jpg', 'Guess Monster', 'Inconnu', 'Féminin', 'Humain', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Kakania.txt', 'Création de ???', '', 'Aucun', 4, 'Un chapeau en place, un joli sourire, un plan bien ficelé, la victoire est à moi.'),
(149, 'Vaku', 1, 1, 'Membre d\'ATEL', 'Image/Vaku.jpg', 'Guess Monster', 'Inconnu', 'Masculin', 'Humain', 'Augeois', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Vaku.txt', 'Inconnu', '', 'Aucun', 4, 'Qui que vous soyez, fuyez, vous n\'atteindrez pas votre but tant que je suis vivant.'),
(150, 'Agui', 1, 1, 'Mercenaire', 'Image/Agui.jpg', 'Aucun', 'Inconnu', 'Féminin', 'Humain ?', 'Augeoise', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'description/Agui.txt', 'Inconnu', '', 'Aucun', 3, 'Lève une seule fois ton arme, et tu passeras de potentiel client à mangeur de racines.  '),
(151, 'Titan', 1, 0, 'Le premier', 'Image/Censor.jpg', 'Inconnu', 'Beaucoup', 'Masculin', 'Géant', 'Inconnu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'None', 'Aucun', '', 'Aucun', 5, 'Aeteria... Tu as... Tant changé...');

-- --------------------------------------------------------

--
-- Table structure for table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(11) NOT NULL,
  `Identifiant` varchar(100) NOT NULL,
  `MotDePasse` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Casque` varchar(100) NOT NULL,
  `Plastron` varchar(100) NOT NULL,
  `Gantelets` varchar(100) NOT NULL,
  `Jambieres` varchar(100) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `Flux` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Sexe` varchar(50) NOT NULL,
  `Race` varchar(50) NOT NULL,
  `Ethnie` varchar(50) NOT NULL,
  `QdF` int(11) NOT NULL,
  `Maitrise` int(11) NOT NULL,
  `MaitriseAlternative` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `Sante` int(11) NOT NULL,
  `Endurance` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `Accuracy` int(11) NOT NULL,
  `Perception` int(11) NOT NULL,
  `Furtivite` int(11) NOT NULL,
  `Charisme` int(11) NOT NULL,
  `Eloquence` int(11) NOT NULL,
  `SexAbility` int(11) NOT NULL,
  `Droit` int(11) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `Groupe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `joueurs`
--

INSERT INTO `joueurs` (`id`, `Identifiant`, `MotDePasse`, `Image`, `Nom`, `Titre`, `Casque`, `Plastron`, `Gantelets`, `Jambieres`, `Theme`, `Flux`, `Age`, `Sexe`, `Race`, `Ethnie`, `QdF`, `Maitrise`, `MaitriseAlternative`, `Strength`, `Defense`, `Sante`, `Endurance`, `Vitesse`, `Accuracy`, `Perception`, `Furtivite`, `Charisme`, `Eloquence`, `SexAbility`, `Droit`, `Link`, `Groupe`) VALUES
(1, 'A', '', 'Image/Shuri3.jpg', 'Shuri', 'Guerrière d\'Argile', 'Heaume en Acier', 'Plastron en Tungstène', 'Gantelets en Acier', 'Jambières en Acier', 'Radiance - Hollow Knight', 'Création de flammes entropiques', '39', 'Féminin', 'Éternelle', 'Mudoise', 1365, 64, 2, 50, 36, 1095, 1000, 50, 50, 47, 51, 53, 32, 38, 2, 'description/Shuri2.txt', 4),
(2, 'B', '', 'Image/Beal.jpg', 'Ryry', 'Dieu', 'Heaume en Aucellum', 'None', 'None', 'Jambières en Acier', 'Haiiro to Ao', '0B0D0F0H0I0K0L0M0N0P0Q1A1C1E1G1J1O', '20', 'Masculin', 'Démiurge', 'Céleste', 65536, 999, 800, 999, 999, 65536, 65536, 999, 999, 999, 999, 999, 999, 999, 1, 'description/Hugo.txt', 1),
(3, 'C', '', 'Image/Gora4.jpg', 'Gora', 'Guerrier d\'Argile', 'Heaume en Acier', 'Plastron en Acier', 'Gantelets en Fabuliath', 'Jambières en Acier', 'Ragnarok Official - Record of Ragnarok OST [ Shuumatsu No Valkyrie ] Jack the Reaper', 'Création Acier', '17', 'Masculin', 'Humain', 'Mudois', 1230, 61, 0, 60, 50, 1320, 1000, 41, 37, 48, 36, 27, 35, 40, 2, 'description/Gora.txt', 3),
(12, 'D', '', 'Image/Elhanan.jpg', 'Élhanan', 'Le Négociateur', 'None', 'Sac à Dos', 'None', 'None', 'Megalo Strike Back', 'Invocation Génésiaque', '21', 'Masculin', 'Humain', 'Augeois', 3500, 1, 0, 1, 1, 2280, 1160, 1, 1, 1, 1, 1, 1, 1, 2, 'description/Elhanan.txt', 2),
(4, 'E', '', 'Image/Zayath.jpg', 'Zayath', 'Gardien de Pierre', 'Heaume en Aucellum', 'Plastron en Acier', 'Gantelets en Aucellum', 'Jambières en Acier', 'Elden Ring Theme | Ultra Epic Extended Version', 'Création d être tellurique', '16', 'Masculin', 'Humain', 'Saxifranc', 1270, 61, 1, 50, 34, 1260, 900, 50, 50, 36, 55, 40, 50, 36, 2, 'description/Zayath.txt', 3),
(6, 'F', '', 'Image/Gira2.jpg', 'Gira', 'Guerrière d\'Argile', 'Casque en cuir fourré', 'Plastron en Cuir Fourré', 'Brassards en cuir fourrés', 'Bottes de cuir fourrées', 'The Final Battle - Endwalker - FFXIV  ', 'Création d\'être charnel', '17', 'Féminin', 'Humaine', 'Augeoise', 1590, 62, 1, 32, 29, 1185, 720, 62, 60, 30, 25, 49, 33, 53, 2, 'description/Gira.txt', 4),
(5, 'G', '', 'Image/Manon.png', 'Manon', 'Disciple de Winry', '', '', '', '', 'Bleach - Invasion', 'Vent', '20', 'Féminin', 'Humaine', 'Augeois', 1350, 50, 0, 50, 22, 500, 1000, 60, 70, 55, 70, 35, 45, 38, 2, 'description/Manon.txt', 1),
(7, 'H', '', 'Image/Censor.jpg', 'Markra', 'Aucun', '', '', '', '', 'Aucun', 'Force Pure', '', '', 'Humain', 'Augeois', 1650, 66, 0, 53, 67, 1650, 910, 35, 28, 42, 35, 64, 51, 32, 2, 'description/', 2),
(8, 'I', '', 'Image/Mortus.png', 'Mortus', 'Abatteur de Gravité', '', 'Plastron en Aucellum', 'Gantelets en Aucellum', 'Jambières en Fabuliath', 'Conjunction of the Spheres', 'Onde de Choc', '32', 'Masculin', 'Humain', 'Augeois', 1750, 60, 0, 45, 45, 1650, 880, 50, 52, 50, 30, 50, 35, 48, 2, 'description/Mortus.txt', 3),
(11, 'Invité', 'Invitation', 'Image/Xianos.jpg', 'Xianos', 'Guerrière d\'Argile', 'Heaume en Acier', 'Plastron en Acier', 'Gantelets en Acier', 'Jambières en Acier', 'Zinnia - Traditional Japanese Version', 'Air venimeux', '16', 'Féminin', 'Humaine', 'Augeoise', 1200, 53, 0, 35, 25, 1200, 640, 52, 50, 27, 50, 36, 37, 30, 2, 'description/Xianos.txt', 2),
(13, 'K', '', 'Image/Dario.jpg', 'Dario Bianchi', 'Vieux Briscard', 'Casque en cuir', 'Plastron en Aucellum', 'Brassards en cuir', 'Bottes de cuir', 'Clavar La Espada - Bleach', 'Créateur de Vent', '32', 'Masculin', 'Humain', 'Augeois', 1100, 40, 0, 40, 30, 950, 900, 60, 50, 55, 50, 50, 40, 60, 2, 'description/dario.txt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `objets`
--

CREATE TABLE `objets` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rarete` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `appartenance` varchar(100) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objets`
--

INSERT INTO `objets` (`id`, `nom`, `type`, `rarete`, `poids`, `appartenance`, `localisation`, `description`) VALUES
(26, 'Plume', 'Important', 5, 0, 'Gora', 'Coffre', 'description/plume.txt'),
(53, 'Dague en Acier', 'Arme', 1, 1, 'Zayath', 'Coffre', 'description/dagueAcier.txt'),
(54, 'Épée en Acier', 'Arme', 1, 1, 'Ryry', 'Coffre', 'description/épéeacier.txt'),
(55, 'Épée en Acier', 'Arme', 1, 1, 'Shuri', 'Cheval', 'description/épéeacier.txt'),
(56, 'Dague en Acier', 'Arme', 1, 1, 'Zayath', 'Coffre', 'description/DagueAcier.txt'),
(57, 'Casque en Cuir fourré', 'Armure', 1, 1, 'Ryry', 'Coffre', 'description/casqueCuirFouree.txt'),
(58, 'Plastron en Cuir fourré', 'Armure', 1, 1, 'Ryry', 'Coffre', 'description/plastronCuirFouree.txt'),
(59, 'Brassards en cuir fourrés', 'Armure', 1, 1, 'Ryry', 'Coffre', 'description/brassardCuirFouree.txt'),
(60, 'Bottes de Cuir fourrées', 'Armure', 1, 1, 'Ryry', 'Porté', 'description/bottesCuirFouree.txt'),
(61, 'Bottes de Cuir Fourrées', 'Armure', 1, 1, 'Gira', 'Porté', 'description/bottesCuirFouree.txt'),
(62, 'Plastron en Cuir Fourré', 'Armure', 1, 1, 'Gira', 'Porté', 'description/plastronCuirFouree.txt'),
(63, 'Casque en Cuir Fourré', 'Armure', 1, 1, 'Gira', 'Porté', 'description/casqueCuirFouree.txt'),
(64, 'Plastron en Cuir', 'Armure', 1, 1, 'Gora', 'Coffre', 'description/plastronCuir.txt'),
(65, 'Heaume en Acier', 'Armure', 1, 1, 'Gora', 'Porté', 'description/casqueAcier.txt'),
(66, 'Gantelets en Tungstène', 'Armure', 2, 1, 'Gora', 'Coffre', 'description/brassardTungstène.txt'),
(67, 'Plastron en Cuir', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/plastronCuir.txt'),
(68, 'Heaume en Acier', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/casqueAcier.txt'),
(69, 'Clé de la Maison', 'Autre', 1, 0, 'Zayath', 'Coffre', 'description/cle.txt'),
(70, 'Clé de la Maison', 'Autre', 1, 0, 'Shuri', 'Porté', 'description/cle.txt'),
(75, 'Brassards en cuir Fourrés', 'Armure', 1, 1, 'Gira', 'Porté', 'description/brassardCuirFouree.txt'),
(78, 'Outils de couture', 'Outil', 1, 0, 'Gira', 'Porté', 'description/couture.txt'),
(79, 'Ficelle de couture', 'Matériaux', 1, 0, 'Gira', 'Porté', 'description/ficelle.txt'),
(80, 'Matériel de Pêche', 'Outil', 1, 1, 'Gora', 'Coffre', 'description/peche.txt'),
(81, '11 appats', 'Matériaux', 1, 0, 'Gora', 'Coffre', 'description/appat.txt'),
(82, 'Fiole vide', 'Fiole', 1, 1, 'Zayath', 'Coffre', 'description/fiole.txt'),
(83, 'Couteau de Trappeur', 'Outil', 1, 0, 'Zayath', 'Porté', 'description/couteau.txt'),
(84, 'Sac de Nourriture Gira', 'Sac', 1, 1, 'Gira', 'Sac', 'description/sacNourriture.txt'),
(85, 'Sac de Nourriture Gora', 'Sac', 1, 1, 'Gora', 'Sac', 'description/sacNourriture.txt'),
(86, 'Sac de Nourriture Zayath', 'Sac', 1, 1, 'Zayath', 'Cheval', 'description/sacNourriture.txt'),
(87, 'Sac de Nourriture Shuri', 'Sac', 1, 1, 'Shuri', 'Sac', 'description/sacNourriture.txt'),
(89, 'Carquois', 'Munition', 1, 0, 'Zayath', 'Nihma', 'description/carquois.txt'),
(90, 'Bocle en Acier', 'Arme', 1, 1, 'Gora', 'Coffre', 'description/bocleAcier.txt'),
(91, 'Bocle en Tungstène', 'Arme', 2, 1, 'Gora', 'Coffre', 'description/bocleTungstene.txt'),
(92, 'Bouclier Nordique en Bois Brut', 'Arme', 1, 1, 'Zayath', 'Coffre', 'description/bouclierNordique.txt'),
(94, '14 Flèches en Acier', 'Munition', 1, 0, 'Zayath', 'Nihma', 'description/flècheAcier.txt'),
(97, 'Canasson', 'Animal', 1, 0, 'Gira', 'Cheval', 'description/Cheval.txt'),
(101, 'Faux Seins', 'Important', 2, 0, 'Shuri', 'Porté', 'description/rembourrage.txt'),
(105, 'Set de campement + Couette', 'Outil', 1, 1, 'Gira', 'Cheval', 'description/campement.txt'),
(108, 'Jambières en Acier', 'Armure', 4, 1, 'Ryry', 'Coffre', 'description/bottesAcier.txt'),
(109, 'Bottes de Cuir', 'Armure', 5, 1, 'Ryry', 'Sac', 'description/bottesCuir.txt'),
(110, 'Plastron en Aucellum', 'Armure', 3, 2, 'Mortus', 'Porté', 'description/plastronAucellum.txt'),
(111, 'Gantelets en Aucellum', 'Armure', 3, 1, 'Mortus', 'Porté', 'description/brassardAucellum.txt'),
(112, 'Jambières en Fabuliath', 'Armure', 3, 1, 'Mortus', 'Porté', 'description/bottesFabuliath.txt'),
(113, 'Sac de Nourriture Z', 'Sac', 5, 1, 'Ryry', 'Sac', 'description/sacNourriture.txt'),
(114, 'Sac de Nourriture Y', 'Sac', 5, 1, 'Ryry', 'Coffre', 'description/sacNourriture.txt'),
(115, 'Bottes de Cuir', 'Armure', 1, 1, 'Gora', 'Coffre', 'description/bottesCuir.txt'),
(116, 'Masse en Iridium', 'Arme', 3, 1, 'Ryry', 'Porté', 'description/masseIridium.txt'),
(117, 'Dague Aucellum', 'Arme', 3, 1, 'Zayath', 'Coffre', 'description/dagueAucellum.txt'),
(118, 'Arbalète', 'Arme', 1, 2, 'Gira', 'Porté', 'description/arbalète.txt'),
(119, '23 Carreaux', 'Munition', 1, 0, 'Gira', 'Porté', 'None'),
(120, '16 flèches en acier', 'Munition', 1, 0, 'Shuri', 'Porté', 'None'),
(121, 'Arc en Bois', 'Arme', 1, 2, 'Shuri', 'Porté', 'description/arc.txt'),
(122, '10 Flèches en Aucellum', 'Munition', 3, 0, 'Shuri', 'Porté', 'description/flechesAucellum.txt'),
(123, 'Anneau doré', 'Armure', 3, 0, 'Shuri', 'Porté', 'description/anneauOrPierre.txt'),
(124, 'Set de Campement + Couette', 'Outil', 1, 1, 'Shuri', 'Cheval', 'description/campement.txt'),
(125, 'Luth Super Léger', 'Autre', 2, 0, 'Gora', 'Porté', 'description/luth.txt'),
(126, 'Bottes de cuir', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/bottesCuir.txt'),
(127, 'Brassards en cuir', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/brassardsCuir.txt'),
(128, 'Os de secours', 'Matériaux', 1, 0, 'Gira', 'Porté', 'None'),
(131, 'Jacquie V', 'Animal', 1, 0, 'Shuri', 'Cheval', 'description/Cheval.txt'),
(132, 'Hache en os Noir ornée de Refher', 'Arme', 5, 1, 'Gora', 'Coffre', 'description/hacheRefer.txt'),
(133, 'Glaive en Aucellum ornée de Refher', 'Arme', 4, 1, 'Zayath', 'Coffre', 'description/glaiveRefer.txt'),
(135, 'Heaume en Aucellum', 'Armure', 3, 1, 'Ryry', 'Sac', 'description/casqueAucellum.txt'),
(136, 'Heaume en Fabuliath', 'Armure', 3, 1, 'Ryry', 'Coffre', 'description/casqueFabuliath.txt'),
(137, 'Jambières en Acier', 'Armure', 1, 1, 'Gora', 'Porté', 'description/bottesAcier.txt'),
(138, 'Affaires de Liva', 'Important', 5, 1, 'Gora', 'Coffre', 'description/affaireLiva.txt'),
(139, 'Épée de Liva', 'Important', 5, 1, 'Gora', 'Coffre', 'description/livaSword.txt'),
(141, 'Canasson', 'Animal', 1, 0, 'Gora', 'Cheval', 'description/Cheval.txt'),
(142, 'Heaume en Acier', 'Armure', 1, 1, 'Xianos', 'Porté', 'description/casqueAcier.txt'),
(143, 'Plastron en Acier', 'Armure', 1, 2, 'Xianos', 'Porté', 'description/plastronAcier.txt'),
(144, 'Jambières en Acier', 'Armure', 1, 1, 'Xianos', 'Porté', 'description/bottesAcier.txt'),
(145, 'Gantelets en Acier', 'Armure', 1, 1, 'Xianos', 'Porté', 'description/brassardAcier.txt'),
(146, 'Lyre', 'Important', 2, 1, 'Xianos', 'Coffre', 'description/Lyre.txt'),
(147, 'Gantelets en Aucellum', 'Armure', 3, 1, 'Zayath', 'Porté', 'description/brassardAucellum.txt'),
(149, 'Boîte à Zérisson', 'Outil', 1, 1, 'Gora', 'Coffre', 'description/cageZerisson.txt'),
(150, 'Boîte à Zérisson', 'Outil', 1, 1, 'Zayath', 'Nihma', 'description/cageZerisson.txt'),
(152, 'Mégalodon', 'Animal', 5, 4, 'Ryry', 'Cheval', 'None'),
(153, 'Set de campement + Couette', 'Outil', 1, 1, 'Gora', 'Cheval', 'description/campement.txt'),
(155, 'Sac de Nourriture X', 'Sac', 1, 1, 'Élhanan', 'Porté', 'description/sacNourriture.txt'),
(156, 'Sac à Dos', 'Armure', 1, 1, 'Élhanan', 'Porté', 'description/sacADos.txt'),
(157, 'Fiole de Feu', 'Fiole', 2, 1, 'Élhanan', 'Porté', 'description/fiole.txt'),
(158, 'Fiole de Gaz', 'Fiole', 2, 1, 'Élhanan', 'Porté', 'description/fiole.txt'),
(159, 'Fiole d\'Eau', 'Fiole', 2, 1, 'Élhanan', 'Porté', 'description/fiole.txt'),
(160, 'Fiole d\'Éclairs', 'Fiole', 3, 1, 'Élhanan', 'Porté', 'description/fiole.txt'),
(161, 'Dague en Aucellum', 'Arme', 3, 1, 'Élhanan', 'Porté', 'description/dagueAucellum.txt'),
(162, 'Esclave Géant Irisien', 'Animal', 3, 0, 'Élhanan', 'Cheval', 'description/Cheval.txt'),
(163, 'Carnet de note', 'Important', 4, 1, 'Élhanan', 'Coffre', 'description/carnetSecret.txt.txt'),
(166, 'Marteau Rustique en Bois', 'Arme', 1, 1, 'Gira', 'Cheval', 'description/marteauRustique.txt'),
(167, 'Corde de 5 mètres', 'Outil', 1, 1, 'Gora', 'Cheval', 'description/cle.txt'),
(168, 'Silex et Fer', 'Outil', 1, 0, 'Zayath', 'Coffre', 'description/silex.txt'),
(169, 'Gant pour Zérisson', 'Outil', 2, 1, 'Tous', 'Commun', 'description/gantZerisson.txt'),
(170, 'Corde de 10 mètres', 'Outil', 1, 1, 'Zayath', 'Coffre', 'description/cle.txt'),
(171, 'Flûte', 'Autre', 1, 1, 'Gora', 'Coffre', 'description/flute.txt'),
(172, 'Boullier', 'Autre', 1, 1, 'Zayath', 'Coffre', 'description/boullier.txt'),
(173, 'Sac à Dos', 'Armure', 1, 1, 'Gora', 'Cheval', 'description/sacADos.txt'),
(174, 'Sac à Dos', 'Armure', 1, 1, 'Zayath', 'Cheval', 'description/sacADos.txt'),
(175, 'Sac à Dos', 'Armure', 5, 1, 'Ryry', 'Coffre', 'description/sacADos.txt'),
(176, 'Trousse de Soin', 'Outil', 1, 1, 'Shuri', 'Sac', 'description/medkit.txt'),
(177, 'Trousse de Soin', 'Outil', 1, 1, 'Gora', 'Porté', 'description/medkit.txt'),
(178, 'Set de Campement + Couette', 'Outil', 1, 1, 'Zayath', 'Cheval', 'description/campement.txt'),
(179, 'Lance en Acier', 'Arme', 1, 2, 'Ryry', 'Coffre', 'description/LanceAcier.txt'),
(180, 'Pendentif en Argent Saxifranc', 'Autre', 3, 0, 'Shuri', 'Porté', 'description/pendentifShuri.txt'),
(181, 'Carte au Trésor', 'Important', 2, 1, 'Gira', 'Sac', 'description/CarteAuTresor.txt'),
(182, 'Sac à Dos', 'Armure', 1, 1, 'Shuri', 'Sac', 'description/sacADos.txt'),
(187, '0 Tokens', 'Autre', 1, 0, 'Gira', 'Porté', 'description/Token.txt'),
(188, 'Jambières en Acier', 'Armure', 1, 1, 'Shuri', 'Porté', 'description/bottesAcier.txt'),
(189, 'Jeu de carte', 'Autre', 1, 0, 'Shuri', 'Porté', 'description/jeuCartes.txt'),
(190, 'Corde de 2m', 'Outil', 1, 1, 'Shuri', 'None', 'description/cle.txt'),
(194, 'Plastron en Acier', 'Armure', 1, 2, 'Gora', 'Porté', 'description/plastronAcier.txt'),
(195, 'Lanterne Magique', 'Outil', 1, 1, 'Zayath', 'Coffre', 'description/lanterneMagique.txt'),
(196, 'Lanterne Magique', 'Outil', 1, 1, 'Gora', 'Coffre', 'description/lanterneMagique.txt'),
(197, 'Canasson', 'Animal', 1, 0, 'Zayath', 'Cheval', 'description/Cheval.txt'),
(199, 'Fiole de Feu', 'Fiole', 1, 1, 'Ryry', 'Porté', 'description/fiole.txt'),
(200, 'Fiole d\'Huile', 'Munition', 1, 1, 'Dario', 'Sac', 'description/cle.txt'),
(201, 'Fiole d\'Huile', 'Munition', 1, 1, 'Ryry', 'Porté', 'description/huile.txt'),
(202, 'Fiole de Feu', 'Fiole', 1, 1, 'Zayath', 'Coffre', 'description/fiole.txt'),
(203, 'Un rocher très lourd', 'Important', 3, 3, 'Tous', 'Commun', 'description/cle.txt'),
(206, 'Plastron en Acier', 'Armure', 1, 2, 'Gira', 'Porté', 'description/plastronAcier.txt'),
(208, 'Petit Bois', 'Matériaux', 1, 1, 'Shuri', 'Sac', 'description/cle.txt'),
(209, 'Lanterne de Flux Usée', 'Outil', 2, 1, 'Zayath', 'Coffre', 'description/lanterneMagique.txt'),
(210, 'Kit de Soin', 'Outil', 1, 1, 'Gora', 'Coffre', 'description/medkit.txt'),
(211, 'Hache de Bucheron en Fer', 'Arme', 1, 2, 'Zayath', 'Mugi', 'description/hacheFer.txt'),
(212, 'Badge de la Guilde des Chasseurs', 'Autre', 3, 0, 'Ryry', 'Sac', 'description/badgeChasseurs.txt'),
(213, 'Badge de la Guilde des Chasseurs', 'Autre', 1, 0, 'Ryry', 'Coffre', 'description/badgeChasseurs.txt'),
(214, 'Tube en Cuivre', 'Important', 5, 1, 'Zayath', 'Coffre', 'None'),
(215, 'Gantelets en Acier', 'Armure', 1, 1, 'Shuri', 'Porté', 'description/brassardAcier.txt'),
(216, 'Jambières en Acier', 'Armure', 1, 1, 'Zayath', 'Porté', 'description/bottesAcier.txt'),
(217, 'Tenue de Civil', 'Armure', 1, 2, 'Zayath', 'Coffre', 'description/civil.txt'),
(218, 'Pierre à Aiguiser', 'Outil', 1, 1, 'Zayath', 'Coffre', 'description/clé.txt'),
(219, 'Heaume en Acier', 'Armure', 1, 1, 'Shuri', 'Porté', 'description/casqueAcier.txt'),
(220, 'Gantelets en Acier', 'Armure', 1, 1, 'Ryry', 'Porté', 'description/brassardAcier.txt'),
(225, 'Fiole de Glace', 'Fiole', 3, 1, 'Shuri', 'None', 'description/fiole.txt'),
(226, 'Fiole de Brouillard', 'Fiole', 2, 1, 'Zayath', 'Porté', 'description/fiole.txt'),
(227, 'Fiole de Brouillard', 'Fiole', 3, 1, 'Gora', 'Sac', 'description/fiole.txt'),
(228, 'Fiole de Force Pure', 'Fiole', 1, 1, 'Ryry', 'Sac', 'description/fiole.txt'),
(229, 'Fiole de Flammes Entropiques #1', 'Fiole', 1, 1, 'Gora', 'Coffre', 'description/fiole.txt'),
(230, '10 Bouteilles de Vin', 'Nourriture', 1, 10, 'Gora', 'Coffre', 'description/cle.txt'),
(232, '4 Fioles Vides', 'Fiole', 1, 4, 'Zayath', 'Coffre', 'description/fiole.txt'),
(233, '2 Bouteilles de Vin', 'Nourriture', 1, 2, 'Dario Bianchi', 'Cheval', 'description/cle.txt'),
(235, 'Livre sur l\'Amélioration de son Flux', 'Autre', 3, 1, 'Gira', 'Sac', 'description/Livre.txt'),
(236, 'Fiole de Flammes Entropiques #3', 'Fiole', 1, 1, 'Zayath', 'Sac', 'description/fiole.txt'),
(237, 'Badge des chercheurs d\'informations', 'Autre', 1, 0, 'Gora', 'Coffre', 'description/badge.txt'),
(238, 'Badge des chercheurs d\'informations', 'Autre', 1, 0, 'Zayath', 'Coffre', 'description/badge.txt'),
(239, 'Clé Coffre Zayath', 'Autre', 1, 0, 'Zayath', 'Coffre', 'description/cle.txt'),
(240, 'Clé Coffre Zayath', 'Autre', 1, 0, 'Zayath', 'Coffre', 'description/cle.txt'),
(241, 'Tenue de Civil', 'Armure', 1, 2, 'Zayath', 'Coffre', 'description/civil.txt'),
(242, 'Cape en Coton Noir', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/capeLin.txt'),
(243, 'Casque en Cuir', 'Armure', 1, 1, 'Zayath', 'Coffre', 'description/casqueCuir.txt'),
(244, 'Badge des chercheurs d\'informations	', 'Autre', 1, 0, 'Shuri', 'Porté', 'description/badge.txt'),
(245, 'Badge des chercheurs d\'informations', 'Autre', 1, 0, 'Zayath ', 'Coffre', 'description/badge.txt'),
(246, 'Lanterne de Flux', 'Outil', 3, 1, 'Gora', 'Coffre', 'description/lanterneMagique.txt'),
(247, 'Lanterne de Flux', 'Outil', 2, 1, 'Gora', 'Sac', 'description/lanterneMagique.txt'),
(248, 'Fiole de Brouillard', 'Fiole', 1, 1, 'Shuri', 'None', 'description/fiole.txt'),
(249, 'Lettre Étrange', 'Important', 5, 0, 'Shuri', 'Porté', 'None'),
(250, 'Plastron en Acier', 'Armure', 1, 2, 'Zayath', 'Porté', 'description/plastronAcier.txt'),
(251, 'Plastron en Acier', 'Armure', 1, 2, 'Ryry', 'Coffre', 'description/plastronAcier.txt'),
(252, 'Écharpe désastreuse en lin', 'Armure', 1, 0, 'Gora', 'Coffre', 'None'),
(253, 'Écharpe désastreuse en lin', 'Armure', 1, 0, 'Gira', 'Porté', 'None'),
(254, 'Écharpe désastreuse en lin', 'Armure', 1, 0, 'Zayath', 'Coffre', 'None'),
(255, 'Écharpe désastreuse en lin', 'Armure', 1, 0, 'Zayath', 'Coffre', 'None'),
(256, 'Écharpe désastreuse en lin', 'Armure', 1, 0, 'Zayath', 'Coffre', 'None'),
(257, 'Manteau en Lin', 'Armure', 1, 1, 'Gira', 'Porté', 'None'),
(259, 'Manteau en Lin', 'Armure', 1, 1, 'Zayath', 'Coffre', 'None'),
(260, 'Manteau en Lin', 'Armure', 1, 1, 'Gora', 'Coffre', 'None'),
(261, 'Écharpe en Laine', 'Armure', 3, 0, 'Zayath', 'Coffre', 'None'),
(262, 'Fouet en cuir de porc', 'Outil', 1, 1, 'Zayath', 'Coffre', 'description/fouetCuir.txt'),
(263, 'Plume super légère', 'Autre', 5, -2, 'Ryry', 'Porté', 'description/cle.txt'),
(264, 'Objet de Test', 'Important', 0, 5, 'Ryry', 'Sac', 'description/cle.txt'),
(266, 'Document Confidentiel Madelon', 'Important', 5, 0, 'Gora', 'Coffre', 'description/cle.txt'),
(267, 'Fedora d\'exception', 'Armure', 1, 1, 'Ryry', 'Sac', 'description/fedora.txt'),
(270, 'Canasson', 'Animal', 1, 0, 'Xianos', 'Cheval', 'description/Cheval.txt'),
(271, 'Épée en Acier', 'Arme', 1, 1, 'Xianos', 'Sac', 'description/épéeacier.txt'),
(272, 'Set de Campement', 'Outil', 1, 1, 'Xianos', 'Sac', 'description/campement.txt'),
(273, 'Flute en Ivoire', 'Autre', 3, 0, 'Xianos', 'Coffre', 'description/fluteEsra.txt'),
(274, 'Tenue de Civil', 'Armure', 1, 2, 'Gora', 'Coffre', 'description/civil.txt'),
(275, '2 Couteaux de Lancer en Acier', 'Arme', 1, 1, 'Zayath', 'Porté', 'description/couteaudelancer.txt'),
(276, 'Rondache en Tungstène', 'Arme', 3, 1, 'Ryry', 'Porté', 'description/rondacheTungstène.txt'),
(277, 'Coque', 'Autre', 1, 0, 'Gora', 'Porté', 'description/coque.txt'),
(278, 'Coque', 'Autre', 1, 0, 'Zayath', 'Coffre', 'description/coque.txt'),
(279, 'Chariot', 'Important', 2, -3, 'Tous', 'Commun', 'description/chariot.txt'),
(280, '7 Carreaux', 'Munition', 1, 0, 'Gira', 'Porté', 'None'),
(283, 'Aurora', 'Arme', 4, 1, 'Shuri', 'Porté', 'description/aurora.txt'),
(284, 'Umbra', 'Arme', 3, 1, 'Gira', 'Porté', 'description/umbra.txt'),
(285, 'Bimbo (Gira)', 'Sac', 1, 1, 'Ryry', 'Porté', 'description/sacNourriture.txt'),
(286, 'Corde de 5m', 'Outil', 1, 1, 'Gira', 'Cheval', 'description/corde.txt'),
(287, 'Rapière en Aucellum', 'Arme', 3, 1, 'Dario Bianchi', 'Porté', 'description/rapiereAucellum.txt'),
(288, 'Plastron en Aucellum', 'Armure', 3, 2, 'Dario Bianchi', 'Porté', 'description/plastronAucellum.txt'),
(289, 'Casque en Cuir', 'Armure', 1, 1, 'Dario Bianchi', 'Porté', 'description/casqueCuir.txt'),
(290, 'Bottes de Cuir', 'Armure', 1, 1, 'Dario Bianchi', 'Porté', 'description/bottesCuir.txt'),
(291, 'Brassards en cuir', 'Armure', 1, 1, 'Dario Bianchi', 'Sac', 'description/brassardCuir.txt'),
(292, 'Arbalète', 'Arme', 1, 2, 'Dario Bianchi', 'Porté', 'description/arbalète.txt'),
(293, '30 Carreaux en Acier', 'Munition', 1, 0, 'Dario Bianchi', 'Cheval', 'None'),
(294, 'Sac à Dos', 'Armure', 1, 1, 'Dario Bianchi', 'Cheval', 'description/sacADos.txt'),
(295, 'Lavar', 'Animal', 1, 0, 'Dario Bianchi', 'Cheval', 'description/Cheval.txt'),
(296, 'Gantelets en Fabuliath', 'Armure', 3, 1, 'Gora', 'Porté', 'description/brassardFabuliath.txt'),
(297, 'Hache en Iridium', 'Arme', 3, 1, 'Zayath', 'Porté', 'description/hacheIridium.txt'),
(298, 'Heaume en Aucellum', 'Armure', 3, 1, 'Zayath', 'Porté', 'description/casqueAucellum.txt'),
(299, 'Poupée d\'Azaya', 'Important', 5, 0, 'Gora', 'Porté', 'description/poupeeAzaya.txt'),
(300, 'Rondache en Aucellum', 'Arme', 3, 1, 'Zayath', 'Porté', 'description/rondacheAucellum.txt'),
(301, 'Fiole de Feu', 'Fiole', 3, 1, 'Ryry', 'Porté', 'description/fiole.txt'),
(302, 'Fiole de Feu', 'Fiole', 3, 1, 'Dario Bianchi', 'Sac', 'description/fiole.txt'),
(303, 'Fiole d\'Eau', 'Fiole', 3, 1, 'Dario Bianchi', 'Sac', 'description/fiole.txt'),
(304, 'Corde de 5m', 'Outil', 1, 0, 'Dario Bianchi', 'Porté', 'description/cle.txt'),
(305, '5 Dés', 'Autre', 1, 0, 'Dario Bianchi', 'Sac', 'description/cle.txt'),
(306, '11 Carreaux en Aucellum', 'Munition', 3, 0, 'Dario Bianchi', 'Porté', 'description/carreauAucellum.txt'),
(307, 'Chausses-Trappes', 'Outil', 1, 0, 'Dario Bianchi', 'Porté', 'description/cle.txt'),
(308, 'Bouteille de Vin', 'Nourriture', 1, 1, 'Gora', 'Porté', 'description/cle.txt'),
(309, 'Bouteille de Vin', 'Nourriture', 1, 1, 'Gora', 'Sac', 'description/cle.txt'),
(310, 'Hallebarde en Iridium', 'Arme', 3, 2, 'Gora', 'Porté', 'description/hallebardeIridium.txt'),
(311, 'Marteau de Guerre en Iridium pour Géant', 'Arme', 3, 3, 'Dario Bianchi', 'Porté', 'description/cle.txt'),
(312, 'Plastron en Tungstène', 'Armure', 3, 2, 'Shuri', 'Porté', 'description/plastronTungstène.txt');

-- --------------------------------------------------------

--
-- Table structure for table `passif`
--

CREATE TABLE `passif` (
  `id` int(11) NOT NULL,
  `Activation` tinyint(1) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Joueur` varchar(100) NOT NULL,
  `Stats` varchar(100) NOT NULL,
  `Valeurs` varchar(100) NOT NULL,
  `Link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passif`
--

INSERT INTO `passif` (`id`, `Activation`, `Nom`, `Joueur`, `Stats`, `Valeurs`, `Link`) VALUES
(1, 1, 'Introverti', 'Zayath', 'ELO,FUR', '0.7,1.3', 'description/Introverti.txt'),
(2, 0, 'Agoraphobie', 'Zayath', 'PER,FUR,CHA,ELO,INT', '0.8,0.8,0.8,0.8,0.8', 'description/Agoraphobie.txt'),
(3, 1, 'Aliénation Mentale', 'Zayath', 'None', 'None', 'description/Alienation.txt'),
(4, 1, 'Super Dada', 'Zayath', 'None', 'None', 'description/Dada.txt'),
(5, 1, 'Mauvaise posture', 'Zayath', 'CHA,FOR', '0.8,1.1', 'description/Posture.txt'),
(6, 0, 'Alcoolique', 'Gora', 'MDF,FOR,DEF,VIT,ACC', 'None', 'description/Alcoolique.txt'),
(7, 1, 'Stoïque', 'Gora', 'ELO', '0.7', 'description/Stoïque.txt'),
(8, 0, 'L\'Homme Ivre', 'Gora', 'ELO,INT', '1.5,0.5', 'description/Ivre.txt'),
(9, 1, 'Traumatisme Juvénile', 'Gora', 'None', 'None', 'description/Traumatisme.txt'),
(10, 0, 'Mommy Fétiche', 'Gora', 'ELO', '0.8', 'description/Mommy.txt'),
(11, 0, 'Carnage', 'Shuri', 'MDF,FOR,DEF,VIT,ACC', '1.1,1.1,1.1,1.1,1.1', 'description/Carnage.txt'),
(12, 1, 'Protective', 'Shuri', 'None', 'None', 'description/Protective.txt'),
(13, 1, 'Sanguine', 'Shuri', 'None', 'None', 'description/Sanguine.txt'),
(14, 1, 'Pyromancienne', 'Shuri', 'None', 'None', 'description/Pyromancienne.txt'),
(15, 1, 'Super Rembourrage', 'Shuri', 'CHA', '1.1', 'description/Rembourrage.txt'),
(16, 1, 'Introverti', 'Gira', 'ELO,FUR', '0.7,1.3', 'description/Introverti.txt'),
(17, 1, 'Amoureuse Fini', 'Gira', 'CHA', '0.8', 'description/Amoureuse.txt'),
(18, 1, 'Petite Fayotte', 'Gira', 'INT', '1.2', 'description/Fayotte.txt'),
(19, 0, 'Studieuse', 'Gira', 'None', 'None', 'description/Studieuse.txt'),
(20, 1, 'Point de côté', 'Gira', 'None', 'None', 'description/Point.txt'),
(21, 0, 'Robert', 'Ryry', 'FOR', '140', 'None'),
(22, 1, 'Allergie à l\'Artrish III', 'Gira', 'None', 'None', 'description/artrishiii.txt'),
(23, 1, 'Rage inépuisable', 'Gora', 'None', 'None', 'description/Rageinepuisable.txt'),
(24, 1, 'Allergie aux Abeilles', 'Shuri', 'None', 'None', 'description/abeilles.txt'),
(25, 1, 'Allergie aux Abeilles', 'Gira', 'None', 'None', 'description/abeilles.txt'),
(26, 1, '3/5', 'Shuri', 'None', 'None', 'description/3sur5.txt'),
(27, 1, 'Kannatractivité', 'Gora', 'None', 'None', 'description/kannatractivite.txt'),
(28, 1, 'Heureux sont les simples d\'esprits', 'Xianos', 'INT,CHA,ELO', '0.8,1.1,1.1', 'description/heureux.txt'),
(29, 1, 'Oreille Absolue', 'Xianos', 'PER', '1.2', 'description/oreille.txt'),
(30, 1, 'Toxicomancienne', 'Xianos', 'None', 'None', 'description/toxicomancien.txt'),
(32, 1, 'Surabondance de Flux', 'Élhanan', 'CHA,ELO,FUR', '17,17,-21', 'description/SurabondanceFlux.txt'),
(33, 0, 'Réalité Personnelle', 'Élhanan', 'None', 'None', 'description/realitePersonnelle.txt'),
(34, 0, 'Ponte des Guignols', 'Élhanan', 'CHA', '12', 'description/ponte.txt'),
(35, 1, 'Cache Compétence', 'Élhanan', 'MDF,FOR,DEF,VIT,ACC,PER,FUR,CHA,ELO,INT', '17,44,60,80,74,72,53,56,54,72', 'None'),
(36, 1, 'Ankylose', 'Zayath', 'FOR', '0.85', 'description/ankylose.txt'),
(37, 1, 'Pendentif', 'Shuri', 'CHA', '1.07', 'description/Pendentif.txt'),
(38, 1, 'Écurie Sud ?', 'Gora', 'None', 'None', 'description/ecurieSud.txt'),
(39, 1, 'Badge Force dupliqué ', 'Zayath', 'FOR', '1.1', 'description/FOR.txt'),
(40, 0, 'Pauvre voleur', 'Dario Bianchi', 'ELO', '1.2', 'description/pauvreVoleur.txt'),
(41, 0, 'Mauvaise Réputation', 'Dario Bianchi', 'ELO,CHA', '0.9,0.9', 'description/mauvaiseReputation.txt'),
(42, 0, 'Zoneur', 'Dario Bianchi', 'PER', '1.15', 'description/zoneur.txt'),
(43, 0, 'Tchacheur', 'Dario Bianchi', 'CHA', '1.1', 'description/tchacheur.txt'),
(44, 1, 'Peur de l\'injustice', 'Dario Bianchi', 'None', 'None', 'description/peurInjustice.txt');

-- --------------------------------------------------------

--
-- Table structure for table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `Flux` varchar(100) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Sexe` varchar(100) NOT NULL,
  `Race` varchar(100) NOT NULL,
  `Ethnie` varchar(100) NOT NULL,
  `QdF` int(11) NOT NULL,
  `Maitrise` int(11) NOT NULL,
  `Strength` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `Sante` int(11) NOT NULL,
  `Endurance` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `Accuracy` int(11) NOT NULL,
  `Perception` int(11) NOT NULL,
  `Furtivite` int(11) NOT NULL,
  `Charisme` int(11) NOT NULL,
  `Eloquence` int(11) NOT NULL,
  `SexAbility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `nombreReponses` int(11) NOT NULL,
  `intitule` varchar(1000) NOT NULL,
  `reponse1` varchar(500) NOT NULL,
  `reponse1pts` varchar(15) NOT NULL,
  `reponse2` varchar(500) NOT NULL,
  `reponse2pts` varchar(15) NOT NULL,
  `reponse3` varchar(500) NOT NULL,
  `reponse3pts` varchar(15) NOT NULL,
  `reponse4` varchar(500) NOT NULL,
  `reponse4pts` varchar(15) NOT NULL,
  `reponse5` varchar(500) NOT NULL,
  `reponse5pts` varchar(15) NOT NULL,
  `reponse6` varchar(500) NOT NULL,
  `reponse6pts` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizz`
--

INSERT INTO `quizz` (`id`, `nombreReponses`, `intitule`, `reponse1`, `reponse1pts`, `reponse2`, `reponse2pts`, `reponse3`, `reponse3pts`, `reponse4`, `reponse4pts`, `reponse5`, `reponse5pts`, `reponse6`, `reponse6pts`) VALUES
(1, 4, 'Quelle activité préférez-vous réaliser durant votre temps libre ?', 'Faire du Sport', 'I', 'Lire', 'CEGO', 'Être avec des amis', 'HJKLMPQ', 'Me balader', 'ABDFN', '', '', '', ''),
(2, 5, 'À quel point te connais-tu ? ', '0%', 'KNPQ', '25%', 'FHO', '50%', 'AJ', '75%', 'BCGM', '100%', 'DEHL', '', ''),
(4, 4, 'Les gens vous considèrent :', 'Optimiste', 'AEHIJLM', 'Réaliste', 'BDGO', 'Pessimiste', 'CKNPQ', 'Lunatique', 'F', '', '', '', ''),
(5, 4, 'Lorsque vous prenez une décision simple :', 'Vous le faites rapidement, sans hésitation, on n’a pas de temps à perdre dans notre vie.', 'AFI', 'Vous pesez le pour et le contre et malgré tout, l’hésitation reste mais après de longues minutes de réflexion vous faites votre choix.', 'BCGOP', 'Vous hésitez longuement et vous finissez souvent par laisser le hasard choisir.', 'EHJLMN', 'Vous demandez à une personne tierce de choisir, que vous blâmez en cas de pépins.', 'DKQ', '', '', '', ''),
(6, 5, 'Quelle mort vous convient le plus parmi celle-ci :', 'Mourir de gloire en martyre / en combat.', 'LI', 'Mourir paisiblement AVANT mon/ma compagne, comme ça, je n’ai pas à la/le voir souffrir.', 'ACEHM', 'Mourir paisiblement APRÈS mon/ma compagne, comme ça, il/elle n’a pas à souffrir de mon départ.', 'FGOQ', 'Mourir seule, paisiblement.', 'JN', 'Mourir éclaté.e par une Bombe Atomique, autant ne pas se faire d’idée.', 'BDKP', '', ''),
(7, 6, 'Ce soir, je regarde :', 'Une Romance, pour l\'AMOUR.', 'AHKM', 'Une série dramatique, pour relativiser.', 'FOP', 'Un documentaire, pour apprendre.', 'DG', 'Une série/dessin animé d\'exploration, pour rêver.', 'ELNQ', 'Un thriller avec de l\'action, pour poser mon cerveau.', 'BCI', 'Une vidéo -18, il n\'y a plus que cela qui me fait de l\'effet...', 'J'),
(8, 4, 'Vous arrivez chez un collègue, il vous propose par courtoisie si vous souhaitez un thé ou un café :', 'Vous prenez un café', 'BCDGKP', 'Vous prenez un thé', 'AFHJMQO', 'Vous dites que vous préférez de l\'Eau', 'IE', 'Vous prenez l\'un ou l\'autre et le buvez malgré le fait que vous n\'aimiez ni l\'un, ni l\'autre', 'LN', '', '', '', ''),
(9, 3, 'Noir ou blanc ? Ange ou Démon ?', 'Noir et Démon', 'BCDFJKPOQ', 'Blanc et Ange', 'AEGHILM', 'Caramel au beurre salé avec supplément crème fouettée.', 'N', '', '', '', '', '', ''),
(10, 3, 'Vous arrivez dans une crêperie, vous commandez :', 'Une crêpe salée', 'QPABDGK', 'Une crêpe sucrée', 'OMLCEFHIJ', 'J\'ai déjà répondu à cette question juste avant.', 'N', '', '', '', '', '', ''),
(11, 6, 'Votre couleur préféré de l\'arc en ciel :', 'Violet', 'LO', 'Bleu', 'AH', 'Vert', 'FBGJMQ', 'Jaune', 'DIKP', 'Orange', 'E', 'Rouge', 'CN'),
(12, 4, 'Le plus important dans une oeuvre c\'est :', 'L\'histoire qu\'elle raconte', 'AFIL', 'Le message qu\'il fait passer', 'CDGQ', 'Les émotions ressentis', 'EHKMOP', 'Son originalité', 'BJN', '', '', '', ''),
(13, 5, 'Aimez vous être au centre de l\'attention ?', 'Pas du tout', 'DF', 'Un peu', 'BCLMP', 'Cela m\'est égale', 'AGKN', 'Oui', 'EHOQ', 'Complètement', 'IJ', '', ''),
(14, 4, 'Dans un groupe de rock, vous seriez :', 'Keyboardiste (Synthétiseur)', 'CGJMOP', 'Guitariste', 'EHIL', 'Bassiste', 'AFKQ', 'Batteur', 'BDN', '', '', '', ''),
(15, 4, 'Selon toi l\'intelligence est :', 'La capacité à anticipé le futur', 'BCJNO', 'La capacité à s\'adapter', 'DEKQ', 'La capacité à comprendre', 'AGIL', 'La capacité à ressentir', 'FHMP', '', '', '', ''),
(16, 4, 'Quelle saison vous représente le mieux :', 'L\'Automne', 'GJMNQ', 'Hiver', 'BFOP', 'Printemps', 'AHKL', 'Été', 'CDEI', '', '', '', ''),
(17, 5, 'Dans un film d\'horreur, vous seriez :', 'Le tueur', 'BGIPQ', 'Le / La Beau/Belle gosse de service', 'EO', 'Le/La Protagoniste un peu niais.e', 'AHKLM', 'Le premier à mourir', 'CF', 'La tronçonneuse', 'DJN', '', ''),
(18, 4, 'Lorsque vous avez une série de tâches à effectuer :', 'Vous les faites toutes une à une.', 'BDGHKO', 'Vous les commencez toutes en même temps et peiné à en finir une.', 'ACIMQ', 'Vous les abandonnez toutes.', 'EFJLP', 'La javel, ça nettoie les taches.', 'N', '', '', '', ''),
(19, 4, 'Quelle est votre plus grande peur :', 'La mort', 'CDIKLP', 'La solitude', 'GHJM', 'Être victime d\'injustice', 'AGQ', 'Vous-même', 'BFNO', '', '', '', ''),
(20, 4, 'Quel trait de caractère les personnes vous attribuent elles :', 'Colérique', 'CDHI', 'Pitoyable (de qui on a pitié)', 'FPQ', 'Excentrique', 'BJKLO', 'Stoïque', 'AEGMN', '', '', '', ''),
(21, 5, 'Vous trouvez une créature inconnue, que faites vous ?', 'Ni une, ni deux, je l\'affronte.', 'EH', 'J\'observe ses habitudes et je la laisse tranquille.', 'CDGO', 'Je ne me rends même pas compte que c\'est une créature inconnue.', 'ABKN', 'Je fuis.', 'FPQ', 'J\'ai peur, je laisse ma garde. On ne sait jamais.', 'JLM', '', ''),
(22, 4, 'Vous avez eu une mauvaise note à un examen que vous avez un peu préparé, qui aura potentiellement un impact sur vos futurs résultats :\r\n', 'Vous persistez, vous aurez une meilleure note la prochaine fois.', 'AGHLM', 'Vous abandonnez, après tout le peu de préparation aurait dû suffire, je ne suis pas à la hauteur.', 'ENP', 'Vous vous dites que c’est la faute du professeur, en plus sa matière est nulle, vous vous préparerez tout autant pour le prochain contrôle.', 'BCDKO', 'Vous souriez comme si ce malheureux évènement n\'avait jamais eu lieu.', 'FIJQ', '', '', '', ''),
(23, 2, 'Une maladie infecte et tue 1 / 1 000 000, tu peux endiguer la maladie en te sacrifiant, le ferais-tu ?', 'Oui', 'AEFGHNOPQ', 'Non', 'BCDIJKLM', '', '', '', '', '', '', '', ''),
(24, 6, 'Quel péché capital te représente le plus ;', 'Gourmandise/Envie', 'ABQ', 'Orgueil', 'CI', 'Cupidité ', 'DJ', 'Luxure', 'NO', 'Paresse', 'EKLP', 'Colère', 'FGHM'),
(25, 4, 'Quel est la chose la plus dévastatrice sur terre :', 'La Famine', 'AE', 'Les épidémies', 'HIJ', 'Le Pouvoir', 'BDFGMNOPQ', 'Les Guerres', 'CKL', '', '', '', ''),
(26, 4, 'Que signifie \'entropie\' :', 'Epique', 'AKLM', 'Synonyme de géant', 'CEQ', 'Destruction', 'OBDFP', 'Le Chaos', 'NIJ', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sac_nourriture`
--

CREATE TABLE `sac_nourriture` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Contenu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sac_nourriture`
--

INSERT INTO `sac_nourriture` (`id`, `Nom`, `Contenu`) VALUES
(1, 'Sac de Nourriture Gira', '21-2-41-41-41-41-41-41-41'),
(2, 'Sac de Nourriture Gora', '41-41-41-41-41-41-41-41'),
(3, 'Sac de Nourriture Zayath', '41-41-41-41-41-41-41-5'),
(4, 'Sac de Nourriture Shuri', '17-17-17-17-41-41-41-41-41-41'),
(5, 'Sac de Nourriture Y', '41-41-41-41-41-41-41-41-41-41'),
(6, 'Sac de Nourriture Z', '41-41-41-41-41-41-41-41-41-41'),
(7, 'Sac de Nourriture X', '6-1-21-19-19-5-16-9-19-20-5'),
(8, 'Bimbo (Gira)', '21-37-5-2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliments`
--
ALTER TABLE `aliments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `argent`
--
ALTER TABLE `argent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armure`
--
ALTER TABLE `armure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bestiaire`
--
ALTER TABLE `bestiaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passif`
--
ALTER TABLE `passif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sac_nourriture`
--
ALTER TABLE `sac_nourriture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliments`
--
ALTER TABLE `aliments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `argent`
--
ALTER TABLE `argent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `armure`
--
ALTER TABLE `armure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `bestiaire`
--
ALTER TABLE `bestiaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `objets`
--
ALTER TABLE `objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `passif`
--
ALTER TABLE `passif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sac_nourriture`
--
ALTER TABLE `sac_nourriture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
