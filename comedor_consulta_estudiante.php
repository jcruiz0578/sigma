<?php
// ESTE MODULO SIRVE PARA CONSULTAR MEDIANTE JASON A LOS ESTUDIANTES
// PARA LA CONSTANCIA DE ESTUDIO
session_start ();

include "conexion/conexion.php";

// $periodoescolar = $_SESSION ["session_periodoescolar"];
$periodoescolar = '2017-2018';

//$cedula = $_POST [cedula];
$num_reg = $_POST[num_reg];

// $consulta = "SELECT ingresos.cedulaest, estudiantes.cedulaest, ingresos.periodoescolar, ingresos.seccion, ingresos.anoest, estudiantes.apellidosest, estudiantes.nombresest, ingresos.status FROM estudiantes, ingresos WHERE ingresos.cedulaest = '$cedula' and estudiantes.cedulaest=ingresos.cedulaest and periodoescolar = '$periodoescolar' limit 1 ";

$consulta = "SELECT *  FROM estudiantes, ingresos WHERE ingresos.num_reg = '$num_reg' and estudiantes.cedulaest=ingresos.cedulaest and periodoescolar = '$periodoescolar' limit 1 ";

$result_consulta = $conexion->query ( $consulta );

if ($fila = $result_consulta->fetch_array ()) {
    $respuesta = new stdClass ();
    $respuesta->cedulaest = $fila [cedulaest];
$respuesta->id_ingreso = $fila [id_ingreso];
	$respuesta->apellidos = $fila [apellidosest];
	$respuesta->nombres = $fila [nombresest];
	$respuesta->anoest = $fila [anoest];
	$respuesta->seccion = $fila [seccion];
	$respuesta->status = $fila [status];
}
echo json_encode ( $respuesta );
