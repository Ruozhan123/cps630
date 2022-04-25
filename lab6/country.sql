create database lab6;

use lab6;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT primary key,
  `country` varchar(255) NOT NULL,
  `population` varchar(30) NOT NULL,
  `capital` varchar(255) NOT NULL
) ;

INSERT INTO `countries` (`country`, `population`, `capital`) VALUES
('Belgium', '22,277,766 ', 'Brussels'),
('Belarus', '11,443,876  ', 'Minsk'),
('Serbia', '7,543,987 ', 'Belgrade');
