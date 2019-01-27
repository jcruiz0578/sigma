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
	style="margin-left: 30px; margin-right: 20px; margin-top: 30px; width: 700px; height: 850px; margin: 0 auto;">


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

			//	echo  $valormes1=substr($periodoescolar, 0, 4); // con la funcion substr estraemos valor de la fecha
			//	 echo"<br>"    ;


//*************************************
$registros_vigente = "SELECT periodoescolar, estudiantes.cedulaest, ingresos.cedulaest, apellidosest, nombresest, sexoest, fnest, id_ingreso, anoest, seccion, repitienteest, materiapendiente, rezagado, status, fecha_ingreso   FROM estudiantes, ingresos where estudiantes.cedulaest =  '$cedula' and ingresos.cedulaest =  '$cedula' order by periodoescolar DESC  LIMIT 1"; // sentencia sql
$result_vigente = $conexion->query($registros_vigente);

while ($user = $result_vigente->fetch_array()) {

//  echo   $periodoescolar = $user [periodoescolar];
// echo"<br>" ;
  }
//

				include 'consulta_tabla_general.php';

				$ceduladir = number_format ( $ceduladirector, 0, '', '.' );
				$cedulaest = number_format ( $cedula, 0, '', '.' );

				date_default_timezone_set ( "America/Caracas" );
				setlocale ( LC_TIME, 'es_ES.UTF-8' );

				?>
    <div id="separador" style="height: 10px"></div>




	<h3 style="text-align: center" onclick="javascript:window.print()">AUTENTICACIÓN DE NOTAS CERTIFICADAS</h3>

	<div id="separador" style="height: 20px"></div>


	<div style="text-align: justify; font-size: 16px; line-height: 30px">


				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quien suscribe, Profesor <b><?php echo $nombredirector ?></b>  portador de la C.I. N° V-<b> <?php echo  $ceduladir ?> </b>
				Director(E) del L.N.B. GENERAL EN JEFE JOSÉ FRANCISCO BERMÚDEZ, ubicado en Carúpano Estado Sucre; por medio de la presente hace
			constar que previa solicitud del(la)  Ciudadano(a)<b> <?php echo $apellidos_nombres?>; </b>
			titular de la C.I.N° V-<b><?php echo $cedulaest."; " ?> </b> se revisaron los archivos del Departmento de Control de Estudio y Evaluación
			de esta Institución Educativa, y de acuerdo a la información que reposa en los mismos <b> RATIFICA</b> que sus <b> CALIFICACIONES CERTIFICADAS</b>
			correspondiente al(los) año(s) escolares  <b><?php echo $periodoescolar ?> </b> son AUTENTICAS, ajustadas a las normativas legales vigente, por lo tanto REUNE TODOS LOS REQUISITOS
			ESTABLECIDOS EN LA LEY ORGANICA DE EDUCACIÓN Y SU REGLAMENTO



	</div>


	<br/>
<br/>
<br/>
<br/>



	<div id="firma" style="text-align: center;">


		<b>_______________________________________________</b> <br> <b> PROFE. <?php echo $nombredirector; ?> </b><br>
		<b> C.I N°  <?php echo $ceduladirector; ?></b> <br> <b>DIRECTOR (E)</b>

	</div>

	<br/>
<br/>
<br/>
<br/>

<div id="firmas" style="width: auto; height:auto">
	<div id="firma" style="text-align: justify; float:left">
Dpto de Control de Estudio y Evaluación:
<p>Licda Mirian Faria</p>
<p>C.I.N° V-14421478</p>
<p>FIRMA:___________________________</p>


	</div>

	<div id="firma" style="text-align: justify; float:right">
	Supervisor(a):
	<p>_________________________________</p>
	<p>C.I.N° V-________________________</p>
	<p>FIRMA:___________________________</p>

	</div>
</div>

	<div id="separador" style="height: 160px"></div>

<div id="firma" style="text-align: center; width: auto; height:auto">
	<b>Nota:</b> Según Resolución N° 063, Art. 2 aprobada por el Ministerio del Poder Popular para la
	Educación en Gaceta Oficial N° 40723 del 13 de Agosto de 2015, los documentos probatorios de Estudios se AUTENTICAN
	por la Institución
 </div>


	<div id="separacion3" style="width: auto; height: 20px"></div>




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
