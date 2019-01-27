<?php
session_start();

$conexion = mysql_connect ( "localhost", "jcruiz", "14174208" );

// seleccionamos la base de datos en la cual se insertaran los datos.
mysql_query ( "SET NAMES 'utf8'" );
mysql_select_db ( "liceo", $conexion );


//para almacenar multiples registros los recibes 
//recibe.php
$uno=$_POST['a'];// ojo aki solo pones el nombre del imput sin el array []
$dos=$_POST['b'];
$tres=$_POST['c'];
//y ya para almacenarlos a la base lo haces asi

for($i = 0; $i<count ($uno); $i++) {
$sql=mysql_query("Insert Into prueba(valor1,valor2,valor3) values('$uno[$i]','$dos[$i]','$tres[$i]'  )");
echo"registro exitoso";
}
