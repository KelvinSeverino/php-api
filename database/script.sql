DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `email` varchar(200) NOT NULL,
  `name` varchar(100) DEFAULT NULL,  
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `name`, `password`) VALUES
(1, 'kelvin@email.com', '1234', 'Kelvin');
COMMIT;