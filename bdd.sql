-- --------------------------------------------------------
-- Hôte:                         192.168.1.48
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour projetphp
DROP DATABASE IF EXISTS `projetphp`;
CREATE DATABASE IF NOT EXISTS `projetphp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projetphp`;

-- Listage de la structure de la table projetphp. compte
DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(16) NOT NULL,
  `type_utilisateur` varchar(16) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `id_promo` int(11) DEFAULT NULL,
  PRIMARY KEY (`mail`),
  KEY `FK_promo` (`id_promo`),
  CONSTRAINT `FK_promo` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table projetphp.compte : ~5 rows (environ)
DELETE FROM `compte`;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
INSERT INTO `compte` (`mail`, `mdp`, `type_utilisateur`, `nom`, `prenom`, `tel`, `date_naissance`, `id_promo`) VALUES
	('a@1.fr', 'azer', 'Etudiant', 'a1', 'a1', '06 55 55 55 55', '2020-11-07', 1),
	('admin@admin.admin', 'P@ssw0rd', 'Admin', 'Admin', 'Admin', '06 66 66 66 66', '1966-06-06', 1),
	('antony.dodard@gmail.com', 'antony', 'Etudiant', 'Dodard', 'Antony', '06 06 06 06 06', '2001-03-01', 1),
	('couturas.alexis@outlook.fr', 'friselie2208', 'Etudiant', 'Couturas', 'Alexis', '06 85 20 33 46', '1999-08-22', 1),
	('entre.entre@entre.fr', 'entre', 'Entreprise', 'Entreprise', 'Entreprise', '00 11 22 33 44', '2021-05-19', NULL),
	('louispvp123@gmail.com', 'Louis2001', 'Etudiant', 'Louis', 'B', '07 07 07 07 07', '2001-09-12', 3),
	('prof@test.fr', 'azer', 'Professeur', 'Prof ', 'Prof', '09 09 09 09 09', '2021-05-06', NULL);
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;

-- Listage de la structure de la table projetphp. message
DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_message` varchar(250) NOT NULL DEFAULT '0',
  `date_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_compte` varchar(50) NOT NULL,
  `id_salon` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_salon` (`id_salon`),
  KEY `FK_compte` (`id_compte`),
  CONSTRAINT `FK_compte` FOREIGN KEY (`id_compte`) REFERENCES `compte` (`mail`),
  CONSTRAINT `FK_salon` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Listage des données de la table projetphp.message : ~46 rows (environ)
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `contenu_message`, `date_message`, `id_compte`, `id_salon`) VALUES
	(1, 'salut les gars', '2021-01-13 17:11:55', 'couturas.alexis@outlook.fr', 1),
	(2, 'azerazer', '2021-04-28 17:48:24', 'a@1.fr', 1),
	(4, 'azeriouy', '2021-04-28 18:01:34', 'a@1.fr', 1),
	(5, 'salut mec', '2021-04-29 17:45:30', 'a@1.fr', 1),
	(6, 'a', '2021-04-29 17:48:45', 'a@1.fr', 1),
	(7, 'qsjkdhfgqsdf', '2021-04-29 17:48:49', 'a@1.fr', 1),
	(8, 'iuazeriuhazer', '2021-04-29 17:48:53', 'a@1.fr', 1),
	(9, 'sqdfoiqjscd', '2021-04-29 17:48:58', 'a@1.fr', 1),
	(10, 'lkjqhsdfkljhqsdfkjhqsdflkjhdqsfkljqsdhfkjlsdhfkl', '2021-04-29 17:49:13', 'a@1.fr', 1),
	(11, 'azeriouy', '2021-04-29 17:51:56', 'a@1.fr', 1),
	(12, 'salut mec gros pd', '2021-04-29 17:53:35', 'a@1.fr', 1),
	(13, 'azerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazerazazerazeraz', '2021-04-29 17:56:17', 'a@1.fr', 1),
	(14, 'Ca passe nickel', '2021-05-04 12:51:14', 'couturas.alexis@outlook.fr', 1),
	(15, 'yo mec', '2021-05-04 15:32:01', 'antony.dodard@gmail.com', 1),
	(16, 'trql ?', '2021-05-04 15:32:16', 'couturas.alexis@outlook.fr', 1),
	(17, 'ouai est toi', '2021-05-04 15:32:27', 'antony.dodard@gmail.com', 1),
	(18, 'ca va hein', '2021-05-04 15:38:18', 'couturas.alexis@outlook.fr', 1),
	(19, 'chaud pour taffer le php ', '2021-05-04 15:39:45', 'antony.dodard@gmail.com', 1),
	(20, 'ouai carrement je suis chaud de ouf', '2021-05-04 15:43:27', 'couturas.alexis@outlook.fr', 1),
	(21, 'azertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazertazert', '2021-05-04 16:08:34', 'couturas.alexis@outlook.fr', 1),
	(22, 'salut', '2021-05-04 16:18:12', 'couturas.alexis@outlook.fr', 1),
	(23, 'teste', '2021-05-04 16:21:54', 'antony.dodard@gmail.com', 1),
	(24, 'test 2', '2021-05-04 16:22:31', 'couturas.alexis@outlook.fr', 1),
	(25, 'encore ca', '2021-05-04 16:22:58', 'couturas.alexis@outlook.fr', 1),
	(26, 'plus ', '2021-05-04 16:25:52', 'antony.dodard@gmail.com', 1),
	(27, 'que ', '2021-05-04 16:25:55', 'antony.dodard@gmail.com', 1),
	(28, '2', '2021-05-04 16:25:57', 'antony.dodard@gmail.com', 1),
	(29, 'salut mec trql ?', '2021-05-04 16:42:17', 'couturas.alexis@outlook.fr', 1),
	(30, 'Re', '2021-05-04 21:26:20', 'a@1.fr', 1),
	(31, 're', '2021-05-06 17:02:33', 'antony.dodard@gmail.com', 1),
	(32, 'ah ouai nan mais attends en fait quand ton mot il depasse de la taille maximale du message le mot ce casse normalement donc je fait un test pour savoir', '2021-05-06 17:30:24', 'couturas.alexis@outlook.fr', 1),
	(33, 'ouai', '2021-05-06 17:46:34', 'antony.dodard@gmail.com', 1),
	(34, 'ttest', '2021-05-06 17:51:44', 'couturas.alexis@outlook.fr', 1),
	(35, 'jjl', '2021-05-06 17:52:15', 'antony.dodard@gmail.com', 1),
	(36, 'salut', '2021-05-07 15:41:14', 'prof@test.fr', 1),
	(37, 'yo bro', '2021-05-07 16:49:54', 'antony.dodard@gmail.com', 1),
	(38, 'yo mec', '2021-05-18 18:24:44', 'antony.dodard@gmail.com', 1),
	(39, 'rg', '2021-05-18 18:25:11', 'antony.dodard@gmail.com', 1),
	(40, 'azerazer', '2021-05-18 18:54:59', 'couturas.alexis@outlook.fr', 6),
	(41, 're', '2021-05-20 16:40:59', 'admin@admin.admin', 1),
	(42, 'Normalement je peux appuyer sur entrer pour envoyer le mesage', '2021-05-25 13:40:10', 'couturas.alexis@outlook.fr', 6),
	(43, 'ok', '2021-05-25 13:41:06', 'couturas.alexis@outlook.fr', 1),
	(44, 'test', '2021-05-25 13:42:13', 'couturas.alexis@outlook.fr', 1),
	(45, 'peut etre', '2021-05-25 15:54:19', 'antony.dodard@gmail.com', 6),
	(46, 'salut', '2021-05-27 14:29:50', 'antony.dodard@gmail.com', 6),
	(47, 'Salut', '2021-05-27 22:41:52', 'couturas.alexis@outlook.fr', 1),
	(48, 'yo bro', '2021-05-28 16:08:31', 'antony.dodard@gmail.com', 6),
	(49, 'salut', '2021-05-30 16:21:50', 'admin@admin.admin', 1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table projetphp. promo
DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_promo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table projetphp.promo : ~6 rows (environ)
DELETE FROM `promo`;
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
INSERT INTO `promo` (`id_promo`, `nom_promo`) VALUES
	(1, '2019/2021'),
	(2, '2018/2020'),
	(3, '2020/2022'),
	(4, '2017/2019'),
	(8, '2022/2024'),
	(9, '2021/2023'),
	(10, '2025/2027');
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Listage de la structure de la table projetphp. proposition
DROP TABLE IF EXISTS `proposition`;
CREATE TABLE IF NOT EXISTS `proposition` (
  `id_prop` int(11) NOT NULL AUTO_INCREMENT,
  `type_prop` varchar(50) NOT NULL,
  `titre_prop` varchar(50) NOT NULL,
  `contenu_prop` varchar(450) NOT NULL,
  `accepter_prop` char(1) DEFAULT NULL,
  `dateFin_prop` date DEFAULT NULL,
  `mail_compte` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prop`),
  KEY `FK_proposition_compte` (`mail_compte`),
  CONSTRAINT `FK_proposition_compte` FOREIGN KEY (`mail_compte`) REFERENCES `compte` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table projetphp.proposition : ~6 rows (environ)
DELETE FROM `proposition`;
/*!40000 ALTER TABLE `proposition` DISABLE KEYS */;
INSERT INTO `proposition` (`id_prop`, `type_prop`, `titre_prop`, `contenu_prop`, `accepter_prop`, `dateFin_prop`, `mail_compte`) VALUES
	(1, 'evenement', 'Rencontre Parents Prof', 'La rencontre parent prof aura lieu le lundi 24 fevrier', NULL, '2021-02-24', 'a@1.fr'),
	(8, 'emploi', 'développeur', 'Cherche développeur PHP pour un forum de BTS SIO', 'V', NULL, 'admin@admin.admin'),
	(12, 'stage', 'Développement mobile', 'Notre entreprise cherche un stagiaire de BTS SIO option SLAM pour faire du développement mobile.', 'V', NULL, 'admin@admin.admin'),
	(13, 'emploi', 'Administrateur réseaux', 'Nous cherchons un élève de deuxième  année de BTS SIO option SISR pour l\'année prochaine dans notre entreprise pour effectuer le rôle d\'administrateur réseau.', 'F', NULL, 'admin@admin.admin'),
	(14, 'stage', 'dev', 'dev web', 'V', NULL, 'entre.entre@entre.fr'),
	(15, 'stage', 'dev', 'DEV jeux vidéo', 'V', NULL, 'admin@admin.admin');
/*!40000 ALTER TABLE `proposition` ENABLE KEYS */;

-- Listage de la structure de la table projetphp. salon
DROP TABLE IF EXISTS `salon`;
CREATE TABLE IF NOT EXISTS `salon` (
  `id_salon` int(11) NOT NULL AUTO_INCREMENT,
  `nom_salon` varchar(50) NOT NULL,
  `id_promo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_salon`),
  KEY `FK_salon_promo` (`id_promo`),
  CONSTRAINT `FK_salon_promo` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Listage des données de la table projetphp.salon : ~17 rows (environ)
DELETE FROM `salon`;
/*!40000 ALTER TABLE `salon` DISABLE KEYS */;
INSERT INTO `salon` (`id_salon`, `nom_salon`, `id_promo`) VALUES
	(1, 'Promo 2019/2021', 1),
	(2, 'Promo 2018/2020', 2),
	(3, 'Promo 2017/2019', 4),
	(4, 'Salon general', NULL),
	(5, 'Promo 2020/2022', 3),
	(6, 'prof_Promo 2019/2021', NULL),
	(7, 'prof_Promo 2020/2022', NULL),
	(8, 'prof_Promo 2018/2020', NULL),
	(9, 'prof_Promo 2017/2019', NULL),
	(10, 'Salon professeurs', NULL),
	(11, 'Salon étudiants', NULL),
	(14, 'Promo 2022/2024', 8),
	(15, 'prof_Promo 2022/2024', NULL),
	(16, 'Promo 2021/2023', 9),
	(17, 'prof_Promo 2021/2023', NULL),
	(18, 'Promo 2025/2027', 10),
	(19, 'prof_Promo 2025/2027', NULL);
/*!40000 ALTER TABLE `salon` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
