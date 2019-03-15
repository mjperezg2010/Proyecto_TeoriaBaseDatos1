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
                            <th>IDPiezaReciclada</th>
                        </tr>
                    	<?php
							global $arrayMaquinas;
							$cont=0;
							$num=0;
							while($cont<=count($arrayMaquinas)-1){
								echo "<tr>";
								$cont1=0;
								while($cont1<=5){
									
									
									echo "<td><input type=submit name=".$num." value=".$arrayMaquinas[$cont][$cont1]."
											 class='list-group-item list-group-item-action'></td>";
											 
									
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
		
			for($i=0;$i<count($arrayMaquinas);$i++){
				if(isset($_POST[strval($i)])){
					//global $idComercio;
					session_start();
					ob_start();
					echo $_SESSION['idComercio'];
					updateMaquina();
				
				}
			}
			
			
			
		?>
        
       
        
        
        
        
        <!-- Funcion para hacer el update de la maquina -->
        <?php
			
			
			function updateMaquina(){
				
				//Obtener la funcion
				
				
				
				
				
				
				
				
				
				try{
					//UPDATE `maquinasrecreativas`.`maquinas` SET `idComercio` = 'PERRO' WHERE (`idMaquina` = '4344');
					//INSERT INTO `maquinasrecreativas`.`maquinas` (`idMaquina`) VALUES ('E');
					$base=new PDO('mysql:host=localhost; dbname=maquinasrecreativas','root','');
					$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$base->exec("SET CHARACTER SET utf8");
					
					$sql="UPDATE MAQUINAS SET idComercio = :y WHERE (idMaquina='4344')";
					
					$resultado=$base->prepare($sql);
					//$resultado->execute(array)
					$resultado->execute(array(":y"=>$_SESSION['idComercio']));
					
					
					echo "Registro insertado - ".$_SESSION['idComercio'];
					
					
					echo 'Conexion OK';
					
					
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