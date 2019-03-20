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
    <title>Informes</title>
  </head>
  <body>
	 <?php
		$db_host="localhost";
		$db_nombre="maquinasrecreativas";	
		$db_usuario="root";
		$db_contra="";

		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
		mysqli_set_charset($conexion,"utf8");


		$query = "CALL crearInformes();";					
		mysqli_query($conexion,$query);	
		
		
		$query="SELECT * FROM informeGGminoristas";
		$resultados=mysqli_query($conexion,$query);	

		$cont = 0;
		
		echo "<h1>Informe general de minoristas</h1> ";
		echo
		"<br><table class=table>
		  <thead>
			<tr>
			  <th scope=col>#</th>
			  <th scope=col>Nombre</th>
			  <th scope=col>Cantidad Pagada</th>
			  <th scope=col>Recaudacion</th>
			</tr>
		  </thead>
		  <tbody>";
		
		while(($fila=mysqli_fetch_row($resultados))){
			
			echo 
				"<tr>
				  <th scope=row>".$cont."</th>";
											  					
			for ($i = 0; $i <count($fila); $i++) {		
				$arrayInforme1[$cont][$i] = $fila[$i];	
				echo "<td>".$arrayInforme1[$cont][$i]."</td>";
				
			}		
			echo "</tr>";
			$cont++;
		}		
		echo "</tbody></table><br>";
		
		
		
		$query="SELECT * FROM informeGGmayoristas";
		$resultados=mysqli_query($conexion,$query);	

		$cont = 0;
		
		echo "<h1>Informe general de mayoristas</h1> ";
		echo
		"<br><table class=table>
		  <thead>
			<tr>
			  <th scope=col>#</th>
			  <th scope=col>Nombre</th>
			  <th scope=col>Recaudacion</th>
			  <th scope=col>Porcentaje extra</th>
			</tr>
		  </thead>
		  <tbody>";
		
		while(($fila=mysqli_fetch_row($resultados))){
			
			echo 
				"<tr>
				  <th scope=row>".$cont."</th>";
											  					
			for ($i = 0; $i <count($fila); $i++) {		
				$arrayInforme2[$cont][$i] = $fila[$i];	
				echo "<td>".$arrayInforme2[$cont][$i]."</td>";
				
			}		
			echo "</tr>";
			$cont++;
		}		
		echo "</tbody></table><br>";
		
		
		
		
		
		$query="SELECT * FROM informeIND";
		$resultados=mysqli_query($conexion,$query);	

		$cont = 0;
		
		echo "<h1>Informe general</h1> ";
		echo
		"<br><table class=table>
		  <thead>
			<tr>
			  <th scope=col>#</th>
			  <th scope=col>ID Comercio</th>
			  <th scope=col>Nombre</th>
			  <th scope=col>Tipo de Comercio</th>
			</tr>
		  </thead>
		  <tbody>";
		
		while(($fila=mysqli_fetch_row($resultados))){
			
			echo 
				"<tr>
				  <th scope=row>".$cont."</th>";
											  					
			for ($i = 0; $i <count($fila); $i++) {		
				$arrayInforme3[$cont][$i] = $fila[$i];	
				echo "<td>".$arrayInforme3[$cont][$i]."</td>";
				
			}		
			echo "</tr>";
			$cont++;
		}		
		echo "</tbody></table><br>";
		
		
		
		
		
	?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 			crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=	"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    
  </body>
</html>

