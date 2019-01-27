
<?php
$fecha_nac1 = $_POST ['fecha_nac'];

// convertir la fecha que viene en formato Y/m/d a d/m/Y
$fecha_nac = date ( "d/m/Y", strtotime ( $fecha_nac1 ) );

// $fecha_actual = date('d/m/Y'); // fecha actul del pc
$fecha_actual = date ( "30/09/2016" ); // para pruebas
                                     
// separamos en partes las fechas
$array_nacimiento = explode ( "/", $fecha_nac );
$array_actual = explode ( "/", $fecha_actual );

$dias = $array_actual [0] - $array_nacimiento [0]; // calculamos dia
$meses = $array_actual [1] - $array_nacimiento [1]; // calculamos meses
$anos = $array_actual [2] - $array_nacimiento [2]; // calculamos año
                                                  
// ajuste de posible negativo en $días
if ($dias < 0) {
	-- $meses;
	
	// ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
	switch ($array_actual [1]) {
		case 1 :
			$dias_mes_anterior = 31;
			break;
		case 2 :
			$dias_mes_anterior = 31;
			break;
		case 3 :
			if (bisiesto ( $array_actual [0] )) {
				$dias_mes_anterior = 29;
				break;
			} else {
				$dias_mes_anterior = 28;
				break;
			}
		case 4 :
			$dias_mes_anterior = 31;
			break;
		case 5 :
			$dias_mes_anterior = 30;
			break;
		case 6 :
			$dias_mes_anterior = 31;
			break;
		case 7 :
			$dias_mes_anterior = 30;
			break;
		case 8 :
			$dias_mes_anterior = 31;
			break;
		case 9 :
			$dias_mes_anterior = 31;
			break;
		case 10 :
			$dias_mes_anterior = 30;
			break;
		case 11 :
			$dias_mes_anterior = 31;
			break;
		case 12 :
			$dias_mes_anterior = 30;
			break;
	}
	
	$dias = $dias + $dias_mes_anterior;
}

// ajuste de posible negativo en $meses
if ($meses < 0) {
	-- $anos;
	$meses = $meses + 12;
}
function bisiesto($anio_actual) {
	$bisiesto = false;
	// probamos si el mes de febrero del año actual tiene 29 días
	if (checkdate ( 2, 29, $anio_actual )) {
		$bisiesto = true;
	}
	return $bisiesto;
}

// echo "<br>Tu edad es: $anos años con $meses meses y $dias días";

$edad = $anos . " AÑOS " . $meses . " MES(ES) ";

$respuesta = new stdClass ();

$respuesta->fecha_nac = $edad;

echo json_encode ( $respuesta );

?>
