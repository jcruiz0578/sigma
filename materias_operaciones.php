<?php

   session_start();
   include "conexion/conexion.php";


   $operaciones1 = $_GET[operaciones];

   $operaciones = base64_decode($operaciones1);


  // echo 'la operacion es :'. $operaciones;

  $periodoescolar = $_SESSION ["session_periodoescolar"];
   $area_aprendizaje = $_POST[area_aprendizaje];
   $materias = $_POST[materias];
   $anoest = $_POST[anoest];
   $hras = $_POST[hras];


   
   if ($operaciones == "insertar") {

      // recibir las variables para formar el cod de la seccion 
   
    
    $id_materia = $materias . "-" .$anoest;
 

//echo "<a href='principal.php'>Regresar</a>"; 
 

   
  // realizar una busqueda para verificar si la seccion existe    
  $consulta = "SELECT * FROM materias where id_materia= '$id_materia'  "; // sentencia sql
  $result_consulta = $conexion->query($consulta);

  if (!($row = $result_consulta->fetch_array())) {
    
   $insertar = "INSERT into materias (id_materia, id_anoest, materia, area, hrs) values ('$id_materia', '$anoest', '$materias', '$area_aprendizaje', '$hras')";
   $result = $conexion->query($insertar)  or die ( "LA INSERCION DE DATOS A FALLADO:$insertar" );
   
   include 'principal.php';
   echo "<script type='text/javascript'>
   alert('La Materia se ha Ingresado Sastisfactoriamente....');
   javascript:materias_mostrar();
   
  </script>";
  exit ();
  } else {
   include 'principal.php';
   echo "<script type='text/javascript'>
   alert('Esta Materia Ya fue Creada....');
   javascript:rear_materia();
   
  </script>";
  exit ();
  }  

  }

/*

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
*/