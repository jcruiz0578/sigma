<?php

session_start();
?>




<?php

header("Content-type: text/html; charset=utf-8");
include ("conexion/conexion.php");

$usuario1 = trim(($_POST['usuario']));
$pass = trim(($_POST['pass']));
$periodoescolar = trim($_POST['periodoescolar']);



if ($_POST["periodoescolar"] == "N/A") {
    include 'index.php';
    echo "<script type='text/javascript'>
alert('Debe elegir un Periodo Escolar de Trabajo');
window.location='index.php';
</script>";
}


if (empty($_POST["usuario"]) or empty($_POST["pass"])) {
    include 'index.php';
    echo "<script type='text/javascript'>
alert('Ud debe llenar los campos');
window.location='index.php';
</script>";
} else {




    $sql = "select * from usuario where usuario ='$usuario1' and pass='$pass'";
//$	result = mysql_query ( $sql );
    $result = $conexion->query($sql);

    if ($row = $result->fetch_array()) {


//i		f ($row = mysql_fetch_array ( $result )) {

        $usuario = trim($row ['usuario']);
        $categoria = trim($row ['categoria']);
        $nombre = trim($row ['nombre']);
        $status = trim($row ['status']);


// 			para activar sessiones
        $activo = "SI";
        $_SESSION ["activar_session"] = $activo;
//*			****************************************


        $_SESSION ["session_user"] = $usuario;
        $_SESSION ["session_categoria"] = $categoria;
        $_SESSION ["session_nombre"] = $nombre;
        $_SESSION ["session_periodoescolar"] = $periodoescolar;

        
       $mensaje = "mensaje"; 
        
  ?>

<form action="principal.php" name="form1" method="POST">   
<input type="hidden" name='mensaje' id='mensaje' value='<?php echo $mensaje;?>'>

 </form>

<?php  

        if ($status == 'ACTIVO') {
echo "<script type='text/javascript'>
  document.form1.submit() 
  

</script>";
        } else {
            echo "<script type='text/javascript'>
alert('Usuario no esta Activo');
consultar_registros();;
</script>";
        }
    } else {
        include 'index.php';
        echo "<script type='text/javascript'>
alert('Usuario o Contraseña Invalida');
window.location='index.php';
</script>";
    }
}
