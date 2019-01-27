<?php
session_start();


include "conexion/conexion.php";

//para almacenar multiples registros los recibes 
//recibe.php
$uno      =$_POST['a'];	// ojo aki solo pones el nombre del imput sin el array []
$dos      =$_POST['b'];
$tres     =$_POST['c'];
//y ya para almacenarlos a la base lo haces asi

for($i    = 0; $i<count ($uno); $i++) {
//$sql    =mysql_query("Insert Into prueba(valor1,valor2,valor3) values('$uno[$i]','$dos[$i]','$tres[$i]'  )");

	$insertar = "INSERT into  prueba(valor1,valor2,valor3) values('$uno[$i]','$dos[$i]','$tres[$i]' )";
	$result   = $conexion->query ( $insertar ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );	


	echo"registro exitoso";
}



//echo"registro exitoso";
