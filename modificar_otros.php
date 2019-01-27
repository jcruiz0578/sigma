<?php

// ESTE MODULO SE UTILIZARA PARA MOSTRAR 
// LA VISTA TANTO PARA MODIFICAR
// FECHA DE INGRESO
// FECHA DE EGRESO
// CEDULA DE IDENTIDAD

// ***** ESTOS VALORES QUE PUEDEN SER SIMPLES, PUEDEN OCACIONAR
// CALCULOS ERRONEOS SI LA DATA ES INCORRECTA

  ?>
 
<?php 
include "encabezado.php";

// estas varibles provienen del input ocultos del form  ingreso_egreso.php

$xcedulaest= trim($_REQUEST[TextCedulaEst]);
$xid_ingreso = trim($_REQUEST[id_ingreso]);
$xanoest = trim($_REQUEST[Comboanoest]);

$xfecha_ingreso = trim($_REQUEST[fecha_ingreso]);
$xmes_ingreso = trim($_REQUEST[mes_ingreso]);

 ?> 
 
<div style="height: 60px"></div>


<div id="enc" class="fluid" align="justify" >
<B>C.I:</B><input type="text" class="formato" name="textcedulaest" id="textcedulaest" value="<?php echo $xcedulaest; ?>" style="width:120px" readonly>&nbsp;&nbsp;&nbsp;

<b>ID:</b><input type="text"  class="formato" name="idcodigo" id="idcodigo" value="<?php echo $xid_ingreso; ?>"  style="width:150px" readonly>&nbsp;&nbsp;&nbsp;

<b>Año de Estudio:</b><input type="text"  class="formato" name="anoest" id="anoest" value="<?php echo $xanoest; ?>"  style="width:150px" readonly>&nbsp;&nbsp;
</div>

<div style="height: 60px"></div>

<div id="fi"  align="justify">  

<h3><center>INGRESAR NUEVA FECHA DE INGRESO</center></h3>

<B>Fecha de Ingreso Actual:</B><input type="date" class="formato" name="fia" id="fia" value="<?php echo $xfecha_ingreso; ?>" style="width:auto" readonly><br>

<b>Mes de Ingreso Actual:</b><input type="text"  class="formato" name="mia" id="mia" value="<?php echo $xmes_ingreso; ?>"  style="width:150px" readonly><br>

<br>
<br>
<B><font color="red">Fecha de Ingreso Nueva:</font></B><input type="date" class="formato" name="fin" id="fin" value="<?php echo $xcedulaest; ?>" style="width:auto" ><br>

<b><font color="red">Mes de Ingreso Nueva:</font></b><input type="text"  class="formato" name="min" id="min" value="<?php echo $xid_ingreso; ?>"  style="width:150px" ><br>

</div>



<div id="fe"  align="justify">  

<h3><center>INGRESAR NUEVA FECHA DE EGRESO</center></h3>

<B>Fecha de Egreso Actual:</B><input type="date" class="formato" name="fea" id="fea" value="<?php echo $xcedulaest; ?>" style="width:120px" readonly><br>

<b>Mes de Egreso Actual:</b><input type="text"  class="formato" name="mea" id="mea" value="<?php echo $xid_ingreso; ?>"  style="width:150px" readonly><br>

<br>
<br>
<B><font color="red">Fecha de Egreso Nueva:</font></B><input type="date" class="formato" name="fen" id="fen" value="<?php echo $xcedulaest; ?>" style="width:120px" ><br>

<b><font color="red">Mes de Egreso Nueva:</font></b><input type="text"  class="formato" name="men" id="men" value="<?php echo $xid_ingreso; ?>"  style="width:150px" ><br>

</div>


<div id="botones" class="container-fluid" align="center"
					style="width: auto">


					<button class="formato_boton" name="limpiar" id="limpiar"
						type="reset"
						style='background: url("/imagenes/limpiar.png"); background-repeat: no-repeat; background-position: top;'
						onclick="return limpiar_focus();">LIMPIAR</button>
					&nbsp;

					<button class="formato_boton" name="ingreso" id="ingreso" type="submit"
						style='background: url("/imagenes/Notepad2_48x48-32.gif"); background-repeat: no-repeat; background-position: top;'
						onclick="this.form.action = ' '">ASIGNAR</button>
					&nbsp;
					
					<br /> <br>


					


				</div>


 <?php 
include "pie.php";
 ?> 