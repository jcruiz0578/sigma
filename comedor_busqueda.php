<?php
session_start ();
// $xperiodoescolar = trim ( $_SESSION ["session_periodoescolar"] );
?>

<!DOCTYPE html>
<?php
include "conexion/conexion.php";

include 'encabezado.php';

if (! empty ( $_POST ['enviar'] )) {
	$seccion = $_POST [seccion];
	$chck1 = $_POST [chck1];

	$anoest = $_POST [Comboanoest];

	foreach ( $chck1 as $value ) {

		$update = "UPDATE ingresos SET seccion='$seccion' Where  id_ingreso = '$value' ";
		$conexion->query ( $update ) or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );
	}
}

if (! empty ( $_POST ['Comboanoest'] )) {
	$anoest = $_POST [Comboanoest];
	$consulta_anoest = "SI";
}

if ($_POST ['Comboanoest'] == "N/A") {
	$anoest = "%";
}

?>
<html>
<head>
<meta charset="UTF-8">
<title></title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<!--<link rel="stylesheet" href="css/autoFill.dataTables.min.css">-->




<style>
/*  css que da formato al  cuadro de texto por defecto del datatable
 input[type=search] {
  border: 1px solid #DBE1EB;
  font-size: 14px;

  height: auto;

  }

 */

/*borra u oculta el cuadro de texto por defecto del datatable
  .dataTables_filter {
     display: none;
}
  */
</style>

<script>

 $(function () {
        theTable = $("#tablabuscar");
        $("#q").keyup(function () {
            $.uiTableFilter(theTable, this.value);
        });
    });

</script>



</head>
<body onload="ini()" onkeypress="parar()">



	<form name='form1' action='' method='POST'>

		<div style="text-align: right">

		</div>




		<div id="busqueda"></div>
		<br />


		<div style="text-align: left; float: left">
			<b> Ha seleccionado:</b> <input type="text" name="numero" id="numero"
				class="formato" value="0" size="1"
				style="border: none; font-size: 18px; height: auto; width: 50px; text-align: center">
			<b>Registros</b>

		</div>
		<div style="text-align: right; float: right">
			<b>Busqueda General:</b><input type="text" id="q" name="q"
				class="formato" style="font-size: 18px; height: auto" value="" /> <b>Búsqueda
				por Año de Estudio:</b> <select class="formato" name="Comboanoest"
				id="Comboanoest" style="width: auto;" onchange="this.form.submit()">

				<option
					value="<?php
					if (! empty ( $anoest )) {
						$anoestseleccion = $anoest;
						echo $anoest;
					} else {
						$anoestseleccion = "N/A";
						echo $anoestseleccion;
					}
					?>"
					selected><?php echo $anoestseleccion ?></option>

				<option>1ER AÑO</option>
				<option>2DO AÑO</option>
				<option>3ER AÑO</option>
				<option>4TO AÑO CS</option>
				<option>5TO AÑO CS</option>
				<option>N/A</option>
			</select>


		</div>

		<br> <br>

		<div style="width: 97%; height: 400px; overflow: scroll;">

			<!-- <div style="width: auto;  ">-->


			<table class="table table-striped table-responsive nowrap"
				id="tablabuscar"
				style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid;">

				<thead>


					<tr align="center" bgcolor="#0099CC">
						<th style="text-align: center">Nº</th>

						<th NOWRAP style="text-align: center">CÉDULA ID</th>
						<th style="text-align: center">APELLIDOS Y NOMBRES</th>
						<th style="text-align: center">SEXO</th>
						<th style="text-align: center">AÑO EST</th>
						<th style="text-align: center">SECCION</th>
						<th style="text-align: center">REPITE?</th>

					</tr>

				</thead>


				<tbody>
            <?php



													$registros_vigente = "SELECT * FROM comedor_registro, ingresos, estudiantes where comedor_registro.id_ingreso=ingresos.id_ingreso and estudiantes.cedulaest=ingresos.cedulaest  order by anoest, ingresos.cedulaest DESC  "; // sentencia sql


												$result_vigente = $conexion->query ( $registros_vigente );

												$contador = 0;

												while ( $user = $result_vigente->fetch_array () ) {
													$contador ++;
													$apellidosest = $user [apellidosest];
													$nombresest = $user [nombresest];
													$status = $user [status];
													$nombre = $apellidosest . ", " . $nombresest;

													if ($status == "E") {
														$color_E = "red";
													} else {
														$color_E = "black";
													}
													?>

                <tr>
						<td style="text-align: center;"><FONT COLOR=<?php echo $color_E ?>><?php echo $contador ?></FONT></td>

						<td NOWRAP><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedulaest']) ?></FONT></td>
						<td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($nombre) ?></FONT></td>
						<td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['sexoest']) ?></FONT></td>
						<td NOWRAP style="text-align: center"><FONT
							COLOR=<?php echo $color_E ?>><?php echo trim($user['anoest']) ?></FONT></td>
						<td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['seccion']) ?></FONT></td>
						<td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['repite']) ?></FONT></td>

                    <?php
												}

												unset ( $_SESSION ['anno_estudio'] );
												unset ( $_SESSION ['seccion'] );

												$result_vigente->free ();
												$conexion->close ();

												?>








				</tbody>

			</table>

		</div>
	</form>



	<!--<script src="js/jquery-2.2.3.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script src="js/dataTables.autoFill.min.js"></script> -->

	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/jquery.uitablefilter.js" type="text/javascript"></script>
	<script src="js/session_caducar.js"></script>


	<script>
  /*

    $(document).ready(function() {
    var table = $('#tablabuscar').dataTable( {
        scrollY: 400,
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        autoFill: false,
        bFilter: true


    } );
} );

*/


/* se asigna las funciones de busqueda del datatable al inputext busqueda
 $(document).ready(function() {
    var dataTable = $('#tablabuscar').dataTable();
    $("#q").keyup(function() {
        dataTable.fnFilter(this.value);
    });
});
*/


 function suma(obj)
    {
        total = parseInt(document.getElementById("numero").value);
        if (obj.checked)
        {
            total = parseInt(total+1);
        } else
        {
            total = parseInt(total-1);
        }
        document.getElementById("numero").value = String(total);
    }



</script>

</body>

    <?php
				include 'pie.php';
				?>

</html>
