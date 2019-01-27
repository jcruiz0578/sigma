<?php

session_start();
include "conexion/conexion.php";
require_once 'phpExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
/*

$objPHPExcel->
        getProperties()
        ->setCreator("TEDnologia.com")
        ->setLastModifiedBy("TEDnologia.com")
        ->setTitle("Exportar Excel con PHP")
        ->setSubject("Documento de prueba")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("usuarios phpexcel")
        ->setCategory("reportes");




$registros_vigente = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest=ingresos.cedulaest and anoest ='2DO AÑO' and seccion ='C'  and periodoescolar='2014-2015' order by anoest,seccion, ingresos.cedulaest asc "; // sentencia sql
$result_vigente = $conexion->query($registros_vigente);
$i = 4;
while ($user = $result_vigente->fetch_array()) {

     $id_ingreso = $user [id_ingreso];
    $cedulaest = $user [cedulaest];
    $apellidosest = $user [apellidosest];
    $nombresest = $user [nombresest];
    $status = $user [status];
     $anoest = $user [anoest];
      $seccion = $user [seccion];
    $nombre = $apellidosest . ", " . $nombresest;


    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $id_ingreso)
            ->setCellValue('B'.$i, $cedulaest)
            ->setCellValue('C'.$i, $nombre)
            ->setCellValue('D'.$i, $anoest)
            ->setCellValue('E'.$i, $seccion);
     $i++;       
}
$objPHPExcel->getActiveSheet()->setTitle('Usuarios');
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;
 * 
 * 
 */

//Creo un objeto Excel 2007
$objReader = new PHPExcel_Reader_Excel2007();

//Cargo el excel
$objPHPExcel = $objReader->load("prueba.xlsx");

//Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0);

//Escribo
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'C.I.. 14174208');
$objPHPExcel->getActiveSheet()->SetCellValue('C2', 'JUAN CARLOS RUIZ');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

chmod("prueba.xlsx", 0777);
$objWriter->save("prueba.xlsx");

$identificador = fopen("prueba.xlsx", "w+");
echo 'LISTOOOOOO   ahoraaaa';



