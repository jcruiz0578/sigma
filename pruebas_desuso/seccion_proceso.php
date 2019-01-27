<?php


$periodoescolar = $_POST['periodoescolar'];


                    $anoest = $_POST['anoest'];
                   $seccion = $_POST['seccion'];

                    $seccion2 = $anoest . $seccion . "_" . $periodoescolar;
$respuesta = new stdClass();

$respuesta->seccion = $seccion2;

echo json_encode($respuesta);

?>   