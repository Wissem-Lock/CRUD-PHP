--
-- Base de données : `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`) VALUES
(167, 'Alexandre', 'Grand', 'alexandre.grand@gmail.com'),
(164, 'Pink', 'Blue', 'pink.blue@gmail.com'),
(165, 'Jonas', 'Olive', 'jonas.olive@gmail.com'),
(166, 'Jean', 'Petit', 'jean.petit@gmail.com'),
(162, 'Dupont', 'Jean', 'dupont.jean@gmail.com'),
(168, 'Orange', 'Juice', 'orange.juice@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
