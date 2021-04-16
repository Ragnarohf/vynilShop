-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 avr. 2021 à 10:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vinyl_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(6) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tel` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `pwd`, `role`, `email`, `addr1`, `addr2`, `cp`, `ville`, `Tel`) VALUES
(10, 'Sandra', 'Nicouette', 'azerty', '$argon2i$v=19$m=65536,t=4,p=1$ZGcuS3VQUkx3dlRMdGNoNQ$W/UrPoPsTjjsLTvl+xj352k8FRfVX0jTFLlHAAatbc4', 'user', 'sandranicouette@dodo.com', '0', 'escalier de l\'ascenseur', 76200, 'panambeauGosse', 600000000),
(11, 'admin', 'admin', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$ZGcuS3VQUkx3dlRMdGNoNQ$W/UrPoPsTjjsLTvl+xj352k8FRfVX0jTFLlHAAatbc4', 'role_admin', 'admin@admin.fr', '0', 'escalier admin', 76200, 'dieppe', 200000000);

-- --------------------------------------------------------

--
-- Structure de la table `vinyles`
--

DROP TABLE IF EXISTS `vinyles`;
CREATE TABLE IF NOT EXISTS `vinyles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mp3` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artiste` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int(4) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vinyles`
--

INSERT INTO `vinyles` (`id`, `mp3`, `cover_img`, `title`, `artiste`, `genre`, `annee`, `description`) VALUES
(10, 'sniper_trait_pour_trait_clip_officiel_5327989498804675187.mp3', 'grand sourir panda.jpg', 'trait pour trait', 'sniper', 'rap', 1943, ''),
(9, 'Sniper - Sans Repères.mp3', 'grand sourir panda.jpg', 'sans repéres', 'sniper', 'rap', 2021, 'zerzrezer'),
(8, 'its-bigger-than-hip-hop-dead-prez.mp3', 'coverDeadPrez.jpg', 'dead prez', 'prez', 'hip hop', 1946, 'sdfsfd'),
(7, 'sniper_grave_dans_la_roche_-6990010208509401780.mp3', 'grand sourir panda.jpg', 'grave dans la roche', 'sniper', 'rap', 1942, 'zerzer'),
(6, 'sniper_sans_reperes_-2621538476525578520.mp3', 'grand sourir panda.jpg', 'sans repere le 2', 'sniper', 'rap', 1945, 'rth'),
(11, 'soul-of-mischief-93-til-infinity.mp3', 'coverPharcyde.jpg', 'soul of mischief', 'til infinity', 'infinty', 1949, 'azeazea'),
(12, 'the-pharcyde-passin-me-by.mp3', 'coverSoulOf.jpg', 'Cover', 'UNCLE BENS', 'soul', 1990, 'rtyrtyr'),
(13, 'ac_dc_thunderstruck_official_video_-3783073958346770412.mp3', 'sniper.jpg', 'thunderthruck', 'ac/dc', 'Rock', 1984, 'ertertertertz rzet erter ert er teze eh ethrh qrh re h'),
(14, 'chop_suey_system_of_a_down_lyrics_MBDX63IByoK-gucZKTaC.mp3', 'sniper.jpg', 'Chop suey', 'SOAD', 'metal', 2016, 'ergtentfhqrfgrynrb'),
(15, 'my_mother_told_me_401744124515307675.mp3', 'sniper.jpg', 'my mother told me', 'tik tok', 'viking', 1976, 'sdvgbngnbfgvdg'),
(16, 'jeune_demoiselle_8590792302257400485.mp3', 'sniper.jpg', 'jeune demoiselle', 'diams', 'un truc de fifou', 1977, 'dfbhfrhnfrhnfh'),
(17, 'diam_s_ma_france_a_moi_clip_officiel_3645887202926924277.mp3', 'sniper.jpg', 'ma france a moi', 'diam\'s', 'truc de fifou', 1945, 'jkljkljkljk'),
(24, 'biquette.mp3', 'panda.jpg', 'biquette', 'biquette', 'document animalier', 2019, 'beeeeeeeeeee'),
(26, 'dj-battle-ft-lexy-panterra-twerk-lesson-4k.mp3', 'lexy pantera.jpg', 'dj battle', 'lexy pantera', 'musique', 1956, 'twerk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
