/*TABLA CANDIDADTOS*/
CREATE TABLE `desis`.
`candidatos` (`id` INT(5) NOT NULL AUTO_INCREMENT , 
`candidato` VARCHAR(50) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

/*DATOS INSERTADOS EN TABLA CANDIDATO*/
INSERT INTO candidatos(candidato) VALUES('Programador Junior');
INSERT INTO candidatos(candidato) VALUES('Programador Senior');