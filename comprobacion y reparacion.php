<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Estilos personalizados -->
	<link rel="stylesheet" href="css/estilos.css">
<title>Documento sin título</title>
</head>

<body>

	<!-- Cargar Maquinas Malas -->
	<?php
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");
		$query="SELECT * FROM tabla_comprobacionmaquina";
		$resultados=mysqli_query($conexion,$query);
		
		$arrayMaquinasMalas=array();
		$contMalas=0;
		while(($fila=mysqli_fetch_row($resultados))){
			$cont=0;
			while($cont<=6){
				$arrayMaquinasMalas[$contMalas][$cont]=$fila[$cont];
				$cont++;
			}
			$contMalas++;
		}
	
	?>

	<h1 style="text-align:center"> Comprobacion y Reparacion de Maquinas</h1>
    <form action="" method="post">
    	<input type=submit name="botonInicio" value="Inicio" class="btn btn-info">
    </form>
    
    <br><br>
    
    <h2 style="text-align:center">Maquinas Defectuosas despues de Ensamblaje</h2>
    
    <br><br>
    <section class="main row">
        <div class="col-md-8">
        
        	
            	<table class="table">
                    <tr>
                        <th>ID</th>
                        <th>NombreMaquina</th>
                    </tr>
                	
        	<?php
				for($i=0;$i<count($arrayMaquinasMalas);$i++){
					echo "<tr>";
					echo "<td>".$arrayMaquinasMalas[$i][0]."</td>";
					echo "<td>".$arrayMaquinasMalas[$i][1]."</td>";
					echo "</tr>";
	
				}
			
			?>
            		
            	</table>          
        </div>
        
        <div class="col-md-4">
        	<form action="" method="post">
            <input type=submit name="botonUpdate" value="Mandar a Reparar Maquinas" class="btn btn-info">
            </form>
           
            
            
        </div>
    
    </section>
    
    
  


	<?php
		if(isset($_POST['botonUpdate'])){
			
			actualizar();
		}
	
	?>
    
    <?php
		function actualizar(){
			global $arrayMaquinasMalas;
			
			
			try{
					//UPDATE `maquinasrecreativas`.`maquinas` SET `idComercio` = 'PERRO' WHERE (`idMaquina` = '4344');
					//INSERT INTO `maquinasrecreativas`.`maquinas` (`idMaquina`) VALUES ('E');
					$base=new PDO('mysql:host=localhost; dbname=maquinasrecreativas','root','');
					$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$base->exec("SET CHARACTER SET utf8");
					
					
					
					
					for($i=0;$i<count($arrayMaquinasMalas);$i++){
						$sql="UPDATE MAQUINAS SET EstaOperativa = :temp WHERE (idMaquina='".$arrayMaquinasMalas[$i][0]."')";
						$resultado=$base->prepare($sql);
						$resultado->execute(array(":temp"=>"Si"));
						
						$sql="DELETE FROM TABLA_COMPROBACIONMAQUINA WHERE idMaquina=:temp";
						$resultado=$base->prepare($sql);
						$resultado->execute(array(":temp"=>$arrayMaquinasMalas[$i][0]));
						
						echo "Registro insertado";
						
						
						echo 'Conexion OK';
					}
					
					
				}catch(Exception $e){
					
					die('Error: '.$e->GetMessage());
					
				}
				
		
		
		}
	
	?>




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>