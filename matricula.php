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
  border-spacing: 25px;
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

include "matricula_calculo.php";

?>






<div id="principal">
  <h3 style="align: center;"><?php echo $titulo ?></h3>






  <table border="0" class="table-hover" style="" >
    <tr >
      <td >AÑOS/SEXO</td><td style="color: red;" >HEMBRAS</td><td style="color: blue;">VARONES</td><td>TOTAL</td>
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
	
	
	
	echo "<tr >";
	echo "<td>".$anno."</td>";
	echo "<td>".sprintf('%01d', $total[$x][1])."</td>";
	echo "<td>".sprintf('%01d', $total[$x][2])."</td>";
	echo "<td>".sprintf('%01d',$totalsexo[$x])."</td>";
	echo "</tr>";
	
}
?>
    <tr bgcolor="#0099CC" style="color: white; ">
        <td>TOTALES</td><td><?php echo $totalf?></td><td><?php echo $totalm?></td> <td><?php echo $totaltotal?></td>
      </tr>
    </table>
  </div>
  <?php
 // INCLUIMOS EL pie de pagina

include "pie.php";

