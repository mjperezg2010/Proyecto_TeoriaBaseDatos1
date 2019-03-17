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
	
	<?php	
				
		//apcu_clear_cache ();
		
	?>
	
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
								echo "<form method=post>";
								echo "<input type=submit name=".$i." value=".$arrayProveedores[$i][1]." class=list-group-item list-group-item-action>";
								echo "</form>";
							}									
						?>							
                                             
                    </div>
                    
                    <div class="col-md-4">
						
                        <h2>Suministros de: 
							<?php								
								$flag = true;
								for ($i = 0; $i < count($arrayProveedores); $i++) {						
									if(isset($_POST[(string)$i])){	
										echo $_POST[(string)$i];
										apcu_store('proveedorActual', $_POST[(string)$i]);																																														
										apcu_store('idProveedorActual', $arrayProveedores[$i][0]);
										$flag = false;
										break;
									}
								}	
								if (apcu_exists('proveedorActual') and $flag)
									echo apcu_fetch('proveedorActual');
									
								
								
							?> 
						</h2>
                        <p>Seleccione el suministro deseado.
                        </p>
                        
							<?php
								if (apcu_exists('idProveedorActual')) {								
									$query='SELECT * FROM suministro WHERE idProveedor = '.apcu_fetch('idProveedorActual');
									$resultados=mysqli_query($conexion,$query);
									
									$arraySuministros=array();
									$cont = 0;
									while(($fila=mysqli_fetch_row($resultados))){
										for ($i = 0; $i <count($fila); $i++) {		
											$arraySuministros[$cont][$i] = $fila[$i];																			
										}		
										echo "<form method=post>";
										echo "<input type=submit name=".$cont."ss"." value=".$arraySuministros[$cont][0]." class=list-group-item list-group-item-action>";
										echo "</form>";																					
										$cont++;
									}					
								}else{
									echo "NO";
								}
							?>
							
                    </div>
					
					<div class="col-md-4">						
                        <h2>Tecnicos </h2>
                        <p>Tecnicos disponibles para el ensamblaje
                        </p>
							<?php
								$query='SELECT * FROM tecnico';
								$resultados=mysqli_query($conexion,$query);
								
								$arrayTecnicos=array();
								$cont = 0;
								while(($fila=mysqli_fetch_row($resultados))){
									for ($i = 0; $i <count($fila); $i++) {		
										$arrayTecnicos[$cont][$i] = $fila[$i];																			
									}		
									echo "<form method=post>";
									echo "<input type=submit name=".$cont."tt"." value=".$arrayTecnicos[$cont][1]." class=list-group-item list-group-item-action>";									
									echo "</form>";														
									$cont++;
								}																
							?>                        
                        </form>
                        
                    </div>
                
                </section>

            </div>
			
											
			<div>
				<br></br>							
			</div>
			<form method="post">
				<div class="input-group mb-3">															  			 
				
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Nombre de la maquina</span>
					</div>
					<input type="text" name="nameAA" class="form-control" placeholder="Ingrese" aria-describedby="basic-addon1">			  
				</div>
				
				<section class="main row">
				
					<div class="col-md-1">							
					</div>		
										
					<div class="col-md-1">							
					</div>		
					
					<div class="col-md-1">							
					</div>		
					
					<div class="col-md-1">							
					</div>		
					
					<div class="col-md-1">							
					</div>		
					<div class="col-md-1">							
					</div>		
					<div class="col-md-1">							
					</div>		
					<div class="col-md-1">							
					</div>		
					<div class="col-md-1">							
					</div>		
					
					<div class="col-md-1">		
						<input type="submit" name="gg" value= "Crear" id="Crear" class="list-group-item list-group-item-action">
						<br></br>
					</div>		
				</section>
			</form>
			<?php
				for ($i = 0; $i < count($arrayTecnicos); $i++) {	
					
					$nombreBoton = ((string)$i)."tt\n";					
					if(isset($_POST[$nombreBoton])){						
						apcu_store('tecnicoActual', $_POST[$nombreBoton]);																																																							
						apcu_store('idTtecnicoActual', $arrayTecnicos[$i][0]);																																																	
						break;
					}
				}	
	
				for ($i = 0; $i < count($arraySuministros); $i++) {						
					$nombreBoton = ((string)$i)."ss";										
					if(isset($_POST[$nombreBoton])){						
						apcu_store('suministroActual', $_POST[$nombreBoton]);																																																							
						apcu_store('idSuministroActual', $arraySuministros[$i][0]);																																																	
						break;
					}
				}
				
				if(isset($_POST["gg"])){
					echo 	'<div class="alert alert-success" role="alert">'.
					"Maquina ".$_POST["nameAA"]." creada con exito."
					.'</div>';					
					apcu_store('nombeMaquina', $_POST["nameAA"]);																				
					$mala = rand(0,10);
					if($mala = 2 or $mala = 5 or $mala = 8)
						$operativa = "No";
					else
						$operativa = "Si";
										
					$p1 = rand(1000,9999);					
					$p2 = '"'.apcu_fetch('nombeMaquina').'"';					
					$p3 = '"'.$operativa.'"';
					$p4 = rand(10000,30000);
					$p5 = (int)apcu_fetch('idTtecnicoActual');
					$p6 = (int)apcu_fetch('idSuministroActual');
					$p7 = "null";
					
					$query = "CALL insertarMaquina($p1,$p2,$p3,$p4,$p5,$p6,$p7);";					
					echo mysqli_query($conexion,$query);	
					
				}					
			?>
			
                   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>

