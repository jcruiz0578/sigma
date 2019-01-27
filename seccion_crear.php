<?php
session_start();

// sifrar variables que se enviaran por post
$operacion1 = "insertar";
$operacion = base64_encode($operacion1);




include "conexion/conexion.php";
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
    <!--<![endif]-->
    <head>

        <meta charset="utf-8">

        <title>Sistema Integral de Registro de Control de Estudios y Evaluación</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">


        <script >
            /*
             $(document).ready(function() {

             $("#seccion").focusout(function () {

             $.ajax({
             url: 'seccion_proceso.php',
             type: 'POST',
             dataType: 'json',
             data: {periodoescolar: $('#periodoescolar').val(),
             anoest: $('#anoest').val(),
             seccion: $('#seccion').val()
             }

             }).done(function(respuesta) {

             $("#resultado").val(respuesta.seccion);


             });
             });
             });
             */
        </script>







        <script>
            /*
             function valida1() {
             document.forma.action = "javascript:crear_seccion()";
             document.forma.method = 'POST';
             document.forma.submit();
             }
             */
        </script>


    </head>

    <body>

        <div id="principal" class="container table-responsive">

            <form name="forma" id="forma" action="secciones_operaciones.php?operaciones=<?php echo $operacion ?>"  method="POST">

                <h3>Crear Sección</h3>

                <?php
                /*
                  if (isset($_POST[submit])) {
                  $periodoescolar = $_POST['periodoescolar'];
                  $anoest = $_POST['anoest'];
                  $seccion = $_POST['seccion'];


                  $seccion2 = $anoest . $seccion . "_" . $periodoescolar;
                  }

                 */
                ?>


           <!--     <label><b>Período Escolar:</b></label><select id="periodoescolar" name="periodoescolar" class="form-control" style="width: auto; font-size: 18px; font-weight: bold">
                    <option value="<?php echo $periodoescolar ?> "><?php echo $periodoescolar ?></option>
                    <option >2014-2015</option>
                    <option >2013-2014</option>
                    <option >2012-2013</option>
                    <option >2011-2012</option>
                    <option >2010-2011</option>
                    <option >2009-2010</option>

                </select>-->
                <br>
                <label><b>Año de Estudio:</b></label><select id="anoest" name="anoest" class="form-control" style="width: auto; font-size: 18px; font-weight: bold">
                    <option >N/A</option>
                    <option value="1">1ER AÑO</option>
                    <option value="2">2DO AÑO</option>
                    <option value="3">3ER AÑO</option>
                    <option value="4">4TO AÑO CS</option>
                    <option value="5">5TO AÑO CS</option>

                </select>
                <br>

                <label><b>Sección:</b></label><select id="seccion" name="seccion" class="form-control" style="width: auto; font-size: 18px; font-weight: bold">
                    <option >N/A</option>
                    <option >A</option>
                    <option >B</option>
                    <option >C</option>
                    <option >D</option>
                    <option >E</option>
                    <option >F</option>
                    <option >G</option>
                    <option >H</option>

                </select>
                <br>
             <!--   <input type="text" id="resultado"   placeholder="De Click Aqui.." readonly   style="width: 200px; height: auto; text-align: center; font-size: 18px; font-weight: bold">-->


                <br>
                <button class="btn btn-primary dropdown-toggle" id="submit" name="submit" type="submit" >  <span class="glyphicon glyphicon-save"></span> Guardar</button>
                <button class="btn btn-lg  btn-default btn btn-success" id="reset" name="reset" type="reset" >  <span class="glyphicon glyphicon-save"></span> Limpiar</button>

            </form>
        </div>


    </body>


</html>
