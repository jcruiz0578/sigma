<?php
session_start();
include "../conexion/conexion.php";
?>

<!doctype html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" 
src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
src="js/jquery-DT-pagination.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#tabla').dataTable({
            "bSort": false, // Disable sorting
            "iDisplayLength": 10, // records per page
            "sDom": "t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap"
        });





    });

</script>


<script language="javascript">
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




<form action="prueba.php" method="POST">
<table border="0" class="table table-hover table-striped" id="tabla"
           style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid;">
        <thead>
            <tr align="center" bgcolor="#0099CC">
                <th><center>Nº</th>
            <th><center>CODIGO REGISTRO</th>
                <th><center>NOMBRE</th>
                    
                                <th><center></th>
                                    <th><center></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest ='2DO AÑO' and seccion ='C'  and periodoescolar='2014-2015' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
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

                                            <tr id="fila<?php echo trim($user['id_ingreso']) ?>">
                                                <td><center> <input type="text" name="a[]" id="a[]" value= "<?php echo $contador ?>"></td>
                                                <td><center> <input type="text" name="b[]" id="b[]" value= "<?php echo trim($user['id_ingreso']) ?>"></td>
                                                  <td><center> <input type="text" name="c[]" id="c[]" value= "<?php echo $nombre ?>"></td>
                                                    
                                                  


                                                                    <td><span class="modi"><a
                                                                                href="#"><img
                                                                                    src="imagenes/png/32x32/user_edit.png" title="Editar"
                                                                                    alt="Editar" /></a></span></td>
                                                                    <td id="del_usuario"><a
                                                                            href="#"><img
                                                                                src="imagenes/png/32x32/printer.png" title="Imprimir Datos"
                                                                                alt="Eliminar" /></a></td>




                                                                    </tr>
                                                                    <?php
                                                                }

                                                                mysqli_free_result($result_vigente);
                                                                mysqli_close($conexion);
                                                                ?>
                                                                </tbody>
       
                                                                
                                                                </table>
    
    <input type="submit" value="ENVIAR">    
    
</form>