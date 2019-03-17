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
  
  
  <!-- Titulo principal -->
  <h1 class="display-3">Distribucion de maquinas</h1>
  	<br>
        	<div class="container">
            	<section class="main row">
                    <div class="col-md-6">
                        <h2>Comercios minoristas</h2>
                       
                        
                        <form action="" method="post">
                          <input type="submit" name="0" value=<?php minorista()?>  id="boton1" class="list-group-item list-group-item-action">
                         <input type="submit" name="1" value=<?php minorista()?>  id="boton2" class="list-group-item list-group-item-action">
                         <input type="submit" name="2" value=<?php minorista()?>  id="boton3" class="list-group-item list-group-item-action">
                        </form>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <h2>Comercios mayoristas</h2>
                       
                        
                        <form action="" method="post">
                          <input type="submit" name="3" value=<?php mayorista()?>  id="boton4" class="list-group-item list-group-item-action">
                          <input type="submit" name="4" value=<?php mayorista()?>  id="boton5" class="list-group-item list-group-item-action">
                          <input type="submit" name="5" value=<?php mayorista()?>  id="boton6" class="list-group-item list-group-item-action">
                        </form>
                        
                    </div>
                
                </section>
            </div>
            
            <br><br>
            <form action="maquinas_adistribuir.php" method="post">
          	<input type="submit" name="3" value="Asignar Maquinas" id="boto4" class="btn btn-primary">
            </form>
   
    
 
    
    
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
    
    <?php
		
		if(isset($_POST["0"])){
			global $idComercio;
			$idComercio=$_POST["0"];
			
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
							
					
					 
				}
				$contComercios++;	
			}	
			
			
		}
		
		if(isset($_POST["1"])){
			global $idComercio;
			$idComercio=$_POST["1"];
		
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
				}
				$contComercios++;	
			}	
		} //Fin del post1
		
		
		
		if(isset($_POST["2"])){
			global $idComercio;
			$idComercio=$_POST["2"];
			
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
				}
				$contComercios++;	
			}	
			
		}//Fin del post2
		
		if(isset($_POST["3"])){
			global $idComercio;
			$idComercio=$_POST["3"];
			
			
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
				}
				$contComercios++;	
			}	
		}//Fin de post3
		
		
		
		if(isset($_POST["4"])){
			global $idComercio;
			$idComercio=$_POST["4"];
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
				}
				$contComercios++;	
			}	
			
			
		}//FIn del post4
		
		if(isset($_POST["5"])){
			global $idComercio;
			$idComercio=$_POST["5"];
			
			//Sacar Valor de id
			global $arrayComercios;
			$contComercios=0;
			while($contComercios<=count($arrayComercios)-1){
				if($arrayComercios[$contComercios][3]==$idComercio){
					
							
					//Variable Global
					
					session_start();
					ob_start();
					$_SESSION['idComercio'] = $arrayComercios[$contComercios][0];
					break;
				}
				$contComercios++;	
			}	
			
		}//Fin del post 5
	
	
	
	?>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>