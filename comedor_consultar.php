<?php
session_start ();
include "conexion/conexion.php";
include "encabezado.php";
 ?>


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


<!--<link href="css/estilo_formato.css" rel="stylesheet" type="text/css">-->
<link href="css/formato_input.css" rel="stylesheet" type="text/css">
<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>

<!-- Bootstrap Date-Picker Plugin -->
<link rel="stylesheet" href="./css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="./js/bootstrap-datepicker.min.js"></script>




<script>

 $(document).ready(function () {

  $("#repetir").hide();


                $("#num_reg").focusout(function () {
                    $.ajax({
                        url: 'comedor_consulta_estudiante.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {num_reg: $('#num_reg').val()}
                    }).done(function (respuesta) {
                         $("#cedulaest").val(respuesta.cedulaest);
                        $("#id_ingreso").val(respuesta.id_ingreso);
                        $("#apellidosest").val(respuesta.apellidos);
                        $("#nombresest").val(respuesta.nombres);

                        $("#annoest").val(respuesta.anoest);
                        $("#seccion").val(respuesta.seccion);
                        $("#status").val(respuesta.status);
                        document.getElementById("status").focus();
                    });
                });
            });






</script>




<style>
</style>



</head>
<body>

	<h1>Regitro para el Servicio de Comedor</h1>

	<!--<form action="" method="POST">-->




		<div id="datos" align="justify"
			style="height: auto; width: auto; font-size: 18px;">

      <b>Fecha:</b>
       <div class="input-append date" data-provide="datepicker" data-date-format="yyyy-mm-dd">

           <input type="text"  name="fecha_comer" id="fecha_comer" class="form-control formato">
           <div class="input-group-addon">
               <span class="glyphicon glyphicon-th"></span>
           </div>
       </div>

       <script type="text/javascript">
       $('#fecha_comer').datetimepicker({
           format: 'yyyy-mm-dd'
       });


       </script>
<br />
<br />



			<b>N&uacute;mero de Registro:</b><input type="text" name="num_reg"
				id="num_reg" class="formato" style="width:80px">
<br />
<br />




			<b>C&eacute;dula ID:</b><input type="text" name="cedulaest"
				id="cedulaest" class="formato">

        <input type="hidden" name="id_ingreso"
  				id="id_ingreso" class="formato" readonly> </br>

          			<br> <b>Apell&iacute;dos:</b><input type="text" name="apellidosest"
				id="apellidosest" class="formato" readonly> <b>Nombres:</b><input
				type="text" name="nombresest" id="nombresest" class="formato"
				readonly> <br>
			<br> <b>Año de estudio:</b><input type="text" name="annoest"
				id="annoest" class="formato" readonly> <b>Secci&oacute;n:</b><input
				type="text" name="seccion" id="seccion" class="formato"
				style="width: 80px" readonly  onclick="return ingresar_comedor()"  > <br>
			<br> <b>Status:</b><input type="text" name="status" id="status"
				class="formato" style="width: 80px" readonly>



		</div>

<!--    <button
            class="formato_boton"
            name="limpiar"
            id="limpiar"
            type="reset"
            style='background: url("/imagenes/limpiar.png"); background-repeat: no-repeat; background-position: top;'
            onclick="return limpiar_focus();"
    >LIMPIAR
  </button> -->

		<button class="formato_boton" name="crear" id="crear" type="submit"
			style='background: url("/imagenes/Desktop2_48x48-32.gif"); background-repeat: no-repeat; background-position: top;'>COMER</button>

      <button class="formato_boton" name="repetir" id="repetir" type="submit"
        style='background: url("/imagenes/ingreso.gif"); background-repeat: no-repeat; background-position: top;'>REPETIR</button>





</body>
<script>
// función para registrar que el estudiante coma  por primera vez
$(document).ready(function(){

$('#crear').click(function() {


                     $.ajax({
                         url: 'comedor_ingreso_estudiante.php',
                         type: 'POST',
                         dataType: 'json',
                         data: {id_ingreso: $('#id_ingreso').val(), fecha_comer: $('#fecha_comer').val()}
                     }).done(function (respuesta) {

                         $("#fecha_comer").val(respuesta.fecha_comer);

                            var repite = respuesta.repite;

                            if (repite == 'SI') {


                              var statusConfirm = confirm("EL ESTUDIANTE YA HA COMIDO ANTERIORMENTE... VA HA REPETIR? ");

                              if (statusConfirm == true){
                             $("#repetir").show();
                             $("#crear").hide();
                           } else {
                             $("#num_reg").val("");
                             $("#cedulaest").val("");
                             $("#id_ingreso").val("");
                             $("#apellidosest").val("");
                             $("#nombresest").val("");
                             $("#annoest").val("");
                             $("#seccion").val("");
                             $("#status").val("");

                             $("#repetir").hide();
                              document.getElementById("reg_num").focus();

                           }

                           };
                          if (repite == 'NO') {
                            alert("EL ESTUDIANTE COME POR PRIMERA VEZ");
                          $("#num_reg").val("");
                          $("#cedulaest").val("");
                          $("#id_ingreso").val("");
                          $("#apellidosest").val("");
                          $("#nombresest").val("");
                          $("#annoest").val("");
                          $("#seccion").val("");
                          $("#status").val("");

                           document.getElementById("num_reg").focus();


                        };
                     });

});

});

</script>


<script>
// función para registrar que el estudiante REPITA
$(document).ready(function(){

$('#repetir').click(function() {


                     $.ajax({
                         url: 'comedor_repetir.php',
                         type: 'POST',
                         dataType: 'json',
                         data: {id_ingreso: $('#id_ingreso').val(), fecha_comer: $('#fecha_comer').val()}
                     }).done(function (respuesta) {
                            alert("EL ESTUDIANTE VOLVIO A COMER");
                             $("#num_reg").val("");
                             $("#cedulaest").val("");
                             $("#id_ingreso").val("");
                             $("#apellidosest").val("");
                             $("#nombresest").val("");
                             $("#annoest").val("");
                             $("#seccion").val("");
                             $("#status").val("");

                             $("#repetir").hide();
                              $("#crear").show();
                              document.getElementById("num_reg").focus();
                     });
});

});

</script>





</html>

<?php
include "pie.php";
 ?>
