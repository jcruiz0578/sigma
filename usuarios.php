    <?php
   

    include "conexion/conexion.php";

    
      ?>
      <!-- AQUI PARA LA PAGINACION DE LAS TABLAS Y LAS VENTANAS MODALES-->

      <link href="modal/assets/bootstrap.min.css" rel="stylesheet">
      
      <script src="modal/assets/jquery-1.8.3.min.js"></script>
      <script src="modal/assets/bootstrap.min.js"></script>
      <style type="text/css">
          .well { background: #fff; text-align: center; }
          .modal { text-align: left; }
      </style>
     <script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery-DT-pagination.js"></script>
<script >
    $(document).ready(function () {
        $('#tabla').dataTable({
            "bSort": false, // Disable sorting
            "iDisplayLength": 10, // records per page
            "sDom": "t<'row'<'col-md-4'i><'col-md-4'p>>",
            "sPaginationType": "bootstrap"
        });
    });
</script>
<style>
.pagination {
	margin: 0 ! important;
}
</style>
<!-- *********************************************************************-->
  

    <br>



    <!--  formulario modal -->

<div class="container"  style="width:auto;">


  <div id="form-content" class="modal hide fade in" style="display: none;">
         <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Agregar Usuarios</h3>
        </div>
      <div class="modal-body"> 
            <?php 
            $operacion1 = "insertar";
            $operacion = base64_encode($operacion1);

            ?>



            <form class="contact" name="contact" method="POST" action="usuarios_operaciones.php?operaciones=<?php echo $operacion ?> ">


                <label class="label" for="login" style="font-size: 16px;">Usuario</label><br>
                <input type="text"id="login" name="login" class="input-xlarge"onKeyUp="this.value=this.value.toLowerCase();" autocomplete="off"><br>
                <label class="label" for="clave" style="font-size: 16px;">Clave</label><br>
                <input type="password"id="clave" name="clave" class="input-xlarge"><br>
                <label class="label" for="nombre_apellido" style="font-size: 16px;" >Nombres y Apellidos</label><br>
                <input type="text" id="nombre_apellido" name="nombre_apellido" class="input-xlarge" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"><br>
                <label class="label" for="categoria" style="font-size: 16px;">categoria</label><br>
                <select id="categoria" name="categoria" class="input-xlarge" style="width: auto; font-size: 16px; font-weight: bold">
                    <option >N/A</option>
                    <option >USUARIO</option>
                    <option >OPERADOR</option>
                    <option >ADMINISTRADOR</option></select><br>
                    <label class="label" for="status" style="font-size: 16px;">Estatus</label><br>
                    <select id="status" name="status" class="input-xlarge" style="width: auto; font-size: 16px; font-weight: bold">
                        <option >N/A</option>
                        <option >ACTIVO</option>
                        <option >NO ACTIVO</option></select><br>

                        <div class="modal-footer">
                          <input class="btn btn-success" type="submit" value="Guardar" id="submit">
                          <a href="#" class="btn" data-dismiss="modal">Salir</a>
                      </div>

                  </form>

</div>



          </div>

          <!--  formulario modal -->        


          <table border="0" class="table table-hover table-striped table-responsive" id="tabla"
          style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid; width: auto">
          <thead>
            <tr>
                <td style="background: white; text-align: center"><span ><a
                  data-toggle="modal" href="#form-content" ><img
                  src="imagenes/png/32x32/user_add.png" alt="Agregar datos" /></a></span></td>

                  <td colspan="6"  style="background: white; text-align: center; font-size: 28px; font-weight: bold"> Operaciones con Usuarios</td>
              </tr>

              <tr align="center" bgcolor="#0099CC" style="color: white; ">

                <th style="text-align: center;">Nº</th>
                <th style="text-align: center;">Login</th>
                <th style="text-align: center;">Usuario</th>
                <th style="text-align: center;">Categoria</th>
                <th style="text-align: center;">Status</th>


                <th></th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php
   

                    $consulta = "SELECT * FROM usuario order by nombre asc "; // sentencia sql
                    $result_consulta = $conexion->query($consulta);





                    $contador = 0;
    //while ($user = mysql_fetch_array($result_vigente)) {
                    while ($user = $result_consulta->fetch_array()) {
                        $contador++;
                        ?>

                        <tr id="fila-<?php echo trim($user['usuario']) ?>">
                            <td style=" text-align: center"><?php echo $contador ?></td>

                            <td style="text-align: center;"><?php echo trim($user['usuario']) ?></td>
                            <td style="text-align: center;"><?php echo trim($user['nombre']) ?></td>
                            <td style="text-align: center;"><?php echo trim($user['categoria']) ?></td>
                            <td style="text-align: center;"><?php echo trim($user['status']) ?></td>




                            <td><span class="modi"><span ><a
                                data-toggle="modal" href="#form-content" ><img
                                src="imagenes/png/32x32/user_edit.png" title="Editar"
                                alt="Editar usuario" /></a></span></span></td>
                                <td id="del_usuario"><a
                                    href="#"><img
                                    src="imagenes/png/32x32/user_delete.png" title="Eliminar Usuario"
                                    alt="Eliminar" /></a></td>




                                </tr>
                                <?php
                            }







                            $result_consulta->free();

                            $conexion->close();
                            ?>
                      



                    </table>












                </div>





