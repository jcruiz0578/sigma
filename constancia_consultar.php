<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<title></title>


<link href="css/estilo_formato.css" rel="stylesheet" type="text/css">
<link href="css/formato_input.css" rel="stylesheet" type="text/css">
<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script>

 $(document).ready(function () {

                $("#cedulaest").focusout(function () {
                    $.ajax({
                        url: 'constancia_consulta_estudiante.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {cedula: $('#cedulaest').val()}
                    }).done(function (respuesta) {
                        $("#apellidosest").val(respuesta.apellidos);
                        $("#nombresest").val(respuesta.nombres);

                        $("#annoest").val(respuesta.anoest);
                        $("#seccion").val(respuesta.seccion);
                        $("#status").val(respuesta.status);
						 $("#num_reg").val(respuesta.num_reg);
                        document.getElementById("status").focus();
                    });
                });
            });






</script>



<style>
</style>



</head>
<body>

	<h1>Consulta de Estudiante para Constancia de Estudio</h1>

	<form action="" method="POST">




		<div id="datos" align="justify"
			style="height: auto; width: auto; font-size: 22px;">

			<b>C&eacute;dula ID:</b><input type="text" name="cedulaest"
				id="cedulaest" class="formato">
				
				<b>Numero de Registro:</b><input type="text" name="num_reg"
				id="num_reg" class="formato"><br>
				
				<br>
			<br> <b>Apell&iacute;dos:</b><input type="text" name="apellidosest"
				id="apellidosest" class="formato" readonly> <b>Nombres:</b><input
				type="text" name="nombresest" id="nombresest" class="formato"
				readonly> <br>
			<br> <b>Año de estudio:</b><input type="text" name="annoest"
				id="annoest" class="formato" readonly> <b>Secci&oacute;n:</b><input
				type="text" name="seccion" id="seccion" class="formato"
				style="width: 80px" readonly> <br>
			<br> <b>Status:</b><input type="text" name="status" id="status"
				class="formato" style="width: 80px" readonly>



		</div>

		<button class="formato_boton" name="crear" id="crear" type="submit"
			style='background: url("/imagenes/Desktop2_48x48-32.gif"); background-repeat: no-repeat; background-position: top;'
			onclick="this.form.action = 'constancia.php'">CREAR</button>

      <button class="formato_boton" name="autenticacion" id="autenticacion" type="submit"
  			style='background: url("/imagenes/Desktop2_48x48-32.gif"); background-repeat: no-repeat; background-position: top;'
  			onclick="this.form.action = 'autenticacion.php'">AUTENTICACIÓN</button>


</body>
</html>
