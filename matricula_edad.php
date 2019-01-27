<?php
session_start();
include "conexion/conexion.php";

// la variable $proceso recibe el dato de saber que tipo de matricula se mostrara
// esta varible proviene de  href del menu de envio 

$proceso = $_REQUEST[proceso];


// EN ESTE MODULO SE MOSTRARAN LOS RESULTADOS DEL CALCULO DE MATRICULA GENERAL
// POR AÑO Y POR SEXO
?>

<?php
// INCLUIMOS EL ENCABEZADO

include "encabezado.php";
?>

<!doctype html>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>

<script>
$(document).ready(function () {

  $('#tabla').dataTable({
    "bSort": false, // Disable sorting
    "iDisplayLength": 10, // records per page
    "sDom": "t<'row'<'col-md-4'i><'col-md-4'p>>",
    "sPaginationType": "bootstrap"
  });

});

</script>



<style>
.pagination {
  margin: 0 ! important;

}


table {
  width:auto;
  background: #e5e5e5;
  box-shadow: 8px 8px 15px #999;
  border-radius: 15px;
  border-top-style: solid;
  border-collapse: separate;
  border-spacing: 15px;
}

th,td {

  text-align: center;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  vertical-align: top;
  border-spacing: 0;
}

</style>


<br>







  <?php
  include "matricula_edad_calculo.php";


  ?>

<div id="principal">
   <h3 style="align: center;"><?php echo $titulo ?></h3>


  <table border="0" class="table-hover" style="" >
    <tr>
      <th style="vertical-align:middle" COLSPAN="2" >AÑO/SEXO/EDAD</th>

      <th>10</th>
      <th>11</th>
      <th>12</th>
      <th>13</th>
      <th>14</th>
      <th>15</th>
      <th>16</th>
      <th>17</th>
      <th>18</th>
      <th>19</th>
      <th>20</th>
      <th>21</th>
      <th>TOTALES</th>
    </tr>

    <?php
    for ($x=1; $x < 6 ; $x++) {

      if ($x == 1) {
        $anno = "1ER AÑO";
      }
      if ($x == 2) {
        $anno = "2DO AÑO";
      }
      if ($x == 3) {
        $anno = "3ER AÑO";
      }

      if ($x == 4) {
        $anno = "4TO AÑO CS";
      }

      if ($x == 5) {
        $anno = "5TO AÑO CS";
      }



      echo "<tr style='color: red'>";
      echo "<td style='vertical-align:middle; color: black' rowspan='2' >".$anno."</td>";
      echo '<td style="background-color: #f00; color: white;">H</td>';
      echo "<td>".sprintf('%01d', $f10[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f11[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f12[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f13[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f14[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f15[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f16[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f17[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f18[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f19[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f20[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $f21[$x][1])."</td>";
      echo "<td>".sprintf('%01d', $ft[$x][1])."</td>";
      echo "<td style='vertical-align:middle; color:black' rowspan='2' >".$tt[$x]=$ft[$x][1]+$ft[$x][2]."</td>";

      echo "</tr>";

      echo "<tr style='color: blue'>";
      echo '<td style="background-color: blue; color: white;">V</td>';
      echo "<td>".sprintf('%01d', $f10[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f11[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f12[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f13[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f14[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f15[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f16[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f17[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f18[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f19[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f20[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $f21[$x][2])."</td>";
      echo "<td>".sprintf('%01d', $ft[$x][2])."</td>";


      echo "</tr>";
      // AGREGO UNA FILA EN BLANCO PARA DEJAR MAS ESPACIO ENTRE LOS RESULTADOS POR AÑO
      echo "<tr>";
      echo "</tr>";
    }

    ?>

    <!--AQUI SE REALIZA LA FILA Y COLUMNA DE LOS TOTALES,  -->
    <tr style='color: red'>
      <td style='vertical-align:middle; color: black' rowspan='2' >TOTALES</td>
      <td style="background-color: #f00; color: white;">H</td>
      <td><?php echo $fem10 ?></td>
      <td><?php echo $fem11 ?></td>
      <td><?php echo $fem12 ?></td>
      <td><?php echo $fem13 ?></td>
      <td><?php echo $fem14 ?></td>
      <td><?php echo $fem15 ?></td>
      <td><?php echo $fem16 ?></td>
      <td><?php echo $fem17 ?></td>
      <td><?php echo $fem18 ?></td>
      <td><?php echo $fem19 ?></td>
      <td><?php echo $fem20 ?></td>
      <td><?php echo $fem21 ?></td>
      <td><?php echo $totalfemenino?></td>

      <td style='vertical-align:middle; color:black' rowspan='2' ><?php echo $ttotal ?></td>

    </tr>

    <tr style='color: blue'>
      <td style="background-color: blue; color: white;">V</td>
      <td><?php echo $masc10 ?></td>
      <td><?php echo $masc11 ?></td>
      <td><?php echo $masc12 ?></td>
      <td><?php echo $masc13 ?></td>
      <td><?php echo $masc14 ?></td>
      <td><?php echo $masc15 ?></td>
      <td><?php echo $masc16 ?></td>
      <td><?php echo $masc17 ?></td>
      <td><?php echo $masc18 ?></td>
      <td><?php echo $masc19 ?></td>
      <td><?php echo $masc20 ?></td>
      <td><?php echo $masc21 ?></td>
      <td><?php echo  $totalmasculino?> </td>



    </tr>

  </tr>




</table>

</div>



<?php
// INCLUIMOS EL pie de pagina

include "pie.php";
?>
