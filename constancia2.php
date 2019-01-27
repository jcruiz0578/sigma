<?php
// session_start();
require ('fpdf/fpdf.php');
class PDF extends FPDF {
	protected $B = 0;
	protected $I = 0;
	protected $U = 0;
	protected $HREF = '';
	function WriteHTML($html) {
		// Intérprete de HTML
		$html = str_replace ( "\n", ' ', $html );
		$a = preg_split ( '/<(.*)>/U', $html, - 1, PREG_SPLIT_DELIM_CAPTURE );
		foreach ( $a as $i => $e ) {
			if ($i % 2 == 0) {
				// Text
				if ($this->HREF)
					$this->PutLink ( $this->HREF, $e );
				else
					$this->Write ( 5, $e );
			} else {
				// Etiqueta
				if ($e [0] == '/')
					$this->CloseTag ( strtoupper ( substr ( $e, 1 ) ) );
				else {
					// Extraer atributos
					$a2 = explode ( ' ', $e );
					$tag = strtoupper ( array_shift ( $a2 ) );
					$attr = array ();
					foreach ( $a2 as $v ) {
						if (preg_match ( '/([^=]*)=["\']?([^"\']*)/', $v, $a3 ))
							$attr [strtoupper ( $a3 [1] )] = $a3 [2];
					}
					$this->OpenTag ( $tag, $attr );
				}
			}
		}
	}
	function OpenTag($tag, $attr) {
		// Etiqueta de apertura
		if ($tag == 'B' || $tag == 'I' || $tag == 'U')
			$this->SetStyle ( $tag, true );
		if ($tag == 'A')
			$this->HREF = $attr ['HREF'];
		if ($tag == 'BR')
			$this->Ln ( 5 );
	}
	function CloseTag($tag) {
		// Etiqueta de cierre
		if ($tag == 'B' || $tag == 'I' || $tag == 'U')
			$this->SetStyle ( $tag, false );
		if ($tag == 'A')
			$this->HREF = '';
	}
	function SetStyle($tag, $enable) {
		// Modificar estilo y escoger la fuente correspondiente
		$this->$tag += ($enable ? 1 : - 1);
		$style = '';
		foreach ( array (
				'B',
				'I',
				'U' 
		) as $s ) {
			if ($this->$s > 0)
				$style .= $s;
		}
		$this->SetFont ( '', $style );
	}
	function PutLink($URL, $txt) {
		// Escribir un hiper-enlace
		$this->SetTextColor ( 0, 0, 255 );
		$this->SetStyle ( 'U', true );
		$this->Write ( 5, $txt, $URL );
		$this->SetStyle ( 'U', false );
		$this->SetTextColor ( 0 );
	}
}

$html = utf8_decode ( 'Ahora puede imprimir fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b> También puede incluir enlaces en el
texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.' );

$pdf = new PDF ();
// Primera página
$pdf->AddPage ();
$pdf->SetFont ( 'Arial', '', 20 );
$pdf->Write ( 5, 'Para saber qué hay de nuevo en este tutorial, pulse ' );
$pdf->SetFont ( '', 'U' );
$link = $pdf->AddLink ();
$pdf->Write ( 5, 'aquí', $link );
$pdf->SetFont ( '' );
// Segunda página

$pdf->SetMargins ( 30, 30, 25 );

// Establecemos el margen inferior:
$pdf->SetAutoPageBreak ( true, 25 );

$pdf->AddPage ();
$pdf->SetLink ( $link );
$pdf->Image ( 'imagenes/MEMBRETE.jpg', 10, 12, 30, 0, '', 'http://www.fpdf.org' );

// $pdf->SetFont('Arial','',14);
// $pdf->MultiCell(170,10,$html);

$pdf->SetFontSize ( 14 );
$pdf->WriteHTML ( $html );
$pdf->Output ();








/*
$pdf=new FPDF('P','mm','Letter');



#Establecemos los márgenes izquierda, arriba y derecha: 
$pdf->SetMargins(30, 25 , 30); 

#Establecemos el margen inferior: 
$pdf->SetAutoPageBreak(true,25);  
$pdf->AddPage();
$pdf->Image('imagenes/MEMBRETE.jpg', 15, 8, 180); 



$pdf->SetFont('Arial','B',16);
$pdf->ln ( 10 );
 
$pdf->cell ( 0, 5, utf8_decode ( 'CONSTANCIA DE ESTUDIO' ), 0, 0, 'C' );
$pdf->ln ( 10 );
 include "conexion/conexion.php";
    $nombres = trim($_POST[nombresest]);
    $apellidos = trim($_POST[apellidosest]);
    
   $apellidos_nombres = $apellidos.", ".$nombres;
    
    $cedula = trim($_POST[cedulaest]);
   
    
    $anno = trim($_POST[annoest]);
    $seccion = trim($_POST[seccion]);
    $anno_estudio = trim($anno . "  Seccion  " . $seccion);

   // $periodoescolar = $_SESSION ["session_periodoescolar"];
    $periodoescolar = "2016-2017";
    include 'consulta_tabla_general.php';



 $ceduladir = number_format($ceduladirector, 0, '', '.');
 $cedulaest = number_format($cedula, 0, '', '.');

    date_default_timezone_set("America/Caracas");
    setlocale(LC_TIME, 'es_ES.UTF-8'); 
    
    $contenido = "      El Suscrito El Suscrito Director(E) del". "<b>". "L.N.B. GENERAL EN JEFE JOSÉ FRANCISCO BERMÚDEZ,"."</b>". " Profesor "."<b>".$nombredirector. "</b>". " portador de la C.I. N° V-". "<b>".$ceduladir . "</b>". 
		" hace constar por medio de la presente que el(la) Estudiante "."<b>".$apellidos_nombres."; " ."</b>". "portador(a) de la "."<b>"." C.I.N° V-".$cedulaest.", "."</b>". " es Estudiante regular del "."<b>".$anno_estudio . ", ". "</b>". 
		" durante el Periodo Escolar  ". "<b>". $periodoescolar."</b>";







 
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(170,10,utf8_decode($contenido));




$pdf->Output();
 
*/