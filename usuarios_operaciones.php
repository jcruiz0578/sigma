<?php




session_start();
include "conexion/conexion.php";


$operaciones1 = $_GET[operaciones];

$operaciones = base64_decode($operaciones1);


$login = $_POST[login];
$clave = $_POST[clave];
$nombre_apellido = $_POST[nombre_apellido];
$categoria = $_POST[categoria];
$status = $_POST[status];





if ($operaciones == "insertar") {

       
// realizar una busqueda para verificar si la seccion existe    
$consulta = "SELECT * FROM usuario where usuario= '$login'  "; // sentencia sql
$result_consulta = $conexion->query($consulta);

 if (!($row = $result_consulta->fetch_array())) {
    
     $insertar = "INSERT into usuario (usuario, pass, categoria, nombre, status) values ('$login', '$clave', '$categoria', '$nombre_apellido', '$status')";
    $result = $conexion->query($insertar)  or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );
     
  include 'principal.php';
	echo "<script type='text/javascript'>
             alert('El usuario se ha Ingresado Sastisfactoriamente....');
   javascript:usuarios();
   
    </script>";
	exit ();
} else {
     include 'principal.php';
	echo "<script type='text/javascript'>
             alert('Este usuario Ya fue Creado....');
   javascript:usuarios();
   
    </script>";
	exit ();
}  
    
}
