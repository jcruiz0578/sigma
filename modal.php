<html>
<head>

</head>

<body>


<!--  formulario modal -->


<div id="form-content" class="modal hide fade in" style="display: none; width:auto; ">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Agregar Usuarios</h3>
</div>
<div class="modal-body table-responsive" >
<?php
$operacion1 = "insertar";
$operacion = base64_encode($operacion1);
?>


     <div class="table-responsive">
       <form class="contact" name="contact" method="POST" action="">
         <label class="label" for="login" style="font-size: 16px;">Usuario</label><br>
         <input type="text"id="login" name="login" class="input-xlarge"onKeyUp="this.value=this.value.toLowerCase();" autocomplete="off"  ><br>
        
        
        
        
         <table border="0" class="table  " id="tabla"
         style="background: #e5e5e5; box-shadow: 8px 8px 15px #999; border-radius: 15px; border-top-style: solid;width:auto;  ">
         <thead>
           <tr align="center" bgcolor="#0099CC">
             <th >Nº</th>
             <th style="text-align: center;width:auto">CÉDULA ID</th>
             <th style="text-align: center;width:auto">APELLIDOS Y NOMBRES</th>
             <th style="text-align: center;width:auto">FECHA NAC</th>
             <th style="text-align: center;width:auto">DIRECCION</th>
             <th></th>
             <th></th>
           </tr>
         </thead>
         <tbody>

           <?php
           
            // Coge la variable
           
          echo " <script> var variableJS = 'contenido de la variable javascript'; </script>";
         
          
           
           
           
          
           //$cedula="14174208";
           $registros_vigente = "SELECT * FROM  estudiantes where cedulaest='$cedula' "; // sentencia sql
           $result_vigente = $conexion->query($registros_vigente);

           $contador = 0;
           //while ($user = mysql_fetch_array($result_vigente)) {
           while ($user = $result_vigente->fetch_array()) {
             $contador++;
             $apellidosest = $user [apellidosest];
             $nombresest = $user [nombresest];
             $fnest = $user [fnest];
             $nombre = $apellidosest . ", " . $nombresest;
             ?>

             <tr id="fila-<?php echo trim($user['cedulaest']) ?>">
               <td style="text-align:center;"><FONT COLOR=<?php echo $color_E ?>><?php echo $contador ?></FONT></td>

               <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['cedulaest']) ?></FONT></td>
               <td ><FONT COLOR=<?php echo $color_E ?>><?php echo $nombre ?></FONT></td>
               <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['fnest']) ?></FONT></td>

               <td ><FONT COLOR=<?php echo $color_E ?>><?php echo trim($user['direccionest']) ?></FONT></td>



               <td><span class="modi"><a href="#"><img src="imagenes/png/32x32/user_edit.png" title="Editar" alt="Editar" /></a></span></td>
               <td id="del_usuario"><a href="#"><img src="imagenes/png/32x32/printer.png" title="Imprimir Datos" alt="Eliminar" /></a></td>
             </tr>
             <?php
           }

           unset($_SESSION['anno_estudio']);
           unset($_SESSION['seccion']);

           $result_vigente->free();

           $conexion->close();
           ?>
         </tbody>

       </table>
     </form>
   </div>

   <br>

   <div class="modal-footer">
     <input class="btn btn-success" type="submit" value="Guardar" id="submit">
     <a href="#" class="btn" data-dismiss="modal">Salir</a>
   </div>



 </div>




</div>
        <!--  formulario modal -->


</body>


</html>

