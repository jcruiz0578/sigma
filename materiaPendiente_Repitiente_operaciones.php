<?php


session_start ();
include "conexion/conexion.php";


//recuperar variable de operaciones

 $xcondicion = $_REQUEST [xcondicion];
 $xmp = $_REQUEST [xmp];

$xid_ingreso = $_REQUEST [idcodigo];
$xcombo1 = $_REQUEST [Combo1];
$xcombo2 = $_REQUEST [Combo2];
$MENSAJE = $_REQUEST [mensaje];

if ($xcombo2=="N/A") {
	$mp_nombres="$xcombo1";
} else {
	$mp_nombres = $xcombo1.", ".$xcombo2;
}


 $checkCASTELLANO = $_REQUEST[checkCASTELLANO];
 $checkINGLES = $_REQUEST[checkINGLES];
 $checkMATEMATICA =$_REQUEST[checkMATEMATICA];
 $checkCSBIOLOGICAS = $_REQUEST[checkCSBIOLOGICAS];
 $checkHV =$_REQUEST[checkHV];
 $checkEF = $_REQUEST[checkEF];
 $checkHC = $_REQUEST[checkHC];
 $checkGV = $_REQUEST[checkGV];
 $checkGG = $_REQUEST[checkGG];
 $checkEART = $_REQUEST[checkEART];
 $checkEDFISICA = $_REQUEST[checkEDFISICA];
 $checkEPT = $_REQUEST[checkEPT];
 $checkEDSALUD = $_REQUEST[checkEDSALUD];

 $checkHU = $_REQUEST[checkHU];
 $checkFISICA = $_REQUEST[checkFISICA];
 $checkQUIMICA = $_REQUEST[checkQUIMICA];
 $checkDIBUJO = $_REQUEST[checkDIBUJO];
 $checkFILOSOFIA = $_REQUEST[checkFILOSOFIA];
 $checkFRANCES = $_REQUEST[checkFRANCES];
 $checkHISTART = $_REQUEST[checkHISTART];
 $checkSOCIOLOGIA = $_REQUEST[checkSOCIOLOGIA];
 $checkLATIN = $_REQUEST[checkLATIN];
 $checkCSTIERRA = $_REQUEST[checkCSTIERRA];
 $checkGEOECONOMICA = $_REQUEST[checkGEOECONOMICA];
 $checkPREMILITAR = $_REQUEST[checkPREMILITAR];



// CUANDO TIENEN MTERIA PENDIENTE

if ($xmp=="SI") {
	

// modificar datos en la tabla ingresos

$update = "UPDATE ingresos SET mp_nombres='$mp_nombres' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );


}


// CUANDO ES REPITIENTE 


if ( ($xcondicion == "REPITIENTE DE LA INST") || ($xcondicion == "REPITIENTE OTRA INST") ) {
	

if ($checkCASTELLANO =="on") {
	$CASTELLANO = "C";

} else {
		$CASTELLANO = "NC";
}


if ($checkINGLES =="on") {
	$INGLES = "C"; 

} else {
	$INGLES = "NC"; 
}


if ($checkMATEMATICA =="on") {
		$MATEMATICA = "C";
} else {
	$MATEMATICA = "NC";
}

	

if ($checkCSBIOLOGICAS=="on") {
	$EN_BIOLOGIA = "C";
} else {
	$EN_BIOLOGIA = "NC";
}


	
	
if ($checkHV=="on") {
		$HV = "C";
} else {
	$HV = "NC";
}


if ($checkEF=="on") {
$EF = "C";
} else {
$EF = "NC";
}


if ($checkHC=="on") {
	$HC = "C";
} else {
	$HC = "NC";
}


if ($checkGV=="on") {
$GV = "C";
} else {
$GV = "NC";
}


if ($checkGG=="on") {
	$GG = "C";
} else {
	$GG = "NC";
}

	
if ($checkEART=="on") {
		$EART = "C";
	} else {
		$EART = "NC";
	}
		

if ($checkEDFISICA=="on") {
	$EDFISICA = "C";
} else {
	$EDFISICA = "NC";
}


if ($checkEPT=="on") {
	$EPT = "C";
} else {
	$EPT = "NC";
}



if ($checkEDSALUD=="on") {
$EDSALUD = "C";
} else {
$EDSALUD = "NC";
}

	
if ($checkHU=="on") {
	$HU = "C";
	} else {
	$HU = "NC";
	}
		
	
if ($checkFISICA=="on") {
	$FISICA = "C";
	} else {
	$FISICA = "NC";
	}
		
	

if ($checkQUIMICA=="on") {
	$QUIMICA = "C";
} else {
	$QUIMICA = "NC";
}


if ($checkDIBUJO=="on") {
	$DIBUJO = "C";
	} else {
	$DIBUJO = "NC";
	}
		

if ($checkFILOSOFIA=="on") {
	$FILOSOFIA = "C";
	} else {
	$FILOSOFIA = "NC";
	}
		
if ($checkFRANCES=="on") {
	$FRANCES = "C";
	} else {
	$FRANCES = "NC";
	}
		
	
if ($checkHISTART=="on") {
	$HISTART = "C";
	} else {
		$HISTART = "NC";
	}
		


if ($checkSOCIOLOGIA=="on") {
	$SOCIOLOGIA = "C";
	} else {
	$SOCIOLOGIA = "NC";
	}
		

if ($checkCSTIERRA=="on") {
	$CSTIERRA = "C";
} else {
$CSTIERRA = "NC";
}

if ($checkGEOECONOMICA=="on") {
	$GEOECONOMICA = "C";
	} else {
	$GEOECONOMICA = "NC";
	}
		
	


if ($checkPREMILITAR=="on") {
	$PREMILITAR = "C";
	} else {
		$PREMILITAR = "NC";
	}
		
	

$update = "UPDATE materias_nominas SET castellano='$CASTELLANO',ingles='$INGLES',matematica='$MATEMATICA',en_biologia='$EN_BIOLOGIA',hv='$HV',ef='$EF',hc='$HC',gv='$GV',gg='$GG',eart='$EART',edfisica='$EDFISICA',ept='$EPT',edsalud='$EDSALUD',hu='$HU',fisica='$FISICA',quimica='$QUIMICA',dibujo='$DIBUJO',filosofia='$FILOSOFIA',frances='$FRANCES',histart='$HISTART',sociologia='$SOCIOLOGIA',cstierra='$CSTIERRA',premilitar='$PREMILITAR',geogeconomica='$GEOECONOMICA' Where  id_ingreso = '$xid_ingreso' ";
	$conexion->query ( $update )or die ( "LA MODIFICACION DE DATOS A FALLADO:$update" );



	}

	?>

<input type='hidden' name="mensaje" id="mensaje" value='<?php echo $MENSAJE;?>'>

<?php

include 'principal.php';

echo "<script type='text/javascript'>

var mensaje = $('#mensaje').attr('value');
alert(''+mensaje.toUpperCase());
javascript: consultar_estudiante();

    </script>";
exit ();