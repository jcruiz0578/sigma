<?php
session_start();
if (isset($_REQUEST ['logout'])) {
    session_destroy();
    header("Location:index.php");
}
?>
<div id="logo1" style="text-align: center">
    <img src="imagenes/MEMBRETE.jpg">
</div>

<div id="logo1" style="text-align: center">
    <marquee> <h1>La Sessi&oacute;n ha Caducado, debido a que permaneci&oacute; el Sistema Mucho Tiempo inactivo</h1></marquee>
    <h2>Por motivos de seguridad debe CERRAR y volver a iniciarse en el Sistema</h2>

    <img src="imagenes/caducar.jpg">

    <h1>  <a href='session_caduca.php?logout'>Cerrar Sessi&oacute;n<?php session_name("session_user"); ?></a></h1>
</div>

<?php
include "pie.php";



