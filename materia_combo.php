<?php
include "conexion/conexion.php";

$anoest_seleccion = $_REQUEST [anoest_seleccion];

/* Conexion a la bd */

// $anoest_seleccion = "2";
$consulta = "SELECT * FROM materias  where id_anoest=  '$anoest_seleccion' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );

$regiones = array ();
while ( $user = $result_consulta->fetch_array () ) {
	
	// $provincias= $user['materia'];
	
	$regiones [$user ['id_materia']] = $user ['materia'];
}

print_r ( json_encode ( $regiones ) );

?>