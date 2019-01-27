<?php
// session_start ();
$conexion = new mysqli ( 'localhost', 'jcruiz', '14174208', 'liceo', 3306 ); // or die ('No se pudo conectar con el SERVIDOR, revise las conexiones' . mysql_error());

$conexion->set_charset ( "utf8" );

if ($conexion->connect_error) {
	
	include 'index.php';
	echo "<script type='text/javascript'>
  alert('No se pudo conectar con el SERVIDOR, revise las conexiones o comuníquese con el administrador del Sistema...... ');
  window.location='index.php';
  </script>";
}

?>
