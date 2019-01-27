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




<?php



// contar el N° registro por seccion
$periodoescolar = $_SESSION ["session_periodoescolar"];

                $contar1 = "SELECT COUNT(*) as total FROM secciones where id_anoest='1' and periodoescolar ='$periodoescolar' ";
                $resultado1 = $conexion->query($contar1);
                $fila = $resultado1->fetch_array();
                $total1 = $fila["total"];
                
                
                $contar2 = "SELECT COUNT(*) as total FROM secciones where id_anoest='2' and periodoescolar ='$periodoescolar' ";
                $resultado2 = $conexion->query($contar2);
                $fila = $resultado2->fetch_array();
                $total2 = $fila["total"];

                $contar3 = "SELECT COUNT(*) as total FROM secciones where id_anoest='3' and periodoescolar ='$periodoescolar' ";
                $resultado3 = $conexion->query($contar3);
                $fila = $resultado3->fetch_array();
                $total3 = $fila["total"];
                
                $contar4 = "SELECT COUNT(*) as total FROM secciones where id_anoest='4'and periodoescolar ='$periodoescolar' ";
                $resultado4 = $conexion->query($contar4);
                $fila = $resultado4->fetch_array();
                $total4 = $fila["total"];
                
                $contar5 = "SELECT COUNT(*) as total FROM secciones where id_anoest='5' and periodoescolar ='$periodoescolar' ";
                $resultado5 = $conexion->query($contar5);
                $fila = $resultado5->fetch_array();
                $total5 = $fila["total"];
    
                $total = $total1+$total2+$total3+$total4+$total5;
             
                
?>








<h3 style="align: center;">SECCIONES CREADAS</h3>




<table border="0" class="table table-hover" style="width: auto; background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; ">
                        <tr bgcolor="#0099CC" style="color: white; ">
                            <th >1ER AÑO</th><th>2DO AÑO</th><th>3ER AÑO</th><th>4TO AÑO</th><th>5TO AÑO</th><th>TOTAL</th>
                        </tr>
                        <tr >
                            <td style="text-align: center; font-weight: bold; font-size: 16px"><?php echo $total1?></td>
                            <td style="text-align: center; font-weight: bold; font-size: 16px"><?php echo $total2?></td>
                            <td style="text-align: center; font-weight: bold; font-size: 16px"><?php echo $total3?></td>
                            <td style="text-align: center; font-weight: bold; font-size: 16px"><?php echo $total4?></td>
                            <td style="text-align: center; font-weight: bold; font-size: 16px"><?php echo $total5?></td>
                             <td style="text-align: center; font-weight: bold; font-size: 22px; color: red"><?php echo $total?></td>
                        </tr>
                        
                    </table>    
                    
        <br>
        <br>
                  
        


        <table border="0"  class="table table-hover table-striped table-responsive" id="tabla"
               style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; width: 95%">
            <thead>
                
                 <tr>
                    <td style="background: white; text-align: center"><span id="nuevo"><a
                                href="javascript:crear_seccion();"><img
                                    src="imagenes/png/32x32/window_add.png" title="Agregar Secciones" alt="Agregar Secciones" /></a></span></td>
                    
                    <td colspan="6"  style="background: white; text-align: center; font-size: 28px; font-weight: bold"> Operaciones con Secciones</td>
                </tr>
                
                <tr align="center" bgcolor="#0099CC" style="color: white; ">
                    <th style="text-align: center">Nº</th>
                    <th style="text-align: center">Periodo Escolar</th>
                    <th style="text-align: center">Cod. de la Sección</th>
                    <th style="text-align: center" >Año de Estudio</th>
                    <th style="text-align: center">Sección</th>

                    <th></th>


                </tr>
            </thead>
            <tbody>
                <?php
//$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest = '$anno_estudio' and seccion = '$seccion_consulta'  and periodoescolar='2014-2015' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
//$result_vigente = mysql_query($registros_vigente);

                $consulta = "SELECT * FROM secciones, ano_estudio where  secciones.id_anoest = ano_estudio.id_anoest and periodoescolar ='$periodoescolar' order by periodoescolar, anoest, seccion asc "; // sentencia sql
                $result_consulta = $conexion->query($consulta);





                $contador = 0;
//while ($user = mysql_fetch_array($result_vigente)) {
                while ($user = $result_consulta->fetch_array()) {
                    $contador++;
                    ?>

                    <tr id="fila-<?php echo trim($user['id_anoest']) ?>">
                        <td style="text-align: center; font-weight: bold"><?php echo $contador ?></td>

                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['periodoescolar']) ?></td>
                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['id_anoest_seccion']) ?></td>
                    <td style="text-align: center;font-weight: bold"><?php echo trim($user['anoest']) ?></td>
                    <td style="text-align: center; font-weight: bold"><?php echo trim($user['seccion']) ?></td>

<?php 
$operacion1 = "Eliminar";
$operacion = base64_encode($operacion1);

$cod1 = trim($user['id_anoest_seccion']);
$cod = base64_encode($cod1);

?>


                    <td><span class="modi"><a
                                href="secciones_operaciones.php?operaciones=<?php echo $operacion ?>&cod=<?php echo $cod ?>"><img
                                    src="imagenes/png/32x32/remove.png" title="Editar"
                                    alt="Editar" /></a></span></td>
                  



                    </tr>
                    <?php
                }

                
                   
                    
                
      
                
                $result_consulta->free();

                $conexion->close();
                ?>
              
                    
                </tbody>

        </table>

    



