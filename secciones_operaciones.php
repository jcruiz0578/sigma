   <?php

   session_start();
   include "conexion/conexion.php";


   $operaciones1 = $_GET[operaciones];

   $operaciones = base64_decode($operaciones1);


   $codigo1 = $_GET[cod];
   $codigo =  base64_decode($codigo1);

   echo 'la operacion es :'. $operaciones;

   echo '<br>';
   echo 'el codigo es:'. $codigo;



   if ($operaciones == "insertar") {

      // recibir las variables para formar el cod de la seccion 
    $periodoescolar = $_SESSION ["session_periodoescolar"];
    $anoest = $_POST['anoest'];
    $seccion1 = $_POST['seccion'];

    $seccion = $anoest . $seccion1 . "_" . $periodoescolar;

    
  // realizar una busqueda para verificar si la seccion existe    
  $consulta = "SELECT * FROM secciones where id_anoest_seccion= '$seccion'  "; // sentencia sql
  $result_consulta = $conexion->query($consulta);

  if (!($row = $result_consulta->fetch_array())) {
    
   $insertar = "INSERT into secciones (id_anoest_seccion, periodoescolar, id_anoest, seccion) values ('$seccion', '$periodoescolar', '$anoest', '$seccion1')";
   $result = $conexion->query($insertar)  or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );
   
   include 'principal.php';
   echo "<script type='text/javascript'>
   alert('La Sección se ha Ingresado Sastisfactoriamente....');
   javascript:secciones_mostrar();
   
  </script>";
  exit ();
  } else {
   include 'principal.php';
   echo "<script type='text/javascript'>
   alert('Esta Sección Ya fue Creada....');
   javascript:crear_seccion();
   
  </script>";
  exit ();
  }  

  }



  if ($operaciones == "Eliminar") {
    $categoria =$_SESSION ["session_categoria"];
    
    if(!($categoria== 'ADMINISTRADOR')){
     include 'principal.php';
     echo "<script type='text/javascript'>
     alert('Su usuario no tiene los permisos para eliminar secciones... consulte con el administrador de Sistema');
     javascript:secciones_mostrar();
     
   </script>";
   exit ();   
  }else {
    
     // se elimina el registro
    $eliminar = "DELETE FROM secciones WHERE  id_anoest_seccion='$codigo' ";
    
    $result = $conexion->query($eliminar)  or die ( "LA ELIMINACIÓN DE DATOS A FALLADO:$eliminar" .$eliminar.mysqli_error($conexion) );
    
    include 'principal.php';
    echo "<script type='text/javascript'>
    alert('Se Realizo con exito la Eliminación ');
    javascript:secciones_mostrar();
    
  </script>";
  exit ();   


  }

  }


