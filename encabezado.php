 <?php
	$periodoescolar = $_SESSION ["session_periodoescolar"];
	// $periodoescolar = $_POST["periodoescolar"];
	
	?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema Integral de Registro de Control de Estudios y Evaluación</title>

<!--<link href="css/boilerplate.css" rel="stylesheet" type="text/css">-->
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>

<!-- ARCHIVO JS EN DONDE SE ENCUENTRAN LAS VALIDACIONES DE ESTA CLASE   ESTA LA LA CARPETA js-->
<script src="js/mp_repetir.js"></script>

<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- ARCHIVO .CCS EN DONDE SE GUARDA LA CONFIGURACION DE ESTILO DE OBJETOS   ESTA LA LA CARPETA CSS-->
<link rel="stylesheet" href="css/estilo_formato.css">

<!-- AQUI PARA LA PAGINACION DE LAS TABLAS Y LAS VENTANAS MODALES-->

<link href="modal/assets/bootstrap.min.css" rel="stylesheet">
<script src="modal/assets/jquery-1.8.3.min.js"></script>
<script src="modal/assets/bootstrap.min.js"></script>
<style type="text/css">
.well {
	background: #fff;
	text-align: center;
}

.modal {
	text-align: left;
}
</style>


<!-- *********************************************************************-->
</head>
<body
	style="background: #e5e5e5; background: url(imagenes/fondo23.jpg) no-repeat fixed center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
	<div class="gridContainer clearfix"
		style="background: white; box-shadow: 15px 15px 15px #999; border-radius: 15px; border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-left-style: solid; margin-top: 30px; margin-bottom: 30px">
		<div id="principal" class="fluid">
			<!-- <form action="" method="POST">-->
			<div id="encabezado" align="center">
				<div id="logo1">
					<img src="imagenes/MEMBRETE.jpg">
				</div>
				<div id="logo2"></div>
				<div id="periodoescolar_mostrar">
					<h1>Período Escolar: <?php echo $periodoescolar?></h1>
					<h4>
						<a href="principal.php">REGRESAR AL MENÚ PRINCIPAL</a>
					</h4>
				</div>