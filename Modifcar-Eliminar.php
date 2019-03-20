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
		session_start();
		ob_start();
		$flag = $_SESSION['flag'];		
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";
		
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");
		
		
		
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
			case 3:
				//SUMINISTRO
				$query="SELECT * FROM suministro";
				$resultados=mysqli_query($conexion,$query);	
				break;
			case 4:
				//PROVEEDOR
				$query="SELECT * FROM proveedor";
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
	<?php
	if(isset($_POST["Modificar"])){						
		switch($flag){
			case 0:											
				$p1 = (int)$_POST["a"];
				$p2 = '"'.$_POST["b"].'"';					
				$p3 = '"'.$_POST["c"].'"';
				$p4 = (int)$_POST["d"];
				$p5 = (int)$_POST["e"];
				$p6 = (int)$_POST["f"];									
				$query = "CALL modificarMaquina($p1,$p2,$p3,$p4,$p5,$p6);";					
								
				mysqli_query($conexion,$query);	
				break;								
																									
			case 1:
				$p1 = (int)$_POST["a"];
				$p2 = '"'.$_POST["b"].'"';					
				$p3 = (int)$_POST["c"];
				$query = "CALL modificarTecnico($p1,$p2,$p3);";													
				mysqli_query($conexion,$query);	
				break;
				
			case 2:
				$p1 = (int)$_POST["a"];
				$p2 = (int)$_POST["b"];
				$p3 = (int)$_POST["c"];
				$p4 = '"'.$_POST["d"].'"';									
				$p5 = (int)$_POST["e"];				
				$p6 = '"'.$_POST["f"].'"';					
				$query = "CALL modificarComercio($p1,$p2,$p3,$p4,$p5,$p6);";					
								
				mysqli_query($conexion,$query);	
				break;							
			case 4:
				$p1 = (int)$_POST["a"];
				$p2 = '"'.$_POST["b"].'"';									
				$query = "CALL modificarProveedor($p1,$p2);";					
								
				mysqli_query($conexion,$query);	
			default:
				break;
		}								
	}
	if(isset($_POST["Eliminar"])){	
		$p1 = (int)$_POST["a"];
		switch($flag){
			case 0:
				//MAQUINAS	
				$query = "CALL eliminarMaquina($p1);";
			case 1:
				//TECNICOS
				$query = "CALL eliminarTecnico($p1);";
				break;
			case 2:
				//COMERCIOS
				$query = "CALL eliminarComercio($p1);";
				break;
			case 3:
				//SUMINISTRO
				$query = "CALL eliminarSuministro($p1);";
				break;
			case 4:
				//PROVEEDOR
				$query = "CALL eliminarProveedor($p1);";
				break;
			default:
				break;
		}	
		
															
		mysqli_query($conexion,$query);	
	}
?>
	
  <h1 class="display-3"></h1>
  	<br>
        	<div class="container">
				<form method="post">
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
										case 3:
											//SUMINSITRO
											echo "<input type=submit name=".$i." value=".$array[$i][0]." class=list-group-item list-group-item-action>";
											break;
										case 4:
											//PROVEEDOR
											echo "<input type=submit name=".$i." value=".$array[$i][1]." class=list-group-item list-group-item-action>";
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
											<input type=text id=a name=a value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Nombre de maquina</span>
											<input type=text name=b value=".$array[$posActual][1]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Esta operativa</span>
											<input type=text name=c value=".$array[$posActual][2]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Ganancia</span>
											<input type=text name=d value=".$array[$posActual][3]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>id Tecnico</span>
											<input type=text name=e value=".$array[$posActual][4]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>id Suministro</span>
											<input type=text name=f value=".$array[$posActual][5]." class=form-control aria-describedby=basic-addon1>
										</div>";								
																									
									break;
								case 1:
									//TECNICOS
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>id Tecnico</span>
											<input type=text id=a name=a value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Nombre de tecnico</span>
											<input type=text name=b value=".$array[$posActual][1]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Reparaciones</span>
											<input type=text name=c value=".$array[$posActual][2]." class=form-control aria-describedby=basic-addon1>
										</div>";									
									break;
								case 2:
									//COMERCIOS
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>id Tecnico</span>
											<input type=text id=a name=a value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Cantidad Pagada</span>
											<input type=text name=b value=".$array[$posActual][1]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Recaudacion</span>
											<input type=text name=c value=".$array[$posActual][2]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Nombre Comercio</span>
											<input type=text name=d value=".$array[$posActual][3]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Porcentaje Extra</span>
											<input type=text name=e value=".$array[$posActual][4]." class=form-control aria-describedby=basic-addon1>
										</div>";
									echo "<div class=input-group-prepend>
											<span class=input-group-text id=basic-addon1>Tipo Comercio</span>
											<input type=text name=f value=".$array[$posActual][5]." class=form-control aria-describedby=basic-addon1>
										</div>";
									break;
								case 3:
									//SUMINISTRO
									echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>id Suministro</span>
										<input type=text id=a name=a value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
									</div>";
									break;
								case 4:
									//PROVEEDOR
									echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>id Proveedor</span>
										<input type=text name=a value=".$array[$posActual][0]." class=form-control aria-describedby=basic-addon1>
									</div>";
									echo "<div class=input-group-prepend>
										<span class=input-group-text id=basic-addon1>Nombre Proveedor</span>
										<input type=text name=b value=".$array[$posActual][1]." class=form-control aria-describedby=basic-addon1>
									</div>";
									break;
								default:
									break;
							}
							
						?>
						<br>
						<section class="main row">
							<div class="col-md-3">									
								<input type="submit" name="Modificar" value= "Modificar" id="Modificar" class="list-group-item list-group-item-action">
							</div>									
							<div class="col-md-3">									
							</div>	
							<div class="col-md-3">		
								
								<input type="submit" name="Eliminar" value= "Eliminar" id="Eliminar" class="list-group-item list-group-item-action">
								
							</div>	
						</section>
                    </div>
					                
                </section>
				</form>

            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>

