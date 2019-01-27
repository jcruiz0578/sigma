<?php
session_start();

include "conexion/conexion.php";

// VARIABLES PARA LAS OPERACIONES

$ingresar1 = "ingresar";
$ingresar = base64_encode($ingresar1);

$modificar1 = "modificar";
$modificar = base64_encode($modificar1);

$periodoescolar = $_SESSION ["session_periodoescolar"];

// $periodoescolar = $_POST["periodoescolar"];

$cedula_estudiante = $_SESSION ["cedula_estudiante"];

$consulta = $_REQUEST [consultar];

// $consulta ="SI";

if ($consulta == "SI") {

    $xid_ingreso = $_REQUEST [id];

    $cedula_estudiante = $_REQUEST [cedula];

    $periodoescolar_anterior = $_REQUEST [periodoescolar_anterior];

    include 'ingresos_egresos_consulta.php';
} else {
    // CUANDO EL REGISTRO ES VACIO IGUAL COLOCAMOS LA FECHA DEPENDIENDO DEL NAVEGADOR
    // modulo que verifica el tipo de navegador (chrome, firefox, otros)
    include "navegador_detectar.php";

    if ($navegador == "Chrome") {

        // fecha que se colocara en la fecha de ingreso/egreso

        $fecha_actual = date('Y-m-d');
    } else {

        // fecha que se colocara en la fecha de ingreso/egreso
        $fecha_actual1 = date('Y-m-d');
        $fecha_actual = date("d-m-Y", strtotime($fecha_actual1));
    }
}
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>
<html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>
<html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
    >
    <title>SISTEMA INTEGRAL DE GESTI&Oacute;N MASTRICULAR AUTOMATIZADO</title>
    <!--<link href="css/boilerplate.css" rel="stylesheet" type="text/css">-->
    <link
            href="css/estilo.css"
            rel="stylesheet"
            type="text/css"
    >
    <script src="js/respond.min.js"></script>
    <script
            src="js/jquery-ui.min.js"
            type="text/javascript"
    ></script>
    <script
            src="js/jquery-1.8.3.min.js"
            type="text/javascript"
    ></script>
    <link
            href="modal/assets/bootstrap.min.css"
            rel="stylesheet"
    >
    <link
            rel="stylesheet"
            href="css/bootstrap-theme.min.css"
    >
    <!-- ARCHIVO .CCS EN DONDE SE GUARDA LA CONFIGURACION DE ESTILO DE OBJETOS   ESTA LA LA CARPETA CSS-->
    <link
            rel="stylesheet"
            href="css/estilo_formato.css"
    >
    <!-- ARCHIVO JS EN DONDE SE ENCUENTRAN LAS VALIDACIONES DE ESTA CLASE   ESTA LA LA CARPETA js-->
    <script
            src="js/ingresos_egresos.js"
            type="text/javascript"
    ></script>
    <style type="text/css">
    </style>
</head>
<body
        onload="bloqueo_boton()"
        oncontextmenu='return false'
        style="background: #e5e5e5;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"
>
<div
        class="gridContainer clearfix"
        style="background: white; box-shadow: 15px 15px 15px #999; border-radius: 15px; border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-left-style: solid; margin-top: 30px; margin-bottom: 30px"
>
    <div
            id="principal"
            class="fluid"
    >
        <form
                action=""
                method="POST"
        >
            <div
                    id="encabezado"
                    align="center"
            >
                <div id="logo1">
                    <img src="imagenes/MEMBRETE.jpg">
                </div>
                <div id="logo2"></div>
                <div id="periodoescolar_mostrar">
                    <h1>Período Escolar: <?php echo $periodoescolar ?></h1>
                    <h4>
                        <a href="principal.php">REGRESAR AL MENÚ PRINCIPAL</a>
                    </h4>
                </div>
                <div
                        id="separacion"
                        style="width: auto; height: 10px"
                ></div>
            </div>
            <div
                    id="ie"
                    class="container-fluid"
                    align="center"
                    style="float: right"
            >
                <h4>Período Escolar: <?php echo $periodoescolar_anterior ?></h4>
                <input
                        type="text"
                        name="ie"
                        id="ie"
                        value="<?php echo $ie = 'I' ?>"
                        style="width: 100px; height: 100px; text-align: center; font-weight: bold; font-size: 52px"
                >
                <!--AQUI SE CREAN LOS INPUT OCULTOS PARA ALMACENAR ALGUNOS VALORES QUE SERVIRAN PARA PASAR DATOS A OTRAS PAGINS   -->
                <input
                        type="hidden"
                        name="periodoescolar"
                        id="periodoescolar"
                        value="<?php echo $periodoescolar ?>"
                > <input
                        type="hidden"
                        name="periodo_anterior"
                        id="periodo_anterior"
                        value="<?php echo $periodoescolar_anterior ?>"
                > <input
                        type="hidden"
                        name="id_ingreso"
                        id="id_ingreso"
                        value="<?php echo $xid_ingreso ?>"
                > <input
                        type="hidden"
                        name="fecha_ingreso"
                        id="fecha_ingreso"
                        value="<?php echo $xfecha_ingreso ?>"
                > <input
                        type="hidden"
                        name="mes_ingreso"
                        id="mes_ingreso"
                        value="<?php echo $xmes_ingreso ?>"
                >
            </div>
            <div id="estudiantes">
                <h2>
                    <b><font color="red">Datos del Estudiante</font></b>
                </h2>
                <b>C&eacute;dula de Identidad:</b> <input
                        type="text"
                        class="formato"
                        autofocus
                        name="TextCedulaEst"
                        id="TextCedulaEst"
                        style="width: 150px;"
                        value='<?php

                        echo $cedula_estudiante;
                        ?>'
                        placeholder="Cédula Identidad"
                        onkeydown="return validarNumeros(event)"
                >&nbsp;&nbsp;&nbsp; <br/></br> <b>Apellidos :</b> <input
                        type="text"
                        class="formato"
                        name="TextApellidosEst"
                        id="TextApellidosEst"
                        style="width: 350px;"
                        value='<?php

                        echo $apellidosest;
                        ?>'
                        placeholder="Apellidos"
                        onKeyUp="this.value = this.value.toUpperCase();"
                >&nbsp;&nbsp;&nbsp; <b>Nombres:</b> <input
                        type="text"
                        class="formato"
                        name="TextNombresEst"
                        id="TextNombresEst"
                        style="width: 350px;"
                        value='<?php echo $nombresest ?>'
                        placeholder="Nombres"
                        onKeyUp="this.value = this.value.toUpperCase();"
                > <br/> <b>Sexo:</b> <select
                        class="formato"
                        name="ComboSexo"
                        id="ComboSexo"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!($sexoest == "")) {
                                $sexoseleccion = $sexoest;
                                echo $sexoest;
                            } else {
                                $sexoseleccion = "N/A";
                                echo $sexoseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $sexoseleccion ?></option>
                    <option value="N/A">N/A</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select> &nbsp;&nbsp;&nbsp; <b>Lateralidad:</b> <select
                        class="formato"
                        name="Combolateralidad"
                        id="Combolateralidad"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if ((!empty ($lateralidad))) {
                                $lateralidadseleccion = $lateralidad;
                                echo $lateralidadseleccion;
                            } else {
                                $lateralidadseleccion = 'N/A';
                                echo $lateralidadseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $lateralidadseleccion ?></option>
                    <option value="D">Derecho(a)</option>
                    <option value="Z">Zurdo(a)</option>
                    <option value="A">Ambidiestro(a)</option>
                </select> &nbsp;&nbsp;&nbsp; <b>Fecha de Nacimiento: </b> <input
                        type="Date"
                        class="formato"
                        name="fecha_nac"
                        id="fecha_nac"
                        style="width: auto;"
                        value="<?php echo $fnest1; ?>"
                ><br/> <b>Fecha de Ajuste:</b> <input
                        type="text"
                        class="formato"
                        name="DateFaj"
                        id="DateFaj"
                        value="30/09/2016"
                        style="width: auto;"
                > &nbsp;&nbsp;&nbsp; <b>Edad Calculada:</b> <input
                        type="text"
                        class="formato"
                        title="Generado Automaticamente, dar CLICK"
                        name="edad"
                        id="edad"
                        style="width: 250px;"
                        placeholder="Edad Actual, Dar CLICK"
                        onKeyUp="this.value = this.value.toUpperCase();"
                > <br> <b>Orden de Nacimiento:</b> <input
                        type="number"
                        step="any"
                        min="0"
                        max="20"
                        class="formato"
                        name="TextOrdenNacimiento"
                        id="TextOrdenNacimiento"
                        value="<?php

                        echo $orden_nac;
                        ?>"
                        style="width: auto;"
                >&nbsp;&nbsp;&nbsp; <b>Estado de Nac.:</b> <select
                        class="formato"
                        name="ComboEstadoN"
                        id="ComboEstadoN"
                        style="width: auto;"
                >
                    <option
                            value=" <?php
                            if (!empty ($estado_nac)) {
                                $estado_nacseleccion = $estado_nac;
                                echo $estado_nacseleccion;
                            } else {
                                $estado_nacseleccion = 'N/A';
                                echo $estado_nacseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $estado_nacseleccion ?></option>
                    <option value="N/A">N/A</option>
                    <?php

                    /* Conexion a la bd */

                    $consulta = "SELECT * FROM ubicacion_estado ";
                    // sentencia sql
                    $result_consulta = $conexion->query($consulta);

                    while ($user = $result_consulta->fetch_array()) {
                        echo "<option  value='" . $user ["nombre"] . "'>" . $user ["nombre"] . "";
                    }
                    ?>
                </select> <br> <b>Lugar de Nacimiento:</b> <input
                        type="text"
                        class="formato"
                        title="Lugar de Nacimiento y el Estado"
                        name="TextLugarNacimiento"
                        id="TextLugarNacimiento"
                        style="width: 350px;"
                        value="<?php

                        echo $lugar_nac;
                        ?>"
                        placeholder="Localidad de Nacimiento "
                        onKeyUp="this.value = this.value.toUpperCase();"
                >&nbsp;&nbsp;&nbsp; <b>Estado Civil.:</b> <select
                        class="formato"
                        name="ComboCivil"
                        id="ComboCivil"
                        style="width: auto;"
                >
                    <option
                            value=" <?php
                            if (!empty ($estado_civil)) {
                                $estado_civilseleccion = $estado_civil;
                                echo $estado_civilseleccion;
                            } else {
                                $estado_civilseleccion = 'N/A';
                                echo $estado_civilseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $estado_civilseleccion ?></option>
                    <option value="N/A">N/A</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viudo">Viudo</option>
                    <option value="Concubinato">Concubinato</option>
                </select>&nbsp;&nbsp;&nbsp; <br/>
                <div
                        id="separacion0"
                        style="width: auto; height: 30px"
                ></div>
                <b>Matetia Pendiente?:</b> <select
                        class="formato"
                        name="ComboMp"
                        id="ComboMp"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($mp)) {
                                $mpseleccion = $mp;
                                echo $mp;
                            } else {
                                $mpseleccion = "N/A";
                                echo $mpseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $mpseleccion ?></option>
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                </select>&nbsp;&nbsp;&nbsp; <b>Condici&oacute;n de Estudio:</b> <select
                        class="formato"
                        name="ComboCondicion"
                        id="ComboCondicion"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($xcondicion)) {
                                $xcondicionseleccion = $xcondicion;
                                echo $xcondicionseleccion;
                            } else {
                                $xcondicionseleccion = "N/A";
                                echo $xcondicionseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $xcondicionseleccion ?></option>
                    <option>NUEVO ING</option>
                    <option>REGULAR</option>
                    <option>REPITIENTE DE LA INST</option>
                    <option>REPITIENTE OTRA INST</option>
                    <option>REZAGADO</option>
                </select><br/> <b>Año de Estudio?:</b> <select
                        class="formato"
                        name="Comboanoest"
                        id="Comboanoest"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($anoest)) {
                                $anoestseleccion = $anoest;
                                echo $anoest;
                            } else {
                                $anoestseleccion = "N/A";
                                echo $anoestseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $anoestseleccion ?></option>
                    <option>1ER AÑO</option>
                    <option>2DO AÑO</option>
                    <option>3ER AÑO</option>
                    <option>4TO AÑO CS</option>
                    <option>5TO AÑO CS</option>
                </select>&nbsp;&nbsp;&nbsp; <b>Secci&oacute;n?:</b> <input
                        type="text"
                        class="formato"
                        name="TextSeccion"
                        id="TextSeccion"
                        style="width: 60px;"
                        value='<?php

                        echo $seccion;
                        ?>'
                        placeholder="Sección"
                        readonly
                ><br/>
            </div>
            <div
                    id="separacion1"
                    style="width: auto; height: 30px;"
            ></div>
            <div id="domicilioE">
                <h3>
                    <font color="red">Datos y Ubicación Domiciliaria del Estudiante</font>
                </h3>
                <b>Tipo de Via.:</b><select
                        class="formato"
                        name="ComboTipoVia"
                        id="ComboTipoVia"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($tipovia)) {
                                $tipoviaseleccion = $tipovia;
                                echo $tipoviaseleccion;
                            } else {
                                $tipoviaseleccion = "N/A";
                                echo $tipoviaseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $tipoviaseleccion ?></option>
                    <option>N/A</option>
                    <option>AUTOPISTA</option>
                    <option>AVENIDA</option>
                    <option>CALLE</option>
                    <option>CALLEJON</option>
                    <option>ESQUINA</option>
                    <option>MANZANA</option>
                    <option>CARRETERA</option>
                    <option>VEREDA</option>
                </select>&nbsp;&nbsp;&nbsp;<br/> <b>Dirección (URB/CALLE/SECTOR/VEREDA/N°CASA).:</b><input
                        type="text"
                        class="formato"
                        name="TextDireccionEst"
                        id="TextDireccionEst"
                        value='<?php

                        echo $direccionest;
                        ?>'
                        title="Dirección de Habitación del Estudiante"
                        style="width: 550px;"
                        title="URB/CALLE/SECTOR/VEREDA/N°CASA"
                        placeholder="(URB/CALLE/SECTOR/VEREDA/N°CASA) "
                        onKeyUp="this.value = this.value.toUpperCase();"
                ><br/> <b>Zona de Ubicación.:</b><select
                        class="formato"
                        name="Comboubicacion"
                        id="Comboubicacion"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($zonaubicacion)) {
                                $zonaubicacionseleccion = $zonaubicacion;
                                echo $zonaubicacionseleccion;
                            } else {
                                $zonaubicacionseleccion = "N/A";
                                echo $zonaubicacionseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $zonaubicacionseleccion ?></option>
                    <option>N/A</option>
                    <option>Urbana</option>
                    <option>Rural</option>
                </select>&nbsp;&nbsp;&nbsp; <b>Tipo de Vivienda.:</b><select
                        class="formato"
                        name="ComboVivienda"
                        id="ComboVivienda"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($tipovivienda)) {
                                $tipoviviendaseleccion = $tipovivienda;
                                echo $tipoviviendaseleccion;
                            } else {
                                $tipoviviendaseleccion = "N/A";
                                echo $tipoviviendaseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $tipoviviendaseleccion ?></option>
                    <option>N/A</option>
                    <option>Casa</option>
                    <option>Apartamento</option>
                    <option>Rancho</option>
                    <option>Quinta</option>
                    <option>Casa Vecindad</option>
                    <option>Improvisada</option>
                    <option>Refugio</option>
                </select>&nbsp;&nbsp;&nbsp; <b>Ubicación Vivienda.:</b><select
                        class="formato"
                        name="ComboViviendaU"
                        id="ComboViviendaU"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($ubicacionvivienda)) {
                                $ubicacionviviendaseleccion = $ubicacionvivienda;
                                echo $ubicacionviviendaseleccion;
                            } else {
                                $ubicacionviviendaseleccion = "N/A";
                                echo $ubicacionviviendaseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $ubicacionviviendaseleccion ?></option>
                    <option>N/A</option>
                    <option>Urbanización</option>
                    <option>Barrio</option>
                    <option>Caserio</option>
                    <option>Zona Residencial</option>
                </select>&nbsp;&nbsp;&nbsp;<br/> <b>Condición Vivienda.:</b><select
                        class="formato"
                        name="ComboCondicionVivienda"
                        id="ComboCondicionVivienda"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($condicionvivienda)) {
                                $condicionviviendaseleccion = $condicionvivienda;
                                echo $condicionviviendaseleccion;
                            } else {
                                $condicionviviendaseleccion = "N/A";
                                echo $condicionviviendaseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $condicionviviendaseleccion ?></option>
                    <option>N/A</option>
                    <option>Alquilada</option>
                    <option>Propia Pagada</option>
                    <option>Propia Pagandose</option>
                    <option>Al cuidado</option>
                    <option>Arrimado</option>
                    <option>Cedida</option>
                    <option>De la Empresa</option>
                    <option>Anexo</option>
                    <option>Prestada</option>
                    <option>Herencia</option>
                </select>&nbsp;&nbsp;&nbsp; <b>Condición Infraestructura.:</b><select
                        class="formato"
                        name="ComboInfraestructura"
                        id="ComboInfraestructura"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($infraestructura)) {
                                $infraestructuraseleccion = $infraestructura;
                                echo $infraestructuraseleccion;
                            } else {
                                $infraestructuraseleccion = "N/A";
                                echo $infraestructuraseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $infraestructuraseleccion ?></option>
                    <option>N/A</option>
                    <option>Excelente</option>
                    <option>Buena</option>
                    <option>Regular</option>
                    <option>Deteriorada</option>
                    <option>Deplorable</option>
                </select>&nbsp;&nbsp;&nbsp;
            </div>
            <div
                    id="separacion1"
                    style="width: auto; height: 20px;"
            ></div>
            <div id="domicilioE">
                <h3>
                    <font color="red">Otros datos del Estudiante</font>
                </h3>
                <b>E-mail:</b> <input
                        type="text"
                        class="formato"
                        name="TextEmailEst"
                        id="TextEmailEst"
                        value='<?php

                        echo $emailest;
                        ?>'
                        style="width: 250px;"
                        placeholder="Correo Electrónico"
                >&nbsp;&nbsp;&nbsp; <b>Plantel de Procedencia.:</b><select
                        class="formato"
                        name="TextProcedencia"
                        id="TextProcedencia"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($procedencia)) {
                                $procedenciaseleccion = $procedencia;
                                echo $procedenciaseleccion;
                            } else {
                                $procedenciaseleccion = "N/A";
                                echo $procedenciaseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $procedenciaseleccion ?></option>
                    <option>N/A</option>
                    <option>L.N.B. GRAL. EN JEFE JOSÉ FCO. BERMÚDEZ</option>
                    <option>E.B. GUAYACÁN DE LAS FLORES</option>
                    <option>E.B. LOS COCOS</option>
                    <option>E.B. EL MUCO</option>
                    <option>E.B. CONCENTRADA MIXTA “EL LIRIO”</option>
                    <option>E.B. LA CORBATA</option>
                    <option>U.E."NUESTRA. SEÑORA DE LA COROMOTO"</option>
                    <option>E.B. PRIMERO DE MAYO</option>
                    <option>U.E.P ANTONIO JOSE DE SUCRE</option>
                    <option>U.E.P ANDRES ELOY BLANCO</option>
                    <option>U.E.P COLEGIO MARÍA DEL JESUS ALMEIDA</option>
                    <option>U.E.P "DR. JOSÉ GREGORIO HERNÁNDEZ"</option>
                    <option>U.E.P JOSE MARIA VARGA</option>
                    <option>U.E.P JOSE FRANCISCO BERMÚDEZ</option>
                    <option>U.E.P "RAFAEL OSIO PÉREZ"</option>
                    <option>U.E.P SIMÓN BOLÍVAR</option>
                    <option>U.E.P VICENTE SALIAS</option>
                    <option>U.E.E. JUANITA SALINAS GAMBOA</option>
                    <option>U.E.E. MARIA RODRIGUEZ DE VERA</option>
                    <option>U.E.E. LOS LIMITES</option>
                    <option>U.E. J.A. RODRÍGUEZ ABREU</option>
                </select> <br/>
                <h4>
                    <font color="red">Medidas y Tallas del Estudiante</font>
                </h4>
                <b>Altura (Metros):</b> &nbsp;&nbsp;<input
                        type="text"
                        class="formato medidas"
                        name="textaltura"
                        id="textaltura"
                        min="0"
                        step="any"
                        value='<?php

                        echo $xaltura;
                        ?>'
                >&nbsp;&nbsp;&nbsp;&nbsp; <b> Peso (Kg):</b> &nbsp;&nbsp;<input
                        type="text"
                        class="formato medidas"
                        name="textpeso"
                        id="textpeso"
                        min="0"
                        step="any"
                        value='<?php

                        echo $xpeso;
                        ?>'
                >&nbsp;&nbsp;&nbsp;&nbsp; <b>Pantalón (N°):</b> &nbsp;&nbsp;<input
                        type="text"
                        class="formato medidas"
                        name="textpantalon"
                        id="textpantalon"
                        min="0"
                        step="any"
                        value='<?php

                        echo $xpantalon;
                        ?>'
                        onkeydown="return validarNumeros(event)"
                ><br/> <b>Camisa (Letra):</b> &nbsp;&nbsp;<input
                        type="text"
                        class="formato medidas"
                        name="textcamisa"
                        id="textcamisa"
                        value='<?php

                        echo $xcamisa;
                        ?>'
                        onKeyUp="this.value = this.value.toUpperCase()"
                >&nbsp;&nbsp;&nbsp;&nbsp; <b>Zapatos (N°):</b> &nbsp;&nbsp;<input
                        type="text"
                        class="formato medidas"
                        name="textzapato"
                        id="textzapato"
                        min="0"
                        step="any"
                        value='<?php

                        echo $xzapatos;
                        ?>'
                        onkeydown="return validarNumeros(event)"
                ><br/>
                <textarea
                        class="formato"
                        name="TextObservacion"
                        id="TextObservacion"
                        title="Observaciones del Estudiante"
                        style="width: 500px; height: 80px;"
                        placeholder="Observaciones"
                        onKeyUp="this.value = this.value.toUpperCase();"
                ><?php

                    echo $observacion;
                    ?></textarea>
                <br>
            </div>
            <div
                    id="separacion1"
                    style="width: auto; height: 20px;"
            ></div>
            <div id="representantes">
                <h2>
                    <font color="red">Datos del Representante</font>
                </h2>
                <b>C&eacute;dula de Identidad:</b> <input
                        type="text"
                        class="formato"
                        name="TextCedulaRep"
                        id="TextCedulaRep"
                        value='<?php

                        echo $cedularep;
                        ?>'
                        style="width: 150px;"
                        placeholder="Cédula Identidad"
                        onkeydown="return validarNumeros(event)"
                ><br/> <br/> <b>Apellidos:</b> <input
                        type="text"
                        class="formato"
                        name="TextApellidosRep"
                        id="TextApellidosRep"
                        value='<?php

                        echo $apellidosrep;
                        ?>'
                        style="width: 350px;"
                        placeholder="Apellidos"
                        onKeyUp="this.value = this.value.toUpperCase();"
                >&nbsp;&nbsp;&nbsp; <b>Nombres:</b> <input
                        type="text"
                        class="formato"
                        name="TextNombresRep"
                        id="TextNombresRep"
                        value='<?php

                        echo $nombresrep;
                        ?>'
                        style="width: 350px;"
                        placeholder="Nombres"
                        onKeyUp="this.value = this.value.toUpperCase();"
                > <br/> <b>Sexo:</b> <select
                        class="formato"
                        name="ComboSexoR"
                        id="ComboSexoR"
                        style="width: auto;"
                >
                    <option
                            value=" <?php
                            if (!empty ($sexorep)) {
                                $sexoseleccionR = $sexorep;
                                echo $sexoseleccionR;
                            } else {
                                $sexoseleccionR = 'N/A';
                                echo $sexoseleccionR;
                            }
                            ?>"
                            selected
                    ><?php echo $sexoseleccionR ?></option>
                    <option value="N/A">N/A</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select> &nbsp;&nbsp;&nbsp; <b>Parentesco:</b> <select
                        class="formato"
                        name="ComboParentesco"
                        id="ComboParentesco"
                        style="width: auto;"
                >
                    <option
                            value="<?php
                            if (!empty ($parentescorep)) {
                                $parentescorepseleccion = $parentescorep;
                                echo $parentescorep;
                            } else {
                                $parentescorepseleccion = "N/A";
                                echo $parentescorepseleccion;
                            }
                            ?>"
                            selected
                    ><?php echo $parentescorepseleccion ?></option>
                    <option value="N/A">N/A</option>
                    <option>MADRE</option>
                    <option>PADRE</option>
                    <option>TIO(A)</option>
                    <option>ABUELO(A)</option>
                    <option>PADRASTRO</option>
                    <option>MADRASTRA</option>
                    <option>HERMANO(A)</option>
                    <option>REPRESENTANTE ANTE LA LOPNA</option>
                </select> <br/> <b>Tel&eacute;fonos:</b> <input
                        type="text"
                        class="formato"
                        name="TextTelefonos"
                        id="TextTelefonos"
                        value='<?php

                        echo $telefonosrep;
                        ?>'
                        style="width: 250px;"
                        placeholder="Teléfonos de Contactos"
                >&nbsp;&nbsp;&nbsp; <b>Correo Elec.:</b> <input
                        type="text"
                        class="formato"
                        name="TextEmailRep"
                        id="TextEmailRep"
                        value='<?php

                        echo $emailrep;
                        ?>'
                        style="width: 250px;"
                        placeholder="Correo Electronico"
                ><br/> <b>Trabaja:</b><select
                        class="formato"
                        name="ComboTrabaja"
                        id="ComboTrabaja"
                        style="width: auto;"
                        onChange="activar()"
                >
                    <option>NO</option>
                    <option>SI</option>
                </select> &nbsp;&nbsp;&nbsp;
                <div id="trabajo">
                    <input
                            type="text"
                            class="formato"
                            name="TextDonde"
                            id="TextDonde"
                            style="width: 350px;"
                            placeholder="Lugar de Trabajo"
                    ><br/> <b>Sueldo que Devenga?:</b><select
                            class="formato"
                            name="ComboSueldo"
                            id="ComboSueldo"
                            style="width: auto;"
                    >
                        <option>N/A</option>
                        <option>MINIMO</option>
                        <option>POR ENCIMA</option>
                        <option>POR DEBAJO</option>
                    </select><br/> <br/>
                </div>
                <br/> <br/> <b>La misma Dirección del Estudiante?:</b>&nbsp;&nbsp;&nbsp; <input
                        type="radio"
                        id="radioDireccionSI"
                        name="radioDireccion"
                        value="SI"
                        onChange="activar()"
                ><b>SI</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
                        type="radio"
                        name="radioDireccion"
                        id="radioDireccionNO"
                        value="NO"
                        onChange="activar()"
                ><b>NO</b> <br/> <br/> <input
                        type="text"
                        class="formato"
                        name="TextDireccionRep"
                        id="TextDireccionRep"
                        value='<?php

                        echo $direccionrep;
                        ?>'
                        title="Dirección de Habitación del Representante"
                        style="width: 550px;"
                        title="URB/CALLE/SECTOR/VEREDA/N°CASA"
                        placeholder="Direccion de habitación (URB/CALLE/SECTOR/VEREDA/N°CASA) "
                        onKeyUp="this.value = this.value.toUpperCase();"
                >&nbsp;&nbsp;&nbsp;
            </div>
            <div
                    id="separacion2"
                    style="width: auto; height: 20px;"
            ></div>
            <div id="documentos">
                <h2>
                    <font color="red">Documentos Requeridos</font>
                </h2>
                <input
                        type="checkbox"
                        name="checkPn"
                        id="checkPn"
                        style="height: 20px; width: 25px;"
                ><b>PARTIDA NAC.</b>&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkFotos"
                        id="checkFotos"
                        style="height: 20px; width: 25px"
                ><b>FOTOS</b>&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkciest"
                        id="checkciest"
                        style="height: 20px; width: 25px"
                ><b>C.I. EST.</b>&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkcirep"
                        id="checkcirep"
                        style="height: 20px; width: 25px"
                ><b>C.I.REP.</b>&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checknotas"
                        id="checknotas"
                        style="height: 20px; width: 25px"
                ><b>NOTAS CERT.</b><br/> <input
                        type="checkbox"
                        name="checkcarnet"
                        id="checkcarnet"
                        style="height: 20px; width: 25px"
                ><b>CARNET ESC.</b>&nbsp;&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkpasaporte"
                        id="checkpasaporte"
                        style="height: 20px; width: 25px"
                ><b>PASAPORTE ALIM.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkcoleccion"
                        id="checkcoleccion"
                        style="height: 20px; width: 25px"
                ><b>COLECC. BICENTENARIA.</b><br/> <input
                        type="checkbox"
                        name="checkbecado"
                        id="checkbecado"
                        style="height: 20px; width: 25px"
                ><b>BECADO.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checklopnna"
                        id="checklopnna"
                        style="height: 20px; width: 25px"
                ><b>PERMISO LOPNNA.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
                        type="checkbox"
                        name="checkcanaima"
                        id="checkcanaima"
                        style="height: 20px; width: 25px"
                        onChange="activar()"
                ><b>PC. CANAIMA.</b> <br/> <br/>
                <div id="canaimas">
                    <b>Funciona la PC. Canaima?:</b><select
                            class="formato"
                            name="ComboFunciona"
                            id="ComboFunciona"
                            style="width: auto;"
                    >
                        <option>N/A</option>
                        <option>NO</option>
                        <option>SI</option>
                    </select>&nbsp;&nbsp;&nbsp; <input
                            type="text"
                            class="formato"
                            name="TextCodigoCanaima"
                            id="TextCodigoCanaima"
                            style="width: 250px;"
                            placeholder="Códogo de la Canaima"
                    >&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div
                    id="separacion3"
                    style="width: auto; height: 40px;"
            ></div>
            <b>N° DE FICHA DE INSCRIPCIÓN: </b> &nbsp;&nbsp;<input
                    type="text"
                    class="formato"
                    id="ficha"
                    name="ficha"
                    style="width: 60px;"
                    value="<?php

                    echo $ficha;
                    ?>"
            >&nbsp;&nbsp;&nbsp; <b>FECHA DE INGRESO O EGRESO:</b><input
                    type="Date"
                    class="formato"
                    title="Escriba en este formato  dia/mes/año"
                    name="DateFnIE"
                    id="DateFnIE"
                    value="<?php

                    echo $fecha_actual;
                    ?>"
                    style="width: auto;"
            >
            <div
                    id="separacion4"
                    style="width: auto; height: 60px;"
            ></div>
            <div
                    id="botones"
                    class="container-fluid"
                    align="center"
                    style="width: auto"
            >
                <button
                        class="formato_boton"
                        name="limpiar"
                        id="limpiar"
                        type="reset"
                        style='background: url("/imagenes/limpiar.png"); background-repeat: no-repeat; background-position: top;'
                        onclick="return limpiar_focus();"
                >LIMPIAR
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="ingreso"
                        id="ingreso"
                        type="submit"
                        style='background: url("/imagenes/ingreso.png"); background-repeat: no-repeat; background-position: top;'
                        onclick="this.form.action = 'ingresos_egresos_operaciones.php?operacion=<?php echo $ingresar ?>';
                                return validar();
                                "
                >INGRESO
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="egreso"
                        type="submit"
                        style='background: url("/imagenes/egreso.gif"); background-repeat: no-repeat; background-position: top;'
                        onclick=" "
                >EGRESO
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="eliminar"
                        id="eliminar"
                        type="submit"
                        style='background: url("/imagenes/eliminar.gif"); background-repeat: no-repeat; background-position: top;'
                        onclick="validar_periodo_escolar();
		validar()"
                >ELIMINAR
                </button>
                <br/> <br>
                <button
                        class="formato_boton"
                        name="datos"
                        id="datos"
                        type="submit"
                        style='background: url("/imagenes/png/32x32/users_edit.png"); background-repeat: no-repeat; background-position: top;'
                        onclick="this.form.action = 'ingresos_egresos_operaciones.php?operacion=<?php echo $modificar ?>';
                                return validar();
                                "
                >MODIFICAR DATOS
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="cedula"
                        type="submit"
                        style='background: url("imagenes/cedula.jpg"); background-repeat: no-repeat; background-position: top;'
                        onclick=""
                >MODIFICAR CEDULA
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="fechaing"
                        type="submit"
                        style='background: url("/imagenes/png/32x32/users_add.png"); background-repeat: no-repeat; background-position: top;'
                        onclick="this.form.action = 'modificar_otros.php';"
                >MODIFICAR FECH. ING
                </button>
                &nbsp;
                <button
                        class="formato_boton"
                        name="fechaing"
                        type="submit"
                        style='background: url("/imagenes/egreso2.gif"); background-repeat: no-repeat; background-position: top;'
                        onclick=""
                >MODIFICAR FECH. EGRE
                </button>
                &nbsp;
            </div>
        </form>
    </div>
    <div
            id="separacion5"
            style="width: auto; height: 40px;"
    ></div>
    <div
            id="pie"
            class="fluid"
            align="center"
    >
        <HR
                width=auto
                align="center"
                style="background-color: red; height: 6px;"
        >
        <b>Copyright© 2015: Todos los Derechos Reservados. SISTEMA INTEGRAL DE GESTI&Oacute;N MASTRICULAR
            AUTOMATIZADO</b><br> <b><i>L.N.B. General en Jefe José Francisco Bermúdez, Urb. Guayacán de las Flores,
                Sector 1, Calle # 5.</i></b><br> <b><i>Teléfonos: 0294-511-10.49 /0294-332-48.66 -
                e-mail:lnbjfb@gmail.com - Twitter: @lnbjfb </i></b><br> <b>Realizado por: ING. JUAN CARLOS RUIZ H</b>
        <div
                id="separacion3"
                style="width: auto; height: 50px"
        ></div>
    </div>
</div>
</body>
</html>
