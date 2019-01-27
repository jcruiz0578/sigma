<?php

// consultar los datos de la tabla general
$consulta = "SELECT *  FROM general where periodoescolar= '$periodoescolar' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );

if ($row = $result_consulta->fetch_array ()) {
	
	// variable donde obtendremos la fecha de matricula inicial
	// establecida en la tabla general
	$fecha_mi = $row [fecha_mi];
	
	// sumar un dia a la fecha tomada como natricula inicial
	
	$fecha_mi_despues = date ( 'Y-m-d', strtotime ( '+1 day', strtotime ( $fecha_mi ) ) );
	
	$nombredirector = $row [nombredirector];
	$ceduladirector = $row [ceduladirector];
	$eponimo = $row [eponimo];
}
// *******************************************

// ****************************************
// con la funcion substr estraemos valor de la fecha
$periodoescolar1 = substr ( $periodoescolar, 0, 4 ); // se obtiene el 1er año del periodo escolar

$periodoescolar2 = substr ( $periodoescolar, 5, 8 ); // se obtiene el 2do año del periodo escolar

$mes_julio = trim ( $periodoescolar1 . "-07-01" ); // se obtiene el mes de julio para el inicio de fecha de onscripcion

$mes_mayo = trim ( $periodoescolar2 . "-05-31" ); // se obtiene el mes de mayo para el final administrativo


/*
$password = 'BrunoGuaschino';
$md5 = md5($password);
 
echo $md5; 
echo"<br>";

$password = 'BrunoGuaschino';
$salt = '$bgr$/';
echo $s_salt = md5($salt . $password);
*/
//***************************************************************************************
