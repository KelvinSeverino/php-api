DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `email` varchar(200) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,  
  `senha` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `nome`, `senha`) VALUES
(1, 'kelvin@email.com', '1234', 'Kelvin');
COMMIT;