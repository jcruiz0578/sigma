<?php

//session_start();
//include "conexion/conexion.php";
$periodoescolar = $_SESSION["session_periodoescolar"];
//$periodoescolar = "2015-2016";


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



		 if ($proceso == 'actual') {
		$consulta = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest = ingresos.cedulaest and   periodoescolar ='$periodoescolar' and anoest = '$anno' and   sexoest = '$sexo' and  status ='I' ";
		  $titulo = "MATRICULA GENERAL ACTUAL POR AÑO, SEXO Y EDAD ";
		
                 }     
                 
                 
                  if ($proceso == 'inicial') {
		$consulta = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest = ingresos.cedulaest and   periodoescolar ='$periodoescolar' and anoest = '$anno' and   sexoest = '$sexo' and  status ='I' and ingresos.fecha_ingreso between '$mes_julio' and '$fecha_mi' ";
		$titulo = "MATRICULA INICIAL POR AÑO, SEXO Y EDAD";
		
                 }  
                 
                 
                 if ($proceso == 'ingresos') {
		$consulta = "SELECT * FROM ingresos, estudiantes where estudiantes.cedulaest = ingresos.cedulaest and   periodoescolar ='$periodoescolar' and anoest = '$anno' and   sexoest = '$sexo' and  status ='I' and ingresos.fecha_ingreso >='$fecha_mi_despues' ";
		 $titulo = "MATRICULA DE NUEVOS INSCRITOS O INGRESOS POR AÑO, SEXO Y EDAD";
		
                 }  
                 
                 
                 if ($proceso == 'egresos') {
		$consulta = "SELECT * FROM  estudiantes, egresos, ingresos where egresos.periodoescolar ='$periodoescolar' and anoest = '$anno'   and  sexoest = '$sexo' and  estudiantes.cedulaest=egresos.cedulaest and ingresos.id_ingreso = egresos.id_ingreso ";
		 $titulo = "MATRICULA DE EGRESOS POR AÑO, SEXO Y EDAD";
		
                 }   
                
                
                
                $result = $conexion->query($consulta);


		while ($row = $result->fetch_array()) {

			//calculo de la edad******************
			$fecha_nac1  = $row[fnest];

			// convertir la fecha que viene en formato Y/m/d   a  d/m/Y
			$fecha_nac = date("d/m/Y", strtotime($fecha_nac1));

			//$fecha_actual = date('d/m/Y'); // fecha actul del pc
			$fecha_actual = date ("31/03/2018"); //para pruebas



			// separamos en partes las fechas
			$array_nacimiento = explode ( "/", $fecha_nac);
			$array_actual = explode ( "/", $fecha_actual );

			$dias =  $array_actual[0] - $array_nacimiento[0]; // calculamos dia
			$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
			$anos =  $array_actual[2] - $array_nacimiento[2]; // calculamos año

			//ajuste de posible negativo en $días
			if ($dias < 0)
			{
				--$meses;

				//ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
				switch ($array_actual[1]) {
					case 1:     $dias_mes_anterior=31; break;
					case 2:     $dias_mes_anterior=31; break;
					case 3:
					if (bisiesto($array_actual[0]))
					{
						$dias_mes_anterior=29; break;
					} else {
						$dias_mes_anterior=28; break;
					}
					case 4:     $dias_mes_anterior=31; break;
					case 5:     $dias_mes_anterior=30; break;
					case 6:     $dias_mes_anterior=31; break;
					case 7:     $dias_mes_anterior=30; break;
					case 8:     $dias_mes_anterior=31; break;
					case 9:     $dias_mes_anterior=31; break;
					case 10:     $dias_mes_anterior=30; break;
					case 11:     $dias_mes_anterior=31; break;
					case 12:     $dias_mes_anterior=30; break;
				}

				$dias=$dias + $dias_mes_anterior;
			}

			//ajuste de posible negativo en $meses
			if ($meses < 0)
			{
				--$anos;
				$meses=$meses + 12;
			}



			// 			condicionamos la busqueda por la edad
			if ($anos == 10) {
				$f10[$x][$i]++;
			}
			if ($anos == 11) {
				$f11[$x][$i]++;
			}
			if ($anos == 12) {
				$f12[$x][$i]++;
			}
			if ($anos == 13) {
				$f13[$x][$i]++;
			}
			if ($anos == 14) {
				$f14[$x][$i]++;
			}
			if ($anos == 15) {
				$f15[$x][$i]++;
			}
			if ($anos == 16) {
				$f16[$x][$i]++;
			}
			if ($anos == 17) {
				$f17[$x][$i]++;
			}
			if ($anos == 18) {
				$f18[$x][$i]++;
			}
			if ($anos == 19) {
				$f19[$x][$i]++;
			}
			if ($anos == 20) {
				$f20[$x][$i]++;
			}
			if ($anos == 21) {
				$f21[$x][$i]++;
			}
			//s			acar los totales de cada sexo por edad
			$ft[$x][$i] = $f10[$x][$i] + $f11[$x][$i] + $f12[$x][$i] + $f13[$x][$i] + $f14[$x][$i] + $f15[$x][$i] + $f16[$x][$i] + $f17[$x][$i] + $f18[$x][$i] + $f19[$x][$i] + $f20[$x][$i] + $f21[$x][$i];
			//*			*************************************
		}
		// 		FIN DEL CICLO FOR PARA SIMPLIFICAR EL SEXO
	}
	// 	total por año de estudio
	$tt[$x] = $ft[$x][1] + $ft[$x][2];
	//S	E crea el calculo de valores totales de sexo por edad
	// 	$x = al año de etudio   $i= al sexo donde 1= femenino y 2=masculinmasc
	$fem10 = $fem10 + $f10[$x][1];
	$fem11 = $fem11 + $f11[$x][1];
	$fem12 = $fem12 + $f12[$x][1];
	$fem13 = $fem13 + $f13[$x][1];
	$fem14 = $fem14 + $f14[$x][1];
	$fem15 = $fem15 + $f15[$x][1];
	$fem16 = $fem16 + $f16[$x][1];
	$fem17 = $fem17 + $f17[$x][1];
	$fem18 = $fem18 + $f18[$x][1];
	$fem19 = $fem19 + $f19[$x][1];
	$fem20 = $fem20 + $f20[$x][1];
	$fem21 = $fem21 + $f21[$x][1];
	$masc10 = $masc10 + $f10[$x][2];
	$masc11 = $masc11 + $f11[$x][2];
	$masc12 = $masc12 + $f12[$x][2];
	$masc13 = $masc13 + $f13[$x][2];
	$masc14 = $masc14 + $f14[$x][2];
	$masc15 = $masc15 + $f15[$x][2];
	$masc16 = $masc16 + $f16[$x][2];
	$masc17 = $masc17 + $f17[$x][2];
	$masc18 = $masc18 + $f18[$x][2];
	$masc19 = $masc19 + $f19[$x][2];
	$masc20 = $masc20 + $f20[$x][2];
	$masc21 = $masc21 + $f21[$x][2];
	//*	*******************************************************
	// 	CALCULAR EL TOTAL DE LA TOTALIDAD DEL SEXO
	$totalfemenino = $totalfemenino + $ft[$x][1];
	$totalmasculino = $totalmasculino + $ft[$x][2];
	// 	totalizar los totales por año
	$ttotal = $ttotal + $tt[$x];
	// 	fin del ciclo para el año escolar
}
