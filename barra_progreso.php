<!DOCTYPE html>
<html>
<head>
<title>Barra de progreso en Botstrap</title>
<meta name="viewport" content="initial-scale=1.0">
<meta charset="utf-8">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="progress" style="margin: 100px">
		<div id="bar" class="progress-bar progress-bar-striped active"
			role="progressbar" aria-valuenow="0" aria-valuemin="0"
			aria-valuemax="100" style="width: 0%">
			<span class="sr-only">0% Complete</span>
		</div>
	</div>
	<script>
      var progreso = 0;
      var idIterval = setInterval(function(){
        // Aumento en 10 el progeso
        progreso +=1;
        $('#bar').css('width', progreso + '%');
       
      //Si llegó a 100 elimino el interval
        if(progreso == 100){
       clearInterval(idIterval);
      }
      },1000);
    </script>
</body>
</html>