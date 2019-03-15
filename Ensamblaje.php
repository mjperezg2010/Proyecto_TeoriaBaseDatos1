<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Estilos personalizados -->
	<link rel="stylesheet" href="css/estilos.css">
    <title>Hello, world!</title>
  </head>
  <body>
  
  <!-- Variables globales  -->
  <?php
	$numeroMinorista=0;
	$numeroMayorista=3;
	$idComercio="";
	$flag = true;
  ?>
  
  <?php
	//session_start();
	//ob_start();
	//$_SESSION['nombreMaquinaCC'] = $nombreMaquinaCC;
	//$_SESSION['idProveedorCC'] = $idProveedorCC;
	//$_SESSION['idTecnicoCC'] = $idTecnicoCC;			
?>
  
  <!-- Conexion con la Base de Datos Para Maquinas-->
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
  
  <!-- Conexion Base de Datos para comercios-->
  <?php
  	$db_host="localhost";
	$db_nombre="maquinasrecreativas";	
	$db_usuario="root";
	$db_contra="";
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
	mysqli_set_charset($conexion,"utf8");
	
	
	//CARGAR PROVEEDORES
	$query="SELECT * FROM proveedor";
	$resultados=mysqli_query($conexion,$query);	
	$arrayProveedores=array();
	$cont = 0;
	while(($fila=mysqli_fetch_row($resultados))){
		for ($i = 0; $i <count($fila); $i++) {		
			$arrayProveedores[$cont][$i] = $fila[$i];			
		}		
		$cont++;
	}
		


  ?>
  
  <!-- Titulo principal -->
  
  <h1>Ensamblaje</h1>
  <p>
	En esta seccion podra montar maquinas recreativas, debe ingresar el nombre de la maquina, escoger
	proveedor, luego un suministro (placa, carcasa) proporcionado por el mismo, un tecnico de montaje y
	un tecnico de revision. Cuando este todo listo, precione aceptar.
  </p>
	
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon3">Nombre de la maquina</span>
	  </div>
	  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
	</div>
  <h1 class="display-3"></h1>
  	<br>
        	<div class="container">
            	<section class="main row">
                    <div class="col-md-4">
                        <h2>Proveedores</h2>
                        <p>Seleccione un proveedor para ver los suministros disponibles
                        </p>
                        
                        
							<?php
								for ($i = 0; $i <count($arrayProveedores); $i++) {																		
									//echo "<input type=submit name=".$i." value=".$arrayProveedores[$i][1]." id=boton".$i."class=list-group-item list-group-item-action>";
									echo "<form method=post>";
									echo "<input type=submit name=".$i." value=".$arrayProveedores[$i][1]." class=list-group-item list-group-item-action>";
									echo "</form>";
								}									
							?>							
                        
                        
                    </div>
                    
                    <div class="col-md-4">
						
                        <h2>Suministros de: 
							<?php	
								for ($i = 0; $i < count($arrayProveedores); $i++) {						
									if(isset($_POST[(string)$i])){										
										echo $_POST[(string)$i];
										$flag = true;
										break;
									}else{										
										$flag = false;
									}
								}
								if($i == count($arrayProveedores))
									echo $arrayProveedores[0][1];
								
							?> 
						</h2>
                        <p>Seleccione el suministro deseado.
                        </p>
                        
							<?php
								if($flag){																
									$query='SELECT * FROM suministro WHERE idProveedor = '.$arrayProveedores[$i][0];
									$resultados=mysqli_query($conexion,$query);
									
									$arraySuministros=array();
									$cont = 0;
									while(($fila=mysqli_fetch_row($resultados))){
										for ($i = 0; $i <count($fila); $i++) {		
											$arraySuministros[$cont][$i] = $fila[$i];																			
										}		
										echo "<form method=post>";
										echo "<input type=submit name=".$i."sum"." value=".$arraySuministros[$cont][0]." class=list-group-item list-group-item-action>";
										echo "</form>";
										$cont++;
									}								
								}else{
									$query='SELECT * FROM suministro WHERE idProveedor = '.$arrayProveedores[0][0];
									$resultados=mysqli_query($conexion,$query);
									
									$arraySuministros=array();
									$cont = 0;
									$fila=mysqli_fetch_row($resultados);
									//while(($fila=mysqli_fetch_row($resultados))){
										for ($i = 0; $i <count($fila); $i++) {		
											$arraySuministros[$cont][$i] = $fila[$i];																			
										}		
										echo "<form method=post>";
										echo "<input type=submit name=".$i."sum"." value=".$arraySuministros[0][0]." class=list-group-item list-group-item-action>";
										echo "</form>";
										//$cont++;
									//}
								}
							?>
							
                    </div>
					
					<div class="col-md-4">
                        <h2>Tecnicos </h2>
                        <p>Tecnicos disponibles para el ensamblaje
                        </p>
							<?php
								//if($flag)
									//return;
								$query='SELECT * FROM tecnico';
								$resultados=mysqli_query($conexion,$query);
								
								$arraySuministros=array();
								$cont = 0;
								while(($fila=mysqli_fetch_row($resultados))){
									for ($i = 0; $i <count($fila); $i++) {		
										$arraySuministros[$cont][$i] = $fila[$i];																			
									}		
									echo "<form method=post>";
									echo "<input type=submit name=".$i."tt"." value=".$arraySuministros[$cont][1]." class=list-group-item list-group-item-action>";
									echo "</form>";
									$cont++;
								}								
									
							?>                        
                        </form>
                        
                    </div>
                
                </section>

            </div>
			
								
			<br></br>
			<section class="main row">
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				<div class="col-sm-1">			
				</div>
				
				
				<div class="col-sm-1">			
					<form method=post>
						<input type="submit" name="gg" value= "Crear" id="Crear" class="list-group-item list-group-item-action">
					</form>
				</div>
				
				
			</section>
			
			<br></br>
						
			
			
			<?php
				if(isset($_POST["gg"])){
					echo 	'<div class="alert alert-success" role="alert">
					Maquina creada.
					</div>';
							
				}
						
			?>
			
            
   
    
 
    
    
    <!-- Funcion para lista de comercios  -->
    <?php
		
		function minorista(){
			global $arrayComercios;
			global $numeroMinorista;
			
			
			echo $arrayComercios[$numeroMinorista][3];
			$numeroMinorista++;
			
		}
		
		function mayorista(){
			global $arrayComercios;
			global $numeroMayorista;
			
			echo $arrayComercios[$numeroMayorista][3];
			$numeroMayorista++;
		}
	?>
    
    
    
    <!-- Funcion para buscar el valor de idMaquina -->
    <?php
		function updateMaquinaComercio($nombre){
			global $idComercio;
			$db_host="localhost";
			$db_nombre="maquinasrecreativas";	
			$db_usuario="root";
			$db_contra="";
			
			echo $nombre." - ".$idComercio;
			
			$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
			mysqli_set_charset($conexion,"utf8");
			$query="UPDATE`maquinas` SET `idComercio` =".$idComercio." WHERE (`nombreMaquina` = ".$nombre.")";
			$resultados=mysqli_query($conexion,$query);
			
		}//UPDATE `maquinasrecreativas`.`maquinas` SET `idPiezaReciclada` = '67' WHERE (`idMaquina` = '45');
	
	?>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>