<?php
session_start ();

// ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">




</head>
<body
	style="margin-left: 60px; margin-right: 30px; margin-top: 30px; width: 612px; height: 792px; margin: 0 auto;">


	<header>

		<img style="width: 97%" src="imagenes/MEMBRETE.jpg">
	</header>   

    <?php
				include "conexion/conexion.php";
				$nombres = trim ( $_POST [nombresest] );
				$apellidos = trim ( $_POST [apellidosest] );
				
				$apellidos_nombres = $apellidos . ", " . $nombres;
				
				$cedula = trim ( $_POST [cedulaest] );
				
				$anno = trim ( $_POST [annoest] );
				$seccion = trim ( $_POST [seccion] );
				$anno_estudio = trim ( $anno . "  Seccion  " . $seccion );
				
				$periodoescolar = $_SESSION ["session_periodoescolar"];
				include 'consulta_tabla_general.php';
				
				$ceduladir = number_format ( $ceduladirector, 0, '', '.' );
				$cedulaest = number_format ( $cedula, 0, '', '.' );
				
				date_default_timezone_set ( "America/Caracas" );
				setlocale ( LC_TIME, 'es_ES.UTF-8' );
				
				?>
    <div id="separador" style="height: 60px"></div>




	<h1 style="text-align: center" onclick="javascript:window.print()">CONSTANCIA
		DE ESTUDIO</h1>

	<div id="separador" style="height: 30px"></div>


	<div style="font-size: 16px; line-height: 30px">


		<p style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El Suscrito Director(E) del <b>
				L.N.B. GENERAL EN JEFE JOSÉ FRANCISCO BERMÚDEZ,</b> Profesor <b><?php echo $nombredirector ?></b>
			portador de la C.I. N° V-<b> <?php echo  $ceduladir ?> </b> hace
			constar por medio de la presente que el(la) Estudiante <b> <?php echo $apellidos.", ".$nombres?>; </b>
			portador(a) de la C.I.N° V-<b><?php echo $cedulaest.", " ?> </b> es
			Estudiante regular del <b> <?php echo $anno_estudio . ", " ?> </b>
			durante el Periodo Escolar <b><?php echo $periodoescolar ?> </b>
		</p>


		<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide, de
			parte interesada en Carúpano en fecha <b><?php echo $fecha_actual1 = strftime("%A, %d de %B de %Y"); ?>   </b>
		</p>
	</div>





	<div id="separador" style="height: 150px"></div>




	<div id="firma" style="text-align: center;">


		<b>_______________________________________________</b> <br> <b> PROFE. <?php echo $nombredirector; ?> </b><br>
		<b> C.I N°  <?php echo $ceduladirector; ?></b> <br> <b>DIRECTOR (E)</b>

	</div>

	<div id="separacion3" style="width: auto; height: 95px"></div>
	<!--<page_footer> -->

	<footer
		style="text-align: center; font-size: 10px; bottom: 0; position: fixed; left: 30px; right: 30px">
		<div id="pie" class="fluid">

			<HR width=auto align="center"
				style="background-color: #DD0000; height: 6px;">

			<b><b><i> 
<?php echo $eponimo ?> <br>Urb. Guayacán de las Flores, Sector 1, Calle
						# 5.Carupano Edo Sucre
				</i></b><br> <b><i>Teléfonos: 0294-511-10.49 / 0294-332-48.66 <br>
						e-mail:lnbjfb@gmail.com - Twitter: @lnbjfb
				</i></b><br></b>




		</div>
		<!--  </page_footer> -->
	</footer>
</body>
</html>

