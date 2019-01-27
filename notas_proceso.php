<?php
session_start();


include "conexion/conexion.php";


$periodoescolar = $_SESSION ["session_periodoescolar"];

echo "prueba1".$lapso = $_POST['combolapsoE'];
echo "prueba2".$anno_estudio = $_POST['anno_estudioE'];
echo "prueba3".$seccion  = $_POST['seccionE'];
echo "prueba4".$combomaterias = $_POST['combomateriasE'];



//para almacenar multiples registros los recibes 
//recibe.php
$contador      =$_POST['contador'];	// ojo aki solo pones el nombre del imput sin el array []
$id_ingresos     =$_POST['id_ingreso'];
$cedula     =$_POST['cedula'];
$nombres   =$_POST['nombres'];
$notas     =$_POST['notas'];
//y ya para almacenarlos a la base lo haces asi

/*
for($i    = 0; $i<count ($contador); $i++) {

	$insertar = "INSERT into  notas(cedulaest, id_ingreso, periodoescolar, lapso, anoest, seccion, id_materia, nota) values('$cedula[$i]', '$id_ingresos[$i]', '$periodoescolar','$lapso', '$anno_estudio', '$seccion', '$combomaterias', '$notas[$i]' )";
	$result   = $conexion->query ( $insertar ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );	


	
}
*/

echo "<script type='text/javascript'>
alert('Registrode Calificaciones Exitoso');
window.location='calificaciones_ingresar.php';
</script>";


//echo"registro exitoso";
