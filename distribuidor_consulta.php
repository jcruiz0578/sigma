<?php
session_start ();

include "conexion/conexion.php";
$consultar_seccion1 = $_GET [consultar_seccion];

$consultar_seccion = base64_decode ( $consultar_seccion1 );

$seccion = $_POST [seccion];
$anno = $_POST [anno_estudio];

// echo $periodoescolar = $_POST[periodoescolar];

$consultar_estudiante1 = $_GET [consultar_estudiante];

$consultar_estudiante = base64_decode ( $consultar_estudiante1 );

if ($consultar_seccion == 'SI') {
	
	if ($anno == "Todas") {
		$anno = "%";
	} else {
		$anno = $_POST [anno_estudio];
	}
	
	if ($seccion == "Todas") {
		$seccion = "%";
	} else {
		$seccion = $_POST [seccion];
	}
	
	$_SESSION [anno_estudio] = $anno;
	$_SESSION [seccion] = $seccion;
	
	include 'principal.php';
	echo "<script type='text/javascript'>
   javascript:consultar_seccion();
   
    </script>";
	exit ();
}

if ($consultar_estudiante == "SI") {
	
	$xcedula = $_POST [cedulaest];
	
	$registros = "SELECT * FROM estudiantes where cedulaest = '$xcedula'  "; // sentencia sql
	$result = $conexion->query ( $registros );
	
	if ($user = $result->fetch_array ()) {
		
		$_SESSION [xcedulaest] = $xcedula;
		
		include 'principal.php';
		echo "<script type='text/javascript'>
   javascript: consultar_estudiante();
		
    </script>";
		exit ();
	} else {
		
		$_SESSION ["cedula_estudiante"] = $xcedula;
		
		echo "<script type='text/javascript'>
   
    window.location='ingresos_egresos.php';
    </script>";
		exit ();
	}
}


