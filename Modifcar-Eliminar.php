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
    <title>Administrar objetos</title>
  </head>
  <body>  

	<?php
		//session_start();
		//ob_start();
		//$flag = $_SESSION['indicador'];
		$flag = 0;
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");
		
		
		//CARGAR PROVEEDORES
		switch($flag){
			case 0:
				//MAQUINAS
				$query="SELECT * FROM maquinas";
				$resultados=mysqli_query($conexion,$query);	
				break;
			case 1:
				//TECNICOS
				$query="SELECT * FROM tecnico";
				$resultados=mysqli_query($conexion,$query);	
				break;
			case 2:
				//COMERCIOS
				$query="SELECT * FROM comercio";
				$resultados=mysqli_query($conexion,$query);	
				break;
			default:
				break;
		}
		
		
		$cont = 0;
		while(($fila=mysqli_fetch_row($resultados))){
			for ($i = 0; $i <count($fila); $i++) {		
				$array[$cont][$i] = $fila[$i];			
			}		
			$cont++;
		}		
	  ?>
  
  <!-- Titulo principal -->
  
  <h1>Administracion</h1>  
  <p>
	En esta seccion podra modificar maquinas, comercios y tecnicos. Seleccione de la columna izquierda el item a modificar/eliminar.
  </p>	
	
	
  <h1 class="display-3"></h1>
  	<br>
        	<div class="container">
            	<section class="main row">
                    <div class="col-md-6">
                        <h2>Items</h2>
                        <p>Seleccione
                        </p>
                                                
						<?php
							for ($i = 0; $i <count($array); $i++) {																										
								echo "<form method=post>";
										switch($flag){
										case 0:
											//MAQUINAS																						
										case 1:
											//TECNICOS
											echo "<input type=submit name=".$i." value=".$array[$i][1]." class=list-group-item list-group-item-action>";
											break;
										case 2:
											//COMERCIOS
											echo "<input type=submit name=".$i." value=".$array[$i][3]." class=list-group-item list-group-item-action>";
											break;
										default:
											break;
									}								
								echo "</form>";
							}									
						?>							
                                             
                    </div>
                    
                    <div class="col-md-6">
						
						<h1>Modificacion</h1>
						<?php				
						for ($i = 0; $i <count($array); $i++) {	
							if(isset($_POST[(string)$i])){								
								$posActual = $i;
								break;
							}
							$posActual = 0;
						}
						switch($flag){
							case 0:
								//MAQUINAS
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>id Maquina</span>
										<input type=text name=1 value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
									</div>";
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>Nombre de maquina</span>
										<input type=text name=2 value=".$array[$posActual][1]." class=form-control aria-describedby=basic-addon1>
									</div>";
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>Esta operativa</span>
										<input type=text name=3 value=".$array[$posActual][2]." class=form-control aria-describedby=basic-addon1>
									</div>";
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>Ganancia</span>
										<input type=text name=4 value=".$array[$posActual][3]." class=form-control aria-describedby=basic-addon1>
									</div>";
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>id Tecnico</span>
										<input type=text name=5 value=".$array[$posActual][4]." class=form-control aria-describedby=basic-addon1>
									</div>";
								echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>id Suministro</span>
										<input type=text name=6 value=".$array[$posActual][5]." class=form-control aria-describedby=basic-addon1>
									</div>";								
								break;
							case 1:
								//TECNICOS
								
								break;
							case 2:
								//COMERCIOS
								
								break;
							default:
								break;
						}
						?>
						<br>
						<section class="main row">
						
							<div class="col-md-3">		
								
								<input type="submit" name="gg" value= "Modificar" id="Modificar" class="list-group-item list-group-item-action">
								
							</div>	
							<div class="col-md-3">									
							</div>	
							<div class="col-md-3">		
								
								<input type="submit" name="gg" value= "Eliminar" id="Eliminar" class="list-group-item list-group-item-action">
								
							</div>	
						</section>
                    </div>
					                
                </section>
				<

            </div>
			
				
                   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>

