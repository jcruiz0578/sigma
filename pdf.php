<?php
include "conexion/conexion.php";
ob_start();
?>
<page>
    <img style="width:97%" src="imagenes/MEMBRETE.jpg">
<?php
date_default_timezone_set("America/Caracas");
$hora = date('h:i a', time() - 3600 * date('I'));
$fecha = date("d-m-Y", time() - 3600);
echo"<br>";
echo"<br>";
echo " Fecha del Reporte: " . $fecha;
echo ", Hora: " . $hora;
?>
    <P ALIGN=center> <h1>Libros Por Categoria</h1> </P>



 <?php
    
$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest like '2DO AÑO' and seccion like '%'  and periodoescolar='2014-2015' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
    $result_vigente = $conexion->query($registros_vigente);

 
    echo '<table border="1" align="center">';
 echo'<tr bgcolor="#0099CC">';
 echo'<th align=center>N°</th>
     <th align=center>CODIGO REGISTRO</th>
                <th align=center>CÉDULA ID</th>
                    <th align=center>APELLIDOS Y NOMBRES</th>
                        <th align=center>AÑO</th>
                            <th align=center>SECCIÓN</th>
  </tr>';
 
 

    $contador = 0;

    while ($user = $result_vigente->fetch_array()) {
        $contador++;
        $id_ingreso = $user [id_ingreso];
        $cedulaest = $user [cedulaest];
        $apellidosest = $user [apellidosest];
        $nombresest = $user [nombresest];
        $anoest = $user [anoest];
        $seccion = $user [seccion];
        
        $status = $user [status];
        
        $nombre = $apellidosest . ',' . $nombresest;
    
 
  echo'<tr>';
 echo'<td align=center> '.$contador.' </td>
   <td align=center> '.$id_ingreso.' </td>
   <td align=center> '.$cedulaest.'</td> 
       <td align=center> '.$nombre.'</td> 
           <td align=center> '.$anoest.'</td> 
               <td align=center> '.$seccion.'</td> 
  </tr>';
  
    }
    
    
    



    
     echo'</table>';





    


       
        ?>

    </page>
    <?php
    $content = ob_get_clean();
    require_once('html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
    $pdf->writeHTML($content);
    $pdf->pdf->IncludeJS('print(TRUE)');
    $pdf->output('reportelibrocategoria.pdf');
    ?>
