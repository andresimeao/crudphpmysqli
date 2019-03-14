
CREATE DATABASE mercado;

USE mercado;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` text,
  `valor` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
);
 