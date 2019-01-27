<?php
session_start ();
include "conexion/conexion.php";
$Comboanoest = $_POST[Comboanoest];


if ($Comboanoest == "Todas") {
$Comboanoest = "%";
}




include 'encabezado.php';
$periodoescolar = $_SESSION ["session_periodoescolar"];

$consulta ="SI";

?>




<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>

<form action="" method="POST">
    
 <b>Año de Estudio?:</b> <select class="formato"
                                                        name="Comboanoest" id="Comboanoest" style="width: auto;">
<option value="<?php  if(!empty($Comboanoest )){    $Comboanoestseleccion=   $Comboanoest; echo   $Comboanoestseleccion; } else {$Comboanoestseleccion="N/A"; echo  $Comboanoestseleccion;}  ?>" selected><?php  echo  $Comboanoestseleccion?></option>								
                            <option>Todas</option>
                            <option>1ER AÑO</option>
                            <option>2DO AÑO</option>
                            <option>3ER AÑO</option>
                            <option>4TO AÑO CS</option>
                            <option>5TO AÑO CS</option>
                        </select>&nbsp;&nbsp;&nbsp;

<input type="submit" value="Consultar">


 <h3 style="text-align:center;">
        REGISTROS DE ESTUDIANTES POR AÑO, FICHA Y OBSERVACIONES
    </h3>
    <div class="table table-responsive"  style="width: auto; height:300px; overflow:scroll; ">

        <table border="0" class="table table-striped table-responsive" id="tabla"
        style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; ">
        <thead>
            <tr align="center" bgcolor="#0099CC">
                <th style="text-align: center">Nº</th>
                <th NOWRAP style="text-align: center">CODIGO REGISTRO</th>
                <th NOWRAP style="text-align: center">CÉDULA ID</th>
                <th NOWRAP style="text-align: center">APELLIDOS Y NOMBRES</th>
                <th NOWRAP style="text-align: center">CÉDULA REP</th>
                <th NOWRAP style="text-align: center">NOMBRE REP</th>
                <th style="text-align: center">SECCION</th>
                <th style="text-align: center">NUEVO ING</th>
                <th style="text-align: center">PROCEDENCIA</th>
                <th style="text-align: center">OBSERVACION</th>
                <th></th>
                 <th></th>
                  <th></th>
                   <th></th>
               
                                

            </tr>
        </thead>
        <tbody>
            <?php


$registros_vigente = "SELECT * FROM ingresos, estudiantes, representantes where estudiantes.cedulaest=ingresos.cedulaest and anoest like '$Comboanoest'  and periodoescolar='$periodoescolar' and nuevo_ingreso='SI' and representantes.cedularep = ingresos.cedularep   order by  ingresos.ficha asc "; // sentencia sql
$result_vigente = $conexion->query($registros_vigente);

$contador = 0;

while ($user = $result_vigente->fetch_array()) {
    $contador++;
    $apellidosest = $user [apellidosest];
    $nombresest = $user [nombresest];
    $status = $user [status];
    $nombre = $apellidosest . ", " . $nombresest;
    
    $apellidosrep = $user [apellidosrep];
    $nombresrep = $user [nombresrep];
      $nombrerep = $apellidosrep . ", " . $nombresrep;


    if ($status == "E") {
        $color_E = "red";
    } else {
        $color_E = "black";
    }
    ?>

    <tr id="fila-<?php echo trim($user['id_ingreso']) ?>">
        <td style="text-align:center;"><FONT COLOR=<?php echo $color_E ?>><?php echo $contador ?></FONT></td>

        <td  style="text-align: center" NOWRAP><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['id_ingreso']) ?></FONT></td>
        <td style="text-align: center" NOWRAP><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedulaest']) ?></FONT></td>
        <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombre ?></FONT></td>
        <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedularep']) ?></FONT></td>
          <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombrerep ?></FONT></td>
        <td style="text-align: center" ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['seccion']) ?></FONT></td>
        <td style="text-align: center" ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['nuevo_ingreso']) ?></FONT></td>
        <td NOWRAP style="text-align: center" ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['procedencia']) ?></FONT></td>
        <td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['observacion']) ?></FONT></td>
       <td colspan="4"><span><a
						href="ingresos_egresos.php?id=<?php echo trim($user['id_ingreso']) ?>&cedula=<?php echo trim($user['cedulaest']) ?>&periodoescolar_anterior=<?php echo trim($periodoescolar) ?>&consultar=<?php echo $consulta ?>"><img
							src="imagenes/Notepad2_48x48-32.gif" class="img-rounded" title="Editar"
							alt="Editar" /></a></span></td>

            <?php
        }

        unset($_SESSION['anno_estudio']);
        unset($_SESSION['seccion']);

       $result_vigente->free();
      $conexion->close();


//mysqli_free_result($result_vigente);
//mysqli_close();

        ?>
    </tbody>

</table>

                   
<?php 
include 'pie.php';
