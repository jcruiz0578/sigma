<?php

session_start ();

include "conexion/conexion.php";

// $periodoescolar = $_SESSION ["session_periodoescolar"];
//$periodoescolar = '2016-2017';

$id_ingreso = $_POST ['id_ingreso'];
$fecha_comer = $_POST ['fecha_comer'];



  $insertar = "INSERT into comedor_registro (id_ingreso, repite, fecha)
  VALUES ('$id_ingreso', 'SI', '$fecha_comer')";
  $result = $conexion->query ( $insertar ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );




	$respuesta = new stdClass ();



	$respuesta->fecha_comer = $fecha_comer;
  $respuesta->repite = $repite;
//	$respuesta->nombres = $fila [nombresest];

echo json_encode ( $respuesta );
