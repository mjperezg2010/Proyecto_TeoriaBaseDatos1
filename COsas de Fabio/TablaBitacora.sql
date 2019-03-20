Create Table `maquinasRecreativas`.`Bitacora_Maquinas` (

`idMaquina` INT NOT NULL ,
`nombreMaquina` NVARCHAR(45) NULL,
`EstaOperativa` NVARCHAR(30) NULL,
`Ganancia` INT NULL, 
`idTecnico` INT NULL,
`idSuministro` INT NULL,
`idComercio` INT NULL,
/*------------------*/
`idBitacora` INT NULL,
`Movimiento` NVARCHAR(45)NULL,
/*------------------*/	
`idMaquina_anterior` INT NOT NULL ,
`nombreMaquina_anterior` NVARCHAR(45) NULL,
`EstaOperativa_anterior` NVARCHAR(30) NULL,
`Ganancia_anterior` INT NULL, 
`idTecnico_anterior` INT NULL,
`idSuministro_anterior` INT NULL,
`idComercio_anterior` INT NULL,

PRIMARY KEY(`idMaquina`)

);

Create Table `maquinasRecreativas`.`Bitacora_Tecnico`(
`idTecnico` INT NOT NULL,
`NombreTecnico` NVARCHAR(45) NULL,
`ReparacionesRealizadas` INT NULL,
/*------------------*/
`idBitacora` INT NULL,
`Movimiento` NVARCHAR(45)NULL,
/*------------------*/
`idTecnico_anterior` INT NOT NULL,
`NombreTecnico_anterior` NVARCHAR(45) NULL,
`ReparacionesRealizadas_anterior` INT NULL,

PRIMARY KEY(`idTecnico`)
);

Create Table `maquinasRecreativas`.`Bitacora_Suministro`(
`idSuministro` INT NOT NULL,
`idProveedor` INT NULL,
`voltaje` INT NULL,
`tipo` NVARCHAR(50) NULL,
/*------------------*/
`idBitacora` INT NULL,
`Movimiento` NVARCHAR(45)NULL,
/*------------------*/
`idSuministro_anterior` INT NOT NULL,
`idProveedor_anterior` INT NULL,
`voltaje_anterior` INT NULL,
`tipo_anterior` NVARCHAR(50) NULL,
PRIMARY KEY (`idSuministro`)
);

Create Table `maquinasRecreativas`.`Bitacora_Proveedor`(
`idProveedor` INT  NOT NULL,
`NombreProveedor` NVARCHAR(45) NULL,
/*------------------*/
`idBitacora` INT NULL,
`Movimiento` NVARCHAR(45)NULL,
/*------------------*/
`idProveedor_anterior` INT  NOT NULL,
`NombreProveedor_anterior` NVARCHAR(45) NULL,
PRIMARY KEY (`idProveedor`)
);


CREATE TABLE `maquinasrecreativas`.`Bitacora_comercio` (
  `idcomercio` INT NOT NULL,
  `CantidadPagada` INT NULL,
  `Recaudacion` INT NULL,
  `Nombre` VARCHAR(60) NULL,
  `PorcentajeExtra` INT NULL,
  
  /*--------------------*/
  `idBitacora` INT NULL,
  `Movimiento` NVARCHAR(45)NULL,
  /*--------------------*/
  `idcomercio_anterior` INT NOT NULL,
  `CantidadPagada_anterior` INT NULL,
  `Recaudacion_anterior` INT NULL,
  `Nombre_anterior` VARCHAR(60) NULL,
  `PorcentajeExtra_anterior` INT NULL,
  
  
  PRIMARY KEY (`idcomercio`));
  
  
  
  
  -- Consultas para arreglar tablas
ALTER TABLE `maquinasrecreativas`.`bitacora_tecnico` 
CHANGE COLUMN `idBitacora` `idBitacora` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `idTecnico_anterior` `idTecnico_anterior` INT(11) NULL DEFAULT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`, `idTecnico`);
;

ALTER TABLE `maquinasrecreativas`.`bitacora_tecnico` 
CHANGE COLUMN `idTecnico` `idTecnico` INT(11) NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`);
;

ALTER TABLE `maquinasrecreativas`.`bitacora_proveedor` 
CHANGE COLUMN `idProveedor` `idProveedor` INT(11) NULL DEFAULT NULL ,
CHANGE COLUMN `idBitacora` `idBitacora` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `idProveedor_anterior` `idProveedor_anterior` INT(11) NULL DEFAULT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`);
;

ALTER TABLE `maquinasrecreativas`.`bitacora_suministro` 
CHANGE COLUMN `idSuministro` `idSuministro` INT(11) NULL DEFAULT NULL ,
CHANGE COLUMN `idBitacora` `idBitacora` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `idSuministro_anterior` `idSuministro_anterior` INT(11) NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`);
;

ALTER TABLE `maquinasrecreativas`.`bitacora_maquinas` 
CHANGE COLUMN `idMaquina` `idMaquina` INT(11) NULL ,
CHANGE COLUMN `idBitacora` `idBitacora` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `idMaquina_anterior` `idMaquina_anterior` INT(11) NULL DEFAULT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`);
;

ALTER TABLE `maquinasrecreativas`.`bitacora_comercio` 
CHANGE COLUMN `idcomercio` `idcomercio` INT(11) NULL DEFAULT NULL ,
CHANGE COLUMN `idBitacora` `idBitacora` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `idcomercio_anterior` `idcomercio_anterior` INT(11) NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`);
;






  