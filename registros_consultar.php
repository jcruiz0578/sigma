<?php
session_start();

include "conexion/conexion.php";

$cod = "SI";
$cod = base64_encode($cod);

$anno_estudio = $_SESSION[anno_estudio];
$seccion_consulta = $_SESSION[seccion];
$periodoescolar = $_SESSION ["session_periodoescolar"];

?>
<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>



<script type="text/javascript">
    $(document).ready(function () {

        $('#tabla').dataTable({
"bSort": false, // Disable sorting
"iDisplayLength": 12, // records per page
"sDom": "t<'row'<'col-md-4'i><'col-md-4'p>>",
"sPaginationType": "bootstrap"
});


    });

</script>


<script >
    function msg() {
        if (!(confirm("Desea Eliminar este Usuario..? "))) {
            return false;

        }
        ;

    }
</script>



<style>
    .pagination {
        margin: 0 ! important;

    }
</style>







<br>


<form action="distribuidor_consulta.php?consultar_seccion=<?php echo $cod ?>" method="POST">

    <select id="anno_estudio" name="anno_estudio" class="btn btn-success"style="width: auto; height: auto;  font-size: 16px">
        <option value="<?php echo $anno_estudio ?>"><?php echo $anno_estudio ?></option>
        <option value="Todas">Todas</option>
        <option value="1ER AÑO">1ER AÑO</option>
        <option value="2DO AÑO">2DO AÑO</option>
        <option value="3ER AÑO">3ER AÑO</option>
        <option value="4TO AÑO CS">4TO AÑO CS</option>
        <option value="5TO AÑO CS">5TO AÑO CS</option>
    </select>

    <select id="seccion" name="seccion" class="btn btn-success" style="width: auto; height: auto; font-size: 16px ">
        <option value="<?php echo $seccion_consulta ?>"><?php echo $seccion_consulta ?></option>
        <option value="Todas">Todas</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
    </select>

    <button id="enviar" type="submit" name="submit" class="btn btn-success" style="font-size: 16px; height: 40px"  >
        <span class="glyphicon glyphicon-inbox"></span>  Consultar</button>
    </form>

    <h3 style="align:center;">
        REGISTROS DE ESTUDIANTES
    </h3>
    <div class="table table-responsive"  style="width: auto;">

        <table  class="table table-striped table-responsive" id="tabla"
        style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; ">
        <thead>
            <tr align="center" bgcolor="#0099CC">
                <th style="text-align: center">Nº</th>
                <th style="text-align: center">CODIGO REGISTRO</th>
                <th style="text-align: center">CÉDULA ID</th>
                <th style="text-align: center">APELLIDOS Y NOMBRES</th>
                <th style="text-align: center">AÑO</th>
                <th style="text-align: center">SECCIÓN</th>

                <th style="text-align: center"></th>
                <th style="text-align: center"></th>

            </tr>
        </thead>
        <tbody>
            <?php


$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest like '$anno_estudio' and seccion like '$seccion_consulta'  and periodoescolar='$periodoescolar' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
$result_vigente = $conexion->query($registros_vigente);

$contador = 0;
//while ($user = mysql_fetch_array($result_vigente)) {
while ($user = $result_vigente->fetch_array()) {
    $contador++;
    $apellidosest = $user [apellidosest];
    $nombresest = $user [nombresest];
    $status = $user [status];
    $nombre = $apellidosest . ", " . $nombresest;

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
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombre ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['anoest']) ?></FONT></td>
        <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['seccion']) ?></FONT></td>


        <td NOWRAP><span ><a href="#"><img src="imagenes/png/32x32/user_edit.png" class="img-rounded"  title="Editar" alt="Editar" /></a></span></td>

            <td id="del_usuario"><a
                href="#"><img
                src="imagenes/png/32x32/printer.png" class="img-rounded"  title="Imprimir Datos"
                alt="Eliminar" /></a></td>

            </tr>
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

</div>
