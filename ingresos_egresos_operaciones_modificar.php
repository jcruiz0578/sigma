<?php

// modulo  modificar  datos de los estudiantes




// ******

// * verificar si los datos del estudiante se han ingresado anteriormente
// * si no, se almacenan en la bd estudiantes

$consulta = "SELECT  cedulaest  FROM estudiantes where cedulaest= '$xcedulaest' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );

if  ($row = $result_consulta->fetch_array ()) {
	
		// si el estudiante se encuentra registrado
	// se procede ha realizar la actualizacion de solo los datos del estudinte
	$update = "UPDATE estudiantes SET apellidosest = '$xapellidosest', nombresest = '$xnombresest',  sexoest = '$xsexo', fnest = '$xfn', lugar_nac='$xlugarnacimiento',
	direccionest = '$xdireccionest', telefonosest = '$xtelefonos', emailest = '$xemailest', procedencia = '$xprocedencia' , lateralidad= '$xlateralidad',  orden_nac = '$xordenNac', estado_nac='$xEstadoNac', estado_civil = '$xEstadoCivil' Where cedulaest = '$xcedulaest' ";
	$conexion->query ( $update );
}

// * verificar si los datos del representante se han ingresado anteriormente
// * si no, se almacenan en la bd representante

$consulta = "SELECT  cedularep  FROM representantes where cedularep= '$xcedularep' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );

if ($row = $result_consulta->fetch_array ()) {
	
	
	// si el representante se encuentra registrado
	// se procede ha realizar la actualizacion
	$update = "UPDATE representantes  SET apellidosrep = '$xapellidosrep', nombresrep = '$xnombresrep',  parentescorep = '$xparentesco',   direccionrep = '$xdireccionrep', telefonosrep = '$xtelefonos', emailrep = '$xemailrep', trabaja = '$xtrabajas', lugartrabajo= '$xtrabajasdode', sueldo = '$xsueldo' sexorep = '$xsexorep' Where cedularep = '$xcedularep' ";
	$conexion->query ( $update );



}



// modificar datos en la tabla ingresos

$update = "UPDATE ingresos SET periodoescolar='$xperiodoescolar',cedulaest='$xcedulaest',repitienteest='$REPITIENTE',materiapendiente='$xmp',rezagado='$REZAGADO',nuevo_ingreso='$NUEVO',anoest='$xanoestudio',seccion='$xseccion',cedularep='$xcedularep',observacion='$xobservaciones',procedencia='$xprocedencia', ficha='$ficha' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );




// MODIFICAR datos en la tabla documentos

$update = "UPDATE documentos SET dpartida='$xpn',dfotos='$xfotos',dcedularep='$xcedR',dcedulaest='$xcedE',dnotas_certifi='$xnotas',dcarnet='$xcarnet',dpasaporte_alimentario='$xpasaporte',dcoleccionbicentenaria='$xcoleccion',becas='$xbecado',permisolopnna='$xpermiso',canaima='$xcanaima',canaima_funciona='$xcanaimafunciona',serial_canaima='$xcanaimacodigo'  Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );



if (($xcondicion == "REGULAR") || ($xcondicion == "REPITIENTE DE LA INST") || ($xcondicion == "REPITIENTE OTRA INST") || ($xcondicion == "NUEVO ING")) {
	
	$CASTELLANO = "C";
	$INGLES = "C";
	$MATEMATICA = "C";
	$EN_BIOLOGIA = "C";
	$HV = "C";
	$EF = "C";
	$HC = "C";
	$GV = "C";
	$GG = "C";
	$EART = "C";
	$EDFISICA = "C";
	$EPT = "C";
	$EDSALUD = "C";
	$HU = "C";
	$FISICA = "C";
	$QUIMICA = "C";
	$DIBUJO = "C";
	$FILOSOFIA = "C";
	$FRANCES = "C";
	$HISTART = "C";
	$SOCIOLOGIA = "C";
	$CSTIERRA = "C";
	$GEOECONOMICA = "C";
	$PREMILITAR = "C";
} else {
	
	$CASTELLANO = "RZ";
	$INGLES = "RZ";
	$MATEMATICA = "RZ";
	$EN_BIOLOGIA = "RZ";
	$HV = "RZ";
	$EF = "RZ";
	$HC = "RZ";
	$GV = "RZ";
	$GG = "RZ";
	$EART = "RZ";
	$EDFISICA = "RZ";
	$EPT = "RZ";
	$EDSALUD = "RZ";
	$HU = "RZ";
	$FISICA = "RZ";
	$QUIMICA = "RZ";
	$DIBUJO = "RZ";
	$FILOSOFIA = "RZ";
	$FRANCES = "RZ";
	$HISTART = "RZ";
	$SOCIOLOGIA = "RZ";
	$CSTIERRA = "RZ";
	$GEOECONOMICA = "RZ";
	$PREMILITAR = "RZ";
}

// ** se ingresaran los valores de las materias cursadas
// en primera instancias se agregaran como materias en curso
// luego se modificaran si es repitiente o si tienen materia pendiente

$update = "UPDATE materias_nominas SET castellano='$CASTELLANO',ingles='$INGLES',matematica='$MATEMATICA',en_biologia='$EN_BIOLOGIA',hv='$HV',ef='$EF',hc='$HC',gv='$GV',gg='$GG',eart='$EART',edfisica='$EDFISICA',ept='$EPT',edsalud='$EDSALUD',hu='$HU',fisica='$FISICA',quimica='$QUIMICA',dibujo='$DIBUJO',filosofia='$FILOSOFIA',frances='$FRANCES',histart='$HISTART',sociologia='$SOCIOLOGIA',cstierra='$CSTIERRA',premilitar='$PREMILITAR',geogeconomica='$GEOECONOMICA' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );






//*** MODIFICAR los datos de la vivienda

	$update = "UPDATE vivienda SET tipovia='$xtipovia',direccion='$xdireccionrep',zonaubicacion='$xzonaubicacion',tipovivienda='$xtipovivienda',ubicacionvivienda='$xubicacionvivienda',condicionvivienda='$xcondicionvivienda',infraestructura='$xcondicioninfraestuctura' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );




// se modifican los datos de las tallas

$update = "UPDATE tallas SET altura='$xaltura',peso='$xpeso',pantalon='$xpantalon',camisa='$xcamisa',zapatos='$xzapatos' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );



// si



// aqui el mensaje que saldra al estar cargado el registro
// la variable MENSAJE contiene el contenido del mensaje que queremos, declarado arriba

$MENSAJE = "EL REGISTRO FUE MODIFICADO CORRECTAMENTE.....  ";




