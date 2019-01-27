<?php

// Obtienes el canvas, y lees la imagen codificada en Base64:
?>


<script>
var oCanvas = document.getElementById("foto");
var oData = {
  cMiFoto: oCanvas.toDataURL("image/png"),
  cNombreArchivo: "daniel.png" //el nombre lo leerías de un input
  
  
   
};

//Envías la imagen como un post normal a una página ASP, PHP, servicio web, etc.
jQuery.ajax({
  url: "foto2.php",
  type: "post",
  data: oData
});



</script>

<?php
echo $foto123 = $_POST [foto];
echo '</br>';

echo $imagenB64 = $_POST ["cMiFoto"];
echo $nombreArchivo = $_POST ["cNombreArchivo"];
$imagenBytes = base64_decode ( $imagenB64 );
echo $destino = "fotos/" . $nombreArchivo;
$imagenR = imagecreatefromstring ( $imagenBytes );
imagepng ( $imagenR, $destino );


/*

$imagenB64 = $_POST['cMiFoto'];
$img = substr(($imagenB64),strpos(($imagenB64),',')+1); //Separamos el contenido de la imagen
$encodedData = str_replace(' ','+',$img); //reemplazamos los espacios en blanco para que la imagen no se guarde corruptamente

$imagenBytes = base64_decode($encodedData); //descodificamos
file_put_contents(("foto.png"), $imagenBytes); //guardamos en algun directorio

*/