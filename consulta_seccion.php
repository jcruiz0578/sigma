   <?php
			session_start ();
			// $xperiodoescolar = trim ( $_SESSION ["session_periodoescolar"] );
			
			include 'encabezado.php';
			?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<title></title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<link href="modal/assets/bootstrap.min.css" rel="stylesheet">
<script src="modal/assets/jquery-1.8.3.min.js"></script>
<script src="modal/assets/bootstrap.min.js"></script>

</head>
<body>
        <?php
								
								include "conexion/conexion.php";
								
								$seccion = $_POST [seccion];
								$anno_estudio = $_POST [anno_estudio];
								
								?>
        <form action="" method="POST">

		<select id="anno_estudio" name="anno_estudio" class="btn btn-success"
			style="width: auto; height: auto; font-size: 16px">
			<option value="<?php echo $anno_estudio ?>"><?php echo $anno_estudio ?></option>
			<option value="Todas">Todas</option>
			<option value="1ER AÑO">1ER AÑO</option>
			<option value="2DO AÑO">2DO AÑO</option>
			<option value="3ER AÑO">3ER AÑO</option>
			<option value="4TO AÑO CS">4TO AÑO CS</option>
			<option value="5TO AÑO CS">5TO AÑO CS</option>
		</select> <select id="seccion" name="seccion" class="btn btn-success"
			style="width: auto; height: auto; font-size: 16px">
			<option value="<?php echo $seccion ?>"><?php echo $seccion ?></option>
			<option value="Todas">Todas</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>
			<option value="G">G</option>
			<option value="G">H</option>
		</select>

		<button id="enviar" type="submit" name="enviar"
			class="btn btn-success" style="font-size: 16px; height: 40px">
			<span class="glyphicon glyphicon-inbox"></span> Consultar
		</button>
	</form>




	<div
		style="width: 97%; height: 400px; overflow: scroll; line-height: 2em; text-align: left; font-size: 16px"> 
  
    <?php
				
				// if (!empty($_POST['enviar'])) {
				
				$registros_vigente = "SELECT * FROM ingresos, estudiantes, representantes where estudiantes.cedulaest=ingresos.cedulaest and representantes.cedularep = ingresos.cedularep and anoest like '$anno_estudio' and seccion='$seccion'  and periodoescolar='$periodoescolar'  order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
				$result_vigente = $conexion->query ( $registros_vigente );
				
				$contador = 0;
				
				while ( $user = $result_vigente->fetch_array () ) {
					$contador ++;
					$xid_ingreso = $user [id_ingreso];
					$cedulaest = number_format ( $user [cedulaest], 0, '', '.' );
					
					$apellidosest = $user [apellidosest];
					$nombresest = $user [nombresest];
					$nombre = $apellidosest . ", " . $nombresest;
					$anoest = $user [anoest];
					$seccion = $user [seccion];
					$condicion = $xcondicion;
					$emailest = $user [emailest];
					$procedencia = $user [procedencia];
					$status = $user [status];
					
					$cedularep = $user [cedularep];
					$representante = $user [apellidosrep] . ", " . $user [nombresrep];
					$sexorep = $user [sexorep];
					$parentescorep = $user [parentescorep];
					$telefonosrep = $user [telefonosrep];
					
					$emailrep = $user [emailrep];
					$trabaja = $user [trabaja];
					$dondetrabaja = $user [lugartrabajo];
					$sueldo = $user [sueldo];
					$direccionrep = $user [direccionrep];
					
					echo '<br>';
					
					echo '<H2>' . '<b>' . 'ESTUDIANTE Nº&nbsp;&nbsp;&nbsp;' . $contador . '</b>' . '</H2>';
					echo '<br>';
					echo '<b>' . 'DATOS DEL ESTUDIANTE' . '</b>';
					echo '<br>';
					echo 'Cédula Id:&nbsp;&nbsp;&nbsp;' . '<b>' . $cedulaest . '</b>' . '&nbsp;&nbsp;&nbsp;Apellidos y Nombres:&nbsp;&nbsp;&nbsp' . '<b>' . $nombre . '</b>';
					echo '<br>';
					echo 'Lateralidad:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [lateralidad] . '</b>' . "&nbsp;&nbsp;&nbsp;Fecha Nac.:&nbsp;&nbsp;&nbsp;" . '<b>' . $fecha_actual = date ( "d-m-Y", strtotime ( $user [fnest] ) ) . '</b>' . "&nbsp;&nbsp;&nbsp;Sexo:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [sexoest] . '<b>' . "&nbsp;&nbsp;&nbsp;Orden de Nac.:&nbsp;&nbsp;&nbsp;" . '</b>' . $user [orden_nac] . '</b>';
					echo '<br>';
					echo 'Estado de Nac:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [estado_nac] . '</b>' . "&nbsp;&nbsp;&nbsp;Lugar de Nac.:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [lugar_nac] . '</b>' . "&nbsp;&nbsp;&nbsp;Estado Civil:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [estado_civil] . '</b>';
					echo '<br>';
					echo 'Año de est:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [anoest] . '</b>' . "&nbsp;&nbsp;&nbsp;Sección.:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [seccion] . '</b>' . "&nbsp;&nbsp;&nbsp;Procedencia:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [procedencia] . '</b>';
					echo '<br>';
					echo 'Repitiente?:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [repitienteest] . '</b>' . '</b>' . "&nbsp;&nbsp;&nbsp;Nuevo Ingreso?.:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [nuevo_ingreso] . '</b>' . "&nbsp;&nbsp;&nbsp;E-mail:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [emailest] . '</b>';
					
					echo '<br>';
					echo '<br>';
					
					echo '<b>' . 'DATOS DEL UBICACIÓN DEL ESTUDIANTE' . '</b>';
					echo '<br>';
					
					$registros_vivienda = "SELECT * FROM vivienda  WHERE id_ingreso = '$xid_ingreso'  limit 1 ";
					
					$result = $conexion->query ( $registros_vivienda );
					
					if ($user = $result->fetch_array ()) {
						echo 'Tipo Vía:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [tipovia] . '</b>' . "&nbsp;&nbsp;&nbsp;Dirección.:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [direccion] . '</b>' . "&nbsp;&nbsp;&nbsp;Zona de Ubicación:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [zonaubicacion] . '</b>';
						echo '<br>';
						echo 'Tipo de Vivienda:&nbsp;&nbsp;&nbsp;' . '<b>' . $user [tipovivienda] . '</b>' . "&nbsp;&nbsp;&nbsp;ubicación de Vivienda.:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [ubicacionvivienda] . '</b>' . "&nbsp;&nbsp;&nbsp;Condición de Vivienda:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [condicionvivienda] . '</b>' . "&nbsp;&nbsp;&nbsp;Condición de Infraestr:&nbsp;&nbsp;&nbsp;" . '<b>' . $user [infraestructura] . '</b>';
						
						echo '<br>';
						echo '<br>';
					}
					
					echo '<b>' . 'DATOS DEL REPRESENTANTE O RESPONSABLE' . '</b>';
					echo '<br>';
					echo 'Cédula Id:&nbsp;&nbsp;&nbsp;' . '<b>' . $cedularep . '</b>' . '&nbsp;&nbsp;&nbsp;Apellidos y Nombres:&nbsp;&nbsp;&nbsp' . '<b>' . $representante . '</b>';
					echo '<br>';
					echo 'Sexo:&nbsp;&nbsp;&nbsp;' . '<b>' . $sexorep . '</b>' . '&nbsp;&nbsp;&nbsp;Parentesco:&nbsp;&nbsp;&nbsp' . '<b>' . $parentescorep . '</b>';
					echo '<br>';
					echo 'Telefonos:&nbsp;&nbsp;&nbsp;' . '<b>' . $telefonosrep . '</b>' . '&nbsp;&nbsp;&nbsp;E-mail:&nbsp;&nbsp;&nbsp' . '<b>' . $emailrep . '</b>';
					echo '<br>';
					echo 'Trabaja:&nbsp;&nbsp;&nbsp;' . '<b>' . $trabaja . '</b>' . '&nbsp;&nbsp;&nbsp;Donde trabaja:&nbsp;&nbsp;&nbsp' . '<b>' . $dondetrabaja . '</b>';
					echo '<br>';
					echo 'Sueldo:&nbsp;&nbsp;&nbsp;' . '<b>' . $sueldo . '</b>' . '&nbsp;&nbsp;&nbsp;Dirección de habitación:&nbsp;&nbsp;&nbsp' . '<b>' . $direccionrep . '</b>';
					
					echo '<br>';
					echo '<br>';
				}
				
				// }
				?>
        
</div>




</body>
    
     <?php
					include 'pie.php';
					?>

    
    
</html>
