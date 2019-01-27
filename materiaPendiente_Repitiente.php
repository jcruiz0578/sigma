<?php
session_start();

include "conexion/conexion.php";

// VARIABLES PARA LAS OPERACIONES
$xcedulaest = $_POST[ci];
$xid_ingreso = $_REQUEST [id];
$xanoest = $_REQUEST [anoest];
$xcondicion = $_REQUEST [condicion];
$xmp = $_REQUEST [mp];
$MENSAJE = $_REQUEST [mensaje];


$ingresar1 = "ingresar";
$ingresar = base64_encode($ingresar1);

$modificar1 = "modificar";
$modificar = base64_encode($modificar1);


$periodoescolar = $_SESSION ["session_periodoescolar"];
//$periodoescolar = $_POST["periodoescolar"];
?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->

<html>
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ingreso de Materias Pendientes o que Repite</title>
        
        
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<link href="modal/assets/bootstrap.min.css" rel="stylesheet">
<script src="modal/assets/jquery-1.8.3.min.js"></script>
<script src="modal/assets/bootstrap.min.js"></script>

<!-- ARCHIVO JS EN DONDE SE ENCUENTRAN LAS VALIDACIONES DE ESTA CLASE   ESTA LA LA CARPETA js-->
<script src="js/mp_repetir.js"></script>

<!-- ARCHIVO .CCS EN DONDE SE GUARDA LA CONFIGURACION DE ESTILO DE OBJETOS   ESTA LA LA CARPETA CSS-->
<link rel="stylesheet" href="css/estilo_formato.css">


    </head>

    <body onload="visualizar()" oncontextmenu='return false'
          style="background: #e5e5e5; background: url(imagenes/fondo23.jpg) no-repeat fixed center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">



        <div class="gridContainer clearfix"
             style="background: white; box-shadow: 15px 15px 15px #999; border-radius: 15px; border-top-style: solid; border-bottom-style: solid; border-right-style: solid; border-left-style: solid; margin-top: 30px; margin-bottom: 30px">
            <div id="principal" class="fluid">


                <form action="" method="POST">


                    <input type='hidden' name="xmp" id="xmp" value='<?php echo $xmp; ?>'>
                    <input type='hidden' name="xcondicion" id="xcondicion" value='<?php echo $xcondicion; ?>'>

                    <input type='hidden' name="mensaje" id="mensaje" value='<?php echo $MENSAJE; ?>'>


                    <div id="encabezado" align="center">
                        <div id="logo1">
                            <img src="imagenes/MEMBRETE.jpg">
                        </div>

                        <div id="periodoescolar_mostrar" >
                            <h1>Período Escolar: <?php echo $periodoescolar ?></h1>

                            <h4>
                                <a href="principal.php">REGRESAR AL MENÚ PRINCIPAL</a>
                            </h4>

                        </div>

                        <div id="separacion" style="width: auto; height:30px"></div>
                    </div>



                    <div id="enc" class="fluid"  align="center">
                        <B>C.I:</B><input type="text" class="formato" name="textcedulaest" id="textcedulaest" value="<?php echo $xcedulaest; ?>" style="width:120px" readonly>&nbsp;&nbsp;

                        <b>ID:</b><input type="text"  class="formato" name="idcodigo" id="idcodigo" value="<?php echo $xid_ingreso; ?>"  style="width:150px" readonly>&nbsp;&nbsp;

                        <b>Año de Estudio:</b><input type="text"  class="formato" name="anoest" id="anoest" value="<?php echo $xanoest; ?>"  style="width:150px" readonly>&nbsp;&nbsp;
                    </div>

                    <br>
                    <br>

                    <div id="mp" class="fluid"  align="center">

                        <h3>Seleccionar Materias Pendientes</h3>




                        <b>Materia Pendiente 1</b>  <select  name="Combo1" id="Combo1" class="formato" style="width:auto;" onchange ="return validar_combos_materias()" >
                            <option>N/A </option>
                            <option>CASTELLANO</option>
                            <option>INGLES</option>
                            <option>MATEMATICA</option>
                            <option>BIOLOGIA</option>
                            <option>HISTORIA DE VZLA</option>
                            <option>EDUC.FAMILIAR</option>
                            <option>HISTORIA COMTEMP</option>
                            <option>GEOGRAFIA VZLA</option>
                            <option>GEOGRAFIA GENERAL</option>
                            <option>EDUC. ARTISTICA</option>
                            <option>EDUC. FISICA</option>
                            <option>EPT</option>
                            <option>EDUC. SALUD</option>
                            <option>HISTORIA UNIVERSAL</option>
                            <option>FISICA</option>
                            <option>QUIMICA</option>
                            <option>DIBUJO</option>
                            <option>FILOSOFIA</option>
                            <option>FRANCES</option>
                            <option>HIST. DEL ARTE</option>
                            <option>SOCIOLOGIA</option>
                            <option>LATIN</option>
                            <option>CS DE LA TIERRA</option>
                            <option>GEOG. ECONOMICA</option>
                            <option>PRE MILITAR</option>
                        </select>&nbsp;&nbsp;



                        <b>Materia Pendiente 2</b> <select  name="Combo2" id="Combo2" class="formato" style="width:auto; "   onchange ="return validar_combos_materias()">
                            <option>N/A </option>
                            <option>CASTELLANO</option>
                            <option>INGLES</option>
                            <option>MATEMATICA</option>
                            <option>BIOLOGIA</option>
                            <option>HISTORIA DE VZLA</option>
                            <option>EDUC.FAMILIAR</option>
                            <option>HISTORIA COMTEMP</option>
                            <option>GEOGRAFIA VZLA</option>
                            <option>GEOGRAFIA GENERAL</option>
                            <option>EDUC. ARTISTICA</option>
                            <option>EDUC. FISICA</option>
                            <option>EPT</option>
                            <option>EDUC. SALUD</option>
                            <option>HISTORIA UNIVERSAL</option>
                            <option>FISICA</option>
                            <option>QUIMICA</option>
                            <option>DIBUJO</option>
                            <option>FILOSOFIA</option>
                            <option>FRANCES</option>
                            <option>HIST. DEL ARTE</option>
                            <option>SOCIOLOGIA</option>
                            <option>LATIN</option>
                            <option>CS DE LA TIERRA</option>
                            <option>GEOG. ECONOMICA</option>
                            <option>PRE MILITAR</option>
                        </select>

                        <br>
                        <br>
                        <div id="separacion" style="width: auto; height:30px;"></div>

                    </div>
                    <div id="separacion" style="width: auto; height:20px;"></div>

                    <div id="repite">

                        <h3>MATERIA CON QUE REPETIRÁ </h3>

                        <div style="float:left; width:auto; padding-right: 50px">
                            <input type="checkbox" name="checkCASTELLANO" id="checkCASTELLANO" style="height: 20px; width: 25px; "><b>CASTELLANO</b><br>
                            <input type="checkbox" name="checkINGLES" id="checkINGLES" style="height: 20px; width: 25px; "><b>INGLES</b><br>
                            <input type="checkbox" name="checkMATEMATICA" id="checkMATEMATICA" style="height: 20px; width: 25px; "><b>MATEMATICA</b><br>
                            <input type="checkbox" name="checkCSBIOLOGICAS" id="checkCSBIOLOGICAS" style="height: 20px; width: 25px; "><b>BIOLOGIA /EST. NATURALEZA</b><br>
                            <input type="checkbox" name="checkHV" id="checkHV" style="height: 20px; width: 25px; "><b>HISTORIA VZLA / CATEDRA BOLIV.</b><br>
                            <input type="checkbox" name="checkEF" id="checkEF" style="height: 20px; width: 25px; "><b>EDUC. FAMILIAR Y CIUD</b><br>
                            <input type="checkbox" name="checkHC" id="checkHC" style="height: 20px; width: 25px; "><b>HISTORIA CONTEMP</b><br>
                            <input type="checkbox" name="checkGV" id="checkGV" style="height: 20px; width: 25px; "><b>GEOGRAFIA VZLA</b><br> 
                            <input type="checkbox" name="checkGG" id="checkGG" style="height: 20px; width: 25px; "><b>GEOGRAFIA GENERAL</b><br>
                            <input type="checkbox" name="checkEART" id="checkEART" style="height: 20px; width: 25px; "><b>EDUC. ARTISTICA</b><br>
                            <input type="checkbox" name="checkEDFISICA" id="checkEDFISICA" style="height: 20px; width: 25px; "><b>EDUC. FISICA</b><br>
                            <input type="checkbox" name="checkEPT" id="checkEPT" style="height: 20px; width: 25px; "><b>EPT</b><br>
                            <input type="checkbox" name="checkEDSALUD" id="checkEDSALUD" style="height: 20px; width: 25px; "><b>EDUC. SALUD</b><br>
                        </div>


                        <div style="width:auto; padding-right: 50px">
                            <input type="checkbox" name="checkHU" id="checkHU" style="height: 20px; width: 25px; "><b>HISTORIA UNIVERSAL</b><br>
                            <input type="checkbox" name="checkFISICA" id="checkFISICA" style="height: 20px; width: 25px; "><b>FISICA</b><br>
                            <input type="checkbox" name="checkQUIMICA" id="checkQUIMICA" style="height: 20px; width: 25px; "><b>QUIMICA</b><br>
                            <input type="checkbox" name="checkCDIBUJO" id="checkDIBUJO" style="height: 20px; width: 25px; "><b>DIBUJO</b><br>
                            <input type="checkbox" name="checkFILOSOFIA" id="checkFILOSOFIA" style="height: 20px; width: 25px; "><b>FILOSOFIA</b><br>
                            <input type="checkbox" name="checkFRANCES" id="checkFRANCES" style="height: 20px; width: 25px; "><b>FRANCES</b><br>
                            <input type="checkbox" name="checkHISTART" id="checkHISTART" style="height: 20px; width: 25px; "><b>HISTORIA DEL ARTE</b><br>
                            <input type="checkbox" name="checkSOCIOLOGIA" id="checkSOCIOLOGIA" style="height: 20px; width: 25px; "><b>SOCIOLOGIA</b><br> 
                            <input type="checkbox" name="checkLATIN" id="checkLATIN" style="height: 20px; width: 25px; "><b>LATIN</b><br>
                            <input type="checkbox" name="checkCSTIERRA" id="checkCSTIERRA" style="height: 20px; width: 25px; "><b>CS. DE LA TIERRA</b><br>
                            <input type="checkbox" name="checkGEOECONOMICA" id="checkGEOECONOMICA" style="height: 20px; width: 25px; "><b>GEOG. ECONOMICA</b><br>
                            <input type="checkbox" name="checkPREMILITAR" id="checkPREMILITAR" style="height: 20px; width: 25px; "><b>PRE MILITAR</b><br>


                        </div>



                    </div>


                    <div id="separacion" style="width: auto; height:40px;"></div>


                    <div id="botones" class="container-fluid" align="center"
                         style="width: auto">


                        <button class="formato_boton" name="limpiar" id="limpiar"
                                type="reset"
                                style='background: url("/imagenes/limpiar.png"); background-repeat: no-repeat; background-position: top;'
                                onclick="return limpiar_focus();">LIMPIAR</button>
                        &nbsp;

                        <button class="formato_boton" name="ingreso" id="ingreso" type="submit"
                                style='background: url("/imagenes/Notepad2_48x48-32.gif"); background-repeat: no-repeat; background-position: top;'
                                onclick="this.form.action = 'materiaPendiente_Repitiente_operaciones.php'">ASIGNAR</button>
                        &nbsp;

                        <br /> <br>

                    </div>

                </form>

            </div>

            <div id="separacion5" style="width: auto; height: 30px;"></div>


            <div id="pie" class="fluid" align="center">

                <HR width=auto align="center"
                    style="background-color: red; height: 6px;">

                <b>Copyright© 2015: Todos los Derechos Reservados. Sistema Integral
                    de Registro de Control de Estudios y Evaluación</b><br> <b><i>L.N.B.
                        General en Jefe José Francisco Bermúdez, Urb. Guayacán de las
                        Flores, Sector 1, Calle # 5.</i></b><br> <b><i>Teléfonos:
                        0294-511-10.49 /0294-332-48.66 - e-mail:lnbjfb@gmail.com - Twitter:
                        @lnbjfb </i></b><br> <b>Realizado por: ING. JUAN CARLOS RUIZ H</b>


                <div id="separacion3" style="width: auto; height: 50px"></div>

            </div>



        </div>
    </body>
</html>
