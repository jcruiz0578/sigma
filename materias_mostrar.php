<?php
session_start();

include "conexion/conexion.php";


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
            "iDisplayLength": 10, // records per page
            "sDom": "t<'row'<'col-md-4'i><'col-md-4'p>>",
            "sPaginationType": "bootstrap"
        });





    });

</script>


<script >
    function msg() {
        if (!(confirm("Desea realizar esta Operación..? "))) {
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



<form action="#" method="POST">
        


        <table border="0" class="table table-hover table-striped table-responsive" id="tabla"
               style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; width: 95%">
            <thead>
                
                 <tr>
                    <td style="background: white; ;"><span id="nuevo"><a
                                href="javascript:crear_materia();"><img
                                    src="imagenes/png/48x48/window_add.png" title="Agregar Materias" alt="Agregar Materias" /></a></span></td>
                    
                    <td colspan="8"  style="background: white; text-align: center; font-size: 28px; font-weight: bold"> Operaciones con Materias</td>
                </tr>
                
                <tr align="center" bgcolor="#0099CC" style="color: white; width: 98% ;" >
                    <th style="text-align: center" >Nº</th>
                    <th style="text-align: center" >id Materia</th>
                    <th style="text-align: center" >Año de Estudio </th>
                    <th style="text-align: center">Materia</th>
                    <th style="text-align: center" >Area de Estudio</th>
                    <th style="text-align: center">Hrs Acad</th>

                    <th></th>
                     <th></th>


                </tr>
            </thead>
            <tbody>
                <?php
//$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest = '$anno_estudio' and seccion = '$seccion_consulta'  and periodoescolar='2014-2015' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
//$result_vigente = mysql_query($registros_vigente);

                $consulta = "SELECT * FROM materias, ano_estudio where  materias.id_anoest = ano_estudio.id_anoest  order by  anoest, materia asc "; // sentencia sql
                $result_consulta = $conexion->query($consulta);





                $contador = 0;
//while ($user = mysql_fetch_array($result_vigente)) {
                while ($user = $result_consulta->fetch_array()) {
                    $contador++;
                    ?>

                    <tr id="fila-<?php echo trim($user['id_materia']) ?>">
                        <td style="text-align: center; font-weight: bold"><?php echo $contador ?></td>

                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['id_materia']) ?></td>
                    <td style="text-align: center;font-weight: bold"><?php echo trim($user['anoest']) ?></td>
                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['materia']) ?></td>
                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['area']) ?></td>
                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['hrs']) ?></td>

<?php 
/*
$operacion1 = "Eliminar";
$operacion = base64_encode($operacion1);

$cod1 = trim($user['id_anoest_seccion']);
$cod = base64_encode($cod1);
*/
?>
   <td><span class="modi"><a
                                href="#"><img
                   src="imagenes/png/32x32/window_edit.png" title="Modificar"
                                    alt="Modificar" /></a></span></td>
                  

                    <td><span class="modi"><a
                                href="#"><img
                                    src="imagenes/png/32x32/window_delete.png" title="Eliminar"
                                    alt="Eliminar" /></a></span></td>
                  



                    </tr>
                    <?php
                }

             $result_consulta->free();

                $conexion->close();
                ?>
               

                </tbody>

        </table>
 </form>
  





