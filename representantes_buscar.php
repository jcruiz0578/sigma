<?php

// MODULO EN EL CUAL SE BUSCARA SI EXISTE EL REPRESENTANTE PARA LUEGO 
// VACIAR SUS DATOS 
include "conexion/conexion.php";

$cedula = $_POST ['cedula'];


$consulta = "SELECT * FROM representantes where cedularep= '$cedula' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );



if ($fila = $result_consulta->fetch_array ()) {
	$respuesta = new stdClass ();
	$respuesta->apellidos = $fila [apellidosrep];
	$respuesta->nombres = $fila [nombresrep];
	$respuesta->sexo = $fila [sexorep];
	$respuesta->parentesco = $fila [parentescorep];
	$respuesta->telefonos = $fila [telefonosrep];
	$respuesta->email = $fila [emailrep];
	$respuesta->trabaja = $fila [trabaja];
	$respuesta->donde = $fila [lugartrabajo];
	$respuesta->sueldo = $fila [sueldo];
	$respuesta->direccion= $fila [direccionrep];
	

}
echo json_encode ($respuesta);

?>
