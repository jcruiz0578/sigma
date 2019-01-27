<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema Integral de Registro de Control de Estudios y Evaluación</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/styles.css">






</head>

<body>
  <div class="container">
    <div class="col-md-10">
      <div class="col-md-4"></div>
      <div class="col-md-5" id="login">
        <form method="POST" action="logueo.php"  class="form-signin" role="form" >

          <!--<form action="logueo.php" method="POST">-->

          <div class="text-center" >
            <img id="avatar" src="imagenes/nadie.png" alt="avatar">
          </div>

          <div class="fluid"  align="center" >
            <!-- <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario">  -->

            <select id="usuario" name="usuario" class="form-control" style="width: auto; font-size: 16px; font-weight: bold">

              <?php
              /* Conexion a la bd */
              include "conexion/conexion.php";
              $consulta = "SELECT * FROM usuario order by nombre asc "; // sentencia sql
              $result_consulta = $conexion->query($consulta);

              while ($user = $result_consulta->fetch_array()) {
                echo "<option  value='" . $user ["usuario"] ."'>" . $user ["nombre"] . "";



              }

              ?>
            </select>




            <input  id="pass"  name="pass" type="password" class="form-control" placeholder="Password">
            <select id="periodoescolar" name="periodoescolar" class="form-control" style="width: auto; font-size: 18px; font-weight: bold">
              <option >N/A</option>
              <option selected>2018-2019</option>
		          <option >2017-2018</option              
		          <option >2016-2017</option>
              <option >2015-2016</option>
              <option >2014-2015</option>
              <option >2013-2014</option>
              <option >2012-2013</option>
              <option >2011-2012</option>
              <option >2010-2011</option>
              <option >2009-2010</option>

            </select>

          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  <div id="nebaris">

  </div>

  <script src="js/jquery.md5.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>


</body>

</html>
