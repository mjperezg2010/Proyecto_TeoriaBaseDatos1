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
		<!--
		<div class="alert alert-primary" role="alert">
          A simple primary alert—check it out!
        </div>
        
        <div class="alert alert-success" role="alert">
          A simple success alert—check it out!
        </div>
		-->


	
	<?php
		session_start();
		ob_start();
	?>
    
    <!-- Invocar base de datos comercio-->
    <?php
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");
		$query="SELECT * FROM comercio";
		$resultados=mysqli_query($conexion,$query);
		
		$arrayComercios=array();
		$contComercios=0;
		while(($fila=mysqli_fetch_row($resultados))){
			$cont=0;
			while($cont<=6){
				$arrayComercios[$contComercios][$cont]=$fila[$cont];
				$cont++;
			}
			$contComercios++;
	}
	
	
	?>



	<!-- Invocar base de datos maquinas -->
	<?php
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");
		$query="SELECT * FROM maquinas";
		$resultados=mysqli_query($conexion,$query);
		
		$contMaquinas=0;
		$arrayMaquinas=array();
		while(($fila=mysqli_fetch_row($resultados))){
			$cont=0;
			while($cont<=6){
				$arrayMaquinas[$contMaquinas][$cont]=$fila[$cont];
				$cont++;
				
			}
			$contMaquinas++;
			
		}
  ?>
  
	<!-- Recibir comercio-->
   <!-- Funcion para el boton  -->
	
   




	<!-- Contenido html -->

	<h1 style="text-align:center"> Maquinas a Distribuir</h1>
	 <div class="container">
            	<br> <br> <br> 
            	<h2> Maquinas Recreativas en Bodega </h2>
            	<form action="" method="post">
                    <table class="table">
                    	<tr>
                        	<th>IDMaquina</th>
                            <th>NombreMaquina</th>
                            <th>EstaOperativa</th>
                            <th>Ganancia</th>
                            <th>IDTecnico</th>
                            <th>IDSuministro</th>
                        </tr>
                    	<?php
							global $arrayMaquinas;
							$cont=0;
							$num=0;
							while($cont<=count($arrayMaquinas)-1){
								echo "<tr>";
								$cont1=0;
								while($cont1<=5){
									if($arrayMaquinas[$cont][2]=="Si"){
										
										echo "<td><input type=submit name=".$num." value=".$arrayMaquinas[$cont][$cont1]."
												 class='list-group-item list-group-item-action'></td>";
										
									}
											 
									
									$cont1++;
									$num++;
									
								}
								$cont++;
								$num++;
								echo "</tr>";
							}
		
						?>
                       
                     </table>
                 </form>
            </div>
            
			<form action="comercio_eleccion.php" method="post">
            <input type=submit name="botonvolver" value="Regresar" class="btn btn-primary">
            </form>
 
    
            


		<!-- Funcion para obtener el id del comercio enviado desde la otra pagina
		<?php
		
			function obtenerIdComercio(){
				global $arrayComercios;
				global $idComercio;
				global $id;
				$contComercios=0;
				while($contComercios<=count($arrayComercios)-1){
					if($arrayComercios[$contComercios][3]==$idComercio){
						
						return $arrayComercios[$contComercios][0];
					}
					$contComercios++;	
				}	
			}
		?>
        
        <!-- Funcion para botones de las maquinas -->
        <?php
		
			for($i=0;$i<$num;$i++){
				if(isset($_POST[strval($i)])){
					//global $idComercio;
					
					
					updateMaquina($_POST[strval($i)]);
				
				}
			}
			
			
			
		?>
        
       
        
        
        
        
        <!-- Funcion para hacer el update de la maquina -->
        <?php
			
			
			function updateMaquina($nombreMaquina){
				$idMaquina=0;
				global $arrayMaquinas;
				//Obtener el id de Maquina
				for($i=0;$i<count($arrayMaquinas);$i++){
					if($arrayMaquinas[$i][1]==$nombreMaquina){
							$idMaquina=$arrayMaquinas[$i][0];
							break;
					}
					
				}
				
				
				
				
				
				
				
				
				try{
					//UPDATE `maquinasrecreativas`.`maquinas` SET `idComercio` = 'PERRO' WHERE (`idMaquina` = '4344');
					//INSERT INTO `maquinasrecreativas`.`maquinas` (`idMaquina`) VALUES ('E');
					$base=new PDO('mysql:host=localhost; dbname=maquinasrecreativas','root','');
					$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$base->exec("SET CHARACTER SET utf8");
					
					$sql="UPDATE MAQUINAS SET idComercio = :y WHERE (idMaquina='".$idMaquina."')";
					
					$resultado=$base->prepare($sql);
					//$resultado->execute(array)
					$resultado->execute(array(":y"=>$_SESSION['idComercio']));
					
					
					echo '<div class="alert alert-success" role="alert">
							  Se le ha asignado el comercio a la maquina con id = '.$idMaquina.'
						  </div>';
					
					//Maquina se le genera un defecto
					$ran=randomId();
					if($ran==false){
						echo "No se hizo nada";
						
					}else{
						$sql="UPDATE MAQUINAS SET EstaOperativa = :y WHERE (idMaquina='".$ran."')";
						$resultado=$base->prepare($sql);
						//$resultado->execute(array)
						$resultado->execute(array(":y"=>"No"));
						
						echo '<div class="alert alert-primary" role="alert">
         					 La maquina con Id de '.$ran.'
        					</div>';
					}
					
					
					
					
					
				}catch(Exception $e){
					
					die('Error: '.$e->GetMessage());
					
				}
				
				
			}
	
		?>
        
        <!-- Generar numero aleatorio -->
        <?php
		function randomId(){
			global $arrayMaquinas;
			$d1=rand(0,count($arrayMaquinas)-1);
			$d=rand(1,10);
			
				if($d==2 or $d==5 or $d==8 or $d==3){
					return $arrayMaquinas[$d1][0];
					
				}else{
					return false;	
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