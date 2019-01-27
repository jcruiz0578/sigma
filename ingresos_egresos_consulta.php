<?php

//session_start ();
//include "conexion/conexion.php";
//$cedula_estudiante = $_SESSION ["cedula_estudiante"];



$registros = "SELECT * FROM ingresos, estudiantes, representantes, documentos  WHERE  ingresos.id_ingreso = '$xid_ingreso' and  estudiantes.cedulaest = '$cedula_estudiante' and representantes.cedularep = ingresos.cedularep  &&  documentos.id_ingreso = '$xid_ingreso' limit 1 ";
// sentencia sql
$result = $conexion->query($registros);

if ($user = $result->fetch_array()) {

    $xrezagado = $user[rezagado];
    $xrepitiente = $user[repitienteest];

    $xfecha_ingreso = $user[fecha_ingreso];
    $xmes_ingreso = $user[mes_ingreso];
    $ficha = $user[ficha];

    if ($xrezagado != null) {

        if ($xrezagado == "SI") {
            $xcondicion = "REZAGADO";
        }
        if ($xrepitiente == "SI") {
            $xcondicion = "REPITIENTE";
        }


        if (($xrepitiente == "NO") and ( $xrezagado == "NO")) {
            $xcondicion = "REGULAR";
        }
    }




//$	periodoescolar_anterior = $user [periodoescolar];

    $apellidosest = $user[apellidosest];
    $nombresest = $user[nombresest];
    $condicion = $xcondicion;
    $sexoest1 = $user[sexoest];
    $lateralidad1 = $user[lateralidad];


    if ($lateralidad1 == "D") {
        $lateralidad = "Derecho(a)";
    } elseif ($lateralidad1 == "Z") {
        $lateralidad = "Zurdo(a)";
    } elseif (($lateralidad1 == null)) {
        $lateralidad = "N/A";
    } else {
        $lateralidad = "Ambidiestro(a)";
    }



    if ($sexoest1 == "F") {
        $sexoest = "Femenino";
    } else {
        $sexoest = "Masculino";
    }


// 	modulo que verifica el tipo de navegador (chrome, firefox, otros)
    include "navegador_detectar.php";

    if ($navegador == "Chrome") {
// 		COMO HASTA LA FECHA SEPTIEMBRE 2016 CHROME ES EL Q SOPORTA INPUT DATE 
// 		ENTONCES LOS DATOS SE PASARAN TAL Y CUAL VIENEN DE LA BD
     echo   $fnest1 = $user[fnest];

// 		fecha que se colocara en la fecha de ingreso/egreso

        $fecha_actual = date('Y-m-d');
    } else {
// 		PARA OTRO EXPLORADOR TOMAMOS LA FECHA Y LA CONVERTIMOS EN FORMATO dd-mm-yyyy
//p		ara que al mostrarla se haga manejable
        $fnest = $user[fnest];
    echo    $fnest1 = date("Y-m-d", strtotime($fnest));

// 		fecha que se colocara en la fecha de ingreso/egreso
        $fecha_actual1 = date('Y-m-d');
        $fecha_actual = date("d-m-Y", strtotime($fecha_actual1));
    }


    $orden_nac = trim($user[orden_nac]);

    $estado_nac = $user[estado_nac];

    $lugar_nac = $user[lugar_nac];

    $estado_civil = $user[estado_civil];


    $mp = $user[materiapendiente];
    $anoest = $user[anoest];
    $seccion = $user[seccion];
    $emailest = $user[emailest];
    $direccionest = $user[direccionest];
    $staus = $user[status];
    $procedencia = $user[procedencia];

    if (($procedencia == "") || ($procedencia == "N/A")) {

//			$procedencia = "L.N.B GRAL EN JEFE JOSE FCO. BERMUDEZ";
    } else {

        $procedencia = $user[procedencia];
    }



    $observacion = $user[observacion];



// 	pasar los datos del representante


    $cedularep = $user[cedularep];
    $apellidosrep = $user[apellidosrep];
    $nombresrep = $user[nombresrep];
    $sexorep1 = $user[sexorep];



    if ($sexorep1 == "F") {
        $sexorep = "Femenino";
    } else {
        $sexorep = "Masculino";
    }



    $parentescorep = $user[parentescorep];


//e	cho "el parentesco es:  ".$parentescorep;

    $telefonosrep = $user[telefonosrep];

    $emailrep = $user[emailrep];
    $trabaja = $user[trabaja];
    $dondetrabaja = $user[lugartrabajo];
    $sueldo = $user[sueldo];
    $direccionrep = $user[direccionrep];
}


// consultar datos de la vivienda

$registros_vivienda = "SELECT * FROM vivienda  WHERE id_ingreso = '$xid_ingreso'  limit 1 ";

$result = $conexion->query($registros_vivienda);

if ($user = $result->fetch_array()) {

    $tipovia = $user[tipovia];
    $direccion = $user[direccion];
    $zonaubicacion = $user[zonaubicacion];
    $tipovivienda = $user[tipovivienda];
    $ubicacionvivienda = $user[ubicacionvivienda];
    $condicionvivienda = $user[condicionvivienda];
    $infraestructura = $user[infraestructura];
}




// CONSULTA  TALLAS


$registros_tallas = "SELECT * FROM tallas  WHERE id_ingreso = '$xid_ingreso'  limit 1 ";
// sentencia sql
$result = $conexion->query($registros_tallas);

if ($user = $result->fetch_array()) {

    $xaltura = $user[altura];
    $xpeso = $user[peso];
    $xpantalon = $user[pantalon];
    $xcamisa = $user[camisa];
    $xzapatos = $user[zapatos];
}









