<?php
session_start (); 
include "conexion/conexion.php"; 

$periodoescolar = $_SESSION ["session_periodoescolar"]; ?> 

<!doctype html>
<!--[if lt IE 7]>
<html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>
<html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>
<html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset = "utf-8">
<meta name = "viewport"content = "width=device-width, initial-scale=1" >
<title > Sistema Integral de Registro de Control de Estudios y Evaluación </title >
<link href = "css/boilerplate.css"rel = "stylesheet"type = "text/css" >
<link href = "css/estilo.css"rel = "stylesheet"type = "text/css" >

<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-1.8.3.min.js"  type="text/javascript"></script>
<script src = "js/jquery.dataTables.min.js" ></script>
<script src = "js/jquery-DT-pagination.js" ></script>

<script> 
$(document) . ready(function () {
$("#anno_estudio") . change(function () {
$("#combomaterias") . empty(); 
$ . getJSON('materia_combo.php?anoest_seleccion=' + $("#anno_estudio") . val(), function(data) {
$ . each(data, function(id_materia, value) {
$("#combomaterias") . append('<option value="' + id_materia + '">' + value + '</option>'); 
}); 
}); 
}); 
});
</script>

<style type = "text/css"> 
input . formato, select . formato, textarea . formato {
font - weight:bold; 
border - color:#12CBF5; 
box - shadow:15px 15px 15px #999; 
}
</style>

</head>

<body style = "background: #e5e5e5; background: url(imagenes/fondo23.jpg) no-repeat fixed center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" >  < div class = "gridContainer clearfix"
style = "background: white; box-shadow: 15px 15px 15px #999; border-radius: 15px; border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-left-style: solid; margin-top: 30px; margin-bottom: 30px" >  < div id = "principal"class = "fluid" >  < div id = "encabezado"align = "center" >  < div id = "logo1" >  < img src = "imagenes/MEMBRETE.jpg" >  </div >  </div >  < div id = "periodoescolar_mostrar"align = "center" >  < h2 > Período Escolar: <?php echo $periodoescolar?></h2 >  </div >  < div id = "escrito"align = "right" >  < div id = "logueo"style = "font-weight: bold;" >  < font color = "red" > Logueado como: </font >  <?php

      echo $_SESSION ["session_user"]; ?>&nbsp;  &nbsp;  < a href = 'principal.php?logout' > Cerrar Sesion <?php session_name("session_user"); ?></a >  </div >  < div id = "usuario"style = "font-weight: bold;" >  < font color = "red" > Usuario: </font >  <?php echo  $_SESSION["session_nombre"]; ?></div >  < div id = "categoria"style = "font-weight: bold;" >  < font color = "red" > Categoria del Usuario: </font >  <?php echo $_SESSION["session_categoria"]; ?></div >  </div >  < div id = "separacion0"style = "width: auto; height: 50px" ></div >  < div id = "menu"class = "fluid"align = "center" >  <?php
        include 'menu.php'; ?>  </div >  < div id = "separacion0"style = "width: auto; height: 80px" ></div >  < div id = "datos"class = "container-fluid"align = "center"
style = "width: auto;" >  < form action = ""method = "POST" >  < select id = "anno_estudio"name = "anno_estudio"
class = "btn dropdown-toggle"
style = "width: auto; height: auto; font-size: 16px" >  < option value = "<?php echo $anno_estudio ?>" ><?php echo $anno_estudio?></option >  < option value = "Todas" > Todas </option >  < option value = "1" > 1ER AÑO </option >  < option value = "2" > 2DO AÑO </option >  < option value = "3" > 3ER AÑO </option >  < option value = "4" > 4TO AÑO CS </option >  < option value = "5" > 5TO AÑO CS </option >  </select >  < select id = "seccion"name = "seccion"
class = "btn dropdown-toggle"
style = "width: auto; height: auto; font-size: 16px" >  < option value = "<?php echo $seccion_consulta ?>" ><?php echo $seccion_consulta?></option >  < option value = "Todas" > Todas </option >  < option value = "A" > A </option >  < option value = "B" > B </option >  < option value = "C" > C </option >  < option value = "D" > D </option >  < option value = "E" > E </option >  < option value = "F" > F </option >  < option value = "G" > G </option >  < option value = "G" > H </option >  </select >  < select name = "combomaterias"
id = "combomaterias"class = "btn dropdown-toggle"
style = "width: auto;" >  </select >  < select name = "combolapso"id = "combolapso"
class = "btn dropdown-toggle"style = "width: auto;" >  < option value = "SELECCIONAR" > SELECCIONAR </option >  < option value = "1" > 1ER LAPSO </option >  < option value = "2" > 2DO LAPSO </option >  < option value = "3" > 3ER LAPSO </option >  < option value = "D" > DEFINITIVA </option >  < option value = "R" > REVISION </option >  </select >  < ! --se crea unos imput ocultos para poder envir los valores de la primera recarga-- >  < button id = "enviar"type = "submit"name = "submit"
class = "btn btn-primary dropdown-toggle"
style = "font-size: 16px; height: 40px" > Consultar </button >  </form >  </div >  < div id = "separacion"style = "width: auto; height: 80px" ></div >  < div id = "contenidos"class = "container-fluid"align = "center"
style = "width: auto;" >  < form action = "notas_proceso.php"method = "POST" >  <?php

  $lapso = $_POST ['combolapso']; 
$anno_estudio = $_POST ['anno_estudio']; 
$seccion = $_POST ['seccion']; 
$combomaterias = $_POST ['combomaterias']; ?>  < input type = "text"name = "combolapsoE"id = "combolapsoE"value = "<?php echo $lapso ; ?>"/>  < input type = "text"name = "anno_estudioE"
id = "anno_estudioE"
value = "<?php echo $anno_estudio ; ?>" >  < input type = "text"name = "seccionE"id = "seccionE"
value = "<?php echo $seccion ; ?>" >  < input type = "text"name = "combomateriasE"
id = "combomateriasE"
value = "<?php echo $combomaterias  ; ?>" >  < table class = "table table-hover table-striped"
id = "tabla"
style = "background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; width: auto;" >  < thead >  < tr bgcolor = "#0099CC" >  < th style = "text-align: center" > Nº </th >  < th style = "text-align: center;" > CODIGO
        REGISTRO </th >  < th style = "text-align: center" > CEDULA ID </th >  < th
        style = "text-align: center; width: auto" > NOMBRE y APELLIDOS </th >  < th > NOTAS </th >  </tr >  </thead >  < tbody >  <?php

      $anoestudio1 = $_POST ['anno_estudio']; 

if ($anoestudio1 == "1") {
$anoestudio = "1ER AÑO"; 
}

if ($anoestudio1 == "2") {
$anoestudio = "2DO AÑO"; 
}

if ($anoestudio1 == "3") {
$anoestudio = "3ER AÑO"; 
}

if ($anoestudio1 == "4") {
$anoestudio = "4TO AÑO CS"; 
}

if ($anoestudio1 == "5") {
$anoestudio = "5TO AÑO CS"; 
}

echo "EL AÑO DE ESTUDIO ES: " . $anoestudio . "  SECCIÓN: " . $seccion; 
echo "<BR>"; 
echo "LA MATERIA A LLENAR ES: " . $combomaterias; 

$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest = '$anoestudio' and seccion ='$seccion'  and periodoescolar='$periodoescolar' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
$result_vigente = $conexion->query($registros_vigente); 
$contador = 0; 

while ($user = $result_vigente -> fetch_array ()) {
$contador++; 
$apellidosest = $user [apellidosest]; 
$nombresest = $user [nombresest]; 
$status = $user [status]; 
$nombre = $apellidosest . ", " . $nombresest; 
if ($status == "E") {
$color_E = "red"; 
}else {
$color_E = "black"; 
}?>  < tr id = "fila<?php echo trim($user['id_ingreso']) ?>" >  < td align = "center" >< input type = "text"
name = "contador[]"id = "contador[]"
style = "width: 30px; text-align: center"
value = "<?php echo $contador ?>" ></td >  < td align = "center" >< input type = "text"
name = "id_ingreso[]"
id = "id_ingreso[]"
style = "width: 150px; text-align: center"
value = "<?php echo trim($user['id_ingreso'])?>" ></td >  < td align = "center" >< input type = "text"
name = "cedula[]"id = "cedula[]"
style = "text-align: center; width: 80px; font-weight: bold"
value = "<?php echo trim($user['cedulaest']) ?>" ></td >  < td align = "center" >< input type = "text"
name = "nombres[]"id = "nombres[]"
style = "width: 430px; font-weight: bold"
value = "<?php echo $nombre ?>" ></td >  < td align = "center" >< input type = "number"
name = "notas[]"id = "notas[]"
style = "width: 60px; text-align: center"
max = "20"
TABINDEX = "<?php echo $contador ?>"
autofocus ></td >  </tr >  <?php
                }
mysqli_free_result ($result_vigente); 
mysqli_close ($conexion); ?>  </tbody >  </table >  < input type = "submit"value = "ENVIAR" >  </form >  </div >  < div id = "separacion3"style = "width: auto; height: 40px;" ></div >  </div >  < div id = "separacion3"style = "width: auto; height: 40px;" ></div >  < div id = "publicidad"class = "fluid" >  <?php
        // include 'publicidad.php';?>  </div >  < div id = "pie"class = "fluid"align = "center" >  < HR width = auto align = "center"
style = "background-color: red; height: 6px;" >  < b > Copyright© 2015:Todos los Derechos Reservados . Sistema
          Integral de Registro de Control de Estudios y Evaluación </b >< br >  < b >< i > L . N . B . General en Jefe José Francisco Bermúdez, Urb . 
Guayacán de las Flores, Sector 1, Calle # 5 .  </i ></b >< br >  < b >< i > Teléfonos:0294-511-10 . 49 /0294-332-48 . 66 - 
e - mail:lnbjfb@gmail . com - Twitter:@lnbjfb </i ></b >< br >  < b > Realizado por:ING . JUAN CARLOS RUIZ H </b >  < div id = "separacion3"style = "width: auto; height: 50px" ></div >  </div >  </div >  </body >  </html > 
