   <?php
			// modulo para llenar los datos de los docenes
			include 'encabezado.php';
			
			?>

<!-- ARCHIVO .CCS EN DONDE SE GUARDA LA CONFIGURACION DE ESTILO DE OBJETOS   ESTA LA LA CARPETA CSS-->
<link rel="stylesheet" href="css/estilo_formato.css">
<br>
<h2 style="text-align: center">INFORMACIÓN DEL DOCENTES</h2>
<br>
<div
	style="width: auto; height: auto; line-height: 2em; text-align: left; font-size: 16px">

	<b>APELLIDOS:</b><input class="formato" type="text"
		name="apellidosdocentes" id="apellidosdocentes">&nbsp;&nbsp;&nbsp; <b>NOMBRES:</b><input
		class="formato" type="text" name="nombresdocentes"
		id="nombresdocentes">&nbsp;&nbsp;&nbsp; <b>SEXO:</b><select
		class="formato" name="sexoedocentes" id="sexodocentes">
		<option value="N/A">N/A</option>
		<option value="F">FEMENINO</option>
		<option value="M">MASCULINO</option>
	</select> <br> <b>STATUS:</b><select class="formato"
		name="statusdocentes" id="statusdocentes">
		<option value="N/A">N/A</option>
		<option value="ACTIVOS">ACTIVOS</option>
		<option value="JUBILADO">JUBILADO</option>
	</select>&nbsp;&nbsp;&nbsp; <b>TELEFONOS:</b><input class="formato"
		type="text" name="telefonosdocentes" id="telefonosdocentes">&nbsp;&nbsp;&nbsp;
	<b>E-MAIL:</b><input class="formato" type="text" name="emaildocentes"
		id="emaildocentes"> <br> <b>DIRECCIÓN:</b><input class="formato"
		type="text" name="direcciondocentes" id="direcciondocentes">&nbsp;&nbsp;&nbsp;

	<b>NIVEL ACADEMICO:</b><select class="formato" name="niveldocentes"
		id="niveldocentes">
		<option value="N/A">N/A</option>
		<option value="NG">NO GRADUADO</option>
		<option value="LIC">LICENCIADO(A)</option>
		<option value="PROF">PROFESOR(A)</option>
		<option value="TSU">TSU EDUCACION</option>
	</select> &nbsp;&nbsp;&nbsp; <br> <b>CODIGO:</b><input class="formato"
		type="text" name="codigodocentes" id="codigodocentes">&nbsp;&nbsp;&nbsp;




	<b>TITULO DE PRE GRADO:</b><input class="formato" type="text"
		name="pregradodocentes" id="pregradodocentes"> <br> <b>CONDICION
		INTEGRA:</b><select class="formato" name="integraldocentes"
		id="integraldocentes">
		<option value="N/A">N/A</option>
		<option value="NO">NO</option>
		<option value="SI">SI</option>

	</select>&nbsp;&nbsp;&nbsp; <b>MENCIÓN PRE GRADO:</b><select
		class="formato" name="menciondocentes" id="menciondocentes">
		<option value="N/A">N/A</option>
		<option value="NINGUNA">NINGUNA</option>
		<option>LENGUA Y LITERATURA</option>
		<option>CS BIOLOGICAS</option>
		<option>MATEMATICA</option>
		<option>IDIOMA EXTRANJERO</option>
		<option>INGLES</option>
		<option>CS SOCIALES</option>
		<option>TECNICA MERCANTIL</option>
		<option>EPT</option>

	</select> <br> <b>TITULO DE ESPECIALIZACION:</b><input class="formato"
		type="text" name="especializaciondodocentes"
		id="especializaciondodocentes">&nbsp;&nbsp;&nbsp; <b>TITULO DE
		MAESTRIA:</b><input class="formato" type="text"
		name="maestriadodocentes" id="maestriadodocentes"> <br> <b>TITULO DE
		DOCTORADO:</b><input class="formato" type="text"
		name="doctoradododocentes" id="doctoradondodocentes">&nbsp;&nbsp;&nbsp;
	<b>OTROS ESTUDIOS:</b><input class="formato" type="text"
		name="otrosestudiosdocentes" id="otrosestudiosdocentes"> <br> <b>FECHA
		INGRESO AL MPPE:</b><input class="formato" type="date"
		name="ingresodocentes" id="ingresodocentes">&nbsp;&nbsp;&nbsp; <b>FECHA
		INGRESO A LA INST:</b><input class="formato" type="date"
		name="ingresoinstdocentes" id="ingresoinstdocentes">

</div>

<?php

include 'pie.php';