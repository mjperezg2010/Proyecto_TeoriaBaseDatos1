Create DATABASE `maquinasRecreativas`;

Create Table `maquinasRecreativas`.`Maquinas` (

`idMaquina` INT NOT NULL ,
`EstaOperativa` NVARCHAR(30) NULL,
`Ganancia` INT NULL, 
`idTecnico` INT NULL,
`idPiezaReciclada` INT NULL,
`idComercio` INT NULL,
PRIMARY KEY(`idMaquina`)

);

Create Table `maquinasRecreativas`.`Tecnico`(
`idTecnico` INT NOT NULL,
`ReparacionesRealizadas` INT NULL,
PRIMARY KEY(`idTecnico`)
);

Create Table `maquinasRecreativas`.`Suministro`(
`idSuministro` INT NOT NULL,
`idProveedor` INT NULL,
`idMaquina` INT NULL,
`voltaje` INT NULL,
`tipo` NVARCHAR(50) NULL,
PRIMARY KEY (`idSuministro`)
);

Create Table `maquinasRecreativas`.`Proveedor`(
`idProveedor` INT  NOT NULL,
PRIMARY KEY (`idProveedor`)
);

Create Table `maquinasRecreativas`.`informe`(
`idInforme` INT NOT NULL,
`informeIndividual` BIT NULL,
`informeGlobal` BIT NULL,
PRIMARY KEY(`idInforme`)
);

Create Table `maquinasRecreativas`.`Genera`(
`idInforme` INT NOT NULL,
`idComercio` INT NULL,
PRIMARY KEY (`idInforme`)
);

Create Table `maquinasRecreativas`.`DatosComercio`(
`idInforme` INT NOT NULL,
`DatoComercio` NVARCHAR(300) NULL,
PRIMARY KEY(`idInforme`)
);

Create Table `maquinasRecreativas`.`Ubicaciones`(
`idInforme` INT NOT NULL,
`Ubicacion` NVARCHAR(250) NULL,
PRIMARY KEY(`idInforme`)
);

Create Table `maquinasRecreativas`.`CantidadPagada_Mes`(
`idInforme` INT NOT NULL,
`cantidad` INT NULL,
PRIMARY KEY (`idInforme`)
);

Create Table `maquinasRecreativas`.`PorcentajeExtra`(
`idInforme` INT NOT NULL,
`porcentaje` INT NULL,
PRIMARY KEY (`idInforme`)
);

Create Table `maquinasRecreativas`.`RecaudacionesMensuales`(
`idInforme` INT NOT NULL,
`Recaudacion` INT NULL,
PRIMARY KEY (`idInforme`)
);