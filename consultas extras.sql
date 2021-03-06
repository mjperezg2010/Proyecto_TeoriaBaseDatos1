ALTER TABLE `maquinasrecreativas`.`maquinas` 
ADD COLUMN `nombreMaquina` VARCHAR(45) NULL AFTER `idMaquina`;

CREATE TABLE `maquinasrecreativas`.`comercio` (
  `idcomercio` INT NOT NULL,
  `CantidadPagada` INT NULL,
  `Recaudacion` INT NULL,
  `Nombre` VARCHAR(60) NULL,
  `NumMaquinas` INT NULL,
  `PorcentajeExtra` INT NULL,
  PRIMARY KEY (`idcomercio`));
  
ALTER TABLE `maquinasrecreativas`.`comercio` 
ADD COLUMN `TipoComercio` VARCHAR(45) NULL AFTER `PorcentajeExtra`;

INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `PorcentajeExtra`, `TipoComercio`) VALUES ('432', '28903', '15697', 'Bar Veider', '0', NULL, 'Minorista');
INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `TipoComercio`) VALUES ('324', '34506', '17893', 'King Bar', '0', 'Minorista');
INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `TipoComercio`) VALUES ('123', '24959', '16976', 'Pulperia \"El Kairos\"', '0', 'Minorista');
INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `PorcentajeExtra`, `TipoComercio`) VALUES ('345', '78954', '46789', 'Calo Gogo', '0', '14', 'Mayorista');
INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `PorcentajeExtra`, `TipoComercio`) VALUES ('776', '65687', '58345', 'Trito Station', '0', '25', 'Mayorista');
INSERT INTO `maquinasrecreativas`.`comercio` (`idcomercio`, `CantidadPagada`, `Recaudacion`, `Nombre`, `NumMaquinas`, `PorcentajeExtra`, `TipoComercio`) VALUES ('567', '81234', '65678', 'Galloping Ghost', '0', '30', 'Mayorista');

UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'BarVeider' WHERE (`idcomercio` = '432');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'KingBar' WHERE (`idcomercio` = '324');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'Pulperia\"El Kairos\"' WHERE (`idcomercio` = '123');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'CaloGogo' WHERE (`idcomercio` = '345');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'TritoStation' WHERE (`idcomercio` = '776');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'GallopingGhost' WHERE (`idcomercio` = '567');
UPDATE `maquinasrecreativas`.`comercio` SET `Nombre` = 'ElKairos' WHERE (`idcomercio` = '123');

INSERT INTO `maquinasrecreativas`.`maquinas` (`idMaquina`, `nombreMaquina`, `EstaOperativa`, `Ganancia`, `idTecnico`, `idPiezaReciclada`) VALUES ('4344', 'MortalKombat', 'Si', '3434343', '3443', '34433');
INSERT INTO `maquinasrecreativas`.`maquinas` (`idMaquina`, `nombreMaquina`, `EstaOperativa`, `Ganancia`, `idTecnico`, `idPiezaReciclada`) VALUES ('34343', 'StreetFighter', 'No', '34343421', '3321', '77654');

-- Agregacion del atributo nombre de proveedor
ALTER TABLE `maquinasrecreativas`.`proveedor` 
ADD COLUMN `NombreProveedor` VARCHAR(45) NULL AFTER `idProveedor`;

-- Agregacion del atributo nombre de tecnico
ALTER TABLE `maquinasrecreativas`.`tecnico` 
ADD COLUMN `NombreTecnico` VARCHAR(45) NULL AFTER `idTecnico`;







-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

-- Tablas creadas hoy 15 marzo
Create Table `maquinasRecreativas`.`tabla_ComprobacionMaquina` (

`idMaquina` INT NOT NULL ,
`EstaOperativa` NVARCHAR(30) NULL,
`Ganancia` INT NULL, 
`idTecnico` INT NULL,
`idPiezaReciclada` INT NULL,
`idComercio` INT NULL,
PRIMARY KEY(`idMaquina`)

);

ALTER TABLE `maquinasrecreativas`.`tabla_comprobacionmaquina` 
ADD COLUMN `nombreMaquina` VARCHAR(45) NULL AFTER `idMaquina`;


-- ///////// hoy 16
Create Table `maquinasRecreativas`.`tabla_reparacionmaquina` (

`idMaquina` INT NOT NULL ,
`nombreMaquina` VARCHAR(89) NULL,
`EstaOperativa` NVARCHAR(30) NULL,
`Ganancia` INT NULL, 
`idTecnico` INT NULL,
`idPiezaReciclada` INT NULL,
`idComercio` INT NULL,
PRIMARY KEY(`idMaquina`)

);

ALTER TABLE `maquinasrecreativas`.`maquinas` 
CHANGE COLUMN `idPiezaReciclada` `idSuministro` INT(11) NULL DEFAULT NULL ;

ALTER TABLE `maquinasrecreativas`.`tabla_comprobacionmaquina` 
CHANGE COLUMN `idPiezaReciclada` `idSuministro` INT(11) NULL DEFAULT NULL ;

ALTER TABLE `maquinasrecreativas`.`tabla_reparacionmaquina` 
CHANGE COLUMN `idPiezaReciclada` `idSuministro` INT(11) NULL DEFAULT NULL ;

-- Consultas extra marzo 19
ALTER TABLE `maquinasrecreativas`.`suministro` 
DROP COLUMN `idMaquina`;

ALTER TABLE `maquinasrecreativas`.`comercio` 
DROP COLUMN `NumMaquinas`;

DROP TABLE cantidadpagada_mes;
DROP TABLE datoscomercio;
DROP TABLE genera;
DROP TABLE informe;
DROP TABLE porcentajeextra;
DROP TABLE recaudacionesmensuales;
DROP TABLE ubicaciones; 


