<?php
session_start();

// sifrar variables que se enviaran por post
$operacion1 = "insertar";
$operacion = base64_encode($operacion1);




include "conexion/conexion.php";
?>

<html>
	<head>
		<script>
            $(document).ready(function () {
                // Parametros para el combo1
                $("#area_aprendizaje").change(function () {
                    $("#area_aprendizaje option:selected").each(function () {
                        //alert($(this).val());
                        elegido = $(this).val();
                        $.post("area_aprendizaje.php", {elegido: elegido}, function (data) {
                            $("#materias").html(data);
                        });
                    });
                });
            });

        </script>

		
	</head>
	
	<body>
	<h3 style="align: center;">CREAR MATERIAS</h3>
	<br />
	
	<div id="area" align="justify" >
		
 <form action="materias_operaciones.php?operaciones=<?php echo $operacion ?>" method="post" accept-charset="utf-8">
   
 
  
 <b>Areas de Aprendizaje</b>  <select  name="area_aprendizaje" class="form-control"  id="area_aprendizaje" style="width:auto; font-weight: bold; font-size: 14px ">
<option>N/A </option>
<option>CASTELLANO</option>
<option>CIENCIAS NATURALES</option>
<option>MATEMATICAS</option>
<option>LENGUAS EXTRANJERAS</option>
<option>MEMORIA TERRITORIO Y CIUDADANIA</option>
<option>EDUCACIÓN FÍSICA, DEPORTE Y RECREACIÓN </option>
<option>ARTE Y PATRIMONIO</option>

      </select>&nbsp;&nbsp;     

<div id="separacion" style="width: auto; height: 15px"></div>

<b>Materias</b>  <select  name="materias" id="materias" class="form-control" style="width:auto; font-weight: bold ; font-size: 18px">
<option>N/A </option>

      </select>&nbsp;&nbsp;
<div id="separacion" style="width: auto; height: 15px"></div>

 <b>Año de Estudio:</b><select id="anoest" name="anoest" class="form-control" style="width: auto; font-size: 14px; font-weight: bold">
                    <option >N/A</option>
                    <option value="1">1ER AÑO</option>
                    <option value="2">2DO AÑO</option>
                    <option value="3">3ER AÑO</option>
                    <option value="4">4TO AÑO CS</option>
                    <option value="5">5TO AÑO CS</option>

                </select>


<div id="separacion" style="width: auto; height: 15px"></div>

 <b>Horas Academicas:</b><select id="hras" name="hras" class="form-control" style="width: auto; font-size: 14px; font-weight: bold">
                    <option >N/A</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>

                </select>


<br />

  <p><input type="submit" value="Ingresar"/></p>
  </form>
 


</div>
	</body>
	
</html>