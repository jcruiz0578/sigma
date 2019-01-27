	function validarNumeros(e) { // 1
	var tecla = (document.all) ? e.keyCode : e.which;
	if (tecla == 8){
	return true; // backspace
	}
	if (tecla == 9){
	return true; // tab
	}
	if (tecla == 109){
	return true; // menos
	}
	if (tecla == 110){
	return true; // punto
	}
	if (tecla == 189){
	return true; // guion
	}
	if (e.ctrlKey && tecla == 86) {
	return true
	} 
	; //Ctrl v
	if (e.ctrlKey && tecla == 67) {
	return true
	}
	; //Ctrl c
	if (e.ctrlKey && tecla == 88) {
	return true
	}
	; //Ctrl x
	if (tecla >= 96 && tecla <= 105) {
	return true;
	} //numpad

	patron = /[0-9]/; // patron

	te = String.fromCharCode(tecla);
	return patron.test(te); // prueba
	}


	//VALIDAR LOS ELEMENTOS QUE VAN A ESTAR OCULTOS AL INICIAR
	$(document).ready(function () {
	

	$("#trabajo").hide(); // OCULTA EL DIV REFERENTE A LO DEL TRABAJO
	$("#canaimas").hide(); // OCULTA EL DIV REFERENTE A LO DE CANAIMA


	// calcular la edad
	$("#edad").focusin(function () {

	$.ajax({
		url: 'edad_calculo.php',
		type: 'POST',
		dataType: 'json',
		data: {fecha_nac: $('#fecha_nac').val()}
	}).done(function (respuesta) {

		$("#edad").val(respuesta.fecha_nac);


	});
	});



	})

//******************************************************************
//***BUSCAR SI EL REPRESENTANTE EXISTE



            $(document).ready(function () {
               
                $("#TextCedulaRep").focusout(function () {
                    $.ajax({
                        url: 'representantes_buscar.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {cedula: $('#TextCedulaRep').val()}
                    }).done(function (respuesta) {
                        $("#TextApellidosRep").val(respuesta.apellidos);
                        $("#TextNombresRep").val(respuesta.nombres);
                       
                        $("#ComboSexoR").val(respuesta.sexo);
                        $("#ComboParentesco").val(respuesta.parentesco);
                        $("#TextTelefonos").val(respuesta.telefonos);
                        $("#TextEmailRep").val(respuesta.email);
                        $("#ComboTrabaja").val(respuesta.trabaja);


 						var si_trabaja = respuesta.trabaja;
 							 if (si_trabaja == 'SI') {
                           $("#trabajo").show();
   								 $("#TextDonde").val(respuesta.donde);
                      			  $("#ComboSueldo").val(respuesta.sueldo);                        

                        		}

                        		 if (si_trabaja == 'NO' || si_trabaja=='N/A') {	
                        		  $("#trabajo").hide();	
                        		}

                        
                        $("#TextDireccionRep").val(respuesta.direccion);

                    });
                });
            });
       





//*******************************************************************

function bloqueo_boton(){

	var periodoescolar = $("#periodoescolar").attr('value');
	var periodo_anterior = $("#periodo_anterior").attr('value');

if (periodo_anterior == periodoescolar) {
	
	document.getElementById('ingreso').disabled = true;


	}

	}


	function validar_periodo_escolar(){
	// para saber si los periodos escolares son iguales o no para proceder

	var periodoescolar = $("#periodoescolar").attr('value');
	var periodo_anterior = $("#periodo_anterior").attr('value');


	if (periodo_anterior == periodoescolar) {
	alert("ESTE ESTUDIANTE YA ESTA REGISTRADO EN ESTE PERIODO ESCOLAR..");
	document.getElementById('TextCedulaEst').focus();
	return false;

	}

	}



	function activar(){
	// activa o desactiva lo referente al TRABAJO DEL REPRESENTANTE

	var tp = $("#ComboTrabaja").attr('value');
	if (tp == "NO") {
	document.forms[0].TextDonde.value = "";
	document.forms[0].ComboSueldo.value = "N/A";
	$("#trabajo").hide();



	} else {
	$("#trabajo").show();

	}

	// activa o desactiva lo referente al los datos de la canaima


	if (checkcanaima.checked) {
	$("#canaimas").show();

	} else {
	$("#canaimas").hide();

	document.forms[0].ComboFunciona.value = "N/A";
	document.forms[0].TextCodigoCanaima.value = "";

	}


	// validar la direccion del representante
	var dire = $("#TextDireccionEst").attr('value');

	if (radioDireccionSI.checked) {

	document.forms[0].TextDireccionRep.value = dire;


	}

	if (radioDireccionNO.checked) {
	document.forms[0].TextDireccionRep.value ="";

	}

	// FIN //
	}

	function validar(){

	
		var cedulaest = $("#TextCedulaEst").attr('value');

		if (cedulaest == "") {
			alert("Debe Introducir la Cédula del Estudiante");
			document.getElementById('TextCedulaEst').focus();
			return false;
		}


		var apellidosest = $("#TextApellidosEst").attr('value');
		if (apellidosest == "") {
			alert("Debe Introducir los Apellidos del Estudiante");
	 
			document.getElementById('TextApellidosEst').focus();
			document.getElementById('TextApellidosEst').style.backgroundColor = "red";
		
			return false;
		}



		var nombresest = $("#TextNombresEst").attr('value');
		if (nombresest == "") {
			alert("Debe Introducir los Nombres del Estudiante");
			document.getElementById('TextNombresEst').focus();
			return false;
		}

	// este modelo cuando el select option tiene codigo php 
	var sexoest = $("#ComboSexo").attr('value');
	if(sexoest  == ""  || sexoest  == 'N/A') {

	alert("Debe Seleccionar el Sexo del Estudiante");
	document.getElementById('ComboSexo').focus();
	document.getElementById('ComboSexo').style.backgroundColor = "red";
	return false;
	}


	// este modelo cuando el select option tiene codigo php 
	var indice =  $("#Combolateralidad").attr('value');
	if( indice == null || indice == 'N/A' || indice == '') {
	alert("Debe Seleccionar la lateralidad del Estudiante");
	document.getElementById('Combolateralidad').focus();
	return false;
	}



	var fecha_nac = $("#fecha_nac").attr('value');
	if (fecha_nac == "") {
	alert("Debe introducir la fecha de Nacimiento del Estudiante");
	document.getElementById('fecha_nac').focus();
	return false;
	}

var orden_n = $("#TextOrdenNacimiento").attr('value');
	if (orden_n == "" || orden_n==0 ) {
	alert("Debe introducir el orden de Nacimiento del Estudiante");
	document.getElementById('TextOrdenNacimiento').focus();
	return false;
	}



// este modelo cuando el select option tiene codigo php 
	var estado = $("#ComboEstadoN").attr('value');
	if( estado == null || estado == 0  || estado == 'N/A') {
	alert("Debe Seleccionar Estado Federal de Nacimiento");
	document.getElementById('ComboEstadoN').focus();
	return false;
	}




	var lugar_nac = $("#TextLugarNacimiento").attr('value');
	if (lugar_nac == "") {
	alert("Debe introducir el lugar de Nacimiento del Estudiante");
	document.getElementById('TextLugarNacimiento').focus();
	return false;
	}


	// este modelo cuando el select option tiene codigo php 
	var estado_civil = $("#ComboCivil").attr('value');
	if( estado_civil == null || estado_civil == 0  || estado_civil == 'N/A') {
	alert("Debe Seleccionar Estado Civil del Estudiante");
	document.getElementById('ComboCivil').focus();
	return false;
	}





	var mp = $("#ComboMp").attr('value');
	if (mp == "N/A") {
	alert("Seleccione Si el Estudiante posee Materia Pendiente");
	document.getElementById('ComboMp').focus();
	return false;
	}

	var condicion = $("#ComboCondicion").attr('value');
	if (condicion == "N/A") {
	alert("Seleccione la Condición Educativa del Estudiante");
	document.getElementById('ComboCondicion').focus();
	return false;
	}

	var anoest = $("#Comboanoest").attr('value');
	if (anoest == "N/A") {
	alert("Seleccione el Año de Estudio del Estudiante");
	document.getElementById('Comboanoest').focus();
	return false;
	}



//Datos y Ubicación Domiciliaria del Estudiante

// este modelo cuando el select option tiene codigo php 
	var ComboTipoVia = $("#ComboTipoVia").attr('value');
	if( ComboTipoVia == null || ComboTipoVia == 0  || ComboTipoVia == 'N/A') {
	alert("Debe Seleccionar el TIPO DE VIA DE LA DIRECCIÓN");
	document.getElementById('ComboTipoVia').focus();
	return false;
	}


		var direccionest = $("#TextDireccionEst").attr('value');
	if (direccionest == "") {
	alert("Debe Introducir la Dirección de habitación del Estudiante");
	document.getElementById('TextDireccionEst').focus();
	return false;
	}

	
// este modelo cuando el select option tiene codigo php 
	var Comboubicacion = $("#Comboubicacion").attr('value');
	if( Comboubicacion == null ||Comboubicacion == 0  || Comboubicacion == 'N/A') {
	alert("Debe Seleccionar la ZONA de ubicación");
	document.getElementById('Comboubicacion').focus();
	return false;
	}


	// este modelo cuando el select option tiene codigo php 
	var ComboVivienda =  $("#ComboVivienda").attr('value');
	if( ComboVivienda == null || ComboVivienda == 0  || ComboVivienda == 'N/A') {
	alert("Debe Seleccionar el TIPO DE VIVIENDA");
	document.getElementById('ComboVivienda').focus();
	return false;
	}


// este modelo cuando el select option tiene codigo php 
	var ComboViviendaU = $("#ComboViviendaU").attr('value');
	if( ComboViviendaU == null ||ComboViviendaU == 0  || ComboViviendaU == 'N/A') {
	alert("Debe Seleccionar LA UBICACIÓN  LA DE VIVIENDA");
	document.getElementById('ComboViviendaU').focus();
	return false;
	}

// este modelo cuando el select option tiene codigo php 
	var ComboCondicionVivienda = $("#ComboCondicionVivienda").attr('value');
	if( ComboCondicionVivienda == null ||ComboCondicionVivienda == 0  || ComboCondicionVivienda == 'N/A') {
	alert("Debe Seleccionar LA CONDICIÓN  LA DE VIVIENDA");
	document.getElementById('ComboCondicionVivienda').focus();
	return false;
	}

// este modelo cuando el select option tiene codigo php 
	var ComboInfraestructura = $("#ComboCondicionVivienda").attr('value');
	if( ComboInfraestructura == null ||ComboInfraestructura == 0  || ComboInfraestructura == 'N/A') {
	alert("Debe Seleccionar LA CONDICIÓN DE LA INFRAESTRUCTURA");
	document.getElementById('ComboInfraestructura').focus();
	return false;
	}




//VALIDAR DATOS DEL REPRESENTANTE ********************




	var cedularep = $("#TextCedulaRep").attr('value');

	if (cedularep == "") {
	alert("Debe Introducir la Cédula del Representante");
	document.getElementById('TextCedulaRep').focus();
	return false;
	}


	var apellidosrep = $("#TextApellidosRep").attr('value');
	if (apellidosrep == "") {
	alert("Debe Introducir los Apellidos del Representante");
	document.getElementById('TextApellidosRep').focus();
	return false;
	}



	var nombresrep = $("#TextNombresRep").attr('value');
	if (nombresrep == "") {
	alert("Debe Introducir los Nombres del Representante");
	document.getElementById('TextNombresRep').focus();
	return false;
	}


	// este modelo cuando el select option tiene codigo php 
	
	var ComboSexoR = $("#ComboSexoR").attr('value');
	if(ComboSexoR == null  || ComboSexoR == 'N/A') {
	alert("Debe Seleccionar EL SEXO DEL REPRESENTANTE");
	document.getElementById('ComboSexoR').focus();
	return false;
	}


	var parentesco = $("#ComboParentesco").attr('value');
	if (parentesco == "" || parentesco == 'N/A') {
	alert("Debe Introducir el Parentesco con el Estudiante");
	document.getElementById('ComboParentesco').focus();
	return false;
	}

	var direccionrep = $("#TextDireccionRep").attr('value');
	if (direccionrep == "") {
	alert("Debe Introducir la Dirección de habitación del Representante");
	document.getElementById('TextDireccionRep').focus();
	return false;
	}


	var fechaIE = $("#DateFnIE").attr('value');
	if (fecha_nac == "") {
	alert("Debe introducir la fecha de Ingreso o Egreso");
	document.getElementById('DateFnIE').focus();
	return false;
	}




	//	validamos los elementos que podran  quedar vacio 
	//	y colocarle su valor por defecto  

	var seccion = $("#TextSeccion").attr('value');

	if(seccion == "" || seccion == null)
	{
	document.forms[0].TextSeccion.value ="N/A";
	}


	var email = $("#TextEmailEst").attr('value');

	if(email == "" || email == null)
	{
	document.forms[0].TextEmailEst.value ="N/A";
	}


	var procedencia = $("#TextProcedencia").attr('value');

	if(procedencia == "" || procedencia == null)
	{
	document.forms[0].TextProcedencia.value ="N/A";
	}


	var observacion = $("#TextObservacion").attr('value');

	if(observacion == "" || observacion == null)
	{
	document.forms[0].TextObservacion.value ="N/A";
	}


	var TextTelefonos = $("#TextTelefonos").attr('value');

	if(TextTelefonos == "" || TextTelefonos == null)
	{
	document.forms[0].TextTelefonos.value ="N/A";
	}


	var TextEmailRep = $("#TextEmailRep").attr('value');

	if(TextEmailRep == "" || TextEmailRep == null)
	{
	document.forms[0].TextEmailRep.value ="N/A";
	}


	var TextDonde = $("#TextDonde").attr('value');

	if(TextDonde == "" || TextDonde == null)
	{
	document.forms[0].TextDonde.value ="N/A";
	}


	var textaltura = $("#textaltura").attr('value');

	if(textaltura == "" || textaltura == null)
	{
	document.forms[0].textaltura.value ="N/A";
	}


	var textpeso = $("#textpeso").attr('value');

	if(textpeso == "" || textpeso == null)
	{
	document.forms[0].textpeso.value ="N/A";
	}


	var textpantalon = $("#textpantalon").attr('value');

	if(textpantalon == "" || textpantalon == null)
	{
	document.forms[0].textpantalon.value ="N/A";
	}


	var textcamisa = $("#textcamisa").attr('value');

	if(textcamisa == "" || textcamisa == null)
	{
	document.forms[0].textcamisa.value ="N/A";
	}


	var textzapato = $("#textzapato").attr('value');

	if(textzapato == "" || textzapato == null)
	{
	document.forms[0].textzapato.value ="N/A";
	}


	var TextCodigoCanaima = $("#TextCodigoCanaima").attr('value');

	if(TextCodigoCanaima == "" || TextCodigoCanaima == null)
	{
	document.forms[0].TextCodigoCanaima.value ="N/A";
	}




	// MENSAJE DE CONFIRMACION 
	if (!(confirm("Desea Procesar estos Datos..? "))) {
	return false;

	}

	

	// fin
	}


	function limpiar_focus(e) {
	if (window.confirm("Desea Borrar el formulario?")) {
		document.getElementById('TextCedulaEst').focus();

	// COMO QUEDA ACTIVA LO REFERENTE AL TRABAJO DEL REPRESENTANTE, AQUI SE OCULTA
	$("#trabajo").hide();

	doReset();

	}
	return false;
	}













