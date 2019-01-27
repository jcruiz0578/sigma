<?php
session_start ();
include "conexion/conexion.php";
$procedencia = $_POST[TextProcedencia];


if ($procedencia == "Todas") {
$procedencia = "%";
}




include 'encabezado.php';


?>




<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>

<form action="" method="POST">
    
<b>Plantel de Procedencia.:</b><select class="formato"
name="TextProcedencia" id="TextProcedencia" style="width: auto;">

<option value="<?php  if(!empty($procedencia)){    $procedenciaseleccion=   $procedencia; echo   $procedenciaseleccion; } else {$procedenciaseleccion="N/A"; echo  $procedenciaseleccion;}  ?>" selected><?php  echo  $procedenciaseleccion?></option>								
		
<option>N/A</option>
 <option value="Todas">Todas</option>
<option>L.N.B. GRAL. EN JEFE JOSÉ FCO. BERMÚDEZ</option>
<option>E.B. GUAYACÁN DE LAS FLORES</option>
<option>E.B. LOS COCOS</option>
<option>E.B. EL MUCO</option>
<option>E.B. CONCENTRADA MIXTA “EL LIRIO”</option>
<option>E.B. LA CORBATA</option>
<option>U.E."NUESTRA. SEÑORA DE LA COROMOTO"</option>
<option>E.B. PRIMERO DE MAYO</option>
<option>U.E.P ANTONIO JOSE DE SUCRE</option>
<option>U.E.P ANDRES ELOY BLANCO</option>
<option>U.E.P COLEGIO MARÍA DEL JESUS ALMEIDA</option>
<option>U.E.P "DR. JOSÉ GREGORIO HERNÁNDEZ"</option>
<option>U.E.P JOSE MARIA VARGA</option>
<option>U.E.P JOSE FRANCISCO BERMÚDEZ</option>
<option>U.E.P "RAFAEL OSIO PÉREZ"</option>
<option>U.E.P SIMÓN BOLÍVAR</option>
<option>U.E.P VICENTE SALIAS</option>
<option>U.E.E. JUANITA SALINAS GAMBOA</option>
<option>U.E.E. MARIA RODRIGUEZ DE VERA</option>
<option>U.E.E. LOS LIMITES</option>
<option>U.E. J.A. RODRÍGUEZ ABREU</option>
<option>U.E.P ANDRES ELOY BLANCO</option>

</select>

<input type="submit" value="Consultar">


 <h3 style="align:center;">
        REGISTROS DE ESTUDIANTES PROVENIENTE DE INSTITUCIONES
    </h3>
  
  <div style="width: 97%; height: 400px; overflow: scroll;">
  

        <table border="1" class="table table-striped table-responsive" id="tabla"
        style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; ">
        <thead>
            <tr align="center" bgcolor="#0099CC">
                <th style="text-align: center">Nº</th>
                <th NOWRAP style="text-align: center">CODIGO REGISTRO</th>
                <th NOWRAP style="text-align: center">CÉDULA ID</th>
                <th NOWRAP style="text-align: center">APELLIDOS Y NOMBRES</th>
                <th NOWRAP style="text-align: center">CÉDULA REP</th>
                <th NOWRAP style="text-align: center">NOMBRE REP</th>
                <th NOWRAP style="text-align: center">REPR</th>
                <th NOWRAP style="text-align: center">RZ</th>
                <th NOWRAP style="text-align: center">FICHA</th>
                <th NOWRAP style="text-align: center">OBSERVACION</th>


            </tr>
        </thead>
        <tbody>
            <?php


$registros_vigente = "SELECT * FROM ingresos, estudiantes, representantes where estudiantes.cedulaest=ingresos.cedulaest and anoest ='1ER AÑO'  and periodoescolar= '$periodoescolar' and ingresos.procedencia like '$procedencia' and representantes.cedularep = ingresos.cedularep order by  ingresos.ficha asc "; // sentencia sql
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

        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['id_ingreso']) ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedulaest']) ?></FONT></td>
        <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombre ?></FONT></td>
         <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedularep']) ?></FONT></td>
          <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombrerep ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['repitienteest']) ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['rezagado']) ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['ficha']) ?></FONT></td>
       <td NOWRAP ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['observacion']) ?></FONT></td>

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
