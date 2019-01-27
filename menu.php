<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <!--
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
 -->
 <link href="modal/assets/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="css/default.css" type="text/css" rel="stylesheet">


  <style>
  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }
  </style>



</head>
<body>

  <div class="container-fluid">
    <div class="row-fluid">

      <!--  <div class="span10 offset2"> -->

      <div class="btn-toolbar">
        <div class="btn-group">
          <button class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Estudiantes <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="javascript:consultar_estudiante();">Ingresos y Egresos</a></li>

        <!--    <li><a href="javascript:consultar_seccion();">Buscar</a></li>-->
        <li><a href="buscar_asignar.php">Buscar Estudiantes y Asignar Sección</a></li>
         <li><a href="buscar_asignar_existente.php">Assignar Secciones por Porcedencia</a></li>
        <li><a href="consulta_seccion.php">Mostrar Datos Generales por año y sección</a></li>
        <li><a href="reporte_nuevos_ingresos.php">Mostrar Nuevos Ingresos</a></li>
            <li><a href="reporte_inscrito_institucion.php">Mostrar estudiantes 1er año por Procedencia  </a></li>
             <li><a href="reporte_inscrito_institucion_anno.php">Mostrar por Año de estudio y su observación </a></li>



            <li class="divider"></li>
            <li><a href="principal.php">Regresar</a></li>
          </ul>
        </div>
        <div class="btn-group">
          <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Secciones y Materias <span class="caret"></span></button>
          <ul class="dropdown-menu">

            <li><a href="javascript:secciones_mostrar()">Operaciones con Secciones</a></li>
            <li class="divider"></li>
            <li><a href="javascript:materias_mostrar();">Operaciones con Materias</a></li>
            <li class="divider"></li>
            <li><a href="principal.php">Regresar</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Calificaciones <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="calificaciones_ingresar.php">Ingresar Calificaciones Individuales</a></li>
            <li><a href="#">Consultar y Modificar Calificaciones Individuales</a></li>
            <li class="divider"></li>
            <li><a href="#">Ingresar Calificaciones por Sección</a></li>
            <li><a href="#">Consultar y Modificar Calificaciones por Sección</a></li>
            <li class="divider"></li>
            <li><a href="principal.php">Regresar</a></li>
          </ul>
        </div>

        <div class="btn-group">
          <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Docentes <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">Ingresar Datos Globales</a></li>
            <li><a href="#">Consultar y Modificar Datos Globales </a></li>
            <li class="divider"></li>
            <li><a href="#">Asignar Materias</a></li>
            <li><a href="#">Consultar y Modificar Asignaciones de  Materias</a></li>
            <li class="divider"></li>
            <li><a href="principal.php">Regresar</a></li>
          </ul>
        </div>


        <div class="btn-group">
          <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Reportes y Estadisticas <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu">
              <a class="test" href="#">Matricula por Año y Sexo <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="matricula.php?proceso=actual">Actual</a></li>
                <li><a href="matricula.php?proceso=inicial">Inicial</a></li>
                <li><a href="matricula.php?proceso=ingresos">Ingresos</a></li>
                <li><a href="matricula.php?proceso=egresos">Egresos</a></li>
              </ul>
              <li class="divider"></li>

              <li class="dropdown-submenu">
                <a class="test" href="#">Matricula por Año Edad y Sexo <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="matricula_edad.php?proceso=actual">Actual</a></li>
                  <li><a href="matricula_edad.php?proceso=inicial">Inicial</a></li>
                  <li><a href="matricula_edad.php?proceso=ingresos">Ingresos</a></li>
                  <li><a href="matricula_edad.php?proceso=egresos">Egresos</a></li>
                </ul>

                  <li class="divider"></li>
                <li class="dropdown-submenu">
                <a class="test" href="#">Documentos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:constancias();">Costancia de Estudio</a></li>

                </ul>

                <li class="divider"></li>



                <li><a href="#">Graficas de:</a></li>
                <li class="divider"></li>
                <li><a href="principal.php">Regresar</a></li>
              </ul>
            </div>
            <div class="btn-group">
              <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Administración del Sistema<span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="javascript:usuarios();">Operaciones con Usuarios</a></li>
                <li><a href="#">Sincronización de Base de Datos</a></li>
                <li><a href="#">Respaldo de Base de Datos</a></li>
                <li><a href="#">Restauración de Base de Batos</a></li>
                <li class="divider"></li>
                <li><a href="principal.php">Regresar</a></li>
              </ul>
            </div>
            <div class="btn-group">
              <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Comedor <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="comedor_consultar.php">Registro de Estudiantes</a></li>
                  <li><a href="comedor_busqueda.php">Consultar</a></li>
                <li class="divider"></li>
                <li><a href="principal.php">Regresar</a></li>
              </ul>
            </div>
          </div>
          <!--</div>-->
        </div>
      </div>
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/twitter-bootstrap-hover-dropdown.min.js"></script>

      <script>
      $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
        });
      });
      </script>



    </body>
    </html>
