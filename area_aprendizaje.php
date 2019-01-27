<?php

// completa las materias segun el area de aprendizaje
$rpta = "";

if ($_POST ["elegido"] == "CASTELLANO") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
	<option value="CAST">Castellano</option>
			
        	';
}

if ($_POST ["elegido"] == "LENGUAS EXTRANJERAS") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
			<option value="ING">Ingles</option>
			
        	';
}

if ($_POST ["elegido"] == "MEMORIA TERRITORIO Y CIUDADANIA") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
			<option value="MTC">MTC</option>
			
        	';
}


if ($_POST ["elegido"] == "ARTE Y PATRIMONIO") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
			<option value="AP">Arte y Patrimonio</option>
			
        	';
}


if ($_POST ["elegido"] == "MATEMATICAS") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>
			<option value="MAT">Matematicas</option>
			
        	';
}





if ($_POST ["elegido"] == "CIENCIAS NATURALES") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>	
<option value="CS_NAT">Cs Naturales</option>
	<option value="EST_NAT">Estudio de la Naturaleza</option>
	<option value="BIO">Cs Biologicas</option>
	<option value="SALUD">Educ. Salud</option>
	<option value="QUIM">Química</option>
	
        	';
}



if ($_POST ["elegido"] == "CIENCIAS SOCIALES E IDENTIDAD") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>	
	<option value="HV">Historia de Venezuela</option>
	<option value="HC">Historia Comtemporanea</option>
	<option value="CATEDRA">Catedra Bolivariana</option>
	<option value="GG">Geografia General</option>
	<option value="GV">Geografia de Venezuela</option>
	<option value="CS_TiERRA">Ciencia de la Tierra</option>
	<option value="GE">Geografia Economica</option>
	<option value="ARTISTICA">Educ. Artistica</option>
	<option value="EFC">Educ.Familiar y Ciudadana</option>
	<option value="PREMILITAR">Instrucción Premilitar</option>
	
        	';
}


if ($_POST ["elegido"] == "EDUCACIÓN FÍSICA, DEPORTE Y RECREACIÓN") {
	$rpta = '
	<option value="Seleccionar">Seleccionar</option>	
	<option value="ED_FIS">Educ Fisica</option>
	
        	';
}

echo $rpta;

?>