USE maquinasrecreativas;

DELIMITER $$
CREATE TRIGGER trigger_comprobacionmaquina AFTER INSERT ON maquinas
FOR EACH ROW
BEGIN
	IF new.EstaOperativa = "No" THEN BEGIN
		INSERT INTO tabla_comprobacionmaquina(idMaquina,nombreMaquina,EstaOperativa,Ganancia,IdTecnico,
					idPiezaReciclada,idComercio) VALUES(new.idMaquina,new.nombreMaquina,new.EstaOperativa,new.Ganancia,
                    new.idTecnico,new.idPiezaReciclada,new.idComercio);
		
		END; END IF;


END 
$$


-- DROP TRIGGER IF EXISTS trigger_comprobacionmaquina;
