CREATE TABLE `population` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `location` varchar(150) NOT NULL,
 `slug` varchar(150) NOT NULL,
 `population` int(10) unsigned NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX city ON population (location);
CREATE INDEX city_population ON population (location, population);

LOAD DATA LOCAL INFILE '/home/wendell/Estudos/PhP Test/data.csv' 
INTO TABLE population
FIELDS TERMINATED BY '\t' 
LINES TERMINATED BY '\n';
