<?php

// en este archivo se construira tolo lo referente al mantenimiento de información
// es decir, INGRESAR, MODIFICAR, EGRESAR, Y ELIMINAR ESTUDIANTES
session_start ();
include "conexion/conexion.php";


//recuperar variable de operaciones

$xoperacion1 = $_REQUEST [operacion];
$xoperacion = base64_decode ($xoperacion1);


//**************************************************************





$xperiodoescolar = trim ( $_SESSION ["session_periodoescolar"] );

$ficha = trim ( $_POST ["ficha"] );

$usuario = $_SESSION ["session_nombre"];

$periodo_anterior = trim ( $_POST ["periodo_anterior"] );
$xcedulaest = trim ( $_POST ["TextCedulaEst"] );

// para almacenar el codigo de ingresados
$xid_ingreso = trim ($xperiodoescolar . '-' . $xcedulaest . 'I');




// pasar los valores de campos a variables

//******DATOS DEL ESTUDIANTE**********


$xapellidosest = trim ( $_POST ["TextApellidosEst"] );
$xnombresest = trim ( $_POST ["TextNombresEst"] );
 $xsexo = trim ( $_POST ["ComboSexo"] );
 $xlateralidad = trim ( $_POST ["Combolateralidad"] );



$xfn1 = trim ( $_POST ["fecha_nac"] );

$xfn = date("Y-m-d", strtotime($xfn1));


$xedad = trim ( $_POST ["edad"] );

$xordenNac = $_POST ["TextOrdenNacimiento"];
$xEstadoNac = $_POST ["ComboEstadoN"];

$xlugarnacimiento = $_POST ["TextLugarNacimiento"];

$xEstadoCivil = $_POST ["ComboCivil"];


$xmp = trim ( $_POST ["ComboMp"] );

// *** ESTABLECER LA CONDICION DEL ESTUDIANTE REGULAR, REZAGADO, REPITIENTE
$xcondicion = trim ( $_POST ["ComboCondicion"] );

if ($xcondicion == "REGULAR") {
	$REZAGADO = "NO";
	$REPITIENTE = "NO";
	$NUEVO ="NO";
}

if ($xcondicion == "REPITIENTE DE LA INST") {
	$REZAGADO = "NO";
	$REPITIENTE = "SI";
	$NUEVO ="NO";
}

if ($xcondicion == "REPITIENTE OTRA INST") {
	$REZAGADO = "NO";
	$REPITIENTE = "SI";
	$NUEVO ="SI";
}



if ($xcondicion == "REZAGADO") {
	$REZAGADO = "SI";
	$REPITIENTE = "NO";
	$NUEVO ="NO";
}

if ($xcondicion == "NUEVO ING") {
	$REZAGADO = "NO";
	$REPITIENTE = "NO";
	$NUEVO ="SI";

}

// ******************************************

$xanoestudio = trim ( $_POST ["Comboanoest"] );
$xseccion = trim ( $_POST ["TextSeccion"] );


//***Datos y Ubicación Domiciliaria del Estudiante**

$xtipovia = $_POST ["ComboTipoVia"];
$xdireccionest = $_POST ["TextDireccionEst"];// bd estudiante
$xzonaubicacion = $_POST ["Comboubicacion"];
$xtipovivienda = $_POST ["ComboVivienda"];
$xubicacionvivienda = $_POST ["ComboViviendaU"];
$xcondicionvivienda = $_POST ["ComboCondicionVivienda"];
$xcondicioninfraestuctura = $_POST ["ComboInfraestructura"];

// ** OTROS DATOS DEL ESTUDIANTE

$xemailest = $_POST ["TextEmailEst"];

$xprocedencia = $_POST ["TextProcedencia"];
$xobservaciones = $_POST ["TextObservacion"];

// VARIABLES QUE ACUMULAN LOS DOCUMENTOS HA ENTREGAR
// SI LAS VARIABLES ESTAN EN "on" ES QUE LOS CHECK FUERON ACTIVADOS

$xcheckPn = $_POST ["checkPn"];

if ($xcheckPn == "on") {

	$xpn = "SI";
} else {
	$xpn = "NO";
}

$checkFotos = $_POST ["checkFotos"];

if ($checkFotos == "on") {
	$xfotos = "SI";
} else {
	$xfotos = "NO";
}

$checkciest = $_POST ["checkciest"];
if ($checkciest == "on") {
	$xcedE = "SI";
} else {
	$xcedE = "NO";
}

$checkcirep = $_POST ["checkcirep"];
if ($checkcirep == "on") {
	$xcedR = "SI";
} else {
	$xcedR = "NO";
}

$checknotas = $_POST ["checknotas"];

if ($checknotas == "on") {

	$xnotas = "SI";
} else {
	$xnotas = "NO";
}

$checkcarnet = $_POST ["checkcarnet"];
if ($checkcarnet == "on") {
	$xcarnet = "SI";
} else {
	$xcarnet = "NO";
}

$checkpasaporte = $_POST ["checkpasaporte"];
if ($checkpasaporte == "on") {
	$xpasaporte = "SI";
} else {
	$xpasaporte = "NO";
}

$checkcoleccion = $_POST ["checkcoleccion"];
if ($checkcoleccion == "on") {
	$xcoleccion = "SI";
} else {
	$xcoleccion = "NO";
}

$checkbecado = $_POST ["checkbecado"];
if ($checkbecado == "on") {
	$xbecado = "SI";
} else {
	$xbecado = "NO";
}

$checklopnna = $_POST ["checklopnna"];

if (($xparentesco == "MADRE") || ($xparentesco == "PADRE")) {

	$xpermiso = "NR";
} else {

	if ($checklopnna == "on") {
		$xpermiso = "SI";
	} else {
		$xpermiso = "NO";
	}
}

$checkcanaima = $_POST ["checkcanaima"];

if ($checkcanaima == "on") {

	$xcanaima = "SI";
	$xcanaimafunciona = $_POST ["ComboFunciona"];
	$xcanaimacodigo = $_POST ["TextCodigoCanaima"];
} else {
	$xcanaima = "NO";
	$xcanaimafunciona = "NR";
	$xcanaimacodigo = "NR";
}

// variables de las tallas del estudiante

$xaltura = $_POST ["textaltura"];
$xpeso = $_POST ["textpeso"];
$xpantalon = $_POST ["textpantalon"];
$xcamisa = $_POST ["textcamisa"];
$xzapatos = $_POST ["textzapato"];




// VARIABLES QUE ACUMULAN LOS DATOS DE LOS REPRESENTANTE

$xcedularep = trim ( $_POST ["TextCedulaRep"] );
$xapellidosrep = trim ( $_POST ["TextApellidosRep"] );
$xnombresrep = trim ( $_POST ["TextNombresRep"] );
$xparentesco = trim ( $_POST ["ComboParentesco"] );
$xsexorep = trim ( $_POST ["ComboSexoR"] );

$xemailrep = trim ( $_POST ["TextEmailRep"] );
$xtelefonos = trim ( $_POST ["TextTelefonos"] );
$xtrabajas = trim ( $_POST ["ComboTrabaja"] );
$xtrabajasdode = trim ( $_POST ["TextDonde"] );
$xsueldo = trim ( $_POST ["ComboSueldo"] );
$xdireccionrep = trim ( $_POST ["TextDireccionRep"] );



$xfechaIE = trim ( $_POST ["DateFnIE"] );

// *** para saber el mes del INGRESO O EGRESO

// $valormes1=substr($xfechaIE, 5, 2); // con la funcion substr estraemos valor de la fecha
// echo"<br>"    ;

$xfIE = date ( "Y/m/d", strtotime ( $xfechaIE ) );

$valorF = explode ( "/", $xfIE );

$valormes1 = $valorF [1]; // Y/m/d [0] = año [1]= mes [2]= dia

if ($valormes1 == '01') {

	$valormes = "ENERO";
}

if ($valormes1 == "02") {

	$valormes = "FEBRERO";
}

if ($valormes1 == "03") {

	$valormes = "MARZO";
}

if ($valormes1 == "04") {

	$valormes = "ABRIL";
}

if ($valormes1 == "05") {

	$valormes = "MAYO";
}
if ($valormes1 == "06") {

	$valormes = "JUNIO";
}

if ($valormes1 == "07") {

	$valormes = "JULIO";
}

if ($valormes1 == "08") {

	$valormes = "AGOSTO";
}

if ($valormes1 == "09") {

	$valormes = "SEPTIEMBRE";
}

if ($valormes1 == "10") {

	$valormes = "OCTUBRE";
}

if ($valormes1 == "11") {

	$valormes = "NOVIEMBRE";
}

if ($valormes1 == "12") {

	$valormes = "DICIEMBRE";
}



// operaciones


if ($xoperacion=="ingresar") {

include'ingresos_egresos_operaciones_ingresar.php';

}

if ($xoperacion=="modificar") {

include'ingresos_egresos_operaciones_modificar.php';

}




?>




<form action="materiaPendiente_Repitiente.php" name="form1" method="POST">

<input type='hidden' name="mensaje" id="mensaje" value='<?php echo $MENSAJE;?>'>

<input type='hidden' name="mp" id="mp" value='<?php echo $xmp;?>'>
<input type='hidden' name="condicion" id="condicion" value='<?php echo $xcondicion;?>'>
<input type='hidden' name="ci" id="ci" value="<?php echo $xcedulaest;?>">
<input type='hidden' name="id" id='id' value='<?php echo $xid_ingreso;?>'>
<input type='hidden' name="anoest" id='anoest' value='<?php echo $xanoestudio;?>'>

</form>
;



<?php

if (($xmp=="SI")  || ($xcondicion == "REPITIENTE DE LA INST") || ($xcondicion == "REPITIENTE OTRA INST") ) {
 //header ( "Location: materiaPendiente_Repitiente.php" );

  echo "<script type='text/javascript'>
  document.form1.submit()
  </script>";



} else {
	# code...
}




include 'principal.php';

echo "<script type='text/javascript'>

var mensaje = $('#mensaje').attr('value');
alert(''+mensaje.toUpperCase());
javascript: consultar_estudiante();

    </script>";
exit ();
