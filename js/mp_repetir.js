	
//VALIDAR LOS ELEMENTOS QUE VAN A ESTAR OCULTOS AL INICIAR
	$(document).ready(function () {
	

	$("#mp").hide(); // OCULTA EL DIV REFERENTE A LO DEL TRABAJO
	$("#repite").hide(); // OCULTA EL DIV REFERENTE A LO DE CANAIMA

	



	})



	function visualizar(){

	var mp = $("#xmp").attr('value');
	var condicion = $("#xcondicion").attr('value');
	
	if (mp=="SI") {
	$("#mp").show();
	} else{
	$("#mp").hide();	
	}



	if (condicion=="REPITIENTE") {
	$("#repite").show();
	} else{
	$("#repite").hide();	
	}
	
	
// validar materias activas

var ae = $("#anoest").attr('value');

if (ae=="1ER AÑO") {
	

	
	document.getElementById('checkHC').disabled=true;
	
	document.getElementById('checkGV').disabled=true;
	document.getElementById('checkEDSALUD').disabled=true;
	document.getElementById('checkHU').disabled=true;
	document.getElementById('checkDIBUJO').disabled=true;
	document.getElementById('checkFILOSOFIA').disabled=true;   
	document.getElementById('checkFRANCES').disabled=true;
	document.getElementById('checkHISTART').disabled=true;
	document.getElementById('checkSOCIOLOGIA').disabled=true;
	document.getElementById('checkLATIN').disabled=true;
	document.getElementById('checkCSTIERRA').disabled=true;
	document.getElementById('checkGEOECONOMICA').disabled=true;
	document.getElementById('checkPREMILITAR').disabled=true;
	document.getElementById('checkFISICA').disabled=true;
	document.getElementById('checkQUIMICA').disabled=true;




}





if (ae=="2DO AÑO") {
	

	document.getElementById('checkEF').disabled=true;
	document.getElementById('checkHC').disabled=true;
	
	document.getElementById('checkGV').disabled=true;
	
	document.getElementById('checkDIBUJO').disabled=true;
	document.getElementById('checkFILOSOFIA').disabled=true;   
	document.getElementById('checkFRANCES').disabled=true;
	document.getElementById('checkHISTART').disabled=true;
	document.getElementById('checkSOCIOLOGIA').disabled=true;
	document.getElementById('checkLATIN').disabled=true;
	document.getElementById('checkCSTIERRA').disabled=true;
	document.getElementById('checkGEOECONOMICA').disabled=true;
	document.getElementById('checkPREMILITAR').disabled=true;
	document.getElementById('checkFISICA').disabled=true;
	document.getElementById('checkQUIMICA').disabled=true;


}



if (ae=="3ER AÑO") {
	

	document.getElementById('checkEF').disabled=true;
	document.getElementById('checkHC').disabled=true;
	document.getElementById('checkHU').disabled=true;
	document.getElementById('checkGG').disabled=true;
	document.getElementById('checkEART').disabled=true;
	document.getElementById('checkEDSALUD').disabled=true;
	document.getElementById('checkDIBUJO').disabled=true;
	document.getElementById('checkFILOSOFIA').disabled=true;   
	document.getElementById('checkFRANCES').disabled=true;
	document.getElementById('checkHISTART').disabled=true;
	document.getElementById('checkSOCIOLOGIA').disabled=true;
	document.getElementById('checkLATIN').disabled=true;
	document.getElementById('checkCSTIERRA').disabled=true;
	document.getElementById('checkGEOECONOMICA').disabled=true;
	document.getElementById('checkPREMILITAR').disabled=true;




}





if (ae=="4TO AÑO CS") {
	

	document.getElementById('checkEF').disabled=true;
	document.getElementById('checkHV').disabled=true;
	document.getElementById('checkHU').disabled=true;
	document.getElementById('checkGG').disabled=true;
	document.getElementById('checkGV').disabled=true;
	document.getElementById('checkEART').disabled=true;
	document.getElementById('checkEDSALUD').disabled=true;
	
	document.getElementById('checkEPT').disabled=true;   
	
	document.getElementById('checkFRANCES').disabled=true;
	document.getElementById('checkHISTART').disabled=true;
	document.getElementById('checkSOCIOLOGIA').disabled=true;
	document.getElementById('checkLATIN').disabled=true;
	document.getElementById('checkCSTIERRA').disabled=true;
	document.getElementById('checkGEOECONOMICA').disabled=true;




}




if (ae=="5TO AÑO CS") {
	

	document.getElementById('checkEF').disabled=true;
	document.getElementById('checkHV').disabled=true;
	document.getElementById('checkHU').disabled=true;
	document.getElementById('checkGG').disabled=true;
	document.getElementById('checkGV').disabled=true;
	document.getElementById('checkEART').disabled=true;
	document.getElementById('checkEDSALUD').disabled=true;
	document.getElementById('checkDIBUJO').disabled=true;
	document.getElementById('checkEPT').disabled=true;   
	document.getElementById('checkFILOSOFIA').disabled=true;   
	document.getElementById('checkFRANCES').disabled=true;
	document.getElementById('checkHISTART').disabled=true;
	document.getElementById('checkSOCIOLOGIA').disabled=true;
	document.getElementById('checkLATIN').disabled=true;



}

    

	}


	


	function validar_combos_materias(){
	// para saber si los periodos escolares son iguales o no para proceder

	var combo1 = $("#Combo1").attr('value');
	var combo2 = $("#Combo2").attr('value');


	if (combo1 == combo2) {
	alert("ESTA MATERIA YA FUE SELECCIONADA..");
	//document.forms[0].Combo2.value = 'N/A';
	document.getElementById("Combo2").value="N/A";
	document.getElementById('Combo2').focus();
	return false;

	}

	}







