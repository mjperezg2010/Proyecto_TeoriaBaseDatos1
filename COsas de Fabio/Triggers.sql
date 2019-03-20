use maquinasrecreativas;

DELIMITER $$

CREATE TRIGGER Insert_bitacora_tecnico AFTER INSERT ON tecnico
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_tecnico(idTecnico,NombreTecnico,ReparacionesRealizadas,idBitacora,Movimiento,idTecnico_anterior,
    NombreTecnico_anterior,ReparacionesRealizadas_anterior)
	VALUES (new.idTecnico,new.NombreTecnico,new.ReparacionesRealizadas,null,"INSERT",null,null,null);
END 
$$

DELIMITER $$
CREATE TRIGGER Update_bitacora_tecnico AFTER UPDATE ON tecnico
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_tecnico(idTecnico,NombreTecnico,ReparacionesRealizadas,idBitacora,Movimiento,idTecnico_anterior,
    NombreTecnico_anterior,ReparacionesRealizadas_anterior)
	VALUES (new.idTecnico,new.NombreTecnico,new.ReparacionesRealizadas,null,"UPDATE",old.idTecnico,
    old.NombreMaquina,old.ReparacionesRealizadas);
END 

$$

DELIMITER $$
CREATE TRIGGER Delete_bitacora_tecnico AFTER DELETE ON tecnico
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_tecnico(idTecnico,NombreTecnico,ReparacionesRealizadas,idBitacora,Movimiento,idTecnico_anterior,
    NombreTecnico_anterior,ReparacionesRealizadas_anterior)
	VALUES (null,null,null,null,"DELETE",old.idTecnico,old.NombreMaquina,old.ReparacionesRealizadas);
END 

$$


-- Trigger Suministro
DELIMITER $$
CREATE TRIGGER Insert_bitacora_suministro AFTER INSERT ON suministro
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_suministro(idSuministro,idProveedor,voltaje,tipo,idBitacora,Movimiento,idSuministro_anterior,
	idProveedor_anterior,voltaje_anterior,tipo_anterior)
	VALUES (new.idSuministro,new.idProveedor,new.voltaje,new.tipo,null,"INSERT",null,
	null,null,null);

END 

$$


CREATE TRIGGER Update_bitacora_suministro AFTER UPDATE ON suministro
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_suministro(idSuministro,idProveedor,voltaje,tipo,idBitacora,Movimiento,idSuministro_anterior,
	idProveedor_anterior,voltaje_anterior,tipo_anterior)
	VALUES
        (new.idSuministro,new.idProveedor,new.voltaje,new.tipo,null,"UPDATE",
        old.idSuministro,old.idProveedor,old.voltaje,old.tipo);

END 

$$

CREATE TRIGGER Delete_bitacora_suministro AFTER DELETE ON suministro
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_suministro(idSuministro,idProveedor,voltaje,tipo,idBitacora,Movimiento,idSuministro_anterior,
	idProveedor_anterior,voltaje_anterior,tipo_anterior)
	VALUES
        (null,null,null,null,null,"DELETE",
        old.idSuministro,old.idProveedor,old.voltaje,old.tipo);

END 

$$


-- Trigger de proveedor
CREATE TRIGGER Insert_bitacora_proveedor AFTER INSERT ON proveedor
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_proveedor(idProveedor,NombreProveedor,idBitacora,Movimiento,idProveedor_anterior,NombreProveedor_anterior)
	VALUES (new.idProveedor,new.NombreProveedor,null,"INSERT",null,null);


END 

$$


CREATE TRIGGER Update_bitacora_proveedor AFTER UPDATE ON proveedor
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_proveedor(idProveedor,NombreProveedor,idBitacora,Movimiento,idProveedor_anterior,NombreProveedor_anterior)
	VALUES (new.idProveedor,new.NombreProveedor,null,"UPDATE",old.idProveedor,old.NombreProveedor);


END 

$$

CREATE TRIGGER Delete_bitacora_proveedor AFTER DELETE ON proveedor
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_proveedor(idProveedor,NombreProveedor,idBitacora,Movimiento,idProveedor_anterior,old.NombreProveedor)
	VALUES (null,null,null,"DELETE",old.idProveedor,old.NombreProveedor);
END 

$$

-- Trigger Maquinas
CREATE TRIGGER Insert_bitacora_maquinas AFTER INSERT ON maquinas
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_maquinas (idMaquina,nombreMaquina,EstaOperativa,Ganancia,idTecnico,idSuministro,idComercio,idBitacora,Movimiento,
	idMaquina_anterior,nombreMaquina_anterior,EstaOperativa_anterior,Ganancia_anterior,idTecnico_anterior,idSuministro_anterior,idComercio_anterior)

	VALUES (new.idMaquina,new.nombreMaquina,new.EstaOperativa,new.Ganancia,new.idTecnico,new.idSuministro,new.idComercio,null,"INSERT",
	null,null,null,null,null,null,null);


END 

$$


CREATE TRIGGER Update_bitacora_maquinas AFTER UPDATE ON maquinas
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_maquinas (idMaquina,nombreMaquina,EstaOperativa,Ganancia,idTecnico,idSuministro,idComercio,idBitacora,Movimiento,
	idMaquina_anterior,nombreMaquina_anterior,EstaOperativa_anterior,Ganancia_anterior,idTecnico_anterior,idSuministro_anterior,idComercio_anterior)

	VALUES (new.idMaquina,new.nombreMaquina,new.EstaOperativa,new.Ganancia,new.idTecnico,new.idSuministro,new.idComercio,null,"UPDATE",
	old.idMaquina,old.nombreMaquina,old.EstaOperativa,old.Ganancia,old.idTecnico,old.idSuministro,old.idComercio);


END 

$$

CREATE TRIGGER Delete_bitacora_maquinas  AFTER DELETE ON maquinas
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_maquinas (idMaquina,nombreMaquina,EstaOperativa,Ganancia,idTecnico,idSuministro,idComercio,idBitacora,Movimiento,
	idMaquina_anterior,nombreMaquina_anterior,EstaOperativa_anterior,Ganancia_anterior,idTecnico_anterior,idSuministro_anterior,idComercio_anterior)

	VALUES (null,null,null,null,null,null,null,null,"DELETE",
	old.idMaquina,old.nombreMaquina,old.EstaOperativa,old.Ganancia,old.idTecnico,old.idSuministro,old.idComercio);


END 

$$


-- Comercio triggers

CREATE TRIGGER Insert_bitacora_comercio AFTER INSERT ON comercio
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_comercio (idcomercio,CantidadPagada,Recaudacion,Nombre,PorcentajeExtra,
    idBitacora,Movimiento,idcomercio_anterior,CantidadPagada_anterior,Recaudacion_anterior,Nombre_anterior,
    PorcentajeExtra_anterior)
	VALUES (new.idcomercio,new.CantidadPagada,new.Recaudacion,new.Nombre,new.PorcentajeExtra,
    null,"INSERT",null,null,null,null,null);
END 

$$


CREATE TRIGGER Update_bitacora_comercio AFTER UPDATE ON comercio
FOR EACH ROW
BEGIN

	INSERT INTO bitacora_comercio (idcomercio,CantidadPagada,Recaudacion,Nombre,PorcentajeExtra,
    idBitacora,Movimiento,idcomercio_anterior,CantidadPagada_anterior,Recaudacion_anterior,Nombre_anterior,
    PorcentajeExtra_anterior)
	VALUES (new.idcomercio,new.CantidadPagada,new.Recaudacion,new.Nombre,new.PorcentajeExtra,
    null,"UPDATE",old.idcomercio,old.CantidadPagada,old.Recaudacion,old.Nombre,old.PorcentajeExtra);
    

END 

$$

CREATE TRIGGER Delete_bitacora_comercio  AFTER DELETE ON comercio
FOR EACH ROW
BEGIN
	INSERT INTO bitacora_comercio (idcomercio,CantidadPagada,Recaudacion,Nombre,PorcentajeExtra,
    idBitacora,Movimiento,idcomercio_anterior,CantidadPagada_anterior,Recaudacion_anterior,Nombre_anterior,
    PorcentajeExtra_anterior)
	VALUES (null,null,null,null,null,
    null,"DELETE",old.idcomercio,old.CantidadPagada,old.Recaudacion,old.Nombre,old.PorcentajeExtra);



END 

$$


-- Trigger reparacion
/*
DELIMITER $$
CREATE TRIGGER trigger_comprobacionmaquina AFTER INSERT ON maquinas
FOR EACH ROW
BEGIN
	IF new.EstaOperativa = "No" THEN BEGIN
		INSERT INTO tabla_comprobacionmaquina(idMaquina,nombreMaquina,EstaOperativa,Ganancia,IdTecnico,
					idSuministro,idComercio) VALUES(new.idMaquina,new.nombreMaquina,new.EstaOperativa,new.Ganancia,
                    new.idTecnico,new.idSuministro,new.idComercio);
		
		END; END IF;


END 
$$


DELIMITER $$
CREATE TRIGGER trigger_reparacionmaquina AFTER UPDATE ON maquinas
FOR EACH ROW
BEGIN
	IF new.EstaOperativa = "No" THEN BEGIN
		INSERT INTO tabla_reparacionmaquina(idMaquina,nombreMaquina,EstaOperativa,Ganancia,IdTecnico,
					idSuministro,idComercio) VALUES(old.idMaquina,old.nombreMaquina,new.EstaOperativa,old.Ganancia,
                    old.idTecnico,old.idSuministro,old.idComercio);
		
		END; END IF;


END 
$$*/






