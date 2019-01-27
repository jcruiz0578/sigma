<?php

//session_start();
include "conexion/conexion.php";

$periodoescolar = $_SESSION ["session_periodoescolar"];
//$		periodoescolar = "2016-2017";



include "consulta_tabla_general.php";




for ($x = 1; $x < 6; $x++) {

    if ($x == 1) {
        $anno = "1ER AÑO";
    }
    if ($x == 2) {
        $anno = "2DO AÑO";
    }
    if ($x == 3) {
        $anno = "3ER AÑO";
    }

    if ($x == 4) {
        $anno = "4TO AÑO CS";
    }

    if ($x == 5) {
        $anno = "5TO AÑO CS";
    }

    /*
      echo "</br>";
      echo "EL AÑO DE ESTUDIO ES  ". $anno;
      echo "</br>";
     */
    // 	ciclo para el sexo del estudiante
    for ($i = 1; $i < 3; $i++) {
        if ($i == 1) {
            $sexo = "F";
        }

        if ($i == 2) {
            $sexo = "M";
        }

        
             
        
        
        //***PROCESO*********************


        if ($proceso == 'actual') {
            $contar = "SELECT COUNT(sexoest) as total FROM  estudiantes, ingresos where periodoescolar ='$periodoescolar' and anoest = '$anno'   and  sexoest = '$sexo' and status ='I' and  estudiantes.cedulaest= ingresos.cedulaest ";
        
            $titulo = "MATRICULA GENERAL ACTUAL POR AÑO Y SEXO";
        }

        if ($proceso == 'inicial') {
            $contar = "SELECT COUNT(sexoest) as total FROM  estudiantes, ingresos where periodoescolar ='$periodoescolar' and anoest = '$anno'   and  sexoest = '$sexo' and status ='I' and  estudiantes.cedulaest= ingresos.cedulaest and ingresos.fecha_ingreso between '$mes_julio' and '$fecha_mi' ";
        
             $titulo = "MATRICULA INICIAL POR AÑO Y SEXO";
        }


        if ($proceso == 'ingresos') {
            $contar = "SELECT COUNT(sexoest) as total FROM  estudiantes, ingresos where periodoescolar ='$periodoescolar' and anoest = '$anno'   and  sexoest = '$sexo' and status ='I' and  estudiantes.cedulaest= ingresos.cedulaest and ingresos.fecha_ingreso >='$fecha_mi_despues' ";
        
             $titulo = "MATRICULA DE NUEVOS INSCRITOS O INGRESOS POR AÑO Y SEXO";
        }


        if ($proceso == 'egresos') {
            $contar = "SELECT COUNT(sexoest) as total FROM  estudiantes, egresos, ingresos where egresos.periodoescolar ='$periodoescolar' and anoest = '$anno'   and  sexoest = '$sexo' and  estudiantes.cedulaest=egresos.cedulaest and ingresos.id_ingreso = egresos.id_ingreso ";
       
              $titulo = "MATRICULA DE EGRESOS POR AÑO Y SEXO";
            }



        $resultado = $conexion->query($contar);
        $fila = $resultado->fetch_array();
        $total[$x][$i] = $fila["total"];

        // 		FIN DEL PROCESO **************
        // 		FIN DEL CICLO FOR PARA SIMPLIFICAR EL SEXO
    }

    // 	LA VARIABLE $totalsexo acumula la sumatoria de la cantidad de femenino y masculino
    //e	cho "EL TOTALES DE LA SUMA DE LOS SEXOS ES ".$totalsexo[$x]= $total[$x][1]+$total[$x][2]."</br>";
    $totalsexo[$x] = $total[$x][1] + $total[$x][2];


    //e	cho "</br>";
    // 	ACUMULAR LA CANTIDAD DE TODOS LOS FEMENINOS DEL PROCEDO
    $totalf = $total[$x][1] + $totalf;

    // 	ACUMULAR LA CANTIDAD DE TODOS LOS MASCULINOS DEL PROCEDO
    $totalm = $total[$x][2] + $totalm;

    // 	aqui sumaremos todos los totales de cada año para tenr el total final

    $totaltotal = $totalsexo[$x] + $totaltotal;
    // 	tambien se pudiera realizar de la siguiente forma
    // 	$totaltotal=$totalf+$totalm
    //e	cho "</br>";
    // 	fin del ciclo para el año escolar
}

