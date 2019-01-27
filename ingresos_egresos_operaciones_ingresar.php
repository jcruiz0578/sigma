<?php

// modulo para el ingreso de datos de los estudiantes



/* validar si elestudiante ya fue ingresado */




$consulta = "SELECT  id_ingreso   FROM ingresos where id_ingreso= '$xid_ingreso' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );


if ($row = $result_consulta->fetch_array ()) {

  include 'principal.php';

  echo "<script type='text/javascript'>
  alert('Este estudiante ya esta ingresado en Este Periodo Escolar');
  javascript: consultar_estudiante();
  </script>";
  exit ();

}


// ******

// * verificar si los datos del estudiante se han ingresado anteriormente
// * si no, se almacenan en la bd estudiantes

$consulta = "SELECT  cedulaest  FROM estudiantes where cedulaest= '$xcedulaest' "; // sentencia sql
$result_consulta = $conexion->query ( $consulta );

if (! ($row = $result_consulta->fetch_array ())) {

  $insertar = "INSERT into estudiantes (cedulaest, apellidosest, nombresest, sexoest, fnest,lugar_nac, direccionest, emailest, procedencia , telefonosest, lateralidad, orden_nac, estado_nac, estado_civil)
  VALUES ('$xcedulaest', '$xapellidosest', '$xnombresest', '$xsexo' ,'$xfn', '$xlugarnacimiento', '$xdireccionest', '$xemailest', '$xprocedencia', '$xtelefonos', '$xlateralidad', '$xordenNac', '$xEstadoNac', '$xEstadoCivil')";
  $result = $conexion->query ( $insertar ) or die  ( 'La Insercion fall&oacute;: ' . $insertar . mysqli_error($conexion) );
} else {

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

if (! ($row = $result_consulta->fetch_array ())) {

  $insertar_representantes = "INSERT into representantes (cedularep, apellidosrep, nombresrep, parentescorep, direccionrep, telefonosrep, emailrep, trabaja, lugartrabajo, sueldo, sexorep )
  VALUES ('$xcedularep', '$xapellidosrep', '$xnombresrep', '$xparentesco' ,'$xdireccionrep', '$xtelefonos', '$xemailrep', '$xtrabajas', '$xtrabajasdode', '$xsueldo', '$xsexorep')";
  $result_representantes = $conexion->query ( $insertar_representantes ) or die ( "La insercion fall&oacute;: ' .$insertar_representantes . mysql_error () " );
} else {

  // si el representante se encuentra registrado
  // se procede ha realizar la actualizacion
  $update = "UPDATE representantes  SET apellidosrep = '$xapellidosrep', nombresrep = '$xnombresrep',  parentescorep = '$xparentesco',   direccionrep = '$xdireccionrep', telefonosrep = '$xtelefonos', emailrep = '$xemailrep', trabaja = '$xtrabajas', lugartrabajo= '$xtrabajasdode', sueldo = '$xsueldo' sexorep = '$xsexorep' Where cedularep = '$xcedularep' ";
  $conexion->query ( $update );



}

// ** comprobar si la inscripcion se realiza dentro de loestablecido a la inscripcion inicial
if (($valormes == "JULIO") || ($valormes == "AGOSTO") || ($valormes == "SEPTIEMBRE") || ($valormes == "OCTUBRE")) {

  $VTIPOINSCRIPCION = "INICIAL";
  $MENSAJE = "EL ESTUDIANTE  FUE INGRESADO CORRECTAMENTE EN EL PERIODO REGULAR(INICIAL) ";
} else {
  $VTIPOINSCRIPCION = "REGULAR";
  $MENSAJE = "EL ESTUDIANTE  FUE INGRESADOS CORRECTAMENTE  COMO NUEVO INGRESO";
}

// variable que acumula la fecha actual para almacenar que dia real se hizo el proceso por sistema

$FECHAINSCRIPCIONSISTEMA = date ( 'Y/m/d' );

// ingresar datos en la tabla ingresos

$insertar = "INSERT INTO ingresos (id_ingreso, periodoescolar, cedulaest, repitienteest, materiapendiente, rezagado, nuevo_ingreso, anoest, seccion, cedularep, fecha_ingreso, mes_ingreso, fechasistema,  tipoinscripcion, status, observacion, inscriptor, ficha, procedencia)
VALUES ('$xid_ingreso', '$xperiodoescolar', '$xcedulaest', '$REPITIENTE', '$xmp', '$REZAGADO', '$NUEVO', '$xanoestudio', 'N/A', '$xcedularep', '$xfIE', '$valormes', '$FECHAINSCRIPCIONSISTEMA', '$VTIPOINSCRIPCION', 'I', '$xobservaciones', '$usuario', '$ficha', '$xprocedencia' )";
$result = $conexion->query ( $insertar ) or die ( 'La Insercion fall&oacute;: ' . $insertar . mysqli_error($conexion) );

// ingresar datos en la tabla documentos

$insertar = "INSERT INTO documentos(id_ingreso, dpartida, dfotos, dcedularep, dcedulaest, dnotas_certifi, dcarnet, dpasaporte_alimentario, dcoleccionbicentenaria, becas, permisolopnna, canaima, canaima_funciona, serial_canaima)
VALUES ('$xid_ingreso', '$xpn', '$xfotos', '$xcedR', '$xcedE', '$xnotas', '$xcarnet', '$xpasaporte', '$xcoleccion', '$xbecado', '$xpermiso', '$xcanaima','$xcanaimafunciona', '$xcanaimacodigo' )";
$result = $conexion->query ( $insertar ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );

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

$insertar_materias_nominas = "INSERT INTO materias_nominas(id_ingreso, castellano, ingles, matematica, en_biologia, hv, ef, hc, gv, gg, eart, edfisica, ept, edsalud, hu, fisica, quimica, dibujo, filosofia, frances, histart, sociologia, cstierra, geogeconomica, premilitar)
VALUES ('$xid_ingreso', '$CASTELLANO', '$INGLES', '$MATEMATICA', '$EN_BIOLOGIA', '$HV', '$EF', '$HC', '$GV', '$GG', '$EART', '$EDFISICA', '$EPT', '$EDSALUD', '$HU', '$FISICA', '$QUIMICA', '$DIBUJO','$FILOSOFIA', '$FRANCES', '$HISTART', '$SOCIOLOGIA', '$CSTIERRA', '$GEOECONOMICA',  '$PREMILITAR' )";
$result_materias_nominas = $conexion->query ( $insertar_materias_nominas ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar_materias_nominas" );


//*** introdicir los datos de la vivienda




$insertar_vivienda = "INSERT into vivienda (id_ingreso, tipovia, direccion, zonaubicacion, tipovivienda, ubicacionvivienda, condicionvivienda, infraestructura)
VALUES ('$xid_ingreso', '$xtipovia', '$xdireccionrep', '$xzonaubicacion', '$xtipovivienda', '$xubicacionvivienda', '$xcondicionvivienda', '$xcondicioninfraestuctura')";
$result_vivienda = $conexion->query ($insertar_vivienda) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar_vivienda" );
//*****************************************







// se ingresaran los datos de las tallas

$insertar = "INSERT INTO tallas(id_ingreso, altura, peso, pantalon, camisa, zapatos)
VALUES ('$xid_ingreso', '$xaltura', '$xpeso', '$xpantalon', '$xcamisa', '$xzapatos')";
$result = $conexion->query ( $insertar ) or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );

// aqui el mensaje que saldra al estar cargado el registro
// la variable MENSAJE contiene el contenido del mensaje que queremos, declarado arriba
