<?php
session_start();

include "conexion/conexion.php";

$cod = "SI";
$cod = base64_encode($cod);

$xcedulaest = $_SESSION["xcedulaest"];


$periodoescolar = $_SESSION ["session_periodoescolar"];

$consulta = "SI";
?>
<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>



<script >
    $(document).ready(function () {

        $('#tabla').dataTable({
            "bSort": false, // Disable sorting
            "iDisplayLength": 10, // records per page
            "sDom": "t<'row'<'col-md-4'i><'col-md-4'p>>",
            "sPaginationType": "bootstrap"
        });





    });

</script>


<script>
    function msg() {
        if (!(confirm("Desea Consultar Este Estudiante..? "))) {
            return false;

        }
        ;

    }
</script>



<style>
    .pagination {
        margin: 0 ! important;
    }

    th {
        text-align: center;
        color: white;
    }
</style>


<br>




<form
    action="distribuidor_consulta.php?consultar_estudiante=<?php echo $cod ?>"
    method="POST">


    <input id="cedulaest" name="cedulaest" class="formato"
           style="width: 200px" value="<?php echo $xcedulaest ?>">




    <button id="enviar" type="submit" name="submit" class="btn btn-success"
            style="font-size: 16px; height: 40px">
        <span class="glyphicon glyphicon-inbox"></span> Consultar
    </button>
</form>




<h4 style="align: center;">ESTUDIANTE POR PERIODO ESCOLAR</h4>
<div class=" table-responsive" style="width: auto;">



    <table 
        class="table table-hover table-striped table-responsive" id="tabla"
        style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid;">
        <thead>
            <tr align="center" bgcolor="#0099CC" >

                <th>PERIODO ESCOLAR</th>
                <th >ID INGRESO</th>
                <th>CEDULA EST</th>
                <th>APELLIDOS Y NOMBRES</th>
                <th>AÑO Y SECCIÓN</th>
                <th>STATUS</th>


                <th NOWRAP ></th>
                <th NOWRAP ></th>
                <th NOWRAP ></th>
                <th NOWRAP ></th>
                

            </tr>
        </thead>
        <tbody>

<?php
$registros_vigente = "SELECT periodoescolar, estudiantes.cedulaest, ingresos.cedulaest, apellidosest, nombresest, sexoest, fnest, id_ingreso, anoest, seccion, repitienteest, materiapendiente, rezagado, status, fecha_ingreso   FROM estudiantes, ingresos where estudiantes.cedulaest =  '$xcedulaest' and ingresos.cedulaest =  '$xcedulaest' order by periodoescolar ASC"; // sentencia sql
$result_vigente = $conexion->query($registros_vigente);

while ($user = $result_vigente->fetch_array()) {

    $periodoescolar = $user [periodoescolar];
    $apellidosest = $user [apellidosest];
    $nombresest = $user [nombresest];
    $anno = $user [anoest];
    $seccion = $user [seccion];
    $nombre = $apellidosest . ", " . $nombresest;

    $anno_seccion = $anno . " " . $seccion;

    if ($status == "E") {
        $color_E = "red";
    } else {
        $color_E = "black";
    }
    ?>

                <tr>

                    <td ><FONT COLOR=<?php echo $color_E ?>><?php echo $periodoescolar ?></FONT></td>

                    <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['id_ingreso']) ?></FONT></td>
                    <td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedulaest']) ?></FONT></td>
                    <td ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombre ?></FONT></td>
                    <td ><FONT COLOR=<?php echo $color_E ?>><?php echo $anno_seccion ?></FONT></td>
                    <td style="text-align: center"><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['status']) ?></FONT></td>

                    <td NOWRAP colspan=4 ><span><a
                                href="ingresos_egresos.php?id=<?php echo trim($user['id_ingreso']) ?>&cedula=<?php echo trim($user['cedulaest']) ?>&periodoescolar_anterior=<?php echo trim($periodoescolar) ?>&consultar=<?php echo $consulta ?>"><img
                                    src="imagenes/Notepad2_48x48-32.gif" class="img-rounded" title="Editar"
                                    alt="Editar" /></a></span></td>





                </tr>
    <?php
}

unset($_SESSION ['xcedulaest']);

$result_vigente->free();

$conexion->close();
?>
        </tbody>

    </table>

</div>
