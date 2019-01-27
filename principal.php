<?php
session_start ();

$activar_mensaje= $_REQUEST['mensaje'];

    ?>
 



<?php


if (isset ( $_GET ['logout'] )) {
	session_destroy ();
	header ( "Location:index.php" );
}

$periodoescolar = $_SESSION ["session_periodoescolar"];

?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SISTEMA INTEGRAL DE GESTI&Oacute;N MASTRICULAR AUTOMATIZADO</title>

	<link href="css/estilo.css" rel="stylesheet" type="text/css">
	
	<script src="js/respond.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery-1.10.2.min.js" ></script>
		 <script src="js/session_caducar.js" ></script>

	






	<script>

		function mensaje(){
//alert('hola');
var mens = $("#activar_mensaje").attr('value');

if (mens == "mensaje") {

var nom = $("#sesion_nombre").attr('value');
var a = $("#valor").attr('value');
alert('Bienvenido al Sistema! '+nom.toUpperCase());
}
}


function consultar_estudiante() {
	$.post("mostrarestudiante.php", function (data) {
		$("#contenidos").html(data);
	});
}





function registro_buscar() {
	$.post("registro_buscar.php", function (data) {
		$("#contenidos").html(data);
	});
}

function consultar_seccion() {
	$.post("registros_consultar.php", function (data) {
		$("#contenidos").html(data);
	});
}


function crear_seccion() {

	$.post("seccion_crear.php", function (data) {
		$("#contenidos").html(data);
	});
}

function secciones_mostrar() {

	$.post("secciones_mostrar.php", function (data) {
		$("#contenidos").html(data);
	});
}


function materias_mostrar() {

	$.post("materias_mostrar.php", function (data) {
		$("#contenidos").html(data);
	});
}

function crear_materia() {

	$.post("materia_ingreso.php", function (data) {
		$("#contenidos").html(data);
	});
}





function usuarios() {

	$.post("usuarios.php", function (data) {
		$("#contenidos").html(data);
	});
}



function calificaciones() {

	$.post("calificaciones_ingresar.php", function (data) {
		$("#contenidos").html(data);
	});
}



function mp_rep() {

	$.post("materiaPendiente_Repitiente.php", function (data) {
		$("#contenidos").html(data);
	});
}


function modificar_otros() {

	$.post("modificar_otros.php", function (data) {
		$("#contenidos").html(data);
	});
}

function constancias() {

	//$.post("constancia_consultar.php", function (data) {
	//	$("#contenidos").html(data);
                
                // puede tambien pasar variables
                 $('#contenidos').load("constancia_consultar.php");
                
	//});
}


</script>







</head>
<body  onload="ini(), mensaje()" onkeypress="parar()" onclick="parar()"
style="background: #e5e5e5; background: url(imagenes/fondo23.jpg) no-repeat fixed center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">



<div class="gridContainer clearfix"
style="background: white; box-shadow: 15px 15px 15px #999; border-radius: 15px; border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-left-style: solid; margin-top: 30px; margin-bottom: 30px; ">
<div id="principal" class="fluid">


	<div id="encabezado" align="center">
		<div id="logo1">
			<img src="imagenes/MEMBRETE.jpg">
		</div>
	</div>

	<div id="periodoescolar_mostrar"  align="center">
		<h2><b>Período Escolar: <?php echo $periodoescolar?></b></h2>
	</div>

	<div id="escrito" align="right">
		
		<div id="logueo"  style="font-weight: bold; "><font color="red">Logueado como:</font> <?php echo $_SESSION ["session_user"];
        ?>&nbsp;&nbsp;
		<a href='principal.php?logout'>Cerrar Sesion<?php session_name('session_user'); ?></a></div>

		<div id="usuario"  style="font-weight: bold; "><font color="red">Usuario:</font> <?php echo  $_SESSION["session_nombre"]; ?></div>
		<div id="categoria" style="font-weight: bold;"><font color="red">Categoria del Usuario:</font> <?php echo $_SESSION["session_categoria"]; ?></div>
		






		<input type="hidden" id="valor" value="<?php echo $_SESSION["session_categoria"]; ?>">
		 <input type="hidden" id="sesion_usuario" value="<?php echo $_SESSION["session_user"]; ?>">
		 <input type="hidden" id="sesion_nombre" value="<?php echo $_SESSION["session_nombre"]; ?>">


		<input type="hidden" id="periodoescolar" value="<?php echo $periodoescolar; ?>">
                
                <input type="hidden" id="activar_mensaje" name="activar_mensaje" value="<?php echo $activar_mensaje; ?>">



	</div>


	<div id="separacion0" style="width: auto; height: 50px"></div>

	<div id="menu" class="fluid" align="center">
		<?php
		include 'menu.php';
		?>

	</div>




	<div id="separacion" style="width: auto; height: 80px"></div>

        <div  id="contenidos"  align="center"
	style="width:auto;">



</div>






<div id="separacion3" style="width: auto; height: 40px;"></div>

  <?php
include 'pie.php';
?>
    