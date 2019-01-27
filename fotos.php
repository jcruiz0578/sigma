<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Prueba de cámara Web</title>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<style type="text/css">
.contenedor {
	width: 350px;
	float: left;
}

.titulo {
	font-size: 12pt;
	font-weight: bold;
}

#camara, #foto {
	width: 320px;
	min-height: 240px;
	border: 1px solid #008000;
}
</style>
<script>
        //Nos aseguramos que estén definidas
        //algunas funciones básicas
            window.URL = window.URL || window.webkitURL;
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function () {
                alert('Su navegador no soporta navigator.getUserMedia().');
            };
            jQuery(document).ready(function () {
        //Este objeto guardará algunos datos sobre la cámara
                window.datosVideo = {
                    'StreamVideo': null,
                    'url': null
                };

                jQuery('#botonIniciar').on('click', function (e) {
        //Pedimos al navegador que nos de acceso a
        //algún dispositivo de video (la webcam)
                    navigator.getUserMedia({'audio': false, 'video': true}, function (streamVideo) {
                        datosVideo.StreamVideo = streamVideo;
                        datosVideo.url = window.URL.createObjectURL(streamVideo);
                        jQuery('#camara').attr('src', datosVideo.url);
                    }, function () {
                        alert('No fue posible obtener acceso a la cámara.');
                    });
                });
                jQuery('#botonDetener').on('click', function (e) {
                    if (datosVideo.StreamVideo) {
                        datosVideo.StreamVideo.stop();
                        window.URL.revokeObjectURL(datosVideo.url);
                    }
                    ;
                });

                jQuery('#botonFoto').on('click', function (e) {
                    var oCamara,
                            oFoto,
                            oContexto,
                            w, h;

                    oCamara = jQuery('#camara');
                    oFoto = jQuery('#foto');
                    w = oCamara.width();
                    h = oCamara.height();
                    oFoto.attr({'width': w, 'height': h});
                    oContexto = oFoto[0].getContext('2d');
                    oContexto.drawImage(oCamara[0], 0, 0, w, h);


                });


jQuery('#botonenviar').on('click', function(e){
//Obtienes el canvas, y lees la imagen codificada en Base64:
var canvas = document.getElementById("foto");
var dataURL = canvas.toDataURL();
console.log(dataURL);



var oData = {
  cMiFoto: canvas.toDataURL("image/png"),
cNombreArchivo: 'foto.png' //el nombre lo leerías de un input
};



//Envías la imagen como un post normal a una página ASP, PHP, servicio web, etc.
jQuery.ajax({
url: "foto2.php",
type: "post",
data: oData

});
});






            });
        </script>




</head>
<body>



	<div id='botonera'>
		<input id='botonIniciar' type='button' value='Iniciar'> <input
			id='botonDetener' type='button' value='Detener'> <input
			id='botonFoto' type='button' value='Foto'> <input id='botonenviar'
			type='button' value='Enviar'>


	</div>
	<div class="contenedor">
		<div class="titulo">Cámara</div>
		<video id="camara" autoplay controls></video>
	</div>
	<div class="contenedor">
		<div class="titulo">Foto</div>
		<canvas id="foto"></canvas>
	</div>


</body>
</html>